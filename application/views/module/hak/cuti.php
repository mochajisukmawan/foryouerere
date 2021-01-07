<div class="row">
  <div class="col-lg-12">
    <p>*Note : Peserta dapat mengajukan cuti jika masa kerja sudah mencapai 6 bulan.</p>
        <div class="hpanel">
            <div class="panel-body">
              <div class="col-md-12">
              <?php
                $cuti=$this->db->get_where("peserta_magang",array("nomor_register"=>$nomor_register));
                $cuti = $cuti->result();
                foreach ($cuti as $key) {
                  $datetime1 = date_create(date('Y-m-d'));
                  $datetime2 = date_create($key->tgl_masuk);
                  $interval = date_diff($datetime1, $datetime2);
                  //$interval->m>=6
                    ?>

                    <table class="table table-striped table-bordered table-hover" style="width:30%;" >
                      <thead>
                        <th>Masa Kerja</th>
                        <th>Sisa Cuti</th>
                      </thead>
                      <tbody>
                        <tr>
                          <td><?=$interval->y?> Tahun <br> <?=$interval->m + 1?> Bulan <br> <?=$interval->d?> Hari</td>
                          <td>
                            <?php
                              $sisa=$this->db->get_where("cuti_sisa",array("nomor_register"=>$key->nomor_register));
                              $sisa=$sisa->result();
                              $sisa_cuti=0;
                              if(sizeof($sisa)>0){
                                foreach ($sisa as $keys) {
                                  $sisa_cuti=$keys->sisa_cuti;
                                }
                              }else{
                                $this->db->insert("cuti_sisa",array("nomor_register"=>$key->nomor_register,"sisa_cuti"=>6));
                              }
                              echo $sisa_cuti;
                            ?>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                    <hr>
                  </div>
                  <div class="col-md-6">
                    <div class="row">
                      <div class="panel hpanel hblue">
                        <div class="panel-heading hbuilt">Log Cuti <?=$key->nama_panggilan?></div>
                        <div class="panel-body">
                    <?php
                      if($interval->m>=5){
                        ?>
                        <a href="#" onclick="add_cuti(<?=$nomor_register?>,'<?=str_replace('%20',' ',$nama)?>')" class="btn btn-success btn-xs">Tambah Cuti</a>
                        <?php
                      }else{
                        ?>
                        <h5 class="pull-right"><?=$key->nama?> Belum di perbolehkan Cuti</h5>
                        <?php
                      }
                    ?>

                    <br/>
                    <table class="table table-striped table-bordered table-hover">
                      <thead>
                        <th>Jenis Cuti</th>
                        <th>Tanggal Mulai/Selesai</th>
                        <th>Lama Cuti</th>
                        <th>Keterangan</th>
                        <th>Pilihan</th>
                      </thead>
                      <tbody>
                      <?php
                        $log=$this->db->get_where("cuti_log",array("nomor_register"=>$key->nomor_register));
                        $log=$log->result();
                        foreach ($log as $keys) {
                          ?>
                          <tr>
                            <td><?=$keys->jenis_cuti?></td>
                            <td><small><?=date("d M Y",strtotime($keys->tgl_mulai))?> / <?=date("d M Y",strtotime($keys->tgl_selesai))?></small></td>
                            <td><?=$keys->lama_cuti?> Hari</td>
                            <td><?=$keys->keterangan?></td>
                            <td><a href="#" onclick="hapus_cuti(<?=$nomor_register?>,<?=$keys->cuti_log_id?>,<?=$keys->lama_cuti?>,'<?=$keys->tgl_mulai?>')" class="btn btn-danger btn-xs">Hapus Cuti</a></td>
                          </tr>
                          <?php
                        }
                      ?>
                      </tbody>
                    </table>
                    <?php

                }
              ?>
              </div>
              </div>
              </div>
              </div>
              <div class="col-md-6">
                <div class="row">
                  <div class="panel hpanel hred">
                    <div class="panel-heading hbuilt">Log Izin <?=$key->nama_panggilan?></div>
                    <div class="panel-body">
                <a href="#" onclick="add_izin(<?=$nomor_register?>,'<?=str_replace('%20',' ',$nama)?>')" class="btn btn-success btn-xs">Tambah IZIN</a>
                <br/>
                <table class="table table-striped table-bordered table-hover">
                  <thead>
                    <th>Jenis Absen</th>
                    <th>Tanggal Absen</th>
                    <th>Keterangan</th>
                    <th>Pilihan</th>
                  </thead>
                  <tbody>
                  <?php
                    $log=$this->db->get_where("absensi",array("nomor_register"=>$key->nomor_register,"absen_status != "=>"CUTI TAHUNAN"));
                    $log=$log->result();
                    foreach ($log as $keys) {
                      ?>
                      <tr>
                        <td><?=$keys->absen_status?></td>
                        <td><small><?=date("d M Y",strtotime($keys->tanggal_absen))?></small></td>
                        <td><?=$keys->keterangan?></td>
                        <td><a href="#" onclick="hapus_izin(<?=$nomor_register?>,<?=$keys->absensi_id?>)" class="btn btn-danger btn-xs">Hapus Izin</a></td>
                      </tr>
                      <?php
                    }
                  ?>
                  </tbody>
                </table>
                </div>
                </div>
                </div>
              </div>
            </div>
        </div>
    </div>

