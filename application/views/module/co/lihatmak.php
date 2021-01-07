<?php 

?>

<div class="row">
    
        <?php 
            if(!empty($_SESSION['msg'])){
                echo "<div class='alert alert-success'>$_SESSION[msg] </div>";
                unset($_SESSION['msg']);
            }
            // print_r($dataLkd2);
        
            $nomorFasilitasBJ= 1;
            $totalNilaiKredit= 0;
            $totalAngsuran= 0;
            $totalBakiDebet= 0;

            $osWiNeraca=0;
        ?>

</div>

<form action="<?=base_url()?>user/makpost" method="POST">
    <input type="hidden" name="dn_id" value="<?=$dn_id_encrypt?>">

<div class="row">
    <div class="col-lg-12">
        <div class="hpanel">
            <div class="panel-body" align="center" style="font-size: 20px;font-weight: bold;background-color: rgba(0,126,0,1);color: white;">
                MEMORANDUM ANALISA KREDIT (MAK)
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-6">
        <div class="hpanel">
            <div class="panel-body">
                <table class="table table-bordered">
                    <tr>
                        <td>Unit/Area</td>
                        <td><?=$dataUnit['nama_unit']?></td>
                    </tr>
                    <tr>
                        <td>Nama Debitur</td>
                         <td>
                            <input type="text" class="form-control" name="nama_debitur" value="<?=$dataKredit['nama_nasabah']?>" readonly="">
                        </td>
                    </tr>
                    <tr>
                        <td>Jenis Usaha</td>
                         <td>
                            <input type="text" class="form-control" name="ju_id" value="" readonly="">
                        </td>
                    </tr>
                    <tr>
                        <td>Alamat Usaha</td>
                         <td>
                            <input type="text" class="form-control" name="alamat_usaha" value="" readonly="">
                        </td>
                    </tr>
                    
                    
                    
                </table>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="hpanel">
            <div class="panel-body">
                <table class="table table-bordered">
                    <tr>
                        <td>Nomor Aplikasi</td>
                        <td>
                            <input type="text" class="form-control" name="nomor_aplikasi" value="<?=$dataKredit['no_aplikasi']?>" readonly="">
                        </td>
                    </tr>
                    <tr>
                        <td>CIF</td>
                        <td>
                            <input type="text" class="form-control" name="cif" value="<?=$dataMak['cif']?>" >
                        </td>
                    </tr>
                    <tr>
                        <td>Nomor Rekening</td>
                        <td>
                            <input type="text" class="form-control" name="nomor_rek" value="<?=$dataMak['nomor_rek']?>" >
                        </td>
                    </tr>
                    <tr>
                        <td>No MAK</td>
                        <td>
                            <input type="text" class="form-control" name="no_mak" value="<?=$dataMak['no_mak']?>"  >
                        </td>
                    </tr>
                    <tr>
                        <td>Tanggal Input</td>
                        <td>
                            <input type="text" class="form-control" name="tgl_input_mak"  value="<?=$dataMak['tgl_input_mak']?>" readonly>
                        </td>
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
                <table class="table table-bordered">
                    <tr>
                        <td>Tujuan Pengajuan Kredit</td>
                        <td>Data dari LKD 4</td>
                    </tr>
                    
                    
                    
                </table>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="hpanel">
            <div class="panel-body">
                <table class="table table-bordered">
                    <tr>
                        <td>Jenis Produk Yang Diajukan</td>
                        <td><?=$dataKredit['nama_fasilitas']?></td>
                        <td><?=$dataKredit['kode_fasilitas']?></td>
                    </tr>
                    
                    
                    
                </table>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="hpanel">
            <div class="panel-heading hbuilt" style="background-color: rgba(155,126,0,1);color: white;">
                <div class="panel-tools">
                    <a class="showhide"><i class="fa fa-chevron-up"></i></a>
                </div>
                Fasilitas Kredit Di Unit UM
            </div>
            <div class="panel-body">
                <table class="table table-bordered">
                    <tr>
                        <td></td>
                        <td>Penggabungan</td>
                        <td>Nilai Kredit</td>
                        <td>Equivalen Bunga/Bin</td>
                        <td>Angsuran per Bulan</td>
                        <td>Jangka Waktu</td>
                        <td>Baki Debet</td>
                    </tr>
                    <?php foreach($dataFasilitasKreditBJ as $key) :?>
                        <?php 
                            if($key['status_fasilitas']=='Penggabungan'){
                                $totalNilaiKredit=$totalNilaiKredit+$key['plafon'];
                                $totalAngsuran=$totalAngsuran+$key['angsuran_perbulan'];
                                $totalBakiDebet=$totalBakiDebet+$key['baki_debet'];
                                
                            }
                            if($key['status2']=='plus'){
                                $osWiNeraca=$osWiNeraca+$key['baki_debet'];
                            }
                        ?>
                        <tr>
                            <td>Fasilitas <?=$nomorFasilitasBJ++?></td>
                            <td> <?=$key['status_fasilitas']?></td>
                            <td> <?=$key['plafon']?></td>
                            <td> <?=$key['equiv_Rate_perbulan']?></td>
                            <td> <?=$key['angsuran_perbulan']?></td>
                            <td> <?=$key['jangka_waktu']?></td>
                            <td> <?=$key['baki_debet']?></td>
                            
                            
                        </tr>
                    <?php endforeach; ?>
                    <?php 
                        $totalNilaiKredit=$totalNilaiKredit+$dataLkd2['rekomendasi_nilai_kredit'];
                        $totalAngsuran=$totalAngsuran+$dataLkd2['rekomendasi_angsuran_kredit'];
                        $totalBakiDebet=$totalBakiDebet+$dataLkd2['rekomendasi_nilai_kredit'];
                    ?>
                    <tr>
                        <td>Fasilitas Yang Diajukan</td>
                        <td></td>
                        <td><?=$dataLkd2['rekomendasi_nilai_kredit']?></td>
                        <td><?=$dataLkd2['rekomendasi_angsuran_kredit']?></td>
                        <td><?=$dataLkd2['jangka_waktu_kredit']?></td>
                        <td><?=$dataLkd2['jangka_waktu_kredit']?></td>
                        <td><?=$dataLkd2['rekomendasi_nilai_kredit']?></td>
                    </tr>
                    <tr>
                        <td>Total Fasilitas</td>
                        <td></td>
                        <td><input type="text" class="form-control" readonly name="total_nilai_kredit_um" value="<?=number_format($totalNilaiKredit,0,',','.')?>"></td>
                        <td></td>
                        <td><input type="text" class="form-control" readonly name="total_angsuran_perbulan_um" value="<?=number_format($totalAngsuran,0,',','.')?>"></td>
                        <td></td>
                        <td><input type="text" class="form-control" readonly name="total_baki_debet_um" value="<?=number_format($totalBakiDebet,0,',','.')?>"></td>
                    </tr>
                    
                </table>
            </div>
        </div>
    </div>
    
