<div class="assesmentApproveNotes view">
	<table cellpadding="0" cellspacing="0" class="view_table"><?php $i = 0; $class = ' class="altrow"';?>
		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Id'); ?></td><td> : </td>
		<td >
			<?php echo $assesmentApproveNote['AssesmentApproveNote']['id']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Service Device Info'); ?></td><td> : </td>
		<td>
			<?php echo $this->Html->link($assesmentApproveNote['ServiceDeviceInfo']['id'], array('controller' => 'service_device_infos', 'action' => 'view', $assesmentApproveNote['ServiceDeviceInfo']['id'])); ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('User'); ?></td><td> : </td>
		<td>
			<?php echo $this->Html->link($assesmentApproveNote['User']['email_address'], array('controller' => 'users', 'action' => 'view', $assesmentApproveNote['User']['id'])); ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Notes'); ?></td><td> : </td>
		<td >
			<?php echo $assesmentApproveNote['AssesmentApproveNote']['notes']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>	</table>
</div>
  