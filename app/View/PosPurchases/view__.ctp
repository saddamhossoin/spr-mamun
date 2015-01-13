<div class="posPurchases view"><table cellpadding="0" cellspacing="0" class="view_table"><?php $i = 0; $class = ' class="altrow"';?>
		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php __('Id'); ?></td><td> : </td>
		<td >
			<?php echo $posPurchase['PosPurchase']['id']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php __('Pos Supplier'); ?></td><td> : </td>
		<td>
			<?php echo $this->Html->link($posPurchase['PosSupplier']['name'], array('controller' => 'pos_suppliers', 'action' => 'view', $posPurchase['PosSupplier']['id'])); ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php __('Created'); ?></td><td> : </td>
		<td >
			<?php echo $posPurchase['PosPurchase']['created']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php __('Modified'); ?></td><td> : </td>
		<td >
			<?php echo $posPurchase['PosPurchase']['modified']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php __('Created By'); ?></td><td> : </td>
		<td >
			<?php echo $posPurchase['PosPurchase']['created_by']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php __('Modified By'); ?></td><td> : </td>
		<td >
			<?php echo $posPurchase['PosPurchase']['modified_by']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>	</table></div>
  
  <div class="posPurchases view">
  <table class="address">
  <tr style="font-size:18px">sfd</tr>
  <tr>sdf</tr>
  </table>
  </div>