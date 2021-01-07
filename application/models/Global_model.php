<?php

class Global_model extends CI_Model{

    /**
     * Global_model::getBulan()
     *
     * @return
     */

     function encrypt_decrypt($action, $string) {
         $output = false;
         $encrypt_method = "AES-256-CBC";
         $secret_key = 'Candra Adi Nugroho';
         $secret_iv = 'NUGROHO ADI CANDRA';
         // hash
         $key = hash('sha256', $secret_key);

         // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
         $iv = substr(hash('sha256', $secret_iv), 0, 16);
         if ( $action == 'encrypt' ) {
             $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
             $output = base64_encode($output);
         } else if( $action == 'decrypt' ) {
             $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
         }
         return $output;
     }

     function terbilang($x){
      
          $abil = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
          if ($x < 12)
            return " " . $abil[$x];
          elseif ($x < 20)
            return $this->terbilang($x - 10) . " belas";
          elseif ($x < 100)
            return $this->terbilang($x / 10) . " puluh" . $this->terbilang($x % 10);
          elseif ($x < 200)
            return " seratus" . $this->terbilang($x - 100);
          elseif ($x < 1000)
            return $this->terbilang($x / 100) . " ratus" . $this->terbilang($x % 100);
          elseif ($x < 2000)
            return " seribu" . $this->terbilang($x - 1000);
          elseif ($x < 1000000)
            return $this->terbilang($x / 1000) . " ribu" . $this->terbilang($x % 1000);
          elseif ($x < 1000000000)
            return $this->terbilang($x / 1000000) . " juta" . $this->terbilang($x % 1000000);
        elseif($x < 1000000000000)
          return $this->terbilang($x / 1000000000) . " miliar" . $this->terbilang($x % 1000000000);
        }

     function get_next_year($tanggal_masuk){
       // $tanggalmasuk=date_format(date_create($tanggal_masuk),"Y-m-d");
       // $satutahun        = mktime(0,0,0,date("m"),date("d")-1,date("Y")+1);
       // $kembali           = date($tanggalmasuk, $satutahun);
       // return $kembali;
        $dt = new DateTime($tanggal_masuk);
        $dt->modify('+1 years');
        $dt->modify('-1 days');
        return $dt->format('Y-m-d');
     }

     function get_masa_kerja($tanggal_masuk,$tanggal_keluar){
       $datetime1 = date_create($tanggal_masuk);
       $datetime2 = date_create($tanggal_keluar);
       $interval = date_diff($datetime1, $datetime2);
       return $interval;
     }
     function get_peserta_keluar($year,$month){
         $q=$this->db->query("SELECT nomor_register,tanggal_persetujuan,unit_kerja_id FROM peserta_magang_keluar WHERE `status`=2 AND tgl_keluar LIKE ?;",array($year.'-'.$month.'%'))->result_array();
      return $q;
     }
    function getBulan($angka){
        if($angka == "01"){
          return "Januari";
      }elseif($angka == "02"){
          return "Februari";
      }elseif($angka == "03"){
          return "Maret";
      }elseif($angka == "04"){
          return "April";
      }elseif($angka == "05"){
          return "Mei";
      }elseif($angka == "06"){
          return "Juni";
      }elseif($angka == "07"){
          return "Juli";
      }elseif($angka == "08"){
          return "Agustus";
      }elseif($angka == "09"){
          return "September";
      }elseif($angka == "10"){
          return "Oktober";
      }elseif($angka == "11"){
          return "November";
      }elseif($angka == "12"){
          return "Desember";
      }else{
          return "";
      }
  }
  function getNextMonth($angka){
    if($angka == "01"){
        return "02";
    }elseif($angka == "02"){
        return "03";
    }elseif($angka == "03"){
        return "04";
    }elseif($angka == "04"){
        return "05";
    }elseif($angka == "05"){
        return "06";
    }elseif($angka == "06"){
        return "07";
    }elseif($angka == "07"){
        return "08";
    }elseif($angka == "08"){
        return "09";
    }elseif($angka == "09"){
        return "10";
    }elseif($angka == "10"){
        return "11";
    }elseif($angka == "11"){
        return "12";
    }elseif($angka == "12"){
        return "01";
    }else{
        return "";
    }
  }

