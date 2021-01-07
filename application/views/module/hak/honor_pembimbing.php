<div class="row">
  <div class="col-md-12">
    <div class="panel hpanel hblue">
      <div class="panel-heading hbuilt">
        Honor Pembimbing Magang Dharma Bulan <?=date("M",strtotime($year.'-'.$month.'-01'))?> <?php echo $year;?>
      </div>
      <div class="panel-body">
        <table class="table table-striped">
          <tr>
            <th>No</th>
            <th>NIP</th>
            <th>NAMA</th>
            <th>UNIT KERJA</th>
            <th>HONOR</th>
            <th>PERIODE</th>
          </tr>
          <?php
            $data=$this->db->select("b.nip,b.nama,c.unit,a.honor,a.periods")->from("honor_pembimbing a")->join("pembimbing_magang b","a.id_pembimbing_magang = b.id_pembimbing_magang","left")->join("unit_kerja c","c.kode_unit = b.unit_kerja_id","left")->where("a.tahun",$year)->where("a.bulan",$month)->where("a.honor is not null")->get()->result();
            $no=1;
            foreach ($data as $key) {
              ?>
              <tr>
                <td><?=$no?><?php $no++; ?></td>
                <td><?=$key->nip?></td>
                <td><?=$key->nama?></td>
                <td><?=$key->unit?></td>
                <td>Rp. <?=number_format($key->honor)?>,-</td>
                <td><?=$key->periods?></td>
              </tr>
              <?php
            }
          ?>
        </table>
      </div>
      <div class="panel-body">
        <button type="button" onclick="location.href='<?=base_url()?>hak/payroll/<?=$year?>/<?=$month?>'" class="btn btn-info btn-big pull-right">Lanjut ke Payroll Peserta</button>
      </div>
    </div>
  </div>
</div>
