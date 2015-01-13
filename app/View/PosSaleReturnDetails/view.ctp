<div class="posSaleReturnDetails view">
	<table cellpadding="0" cellspacing="0" class="view_table"><?php $i = 0; $class = ' class="altrow"';?>
		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Id'); ?></td><td> : </td>
		<td >
			<?php echo $posSaleReturnDetail['PosSaleReturnDetail']['id']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Pos Sale Return'); ?></td><td> : </td>
		<td>
			<?php echo $this->Html->link($posSaleReturnDetail['PosSaleReturn']['id'], array('controller' => 'pos_sale_returns', 'action' => 'view', $posSaleReturnDetail['PosSaleReturn']['id'])); ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Pos Product'); ?></td><td> : </td>
		<td>
			<?php echo $this->Html->link($posSaleReturnDetail['PosProduct']['name'], array('controller' => 'pos_products', 'action' => 'view', $posSaleReturnDetail['PosProduct']['id'])); ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Pos Sale Detail'); ?></td><td> : </td>
		<td>
			<?php echo $this->Html->link($posSaleReturnDetail['PosSaleDetail']['id'], array('controller' => 'pos_sale_details', 'action' => 'view', $posSaleReturnDetail['PosSaleDetail']['id'])); ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Quantity'); ?></td><td> : </td>
		<td >
			<?php echo $posSaleReturnDetail['PosSaleReturnDetail']['quantity']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Price'); ?></td><td> : </td>
		<td >
			<?php echo $posSaleReturnDetail['PosSaleReturnDetail']['price']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Created'); ?></td><td> : </td>
		<td >
			<?php echo $posSaleReturnDetail['PosSaleReturnDetail']['created']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Modified'); ?></td><td> : </td>
		<td >
			<?php echo $posSaleReturnDetail['PosSaleReturnDetail']['modified']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Created By'); ?></td><td> : </td>
		<td >
			<?php echo $posSaleReturnDetail['PosSaleReturnDetail']['created_by']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Modified By'); ?></td><td> : </td>
		<td >
			<?php echo $posSaleReturnDetail['PosSaleReturnDetail']['modified_by']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>	</table>
</div>
  