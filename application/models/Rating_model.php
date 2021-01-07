<?php
	class Rating_model extends CI_Model{
			public function __construct(){
				$this->load->database();
			}
			public function getNilai($pembimbing_ID=NULL){
				$queryString="SELECT pegawai_id, nama,SUM(nilai) as nilai, DATE(tanggal) as date_only, tanggal, COUNT(pegawai_id) as jumlah_nasabah, count(case when nilai.nilai < 3 then 1 else null end) as freq_low FROM nilai join sim_magang.peserta_magang pm on nilai.pegawai_id=pm.kode_register GROUP BY date_only, pegawai_id";
				if($pembimbing_ID!=NULL){
					$queryString="SELECT pegawai_id, nama, SUM(nilai) as nilai, DATE(tanggal) as date_only, tanggal, COUNT(pegawai_id) as jumlah_nasabah, count(case when n.nilai < 3 then 1 else null end) as freq_low FROM nilai n join sim_magang.peserta_magang pm on n.pegawai_id=pm.kode_register join sim_magang.pembimbing_magang_peserta pmp on pm.nomor_register=pmp.nomor_register where pmp.aktif='1' AND pmp.id_pembimbing_magang='".$pembimbing_ID."' GROUP BY date_only, pegawai_id";
				}
				// $queryString="SELECT * FROM nilai ";
				$query=$this->db->query($queryString);
				return $query->result_array();
			}
			public function getNilaiBulan($pembimbing_ID=NULL){
				$queryString="SELECT pegawai_id, nama,SUM(nilai) as nilai, DATE(tanggal) as date_only, tanggal, COUNT(pegawai_id) as jumlah_nasabah, count(case when nilai.nilai < 3 then 1 else null end) as freq_low FROM nilai join sim_magang.peserta_magang pm on nilai.pegawai_id=pm.kode_register GROUP BY YEAR(date_only), MONTH(date_only),pegawai_id";
				if($pembimbing_ID!=NULL){
					$queryString="SELECT pegawai_id, nama, SUM(nilai) as nilai, DATE(tanggal) as date_only, tanggal, COUNT(pegawai_id) as jumlah_nasabah, count(case when n.nilai < 3 then 1 else null end) as freq_low FROM nilai n join sim_magang.peserta_magang pm on n.pegawai_id=pm.kode_register join sim_magang.pembimbing_magang_peserta pmp on pm.nomor_register=pmp.nomor_register where pmp.aktif='1' AND pmp.id_pembimbing_magang='".$pembimbing_ID."' GROUP BY YEAR(date_only), MONTH(date_only),pegawai_id";
				}
				$query=$this->db->query($queryString);
				return $query->result_array();
			}
			
			public function getSumNilai($pembimbing_ID=NULL){
				$queryString="SELECT pegawai_id, nama,SUM(nilai) as nilai, DATE(tanggal) as date_only, tanggal, COUNT(pegawai_id) as jumlah_nasabah FROM nilai join sim_magang.peserta_magang pm on nilai.pegawai_id=pm.kode_register GROUP BY pegawai_id";
				if($pembimbing_ID!=NULL){
					$queryString="SELECT pegawai_id, nama, SUM(nilai) as nilai, DATE(tanggal) as date_only, tanggal, 
				COUNT(pegawai_id) as jumlah_nasabah FROM nilai n join sim_magang.peserta_magang pm on
				n.pegawai_id=pm.kode_register join sim_magang.pembimbing_magang_peserta pmp on pm.nomor_register=pmp.nomor_register 
				where pmp.aktif='1' AND pmp.id_pembimbing_magang='".$pembimbing_ID."' GROUP BY pegawai_id";
				}
				$query=$this->db->query($queryString);
				return $query->result_array();
			}
			public function getSumNilaiBulan(){
				$queryString="SELECT pegawai_id, nama,SUM(nilai) as nilai, DATE(tanggal) as date_only, tanggal, COUNT(pegawai_id) as jumlah_nasabah FROM nilai join sim_magang.peserta_magang pm on nilai.pegawai_id=pm.kode_register GROUP BY  YEAR(date_only), MONTH(date_only),pegawai_id";
				// $queryString="SELECT * FROM nilai ";
				$query=$this->db->query($queryString);
				return $query->result_array();
			}
			public function getSumAll(){
				$queryString="SELECT pegawai_id, nama,SUM(nilai) as nilai, DATE(tanggal) as date_only, tanggal, COUNT(pegawai_id) as jumlah_nasabah FROM nilai join sim_magang.peserta_magang pm on nilai.pegawai_id=pm.kode_register ";
				// $queryString="SELECT * FROM nilai ";
				$query=$this->db->query($queryString);
				return $query->result_array();
			}
			/**
			*	Returns top 5 teller's with most frequent low scores
			*/
			public function getLowScoreAll(){
				$queryString="SELECT pegawai_id, nama, SUM(nilai) as nilai, MONTH(tanggal) as date_only, tanggal, COUNT(pegawai_id) as jumlah_nasabah FROM nilai n join sim_magang.peserta_magang pm on n.pegawai_id=pm.kode_register join sim_magang.pembimbing_magang_peserta pmp on pm.nomor_register=pmp.nomor_register where n.nilai < 3 GROUP BY date_only, pegawai_id ORDER BY jumlah_nasabah DESC LIMIT 5";
				// $queryString="SELECT * FROM nilai ";
				$query=$this->db->query($queryString);
				return $query->result_array();
			}
			public function getCountLowScoreAll(){
				$queryString="SELECT pegawai_id, nama FROM nilai n join sim_magang.peserta_magang pm on n.pegawai_id=pm.kode_register join sim_magang.pembimbing_magang_peserta pmp on pm.nomor_register=pmp.nomor_register where n.nilai < 3 ";
				// $queryString="SELECT * FROM nilai ";
				$query=$this->db->query($queryString);
				return $query->num_rows();
			}
			public function getLowScoreIndividual($id, $date){
				$queryString="SELECT pegawai_id, nama, SUM(nilai) as nilai, MONTH(tanggal) as date_only, tanggal, COUNT(pegawai_id) as jumlah_nasabah FROM nilai n join sim_magang.peserta_magang pm on n.pegawai_id=pm.kode_register join sim_magang.pembimbing_magang_peserta pmp on pm.nomor_register=pmp.nomor_register where n.nilai < 3 AND pegawai_id='".$id."' AND DATE(tanggal)='".$date."' GROUP BY date_only, pegawai_id ORDER BY jumlah_nasabah DESC LIMIT 5";
				// $queryString="SELECT * FROM nilai ";
				$query=$this->db->query($queryString);
				return $query->result_array();
			}
			public function getNilaiPerPembimbing(){
				$queryString="SELECT pegawai_id, nama, SUM(nilai) as nilai, DATE(tanggal) as date_only, tanggal, COUNT(pegawai_id) as jumlah_nasabah, count(case when n.nilai < 3 then 1 else null end) as freq_low FROM nilai n join sim_magang.peserta_magang pm on n.pegawai_id=pm.kode_register join sim_magang.pembimbing_magang_peserta pmp on pm.nomor_register=pmp.nomor_register where pmp.aktif='1' AND pmp.id_pembimbing_magang='".$_SESSION['eval_user_id']."' GROUP BY date_only, pegawai_id";
				// $queryString="SELECT * FROM nilai ";
				$query=$this->db->query($queryString);
				return $query->result_array();
			}
			public function getNilaiPerPembimbingBulan(){
				$queryString="SELECT pegawai_id, nama, SUM(nilai) as nilai, DATE(tanggal) as date_only, tanggal, COUNT(pegawai_id) as jumlah_nasabah, count(case when n.nilai < 3 then 1 else null end) as freq_low FROM nilai n join sim_magang.peserta_magang pm on n.pegawai_id=pm.kode_register join sim_magang.pembimbing_magang_peserta pmp on pm.nomor_register=pmp.nomor_register where pmp.`aktif`='1' AND pmp.id_pembimbing_magang='".$_SESSION['eval_user_id']."' GROUP BY YEAR(date_only), MONTH(date_only),pegawai_id";
				// $queryString="SELECT * FROM nilai ";
				$query=$this->db->query($queryString);
				return $query->result_array();
			}
			public function getSumNilaiPerPembimbing(){
				$queryString="SELECT pegawai_id, nama, SUM(nilai) as nilai, DATE(tanggal) as date_only, tanggal, 
				COUNT(pegawai_id) as jumlah_nasabah FROM nilai n join sim_magang.peserta_magang pm on
				n.pegawai_id=pm.kode_register join sim_magang.pembimbing_magang_peserta pmp on pm.nomor_register=pmp.nomor_register 
				where pmp.`aktif`='1' AND pmp.id_pembimbing_magang='".$_SESSION['eval_user_id']."' GROUP BY pegawai_id";
				// $queryString="SELECT * FROM nilai ";
				$query=$this->db->query($queryString);
				return $query->result_array();
			}
			public function getSumNilaiPerPembimbingBulan(){
				$queryString="SELECT pegawai_id, nama, SUM(nilai) as nilai, DATE(tanggal) as date_only, tanggal, 
				COUNT(pegawai_id) as jumlah_nasabah FROM nilai n join sim_magang.peserta_magang pm on
				n.pegawai_id=pm.kode_register join sim_magang.pembimbing_magang_peserta pmp on pm.nomor_register=pmp.nomor_register 
				where pmp.`aktif`='1' AND pmp.id_pembimbing_magang='".$_SESSION['eval_user_id']."' GROUP BY YEAR(date_only), MONTH(date_only),pegawai_id";
				// $queryString="SELECT * FROM nilai ";
				$query=$this->db->query($queryString);
				return $query->result_array();
			}
			public function getSumAllPerPembimbing(){
				$queryString="SELECT pegawai_id, nama, SUM(nilai) as nilai, DATE(tanggal) as date_only, tanggal, 
				COUNT(pegawai_id) as jumlah_nasabah FROM nilai n join sim_magang.peserta_magang pm on
				n.pegawai_id=pm.kode_register join sim_magang.pembimbing_magang_peserta pmp on pm.nomor_register=pmp.nomor_register 
				where pmp.id_pembimbing_magang='".$_SESSION['eval_user_id']."' ";
				// $queryString="SELECT * FROM nilai ";
				$query=$this->db->query($queryString);
				return $query->result_array();
			}
			/**
			*	Returns top 5 teller's with most frequent low scores
			*/
			public function getLowScorePerPembimbing(){
				$queryString="SELECT pegawai_id, nama, SUM(nilai) as nilai, MONTH(tanggal) as date_only, tanggal,
				COUNT(pegawai_id) as jumlah_nasabah FROM nilai n join sim_magang.peserta_magang pm on 
				n.pegawai_id=pm.kode_register join sim_magang.pembimbing_magang_peserta pmp on 
				pm.nomor_register=pmp.nomor_register where pmp.`aktif`='1' AND pmp.id_pembimbing_magang='".$_SESSION['eval_user_id']."' AND 
				n.nilai < 3 GROUP BY pegawai_id ORDER BY jumlah_nasabah DESC LIMIT 5";
				// $queryString="SELECT * FROM nilai ";
				$query=$this->db->query($queryString);
				return $query->result_array();
			}
			public function getCountLowScorePerPembimbing(){
				$queryString="SELECT pegawai_id, nama FROM nilai n join sim_magang.peserta_magang pm on n.pegawai_id=pm.kode_register join sim_magang.pembimbing_magang_peserta pmp on pm.nomor_register=pmp.nomor_register where pmp.`aktif`='1' AND pmp.id_pembimbing_magang='".$_SESSION['eval_user_id']."' AND n.nilai < 3 ";
				// $queryString="SELECT * FROM nilai ";
				$query=$this->db->query($queryString);
				return $query->num_rows();
			}
			public function getTotalScoreQuantity(){
				$queryString="SELECT pegawai_id FROM nilai";
				// $queryString="SELECT * FROM nilai ";
				$query=$this->db->query($queryString);
				return $query->num_rows();
			}
			public function getTotalScoreQuantityPerPembimbing(){
				$queryString="SELECT pegawai_id FROM nilai n join sim_magang.peserta_magang pm on n.pegawai_id=pm.kode_register join sim_magang.pembimbing_magang_peserta pmp on pm.nomor_register=pmp.nomor_register where pmp.`aktif`='1' AND pmp.id_pembimbing_magang='".$_SESSION['eval_user_id']."'";
				// $queryString="SELECT * FROM nilai ";
				$query=$this->db->query($queryString);
				return $query->num_rows();
			}
			
			public function insertScore($score){
				if($_SESSION['eval_logged_in']==null){
					redirect('users/login');
				}
				//User data array
				$data = array(
					'tanggal' => date('Y-m-d H:i:s'),
					'nilai' => $score,
					'pegawai_id' => $_SESSION['rating_kode_id'],

				);
				//Insert User
				return $this->db->insert('nilai',$data);
			}

			public function getRatingClicksByDate($tanggal){
				$queryString="SELECT *,COUNT(pegawai_id) AS jumlah_klik FROM nilai WHERE DATE(tanggal)='".$tanggal."' GROUP BY pegawai_id";
				//echo $queryString;
				$query=$this->db->query($queryString);
				return $query->result_array();
			}
			public function getListCabang(){
				$queryString="SELECT uk.kode_unit,uk.unit, pm.id_pembimbing_magang FROM unit_kerja uk JOIN pembimbing_magang pm on uk.kode_unit=pm.unit_kerja_id";
				// $queryString="SELECT * FROM nilai ";
				$query=$this->db->query($queryString);
				return $query->result_array();
			}
		}

?>