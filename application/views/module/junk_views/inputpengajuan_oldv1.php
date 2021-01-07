
    <link rel="stylesheet" href="http://36.66.184.26/srd1/files/bower_components/select2/css/select2.min.css" />
    <link rel="stylesheet" href="http://36.66.184.26/srd1/files/assets/css/jquery.signature.css">    <div class="row">
    <style>
    .kbw-signature {
        width: 300px;
        height: 200px;
    }
    
     .display-toggle{
     display: none;
   }
   .select-normal{
        font-size: 14px !important;
        border-radius: 2px !important;
        border: 1px solid #cccccc !important;
        height: 35px !important;
    }
    .tag-caption{
        font-family: serif;
        font-size: 21px;
        font-weight: bold;
        color: #007cc1;
    }
</style>
        <div class="col-lg-12">
            <div class="hpanel">
                <div class="panel-body">
                    <form action="<?=base_url()?>user/saveFiles" name="simpleForm" novalidate id="simpleForm" action="#" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="dn_id" value="<?=$dn_id?>">
                        <div class="text-center m-b-md" id="wizardControl">
                            <a class="btn btn-primary" href="#step1" data-toggle="tab">Kredit</a>
                            <a class="btn btn-default" href="#step2" data-toggle="tab">Pemohon</a>
                            <a class="btn btn-default" href="#step3" data-toggle="tab">Pasangan</a>
                            <a class="btn btn-default" href="#step4" data-toggle="tab">Tempat Tinggal</a>
                            <a class="btn btn-default" href="#step5" data-toggle="tab">Pekerjaan</a>
                            <a class="btn btn-default" href="#step6" data-toggle="tab">Informsi lainya</a>
                            <a class="btn btn-default" href="#step7" data-toggle="tab">Detail</a>
                            <a class="btn btn-default" href="#step8" data-toggle="tab">Emergency Contact</a>
                            <a class="btn btn-default" href="#step9" data-toggle="tab">Berkas</a>
                        </div>
                        <div class="tab-content">
                        <div id="step1" class="p-m tab-pane active">

                            <div class="row">

                                <div class="col-lg-12">
                                    <div class="row">
                                    <div class="form-group col-lg-12">
                                            <label>Jenis Produk</label>
                                            <select type="text" value="" id="" class="form-control" name="jns_produk" >
                                                <option value="" selected disabled>= Pilih Jenis Produk =</option>
                                                <option>Jateng 25</option>
                                                <option>Jateng 50</option>
                                                <option>Jateng 100</option>
                                                <option>Jateng 300</option>
                                                <option>Jateng 500</option>
                                                <option>Jateng Lainya</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-lg-12">
                                            <label>Nilai Kredit Yang Di Minta</label>
                                            <input type="text" value="" id="" onkeyup="angka(this);" class="form-control" name="nilai_kredit"  >
                                        </div>
                                        <div class="form-group col-lg-12">
                                            <label>Jangka waktu Kredit</label>
                                            <input type="text" value="" id="" onkeyup="angka(this);" class="form-control" name="waktu_kredit" >
                                        </div>
                                        <div class="form-group col-lg-12">
                                            <label>Tujuan Pengajuan Kredit</label>
                                            <input type="text" value="" id="" class="form-control" name="tujuan_kredit">
                                        </div>
                                        <div class="form-group col-lg-12">
                                            <label>Detail Tujuan Kredit</label>
                                            <input type="text" value="" id="" class="form-control" name="detail_kredit" >
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-right m-t-xs">
                               <a class="btn btn-default next" href="#">Next</a>
                            </div>
                        </div>

                        <div id="step2" class="p-m tab-pane">

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="form-group col-lg-12">
                                            <label>Nama (Sesuai KTP)</label>
                                            <input type="text" value="" id="" class="form-control" name="nama_ktp" >
                                        </div>
                                        <div class="form-group col-lg-12">
                                            <label>Nama Panggilan</label>
                                            <input type="text" value="" id="" class="form-control" name="nama_panggilan" >
                                        </div>
                                        <div class="form-group col-lg-12">
                                            <label>Jenis Kelamin</label>
                                            <select type="text" value="" id="" class="form-control" name="jns_kelamin" >
                                                <option value="" selected disabled>= Pilih Jenis Kelamin =</option>
                                                <option value="l">Laki - laki</option>
                                                <option value="p">Perempuan</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-lg-12">
                                            <label>No KTP</label>
                                            <input type="text" value="" id="" class="form-control" name="no_ktp" >
                                        </div>
                                        <div class="form-group col-lg-12">
                                            <label>Status Perkawinan</label>
                                            <select type="text" value="" id="" class="form-control" name="status_nikah" >
                                                <option value="" selected disabled>= Pilih Status perkawinan =</option>
                                                <option>Lajang</option>
                                                <option>Kawin</option>
                                                <option>Duda/Janda</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-lg-12">
                                            <label>Tempat Lahir</label>
                                            <input type="text" value="" id="" class="form-control" name="tempat_lahir" >
                                        </div>
                                        <div class="form-group col-lg-3">
                                            <label>Tanggal Lahir</label>
                                            <input type="date" value="" id="" class="form-control" name="tgl_lahir" >
                                        </div>
                                        <div class="form-group col-lg-3">
                                            <label>Usia</label>
                                            <input type="text" value="" id="" class="form-control" name="usia" readonly>
                                            <span class="help-block m-b-none usia" style="color:red"></span>
                                        </div>
                                        <div class="form-group col-lg-12">
                                            <label>Pendidikan Terakhir</label>
                                            <select type="text" value="" id="" class="form-control" name="pendidikan" >
                                                <option value="" selected disabled>= Pilih Pendidikan Terakhir =</option>
                                                <option>Tidak Ada</option>
                                                <option>SD</option>
                                                <option>SLTP</option>
                                                <option>SLTA</option>
                                                <option>Diploma</option>
                                                <option>Sarjana</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-lg-12">
                                            <label>Nama Ibu Kandung</label>
                                            <input type="text" value="" id="" class="form-control" name="ibu_kandung" >
                                        </div>
                                        <div class="form-group col-lg-12">
                                            <label>Jumah tanggungan</label>
                                            <input type="text" value="" id="" class="form-control" name="jml_tanggungan" >
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-right m-t-xs">
                              <a class="btn btn-default next" href="#">Next</a>
                            </div>
                        </div>
                        <div id="step3" class="p-m  tab-pane">
                            <div class="row">
                            <div class="col-lg-12">
                                    <div class="row">
                                        <div class="form-group col-lg-12">
                                            <label>Nama Pasangan</label>
                                            <input type="text" value="" id="" class="form-control" name="nama_pasangan" >
                                        </div>
                                        <div class="form-group col-lg-3">
                                            <label>Tanggal Lahir pasangan</label>
                                            <input type="date" value="" id="" class="form-control" name="tgl_pasangan" >
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-right m-t-xs">
                              <a class="btn btn-default next" href="#">Next</a>
                            </div>
                        </div>
                        <div id="step4" class="p-m  tab-pane">
                            <div class="row">
                            <div class="col-lg-12">
                                    <div class="row">
                                        <div class="form-group col-lg-12">
                                            <label>Alamat</label>
                                            <input type="text" value="" id="" class="form-control" name="alamat_ktp" >
                                        </div>
                                        <div class="form-group col-lg-12">
                                            <label>RT</label>
                                            <input type="text" value="" id="" class="form-control" name="rt" >
                                        </div>
                                        <div class="form-group col-lg-12">
                                            <label>RW</label>
                                            <input type="text" value="" id="" class="form-control" name="rw" >
                                        </div>
                                        <div class="form-group col-lg-12">
                                            <label>Kode Pos</label>
                                            <input type="text" value="" id="" class="form-control" name="kode_pos" >
                                        </div>
                                        <div class="form-group col-lg-12">
                                            <label>Kelurahan</label>
                                            <input type="text" value="" id="" class="form-control" name="kelurahan" >
                                        </div>
                                        <div class="form-group col-lg-12">
                                            <label>Kecamatan</label>
                                            <input type="text" value="" id="" class="form-control" name="kecamatan" >
                                        </div>
                                        <div class="form-group col-lg-12">
                                            <label>Telephone</label>
                                            <input type="text" value="" id="" class="form-control" name="telephone_pribadi" >
                                        </div>
                                        <div class="form-group col-lg-12">
                                            <label>No HP</label>
                                            <input type="text" value="" id="" class="form-control" name="no_hp_pribadi" >
                                        </div>
                                        <div class="form-group col-lg-12">
                                            <label>Status Tempat Tinggal</label>
                                            <select  type="text" value="" id="" class="form-control" name="status_tempat_tinggal" >
                                                <option value="" selected disabled>= Pilih Status Tempat Tinggal =</option>
                                                <option>Milik Sendiri</option>
                                                <option>Milik Keluarga</option>
                                                <option>Warisan</option>
                                                <option>Kost</option>
                                                <option>Kontrak</option>
                                                <option>Lainya</option>
                                            </select>                                        
                                        </div>
                                        <div class="form-group col-lg-12">
                                            <label>Lama Menempati</label>
                                            <input type="text" value="" id="" class="form-control" name="lama_menempati" >
                                        </div>
                                        <div class="form-group col-lg-12">
                                            <label>Alamat Tinggal</label> <button type="button" class="badge btn-warning alamat-ktp">Sesuai KTP</button>
                                            <input type="text" value="" id="" class="form-control" name="alamat_tinggal" >
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-right m-t-xs">
                                <a class="btn btn-default next" href="#">Next</a>
                            </div>
                        </div>
                        <div id="step5" class="p-m  tab-pane">
                            <div class="row">
                            <div class="col-lg-12">
                                    <div class="row">
                                        <div class="form-group col-lg-12">
                                            <label>Tipe pendapatan</label>
                                            <select  type="text" value="" id="" class="form-control" name="tipe_pendapatan" >
                                                <option value="" selected disabled>= Pilih Tipe Pendapatan =</option>
                                                <option>Wiraswasta</option>
                                                <option>Pendapatan Tetap</option>
                                            </select>                                          
                                        </div>
                                        <div class="form-group col-lg-12">
                                            <label>Nama Usaha</label>
                                            <input type="text" value="" id="" class="form-control" name="nama_usaha" >
                                        </div>
                                        <div class="form-group col-lg-12">
                                            <label>Bidang Usaha</label>
                                            <select  type="text" value="" id="" class="form-control" name="bidang_usaha" >
                                                <option value="" selected disabled>= Pilih Status Tempat Tinggal =</option>
                                                <option>Perdagangan</option>
                                                <option>Perindustrian</option>
                                                <option>Jasa</option>
                                            </select>                                         
                                         </div>
                                        <div class="form-group col-lg-12">
                                            <label>Alamat</label>
                                            <input type="text" value="" id="" class="form-control" name="alamat_usaha" >
                                        </div>
                                        <div class="form-group col-lg-12">
                                            <label>No Telephone</label>
                                            <input type="text" value="" id="" class="form-control" name="telephone_usaha" >
                                        </div>
                                        <div class="form-group col-lg-12">
                                            <label>No NPWP</label>
                                            <input type="text" value="" id="" class="form-control" name="no_npwp" >
                                        </div>
                                        <div class="form-group col-lg-12">
                                            <label>Lama Usaha</label>
                                            <input type="text" value="" id="" class="form-control" name="lama_usaha" >
                                        </div>
                                        <div class="form-group col-lg-12">
                                            <label>Omset Rata-rata Perbulan</label>
                                            <input type="text" value="" id="" class="form-control" name="omset_rata" >
                                        </div>
                                        <div class="form-group col-lg-12">
                                            <label>Keuntungan Rata-rata Perbulan</label>
                                            <input type="text" value="" id="" class="form-control" name="keuntungan_rata" >
                                        </div>
                                        <div class="form-group col-lg-12">
                                            <label>Jumlah Keseluruhan Usaha</label>
                                            <input type="text" value="" id="" class="form-control" name="jumlah_usaha" >
                                        </div>
                                        <div class="form-group col-lg-12">
                                            <label>Jumlah Yang Di Biayai</label>
                                            <input type="text" value="" id="" class="form-control" name="jumlah_dibiayai" >
                                        </div>
         
                                    </div>
                                </div>
                            </div>
                            <label>Jumlah Keseluruhan Usaha Lebih Dari 1</label>
                            <?php
                                echo $output;
                            ?>
                            <div class="text-right m-t-xs">
                                <a class="btn btn-default next" href="#">Next</a>
                            </div>
                        </div>

                        <div id="step6" class="p-m  tab-pane">
                            <div class="row">
                            <div class="col-lg-12">
                                    <div class="row">
                                        <div class="form-group col-lg-12">
                                            <label>Saya Ingin Menggunakan Fasilitas Cash Pick-up</label>
                                            <select  type="text" value="" id="" class="form-control" name="cpu" >
                                                <option>Ya</option>
                                                <option>Tidak</option>
                                            </select>                                          
                                          </div>
                                        <div class="form-group col-lg-12">
                                            <label>Jika Ya, Frekuensi Cash Pick-up</label>
                                            <select  type="text" value="" id="" class="form-control" name="fcpu" >
                                                <option value="" selected disabled>= Pilih Frekuensi Cash Pick-up =</option>
                                                <option>Harian</option>
                                                <option>Minguan</option>
                                                <option>Dwi Mingguan</option>
                                                <option>Bulan</option>
                                            </select>                                            
                                        </div>
                                        <div class="form-group col-lg-12">
                                            <label>Apakah Memiliki Rekening Tabungan</label>
                                            <select  type="text" value="" id="" class="form-control" name="rekening_tabungan" >
                                                <option value="" selected disabled>= Pilih Ya/Tidak =</option>
                                                <option>Ya</option>
                                                <option>Tidak</option>
                                            </select>                                     
                                        </div>
                                        <div class="form-group col-lg-12">
                                            <label>Sejak Tahun</label>
                                            <input type="text" value="" id="" class="form-control" name="sejak_tahun" >
                                        </div>
                                        <div class="form-group col-lg-12">
                                            <label>Saldo Rata-rata</label>
                                            <input type="text" value="" id="" class="form-control" name="saldo_rata" >
                                        </div>
                                      
                                    </div>
                                </div>
                            </div>
                            <div class="text-right m-t-xs">
                                <a class="btn btn-default next" href="#">Next</a>
                            </div>
                        </div>
                        <div id="step7" class="p-m  tab-pane">
                            <div class="row">
                            <div class="col-lg-12">
                                    <div class="row">

                                        <input type="hidden" value="<?=date("Y-m-d")?>" id="" class="form-control" name="tgl_submit" >
                                        <div class="form-group col-lg-12">
                                            <label>No Aplikasi </label>
                                            <input type="text" value="" id="" class="form-control" name="no_aplikasi" readonly>
                                        </div>
                                        <div class="form-group col-lg-12">
                                            <label>Unit Area</label>
                                            <input type="text" value="" id="" class="form-control" name="unit_area" >
                                        </div>
                                        <div class="form-group col-lg-12">
                                            <label>Kode Marketing</label>
                                            <input type="text" value="" id="" class="form-control" name="kode_marketing" >
                                        </div>
                                        <div class="form-group col-lg-12">
                                            <label>Nama Marketing</label>
                                            <input type="text" value="" id="" class="form-control" name="nama_marketing" >
                                        </div>
                                        <div class="form-group col-lg-12">
                                            <label>Bagaimana Perkenalan terjadi</label>
                                            <select  type="text" value="" id="" class="form-control" name="perkenalan_terjadi" >
                                                <option value="" selected disabled>= Pilih Bagaimana Perkenalan terjadi =</option>
                                                <option>Referensi Nasabah Lama</option>
                                                <option>Marketing Menandatangani Pemohon</option>
                                                <option>Nasabah Lama</option>
                                                <option>Pemohon Datang Ke UM</option>
                                                <option>Pemohon Mendatangi Marketing</option>
                                                <option>Lainya</option>
                                            </select>                                      
                                           </div>
                                      
                                    </div>
                                </div>
                            </div>
                            <div class="text-right m-t-xs">
                                <a class="btn btn-default next" href="#">Next</a>
                            </div>
                        </div>
                        <div id="step8" class="p-m  tab-pane">
                            <div class="row">
                            <div class="col-lg-12">
                                    <div class="row">
                                        <div class="form-group col-lg-12">
                                            <label>Nama</label>
                                            <input type="text" value="" id="" class="form-control" name="nama_emergency" >
                                        </div>
                                        <div class="form-group col-lg-12">
                                            <label>Alamat </label>
                                            <input type="text" value="" id="" class="form-control" name="alamat_emergency" >
                                        </div>
                                        <div class="form-group col-lg-12">
                                            <label>No HP</label>
                                            <input type="text" value="" id="" class="form-control" name="no_hp_emergency" >
                                        </div>
                                        <div class="form-group col-lg-12">
                                            <label>Hubungan</label>
                                            <select type="text" value="" id="" class="form-control" name="hubungan_emergency" >
                                                <option  value="" selected disabled>= Pilih Hubungan =</option>
                                                <option>Orang Tua</option>
                                                <option>Mertua</option>
                                                <option>Saudara Kandung</option>
                                                <option>Sepupu</option>
                                                <option>Ipar</option>
                                                <option>Hubungan Kekerabatan Lainya</option>
                                            </select>                             
                                        </div>                                      
                                    </div>
                                </div>
                            </div>
                            <div class="text-right m-t-xs">
                                <a class="btn btn-default next" href="#">Next</a>
                            </div>
                        </div>
                        <div id="step9" class="p-m  tab-pane">
                            <div class="row">
                                
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="form-group col-lg-12">
                                            <label>Foto KTP Debitur</label>
                                            <input type="file" value="" id="" class="form-control" name="foto_ktp" >
                                        </div>                                     
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="form-group col-lg-12">
                                            <label>Foto KTP Pasangan</label>
                                            <input type="file" value="" id="" class="form-control" name="file_ktp_pasangan" >
                                        </div>                                     
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="form-group col-lg-12">
                                            <label>File Kartu Keluarga</label>
                                            <input type="file" value="" id="" class="form-control" name="foto_kk" >
                                        </div>                                     
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="form-group col-lg-12">
                                            <label>File Akta Nikah</label>
                                            <input type="file" value="" id="" class="form-control" name="file_akta_nikah" >
                                        </div>                                     
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="form-group col-lg-12">
                                            <label>NPWP</label>
                                            <input type="file" value="" id="" class="form-control" name="npwp" >
                                        </div>                                     
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="form-group col-lg-12">
                                            <label>Foto Debitur</label>
                                            <input type="file" value="" id="" class="form-control" name="foto_debitur" >
                                        </div>                                     
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="form-group col-lg-12">
                                            <label>Foto Pasangan</label>
                                            <input type="file" value="" id="" class="form-control" name="foto_pasangan" >
                                        </div>                                     
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="form-group col-lg-12">
                                            <label>Screenshot Geotagging</label>
                                            <input type="file" value="" id="" class="form-control" name="geotagging" >
                                        </div>                                     
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="form-group col-lg-12">
                                            <label>Surat Legalitas Usaha</label>
                                            <input type="file" value="" id="" class="form-control" name="slu" >
                                        </div>                                     
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="form-group col-lg-12">
                                            <label>Surat Legalitas Jaminan</label>
                                            <input type="file" value="" id="" class="form-control" name="slj" >
                                        </div>                                     
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <p style="font-size: 16 px;"><input type="checkbox" required name="terms">  Dengan menandatangani aplikasi ini, Saya menyatakan bahwa keterangan dalam aplikasi ini adalah lengkap dan benar.  Saya mengetahui bahwa Saya tidak berkewajiban untuk memberi imbalan dalam bentuk apapun kepada pihak Bank atau pihak ketiga jika permohonan pinjaman ini disetujui.</p>
                                </div>
                                <div class="col-lg-12">
                                    <td id="role-pimpinan"  style="display:none;">
                                        <div style="display: grid; width:300px;">
                                            <label>Tanda Tangan</label>
                                            <div id="pimpinan"></div>
                                            <button id="del-pimpinan" type="button" class="btn btn-danger btn-sm">Hapus TTD</button>
                                            <input type="hidden" name="ttd_pimpinan" id="ttd_pimpinan">
                                        </div>
                                    </td>
                                </div>

                                                                        
                            <div class="text-right m-t-xs">
                                <a class="btn btn-default next" href="#">Next</a>
                                <button type="submit" class="btn btn-success submitWizard">Save</button>
                            </div>
                        </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <script src="http://36.66.184.26/srd1/files/assets/js/jquery.signature.js"></script>

        
