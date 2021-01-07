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
<form action="<?=base_url()?>user/neracapost" method="POST">
    <input type="hidden" name="dn_id" value="<?=$dn_id_encrypt?>">
    <div class="row">
        <div class="col-lg-12">
            <div class="hpanel">
                <div class="panel-body">
                    <table class="table table-bordered" style="text-align: center;">
                        <col width="30%">
                        <tr>
                            <td colspan="2" style="background-color: rgba(155,0,155,1);font-weight: bold;color: white;">Aset</td>
                        </tr>
                        <tr>
                            <td>Kas</td>
                            <td><input type="text" class="form-control auto_numformat addaset" name="kas"  value="<?=number_format($dataNeraca['kas'],0,',','.')?>"></td>
                        </tr>
                        <tr>
                            <td>Tabungan dan Deposito</td>
                            <td><input type="text" class="form-control auto_numformat addaset" name="tabungan_deposito"  value="<?=number_format($dataNeraca['tabungan_deposito'],0,',','.')?>"></td>
                        </tr>
                        <tr>
                            <td>Investasi Lainnya</td>
                            <td><input type="text" class="form-control auto_numformat addaset" name="investasi_lainnya"  value="<?=number_format($dataNeraca['investasi_lainnya'],0,',','.')?>"></td>
                        </tr>
                        <tr>
                            <td>Piutang</td>
                            <td><input type="text" class="form-control addaset" name="piutang" readonly value="<?=number_format($dataNeraca['piutang'],0,',','.')?>"></td>
                        </tr>
                         <tr>
                            <td>Uang Muka yang telah dibayar</td>
                            <td><input type="text" class="form-control auto_numformat addaset" name="uang_muka_dibayar"  value="<?=number_format($dataNeraca['uang_muka_dibayar'],0,',','.')?>"></td>
                        </tr>
                         <tr>
                            <td>Tanah dan Gedung</td>
                            <td><input type="text" class="form-control auto_numformat addaset" name="tanah_gedung"  value="<?=number_format($dataNeraca['tanah_gedung'],0,',','.')?>"></td>
                        </tr>
                         <tr>
                            <td>Mesin dan Peralatan Kerja</td>
                            <td><input type="text" class="form-control auto_numformat addaset" name="mesin_peralatan"  value="<?=number_format($dataNeraca['mesin_peralatan'],0,',','.')?>"></td>
                        </tr>
                         <tr>
                            <td>Kendaraan</td>
                            <td><input type="text" class="form-control auto_numformat addaset" name="kendaraan"  value="<?=number_format($dataNeraca['kendaraan'],0,',','.')?>"></td>
                        </tr>
                         <tr>
                            <td>Persediaan / Inventory</td>
                            <td><input type="text" class="form-control addaset" name="persediaan_inventory"  value="<?=number_format($dataLkd2['persediaan_inventory'],0,',','.')?>"></td>
                        </tr>
                         <tr>
                            <td>Aset lainnya</td>
                            <td><input type="text" class="form-control auto_numformat addaset" name="aset_lainya"  value="<?=number_format($dataNeraca['aset_lainya'],0,',','.')?>"></td>
                        </tr>
                         <tr>
                            <td><b>Total Aset</b></td>
                            <td><input id="total_aset" type="text" class="form-control" name="total_aset" readonly value="<?=number_format($dataNeraca['total_aset'],0,',','.')?>"></td>
                        </tr>
                        <tr>
                            <td colspan="2" style="background-color: rgba(155,0,255,1);font-weight: bold;color: white;">Kewajiban</td>
                        </tr>
                        <tr>
                            <td>Hutang Jangka Pendek</td>
                            <td><input type="text" class="form-control auto_numformat addkewajiban" name="hitung_jangka_pendek"  value="<?=number_format($dataNeraca['hitung_jangka_pendek'],0,',','.')?>"></td>
                        </tr>
                        <tr>
                            <td>Hutang Jangka Panjang</td>
                            <td><input type="text" class="form-control auto_numformat addkewajiban" name="hitung_jangka_panjang"  value="<?=number_format($dataNeraca['hitung_jangka_panjang'],0,',','.')?>"></td>
                        </tr>
                        <tr>
                            <td><b>Total Kewajiban</b></td>
                            <td><input id="total_kewajiban" type="text" class="form-control" name="total_kewajiban" readonly value="<?=number_format($dataNeraca['total_kewajiban'],0,',','.')?>"></td>
                        </tr>
                        <tr>
                            <td colspan="2" style="background-color: rgba(0,177,155,1);font-weight: bold;color: white;">Modal</td>
                        </tr>
                        <tr>
                            <td>Modal Disetor</td>
                            <td><input id="modal_disetor" type="text" class="form-control" name="modal_disetor" readonly value="<?=number_format($dataNeraca['modal_disetor'],0,',','.')?>"></td>
                        </tr>
                        <tr>
                            <td>Laba</td>
                            <td><input id="laba" type="text" class="form-control" name="laba" readonly value="<?=number_format($dataLaporanKeuangan['laba_rugi'],0,',','.')?>"></td>
                        </tr>
                        <tr>
                            <td>Total Modal</td>
                            <td><input id="total_modal" type="text" class="form-control" name="total_modal" readonly value="<?=number_format($dataNeraca['total_modal'],0,',','.')?>"></td>
                        </tr>
                        <tr>
                            <td>Total Kewajiban dan Modal</td>
                            <td><input id="total_kewajiban_modal" type="text" class="form-control" name="total_kewajiban_modal" readonly value="<?=number_format($dataNeraca['total_kewajiban_modal'],0,',','.')?>"></td>
                        </tr>
                        
                    </table>
                   <div class="form-group">
                                <label class="col-sm-6 control-label"></label>
                                <div class="col-sm-6">
                                    <button type="submit" class="btn btn-primary" onclick="return confirm('Update Data?');">Update Data</button>
                                </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<div class="row">
	<div class="col-lg-12">
		<div class="hpanel">
			<div class="panel-body">
				
			</div>
		</div>
	</div>
