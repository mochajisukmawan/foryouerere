<?php
?>


<div class="row">
	<div class="col-lg-12">
		<div class="hpanel">
			<div class="panel-body">
				<table id="datamonitor" class="table table-bordered table-responsive">
					<thead>
						<tr>
							<th>No</th>
							<th>Jenis Agunan</th>
							<th>Jumlah Agunan</th>
							<th>Pilihan</th>
						</tr>
					</thead>

					<tbody>
						<tr>
							<td>1</td>
							<td>Tanah & Bangunan</td>
							<td><?=$tot_tanahbangunan?></td>
							<td>
								<a href="<?=base_url()?>user/tanahbangunan/<?=$dn_id?>"><span class="badge badge-primary">Lihat Detail</span></a>
							</td>
						</tr>
						<tr>
							<td>2</td>
							<td>Tanah Kosong/Sawah</td>
							<td><?=$tot_tanahkosong?></td>
							<td>
								<a href="<?=base_url()?>user/tanahkosong/<?=$dn_id?>"><span class="badge badge-primary">Lihat Detail</span></a>
							</td>
						</tr>
						<tr>
							<td>3</td>
							<td>Kios</td>
							<td><?=$tot_kios?></td>
							<td>
								<a href="<?=base_url()?>user/kios/<?=$dn_id?>"><span class="badge badge-primary">Lihat Detail</span></a>
							</td>
						</tr>
						<tr>
							<td>3</td>
							<td>Ruko</td>
							<td><?=$tot_kios?></td>
							<td>
								<a href="<?=base_url()?>user/ruko/<?=$dn_id?>"><span class="badge badge-primary">Lihat Detail</span></a>
							</td>
						</tr>
						<tr>
							<td>4</td>
							<td>Kendaraan</td>
							<td><?=$tot_kendaraan?></td>
							<td>
								<a href="<?=base_url()?>user/kendaraan/<?=$dn_id?>"><span class="badge badge-primary">Lihat Detail</span></a>
							</td>
						</tr>
						<tr>
							<td>5</td>
							<td>Deposito</td>
							<td><?=$tot_deposito?></td>
							<td>
							<a href="<?=base_url()?>user/deposito/<?=$dn_id?>"><span class="badge badge-primary">Lihat Detail</span></a>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>