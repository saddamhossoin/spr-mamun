<div class="serviceGetAQuotes view">
	<table cellpadding="0" cellspacing="0" class="view_table"><?php $i = 0; $class = ' class="altrow"';?>
		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Id'); ?></td><td> : </td>
		<td >
			<?php echo $serviceGetAQuote['ServiceGetAQuote']['id']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Name'); ?></td><td> : </td>
		<td >
			<?php echo $serviceGetAQuote['ServiceGetAQuote']['name']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Address'); ?></td><td> : </td>
		<td >
			<?php echo $serviceGetAQuote['ServiceGetAQuote']['address']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Phone'); ?></td><td> : </td>
		<td >
			<?php echo $serviceGetAQuote['ServiceGetAQuote']['phone']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Email'); ?></td><td> : </td>
		<td >
			<?php echo $serviceGetAQuote['ServiceGetAQuote']['email']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Pos Brand'); ?></td><td> : </td>
		<td>
			<?php echo $this->Html->link($serviceGetAQuote['PosBrand']['name'], array('controller' => 'pos_brands', 'action' => 'view', $serviceGetAQuote['PosBrand']['id'])); ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Pos Product'); ?></td><td> : </td>
		<td >
			<?php echo $serviceGetAQuote['ServiceGetAQuote']['pos_product']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Description'); ?></td><td> : </td>
		<td >
			<?php echo $serviceGetAQuote['ServiceGetAQuote']['description']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Status'); ?></td><td> : </td>
		<td >
			<?php echo $serviceGetAQuote['ServiceGetAQuote']['status']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Created'); ?></td><td> : </td>
		<td >
			<?php echo $serviceGetAQuote['ServiceGetAQuote']['created']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Modified'); ?></td><td> : </td>
		<td >
			<?php echo $serviceGetAQuote['ServiceGetAQuote']['modified']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Created By'); ?></td><td> : </td>
		<td >
			<?php echo $serviceGetAQuote['ServiceGetAQuote']['created_by']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Modified By'); ?></td><td> : </td>
		<td >
			<?php echo $serviceGetAQuote['ServiceGetAQuote']['modified_by']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>	</table>
</div>
  