<div class="accountsLedgerTransactions view">
	<table cellpadding="0" cellspacing="0" class="view_table"><?php $i = 0; $class = ' class="altrow"';?>
		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Id'); ?></td><td> : </td>
		<td >
			<?php echo $accountsLedgerTransaction['AccountsLedgerTransaction']['id']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('JurnalNumber'); ?></td><td> : </td>
		<td >
			<?php echo $accountsLedgerTransaction['AccountsLedgerTransaction']['jurnalNumber']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Debit Credit'); ?></td><td> : </td>
		<td >
			<?php echo $accountsLedgerTransaction['AccountsLedgerTransaction']['debit_credit']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Amount'); ?></td><td> : </td>
		<td >
			<?php echo $accountsLedgerTransaction['AccountsLedgerTransaction']['amount']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Account Head Id'); ?></td><td> : </td>
		<td >
			<?php echo $accountsLedgerTransaction['AccountsLedgerTransaction']['account_head_id']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Counter Account Head Id'); ?></td><td> : </td>
		<td >
			<?php echo $accountsLedgerTransaction['AccountsLedgerTransaction']['counter_account_head_id']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Transaction Date'); ?></td><td> : </td>
		<td >
			<?php echo $accountsLedgerTransaction['AccountsLedgerTransaction']['transaction_date']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('CashOrcheck'); ?></td><td> : </td>
		<td >
			<?php echo $accountsLedgerTransaction['AccountsLedgerTransaction']['cashOrcheck']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Check Number'); ?></td><td> : </td>
		<td >
			<?php echo $accountsLedgerTransaction['AccountsLedgerTransaction']['check_number']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Check Date'); ?></td><td> : </td>
		<td >
			<?php echo $accountsLedgerTransaction['AccountsLedgerTransaction']['check_date']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('ManualvoucherNumber'); ?></td><td> : </td>
		<td >
			<?php echo $accountsLedgerTransaction['AccountsLedgerTransaction']['manualvoucherNumber']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Voucher Type'); ?></td><td> : </td>
		<td >
			<?php echo $accountsLedgerTransaction['AccountsLedgerTransaction']['voucher_type']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Referance Table Id'); ?></td><td> : </td>
		<td >
			<?php echo $accountsLedgerTransaction['AccountsLedgerTransaction']['referance_table_id']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Created'); ?></td><td> : </td>
		<td >
			<?php echo $accountsLedgerTransaction['AccountsLedgerTransaction']['created']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Modified'); ?></td><td> : </td>
		<td >
			<?php echo $accountsLedgerTransaction['AccountsLedgerTransaction']['modified']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Created By'); ?></td><td> : </td>
		<td >
			<?php echo $accountsLedgerTransaction['AccountsLedgerTransaction']['created_by']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Modified By'); ?></td><td> : </td>
		<td >
			<?php echo $accountsLedgerTransaction['AccountsLedgerTransaction']['modified_by']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Ip Address'); ?></td><td> : </td>
		<td >
			<?php echo $accountsLedgerTransaction['AccountsLedgerTransaction']['ip_address']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>	</table>
</div>
  