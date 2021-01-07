
<?php if($_SESSION['role']=='CO' && $dataKredit['status_ro'] =="Ya" && ($dataKredit['status_co'] !="Ya" && $dataKredit['status_co'] !="Tidak") ): ?>
    <form method="post" action="<?=base_url()?>user/approveData" class="form-horizontal">
        <input type="hidden" name="dn_id" value="<?=$dn_id?>">
        <input type="hidden" name="tujuan_jabatan" value="RO">
        <input type="hidden" name="respon_dari" value="status_co">
        <input type="hidden" name="tujuan_jabatan" value="-">
        
        <div class="row">
            <div class="col-lg-12">
                <div class="hpanel">
                    <div class="panel-heading hbuilt">
                        <div class="panel-tools">
                            <a class="showhide"><i class="fa fa-chevron-up"></i></a>
                        </div>
                        Finalisasi Data
                    </div>
                    <div class="panel-body">
                            
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Keputusan</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="respon" required="">
                                        <option value="Ya">Ya</option>
                                        
                                    </select>
                                </div>
                            </div>    
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Keterangan</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" name="keterangan" required="" rows="5"></textarea>
                                </div>
                            </div>                           
                    </div>
                </div>
            </div>
            
        </div>
        
        


        <div class="form-group">
            <label class="col-sm-6 control-label"></label>
            <div class="col-sm-6">
                <button type="submit" class="btn btn-primary" onclick="return confirm('Kirim Data?');">Kirim Data</button>
            </div>
        </div>
    </form>
<?php endif; ?>

<?php if($_SESSION['role']=='UH' &&  ($dataKredit['status_uh'] !="Ya" && $dataKredit['status_uh'] !="Tidak")): ?>
    <form method="post" action="<?=base_url()?>user/approveData" class="form-horizontal">
        <input type="hidden" name="dn_id" value="<?=$dn_id?>">
        <input type="hidden" name="respon_dari" value="status_uh">
        <div class="row">
            <div class="col-lg-12">
                <div class="hpanel">
                    <div class="panel-heading hbuilt">
                        <div class="panel-tools">
                            <a class="showhide"><i class="fa fa-chevron-up"></i></a>
                        </div>
                        Approve Data
                    </div>
                    <div class="panel-body">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Kepada</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="tujuan_jabatan" required="">
                                        <option value="-">Tidak Ada</option>
                                        <option value="ro">Relationship Officer</option>
                                        <option value="co">Credit Officer</option>
                                    </select>
                                </div>
                            </div>    
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Keputusan</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="respon" required="">
                                        <option value="Ya">Ya</option>
                                        <option value="Revisi">Revisi</option>
                                        <option value="Tidak">Tidak</option>
                                    </select>
                                </div>
                            </div>    
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Keterangan</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" name="keterangan" required="" rows="5"></textarea>
                                </div>
                            </div>                           
                    </div>
                </div>
            </div>
            
        </div>
        
        


        <div class="form-group">
            <label class="col-sm-6 control-label"></label>
            <div class="col-sm-6">
                <button type="submit" class="btn btn-primary" onclick="return confirm('Kirim Respon?');">Kirim Respon</button>
            </div>
        </div>
    </form>
<?php endif; ?>

