<?php
if(isset($_POST['export'])){
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=data_payroll_Magang_dharma_periode_'.$_POST['periode'].'.csv');
$output = fopen('php://output', 'w');
  $bulan=$_POST['bulan'];
  $tahun=$_POST['tahun'];
    if($_POST['bulan']=='01'){$_POST['tahun']++;}
      $exp=$this->db->query("SELECT * FROM payroll a LEFT JOIN peserta_magang b ON a.`nomor_register`=b.`nomor_register` WHERE a.bulan = ? AND a.tahun = ? AND DATE_FORMAT(b.`tgl_masuk`,'%d') = ? and a.verify=1",array($bulan,$tahun,$_POST['periode']));
      $exp=$exp->result_array();
    foreach($exp as $x){
      $dibayarkan=($x['pend_pokok']+$x['pend_tunj']+$x['uang_makan'])-$x['pajak'];
      fputcsv($output,array('A',$x['kode_register'],$x['nama'],$x['no_rekening'],'IDR','K',round($dibayarkan,0),'Penghasilan Bulan '.$this->gmodel->getBulan($bulan).' '.$tahun,';'));
    }
  }
?>