</div>

<script type="text/javascript">
  function add_cuti(id,nama)
  {
    $('[name = "nomor_register"]').val(id);
    $('.nama').val(nama);
    $('#add_cuti').modal('show');
  }
  function hapus_cuti(idpeserta,idlog,lama,tglmulai)
  {
    $('#hapus_cuti input[name = "nomor_register"]').val(idpeserta);
    $('#hapus_cuti input[name = "cuti_log_id"]').val(idlog);
    $('#hapus_cuti input[name = "lama_cuti"]').val(lama);
    $('#hapus_cuti input[name = "tgl_mulai"]').val(tglmulai);
    $('#hapus_cuti').modal('show');
  }
  function add_izin(id,nama)
  {
    $('[name = "nomor_register"]').val(id);
    $('.nama').val(nama);
    $('#add_izin').modal('show');
  }
  function hapus_izin(idpeserta,idlog)
  {
    $('#hapus_izin input[name = "nomor_register"]').val(idpeserta);
    $('#hapus_izin input[name = "absensi_id"]').val(idlog);
    $('#hapus_izin').modal('show');
  }
</script>

<div class="modal fade" id="add_cuti" tabindex="-1" role="dialog" aria-hidden="true">
    <input type="hidden" name="nomor_register" value="">
      <div class="modal-dialog modal-lg">
          <div class="modal-content">
              <div class="color-line"></div>
              <div class="modal-header text-center">
                  <h4 class="modal-title">Cuti Peserta Magang</h4>
                  <small class="font-bold">Form untuk Cuti peserta magang.</small>
              </div>
              <div class="modal-body">
                <div id="form_cuti_beruntun">
                  <form method="post" class="form-horizontal" action="<?=base_url()?>hak/simpan_cuti">
                    <input type="hidden" name="nomor_register" value="">
                    <input type="hidden" name="sisa_cuti" value="<?=$sisa_cuti?>">
                    <input type="hidden" name="jenis_cuti" value="CUTI TAHUNAN">
                    <!-- <div class="hr-line-dashed"></div> -->
                    <div class="form-group"><label class="col-sm-2 control-label">Nama Peserta</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control nama" name="nama" readonly>
                      </div>
                    </div>
                    <div class="form-group">
                      <!-- <h5>Tanggal Cuti</h5> -->
                      <label class="col-sm-2 control-label">Tanggal Cuti</label>
                      <div class="col-sm-2">
                        <input type="text" placeholder="Tgl Mulai Cuti" readonly data-date-format="yyyy-mm-dd" class="form-control datapicker2" required name="tgl_mulai"/>
                      </div>
                      <div class="col-sm-8">
                        <div class="input-daterange input-group">
                          <label>Mau Cuti Brp Hari ?</label> &nbsp;
                          <input type="radio" name="lamalama" value="1" checked> 1 Hari
                          <input type="radio" name="lamalama" value="2"> 2 Hari
                          <input type="radio" name="lamalama" value="3"> 3 Hari
                        </div>
                    </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Keterangan</label>
                      <div class="col-sm-10">
                        <textarea placeholder="Alasan dari cuti" name="keterangan" rows="4" cols="80" class="form-control"></textarea>
                      </div>
                    </div>
                </div>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                  <button type="submit" id="simpan_abs" class="btn btn-primary">Simpan</button>
              </div>
            </form>
          </div>
      </div>