  function getBulanPrev($angka){
      if($angka == "01"){
          return "12";
      }elseif($angka == "02"){
          return "01";
      }elseif($angka == "03"){
          return "02";
      }elseif($angka == "04"){
          return "03";
      }elseif($angka == "05"){
          return "04";
      }elseif($angka == "06"){
          return "05";
      }elseif($angka == "07"){
          return "06";
      }elseif($angka == "08"){
          return "07";
      }elseif($angka == "09"){
          return "08";
      }elseif($angka == "10"){
          return "09";
      }elseif($angka == "11"){
          return "10";
      }elseif($angka == "12"){
          return "11";
      }else{
          return "";
      }
  }
  function getTahunPrev($angka,$tahun){
      if($angka == "01"){
          return $tahun-1;
      }else{
          return $tahun;
      }
  }
  function getNextYear($angka,$tahun){
      if($angka == "12"){
          return $tahun+1;
      }else{
          return $tahun;
      }
  }

  /**
   * Global_model::getBulanBefore()
   *
   * @return
   */
  function getBulanBefore(){
      $bulan = date("m");
      $bulan = $bulan - 1;
      if($bulan == 0){
          $bulan = 12;
      }

      return $bulan;
  }

function getHari($date){
  $day 		= date('D', strtotime($date));
  $dayList 	= array(
    'Sun' => 'Minggu',
    'Mon' => 'Senin',
    'Tue' => 'Selasa',
    'Wed' => 'Rabu',
    'Thu' => 'Kamis',
    'Fri' => 'Jumat',
    'Sat' => 'Sabtu'
  );
return $dayList[$day];
}
    /**
     * Global_model::getUnitKerjaBelow()
     *
     * @return
     */
    function getUnitKerjaBelow($unit_kerja_id){
        $sql = "SELECT
                  uk.*
                FROM
                  unit_kerja uk
                WHERE uk.unit_kerja_induk = '$unit_kerja_id'
                  OR uk.unit_kerja_id = '$unit_kerja_id'
                  OR uk.unit_kerja_induk IN
                  (SELECT
                    unit_kerja_id
                  FROM
                    unit_kerja
                  WHERE unit_kerja_induk = '$unit_kerja_id')
                ORDER BY unit_kerja_nama";
        return $this->db->query($sql)->result_array();
    }

    function getUnitKerjaInduk($unit_kerja_id){
        $sql = "SELECT
                  induk
                FROM
                  organisasi_unit_kerja
                WHERE id = '$unit_kerja_id'";
        $tmp = $this->db->query($sql)->row_array();
        return $tmp['induk'];
    }

    /**
     * Global_model::getNamaBulanBefore()
     *
     * @return
     */
    function getNamaBulanBefore(){
        return $this->getBulan($this->getBulanBefore());
    }

    /**
     * Global_model::formatTanggalID()
     *
     * @return
     */
    function formatTanggalID($date){
    	$BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");

    	$tahun = substr($date, 0, 4);
    	$bulan = substr($date, 5, 2);
    	$tgl   = substr($date, 8, 2);

    	$result = $tgl . " " . $BulanIndo[(int)$bulan-1] . " ". $tahun;
    	return($result);
    }

    function getDataKredit($unit_kerja_id = NULL){
      if(!empty($unit_kerja_id)){
          $data= $this->db->get("datakredit")->result_array();
      }else{
          $data= $this->db->get_where("datakredit",array("unit_kerja_id" =>$unit_kerja_id))->result_array();
      }

      return $data;
    }
    function getRoPernyataan(){
      $data= $this->db->get("ro_screening_pernyataan")->result_array();

      return $data;
    }

