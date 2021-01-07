<?php 

?>
<div class="row">
	<div class="col-lg-12">
		<div class="hpanel">
			<div class="panel-body">
				<table class="table table-bordered">
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
					<tr>
						<td>Nama Telp Usaha</td>
						<td><?=$dataPekerjaan['telephone_usaha']?></td>
					</tr>
					<tr>
						<td>Jenis Usaha</td>
						<td><?=$dataRo['dataScreening'][0]['ju_nama']?></td>
					</tr>
					<tr>
						<td>Lama Usaha</td>
						<td><?=$dataRo['dataScreening'][0]['lama_usaha']?></td>
					</tr>
					<tr>
						<td>Status Tempat Usaha</td>
						<td><?=$dataRo['dataScreening'][0]['stu_nama']?></td>
					</tr>
				</table>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="hpanel">
			<div class="panel-body">
				<table class="table table-bordered">
					<?php foreach($dataRo['dataHasilPernyataan'] as $key):?>
						<tr>
							<td><?=$key['pernyataan']?></td>
							<td><?=$key['value']?></td>
						</tr>
					<?php endforeach;?>
				</table>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="hpanel">
			<div class="panel-heading hbuilt">
                <div class="panel-tools">
                    <a class="showhide"><i class="fa fa-chevron-up"></i></a>
                </div>
                Info Screening RO
            </div>
			<div class="panel-body">
				
				<table class="table table-bordered">
					<tr>
						<td>Tanggal Input</td>
						<td>Keterangan</td>
						<td>Hasil Kunjungan</td>
						
					</tr>
					<?php foreach($dataRo['dataScreening'] as $key):?>
						<tr>
							<td><?=$key['tgl_input_screening']?></td>
							<td><?=$key['keterangan']?></td>
							<td><?=$key['hasil_kunjungan']?></td>
							
						</tr>
					<?php endforeach;?>
				</table>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="hpanel">
			<div class="panel-heading hbuilt">
                <div class="panel-tools">
                    <a class="showhide"><i class="fa fa-chevron-up"></i></a>
                </div>
                Trackcheck Usaha
            </div>
			<div class="panel-body">
				
				<table class="table table-bordered">
					<tr>
						<td>Nama</td>
						<td>Pekerjaan</td>
						<td>No Telp/HP</td>
						<td>Hubungan Dengan Pemohon</td>
						<td>Keterangan Yang Didapat</td>
					</tr>
					<?php foreach($dataRo['trackcheck_supplier'] as $key):?>
						<tr>
							<td><?=$key['nama']?></td>
							<td><?=$key['pekerjaan']?></td>
							<td><?=$key['no_telp']?></td>
							<td><?=$key['hubungan_pemohon']?></td>
							<td><?=$key['ket_didapat']?></td>
						</tr>
					<?php endforeach;?>
				</table>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="hpanel">
			<div class="panel-heading hbuilt">
                <div class="panel-tools">
                    <a class="showhide"><i class="fa fa-chevron-up"></i></a>
                </div>
                Trackcheck Tempat Tinggal
            </div>
			<div class="panel-body">
				
				<table class="table table-bordered">
					<tr>
						<td>Nama</td>
						<td>Pekerjaan</td>
						<td>No Telp/HP</td>
						<td>Hubungan Dengan Pemohon</td>
						<td>Keterangan Yang Didapat</td>
					</tr>
					<?php foreach($dataRo['trackcheck_tempattinggal'] as $key):?>
						<tr>
							<td><?=$key['nama']?></td>
							<td><?=$key['pekerjaan']?></td>
							<td><?=$key['no_telp']?></td>
							<td><?=$key['hubungan_pemohon']?></td>
							<td><?=$key['ket_didapat']?></td>
						</tr>
					<?php endforeach;?>
				</table>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="hpanel">
			<div class="panel-heading hbuilt">
                <div class="panel-tools">
                    <a class="showhide"><i class="fa fa-chevron-up"></i></a>
                    <a class="closebox"><i class="fa fa-times"></i></a>
                </div>
                Trackcheck Tempat Usaha
            </div>
			<div class="panel-body">
				
				<table class="table table-bordered">
					<tr>
						<td>Nama</td>
						<td>Pekerjaan</td>
						<td>No Telp/HP</td>
						<td>Hubungan Dengan Pemohon</td>
						<td>Keterangan Yang Didapat</td>
					</tr>
					<?php foreach($dataRo['trackcheck_tempatusaha'] as $key):?>
						<tr>
							<td><?=$key['nama']?></td>
							<td><?=$key['pekerjaan']?></td>
							<td><?=$key['no_telp']?></td>
							<td><?=$key['hubungan_pemohon']?></td>
							<td><?=$key['ket_didapat']?></td>
						</tr>
					<?php endforeach;?>
				</table>
			</div>
		</div>
	</div>
</div>

<!-- <?php if($_SESSION['role']=='CO'): ?>
	<form method="post" action="<?=base_url()?>user/approveDataRo" class="form-horizontal">
	    <input type="hidden" name="dn_id" value="<?=$dn_id?>">
	    <input type="hidden" name="tujuan_jabatan" value="RO">
	    
	    <div class="row">
	        <div class="col-lg-12">
	            <div class="hpanel">
	                <div class="panel-heading hbuilt">
	                    <div class="panel-tools">
	                        <a class="showhide"><i class="fa fa-chevron-up"></i></a>
	                    </div>
	                    Informasi Tempat Usaha
	                </div>
	                <div class="panel-body">
	                        
	                        <div class="form-group">
	                            <label class="col-sm-3 control-label">Keputusan</label>
	                            <div class="col-sm-9">
	                                <select class="form-control" name="respon_co" required="">
	                                	<option value="Ya">Ya</option>
	                                	<option value="Revisi">Revisi</option>
	                                	<option value="Tidak">Tidak</option>
	                                </select>
	                            </div>
	                        </div>    
	                        <div class="form-group">
	                            <label class="col-sm-3 control-label">Keterangan</label>
	                            <div class="col-sm-9">
	                                <textarea class="form-control" name="keterangan" required=""></textarea>
	                            </div>
	                        </div>    
	                    
	                    
	                    
	                    
	                </div>
	            </div>
	        </div>
	        
	    </div>
	    
	    


	    <div class="form-group">
	    	<label class="col-sm-6 control-label"></label>
	    	<div class="col-sm-6">
	    		<button type="submit" class="btn btn-primary" onclick="return confirm('Kirim Respon?');">Kirim Respon</button>
	    	</div>
	    </div>
	</form>
<?php endif; ?> -->