<?php
header("Content-Type:   application/vnd.ms-excel; charset=utf-8");
header("Content-Disposition: attachment; filename=Export_excel_pembimbing.xls");  //File name extension was wrong
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Cache-Control: private",false);
?>
<?php
$q=$this->db->query("SELECT * FROM honor_pembimbing a JOIN pembimbing_magang b ON a.`id_pembimbing_magang`=b.`id_pembimbing_magang` WHERE a.id_pembimbing_magang not in  (41) and a.tahun = ? AND a.bulan = ?;",array($tahun,$bulan))->result();
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
			<th class="tg-0lax">NIP</th>
      <th class="tg-0lax">Nama Pembimbing</th>
			<th class="tg-0lax">No Rekening</th>
			<th class="tg-0lax">Honorarium</th>
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
				<td><?=$key->nip;?></td>
        <td><?=$key->nama;?></td>
				<td><?=$key->no_rekening;?></td>
        <td><?=$key->honor;?></td>
      </tr>
      <?php
    }
    ?>
  </tbody>
</table>
