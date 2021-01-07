<?php
?>


<div class="row">
	<div class="col-lg-12">
		<div class="hpanel">
			<div class="panel-body">
				<table id="datamonitor" class="table table-bordered table-responsive">
					<thead>
						<tr>
							<th>Nama Nasabah</th>
							<th>Jenis Usaha</th>
							<th>Alamat Usaha</th>
							<th>Action</th>
						</tr>
					</thead>

					<tbody>
                    <?php foreach($dataKredit->result() as $key) :?>
						<tr>
							<td><?=$key->nama_nasabah?></td>
							<td><?=$key->jenis_usaha?></td>
							<td><?=$key->alamat_usaha?></td>
							<td>
								<a href="<?=base_url('user_sementara/inputpengajuan/'.$key->dn_id.'')?>"><span class="badge badge-primary">input Form</span></a>
							</td>
						</tr>
                    <?php endforeach; ?>

					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>



<script src="<?=base_url(); ?>assets/vendor/datatables/media/js/jquery.dataTables.min.js"></script>
<script src="<?=base_url(); ?>assets/vendor/datatables_plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
<script src="<?=base_url();?>assets/vendor/datatables/export/dataTables.buttons.min.js"></script>
<script src="<?=base_url();?>assets/vendor/datatables/export/buttons.flash.min.js"></script>
<script src="<?=base_url();?>assets/vendor/datatables/export/jszip.min.js"></script>
<script src="<?=base_url();?>assets/vendor/datatables/export/pdfmake.min.js"></script>
<!-- <script src="<?=base_url();?>assets/vendor/datatables/export/vfs_fonts.js"></script> -->
<script src="<?=base_url();?>assets/vendor/datatables/export/buttons.html5.min.js"></script>
<script src="<?=base_url();?>assets/vendor/datatables/export/buttons.print.min.js"></script>

 <script >

     $(function () {

         // Initialize Example 2
        $('#datamonitor').dataTable(
        	{
                  "responsive": true,
                  "dom": 'Bfrtip',
                 "buttons": [
                     'pageLength','copy', 'csv', 'excel', 'print'
                     // , 'pdf'
                 ]
              }
        );
        $(".buttons-copy").addClass("btn btn-xs btn-info");
        $(".buttons-csv").addClass("btn btn-xs btn-warning");
        $(".buttons-excel").addClass("btn btn-xs btn-danger");
        // $(".buttons-pdf").addClass("btn btn-xs btn-secondary");
        $(".buttons-print").addClass("btn btn-xs btn-primary");
        $(".buttons-collection").addClass("btn btn-xs");
        $('#example3').dataTable();

     });

 </script>