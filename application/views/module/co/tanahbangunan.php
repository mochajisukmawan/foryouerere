<div class="row">
<form id="form" action="<?=base_url()?>user/savetanahbangunan/<?=$dn_id?>"  method="post" enctype="multipart/form-data">

<div class="col-lg-12">
    <div class="hpanel">
        <h3>Tanah & Bangunan</h3>
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
                <div class="form-group">
                    <h4 class="col-sm-10 control-label">Penilaian Tanah dan Bangunan</h4>
                </div>
                <div class="form-group col-lg-6">
                    <label>Bentuk Bangunan</label>
                    <select type="text" value="" class="form-control" name="bentuk_bangunan">
                        <option value="" selected disabled>= Pilih Bentuk Bangunan =</option>
                        <?php
                        $bb = $this->db->get('bentuk_bangunan')->result();
                        foreach($bb as $v_bb){?>
                        <option value="<?=$v_bb->id_bb?>"><?=$v_bb->nama_bb?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
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

                <!-- kondisi tanah -->
                <div class="form-group">
                    <h4 class="col-sm-10 control-label">1. Penilaian Kondisi Tanah</h4>
                    <div class="col-sm-2">
                        <label>score</label>
                        <input type="text" value="" class="form-control" name="score_tanah" readonly>
                    </div>
                </div>

                <div class="form-group col-lg-6">
                    <label>Lebar jalan Depan Jaminan</label>
                    <select type="text" value="" class="form-control form-score-tanah" name="lebar_jalan_depan_jaminan">
                        <option value=""></option>
                        <?php
                        $ljdj = $this->db->get('lebar_jalan_depan_jaminan')->result();
                        foreach($ljdj as $v_ljdj){?>
                        <option value="<?=$v_ljdj->score_ljdj?>||&$!#%||<?=$v_ljdj->id_ljdj?>"><?=$v_ljdj->nama_ljdj?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group col-lg-6">
                    <label>Lebar Tanah Yang Menghadap Ke Jalan</label>
                    <select type="text" value="" class="form-control form-score-tanah" name="lebar_tanah_yang_menghadap_ke_jalan">
                        <option value=""></option>
                        <?php
                        $ltymkj = $this->db->get('lebar_tanah_yang_menghadap_ke_jalan')->result();
                        foreach($ltymkj as $v_ltymkj){?>
                        <option value="<?=$v_ltymkj->score_ltymkj?>||&$!#%||<?=$v_ltymkj->id_ltymkj ?>"><?=$v_ltymkj->nama_ltymkj?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group col-lg-6">
                    <label>Letak Tanah Jaminan</label>
                    <select type="text" value="" class="form-control form-score-tanah" name="letak_tanah_jaminan">
                        <option value=""></option>
                        <?php
                        $ltj = $this->db->get('letak_tanah_jaminan')->result();
                        foreach($ltj as $v_ltj){?>
                        <option value="<?=$v_ltj->score_ltj?>||&$!#%||<?=$v_ltj->id_ltj?>"><?=$v_ltj->nama_ltj?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>

                <div class="form-group col-lg-6">
                    <label>Bentuk Tanah</label>
                    <select type="text" value="" class="form-control form-score-tanah" name="bentuk_tanah">
                        <option value=""></option>
                        <?php
                        $bt = $this->db->get('bentuk_tanah')->result();
                        foreach($bt as $v_bt){?>
                        <option value="<?=$v_bt->score_bt?>||&$!#%||<?=$v_bt->id_bt?>"><?=$v_bt->nama_bt?></option>
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
                <div class="form-group col-lg-8">
                    <label>Faktor Pengurang</label>
                    <select type="text" value="" class="form-control form-score-tanah" name="faktor_pengurang_tanah_1">
                        <option value=""></option>
                        <?php
                        $fpt = $this->db->get('faktor_pengurang_tanah')->result();
                        foreach($fpt as $v_fpt){?>
                        <option value="<?=$v_fpt->score_fpt?>||&$!#%||<?=$v_fpt->id_fpt?>"><?=$v_fpt->nama_fpt?></option>
                        <?php
                        }
                        ?>
                    </select>
                    <select type="text"  value="" class="form-control form-score-tanah" name="faktor_pengurang_tanah_2">
                        <option value=""></option>
                        <?php
                        $fpt = $this->db->get('faktor_pengurang_tanah')->result();
                        foreach($fpt as $v_fpt){?>
                        <option value="<?=$v_fpt->score_fpt?>||&$!#%||<?=$v_fpt->id_fpt?>"><?=$v_fpt->nama_fpt?></option>
                        <?php
                        }
                        ?>
                    </select>
                    <select type="text" value="" class="form-control form-score-tanah" name="faktor_pengurang_tanah_3">
                        <option value=""></option>
                        <?php
                        $fpt = $this->db->get('faktor_pengurang_tanah')->result();
                        foreach($fpt as $v_fpt){?>
                        <option value="<?=$v_fpt->score_fpt?>||&$!#%||<?=$v_fpt->id_fpt?>"><?=$v_fpt->nama_fpt?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>

                <!-- kondisi Bangunan -->
                <div class="form-group">
                    <h4 class="col-sm-10 control-label">2. Penilaian Kondisi Bangunan</h4>
                    <div class="col-sm-2">
                        <label>score</label>
                        <input type="text" value="" class="form-control" name="score_bangunan" readonly>
                    </div>
                </div>

                <div class="form-group col-lg-6">
                    <label>Pondasi</label>
                    <select type="text" value="" class="form-control form-score-bangunan" name="pondasi">
                        <option value=""></option>
                        <?php
                        $pondasi = $this->db->get('pondasi')->result();
                        foreach($pondasi as $v_pondasi){?>
                        <option value="<?=$v_pondasi->score_pondasi?>||&$!#%||<?=$v_pondasi->id_pondasi?>"><?=$v_pondasi->nama_pondasi?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group col-lg-6">
                    <label>Lantai</label>
                    <select type="text" value="" class="form-control form-score-bangunan" name="lantai">
                        <option value=""></option>
                        <?php
                        $lantai = $this->db->get('lantai')->result();
                        foreach($lantai as $v_lantai){?>
                        <option value="<?=$v_lantai->score_lantai?>||&$!#%||<?=$v_lantai->id_lantai?>"><?=$v_lantai->nama_lantai?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group col-lg-6">
                    <label>Bangunan</label>
                    <select type="text" value="" class="form-control form-score-bangunan" name="bangunan_tingkat">
                        <option value=""></option>
                        <?php
                        $bt = $this->db->get('bangunan_tingkat')->result();
                        foreach($bt as $v_bt){?>
                        <option value="<?=$v_bt->score_bt?>||&$!#%||<?=$v_bt->id_bt?>"><?=$v_bt->nama_bt?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group col-lg-6">
                    <label>Usia Bangunan(dari renovasi terakhir)</label>
                    <select type="text" value="" class="form-control form-score-bangunan" name="usia_bangunan">
                        <option value=""></option>
                        <?php
                        $ub = $this->db->get('usia_bangunan')->result();
                        foreach($ub as $v_ub){?>
                        <option value="<?=$v_ub->score_ub?>||&$!#%||<?=$v_ub->id_ub?>"><?=$v_ub->nama_ub?></option>
                        <?php
                        }
                        ?>
                    </select>                
                </div>
                <div class="form-group col-lg-6">
                    <label>Dinding</label>
                    <select type="text" value="" class="form-control form-score-bangunan" name="dinding">
                        <option value=""></option>
                        <?php
                        $dinding = $this->db->get('dinding')->result();
                        foreach($dinding as $v_dinding){?>
                        <option value="<?=$v_dinding->score_dinding?>||&$!#%||<?=$v_dinding->id_dinding?>"><?=$v_dinding->nama_dinding?></option>
                        <?php
                        }
                        ?>
                    </select>                
                </div>

                <div class="form-group col-lg-6">
                    <label>Kamar Mandi/WC</label>
                    <select type="text" value="" class="form-control form-score-bangunan" name="kamar_mandi">
                        <option value=""></option>
                        <?php
                        $km = $this->db->get('kamar_mandi')->result();
                        foreach($km as $v_km){?>
                        <option value="<?=$v_km->score_km?>||&$!#%||<?=$v_km->id_km?>"><?=$v_km->nama_km?></option>
                        <?php
                        }
                        ?>
                    </select> 
                </div>

                <div class="form-group col-lg-6">
                    <label>Atap</label>
                    <select type="text" value="" class="form-control form-score-bangunan" name="atap">
                        <option value=""></option>
                        <?php
                        $atap = $this->db->get('atap')->result();
                        foreach($atap as $v_atap){?>
                        <option value="<?=$v_atap->score_atap?>||&$!#%||<?=$v_atap->id_atap?>"><?=$v_atap->nama_atap?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>

                <div class="form-group col-lg-6">
                    <label>Plafond</label>
                    <select type="text" value="" class="form-control form-score-bangunan" name="plafond">
                        <option value=""></option>
                        <?php
                        $plafond = $this->db->get('plafond')->result();
                        foreach($plafond as $v_plafond){?>
                        <option value="<?=$v_plafond->score_plafond?>||&$!#%||<?=$v_plafond->id_plafond?>"><?=$v_plafond->nama_plafond?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>

                <div class="form-group col-lg-6">
                    <label>Jaringan listrik</label>
                    <select type="text" value="" class="form-control form-score-bangunan" name="jaringan_listrik">
                        <option value=""></option>
                        <?php
                        $jl = $this->db->get('jaringan_listrik')->result();
                        foreach($jl as $v_jl){?>
                        <option value="<?=$v_jl->score_jl?>||&$!#%||<?=$v_jl->id_jl?>"><?=$v_jl->nama_jl?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group col-lg-6">
                    <label>Tegangan Listrik(KWH)</label>
                    <input type="text" value="" class="form-control" name="tegangan_listrik" >
                </div>

                <div class="form-group col-lg-6">
                    <label>Perawatan</label>
                    <select type="text" value="" class="form-control" name="perawatan">
                        <option value=""></option>
                        <option>Baik</option>
                        <option>Kurang</option>
                        <option>Tidak Baik</option>
                    </select>
                </div>
                <div class="form-group col-lg-6">
                    <label>Sumber Air</label>
                    <select type="text" value="" class="form-control form-score-bangunan" name="sumber_air">
                        <option value=""></option>
                        <?php
                        $sa = $this->db->get('sumber_air')->result();
                        foreach($sa as $v_sa){?>
                        <option value="<?=$v_sa->score_sa?>||&$!#%||<?=$v_sa->id_sa?>"><?=$v_sa->nama_sa?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group col-lg-8">
                    <label>Faktor Pengurang</label>
                    <select type="text"  value="" class="form-control form-score-bangunan" name="faktor_pengurang_bangunan_1">
                        <option value=""></option>
                        <?php
                        $fpb = $this->db->get('faktor_pengurang_bangunan')->result();
                        foreach($fpb as $v_fpb){?>
                        <option value="<?=$v_fpb->score_fpb?>||&$!#%||<?=$v_fpb->id_fpb?>"><?=$v_fpb->nama_fpb?></option>
                        <?php
                        }
                        ?>
                    </select>
                    <select type="text"  value="" class="form-control form-score-bangunan" name="faktor_pengurang_bangunan_2">
                        <option value=""></option>
                        <?php
                        $fpb = $this->db->get('faktor_pengurang_bangunan')->result();
                        foreach($fpb as $v_fpb){?>
                        <option value="<?=$v_fpb->score_fpb?>||&$!#%||<?=$v_fpb->id_fpb?>"><?=$v_fpb->nama_fpb?></option>
                        <?php
                        }
                        ?>
                    </select>
                    <select type="text"  value="" class="form-control form-score-bangunan" name="faktor_pengurang_bangunan_3">
                        <option value=""></option>
                        <?php
                        $fpb = $this->db->get('faktor_pengurang_bangunan')->result();
                        foreach($fpb as $v_fpb){?>
                        <option value="<?=$v_fpb->score_fpb?>||&$!#%||<?=$v_fpb->id_fpb?>"><?=$v_fpb->nama_fpb?></option>
                        <?php
                        }
                        ?>
                        ?>
                    </select>
                    <select type="text"  value="" class="form-control form-score-bangunan" name="faktor_pengurang_bangunan_4">
                        <option value=""></option>
                        <?php
                        $fpb = $this->db->get('faktor_pengurang_bangunan')->result();
                        foreach($fpb as $v_fpb){?>
                        <option value="<?=$v_fpb->score_fpb?>||&$!#%||<?=$v_fpb->id_fpb?>"><?=$v_fpb->nama_fpb?></option>
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
							<th width="10%"><h4>hasil Penilaian</h4></th>
							<th width="15%">m2</th>
							<th width="15%">harga/m2</th>
							<th width="15%">Nilai Market</th>
							<th width="20%" colspan="2"></th>
						</tr>
					</thead>
					<tbody>
                        <tr>
							<td><label>Luas Tanah</label></td>
							<td><input type="text" value="" class="auto_numformat form-control luas_tanah_m2" name="luas_tanah_m2" ></td>
							<td><input type="text" value="" class="auto_numformat form-control harga_tanah_m2" name="harga_tanah_m2" ></td>
							<td><input type="text" value="" class="auto_numformat form-control nilai_market_tanah" name="nilai_market_tanah" readonly></td>
							<td colspan="2 "></td>
						</tr>
                        <tr>
							<td><label>Luas Bangunan (1)</label></td>
							<td><input type="text" value="" class="auto_numformat form-control luas_bangunan_1_m2" name="luas_bangunan_1_m2" ></td>
							<td><input type="text" value="" class="auto_numformat form-control harga_bangunan_1_m2" name="harga_bangunan_1_m2" ></td>
							<td><input type="text" value="" class="auto_numformat form-control nilai_market_bangunan_1" name="nilai_market_bangunan_1" readonly></td>
							<td><label>IMB</label></td>
							<td>                    
                                <select type="text" value="" onChange="f_nilai_market_bangunan()" class="form-control ibm_bangunan_1" name="ibm_bangunan_1">
                                    <option>Tidak Ada</option>
                                    <option>Ada</option>
                                </select>
                            </td>
						</tr>
                        <tr>
							<td><label>Luas Bangunan (2)</label></td>
							<td><input type="text" value="" class="auto_numformat form-control luas_bangunan_2_m2" name="luas_bangunan_2_m2" ></td>
							<td><input type="text" value="" class="auto_numformat form-control harga_bangunan_2_m2" name="harga_bangunan_2_m2" ></td>
							<td><input type="text" value="" class="auto_numformat form-control nilai_market_bangunan_2" name="nilai_market_bangunan_2" readonly></td>
							<td><label>IMB</label></td>
							<td>                    
                                <select type="text" value="" onChange="f_nilai_market_bangunan_2()" class="form-control ibm_bangunan_2" name="ibm_bangunan_2">
                                    <option>Tidak Ada</option>
                                    <option>Ada</option>
                                </select>
                            </td>						
                        </tr>
                        <tr>
							<td colspan="3"><label>Total</label></td>
							<td><input type="text" value="" class="auto_numformat form-control total_market" name="total_market" readonly></td>
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
    // tanah
    rumus_market_tanah = <?=$rumus_market_tanah?>;
    $('.form-score-tanah').change(function(){
        score_tanah = 0;
        $('.form-score-tanah').each(function() { 
            if($(this).val() != null){
                score_tanah += Number(($(this).val().split('||&$!#%||'))[0]);
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
        rumus_market_tanah.forEach(function(value) {
            if(score_tanah >= value['lbh_dari'] &&  score_tanah <= value['krg_dari']){
                nilai_market_tanah = Number(luas_tanah) * Number(harga_tanah) * Number(value['kali']);
            }
        });
        $('.nilai_market_tanah').val(numberWithCommas(nilai_market_tanah.toFixed(0)));
        total();
    }

    // bangunan
    rumus_market_bangunan = <?=$rumus_market_bangunan?>;
    $('.form-score-bangunan').change(function(){
        score_bangunan = 0;
        $('.form-score-bangunan').each(function() { 
            if($(this).val() != null){
                score_bangunan += Number(($(this).val().split('||&$!#%||'))[0]);
            }
        });
        $('[name="score_bangunan"]').val(score_bangunan);
        f_nilai_market_bangunan();
        f_nilai_market_bangunan_2();
    })

    $('.luas_bangunan_1_m2 , .harga_bangunan_1_m2').keyup(function(){
        f_nilai_market_bangunan();
    })
    $('.luas_bangunan_2_m2 , .harga_bangunan_2_m2').keyup(function(){
        f_nilai_market_bangunan_2();
    })
    
    function f_nilai_market_bangunan(){
        nilai_market_bangunan = 0;
        luas_bangunan = $('.luas_bangunan_1_m2').val().split('.').join('');
        harga_bangunan = $('.harga_bangunan_1_m2').val().split('.').join('');
        score_bangunan = Number($('[name="score_bangunan"]').val());
        ibm_bangunan = $('[name="ibm_bangunan_1"]').val();

        rumus_market_bangunan.forEach(function(value) {
            if(score_bangunan >= value['lbh_dari'] &&  score_bangunan <= value['krg_dari']){
                if(ibm_bangunan == 'Ada'){
                    nilai_market_bangunan = Number(luas_bangunan) * Number(harga_bangunan) * Number(value['kali']);
                }else{
                    nilai_market_bangunan = Number(luas_bangunan) * Number(harga_bangunan) * Number(value['kali']) * 0.7;
                }
            }
        });
        $('.nilai_market_bangunan_1').val(numberWithCommas(nilai_market_bangunan.toFixed(0)));
        total();

    }

    function f_nilai_market_bangunan_2(){
        nilai_market_bangunan = 0;
        luas_bangunan = $('.luas_bangunan_2_m2').val().split('.').join('');
        harga_bangunan = $('.harga_bangunan_2_m2').val().split('.').join('');
        score_bangunan = Number($('[name="score_bangunan"]').val());
        ibm_bangunan = $('[name="ibm_bangunan_2"]').val();

        rumus_market_bangunan.forEach(function(value) {
            if(score_bangunan >= value['lbh_dari'] &&  score_bangunan <= value['krg_dari']){
                if(ibm_bangunan == 'Ada'){
                    nilai_market_bangunan = Number(luas_bangunan) * Number(harga_bangunan) * Number(value['kali']);
                }else{
                    nilai_market_bangunan = Number(luas_bangunan) * Number(harga_bangunan) * Number(value['kali']) * 0.7;
                }
            }
        });
        $('.nilai_market_bangunan_2').val(numberWithCommas(nilai_market_bangunan.toFixed(0)));
        total();
    }

    function total(){
        total_market = 0;
        nilai_market_tanah = Number($('.nilai_market_tanah').val().split('.').join(''));
        nilai_market_bangunan_1 = Number($('.nilai_market_bangunan_1').val().split('.').join(''));
        nilai_market_bangunan_2 = Number($('.nilai_market_bangunan_2').val().split('.').join(''));
        total_market = nilai_market_tanah +nilai_market_bangunan_1 + nilai_market_bangunan_2;

        rekomendasi_nilai_kredit = '<?=$rekomendasi_nilai_kredit->rekomendasi_nilai_kredit?>';

        ltv = 0;
        if(total_market != 0){
            ltv = Number(rekomendasi_nilai_kredit)/Number(total_market);
        }
        
        $('.total_market').val(numberWithCommas(total_market));
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