     
       
<div class="accountsLedgerTransactions form">
<?php echo $this->Form->create('AccountsLedgerTransaction');?>
	<fieldset>
		<legend> </legend>
		<div id="WrapperAccountsLedgerTransactionId" class="microcontroll">
		<?php	echo $this->Form->label('AccountsLedgerTransaction.id', __('Id'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('AccountsLedgerTransaction.id',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperAccountsLedgerTransactionJurnalNumber" class="microcontroll">
		<?php	echo $this->Form->label('AccountsLedgerTransaction.jurnalNumber', __('JurnalNumber'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('AccountsLedgerTransaction.jurnalNumber',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperAccountsLedgerTransactionDebitCredit" class="microcontroll">
		<?php	echo $this->Form->label('AccountsLedgerTransaction.debit_credit', __('Debit Credit'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('AccountsLedgerTransaction.debit_credit',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperAccountsLedgerTransactionAmount" class="microcontroll">
		<?php	echo $this->Form->label('AccountsLedgerTransaction.amount', __('Amount'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('AccountsLedgerTransaction.amount',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperAccountsLedgerTransactionAccountHeadId" class="microcontroll">
		<?php	echo $this->Form->label('AccountsLedgerTransaction.account_head_id', __('Account Head Id'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('AccountsLedgerTransaction.account_head_id',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperAccountsLedgerTransactionCounterAccountHeadId" class="microcontroll">
		<?php	echo $this->Form->label('AccountsLedgerTransaction.counter_account_head_id', __('Counter Account Head Id'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('AccountsLedgerTransaction.counter_account_head_id',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperAccountsLedgerTransactionTransactionDate" class="microcontroll">
		<?php	echo $this->Form->label('AccountsLedgerTransaction.transaction_date', __('Transaction Date'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('AccountsLedgerTransaction.transaction_date',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperAccountsLedgerTransactionCashOrcheck" class="microcontroll">
		<?php	echo $this->Form->label('AccountsLedgerTransaction.cashOrcheck', __('CashOrcheck'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('AccountsLedgerTransaction.cashOrcheck',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperAccountsLedgerTransactionCheckNumber" class="microcontroll">
		<?php	echo $this->Form->label('AccountsLedgerTransaction.check_number', __('Check Number'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('AccountsLedgerTransaction.check_number',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperAccountsLedgerTransactionCheckDate" class="microcontroll">
		<?php	echo $this->Form->label('AccountsLedgerTransaction.check_date', __('Check Date'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('AccountsLedgerTransaction.check_date',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperAccountsLedgerTransactionManualvoucherNumber" class="microcontroll">
		<?php	echo $this->Form->label('AccountsLedgerTransaction.manualvoucherNumber', __('ManualvoucherNumber'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('AccountsLedgerTransaction.manualvoucherNumber',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperAccountsLedgerTransactionVoucherType" class="microcontroll">
		<?php	echo $this->Form->label('AccountsLedgerTransaction.voucher_type', __('Voucher Type'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('AccountsLedgerTransaction.voucher_type',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperAccountsLedgerTransactionReferanceTableId" class="microcontroll">
		<?php	echo $this->Form->label('AccountsLedgerTransaction.referance_table_id', __('Referance Table Id'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('AccountsLedgerTransaction.referance_table_id',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperAccountsLedgerTransactionCreatedBy" class="microcontroll">
		<?php	echo $this->Form->label('AccountsLedgerTransaction.created_by', __('Created By'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('AccountsLedgerTransaction.created_by',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperAccountsLedgerTransactionModifiedBy" class="microcontroll">
		<?php	echo $this->Form->label('AccountsLedgerTransaction.modified_by', __('Modified By'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('AccountsLedgerTransaction.modified_by',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperAccountsLedgerTransactionIpAddress" class="microcontroll">
		<?php	echo $this->Form->label('AccountsLedgerTransaction.ip_address', __('Ip Address'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('AccountsLedgerTransaction.ip_address',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

	</fieldset>
<div class="button_area">
		<?php echo $this->Form->button('Save',array( 'class'=>'submit', 'id'=>'btn_AccountsLedgerTransaction_edit'));?>
		<?php echo $this->Form->button('Cancel',array('type'=>'reset','name'=>'reset','id'=>'Cancel'));?>
		<?php echo $this->Form->end();?>
</div>
</div>
 




