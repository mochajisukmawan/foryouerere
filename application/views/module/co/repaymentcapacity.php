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
                        <td>Pajak & Retribusi</td>
                        <td><?=number_format($dataLkd2['pajak_retribusi'],0,',','.')?></td>
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
                        <td>Pengeluaran Lainnya + Angsuran Tempat Lain</td>
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
                        <td>Angsuran Bank Jateng</td>
                        <td><?=number_format($labaRugi,0,',','.')?></td>
                    </tr>
                    <tr>
                        <td>RPC Ratio</td>
                        <td><?=number_format($labaRugi,0,',','.')?></td>
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
				<form action="" method="POST">
                    <input type="hidden" name="pendapatan_usaha" value="<?=$dataLkd2['lkd1_pendapatan_usaha_total']?>">
                    <input type="hidden" name="harga_pokok_pembelian" value="<?=$dataLkd2['lkd1_hpp_total']?>">
                    <input type="hidden" name="sewa" value="<?=$dataLkd2['lkd1_sewa_total']?>">
                    <input type="hidden" name="gaji_pegawai" value="<?=$dataLkd2['lkd1_gaji_total']?>">
                    <input type="hidden" name="telpon_listrik_air" value="<?=$dataLkd2['lkd1_telpon_listrik_air_total']?>">
                    <input type="hidden" name="pajak_retribusi" value="<?=$dataLkd2['pajak_retribusi']?>">
                    <input type="hidden" name="transportasi" value="<?=$dataLkd2['lkd1_transportasi_total']?>">
                    <input type="hidden" name="biaya_rumah_tangga" value="<?=$biayaRumahTangga?>">
                    <input type="hidden" name="pengeluaran_lainnya" value="<?=$dataLkd2['lkd1_pengeluaran_lain_total']?>">
                    <input type="hidden" name="pengeluaran_usaha" value="<?=$dataLkd2['lkd1_pengeluaran_usaha_total']?>">
                    <input type="hidden" name="pendapatan_bersih" value="<?=$pendapatanBersih?>">
                    <input type="hidden" name="penghasilan_lainnya" value="<?=$dataLkd2['lkd1_penghasilan_lain_total']?>">
                    <input type="hidden" name="laba_rugi" value="<?=$labaRugi?>">
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

