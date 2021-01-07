<?php 

?>

<div class="row">
	
        <?php 
        	if(!empty($_SESSION['msg'])){
        		echo "<div class='alert alert-success'>$_SESSION[msg] </div>";
        		unset($_SESSION['msg']);
        	}
            // print_r($dataAngsuran);
        ?>
</div>
<form action="<?=base_url()?>user/docchecklistpost" method="POST">
    <div class="row">
        <div class="col-lg-12">
            <div class="hpanel">
                <div class="panel-body">
                    <table class="table table-bordered" style="text-align: center;">
                        <col width="30%">
                        <tr>
                            <td style="background-color: rgba(40,0,155,1);font-weight: bold;color: white;">Jenis Dokumen</td>
                            <td style="background-color: rgba(40,0,155,1);font-weight: bold;color: white;">Status</td>
                            <td style="background-color: rgba(40,0,155,1);font-weight: bold;color: white;">Keterangan</td>
                            <td style="background-color: rgba(40,0,155,1);font-weight: bold;color: white;">PIC</td>
                        </tr>
                        <tr>
                            <td colspan="4" style="background-color: rgba(155,0,155,1);font-weight: bold;color: white;">Dokumen Identitas</td>
                        </tr>
                        <tr>
                            <td>KTP Nasabah</td>
                            <td>
                                <select class="form-control" name="ktp_nasabah">
                                    <option value="Ya">Ya (Ada)</option>
                                    <option value="Tidak">Tidak (Tidak Ada)</option>
                                </select>
                            </td>
                            <td>
                                <textarea rows="5" class="form-control" name="ktp_nasabah_ket"></textarea>
                            </td>
                            <td>
                                Marketing
                            </td>
                        </tr>
                        <tr>
                            <td>KTP Suami/Istri Nasabah</td>
                            <td>
                                <select class="form-control" name="ktp_suami_istri">
                                    <option value="Ya">Ya (Ada)</option>
                                    <option value="Tidak">Tidak (Tidak Ada)</option>
                                </select>
                            </td>
                            <td>
                                <textarea rows="5" class="form-control" name="ktp_suami_istri_ket"></textarea>
                            </td>
                            <td>
                                Marketing
                            </td>
                        </tr>
                        <tr>
                            <td>Kartu  Identitas Penjamin (suami-istri)</td>
                            <td>
                                <select class="form-control" name="kartu_identitas_penjamin">
                                    <option value="Ya">Ya (Ada)</option>
                                    <option value="Tidak">Tidak (Tidak Ada)</option>
                                </select>
                            </td>
                            <td>
                                <textarea rows="5" class="form-control" name="kartu_identitas_penjamin_ket"></textarea>
                            </td>
                            <td>
                                Marketing
                            </td>
                        </tr>
                        <tr>
                            <td>Akta Nikah / Akta Cerai/ Surat Kematian  dan Kartu Keluarga </td>
                            <td>
                                <select class="form-control" name="akta_nikah">
                                    <option value="Ya">Ya (Ada)</option>
                                    <option value="Tidak">Tidak (Tidak Ada)</option>
                                </select>
                            </td>
                            <td>
                                <textarea rows="5" class="form-control" name="akta_nikah_ket"></textarea>
                            </td>
                            <td>
                                Marketing
                            </td>
                        </tr>
                        <tr>
                            <td>NPWP (untuk pinjaman > 50 jt)</td>
                            <td>
                                <select class="form-control" name="npwp">
                                    <option value="Ya">Ya (Ada)</option>
                                    <option value="Tidak">Tidak (Tidak Ada)</option>
                                </select>
                            </td>
                            <td>
                                <textarea rows="5" class="form-control" name="npwp_ket"></textarea>
                            </td>
                            <td>
                                Marketing
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4" style="background-color: rgba(155,0,155,1);font-weight: bold;color: white;">Izin Usaha & Dokumen Usaha</td>
                        </tr>
                        <tr>
                            <td>Surat Izin Usaha</td>
                            <td>
                                <select class="form-control" name="surat_izin_usaha">
                                    <option value="Ya">Ya (Ada)</option>
                                    <option value="Tidak">Tidak (Tidak Ada)</option>
                                </select>
                            </td>
                            <td>
                                <textarea rows="5" class="form-control" name="surat_izin_usaha_ket"></textarea>
                            </td>
                            <td>
                                Marketing
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4" style="background-color: rgba(155,0,155,1);font-weight: bold;color: white;">Form Kelengkapan Kredit</td>
                        </tr>
                        <tr>
                            <td>Formulir Aplikasi Kredit</td>
                            <td>
                                <select class="form-control" name="formulir_aplikasi_kredit">
                                    <option value="Ya">Ya (Ada)</option>
                                    <option value="Tidak">Tidak (Tidak Ada)</option>
                                </select>
                            </td>
                            <td>
                                <textarea rows="5" class="form-control" name="formulir_aplikasi_kredit_ket"></textarea>
                            </td>
                            <td>
                                Marketing
                            </td>
                        </tr>
                        <tr>
                            <td>Catatan Keuangan (Penjualan/Pembelian) / Copy Rekening Koran / Tabungan</td>
                            <td>
                                <select class="form-control" name="catatan_keuangan">
                                    <option value="Ya">Ya (Ada)</option>
                                    <option value="Tidak">Tidak (Tidak Ada)</option>
                                </select>
                            </td>
                            <td>
                                <textarea rows="5" class="form-control" name="catatan_keuangan_ket"></textarea>
                            </td>
                            <td>
                                Marketing
                            </td>
                        </tr>
                        <tr>
                            <td>Laporan Kunjungan Nasabah</td>
                            <td>
                                <select class="form-control" name="laporan_kunjungan_nasabah">
                                    <option value="Ya">Ya (Ada)</option>
                                    <option value="Tidak">Tidak (Tidak Ada)</option>
                                </select>
                            </td>
                            <td>
                                <textarea rows="5" class="form-control" name="laporan_kunjungan_nasabah_ket"></textarea>
                            </td>
                            <td>
                                CO
                            </td>
                        </tr>
                        <tr>
                            <td>Laporan Penilaian Barang & Jaminan</td>
                            <td>
                                <select class="form-control" name="laporan_penilaian_barang_jaminan">
                                    <option value="Ya">Ya (Ada)</option>
                                    <option value="Tidak">Tidak (Tidak Ada)</option>
                                </select>
                            </td>
                            <td>
                                <textarea rows="5" class="form-control" name="laporan_penilaian_barang_jaminan_ket"></textarea>
                            </td>
                            <td>
                                CO
                            </td>
                        </tr>
                        <tr>
                            <td>Denah Lokasi </td>
                            <td>
                                <select class="form-control" name="denah_lokasi">
                                    <option value="Ya">Ya (Ada)</option>
                                    <option value="Tidak">Tidak (Tidak Ada)</option>
                                </select>
                            </td>
                            <td>
                                <textarea rows="5" class="form-control" name="denah_lokasi_ket"></textarea>
                            </td>
                            <td>
                                CO
                            </td>
                        </tr>
                        <tr>
                            <td>Foto Jaminan </td>
                            <td>
                                <select class="form-control" name="foto_jaminan">
                                    <option value="Ya">Ya (Ada)</option>
                                    <option value="Tidak">Tidak (Tidak Ada)</option>
                                </select>
                            </td>
                            <td>
                                <textarea rows="5" class="form-control" name="foto_jaminan_ket"></textarea>
                            </td>
                            <td>
                                CO
                            </td>
                        </tr>
                        <tr>
                            <td>Hasil BI Checking </td>
                            <td>
                                <select class="form-control" name="hasil_bi_checking">
                                    <option value="Ya">Ya (Ada)</option>
                                    <option value="Tidak">Tidak (Tidak Ada)</option>
                                </select>
                            </td>
                            <td>
                                <textarea rows="5" class="form-control" name="hasil_bi_checking_ket"></textarea>
                            </td>
                            <td>
                                CO
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4" style="background-color: rgba(155,0,155,1);font-weight: bold;color: white;">Form Persetujuan Kredit</td>
                        </tr>
                        <tr>
                            <td>Memorandum Analisa Kredit</td>
                            <td>
                                <select class="form-control" name="memorandum_analisa_kredit">
                                    <option value="Ya">Ya (Ada)</option>
                                    <option value="Tidak">Tidak (Tidak Ada)</option>
                                </select>
                            </td>
                            <td>
                                <textarea rows="5" class="form-control" name="memorandum_analisa_kredit_ket"></textarea>
                            </td>
                            <td>
                                CO
                            </td>
                        </tr>
                        <tr>
                            <td>Bukti Serah Terima Jaminan</td>
                            <td>
                                <select class="form-control" name="bukti_serah_terima_jaminan">
                                    <option value="Ya">Ya (Ada)</option>
                                    <option value="Tidak">Tidak (Tidak Ada)</option>
                                </select>
                            </td>
                            <td>
                                <textarea rows="5" class="form-control" name="bukti_serah_terima_jaminan_ket"></textarea>
                            </td>
                            <td>
                                CO
                            </td>
                        </tr>
                        <tr>
                            <td>Memo Pencairan Kredit</td>
                            <td>
                                <select class="form-control" name="memo_pencairan_kredit">
                                    <option value="Ya">Ya (Ada)</option>
                                    <option value="Tidak">Tidak (Tidak Ada)</option>
                                </select>
                            </td>
                            <td>
                                <textarea rows="5" class="form-control" name="memo_pencairan_kredit_ket"></textarea>
                            </td>
                            <td>
                                CO
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4" style="background-color: rgba(155,0,155,1);font-weight: bold;color: white;">Dokumen Pengikatan dan Jaminan</td>
                        </tr>
                        <tr>
                            <td colspan="4" style="background-color: rgba(0,100,155,1);font-weight: bold;color: white;">Dokumen Pengikatan</td>
                        </tr>
                        <tr>
                            <td>Surat Perjanjian Kredit</td>
                            <td>
                                <select class="form-control" name="surat_perjanjian_kredit">
                                    <option value="Ya">Ya (Ada)</option>
                                    <option value="Tidak">Tidak (Tidak Ada)</option>
                                </select>
                            </td>
                            <td>
                                <textarea rows="5" class="form-control" name="surat_perjanjian_kredit_ket"></textarea>
                            </td>
                            <td>
                                CO
                            </td>
                        </tr>
                        <tr>
                            <td>Perjanjian Kredit (untuk take over)</td>
                            <td>
                                <select class="form-control" name="perjanjian_kredit_takeover">
                                    <option value="Ya">Ya (Ada)</option>
                                    <option value="Tidak">Tidak (Tidak Ada)</option>
                                </select>
                            </td>
                            <td>
                                <textarea rows="5" class="form-control" name="perjanjian_kredit_takeover_ket"></textarea>
                            </td>
                            <td>
                                CO
                            </td>
                        </tr>
                        <tr>
                            <td>Perjanjian Kredit (untuk non Take Offer)</td>
                            <td>
                                <select class="form-control" name="perjanjian_kredit_non_takeover">
                                    <option value="Ya">Ya (Ada)</option>
                                    <option value="Tidak">Tidak (Tidak Ada)</option>
                                </select>
                            </td>
                            <td>
                                <textarea rows="5" class="form-control" name="perjanjian_kredit_non_takeover_ket"></textarea>
                            </td>
                            <td>
                                CO
                            </td>
                        </tr>
                        <tr>
                            <td>Surat Persetujuan Istri/Suami / Surat Perjanjian Pisah harta (jika ada)</td>
                            <td>
                                <select class="form-control" name="surat_persetujuan_pisah_harta">
                                    <option value="Ya">Ya (Ada)</option>
                                    <option value="Tidak">Tidak (Tidak Ada)</option>
                                </select>
                            </td>
                            <td>
                                <textarea rows="5" class="form-control" name="surat_persetujuan_pisah_harta_ket"></textarea>
                            </td>
                            <td>
                                CO
                            </td>
                        </tr>
                    </table>
                   
                </div>
            </div>
        </div>
    </div>
</form>
<div class="row">
	<div class="col-lg-12">
		<div class="hpanel">
			<div class="panel-body">
				
			</div>
		</div>
	</div>
</div>