<?php if($_SESSION['role']=='ACO' && $dataKredit['status_uh'] =="Ya" && ($dataKredit['status_aco'] !="Ya" && $dataKredit['status_aco'] !="Tidak")): ?>
    <form method="post" action="<?=base_url()?>user/approveData" class="form-horizontal">
        <input type="hidden" name="dn_id" value="<?=$dn_id?>">
        <input type="hidden" name="respon_dari" value="status_aco">
        <div class="row">
            <div class="col-lg-12">
                <div class="hpanel">
                    <div class="panel-heading hbuilt">
                        <div class="panel-tools">
                            <a class="showhide"><i class="fa fa-chevron-up"></i></a>
                        </div>
                        Approve Data
                    </div>
                    <div class="panel-body">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Kepada</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="tujuan_jabatan" required="">
                                        <option value="-">Tidak Ada</option>
                                        <option value="ro">Relationship Officer</option>
                                        <option value="co">Credit Officer</option>
                                    </select>
                                </div>
                            </div>    
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Keputusan</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="respon" required="">
                                        <option value="Ya">Ya</option>
                                        <option value="Revisi">Revisi</option>
                                        <option value="Tidak">Tidak</option>
                                    </select>
                                </div>
                            </div>    
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Keterangan</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" name="keterangan" required="" rows="5"></textarea>
                                </div>
                            </div>                           
                    </div>
                </div>
            </div>
            
        </div>
        
        


        <div class="form-group">
            <label class="col-sm-6 control-label"></label>
            <div class="col-sm-6">
                <button type="submit" class="btn btn-primary" onclick="return confirm('Kirim Respon?');">Kirim Respon</button>
            </div>
        </div>
    </form>
<?php endif; ?>


<?php if($_SESSION['role']=='AMKM' && $dataKredit['status_ro'] =="Ya" && ($dataKredit['status_amkm'] !="Ya" && $dataKredit['status_amkm'] !="Tidak")
        ): ?>
    <form method="post" action="<?=base_url()?>user/approveData" class="form-horizontal">
        <input type="hidden" name="dn_id" value="<?=$dn_id?>">
        <input type="hidden" name="respon_dari" value="status_amkm">        
        
        <div class="row">
            <div class="col-lg-12">
                <div class="hpanel">
                    <div class="panel-heading hbuilt">
                        <div class="panel-tools">
                            <a class="showhide"><i class="fa fa-chevron-up"></i></a>
                        </div>
                        Approve Data
                    </div>
                    <div class="panel-body">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Kepada</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="tujuan_jabatan" required="">
                                        <option value="-">Tidak Ada</option>
                                        <option value="ro">Relationship Officer</option>
                                        <option value="co">Credit Officer</option>
                                    </select>
                                </div>
                            </div>    
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Keputusan</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="respon" required="">
                                        <option value="Ya">Ya</option>
                                        <option value="Revisi">Revisi</option>
                                        <option value="Tidak">Tidak</option>
                                    </select>
                                </div>
                            </div>    
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Keterangan</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" name="keterangan" required=""></textarea>
                                </div>
                            </div>    
                        
                        
                        
                        
                    </div>
                </div>
            </div>
            
        </div>
        
        


        <div class="form-group">
            <label class="col-sm-6 control-label"></label>
            <div class="col-sm-6">
                <button type="submit" class="btn btn-primary" onclick="return confirm('Kirim Respon?');">Kirim Respon</button>
            </div>
        </div>
    </form>
<?php endif; ?>


<?php if($_SESSION['role']=='Reviewer' && $dataKredit['status_amkm'] =="Ya" && ($dataKredit['status_rev'] !="Ya" && $dataKredit['status_rev'] !="Tidak")
        && !empty($dataDokumenChecklist)): ?>
    <form method="post" action="<?=base_url()?>user/approveData" class="form-horizontal">
        <input type="hidden" name="dn_id" value="<?=$dn_id?>">
        <input type="hidden" name="respon_dari" value="status_rev">

        <div class="row">
            <div class="col-lg-12">
                <div class="hpanel">
                    <div class="panel-heading hbuilt">
                        <div class="panel-tools">
                            <a class="showhide"><i class="fa fa-chevron-up"></i></a>
                        </div>
                        Approve Data
                    </div>
                    <div class="panel-body">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Kepada</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="tujuan_jabatan" required="">
                                        <option value="-">Tidak Ada</option>
                                        <option value="ro">Relationship Officer</option>
                                        <option value="co">Credit Officer</option>
                                    </select>
                                </div>
                            </div>    
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Keputusan</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="respon" required="">
                                        <option value="Ya">Ya</option>
                                        <option value="Revisi">Revisi</option>
                                        <option value="Tidak">Tidak</option>
                                    </select>
                                </div>
                            </div>    
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Keterangan</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" name="keterangan" required=""></textarea>
                                </div>
                            </div>    
                        
                        
                        
                        
                    </div>
                </div>
            </div>
            
        </div>
        
        


        <div class="form-group">
            <label class="col-sm-6 control-label"></label>
            <div class="col-sm-6">
                <button type="submit" class="btn btn-primary" onclick="return confirm('Kirim Respon?');">Kirim Respon</button>
            </div>
        </div>
    </form>
