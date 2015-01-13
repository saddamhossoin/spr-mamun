<div class="serviceDevices view">
<?php //pr($serviceDevice);?>
	<table cellpadding="0" cellspacing="0" class="view_table"><?php $i = 0; $class = ' class="altrow"';?>
	<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo __('Name'); ?></td><td> : </td>
		<td >
			<?php echo $serviceDevice['ServiceDevice']['name']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo __('Brand'); ?></td><td> : </td>
		<td >
			<?php echo $serviceDevice['PosBrand']['name']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo __('Category'); ?></td><td> : </td>
		<td >
			<?php echo $serviceDevice['PosPcategory']['name']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo __('Name'); ?></td><td> : </td>
		<td >
			<?php echo $serviceDevice['ServiceDevice']['name']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Description'); ?></td><td> : </td>
		<td >
			<?php echo $serviceDevice['ServiceDevice']['description']; ?>
			&nbsp;
		</td></tr> 
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo __('Modified'); ?></td><td> : </td>
		<td >
			<?php 
			echo date("d/m/Y", strtotime($serviceDevice['ServiceDevice']['modified']));
			//echo $serviceDevice['ServiceDevice']['modified']; ?>
			&nbsp;
		</td></tr>
 	 
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo __('Modified By'); ?></td><td> : </td>
		<td >
			<?php echo $userlists[$serviceDevice['ServiceDevice']['modified_by']]; ?>
			&nbsp;
		</td></tr>
</table>
</div>
  