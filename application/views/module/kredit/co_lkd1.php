<?php 

?>

<div class="row">
	
        <?php 
        	if(!empty($_SESSION['msg'])){
        		echo "<div class='alert alert-success'>$_SESSION[msg] </div>";
        		unset($_SESSION['msg']);
        	}
            // print_r($dataAngsuran);
        ?>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="hpanel">
            <div class="panel-body">
                <table class="table table-bordered">
                    <tr>
                        <td>Nomor Aplikasi</td>
                        <td><?=$dataKredit['no_aplikasi']?></td>
                    </tr>
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
                    
                    
                    
                </table>
            </div>
        </div>
    </div>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="hpanel">
			<div class="panel-body">
				<object data="<?=base_url(); ?>assets/file/datakredit/omset/<?=$dataPekerjaan['pekerjaan_id']?>.pdf?<?=rand(1,32000)?>" type="application/pdf" width="100%" style="min-height: 500px;">
                        <!-- <object data="http://localhost/magang.bankjateng.co.id/assets/<?=$namafile?>" type="application/pdf" width="100%" style="min-height: 500px;"> -->
                        <!-- <object data="http://magang.bankjateng.co.id/assets/file/digitaldoc/<?=$namafile?>" type="application/pdf" width="100%" style="min-height: 500px;"> -->
                    <!-- <p>Your web browser doesn't have a PDF plugin.
                      Instead you can <a href="<?=base_url(); ?>assets/file/digitaldoc/<?=$piktahaplanjut['namafile']?>?<?=rand(1,32000)?>">click here to
                      download the PDF file.</a></p> -->
                </object>
			</div>
		</div>
	</div>
