<?php
	class Zdwh_model extends CI_Model{
			public function __construct(){
				$this->load->database();
			}
			public function register($enc_password){
				//User data array
				$data = array(
					'email' => $this->input->post('email'),
					'username' => $this->input->post('username'),
					'password' => $enc_password,
					'status' => $this->input->post('status'),
					'cabang' => $this->input->post('cabang')

				);
				//Insert User
				return $this->db->insert('users',$data);
			}
			public function getDharmaPeserta($year=NULL,$month=NULL){
				$queryString="SELECT * FROM zdwh_dharma";
				if(!empty($year)){
					$queryString=$queryString." WHERE tahun='".$year."' AND bulan='".$month."'";
				}
				$queryString=$queryString." ORDER BY tahun,bulan,nama";
				$query=$this->db->query($queryString);
				return $query->result_array();
			}
			public function getDharmaPerBulan(){
				$queryString="SELECT * FROM zdwh_dharma_perbulan";
		
				$query=$this->db->query($queryString);
				return $query->result_array();
			}
			public function getDharmaPerJabatan(){
				$queryString="SELECT * FROM zdwh_dharma_perjabatan ";
				$queryString=$queryString." ORDER BY tahun,bulan,jabatan";
				$query=$this->db->query($queryString);
				return $query->result_array();
			}
			public function getCountDharmaJabatan(){
				$queryString="SELECT *,COUNT(jabatan) as jumlah_jabatan FROM zdwh_dharma_perjabatan GROUP BY tahun, bulan, jabatan";
				$queryString=$queryString." ORDER BY tahun,bulan,jabatan";
				$query=$this->db->query($queryString);
				return $query->result_array();
			}
			public function getDharmaPerUnitKerja($year=NULL,$month=NULL){
				$queryString="SELECT * FROM zdwh_dharma_perunit_kerja";
				if(!empty($year)){
					$queryString=$queryString." WHERE tahun='".$year."' AND bulan='".$month."'";
				}
				$queryString=$queryString." ORDER BY tahun,bulan,unit_kerja_id";
				$query=$this->db->query($queryString);
				return $query->result_array();
			}
			public function getDharmaPerWilayah($year=NULL,$month=NULL){
				$queryString="SELECT * FROM zdwh_dharma_perwilayah";
				if(!empty($year)){
					$queryString=$queryString." WHERE tahun='".$year."' AND bulan='".$month."'";
				}
				$queryString=$queryString." ORDER BY tahun,bulan,wilayah";
				$query=$this->db->query($queryString);
				return $query->result_array();
			}
			public function getWilayahPerTahunBulan(){
				$queryString="SELECT *,COUNT(wilayah) AS jumlah_wilayah FROM zdwh_dharma_perwilayah GROUP BY tahun,bulan ORDER BY tahun, bulan, wilayah";
				$query=$this->db->query($queryString);
				return $query->result_array();
			}
			public function getUnitKerja(){
				$queryString="SELECT * FROM unit_kerja";
		
				$query=$this->db->query($queryString);
				return $query->result_array();
			}
		}

?>