
	<div class="row">
	<?php 
	$no = 1	;
	foreach($usaha as $v_u){
	?>
		<div class="col-lg-12">
			<div class="hpanel">
				<div class="panel-body">
				<h5>Omset Usaha <?=$no?></h5>
					<table class="table table-bordered">
						<tr>
							<td>Tipe Pendapatan</td>
							<td><?=$v_u['tipe_pendapatan']?></td>
						</tr>
						<tr>
							<td>Nama Usaha</td>
							<td><?=$v_u['nama_usaha']?></td>
						</tr>
						<tr>
							<td>Alamat Usaha</td>
							<td><?=$v_u['alamat_usaha']?></td>
						</tr>
						<tr>
							<td>Bidang Usaha</td>
							<td><?=$v_u['bu_nama']?></td>
						</tr>
					</table>
					<input type="hidden" value="<?=$v_u['pekerjaan_id']?>" name="pekerjaan_id[]">
					<!-- <input class="form-control" type="file" name="omset_utama[]"> -->
					<a href="http://localhost/mikrokredit/user/uploadomset/<?=$this->gmodel->encrypt_decrypt("encrypt",$v_u['pekerjaan_id'])?>"><button class="badge btn-warning" type="button"> Upload File</button></a>
				</div>
			</div>
		</div>

	<?php
	$no++;
	}
	?>

	</div>

