<div class="serviceInvoices view">
	<table cellpadding="0" cellspacing="0" class="view_table"><?php $i = 0; $class = ' class="altrow"';?>
		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo __('Id'); ?></td><td> : </td>
		<td >
			<?php echo $serviceInvoice['ServiceInvoice']['id']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Service Device Info'); ?></td><td> : </td>
		<td>
			<?php echo $this->Html->link($serviceInvoice['ServiceDeviceInfo']['id'], array('controller' => 'service_device_infos', 'action' => 'view', $serviceInvoice['ServiceDeviceInfo']['id'])); ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo __('Inventory Count'); ?></td><td> : </td>
		<td >
			<?php echo $serviceInvoice['ServiceInvoice']['inventory_count']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo __('Service Count'); ?></td><td> : </td>
		<td >
			<?php echo $serviceInvoice['ServiceInvoice']['service_count']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo __('Inventory Total'); ?></td><td> : </td>
		<td >
			<?php echo $serviceInvoice['ServiceInvoice']['inventory_total']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo __('Service Total'); ?></td><td> : </td>
		<td >
			<?php echo $serviceInvoice['ServiceInvoice']['service_total']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo __('Vat'); ?></td><td> : </td>
		<td >
			<?php echo $serviceInvoice['ServiceInvoice']['vat']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo __('Discount'); ?></td><td> : </td>
		<td >
			<?php echo $serviceInvoice['ServiceInvoice']['discount']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo __('Payable Amount'); ?></td><td> : </td>
		<td >
			<?php echo $serviceInvoice['ServiceInvoice']['payable_amount']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo __('Payment'); ?></td><td> : </td>
		<td >
			<?php echo $serviceInvoice['ServiceInvoice']['payment']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo __('Due'); ?></td><td> : </td>
		<td >
			<?php echo $serviceInvoice['ServiceInvoice']['due']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo __('Created By'); ?></td><td> : </td>
		<td >
			<?php echo $serviceInvoice['ServiceInvoice']['created_by']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo __('Modified By'); ?></td><td> : </td>
		<td >
			<?php echo $serviceInvoice['ServiceInvoice']['modified_by']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo __('Created'); ?></td><td> : </td>
		<td >
			<?php echo $serviceInvoice['ServiceInvoice']['created']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo __('Modified'); ?></td><td> : </td>
		<td >
			<?php echo $serviceInvoice['ServiceInvoice']['modified']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>	</table>
</div>
  