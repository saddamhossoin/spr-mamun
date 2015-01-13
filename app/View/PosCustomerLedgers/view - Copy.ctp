<div class="posCustomerLedgers view">
 <?php $payment_mode=array(1=>"Sales",2=>"Customer Payment");?>
	<table cellpadding="0" cellspacing="0" class="view_table"><?php $i = 0; $class = ' class="altrow"';?>
	<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Payment Mode'); ?></td><td> : </td>
		<td >
			<?php echo $payment_mode[$posCustomerLedger['PosCustomerLedger']['payment_mode']]; ?>
			&nbsp;
		</td></tr>
 	<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __(' Customer'); ?></td><td> : </td>
		<td>
			<?php echo $this->Html->link($posCustomerLedger['PosCustomer']['name'], array('controller' => 'pos_customers', 'action' => 'view', $posCustomerLedger['PosCustomer']['id'])); ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Totalprice'); ?></td><td> : </td>
		<td >
			<?php echo $posCustomerLedger['PosCustomerLedger']['totalprice']; ?>
			&nbsp;
		</td></tr>  
 <?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Payamount'); ?></td><td> : </td>
		<td >
			<?php echo $posCustomerLedger['PosCustomerLedger']['payamount']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Modified'); ?></td><td> : </td>
		<td >
			<?php 
			echo date("d/m/Y", strtotime($posCustomerLedger['PosCustomerLedger']['modified']));
			//echo $posCustomerLedger['PosCustomerLedger']['modified']; ?>
			&nbsp;
		</td></tr> 
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Modified By'); ?></td><td> : </td>
		<td >
			<?php echo $userlists[$posCustomerLedger['PosCustomerLedger']['modified_by']]; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>	</table>
</div>
  