</div>
<div class="modal fade" id="hapus_cuti" tabindex="-1" role="dialog" aria-hidden="true">
    <input type="hidden" name="nomor_register" value="">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="color-line"></div>
              <div class="modal-header text-center">
                  <h4 class="modal-title">Konfirmasi Hapus</h4>
                  <small class="font-bold">Form untuk Cuti peserta magang.</small>
              </div>
              <div class="modal-body">
                <div id="form_cuti_beruntun">
                  <form method="post" class="form-horizontal" action="<?=base_url()?>hak/hapus_cuti">
                    <input type="hidden" name="nomor_register" value="">
                    <input type="hidden" name="cuti_log_id" value="">
                    <input type="hidden" name="lama_cuti" value="">
                    <input type="hidden" name="tgl_mulai" value="">
                    <input type="hidden" class="form-control" name="nama" value="<?=str_replace('%20',' ',$nama)?>" readonly>
                </div>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                  <button type="submit" id="simpan_abs" class="btn btn-danger">Hapus</button>
              </div>
            </form>
          </div>
      </div>
</div>

<div class="modal fade" id="add_izin" tabindex="-1" role="dialog" aria-hidden="true">
    <input type="hidden" name="nomor_register" value="">
      <div class="modal-dialog">
          <div class="modal-content modal-lg">
              <div class="color-line"></div>
              <div class="modal-header text-center">
                  <h4 class="modal-title">IZIN Peserta Magang</h4>
                  <small class="font-bold">Form untuk izin peserta magang.</small>
              </div>
              <div class="modal-body">
                <div id="form_cuti_beruntun">
                  <form method="post" class="form-horizontal" action="<?=base_url()?>hak/simpan_izin">
                    <input type="hidden" name="nomor_register" value="">
                    <div class="form-group"><label class="col-sm-2 control-label">Nama Peserta</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control nama" name="nama" readonly>
                      </div>
                    </div>
                    <div class="form-group"><label class="col-sm-2 control-label">Jenis IZIN</label>
                      <div class="col-sm-10">
                        <select class="form-control" name="absen_status">
                          <option value="IZIN">IZIN</option>
                          <option value="SAKIT">SAKIT</option>
						  <option value="ALPHA">ALPHA</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                        <!-- <h5>Tanggal Cuti</h5> -->
                        <label class="col-sm-2 control-label">Tanggal Izin</label>
                        <div class="col-sm-2">
                          <input type="text" placeholder="Tgl Mulai Izin" readonly data-date-format="yyyy-mm-dd" class="form-control datapicker2" required name="tgl_mulai"/>
                        </div>
                        <div class="col-sm-8">
                          <div class="input-daterange input-group">
                            <label>Mau Izin Brp Hari ?</label> &nbsp;
                            <input type="radio" name="lamalama" value="1" checked> 1 Hari
                            <input type="radio" name="lamalama" value="2"> 2 Hari
                            <input type="radio" name="lamalama" value="3"> 3 Hari
                            <input type="radio" name="lamalama" value="4"> 4 Hari
                            <input type="radio" name="lamalama" value="5"> 5 Hari
                            <input type="radio" name="lamalama" value="6"> 6 Hari
                          </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Keterangan</label>
                      <div class="col-sm-10">
                        <textarea placeholder="Alasan dari izin" name="keterangan" rows="4" cols="80" class="form-control"></textarea>
                      </div>
                    </div>
                </div>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                  <button type="submit" id="simpan_abs" class="btn btn-primary">Simpan</button>
              </div>
            </form>
          </div>
      </div>
</div>
<div class="modal fade" id="hapus_izin" tabindex="-1" role="dialog" aria-hidden="true">
    <input type="hidden" name="nomor_register" value="">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="color-line"></div>
              <div class="modal-header text-center">
                  <h4 class="modal-title">Konfirmasi Hapus</h4>
                  <small class="font-bold">Form untuk izin peserta magang.</small>
              </div>
              <div class="modal-body">
                <div id="form_cuti_beruntun">
                  <form method="post" class="form-horizontal" action="<?=base_url()?>hak/hapus_izin">
                    <input type="hidden" name="nomor_register" value="">
                    <input type="hidden" name="absensi_id" value="">
                    <input type="hidden" class="form-control" name="nama" value="<?=str_replace('%20',' ',$nama)?>" readonly>
                </div>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                  <button type="submit" id="simpan_abs" class="btn btn-danger">Hapus</button>
              </div>
            </form>
          </div>
      </div>
</div>
