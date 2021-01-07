<?php
$get=$this->db->query("select nomor_register,unit_kerja_id from view_peserta_magang")->result_array();
$sync_unit_kerja=$this->db->query("SELECT nomor_register,unit_kerja_id FROM
(SELECT nomor_register,unit_kerja_id,COUNT(0) AS jml FROM self_assessment WHERE dinilai='1' AND YEAR(tanggal) = ? AND DATE_FORMAT(tanggal,'%m') = ? GROUP BY nomor_register,unit_kerja_id ORDER BY jml DESC) a
GROUP BY nomor_register;",array($tahun,$bulan))->result();
$penambahan=$this->db->get_where("payroll_penambahan",array("tahun"=>$tahun,"bulan"=>$bulan))->result_array();
if(sizeof($penambahan)>0){
	$penambahan=array_column($penambahan,"nominal","nomor_register");
}
if(sizeof($get)>0){
  $gets=array_column($get,"nomor_register");
  $uk=array_column($get,"unit_kerja_id","nomor_register");
  $this->db->where("bulan",$bulan);
  $this->db->where("tahun",$tahun);
  $this->db->where_in("nomor_register",$gets);
	if(in_array($tahun."-".$bulan, array("2018-12","2019-01","2019-02","2019-03","2019-04"))){
		$uang_makan=$this->db->get("view_uang_makan_backup")->result();
	}else{
			$uang_makan=$this->db->get("view_uang_makan")->result();
	}
	//get lembur ot
	// $lembur = $this->db->query("SELECT nomor_register,SUM(uang_lembur) AS uang_lembur,COUNT(0) AS counter FROM uang_lembur WHERE DATE_FORMAT(tanggal,'%Y-%m')=? GROUP BY nomor_register;",array($tahun."-".$bulan))->result_array();
  //Karena Aturan OT Biaya Dari biaya pegawai lembur (cabang masing2)
  $lembur = $this->db->query("SELECT nomor_register,'0' AS uang_lembur,COUNT(0) AS counter FROM tanggal_lembur_ot WHERE DATE_FORMAT(tanggal,'%Y-%m')=? GROUP BY nomor_register;",array($tahun."-".$bulan))->result_array();
  // echo "A: ".$this->db->last_query();die;
	$lembur_ot = array();
	$lembur_ot_c = array();
	if(sizeof($lembur)>0){
		$lembur_ot = array_column($lembur,"uang_lembur","nomor_register");
		$lembur_ot_c = array_column($lembur,"counter","nomor_register");
	}
  $uang_makan=array_column($uang_makan,"absensi","nomor_register");
  foreach ($uang_makan as $key => $value) {
    $unit_kerja_id=$uk[$key];
    foreach ($sync_unit_kerja as $keys) {
      if($keys->nomor_register==$key){
        $unit_kerja_id=$keys->unit_kerja_id;
        break;
      }
    }
		// echo $lembur_ot_c[$key];
		// echo $lembur_ot[$key];
		$lembur_ot_counter=isset($lembur_ot_c[$key])?$lembur_ot_c[$key]:0;
		$lembur_ot_val=isset($lembur_ot[$key])?$lembur_ot[$key]:0;
		$uangmakanpeserta=(($value - $lembur_ot_counter) * 30000) + $lembur_ot_val;
		// echo $uangmakanpeserta;
		// echo (($value - $lembur_ot_counter) * 30000);
		if(isset($penambahan[$key])){$uangmakanpeserta+=$penambahan[$key];}
		$this->db->where("bulan",$bulan);
    $this->db->where("tahun",$tahun);
    $this->db->where("nomor_register",$key);
		$this->db->set('take_home_pay', '`pend_pokok`+`pend_tunj`+`pend_tunj_bpjs_kes`+'.$uangmakanpeserta, FALSE);
    $this->db->update("payroll",array("uang_makan"=>$uangmakanpeserta,"unit_kerja_id"=>$unit_kerja_id));
		// if($key==4){
		// 	die;
		// }
	}
}
if(in_array($tahun."-".$bulan, array("2018-12","2019-01","2019-02","2019-03","2019-04"))){
	$honor="pembimbing_honorarium";
	$nominal="nominal";
}else{
	$honor="honor_pembimbing";
	$nominal="honor";
}
$q=$this->db->query("SELECT
a.`kode_unit` as unit_kerja_id,
a.`kode_rak`,
a.`unit` as unit_kerja,
(SELECT count(unit_kerja_id) FROM payroll WHERE unit_kerja_id=a.`kode_unit` AND tahun = ? AND bulan=? AND nomor_register IN (SELECT nomor_register FROM peserta_magang)) AS jumlah_peserta,
(SELECT SUM(pend_pokok) FROM payroll WHERE unit_kerja_id=a.`kode_unit` AND tahun = ? AND bulan=? AND nomor_register IN (SELECT nomor_register FROM peserta_magang)) AS pend_pokok,
(SELECT SUM(pend_tunj) FROM payroll WHERE unit_kerja_id=a.`kode_unit` AND tahun = ? AND bulan=? AND nomor_register IN (SELECT nomor_register FROM peserta_magang)) AS pend_tunj,
(SELECT SUM(uang_makan) FROM payroll WHERE unit_kerja_id=a.`kode_unit` AND tahun = ? AND bulan=? AND nomor_register IN (SELECT nomor_register FROM peserta_magang)) AS uang_makan,
(SELECT SUM(pend_tunj_bpjs_ktn) FROM payroll WHERE unit_kerja_id=a.`kode_unit` AND tahun = ? AND bulan=? AND nomor_register IN (SELECT nomor_register FROM peserta_magang)) AS pend_tunj_bpjs_ktn,
(SELECT SUM(pend_tunj_bpjs_kes) FROM payroll WHERE unit_kerja_id=a.`kode_unit` AND tahun = ? AND bulan=? AND nomor_register IN (SELECT nomor_register FROM peserta_magang)) AS pend_tunj_bpjs_kes,
(SELECT SUM(take_home_pay) FROM payroll WHERE unit_kerja_id=a.`kode_unit` AND tahun = ? AND bulan=? AND nomor_register IN (SELECT nomor_register FROM peserta_magang)) AS take_home_pay,
(SELECT SUM($nominal) FROM $honor WHERE tahun=? AND bulan = ? AND unit_kerja_id = a.kode_unit) AS honor_pembimbing
FROM unit_kerja a;",array(
$tahun,$bulan,
$tahun,$bulan,
$tahun,$bulan,
$tahun,$bulan,
$tahun,$bulan,
$tahun,$bulan,
$tahun,$bulan,
$tahun,$bulan))->result();
$lembur=$this->db->query("SELECT unit_kerja_id,SUM(uang_lembur) AS uang_lembur, COUNT(0) AS counter FROM uang_lembur WHERE DATE_FORMAT(tanggal,'%Y-%m')=? GROUP BY unit_kerja_id;",array($tahun."-".$bulan))->result_array();
$thr=$this->db->query("SELECT unit_kerja_terakhir AS unit_kerja_id,SUM(nominal) AS nominal FROM pemberian_thr WHERE `status` = 1 AND DATE_FORMAT(tanggal_pemberian,'%Y-%m')=? GROUP BY unit_kerja_terakhir;",array($tahun."-".$bulan))->result_array();
$pakdin=$this->db->query("SELECT SUM(nominal) AS nominal,unit_kerja_id FROM pemberian_pakaian WHERE DATE_FORMAT(tanggal,'%Y-%m') = ? GROUP BY unit_kerja_id;",array($tahun."-".$bulan))->result_array();

