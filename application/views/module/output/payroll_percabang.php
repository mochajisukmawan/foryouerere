<?php
header("Content-Type:   application/vnd.ms-excel; charset=utf-8");
header("Content-Disposition: attachment; filename=Export_excel_percabang.xls");  //File name extension was wrong
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Cache-Control: private",false);
?>
<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
.tg .tg-yofg{background-color:#9aff99;text-align:left;vertical-align:top}
.tg .tg-1o19{background-color:#67fd9a;text-align:left;vertical-align:top}
.tg .tg-0lax{text-align:center;vertical-align:top}
</style>
<table class="tg">
  <thead>
    <tr>
      <th class="tg-0lax">No</th>
      <th class="tg-0lax">Cabang</th>
      <th class="tg-0lax">Kode Green</th>
      <th class="tg-0lax">Kode Rak</th>
      <th class="tg-0lax">Uang Saku<br/><small>1</small></th>
      <th class="tg-0lax">TJ.Penampilan<br/><small>2</small></th>
      <th class="tg-0lax">Uang Makan<br/><small>3</small></th>
      <th class="tg-yofg">BPJS.TK<br/><small>4</small></th>
      <th class="tg-1o19">BPJS.KES<br/><small>5</small></th>
      <th class="tg-0lax">Honor Pembimbing<br/><small>7</small></th>
      <th class="tg-0lax">Take Home Pay Magang<br/><small>(1 + 2 + 3)</small></th>
    </tr>
  </thead>
  <tbody>
    <?php
    $q=$this->db->query("SELECT
	a.`kode_green` as unit_kerja_id,
	a.`kode_rak`,
	a.`unit` as unit_kerja,
	(SELECT SUM(pend_pokok) FROM payroll WHERE unit_kerja_id=a.`kode_unit` AND tahun = ? AND bulan=? AND verify=1 AND nomor_register IN (SELECT nomor_register FROM peserta_magang)) AS pend_pokok,
	(SELECT SUM(pend_tunj) FROM payroll WHERE unit_kerja_id=a.`kode_unit` AND tahun = ? AND bulan=? AND verify=1 AND nomor_register IN (SELECT nomor_register FROM peserta_magang)) AS pend_tunj,
	(SELECT SUM(uang_makan) FROM payroll WHERE unit_kerja_id=a.`kode_unit` AND tahun = ? AND bulan=? AND verify=1 AND nomor_register IN (SELECT nomor_register FROM peserta_magang)) AS uang_makan,
	(SELECT SUM(pend_tunj_bpjs_ktn) FROM payroll WHERE unit_kerja_id=a.`kode_unit` AND tahun = ? AND bulan=? AND verify=1 AND nomor_register IN (SELECT nomor_register FROM peserta_magang)) AS pend_tunj_bpjs_ktn,
	(SELECT SUM(pend_tunj_bpjs_kes) FROM payroll WHERE unit_kerja_id=a.`kode_unit` AND tahun = ? AND bulan=? AND verify=1 AND nomor_register IN (SELECT nomor_register FROM peserta_magang)) AS pend_tunj_bpjs_kes,
	(SELECT SUM(take_home_pay) FROM payroll WHERE unit_kerja_id=a.`kode_unit` AND tahun = ? AND bulan=? AND verify=1 AND nomor_register IN (SELECT nomor_register FROM peserta_magang)) AS take_home_pay,
	(SELECT SUM(honor) FROM honor_pembimbing WHERE tahun=? AND bulan = ? AND unit_kerja_id = a.kode_unit) AS honor_pembimbing
FROM unit_kerja a;",array(
  $tahun,$bulan,
  $tahun,$bulan,
  $tahun,$bulan,
  $tahun,$bulan,
  $tahun,$bulan,
  $tahun,$bulan,
  $tahun,$bulan))->result();
if(sizeof($q)>0){
  $pend_pokok=array_column($q,"pend_pokok","unit_kerja_id");
  $pend_tunj=array_column($q,"pend_tunj","unit_kerja_id");
  $uang_makan=array_column($q,"uang_makan","unit_kerja_id");
  $pend_tunj_bpjs_ktn=array_column($q,"pend_tunj_bpjs_ktn","unit_kerja_id");
  $pend_tunj_bpjs_kes=array_column($q,"pend_tunj_bpjs_kes","unit_kerja_id");
  $pajak=array_column($q,"pajak","unit_kerja_id");
  $pajak=array_column($q,"honor_pembimbing","unit_kerja_id");
  $take_home_pay=array_column($q,"take_home_pay","unit_kerja_id");
}
    $x=0;
    foreach ($q as $key) {
      $x++;
      ?>
      <tr>
        <td><?=$x;?></td>
        <td><?=$key->unit_kerja;?></td>
        <td>'<?=$key->unit_kerja_id;?></td>
        <td><?=$key->kode_rak;?></td>
        <td><?=$key->pend_pokok;?></td>
        <td><?=$key->pend_tunj;?></td>
        <td><?=$key->uang_makan;?></td>
        <td><?=$key->pend_tunj_bpjs_ktn;?></td>
        <td><?=$key->pend_tunj_bpjs_kes;?></td>
        <td><?=$key->honor_pembimbing;?></td>
        <td><?=$key->take_home_pay;?></td>
      </tr>
      <?php
    }
    ?>
  </tbody>
</table>
