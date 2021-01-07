<div class="row">
<form id="form" action="<?=base_url()?>user/updatedeposito/<?=$dn_id?>/<?=$id_deposito?>"  method="post" enctype="multipart/form-data">

<div class="col-lg-12">
    <div class="hpanel">
        <h3>Deposito</h3>
        <div class="panel-body">
            <div class="row">
                <div class="form-group col-lg-4">
                    <label>Nama Debitur</label>
                    <input type="text" value="<?=$datakredit->nama_nasabah?>" class="form-control" name="nama_debitur" readonly>
                </div>
                <div class="form-group col-lg-4">
                    <label>No Aplikasi</label>
                    <input type="text" value="<?=$datakredit->no_aplikasi?>" class="form-control" name="no_aplikasi" readonly>
                </div>
                <div class="form-group col-lg-4 ">
                    <label>Tanggal Pemeriksaan</label>
                    <input type="date" value="<?=$deposito->tanggal_pemeriksaan?>" class="form-control" name="tanggal_pemeriksaan" >
                </div>

                <div class="form-group col-lg-8">
                    <label>Jenis Deposito</label>
                    <select type="text" value="" class="form-control" name="jenis_deposito">
                        <option value="" selected disabled>= Pilih Jenis Deposito =</option>
                        <?php
                        $jd = $this->db->get('jenis_deposito')->result();
                        foreach($jd as $v_jd){?>
                        <option value="<?=$v_jd->id_jd?>"><?=$v_jd->nama_jd?></option>
                        <?php
                        }
                        ?>
                    </select>
                    <script>
                        $('[name="jenis_deposito"]').val('<?=$deposito->jenis_deposito?>');
                    </script>
                </div>
                <div class="form-group col-lg-12">
                    <label>Nama Pemilik</label>
                    <input type="text" value="<?=$deposito->nama_pemilik?>" class="form-control" name="nama_pemilik" >
                </div>
                <div class="form-group col-lg-12">
                    <label>Alamat Pemilik</label>
                    <input type="text" value="<?=$deposito->alamat_pemilik?>" class="form-control" name="alamat_pemilik" >
                </div>
                <div class="form-group col-lg-6">
                    <label>Hubungan Dengan Debitur</label>
                    <select type="text" value="" class="form-control" name="hubungan_dengan_debitur">
                        <option value="" selected disabled>= Pilih Jenis Deposito =</option>
                        <?php
                        $hdd = $this->db->get('hubungan_dengan_debitur')->result();
                        foreach($hdd as $v_hdd){?>
                        <option value="<?=$v_hdd->id_hdd?>"><?=$v_hdd->nama_hdd?></option>
                        <?php
                        }
                        ?>
                    </select>
                    <script>
                        $('[name="hubungan_dengan_debitur"]').val('<?=$deposito->hubungan_dengan_debitur?>');
                    </script>
                </div>
                <div class="form-group col-lg-12">
                    <label>Nomor Bilyet</label>
                    <input type="text" value="<?=$deposito->nomor_bilyet?>" class="form-control" name="nomor_bilyet" >
                </div>
                <div class="form-group col-lg-12">
                    <label>Bank & Cabang Penerbit</label>
                    <input type="text" value="<?=$deposito->bank_cabang_penerbit?>" class="form-control" name="bank_cabang_penerbit" >
                </div>
                
                <div class="form-group col-lg-4">
                    <label>Tanggal Penerbitan</label>
                    <input type="date" value="<?=$deposito->tgl_penerbitan?>" class="form-control" name="tgl_penerbitan">
                </div>

                <div class="form-group col-lg-4">
                    <label>Tanggal jatuh Tempo</label>
                    <input type="date" value="<?=$deposito->tgl_jatuh_tempo?>" class="form-control" name="tgl_jatuh_tempo">
                </div>
                <div class="form-group col-lg-4">
                    <label>Automatic Roll Over(ARO)</label>
                    <select class="form-control" name="aro" >
                        <option></option>
                        <option>Ya</option>
                        <option>Tidak</option>
                    </select>
                    <script>
                        $('[name="aro"]').val('<?=$deposito->aro?>');
                    </script>
                </div>

                <div class="form-group col-lg-6">
                    <label>Nilai Nominal(Rp.)</label>
                    <input type="text" value="<?=$deposito->nilai_nominal?>" class="auto_numformat form-control nilai_nominal" name="nilai_nominal">
                </div>
                <div class="form-group col-lg-6">
                    <label>Nilai Taksasi</label>
                    <input type="text" value="<?=$deposito->nilai_taksasi?>" class="auto_numformat form-control" name="nilai_taksasi" readonly>
                </div>
                <div class="form-group col-lg-6">
                    <label>Nilai Nominal (Valuta Asing)</label>
                    <input type="text" value="<?=$deposito->nilai_nominal_asing?>" class="auto_numformat form-control" name="nilai_nominal_asing">
                </div>

                <div class="form-group col-lg-6">
                    <label>Nilai Tukar (Rp.)</label>
                    <input type="text" value="<?=$deposito->nilai_tukar?>" class="auto_numformat form-control" name="nilai_tukar">
                </div>


                <div class="form-group col-lg-3">
                    <label>LTV</label>
                    <input type="text" value="<?=$deposito->ltv?>" class="form-control ltv" name="ltv" readonly>
                </div>

                <div class="form-group col-lg-12">
                    <label>Keterangan lainnya</label>
                    <textarea class="form-control" name="keterangan_lainnya" ><?=$deposito->keterangan_lainnya?></textarea>
                </div>
                <div class="form-group col-lg-12">
                    <label>Pendapat Pemeriksa</label>
                    <textarea type="text" class="form-control" name="pendapat_pemeriksa" ><?=$deposito->pendapat_pemeriksa?></textarea>
                </div>
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

    // menghilangkan format number
    $('#form').submit(function() {
        $(".auto_numformat").val(function(index, value) {
          return value.split('.').join('');
        });
    });
    
    
    $(".auto_numformat").keyup(function () {
        $(".auto_numformat").val(function(index, value) {
          return numberWithCommas(value);
        });
    });
    function numberWithCommas(x) {
        return x.toString().replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    }

    $('.nilai_nominal').keyup(function(){
        nilai_nominal = $(this).val().split('.').join('');
        rekomendasi_nilai_kredit = '<?=$rekomendasi_nilai_kredit->rekomendasi_nilai_kredit?>';

        ltv = 0;
        if(nilai_nominal != 0){
            ltv = Number(rekomendasi_nilai_kredit)/Number(nilai_nominal);
        }

        $('.ltv').val(""+(ltv*100).toFixed(2)+"%");
    })

        // anti enter submit
    $("form").keypress(function(e) {
    //Enter key
        if (e.which == 13) {
            return false;
        }
    });

</script>