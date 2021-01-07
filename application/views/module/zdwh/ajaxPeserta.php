





<div class="table-responsive">
<table style="width:100%" class="table table-striped table-bordered table-hover">
    <col width="10%">
    <col width="10%">
    <col width="10%">
    <col width="10%">
    <col width="10%">
    <thead>
        <tr>
            <th>Kode Reg</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Unit Kerja</th>
            
            
        </tr>
        
    </thead>
    <tbody>
        <?php foreach($data_perUnit as $ps) : ?>
            <tr>
            	<td><?=$ps['kode_register']?></td>
                <td><?=$ps['nama']?></td>
                <td><?=$ps['jenis_kelamin']?></td>
            	<td><?=$ps['unit_kerja_id']?></td>
            </tr>
        
    	<?php endforeach; ?>
 
    </tbody>
</table>

</div>