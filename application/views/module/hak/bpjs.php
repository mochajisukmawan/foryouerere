<div class="row">
  <?php
    if(isset($_POST['export'])){
?>
<div class="col-lg-12 animated-panel zoomIn">
    <div class="hpanel">
        <div class="panel-heading hbuilt">
            <div class="panel-tools">
                <a class="showhide"><i class="fa fa-chevron-up"></i></a>
                <a class="closebox"><i class="fa fa-times"></i></a>
            </div>
            Rekap BPJS Peserta Magang Tahun <?=$_POST['tahun']?> Bulan <?=$this->gmodel->getBulan($_POST['bulan']);?>
        </div>
        <div class="panel-body">
          <table class="table table-striped table-bordered">
            <tr>
              <td width="5%">No</td>
              <td width="13%">Nama</td>
              <td width="12%">Gaji Pokok</td>
              <td width="40%">Perhitungan</td>
              <td width="10%">BPJS TK</td>
              <td width="10%">BPJS Kes</td>
              <td width="10%">Jumlah</td>
            </tr>
            <?php
            $n=1;$jml=0;$jml_tk=0;$jml_k=0;
            $exp=$this->db->select("*")->from("payroll a")->join("peserta_magang b","a.nomor_register=b.nomor_register","left")->where(array("a.bulan"=>$_POST['bulan'],"a.tahun"=>$_POST['tahun'],"a.unit_kerja_id"=>$_POST['unit_kerja_id'],"a.verify"=>1))->get()->result();
            foreach($exp as $x){
              ?>
              <tr>
                <td><?=$n?></td>
                <td><?=$x->nama?></td>
                <td>Rp. <?=number_format($x->pend_pokok)?>,-</td>
                <td>
                  <div class="col-md-6">
                    <b>BPJS TK</b><br/>
                    <small>
                       0,54 % x <?=number_format($x->pend_pokok)?> : Rp. <?=number_format(0.54/100*$x->pend_pokok)?>,-
                    </small>
                  </div>
                  <div class="col-md-6">
                    <b>BPJS Kes</b><br/>
                    <small>
                      FIX : <?=number_format(51000)?><small>&nbsp;(Kelas 2)</small><br/>
                    </small>
                  </div>
                </td>
                <td>Rp. <?=number_format(0.54/100*$x->pend_pokok)?>,-</td>
                <td>Rp. <?=number_format(51000)?>,-</td>
                <td><?php $jml_tk+=(0.54/100*$x->pend_pokok);$jml_k+=51000;$jml+=(0.54/100*$x->pend_pokok)+(51000); ?>Rp. <?=number_format((0.54/100*$x->pend_pokok)+(51000))?>,-</td>
              </tr>
              <?php
              $n++;
            }
            ?>
            <tr>
              <td colspan="4" align="center"><b>JUMLAH</b></td>
              <td><b>Rp. <?=number_format($jml_tk)?>,-</b></td>
              <td><b>Rp. <?=number_format($jml_k)?>,-</b></td>
              <td><b>Rp. <?=number_format($jml)?>,-</b></td>
            </tr>
          </table>
        </div>
    </div>
</div>
<?php
    }else{
      ?>
      <div class="col-lg-6 animated-panel zoomIn">
          <div class="hpanel">
              <div class="panel-heading hbuilt">
                  <div class="panel-tools">
                      <a class="showhide"><i class="fa fa-chevron-up"></i></a>
                      <a class="closebox"><i class="fa fa-times"></i></a>
                  </div>
                  Data Rekap BPJS Peserta Magang
              </div>
              <div class="panel-body">
              <form method="POST" action="" class="form-horizontal">
              <div class="form-group"><label class="col-sm-2 control-label">Bulan</label>
                  <div class="col-sm-10">
                    <input type="hidden" name="unit_kerja_id" value="<?=$_SESSION['unit_kerja_id']?>">
                    <select class="form-control m-b" name="bulan">
                      <?php
                        $bulan=$this->db->get("payroll_bulan")->result();
                        foreach ($bulan as $key) {
                          echo "<option value='$key->bulan'>$key->nama_bulan</option>";
                        }
                      ?>
                    </select>
                  </div>
              </div>
              <div class="form-group"><label class="col-sm-2 control-label">Tahun</label>
                  <div class="col-sm-10">
                    <select class="form-control m-b" name="tahun">
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
                  <div class="col-sm-8 col-sm-offset-2">
                      <button class="btn btn-primary" type="submit" name="export">Download</button>
                  </div>
              </div>
              </form>
              </div>
          </div>
      </div>
      <?php
    }
  ?>
</div>
