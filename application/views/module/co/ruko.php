<form id="form" action="<?=base_url()?>user/saveruko/<?=$dn_id?>"  method="post" enctype="multipart/form-data"><div class="row">
    <div class="row">
        <div class="col-lg-12">
            <div class="hpanel">
                <div class="panel-body">
                    <div class="row">
                                        
                        <div class="form-group">
                            <h4 class="col-sm-12 control-label">Penggolongan Ruko Komersial / Ruko Non Komersial (wajib diisi jika bangunan yang akan dinilai sebagai ruko)</h4>
                        </div>
                        <div class="form-group col-lg-12">
                            <table id="datamonitor" class="table table-bordered table-responsive">
                                <thead>
                                    <tr>
                                        <th style="color:red;" colspan="2">Note :</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Ruko Non Komersial</td>
                                        <td>Jika total scoring <a style="color:red;">< 9</a> maka <a style="color:red;">penilaian jaminan mengikuti ketentuan penilaian tanah dan bangunan</a></td>
                                    </tr>

                                    <tr>
                                        <td>Ruko Komersial</td>
                                        <td>Jika total scoring <a style="color:red;">≥ 9</a> maka <a style="color:red;">penilaian jaminan mengikuti ketentuan penilaian ruko komersial</a></td>
                        
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="form-group">
                            <h4 class="col-sm-10 control-label">Kondisi Ruko yang akan dijaminkan</h4>
                            <div class="col-sm-2">
                                <label>score</label>
                                <input type="text" value="" class="form-control" name="score_penggolongan" readonly>
                            </div>
                        </div>

                            <div class="form-group col-lg-6">
                                <label>Lokasi Ruko</label>
                                <select type="text" value="" class="form-control form-score-penggolongan" name="lokasi_ruko">
                                    <option value=""></option>
                                    <?php
                                    $lr = $this->db->get('lokasi_ruko')->result();
                                    foreach($lr as $v_lr){?>
                                    <option value="<?=$v_lr->score_lr?>||&$!#%||<?=$v_lr->id_lr?>"><?=$v_lr->nama_lr?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group col-lg-6">
                                <label>Fungsionalitas</label>
                                <select type="text" value="" class="form-control form-score-penggolongan" name="fungsionalitas">
                                    <option value=""></option>
                                    <?php
                                    $fungsionalitas = $this->db->get('fungsionalitas')->result();
                                    foreach($fungsionalitas as $v_fungsionalitas){?>
                                    <option value="<?=$v_fungsionalitas->score_fungsionalitas?>||&$!#%||<?=$v_fungsionalitas->id_fungsionalitas ?>"><?=$v_fungsionalitas->nama_fungsionalitas?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group col-lg-6">
                                <label>Area Jaminan</label>
                                <select type="text" value="" class="form-control form-score-penggolongan" name="area_jaminan">
                                    <option value=""></option>
                                    <?php
                                    $aj = $this->db->get('area_jaminan')->result();
                                    foreach($aj as $v_aj){?>
                                    <option value="<?=$v_aj->score_aj?>||&$!#%||<?=$v_aj->id_aj ?>"><?=$v_aj->nama_aj?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group col-lg-6">
                                <label>Bangunan</label>
                                <select type="text" value="" class="form-control form-score-penggolongan" name="bangunan_ruko">
                                    <option value=""></option>
                                    <?php
                                    $br = $this->db->get('bangunan_ruko')->result();
                                    foreach($br as $v_br){?>
                                    <option value="<?=$v_br->score_br?>||&$!#%||<?=$v_br->id_br ?>"><?=$v_br->nama_br?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group col-lg-6">
                                <label>Fasilitas Parkir Umum</label>
                                <select type="text" value="" class="form-control form-score-penggolongan" name="fasilitas_parkir_umum">
                                    <option value=""></option>
                                    <?php
                                    $fpu = $this->db->get('fasilitas_parkir_umum')->result();
                                    foreach($fpu as $v_fpu){?>
                                    <option value="<?=$v_fpu->score_fpu?>||&$!#%||<?=$v_fpu->id_fpu ?>"><?=$v_fpu->nama_fpu?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>                        
                            <div class="form-group col-lg-6">
                                <label>IMB</label>
                                <select type="text" value="" class="form-control form-score-penggolongan" name="imb">
                                    <option value=""></option>
                                    <?php
                                    $imb = $this->db->get('imb')->result();
                                    foreach($imb as $v_imb){?>
                                    <option value="<?=$v_imb->score_imb?>||&$!#%||<?=$v_imb->id_imb ?>"><?=$v_imb->nama_imb?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            
                    </div>
                </div>
                <div class="panel-body pesan-ruko ">
                    <div class="row">          
                        <div class="form-group ">
                            <h4 style="color:red;" class="col-sm-12 control-label text-center">LANJUTKAN DENGAN MENGGUNAKAN PENILAIAN TANAH DAN BANGUNAN !!</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>      

    <div class="row form-ruko-komersial">
        <div class="col-lg-12">
            <div class="hpanel">
                <h3>Ruko Komersial</h3>
                <div class="panel-body">
                    <div class="row">
                        <div class="form-group col-lg-4">
                            <label>Nama Debitur</label>
                            <input type="text" value="<?=$datakredit->nama_nasabah?>" class="form-control" name="nama_debitur" readonly>
                        </div>
                        <div class="form-group col-lg-4">
                            <label>No Aplikasi</label>
                            <input type="text" value="<?=$datakredit->no_aplikasi?>" class="form-control" name="no_aplikasi" readonly>
                        </div>
                        <div class="form-group col-lg-4 ">
                            <label>Tanggal Pemeriksaan</label>
                            <input type="date" value="" class="form-control" name="tanggal_pemeriksaan" >
                        </div>

                        <input type="hidden" value="ruko" class="form-control" name="bentuk_bangunan">
                        <div class="form-group col-lg-6">
                            <label>Kondisi Bangunan</label>
                            <select type="text" value="" class="form-control" name="kondisi_bangunan">
                                <option value="" selected disabled>= Pilih Kondisi Bangunan =</option>
                                <?php
                                $kb = $this->db->get('kondisi_bangunan')->result();
                                foreach($kb as $v_kb){?>
                                <option value="<?=$v_kb->id_kb?>"><?=$v_kb->nama_kb?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>


                        <div class="form-group">
                            <h4 class="col-sm-10 control-label">Penilaian Ruko Komersial</h4>
                            <div class="col-sm-2">
                                <label>score</label>
                                <input type="text" value="" class="form-control" name="score_ruko" readonly>
                            </div>
                        </div>

                        <div class="form-group col-lg-6">
                            <label>Lebar Jalan di Depan Komp Ruko</label>
                            <select type="text" value="" class="form-control form-score-ruko" name="lebar_jalan_di_depan_komp_ruko">
                                <option value=""></option>
                                <?php
                                $ljdkr = $this->db->get('lebar_jalan_di_depan_komp_ruko')->result();
                                foreach($ljdkr as $v_ljdkr){?>
                                <option value="<?=$v_ljdkr->score_ljdkr?>||&$!#%||<?=$v_ljdkr->id_ljdkr?>"><?=$v_ljdkr->nama_ljdkr?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group col-lg-6">
                            <label>Lebar Bangunan Ruko</label>
                            <select type="text" value="" class="form-control form-score-ruko" name="lebar_bangunan_ruko">
                                <option value=""></option>
                                <?php
                                $lbr = $this->db->get('lebar_bangunan_ruko')->result();
                                foreach($lbr as $v_lbr){?>
                                <option value="<?=$v_lbr->score_lbr?>||&$!#%||<?=$v_lbr->id_lbr ?>"><?=$v_lbr->nama_lbr?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group col-lg-6">
                            <label>Jalan di Depan Komp Ruko</label>
                            <select type="text" value="" class="form-control form-score-ruko" name="jalan_di_depan_komp_ruko">
                                <option value=""></option>
                                <?php
                                $jdkr = $this->db->get('jalan_di_depan_komp_ruko')->result();
                                foreach($jdkr as $v_jdkr){?>
                                <option value="<?=$v_jdkr->score_jdkr?>||&$!#%||<?=$v_jdkr->id_jdkr?>"><?=$v_jdkr->nama_jdkr?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>

                        <div class="form-group col-lg-6">
                            <label>Akses Umum</label>
                            <select type="text" value="" class="form-control form-score-ruko" name="akses_umum">
                                <option value=""></option>
                                <?php
                                $au = $this->db->get('akses_umum')->result();
                                foreach($au as $v_au){?>
                                <option value="<?=$v_au->score_au?>||&$!#%||<?=$v_au->id_au?>"><?=$v_au->nama_au?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>

                        <div class="form-group col-lg-6">
                            <label>Letak Tanah Bangunan Ruko</label>
                            <select type="text" value="" class="form-control form-score-ruko" name="letak_tanah_bangunan_ruko">
                                <option value=""></option>
                                <?php
                                $ltbr = $this->db->get('letak_tanah_bangunan_ruko')->result();
                                foreach($ltbr as $v_ltbr){?>
                                <option value="<?=$v_ltbr->score_ltbr?>||&$!#%||<?=$v_ltbr->id_ltbr?>"><?=$v_ltbr->nama_ltbr?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group col-lg-6">
                            <label>Lokasi Ruko dari Arah Pintu Masuk Jalan Utama</label>
                            <select type="text" value="" class="form-control form-score-ruko" name="lokasi_ruko_dari_arah_pintu_masuk_jalan_utama">
                                <option value=""></option>
                                <?php
                                $lrdapmju = $this->db->get('lokasi_ruko_dari_arah_pintu_masuk_jalan_utama')->result();
                                foreach($lrdapmju as $v_lrdapmju){?>
                                <option value="<?=$v_lrdapmju->score_lrdapmju?>||&$!#%||<?=$v_lrdapmju->id_lrdapmju?>"><?=$v_lrdapmju->nama_lrdapmju?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group col-lg-6">
                            <label>Lantai</label>
                            <select type="text" value="" class="form-control form-score-ruko" name="lantai_ruko">
                                <option value=""></option>
                                <?php
                                $lr = $this->db->get('lantai_ruko')->result();
                                foreach($lr as $v_lr){?>
                                <option value="<?=$v_lr->score_lr?>||&$!#%||<?=$v_lr->id_lr?>"><?=$v_lr->nama_lr?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group col-lg-8">
                            <label>Faktor Pengurang</label>
                            <select type="text" value="" class="form-control form-score-ruko" name="faktor_pengurang_ruko_1">
                                <option value=""></option>
                                <?php
                                $fpr = $this->db->get('faktor_pengurang_ruko')->result();
                                foreach($fpr as $v_fpr){?>
                                <option value="<?=$v_fpr->score_fpr?>||&$!#%||<?=$v_fpr->id_fpr?>"><?=$v_fpr->nama_fpr?></option>
                                <?php
                                }
                                ?>
                            </select>
                            <select type="text"  value="" class="form-control form-score-ruko" name="faktor_pengurang_ruko_2">
                                <option value=""></option>
                                <?php
                                $fpr = $this->db->get('faktor_pengurang_ruko')->result();
                                foreach($fpr as $v_fpr){?>
                                <option value="<?=$v_fpr->score_fpr?>||&$!#%||<?=$v_fpr->id_fpr?>"><?=$v_fpr->nama_fpr?></option>
                                <?php
                                }
                                ?>
                            </select>
                            <select type="text" value="" class="form-control form-score-ruko" name="faktor_pengurang_ruko_3">
                                <option value=""></option>
                                <?php
                                $fpr = $this->db->get('faktor_pengurang_ruko')->result();
                                foreach($fpr as $v_fpr){?>
                                <option value="<?=$v_fpr->score_fpr?>||&$!#%||<?=$v_fpr->id_fpr?>"><?=$v_fpr->nama_fpr?></option>
                                <?php
                                }
                                ?>
                            </select>
                            <select type="text" value="" class="form-control form-score-ruko" name="faktor_pengurang_ruko_3">
                                <option value=""></option>
                                <?php
                                $fpr = $this->db->get('faktor_pengurang_ruko')->result();
                                foreach($fpr as $v_fpr){?>
                                <option value="<?=$v_fpr->score_fpr?>||&$!#%||<?=$v_fpr->id_fpr?>"><?=$v_fpr->nama_fpr?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <h4 class="col-sm-12 control-label">lainya</h4>
                        </div>
                        <div class="form-group col-lg-4">
                            <label>Telephone</label>
                            <select type="text" value="" class="form-control" name="telepon">
                                <option value="" selected disabled>= Pilih Telephone =</option>
                                <option>Ada</option>
                                <option>Tidak Ada</option>
                            </select>
                        </div>
                        <div class="form-group col-lg-4">
                            <label>No Telepon</label>
                            <input type="text" value="" class="form-control" name="no_telepon" >

                        </div>

                        <div class="form-group col-lg-12">
                            <label>Alamat jaminan</label>
                            <input type="text" value="" class="form-control" name="alamat_jaminan" >
                        </div>
                        <div class="form-group col-lg-12">
                            <label>Kelurahan & Kecamatan</label>
                            <input type="text" value="" class="form-control" name="kelurahan_kecamatan" >
                        </div>
                        <div class="form-group col-lg-12">
                            <label>Wilayah Kota</label>
                            <input type="text" value="" class="form-control" name="wilayah_kota" >
                        </div>
                        <div class="form-group col-lg-6">
                            <label>Nama Pemegang Hak</label>
                            <input type="text" value="" class="form-control" name="nama_pemegang_hak" >
                        </div>
                        <div class="form-group col-lg-6">
                            <label>Hubungan Pemegang Hak dengan Nasabah</label>
                            <select type="text" value="" class="form-control" name="hubungan_pemegang_hak_dengan_nasabah">
                                <option value="" selected disabled>= Pilih Hubungan Pemegang Hak dengan Nasabah =</option>
                                <?php
                                $hubungan_pemegang_hak_dengan_nasabah = $this->db->get('hubungan_pemegang_hak_dengan_nasabah')->result();
                                foreach($hubungan_pemegang_hak_dengan_nasabah as $v_hphdn){?>
                                <option value="<?=$v_hphdn->id_hphdn?>"><?=$v_hphdn->nama_hphdn?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group col-lg-6">
                            <label>Nama Penghuni</label>
                            <input type="text" value="" class="form-control" name="nama_penghuni" >
                        </div>
                        <div class="form-group col-lg-6">
                            <label>Status Penghuni</label>
                            <select type="text" value="" class="form-control" name="status_penghuni">
                                <option value="" selected disabled>= Pilih Status penghuni =</option>
                                <?php
                                $status_penghuni = $this->db->get('status_penghuni')->result();
                                foreach($status_penghuni as $v_sp){?>
                                <option value="<?=$v_sp->id_sp?>"><?=$v_sp->nama_sp?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group col-lg-6">
                            <label>Hubungan Penghuni dengan Pemegang Hak</label>
                            <select type="text" value="" class="form-control" name="hubungan_penghuni_dengan_pemegang_hak">
                                <option value="" selected disabled>= Pilih Hubungan Penghuni dengan Pemegang Hak =</option>
                                <?php
                                $hubungan_penghuni_dengan_pemegang_hak = $this->db->get('hubungan_penghuni_dengan_pemegang_hak')->result();
                                foreach($hubungan_penghuni_dengan_pemegang_hak as $v_hpdph){?>
                                <option value="<?=$v_hpdph->id_hpdph?>"><?=$v_hpdph->nama_hpdph?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group col-lg-6">
                            <label>Jenis Dokumen</label>
                            <select type="text" value="" class="form-control" name="jenis_dokumen">
                                <option value="" selected disabled>= Pilih Jenis Dokumen =</option>
                                <?php
                                $jd = $this->db->get('jenis_dokumen')->result();
                                foreach($jd as $v_jd){?>
                                <option value="<?=$v_jd->id_jd?>"><?=$v_jd->nama_jd?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group col-lg-4">
                            <label>No Bukti Hak</label>
                            <input type="text" value="" class="form-control" name="no_bukti_hak" >
                        </div>
                        <div class="form-group col-lg-4">
                            <label>No GS</label>
                            <input type="text" value="" class="form-control" name="no_gs" >
                        </div>
                        <div class="form-group col-lg-4">
                            <label>Tgl Jatuh Tempo Sertifikat</label>
                            <input type="date" value="" class="form-control" name="tgl_jatuh_tempo_sertifikat" >
                        </div>
                        <div class="form-group col-lg-12">
                        <table id="datamonitor" class="table table-bordered table-responsive">
                            <thead>
                                <tr>
                                    <th width="15%">luas Ruko</th>
                                    <th width="15%">Harga Ruko</th>
                                    <th width="15%">Nilai Market Ruko</th>
                                    <th width="20%" colspan="2">Nilai Taksasi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><input type="text" value="" class="auto_numformat form-control luas_ruko" name="luas_ruko" ></td>
                                    <td><input type="text" value="" class="auto_numformat form-control harga_ruko" name="harga_ruko" ></td>
                                    <td><input type="text" value="" class="auto_numformat form-control nilai_market_ruko" name="nilai_market_ruko" readonly></td>
                                    <td colspan="2 "><input type="text" value="" class="auto_numformat form-control nilai_taksasi" name="nilai_taksasi" readonly></td>
                                </tr>

                                <tr>
                                    <td colspan="2"></td>
                                    <td><label>LTV</label></td>
                                    <td>                    
                                        <input type="text" value="" class="form-control ltv" name="ltv" readonly>
                                    </td>						
                                </tr>
                            </tbody>
                        </table>
                        </div>
                        <div class="form-group">
                            <h4 class="col-sm-12 control-label">Informasi Harga di dapat dari</h4>
                        </div>
                        <div class="form-group col-lg-4">
                            <label>Nama & Pekerjaan</label>
                            <input type="text" value="" class="form-control" name="nama_info_harga_1" >
                        </div>
                        <div class="form-group col-lg-8">
                            <label>Alamat/ No. Tlp, jika ada</label>
                            <input type="text" value="" class="form-control" name="detail_info_harga_1" >
                        </div>
                        <div class="form-group col-lg-4">
                            <input type="text" value="" class="form-control" name="nama_info_harga_2" >
                        </div>
                        <div class="form-group col-lg-8">
                            <input type="text" value="" class="form-control" name="detail_info_harga_2" >
                        </div>

                        <div class="form-group col-lg-4">
                            <label>Check BPN?</label>
                            <select class="form-control" name="cek_bpn" >
                                <option></option>
                                <option>Ya</option>
                                <option>Tidak</option>
                            </select>
                        </div>
                        <div class="form-group col-lg-4">
                            <label>Dengan Siapa</label>
                            <input type="text" value="" class="form-control" name="dengan_siapa_cek_bpn" >
                        </div>
                        <div class="form-group col-lg-4">
                            <label>No. Telpon</label>
                            <input type="text" value="" class="form-control" name="no_telp_cek_bpn" >
                        </div>
                        <div class="form-group col-lg-4">
                            <label>Hasil</label>
                            <select class="form-control" name="hasil_cek_bpn" >
                                <option></option>
                                <option>Ok</option>
                                <option>Tidak ok</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <h4 class="col-sm-12 control-label">Pendapat Pemeriksa</h4>
                        </div>
                        <div class="form-group col-lg-12">
                            <label>1. Tentang Harga</label>
                            <textarea type="text" class="form-control" name="tentang_harga" ></textarea>
                        </div>
                        <div class="form-group col-lg-12">
                            <label>2. Kondisi Lingkungan Sekitar</label>
                            <textarea type="text" class="form-control" name="kondisi_lingkungan_sekitar" ></textarea>
                        </div>
                        <div class="form-group col-lg-12">
                            <label>3. Peruntukan Tanah</label>
                            <input type="text" value="" class="form-control" name="peruntukan_tanah" >
                        </div>
                        <div class="form-group col-lg-3">
                            <label>4. Lebar Jalan Di Depan (meter) </label>
                            <input type="text" value="" class="form-control" name="lebar_jalan_di_depan" >
                        </div>
                        <div class="form-group col-lg-12">
                            <label>5. Pendapat Pemeriksa Mengenai Kondisi Jaminan</label>
                            <textarea type="text" class="form-control" name="pendapat_pemeriksa_mengenai_kondisi_jaminan" ></textarea>
                        </div>
                        
                    </div>
                    <div class="text-right m-t-xs">
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<script>

    // menghilangkan format number
    $('#form').submit(function() {
        $(".auto_numformat").val(function(index, value) {
          return value.split('.').join('');
        });
    });

    $(".auto_numformat").keyup(function () {
        $(".auto_numformat").val(function(index, value) {
          return numberWithCommas(value);
        });
    });
    function numberWithCommas(x) {
        return x.toString().replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    }
    $('.form-ruko-komersial').hide();
    $('.pesan-ruko').hide();
    $('.form-score-penggolongan').change(function(){
        score_penggolongan = 0;
        $('.form-score-penggolongan').each(function() { 
            if($(this).val() != null){
                score_penggolongan += Number(($(this).val().split('||&$!#%||'))[0]);
            }
        });
        $('[name="score_penggolongan"]').val(score_penggolongan);
        if(score_penggolongan >= 9){
            $('.form-ruko-komersial').show();
            $('.pesan-ruko').hide();
        }else{
            $('.form-ruko-komersial').hide();
            $('.pesan-ruko').show();
        }
    })


    rumus_market_ruko = <?=$rumus_market_ruko?>;

    $('.form-score-ruko').change(function(){
        score_ruko = 0;
        $('.form-score-ruko').each(function() { 
            if($(this).val() != null){
                score_ruko += Number(($(this).val().split('||&$!#%||'))[0]);
            }
        });
        $('[name="score_ruko"]').val(score_ruko);
        f_nilai_market_ruko();
    })

    $('.harga_ruko').keyup(function(){
        f_nilai_market_ruko();
    })
    
    function f_nilai_market_ruko(){
        nilai_market_ruko = 0;
        luas_ruko = $('.luas_ruko').val().split('.').join('');
        harga_ruko = $('.harga_ruko').val().split('.').join('');
        score_ruko = Number($('[name="score_ruko"]').val());

        rumus_market_ruko.forEach(function(value) {
            if(score_ruko >= value['lbh_dari'] &&  score_ruko <= value['krg_dari']){
                nilai_market_ruko =  Number(harga_ruko) * Number(value['kali']);
            }
        });

        rekomendasi_nilai_kredit = '<?=$rekomendasi_nilai_kredit->rekomendasi_nilai_kredit?>';

        ltv = 0;
        if(nilai_market_ruko != 0){
            ltv = Number(rekomendasi_nilai_kredit)/Number(nilai_market_ruko.toFixed(0));
        }
        
        $('.nilai_market_ruko').val(numberWithCommas(nilai_market_ruko.toFixed(0)));
        $('.ltv').val(""+(ltv*100).toFixed(2)+"%");
    }

    // anti enter submit
    $("form").keypress(function(e) {
        //Enter key
        if (e.which == 13) {
            return false;
        }
    });



</script>