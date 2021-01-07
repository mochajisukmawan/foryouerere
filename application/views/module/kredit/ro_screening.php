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
				Kewajiban RO Untuk Mengvalidasikan Data Prospek Yang Baru
			</div>
		</div>
	</div>
</div>
<form method="post" action="<?=base_url()?>user/roscreeningpost" class="form-horizontal">
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
                        <td>No Telp Rumah</td>
                        <td><?=$dataKredit['telephone_pribadi']?></td>
                    </tr>
                    <tr>
                        <td>No HP</td>
                        <td><?=$dataKredit['no_hp_pribadi']?></td>
                    </tr>
                    <tr>
						<td>Alamat Usaha</td>
						<td><?=$dataPekerjaan['alamat_usaha']?></td>
					</tr>
					
					<tr>
						<td>Nama Telp Usaha</td>
						<td><?=$dataPekerjaan['telephone_usaha']?></td>
					</tr>
					<tr>
						<td>Jenis Usaha</td>
						<td>
                            <select class="form-control" name="jenis_usaha">
                                <?php foreach($dataJenisUsaha as $key) : ?>
                                    <option value="<?=$key['ju_id']?>"><?=$key['ju_nama']?></option>
                                <?php endforeach; ?>
                            </select>                  
                        </td>
					</tr>
					
					<tr>
                        <td>Status Tempat Usaha</td>
                        <td>
                            <select class="form-control" name="status_tempat_usaha">
                                <?php foreach($dataStatusTempatUsaha as $key) : ?>
                                    <option value="<?=$key['stu_id']?>"><?=$key['stu_nama']?></option>
                                <?php endforeach; ?>
                            </select>
                        </td>
                    </tr>
				</table>
			</div>
		</div>
	</div>
