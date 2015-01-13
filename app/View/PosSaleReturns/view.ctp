<div class="posSaleReturns view">
	<table cellpadding="0" cellspacing="0" class="view_table"><?php $i = 0; $class = ' class="altrow"';?>
		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php __('Id'); ?></td><td> : </td>
		<td >
			<?php echo $posSaleReturn['PosSaleReturn']['id']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php __('Pos Sale'); ?></td><td> : </td>
		<td>
			<?php echo $this->Html->link($posSaleReturn['PosSale']['id'], array('controller' => 'pos_sales', 'action' => 'view', $posSaleReturn['PosSale']['id'])); ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php __('Pos Customer'); ?></td><td> : </td>
		<td>
			<?php echo $this->Html->link($posSaleReturn['PosCustomer']['name'], array('controller' => 'pos_customers', 'action' => 'view', $posSaleReturn['PosCustomer']['id'])); ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php __('Pos Product'); ?></td><td> : </td>
		<td>
			<?php echo $this->Html->link($posSaleReturn['PosProduct']['name'], array('controller' => 'pos_products', 'action' => 'view', $posSaleReturn['PosProduct']['id'])); ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php __('Pos Sale Detail'); ?></td><td> : </td>
		<td>
			<?php echo $this->Html->link($posSaleReturn['PosSaleDetail']['id'], array('controller' => 'pos_sale_details', 'action' => 'view', $posSaleReturn['PosSaleDetail']['id'])); ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php __('Quantity'); ?></td><td> : </td>
		<td >
			<?php echo $posSaleReturn['PosSaleReturn']['quantity']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php __('Created'); ?></td><td> : </td>
		<td >
			<?php echo $posSaleReturn['PosSaleReturn']['created']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php __('Modified'); ?></td><td> : </td>
		<td >
			<?php echo $posSaleReturn['PosSaleReturn']['modified']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php __('Created By'); ?></td><td> : </td>
		<td >
			<?php echo $posSaleReturn['PosSaleReturn']['created_by']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php __('Modified By'); ?></td><td> : </td>
		<td >
			<?php echo $posSaleReturn['PosSaleReturn']['modified_by']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>	</table>
</div>
  