    function getScreeningRo($dn_id){
      $dataReturn=array();
      $dataSupplier= $this->db->get_where("trackcheck_supplier",array("dn_id" =>$dn_id))->result_array();
      $dataTempatTinggal= $this->db->get_where("trackcheck_tempattinggal",array("dn_id" =>$dn_id))->result_array();
      $dataTempatUsaha= $this->db->get_where("trackcheck_tempatusaha",array("dn_id" =>$dn_id))->result_array();
      $dataScreening= $this->db->get_where("ro_screening",array("dn_id" =>$dn_id))->result_array();
      $dataHasilPernyataan= $this->db->select('*')
                    ->from('ro_screening_pernyataan_values')
                    ->join('ro_screening_pernyataan', 'ro_screening_pernyataan.rsp_id = ro_screening_pernyataan_values.rsp_id')
                    ->where('dn_id', $dn_id)
                  ->get()->result_array();
      $dataReturn['trackcheck_supplier']=$dataSupplier;
      $dataReturn['trackcheck_tempattinggal']=$dataTempatTinggal;
      $dataReturn['trackcheck_tempatusaha']=$dataTempatUsaha;
      $dataReturn['dataScreening']=$dataScreening;
      $dataReturn['dataHasilPernyataan']=$dataHasilPernyataan;
      return $dataReturn;
    }

    function getScreeningRoByPekerjaanID($pekerjaan_id){
      $dataReturn=array();
      $dataSupplier= $this->db->get_where("trackcheck_supplier",array("pekerjaan_id" =>$pekerjaan_id))->result_array();
      $dataTempatTinggal= $this->db->get_where("trackcheck_tempattinggal",array("pekerjaan_id" =>$pekerjaan_id))->result_array();
      $dataTempatUsaha= $this->db->get_where("trackcheck_tempatusaha",array("pekerjaan_id" =>$pekerjaan_id))->result_array();
      // $dataScreening= $this->db->get_where("ro_screening",array("pekerjaan_id" =>$pekerjaan_id))->result_array();
      $dataScreening= $this->db->select('*')
                    ->from('ro_screening')
                    ->join('status_tempat_usaha', 'ro_screening.stu_id = status_tempat_usaha.stu_id')
                    ->join('jenis_usaha', 'ro_screening.ju_id = jenis_usaha.ju_id')
                    ->where('pekerjaan_id', $pekerjaan_id)
                  ->get()->result_array();
      $dataHasilPernyataan= $this->db->select('*')
                    ->from('ro_screening_pernyataan_values')
                    ->join('ro_screening_pernyataan', 'ro_screening_pernyataan.rsp_id = ro_screening_pernyataan_values.rsp_id')
                    ->where('pekerjaan_id', $pekerjaan_id)
                  ->get()->result_array();
      $dataReturn['trackcheck_supplier']=$dataSupplier;
      $dataReturn['trackcheck_tempattinggal']=$dataTempatTinggal;
      $dataReturn['trackcheck_tempatusaha']=$dataTempatUsaha;
      $dataReturn['dataScreening']=$dataScreening;
      $dataReturn['dataHasilPernyataan']=$dataHasilPernyataan;
      return $dataReturn;
    }

    function getJumlahScreeningRoDilanjutkan($dn_id){
      
      $dataScreening= $this->db->get_where("ro_screening",array("dn_id" =>$dn_id, "hasil_kunjungan" => "Dilanjutkan"))->num_rows();
      
      return $dataScreening;
    }

