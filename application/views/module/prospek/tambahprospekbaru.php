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
	<div class="col-lg-7">
		<div class="hpanel">
			<div class="panel-body">
					<form method="post" action="<?=base_url()?>user/tambahprospekpost" class="form-horizontal">
						<div class="form-group">
							<label class="col-sm-3 control-label">Nama Calon Debitur</label>
	                    	<div class="col-sm-9">
	                    		<input type="text" class="form-control" name="nama_cadeb" required="">
	                    	</div>
	                	</div>
	                	<div class="hr-line-dashed"></div>
	                	<div class="form-group">
							<label class="col-sm-3 control-label">Jenis Usaha</label>
	                    	<div class="col-sm-9">
	                    		<input type="text" class="form-control" name="jenis_usaha" required="">
	                    	</div>
	                	</div>
	                	<div class="hr-line-dashed"></div>
	                	<div class="form-group">
							<label class="col-sm-3 control-label">Alamat Usaha</label>
	                    	<div class="col-sm-9">
	                    		<textarea class="form-control" placeholder="Isi Alamat Usaha" rows="5" name="alamat_usaha" required=""></textarea>
	                    	</div>
	                	</div>
	                	<div class="hr-line-dashed"></div>
	                	<div class="form-group">
							<label class="col-sm-3 control-label"></label>
	                    	<div class="col-sm-9">
	                    		<button type="submit" class="btn btn-primary" onclick="return confirm('Kirim Data?');">Kirim Data</button>
	                    	</div>
	                	</div>
                	</form>
			</div>
		</div>
	</div>
</div>