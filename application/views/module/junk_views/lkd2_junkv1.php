<?php 

?>

<div class="row">
    
        <?php 
            if(!empty($_SESSION['msg'])){
                echo "<div class='alert alert-success'>$_SESSION[msg] </div>";
                unset($_SESSION['msg']);
            }
            // print_r($dataUsahaTop1);
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
                <div class="panel-heading hbuilt">
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
                                <input type="text" class="form-control auto_numformat" name="pajak_restribusi" required="">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Belanja Rumah Tangga</label>
                            <div class="col-sm-9">
                                <input id="belanja_rumah_tangga" type="text" class="form-control auto_numformat pengeluaran" name="belanja_rumah_tangga" required="" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Sewa Kontrak/Rumah</label>
                            <div class="col-sm-9">
                                <input id="sewa" type="text" class="form-control auto_numformat pengeluaran" name="sewa" required="" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Pendidikan</label>
                            <div class="col-sm-9">
                                <input id="pendidikan" type="text" class="form-control auto_numformat pengeluaran" name="pendidikan" required="" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Telpon, Listrik & Air</label>
                            <div class="col-sm-9">
                                <input id="telpon_listrik_air" type="text" class="form-control auto_numformat pengeluaran" name="telpon_listrik_air" required="" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Transportasi</label>
                            <div class="col-sm-9">
                                <input id="transportasi" type="text" class="form-control auto_numformat pengeluaran" name="transportasi" required="" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Pengeluaran Lainnya</label>
                            <div class="col-sm-9">
                                <input id="pengeluaran_lainnya" type="text" class="form-control auto_numformat pengeluaran" name="pengeluaran_lainnya" required="">
                            </div>
                        </div> 
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Total Pengeluaran</label>
                            <div class="col-sm-9">
                                <input id="total_pengeluaran" type="text" class="form-control" name="total_pengeluaran" required="" readonly="">
                            </div>
                        </div> 
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Sisa Penghasilan</label>
                            <div class="col-sm-9">
                                <input id="sisa_penghasilan" type="text" class="form-control auto_numformat" name="sisa_penghasilan" required="" readonly="">
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
                                <input id="rekomendasi_angsuran_kredit" type="text" class="form-control auto_numformat" name="rekomendasi_angsuran_kredit" required="" readonly="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Disposable Income</label>
                            <div class="col-sm-9">
                                <input id="disposable_income" type="text" class="form-control auto_numformat" name="disposable_income" required="" readonly="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">IDIR</label>
                            <div class="col-sm-9">
                                <input id="idir" type="text" class="form-control auto_numformat" name="idir" required="" readonly="">
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
                                <input id="doh_persediaan_inventory" type="text" class="form-control " name="doh_persediaan_inventory" required="" readonly="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">DOH Piutang Dagang </label>
                            <div class="col-sm-9">
                                <input id="doh_piutang_dagang" type="text" class="form-control " name="doh_piutang_dagang" required="" readonly="">
                            </div>
                        </div>    
                        <div class="form-group">
                            <label class="col-sm-3 control-label">DOH Utang Dagang </label>
                            <div class="col-sm-9">
                                <input id="doh_utang_dagang" type="text" class="form-control " name="doh_utang_dagang" required="" readonly="">
                            </div>
                        </div>    
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Gross Profit Margin</label>
                            <div class="col-sm-9">
                                <input id="gross_profit_margin" type="text" class="form-control " name="gross_profit_margin" required="" readonly="">
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
                                <input id="sum_wi_normal" type="text" class="form-control auto_numformat" name="sum_wi_normal" required="" readonly="" >
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
                    Rekomendasi Fasilitas Kredit
                </div>
                <div class="panel-body">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Rekomendasi Produk </label>
                            <div class="col-sm-6">
                                <input id="" type="text" class="form-control " name="rekomendasi_produk" readonly="" required="" value="<?=$dataKredit['nama_fasilitas']?>">
                            </div>
                            <div class="col-sm-3">
                                <input id="" type="text" class="form-control " name="kode_produk" readonly="" required="" value="<?=$dataKredit['kode_fasilitas']?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Rekomendasi Nilai Kredit </label>
                            <div class="col-sm-9">
                                <input id="rekomendasi_nilai_kredit" type="text" class="form-control auto_numformat calcrekomendasi" name="rekomendasi_nilai_kredit" required="">
                            </div>
                        </div>    
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Jangka Waktu Kredit (Bulan)</label>
                            <div class="col-sm-9">
                                <input id="jangka_waktu_kredit" type="text" class="form-control " name="jangka_waktu_kredit" required="">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Bunga Per Bulan (Format x,xx)</label>
                            <div class="col-sm-9">
                                <input id="bunga_per_bulan" type="number" class="form-control" name="bunga_per_bulan" required="" step="0.01" readonly="">
                            </div>
                        </div>    
                        
                        <div class="form-group">
                            <label class="col-sm-3 control-label">EFF Bunga(p.a)(Format x,xxxx)</label>
                            <div class="col-sm-9">
                                <input id="eff" type="number" class="form-control calcrekomendasi" name="eff" required="" step="0.0001">
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
    function updateGrossProfit(){
        var num1 = parseInt($("#sum_pendapatan_usaha").val().split('.').join(''));
        var num2 = parseInt($("#sum_harga_pokok_penjualan").val().split('.').join(''));

        var calc = (num1-num2)/num1;
        $("#gross_profit_margin").val(calc);
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
        
        $("#total_pengeluaran").val(numberWithCommas(totalPengeluaran));
        
        //Update sisa
        
        
        var totalPendapatan =  parseInt($("#sum_total_penghasilan").val().split('.').join(''));
        var hitungAkhir = totalPendapatan-totalPengeluaran;
        if(hitungAkhir < 0){
            hitungAkhir = 0;
        }
        $("#sisa_penghasilan").val(numberWithCommas(hitungAkhir));

        var angsuran_pinjaman_saatini =  parseInt($("#angsuran_pinjaman_saatini").val().split('.').join(''));
        var rekomendasi_angsuran_kredit =  parseInt($("#rekomendasi_angsuran_kredit").val().split('.').join(''));
        var disposable_income = hitungAkhir - angsuran_pinjaman_saatini - rekomendasi_angsuran_kredit;
        $("#disposable_income").val(numberWithCommas(hitungAkhir));
        updateGrossProfit();
    }

    function updateDohPersediaan(){
        var num1 = $("#sum_persediaan_inventory").val().split('.').join('');
        var num2 = $("#sum_harga_pokok_penjualan").val().split('.').join('');

        var calc = (parseInt(num1)/parseInt(num2)) * 30;

        $("#doh_persediaan_inventory").val((calc));
    }
    function updateDohPiutang(){
        var num1 = $("#sum_piutang_dagang").val().split('.').join('');
        var num2 = $("#sum_pendapatan_usaha").val().split('.').join('');

        var calc = (parseInt(num1)/parseInt(num2)) * 30;
        $("#doh_piutang_dagang").val((calc));
    }
    function updateDohUtang(){
        var num1 = $("#sum_utang_dagang").val().split('.').join('');
        var num2 = $("#sum_harga_pokok_penjualan").val().split('.').join('');

        var calc = (parseInt(num1)/parseInt(num2)) * 30;
        $("#doh_utang_dagang").val((calc));
    }
    function updatewinormal(){
        var num1 = parseInt($("#kebutuhan_modal_kerja_doh").val().split('.').join(''));
        var num2 = parseInt($("#sum_harga_pokok_penjualan").val().split('.').join(''));
        
        
        var calc = (num1/30)*num2;
        // alert(calc);
        $("#sum_wi_normal").val(numberWithCommas(calc));
    }
    function updatemodakerjadoh(){
        var num1 = parseInt($("#perputaran_persediaan_dagang").val().split('.').join(''));
        var num2 = parseInt($("#perputaran_piutang_dagang").val().split('.').join(''));
        var num3 = parseInt($("#perputaran_utang_dagang").val().split('.').join(''));

        var calc = num1+num2-num3;
         $("#kebutuhan_modal_kerja_doh").val((calc));
    }
    function updateRekomendasiAngsuran(){
        var numPlafond = parseInt($("#rekomendasi_nilai_kredit").val().split('.').join(''));
        var numEff = parseFloat($("#eff").val());
        var numBungaPerBulan = parseFloat($("#bunga_per_bulan").val());
        var numJangka = parseInt($("#jangka_waktu_kredit").val().split('.').join(''));
        var numAngsuranSaatIni = parseInt($("#angsuran_pinjaman_saatini").val().split('.').join(''));
        var disposable_income = parseInt($("#disposable_income").val().split('.').join(''));

        var effective = <?=json_encode($dataKredit['skema_perhitungan']);?>;
        // alert(numBungaPerBulan);
        var num1 = numPlafond/numJangka;
        var num2 = numPlafond*numEff;
        var calc = ((numPlafond*(numBungaPerBulan/100)*numJangka)+numPlafond)/numJangka;
        
        if(effective=='Menurun'){
            var angsuran_pinjaman_saatini =  parseInt($("#angsuran_pinjaman_saatini").val().split('.').join(''));
            var sukuBungaPerbulan =(((angsuran_pinjaman_saatini * numJangka) - numPlafond )/ (numJangka/12) / numPlafond ) / 12;
            // var sukuBungaPerbulan =1;
            // calc=num1+(numPlafond*sukuBungaPerbulan);
            calc=((numPlafond*(numBungaPerBulan/100)*numJangka)+numPlafond)/numJangka;
        }

        var calc2 = parseFloat((numAngsuranSaatIni+calc)/disposable_income); 
        alert(calc2);
        $("#rekomendasi_angsuran_kredit").val((calc.toFixed(2)));
        $("#idir").val((calc2.toFixed(2)));
        

    }
    function executeall(){
        updateAnalisaKeuangan();
        updateDohPersediaan();
        updateDohPiutang();
        updateDohUtang();
        
        updatemodakerjadoh();
        updatewinormal();
        updateRekomendasiAngsuran();
    }
    $(".dohcalculate").change(function () {
        updateDohPersediaan();
        updateDohPiutang();
        updateDohUtang();
        
        updatemodakerjadoh();
        updatewinormal();

        
    });
    $(".pengeluaran").change(function () {
        updateAnalisaKeuangan();
        
    });

    $(".calcrekomendasi").change(function () {
        updateRekomendasiAngsuran();
        
    });
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
</script>