<script>
var pimpinan = $('#pimpinan').signature();

$("#submit").click(function (e) {

});

$('#del-pimpinan').click(function () {
    pimpinan.signature('clear');
});

$( document ).ready(function() {
    $('#role-pimpinan').show('fast');
    pimpinan.signature('clear');
    $("[name='nama_terang_pimpinan']").val('').prop('required', true);
    $("[name='ttd_pimpinan']").val('').prop('required', true);

    dn_id = '<?=$dn_id?>';
    $.ajax({
            url: '<?=base_url() ?>user/isiform',
            type: 'POST',
            dataType: 'json',
            data: {
                dn_id:dn_id,
            }
        }).done(function(response){

            console.log(response);
            $('[name="jns_produk"]').val(response[0].jns_produk);
            $('[name="nilai_kredit"]').val(response[0].nilai_kredit);
            $('[name="waktu_kredit"]').val(response[0].waktu_kredit);
            $('[name="tujuan_kredit"]').val(response[0].tujuan_kredit);
            $('[name="detail_kredit"]').val(response[0].detail_kredit);

            $('[name="nama_ktp"]').val(response[0].nama_ktp);
            $('[name="nama_panggilan"]').val(response[0].nama_panggilan);
            $('[name="jns_kelamin"]').val(response[0].jns_kelamin);
            $('[name="no_ktp"]').val(response[0].no_ktp);
            $('[name="status_nikah"]').val(response[0].status_nikah);
            $('[name="tempat_lahir"]').val(response[0].tempat_lahir);
            $('[name="tgl_lahir"]').val(response[0].tgl_lahir);
            $('[name="usia"]').val(response[0].usia);
            $('[name="pendidikan"]').val(response[0].pendidikan);
            $('[name="ibu_kandung"]').val(response[0].ibu_kandung);
            $('[name="jml_tanggungan"]').val(response[0].jml_tanggungan);

            $('[name="nama_pasangan"]').val(response[0].nama_pasangan);
            $('[name="tgl_pasangan"]').val(response[0].tgl_pasangan);

            $('[name="alamat_ktp"]').val(response[0].alamat_ktp);
            $('[name="rt"]').val(response[0].rt);
            $('[name="rw"]').val(response[0].rw);
            $('[name="kode_pos"]').val(response[0].kode_pos);
            $('[name="kelurahan"]').val(response[0].kelurahan);
            $('[name="kecamatan"]').val(response[0].kecamatan);
            $('[name="telephone_pribadi"]').val(response[0].telephone_pribadi);
            $('[name="no_hp_pribadi"]').val(response[0].no_hp_pribadi);
            $('[name="status_tempat_tinggal"]').val(response[0].status_tempat_tinggal);
            $('[name="lama_menempati"]').val(response[0].lama_menempati);
            $('[name="alamat_tinggal"]').val(response[0].alamat_tinggal);

            tipe_pendapatan = $('[name="tipe_pendapatan"]').val(response[0].tipe_pendapatan);
            nama_usaha = $('[name="nama_usaha"]').val(response[0].nama_usaha);
            bidang_usaha = $('[name="bidang_usaha"]').val(response[0].bidang_usaha);
            alamat_usaha = $('[name="alamat_usaha"]').val(response[0].alamat_usaha);
            telephone_usaha = $('[name="telephone_usaha"]').val(response[0].telephone_usaha);
            no_npwp = $('[name="no_npwp"]').val(response[0].no_npwp);
            lama_usaha = $('[name="lama_usaha"]').val(response[0].lama_usaha);
            omset_rata = $('[name="omset_rata"]').val(response[0].omset_rata);
            keuntungan_rata = $('[name="keuntungan_rata"]').val(response[0].keuntungan_rata);
            jumlah_usaha = $('[name="jumlah_usaha"]').val(response[0].jumlah_usaha);
            jumlah_dibiayai = $('[name="jumlah_dibiayai"]').val(response[0].jumlah_dibiayai);

            cpu = $('[name="cpu"]').val(response[0].cpu);
            fcpu = $('[name="fcpu"]').val(response[0].fcpu);
            rekening_tabungan = $('[name="rekening_tabungan"]').val(response[0].rekening_tabungan);
            sejak_tahun = $('[name="sejak_tahun"]').val(response[0].sejak_tahun);
            saldo_rata = $('[name="saldo_rata"]').val(response[0].saldo_rata);

            tgl_submit = $('[name="tgl_submit"]').val(response[0].tgl_submit);
            no_aplikasi = $('[name="no_aplikasi"]').val(response[0].no_aplikasi);
            unit_area = $('[name="unit_area"]').val(response[0].unit_area);
            kode_marketing = $('[name="kode_marketing"]').val(response[0].kode_marketing);
            nama_marketing = $('[name="nama_marketing"]').val(response[0].nama_marketing);
            perkenalan_terjadi = $('[name="perkenalan_terjadi"]').val(response[0].perkenalan_terjadi);

            nama_emergency = $('[name="nama_emergency"]').val(response[0].nama_emergency);
            alamat_emergency = $('[name="alamat_emergency"]').val(response[0].alamat_emergency);
            no_hp_emergency = $('[name="no_hp_emergency"]').val(response[0].no_hp_emergency);
            hubungan_emergency = $('[name="hubungan_emergency"]').val(response[0].hubungan_emergency);

        });
});

