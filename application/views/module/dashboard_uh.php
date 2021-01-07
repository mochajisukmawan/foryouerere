<?php
	/*if($_SESSION['eval_jenis']=='peserta'){
		redirect(base_url()."peserta/dashboard");
	}elseif($_SESSION['eval_jenis']=='pembimbing'){
		redirect(base_url()."pembimbing/dashboard");
	}elseif($_SESSION['eval_jenis']=='admin'){
        redirect(base_url()."admin/dashboard");
    }
*/
?>
<style>
.hpanel:hover {
  background-color: yellow;
}
</style>
<div class="row">
    <div class="col-lg-3">
        <div class="hpanel hbgblue">
            <div class="panel-body" style="background-color: rgba(0,155,152,1);">
                <div class="text-center" style="color: white;">
                     <b>JUMLAH PROSPEK WAITING</b><br>
                     <p class="text-big font-light"><a href="<?=base_url()?>user/otorisasipipeline"><?=$dataBelumApprovedProspek?></a></p>
                </div>
            </div>
        </div>
    </div>
    
</div>
<div class="row">
    <div class="col-lg-3">
        <div class="hpanel hbgblue">
            <div class="panel-body">
                <div class="text-center">
                     <b>PENGAJUAN ON GOING</b><br>
                     <p class="text-big font-light"><a href="<?=base_url()?>user/monitorpengajuan/"><?=$dataJumlahPengajuanOnGoing?></a></p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="hpanel">
            <div class="panel-body" style="background-color: rgba(0,0,152,1);">
                <div class="text-center" style="color: white;">
                     <b>PENGAJUAN DITOLAK</b>
                     <p class="text-big font-light"><a href="<?=base_url()?>user/monitorpengajuanditolak/" style="color: white;"><?=$dataJumlahPengajuanDitolak?></a></p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="hpanel hbgred">
            <div class="panel-body hbgred">
                <div class="text-center">
                    <b>PENGAJUAN DITERIMA</b>
                    <p class="text-big font-light"><a href="<?=base_url()?>user/monitorpengajuanditerima/"><?=$dataJumlahPengajuanDiterima?></a></p>
                </div>
            </div>
        </div>
    </div>
    
</div>