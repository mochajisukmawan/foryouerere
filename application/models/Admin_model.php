<?php
class Admin_model extends CI_Model{

	//Pembimbing
    function susunPertanyaan($nomor_register){
    	/*$data_evaluasi= $this->db->get_where("evaluasi_std_layanan",array("status" => "Aktif"))->result_array();
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
                                            evaluasi_penilaian_magang_detail.penilaian, 
                                            evaluasi_penilaian_magang_detail.tanggal 
                                       FROM 
                                            evaluasi_penilaiaan_magang_detail,evaluasi_penilaiaan_magang 
                                       WHERE 
                                            evaluasi_penilaiaan_magang_detail.id_penilaian=evaluasi_penilaiaan_magang.id_penilaian AND
                                            evaluasi_penilaiaan_magang_detail.id_pernyataan=$dz[id_pernyataan] AND 
                                            evaluasi_penilaiaan_magang.nomor_register=$nomor_register";
                                $data_kirim[$dt['keterangan']][$dx['deskripsi']][$dz['id_pernyataan']]['value']     = $this->db->query($sql)=>result_array();
							}
						}
					}
				}
			}
		return $data_kirim;
		}*/
        return $nomor_register;
    }


}
