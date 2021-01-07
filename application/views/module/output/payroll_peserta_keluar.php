<?php
header("Content-Type:   application/vnd.ms-excel; charset=utf-8");
header("Content-Disposition: attachment; filename=Export_excel_peserta_selesai.xls");  //File name extension was wrong
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Cache-Control: private",false);
?>
<?php
$q=$this->db->query("SELECT distinct
	b.`nomor_register`,
	(SELECT unit FROM unit_kerja WHERE kode_unit=a.`unit_kerja_id` LIMIT 1) AS unit_kerja,
	b.kode_register,
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
FROM payroll a JOIN peserta_magang b ON (a.`nomor_register`=b.`nomor_register` )  WHERE a.`verify`=1 AND a.`tahun`=? AND a.`bulan`=? AND a.nomor_register IN (SELECT pm.`nomor_register` FROM peserta_magang pm JOIN peserta_magang_keluar pmp on pm.nomor_register = pmp.nomor_register WHERE pm.`nomor_register` NOT IN (
                SELECT nomor_register FROM view_peserta_magang v) AND YEAR(pmp.`tgl_keluar`)='$tahun' AND MONTH(pmp.`tgl_keluar`)='$bulan') ORDER BY a.`unit_kerja_id` ASC;",array($tahun,$bulan))->result();
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
			<th class="tg-0lax">Nomor Register</th>
      <th class="tg-0lax">Nama Peserta</th>
			<th class="tg-0lax">No Rekening</th>
      <th class="tg-0lax">Cabang</th>
      <th class="tg-0lax">Uang Saku<br/><small>1</small></th>
      <th class="tg-0lax">TJ.Penampilan<br/><small>2</small></th>
      <th class="tg-0lax">Uang Makan<br/><small>3</small></th>
      <th class="tg-yofg">BPJS.TK<br/><small>4</small></th>
      <th class="tg-1o19">BPJS.KES<br/><small>5</small></th>
      <th class="tg-0lax">Pajak<br/><small>6</small></th>
      <th class="tg-0lax">Take Home Pay<br/><small>(1 + 2 + 3)</small></th>
    </tr>
  </thead>
  <tbody>
    <?php
    $x=0;
    foreach ($q as $key) {
      $x++;
      ?>
      <tr>
        <td><?=$x;?></td>
				<td><?=$key->kode_register;?></td>
        <td><?=$key->nama;?></td>
				<td><?=$key->no_rekening;?></td>
        <td><?=$key->unit_kerja;?></td>
        <td><?=$key->pend_pokok;?></td>
        <td><?=$key->pend_tunj;?></td>
        <td><?=$key->uang_makan;?></td>
        <td><?=$key->pend_tunj_bpjs_ktn;?></td>
        <td><?=$key->pend_tunj_bpjs_kes;?></td>
        <td><?=$key->pajak;?></td>
        <td><?=$key->take_home_pay;?></td>
      </tr>
      <?php
    }
    ?>
  </tbody>
</table>
