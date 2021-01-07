<?php 

?>

<div class="row">
	
        <?php 
        	if(!empty($_SESSION['msg'])){
        		echo "<div class='alert alert-success'>$_SESSION[msg] </div>";
        		unset($_SESSION['msg']);
        	}
            /*echo "<pre>";
            print_r($dataBobot);
            echo "</pre>";*/
            
        ?>
</div>
<form action="<?=base_url()?>user/creditriskskoringpost" method="POST">
    <input type="hidden" name="dn_id" value="<?=$dn_id_encrypt?>">
    <input id="total_skor" type="hidden" name="hasil_total" value="0">
    <div class="row">
        <div class="col-lg-12">
            <div class="hpanel">
                <div class="panel-body">
                    <table class="table table-bordered" style="text-align: center;">
                        <col width="30%">
                        <tr>
                            <td colspan="2">Finansial</td>
                        </tr>
                        <tr>
                            <td>RPC Ratio</td>
                            <td>
                                <select class="form-control scoring finansial" name="rpc_ratio">
                                    <?php foreach($dataRpcRatio as $key) : ?>
                                        <option value="<?=$key['rpcrm_id']?>" data-nilai="<?=$key['rpcrm_skor']?>" data-subbobot="<?=$dataSubBobot['rpc_ratio']?>" ><?=$key['rpcrm_nama']?></option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Current Ratio</td>
                            <td>
                                <select class="form-control scoring finansial" name="current_ratio">
                                    <?php foreach($dataCurrentRatio as $key) : ?>
                                        <option value="<?=$key['crm_id']?>"  data-nilai="<?=$key['crm_skor']?>" data-subbobot="<?=$dataSubBobot['current_ratio']?>"><?=$key['crm_nama']?></option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Profitability</td>
                            <td>
                                <select class="form-control scoring finansial" name="profitability">
                                    <?php foreach($dataProfitability as $key) : ?>
                                        <option value="<?=$key['profitability_id']?>"  data-nilai="<?=$key['profitability_skor']?>" data-subbobot="<?=$dataSubBobot['profitability']?>"><?=$key['profitability_nama']?></option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">Karakter</td>
                        </tr>
                        <tr>
                            <td>Reputasi/Integritas Usaha</td>
                            <td>
                                <select class="form-control scoring karakter" name="reputasi_usaha">
                                    <?php foreach($dataReputasiUsaha as $key) : ?>
                                        <option value="<?=$key['rep_id']?>"  data-nilai="<?=$key['rep_skor']?>" data-subbobot="<?=$dataSubBobot['reputasi_usaha']?>"><?=$key['rep_nama']?></option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Riwayat Hubungan dengan Bank</td>
                            <td>
                                <select class="form-control scoring karakter" name="riwayat_hubungan_bank">
                                    <?php foreach($dataRiwayatHubunganBank as $key) : ?>
                                        <option value="<?=$key['rhb_id']?>"  data-nilai="<?=$key['rhb_skor']?>" data-subbobot="<?=$dataSubBobot['riwayat_hubungan']?>"><?=$key['rhb_nama']?></option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">Manajemen</td>
                        </tr>
                        <tr>
                            <td>Pengalaman/Lama Usaha</td>
                            <td>
                                <select class="form-control scoring manajemen" name="pengalaman_usaha">
                                    <?php foreach($dataPengalamanUsaha as $key) : ?>
                                        <option value="<?=$key['pengalaman_id']?>"  data-nilai="<?=$key['pengalaman_skor']?>" data-subbobot="<?=$dataSubBobot['pengalaman_usaha']?>"><?=$key['pengalaman_nama']?></option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Prospek Usaha</td>
                            <td>
                                <select class="form-control scoring manajemen" name="prospek_usaha">
                                    <?php foreach($dataProspekUsaha as $key) : ?>
                                        <option value="<?=$key['pu_id']?>"  data-nilai="<?=$key['pu_skor']?>" data-subbobot="<?=$dataSubBobot['prospek_usaha']?>"><?=$key['pu_nama']?></option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">Lingkungan Bisnis</td>
                        </tr>
                        <tr>
                            <td>Ketergantungan thd Supplier</td>
                            <td>
                                <select class="form-control scoring lingkungan" name="ketergantungan_supplier">
                                    <?php foreach($dataKetergantunganBisnis as $key) : ?>
                                        <option value="<?=$key['kb_id']?>"  data-nilai="<?=$key['kb_skor']?>" data-subbobot="<?=$dataSubBobot['ketergantungan_supplier']?>"><?=$key['kb_nama']?></option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Ketergantungan thd Pelanggan </td>
                            <td>
                                <select class="form-control scoring lingkungan" name="ketergantungan_pelanggan">
                                    <?php foreach($dataKetergantunganBisnis as $key) : ?>
                                        <option value="<?=$key['kb_id']?>"  data-nilai="<?=$key['kb_skor']?>" data-subbobot="<?=$dataSubBobot['ketergantungan_pelanggan']?>"><?=$key['kb_nama']?></option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Wilayah Pemasaran</td>
                            <td>
                                <select class="form-control scoring lingkungan" name="wilayah_pemasaran">
                                    <?php foreach($dataWilayahPemasaran as $key) : ?>
                                        <option value="<?=$key['wp_id']?>"  data-nilai="<?=$key['wp_skor']?>" data-subbobot="<?=$dataSubBobot['wilayah_pemasaran']?>"><?=$key['wp_nama']?></option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Jenis Produk</td>
                            <td>
                                <select class="form-control scoring lingkungan" name="jenis_produk">
                                    <?php foreach($dataJenisProduk as $key) : ?>
                                        <option value="<?=$key['jproduk_id']?>"  data-nilai="<?=$key['jproduk_skor']?>" data-subbobot="<?=$dataSubBobot['jenis_produk']?>"><?=$key['jproduk_nama']?></option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">Analisa Fasilitas</td>
                        </tr>
                        <tr>
                            <td>Jangka Waktu</td>
                            <td>
                                <select class="form-control scoring analisa" name="jangka_waktu">
                                    <?php foreach($dataJangkaWaktu as $key) : ?>
                                        <option value="<?=$key['jwaktu_id']?>"  data-nilai="<?=$key['jwaktu_skor']?>" data-subbobot="<?=$dataSubBobot['jangka_waktu']?>"><?=$key['jwaktu_nama']?></option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Jenis Kredit</td>
                            <td>
                                <select class="form-control scoring analisa" name="jenis_kredit">
                                    <?php foreach($dataJenisKredit as $key) : ?>
                                        <option value="<?=$key['jkredit_id']?>"  data-nilai="<?=$key['jkredit_skor']?>" data-subbobot="<?=$dataSubBobot['jenis_kredit']?>"><?=$key['jkredit_nama']?></option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">Agunan</td>
                        </tr>
                        <tr>
                            <td>Ratio Kecukupan Agunan</td>
                            <td>
                                <select class="form-control scoring agunan" name="ratio_kecukupan_agunan">
                                    <?php foreach($dataRatioKecukupan as $key) : ?>
                                        <option value="<?=$key['rka_id']?>"  data-nilai="<?=$key['rka_skor']?>" data-subbobot="<?=$dataSubBobot['ratio_kecukupan_agunan']?>"><?=$key['rka_nama']?></option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                        </tr>

                        <tr>
                            <td>Hasil</td>
                            <td>
                                <input id="hasil_resiko" type="text" name="hasil_resiko" class="form-control" readonly=""> 
                            </td>
                        </tr>
                    </table>
                    <div class="form-group">
                                <label class="col-sm-6 control-label"></label>
                                <div class="col-sm-6">
                                    <button type="submit" class="btn btn-primary" onclick="return confirm('Simpan Data?');">Simpan Data</button>
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
    function updateSkor(){

    }
    $(".scoring").change(function () {
        var selected = $(this).find('option:selected');
        var extra = selected.data('nilai'); 
        var valuesFinansial = document.getElementsByClassName("finansial");
        var valuesKarakter = document.getElementsByClassName("karakter");
        var valuesManajemen = document.getElementsByClassName("manajemen");
        var valuesLingkungan = document.getElementsByClassName("lingkungan");
        var valuesAnalisa = document.getElementsByClassName("analisa");
        var valuesAgunan = document.getElementsByClassName("agunan");
        var dataBobot =<?=json_encode($dataBobot)?>;
        var dataSubBobot =<?=json_encode($dataSubBobot)?>;
        // alert(values.length);
        var totalFinansial= 0;
        var totalKarakter= 0;
        var totalManajemen= 0;
        var totalLingkungan= 0;
        var totalAnalisa= 0;
        var totalAgunan= 0;
        for(x=0;x<valuesFinansial.length;x++){
            var sel = document.getElementById('select');
            var selected = valuesFinansial[x].options[valuesFinansial[x].selectedIndex];
            var extra = selected.getAttribute('data-nilai');
            var extraSubBobot = selected.getAttribute('data-subbobot');
            //var num = values[x].value;
            var numPengeluaran = isNaN(parseInt(extra)) ? 0 : parseInt(extra);
            // alert (parseInt(num));
            totalFinansial=totalFinansial+(numPengeluaran*extraSubBobot);
        }

        for(x=0;x<valuesKarakter.length;x++){
            var sel = document.getElementById('select');
            var selected = valuesKarakter[x].options[valuesKarakter[x].selectedIndex];
            var extra = selected.getAttribute('data-nilai');
            var extraSubBobot = selected.getAttribute('data-subbobot');
            //var num = values[x].value;
            var numPengeluaran = isNaN(parseInt(extra)) ? 0 : parseInt(extra);
            // alert (parseInt(num));
            totalKarakter=totalKarakter+(numPengeluaran*extraSubBobot);
        }

        for(x=0;x<valuesManajemen.length;x++){
            var sel = document.getElementById('select');
            var selected = valuesManajemen[x].options[valuesManajemen[x].selectedIndex];
            var extra = selected.getAttribute('data-nilai');
            var extraSubBobot = selected.getAttribute('data-subbobot');
            //var num = values[x].value;
            var numPengeluaran = isNaN(parseInt(extra)) ? 0 : parseInt(extra);
            // alert (parseInt(num));
            totalManajemen=totalManajemen+(numPengeluaran*extraSubBobot);
        }

        for(x=0;x<valuesLingkungan.length;x++){
            var sel = document.getElementById('select');
            var selected = valuesLingkungan[x].options[valuesLingkungan[x].selectedIndex];
            var extra = selected.getAttribute('data-nilai');
            var extraSubBobot = selected.getAttribute('data-subbobot');
            //var num = values[x].value;
            var numPengeluaran = isNaN(parseInt(extra)) ? 0 : parseInt(extra);
            // alert (parseInt(num));
            totalLingkungan=totalLingkungan+(numPengeluaran*extraSubBobot);
        }

        for(x=0;x<valuesAnalisa.length;x++){
            var sel = document.getElementById('select');
            var selected = valuesAnalisa[x].options[valuesAnalisa[x].selectedIndex];
            var extra = selected.getAttribute('data-nilai');
            var extraSubBobot = selected.getAttribute('data-subbobot');
            //var num = values[x].value;
            var numPengeluaran = isNaN(parseInt(extra)) ? 0 : parseInt(extra);
            // alert (parseInt(num));
            totalAnalisa=totalAnalisa+(numPengeluaran*extraSubBobot);
        }

        for(x=0;x<valuesAgunan.length;x++){
            var sel = document.getElementById('select');
            var selected = valuesAgunan[x].options[valuesAgunan[x].selectedIndex];
            var extra = selected.getAttribute('data-nilai');
            var extraSubBobot = selected.getAttribute('data-subbobot');
            //var num = values[x].value;
            var numPengeluaran = isNaN(parseInt(extra)) ? 0 : parseInt(extra);
            // alert (extraSubBobot);
            totalAgunan=totalAgunan+(numPengeluaran*extraSubBobot);
        }

        var finansialXBobot=totalFinansial*dataBobot.finansial/3;
        var karakterXBobot=totalKarakter*dataBobot.karakter/3;
        var manajemenXBobot=totalManajemen*dataBobot.manajemen/3;
        var lingkunganXBobot=totalLingkungan*dataBobot.lingkungan_bisnis/3;
        var analisaXBobot=totalAnalisa*dataBobot.analisa_fasilitas/3;
        var agunanXBobot=totalAgunan*dataBobot.agunan/3;

        var all = finansialXBobot+karakterXBobot+manajemenXBobot+lingkunganXBobot+analisaXBobot+agunanXBobot;
        /*console.log(finansialXBobot);
        console.log(karakterXBobot);
        console.log(manajemenXBobot);
        console.log(lingkunganXBobot);
        console.log(analisaXBobot);
        console.log(agunanXBobot);
        console.log(all);*/
        $("#total_skor").val(all);
        if(all>85){
            $("#hasil_resiko").val("Low Risk");
        }
        else if(all>70 && all < 85){
            $("#hasil_resiko").val("Medium Risk");
        }
        else{
            $("#hasil_resiko").val("High Risk");
        }
    });
</script>

