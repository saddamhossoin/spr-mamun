<div class="lookups view">
	<table cellpadding="0" cellspacing="0" class="view_table"><?php $i = 0; $class = ' class="altrow"';?>
		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo 'Id'; ?></td><td> : </td>
		<td >
			<?php echo $lookup['Lookup']['id']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo 'Title'; ?></td><td> : </td>
		<td >
			<?php echo $lookup['Lookup']['title']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo 'List Refference'; ?></td><td> : </td>
		<td >
			<?php echo $lookup['Lookup']['list_refference']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo 'List Refference Slug'; ?></td><td> : </td>
		<td >
			<?php echo $lookup['Lookup']['list_refference_slug']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo 'Parent Id'; ?></td><td> : </td>
		<td >
			<?php echo $lookup['Lookup']['parent_id']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo 'Created'; ?></td><td> : </td>
		<td >
			<?php echo $this->Time->niceshort($lookup['Lookup']['created']); ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo 'Modified'; ?></td><td> : </td>
		<td >
			<?php echo $this->Time->niceshort($lookup['Lookup']['modified']); ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo 'Created By'; ?></td><td> : </td>
		<td >
			<?php echo $userlists[$lookup['Lookup']['created_by']]; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo 'Modified By'; ?></td><td> : </td>
		<td >
			<?php echo $userlists[$lookup['Lookup']['modified_by']]; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>	</table>
</div>
  