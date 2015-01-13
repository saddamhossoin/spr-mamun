<div class="posPurchaseReturnDetails view">
	<table cellpadding="0" cellspacing="0" class="view_table"><?php $i = 0; $class = ' class="altrow"';?>
		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Id'); ?></td><td> : </td>
		<td >
			<?php echo $posPurchaseReturnDetail['PosPurchaseReturnDetail']['id']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Pos Purchase Return'); ?></td><td> : </td>
		<td>
			<?php echo $this->Html->link($posPurchaseReturnDetail['PosPurchaseReturn']['id'], array('controller' => 'pos_purchase_returns', 'action' => 'view', $posPurchaseReturnDetail['PosPurchaseReturn']['id'])); ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Pos Product'); ?></td><td> : </td>
		<td>
			<?php echo $this->Html->link($posPurchaseReturnDetail['PosProduct']['name'], array('controller' => 'pos_products', 'action' => 'view', $posPurchaseReturnDetail['PosProduct']['id'])); ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Pos Purchase Detail'); ?></td><td> : </td>
		<td>
			<?php echo $this->Html->link($posPurchaseReturnDetail['PosPurchaseDetail']['id'], array('controller' => 'pos_purchase_details', 'action' => 'view', $posPurchaseReturnDetail['PosPurchaseDetail']['id'])); ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Quantity'); ?></td><td> : </td>
		<td >
			<?php echo $posPurchaseReturnDetail['PosPurchaseReturnDetail']['quantity']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Price'); ?></td><td> : </td>
		<td >
			<?php echo $posPurchaseReturnDetail['PosPurchaseReturnDetail']['price']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Created'); ?></td><td> : </td>
		<td >
			<?php echo $posPurchaseReturnDetail['PosPurchaseReturnDetail']['created']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>	</table>
</div>
  