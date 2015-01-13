<div class="serviceDeviceDefects view">
	<table cellpadding="0" cellspacing="0" class="view_table"><?php $i = 0; $class = ' class="altrow"';?>
		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Id'); ?></td><td> : </td>
		<td >
			<?php echo $serviceDeviceDefect['ServiceDeviceDefect']['id']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Service Device Info'); ?></td><td> : </td>
		<td>
			<?php echo $this->Html->link($serviceDeviceDefect['ServiceDeviceInfo']['id'], array('controller' => 'service_device_infos', 'action' => 'view', $serviceDeviceDefect['ServiceDeviceInfo']['id'])); ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Service Defect'); ?></td><td> : </td>
		<td>
			<?php echo $this->Html->link($serviceDeviceDefect['ServiceDefect']['name'], array('controller' => 'service_defects', 'action' => 'view', $serviceDeviceDefect['ServiceDefect']['id'])); ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Created'); ?></td><td> : </td>
		<td >
			<?php echo  date("d/m/Y", strtotime($serviceDeviceDefect['ServiceDeviceDefect']['created'])); ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Modified'); ?></td><td> : </td>
		<td >
			<?php echo  date("d/m/Y", strtotime($serviceDeviceDefect['ServiceDeviceDefect']['modified'])); ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Created By'); ?></td><td> : </td>
		<td >
			<?php echo $userlists[$serviceDeviceDefect['ServiceDeviceDefect']['created_by']]; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Modified By'); ?></td><td> : </td>
		<td >
			<?php echo $userlists[$serviceDeviceDefect['ServiceDeviceDefect']['modified_by']]; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>	</table>
</div>
  