</div>


<script type="text/javascript">
    function numberWithCommas(x) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    }
    function updateAsset(){
        var values = document.getElementsByClassName("addaset");
        // alert(values.length);
        var totalAsset = 0;
        for(x=0;x<values.length;x++){
            var num = values[x].value.split('.').join('');
            var numPengeluaran = isNaN(parseInt(num)) ? 0 : parseInt(num);
            // alert (parseInt(num));
            totalAsset=totalAsset+numPengeluaran;
        }
        
        $("#total_aset").val(numberWithCommas(totalAsset));
        
    
    }
    function updateKewajiban(){
        var values = document.getElementsByClassName("addkewajiban");
        // alert(values.length);
        var totalAsset = 0;
        for(x=0;x<values.length;x++){
            var num = values[x].value.split('.').join('');
            var numPengeluaran = isNaN(parseInt(num)) ? 0 : parseInt(num);
            // alert (parseInt(num));
            totalAsset=totalAsset+numPengeluaran;
        }
        
        $("#total_kewajiban").val(numberWithCommas(totalAsset));
        
    
    }
    function updateModalDisetor(){
        // var values = document.getElementsByClassName("addkewajiban");
        // alert(values.length);
        var totalAsset = 0;
        var numTotalAset = $("#total_aset").val().split('.').join('');
        var numTotalKewajiban = $("#total_kewajiban").val().split('.').join('');
        var numLaba = $("#laba").val().split('.').join('');
        var num1 = isNaN(parseInt(numTotalAset)) ? 0 : parseInt(numTotalAset);
        var num2 = isNaN(parseInt(numTotalKewajiban)) ? 0 : parseInt(numTotalKewajiban);
        var num3 = isNaN(parseInt(numLaba)) ? 0 : parseInt(numLaba);
        var calc = num1 - num2 - num3 ;
        $("#modal_disetor").val(numberWithCommas(calc));
        
    
    }
    function updateTotalModal(){
        // var values = document.getElementsByClassName("addkewajiban");
        // alert(values.length);
        var totalAsset = 0;
        var numModalSetor = $("#modal_disetor").val().split('.').join('');
        var numLaba = $("#laba").val().split('.').join('');
        var num1 = isNaN(parseInt(numModalSetor)) ? 0 : parseInt(numModalSetor);
        var num2 = isNaN(parseInt(numLaba)) ? 0 : parseInt(numLaba);
        var calc = num1 + num2 ;
        $("#total_modal").val(numberWithCommas(calc));
        
    
    }
    function updateTotalKewajibanModal(){
        // var values = document.getElementsByClassName("addkewajiban");
        // alert(values.length);
        var totalAsset = 0;
        var numTotalKewajiban = $("#total_kewajiban").val().split('.').join('');
        var numTotalModal = $("#total_modal").val().split('.').join('');
        var num1 = isNaN(parseInt(numTotalKewajiban)) ? 0 : parseInt(numTotalKewajiban);
        var num2 = isNaN(parseInt(numTotalModal)) ? 0 : parseInt(numTotalModal);
        var calc = num1 + num2 ;
        $("#total_kewajiban_modal").val(numberWithCommas(calc));
        
    
    }
    function executeall(){
        updateAsset();
        updateModalDisetor();
        updateTotalModal();
        updateTotalKewajibanModal();
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
    $(".addaset").change(function () {
        updateAsset();
        updateModalDisetor();
        updateTotalModal();
        updateTotalKewajibanModal();
    });
    $(".addkewajiban").change(function () {
        updateKewajiban();
        updateModalDisetor();
        updateTotalModal();
        updateTotalKewajibanModal();
    });
</script>