    function getJumlahScreeningRoByDnID($dn_id){
      
      $dataScreening= $this->db->get_where("ro_screening",array("dn_id" =>$dn_id))->num_rows();
      
      return $dataScreening;
    }
    function getPekerjaanCadeb($dn_id){
      
      $dataPekerjaan= $this->db->select('*')
                    ->from('pekerjaan')
                    ->join('bidang_usaha', 'pekerjaan.bu_id = bidang_usaha.bu_id')
                    ->where('dn_id', $dn_id)
                  ->get()->result_array();
      
      $dataReturn=$dataPekerjaan;
      return $dataReturn;
    }
    function getPekerjaanCadebByPekerjaanID($pekerjaan_id){
      
      $dataPekerjaan= $this->db->select('*')
                    ->from('pekerjaan')
                    ->join('bidang_usaha', 'pekerjaan.bu_id = bidang_usaha.bu_id')
                    ->where('pekerjaan_id', $pekerjaan_id)
                  ->get()->row_array();
      
      $dataReturn=$dataPekerjaan;
      return $dataReturn;
    }
    
    function getAspekPemasaran(){
      
      $data= $this->db->get('aspek_pemasaran')->result_array();
      
      return $data;
    }
    function getLokasiUsaha(){
      
      $data= $this->db->get('lokasi_usaha')->result_array();
      
      return $data;
    }
    function getJenisUsaha(){
      
      $data= $this->db->get('jenis_usaha')->result_array();
      
      return $data;
    }
    function getJenisTempatUsaha(){
      
      $data= $this->db->get('jenis_tempat_usaha')->result_array();
      
      return $data;
    }
    function getHubungan(){
      
      $data= $this->db->get('hubungan')->result_array();
      
      return $data;
    }
    function getStatusTempatUsaha(){
      
      $data= $this->db->get('status_tempat_usaha')->result_array();
      
      return $data;
    }
    function getBidangUsaha(){
      
      $data= $this->db->get('bidang_usaha')->result_array();
      
      return $data;
    }

    /*************************  BERHUBUNGAN LKD 1 **********************/
    function getDataLKD1ByPekerjaanID($pekerjaan_id){
      
      $dataPekerjaan= $this->db->select('*')
                    ->from('lkd1')
                    ->join('bidang_usaha', 'lkd1.bu_id = bidang_usaha.bu_id')
                    ->join('jenis_tempat_usaha', 'lkd1.jtu_id = jenis_tempat_usaha.jtu_id')
                    ->join('aspek_pemasaran', 'lkd1.ap_id = aspek_pemasaran.ap_id')
                    ->join('lokasi_usaha', 'lkd1.lu_id = lokasi_usaha.lu_id')
                    ->join('jenis_usaha', 'lkd1.lu_id = jenis_usaha.ju_id')
                    ->join('hubungan', 'lkd1.hubungan_id = hubungan.hubungan_id')
                    ->join('status_tempat_usaha', 'lkd1.stu_id = status_tempat_usaha.stu_id')
                    ->where('lkd1.pekerjaan_id', $pekerjaan_id)
                  ->get()->row_array();
      
      $dataReturn=$dataPekerjaan;
      return $dataReturn;
    }

    function getDataLKD1ByDnID($dn_id){
      
      $dataPekerjaan= $this->db->select('*')
                    ->from('lkd1')
                    ->join('bidang_usaha', 'lkd1.bu_id = bidang_usaha.bu_id')
                    ->join('jenis_tempat_usaha', 'lkd1.jtu_id = jenis_tempat_usaha.jtu_id')
                    ->join('aspek_pemasaran', 'lkd1.ap_id = aspek_pemasaran.ap_id')
                    ->join('lokasi_usaha', 'lkd1.lu_id = lokasi_usaha.lu_id')
                    ->join('jenis_usaha', 'lkd1.lu_id = jenis_usaha.ju_id')
                    ->join('hubungan', 'lkd1.hubungan_id = hubungan.hubungan_id')
                    ->where('lkd1.dn_id', $dn_id)
                  ->get()->result_array();
      
      $dataReturn=$dataPekerjaan;
      return $dataReturn;
    }

