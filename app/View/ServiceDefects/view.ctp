<div class="serviceDefects view">
	<table cellpadding="0" cellspacing="0" class="view_table"><?php $i = 0; $class = ' class="altrow"';?>
		
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Name'); ?></td><td> : </td>
		<td >
			<?php echo $serviceDefect['ServiceDefect']['name']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Status'); ?></td><td> : </td>
		<td >
			<?php if(h($serviceDefect['ServiceDefect']['status'])==1){echo "Active";	}else {	echo "Inactive";}?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Created'); ?></td><td> : </td>
		<td >
			<?php echo date("d/m/Y", strtotime($serviceDefect['ServiceDefect']['created'])); ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Modified'); ?></td><td> : </td>
		<td >
			<?php echo date("d/m/Y", strtotime($serviceDefect['ServiceDefect']['modified'])); ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Created By'); ?></td><td> : </td>
		<td >
			<?php echo $userlists[$serviceDefect['ServiceDefect']['created_by']]; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Modified By'); ?></td><td> : </td>
		<td >
			<?php echo $userlists[$serviceDefect['ServiceDefect']['modified_by']]; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>	</table>
</div>

<?php //pr($defect_devices);?>

<div style="height: auto;" class="bDiv showDivCompatability">
		<div class="compatability_title">Service Defects Device</div>
 
  	 <table width="100%" cellspacing="0" cellpadding="0" border="0" class=" view_table">
	   <thead>
			<tr>
			<th width="46%">Device Name</th>
            <th width="46%">Category</th>
            <th width="46%">Brand</th>
 			</tr>
	   </thead>
    <tbody class="gridCompatibilityList">
    <?php foreach($defect_devices as $valdevice){?>
    
    <tr id="PosCompatability">
    
    <td><?php echo $valdevice['ServiceDeviceInfo']['ServiceDevice']['name'];?></td>
     <td><?php echo $valdevice['ServiceDeviceInfo']['ServiceDevice']['PosPcategory']['name'];?></td>
     <td><?php echo $valdevice['ServiceDeviceInfo']['ServiceDevice']['PosBrand']['name'];?></td>
    
     </tr>
     
      
    <?php }?>
    
     
    
    
    </tbody>
     </table>
     </div>
     
     
     
     
<style type="text/css">
.compatability_title{
	background: none repeat scroll 0 0 #F2F2F2;
    border: 1px dotted;
    font-weight: bold;
    padding: 10px 10px 10px 50px;
}

</style>
  