</div>
<?php 
    

    $nomorFasilitasBJ= 1;
    $totalNilaiKredit= 0;
    $totalAngsuran= 0;
    $totalBakiDebet= 0;
?>
<div class="row">
    <div class="col-lg-12">
        <div class="hpanel">
            <div class="panel-heading hbuilt" style="background-color: rgba(155,126,255,1);color: white;">
                <div class="panel-tools">
                    <a class="showhide"><i class="fa fa-chevron-up" ></i></a>
                </div>
                Fasilitas Kredit/Pembiayaan Di Tempat Lain
            </div>
            <div class="panel-body">
                <table class="table table-bordered">
                    <tr>
                        <td></td>
                        <td>Take Over</td>
                        <td>Nilai Kredit</td>
                        <td>Rate Per Bulan</td>
                        <td>Angsuran per Bulan</td>
                        <td>Jangka Waktu</td>
                        <td>Baki Debet</td>
                    </tr>
                    <?php foreach($dataFasilitasKreditBL as $key) :?>
                        <?php 
                            if($key['status_fasilitas']!='1'){
                                $totalNilaiKredit=$totalNilaiKredit+$key['plafon'];
                                $totalAngsuran=$totalAngsuran+$key['angsuran_perbulan'];
                                $totalBakiDebet=$totalBakiDebet+$key['baki_debet'];
                            }
                            if($key['status2']=='plus1'){
                                $osWiNeraca=$osWiNeraca+$key['baki_debet'];
                            }
                            if($key['status2']=='plus2'){
                                $osWiNeraca=$osWiNeraca+$key['plafon'];
                            }
                        ?>
                        <tr>
                            <td>Fasilitas <?=$nomorFasilitasBJ++?></td>
                            <td> <?=$key['nama_sfbl']?></td>
                            <td> <?=$key['plafon']?></td>
                            <td> <?=$key['equiv_Rate_perbulan']?></td>
                            <td> <?=$key['angsuran_perbulan']?></td>
                            <td> <?=$key['jangka_waktu']?></td>
                            <td> <?=$key['baki_debet']?></td>
                            
                            
                        </tr>
                    <?php endforeach; ?>
                    
                    
                    <tr>
                        <td>Total Fasilitas</td>
                        <td></td>
                        <td><input type="text" class="form-control" readonly name="total_nilai_kredit_lainnya" value="<?=number_format($totalNilaiKredit,0,',','.')?>"></td>
                        <td></td>
                        <td><input type="text" class="form-control" readonly name="total_angsuran_perbulan_lainnya" value="<?=number_format($totalAngsuran,0,',','.')?>"></td>
                        <td></td>
                        <td><input type="text" class="form-control" readonly name="total_baki_debet_lainnya" value="<?=number_format($totalBakiDebet,0,',','.')?>"></td>
                    </tr>
                    
                </table>
            </div>
        </div>
    </div>
    
