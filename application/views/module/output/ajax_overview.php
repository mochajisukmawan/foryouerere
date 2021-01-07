<?php
header('Content-Type: application/json');
if($type=="peserta"){
  $q=$this->db->query("SELECT distinct
  	b.`nomor_register`,
  	b.`nama`,
  	b.no_rekening,
  	a.`bulan`,
  	a.`tahun`,
  	a.`pend_pokok`,
  	a.`pend_tunj`,
  	a.`pend_tunj_bpjs_ktn`,
  	a.`pend_tunj_bpjs_kes`,
  	a.`uang_makan`,
  	a.`pajak`,
  	a.`take_home_pay`
  FROM payroll a JOIN peserta_magang b ON (a.`nomor_register`=b.`nomor_register`) where a.`verify`=1 AND a.`tahun`=? AND a.`bulan`=? AND a.unit_kerja_id = ? ORDER BY a.`unit_kerja_id` ASC;",array($tahun,$bulan,$unit_kerja_id))->result();
  echo json_encode($q);
}else if($type=="pembimbing"){
  $q=$this->db->query("SELECT b.no_rekening,b.nama,a.honor as take_home_pay FROM honor_pembimbing a JOIN pembimbing_magang b ON a.`id_pembimbing_magang`=b.`id_pembimbing_magang` WHERE a.unit_kerja_id = ? and a.tahun = ? AND a.bulan = ?;",array($unit_kerja_id,$tahun,$bulan))->result();
  echo json_encode($q);
}
?>
