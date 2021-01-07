<?php 
	
	if(!empty($_POST)){
		
		$data=$this->db->query("SELECT p.`nomor_register`,p.`tahun`,
				(SELECT nama FROM peserta_magang pm WHERE pm.nomor_register=p.nomor_register) AS nama,
				(SELECT kode_register FROM peserta_magang pm WHERE pm.nomor_register=p.nomor_register) AS kode_register,
				SUM(p.`pend_pokok`) AS pend_pokok,
				SUM(p.`pend_tunj`) AS pend_tunj,
				SUM(p.`pend_tunj_bpjs_kes`) AS pend_tunj_bpjs_kes,
				SUM(p.`uang_makan`) AS uang_makan,
				SUM(p.`take_home_pay`) AS take_home_pay
				FROM payroll p JOIN peserta_magang pm on p.nomor_register = pm.nomor_register WHERE p.`tahun`=$_POST[tahun] AND YEAR(pm.tgl_masuk)<=$_POST[tahun] AND NOT pm.nomor_register=124 GROUP BY nomor_register")->result_array();
		
		
	}else{
		$data=array();
	}
	
?>
<style>
div.dataTables_filter {
     text-align: right;
}
div.dataTables_paginate{
     text-align: right;
}
</style>
<div class="row">
	<div class="col-lg-6">
		<div class="hpanel">
			<div class="panel-headings hbuilt">
				Form Filter
			</div>
			<div class="panel-body">
				<form action="" method="POST">
					<div class="form-group"><label class="col-sm-4 col-sm-offset-1 control-label">Tahun</label>
                       <div class="col-sm-6">
                       	<select class="form-control m-b" name="tahun">
                            <?php for($x=2019;$x<date('Y');$x++) : ?>
                            	<option value="<?=$x?>"><?=$x?></option>
                            <?php endfor; ?>
                       </select>
                       </div>
                   </div>
					<div class="form-group ">
	                   <div class="col-sm-3 col-md-offset-5">
	                       <button class="btn btn-info btn " type="submit">Cari</button>
	                   </div>
	               	</div>
				</form>
				
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="hpanel">
			<div class="panel-headings hbuilt">
				Daftar Payroll
			</div>
			<div class="panel-body">
				<table id="example2" class="table table-bordered table-hovered">
					<thead>
						<th>Kode Register</th>
						<th>Nama</th>
						<th>Uang Saku</th>
						<th>Uang Bantuan Seragam</th>
						<th>Uang Bantuan BPJS Kes</th>
						<th>Uang Makan</th>
						<th>Take home Pay Total</th>
					</thead>
					<tbody>
						<?php foreach($data as $key) : ?>
							<tr>
								<td><?=$key['kode_register']?></td>
								<td><?=$key['nama']?></td>
								<td><?=$key['pend_pokok']?></td>
								<td><?=$key['pend_tunj']?></td>
								<td><?=$key['pend_tunj_bpjs_kes']?></td>
								<td><?=$key['uang_makan']?></td>
								<td><?=$key['take_home_pay']?></td>
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


<script type="text/javascript">
	$(function () {

        // Initialize Example 1
        $('#example1').dataTable( {
            "ajax": 'api/datatables.json'
        });

        // Initialize Example 2
        $('#example2').dataTable(
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