</div>
<?php 
    $osWiNeraca=($osWiNeraca+$dataLkd2['rekomendasi_nilai_kredit'])/$dataLkd2['wi_neraca']*100;
?>
<div class="row">
    <div class="col-lg-6">
        <div class="hpanel">
            <div class="panel-body">
                <table class="table table-bordered">
                    <tr>
                        <td>Ada Deviasi</td>
                        <td>
                            <select class="form-control" name="deviasi">
                                <option value="Tidak">Tidak</option>
                            </select>
                        </td>
                    </tr>
                    
                    
                    
                </table>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="hpanel">
            <div class="panel-body">
                <table class="table table-bordered">
                    <tr>
                        <td>Status</td>
                        <td><select class="form-control" name="deviasi">
                                <option value="Tidak">Tidak</option>
                            </select>
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
            <div class="panel-heading hbuilt" style="background-color: rgba(155,0,1000,1);color: white;">
                <div class="panel-tools">
                    <a class="showhide"><i class="fa fa-chevron-up"></i></a>
                </div>
                Jaminan
            </div>
            <?php 
                $total_nilai_market=0;
            ?>
            <div class="panel-body">
                <table class="table table-bordered">
                    <tr>
                        <td>Jenis Jaminan</td>
                        <td>Alamat Jaminan</td>
                        <td>Lt/LB(m2)</td>
                        <td>Jenis dan No Dokumen</td>
                        <td>Masa berlaku s/d (Thn Pembuatan)</td>
                        <td>Atas nama</td>
                        <td>Nilai Market (dalam Rp)</td>
                    </tr>
                    <?php foreach($dataTanahBangunan as $key) :?>
                       <tr>
                            <td>Tanah Dan Bangunan</td>
                            <td><?=$key['alamat_jaminan']?></td>
                            <td><?=$key['luas_tanah_m2']?> / <?=($key['luas_bangunan_1_m2']+$key['luas_bangunan_2_m2'])?></td>
                            <td><?=$key['nama_jd']?></td>
                            <td><?=$key['tgl_jatuh_tempo_sertifikat']?></td>
                            <td><?=$key['nama_pemegang_hak']?></td>
                            <td><?=$key['total_market']?></td>
                            <?php 
                                $total_nilai_market=$total_nilai_market+$key['total_market'];
                            ?>
                       </tr>
                    <?php endforeach; ?>
                    
                    <?php foreach($dataTanahKosong as $key) :?>
                       <tr>
                            <td>Tanah Kosong</td>
                            <td><?=$key['alamat_jaminan']?></td>
                            <td></td>
                            <td></td>
                            <td><?=$key['tgl_jatuh_tempo_sertifikat']?></td>
                            <td><?=$key['nama_debitur']?></td>
                            <td><?=$key['nilai_market_tanah']?></td>

                       </tr>
                       <?php 
                            $total_nilai_market=$total_nilai_market+$key['nilai_market_tanah'];
                        ?>
                    <?php endforeach; ?>
                    
                    <?php foreach($dataKios as $key) :?>
                       <tr>
                            <td>Kios</td>
                            <td></td>
                            <td></td>
                            <td><?=$key['jenis_jaminan']?></td>
                            <td><?=$key['masa_berlaku_akhir']?></td>
                            <td><?=$key['nama_debitur']?></td>
                            <td><?=$key['nilai_market_kios']?></td>
                       </tr>
                       <?php 
                            $total_nilai_market=$total_nilai_market+$key['nilai_market_kios'];
                        ?>
                    <?php endforeach; ?>

                    <?php foreach($dataKendaraan as $key) :?>
                       <tr>
                            <td>Kendaraan</td>
                            <td><?=$key['alamat_pemilik_saat_ini']?></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><?=$key['nama_debitur']?></td>
                            <td><?=$key['nilai_market_kendaraan']?></td>
                       </tr>
                       <?php 
                            $total_nilai_market=$total_nilai_market+$key['nilai_market_kendaraan'];
                        ?>
                    <?php endforeach; ?>

                    <?php foreach($dataDeposito as $key) :?>
                       <tr>
                            <td>Deposito</td>
                            <td></td>
                            <td></td>
                            <td><?=$key['jenis_jaminan']?></td>
                            <td><?=$key['tgl_jatuh_tempo']?></td>
                            <td><?=$key['nama_debitur']?></td>
                            <td><?=$key['nilai_nominal']?></td>
                       </tr>
                       <?php 
                            $total_nilai_market=$total_nilai_market+$key['nilai_nominal'];
                        ?>
                    <?php endforeach; ?>
                    <tr>
                        <td>Total</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><input type="text" class="form-control" readonly name="total_nilai_market" value="<?=number_format($total_nilai_market,0,',','.')?>"></td>
                        
                        
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
                <table class="table table-bordered">
                    <tr>
                        <td>Disposable Income</td>
                        <td>
                            <input type="text" name="disposable_income" class="form-control" readonly value="<?=number_format($dataLkd2['disposable_income'],0,',','.')?>">
                        </td>
                    </tr>
                    <tr>
                        <td>IDIR (Over IDIR)</td>
                        <td>
                            <input type="text" name="idir" class="form-control" value="<?=$dataLkd2['idir']?>" readonly>
                        </td>
                    </tr>
                    
                    
                </table>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="hpanel">
            <div class="panel-body">
                <table class="table table-bordered">
                    <tr>
                        <td>WI Neraca</td>
                        <td>
                            <input type="text" name="wi_neraca" class="form-control" readonly value="<?=number_format($dataLkd2['wi_neraca'],0,',','.')?>">
                        </td>
                    </tr>
                    <tr>
                        <td>OS / WI Neraca (Dalam %)</td>
                        <td>
                            <input type="number" name="os_wi_neraca" class="form-control" value="<?=$osWiNeraca?>" readonly>
                        </td>
                    </tr>
                    
                    
                    
                </table>
            </div>
        </div>
    </div>
