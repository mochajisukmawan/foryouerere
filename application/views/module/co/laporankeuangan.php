<?php 

?>

<div class="row">
	
        <?php 
        	if(!empty($_SESSION['msg'])){
        		echo "<div class='alert alert-success'>$_SESSION[msg] </div>";
        		unset($_SESSION['msg']);
        	}
            $biayaRumahTangga = $dataLkd2['total_pengeluaran'];
            $pendapatanBersih = $dataLkd2['lkd1_pendapatan_usaha_total']-$dataLkd2['lkd1_pengeluaran_usaha_total'] - $dataLkd2['angsuran_pinjaman_saatini']-$biayaRumahTangga;
            $labaRugi = $pendapatanBersih+$dataLkd2['lkd1_penghasilan_lain_total'];
            $repaymentcapacity=0.75*$labaRugi;
            $rpcRatio=$repaymentcapacity/$dataLkd2['rekomendasi_angsuran_kredit'];
            // print_r($dataAngsuran);
        ?>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="hpanel">
            <div class="panel-body">
                <table class="table table-bordered">
                    <tr>
                        <td>1. Pendapatan Usaha/Sales</td>
                        <td><?=number_format($dataLkd2['lkd1_pendapatan_usaha_total'],0,',','.')?></td>
                    </tr>
                    <tr>
                        <td>2. Pengeluaran</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Harga Pokok Pembelian</td>
                        <td><?=number_format($dataLkd2['lkd1_hpp_total'],0,',','.')?></td>
                    </tr>
                    <tr>
                        <td>Sewa/Kontrak</td>
                        <td><?=number_format($dataLkd2['lkd1_sewa_total'],0,',','.')?></td>
                    </tr>
                    <tr>
                        <td>Gaji Pegawai</td>
                        <td><?=number_format($dataLkd2['lkd1_gaji_total'],0,',','.')?></td>
                    </tr>
                     <tr>
                        <td>Telpon, Listrik, & Air</td>
                        <td><?=number_format($dataLkd2['lkd1_telpon_listrik_air_total'],0,',','.')?></td>
                    </tr>
                     <tr>
                        <td>Pajak & Restribusi</td>
                        <td><?=number_format($dataLkd2['pajak_restribusi'],0,',','.')?></td>
                    </tr>
                     <tr>
                        <td>Transportasi</td>
                        <td><?=number_format($dataLkd2['lkd1_transportasi_total'],0,',','.')?></td>
                    </tr>
                     <tr>
                        <td>Biaya Rumah Tangga</td>
                        <td>
                            <?=number_format($biayaRumahTangga,0,',','.')?>
                        </td>
                    </tr>
                     <tr>
                        <td>Pengeluaran Lainnya</td>
                        <td><?=number_format($dataLkd2['lkd1_pengeluaran_lain_total'],0,',','.')?></td>
                    </tr>
                     <tr>
                        <td>Pengeluaran Usaha</td>
                        <td><?=number_format($dataLkd2['lkd1_pengeluaran_usaha_total'],0,',','.')?></td>
                    </tr>
                     <tr>
                        <td>Pendapatan Bersih</td>
                        <td><?=number_format($pendapatanBersih,0,',','.')?></td>
                    </tr>
                    <tr>
                        <td>3.Penghasilan Lainnya</td>
                        <td><?=number_format($dataLkd2['lkd1_penghasilan_lain_total'],0,',','.')?></td>
                    </tr>
                    <tr>
                        <td>Laba Rugi</td>
                        <td><?=number_format($labaRugi,0,',','.')?></td>
                    </tr>
                    <tr>
                        <td colspan="2" style="color: blue;font-size: 16px;">Repayment Capacity</td>
                    </tr>
                    <tr>
                        <td>75% x (a)</td>
                        <td><?=number_format($repaymentcapacity,0,',','.')?></td>
                    </tr>
                    <tr>
                        <td>Angsuran Bank Jateng</td>
                        <td><?=number_format($dataLkd2['rekomendasi_angsuran_kredit'],0,',','.')?></td>
                    </tr>
                    <tr>
                        <td>RPC Ratio</td>
                        <td><?=number_format($rpcRatio,2,',','.')?></td>
                    </tr>
                    
                    
                </table>
            </div>
        </div>
    </div>
</div>

<?php if($dataKredit['status_co'] != 'Ya'): ?>
<div class="row">
	<div class="col-lg-12">
		<div class="hpanel">
			<div class="panel-body">
				<form action="" method="POST">
                    <input type="hidden" name="pendapatan_usaha" value="<?=$dataLkd2['lkd1_pendapatan_usaha_total']?>">
                    <input type="hidden" name="harga_pokok_pembelian" value="<?=$dataLkd2['lkd1_hpp_total']?>">
                    <input type="hidden" name="sewa" value="<?=$dataLkd2['lkd1_sewa_total']?>">
                    <input type="hidden" name="gaji_pegawai" value="<?=$dataLkd2['lkd1_gaji_total']?>">
                    <input type="hidden" name="telpon_listrik_air" value="<?=$dataLkd2['lkd1_telpon_listrik_air_total']?>">
                    <input type="hidden" name="pajak_retribusi" value="<?=$dataLkd2['pajak_restribusi']?>">
                    <input type="hidden" name="transportasi" value="<?=$dataLkd2['lkd1_transportasi_total']?>">
                    <input type="hidden" name="biaya_rumah_tangga" value="<?=$biayaRumahTangga?>">
                    <input type="hidden" name="pengeluaran_lainnya" value="<?=$dataLkd2['lkd1_pengeluaran_lain_total']?>">
                    <input type="hidden" name="pengeluaran_usaha" value="<?=$dataLkd2['lkd1_pengeluaran_usaha_total']?>">
                    <input type="hidden" name="pendapatan_bersih" value="<?=$pendapatanBersih?>">
                    <input type="hidden" name="penghasilan_lainnya" value="<?=$dataLkd2['lkd1_penghasilan_lain_total']?>">
                    <input type="hidden" name="laba_rugi" value="<?=$labaRugi?>">
                    <input type="hidden" name="dn_id" value="<?=$dn_id?>">
                    <input type="hidden" name="nilai_repayment_capacity" value="<?=$repaymentcapacity?>">
                    <input type="hidden" name="angsuran_bankjateng" value="<?=$dataLkd2['rekomendasi_angsuran_kredit']?>">
                    <input type="hidden" name="rpc_ratio" value="<?=$rpcRatio?>">
                    <div class="form-group">
                        <label class="col-sm-6 control-label"></label>
                        <div class="col-sm-6">
                            <button type="submit" class="btn btn-primary" onclick="return confirm('Simpan Data?');">Simpan Data</button>
                        </div>
                    </div>
                </form>
			</div>
		</div>
	</div>
</div>

<?php endif; ?>