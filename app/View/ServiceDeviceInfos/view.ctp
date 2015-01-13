<?php  //pr($serviceDeviceInfo);?>
<div class="serviceDeviceInfos view">
	<table cellpadding="0" cellspacing="0" class="view_table"><?php $i = 0; $class = ' class="altrow"';?>
		<tr <?php if ($i % 2 == 0) echo $class;?>><td>Id</td><td> : </td>
		<td >
			<?php echo $serviceDeviceInfo['ServiceDeviceInfo']['id']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td>Status</td><td>:</td>
		<td >
			<?php echo $serviceDeviceInfo['ServiceDeviceInfo']['status']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?><tr <?php if ($i % 2 == 0) echo $class;?>><td>User</td><td>:</td>
		<td>
			<?php echo $this->Html->link($serviceDeviceInfo['User']['email_address'], array('controller' => 'users', 'action' => 'view', $serviceDeviceInfo['User']['id'])); ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td>Service Device</td><td>:</td>
		<td>
			<?php echo $this->Html->link($serviceDeviceInfo['ServiceDevice']['name'], array('controller' => 'service_devices', 'action' => 'view', $serviceDeviceInfo['ServiceDevice']['id'])); ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td>Serial No</td><td>:</td>
		<td >
			<?php echo $serviceDeviceInfo['ServiceDeviceInfo']['serial_no']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td>Description</td><td>:</td>
		<td >
			<?php echo $serviceDeviceInfo['ServiceDeviceInfo']['description']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td>Defect State</td><td>:</td>
		<td >
			<?php echo $serviceDeviceInfo['ServiceDeviceInfo']['defect_state']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td>Acessories</td><td>:</td>
		<td >
			<?php echo $serviceDeviceInfo['ServiceDeviceInfo']['acessories']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td>Recive Date</td><td>:</td>
		<td >
			<?php echo $serviceDeviceInfo['ServiceDeviceInfo']['recive_date']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td>Estimated Date</td><td>:</td>
		<td >
			<?php echo $serviceDeviceInfo['ServiceDeviceInfo']['estimated_date']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td>Created By</td><td> : </td>
		<td >
			<?php echo $serviceDeviceInfo['ServiceDeviceInfo']['created_by']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td>Modified By</td><td> : </td>
		<td >
			<?php echo $serviceDeviceInfo['ServiceDeviceInfo']['modified_by']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td>Created</td><td> : </td>
		<td >
			<?php echo $serviceDeviceInfo['ServiceDeviceInfo']['created']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td>Modified</td><td> : </td>
		<td >
			<?php echo $serviceDeviceInfo['ServiceDeviceInfo']['modified']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>	</table>
</div>
  