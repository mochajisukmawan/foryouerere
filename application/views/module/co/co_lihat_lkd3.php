<?php 

?>

<div class="row">
	
        <?php 
        	if(!empty($_SESSION['msg'])){
        		echo "<div class='alert alert-success'>$_SESSION[msg] </div>";
        		unset($_SESSION['msg']);
        	}
            /*echo "<pre>";
            print_r($dataLkd3);
            echo "</pre>";*/
        ?>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="hpanel">
			<div class="panel-body">
				<table class="table table-bordered">
                    <tr>
                        <td>Nomor Aplikasi</td>
                        <td><?=$dataKredit['no_aplikasi']?></td>
                    </tr>
					<tr>
						<td>Nama Calon Debitur</td>
						<td><?=$dataKredit['nama_nasabah']?></td>
					</tr>
					<tr>
						<td>Alamat Rumah</td>
						<td><?=$dataKredit['alamat_ktp']?></td>
					</tr>
					<tr>
						<td>Alamat Usaha</td>
						<td><?=$dataKredit['alamat_usaha']?></td>
					</tr>
					<tr>
						<td>No Telp Rumah</td>
						<td><?=$dataKredit['telephone_pribadi']?></td>
					</tr>
					<tr>
						<td>No HP</td>
						<td><?=$dataKredit['no_hp_pribadi']?></td>
					</tr>
					
					
				</table>
			</div>
		</div>
	</div>
</div>
<form method="post" action="<?=base_url()?>user/lkd3post" class="form-horizontal">
    <input type="hidden" name="dn_id" value="<?=$dn_id?>">
    
    <div class="row">
        <div class="col-lg-12">
            <div class="hpanel">
                <div class="panel-heading hbuilt">
                    <div class="panel-tools">
                        <a class="showhide"><i class="fa fa-chevron-up"></i></a>
                    </div>
                    Input LKD 3
                </div>
                <div class="panel-body">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Latar Belakang Usaha</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="latar_belakang_usaha" required="" ><?=$dataLkd3['latar_belakang_usaha']?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Kondisi Usaha</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="kondisi_usaha" required="" ><?=$dataLkd3['kondisi_usaha']?></textarea>
                            </div>
                        </div>    
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Pesaing</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="pesaing" required="" ><?=$dataLkd3['pesaing']?></textarea>
                            </div>
                        </div>    
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Resiko Usaha</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="resiko_usaha" required="" ><?=$dataLkd3['resiko_usaha']?></textarea>
                            </div>
                        </div>    
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Upaya Mengatasi Resiko</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="upaya_mengatasi_resiko" required="" ><?=$dataLkd3['upaya_mengatasi_resiko']?></textarea>
                            </div>
                        </div>    
                    
                    
                    
                    
                </div>
            </div>
        </div>
        
    </div>
    
    


</form>

<script type="text/javascript">
    
</script>
