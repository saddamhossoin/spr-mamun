<div class="saveOrderItems view">
	<table cellpadding="0" cellspacing="0" class="view_table"><?php $i = 0; $class = ' class="altrow"';?>
		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Id'); ?></td><td> : </td>
		<td >
			<?php echo $saveOrderItem['SaveOrderItem']['id']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Save Order'); ?></td><td> : </td>
		<td>
			<?php echo $this->Html->link($saveOrderItem['SaveOrder']['id'], array('controller' => 'save_orders', 'action' => 'view', $saveOrderItem['SaveOrder']['id'])); ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Pos Product'); ?></td><td> : </td>
		<td>
			<?php echo $this->Html->link($saveOrderItem['PosProduct']['name'], array('controller' => 'pos_products', 'action' => 'view', $saveOrderItem['PosProduct']['id'])); ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Name'); ?></td><td> : </td>
		<td >
			<?php echo $saveOrderItem['SaveOrderItem']['name']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Quantity'); ?></td><td> : </td>
		<td >
			<?php echo $saveOrderItem['SaveOrderItem']['quantity']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Weight'); ?></td><td> : </td>
		<td >
			<?php echo $saveOrderItem['SaveOrderItem']['weight']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Price'); ?></td><td> : </td>
		<td >
			<?php echo $saveOrderItem['SaveOrderItem']['price']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Subtotal'); ?></td><td> : </td>
		<td >
			<?php echo $saveOrderItem['SaveOrderItem']['subtotal']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Product Item Id'); ?></td><td> : </td>
		<td >
			<?php echo $saveOrderItem['SaveOrderItem']['product_item_id']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Created'); ?></td><td> : </td>
		<td >
			<?php echo $saveOrderItem['SaveOrderItem']['created']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Modified'); ?></td><td> : </td>
		<td >
			<?php echo $saveOrderItem['SaveOrderItem']['modified']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Created By'); ?></td><td> : </td>
		<td >
			<?php echo $saveOrderItem['SaveOrderItem']['created_by']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Modified By'); ?></td><td> : </td>
		<td >
			<?php echo $saveOrderItem['SaveOrderItem']['modified_by']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>	</table>
</div>
  