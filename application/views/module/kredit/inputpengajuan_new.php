
    <link rel="stylesheet" href="http://36.66.184.26/srd1/files/assets/css/jquery.signature.css">    <div class="row">
    <style>
    .kbw-signature {
        width: 300px;
        height: 200px;
    }
    
     .display-toggle{
     display: none;
   }
   .select-normal{
        font-size: 14px !important;
        border-radius: 2px !important;
        border: 1px solid #cccccc !important;
        height: 35px !important;
    }
    .tag-caption{
        font-family: serif;
        font-size: 21px;
        font-weight: bold;
        color: #007cc1;
    }


</style>

    
    <div class="col-lg-12">
            <div class="hpanel">
                <h3>Kredit</h3>
                <div class="panel-body">
                    <div class="row">
                        <div class="form-group col-lg-12">
                            <label>Jenis Produk</label>
                            <select type="text" value=""   class="form-control" name="jns_produk" >
                                <option value="" selected disabled>= Pilih Jenis Produk =</option>
                                <?php
                                $fasilitas = $this->db->get('fasilitas')->result();
                                foreach($fasilitas as $v_f){?>
                                <option value="<?=$v_f->id_fasilitas?>"><?=$v_f->nama_fasilitas?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group col-lg-12">
                            <label>Nilai Kredit Yang Di Minta</label>
                            <input type="text" value=""   onkeyup="angka(this);" class="form-control" name="nilai_kredit"  >
                        </div>
                        <div class="form-group col-lg-12">
                            <label>Jangka waktu Kredit</label>
                            <input type="text" value=""   onkeyup="angka(this);" class="form-control" name="waktu_kredit" >
                        </div>
                        <div class="form-group col-lg-12">
                            <label>Tujuan Pengajuan Kredit</label>
                            <input type="text" value=""   class="form-control" name="tujuan_kredit">
                        </div>
                        <div class="form-group col-lg-12">
                            <label>Detail Tujuan Kredit</label>
                            <input type="text" value=""   class="form-control" name="detail_kredit" >
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="hpanel">
                <h3>Pemohon</h3>
                <div class="panel-body">
                    <div class="row">
                        <div class="form-group col-lg-12">
                            <label>Nama (Sesuai KTP)</label>
                            <input type="text" value=""   class="form-control" name="nama_ktp" >
                        </div>
                        <div class="form-group col-lg-12">
                            <label>Nama Panggilan</label>
                            <input type="text" value=""   class="form-control" name="nama_panggilan" >
                        </div>
                        <div class="form-group col-lg-12">
                            <label>Jenis Kelamin</label>
                            <select type="text" value=""   class="form-control" name="jns_kelamin" >
                                <option value="" selected disabled>= Pilih Jenis Kelamin =</option>
                                <option value="l">Laki - laki</option>
                                <option value="p">Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group col-lg-12">
                            <label>No KTP</label>
                            <input type="text" value=""   class="form-control" name="no_ktp" >
                        </div>
                        <div class="form-group col-lg-12">
                            <label>Status Perkawinan</label>
                            <select type="text" value=""   class="form-control" name="status_nikah" >
                                <option value="" selected disabled>= Pilih Status perkawinan =</option>
                                <option>Lajang</option>
                                <option>Kawin</option>
                                <option>Duda/Janda</option>
                            </select>
                        </div>
                        <div class="form-group col-lg-12">
                            <label>Tempat Lahir</label>
                            <input type="text" value=""   class="form-control" name="tempat_lahir" >
                        </div>
                        <div class="form-group col-lg-3">
                            <label>Tanggal Lahir</label>
                            <input type="date" value=""   class="form-control" name="tgl_lahir" >
                        </div>
                        <div class="form-group col-lg-3">
                            <label>Usia</label>
                            <input type="text" value=""   class="form-control" name="usia" readonly>
                            <span class="help-block m-b-none usia" style="color:red"></span>
                        </div>
                        <div class="form-group col-lg-12">
                            <label>Pendidikan Terakhir</label>
                            <select type="text" value=""   class="form-control" name="pendidikan" >
                                <option value="" selected disabled>= Pilih Pendidikan Terakhir =</option>
                                <?php
                                $pendidikan = $this->db->get('pendidikan')->result();
                                foreach($pendidikan as $v_p){?>
                                <option value="<?=$v_p->id_pendidikan?>"><?=$v_p->nama_pendidikan?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group col-lg-12">
                            <label>Nama Ibu Kandung</label>
                            <input type="text" value=""   class="form-control" name="ibu_kandung" >
                        </div>
                        <div class="form-group col-lg-12">
                            <label>Jumah tanggungan</label>
                            <input type="text" value=""   class="form-control" name="jml_tanggungan" >
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="hpanel">
                <h3>Pasangan</h3>
                <div class="panel-body">
                <div class="row">
                    <div class="form-group col-lg-12">
                            <label>Nama Pasangan</label>
                            <input type="text" value=""   class="form-control" name="nama_pasangan" >
                        </div>
                        <div class="form-group col-lg-3">
                            <label>Tanggal Lahir pasangan</label>
                            <input type="date" value=""   class="form-control" name="tgl_pasangan" >
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="hpanel">
                <h3>Tempat Tinggal</h3>
                <div class="panel-body">
                <div class="row">
                    <div class="form-group col-lg-12">
                            <label>Alamat</label>
                            <input type="text" value=""   class="form-control" name="alamat_ktp" >
                        </div>
                        <div class="form-group col-lg-12">
                            <label>RT</label>
                            <input type="text" value=""   class="form-control" name="rt" >
                        </div>
                        <div class="form-group col-lg-12">
                            <label>RW</label>
                            <input type="text" value=""   class="form-control" name="rw" >
                        </div>
                        <div class="form-group col-lg-12">
                            <label>Kode Pos</label>
                            <input type="text" value=""   class="form-control" name="kode_pos" >
                        </div>
                        <div class="form-group col-lg-12">
                            <label>Kelurahan</label>
                            <input type="text" value=""   class="form-control" name="kelurahan" >
                        </div>
                        <div class="form-group col-lg-12">
                            <label>Kecamatan</label>
                            <input type="text" value=""   class="form-control" name="kecamatan" >
                        </div>
                        <div class="form-group col-lg-12">
                            <label>Telephone</label>
                            <input type="text" value=""   class="form-control" name="telephone_pribadi" >
                        </div>
                        <div class="form-group col-lg-12">
                            <label>No HP</label>
                            <input type="text" value=""   class="form-control" name="no_hp_pribadi" >
                        </div>
                        <div class="form-group col-lg-12">
                            <label>Status Tempat Tinggal</label>
                            <select  type="text" value=""   class="form-control" name="status_tempat_tinggal" >
                                <option value="" selected disabled>= Pilih Status Tempat Tinggal =</option>
                                <?php
                                $stt = $this->db->get('status_tempat_tinggal')->result();
                                foreach($stt as $v_stt){?>
                                <option value="<?=$v_stt->id_stt?>"><?=$v_stt->nama_stt?></option>
                                <?php
                                }
                                ?>
                            </select>                                        
                        </div>
                        <div class="form-group col-lg-12">
                            <label>Lama Menempati</label>
                            <input type="text" value=""   class="form-control" name="lama_menempati" >
                        </div>
                        <div class="form-group col-lg-12">
                            <label>Alamat Tinggal</label> <button type="button" class="badge btn-warning alamat-ktp">Sesuai KTP</button>
                            <input type="text" value=""   class="form-control" name="alamat_tinggal" >
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="hpanel">
                <h3>Usaha</h3>
                <div class="panel-body">
                    <?php
                        echo $output;
                    ?>
                    <div class="row">
                        <div class="form-group col-lg-12">
                            <label>Jumlah Yang Di Biayai</label>
                            <input type="text" value=""   class="form-control" name="jumlah_dibiayai" >
                        </div>

                    </div>


                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="hpanel">
                <h3>Informasi Lainya</h3>
                <div class="panel-body">
                    <div class="row">
                        <div class="form-group col-lg-12">
                            <label>Saya Ingin Menggunakan Fasilitas Cash Pick-up</label>
                            <select  type="text" value=""   class="form-control" name="cpu" >
                                <option>Ya</option>
                                <option>Tidak</option>
                            </select>                                          
                            </div>
                        <div class="form-group col-lg-12">
                            <label>Jika Ya, Frekuensi Cash Pick-up</label>
                            <select  type="text" value=""   class="form-control" name="fcpu" >
                                <option value="" selected disabled>= Pilih Frekuensi Cash Pick-up =</option>
                                <?php
                                $fcp = $this->db->get('frekuensi_cash_pickup')->result();
                                foreach($fcp as $v_fcp){?>
                                <option value="<?=$v_fcp->id_fcp?>"><?=$v_fcp->nama_fcp?></option>
                                <?php
                                }
                                ?>
                            </select>                                            
                        </div>
                        <div class="form-group col-lg-12">
                            <label>Apakah Memiliki Rekening Tabungan</label>
                            <select  type="text" value=""   class="form-control" name="rekening_tabungan" >
                                <option value="" selected disabled>= Pilih Ya/Tidak =</option>
                                <option>Ya</option>
                                <option>Tidak</option>
                            </select>                                     
                        </div>
                        <div class="form-group col-lg-12">
                            <label>Sejak Tahun</label>
                            <input type="text" value=""   class="form-control" name="sejak_tahun" >
                        </div>
                        <div class="form-group col-lg-12">
                            <label>Saldo Rata-rata</label>
                            <input type="text" value=""   class="form-control" name="saldo_rata" >
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="hpanel">
                <h3>Detail</h3>
                <div class="panel-body">
                    <div class="row">
                        <input type="hidden" value="<?=date("Y-m-d")?>"   class="form-control" name="tgl_submit" >
                        <div class="form-group col-lg-12">
                            <label>No Aplikasi </label>
                            <input type="text" value=""   class="form-control" name="no_aplikasi" readonly>
                        </div>
                        <div class="form-group col-lg-12">
                            <label>Unit Area</label>
                            <input type="text" value=""   class="form-control" name="unit_area" >
                        </div>
                        <div class="form-group col-lg-12">
                            <label>Kode Marketing</label>
                            <input type="text" value=""   class="form-control" name="kode_marketing" readonly>
                        </div>
                        <div class="form-group col-lg-12">
                            <label>Nama Marketing</label>
                            <input type="text" value=""   class="form-control" name="nama_marketing" readonly>
                        </div>
                        <div class="form-group col-lg-12">
                            <label>Bagaimana Perkenalan terjadi</label>
                            <select  type="text" value=""   class="form-control" name="perkenalan_terjadi" >
                                <option value="" selected disabled>= Pilih Bagaimana Perkenalan terjadi =</option>

                                <?php
                                $bpt = $this->db->get('bagaimana_perkenalan_terjadi')->result();
                                foreach($bpt as $v_bpt){?>
                                <option value="<?=$v_bpt->id_bpt?>"><?=$v_bpt->nama_bpt?></option>
                                <?php
                                }
                                ?>
                            </select>                                      
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="hpanel">
                <h3>Emergency Contact</h3>
                <div class="panel-body">
                    <div class="row">
                        <div class="form-group col-lg-12">
                            <label>Nama</label>
                            <input type="text" value=""   class="form-control" name="nama_emergency" >
                        </div>
                        <div class="form-group col-lg-12">
                            <label>Alamat </label>
                            <input type="text" value=""   class="form-control" name="alamat_emergency" >
                        </div>
                        <div class="form-group col-lg-12">
                            <label>No HP</label>
                            <input type="text" value=""   class="form-control" name="no_hp_emergency" >
                        </div>
                        <div class="form-group col-lg-12">
                            <label>Hubungan</label>
                            <select type="text" value=""   class="form-control" name="hubungan_emergency" >
                                <option  value="" selected disabled>= Pilih Hubungan =</option>
                                <?php
                                $hk = $this->db->get('hubungan_keluarga')->result();
                                foreach($hk as $v_hk){?>
                                <option value="<?=$v_hk->id_hk?>"><?=$v_hk->nama_hk?></option>
                                <?php
                                }
                                ?>
                            </select>                             
                        </div>                                      
                    </div>
                </div>
            </div>
        </div>
    <form id="form" action="<?=base_url()?>user/saveFiles" name="simpleForm" id="simpleForm" action="#" method="post" enctype="multipart/form-data">
        <input type="hidden" name="dn_id" value="<?=$dn_id?>">
        <div class="col-lg-12">
            <div class="hpanel">
                <h3>Berkas</h3>
                <div class="panel-body">
                    <div class="row">   
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <label>Foto KTP Debitur</label>
                                    <input type="file" value=""   class="form-control" name="foto_ktp" >
                                </div>                                     
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <label>Foto KTP Pasangan</label>
                                    <input type="file" value=""   class="form-control" name="file_ktp_pasangan" >
                                </div>                                     
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <label>File Kartu Keluarga</label>
                                    <input type="file" value=""   class="form-control" name="foto_kk" >
                                </div>                                     
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <label>File Akta Nikah</label>
                                    <input type="file" value=""   class="form-control" name="file_akta_nikah" >
                                </div>                                     
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <label>NPWP</label>
                                    <input type="file" value=""   class="form-control" name="npwp" >
                                </div>                                     
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <label>Foto Debitur</label>
                                    <input type="file" value=""   class="form-control" name="foto_debitur" >
                                </div>                                     
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <label>Foto Pasangan</label>
                                    <input type="file" value=""   class="form-control" name="foto_pasangan" >
                                </div>                                     
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <label>Screenshot Geotagging</label>
                                    <input type="file" value=""   class="form-control" name="geotagging" >
                                </div>                                     
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <label>Surat Legalitas Usaha</label>
                                    <input type="file" value=""   class="form-control" name="slu" >
                                </div>                                     
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <label>Surat Legalitas Jaminan</label>
                                    <input type="file" value=""   class="form-control" name="slj" >
                                </div>                                     
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="hpanel">
                <div class="panel-body">
                    <div class="raw">
                        <div class="col-lg-12">
                            
                            <p style="font-size: 16 px;"><input type="checkbox" name="cek">  Dengan menandatangani aplikasi ini, Saya menyatakan bahwa keterangan dalam aplikasi ini adalah lengkap dan benar.  Saya mengetahui bahwa Saya tidak berkewajiban untuk memberi imbalan dalam bentuk apapun kepada pihak Bank atau pihak ketiga jika permohonan pinjaman ini disetujui.</p>
                            
                        </div>
                        <div class="col-lg-12">
                            <td id="role-ttd_so"  style="display:none;">
                                <div style="display: grid; width:300px;">
                                    <label>Tanda Tangan</label>
                                    <div id="ttd_so"></div>
                                    <button id="del-ttd_so" type="button" class="btn btn-danger btn-sm">Hapus TTD</button>
                                    <input type="hidden" name="ttd_so" id="ttd_so_input">
                                </div>
                            </td>
                        </div>
                        <div class="text-right m-t-xs">
                                <button type="button" id="fff" class="btn btn-success">Save</button>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </form>


<script src="http://36.66.184.26/srd1/files/assets/js/jquery.signature.js"></script>     
<script>

$("#fff").click(function(){
    if ($('#ttd_so_input').val() == '{"lines":[]}') {
        alert('tanda tangan terlebih dahulu');
    }else if ($('[name="cek"]').prop("checked") != true) {
        alert('centang Ketentuan');
    }else{
        $("#form").submit();
    }
    
});


var ttd_so = $('#ttd_so').signature();
$('#del-ttd_so').click(function () {
    ttd_so.signature('clear');
});

$('#ttd_so').signature({
    change: function (event, ui) {
        $("[name='ttd_so']").val(ttd_so.signature('toJSON'));
    }
});


$( document ).ready(function() {
    $('#role-ttd_so').show('fast');
    ttd_so.signature('clear');


    dn_id = '<?=$dn_id?>';
    $.ajax({
            url: '<?=base_url() ?>user/isiform',
            type: 'POST',
            dataType: 'json',
            data: {
                dn_id:dn_id,
            }
        }).done(function(response){

            console.log(response);
            $('[name="jns_produk"]').val(response[0].jns_produk);
            $('[name="nilai_kredit"]').val(response[0].nilai_kredit);
            $('[name="waktu_kredit"]').val(response[0].waktu_kredit);
            $('[name="tujuan_kredit"]').val(response[0].tujuan_kredit);
            $('[name="detail_kredit"]').val(response[0].detail_kredit);

            $('[name="nama_ktp"]').val(response[0].nama_ktp);
            $('[name="nama_panggilan"]').val(response[0].nama_panggilan);
            $('[name="jns_kelamin"]').val(response[0].jns_kelamin);
            $('[name="no_ktp"]').val(response[0].no_ktp);
            $('[name="status_nikah"]').val(response[0].status_nikah);
            $('[name="tempat_lahir"]').val(response[0].tempat_lahir);
            $('[name="tgl_lahir"]').val(response[0].tgl_lahir);
            $('[name="usia"]').val(response[0].usia);
            $('[name="pendidikan"]').val(response[0].pendidikan);
            $('[name="ibu_kandung"]').val(response[0].ibu_kandung);
            $('[name="jml_tanggungan"]').val(response[0].jml_tanggungan);

            $('[name="nama_pasangan"]').val(response[0].nama_pasangan);
            $('[name="tgl_pasangan"]').val(response[0].tgl_pasangan);

            $('[name="alamat_ktp"]').val(response[0].alamat_ktp);
            $('[name="rt"]').val(response[0].rt);
            $('[name="rw"]').val(response[0].rw);
            $('[name="kode_pos"]').val(response[0].kode_pos);
            $('[name="kelurahan"]').val(response[0].kelurahan);
            $('[name="kecamatan"]').val(response[0].kecamatan);
            $('[name="telephone_pribadi"]').val(response[0].telephone_pribadi);
            $('[name="no_hp_pribadi"]').val(response[0].no_hp_pribadi);
            $('[name="status_tempat_tinggal"]').val(response[0].status_tempat_tinggal);
            $('[name="lama_menempati"]').val(response[0].lama_menempati);
            $('[name="alamat_tinggal"]').val(response[0].alamat_tinggal);

            jumlah_dibiayai = $('[name="jumlah_dibiayai"]').val(response[0].jumlah_dibiayai);

            cpu = $('[name="cpu"]').val(response[0].cpu);
            fcpu = $('[name="fcpu"]').val(response[0].fcpu);
            rekening_tabungan = $('[name="rekening_tabungan"]').val(response[0].rekening_tabungan);
            sejak_tahun = $('[name="sejak_tahun"]').val(response[0].sejak_tahun);
            saldo_rata = $('[name="saldo_rata"]').val(response[0].saldo_rata);

            tgl_submit = $('[name="tgl_submit"]').val(response[0].tgl_submit);
            no_aplikasi = $('[name="no_aplikasi"]').val(response[0].no_aplikasi);
            unit_area = $('[name="unit_area"]').val(response[0].unit_area);
            kode_marketing = $('[name="kode_marketing"]').val(response[0].kode_marketing);
            nama_marketing = $('[name="nama_marketing"]').val(response[0].nama_marketing);
            perkenalan_terjadi = $('[name="perkenalan_terjadi"]').val(response[0].perkenalan_terjadi);

            nama_emergency = $('[name="nama_emergency"]').val(response[0].nama_emergency);
            alamat_emergency = $('[name="alamat_emergency"]').val(response[0].alamat_emergency);
            no_hp_emergency = $('[name="no_hp_emergency"]').val(response[0].no_hp_emergency);
            hubungan_emergency = $('[name="hubungan_emergency"]').val(response[0].hubungan_emergency);

        });
});

$('.alamat-ktp').click(function(){
    $('[name="alamat_tinggal"]').val($('[name="alamat_ktp"]').val())
})

function angka(e) {
    e.value = e.value.replace(/[^0-9]/g,'');
}

// format angka
function angka_format(e) {
    e.value = e.value.replace(/[^0-9]/g,'');   
    var value = e.value,
        plain = plainNumber(value),
        reversed = reverseNumber(plain),
        reversedWithDots = reversed.match(/.{1,3}/g).join(','),
        normal = reverseNumber(reversedWithDots);
        e.value = normal;
}
function reverseNumber(input) {
    return [].map.call(input, function(x) {
    return x;
    }).reverse().join(''); 
}
function plainNumber(number) {  
    return number.split(',').join('');
}
// end

$('[name="tgl_lahir"]' ).change(function(){
    tgl_lahir = $('[name="tgl_lahir"]').val();
    var dob = new Date(tgl_lahir);
    console.log(dob);
    var today = new Date();
    console.log(today);
    var age = Math.floor((today-dob) / (365.25 * 24 * 60 * 60 * 1000));
    $('[name="usia"]').val(age);
    cek_usia();
})

$('[name="status_nikah"] , [name="waktu_kredit"]').change(function(){
    tgl_lahir = $('[name="tgl_lahir"]').val();
    if(tgl_lahir != ''){
        cek_usia();
    }
})

function cek_usia(){
    status_nikah = $('[name="status_nikah"]').val();
    usia = $('[name="usia"]').val();
    waktu_kredit = $('[name="waktu_kredit"]').val();
    usia_plus = Number(usia) + (Number(waktu_kredit)/12);
    console.log(usia_plus);
    if( usia <= 21 && status_nikah == 'Lajang'){
        $('.usia').html('Usia Tidak Valid');
    }else if(usia_plus >= 65){
        $('.usia').html('Usia Tidak Valid');
    }else{
        $('.usia').html('');
    }
}
    $("input,select").change(function(){
        dn_id = '<?=$dn_id?>';
        jns_produk = $('[name="jns_produk"]').val();
        nilai_kredit = $('[name="nilai_kredit"]').val();
        waktu_kredit = $('[name="waktu_kredit"]').val();
        tujuan_kredit = $('[name="tujuan_kredit"]').val();
        detail_kredit = $('[name="detail_kredit"]').val();

        nama_ktp = $('[name="nama_ktp"]').val();
        nama_panggilan = $('[name="nama_panggilan"]').val();
        jns_kelamin = $('[name="jns_kelamin"]').val();
        no_ktp = $('[name="no_ktp"]').val();
        status_nikah = $('[name="status_nikah"]').val();
        tempat_lahir = $('[name="tempat_lahir"]').val();
        tgl_lahir = $('[name="tgl_lahir"]').val();
        usia = $('[name="usia"]').val();
        pendidikan = $('[name="pendidikan"]').val();
        ibu_kandung = $('[name="ibu_kandung"]').val();
        jml_tanggungan = $('[name="jml_tanggungan"]').val();

        nama_pasangan = $('[name="nama_pasangan"]').val();
        tgl_pasangan = $('[name="tgl_pasangan"]').val();

        alamat_ktp = $('[name="alamat_ktp"]').val();
        rt = $('[name="rt"]').val();
        rw = $('[name="rw"]').val();
        kode_pos = $('[name="kode_pos"]').val();
        kelurahan = $('[name="kelurahan"]').val();
        kecamatan = $('[name="kecamatan"]').val();
        telephone_pribadi = $('[name="telephone_pribadi"]').val();
        no_hp_pribadi = $('[name="no_hp_pribadi"]').val();
        status_tempat_tinggal = $('[name="status_tempat_tinggal"]').val();
        lama_menempati = $('[name="lama_menempati"]').val();
        alamat_tinggal = $('[name="alamat_tinggal"]').val();

        jumlah_dibiayai = $('[name="jumlah_dibiayai"]').val();

        cpu = $('[name="cpu"]').val();
        fcpu = $('[name="fcpu"]').val();
        rekening_tabungan = $('[name="rekening_tabungan"]').val();
        sejak_tahun = $('[name="sejak_tahun"]').val();
        saldo_rata = $('[name="saldo_rata"]').val();

        tgl_submit = $('[name="tgl_submit"]').val();
        no_aplikasi = $('[name="no_aplikasi"]').val();
        unit_area = $('[name="unit_area"]').val();
        kode_marketing = $('[name="kode_marketing"]').val();
        nama_marketing = $('[name="nama_marketing"]').val();
        perkenalan_terjadi = $('[name="perkenalan_terjadi"]').val();

        nama_emergency = $('[name="nama_emergency"]').val();
        alamat_emergency = $('[name="alamat_emergency"]').val();
        no_hp_emergency = $('[name="no_hp_emergency"]').val();
        hubungan_emergency = $('[name="hubungan_emergency"]').val();

        $.ajax({
            url: '<?=base_url() ?>user/updateso',
            type: 'POST',
            dataType: 'json',
            data: {
                dn_id:dn_id,
                jns_produk:jns_produk,
                nilai_kredit:nilai_kredit,  
                waktu_kredit:waktu_kredit,
                tujuan_kredit:tujuan_kredit,
                detail_kredit:detail_kredit,

                nama_ktp:nama_ktp,
                nama_panggilan:nama_panggilan,
                jns_kelamin:jns_kelamin,
                no_ktp:no_ktp,
                status_nikah:status_nikah,
                tempat_lahir:tempat_lahir,
                tgl_lahir:tgl_lahir,
                usia:usia,
                pendidikan:pendidikan,
                ibu_kandung:ibu_kandung,
                jml_tanggungan:jml_tanggungan,

                nama_pasangan:nama_pasangan,
                tgl_pasangan:tgl_pasangan,

                alamat_ktp:alamat_ktp,
                rt:rt,
                rw:rw,
                kode_pos:kode_pos,
                kelurahan:kelurahan,
                kecamatan:kecamatan,
                telephone_pribadi:telephone_pribadi,
                no_hp_pribadi:no_hp_pribadi,
                status_tempat_tinggal:status_tempat_tinggal,
                lama_menempati:lama_menempati,
                alamat_tinggal:alamat_tinggal,

                jumlah_dibiayai:jumlah_dibiayai,

                cpu:cpu,
                fcpu:fcpu,
                rekening_tabungan:rekening_tabungan,
                sejak_tahun:sejak_tahun,
                saldo_rata:saldo_rata,

                tgl_submit:tgl_submit,
                no_aplikasi:no_aplikasi,
                unit_area:unit_area,
                kode_marketing:kode_marketing,
                nama_marketing:nama_marketing,
                perkenalan_terjadi:perkenalan_terjadi,

                nama_emergency:nama_emergency,
                alamat_emergency:alamat_emergency,
                no_hp_emergency:no_hp_emergency,
                hubungan_emergency:hubungan_emergency,
            }
        })
    });
</script>




