<div class="row">
  <div class="col-lg-6 animated-panel zoomIn">
      <div class="hpanel">
          <div class="panel-heading hbuilt">
              <div class="panel-tools">
                  <a class="showhide"><i class="fa fa-chevron-up"></i></a>
                  <a class="closebox"><i class="fa fa-times"></i></a>
              </div>
              Uang Makan Peserta Magang
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
                    $bulan=$this->db->select('*')
                      ->from('payroll_tahun')
                      ->order_by("tahun","asc")
                      ->get()->result();
                    foreach ($bulan as $key) {
                      echo "<option value='$key->tahun'>$key->tahun</option>";
                    }
                  ?>
                </select>
              </div>
          </div>
          <div class="form-group">
              <div class="col-sm-8 col-sm-offset-2">
                  <button class="btn btn-primary" type="submit" name="export">View</button>
              </div>
          </div>
          </form>
          </div>
      </div>
  </div>
</div>
<?php
    if(isset($_POST['export'])){
?>
<div class="row">
<div class="col-lg-12 animated-panel zoomIn">
    <div class="hpanel">
        <div class="panel-heading hbuilt">
            <div class="panel-tools">
                <a class="showhide"><i class="fa fa-chevron-up"></i></a>
                <a class="closebox"><i class="fa fa-times"></i></a>
            </div>
            Absensi Peserta Magang Bulan <?=$this->gmodel->getBulan($_POST['bulan']);?> Tahun <?=$_POST['tahun']?>
        </div>
        <div class="panel-body">
          KETERANGAN :
          <button class="btn btn-primary btn-xs">HADIR BELUM DI APPROVE</button>
          <button class="btn btn-success btn-xs">HADIR</button>
          <button class="btn btn-danger btn-xs">ABSEN</button>
          <button class="btn btn-warning btn-xs">IZIN</button>
          <button class="btn btn-info btn-xs">CUTI</button>
          <br/><br/>
          <div class="table-responsive">
          <table class="table table-striped table-bordered">
            <tr>
              <td width="4%" align="center" rowspan="2"><b>No</b></td>
              <td width="15%" align="center" rowspan="2"><b>Nama</b></td>
              <td width="10%" align="center" rowspan="2"><b>Uang Makan</b></td>
              <td colspan="31" style="background-color:#a6d9fb;" align="center"><b>Bulan <?=$this->gmodel->getBulan($this->gmodel->getNextMonth($_POST['bulan']));?> Tahun <?=$this->gmodel->getNextYear($_POST['bulan'],$_POST['tahun'])?></b></td>
              <td colspan="31" style="background-color:#ffebb9;" align="center"><b>Bulan <?=$this->gmodel->getBulan($_POST['bulan']);?> Tahun <?=$_POST['tahun']?></b></td>
            </tr>
            <tr>
              <?php
              for($d=31;$d>=1;$d--){
                ?><td width="0.5%"><?=$d?></td><?php
              }
              ?>
              <?php
              for($d=31;$d>=1;$d--){
                ?><td width="0.5%"><?=$d?></td><?php
              }
              ?>
            </tr>
            <?php
            $n=1;$jml=0;
            $cek=$this->db->query("SELECT a.`nomor_register` FROM pembimbing_magang_peserta a JOIN pembimbing_magang b ON a.`id_pembimbing_magang`=b.`id_pembimbing_magang` WHERE b.`unit_kerja_id`=? AND a.tanggal_mulai <= NOW() AND a.tanggal_selesai >= NOW()",array($_SESSION['unit_kerja_id']))->result_array();
            if($cek>0){
              $cek=array_column($cek,"nomor_register");
              $exp=$this->db->query("select * from view_peserta_magang where nomor_register in ('".implode($cek,"','")."') order by tgl_masuk asc")->result();

              $this->db->where_in("nomor_register",$cek);
              $this->db->where("tanggal like '".$this->gmodel->getNextYear($_POST['bulan'],$_POST['tahun'])."-".$this->gmodel->getNextMonth($_POST['bulan'])."%' and dayname(tanggal) not in ('Saturday','Sunday')");
              $absensi1=$this->db->get("self_assessment")->result();

              $this->db->where_in("nomor_register",$cek);
              $this->db->where("tanggal like '".$_POST['tahun']."-".$_POST['bulan']."%' and dayname(tanggal) not in ('Saturday','Sunday')");
              $absensi2=$this->db->get("self_assessment")->result();
            }else{
              $exp=null;
            }
            $row=0;$split_periode="";
            foreach($exp as $x){
              if($split_periode != $x->tgl_masuk){
                ?><tr><td style="background-color:#ff64fe;" colspan="65"><b style="color:white;">Periode Magang <?=date('d M Y',strtotime($x->tgl_masuk))?></b></td></tr><?php
                $split_periode=$x->tgl_masuk;
              }
              $row++;
              ?>
              <tr>
                <td><?=$n?></td>
                <td><?=$x->nama?></td>
                <td>
                  <?php
                    $abs=$this->db->get_where("view_uang_makan",array("nomor_register"=>$x->nomor_register,"tahun"=>$_POST['tahun'],"bulan"=>$_POST['bulan']));
                    $abs=$abs->row();
                    if(isset($abs)){
                      echo "Rp. ".number_format($abs->absensi*30000).",-";
                    }
                  ?>
                </td>
                <?php
                for($d=31;$d>=1;$d--){
                  ?><td>
                    <?php
                      $sum=0;
                      foreach ($absensi1 as $c) {
                        if($d==date("j",strtotime($c->tanggal)) && $c->nomor_register==$x->nomor_register){
                          if($c->dinilai==1){
                            $sum++;
                            ?>
                              <button class="btn btn-success btn-xs">&nbsp;</button>
                            <?php
                            break;
                          }else{
                              $sum++;
                            ?>
                              <button class="btn btn-primary btn-xs">&nbsp;</button>
                            <?php
                            break;
                          }
                        }
                      }
                      if($sum==0){
                        $cek_absen_cuti=$this->db->query("select * from absensi where tanggal_absen like '".$this->gmodel->getNextYear($_POST['bulan'],$_POST['tahun'])."-".$this->gmodel->getNextMonth($_POST['bulan'])."%' and nomor_register = ?",array($x->nomor_register))->result();
                        $cek=0;
                        foreach ($cek_absen_cuti as $key) {
                          if(date("j",strtotime($key->tanggal_absen))==$d){
                            $cek++;
                            $btn="warning";
                            ?><button class="btn btn-<?=$btn?> btn-xs">&nbsp;</button><?php
                            break;
                          }
                        }
                        if($cek==0){
                          ?><button class="btn btn-danger btn-xs">&nbsp;</button><?php
                        }
                      }
                    ?>
                  </td><?php
                }
                ?>
                <?php
                for($d=31;$d>=1;$d--){
                  ?><td>
                    <?php
                      $sum=0;
                      foreach ($absensi2 as $c) {
                        if($d==date("j",strtotime($c->tanggal)) && $c->nomor_register==$x->nomor_register){
                          if($c->dinilai==1){
                            $sum++;
                            ?>
                              <button class="btn btn-success btn-xs">&nbsp;</button>
                            <?php
                            break;
                          }else{
                              $sum++;
                            ?>
                              <button class="btn btn-primary btn-xs">&nbsp;</button>
                            <?php
                            break;
                          }
                        }
                      }
                      if($sum==0){
                        $cek_absen_cuti=$this->db->query("select * from absensi where tanggal_absen like '".$_POST['tahun']."-".$_POST['bulan']."%' and nomor_register = ?",array($x->nomor_register))->result();
                        $cek=0;
                        foreach ($cek_absen_cuti as $key) {
                          if(date("j",strtotime($key->tanggal_absen))==$d){
                            $cek++;
                            $btn="warning";
                            ?><button class="btn btn-<?=$btn?> btn-xs">&nbsp;</button><?php
                            break;
                          }
                        }
                        if($cek==0){
                          ?><button class="btn btn-danger btn-xs">&nbsp;</button><?php
                        }
                      }
                    ?>
                  </td><?php
                }
                ?>
              </tr>
              <?php
              $n++;
            }
            ?>
          </table>
        </div>
        </div>
    </div>
</div>
<?php
    }
  ?>
</div>
