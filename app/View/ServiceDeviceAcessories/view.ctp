<div class="serviceDeviceAcessories view">
	<table cellpadding="0" cellspacing="0" class="view_table"><?php $i = 0; $class = ' class="altrow"';?>
		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Id'); ?></td><td> : </td>
		<td >
			<?php echo $serviceDeviceAcessory['ServiceDeviceAcessory']['id']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Service Device Info'); ?></td><td> : </td>
		<td>
			<?php echo $this->Html->link($serviceDeviceAcessory['ServiceDeviceInfo']['id'], array('controller' => 'service_device_infos', 'action' => 'view', $serviceDeviceAcessory['ServiceDeviceInfo']['id'])); ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Service Acessory'); ?></td><td> : </td>
		<td>
			<?php echo $this->Html->link($serviceDeviceAcessory['ServiceAcessory']['name'], array('controller' => 'service_acessories', 'action' => 'view', $serviceDeviceAcessory['ServiceAcessory']['id'])); ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Created'); ?></td><td> : </td>
		<td >
			<?php echo $serviceDeviceAcessory['ServiceDeviceAcessory']['created']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Modified'); ?></td><td> : </td>
		<td >
			<?php echo $serviceDeviceAcessory['ServiceDeviceAcessory']['modified']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Created By'); ?></td><td> : </td>
		<td >
			<?php echo $serviceDeviceAcessory['ServiceDeviceAcessory']['created_by']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Modified By'); ?></td><td> : </td>
		<td >
			<?php echo $serviceDeviceAcessory['ServiceDeviceAcessory']['modified_by']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>	</table>
</div>
  