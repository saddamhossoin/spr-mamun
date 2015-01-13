<div class="posPurchaseDetails view">
	<table cellpadding="0" cellspacing="0" class="view_table"><?php $i = 0; $class = ' class="altrow"';?>
		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php __('Id'); ?></td><td> : </td>
		<td >
			<?php echo $posPurchaseDetail['PosPurchaseDetail']['id']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php __('Pos Purchase'); ?></td><td> : </td>
		<td>
			<?php echo $this->Html->link($posPurchaseDetail['PosPurchase']['id'], array('controller' => 'pos_purchases', 'action' => 'view', $posPurchaseDetail['PosPurchase']['id'])); ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php __('Pos Brand'); ?></td><td> : </td>
		<td>
			<?php echo $this->Html->link($posPurchaseDetail['PosBrand']['name'], array('controller' => 'pos_brands', 'action' => 'view', $posPurchaseDetail['PosBrand']['id'])); ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php __('Pos Product'); ?></td><td> : </td>
		<td>
			<?php echo $this->Html->link($posPurchaseDetail['PosProduct']['name'], array('controller' => 'pos_products', 'action' => 'view', $posPurchaseDetail['PosProduct']['id'])); ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php __('	Pos Pcategory'); ?></td><td> : </td>
		<td>
			<?php echo $this->Html->link($posPurchaseDetail['	PosPcategory']['name'], array('controller' => 'pos_pcategories', 'action' => 'view', $posPurchaseDetail['	PosPcategory']['id'])); ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php __('Quantity'); ?></td><td> : </td>
		<td >
			<?php echo $posPurchaseDetail['PosPurchaseDetail']['quantity']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php __('Price'); ?></td><td> : </td>
		<td >
			<?php echo $posPurchaseDetail['PosPurchaseDetail']['price']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php __('Totalprice'); ?></td><td> : </td>
		<td >
			<?php echo $posPurchaseDetail['PosPurchaseDetail']['totalprice']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php __('Created'); ?></td><td> : </td>
		<td >
			<?php echo $posPurchaseDetail['PosPurchaseDetail']['created']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php __('Modified'); ?></td><td> : </td>
		<td >
			<?php echo $posPurchaseDetail['PosPurchaseDetail']['modified']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php __('Created By'); ?></td><td> : </td>
		<td >
			<?php echo $posPurchaseDetail['PosPurchaseDetail']['created_by']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php __('Modified By'); ?></td><td> : </td>
		<td >
			<?php echo $posPurchaseDetail['PosPurchaseDetail']['modified_by']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>	</table>
</div>
  