    function getDataTop1LKD1ByDnID($dn_id){
      
      $dataPekerjaan= $this->db->select('*')
                    ->from('lkd1')
                    ->join('bidang_usaha', 'lkd1.bu_id = bidang_usaha.bu_id')
                    ->join('jenis_tempat_usaha', 'lkd1.jtu_id = jenis_tempat_usaha.jtu_id')
                    ->join('aspek_pemasaran', 'lkd1.ap_id = aspek_pemasaran.ap_id')
                    ->join('lokasi_usaha', 'lkd1.lu_id = lokasi_usaha.lu_id')
                    ->join('jenis_usaha', 'lkd1.lu_id = jenis_usaha.ju_id')
                    ->join('status_tempat_usaha', 'lkd1.stu_id = status_tempat_usaha.stu_id')
                    ->join('hubungan', 'lkd1.hubungan_id = hubungan.hubungan_id')
                    ->join('pekerjaan', 'lkd1.pekerjaan_id = pekerjaan.pekerjaan_id')
                    ->where('lkd1.dn_id', $dn_id)
                    ->order_by('lkd1_id', 'ASC')
                    ->limit(1)
                  ->get()->row_array();
      
      $dataReturn=$dataPekerjaan;
      return $dataReturn;
    }

    function getSumLKD1ByDnID($dn_id){
      
      $dataPekerjaan= $this->db->select('SUM(pendapatan_usaha) as sum_pendapatan_usaha,
                                          SUM(harga_pokok_penjualan) as sum_harga_pokok_penjualan,
                                          SUM(sewa) as sum_sewa,
                                          SUM(gaji) as sum_gaji,
                                          SUM(biaya_telpon_listrik_air) as sum_biaya_telpon_listrik_air,
                                          SUM(biaya_transportasi) as sum_biaya_transportasi,
                                          SUM(pengeluaran_lainnya) as sum_pengeluaran_lainnya,
                                          SUM(pengeluaran_usaha) as sum_pengeluaran_usaha,
                                          SUM(keuntungan_usaha) as sum_keuntungan_usaha,
                                          SUM(total_penghasilan) as sum_total_penghasilan,
                                          SUM(penghasilan_lainnya) as sum_penghasilan_lainnya,
                                          SUM(persediaan_inventory) as sum_persediaan_inventory,
                                          SUM(piutang_dagang) as sum_piutang_dagang,
                                          SUM(utang_dagang) as sum_utang_dagang,
                                          SUM(wi_neraca) as sum_wi_neraca,
                                          SUM(wi_normal) as sum_wi_normal,
                                          dn_id
                                          ')

                    ->from('lkd1')
                    
                    ->where('lkd1.dn_id', $dn_id)
                    ->group_by("dn_id")
                  ->get()->row_array();
      
      $dataReturn=$dataPekerjaan;
      return $dataReturn;
    }
    /*************************  BERHUBUNGAN LKD 2 **********************/
    function getDataLKD2ByPekerjaanID($pekerjaan_id){
      
      $dataPekerjaan= $this->db->select('*')
                    ->from('lkd2')
                    ->where('lkd2.pekerjaan_id', $pekerjaan_id)
                  ->get()->row_array();
      
      $dataReturn=$dataPekerjaan;
      return $dataReturn;
    }

    function getDataLKD2ByDnID($dn_id){
      
      $dataPekerjaan= $this->db->select('*')
                    ->from('lkd2')
                    ->where('lkd2.dn_id', $dn_id)
                  ->get()->row_array();
      
      $dataReturn=$dataPekerjaan;
      return $dataReturn;
    }

    /*************************  BERHUBUNGAN LKD 3  **********************/
    function getDataLKD3ByDnID($dn_id){
      
      $dataPekerjaan= $this->db->select('*')
                    ->from('lkd3')
                    ->where('dn_id', $dn_id)
                  ->get()->row_array();
      
      $dataReturn=$dataPekerjaan;
      return $dataReturn;
    }


    /*************************  BERHUBUNGAN Fasilitas Bank Jateng/Lain **********************/
    /**
    * Fasilitas Kredit Bank Jateng
    */
    function getFasilitasKreditBJ(){
      $dataPekerjaan= $this->db->select('*')
                    ->from('fasilitaskreditbj')
                  ->get()->result_array();
      
      $dataReturn=$dataPekerjaan;
      return $dataReturn;
    }

    function getFasilitasKreditBJByDnID($dn_id){
      $dataPekerjaan= $this->db->select('*')
                    ->from('fasilitaskreditbj')
                    ->where('dn_id', $dn_id)
                  ->get()->result_array();
      
      $dataReturn=$dataPekerjaan;
      return $dataReturn;
    }

    /**
    * Fasilitas Kredit Bank Lain
    */
    function getFasilitasKreditBL(){
      $dataPekerjaan= $this->db->select('*')
                    ->from('fasilitaskreditbl')
                  ->get()->result_array();
      
      $dataReturn=$dataPekerjaan;
      return $dataReturn;
    }

    function getFasilitasKreditBLByDnID($dn_id){
      $dataPekerjaan= $this->db->select('*')
                    ->from('fasilitaskreditbl')
                    ->join('status_fasilitas_bl', 'fasilitaskreditbl.status_fasilitas = status_fasilitas_bl.id_sfbl')
                    ->join('tujuan_pinjaman', 'fasilitaskreditbl.tujuan_pinjaman = tujuan_pinjaman.id_tp')
                    ->where('dn_id', $dn_id)
                  ->get()->result_array();
      
      $dataReturn=$dataPekerjaan;
      return $dataReturn;
    }

    

    function getAngsuranByDnID($dn_id){
      $data1= $this->db->select('SUM(plafon) as total')
                    ->from('fasilitaskreditbl')
                    ->where('dn_id', $dn_id)
                    ->group_by("dn_id")
                    ->get()->result_array();
      $data2= $this->db->select('SUM(plafon) as total')
                    ->from('fasilitaskreditbj')
                    ->where('dn_id', $dn_id)
                    ->where('status_fasilitas', '2')
                    ->group_by("dn_id")
                    ->get()->result_array();
      $num1=0;
      $num2=0;
      if(!empty($data1[0]['total'])){
        $num1=$data1[0]['total'];
      }
      if(!empty($data2[0]['total'])){
        $num2=$data2[0]['total'];
      }
      $dataReturn=$num1+$num2;
      return $dataReturn;
    }

    function getDataLaporanKeuanganByDnID($dn_id){
      
      $dataPekerjaan= $this->db->select('*')
                    ->from('laporan_keuangan')
                    ->where('dn_id', $dn_id)
                  ->get()->row_array();
      
      $dataReturn=$dataPekerjaan;
      return $dataReturn;
    }

    function getDataNeracaByDnID($dn_id){
      
      $dataPekerjaan= $this->db->select('*')
                    ->from('neraca')
                    ->where('dn_id', $dn_id)
                  ->get()->row_array();
      
      $dataReturn=$dataPekerjaan;
      return $dataReturn;
    }

    
    /*************************  BERHUBUNGAN CREDIT RISK SCORING  **********************/

    function getDataCrediRiskScoringByDnID($dn_id){
      
      $data= $this->db->select('*')
                    ->from('credit_risk_scoring')
                    ->join('ratio_kecukupan_agunan', 'credit_risk_scoring.ratio_kecukupan_agunan = ratio_kecukupan_agunan.rka_id')
                    ->join('jenis_kredit', 'credit_risk_scoring.jenis_kredit = jenis_kredit.jkredit_id')
                    ->join('jenis_produk', 'credit_risk_scoring.jenis_produk = jenis_produk.jproduk_id')
                    ->join('reputasi_usaha', 'credit_risk_scoring.reputasi_usaha = reputasi_usaha.rep_id')
                    ->join('profitability', 'credit_risk_scoring.profitability = profitability.profitability_id')
                    ->join('ketergantungan_thd_supplier', 'credit_risk_scoring.ketergantungan_supplier = ketergantungan_thd_supplier.kts_id')
                    ->join('ketergantungan_thd_pelanggan kb2', 'credit_risk_scoring.ketergantungan_pelanggan = kb2.ktpel_id')
                    ->join('jangka_waktu', 'credit_risk_scoring.jangka_waktu = jangka_waktu.jwaktu_id')
                    ->join('prospek_usaha', 'credit_risk_scoring.prospek_usaha = prospek_usaha.pu_id')
                    ->join('rpc_ratio_master', 'credit_risk_scoring.rpc_ratio = rpc_ratio_master.rpcrm_id')
                    ->join('wilayah_pemasaran', 'credit_risk_scoring.wilayah_pemasaran = wilayah_pemasaran.wp_id')
                    ->join('pengalaman_usaha', 'credit_risk_scoring.pengalaman_usaha = pengalaman_usaha.pengalaman_id')
                    ->join('current_ratio_master', 'credit_risk_scoring.current_ratio = current_ratio_master.crm_id')
                    ->join('riwayat_hubungan_bank', 'credit_risk_scoring.riwayat_hubungan_bank = riwayat_hubungan_bank.rhb_id')
                    ->where('dn_id', $dn_id)
                  ->get()->row_array();
      
      $dataReturn=$data;
      return $dataReturn;
    }
    /**
    * Get
    */
    function getCurrentRatioMaster(){
      $data= $this->db->select('*')
                    ->from('current_ratio_master')
                  ->get()->result_array();
      
      $dataReturn=$data;
      return $dataReturn;
    }


    /**
    * Get
    */
    function getProfitabilityMaster(){
      $data= $this->db->select('*')
                    ->from('profitability')
                  ->get()->result_array();
      
      $dataReturn=$data;
      return $dataReturn;
    }

    /**
    * Get
    */
    function getReputasiUsahaMaster(){
      $data= $this->db->select('*')
                    ->from('reputasi_usaha')
                  ->get()->result_array();
      
      $dataReturn=$data;
      return $dataReturn;
    }

    /**
    * Get
    */
    function getRPCRatioMaster(){
      $data= $this->db->select('*')
                    ->from('rpc_ratio_master')
                  ->get()->result_array();
      
      $dataReturn=$data;
      return $dataReturn;
    }

    /**
    * Get
    */
    function getProspekUsahaMaster(){
      $data= $this->db->select('*')
                    ->from('prospek_usaha')
                  ->get()->result_array();
      
      $dataReturn=$data;
      return $dataReturn;
    }

    /**
    * Get
    */
    function getKetergantunganBisnisMaster(){
      $data= $this->db->select('*')
                    ->from('ketergantungan_bisnis')
                  ->get()->result_array();
      
      $dataReturn=$data;
      return $dataReturn;
    }

    function getKetergantunganSupplier(){
      $data= $this->db->select('*')
                    ->from('ketergantungan_thd_supplier')
                  ->get()->result_array();
      
      $dataReturn=$data;
      return $dataReturn;
    }

    function getKetergantunganPelanggan(){
      $data= $this->db->select('*')
                    ->from('ketergantungan_thd_pelanggan')
                  ->get()->result_array();
      
      $dataReturn=$data;
      return $dataReturn;
    }
    /**
    * Get
    */
    function getWilayahPemasaranMaster(){
      $data= $this->db->select('*')
                    ->from('wilayah_pemasaran')
                  ->get()->result_array();
      
      $dataReturn=$data;
      return $dataReturn;
    }

    /**
    * Get
    */
    function getRiwayatHubunganBankMaster(){
      $data= $this->db->select('*')
                    ->from('riwayat_hubungan_bank')
                  ->get()->result_array();
      
      $dataReturn=$data;
      return $dataReturn;
    }

    /**
    * Get
    */
    function getJenisKreditMaster(){
      $data= $this->db->select('*')
                    ->from('jenis_kredit')
                  ->get()->result_array();
      
      $dataReturn=$data;
      return $dataReturn;
    }

    /**
    * Get
    */
    function getJenisProdukMaster(){
      $data= $this->db->select('*')
                    ->from('jenis_produk')
                  ->get()->result_array();
      
      $dataReturn=$data;
      return $dataReturn;
    }

    /**
    * Get
    */
    function getRatioKecukupanMaster(){
      $data= $this->db->select('*')
                    ->from('ratio_kecukupan_agunan')
                  ->get()->result_array();
      
      $dataReturn=$data;
      return $dataReturn;
    }

    /**
    * Get
    */
    function getJangkaWaktuMaster(){
      $data= $this->db->select('*')
                    ->from('jangka_waktu')
                  ->get()->result_array();
      
      $dataReturn=$data;
      return $dataReturn;
    }

    function getPengalamanUsahaMaster(){
      $data= $this->db->select('*')
                    ->from('pengalaman_usaha')
                  ->get()->result_array();
      
      $dataReturn=$data;
      return $dataReturn;
    }

    function getCreditRiskBobot(){
      $data= $this->db->select('*')
                    ->from('credit_risk_bobot')
                  ->get()->result_array();
      $dataReturn=array();
      foreach ($data as $key => $value) {
        $dataReturn[preg_replace('/\s+/', '_', $value['cbobot_nama'])]=$value['cbobot_bobot'];
      }
      // $dataReturn=$data;
      return $dataReturn;
    }
    function getCreditRiskSubBobot(){
      $data= $this->db->select('*')
                    ->from('credit_risk_subbobot')
                  ->get()->result_array();
      $dataReturn=array();
      foreach ($data as $key => $value) {
        $dataReturn[$value['csub_index']]=$value['csub_bobot'];
      }
      // $dataReturn=$data;
      return $dataReturn;
    }
    /**************** BERHUBUNGAN JAMINAN  ******************/

    function getDataTanahBangunanByDnID($dn_id){
      $dataPekerjaan= $this->db->select('*')
                    ->from('tanahbangunan')
                    ->join('jenis_dokumen', 'tanahbangunan.jenis_dokumen = jenis_dokumen.id_jd')
                    ->where('dn_id', $dn_id)
                  ->get()->result_array();
      
      $dataReturn=$dataPekerjaan;
      return $dataReturn;
    }

    function getDataTanahKosongByDnID($dn_id){
      $dataPekerjaan= $this->db->select('*')
                    ->from('tanahkosong')
                    ->join('jenis_dokumen', 'tanahkosong.jenis_dokumen = jenis_dokumen.id_jd')
                    ->where('dn_id', $dn_id)
                  ->get()->result_array();
      
      $dataReturn=$dataPekerjaan;
      return $dataReturn;
    }

    function getDataKendaraanByDnID($dn_id){
      $dataPekerjaan= $this->db->select('*')
                    ->from('kendaraan')
                    
                    ->where('dn_id', $dn_id)
                  ->get()->result_array();
      
      $dataReturn=$dataPekerjaan;
      return $dataReturn;
    }

    function getDataKiosByDnID($dn_id){
      $dataPekerjaan= $this->db->select('*')
                    ->from('kios')
                    ->where('dn_id', $dn_id)
                  ->get()->result_array();
      
      $dataReturn=$dataPekerjaan;
      return $dataReturn;
    }

    function getDataDepositoByDnID($dn_id){
      $dataPekerjaan= $this->db->select('*')
                    ->from('deposito')
                    ->where('dn_id', $dn_id)
                  ->get()->result_array();
      
      $dataReturn=$dataPekerjaan;
      return $dataReturn;
    }
}
