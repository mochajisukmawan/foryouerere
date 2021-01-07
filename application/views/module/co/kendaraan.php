<div class="row">
<form id="form" action="<?=base_url()?>user/savekendaraan/<?=$dn_id?>"  method="post" enctype="multipart/form-data">

<div class="col-lg-12">
    <div class="hpanel">
        <h3>Kendaraan</h3>
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
                <div class="form-group col-lg-6">
                    <label>Jenis Kendaraan</label>
                    <select type="text" value="" class="form-control" name="jenis_kendaraan">
                        <option value="" selected disabled>= Pilih Jenis Kendaraan =</option>
                        <?php
                        $jk = $this->db->get('jenis_kendaraan')->result();
                        foreach($jk as $v_jk){?>
                        <option value="<?=$v_jk->id_jk?>"><?=$v_jk->nama_jk?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>

                                
                <div class="form-group col-lg-6">
                    <label>Penggunaan Jaminan</label>
                    <select type="text" value="" class="form-control" name="penggunaan_jaminan_kendaraan">
                        <option value="" selected disabled>= Pilih Penggunaan Jaminan =</option>
                        <?php
                        $pjk = $this->db->get('penggunaan_jaminan_kendaraan')->result();
                        foreach($pjk as $v_pjk){?>
                        <option value="<?=$v_pjk->id_pjk?>"><?=$v_pjk->nama_pjk?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group col-lg-6">
                    <label>Daerah opeprasional jaminan dari lokasi usaha</label>
                    <select type="text" value="" class="form-control" name="daerah_operasional_jaminan_dari_lokasi_usaha">
                        <option value="" selected disabled>= Pilih Jenis Kendaraan =</option>
                        <?php
                        $dojdlu = $this->db->get('daerah_operasional_jaminan_dari_lokasi_usaha')->result();
                        foreach($dojdlu as $v_dojdlu){?>
                        <option value="<?=$v_dojdlu->id_dojdlu?>"><?=$v_dojdlu->nama_dojdlu?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>

                <div class="form-group">
                    <h4 class="col-sm-10 control-label">Penilaian Jaminan Kendaraan Bermotor</h4>
                    <div class="col-sm-2">
                        <label>score</label>
                        <input type="text" value="" class="form-control" name="score_kendaraan" readonly>
                    </div>
                </div>

                <div class="form-group col-lg-6">
                    <label>Status BPKB</label>
                    <select type="text"   value="" onChange="f_nilai_market_kendaraan()" class="form-control status_bpkb" name="status_bpkb">
                        <?php
                        $sb = $this->db->get('status_bpkb')->result();
                        foreach($sb as $v_sb){?>
                        <option value="$v_sb->id_sb" ><?=$v_sb->nama_sb?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group col-lg-6">
                    <label>Umur Kendaraan</label>
                    <select type="text"   value="" class="form-control form-score-kendaraan" name="umur_kendaraan">
                        <option value=""></option>
                        <?php
                        $uk = $this->db->get('umur_kendaraan')->result();
                        foreach($uk as $v_uk){?>
                        <option value="<?=$v_uk->score_uk?>||&$!#%||<?=$v_uk->id_uk ?>"><?=$v_uk->nama_uk?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group col-lg-6">
                    <label>Jarak Tempuh</label>
                    <select type="text"   value="" class="form-control form-score-kendaraan" name="jarak_tempuh">
                        <option value=""></option>
                        <?php
                        $jt = $this->db->get('jarak_tempuh')->result();
                        foreach($jt as $v_jt){?>
                        <option value="<?=$v_jt->score_jt?>||&$!#%||<?=$v_jt->id_jt?>"><?=$v_jt->nama_jt?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group col-lg-6">
                    <label>Asal Merk Kendaraan</label>
                    <select type="text"   value="" class="form-control form-score-kendaraan" name="asal_merk_kendaraan">
                        <option value=""></option>
                        <?php
                        $mk = $this->db->get('asal_merk_kendaraan')->result();
                        foreach($mk as $v_mk){?>
                        <option value="<?=$v_mk->score_mk?>||&$!#%||<?=$v_mk->id_mk?>"><?=$v_mk->nama_mk?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>

                <div class="form-group col-lg-6">
                    <label>Kondisi Fisik</label>
                    <select type="text"   value="" class="form-control form-score-kendaraan" name="kondisi_fisik">
                        <option value=""></option>
                        <?php
                        $kf = $this->db->get('kondisi_fisik')->result();
                        foreach($kf as $v_kf){?>
                        <option value="<?=$v_kf->score_kf?>||&$!#%||<?=$v_kf->id_kf?>"><?=$v_kf->nama_kf?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group col-lg-6">
                    <label>Kapasitas Mesin</label>
                    <select type="text"   value="" class="form-control form-score-kendaraan" name="kapasitas_mesin">
                        <option value=""></option>
                        <?php
                        $km = $this->db->get('kapasitas_mesin')->result();
                        foreach($km as $v_km){?>
                        <option value="<?=$v_km->score_km?>||&$!#%||<?=$v_km->id_km?>"><?=$v_km->nama_km?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group col-lg-8">
                    <label>Faktor Pengurang</label>
                    <select type="text"    value="" class="form-control form-score-kendaraan" name="faktor_pengurang_kendaraan_1">
                        <option value=""></option>
                        <?php
                        $fpk = $this->db->get('faktor_pengurang_kendaraan')->result();
                        foreach($fpk as $v_fpk){?>
                        <option value="<?=$v_fpk->score_fpk?>||&$!#%||<?=$v_fpk->id_fpk?>"><?=$v_fpk->nama_fpk?></option>
                        <?php
                        }
                        ?>
                    </select>
                    <select type="text"   value="" class="form-control form-score-kendaraan" name="faktor_pengurang_kendaraan_2">
                        <option value=""></option>
                        <?php
                        $fpk = $this->db->get('faktor_pengurang_kendaraan')->result();
                        foreach($fpk as $v_fpk){?>
                        <option value="<?=$v_fpk->score_fpk?>||&$!#%||<?=$v_fpk->id_fpk?>"><?=$v_fpk->nama_fpk?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>


                <div class="form-group">
                    <h4 class="col-sm-10 control-label">Spesifikasi Jaminan</h4>
                </div>
                <div class="form-group col-lg-12 ">
                    <label>Nama Pemilik di BPKB</label>
                    <input type="text" value="" class="form-control" name="nama_pemilik_di_bpkb" >
                </div>
                <div class="form-group col-lg-12 ">
                    <label>Nama Pemilik Saat Ini (Berdasarkan Kuitansi Jual Beli Terakhir)</label>
                    <input type="text" value="" class="form-control" name="nama_pemilik_saat_ini" >
                </div>
                <div class="form-group col-lg-12 ">
                    <label>Alamat Pemilik Saat Ini (Berdasarkan Kuitansi Jual Beli Terakhir)</label>
                    <input type="text" value="" class="form-control" name="alamat_pemilik_saat_ini" >
                </div>



                <div class="form-group col-lg-8">
                    <label>Hubungan Pemilik dengan Debitur</label>
                    <select type="text" value="" class="form-control" name="hubungan_pemilik_dengan_debitur">
                        <option value="" selected disabled>= Pilih Hubungan Pemegang Hak dengan Debitur =</option>
                        <?php
                        $hpdd = $this->db->get('hubungan_pemilik_dengan_debitur')->result();
                        foreach($hpdd as $v_hpdd){?>
                        <option value="<?=$v_hpdd->id_hpdd?>"><?=$v_hpdd->nama_hpdd?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>

                <div class="form-group col-lg-8">
                    <label>Nomor Faktur</label>
                    <input type="text" value="" class="form-control" name="nomor_faktur" >
                </div>
                <div class="form-group col-lg-8">
                    <label>Nomor Mesin</label>
                    <input type="text" value="" class="form-control" name="nomor_mesin" >
                </div>
                <div class="form-group col-lg-4">
                    <label>Bukti Gesek</label>
                    <select class="form-control" name="bukti_gesek_mesin" >
                        <option></option>
                        <option>Ada</option>
                        <option>Tidak Ada</option>
                    </select>
                </div>
                <div class="form-group col-lg-8">
                    <label>Nomor Rangka</label>
                    <input type="text" value="" class="form-control" name="nomor_rangka" >
                </div>
                <div class="form-group col-lg-4">
                    <label>Bukti Gesek</label>
                    <select class="form-control" name="bukti_gesek_rangka" >
                        <option></option>
                        <option>Ada</option>
                        <option>Tidak Ada</option>
                    </select>
                </div>
                <div class="form-group col-lg-6">
                    <label>Nomor Polisi</label>
                    <input type="text" value="" class="form-control" name="nomor_polisi" >
                </div>
                <div class="form-group col-lg-6">
                    <label>Warna</label>
                    <input type="text" value="" class="form-control" name="warna" >
                </div>
                <div class="form-group col-lg-6">
                    <label>Nomor BPKB</label>
                    <input type="text" value="" class="form-control" name="nomor_bpkb" >
                </div>
                <div class="form-group col-lg-6">
                    <label>Tahun Pembuatan</label>
                    <input type="text" value="" class="form-control" name="tahun_pembuatan" >
                </div>
                <div class="form-group col-lg-6">
                    <label>Nomor STNK</label>
                    <input type="text" value="" class="form-control" name="nomor_stnk" >
                </div>
                <div class="form-group col-lg-6">
                    <label>Merk Kendaraan</label>
                    <input type="text" value="" class="form-control" name="merk_kendaraan" >
                </div>
                <div class="form-group col-lg-10">
                    <label>Tipe Kendaraan/ Model</label>
                    <input type="text" value="" class="form-control" name="tipe_kendaraan" >
                </div>
                <div class="form-group col-lg-4">
                    <label>Check SAMSAT?</label>
                    <select class="form-control" name="check_samsat" >
                        <option></option>
                        <option>Ya</option>
                        <option>Tidak</option>
                    </select>
                </div>
                <div class="form-group col-lg-4">
                    <label>Dengan Siapa</label>
                    <input type="text" value="" class="form-control" name="denga_siapa" >
                </div>
                <div class="form-group col-lg-4">
                    <label>No. Telpon</label>
                    <input type="text" value="" class="form-control" name="no_telpon" >
                </div>
                <div class="form-group col-lg-4">
                    <label>Hasil</label>
                    <select class="form-control" name="hasil" >
                        <option></option>
                        <option>Ok</option>
                        <option>Tidak ok</option>
                    </select>
                </div>
                <div class="form-group col-lg-12">
                    <label>Keterangan lainnya</label>
                    <textarea class="form-control" name="keterangan_lainnya" ></textarea>
                </div>
                <div class="form-group col-lg-12">
                <table id="datamonitor" class="table table-bordered table-responsive">
					<thead>
						<tr>
							<th width="15%">harga Kendaraan</th>
							<th width="15%">Nilai Market Kendaraan</th>
							<th width="20%" colspan="2">Nilai Taksasi</th>
						</tr>
					</thead>
					<tbody>
                        <tr>
							<td><input type="text" value="" class="auto_numformat form-control harga_kendaraan" name="harga_kendaraan" ></td>
							<td><input type="text" value="" class="auto_numformat form-control nilai_market_kendaraan" name="nilai_market_kendaraan" readonly></td>
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
                <div class="form-group col-lg-12">
                    <label>Pendapat Pemeriksa Mengenai Kondisi Jaminan</label>
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

    rumus_market_kendaraan = <?=$rumus_market_kendaraan?>;
    $('.form-score-kendaraan').change(function(){
        score_kendaraan = 0;
        $('.form-score-kendaraan').each(function() { 
            if($(this).val() != null){
                score_kendaraan += Number(($(this).val().split('||&$!#%||'))[0]);
            }
        });
        $('[name="score_kendaraan"]').val(score_kendaraan);
        f_nilai_market_kendaraan();

    })

    $('.harga_kendaraan').keyup(function(){
        f_nilai_market_kendaraan();
    })
    
    function f_nilai_market_kendaraan(){
        nilai_market_kendaraan = 0;
        harga_kendaraan = $('.harga_kendaraan').val().split('.').join('');
        score_kendaraan = Number($('[name="score_kendaraan"]').val());
        status_bpkb = $('.status_bpkb').val();
        console.log(status_bpkb);

        rumus_market_kendaraan.forEach(function(value) {
            if(score_kendaraan >= value['lbh_dari'] &&  score_kendaraan <= value['krg_dari']){
                if(status_bpkb == 'Asli'){
                    nilai_market_kendaraan =  Number(harga_kendaraan) * Number(value['kali']);
                }else{
                    nilai_market_kendaraan =  Number(harga_kendaraan) * Number(value['kali']) * 0.4;
                }
            }
        });

        rekomendasi_nilai_kredit = '<?=$rekomendasi_nilai_kredit->rekomendasi_nilai_kredit?>';

        ltv = 0;
        if(nilai_market_kendaraan != 0){
            ltv = Number(rekomendasi_nilai_kredit)/Number(nilai_market_kendaraan.toFixed(0));
        }
        $('.nilai_market_kendaraan').val(numberWithCommas(nilai_market_kendaraan.toFixed(0)));
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