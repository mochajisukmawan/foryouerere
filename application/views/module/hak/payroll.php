<div class="row">
  <div class="col-md-12">
    <div class="panel hpanel hblue">
      <div class="panel-heading hbuilt">
        Honor Peserta Magang Dharma Bulan <?=date("M",strtotime($year.'-'.$month.'-01'))?> <?php echo $year;?>
      </div>
      <div class="panel-body">
        <table class="table table-striped">
          <tr>
            <th width="10">No</th>
            <th width="10">KODE REGISTER</th>
            <th width="10">NAMA</th>
            <th width="10">UNIT KERJA</th>
            <th>PEND POKOK</th>
            <th>TUNJANGAN</th>
            <th>BPJS KES</th>
            <th>UANG MAKAN</th>
            <th>TAKE HOME PAY</th>
          </tr>
          <?php
            $payroll=$this->db->select("*")->from("payroll a")->join("view_peserta_magang b","a.nomor_register=b.nomor_register")->where(array("a.tahun"=>$year,"a.bulan"=>$month))->get()->result();
            
            // $payrollPesertaSelesai=$this->db->query("SELECT a.*,b.kode_register,b.nama,(select uk.unit from unit_kerja uk where uk.kode_unit=a.unit_kerja_id) as unit_kerja 
            //   from payroll a JOIN peserta_magang b ON (a.`nomor_register`=b.`nomor_register` ) WHERE a.nomor_register IN (SELECT pm.`nomor_register` FROM peserta_magang pm WHERE pm.`selesai_level`='Tahap-Dasar' AND pm.`nomor_register` NOT IN (
            //     SELECT nomor_register FROM view_peserta_magang v) AND pm.`tgl_masuk`='2019-01-07') AND a.tahun=$year AND a.bulan='$month'")->result();
            $payrollPesertaSelesai=$this->db->query("SELECT a.*,b.kode_register,b.nama,(select uk.unit from unit_kerja uk where uk.kode_unit=a.unit_kerja_id) as unit_kerja 
              from payroll a JOIN peserta_magang b ON (a.`nomor_register`=b.`nomor_register` ) WHERE a.nomor_register IN (SELECT pm.`nomor_register` FROM peserta_magang pm JOIN pembimbing_magang_peserta pmp on pm.nomor_register = pmp.nomor_register WHERE pmp.aktif='3' AND pm.`selesai_level`='Tahap-Dasar' AND pm.`nomor_register` NOT IN (
                SELECT nomor_register FROM view_peserta_magang v) AND YEAR(pmp.`tanggal_selesai`)='$year' AND MONTH(pmp.`tanggal_selesai`)='$month') AND a.tahun=$year AND a.bulan='$month'")->result();

            $payrollPesertaKeluar=$this->db->query("SELECT a.*,b.kode_register,b.nama,(select uk.unit from unit_kerja uk where uk.kode_unit=a.unit_kerja_id) as unit_kerja 
              from payroll a JOIN peserta_magang b ON (a.`nomor_register`=b.`nomor_register` ) WHERE a.nomor_register IN (SELECT nomor_register from peserta_magang_keluar pmk where YEAR(pmk.tgl_keluar)='$year' AND  MONTH(pmk.tgl_keluar)='$month' AND pmk.status='2' ) AND a.tahun=$year AND a.bulan='$month'")->result();
            $x=0;
            foreach ($payroll as $key) {
              $x++;
              ?>
              <tr <?=$key->kode_register == NULL?'style="background-color:#e74c3c;color:white;"':''?>>
                <td><?=$x?></td>
                <td><?=$key->kode_register==NULL?'????':$key->kode_register?></td>
                <td><?=$key->nama==NULL?'????':$key->nama?></td>
                <td><?=$key->unit_kerja==NULL?'????':$key->unit_kerja?></td>
                <td>Rp. <?=number_format($key->pend_pokok)?>,-</td>
                <td>Rp. <?=number_format($key->pend_tunj)?>,-</td>
                <td>Rp. <?=number_format($key->pend_tunj_bpjs_kes)?>,-</td>
                <td>Rp. <?=number_format($key->uang_makan)?>,-</td>
                <td><b>Rp. <?=number_format($key->take_home_pay)?>,-</b></td>
              </tr>
              <?php
            }
            //Peserta yang hanya dapat uang makan (Yang Selesai program)
            foreach ($payrollPesertaSelesai as $key) {
              $x++;
              ?>
              <tr <?=$key->kode_register == NULL?'style="background-color:#e74c3c;color:white;"':'style="background-color:blue;color:white;"'?>>
                <td><?=$x?></td>
                <td><?=$key->kode_register==NULL?'????':$key->kode_register?></td>
                <td><?=$key->nama==NULL?'????':$key->nama?></td>
                <td><?=$key->unit_kerja==NULL?'????':$key->unit_kerja?></td>
                <td>Rp. <?=number_format($key->pend_pokok)?>,-</td>
                <td>Rp. <?=number_format($key->pend_tunj)?>,-</td>
                <td>Rp. <?=number_format($key->pend_tunj_bpjs_kes)?>,-</td>
                <td>Rp. <?=number_format($key->uang_makan)?>,-</td>
                <td><b>Rp. <?=number_format($key->take_home_pay)?>,-</b></td>
              </tr>
              <?php
            }
            foreach ($payrollPesertaKeluar as $key) {
              $x++;
              ?>
              <tr <?=$key->kode_register == NULL?'style="background-color:#e74c3c;color:white;"':'style="background-color:red;color:white;"'?>>
                <td><?=$x?></td>
                <td><?=$key->kode_register==NULL?'????':$key->kode_register?></td>
                <td><?=$key->nama==NULL?'????':$key->nama?></td>
                <td><?=$key->unit_kerja==NULL?'????':$key->unit_kerja?></td>
                <td>Rp. <?=number_format($key->pend_pokok)?>,-</td>
                <td>Rp. <?=number_format($key->pend_tunj)?>,-</td>
                <td>Rp. <?=number_format($key->pend_tunj_bpjs_kes)?>,-</td>
                <td>Rp. <?=number_format($key->uang_makan)?>,-</td>
                <td><b>Rp. <?=number_format($key->take_home_pay)?>,-</b></td>
              </tr>
              <?php
            }
          ?>
        </table>
      </div>
      <div class="panel-body">
        <button type="button" onclick="location.href='<?=base_url()?>hak/payroll_export'" class="btn btn-primary btn-big pull-right">Generate payroll</button>
      </div>
    </div>
  </div>
</div>
