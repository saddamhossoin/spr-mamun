<div class="saveOrders view">
	<table cellpadding="0" cellspacing="0" class="view_table"><?php $i = 0; $class = ' class="altrow"';?>
		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Id'); ?></td><td> : </td>
		<td >
			<?php echo $saveOrder['SaveOrder']['id']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('First Name'); ?></td><td> : </td>
		<td >
			<?php echo $saveOrder['SaveOrder']['first_name']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Last Name'); ?></td><td> : </td>
		<td >
			<?php echo $saveOrder['SaveOrder']['last_name']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Email'); ?></td><td> : </td>
		<td >
			<?php echo $saveOrder['SaveOrder']['email']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Phone'); ?></td><td> : </td>
		<td >
			<?php echo $saveOrder['SaveOrder']['phone']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Billing Address'); ?></td><td> : </td>
		<td >
			<?php echo $saveOrder['SaveOrder']['billing_address']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Billing Address2'); ?></td><td> : </td>
		<td >
			<?php echo $saveOrder['SaveOrder']['billing_address2']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Billing City'); ?></td><td> : </td>
		<td >
			<?php echo $saveOrder['SaveOrder']['billing_city']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Billing Zip'); ?></td><td> : </td>
		<td >
			<?php echo $saveOrder['SaveOrder']['billing_zip']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Billing State'); ?></td><td> : </td>
		<td >
			<?php echo $saveOrder['SaveOrder']['billing_state']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Billing Country'); ?></td><td> : </td>
		<td >
			<?php echo $saveOrder['SaveOrder']['billing_country']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Shipping Address'); ?></td><td> : </td>
		<td >
			<?php echo $saveOrder['SaveOrder']['shipping_address']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Shipping Address2'); ?></td><td> : </td>
		<td >
			<?php echo $saveOrder['SaveOrder']['shipping_address2']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Shipping City'); ?></td><td> : </td>
		<td >
			<?php echo $saveOrder['SaveOrder']['shipping_city']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Shipping Zip'); ?></td><td> : </td>
		<td >
			<?php echo $saveOrder['SaveOrder']['shipping_zip']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Shipping State'); ?></td><td> : </td>
		<td >
			<?php echo $saveOrder['SaveOrder']['shipping_state']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Shipping Country'); ?></td><td> : </td>
		<td >
			<?php echo $saveOrder['SaveOrder']['shipping_country']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Weight'); ?></td><td> : </td>
		<td >
			<?php echo $saveOrder['SaveOrder']['weight']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Order Item Count'); ?></td><td> : </td>
		<td >
			<?php echo $saveOrder['SaveOrder']['order_item_count']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Subtotal'); ?></td><td> : </td>
		<td >
			<?php echo $saveOrder['SaveOrder']['subtotal']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Tax'); ?></td><td> : </td>
		<td >
			<?php echo $saveOrder['SaveOrder']['tax']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Shipping'); ?></td><td> : </td>
		<td >
			<?php echo $saveOrder['SaveOrder']['shipping']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Total'); ?></td><td> : </td>
		<td >
			<?php echo $saveOrder['SaveOrder']['total']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Order Type'); ?></td><td> : </td>
		<td >
			<?php echo $saveOrder['SaveOrder']['order_type']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Authorization'); ?></td><td> : </td>
		<td >
			<?php echo $saveOrder['SaveOrder']['authorization']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Transaction'); ?></td><td> : </td>
		<td >
			<?php echo $saveOrder['SaveOrder']['transaction']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Status'); ?></td><td> : </td>
		<td >
			<?php echo $saveOrder['SaveOrder']['status']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Ip Address'); ?></td><td> : </td>
		<td >
			<?php echo $saveOrder['SaveOrder']['ip_address']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Created'); ?></td><td> : </td>
		<td >
			<?php echo $saveOrder['SaveOrder']['created']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Modified'); ?></td><td> : </td>
		<td >
			<?php echo $saveOrder['SaveOrder']['modified']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Created By'); ?></td><td> : </td>
		<td >
			<?php echo $saveOrder['SaveOrder']['created_by']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Modified By'); ?></td><td> : </td>
		<td >
			<?php echo $saveOrder['SaveOrder']['modified_by']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>	</table>
</div>
  