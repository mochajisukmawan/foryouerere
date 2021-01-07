<div class="row">
	<div class="col-lg-12">
		<div class="hpanel">
			<div class="panel-body">
				<table class="table table-bordered">
					<tr>
						<td><h5>Nama Unit</h5></td>
						<td><h5><?=$datakredit->unit_area?></h5></td>
					</tr>
					<tr>
						<td><h5>Nama Debitur</h5></td>
						<td><h5><?=$datakredit->nama_nasabah?></h5></td>
					</tr>
					<tr>
						<td><h5>Usia</h5></td>
						<td><h5><?=$datakredit->usia?></h5></td>
					</tr>
					<tr>
						<td><h5>Alamat jaminan</h5></td>
						<td><h5><?=$tanahbangunan->alamat_jaminan?></h5></td>
					</tr>
					<tr>
						<td><h5>Plafon</h5></td>
						<td><h5><?=$tanahbangunan->nama_plafond?></h5></td>
					</tr>
					<tr>
						<td><h5>Nilai Pasar</h5></td>
						<td><h5><?=$tanahbangunan->total_market?></h5></td>
					</tr>
					<tr>
						<td><h5>jenis Jaminan</h5></td>
						<td><h5>Tanah dan Bangunan</h5></td>
					</tr>
					<tr>
						<td><h5>Bentuk Jaminan</h5></td>
						<td><h5><?=$tanahbangunan->nama_bb?></h5></td>
					</tr>
					<tr>
						<td><h5>Luas Tanah</h5></td>
						<td><h5><?=$tanahbangunan->luas_tanah_m2?></h5></td>
					</tr>
					<tr>
						<td><h5>Harga Tanah Per Meter</h5></td>
						<td><h5><?=$tanahbangunan->harga_tanah_m2?></h5></td>
					</tr>
					<tr>
						<td><h5>Nilai LTV</h5></td>
						<td><h5><?=$tanahbangunan->ltv?></h5></td>
					</tr>
				</table>
			</div>
		</div>
	</div>
</div>
