<?php
include("libraries/autoload.php");
require_once 'php-ml/vendor/autoload.php';

use Phpml\Regression\LeastSquares;
class Rapor_model extends CI_Model{
    public function nilai_total($nomor_register,$start,$end,$jabatan_id=1){
        $data['kedisiplinan']   = $this->kedisiplinan($nomor_register,$start,$end);
        $data['rating']         = $this->rating($nomor_register,$start,$end);
        $data['budaya']         = $this->ambil_nilai_periode($nomor_register,$start,$end,$jabatan_id);
        $summary=array();
        if($jabatan_id==2){
          $data['produktivitas']  = $this->detailproduktivitasCC($nomor_register,$start,$end,$jabatan_id);
          $summary['kedisiplinan']= number_format($data['kedisiplinan']*30/100,2);
          $summary['budaya']= number_format($data['budaya']*30/100,2);
		  $summary['rating']      = 0;
		  $summary['produktivitas']      = number_format($data['produktivitas']['nilai']*40/100,2);
		  $summary['total']              = number_format($summary['kedisiplinan']+$summary['budaya']+$summary['produktivitas'],2);
        }else{
          $data['produktivitas']  = $this->detailproduktivitas($nomor_register,$start,$end,$jabatan_id);
          $summary['kedisiplinan']= number_format($data['kedisiplinan']*20/100,2);
          $summary['rating']      = number_format($data['rating']*5/100,2);
          $summary['budaya']      = number_format($data['budaya']*40/100,2);
          $summary['produktivitas']      = number_format($data['produktivitas']['nilai']*35/100,2);
          $summary['total']              = number_format($summary['kedisiplinan']+$summary['rating']+$summary['budaya']+$summary['produktivitas'],2);

        }

        
        $data_kirim['data']     = $data;
        $data_kirim['summary']  = $summary;
        return $data_kirim;
        //$produktivitas  = $this->kedisiplinan($nomor_register,$start,$end);
    }

    /*Kedisiplinan*/
    public function kedisiplinan($nomor_register,$start,$end){
        $kedisiplinan= $this->db->get_where("self_assessment","nomor_register='$nomor_register' AND tanggal >= '$start' AND tanggal < '$end' AND dinilai='1' AND jam_in <= jam_masuk AND jam_out >= jam_pulang")->num_rows();
        $jumlah_hari= $this->ambil_pembagi_absen($start,$end);
        // if($kedisiplinan/$jumlah_hari >= 0.95){
        //     return 100;
        // }elseif($kedisiplinan/$jumlah_hari >= 0.8){
        //     return 60;
        // }else{
        //     return 0;
        // }
		    $tambahKedisiplinan=0;
        $begin  = new DateTime($start);
        $endDatetime    = new DateTime($end);
        $interval   = DateInterval::createFromDateString('1 day');
        $period     = new DatePeriod($begin, $interval, $endDatetime);
        //Check Jika Ketidakhadirannya karena izin/sakit/cuti
        foreach ($period as $key) {
          $tanggal=$key->format("Y-m-d");
          $cekCuti=$this->db->query("SELECT * from cuti_log where nomor_register=$nomor_register AND tgl_mulai<='$tanggal' AND tgl_selesai>'$tanggal'")->row_array();
          $cekIzin=$this->db->query("SELECT * from absensi where nomor_register=$nomor_register AND tanggal_absen='$tanggal' AND NOT absen_status='ALPHA'")->row_array();
          if(!empty($cekCuti) || !empty($cekIzin)){
            $tambahKedisiplinan++;
          }
        }
        $kedisiplinan=$kedisiplinan+$tambahKedisiplinan;
        if($jumlah_hari <> 0){
             $nilai =$kedisiplinan/$jumlah_hari*100;
        }else{
           $nilai =  0;
        }
        if($nilai > 100){
          return 100;
        }else{
          return $nilai;
        }
    }

    public function absen($nomor_register,$tanggal){
        $absen= $this->db->get_where("self_assessment",array("nomor_register"=>$nomor_register, "tanggal"=>"$tanggal", "dinilai"=>'1'))->result_array();
        return $absen;
    }



    public function detailproduktivitas($nomor_register, $start, $end, $jabatan_id=1){
    //Data Summary
        $sql= "SELECT
                      quisioner.quisioner, SUM(value_self_assessment.p_nilai) AS pembimbing
                  FROM
                      self_assessment,value_self_assessment,quisioner
                  WHERE
                      quisioner.`id_quisioner` = value_self_assessment.`id_quisioner` AND
                      self_assessment.`id_self_assessment`= value_self_assessment.`id_self_assessment` AND
                      quisioner.jenis='Transaksi' AND
                      self_assessment.tanggal >='$start' AND self_assessment.tanggal <'$end' AND
                      self_assessment.dinilai='1' AND quisioner.jabatan_id = $jabatan_id AND
                      self_assessment.`nomor_register`=$nomor_register GROUP BY value_self_assessment.id_quisioner";
          $query    = $this->db->query($sql)->result_array();
     //Array Header
              $header["1"]= "No";
              $header["2"]= "Hari";
              $header["3"]= "Tanggal";
              $transaksi= $this->db->order_by("order", "asc")
                                  ->get_where("quisioner","jenis='Transaksi' AND status='Aktif' AND jabatan_id=1")->result_array();
              $n=4;
              foreach($transaksi as $dt){
                  $header[$n]= $dt['quisioner'];
                  $n++;
                  $colspan= $n;
              }
              $header[$n]= "Total";
              $header[$n+1]= "Produktivitas";

              //Array Data
              $begin = new DateTime($start);
              $end = new DateTime($end);

              $interval = DateInterval::createFromDateString('1 day');
              $period = new DatePeriod($begin, $interval, $end);
              $n=1;
              $targets= array() ;
              $samples= array() ;
              foreach ($period as $dt) {
                  $hari= $this->gmodel->getHari($dt->format("d-m-Y"));
                  $array[$n]["1"]= $n;
                  $array[$n]["2"]= $hari;
                  $array[$n]["3"]= $dt->format("d/m");

                  $jml_transaksi= 0;
                  $d=4;
                  foreach($transaksi as $dx){
                      $nilaitransaksi= $this->rapormodel->nilai_transaksi($nomor_register,$dt->format("Y-m-d"),$dx['id_quisioner']);
                      if(!empty($nilaitransaksi)){
                          $array[$n][$d]= $nilaitransaksi[0]['p_nilai'];
                          if($nilaitransaksi[0]['order'] <> 4){
                              $jml_transaksi= $jml_transaksi+$nilaitransaksi[0]['p_nilai'];
                          }else{
                              $jml_transaksi= $jml_transaksi-$nilaitransaksi[0]['p_nilai'];
                          }
                      }else{
                          $array[$n][$d]= 0;
                          $jml_transaksi= $jml_transaksi;
                      }
                      $d++;
                  }

                  $array[$n][$d]= $jml_transaksi;

                  if($hari != "Sabtu"){
                      $summary= $jml_transaksi/7;
                  }else{
                      $summary= $jml_transaksi/3;
                  }

                  $array[$n][$d+1]= number_format($summary,2);

                  //Perhitungan Trend
                  $sample= array($n);
                  array_push($samples, $sample);
                  array_push($targets,$array[$n][$d+1]);
                  $n++;
              }
              $jumlah_produktifitas= array_sum($targets);

              $data_kirim['data_summary'] = $query;
              $data_kirim['data']         = $array;
              $data_kirim['header']       = $header;
              $data_kirim['colspan']      = $colspan;
              $regression = new LeastSquares();
              $regression->train($samples, $targets);
              $koefisien= $regression->getCoefficients();
              if($jumlah_produktifitas > 5){
          			if($koefisien[0] <= 1 and $koefisien[0] >= -1){
          				$data_kirim['nilai']        = 75;
          			}elseif($koefisien[0] > 1){
          				$hasil_nilai= 75+($koefisien[0]*25)-25;
          				if($hasil_nilai > 100){
          					$data_kirim['nilai']        = 100;
          				}else{
          					$data_kirim['nilai']        = number_format($hasil_nilai,2);
          				}
          			}else{
          				$hasil_nilai= 75+($koefisien[0]*25)+25;
          				if($hasil_nilai < 50){
          					$data_kirim['nilai']        = 50;
          				}else{
          					$data_kirim['nilai']        = number_format($hasil_nilai,2);
          				}
        			  }
              }else{
                  $data_kirim['nilai']        = $jumlah_produktifitas;
              }


            //   if($targets[0] != 0){
            //   	$pembagi = $targets[0];
            //   }elseif($targets[1] != 0){
            //   	$pembagi = $targets[1];
            //   }elseif($targets[2] != 0){
            //   	$pembagi = $targets[2];
            //   }elseif($targets[3] != 0){
            //   	$pembagi = $targets[3];
            //   }elseif($targets[4] != 0){
            //   	$pembagi = $targets[4];
            //   }
            //
            // if(!empty($pembagi)){
            //   if(!empty($targets[4])){
            //     $cdgr1= ($targets[4]/$pembagi);
            //   }elseif(!empty($targets[3])){
            //     $cdgr1= ($targets[3]/$pembagi);
            //   }elseif(!empty($targets[2])){
            //     $cdgr1= ($targets[2]/$pembagi);
            //   }elseif(!empty($targets[1])){
            //     $cdgr1= ($targets[1]/$pembagi);
            //   }else{
            //     $cdgr1= ($targets[0]/$pembagi);
            //   }
            //
            //   $cdgr= pow($cdgr1,0.2);
            //   if($cdgr > 1){
            //  	   $data_kirim['nilai'] = 100;
            // 	}else{
            // 	   $data_kirim['nilai'] = round($cdgr * 100,2);
            // 	}
            // }else{
            //     $data_kirim['nilai'] = 0;
            // }
            //
            //
            //   $data_kirim['sample'] = $samples;
            //   $data_kirim['target'] = $targets;
              return $data_kirim;

       }
	
