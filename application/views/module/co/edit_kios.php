<div class="row">
<form id="form" action="<?=base_url()?>user/updatekios/<?=$dn_id?>/<?=$id_kios?>"  method="post" enctype="multipart/form-data">

<div class="col-lg-12">
    <div class="hpanel">
        <h3>Kios</h3>
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
                    <input type="date" value="<?=$kios->tanggal_pemeriksaan?>" class="form-control" name="tanggal_pemeriksaan" >
                </div>
                <div class="form-group col-lg-8">
                    <label>Jenis Jaminan</label>
                    <select type="text" value="" class="form-control" name="jenis_jaminan">
                        <option value="" selected disabled>= Pilih Jenis Jaminan =</option>
                        <?php
                        $jenis_jaminan = $this->db->get('jenis_jaminan')->result();
                        foreach($jenis_jaminan as $v_jj){?>
                        <option value="<?=$v_jj->id_jj?>"><?=$v_jj->nama_jj?></option>
                        <?php
                        }
                        ?>
                    </select>
                    <script>
                        $('[name="jenis_jaminan"]').val('<?=$kios->jenis_jaminan?>');
                    </script>
                </div>
                <!-- kondisi Tanah -->
                <div class="form-group">
                    <h4 class="col-sm-10 control-label">Kios/Dasaran/Los/Lapak/Lainnya</h4>
                    <div class="col-sm-2">
                        <label>score</label>
                        <input type="text" value="<?=$kios->score_kios?>" class="form-control" name="score_kios" readonly>
                    </div>
                </div>

                <div class="form-group col-lg-6">
                    <label>Kepemilikan Lahan Pasar</label>
                    <select type="text" value="" class="form-control form-score-kios" name="kepemilikan_lahan_pasar">
                        <option value=""></option>
                        <?php
                        $klp = $this->db->get('kepemilikan_lahan_pasar')->result();
                        foreach($klp as $v_klp){?>
                        <?php
                            if($v_klp->id_klp == $kios->kepemilikan_lahan_pasar) {
                            ?>
                                <option value="<?=$v_klp->score_klp?>||&$!#%||<?=$v_klp->id_klp?>" selected><?=$v_klp->nama_klp?></option>
                            <?php
                            }else{
                            ?>
                                <option value="<?=$v_klp->score_klp?>||&$!#%||<?=$v_klp->id_klp?>"><?=$v_klp->nama_klp?></option>
                            <?php
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group col-lg-6">
                    <label>Penggunaan Jaminan</label>
                    <select type="text" value="" class="form-control form-score-kios" name="penggunaan_jaminan">
                        <option value=""></option>
                        <?php
                        $pj = $this->db->get('penggunaan_jaminan')->result();
                        foreach($pj as $v_pj){?>
                        <?php
                            if($v_pj->id_pj == $kios->penggunaan_jaminan) {
                            ?>
                                <option value="<?=$v_pj->score_pj?>||&$!#%||<?=$v_pj->id_pj?>" selected><?=$v_pj->nama_pj?></option>
                            <?php
                            }else{
                            ?>
                                <option value="<?=$v_pj->score_pj?>||&$!#%||<?=$v_pj->id_pj?>"><?=$v_pj->nama_pj?></option>
                            <?php
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group col-lg-6">
                    <label>Umur Pasar Dari Renovasi Terakhir</label>
                    <select type="text" value="" class="form-control form-score-kios" name="umur_pasar_dari_renovasi_terakhir">
                        <option value=""></option>
                        <?php
                        $updrt = $this->db->get('umur_pasar_dari_renovasi_terakhir')->result();
                        foreach($updrt as $v_updrt){?>
                        <?php
                            if($v_updrt->id_updrt == $kios->umur_pasar_dari_renovasi_terakhir) {
                            ?>
                                <option value="<?=$v_updrt->score_updrt?>||&$!#%||<?=$v_updrt->id_updrt?>" selected><?=$v_updrt->nama_updrt?></option>
                            <?php
                            }else{
                            ?>
                                <option value="<?=$v_updrt->score_updrt?>||&$!#%||<?=$v_updrt->id_updrt?>"><?=$v_updrt->nama_updrt?></option>
                            <?php
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <h4 class="col-sm-12 control-label">Lainnya</h4>
                </div>
                <div class="form-group col-lg-6">
                    <label>Doc.Bukti Hak Kios</label>
                    <input type="text" value="<?=$kios->dok_bukti_hak_kios?>" class="form-control" name="dok_bukti_hak_kios" >
                </div>
                <div class="form-group col-lg-6">
                    <label>No Dokumen</label>
                    <input type="text" value="<?=$kios->no_dokumen?>" class="form-control" name="no_dokumen" >
                </div>
                <div class="form-group col-lg-6">
                    <label>Nama Pemegang Hak</label>
                    <input type="text" value="<?=$kios->nama_pemegang_hak?>" class="form-control" name="nama_pemegang_hak" >
                </div>
                <div class="form-group col-lg-6">
                    <label>Hubungan Pemegang Hak dengan Debitur</label>
                    <select type="text" value="<?=$kios->score_kios?>" class="form-control" name="hubungan_pemegang_hak_dengan_debitur">
                        <option value="" selected disabled>= Pilih Hubungan Pemegang Hak dengan Debitur =</option>
                        <?php
                        $hubungan_pemegang_hak_dengan_debitur = $this->db->get('hubungan_pemegang_hak_dengan_debitur')->result();
                        foreach($hubungan_pemegang_hak_dengan_debitur as $v_hphdd){?>
                        <option value="<?=$v_hphdd->id_hphdd?>"><?=$v_hphdd->nama_hphdd?></option>
                        <?php
                        }
                        ?>
                    </select>
                    <script>
                        $('[name="hubungan_pemegang_hak_dengan_debitur"]').val('<?=$kios->hubungan_pemegang_hak_dengan_debitur?>');
                    </script>
                </div>
                <div class="form-group col-lg-4">
                    <label>Masa Berlaku Ijin Kios</label>
                    <input type="date" value="<?=$kios->masa_berlaku_mulai?>" class="form-control" name="masa_berlaku_mulai" >
                </div>
                <div class="form-group col-lg-4">
                    <label>s/d</label>
                    <input type="date" value="<?=$kios->masa_berlaku_akhir?>" class="form-control" name="masa_berlaku_akhir" >
                </div>

                <div class="form-group col-lg-4">
                    <label>Luas Kios Berdasarkan Bukti Kepemilikn (m2)</label>
                    <input type="text" value="<?=$kios->luas_kios_berdasarkan_bukti_kepemilikan?>" class="form-control" name="luas_kios_berdasarkan_bukti_kepemilikan" >
                </div>
                <div class="form-group col-lg-12">
                    <label>Nama Pasar</label>
                    <input type="text" value="<?=$kios->nama_pasar?>" class="form-control" name="nama_pasar" >
                </div>
                <div class="form-group col-lg-4">
                    <label>Los/Blok</label>
                    <input type="text" value="<?=$kios->los?>" class="form-control" name="los" >
                </div>
                <div class="form-group col-lg-4">
                    <label>No</label>
                    <input type="text" value="<?=$kios->no_kios?>" class="form-control" name="no_kios" >
                </div>
                <div class="form-group col-lg-12">
                    <label>Wilayah & Kota</label>
                    <input type="text" value="<?=$kios->wilayah_kota?>" class="form-control" name="wilayah_kota" >
                </div>
                <div class="form-group col-lg-8">
                    <label>Lokasi Jaminan</label>
                    <select type="text" value="" class="form-control" name="lokasi_jaminan">
                        <option value="" selected disabled>= Pilih Lokasi Jaminan =</option>
                        <?php
                        $lokasi_jaminan = $this->db->get('lokasi_jaminan')->result();
                        foreach($lokasi_jaminan as $v_lj){?>
                        <option value="<?=$v_lj->id_lj?>"><?=$v_lj->nama_lj?></option>
                        <?php
                        }
                        ?>
                    </select>
                    <script>
                        $('[name="lokasi_jaminan"]').val('<?=$kios->lokasi_jaminan?>');
                    </script>
                </div>
                <div class="form-group col-lg-6">
                    <label>Tahun Pasar Dibangun/Renovasi Teraksir</label>
                    <input type="text" value="<?=$kios->tahun_pasar_bangun_renovasi?>" class="form-control" name="tahun_pasar_bangun_renovasi" >
                </div>
                <div class="form-group col-lg-6">
                    <label>Retribusi per Bulan (Rp.)</label>
                    <input type="text" value="<?=$kios->retribusi_perbulan?>" class="form-control" name="retribusi_perbulan" >
                </div>
                <div class="form-group col-lg-6">
                    <label>Litrik</label>
                    <select type="text" value="" class="form-control" name="listrik">
                        <option value="" selected disabled>= Pilih Litrik =</option>
                        <option>Ada</option>
                        <option>Tidak Ada</option>
                    </select>
                    <script>
                        $('[name="listrik"]').val('<?=$kios->listrik?>');
                    </script>
                </div>
                <div class="form-group col-lg-6">
                    <label>Tegangan Listrik(KWH)</label>
                    <input type="text" value="<?=$kios->tegangan_listrik?>" class="form-control" name="tegangan_listrik" >
                </div>
                <div class="form-group col-lg-6">
                    <label>Telephone</label>
                    <select type="text" value="" class="form-control" name="telepon">
                        <option value="" selected disabled>= Pilih Telephone =</option>
                        <option>Ada</option>
                        <option>Tidak Ada</option>
                    </select>
                    <script>
                        $('[name="telepon"]').val('<?=$kios->telepon?>');
                    </script>
                </div>
                <div class="form-group col-lg-6">
                    <label>No Telepon</label>
                    <input type="text" value="<?=$kios->no_telepon?>" class="form-control" name="no_telepon" >

                </div>
                <div class="form-group col-lg-12">
                <table id="datamonitor" class="table table-bordered table-responsive">
					<thead>
						<tr>
							<th width="15%">Harga Kios</th>
							<th width="15%">Nilai Market Kios/Dasaran/los/lapak/lainnya</th>
							<th width="20%" colspan="2">Nilai Taksasi</th>
						</tr>
					</thead>
					<tbody>
                        <tr>
							<td><input type="text" value="<?=$kios->harga_kios?>" class="auto_numformat form-control harga_kios" name="harga_kios" ></td>
							<td><input type="text" value="<?=$kios->nilai_market_kios?>" class="auto_numformat form-control nilai_market_kios" name="nilai_market_kios" readonly></td>
							<td colspan="2 "><input type="text" value="<?=$kios->nilai_taksasi?>" class="auto_numformat form-control nilai_taksasi" name="nilai_taksasi" readonly></td>
						</tr>

                        <tr>
							<td colspan="2"></td>
							<td><label>LTV</label></td>
							<td>                    
							    <input type="text" value="<?=$kios->ltv?>" class="form-control ltv" name="ltv" readonly>
                            </td>						
                        </tr>
					</tbody>
				</table>
                </div>
            </div>
            <div class="text-right m-t-xs">
                <button type="submit" class="btn btn-warning">Update</button>
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
    rumus_market_kios = <?=$rumus_market_kios?>;
    $('.form-score-kios').change(function(){
        score_kios = 0;
        $('.form-score-kios').each(function() { 
            if($(this).val() != null){
                score_kios += Number(($(this).val().split('||&$!#%||'))[0]);
            }
        });
        $('[name="score_kios"]').val(score_kios);
        f_nilai_market_kios();
    })

    $('.harga_kios').keyup(function(){
        f_nilai_market_kios();
    })
    
    function f_nilai_market_kios(){
        nilai_market_kios = 0;
        harga_kios = $('.harga_kios').val().split('.').join('');
        score_kios = Number($('[name="score_kios"]').val());

        rumus_market_kios.forEach(function(value) {
            if(score_kios >= value['lbh_dari'] &&  score_kios <= value['krg_dari']){
                nilai_market_kios =  Number(harga_kios) * Number(value['kali']);
            }
        });

        rekomendasi_nilai_kredit = '<?=$rekomendasi_nilai_kredit->rekomendasi_nilai_kredit?>';

        ltv = 0;
        if(nilai_market_kios != 0){
            ltv = Number(rekomendasi_nilai_kredit)/Number(nilai_market_kios.toFixed(0));
        }
        
        $('.nilai_market_kios').val(numberWithCommas(nilai_market_kios.toFixed(0)));
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