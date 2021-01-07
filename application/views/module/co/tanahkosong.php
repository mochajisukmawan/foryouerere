<div class="row">
<form id="form" action="<?=base_url()?>user/savetanahkosong/<?=$dn_id?>"  method="post" enctype="multipart/form-data">

<div class="col-lg-12">
    <div class="hpanel">
        <h3>Tanah Kosong</h3>
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

                <!-- kondisi tanah -->
                <div class="form-group">
                    <h4 class="col-sm-10 control-label">Penilaian tanah kosong / sawah / tambak</h4>
                    <div class="col-sm-2">
                        <label>score</label>
                        <input type="text" value="" class="form-control" name="score_tanah" readonly>
                    </div>
                </div>
                <div class="form-group col-lg-6">
                    <label>Jenis Tanah</label>
                    <select type="text" value="" class="form-control form-score-tanah" name="jenis_tanah">
                       <option value=""></option>
                        <?php
                        $jt = $this->db->get('jenis_tanah')->result();
                        foreach($jt as $v_jt){?>
                        <option value="<?=$v_jt->score_jt?>||&$!#%||<?=$v_jt->id_jt?>"><?=$v_jt->nama_jt?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group col-lg-6">
                    <label>Lebar jalan Depan Jaminan</label>
                    <select type="text" value="" class="form-control form-score-tanah" name="lebar_jalan_depan_jaminan_tk">
                        <option value=""></option>
                        <?php
                        $ljdjtk = $this->db->get('lebar_jalan_depan_jaminan_tk')->result();
                        foreach($ljdjtk as $v_ljdjtk){?>
                        <option value="<?=$v_ljdjtk->score_ljdjtk?>||&$!#%||<?=$v_ljdjtk->id_ljdjtk?>"><?=$v_ljdjtk->nama_ljdjtk?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group col-lg-6">
                    <label>Kondisi Jalan di Depan Jaminan</label>
                    <select type="text" value="" class="form-control form-score-tanah" name="kondisi_jalan_di_depan_jaminan">
                        <option value=""></option>
                        <?php
                        $kjdj = $this->db->get('kondisi_jalan_di_depan_jaminan')->result();
                        foreach($kjdj as $v_kjdj){?>
                        <option value="<?=$v_kjdj->score_kjdj?>||&$!#%||<?=$v_kjdj->id_kjdj?>"><?=$v_kjdj->nama_kjdj?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>

                


                <div class="form-group col-lg-6">
                    <label>Letak Tanah Jaminan</label>
                    <select type="text" value="" class="form-control form-score-tanah" name="letak_tanah_jaminan_tk">
                        <option value=""></option>
                        <?php
                        $ltjtk = $this->db->get('letak_tanah_jaminan_tk')->result();
                        foreach($ltjtk as $v_ltjtk){?>
                        <option value="<?=$v_ltjtk->score_ltjtk?>||&$!#%||<?=$v_ltjtk->id_ltjtk?>"><?=$v_ltjtk->nama_ltjtk?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>  
                <div class="form-group col-lg-6">
                    <label>Bentuk Tanah</label>
                    <select type="text" value="" class="form-control form-score-tanah" name="bentuk_tanah_kosong">
                        <option value=""></option>
                        <?php
                        $btk = $this->db->get('bentuk_tanah_kosong')->result();
                        foreach($btk as $v_btk){?>
                        <option value="<?=$v_btk->score_btk?>||&$!#%||<?=$v_btk->id_btk?>"><?=$v_btk->nama_btk?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group col-lg-6">
                    <label>Perbandingan Panjang Terhadap Lebar Tanah</label>
                    <select type="text" value="" class="form-control form-score-tanah" name="perbandingan_panjang_terhadap_lebar_tanah">
                        <option value=""></option>
                        <?php
                        $pptlt = $this->db->get('perbandingan_panjang_terhadap_lebar_tanah')->result();
                        foreach($pptlt as $v_pptlt){?>
                        <option value="<?=$v_pptlt->score_pptlt?>||&$!#%||<?=$v_pptlt->id_pptlt ?>"><?=$v_pptlt->nama_pptlt?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>

                <div class="form-group col-lg-6">
                    <label>Lebar Tanah Jaminan</label>
                    <select type="text" value="" class="form-control form-score-tanah" name="lebar_tanah_jaminan">
                        <option value=""></option>
                        <?php
                        $ltj = $this->db->get('lebar_tanah_jaminan')->result();
                        foreach($ltj as $v_ltj){?>
                        <option value="<?=$v_ltj->score_ltj?>||&$!#%||<?=$v_ltj->id_ltj?>"><?=$v_ltj->nama_ltj?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group col-lg-6">
                    <label>Kontur Tanah</label>
                    <select type="text" value="" class="form-control form-score-tanah" name="kontur_tanah">
                        <option value=""></option>
                        <?php
                        $kt = $this->db->get('kontur_tanah')->result();
                        foreach($kt as $v_kt){?>
                        <option value="<?=$v_kt->score_kt?>||&$!#%||<?=$v_kt->id_kt?>"><?=$v_kt->nama_kt?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>


                <div class="form-group col-lg-8">
                    <label>Faktor Pengurang</label>
                    <select type="text" value="" class="form-control form-score-tanah" name="faktor_pengurang_tk_1">
                        <option value=""></option>
                        <?php
                        $fptk = $this->db->get('faktor_pengurang_tk')->result();
                        foreach($fptk as $v_fptk){?>
                        <option value="<?=$v_fptk->score_fptk?>||&$!#%||<?=$v_fptk->id_fptk?>"><?=$v_fptk->nama_fptk?></option>
                        <?php
                        }
                        ?>
                    </select>
                    <select type="text" value="" class="form-control form-score-tanah" name="faktor_pengurang_tk_2">
                        <option value=""></option>
                        <?php
                        $fptk = $this->db->get('faktor_pengurang_tk')->result();
                        foreach($fptk as $v_fptk){?>
                        <option value="<?=$v_fptk->score_fptk?>||&$!#%||<?=$v_fptk->id_fptk?>"><?=$v_fptk->nama_fptk?></option>
                        <?php
                        }
                        ?>
                    </select>
                    <select type="text" value="" class="form-control form-score-tanah" name="faktor_pengurang_tk_3">
                        <option value=""></option>
                        <?php
                        $fptk = $this->db->get('faktor_pengurang_tk')->result();
                        foreach($fptk as $v_fptk){?>
                        <option value="<?=$v_fptk->score_fptk?>||&$!#%||<?=$v_fptk->id_fptk?>"><?=$v_fptk->nama_fptk?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <h4 class="col-sm-12 control-label">lainya</h4>
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
                    <label>Hubungan Pemegang Hak dengan Debitur</label>
                    <select type="text" value="" class="form-control" name="hubungan_pemegang_hak_dengan_debitur">
                        <option value="" selected disabled>= Pilih Hubungan Pemegang Hak dengan Debitur =</option>
                        <?php
                        $hubungan_pemegang_hak_dengan_debitur = $this->db->get('hubungan_pemegang_hak_dengan_debitur')->result();
                        foreach($hubungan_pemegang_hak_dengan_debitur as $v_hphdd){?>
                        <option value="<?=$v_hphdd->id_hphdd?>"><?=$v_hphdd->nama_hphdd?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group col-lg-6">
                    <label>Nama Penggarap</label>
                    <input type="text" value="" class="form-control" name="nama_penggarap" >
                </div>
                <div class="form-group col-lg-6">
                    <label>Status Penggarap</label>
                    <select type="text" value="" class="form-control" name="status_penggarap">
                        <option value="" selected disabled>= Pilih Status Penggarap =</option>
                        <?php
                        $status_penggarap = $this->db->get('status_penggarap')->result();
                        foreach($status_penggarap as $v_sp){?>
                        <option value="<?=$v_sp->id_sp?>"><?=$v_sp->nama_sp?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group col-lg-6">
                    <label>Hubungan Penggarap dengan Pemegang Hak</label>
                    <select type="text" value="" class="form-control" name="hubungan_penggarap_dengan_pemegang_hak">
                        <option value="" selected disabled>= Pilih Hubungan Penggarap dengan Pemegang Hak =</option>
                        <?php
                        $hubungan_penggarap_dengan_pemegang_hak = $this->db->get('hubungan_penggarap_dengan_pemegang_hak')->result();
                        foreach($hubungan_penggarap_dengan_pemegang_hak as $v_hpdph){?>
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
                            <th width="10%"><h4>hasil Penilaian</h4></th>
                            <th width="15%">m2</th>
                            <th width="15%">harga/m2</th>
                            <th width="15%">Nilai Market</th>
                            <th width="20%" colspan="2">Nilai Taksasi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><label>Luas Tanah</label></td>
                            <td><input type="text" value="" class="auto_numformat form-control luas_tanah_m2" name="luas_tanah_m2" ></td>
                            <td><input type="text" value="" class="auto_numformat form-control harga_tanah_m2" name="harga_tanah_m2" ></td>
                            <td><input type="text" value="" class="auto_numformat form-control nilai_market_tanah" name="nilai_market_tanah" readonly></td>
                            <td colspan="2 "><input type="text" value="" class="auto_numformat form-control" name="nilai_taksasi" readonly></td>
                        </tr>

                        <tr>
                            <td colspan="4"></td>
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
                    <label>5. Pendapat Pemeriksa Mengenai Kondisi Jaminan     (Termasuk prospek penjualan jaminan - jika dieksekusi berapa lama dapat terjual)</label>
                    <textarea type="text" class="form-control" name="pendapat_pemeriksa_mengenai_kondisi_jaminan" ></textarea>
                </div>
            </div>
            <div class="text-right m-t-xs">
                <button type="submit" class="btn btn-success">Save</button>
            </div>
        </div>
    </div>
    </div>
</form>
</div>

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
    rumus_market_tanah_kosong = <?=$rumus_market_tanah_kosong?>;
    $('.form-score-tanah').change(function(){
        score_tanah = 0;
        $('.form-score-tanah').each(function() { 
            if($(this).val() != null){
                score_tanah += Number(($(this).val().split('||&$!#%||'))[0]);
                console.log(Number(($(this).val().split('||&$!#%||'))[0]));
            }
        });
        $('[name="score_tanah"]').val(score_tanah);
        f_nilai_market_tanah();
    })
    $('.luas_tanah_m2 , .harga_tanah_m2').keyup(function(){
        f_nilai_market_tanah();
    })
    function f_nilai_market_tanah(){
        nilai_market_tanah = 0;
        luas_tanah = $('.luas_tanah_m2').val().split('.').join('');
        harga_tanah = $('.harga_tanah_m2').val().split('.').join('');
        score_tanah = Number($('[name="score_tanah"]').val());
        rumus_market_tanah_kosong.forEach(function(value) {
            if(score_tanah >= value['lbh_dari'] &&  score_tanah <= value['krg_dari']){
                nilai_market_tanah = Number(luas_tanah) * Number(harga_tanah) * Number(value['kali']);
            }
        });
        rekomendasi_nilai_kredit = '<?=$rekomendasi_nilai_kredit->rekomendasi_nilai_kredit?>';
        ltv = 0;
        if(nilai_market_tanah != 0){
            ltv = Number(rekomendasi_nilai_kredit)/Number(nilai_market_tanah.toFixed(0));
        }
        $('.nilai_market_tanah').val(numberWithCommas(nilai_market_tanah.toFixed(0)));
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