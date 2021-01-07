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
            <h1>Honorarium Pembimbing</h1>
            <?php
            if($_SESSION['eval_jenis']=='admin'){
              ?>
              <button style="margin-left:10px;" class="btn btn-primary2 btn-sm pull-right" type="button" onclick="location.href='<?=base_url()?>hak/payroll'">Payroll Peserta</button>
              <?php
            }
            ?>
          </div>
      </div>
  </div>
</div>
