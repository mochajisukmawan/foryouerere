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
                <div class="form-group col-lg-4">
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
                <div class="form-group col-lg-4">
                    <label>Bertingkat</label>
                    <select type="text" value="" class="form-control" name="bertingkat">
                        <option value="" selected disabled>= Pilih Bertingkat =</option>
                        <option>Ya</option>
                        <option>Tidak</option>
                    </select>
                </div>
                <div class="form-group col-lg-4">
                    <label>Jumlah Tingkat</label>
                    <input type="text" value="" class="form-control" name="jumlah_tingkat" >
                </div>
                <div class="form-group col-lg-4">
                    <label>Perawatan</label>
                    <select type="text" value="" class="form-control" name="perawatan">
                        <option value="" selected disabled>= Pilih Perawatan =</option>
                        <option>Baik</option>
                        <option>Kurang</option>
                        <option>Tidak Baik</option>
                    </select>
                </div>
                <div class="form-group col-lg-4">
                    <label>Konstruksi Bangunan</label>
                    <select type="text" value="" class="form-control" name="kontruksi_bangunan">
                        <option value="" selected disabled>= Pilih Konstruksi Bangunan =</option>
                        <?php
                        $kb = $this->db->get('kontruksi_bangunan')->result();
                        foreach($kb as $v_kb){?>
                        <option value="<?=$v_kb->id_kb?>"><?=$v_kb->nama_kb?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group col-lg-4">
                    <label>Lantai</label>
                    <select type="text" value="" class="form-control" name="lantai">
                        <option value="" selected disabled>= Pilih Lantai =</option>
                        <?php
                        $lantai = $this->db->get('lantai')->result();
                        foreach($lantai as $v_lantai){?>
                        <option value="<?=$v_lantai->id_lantai?>"><?=$v_lantai->nama_lantai?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group col-lg-4">
                    <label>Atap</label>
                    <select type="text" value="" class="form-control" name="atap">
                        <option value="" selected disabled>= Pilih Atap =</option>
                        <?php
                        $atap = $this->db->get('atap')->result();
                        foreach($atap as $v_atap){?>
                        <option value="<?=$v_atap->id_atap?>"><?=$v_atap->nama_atap?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group col-lg-4">
                    <label>Kamar Mandi</label>
                    <select type="text" value="" class="form-control" name="kamar_mandi">
                        <option value="" selected disabled>= Pilih Kamar Mandi =</option>
                        <option>Ada</option>
                        <option>Tidak Ada</option>
                    </select>
                </div>
                <div class="form-group col-lg-4">
                    <label>WC</label>
                    <select type="text" value="" class="form-control" name="wc">
                        <option value="" selected disabled>= Pilih WC =</option>
                        <option>Ada</option>
                        <option>Tidak Ada</option>
                    </select>
                </div>
                <div class="form-group col-lg-4">
                    <label>PAM/Sumur Bor</label>
                    <select type="text" value="" class="form-control" name="pam">
                        <option value="" selected disabled>= Pilih PAM/Sumur Bor =</option>
                        <option>Ada</option>
                        <option>Tidak Ada</option>
                    </select>
                </div>
                <div class="form-group col-lg-4">
                    <label>Litrik</label>
                    <select type="text" value="" class="form-control" name="listrik">
                        <option value="" selected disabled>= Pilih Litrik =</option>
                        <option>Ada</option>
                        <option>Tidak Ada</option>
                    </select>
                </div>
                <div class="form-group col-lg-4">
                    <label>Tegangan Listrik(KWH)</label>
                    <input type="text" value="" class="form-control" name="tegangan_listrik" >
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
                <div class="form-group col-lg-4">
                    <label>Usia Bangunan(Bulan)</label>
                    <input type="text" value="" class="form-control" name="usia_bangunan" >
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
                <table id="datamonitor" border="0" class="table table-bordered table-responsive">
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
							<td><input type="text" value="" class="form-control" name="luas_tanah_m2" ></td>
							<td><input type="text" value="" class="form-control" name="harga_tanah_m2" ></td>
							<td><input type="text" value="" class="form-control" name="nilai_market_tanah" readonly></td>
							<td colspan="2 "></td>
						</tr>
                        <tr>
							<td><label>Luas Bangunan (1)</label></td>
							<td><input type="text" value="" class="form-control" name="luas_bangunan_1_m2" ></td>
							<td><input type="text" value="" class="form-control" name="harga_bangunan_1_m2" ></td>
							<td><input type="text" value="" class="form-control" name="nila_market_bangunan_1" readonly></td>
							<td><label>IMB</label></td>
							<td>                    
                                <select type="text" value="" class="form-control" name="ibm_bangunan_1">
                                    <option>Tidak Ada</option>
                                    <option>Ada</option>
                                </select>
                            </td>
						</tr>
                        <tr>
							<td><label>Luas Bangunan (2)</label></td>
							<td><input type="text" value="" class="form-control" name="luas_bangunan_2_m2" ></td>
							<td><input type="text" value="" class="form-control" name="harga_bangunan_2_m2" ></td>
							<td><input type="text" value="" class="form-control" name="nilai_market_bangunan_2" readonly></td>
							<td><label>IMB</label></td>
							<td>                    
                                <select type="text" value="" class="form-control" name="ibm_bangunan_2">
                                    <option>Tidak Ada</option>
                                    <option>Ada</option>
                                </select>
                            </td>						
                        </tr>
                        <tr>
							<td colspan="3"><label>Total</label></td>
							<td><input type="text" value="" class="form-control" name="Total" readonly></td>
							<td><label>LTV</label></td>
							<td>                    
							    <input type="text" value="" class="form-control" name="ltv" >
                            </td>						
                        </tr>
					</tbody>
				</table>
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