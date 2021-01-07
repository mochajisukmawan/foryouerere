<?php 

?>

<div class="row">
    
        <?php 
            if(!empty($_SESSION['msg'])){
                echo "<div class='alert alert-success'>$_SESSION[msg] </div>";
                unset($_SESSION['msg']);
            }
            // print_r($dataLkd2);
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
                    <tr>
                        <td>Tanggal</td>
                        <td><?=date("Y-m-d")?></td>
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
                <object data="<?=base_url(); ?>assets/file/digitaldoc/<?=$dataPekerjaan['pekerjaan_id']?>.pdf?<?=rand(1,32000)?>" type="application/pdf" width="100%" style="min-height: 500px;">
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
<form method="post" action="<?=base_url()?>user/lkd2post" class="form-horizontal">
    <input type="hidden" name="dn_id" value="<?=$dn_id?>">
    <div class="row">
        <div class="col-lg-12">
            <div class="hpanel">
                <div class="panel-body">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Nama Orang yang Ditemui</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="orang_ditemui" required="" value="<?=$dataUsahaTop1['orang_ditemui']?>" readonly>
                            </div>
                        </div>    
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Hubungan</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="hubungan" readonly>
                                        <option value="<?=$dataUsahaTop1['hubungan_id']?>"><?=$dataUsahaTop1['hubungan_nama']?></option>
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
                <div class="panel-heading hbuilt" style="background-color: rgba(155,126,0,1);color: white;">
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
                                <input type="text" class="form-control" name="nama_usaha" required="" value="<?=$dataUsahaTop1['nama_usaha']?>" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Bidang Usaha</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="bidang_usaha" readonly>
                                        <option value="<?=$dataUsahaTop1['bu_id']?>"><?=$dataUsahaTop1['bu_nama']?></option>
                                </select>
                            </div>
                        </div>    
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Alamat Usaha</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="" required="" value="<?=$dataUsahaTop1['alamat_usaha']?>" disabled>
                            </div>
                        </div>    
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Telepon/Fax</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="" required="" value="<?=$dataUsahaTop1['telephone_usaha']?>" disabled>
                            </div>
                        </div>    
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Lama Di Usaha Ini (Tahun)</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="lama_usaha" required="" value="<?=$dataUsahaTop1['lama_usaha']?>" readonly>
                            </div>
                        </div>    
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Status Tempat Usaha</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="status_tempat_usaha" readonly>
                                        <option value="<?=$dataUsahaTop1['stu_id']?>"><?=$dataUsahaTop1['stu_nama']?></option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Jenis Tempat Usaha</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="jenis_tempat_usaha" readonly>
                                        <option value="<?=$dataUsahaTop1['jtu_id']?>"><?=$dataUsahaTop1['jtu_nama']?></option>
                                </select>
                            </div>
                        </div>    
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Aspek Pemasaran</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="aspek_pemasaran" readonly>
                                        <option value="<?=$dataUsahaTop1['ap_id']?>"><?=$dataUsahaTop1['ap_nama']?></option>
                                </select>
                            </div>
                        </div>    
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Jenis Usaha</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="jenis_usaha" readonly>
                                        <option value="<?=$dataUsahaTop1['ju_id']?>"><?=$dataUsahaTop1['ju_nama']?></option>
                                </select>
                            </div>
                        </div>    
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Lokasi Usaha</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="lokasi_usaha" readonly>
                                        <option value="<?=$dataUsahaTop1['lu_id']?>"><?=$dataUsahaTop1['lu_nama']?></option>
                                </select>
                            </div>
                        </div>    
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Jarak Lokasi Usaha ke UM</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="jarak_lokasi_usaha" required="" value="<?=$dataUsahaTop1['jarak_lokasi_usaha']?>" readonly>
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
                <div class="panel-heading hbuilt" style="background-color: rgba(0,126,0,1);color: white;">
                    <div class="panel-tools">
                        <a class="showhide"><i class="fa fa-chevron-up"></i></a>
                    </div>
                    Analisa Keuangan (per Bulan)
                </div>
                <div class="panel-body">
                    
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Pendapatan Usaha / Sales</label>
                            <div class="col-sm-9">
                                <input id="sum_pendapatan_usaha" type="text" class="form-control auto_numformat pendapatan" name="sum_pendapatan_usaha" required="" readonly value="<?=number_format($dataLkd1Sum['sum_pendapatan_usaha'],0,',','.')?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Gaji Pegawai</label>
                            <div class="col-sm-9">
                                <input id="sum_gaji" type="text" class="form-control auto_numformat" name="sum_gaji" required="" readonly value="<?=number_format($dataLkd1Sum['sum_gaji'],0,',','.')?>">
                            </div>
                        </div>  
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Harga Pokok Penjualan</label>
                            <div class="col-sm-9">
                                <input id='sum_harga_pokok_penjualan' type="text" class="form-control auto_numformat" name="sum_harga_pokok_penjualan" required="" readonly value="<?=number_format($dataLkd1Sum['sum_harga_pokok_penjualan'],0,',','.')?>">
                            </div>
                        </div>    
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Sewa Kontrak</label>
                            <div class="col-sm-9">
                                <input id="sum_sewa_kontrak" type="text" class="form-control auto_numformat" name="sum_sewa_kontrak" required="" readonly  value="<?=number_format($dataLkd1Sum['sum_sewa'],0,',','.')?>">
                            </div>
                        </div>    
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Biaya Telpon/Listrik/Air</label>
                            <div class="col-sm-9">
                                <input id="sum_biaya_telpon_listrik_air" type="text" class="form-control auto_numformat" name="sum_biaya_telpon_listrik_air" required="" readonly value="<?=number_format($dataLkd1Sum['sum_biaya_telpon_listrik_air'],0,',','.')?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Transportasi</label>
                            <div class="col-sm-9">
                                <input id="sum_biaya_transportasi" type="text" class="form-control auto_numformat" name="sum_biaya_transportasi" required="" readonly value="<?=number_format($dataLkd1Sum['sum_biaya_transportasi'],0,',','.')?>">
                            </div>
                        </div>  
                        
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Pengeluaran Lainnya</label>
                            <div class="col-sm-9">
                                <input  type="text" class="form-control auto_numformat" name="sum_pengeluaran_lainnya" required="" readonly value="<?=number_format($dataLkd1Sum['sum_pengeluaran_lainnya'],0,',','.')?>">
                            </div>
                        </div> 
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Pengeluaran Usaha</label>
                            <div class="col-sm-9">
                                <input id="auto_pengeluaran" type="text" class="form-control auto_numformat" name="sum_pengeluaran_usaha" required="" readonly="" value="<?=number_format($dataLkd1Sum['sum_pengeluaran_usaha'],0,',','.')?>">
                            </div>
                        </div> 
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Penghasilan Lainnya</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control auto_numformat" name="sum_penghasilan_lainnya" required="" readonly="" value="<?=number_format($dataLkd1Sum['sum_penghasilan_lainnya'],0,',','.')?>">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Keuntungan Usaha</label>
                            <div class="col-sm-9">
                                <input id="keuntungan_usaha" type="text" class="form-control auto_numformat" name="sum_keuntungan_usaha" required="" readonly="" value="<?=number_format($dataLkd1Sum['sum_keuntungan_usaha'],0,',','.')?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Total Penghasilan</label>
                            <div class="col-sm-9">
                                <input id="sum_total_penghasilan" type="text" class="form-control auto_numformat" name="sum_total_penghasilan" required="" readonly="" value="<?=number_format($dataLkd1Sum['sum_total_penghasilan'],0,',','.')?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Pajak dan Restribusi</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control auto_numformat" name="pajak_restribusi" required="" readonly value="<?=number_format($dataLkd2['pajak_restribusi'],0,',','.')?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Belanja Rumah Tangga</label>
                            <div class="col-sm-9">
                                <input id="belanja_rumah_tangga" type="text" class="form-control auto_numformat pengeluaran" name="belanja_rumah_tangga" required="" readonly value="<?=number_format($dataLkd2['belanja_rumah_tangga'],0,',','.')?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Sewa Kontrak/Rumah</label>
                            <div class="col-sm-9">
                                <input id="sewa" type="text" class="form-control auto_numformat pengeluaran" name="sewa" required="" readonly value="<?=number_format($dataLkd2['sewa_kontrak_rumah'],0,',','.')?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Pendidikan</label>
                            <div class="col-sm-9">
                                <input id="pendidikan" type="text" class="form-control auto_numformat pengeluaran" name="pendidikan" required="" readonly value="<?=number_format($dataLkd2['pendidikan'],0,',','.')?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Telpon, Listrik & Air</label>
                            <div class="col-sm-9">
                                <input id="telpon_listrik_air" type="text" class="form-control auto_numformat pengeluaran" name="biaya_telpon_listrik_air" required="" readonly value="<?=number_format($dataLkd2['biaya_telpon_listrik_air'],0,',','.')?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Transportasi</label>
                            <div class="col-sm-9">
                                <input id="transportasi" type="text" class="form-control auto_numformat pengeluaran" name="biaya_transportasi" required="" readonly value="<?=number_format($dataLkd2['biaya_transportasi'],0,',','.')?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Pengeluaran Lainnya</label>
                            <div class="col-sm-9">
                                <input id="pengeluaran_lainnya" type="text" class="form-control auto_numformat pengeluaran" name="pengeluaran_lainnya" required="" readonly value="<?=number_format($dataLkd2['pengeluaran_lainnya'],0,',','.')?>">
                            </div>
                        </div> 
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Total Pengeluaran</label>
                            <div class="col-sm-9">
                                <input id="total_pengeluaran" type="text" class="form-control" name="total_pengeluaran" required="" readonly="" value="<?=number_format($dataLkd2['total_pengeluaran'],0,',','.')?>">
                            </div>
                        </div> 
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Sisa Penghasilan</label>
                            <div class="col-sm-9">
                                <input id="sisa_penghasilan" type="text" class="form-control auto_numformat" name="sisa_penghasilan" required="" readonly="" value="<?=number_format($dataLkd2['sisa_penghasilan'],0,',','.')?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Angsuran Pinjaman Saat ini</label>
                            <div class="col-sm-9">
                                <input id="angsuran_pinjaman_saatini" type="text" class="form-control auto_numformat" name="angsuran_pinjaman_saatini" value="<?=number_format($dataAngsuran,0,',','.')?>" required="" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Rekomendasi Angsuran Kredit</label>
                            <div class="col-sm-9">
                                <input id="rekomendasi_angsuran_kredit" type="text" class="form-control auto_numformat" name="rekomendasi_angsuran_kredit" required="" readonly="" value="<?=number_format($dataLkd2['rekomendasi_angsuran_kredit'],0,',','.')?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Disposable Income</label>
                            <div class="col-sm-9">
                                <input id="disposable_income" type="text" class="form-control auto_numformat" name="disposable_income" required="" readonly="" value="<?=number_format($dataLkd2['disposable_income'],0,',','.')?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">IDIR (Dalam %)</label>
                            <div class="col-sm-9">
                                <input id="idir" type="number" class="form-control auto_numformat" name="idir" required="" readonly="" value="<?=$dataLkd2['idir']?>">
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
                <div class="panel-heading hbuilt" style="background-color: rgba(0,126,255,1);color: white;">
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
                                <input id="sum_persediaan_inventory" type="text" class="form-control auto_numformat dohcalculate" name="sum_persediaan_inventory" required="" readonly="" value="<?=number_format($dataLkd1Sum['sum_persediaan_inventory'],0,',','.')?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Piutang Dagang </label>
                            <div class="col-sm-9">
                                <input id="sum_piutang_dagang" type="text" class="form-control auto_numformat dohcalculate" name="sum_piutang_dagang" required="" readonly="" value="<?=number_format($dataLkd1Sum['sum_piutang_dagang'],0,',','.')?>">
                            </div>
                        </div>    
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Utang Dagang </label>
                            <div class="col-sm-9">
                                <input id="sum_utang_dagang" type="text" class="form-control auto_numformat dohcalculate" name="sum_utang_dagang" required="" readonly="" value="<?=number_format($dataLkd1Sum['sum_utang_dagang'],0,',','.')?>">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-sm-3 control-label">WI Neraca</label>
                            <div class="col-sm-9">
                                <input id="sum_wi_neraca" type="text" class="form-control auto_numformat" name="sum_wi_neraca" required="" readonly="" value="<?=number_format($dataLkd1Sum['sum_wi_neraca'],0,',','.')?>">
                            </div>
                        </div>    
                        <div class="form-group">
                            <label class="col-sm-3 control-label">DOH Persediaan/Inventory </label>
                            <div class="col-sm-9">
                                <input id="doh_persediaan_inventory" type="text" class="form-control " name="doh_persediaan_inventory" required="" readonly="" value="<?=$dataLkd2['doh_persediaan_inventory']?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">DOH Piutang Dagang </label>
                            <div class="col-sm-9">
                                <input id="doh_piutang_dagang" type="text" class="form-control " name="doh_piutang_dagang" required="" readonly="" value="<?=$dataLkd2['doh_piutang_dagang']?>">
                            </div>
                        </div>    
                        <div class="form-group">
                            <label class="col-sm-3 control-label">DOH Utang Dagang </label>
                            <div class="col-sm-9">
                                <input id="doh_utang_dagang" type="text" class="form-control " name="doh_utang_dagang" required="" readonly="" value="<?=$dataLkd2['doh_utang_dagang']?>">
                            </div>
                        </div>    
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Gross Profit Margin</label>
                            <div class="col-sm-9">
                                <input id="gross_profit_margin" type="number" class="form-control " name="gross_profit_margin" required="" readonly="" value="<?=$dataLkd2['gross_profit_margin']?>">
                            </div>
                        </div>   
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Perputaran Persediaan Barang</label>
                            <div class="col-sm-9">
                                <input id="perputaran_persediaan_dagang" type="text" class="form-control dohcalculate" name="perputaran_persediaan_dagang" required="" readonly value="<?=$dataLkd2['perputaran_persediaan_barang']?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Perputaran Piutang Dagang</label>
                            <div class="col-sm-9">
                                <input id="perputaran_piutang_dagang" type="text" class="form-control dohcalculate" name="perputaran_piutang_dagang" required="" value="<?=$dataLkd2['perputaran_piutang_dagang']?>">
                            </div>
                        </div>  
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Perputaran Utang Dagang</label>
                            <div class="col-sm-9">
                                <input id="perputaran_utang_dagang" type="text" class="form-control dohcalculate" name="perputaran_utang_dagang" required="" value="<?=$dataLkd2['perputaran_utang_dagang']?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Kebutuhan Modal Kerja DOH </label>
                            <div class="col-sm-9">
                                <input id="kebutuhan_modal_kerja_doh" type="text" class="form-control" name="kebutuhan_modal_kerja_doh" required="" readonly="" value="<?=$dataLkd2['kebutuhan_modal_kerja_doh']?>">
                            </div>
                        </div> 
                        <div class="form-group">
                            <label class="col-sm-3 control-label">WI Normal</label>
                            <div class="col-sm-9">
                                <input id="sum_wi_normal" type="text" class="form-control auto_numformat" name="sum_wi_normal" required="" readonly="" value="<?=$dataLkd2['wi_normal']?>">
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
                <div class="panel-heading hbuilt" style="background-color: rgba(255,126,0,1);color: white;">
                    <div class="panel-tools">
                        <a class="showhide"><i class="fa fa-chevron-up"></i></a>
                    </div>
                    Rekomendasi Fasilitas Kredit
                </div>
                <div class="panel-body">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Rekomendasi Produk </label>
                            <div class="col-sm-6">
                                <input id="" type="text" class="form-control " name="rekomendasi_produk" readonly="" required="" value="<?=$dataKredit['nama_fasilitas']?>" readonly>
                            </div>
                            <div class="col-sm-3">
                                <input id="" type="text" class="form-control " name="kode_produk" readonly="" required="" value="<?=$dataKredit['kode_fasilitas']?>" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Rekomendasi Nilai Kredit </label>
                            <div class="col-sm-9">
                                <input id="rekomendasi_nilai_kredit" type="text" class="form-control auto_numformat calcrekomendasi" name="rekomendasi_nilai_kredit" required="" readonly="" value="<?=$dataLkd2['rekomendasi_nilai_kredit']?>">
                            </div>
                        </div>    
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Jangka Waktu Kredit (Bulan)</label>
                            <div class="col-sm-9">
                                <input id="jangka_waktu_kredit" type="text" class="form-control " name="jangka_waktu_kredit" required="" readonly="" value="<?=$dataLkd2['jangka_waktu_kredit']?>">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Bunga Per Bulan (Format x.xx)</label>
                            <div class="col-sm-9">
                                <input id="bunga_per_bulan" type="number" class="form-control" name="bunga_per_bulan" required="" step="0.01" readonly="" value="<?=$dataLkd2['bunga_per_bulan']?>">
                            </div>
                        </div>    
                        
                        <div class="form-group">
                            <label class="col-sm-3 control-label">EFF Bunga(p.a)(Format x.xxxx)</label>
                            <div class="col-sm-9">
                                <input id="eff" type="number" class="form-control calcrekomendasi" name="eff" required="" step="0.0001" readonly="" value="<?=$dataLkd2['eff']?>">
                            </div>
                        </div>


                        
                    </div>
                    
                    
                    
                    
                </div>
            </div>
        </div>
        
    </div>

   
</form>


