<div class="posTypes view">
	<table cellpadding="0" cellspacing="0" class="view_table"><?php $i = 0; $class = ' class="altrow"';?>
		
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Name'); ?></td><td> : </td>
		<td >
			<?php echo $posType['PosType']['name']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>	<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Slug'); ?></td><td> : </td>
		<td >
			<?php echo $posType['PosType']['slug']; ?>
			&nbsp;
		</td></tr>

<?php $i++;?>

	<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Description'); ?></td><td> : </td>
		<td >
			<?php echo $posType['PosType']['description']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Created'); ?></td><td> : </td>
		<td >
			<?php echo $posType['PosType']['created']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Modified'); ?></td><td> : </td>
		<td >
			<?php echo $posType['PosType']['modified']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Created By'); ?></td><td> : </td>
		<td >
			<?php echo $posType['PosType']['created_by']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Modified By'); ?></td><td> : </td>
		<td >
			<?php echo $posType['PosType']['modified_by']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>	</table>
</div>
  