</div>

<?php 
    $ltv = $dataLkd2['rekomendasi_nilai_kredit']/$total_nilai_market*100;
?>
<div class="row">
    <div class="col-lg-6">
        <div class="hpanel">
            <div class="panel-body">
                <table class="table table-bordered">
                    <tr>
                        <td>LTV (Dalam %)</td>
                        <td>
                            <input type="number" name="disposable_income" class="form-control" readonly value="<?=$ltv?>">
                        </td>
                    </tr>
                    <tr>
                        <td>RPC</td>
                        <td>
                            <input type="number" name="rpc" class="form-control" value="<?=$dataLaporanKeuangan['rpc_ratio']?>" readonly>
                        </td>
                    </tr>
                    
                    
                </table>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="hpanel">
            <div class="panel-body">
                <table class="table table-bordered">
                    <tr>
                        <td>IDIR (Dalam %)</td>
                        <td>
                            <input type="number" name="idir" class="form-control" value="<?=$dataLkd2['idir']?>" readonly>
                        </td>
                    </tr>
                    <tr>
                        <td>Scoring Result</td>
                        <td>
                            <input type="text" name="hasil_resiko" class="form-control" readonly value="<?=$dataCreditRiskScoring['hasil_resiko']?>">
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
                <table class="table">
                    <tr>
                        <td>Nama</td>
                        <td><?=$dataKredit['nama_nasabah']?></td>
                    </tr>
                    <tr>
                        <td>Jenis Usaha</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Plafon Pinjaman</td>
                        <td><?=$dataLkd2['rekomendasi_nilai_kredit']?></td>
                    </tr>
                    <tr>
                        <td>Tenor (Jangka Waktu)</td>
                        <td><?=$dataLkd2['jangka_waktu_kredit']?></td>
                    </tr>
                    <tr>
                        <td>Bunga</td>
                        <td><?=$dataLkd2['bunga_per_bulan']?></td>
                    </tr>
                    <tr>
                        <td>Tujuan Pinjaman</td>
                        <td><?=$dataKredit['tujuan_kredit']?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="hpanel">
            <div class="panel-heading hbuilt" style="background-color: rgba(155,0,0,1);color: white;">
                <div class="panel-tools">
                    <a class="showhide"><i class="fa fa-chevron-up"></i></a>
                </div>
                Rekomendasi (Penjelasan)
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <textarea class="form-control" rows="8" name="penjelasan"><?=$dataMak['penjelasan']?></textarea>
                </div>
                
            </div>
        </div>
    </div>
    
</div>


</form>