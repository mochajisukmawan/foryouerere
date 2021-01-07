<?php
	class Dokumen_generator_model extends CI_Model{
			public function __construct(){
				$this->load->database();
			}

			function generateRandomString($length = 10) {
		        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		        $charactersLength = strlen($characters);
		        $randomString = '';
		        for ($i = 0; $i < $length; $i++) {
		            $randomString .= $characters[rand(0, $charactersLength - 1)];
		        }
		        // echo $randomString;
		        return $randomString;
		    }
			public function terbilang($x){
      
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
			/**
			*	Surat2 Untuk magang
			*/
			public function getDetailPenempatan(){
				$queryString="SELECT pm.kode_register,pm.nama,pm.alamat,pm.jenis_kelamin,pm.tempat as tempat_lahir, pm.tgl_lahir,(SELECT k.nama_kota from sim_magang.kota k where pm.kabkota_id=k.id_kota) as nama_kota, uk.unit,pm.tgl_masuk FROM sim_magang.peserta_magang pm join sim_magang.pembimbing_magang_peserta pmp on pm.nomor_register=pmp.nomor_register join sim_magang.pembimbing_magang pbm on pmp.id_pembimbing_magang=pbm.id_pembimbing_magang join sim_magang.unit_kerja uk on pbm.unit_kerja_id=uk.kode_unit ";

				$query = $this->db->query($queryString);
				return $query->row_array();
			}
			/**
			*	For Penempatan
			*/
			public function getDetails($tanggal_masuk=null){
				$queryString="SELECT pm.tanggal_surat_pik,pm.tanggal_surat_penempatan,pm.surat_pik,pm.surat_penempatan,pm.kode_register,pm.nama,pm.alamat,pm.jenis_kelamin,pm.tempat as tempat_lahir, pm.tgl_lahir,(SELECT k.nama_kota from sim_magang.kota k where pm.kabkota_id=k.id_kota) as nama_kota, uk.unit,pm.tgl_masuk FROM sim_magang.peserta_magang pm join sim_magang.pembimbing_magang_peserta pmp on pm.nomor_register=pmp.nomor_register join sim_magang.pembimbing_magang pbm on pmp.id_pembimbing_magang=pbm.id_pembimbing_magang join sim_magang.unit_kerja uk on pbm.unit_kerja_id=uk.kode_unit";
                    // $queryString="SELECT * FROM peserta_magang pm ";
				if(!empty($tanggal_masuk)){

					$queryString=$queryString." WHERE pm.tgl_masuk='".$tanggal_masuk."'";
				}
				$queryString=$queryString." ORDER BY pm.nama";
				// echo $queryString;
				$query = $this->db->query($queryString);
				return $query->result_array();
			}
			/**
			*	For PIK
			*/
			public function getDetailsPIK($tanggal_masuk=null,$isperpanjang=NULL){
				
                $queryString="SELECT * FROM peserta_magang pm ";
				if(!empty($tanggal_masuk)){

					$queryString=$queryString." WHERE pm.tgl_masuk='".$tanggal_masuk."' and pm.nomor_register NOT IN (SELECT nomor_register from peserta_magang_keluar)";
				
				}
				if(!empty($isperpanjang)){

					$queryString=$queryString."  AND NOT pm.surat_pik_perpanjang IS NULL";
				}
				// echo $queryString;
				$query = $this->db->query($queryString);
				return $query->result_array();
			}

			// Auto update tanggal pik saat peserta akses halaman pik tahap lanjut
			public function autoupdatepiklanjutqrcode($nomor_register){
				include "libraries/qrcode/qrlib.php";
				ini_set('display_errors', 1);
				set_time_limit(90);

				$bulanStringIndo=array('Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
				$hariStringIndo=array('Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu');

			
				$details=$this->db->query("SELECT * FROM peserta_magang where nomor_register=$nomor_register")->result_array();
				$cekExist=$this->db->get_where('dokumen_elektronik',array('nomor_register' => $nomor_register,'tipe_dokumen' => 'perpanjang'))->row_array();

				$data['hariTanggalString']= $this->terbilang((int)date('d'));
				$data['tahunString']= $this->terbilang(date('Y'));
				$data['tahunAngka']= date('Y');
				$data['hari']= date("d-m-Y");
				$data['hariAngka']= date('d');
				$data['hariString']= $hariStringIndo[(int)date('N')-1];
				$data['bulanString']= $bulanStringIndo[(int)date('n')-1];
				
				$randomString=$this->generateRandomString();
		        $hashval =$this->gmodel->encrypt_decrypt('encrypt',$randomString);
		        // $outputFile="PIK_PERPANJANG_".$details[0]['kode_register'].".pdf";
		        $outputFile=$details[0]['kode_register']."-".$hashval.".pdf";
		        $tgl_pik=date("Y-m-d");
		        $update=false;
		        if(empty($cekExist)){
		        	die;
		        	
		        }else{
		        	$tgl_pik=$cekExist['tgl_surat_pik'];
		        	if($cekExist['peserta_setuju'] != 'Ya' ){
		        		$dataUpdate=array(
	                    
		                    "tgl_surat_pik" => date('Y-m-d'),
		                );
		                $where=array(
		                    'hashedstring' =>$cekExist['hashedstring'],
		                );
		                $this->db->update('dokumen_elektronik',$dataUpdate,$where);
		                $tgl_pik=date('Y-m-d');
		                $update=true;
		                // $tgl_pik='2020-06-10';
		        	}
		        	
		        	$hashval = $cekExist['hashedstring'];
		        	$outputFile=$details[0]['kode_register']."-".$hashval.".pdf";
		        	
		        }
		        
				$data['namabarcode']= $hashval;
				$data['dataSurat']=$this->db->get_where('dokumen_elektronik',array('nomor_register' => $nomor_register,'tipe_dokumen' => 'perpanjang'))->row_array();
				
				if($update==true){
					require_once('./assets/html2pdf/html2pdf.class.php');
					$pdf = new HTML2PDF('P','A4','en');
					$listFile=array();
					for($x=0;$x<count($details);$x++){
						ob_start();
						$data['detail_peserta']= $details[$x];

						$timestamp = strtotime($tgl_pik);
						
						
						
						$data['hariTanggalString']= $this->terbilang((int)date('d', $timestamp));
						$data['tahunString']= $this->terbilang(date('Y', $timestamp));
						$data['tahunAngka']= date('Y', $timestamp);
						$data['hari']= date('d-m-Y', $timestamp);
						$data['hariAngka']= date('d', $timestamp);
						$data['hariString']= $hariStringIndo[(int)date('N', $timestamp)-1];
						$data['bulanString']= $bulanStringIndo[(int)date('n', $timestamp)-1];

						
						$this->load->view('module/docTest/pik_perpanjang_qr',$data);
						
						// $this->load->view('docTest/testSuratPenempatanManual',$data);
						// $this->load->view('docTest/testwordManual',$data);
						$html = ob_get_contents();

						
			            
			            $pdf->setDefaultFont('times');
			            $pdf->WriteHTML($html);
			            ob_end_clean();

			           	array_push($listFile, $outputFile);
			        }
			        $pdf->Output("assets/file/digitaldoc/".$outputFile, 'F');
			        $pdf->Output("../eoffice/suratdigital/assets/filemagang/".$outputFile, 'F');
			        // $this->sendFilesMagang($listFile);
				}
				
			}

			public function sendFilesMagang($arrayVar){
			
				// FTP access parameters
				$host = '10.175.5.23';
				$usr = 'adminbjtg';
				$pwd = 'B4nkJ@t3ng';
				 
				
				/* echo "<pre>";
				print_r($arrayVar);
				echo "</pre>";die;*/
				// connect to FTP server (port 21)
				$conn_id = ftp_connect($host, 21) or die ("Cannot connect to host");
				 
				// send access parameters
				ftp_login($conn_id, $usr, $pwd) or die("Cannot login");
					 
				for($y=0;$y<count($arrayVar);$y++){
					// file to move:
					$local_file = './assets/file/digitaldoc/'.$arrayVar[$y];
					$ftp_path = '/eoffice.bankjateng.co.id/html/suratdigital/assets/filemagang/'.$arrayVar[$y];

					// turn on passive mode transfers (some servers need this)
					// ftp_pasv ($conn_id, true);
					 
					// perform file upload
					$upload = ftp_put($conn_id, $ftp_path, $local_file, FTP_ASCII);
					 
					// check upload status:
					// print (!$upload) ? 'Cannot upload' : 'Upload complete';
					// print "\n";
					 
					/*
					** Chmod the file (just as example)
					*/
					 
					// If you are using PHP4 then you need to use this code:
					// (because the "ftp_chmod" command is just available in PHP5+)
					if (!function_exists('ftp_chmod')) {
					   function ftp_chmod($ftp_stream, $mode, $filename){
					        return ftp_site($ftp_stream, sprintf('CHMOD %o %s', $mode, $filename));
					   }
					}
					 
					// try to chmod the new file to 666 (writeable)
					if (ftp_chmod($conn_id, 0755, $ftp_path) !== false) {
					    // print $ftp_path . " chmoded successfully to 755\n";
					} else {
					    // print "could not chmod $file\n";
					}
				}

				// close the FTP stream
				ftp_close($conn_id);
				// die;
			}
		}

?>
