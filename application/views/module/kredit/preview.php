<?php 

?>

<div class="row">
	
        <?php 
        	if(!empty($_SESSION['msg'])){
        		echo "<div class='alert alert-success'>$_SESSION[msg] </div>";
        		unset($_SESSION['msg']);
        	}
            $countTotalUsaha=count($dataPekerjaan);
            $countLKD1=count($this->gmodel->getDataLKD1ByDnID($dn_id));

            /*echo "<pre>";
            print_r($dataLaporanKeuangan);
            echo "</pre>";*/
            
            $enc =$this->gmodel->encrypt_decrypt("encrypt",$dn_id);
        ?>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="hpanel">
            <div class="panel-heading hbuilt" style="background-color: rgba(0,177,155,1);font-weight: bold;color: white;">
                <div class="panel-tools">
                    <a class="showhide"><i class="fa fa-chevron-up"></i></a>
                </div>
                Informasi Utama
            </div>
			<div class="panel-body">
				<table class="table table-bordered">
                    <tr>
                        <td>Nomor Aplikasi</td>
                        <td><?=$dataKredit['no_aplikasi']?></td>
                    </tr>
					<tr>
						<td>Nama Calon Debitur</td>
						<td><?=$dataKredit['nama_nasabah']?></td>
					</tr>
                    <tr>
                        <td>Nominal</td>
                        <td><?=number_format($dataKredit['nilai_kredit'],0,'.',',')?></td>
                    </tr>
					<tr>
						<td>Alamat Rumah</td>
						<td><?=$dataKredit['alamat_ktp']?></td>
					</tr>
					<tr>
						<td>No Telp Rumah</td>
						<td><?=$dataKredit['telephone_pribadi']?></td>
					</tr>
					<tr>
                        <td>No HP</td>
                        <td><?=$dataKredit['no_hp_pribadi']?></td>
                    </tr>
                    <?php if($countLKD1==$countTotalUsaha && $_SESSION['role']=='CO') :?>
                        <tr>
    						<td>Opsi</td>
    						<td>
                                    <?php if(!empty($dataLkd2) && $dataKredit['status_co'] !='Revisi'): ?>
                                        <a href="<?=base_url()?>user/lihatlkd2/<?=$enc?>/aaa"><span class="badge badge-success">Lihat LKD 2</span></a>
                                        
                                        <?php if(!empty($dataLkd3)): ?>
                                            <a href="<?=base_url()?>user/lihatlkd3/<?=$enc?>/aaa"><span class="badge badge-success">Lihat LKD 3</span></a>
                                            
                                            <?php if(!empty($dataLaporanKeuangan)): ?>
                                                <a href="<?=base_url()?>user/laporankeuangan/<?=$enc?>/aaa"><span class="badge badge-success">Lihat Laporan Keuangan</span></a>

                                                <?php if(!empty($dataNeraca)): ?>
                                                    <a href="<?=base_url()?>user/lihatneraca/<?=$enc?>/aaa"><span class="badge badge-success">Lihat Neraca</span></a>
                                                    
                                                    <?php if(!empty($dataCreditRiskScoring)): ?>
                                                        <a href="<?=base_url()?>user/lihatcreditriskscoring/<?=$enc?>/aa"><span class="badge badge-success">Lihat Credit Risk Scoring</span></a>

                                                        <?php if(!empty($dataMak)): ?>
                                                            <a href="<?=base_url()?>user/lihatmak/<?=$enc?>/aa"><span class="badge badge-success">Lihat MAK</span></a>

                                                        <?php else: ?>
                                                            <a href="<?=base_url()?>user/mak/<?=$enc?>/aa"><span class="badge badge-primary">MAK</span></a>
                                                        <?php endif; ?>
                                                    <?php else: ?>
                                                        <a href="<?=base_url()?>user/creditriskscoring/<?=$enc?>/aa"><span class="badge badge-primary">Credit Risk Scoring</span></a>
                                                    <?php endif; ?>
                                                <?php else: ?>
                                                    <a href="<?=base_url()?>user/neraca/<?=$enc?>/aa"><span class="badge badge-primary">Neraca</span></a>
                                                <?php endif; ?>
                                            <?php else: ?>
                                                <a href="<?=base_url()?>user/laporankeuangan/<?=$enc?>/aa"><span class="badge badge-primary">Laporan Keuangan/Repayment Capacity</span></a>
                                                
                                            <?php endif; ?>
                                        <?php else: ?>
                                            <a href="<?=base_url()?>user/lkd3/<?=$enc?>/aa"><span class="badge badge-primary">Input LKD 3</span></a>
                                        <?php endif; ?>
                                    <?php elseif($dataKredit['status_co'] =='Revisi') : ?>
                                        <a href="<?=base_url()?>user/editlkd2/<?=$enc?>/aaa"><span class="badge badge-warning">Edit LKD 2</span></a><br>
                                        <a href="<?=base_url()?>user/editlkd3/<?=$enc?>/aaa"><span class="badge badge-warning">Edit LKD 3</span></a><br>
                                        <a href="<?=base_url()?>user/laporankeuangan/<?=$enc?>/aaa"><span class="badge badge-warning">Edit Laporan Keuangan</span></a><br>
                                        <a href="<?=base_url()?>user/editneraca/<?=$enc?>/aaa"><span class="badge badge-warning">Edit Neraca</span></a><br>
                                        <a href="<?=base_url()?>user/editcreditriskscoring/<?=$enc?>/aa"><span class="badge badge-warning">Edit Credit Risk Scoring</span></a><br>
                                        <a href="<?=base_url()?>user/editmak/<?=$enc?>/aa"><span class="badge badge-warning">Edit MAK</span></a>
                                    <?php else: ?>
                                        <a href="<?=base_url()?>user/lkd2/<?=$enc?>/aaa"><span class="badge badge-primary">Input LKD 2</span></a>
                                    <?php endif; ?>
                                    
                                    
                                    
                                    

                                   
                                    
                                    
                                    
                                
                                
                                         
                            </td>
    					</tr>
                        <?php if(!empty($dataLkd2)): ?>
                        <tr>
                            <td>Input Jaminan</td>
                            <td>
                                <a href="<?=base_url()?>user/infojaminan/<?=$enc?>/aaa"><span class="badge " style="background-color: rgba(255,0,240,1);">Info Jaminan</span></a>
                            </td>
                        </tr>
                        <?php endif; ?>
                    
                    <?php endif ;?>
					<?php if($_SESSION['role']=='UH' ) :?>
                        <tr>
                            <td>Opsi</td>
                            <td>
                                <?php if(!empty($dataLkd2)): ?>
                                        <a href="<?=base_url()?>user/lkd4/<?=$enc?>/"><span class="badge badge-success">Input LKD 4</span></a>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endif ;?>
                    <?php if($_SESSION['role']=='Reviewer' ) :?>
                        <tr>
                            <td>Opsi</td>
                            <td>
                                <?php if(!empty($dataDokumenChecklist)): ?>
                                        <a href="<?=base_url()?>user/inputReview/<?=$enc?>/"><span class="badge badge-primary">Input Review</span></a>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endif ;?>
					<?php if($_SESSION['role']=='ACO' || $_SESSION['role']=='AMKM' || $_SESSION['role']=='Reviewer' ||  $_SESSION['role']=='Wakasubdiv' || $_SESSION['role']=='Kasubdiv' || $_SESSION['role']=='UH' || $_SESSION['role']=='Admin-mikro' || $_SESSION['role']=='Waksubdiv' ) :?>
                        <tr>
                            <td>Lihat Data</td>
                            <td>
                                <?php if($dataKredit['status_co']=='Ya'): ?>
                                    <a href="<?=base_url()?>user/lihatlkd2/<?=$enc?>/aaa"><span class="badge badge-success">Lihat LKD 2</span></a><br>
                                    <a href="<?=base_url()?>user/lihatlkd3/<?=$enc?>/aaa"><span class="badge badge-success">Lihat LKD 3</span></a><br>
                                    <a href="<?=base_url()?>user/laporankeuangan/<?=$enc?>/aaa"><span class="badge badge-success">Lihat Laporan Keuangan</span></a><br>
                                    <a href="<?=base_url()?>user/lihatneraca/<?=$enc?>/aaa"><span class="badge badge-success">Lihat Neraca</span></a><br>
                                    <a href="<?=base_url()?>user/lihatcreditriskscoring/<?=$enc?>/aa"><span class="badge badge-success">Lihat Credit Risk Scoring</span></a>
                                <?php endif ;?>
                            </td>
                        </tr>
                    <?php endif ;?>
				</table>
			</div>
		</div>
	</div>