?>
<div class="row">
  <div class="hpanel">
              <div class="panel-heading hbuilt">
                  <div class="panel-tools">
                      <a class="showhide"><i class="fa fa-chevron-up"></i></a>
                      <a class="closebox"><i class="fa fa-times"></i></a>
                  </div>
                  Rincian Biaya Peserta Magang Per Cabang
              </div>
              <div class="panel-body">
                  <div class="text-center m-b-md">
                      <h3>Rincian Biaya Magang Dharma</h3>
                      <p>Tahun <?=$tahun?>, Bulan <?=$this->gmodel->getBulan($bulan)?></p>
                      <br/>
                      <a href="<?=base_url()?>hak/export/payroll_percabang/?tahun=<?=$tahun?>&bulan=<?=$bulan?>" class="btn btn-primary btn-sm">Download Rincian Per Cabang</a>
                      <a href="<?=base_url()?>hak/export/payroll_peserta/?tahun=<?=$tahun?>&bulan=<?=$bulan?>" class="btn btn-info btn-sm">Download Rincian Peserta</a>
                      <a href="<?=base_url()?>hak/export/payroll_peserta_selesai/?tahun=<?=$tahun?>&bulan=<?=$bulan?>" class="btn btn-info btn-sm">Download Rincian Peserta Selesai</a>
                      <a href="<?=base_url()?>hak/export/payroll_peserta_keluar/?tahun=<?=$tahun?>&bulan=<?=$bulan?>" class="btn btn-danger btn-sm">Download Rincian Peserta Keluar</a>
                      <a href="<?=base_url()?>hak/export/payroll_pembimbing/?tahun=<?=$tahun?>&bulan=<?=$bulan?>" class="btn btn-success btn-sm">Download Rincian Pembimbing</a>
                      <br/>
                  </div>
                  <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <?php
										$invoice=array();
										 $this->db->where("bulan",$bulan);
										 $this->db->where("tahun",$tahun);
										 $this->db->delete("invoice");

										if(sizeof($lembur) > 0){
											$lembur_uk=array_column($lembur,"uang_lembur","unit_kerja_id");
											$lembur_c=array_column($lembur,"counter","unit_kerja_id");
										}
										if(sizeof($thr) > 0){
											$thr=array_column($thr,"nominal","unit_kerja_id");
										}
										if(sizeof($pakdin) > 0){
											$pakdin=array_column($pakdin,"nominal","unit_kerja_id");
										}
                      foreach ($q as $key) {
												$magangers_lembur_ot=sizeof($lembur)>0?isset($lembur_uk[$key->unit_kerja_id])?$lembur_uk[$key->unit_kerja_id]:0:0;
												$magangers_c=sizeof($lembur)>0?isset($lembur_c[$key->unit_kerja_id])?$lembur_c[$key->unit_kerja_id]:0:0;
												$magangers_thr=sizeof($thr)>0?isset($thr[$key->unit_kerja_id])?$thr[$key->unit_kerja_id]:0:0;
												$pakdins = sizeof($pakdin)>0?isset($pakdin[$key->unit_kerja_id])?$pakdin[$key->unit_kerja_id]:0:0;
												array_push($invoice,array(
													'unit_kerja_id'=>$key->unit_kerja_id,
													'bulan'=>$bulan,
													'tahun'=>$tahun,
                          'magangers_jml_real'=>$key->pend_pokok/2500000,
													'magangers_jml'=>$key->jumlah_peserta,
													'magangers_saku'=>$key->pend_pokok,
													'magangers_tunj'=>$key->pend_tunj,
													'magangers_bpjs_ktn'=>$key->pend_tunj_bpjs_ktn,
													'magangers_bpjs_kes'=>$key->pend_tunj_bpjs_kes,
													'magangers_uang_makan'=>($key->uang_makan - ($magangers_c*150000)),
													'magangers_lembur_ot'=>$magangers_lembur_ot,
													'magangers_thr'=>$magangers_thr,
													'honor_pembimbing'=>$key->honor_pembimbing,
													"magangers_pakdin"=>$pakdins
												));
                        ?>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="heading<?=$key->unit_kerja_id?>">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?=$key->unit_kerja_id?>" aria-expanded="false" aria-controls="collapse<?=$key->unit_kerja_id?>" class="collapsed">
                                        +&nbsp;<?=$key->unit_kerja?>&nbsp;#&nbsp;<span style="color:green;" class="pull-right"><b>Rp. <?=number_format($key->take_home_pay+$key->honor_pembimbing,2)?>&nbsp;</b></span>
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse<?=$key->unit_kerja_id?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading<?=$key->unit_kerja_id?>" aria-expanded="false" style="height: 0px;">
                                <div class="panel-body">
                                  <div class="table-responsive">
                                    <table class="table table-hover table-bordered table-striped">
                                        <tbody>
                                        <tr>
                                            <td>
                                                <a class="label label-success" onclick="toogling('nestpemb<?=$key->unit_kerja_id?>')">+ PEMBIMBING</a>
                                                <span style="color:green;" class="pull-right">Rp. <?=number_format($key->honor_pembimbing,2)?>&nbsp;</span>
                                                <table class="table table-hover table-bordered table-striped hide" id="nestpemb<?=$key->unit_kerja_id?>" data-type="pembimbing" data-unit-kerja-id="<?=$key->unit_kerja_id?>" data-toogle="0" style="margin-top:15px;">
                                                  <tbody></tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a class="label label-info" onclick="toogling('nestpes<?=$key->unit_kerja_id?>')">+ PESERTA MAGANG</a>
                                                <span style="color:green;" class="pull-right">Rp. <?=number_format($key->take_home_pay,2)?>&nbsp;</span>
                                                <table class="table table-hover table-bordered table-striped hide" id="nestpes<?=$key->unit_kerja_id?>" data-type="peserta" data-unit-kerja-id="<?=$key->unit_kerja_id?>" data-toogle="0" style="margin-top:15px;">
                                                  <tbody></tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                  </div>
                                </div>
                            </div>
                        </div>
                        <?php
                      }
											$this->db->insert_batch("invoice",$invoice);
                    ?>
                  </div>
              </div>
          </div>
</div>
<script>
function toogling(id){
  if($('#'+id).attr('data-toogle')=='0'){
    $.post("<?=base_url()?>hak/payroll_overview",{type:$('#'+id).attr('data-type'),unit_kerja_id:$('#'+id).attr('data-unit-kerja-id'),tahun:'<?=$tahun?>',bulan:'<?=$bulan?>'},function(data){
      $('#'+id).removeClass('hide');
      $('#'+id+' tbody').html();
      var temp="<tr><th>No Rekening</th><th>Nama</th><th>Take Home Pay</th></tr>";
      for(var x=0;x<data.length;x++){
        temp+="<tr><td>"+data[x].no_rekening+"</td><td>"+data[x].nama+"</td><td>"+data[x].take_home_pay+"</td></tr>";
      }
      $('#'+id+' tbody').html(temp);
      $('#'+id).attr('data-toogle',"1");
    });
  }else{
    $('#'+id).addClass('hide');
    $('#'+id).attr('data-toogle',"0");
  }
}
</script>
