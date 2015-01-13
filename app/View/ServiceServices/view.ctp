<?php //pr($serviceService);?>
<div class="serviceServices view">
	<table cellpadding="0" cellspacing="0" class="view_table"><?php $i = 0; $class = ' class="altrow"';?>
		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo __('Id'); ?></td><td> : </td>
		<td >
			<?php echo $serviceService['ServiceService']['id']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo __('Name'); ?></td><td> : </td>
		<td >
			<?php echo $serviceService['ServiceService']['name']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo __('Description'); ?></td><td> : </td>
		<td >
			<?php echo $serviceService['ServiceService']['description']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo __('Price'); ?></td><td> : </td>
		<td >
			<?php echo $serviceService['ServiceService']['price']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo __('Created'); ?></td><td> : </td>
		<td >
			<?php 
			echo date("d/m/Y", strtotime($serviceService['ServiceService']['created']));
		
			//echo $serviceService['ServiceService']['created']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo __('Modified'); ?></td><td> : </td>
		<td >
			<?php 
			
			echo date("d/m/Y", strtotime($serviceService['ServiceService']['modified']));
			//echo $serviceService['ServiceService']['modified']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo __('Created By'); ?></td><td> : </td>
		<td >
			<?php echo $userlists[$serviceService['ServiceService']['created_by']]; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo __('Modified By'); ?></td><td> : </td>
		<td >
			<?php echo $userlists[$serviceService['ServiceService']['modified_by']]; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>	</table>
</div>

 <div style="float:left; width:100%;"> 
    <table cellspacing="0" cellpadding="0" border="0" style="" class="view_table">
      <thead>
        <tr>
        	<th align="left" > <?php echo  'Device';?> </th>
            <th align="left" > <?php echo  'Price';?> </th>
	    </tr>
      </thead>
   <tbody>
<?php
  	foreach ($serviceService['ServiceDevicesService'] as $serviceService1){
	 	$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr style="height:30px;" id='<?php echo 'row_'.$serviceService1['id'];?>'  <?php echo $class;?>>
  	 	<td align='left'><?php echo $serviceService1['ServiceDevice']['name']; ?>&nbsp; </td>
          <td align='left'><?php echo $serviceService1['price'] ; ?>&nbsp; </td>
  	</tr> 
<?php	} ?>
      </table>
    </div>
  