$('.alamat-ktp').click(function(){
    $('[name="alamat_tinggal"]').val($('[name="alamat_ktp"]').val())
})

function angka(e) {
    e.value = e.value.replace(/[^0-9]/g,'');
}

// format angka
function angka_format(e) {
    e.value = e.value.replace(/[^0-9.]/g,'');   
    var value = e.value,
        plain = plainNumber(value),
        reversed = reverseNumber(plain),
        reversedWithDots = reversed.match(/.{1,3}/g).join(','),
        normal = reverseNumber(reversedWithDots);
        e.value = normal;
}
function reverseNumber(input) {
    return [].map.call(input, function(x) {
    return x;
    }).reverse().join(''); 
}
function plainNumber(number) {  
    return number.split(',').join('');
}
// end

$('[name="tgl_lahir"]' ).change(function(){
    tgl_lahir = $('[name="tgl_lahir"]').val();
    var dob = new Date(tgl_lahir);
    console.log(dob);
    var today = new Date();
    console.log(today);
    var age = Math.floor((today-dob) / (365.25 * 24 * 60 * 60 * 1000));
    $('[name="usia"]').val(age);
    cek_usia();
})

$('[name="status_nikah"] , [name="waktu_kredit"]').change(function(){
    tgl_lahir = $('[name="tgl_lahir"]').val();
    if(tgl_lahir != ''){
        cek_usia();
    }
})

