<div class="row">
    <form id="form" action="<?=base_url()?>user/updatefasilitaskreditbj/<?=$id_fkbj?>"  method="post" enctype="multipart/form-data">
        <div class="col-lg-12">
            <div class="hpanel">
                <h3>Fasilitas Kredit di Bank Jateng</h3>
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
                            <label>Fasilitas</label>
                            <select type="text" value="" class="form-control" name="fasilitas">
                                <option value="" disabled>= Pilih Fasilitas =</option>
                                <?php
                                $fasilitas = $this->db->get('fasilitas')->result();
                                foreach($fasilitas as $v_f){
                                    if($v_f->id_fasilitas == $fasilitaskreditbj->fasilitas){
                                    ?>
                                        <option value="<?=$v_f->id_fasilitas?>" selected><?=$v_f->nama_fasilitas?></option>
                                    <?php
                                    }else{?>
                                        <option value="<?=$v_f->id_fasilitas?>"><?=$v_f->nama_fasilitas?></option>
                                    <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group col-lg-12">
                            <label>Plafon</label>
                            <input type="text" value="<?=$fasilitaskreditbj->plafon?>" class="form-control" name="plafon" >
                        </div>
                        <div class="form-group col-lg-12">
                            <label>Equiv Rate per bulan</label>
                            <input type="text" value="<?=$fasilitaskreditbj->equiv_Rate_perbulan?>" class="form-control" name="equiv_Rate_perbulan" >
                        </div>
                        <div class="form-group col-lg-12">
                            <label>Angsuran per Bulan</label>
                            <input type="text" value="<?=$fasilitaskreditbj->angsuran_perbulan?>" class="form-control" name="angsuran_perbulan" >
                        </div>
                        <div class="form-group col-lg-12">
                            <label>Jangka Waktu (Bulan)</label>
                            <input type="text" value="<?=$fasilitaskreditbj->jangka_waktu?>" class="form-control" name="jangka_waktu" >
                        </div>
                        <div class="form-group col-lg-12">
                            <label>Baki Debet</label>
                            <input type="text" value="<?=$fasilitaskreditbj->baki_debet?>" class="form-control" name="baki_debet" >
                        </div>
                        <div class="form-group col-lg-12">
                            <label>Status</label>
                            <select type="text" class="isi-status2 form-control" name="status_fasilitas">
                                <option>Pemisahan</option>
                                <option>Penggabungan</option>
                            </select>
                            <script>
                                $('[name="status"]').val('<?=$fasilitaskreditbj->status_fasilitas?>');
                            </script>
                        </div>
                        <div class="form-group col-lg-12">
                            <label>Tujuan Pinjaman</label>
                            <select type="text" value="" class="isi-status2 form-control" name="tujuan_pinjaman">
                                <option value="" disabled>= Pilih Tujuan Pinjaman =</option>
                                <?php
                                $tujuan_pinjaman = $this->db->get('tujuan_pinjaman')->result();
                                foreach($tujuan_pinjaman as $v_tp){
                                    if($v_tp->id_tp == $fasilitaskreditbj->tujuan_pinjaman){
                                    ?>
                                        <option value="<?=$v_tp->id_tp?>" selected><?=$v_tp->nama_tp?></option>
                                    <?php
                                    }else{?>
                                        <option value="<?=$v_tp->id_tp?>"><?=$v_tp->nama_tp?></option>
                                    <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <input type="hidden" value="<?=$fasilitaskreditbj->status2?>" class="status2 form-control" name="status2" >
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
    status_fasilitas = $('[name="status_fasilitas"]').val();
    tujuan_pinjaman = $('[name="tujuan_pinjaman"]').val();
    if(status_fasilitas == 'Pemisahan' && tujuan_pinjaman == '1'){
        $('.status2').val('Plus');
    }else{
        $('.status2').val('None');

    }
})

</script>