<?php endif; ?>


<?php if($_SESSION['role']=='Waksubdiv' && $dataKredit['status_rev'] =="Ya" && ($dataKredit['status_waksubdiv'] !="Ya" && $dataKredit['status_waksubdiv'] !="Tidak")
        && !empty($dataDokumenChecklist)): ?>
    <form method="post" action="<?=base_url()?>user/approveData" class="form-horizontal">
        <input type="hidden" name="dn_id" value="<?=$dn_id?>">
        <input type="hidden" name="respon_dari" value="status_waksubdiv">

        <div class="row">
            <div class="col-lg-12">
                <div class="hpanel">
                    <div class="panel-heading hbuilt">
                        <div class="panel-tools">
                            <a class="showhide"><i class="fa fa-chevron-up"></i></a>
                        </div>
                        Approve Data
                    </div>
                    <div class="panel-body">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Kepada</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="tujuan_jabatan" required="">
                                        <option value="-">Tidak Ada</option>
                                        <option value="co">Credit Officer</option>
                                    </select>
                                </div>
                            </div>    
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Keputusan</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="respon" required="">
                                        <option value="Ya">Ya</option>
                                        <option value="Revisi">Revisi</option>
                                        <option value="Tidak">Tidak</option>
                                    </select>
                                </div>
                            </div>    
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Keterangan</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" name="keterangan" required=""></textarea>
                                </div>
                            </div>    
                        
                        
                        
                        
                    </div>
                </div>
            </div>
            
        </div>
        
        


        <div class="form-group">
            <label class="col-sm-6 control-label"></label>
            <div class="col-sm-6">
                <button type="submit" class="btn btn-primary" onclick="return confirm('Kirim Respon?');">Kirim Respon</button>
            </div>
        </div>
    </form>
<?php endif; ?>

<?php if($_SESSION['role']=='Kasubdiv' && $dataKredit['status_waksubdiv'] =="Ya" && ($dataKredit['status_kasubdiv'] !="Ya" && $dataKredit['status_kasubdiv'] !="Tidak")
        && !empty($dataDokumenChecklist)): ?>
    <form method="post" action="<?=base_url()?>user/approveData" class="form-horizontal">
        <input type="hidden" name="dn_id" value="<?=$dn_id?>">
        <input type="hidden" name="respon_dari" value="status_waksubdiv">

        <div class="row">
            <div class="col-lg-12">
                <div class="hpanel">
                    <div class="panel-heading hbuilt">
                        <div class="panel-tools">
                            <a class="showhide"><i class="fa fa-chevron-up"></i></a>
                        </div>
                        Approve Data
                    </div>
                    <div class="panel-body">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Kepada</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="tujuan_jabatan" required="">
                                        <option value="-">Tidak Ada</option>
                                        <option value="co">Credit Officer</option>
                                    </select>
                                </div>
                            </div>    
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Keputusan</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="respon" required="">
                                        <option value="Ya">Ya</option>
                                        <option value="Revisi">Revisi</option>
                                        <option value="Tidak">Tidak</option>
                                    </select>
                                </div>
                            </div>    
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Keterangan</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" name="keterangan" required=""></textarea>
                                </div>
                            </div>    
                        
                        
                        
                        
                    </div>
                </div>
            </div>
            
        </div>
        
        


        <div class="form-group">
            <label class="col-sm-6 control-label"></label>
            <div class="col-sm-6">
                <button type="submit" class="btn btn-primary" onclick="return confirm('Kirim Respon?');">Kirim Respon</button>
            </div>
        </div>
    </form>
<?php endif; ?>
<script type="text/javascript">
    

</script>