function cek_usia(){
    status_nikah = $('[name="status_nikah"]').val();
    usia = $('[name="usia"]').val();
    waktu_kredit = $('[name="waktu_kredit"]').val();
    usia_plus = Number(usia) + (Number(waktu_kredit)/12);
    console.log(usia_plus);
    if( usia <= 21 && status_nikah == 'Lajang'){
        $('.usia').html('Usia Tidak Valid');
    }else if(usia_plus >= 65){
        $('.usia').html('Usia Tidak Valid');
    }else{
        $('.usia').html('');
    }
}
$(function(){
    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
        console.log(e);
        $('a[data-toggle="tab"]').removeClass('btn-primary');
        $('a[data-toggle="tab"]').addClass('btn-default');
        $(this).removeClass('btn-default');
        $(this).addClass('btn-primary');
        dn_id = '<?=$dn_id?>';
        jns_produk = $('[name="jns_produk"]').val();
        nilai_kredit = $('[name="nilai_kredit"]').val();
        waktu_kredit = $('[name="waktu_kredit"]').val();
        tujuan_kredit = $('[name="tujuan_kredit"]').val();
        detail_kredit = $('[name="detail_kredit"]').val();

        nama_ktp = $('[name="nama_ktp"]').val();
        nama_panggilan = $('[name="nama_panggilan"]').val();
        jns_kelamin = $('[name="jns_kelamin"]').val();
        no_ktp = $('[name="no_ktp"]').val();
        status_nikah = $('[name="status_nikah"]').val();
        tempat_lahir = $('[name="tempat_lahir"]').val();
        tgl_lahir = $('[name="tgl_lahir"]').val();
        usia = $('[name="usia"]').val();
        pendidikan = $('[name="pendidikan"]').val();
        ibu_kandung = $('[name="ibu_kandung"]').val();
        jml_tanggungan = $('[name="jml_tanggungan"]').val();

        nama_pasangan = $('[name="nama_pasangan"]').val();
        tgl_pasangan = $('[name="tgl_pasangan"]').val();

        alamat_ktp = $('[name="alamat_ktp"]').val();
        rt = $('[name="rt"]').val();
        rw = $('[name="rw"]').val();
        kode_pos = $('[name="kode_pos"]').val();
        kelurahan = $('[name="kelurahan"]').val();
        kecamatan = $('[name="kecamatan"]').val();
        telephone_pribadi = $('[name="telephone_pribadi"]').val();
        no_hp_pribadi = $('[name="no_hp_pribadi"]').val();
        status_tempat_tinggal = $('[name="status_tempat_tinggal"]').val();
        lama_menempati = $('[name="lama_menempati"]').val();
        alamat_tinggal = $('[name="alamat_tinggal"]').val();

        tipe_pendapatan = $('[name="tipe_pendapatan"]').val();
        nama_usaha = $('[name="nama_usaha"]').val();
        bidang_usaha = $('[name="bidang_usaha"]').val();
        alamat_usaha = $('[name="alamat_usaha"]').val();
        telephone_usaha = $('[name="telephone_usaha"]').val();
        no_npwp = $('[name="no_npwp"]').val();
        lama_usaha = $('[name="lama_usaha"]').val();
        omset_rata = $('[name="omset_rata"]').val();
        keuntungan_rata = $('[name="keuntungan_rata"]').val();
        jumlah_usaha = $('[name="jumlah_usaha"]').val();
        jumlah_dibiayai = $('[name="jumlah_dibiayai"]').val();

        cpu = $('[name="cpu"]').val();
        fcpu = $('[name="fcpu"]').val();
        rekening_tabungan = $('[name="rekening_tabungan"]').val();
        sejak_tahun = $('[name="sejak_tahun"]').val();
        saldo_rata = $('[name="saldo_rata"]').val();

        tgl_submit = $('[name="tgl_submit"]').val();
        no_aplikasi = $('[name="no_aplikasi"]').val();
        unit_area = $('[name="unit_area"]').val();
        kode_marketing = $('[name="kode_marketing"]').val();
        nama_marketing = $('[name="nama_marketing"]').val();
        perkenalan_terjadi = $('[name="perkenalan_terjadi"]').val();

        nama_emergency = $('[name="nama_emergency"]').val();
        alamat_emergency = $('[name="alamat_emergency"]').val();
        no_hp_emergency = $('[name="no_hp_emergency"]').val();
        hubungan_emergency = $('[name="hubungan_emergency"]').val();

        $.ajax({
            url: '<?=base_url() ?>user/updateso',
            type: 'POST',
            dataType: 'json',
            data: {
                dn_id:dn_id,
                jns_produk:jns_produk,
                nilai_kredit:nilai_kredit,  
                waktu_kredit:waktu_kredit,
                tujuan_kredit:tujuan_kredit,
                detail_kredit:detail_kredit,

                nama_ktp:nama_ktp,
                nama_panggilan:nama_panggilan,
                jns_kelamin:jns_kelamin,
                no_ktp:no_ktp,
                status_nikah:status_nikah,
                tempat_lahir:tempat_lahir,
                tgl_lahir:tgl_lahir,
                usia:usia,
                pendidikan:pendidikan,
                ibu_kandung:ibu_kandung,
                jml_tanggungan:jml_tanggungan,

                nama_pasangan:nama_pasangan,
                tgl_pasangan:tgl_pasangan,

                alamat_ktp:alamat_ktp,
                rt:rt,
                rw:rw,
                kode_pos:kode_pos,
                kelurahan:kelurahan,
                kecamatan:kecamatan,
                telephone_pribadi:telephone_pribadi,
                no_hp_pribadi:no_hp_pribadi,
                status_tempat_tinggal:status_tempat_tinggal,
                lama_menempati:lama_menempati,
                alamat_tinggal:alamat_tinggal,

                tipe_pendapatan:tipe_pendapatan,
                nama_usaha:nama_usaha,
                bidang_usaha:bidang_usaha,
                alamat_usaha:alamat_usaha,
                telephone_usaha:telephone_usaha,
                no_npwp:no_npwp,
                lama_usaha:lama_usaha,
                omset_rata:omset_rata,
                keuntungan_rata:keuntungan_rata,
                jumlah_usaha:jumlah_usaha,
                jumlah_dibiayai:jumlah_dibiayai,

                cpu:cpu,
                fcpu:fcpu,
                rekening_tabungan:rekening_tabungan,
                sejak_tahun:sejak_tahun,
                saldo_rata:saldo_rata,

                tgl_submit:tgl_submit,
                no_aplikasi:no_aplikasi,
                unit_area:unit_area,
                kode_marketing:kode_marketing,
                nama_marketing:nama_marketing,
                perkenalan_terjadi:perkenalan_terjadi,

                nama_emergency:nama_emergency,
                alamat_emergency:alamat_emergency,
                no_hp_emergency:no_hp_emergency,
                hubungan_emergency:hubungan_emergency,
            }
        })
    })

    $('.next').click(function(){
        var nextId = $(this).parents('.tab-pane').next().attr("id");
        $('[href="#'+nextId+'"]').tab('show');
    })

    $('.prev').click(function(){
            var prevId = $(this).parents('.tab-pane').prev().attr("id");
            $('[href="#'+prevId+']"').tab('show');
        })

    $('.submitWizard').click(function(){

        var approve = $(".approveCheck").is(':checked');
        if(approve) {
            // Got to step 1
            $('[href=#step1]').tab('show');

            // Serialize data to post method
            var datastring = $("#simpleForm").serialize();

            // Show notification
            swal({
                title: "Thank you!",
                text: "You approved our example form!",
                type: "success"
            });
//            Example code for post form
//            $.ajax({
//                type: "POST",
//                url: "your_link.php",
//                data: datastring,
//                success: function(data) {
//                    // Notification
//                }
//            });
        } else {
            // Show notification
            swal({
                title: "Error!",
                text: "You have to approve form checkbox.",
                type: "error"
            });
        }
    })
});
</script>