</div>

    <input type="hidden" name="dn_id" value="<?=$dn_id?>">
	<input type="hidden" name="pekerjaan_id" value="<?=$pekerjaan_id?>">
    <div class="row">
    	<div class="col-lg-6">
    		<div class="hpanel">
    			<div class="panel-body">
                    <!-- <div class="form-group">
                        <label class="col-sm-3 control-label">Status Tempat Usaha</label>
                        <div class="col-sm-9">
                            <select class="form-control" name="status_tempat_usaha">
                                <?php foreach($dataStatusTempatUsaha as $key) :?>
                                    <option value="<?=$key['stu_id']?>"><?=$key['stu_nama']?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                    </div> -->
    				<div class="hr-line-dashed"></div>
                    <div class="form-group">
    					<label class="col-sm-3 control-label">Jangka Waktu Sewa (Bulan)</label>
                    	<div class="col-sm-9">
                    		<input type="text" class="form-control" name="jangka_waktu" required="">
                    	</div>
                	</div>
                	
                	<div class="form-group">
    					<label class="col-sm-3 control-label">Sisa Jangka Waktu Sewa (Bulan)</label>
                    	<div class="col-sm-9">
                    		<input type="text" class="form-control" name="sisa_jangka_waktu" required="">
                    	</div>
                	</div>
                	<div class="form-group">
                        <label class="col-sm-3 control-label">Lama Usaha (Tahun)</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" name="lama_usaha" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Lama Tinggal (Tahun)</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" name="lama_tinggal" required="">
                        </div>
                    </div>
                	
                	
    			</div>
    		</div>
    	</div>
    	<div class="col-lg-6">
    		<div class="hpanel">
    			<div class="panel-body">
    				<table class="tabel table-borderless" border="0" style="border-collapse: separate;border-spacing: 1em;">
    					<col width="20%">
    					<col>

    					<?php foreach($dataPernyataan as $key) :?>
    						<tr>
    							<td>
    								<?=$key['pernyataan']?>
    							</td>
    							<td>
    								<input type="text" class="form-control" name="<?=$key['rsp_id']?>" required="" placeholder="<?=$key['contoh_pengisian']?>">
    							</td>
    						</tr>
    						<!-- <div class="form-group">
    							<label class="col-sm-6 control-label"><?=$key['pernyataan']?></label>
    	                    	<div class="col-sm-6">
    	                    		<input type="text" class="form-control" name="$key['rsp_id']" required="">
    	                    	</div>
    	                	</div>
    	                	<div class="hr-line-dashed"></div> -->
    					<?php endforeach ;?>
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
                    Trackcheck Supplier
                </div>
                <div id="body1" class="panel-body">
                    <button type="button" class="btn btn-small " style="background-color: green;color: white;" onclick="tambahTrackCheckTS()">Tambah Trackcheck</button>
                    <button type="button" class="btn btn-small btn-danger" onclick="kurangTrackCheckTS(0)">Kurang Trackcheck</button>
                	<table id="table1_1" class="table table-borderless" border="0">
                		<col width="40%">
                		<col width="60%">
                		<tr>
                			<td>Nama</td>
                			<td><input type="text" class="form-control" name="ts_nama[]" required=""></td>
                		</tr>
                		<tr>
                			<td>Pekerjaan</td>
                			<td><input type="text" class="form-control" name="ts_pekerjaan[]" required=""></td>
                		</tr>
                		<tr>
                			<td>No Telp/HP</td>
                			<td><input type="text" class="form-control" name="ts_telphp[]" required=""></td>
                		</tr>
                		<tr>
                			<td>Hubungan Dengan Pemohon</td>
                			<td><input type="text" class="form-control" name="ts_hubungan[]" required=""></td>
                		</tr>
                		<tr>
                			<td>Keterangan yang Didapat</td>
                			<td><input type="text" class="form-control" name="ts_keterangan[]" required=""></td>
                		</tr>
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
                    Trackcheck Tempat Usaha
                </div>
                <div id="body2" class="panel-body">
                    <button type="button" class="btn btn-small " style="background-color: green;color: white;" onclick="tambahTrackCheckTU()">Tambah Trackcheck</button>
                    <button type="button" class="btn btn-small btn-danger" onclick="kurangTrackCheckTU(0)">Kurang Trackcheck</button>
                	<table id="table2_1" class="table table-borderless" border="0">
                		<col width="40%">
                		<col width="60%">
                		<tr>
                			<td>Nama</td>
                			<td><input type="text" class="form-control" name="ttu_nama[]" required=""></td>
                		</tr>
                		<tr>
                			<td>Pekerjaan</td>
                			<td><input type="text" class="form-control" name="ttu_pekerjaan[]" required=""></td>
                		</tr>
                		<tr>
                			<td>No Telp/HP</td>
                			<td><input type="text" class="form-control" name="ttu_telphp[]" required=""></td>
                		</tr>
                		<tr>
                			<td>Hubungan Dengan Pemohon</td>
                			<td><input type="text" class="form-control" name="ttu_hubungan[]" required=""></td>
                		</tr>
                		<tr>
                			<td>Keterangan yang Didapat</td>
                			<td><input type="text" class="form-control" name="ttu_keterangan[]" required=""></td>
                		</tr>
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
                <div id="body3" class="panel-body">
                    <button type="button" class="btn btn-small " style="background-color: green;color: white;" onclick="tambahTrackCheckTT()">Tambah Trackcheck</button>
                    <button type="button" class="btn btn-small btn-danger" onclick="kurangTrackCheckTT()">Kurang Trackcheck</button>
                	<table id="table3_1" class="table table-borderless" border="0">
                		<col width="40%">
                		<col width="60%">
                		<tr>
                			<td>Nama</td>
                			<td><input type="text" class="form-control" name="ttt_nama[]" required=""></td>
                		</tr>
                		<tr>
                			<td>Pekerjaan</td>
                			<td><input type="text" class="form-control" name="ttt_pekerjaan[]" required=""></td>
                		</tr>
                		<tr>
                			<td>No Telp/HP</td>
                			<td><input type="text" class="form-control" name="ttt_telphp[]" required=""></td>
                		</tr>
                		<tr>
                			<td>Hubungan Dengan Pemohon</td>
                			<td><input type="text" class="form-control" name="ttt_hubungan[]" required=""></td>
                		</tr>
                		<tr>
                			<td>Keterangan yang Didapat</td>
                			<td><input type="text" class="form-control" name="ttt_keterangan[]" required=""></td>
                		</tr>
                	</table>
                	
                </div>
    		</div>
    	</div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="hpanel">
                <div class="panel-body">
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Kesimpulan Hasil Kunjungan</label>
                        <div class="col-sm-9">
                            <select name="hasil_kunjungan" class="form-control">
                                <option value="Dilanjutkan">Dilanjutkan</option>
                                <option value="Pending">Pending</option>
                                <option value="Tolak">Tolak</option>
                                <option value="Revisi">Revisi</option>
                            </select>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Keterangan</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" placeholder="Isi Keterangan" rows="5" name="keterangan" required=""></textarea>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    
                    
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
    $('.summernote').summernote();
    function tambahTrackCheckTT(){
        
        
        var divTable = document.getElementById("body3"); //create new <div>
        
        // var table = document.getElementById("programkerja");
        var table = document.createElement('table');
        table.setAttribute('class',"table table-bordered");
        var row = table.insertRow();
        var row2 = table.insertRow();
        var row3 = table.insertRow();
        var row4 = table.insertRow();
        var row5 = table.insertRow();
        // row.setAttribute('class','tugas-subpokok');
        //row.setAttribute('class','sub-pokok');
        var cell1_1 = row.insertCell(0);
        var cell1_2 = row.insertCell(1);
        var cell2_1 = row2.insertCell(0);
        var cell2_2 = row2.insertCell(1);
        var cell3_1 = row3.insertCell(0);
        var cell3_2 = row3.insertCell(1);
        var cell4_1 = row4.insertCell(0);
        var cell4_2 = row4.insertCell(1);
        var cell5_1 = row5.insertCell(0);
        var cell5_2 = row5.insertCell(1);
        
        cell1_1.innerHTML = 'Nama';
        cell2_1.innerHTML = 'Pekerjaan';
        cell3_1.innerHTML = 'No Telp/HP';
        cell4_1.innerHTML = 'Hubungan Dengan Pemohon';
        cell5_1.innerHTML = 'Keterangan Yang Didapat';

        cell1_2.innerHTML = '<input type="text" class="form-control" name="ttt_nama[]" required="">';
        cell2_2.innerHTML = '<input type="text" class="form-control" name="ttt_pekerjaan[]" required="">';
        cell3_2.innerHTML = '<input type="text" class="form-control" name="ttt_telphp[]" required="">';
        cell4_2.innerHTML = '<input type="text" class="form-control" name="ttt_hubungan[]" required="">';
        cell5_2.innerHTML = '<input type="text" class="form-control" name="ttt_keterangan[]" required="">';
        var id = (divTable.getElementsByTagName('table').length)+1;
        table.setAttribute('id',"table3_" + id);
        divTable.appendChild(table);
        
        // indexRowJobDesc++;
    }

    function tambahTrackCheckTU(){
        
        
        var divTable = document.getElementById("body2"); //create new <div>
        
        // var table = document.getElementById("programkerja");
        var table = document.createElement('table');
        table.setAttribute('class',"table table-bordered");
        var row = table.insertRow();
        var row2 = table.insertRow();
        var row3 = table.insertRow();
        var row4 = table.insertRow();
        var row5 = table.insertRow();
        // row.setAttribute('class','tugas-subpokok');
        //row.setAttribute('class','sub-pokok');
        var cell1_1 = row.insertCell(0);
        var cell1_2 = row.insertCell(1);
        var cell2_1 = row2.insertCell(0);
        var cell2_2 = row2.insertCell(1);
        var cell3_1 = row3.insertCell(0);
        var cell3_2 = row3.insertCell(1);
        var cell4_1 = row4.insertCell(0);
        var cell4_2 = row4.insertCell(1);
        var cell5_1 = row5.insertCell(0);
        var cell5_2 = row5.insertCell(1);
        
        cell1_1.innerHTML = 'Nama';
        cell2_1.innerHTML = 'Pekerjaan';
        cell3_1.innerHTML = 'No Telp/HP';
        cell4_1.innerHTML = 'Hubungan Dengan Pemohon';
        cell5_1.innerHTML = 'Keterangan Yang Didapat';

        cell1_2.innerHTML = '<input type="text" class="form-control" name="ttu_nama[]" required="">';
        cell2_2.innerHTML = '<input type="text" class="form-control" name="ttu_pekerjaan[]" required="">';
        cell3_2.innerHTML = '<input type="text" class="form-control" name="ttu_telphp[]" required="">';
        cell4_2.innerHTML = '<input type="text" class="form-control" name="ttu_hubungan[]" required="">';
        cell5_2.innerHTML = '<input type="text" class="form-control" name="ttu_keterangan[]" required="">';
        var id = (divTable.getElementsByTagName('table').length)+1;
        table.setAttribute('id',"table1_" + id);
        divTable.appendChild(table);
        table.setAttribute('id',"table1_");
        // indexRowJobDesc++;
        $('.summernote').summernote();
    }
    function tambahTrackCheckTS(){
        
        
        var divTable = document.getElementById("body1"); //get <div>
        
        // var table = document.getElementById("programkerja");
        var table = document.createElement('table');
        table.setAttribute('class',"table table-bordered");
        var row = table.insertRow();
        var row2 = table.insertRow();
        var row3 = table.insertRow();
        var row4 = table.insertRow();
        var row5 = table.insertRow();
        // row.setAttribute('class','tugas-subpokok');
        //row.setAttribute('class','sub-pokok');
        var cell1_1 = row.insertCell(0);
        var cell1_2 = row.insertCell(1);
        var cell2_1 = row2.insertCell(0);
        var cell2_2 = row2.insertCell(1);
        var cell3_1 = row3.insertCell(0);
        var cell3_2 = row3.insertCell(1);
        var cell4_1 = row4.insertCell(0);
        var cell4_2 = row4.insertCell(1);
        var cell5_1 = row5.insertCell(0);
        var cell5_2 = row5.insertCell(1);
        
        cell1_1.innerHTML = 'Nama';
        cell2_1.innerHTML = 'Pekerjaan';
        cell3_1.innerHTML = 'No Telp/HP';
        cell4_1.innerHTML = 'Hubungan Dengan Pemohon';
        cell5_1.innerHTML = 'Keterangan Yang Didapat';

        cell1_2.innerHTML = '<input type="text" class="form-control" name="ts_nama[]" required="">';
        cell2_2.innerHTML = '<input type="text" class="form-control" name="ts_pekerjaan[]" required="">';
        cell3_2.innerHTML = '<input type="text" class="form-control" name="ts_telphp[]" required="">';
        cell4_2.innerHTML = '<input type="text" class="form-control" name="ts_hubungan[]" required="">';
        cell5_2.innerHTML = '<input type="text" class="form-control" name="ts_keterangan[]" required="">';
        var id = (divTable.getElementsByTagName('table').length)+1;
        table.setAttribute('id',"table2_" + id);
        divTable.appendChild(table);
    }
    function kurangTrackCheckTT(){
        var divTable = document.getElementById("body3"); //create new <div>
        var id = divTable.getElementsByTagName('table').length;
        $("#table3_"+id).remove();
    }
    function kurangTrackCheckTU(){
        var divTable = document.getElementById("body2"); //create new <div>
        var id = divTable.getElementsByTagName('table').length;
        $("#table1_"+id).remove();
    }
    function kurangTrackCheckTS(){
        var divTable = document.getElementById("body1"); //create new <div>
        var id = divTable.getElementsByTagName('table').length;
        $("#table2_"+id).remove();
    }
</script>
<!-- <?php
    
        foreach($css_files as $file): ?>
            <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
        <?php endforeach;
     ?>
<?php
    
        foreach($js_files as $file): ?>
            <script src="<?php echo $file; ?>"></script><?php
        endforeach;
     ?>
<?=$output?> -->

<!-- <?php
    
        foreach($css_files2 as $file): ?>
            <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
        <?php endforeach;
     ?>
<?php
    
        foreach($js_files2 as $file): ?>
            <script src="<?php echo $file; ?>"></script><?php
        endforeach;
     ?> -->
<!-- <?=$output2?> -->