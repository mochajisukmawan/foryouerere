<?php 
	$nomor=1;
?>

<div class="row">
	<div class="col-lg=12">
		<div class="hpanel">
			<div class="panel-body">
				<table class="table table-bordered">
					<thead>
						<tr>
							<td>Nomor</td>
							<td>Tanggal</td>
							<td>Keterangan</td>
							<td>Status</td>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($dataDsar as $key) : ?>
							<tr>
								<td><?=$nomor++;?></td>
								<td><?=$key['tgl_dsar']?></td>
								<td><?=$key['keterangan']?></td>
								<td><?=$key['status_dsar']?></td>
								
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>