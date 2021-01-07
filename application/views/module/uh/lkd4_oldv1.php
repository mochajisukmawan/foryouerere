<?php 

?>

<div class="row">
	
        <?php 
        	if(!empty($_SESSION['msg'])){
        		echo "<div class='alert alert-success'>$_SESSION[msg] </div>";
        		unset($_SESSION['msg']);
        	}
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
    <input type="hidden" name="dn_id" value="<?=$dn_id_encrypt?>">
    
    <div class="row">
        <div class="col-lg-12">
            <div class="hpanel">
                <div class="panel-heading hbuilt">
                    <div class="panel-tools">
                        <a class="showhide"><i class="fa fa-chevron-up"></i></a>
                    </div>
                    Input LKD 4
                </div>
                <div class="panel-body">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Nama Orang Ditemui</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="nama_orang_ditemui">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Hubungan</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="hubungan">
                                    <?php foreach($dataHubungan as $key): ?>
                                        <option value="<?=$key['hubungan_id']?>"><?=$key['hubungan_nama']?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>    
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Lama Hubungan</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="lama_berhubungan" required=""></textarea>
                            </div>
                        </div>    
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Apakah Karakter Pemohon Baik?</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="karakter_pemohon">
                                    <option value="Ya">Ya</option>
                                    <option value="Tidak">Tidak</option>
                                    <option value="Tidak-tahu">Tidak-tahu</option>
                                </select>
                            </div>
                        </div>    
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Apakah Usaha Dikelola Dengan Baik?</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="pengelolaan_usaha">
                                    <option value="Ya">Ya</option>
                                    <option value="Tidak">Tidak</option>
                                    <option value="Tidak-tahu">Tidak-tahu</option>
                                </select>
                            </div>
                        </div>    
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Nomor Telephone / Handphone</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="no_telp">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Tujuan Kredit</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="tujuan_kredit">
                                    <?php foreach($dataTujuanPinjaman as $key): ?>
                                        <option value="<?=$key['id_tp']?>"><?=$key['nama_tp']?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div> 
                        
                    
                    
                </div>
            </div>
        </div>
        
    </div>
    
    <div class="row">
    <div class="col-lg-12">
        <div class="hpanel">
            <div class="panel-heading hbuilt" style="background-color: rgba(155,0,0,1);color: white;">
                <div class="panel-tools">
                    <a class="showhide"><i class="fa fa-chevron-up"></i></a>
                </div>
                Rekomendasi (Penjelasan)
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <textarea class="form-control" rows="8" name="penjelasan"></textarea>
                </div>
                
            </div>
        </div>
    </div>
    
</div>



    <div class="form-group">
    	<label class="col-sm-6 control-label"></label>
    	<div class="col-sm-6">
    		<button type="submit" class="btn btn-primary" onclick="return confirm('Kirim Data?');">Kirim Data</button>
    	</div>
    </div>
</form>

<script type="text/javascript">
    
</script>
