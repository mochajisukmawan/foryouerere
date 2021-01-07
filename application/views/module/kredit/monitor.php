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
							<th>Nominal</th>
							<th>KTP</th>
							<th>Nominal</th>
							<th>Pilihan</th>
						</tr>
					</thead>
					<?php foreach($dataKredit as $key) :?>

					<?php endforeach; ?>
					<tbody>
						<tr>
							<td>A</td>
							<td>a</td>
							<td>b</td>
							<td>c</td>
							<td>
								<a href="<?=base_url()?>"><span class="badge badge-primary">Lihat Detail</span></a>
							</td>
						</tr>
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