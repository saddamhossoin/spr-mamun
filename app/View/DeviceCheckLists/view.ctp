<div class="deviceCheckLists view">
	<table cellpadding="0" cellspacing="0" class="view_table"><?php $i = 0; $class = ' class="altrow"';?>
		
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Name'); ?></td><td> : </td>
		<td >
			<?php echo $deviceCheckList['DeviceCheckList']['name']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Comments'); ?></td><td> : </td>
		<td >
			<?php echo $deviceCheckList['DeviceCheckList']['comments']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Active'); ?></td><td> : </td>
		<td >
			<?php if($deviceCheckList['DeviceCheckList']['active']==1){
					echo "Active";
					}else{ echo "Inactive"; } ?>
			       &nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Created'); ?></td><td> : </td>
		<td >
			<?php echo $deviceCheckList['DeviceCheckList']['created']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Modified'); ?></td><td> : </td>
		<td >
			<?php echo $deviceCheckList['DeviceCheckList']['modified']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Created By'); ?></td><td> : </td>
		<td >
			<?php echo $userlists[$deviceCheckList['DeviceCheckList']['created_by']]; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Modified By'); ?></td><td> : </td>
		<td >
			<?php echo $userlists[$deviceCheckList['DeviceCheckList']['modified_by']]; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>	</table>
</div>
  