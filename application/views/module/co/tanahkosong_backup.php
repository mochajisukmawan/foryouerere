<div class="row">
<form id="form" action="<?=base_url()?>user/savetanahkosong/<?=$dn_id?>"  method="post" enctype="multipart/form-data">

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
                    <select type="text" value="" class="form-control" name="hubungan_pemegang_hak_dengan_nasabah">
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
                    <select type="text" value="" class="form-control" name="hubungan_penghuni_dengan_pemegang_hak">
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
                <table id="datamonitor" border="0" class="table table-bordered table-responsive">
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
							<td><input type="text" value="" class="form-control" name="luas_tanah_m2" ></td>
							<td><input type="text" value="" class="form-control" name="harga_tanah_m2" ></td>
							<td><input type="text" value="" class="form-control" name="nilai_market_tanah" readonly></td>
							<td colspan="2 "><input type="text" value="" class="form-control" name="nilai_taksasi" readonly></td>
						</tr>

                        <tr>
							<td colspan="4"></td>
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