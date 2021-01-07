<?php
  if(isset($_POST['verify'])){
    $this->db->where("verify",0);
    $this->db->update("payroll",array("verify"=>1));
    unset($_POST['verify']);
  }
?>
<div class="row">
  <div class="col-lg-12 animated-panel zoomIn">
      <div class="hpanel">
          <div class="panel-heading hbuilt">
              <div class="panel-tools">
                  <a class="showhide"><i class="fa fa-chevron-up"></i></a>
                  <a class="closebox"><i class="fa fa-times"></i></a>
              </div>
              Payroll Menu
          </div>
          <div class="panel-body">
            <h1>Payroll Peserta</h1>
            <?php
            if($_SESSION['eval_jenis']=='admin'){
              ?>
              <form method="POST" action=""><button style="margin-left:10px;" class="btn btn-success btn-sm pull-right" type="submit" name="verify">Verify Uang Saku Peserta</button></form>
              <button style="margin-left:10px;" class="btn btn-primary2 btn-sm pull-right" type="button" onclick="location.href='<?=base_url()?>hak/payroll_export'">Export Payroll Peserta</button>
              <?php
            }
            ?>
          </div>
      </div>
  </div>
</div>