</div>


<div class="row">
    <div class="col-lg-12">
        <div class="hpanel">
            <div class="panel-heading hbuilt">
                <div class="panel-tools">
                    <a class="showhide"><i class="fa fa-chevron-up"></i></a>
                </div>
                Informasi Pekerjaan/Usaha
            </div>
            <div class="panel-body">
                <?php foreach($dataPekerjaan as $key): ?>
                    <?php 
                        $encrypt_dnid=$this->gmodel->encrypt_decrypt("encrypt",$key['dn_id']);
                        $encrypt_pekerjaanid=$this->gmodel->encrypt_decrypt("encrypt",$key['pekerjaan_id']);
                        $cek=$this->gmodel->getScreeningRoByPekerjaanID($key['pekerjaan_id']);
                    ?>
                    <table class="table table-bordered">
                        <col width="30%">
                        <col>
                        <tr>
                            <td>Tipe Pendapatan</td>
                            <td><?=$key['tipe_pendapatan']?></td>
                        </tr>
                        <tr>
                            <td>Nama Usaha</td>
                            <td><?=$key['nama_usaha']?></td>
                        </tr>
                        <tr>
                            <td>Alamat Usaha</td>
                            <td><?=$key['alamat_usaha']?></td>
                        </tr>
                        <tr>
                            <td>Telephone Usaha</td>
                            <td><?=$key['telephone_usaha']?></td>
                        </tr>
                        <tr>
                            <td>No NPWP</td>
                            <td><?=$key['no_npwp']?></td>
                        </tr>
                        <tr>
                            <td>Omset Rata</td>
                            <td><?=number_format($key['omset_rata'],0,',','.')?></td>
                        </tr>
                        <tr>
                            <td>Keuntungan Rata</td>
                            <td><?=number_format($key['keuntungan_rata'],0,',','.')?></td>
                        </tr>
                        
                        <tr>
                            <td>Opsi</td>
                            <td>
                                <?php if($_SESSION['role']=='CO'):?>
                                    <?php 
                                        $cekLkd1=$this->gmodel->getDataLKD1ByPekerjaanID($key['pekerjaan_id']);
                                        $cekLkd2=$this->gmodel->getDataLKD2ByPekerjaanID($key['pekerjaan_id']);
                                        // print_r($cek);
                                        if(empty($cekLkd1)){ ?>
                                            <a href="<?=base_url()?>user/lkd1/<?=$encrypt_dnid?>/<?=$encrypt_pekerjaanid?>"><span class="badge badge-primary">Input LKD 1</span></a>
                                        <?php } else{ ?>
                                            <?php if($dataKredit['status_co'] =='Revisi'): ?>
                                                <a href="<?=base_url()?>user/editlkd1/<?=$encrypt_dnid?>/<?=$encrypt_pekerjaanid?>"><span class="badge badge-warning">Edit LKD 1</span></a>
                                            <?php else: ?>
                                                <a href="<?=base_url()?>user/lihatlkd1/<?=$encrypt_dnid?>/<?=$encrypt_pekerjaanid?>"><span class="badge badge-success">Lihat LKD 1</span></a>
                                            <?php endif; ?>
                                            
                                        <?php }

                                    ?>
                                    <a href="<?=base_url()?>user/view_ro_screening/<?=$encrypt_dnid?>/<?=$encrypt_pekerjaanid?>"><span class="badge" style="background-color: rgba(0,200,0,1);">Lihat Screening RO</span></a>
                                    <!-- <a href="<?=base_url()?>user/lkd2/<?=$encrypt_dnid?>/<?=$encrypt_pekerjaanid?>"><span class="badge badge-primary">Input LKD 2</span></a>
                                    <a href="<?=base_url()?>user/lkd3/<?=$encrypt_dnid?>/<?=$encrypt_pekerjaanid?>"><span class="badge badge-primary">Input LKD 3</span></a> -->
                                <?php elseif($_SESSION['role']=='RO'):?>
                                    <?php 
                                        
                                        // print_r($cek['dataScreening']);
                                        if(sizeof($cek['dataScreening']) > 0){ ?>
                                            <a href="<?=base_url()?>user/view_ro_screening/<?=$encrypt_dnid?>/<?=$encrypt_pekerjaanid?>"><span class="badge" style="background-color: rgba(0,200,0,1);">Lihat Screening</span></a>
                                        <?php } else{ ?>
                                            <a href="<?=base_url()?>user/ro_screening/<?=$encrypt_dnid?>/<?=$encrypt_pekerjaanid?>"><span class="badge badge-primary">Input Screening</span></a>
                                        <?php }
                                    ?>
                                    
                                   
                                <?php endif;?>
                                <?php if($_SESSION['role']=='ACO' || $_SESSION['role']=='AMKM' || $_SESSION['role']=='Reviewer' ||  $_SESSION['role']=='Wakasubdiv' || $_SESSION['role']=='Kasubdiv' || $_SESSION['role']=='UH' || $_SESSION['role']=='Admin-mikro' || $_SESSION['role']=='Waksubdiv' ) :?>

                                    <?php if(empty($cekLkd1)){ ?>
                                        <a href="<?=base_url()?>user/lihatlkd1/<?=$encrypt_dnid?>/<?=$encrypt_pekerjaanid?>"><span class="badge badge-success">Lihat LKD 1</span></a>
                                    <?php } ?>
                                    
                                <?php endif ;?>
                            </td>
                        </tr>
                    </table>
                <?php endforeach; ?>
                
            </div>
        </div>
    </div>
</div>




<?php 
    $this->load->view('module/kredit/approval');
?>