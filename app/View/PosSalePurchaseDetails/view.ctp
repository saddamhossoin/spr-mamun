<div class="posSalePurchaseDetails view">
	<table cellpadding="0" cellspacing="0" class="view_table"><?php $i = 0; $class = ' class="altrow"';?>
		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Id'); ?></td><td> : </td>
		<td >
			<?php echo $posSalePurchaseDetail['PosSalePurchaseDetail']['id']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Pos Purchase Detail'); ?></td><td> : </td>
		<td>
			<?php echo $this->Html->link($posSalePurchaseDetail['PosPurchaseDetail']['id'], array('controller' => 'pos_purchase_details', 'action' => 'view', $posSalePurchaseDetail['PosPurchaseDetail']['id'])); ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Pos Sale Detail'); ?></td><td> : </td>
		<td>
			<?php echo $this->Html->link($posSalePurchaseDetail['PosSaleDetail']['id'], array('controller' => 'pos_sale_details', 'action' => 'view', $posSalePurchaseDetail['PosSaleDetail']['id'])); ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Pos Product'); ?></td><td> : </td>
		<td>
			<?php echo $this->Html->link($posSalePurchaseDetail['PosProduct']['name'], array('controller' => 'pos_products', 'action' => 'view', $posSalePurchaseDetail['PosProduct']['id'])); ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Quantity'); ?></td><td> : </td>
		<td >
			<?php echo $posSalePurchaseDetail['PosSalePurchaseDetail']['quantity']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Price'); ?></td><td> : </td>
		<td >
			<?php echo $posSalePurchaseDetail['PosSalePurchaseDetail']['price']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Created'); ?></td><td> : </td>
		<td >
			<?php echo $posSalePurchaseDetail['PosSalePurchaseDetail']['created']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Modified'); ?></td><td> : </td>
		<td >
			<?php echo $posSalePurchaseDetail['PosSalePurchaseDetail']['modified']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Created By'); ?></td><td> : </td>
		<td >
			<?php echo $posSalePurchaseDetail['PosSalePurchaseDetail']['created_by']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Modified By'); ?></td><td> : </td>
		<td >
			<?php echo $posSalePurchaseDetail['PosSalePurchaseDetail']['modified_by']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>	</table>
</div>
  