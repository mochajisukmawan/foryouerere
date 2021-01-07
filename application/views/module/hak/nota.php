<style>
@media print {
    img#darmo {
        margin-top: -100px;
    }
}
</style>
<div class="row">
        <div class="col-lg-12">
            <div class="hpanel">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h4>INVOICE <small><?=isset($_POST['nota'])?'IN-'.$_POST['unit_kerja_id'].$_POST['bulan'].$_POST['tahun']:'';?></small></h4>
                        </div>
                        <form method="POST" action="">
                        <div class="col-md-6">
                            <div class="text-right">
                              <div class="form-group">
                                  <div class="col-sm-4">
                                    <input type="hidden" name="unit_kerja_id" value="<?=$_SESSION['unit_kerja_id']?>" required>
                                    <select class="form-control m-b" name="bulan" required>
                                      <option value="">-- Bulan --</option>
                                      <?php
                                        $bulan=$this->db->get("payroll_bulan")->result();
                                        foreach ($bulan as $key) {
                                          echo "<option value='$key->bulan'>$key->nama_bulan</option>";
                                        }
                                      ?>
                                    </select>
                                  </div>
                              </div>
                              <div class="form-group">
                                  <div class="col-sm-4">
                                    <select class="form-control m-b" name="tahun" required>
                                      <option value="">-- Tahun --</option>
                                      <?php
                                        $bulan=$this->db->get("payroll_tahun")->result();
                                        foreach ($bulan as $key) {
                                          echo "<option value='$key->tahun'>$key->nama_tahun</option>";
                                        }
                                      ?>
                                    </select>
                                  </div>
                              </div>
                              <div class="form-group">
                                  <div class="col-sm-4">
                                    <button type="submit" name="nota" class="btn btn-primary btn-sm"><i class="fa fa-gear"></i> Generate Nota</button>
                                  </div>
                              </div>
                            </div>
                        </div>
                      </form>
                    </div>
                </div>
                <?php
                  if(isset($_POST['nota'])){
                    $invoice=$this->db->get_where("invoice",array("bulan"=>$_POST['bulan'],"tahun"=>$_POST['tahun'],"unit_kerja_id"=>$_POST['unit_kerja_id']))->result();
                    if(sizeof($invoice)>0){
                      $unit_kerja=$this->db->get_where("unit_kerja",array("kode_unit"=>$_POST['unit_kerja_id']))->row();
                ?>
                <div class="panel-body p-xl" id="cetak">
                  <img id="darmo" style="width:120px;height:70px;" class="pull-right" src="<?=base_url()?>assets/images/magangdharma.jpg">
                    <div class="row m-b-xl">
                        <div class="col-sm-9">
                            <h4><?=isset($_POST['nota'])?'INVOICE-'.$_POST['unit_kerja_id'].$_POST['bulan'].$_POST['tahun']:'';?></h4>
                            <address>
                                <strong>Magang Dharma Bank Jateng</strong><br>
                                <strong><?=isset($unit_kerja)?$unit_kerja->unit:'';?></strong><br>
                                <span>Nota Bulan <?=$this->gmodel->getBulan($_POST['bulan'])?> <?=$_POST['tahun']?></span><br>
                            </address>
                        </div>
                        <div class="col-sm-3">
                          <address>
                          </address>
                        </div>
                    </div>
                    <div class="table-responsive m-t">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th width="40%">Keterangan</th>
                                <th width="20%">Jumlah Peserta</th>
                                <th width="20%">Nominal</th>
                                <th width="20%">Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    <div><strong>Uang Saku Peserta Magang</strong></div>
                                    <small>Uang Saku Peserta Magang Dharma Bulan <?=$this->gmodel->getBulan($_POST['bulan'])?> Tahun <?=$_POST['tahun']?>
                                    </small>
                                </td>
                                <td><?=($invoice[0]->magangers_jml_real);?> Orang</td>
                                <td>Rp. <?=number_format($invoice[0]->magangers_saku/$invoice[0]->magangers_jml_real);?>,-</td>
                                <td>Rp. <?=number_format($invoice[0]->magangers_saku);?>,-</td>
                            </tr>
                            <tr>
                                <td>
                                    <div><strong>Uang Bantuan Penampilan Peserta Magang</strong></div>
                                    <small>Uang Bantuan Penampilan Peserta Magang Dharma Bulan <?=$this->gmodel->getBulan($_POST['bulan'])?> Tahun <?=$_POST['tahun']?>
                                    </small>
                                </td>
                                <td><?=($invoice[0]->magangers_jml_real);?> Orang</td>
                                <td>Rp. <?=number_format($invoice[0]->magangers_tunj/$invoice[0]->magangers_jml_real);?>,-</td>
                                <td>Rp. <?=number_format($invoice[0]->magangers_tunj);?>,-</td>
                            </tr>
                            <tr>
                                <td>
                                    <div><strong>Uang Makan Peserta Magang</strong></div>
                                    <small>Uang Makan Peserta Magang Dharma Bulan <?=$this->gmodel->getBulan($_POST['bulan'])?> Tahun <?=$_POST['tahun']?>
                                    </small>
                                </td>
                                <td><?=($invoice[0]->magangers_jml);?> Orang</td>
                                <td>&nbsp;-&nbsp;</td>
                                <td>Rp. <?=number_format($invoice[0]->magangers_uang_makan);?>,-</td>
                            </tr>
                            <tr>
                                <td>
                                    <div><strong>BPJS Ketenagakerjaan Peserta Magang</strong></div>
                                    <small>BPJS Ketenagakerjaan Magang Dharma Bulan <?=$this->gmodel->getBulan($_POST['bulan'])?> Tahun <?=$_POST['tahun']?>
                                    </small>
                                </td>
                                <td><?=($invoice[0]->magangers_jml_real);?> Orang</td>
                                <td>Rp. <?=number_format($invoice[0]->magangers_bpjs_ktn/$invoice[0]->magangers_jml_real);?>,-</td>
                                <td>Rp. <?=number_format($invoice[0]->magangers_bpjs_ktn);?>,-</td>
                            </tr>
                            <tr>
                                <td>
                                    <div><strong>BPJS Kesehatan Peserta Magang</strong></div>
                                    <small>BPJS Kesehatan Magang Dharma Bulan <?=$this->gmodel->getBulan($_POST['bulan'])?> Tahun <?=$_POST['tahun']?>
                                    </small>
                                </td>
                                <td><?=($invoice[0]->magangers_jml_real);?> Orang</td>
                                <td>Rp. <?=number_format($invoice[0]->magangers_bpjs_kes/$invoice[0]->magangers_jml_real);?>,-</td>
                                <td>Rp. <?=number_format($invoice[0]->magangers_bpjs_kes);?>,-</td>
                            </tr>
                            <tr>
                                <td>
                                    <div><strong>Honor Pembimbing</strong></div>
                                    <small>Honor Pembimbing Magang Dharma <?=isset($unit_kerja)?$unit_kerja->unit:'';?> Bulan <?=$this->gmodel->getBulan($_POST['bulan'])?> Tahun <?=$_POST['tahun']?>
                                    </small>
                                </td>
                                <td>
                                </td>
                                <td>Rp. <?=number_format(250000);?>,-</td>
                                <td>Rp. <?=number_format($invoice[0]->honor_pembimbing);?>,-</td>
                            </tr>
                            <tr>
                                <td>
                                    <div><strong>THR Keagamaan</strong></div>
                                    <small>Thr Magang Dharma <?=isset($unit_kerja)?$unit_kerja->unit:'';?> Bulan <?=$this->gmodel->getBulan($_POST['bulan'])?> Tahun <?=$_POST['tahun']?>
                                    </small>
                                </td>
                                <td><?=($invoice[0]->magangers_jml_real);?> Orang</td>
                                <td>Rp. <?=number_format(2500000);?>,-</td>
                                <td>Rp. <?=number_format($invoice[0]->magangers_thr);?>,-</td>
                            </tr>
                            <tr>
                                <td>
                                    <div><strong>Lembur Opersional Terbatas</strong></div>
                                    <small>Lembur OT Magang Dharma <?=isset($unit_kerja)?$unit_kerja->unit:'';?> Bulan <?=$this->gmodel->getBulan($_POST['bulan'])?> Tahun <?=$_POST['tahun']?>
                                    </small>
                                </td>
                                <td><?=($invoice[0]->magangers_jml_real);?> Orang</td>
                                <td>Rp. <?=number_format(300000);?>,-</td>
                                <td>Rp. <?=number_format($invoice[0]->magangers_lembur_ot);?>,-</td>
                            </tr>
                            <tr>
                                <td>
                                    <div><strong>Pakaian Dinas</strong></div>
                                    <small>Biaya Pakaian Dinas <?=isset($unit_kerja)?$unit_kerja->unit:'';?> Bulan <?=$this->gmodel->getBulan($_POST['bulan'])?> Tahun <?=$_POST['tahun']?>
                                    </small>
                                </td>
                                <td><?=($invoice[0]->magangers_jml_real);?> Orang</td>
                                <td></td>
                                <td>Rp. <?=number_format($invoice[0]->magangers_pakdin);?>,-</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="row m-t">
                        <div class="col-md-4 col-md-offset-8">
                            <table class="table table-striped text-right">
                                <tbody>
                                <tr>
                                    <td><strong>TOTAL :</strong></td>
                                    <td>Rp. <?=number_format($invoice[0]->honor_pembimbing+$invoice[0]->magangers_saku+$invoice[0]->magangers_tunj+$invoice[0]->magangers_bpjs_kes+$invoice[0]->magangers_bpjs_ktn+$invoice[0]->magangers_uang_makan+$invoice[0]->magangers_thr+$invoice[0]->magangers_lembur_ot+$invoice[0]->magangers_pakdin);?>,-</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6" style="width:52%; float:left;">
                            <div class="m-t">
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                          <button class="btn btn-primary2 btn-sm pull-right hidden-print" onclick="cetak('cetak')">Cetak Nota</button>
                    </div>
                </div>
              <?php
                }
              }
              ?>
            </div>

        </div>
    </div>
    <script>
      function cetak(el){
                var restorepage = document.body.innerHTML;
                var printcontent = document.getElementById(el).innerHTML;
                document.body.innerHTML = printcontent;
                window.print();
                document.body.innerHTML = restorepage;
      }

</script>
