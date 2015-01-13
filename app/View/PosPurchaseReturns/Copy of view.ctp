<div class="posPurchaseReturns view">
	<table cellpadding="0" cellspacing="0" class="view_table"><?php $i = 0; $class = ' class="altrow"';?>
		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php __('Id'); ?></td><td> : </td>
		<td >
			<?php echo $posPurchaseReturn['PosPurchaseReturn']['id']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php __('Pos Purchase'); ?></td><td> : </td>
		<td>
			<?php echo $this->Html->link($posPurchaseReturn['PosPurchase']['id'], array('controller' => 'pos_purchases', 'action' => 'view', $posPurchaseReturn['PosPurchase']['id'])); ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php __('Created'); ?></td><td> : </td>
		<td >
			<?php echo $posPurchaseReturn['PosPurchaseReturn']['created']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php __('Modified'); ?></td><td> : </td>
		<td >
			<?php echo $posPurchaseReturn['PosPurchaseReturn']['modified']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php __('Created By'); ?></td><td> : </td>
		<td >
			<?php echo $posPurchaseReturn['PosPurchaseReturn']['created_by']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php __('Modified By'); ?></td><td> : </td>
		<td >
			<?php echo $posPurchaseReturn['PosPurchaseReturn']['modified_by']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>	</table>
</div>
  