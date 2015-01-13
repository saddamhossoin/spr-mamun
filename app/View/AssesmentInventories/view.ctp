<div class="assesmentInventories view">
	<table cellpadding="0" cellspacing="0" class="view_table"><?php $i = 0; $class = ' class="altrow"';?>
		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo __('Id'); ?></td><td> : </td>
		<td >
			<?php echo $assesmentInventory['AssesmentInventory']['id']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Pos Product'); ?></td><td> : </td>
		<td>
			<?php echo $this->Html->link($assesmentInventory['PosProduct']['name'], array('controller' => 'pos_products', 'action' => 'view', $assesmentInventory['PosProduct']['id'])); ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Assesment'); ?></td><td> : </td>
		<td>
			<?php echo $this->Html->link($assesmentInventory['Assesment']['id'], array('controller' => 'assesments', 'action' => 'view', $assesmentInventory['Assesment']['id'])); ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo __('Created'); ?></td><td> : </td>
		<td >
			<?php echo $assesmentInventory['AssesmentInventory']['created']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo __('Modified'); ?></td><td> : </td>
		<td >
			<?php echo $assesmentInventory['AssesmentInventory']['modified']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo __('Created By'); ?></td><td> : </td>
		<td >
			<?php echo $assesmentInventory['AssesmentInventory']['created_by']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo __('Modified By'); ?></td><td> : </td>
		<td >
			<?php echo $assesmentInventory['AssesmentInventory']['modified_by']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>	</table>
</div>
  