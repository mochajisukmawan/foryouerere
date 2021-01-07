





<div class="table-responsive">
<table style="width:100%" class="table table-striped table-bordered table-hover">
    <col width="10%">
    <col width="10%">
    <col width="10%">
    <col width="10%">
    <col width="10%">
    <thead>
        <tr>
            <th>Wilayah</th>
            <th>Jumlah</th>
            
            
        </tr>
        
    </thead>
    <tbody>
        <?php foreach($data_perUnit as $ps) : ?>
            <tr>
            	<td><?=$ps['wilayah']?></td>
            	<td><?=$ps['jumlah']?></td>
            </tr>
        
    	<?php endforeach; ?>
 
    </tbody>
</table>

</div>