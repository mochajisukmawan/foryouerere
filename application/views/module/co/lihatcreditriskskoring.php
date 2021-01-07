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
    <input type="hidden" name="dn_id" value="<?=$dn_id?>">
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
                                <select class="form-control" name="rpc_ratio" readonly>
                                        <option value="<?=$dataCreditRiskScoring['rpcrm_id']?>"><?=$dataCreditRiskScoring['rpcrm_nama']?></option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Current Ratio</td>
                            <td>
                                <select class="form-control" name="current_ratio" readonly>
                                        <option value="<?=$dataCreditRiskScoring['crm_id']?>"><?=$dataCreditRiskScoring['crm_nama']?></option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Profitability</td>
                            <td>
                                <select class="form-control" name="profitability" readonly>
                                        <option value="<?=$dataCreditRiskScoring['profitability_id']?>"><?=$dataCreditRiskScoring['profitability_nama']?></option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">Karakter</td>
                        </tr>
                        <tr>
                            <td>Reputasi/Integritas Usaha</td>
                            <td>
                                <select class="form-control" name="reputasi_usaha" readonly> 
                                        <option value="<?=$dataCreditRiskScoring['rep_id']?>"><?=$dataCreditRiskScoring['rep_nama']?></option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Riwayat Hubungan dengan Bank</td>
                            <td>
                                <select class="form-control" name="riwayat_hubungan_bank" readonly>
                                        <option value="<?=$dataCreditRiskScoring['rhb_id']?>"><?=$dataCreditRiskScoring['rhb_nama']?></option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">Manajemen</td>
                        </tr>
                        <tr>
                            <td>Pengalaman/Lama Usaha</td>
                            <td>
                                <select class="form-control" name="pengalaman_usaha" readonly>
                                        <option value="<?=$dataCreditRiskScoring['pengalaman_id']?>"><?=$dataCreditRiskScoring['pengalaman_nama']?></option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Prospek Usaha</td>
                            <td>
                                <select class="form-control" name="prospek_usaha" readonly>
                                        <option value="<?=$dataCreditRiskScoring['pu_id']?>"><?=$dataCreditRiskScoring['pu_nama']?></option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">Lingkungan Bisnis</td>
                        </tr>
                        <tr>
                            <td>Ketergantungan thd Supplier</td>
                            <td>
                                <select class="form-control" name="ketergantungan_supplier" readonly>
                                        <option value="<?=$dataCreditRiskScoring['kts_id']?>"><?=$dataCreditRiskScoring['kts_nama']?></option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Ketergantungan thd Pelanggan </td>
                            <td>
                                <select class="form-control" name="ketergantungan_pelanggan" readonly>
                                        <option value="<?=$dataCreditRiskScoring['ktpel_id']?>"><?=$dataCreditRiskScoring['ktpel_nama']?></option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Wilayah Pemasaran</td>
                            <td>
                                <select class="form-control" name="wilayah_pemasaran" readonly>
                                        <option value="<?=$dataCreditRiskScoring['wp_id']?>"><?=$dataCreditRiskScoring['wp_nama']?></option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Jenis Produk</td>
                            <td>
                                <select class="form-control" name="jenis_produk" readonly>
                                        <option value="<?=$dataCreditRiskScoring['jproduk_id']?>"><?=$dataCreditRiskScoring['jproduk_nama']?></option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">Analisa Fasilitas</td>
                        </tr>
                        <tr>
                            <td>Jangka Waktu</td>
                            <td>
                                <select class="form-control" name="jangka_waktu" readonly>
                                        <option value="<?=$dataCreditRiskScoring['jwaktu_id']?>"><?=$dataCreditRiskScoring['jwaktu_nama']?></option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Jenis Kredit</td>
                            <td>
                                <select class="form-control" name="jenis_kredit" readonly>
                                        <option value="<?=$dataCreditRiskScoring['jkredit_id']?>"><?=$dataCreditRiskScoring['jkredit_nama']?></option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">Agunan</td>
                        </tr>
                        <tr>
                            <td>Ratio Kecukupan Agunan</td>
                            <td>
                                <select class="form-control" name="ratio_kecukupan_agunan" readonly>
                                        <option value="<?=$dataCreditRiskScoring['rka_id']?>"><?=$dataCreditRiskScoring['rka_nama']?></option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Hasil</td>
                            <td>
                                <input id="hasil_resiko" type="text" name="hasil_resiko" class="form-control" readonly="" value="<?=$dataCreditRiskScoring['hasil_resiko']?>"> 
                            </td>
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
				
			</div>
		</div>
	</div>
</div>