</div>
<form method="post" action="<?=base_url()?>user/lkd1post" class="form-horizontal">
    <input type="hidden" name="dn_id" value="<?=$dn_id?>">
	<input type="hidden" name="pekerjaan_id" value="<?=$pekerjaan_id?>">
    <div class="row">
    	<div class="col-lg-12">
    		<div class="hpanel">
    			<div class="panel-body">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Nama Orang yang Ditemui</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="orang_ditemui" required="">
                            </div>
                        </div>    
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Hubungan</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="hubungan">
                                    <?php foreach($dataHubungan as $key) : ?>
                                        <option value="<?=$key['hubungan_id']?>"><?=$key['hubungan_nama']?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>    
                    </div>
    				
                	
                	
                	
                	
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
                    Informasi Tempat Usaha
                </div>
                <div class="panel-body">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Nama Usaha</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="nama_usaha" required="" value="<?=$dataPekerjaan['nama_usaha']?>" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Bidang Usaha</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="bidang_usaha">
                                    <?php foreach($dataBidangUsaha as $key) : ?>
                                        <option value="<?=$key['bu_id']?>"><?=$key['bu_nama']?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>    
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Alamat Usaha</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="" required="" value="<?=$dataPekerjaan['alamat_usaha']?>" disabled>
                            </div>
                        </div>    
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Telepon/Fax</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="" required="" value="<?=$dataPekerjaan['telephone_usaha']?>" disabled>
                            </div>
                        </div>    
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Lama Di Usaha Ini</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="lama_usaha" required="">
                            </div>
                        </div>    
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Status Tempat Usaha</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="status_tempat_usaha">
                                    <?php foreach($dataStatusTempatUsaha as $key) : ?>
                                        <option value="<?=$key['stu_id']?>"><?=$key['stu_nama']?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Jenis Tempat Usaha</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="jenis_tempat_usaha">
                                    <?php foreach($dataJenisTempatUsaha as $key) : ?>
                                        <option value="<?=$key['jtu_id']?>"><?=$key['jtu_nama']?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>    
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Aspek Pemasaran</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="aspek_pemasaran">
                                    <?php foreach($dataAspekPemasaran as $key) : ?>
                                        <option value="<?=$key['ap_id']?>"><?=$key['ap_nama']?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>    
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Jenis Usaha</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="jenis_usaha">
                                    <?php foreach($dataJenisUsaha as $key) : ?>
                                        <option value="<?=$key['ju_id']?>"><?=$key['ju_nama']?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>    
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Lokasi Usaha</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="lokasi_usaha">
                                    <?php foreach($dataLokasiUsaha as $key) : ?>
                                        <option value="<?=$key['lu_id']?>"><?=$key['lu_nama']?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>    
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Jarak Lokasi Usaha ke UM</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="jarak_lokasi_usaha" required="">
                            </div>
                        </div>    
                    </div>
                    
                    
                    
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
                    Analisa Keuangan (per Bulan)
                </div>
                <div class="panel-body">
                    
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Gaji Pegawai</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control auto_numformat pengeluaran" name="gaji" required="">
                            </div>
                        </div>  
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Harga Pokok Penjualan</label>
                            <div class="col-sm-9">
                                <input id='harga_pokok_penjualan' type="text" class="form-control auto_numformat pengeluaran" name="harga_pokok_penjualan" required="">
                            </div>
                        </div>    
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Sewa Kontrak</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control auto_numformat pengeluaran" name="sewa_kontrak" required="">
                            </div>
                        </div>    
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Biaya Telpon/Air/Listrik</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control auto_numformat pengeluaran" name="biaya_telpon_listrik_air" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Transportasi</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control auto_numformat pengeluaran" name="biaya_transportasi" required="">
                            </div>
                        </div>  
                        
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Pengeluaran Lainnya</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control auto_numformat pengeluaran" name="pengeluaran_lainnya" required="">
                            </div>
                        </div> 
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Pengeluaran Usaha</label>
                            <div class="col-sm-9">
                                <input id="auto_pengeluaran" type="text" class="form-control auto_numformat" name="pengeluaran_usaha" required="" readonly="">
                            </div>
                        </div> 
                        
                        
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Pendapatan Usaha / Sales</label>
                            <div class="col-sm-9">
                                <input id="pendapatan_usaha" type="text" class="form-control auto_numformat pendapatan" name="pendapatan_usaha" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Penghasilan Lainnya</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control auto_numformat pendapatan" name="penghasilan_lainnya" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Angsuran Pinjaman Saat ini</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control auto_numformat" name="angsuran_pinjaman_saatini" value="<?=number_format($dataAngsuran,0,',','.')?>" required="" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Sisa Penghasilan</label>
                            <div class="col-sm-9">
                                <input id="sisa_penghasilan" type="text" class="form-control auto_numformat" name="sisa_penghasilan" required="" readonly="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Keuntungan Usaha</label>
                            <div class="col-sm-9">
                                <input id="keuntungan_usaha" type="text" class="form-control auto_numformat" name="keuntungan_usaha" required="" readonly="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Total Penghasilan</label>
                            <div class="col-sm-9">
                                <input id="total_penghasilan" type="text" class="form-control auto_numformat" name="total_penghasilan" required="" readonly="">
                            </div>
                        </div>
                    </div>
                    
                    
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
                    Analisa Kebutuhan Modal Kerja (per Bulan)
                </div>
                <div class="panel-body">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Persediaan/Inventory </label>
                            <div class="col-sm-9">
                                <input id="persediaan_inventory" type="text" class="form-control auto_numformat dohcalculate" name="persediaan_inventory" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Piutang Dagang </label>
                            <div class="col-sm-9">
                                <input id="piutang_dagang" type="text" class="form-control auto_numformat dohcalculate" name="piutang_dagang" required="">
                            </div>
                        </div>    
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Utang Dagang </label>
                            <div class="col-sm-9">
                                <input id="utang_dagang" type="text" class="form-control auto_numformat dohcalculate" name="utang_dagang" required="">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-sm-3 control-label">WI Neraca</label>
                            <div class="col-sm-9">
                                <input id="wi_neraca" type="text" class="form-control auto_numformat" name="wi_neraca" required="" readonly="">
                            </div>
                        </div>    
                        <div class="form-group">
                            <label class="col-sm-3 control-label">DOH Persediaan/Inventory </label>
                            <div class="col-sm-9">
                                <input id="doh_persediaan_inventory" type="text" class="form-control auto_numformat" name="doh_persediaan_inventory" required="" readonly="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">DOH Piutang Dagang </label>
                            <div class="col-sm-9">
                                <input id="doh_piutang_dagang" type="text" class="form-control auto_numformat" name="doh_piutang_dagang" required="" readonly="">
                            </div>
                        </div>    
                        <div class="form-group">
                            <label class="col-sm-3 control-label">DOH Utang Dagang </label>
                            <div class="col-sm-9">
                                <input id="doh_utang_dagang" type="text" class="form-control auto_numformat" name="doh_utang_dagang" required="" readonly="">
                            </div>
                        </div>    
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Gross Profit Margin</label>
                            <div class="col-sm-9">
                                <input id="gross_profit_margin" type="number" class="form-control auto_numformat" name="gross_profit_margin" required="" readonly="">
                            </div>
                        </div>   
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Perputaran Persediaan Barang</label>
                            <div class="col-sm-9">
                                <input id="perputaran_persediaan_dagang" type="text" class="form-control dohcalculate" name="perputaran_persediaan_dagang" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Perputaran Piutang Dagang</label>
                            <div class="col-sm-9">
                                <input id="perputaran_piutang_dagang" type="text" class="form-control dohcalculate" name="perputaran_piutang_dagang" required="">
                            </div>
                        </div>  
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Perputaran Utang Dagang</label>
                            <div class="col-sm-9">
                                <input id="perputaran_utang_dagang" type="text" class="form-control dohcalculate" name="perputaran_utang_dagang" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Kebutuhan Modal Kerja DOH </label>
                            <div class="col-sm-9">
                                <input id="kebutuhan_modal_kerja_doh" type="text" class="form-control" name="kebutuhan_modal_kerja_doh" required="" readonly="">
                            </div>
                        </div> 
                        <div class="form-group">
                            <label class="col-sm-3 control-label">WI Normal</label>
                            <div class="col-sm-9">
                                <input id="wi_normal" type="text" class="form-control" name="wi_normal" required="" readonly="">
                            </div>
                        </div> 
                        <div class="form-group">
                            <label class="col-sm-3 control-label"></label>
                            <div class="col-sm-9">
                                <button type="button" class="btn btn-warning" onclick="executeall();">Refresh Semua Perhitungan</button>
                            </div>
                        </div> 
                    </div>
                    
                    
                    
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
    function numberWithCommas(x) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    }
    function updateTotalPenghasilan(){
        var numPendapatanTotal = $("#keuntungan_usaha").val().split('.').join('');
    }

    function updateGrossProfit(){
        var num1 = parseInt($("#pendapatan_usaha").val().split('.').join(''));
        var num2 = parseInt($("#harga_pokok_penjualan").val().split('.').join(''));

        var calc = (num1-num2)/num1;
        $("#gross_profit_margin").val(calc);
    }
    function updateDohPersediaan(){
        var num1 = $("#persediaan_inventory").val().split('.').join('');
        var num2 = $("#harga_pokok_penjualan").val().split('.').join('');

        var calc = (parseInt(num1)/parseInt(num2)) * 30;

        $("#doh_persediaan_inventory").val(Math.ceil(calc));
    }
    function updateDohPiutang(){
        var num1 = $("#piutang_dagang").val().split('.').join('');
        var num2 = $("#pendapatan_usaha").val().split('.').join('');

        var calc = (parseInt(num1)/parseInt(num2)) * 30;
        $("#doh_piutang_dagang").val(Math.ceil(calc));
    }
    function updateDohUtang(){
        var num1 = $("#utang_dagang").val().split('.').join('');
        var num2 = $("#harga_pokok_penjualan").val().split('.').join('');

        var calc = (parseInt(num1)/parseInt(num2)) * 30;
        $("#doh_utang_dagang").val(Math.ceil(calc));
    }
    function updatewineraca(){
        var num1 = parseInt($("#persediaan_inventory").val().split('.').join(''));
        var num2 = parseInt($("#piutang_dagang").val().split('.').join(''));
        var num3 = parseInt($("#utang_dagang").val().split('.').join(''));

        var calc = num1+num2-num3;
         $("#wi_neraca").val(numberWithCommas(calc));
    }
    function updatewinormal(){
        var num1 = parseInt($("#kebutuhan_modal_kerja_doh").val().split('.').join(''));
        var num2 = parseInt($("#harga_pokok_penjualan").val().split('.').join(''));
        

        var calc = (num1/30)*num2;
         $("#wi_normal").val(numberWithCommas(calc));
    }
    function updatemodakerjadoh(){
        var num1 = parseInt($("#perputaran_persediaan_dagang").val().split('.').join(''));
        var num2 = parseInt($("#perputaran_piutang_dagang").val().split('.').join(''));
        var num3 = parseInt($("#perputaran_utang_dagang").val().split('.').join(''));

        var calc = num1+num2-num3;
         $("#kebutuhan_modal_kerja_doh").val((calc));
    }
    function updateAnalisaKeuangan(){
        var values = document.getElementsByClassName("pengeluaran");
        // alert(values.length);
        var totalPengeluaran = 0;
        for(x=0;x<values.length;x++){
            var num = values[x].value.split('.').join('');
            var numPengeluaran = isNaN(parseInt(num)) ? 0 : parseInt(num);
            // alert (parseInt(num));
            totalPengeluaran=totalPengeluaran+numPengeluaran;
        }
        
        $("#auto_pengeluaran").val(numberWithCommas(totalPengeluaran));
        
        //Update sisa
        
        var values = document.getElementsByClassName("pendapatan");
        // alert(values.length);
        var totalPendapatan = 0;
        for(x=0;x<values.length;x++){
            var num = values[x].value.split('.').join('');
            var numPengeluaran = isNaN(parseInt(num)) ? 0 : parseInt(num);
            // alert (parseInt(num));
            totalPendapatan=totalPendapatan+numPengeluaran;
        }

       var hitungAkhir = totalPendapatan-totalPengeluaran;
       if(hitungAkhir < 0){
            hitungAkhir = 0;
       }
       $("#sisa_penghasilan").val(numberWithCommas(hitungAkhir));
       $("#keuntungan_usaha").val(numberWithCommas(hitungAkhir));
       $("#total_penghasilan").val(numberWithCommas(hitungAkhir));
       updateGrossProfit();
    }
    function executeall(){
        updateAnalisaKeuangan();
        updateDohPersediaan();
        updateDohPiutang();
        updateDohUtang();
        updatewineraca();
        
        updatemodakerjadoh();
        updatewinormal();
    }
    $(".auto_numformat").keyup(function (event) {
        
        // skip for arrow keys
        if(event.which >= 37 && event.which <= 40) return;
        
        
        // format number
        $(".auto_numformat").val(function(index, value) {
          return value.replace(/\D/g, "")
          .replace(/\B(?=(\d{3})+(?!\d))/g, ".")
          ;
        });
        
        
    });
    
   
   
    $(".dohcalculate").change(function () {
        updateDohPersediaan();
        updateDohPiutang();
        updateDohUtang();
        updatewineraca();
        
        updatemodakerjadoh();
        updatewinormal();

        
    });
    $(".pengeluaran").change(function () {
        updateAnalisaKeuangan();
        
    });

    $(".pendapatan").change(function () {
        updateAnalisaKeuangan();
        
    });

    $(".perputaran").change(function () {
        updateAnalisaKeuangan();
        
    });
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