	public function detailproduktivitasCC($nomor_register, $start, $end, $jabatan_id=1){
    //Data Summary
        $sql= "SELECT
                      quisioner.quisioner, SUM(value_self_assessment.score) AS pembimbing,
                      COUNT(quisioner.quisioner) as num_items
                  FROM
                      self_assessment,value_self_assessment,quisioner
                  WHERE
                      quisioner.`id_quisioner` = value_self_assessment.`id_quisioner` AND
                      self_assessment.`id_self_assessment`= value_self_assessment.`id_self_assessment` AND
                      quisioner.jenis='Evaluasi-Score' AND
                      self_assessment.tanggal >='$start' AND self_assessment.tanggal <'$end' AND
                      self_assessment.dinilai='1' AND quisioner.jabatan_id = $jabatan_id AND
                      self_assessment.`nomor_register`=$nomor_register GROUP BY value_self_assessment.id_quisioner";
          $query    = $this->db->query($sql)->result_array();
     //Array Header
              $header["1"]= "No";
              $header["2"]= "Hari";
              $header["3"]= "Tanggal";
              $transaksi= $this->db->order_by("order", "asc")
                                  ->get_where("quisioner","jenis='Evaluasi-Score' AND status='Aktif' AND jabatan_id=$jabatan_id")->result_array();
              $n=4;
              foreach($transaksi as $dt){
                  $header[$n]= $dt['quisioner'];
                  $n++;
                  $colspan= $n;
              }
              /*$header[$n]= "Total";
              $header[$n+1]= "Produktivitas";*/

              //Array Data
              $begin = new DateTime($start);
              $end = new DateTime($end);

              $interval = DateInterval::createFromDateString('1 day');
              $period = new DatePeriod($begin, $interval, $end);
              $n=1;
              
              foreach ($period as $dt) {
                  $hari= $this->gmodel->getHari($dt->format("d-m-Y"));
                  $array[$n]["1"]= $n;
                  $array[$n]["2"]= $hari;
                  $array[$n]["3"]= $dt->format("d/m");

                  $jml_transaksi= 0;
                  $d=4;
                  foreach($transaksi as $dx){
                      $nilaitransaksi= $this->rapormodel->nilai_transaksi($nomor_register,$dt->format("Y-m-d"),$dx['id_quisioner']);
                      if(!empty($nilaitransaksi)){
                          $array[$n][$d]= $nilaitransaksi[0]['score'];
                          
                      }
                      $d++;
                  }

                  //$array[$n][$d]= $jml_transaksi;

                  if($hari != "Sabtu"){
                      $summary= $jml_transaksi/7;
                  }else{
                      $summary= $jml_transaksi/3;
                  }

                  //$array[$n][$d+1]= number_format($summary,2);

                  
                  $n++;
              }
             
              

              $data_kirim['data_summary'] = $query;
              $data_kirim['data']         = $array;
              $data_kirim['header']       = $header;
              $data_kirim['colspan']      = $colspan;
              

              $sumTotal=0;
              $max=0;
              foreach ($query as $key){
                $sumTotal=$sumTotal+$key['pembimbing'];
                $max=$max+(5*$key['num_items']);
              }

              $data_kirim['nilai']        = ($sumTotal/$max)*100; 
            
              return $data_kirim;

	}
    public function nilai_transaksi($nomor_register,$date,$id_quisioner){
           $data= $this->db->join("quisioner","quisioner.id_quisioner=value_self_assessment.id_quisioner","left")
                            ->join("self_assessment","self_assessment.id_self_assessment=value_self_assessment.id_self_assessment","left")
                            ->get_where("value_self_assessment",
                                                                "self_assessment.nomor_register=$nomor_register
                                                                    AND self_assessment.tanggal='$date'
                                                                    AND value_self_assessment.id_quisioner=$id_quisioner")->result_array();
            return $data;
    }

    /*Rating*/
    public function rating($nomor_register, $start, $end){
        $peserta_magang= $this->db->get_where("peserta_magang",array("nomor_register"=>$nomor_register))->result_array();
        $kode_register= $peserta_magang[0]['kode_register'];
        $queryString="SELECT SUM(nilai) AS nilai, COUNT(pegawai_id) AS jumlah_nasabah FROM nilai,peserta_magang WHERE nilai.pegawai_id=peserta_magang.kode_register AND pegawai_id='$kode_register' AND TIME(nilai.tanggal) < '16:30:00' AND tanggal >= '$start' AND tanggal < '".$end." 00:00:00'";
		$query=$this->db->query($queryString)->result_array();
		if(!empty($query) AND $query[0]['jumlah_nasabah'] <> 0){
			$nilai= $query[0]['nilai']*20/$query[0]['jumlah_nasabah'];
			return number_format($nilai);
		}else{
			return "0";
		}
	}

    public function ratingnilai($nomor_register,$tanggal,$star){
        $rating= $this->db->get_where("nilai","pegawai_id='$nomor_register' AND nilai='$star' AND tanggal LIKE '".$tanggal."%' AND TIME(nilai.tanggal) < '16:30:00' ")->num_rows();
        return $rating;
    }

    public function rating_lengkap($kode_register,$start,$end){
        $query= "
                    SELECT
                        DISTINCT
                        DATE(n.`tanggal`) as tanggal,
                        (
                            SELECT
                                COUNT(n2.pegawai_id)
                            FROM
                                nilai n2
                            WHERE
                                n2.pegawai_id = n.`pegawai_id`
                                AND
                                n2.nilai = '1'
                                AND
                                DATE(n2.tanggal) = DATE(n.`tanggal`)
                                AND TIME(n2.tanggal) < '16:30:00'
                        ) AS bintang_1,
                        (
                            SELECT
                                COUNT(n2.pegawai_id)
                            FROM
                                nilai n2
                            WHERE
                                n2.pegawai_id = n.`pegawai_id`
                                AND
                                n2.nilai = '2'
                                AND
                                DATE(n2.tanggal) = DATE(n.`tanggal`)
                                AND TIME(n2.tanggal) < '16:30:00'
                        ) AS bintang_2,
                        (
                            SELECT
                                COUNT(n2.pegawai_id)
                            FROM
                                nilai n2
                            WHERE
                                n2.pegawai_id = n.`pegawai_id`
                                AND
                                n2.nilai = '3'
                                AND
                                DATE(n2.tanggal) = DATE(n.`tanggal`)
                                AND TIME(n2.tanggal) < '16:30:00'
                        ) AS bintang_3,
                        (
                            SELECT
                                COUNT(n2.pegawai_id)
                            FROM
                                nilai n2
                            WHERE
                                n2.pegawai_id = n.`pegawai_id`
                                AND
                                n2.nilai = '4'
                                AND
                                DATE(n2.tanggal) = DATE(n.`tanggal`)
                                AND TIME(n2.tanggal) < '16:30:00'
                        ) AS bintang_4,
                        (
                            SELECT
                                COUNT(n2.pegawai_id)
                            FROM
                                nilai n2
                            WHERE
                                n2.pegawai_id = n.`pegawai_id`
                                AND
                                n2.nilai = '5'
                                AND
                                DATE(n2.tanggal) = DATE(n.`tanggal`)
                                AND TIME(n2.tanggal) < '16:30:00'
                        ) AS bintang_5,
                        (
                            (((
                                SELECT
                                    COUNT(n2.pegawai_id)
                                FROM
                                    nilai n2
                                WHERE
                                    n2.pegawai_id = n.`pegawai_id`
                                    AND
                                    n2.nilai = '1'
                                    AND
                                    DATE(n2.tanggal) = DATE(n.`tanggal`)
                                    AND TIME(n2.tanggal) < '16:30:00'
                            ) * 1)
                            +
                            ((
                                SELECT
                                    COUNT(n2.pegawai_id)
                                FROM
                                    nilai n2
                                WHERE
                                    n2.pegawai_id = n.`pegawai_id`
                                    AND
                                    n2.nilai = '2'
                                    AND
                                    DATE(n2.tanggal) = DATE(n.`tanggal`)
                                    AND TIME(n2.tanggal) < '16:30:00'
                            ) * 2)
                            +
                            ((
                                SELECT
                                    COUNT(n2.pegawai_id)
                                FROM
                                    nilai n2
                                WHERE
                                    n2.pegawai_id = n.`pegawai_id`
                                    AND
                                    n2.nilai = '3'
                                    AND
                                    DATE(n2.tanggal) = DATE(n.`tanggal`)
                                    AND TIME(n2.tanggal) < '16:30:00'
                            ) * 3)
                            +
                            ((
                                SELECT
                                    COUNT(n2.pegawai_id)
                                FROM
                                    nilai n2
                                WHERE
                                    n2.pegawai_id = n.`pegawai_id`
                                    AND
                                    n2.nilai = '4'
                                    AND
                                    DATE(n2.tanggal) = DATE(n.`tanggal`)
                                    AND TIME(n2.tanggal) < '16:30:00'
                            ) * 4)
                            +
                            ((
                                SELECT
                                    COUNT(n2.pegawai_id)
                                FROM
                                    nilai n2
                                WHERE
                                    n2.pegawai_id = n.`pegawai_id`
                                    AND
                                    n2.nilai = '5'
                                    AND
                                    DATE(n2.tanggal) = DATE(n.`tanggal`)
                                    AND TIME(n2.tanggal) < '16:30:00'
                            ) * 5))
                            /
                            (
                                SELECT
                                    COUNT(n2.pegawai_id)
                                FROM
                                    nilai n2
                                WHERE
                                    n2.pegawai_id = n.`pegawai_id`
                                    AND
                                    DATE(n2.tanggal) = DATE(n.`tanggal`)
                                    AND TIME(n2.tanggal) < '16:30:00'
                            )
                            *
                            20
                        ) AS total
                    FROM
                        nilai n
                    WHERE
                        n.`pegawai_id` = '$kode_register' AND
                        DATE(n.`tanggal`) >= '$start' AND
                        DATE(n.`tanggal`) < '$end'
                    ORDER BY
                        DATE(n.`tanggal`) ASC
        ";
        return $this->db->query($query)->result_array();
    }

    public function getRatingHarian($nomor_register,$start,$end){
    $data_peserta= $this->db->get_where("peserta_magang",array("nomor_register"=>$nomor_register))->result_array();

    $detail="SELECT COUNT(pegawai_id) AS jumlah_nasabah, nilai FROM nilai JOIN
            sim_magang.peserta_magang pm ON nilai.pegawai_id=pm.kode_register WHERE pegawai_id='".$data_peserta[0]['kode_register']."' AND tanggal >= '$start' AND tanggal < '".$end." 00:00:00' AND TIME(tanggal) < '16:30:00'
            GROUP BY nilai";
    $querydetail=$this->db->query($detail)->result_array();

    if(!empty($querydetail)){
        foreach($querydetail as $dx){
            $kirim['detail'][$dx['nilai']]= $dx['jumlah_nasabah'];
        }
    }

    if(!empty($kirim)){
        return $kirim;
    }
  }


    /*Kebudayaan*/
     public function ambil_nilai_periode($nomor_register,$start,$end,$jabatan_id=1){
       $sql_quisioner=  "SELECT
                            	evaluasi_std_layanan.`keterangan` AS keterangan, COUNT(`penilaian`) AS `nilai`
                            FROM
                            	evaluasi_penilaian_magang_detail,
                            	evaluasi_penilaian_magang,
                            	evaluasi_std_layanan_pernyataan,
                            	evaluasi_std_layanan_detail,
                            	evaluasi_std_layanan,
                            	peserta_magang
                            WHERE
                            	evaluasi_penilaian_magang_detail.id_penilaian = evaluasi_penilaian_magang.id_penilaian AND
                            	evaluasi_penilaian_magang.nomor_register=peserta_magang.nomor_register AND
                            	evaluasi_std_layanan_pernyataan.id_evaluasi_detail = evaluasi_std_layanan_detail.id_evaluasi_detail AND
                            	evaluasi_penilaian_magang_detail.id_pernyataan = evaluasi_std_layanan_pernyataan.id_pernyataan AND
                            	evaluasi_std_layanan_detail.id_evaluasi= evaluasi_std_layanan.id_evaluasi AND
                            	peserta_magang.`nomor_register`= $nomor_register AND
                              evaluasi_penilaian_magang_detail.`penilaian`='Y' AND
                            	evaluasi_std_layanan.`jabatan_id`='$jabatan_id' AND
                                evaluasi_penilaian_magang.waktu_penilaian >= '$start' AND
                                evaluasi_penilaian_magang.waktu_penilaian < '".$end." 23:59:59'
                            GROUP BY
                                evaluasi_std_layanan.`keterangan`";
    $query    = $this->db->query($sql_quisioner)->result_array();
    $nilai    =0;
    foreach($query as $ya){
            $sql_all_quisioner=  "SELECT
                            	evaluasi_std_layanan.`bobot` AS bobot, COUNT(`penilaian`) AS `nilai`
                            FROM
                            	evaluasi_penilaian_magang_detail,
                            	evaluasi_penilaian_magang,
                            	evaluasi_std_layanan_pernyataan,
                            	evaluasi_std_layanan_detail,
                            	evaluasi_std_layanan,
                            	peserta_magang
                            WHERE
                            	evaluasi_penilaian_magang_detail.id_penilaian = evaluasi_penilaian_magang.id_penilaian AND
                            	evaluasi_penilaian_magang.nomor_register=peserta_magang.nomor_register AND
                            	evaluasi_std_layanan_pernyataan.id_evaluasi_detail = evaluasi_std_layanan_detail.id_evaluasi_detail AND
                            	evaluasi_penilaian_magang_detail.id_pernyataan = evaluasi_std_layanan_pernyataan.id_pernyataan AND
                            	evaluasi_std_layanan_detail.id_evaluasi= evaluasi_std_layanan.id_evaluasi AND
                            	peserta_magang.`nomor_register`= $nomor_register AND
                                evaluasi_penilaian_magang.waktu_penilaian >= '$start' AND
                                evaluasi_std_layanan.`jabatan_id`='$jabatan_id' AND
                                evaluasi_penilaian_magang.waktu_penilaian < '".$end." 23:59:59' AND
                                evaluasi_std_layanan.`keterangan`='".$ya['keterangan']."'";
            $query2    = $this->db->query($sql_all_quisioner)->result_array();
        //$nilai  = $nilai + $ya['nilai'] /$query2[0]['nilai'] * $query2[0]['bobot'];
		if($jabatan_id==2){ 
          $nilai  = $nilai + $ya['nilai'] /$query2[0]['nilai']*100;
        }else{
          $nilai  = $nilai + $ya['nilai'] /$query2[0]['nilai'] * $query2[0]['bobot'];
        }
	}

    return number_format($nilai,2);
   }

   //Function tidak ada di controller peserta/pembimbing
    public function ambil_nilai_periode_param($nomor_register,$start,$end,$param){
       $sql_quisioner=  "SELECT
                            	evaluasi_std_layanan.`keterangan` AS keterangan, COUNT(`penilaian`) AS `nilai`
                            FROM
                            	evaluasi_penilaian_magang_detail,
                            	evaluasi_penilaian_magang,
                            	evaluasi_std_layanan_pernyataan,
                            	evaluasi_std_layanan_detail,
                            	evaluasi_std_layanan,
                            	peserta_magang
                            WHERE
                            	evaluasi_penilaian_magang_detail.id_penilaian = evaluasi_penilaian_magang.id_penilaian AND
                            	evaluasi_penilaian_magang.nomor_register=peserta_magang.nomor_register AND
                            	evaluasi_std_layanan_pernyataan.id_evaluasi_detail = evaluasi_std_layanan_detail.id_evaluasi_detail AND
                            	evaluasi_penilaian_magang_detail.id_pernyataan = evaluasi_std_layanan_pernyataan.id_pernyataan AND
                            	evaluasi_std_layanan_detail.id_evaluasi= evaluasi_std_layanan.id_evaluasi AND
                            	peserta_magang.`nomor_register`= $nomor_register AND
                            	evaluasi_penilaian_magang_detail.`penilaian`='Y' AND
                                evaluasi_penilaian_magang.waktu_penilaian >= '$start' AND
                                evaluasi_penilaian_magang.waktu_penilaian < '".$end." 23:59:59' AND
                                evaluasi_std_layanan.keterangan='$param'
                            GROUP BY
                                evaluasi_std_layanan.`keterangan`";
    $query    = $this->db->query($sql_quisioner)->result_array();
    $nilai    =0;
    foreach($query as $ya){
            $sql_all_quisioner=  "SELECT
                            	evaluasi_std_layanan.`bobot` AS bobot, COUNT(`penilaian`) AS `nilai`
                            FROM
                            	evaluasi_penilaian_magang_detail,
                            	evaluasi_penilaian_magang,
                            	evaluasi_std_layanan_pernyataan,
                            	evaluasi_std_layanan_detail,
                            	evaluasi_std_layanan,
                            	peserta_magang
                            WHERE
                            	evaluasi_penilaian_magang_detail.id_penilaian = evaluasi_penilaian_magang.id_penilaian AND
                            	evaluasi_penilaian_magang.nomor_register=peserta_magang.nomor_register AND
                            	evaluasi_std_layanan_pernyataan.id_evaluasi_detail = evaluasi_std_layanan_detail.id_evaluasi_detail AND
                            	evaluasi_penilaian_magang_detail.id_pernyataan = evaluasi_std_layanan_pernyataan.id_pernyataan AND
                            	evaluasi_std_layanan_detail.id_evaluasi= evaluasi_std_layanan.id_evaluasi AND
                            	peserta_magang.`nomor_register`= $nomor_register AND
                                evaluasi_penilaian_magang.waktu_penilaian >= '$start' AND
                                evaluasi_penilaian_magang.waktu_penilaian < '".$end." 23:59:59' AND
                                evaluasi_std_layanan.keterangan='$param' AND
                                evaluasi_std_layanan.`keterangan`='".$ya['keterangan']."'";
            $query2    = $this->db->query($sql_all_quisioner)->result_array();
        $nilai  = $nilai + $ya['nilai'] /$query2[0]['nilai'] * $query2[0]['bobot'];
    }

    return number_format($nilai,2);
   }

   //Susun Rapor berdasarkan STD LAYANAN (Penilaian dari SOP)
    function susunRapor($nomor_register,$start,$end,$jabatan_id=1){
      //List standar layanan harus sesuai dengan posisi (jabatan_id)
    	$data_evaluasi= $this->db->get_where("evaluasi_std_layanan",array("status" => "Aktif","jabatan_id" => $jabatan_id))->result_array();
        if(!empty($data_evaluasi)){
			foreach($data_evaluasi as $dt){
				$data_evaluasi_detail= $this->db->get_where("evaluasi_std_layanan_detail",array("id_evaluasi" => $dt['id_evaluasi']))->result_array();
				if(!empty($data_evaluasi_detail)){
					foreach($data_evaluasi_detail as $dx){
						$data_evaluasi_pernyataan= $this->db->get_where("evaluasi_std_layanan_pernyataan",array("id_evaluasi_detail" => $dx['id_evaluasi_detail']))->result_array();
						if(!empty($data_evaluasi_detail)){
							foreach($data_evaluasi_pernyataan as $dz){
								$data_kirim[$dt['keterangan']][$dx['deskripsi']][$dz['id_pernyataan']]['pernyataan']= $dz['pernyataan'];
                                $sql= "SELECT
                                             evaluasi_penilaian_magang_detail.penilaian
                                       FROM
                                            evaluasi_penilaian_magang_detail,evaluasi_penilaian_magang
                                       WHERE
                                            evaluasi_penilaian_magang_detail.id_penilaian=evaluasi_penilaian_magang.id_penilaian AND
                                            evaluasi_penilaian_magang_detail.id_pernyataan='".$dz['id_pernyataan']."' AND
                                            evaluasi_penilaian_magang.nomor_register=$nomor_register AND
                                            evaluasi_penilaian_magang.waktu_penilaian >= '$start' AND
                                            evaluasi_penilaian_magang.waktu_penilaian < '".$end." 00:00:00'
                                            ";
                                $data_kirim[$dt['keterangan']][$dx['deskripsi']][$dz['id_pernyataan']]['value']= $this->db->query($sql)->result_array();
							}
						}
					}
				}
			}
		    return $data_kirim;
        }
    }

    function susunTanggalRapor($nomor_register,$start,$end){
        $tanggal= "SELECT DATE(waktu_penilaian) AS tanggal FROM  evaluasi_penilaian_magang WHERE nomor_register= $nomor_register AND waktu_penilaian >= '$start' AND
                                            waktu_penilaian < '".$end." 00:00:00'";
        $queryt= $this->db->query($tanggal)->result_array();
        return $queryt;
    }




  //Ambil Hari libur
    public function ambil_pembagi_absen($start,$end){
        //Jumlah Hari Libur Nasional
        $client     =file_get_contents("http://sdm.bankjateng.co.id/api/?command=get_tanggal_libur_weekdays&start=".$start."&end=".$end, false);

        //Jumlah Hari Libur Sabtu Minggu
        $begin      = new DateTime($start);
        $end        = new DateTime($end);

        $daterange  = new DatePeriod($begin, new DateInterval('P1D'), $end);
        //mendapatkan range antara dua tanggal dan di looping
        // $i      =    0;
        $x      =    0;
        // $end    =    1;

        foreach($daterange as $date){
            $daterange      = $date->format("Y-m-d");
            $datetime       = DateTime::createFromFormat('Y-m-d', $daterange);

            //Convert tanggal untuk mendapatkan nama hari
            $day            = $datetime->format('D');

            //Check untuk menghitung yang bukan hari sabtu dan minggu
            if($day!="Sun" && $day!="Sat") {
                //echo $i;
                $x++;

            }
            // $end++;
            // $i++;
        }
        return $x-$client;
    }

    public function getStartAndEndDate($week, $year) {
          $dto = new DateTime();
          $dto->setISODate($year, $week);
          $ret['start'] = $dto->format('Y-m-d');
          $dto->modify('+6 days');
          $ret['end'] = $dto->format('Y-m-d');
          return $ret;
    }

    public function getWeekNumber($ddate){
        $date = new DateTime($ddate);
        $kirim['year']= $date->format("Y");
        $kirim['week']= $date->format("W");
        return $kirim;
    }


    public function getPeriodeRapor($minggu,$tanggal_masuk){
        $penambah_awal_periode     = 7*$minggu;
        $penambah_akhir_periode    = $penambah_awal_periode + 6;
        $kirim['start']  = date('Y-m-d', strtotime('+'.$penambah_awal_periode.' days', strtotime($tanggal_masuk))); //operasi penjumlahan tanggal sebanyak 6 hari
        $kirim['end']    = date('Y-m-d', strtotime('+'.$penambah_akhir_periode.' days', strtotime($tanggal_masuk)));
        return $kirim;
    }
	/**
    * Khusus Call Center
    */
    public function getPeriodeRaporCC($minggu,$tanggal_masuk){
        $penambah_awal_periode     = 7*$minggu;
        $penambah_akhir_periode    = $penambah_awal_periode + 7;
        $kirim['start']  = date('Y-m-d', strtotime('+'.$penambah_awal_periode.' days', strtotime($tanggal_masuk))); //operasi penjumlahan tanggal sebanyak 6 hari
        $kirim['end']    = date('Y-m-d', strtotime('+'.$penambah_akhir_periode.' days', strtotime($tanggal_masuk)));
        return $kirim;
    }
    //insert or update nilai summary
    public function insertnilaisummary($nr, $minggu, $data){
          $data_kirim = array(
                              'nomor_register'  => $nr,
                              'minggu_ke'       => $minggu,
                              'kedisiplinan'    => $data['kedisiplinan'],
                              'rating'          => $data['rating'],
                              'budaya'          => $data['budaya'],
                              'produktivitas'   => $data['produktivitas'],
                              'total'           => $data['total']
                        );
        //Cek Data
        $cek= $this->db->get_where("summary_nilai",array('nomor_register'=>$nr, "minggu_ke"=>$minggu))->row();
        if($data['total'] > 0){
             if(!empty($cek)){
               $this->db->where('id_summary_nilai', $cek->id_summary_nilai);
               $this->db->update('summary_nilai', $data);
             }else{
               $this->db->insert('summary_nilai', $data_kirim);
             }
        }
    }


    /* Evaluasi Periodik */
    //Cek Periode Penilaiaan
    public function lamamagang($tanggal_masuk){
      $tanggal = $tanggal_masuk;
      $tanggal = new DateTime($tanggal);
      $sekarang = new DateTime();
      $perbedaan = $tanggal->diff($sekarang);

      $kirim['tahun']= $perbedaan->y;
      $kirim['bulan']= $perbedaan->m;
      $kirim['hari'] = $perbedaan->d;
      $kirim['harifull'] = $perbedaan->days;

      if($kirim['bulan']==3){
        $kirim['periode'] = 1;
      }elseif($kirim['bulan']==6){
        $kirim['periode'] = 2;
      }elseif($kirim['bulan']==9){
        $kirim['periode'] = 3;
      }elseif($kirim['bulan']==12){
        $kirim['periode'] = 4;
      }elseif($kirim['bulan']==15){
        $kirim['periode'] = 5;
      }elseif($kirim['bulan']==18){
        $kirim['periode'] = 6;
      }elseif($kirim['bulan']==21){
        $kirim['periode'] = 7;
      }elseif($kirim['bulan']==24){
        $kirim['periode'] = 8;
      }
      $kirim['periode'] = 1;
      return $kirim;
    }

    //Get Periode Peserta
    public function periodepenilaiaan($tanggal_masuk,$periode)
    {
        if($periode==1){
            $start  = $tanggal_masuk;
            $end    = date('Y-m-d', strtotime('+3 month', strtotime($tanggal_masuk)));
            $kirim['start'] = $this->gmodel->formatTanggalID($tanggal_masuk);
            $kirim['end']   = $this->gmodel->formatTanggalID($end);
        }elseif($periode==2){
            $start  = date('Y-m-d', strtotime('+3 month', strtotime($tanggal_masuk)));
            $end    = date('Y-m-d', strtotime('+6 month', strtotime($tanggal_masuk)));
            $kirim['start'] = $this->gmodel->formatTanggalID($start);
            $kirim['end']   = $this->gmodel->formatTanggalID($end);
        }elseif($periode==3){
            $start  = date('Y-m-d', strtotime('+6 month', strtotime($tanggal_masuk)));
            $end    = date('Y-m-d', strtotime('+9 month', strtotime($tanggal_masuk)));
            $kirim['start'] = $this->gmodel->formatTanggalID($start);
            $kirim['end']   = $this->gmodel->formatTanggalID($end);
        }elseif($periode==4){
            $start  = date('Y-m-d', strtotime('+9 month', strtotime($tanggal_masuk)));
            $end    = date('Y-m-d', strtotime('+12 month', strtotime($tanggal_masuk)));
            $kirim['start'] = $this->gmodel->formatTanggalID($start);
            $kirim['end']   = $this->gmodel->formatTanggalID($end);
        }elseif($periode==5){
            $start  = date('Y-m-d', strtotime('+12 month', strtotime($tanggal_masuk)));
            $end    = date('Y-m-d', strtotime('+15 month', strtotime($tanggal_masuk)));
            $kirim['start'] = $this->gmodel->formatTanggalID($start);
            $kirim['end']   = $this->gmodel->formatTanggalID($end);
        }elseif($periode==6){
            $start  = date('Y-m-d', strtotime('+15 month', strtotime($tanggal_masuk)));
            $end    = date('Y-m-d', strtotime('+18 month', strtotime($tanggal_masuk)));
            $kirim['start'] = $this->gmodel->formatTanggalID($start);
            $kirim['end']   = $this->gmodel->formatTanggalID($end);
        }elseif($periode==7){
            $start  = date('Y-m-d', strtotime('+18 month', strtotime($tanggal_masuk)));
            $end    = date('Y-m-d', strtotime('+21 month', strtotime($tanggal_masuk)));
            $kirim['start'] = $this->gmodel->formatTanggalID($start);
            $kirim['end']   = $this->gmodel->formatTanggalID($end);
        }elseif($periode==8){
            $start  = date('Y-m-d', strtotime('+21 month', strtotime($tanggal_masuk)));
            $end    = date('Y-m-d', strtotime('+24 month', strtotime($tanggal_masuk)));
            $kirim['start'] = $this->gmodel->formatTanggalID($start);
            $kirim['end']   = $this->gmodel->formatTanggalID($end);
        }
        $kirim['mulai']= $start;
        $kirim['akhir']= $end;
        return $kirim;
    }

    //Ambil Nilai
    public function nilaipeserta($nomor_register,$periode)
    {
      if($periode == 1){
         $data= $this->db->query("SELECT * FROM summary_nilai WHERE nomor_register=$nomor_register AND minggu_ke <= 12 ORDER BY minggu_ke ASC")->result_array();
      }elseif($periode == 2){
         $data= $this->db->query("SELECT * FROM summary_nilai WHERE nomor_register=$nomor_register AND minggu_ke > 12 AND  minggu_ke <= 24 ORDER BY minggu_ke ASC")->result_array();
      }elseif($periode == 4){
         $data= $this->db->query("SELECT * FROM summary_nilai WHERE nomor_register=$nomor_register AND minggu_ke > 24 AND  minggu_ke <= 36 ORDER BY minggu_ke ASC")->result_array();
      }elseif($periode == 5){
         $data= $this->db->query("SELECT * FROM summary_nilai WHERE nomor_register=$nomor_register AND minggu_ke > 36 AND  minggu_ke <= 48 ORDER BY minggu_ke ASC")->result_array();
      }elseif($periode == 6){
         $data= $this->db->query("SELECT * FROM summary_nilai WHERE nomor_register=$nomor_register AND minggu_ke > 48 AND  minggu_ke <= 60 ORDER BY minggu_ke ASC")->result_array();
      }elseif($periode == 7){
         $data= $this->db->query("SELECT * FROM summary_nilai WHERE nomor_register=$nomor_register AND minggu_ke > 60 AND  minggu_ke <= 72 ORDER BY minggu_ke ASC")->result_array();
      }elseif($periode == 8){
         $data= $this->db->query("SELECT * FROM summary_nilai WHERE nomor_register=$nomor_register AND minggu_ke > 72 AND  minggu_ke <= 84 ORDER BY minggu_ke ASC")->result_array();
      }
      $sum['bulan1']['kedisiplinan']  = number_format(($data[0]['kedisiplinan']+$data[1]['kedisiplinan']+$data[2]['kedisiplinan']+$data[3]['kedisiplinan'])/4/20*100,0);
      $sum['bulan1']['rating']        = number_format(($data[0]['rating']+$data[1]['rating']+$data[2]['rating']+$data[3]['rating'])/4/5*100,0);
      $sum['bulan1']['budaya']        = number_format(($data[0]['budaya']+$data[1]['budaya']+$data[2]['budaya']+$data[3]['budaya'])/4/40*100,0);
      $sum['bulan1']['produktivitas'] = number_format(($data[0]['produktivitas']+$data[1]['produktivitas']+$data[2]['produktivitas']+$data[3]['produktivitas'])/4/35*100,0);
      $sum['bulan2']['kedisiplinan']  = number_format(($data[4]['kedisiplinan']+$data[5]['kedisiplinan']+$data[6]['kedisiplinan']+$data[7]['kedisiplinan'])/4/20*100,0);
      $sum['bulan2']['rating']        = number_format(($data[4]['rating']+$data[5]['rating']+$data[6]['rating']+$data[7]['rating'])/4/5*100,0);
      $sum['bulan2']['budaya']        = number_format(($data[4]['budaya']+$data[5]['budaya']+$data[6]['budaya']+$data[7]['budaya'])/4/40*100,0);
      $sum['bulan2']['produktivitas'] = number_format(($data[4]['produktivitas']+$data[5]['produktivitas']+$data[6]['produktivitas']+$data[7]['produktivitas'])/4/35*100,0);
      $sum['bulan3']['kedisiplinan']  = number_format(($data[8]['kedisiplinan']+$data[9]['kedisiplinan']+$data[10]['kedisiplinan']+$data[11]['kedisiplinan'])/4/20*100,0);
      $sum['bulan3']['rating']        = number_format(($data[8]['rating']+$data[9]['rating']+$data[10]['rating']+$data[11]['rating'])/4/5*100,0);
      $sum['bulan3']['budaya']        = number_format(($data[8]['budaya']+$data[9]['budaya']+$data[10]['budaya']+$data[11]['budaya'])/4/40*100,0);
      $sum['bulan3']['produktivitas'] = number_format(($data[8]['produktivitas']+$data[9]['produktivitas']+$data[10]['produktivitas']+$data[11]['produktivitas'])/4/35*100,0);
      return $sum;
    }

    //Ambil Absensi
    public function absensipeserta($nomor_register,$periode)
    {
      $data= $this->db->query("SELECT absen_status,count(absensi_id) as jumlah FROM absensi WHERE nomor_register=10 AND tanggal_absen >= '$periode[mulai]' AND tanggal_absen <= '$periode[akhir]' GROUP BY absen_status ")->result_array();
      $data_kirim= array();
      if(!empty($data)){
          foreach ($data as $value) {
            $data_kirim[$value['absen_status']]= $value['jumlah'];
          }
      }
      return $data_kirim;
    }

    // //Simpan Data
    // public function simpanevaluasi($nomor_register,$periode,$id_pembimbing,$data)
    // {
    //    $pekerjaan = json_encode($data['pekerjaan']);
    //    $potensi   = json_encode($data['potensi']);
    //    $absensi   = json_encode($data['absensi']);
    //
    //    $simpan= array(
    //                   "nomor_register"      =>$nomor_register,
    //                   "periode"             =>$periode,
    //                   "id_pembimbing"       =>$id_pembimbing,
    //                   "tanggal_dinilai"     =>date("Y-m-d"),
    //                   "pekerjaan"           =>$pekerjaan,
    //                   "potensi"             =>$potensi,
    //                   "absensi"             =>$absensi,
    //                   "kejujuran"           =>$data['kejujuran'],
    //                   "catatankhusus"       =>$data['catatankhusus'],
    //                   "kesimpulan"          =>$data['kesimpulan'],
    //                   "kekurangan"          =>$data['kekurangan'],
    //                   "cara_memperbaiki"    =>$data['cara_memperbaiki'],
    //                   "kesehatan"           =>$data['kesehatan'],
    //                   "keterangan_kesehatan"=>$data['keterangan_kesehatan'],
    //                   "rekomendasi"         =>$data['rekomendasi']
    //                 );
    //     $this->db->insert("evaluasiperiodik",$simpan);
    //     return $this->db->insert_id();
    // }

    //Simpan Data
    public function simpanevaluasi($nomor_register,$periode,$id_pembimbing,$data)
    {
       $kedisiplinan  = json_encode($data['kedisiplinan']);
       $produktivitas = json_encode($data['produktivitas']);
       $rating        = json_encode($data['rating']);
       $budayalayanan = json_encode($data['budayalayanan']);
       $absensi       = json_encode($data['absensi']);

       $simpan= array(
                      "nomor_register"      =>$nomor_register,
                      "periode"             =>$periode,
                      "id_pembimbing"       =>$id_pembimbing,
                      "tanggal_dinilai"     =>date("Y-m-d"),
                      "kedisiplinan"        =>$kedisiplinan,
                      "produktivitas"       =>$produktivitas,
                      "rating"              =>$rating,
                      "budayalayanan"       =>$budayalayanan,
                      "absensi"             =>$absensi,
                      "kejujuran"           =>$data['kejujuran'],
                      "catatankhusus"       =>$data['catatankhusus'],
                      "kesimpulan"          =>$data['kesimpulan'],
                      "kekurangan"          =>$data['kekurangan'],
                      "cara_memperbaiki"    =>$data['cara_memperbaiki'],
                      "kesehatan"           =>$data['kesehatan'],
                      "keterangan_kesehatan"=>$data['keterangan_kesehatan'],
                      "rekomendasi"         =>$data['rekomendasi']
                    );
        $this->db->insert("evaluasiperiodik",$simpan);
        return $this->db->insert_id();
    }


    //========================== MONITORING PESERTA ====================================//
    public function ratingjelek10x($batch,$jenis,$limit){
         //Rating Jelek > 10X
         $data_rating= $this->db->query("SELECT
                                                nomor_register, kode_register, nama, unit_kerja, COUNT(`nilai`.`id`) as jumlah,
                                                 (SELECT COUNT(`nilai`.`id`) FROM nilai WHERE pegawai_id=view_peserta_magang.kode_register) as total
                                           FROM
                                                view_peserta_magang, nilai
                                           WHERE
                                                `view_peserta_magang`.`kode_register`=`nilai`.`pegawai_id`
                                           AND
                                                `nilai`.`nilai` < 3
                                           GROUP BY
                                                kode_register
                                           HAVING (COUNT(`nilai`.`id`)) > 10
                                           ")->result_array();
          return $data_rating;
   }

   public function ratingkurang($batch,$jenis,$limit){
        //Rating < 50
        $data_norating= $this->db->query("SELECT
                                                nomor_register, kode_register, nama, unit_kerja, COUNT(`nilai`.`id`) AS jumlah
                                           FROM
                                                view_peserta_magang, nilai
                                           WHERE
                                                `view_peserta_magang`.`kode_register`=`nilai`.`pegawai_id`
                                           GROUP BY
                                                kode_register
                                           HAVING (COUNT(`nilai`.`id`)) < 50
                                          ")->result_array();
         return $data_norating;
  }

  public function raporkurang50($batch,$jenis,$limit){
       //Nilai Rapor Jelek
      $data_rapor= $this->db->query("SELECT
                                              `summary_nilai`.`nomor_register`, kode_register, nama, unit_kerja, AVG(`total`) AS nilai
                                         FROM
                                              view_peserta_magang, summary_nilai
                                         WHERE
                                              `view_peserta_magang`.`nomor_register`=`summary_nilai`.`nomor_register`
                                         GROUP BY
                                              nomor_register
                                         HAVING (AVG(`total`)) < 50
                                        ")->result_array();
        return $data_rapor;
 }

    //MONITORING 2
    public function rangkingrapor($batch,$jenis,$limit){
         $batch= $this->db->get_where("batch_magang",array("id_batch"=>$batch))->row();
         $rangking= $this->db->query("SELECT
                                                 summary_nilai.nomor_register, kode_register, nama, unit_kerja, filefoto, tgl_masuk, AVG(total) AS nilai
                                            FROM
                                                 view_peserta_magang, summary_nilai
                                            WHERE
                                                 `view_peserta_magang`.`nomor_register`=`summary_nilai`.`nomor_register` AND
                                                 `view_peserta_magang`.`nomor_register` >= ".$batch->nomor_register_awal." AND
                                                 `view_peserta_magang`.`nomor_register` <= ".$batch->nomor_register_akhir."
                                            GROUP BY
                                                 nomor_register
                                            ORDER BY (AVG(`total`)) ".$jenis."
                                            Limit ".$limit
                                           )->result_array();
          return $rangking;
   }

   public function rangkingrating($batch,$jenis,$limit){
        $batch      = $this->db->get_where("batch_magang",array("id_batch"=>$batch))->row();
        $rangking   = $this->db->query("SELECT
                                                nomor_register, kode_register, nama, unit_kerja, filefoto, tgl_masuk, COUNT(`nilai`.`id`) AS nilai, AVG(`nilai`.`nilai`) as ratarata
                                           FROM
                                                view_peserta_magang, nilai
                                           WHERE
                                                `view_peserta_magang`.`kode_register`=`nilai`.`pegawai_id` AND
                                                `view_peserta_magang`.`nomor_register` >= ".$batch->nomor_register_awal." AND
                                                `view_peserta_magang`.`nomor_register` <= ".$batch->nomor_register_akhir."
                                           GROUP BY
                                                kode_register
                                           ORDER BY (COUNT(`nilai`.`id`)) ".$jenis."
                                           Limit ".$limit
                                          )->result_array();
         return $rangking;
  }
	//Get Periode Peserta
    public function periodepenilaiaantahun($tanggal_masuk,$periode)
    {
        if($periode==1){
            $start  = $tanggal_masuk;
            $end    = date('Y-m-d', strtotime('+12 month', strtotime($tanggal_masuk)));
            $kirim['start'] = $this->gmodel->formatTanggalID($tanggal_masuk);
            $kirim['end']   = $this->gmodel->formatTanggalID($end);
        }elseif($periode==2){
            $start  = date('Y-m-d', strtotime('+12 month', strtotime($tanggal_masuk)));
            $end    = date('Y-m-d', strtotime('+24 month', strtotime($tanggal_masuk)));
            $kirim['start'] = $this->gmodel->formatTanggalID($start);
            $kirim['end']   = $this->gmodel->formatTanggalID($end);
        }
        $kirim['mulai']= $start;
        $kirim['akhir']= $end;
        return $kirim;
    }
	//Ambil Absensi 1 tahun
    public function absensipesertaAll($nomor_register,$periode)
    {
      $data= $this->db->query("SELECT absen_status,count(absensi_id) as jumlah FROM absensi WHERE nomor_register=$nomor_register AND tanggal_absen >= '$periode[mulai]' AND tanggal_absen <= '$periode[akhir]' GROUP BY absen_status ")->result_array();
      $dataCuti= $this->db->query("SELECT count(nomor_register) as jumlah_cuti_terpakai FROM cuti_log WHERE nomor_register=$nomor_register AND tgl_mulai >= '$periode[mulai]' AND tgl_mulai <= '$periode[akhir]'")->row_array();
      $data_kirim= array();
      if(!empty($data)){
          foreach ($data as $value) {
            $data_kirim[$value['absen_status']]= $value['jumlah'];
          }
      }
      $data_kirim['CUTI TAHUNAN']=$dataCuti['jumlah_cuti_terpakai'];
      return $data_kirim;
    }
	//Ambil Nilai ALL
    public function nilaipesertaALL($nomor_register,$periode)
    {
      
      $data= $this->db->query("SELECT * FROM summary_nilai WHERE nomor_register=$nomor_register and minggu_ke NOT IN (0,38) ORDER BY minggu_ke ASC")->result_array();
      

      $sum=array('kedisiplinan' => 0, 'rating' => 0, 'budaya' => 0, 'produktivitas' => 0);
      $counter=count($data);
      foreach ($data as $key) {
        $sum['kedisiplinan']+=$key['kedisiplinan'];
        $sum['rating']+=$key['rating'];
        $sum['budaya']+=$key['budaya'];
        $sum['produktivitas']+=$key['produktivitas'];
        
        // $counter++;
      }
	  
      $sum['kedisiplinan']=number_format($sum['kedisiplinan']/$counter/20*100,0);
      $sum['rating']=number_format($sum['rating']/$counter/5*100,0);
      $sum['budaya']=number_format($sum['budaya']/$counter/40*100,0);
      $sum['produktivitas']=number_format($sum['produktivitas']/$counter/35*100,0);
      return $sum;
    }
	public function meanNilai(){
		$batchEvaluasiAktif=$this->db->query("SELECT * from batch_magang b where b.proses_evaluasi='aktif'")->row_array();
		if(empty($batchEvaluasiAktif)){
		  return null; 
		}
		$listPesertaMagang =$this->db->query("SELECT * from view_peserta_magang v where v.tgl_masuk='$batchEvaluasiAktif[tanggal]'")->result_array();
		$jumlahPeserta = count($listPesertaMagang);

		$queryJumlahMinggu = $this->db->query(" SELECT MAX(t.jml_minggu) AS max_jumlah_minggu FROM (SELECT nomor_register,
			  COUNT(nomor_register) AS jml_minggu FROM summary_nilai WHERE nomor_register IN (SELECT nomor_register FROM view_peserta_magang WHERE nomor_register <= $batchEvaluasiAktif[nomor_register_akhir] AND nomor_register >= $batchEvaluasiAktif[nomor_register_awal]) AND minggu_ke > 0 AND NOT minggu_ke = 38 
			   GROUP BY nomor_register) AS t")->row_array();
		$jumlahMinggu=$queryJumlahMinggu['max_jumlah_minggu'];
		
		return $this->db->query("  SELECT nomor_register,(SUM(kedisiplinan)/$jumlahMinggu/20*100/$jumlahPeserta) AS ked, (SUM(rating)/$jumlahMinggu/5*100/$jumlahPeserta) AS rat,(SUM(budaya)/$jumlahMinggu/40*100/$jumlahPeserta) AS bud,(SUM(produktivitas)/$jumlahMinggu/35*100/$jumlahPeserta) AS prod,COUNT(nomor_register) 
					  AS jml_minggu

					 FROM summary_nilai WHERE nomor_register IN (SELECT nomor_register FROM view_peserta_magang WHERE tgl_masuk='$batchEvaluasiAktif[tanggal]') AND minggu_ke > 0 AND NOT minggu_ke = 38  ")->row_array();
	}
	public function nilaibatch(){
		$batchEvaluasiAktif=$this->db->query("SELECT * from batch_magang b where b.proses_evaluasi='aktif'")->row_array();
		if(empty($batchEvaluasiAktif)){
		  return null; 
		}

		$listPesertaMagang =$this->db->query("SELECT * from view_peserta_magang v where v.tgl_masuk='$batchEvaluasiAktif[tanggal]'")->result_array();
		$jumlahPeserta = count($listPesertaMagang);

		$queryJumlahMinggu = $this->db->query(" SELECT MAX(t.jml_minggu) AS max_jumlah_minggu FROM (SELECT nomor_register,
			  COUNT(nomor_register) AS jml_minggu FROM summary_nilai WHERE nomor_register IN (SELECT nomor_register FROM view_peserta_magang WHERE nomor_register <= $batchEvaluasiAktif[nomor_register_akhir] AND nomor_register >= $batchEvaluasiAktif[nomor_register_awal]) AND minggu_ke > 0 AND NOT minggu_ke = 38 
			   GROUP BY nomor_register) AS t")->row_array();

		$jumlahMinggu=$queryJumlahMinggu['max_jumlah_minggu'];


		return $this->db->query("  SELECT nomor_register,(SUM(kedisiplinan)/$jumlahMinggu/20*100) AS ked, (SUM(rating)/$jumlahMinggu/5*100) AS rat,(SUM(budaya)/$jumlahMinggu/40*100) AS bud,(SUM(produktivitas)/$jumlahMinggu/35*100) AS prod,COUNT(nomor_register) AS jml_minggu FROM summary_nilai WHERE nomor_register IN (SELECT nomor_register FROM view_peserta_magang WHERE tgl_masuk='$batchEvaluasiAktif[tanggal]') AND minggu_ke > 0 AND NOT minggu_ke = 38  GROUP BY nomor_register")->result_array();
	}
}
