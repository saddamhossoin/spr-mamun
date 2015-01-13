<div class="posSupplierLedgers view">
	<table cellpadding="0" cellspacing="0" class="view_table"><?php $i = 0; $class = ' class="altrow"';?>
 <?php $payment_mode=array(1=>"Purchase",2=>"Supplier Payment");?>
		 
 	<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Payment Mode'); ?></td><td> : </td>
		<td >
			<?php echo $payment_mode[$posSupplierLedger['PosSupplierLedger']['payment_mode']]; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Supplier'); ?></td><td> : </td>
		<td>
			<?php echo $this->Html->link($posSupplierLedger['PosSupplier']['name'], array('controller' => 'pos_suppliers', 'action' => 'view', $posSupplierLedger['PosSupplier']['id'])); ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Amount'); ?></td><td> : </td>
		<td >
			<?php echo $posSupplierLedger['PosSupplierLedger']['amount']; ?>
            <?php if($posSupplierLedger ['account_head_id'] !=3){ echo 'Bank';}else{echo $accountsheads[$posSupplierLedger[ 'account_head_id']];}?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Note'); ?></td><td> : </td>
		<td >
			<?php echo $posSupplierLedger['PosSupplierLedger']['note']; ?>
			&nbsp;
		</td></tr>
 <?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Modified'); ?></td><td> : </td>
		<td >
			<?php echo $posSupplierLedger['PosSupplierLedger']['modified']; ?>
			&nbsp;
		</td></tr>
 	 
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Modified By'); ?></td><td> : </td>
		<td >
			<?php echo $userlists[$posSupplierLedger['PosSupplierLedger']['modified_by']]; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>	</table>
</div>
  