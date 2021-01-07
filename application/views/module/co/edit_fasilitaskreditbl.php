<div class="row">
<form id="form" action="<?=base_url()?>user/updatefasilitaskreditbl/<?=$id_fkbj?>"  method="post" enctype="multipart/form-data">

<div class="col-lg-12">
    <div class="hpanel">
        <h3>Fasilitas Kredit di Bank Lain</h3>
        <div class="panel-body">
            <div class="row">

                <div class="form-group col-lg-12">
                    <label>Unit Area</label>
                    <input type="text" value="<?=$datakredit->unit_area?>" class="form-control" name="unit_area"  readonly>
                </div>
                <div class="form-group col-lg-12">
                    <label>Nama Nasabah</label>
                    <input type="text" value="<?=$datakredit->nama_nasabah?>" class="form-control" name="nama_nasabah" readonly>
                </div>
                <div class="form-group col-lg-12">
                    <label>No Aplikasi</label>
                    <input type="text" value="<?=$datakredit->no_aplikasi?>" class="form-control" name="no_aplikasi" readonly>
                </div>
                <div class="form-group col-lg-12">
                    <label>Nama Kreditur</label>
                    <input type="text" value="<?=$datakredit->no_aplikasi?>" class="form-control" name="nama_kreditur" readonly>
                </div>
                <div class="form-group col-lg-12">
                    <label>Bentuk Pinjaman</label>
                    <select type="text" value="" class="isi-status2 form-control" name="bentuk_pinjaman">
                        <option value="" disabled>= Pilih Fasilitas =</option>
                        <?php
                        $bentuk_pinjaman = $this->db->get('bentuk_pinjaman')->result();
                        foreach($bentuk_pinjaman as $v_bp){?>
                        <option value="<?=$v_bp->id_bp?>"><?=$v_bp->nama_bp?></option>
                        <?php
                        }
                        ?>
                    </select>
                    <script>
                        $('[name="bentuk_pinjaman"]').val('<?=$fasilitaskreditbl->bentuk_pinjaman?>');
                    </script>
                </div>
                <div class="form-group col-lg-12">
                    <label>Plafon</label>
                    <input type="text" value="<?=$fasilitaskreditbl->plafon?>" class="form-control" name="plafon" >
                </div>
                <div class="form-group col-lg-12">
                    <label>Equiv Rate per bulan</label>
                    <input type="text" value="<?=$fasilitaskreditbl->equiv_Rate_perbulan?>" class="form-control" name="equiv_Rate_perbulan" >
                </div>
                <div class="form-group col-lg-12">
                    <label>Angsuran per Bulan</label>
                    <input type="text" value="<?=$fasilitaskreditbl->angsuran_perbulan?>" class="form-control" name="angsuran_perbulan" >
                </div>
                <div class="form-group col-lg-12">
                    <label>Jangka Waktu (Bulan)</label>
                    <input type="text" value="<?=$fasilitaskreditbl->jangka_waktu?>" class="form-control" name="jangka_waktu" >
                </div>
                <div class="form-group col-lg-12">
                    <label>Baki Debet</label>
                    <input type="text" value="<?=$fasilitaskreditbl->baki_debet?>" class="form-control" name="baki_debet" >
                </div>

                <div class="form-group col-lg-12">
                    <label>Status</label>
                    <select type="text" value="" class="isi-status2 form-control" name="status_fasilitas">
                        <option value="" selected disabled>= Pilih Tujuan Pinjaman =</option>
                        <?php
                        $status_fasilitas_bl = $this->db->get('status_fasilitas_bl')->result();
                        foreach($status_fasilitas_bl as $v_sfbl){?>
                        <option value="<?=$v_sfbl->id_sfbl?>"><?=$v_sfbl->nama_sfbl?></option>
                        <?php
                        }
                        ?>
                    </select>
                    <script>
                        $('[name="status_fasilitas"]').val('<?=$fasilitaskreditbl->status_fasilitas?>');
                    </script>
                </div>
                <div class="form-group col-lg-12">
                    <label>Tujuan Pinjaman</label>
                    <select type="text" value="" class="isi-status2 form-control" name="tujuan_pinjaman">
                        <option value="" selected disabled>= Pilih Tujuan Pinjaman =</option>
                        <?php
                        $tujuan_pinjaman = $this->db->get('tujuan_pinjaman')->result();
                        foreach($tujuan_pinjaman as $v_tp){?>
                        <option value="<?=$v_tp->id_tp?>"><?=$v_tp->nama_tp?></option>
                        <?php
                        }
                        ?>
                    </select>
                    <script>
                        $('[name="tujuan_pinjaman"]').val('<?=$fasilitaskreditbl->tujuan_pinjaman?>');
                    </script>
                </div>

                <input type="hidden" value="<?=$fasilitaskreditbl->status2?>" class="status2 form-control" name="status2" >

            </div>
                <div class="text-right m-t-xs">
                    <button type="submit" class="btn btn-warning">Update</button>
                </div>
        </div>
    </div>
    </div>
</form>
</div>

<script>
$('.isi-status2').change(function(){
    bentuk_pinjaman = $('[name="bentuk_pinjaman"]').val();
    status = $('[name="status_fasilitas"]').val();
    tujuan_pinjaman = $('[name="tujuan_pinjaman"]').val();
    if(bentuk_pinjaman == '1' && status == '2' && tujuan_pinjaman == '1' ){
        $('.status2').val('Plus1');
    }else if(bentuk_pinjaman != '1' && status == '2' && tujuan_pinjaman == '1' ){
        $('.status2').val('Plus2');
    }else{
        $('.status2').val('None');
    }
})

</script>