<div class="row">
  <div class="col-md-12">
    <div class="hpanel">
        <div class="panel-heading hbuilt">
            <div class="panel-tools">
                <a class="showhide"><i class="fa fa-chevron-up"></i></a>
                <a class="closebox"><i class="fa fa-times"></i></a>
            </div>
          Try This Overview
        </div>
        <div class="panel-body">
          <form method="POST" action="<?=base_url()?>hak/payroll_overview">
          <div class="col-md-2">
            <select class="form-control m-b" name="bulan">
              <?php
                $bulan=$this->db->get("payroll_bulan")->result();
                foreach ($bulan as $key) {
                  echo "<option value='$key->bulan'>$key->nama_bulan</option>";
                }
              ?>
            </select>
          </div>
          <div class="col-md-2">
            <select class="form-control m-b" name="tahun">
              <?php
                $bulan=$this->db->get("payroll_tahun")->result();
                foreach ($bulan as $key) {
                  echo "<option value='$key->tahun'>$key->nama_tahun</option>";
                }
              ?>
            </select>
          </div>
          <div class="col-md-2">
            <button class="btn btn-info" type="submit" name="overview">Overview</button>
          </div>
        </form>
        </div>
      </div>
  </div>
</div>
