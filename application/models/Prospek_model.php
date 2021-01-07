<?php
	class Prospek_model extends CI_Model{
			public function __construct(){
				$this->load->database();
			}
			

			
			public function getJumlahProspekApproved($nip=NULL,$unit_kerja_id=NULL){
				$ignore = array('Ya','Tidak');
		        $data = $this->db->where_not_in('kesimpulan_pipeline' , $ignore)
		        				->get_where("datakredit",array("nip_so"=>$nip,"unit_kerja_id" => $unit_kerja_id,"otorisasi_pipeline" => "Ya"))->num_rows();

		        
		        return $data;
		    }
		    public function getJumlahProspekBelumApproved($nip=NULL,$unit_kerja_id=NULL){
		        if($nip==NULL && !empty($unit_kerja_id)){
		        	$data = $this->db->get_where("datakredit",array("unit_kerja_id" => $unit_kerja_id,"otorisasi_pipeline" => "Belum"))->num_rows();   
		        }elseif ($unit_kerja_id==NULL  && !empty($nip)) {
		        	$data = $this->db->get_where("datakredit",array("nip_so"=>$nip,"otorisasi_pipeline" => "Belum"))->num_rows();   
		        		        
		        }else{
		        	$data = $this->db->get_where("datakredit",array("nip_so"=>$nip,"unit_kerja_id" => $unit_kerja_id,"otorisasi_pipeline" => "Belum"))->num_rows();   
		        }
		        return $data;
		    }

		    public function getJumlahProspekTidakApproved($nip=NULL,$unit_kerja_id=NULL){
		        $data = $this->db->get_where("datakredit",array("nip_so"=>$nip,"unit_kerja_id" => $unit_kerja_id,"otorisasi_pipeline" => "Tidak"))->num_rows();       
		        return $data;
		    }
		    public function getJumlahHotProspek($nip=NULL,$unit_kerja_id=NULL){
		        $data = $this->db->get_where("datakredit",array("nip_so"=>$nip,"unit_kerja_id" => $unit_kerja_id,"kesimpulan_pipeline" => "Ya","updateform_flag"=>"Belum"))->num_rows();       
		        return $data;
		    }
		    public function getJumlahPengajuanWaiting($nip=NULL,$unit_kerja_id=NULL){
		        if($nip==NULL && !empty($unit_kerja_id)){
		        	$data = $this->db->get_where("datakredit",array("unit_kerja_id" => $unit_kerja_id,"kesimpulan_respon" => "Belum","kesimpulan_pipeline" => "Ya","updateform_flag"=>"Ya"))->num_rows();
		        }elseif ($unit_kerja_id==NULL  && !empty($nip) ){
		        	$data = $this->db->get_where("datakredit",array("nip_so"=>$nip,"kesimpulan_respon" => "Belum","kesimpulan_pipeline" => "Ya","updateform_flag"=>"Ya"))->num_rows();	 	       
		        }else{
		        	$data = $this->db->get_where("datakredit",array("nip_so"=>$nip,"unit_kerja_id" => $unit_kerja_id,"kesimpulan_respon" => "Belum","kesimpulan_pipeline" => "Ya","updateform_flag"=>"Ya"))->num_rows();  
		        }

		        return $data;
		    }

		    public function getJumlahPengajuanOnGoing($unit_kerja_id=NULL){
		        $data = $this->db->get_where("datakredit",array("unit_kerja_id" => $unit_kerja_id,"kesimpulan_respon" => "Belum","kesimpulan_pipeline" => "Ya","updateform_flag"=>"Ya","kesimpulan_respon" => "Belum"))->num_rows();
		        return $data;
		    }
		    public function getJumlahPengajuanDitolak($unit_kerja_id=NULL){
		        $data = $this->db->get_where("datakredit",array("unit_kerja_id" => $unit_kerja_id,"kesimpulan_respon" => "Belum","kesimpulan_pipeline" => "Ya","updateform_flag"=>"Ya","kesimpulan_respon" => "Tidak"))->num_rows();
		        return $data;
		    }
		    public function getJumlahPengajuanDiterima($unit_kerja_id=NULL){
		        $data = $this->db->get_where("datakredit",array("unit_kerja_id" => $unit_kerja_id,"kesimpulan_respon" => "Belum","kesimpulan_pipeline" => "Ya","updateform_flag"=>"Ya","kesimpulan_respon" => "Ya"))->num_rows();
		        return $data;
		    }
		    public function getJumlahDsar($nip=NULL,$unit_kerja_id=NULL){
		        $data= $this->db->select('*')
		        				->from('datakredit')
		        				->join('dsar', 'dsar.dn_id = datakredit.dn_id')
		        				->where('nip_so', $nip)
		        				->where('unit_kerja_id', $unit_kerja_id)
		        				->where('sudah_dikunjung ' , 'Belum')
			    				->get()->num_rows();
		        return $data;
		    }

		    public function getDataDsar($nip=NULL,$unit_kerja_id=NULL){
		        $data= $this->db->select('*')
		        				->from('datakredit')
		        				->join('dsar', 'dsar.dn_id = datakredit.dn_id')
		        				->where('nip_so', $nip)
		        				->where('unit_kerja_id', $unit_kerja_id)
		        				->where('sudah_dikunjung ' , 'Belum')
			    				->get()->result_array();
		        return $data;
		    }

		    public function getListProspekApproved($nip=NULL,$unit_kerja_id=NULL){
		        $data = $this->db->where('kesimpulan_pipeline != ' , 'Ya')
		        				 ->get_where("datakredit",array("nip_so"=>$nip,"unit_kerja_id" => $unit_kerja_id,"otorisasi_pipeline" => "Ya"))->result_array();

		        
		        return $data;
		    }

		    public function getListProspekBelumApproved($nip=NULL,$unit_kerja_id=NULL){
		        $data = $this->db->get_where("datakredit",array("nip_so"=>$nip,"unit_kerja_id" => $unit_kerja_id,"otorisasi_pipeline" => "Belum"))->result_array();       
		        return $data;
		    }

		    public function getListProspekTidakApproved($nip=NULL,$unit_kerja_id=NULL){
		        $data = $this->db->get_where("datakredit",array("nip_so"=>$nip,"unit_kerja_id" => $unit_kerja_id,"otorisasi_pipeline" => "Tidak"))->result_array();       
		        return $data;
		    }
		    public function getListHotProspek($nip=NULL,$unit_kerja_id=NULL){
		        $data = $this->db->get_where("datakredit",array("nip_so"=>$nip,"unit_kerja_id" => $unit_kerja_id,"kesimpulan_pipeline" => "Ya","updateform_flag"=>"Belum"))->result_array();       
		        return $data;
		    }

		    public function getRiwayatProspek($nip=NULL,$unit_kerja_id=NULL){
		        $data = $this->db->get_where("datakredit",array("nip_so"=>$nip,"unit_kerja_id" => $unit_kerja_id))->result_array();       
		        return $data;
		    }
		    public function getProspekByID($id=NULL){
		        $data = $this->db->get_where("datakredit",array("dn_id"=>$id))->row_array();       
		        return $data;
		    }
		    public function getProspekByIDLengkap($id=NULL){
		    	$dataPekerjaan= $this->db->select('*')
                    ->from('datakredit')
                    ->join('fasilitas', 'datakredit.jns_produk = fasilitas.id_fasilitas')
                    ->join('pendidikan', 'datakredit.pendidikan = pendidikan.id_pendidikan')
                    ->where('datakredit.dn_id', $id)
                  ->get()->row_array();
      
      			$dataReturn=$dataPekerjaan;
		        return $dataReturn;
		    }

		    public function getDSARByDnId($id=NULL){
		        $data = $this->db->get_where("dsar",array("dn_id"=>$id))->result_array();       
		        return $data;
		    }

	}

?>
