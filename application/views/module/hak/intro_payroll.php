<div class="row">
            <div class="col-md-6 animated-panel zoomIn">
                <div class="hpanel">
                    <div class="panel-body">
                      <div class="panel-body">
                        <form>
                        <div class="col-md-12">
                          <select class="form-control m-b" name="bulan" id="bul"><option value="">-- Pilih Bulan --</option>
                            <?php
                              $bulan=$this->db->get("payroll_bulan")->result();
                              foreach ($bulan as $key) {
                                echo "<option value='$key->bulan'>$key->nama_bulan</option>";
                              }
                            ?>
                          </select>
                        </div>
                        <div class="col-md-12">
                          <select class="form-control m-b" name="tahun" id="thn"><option value="">-- Pilih Tahun --</option>
                            <?php
                              $bulan=$this->db->get("payroll_tahun")->result();
                              foreach ($bulan as $key) {
                                echo "<option value='$key->tahun'>$key->nama_tahun</option>";
                              }
                            ?>
                          </select>
                        </div>
                        <div class="col-md-2">
                          <button class="btn btn-info" type="button" onclick="location.href='<?=base_url()?>hak/payroll/'+$('#thn').val()+'/'+$('#bul').val()" name="overview">Overview</button>
                        </div>
                      </form>
                      </div>
                    </div>

                </div>
            </div>
</div>
