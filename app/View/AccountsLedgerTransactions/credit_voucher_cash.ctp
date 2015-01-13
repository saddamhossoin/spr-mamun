<?php echo $this->Html->script(array('common/jquery.validate'));?>
<div class="accountsLedgerTransactions form">
<?php echo $this->Form->create('AccountsLedgerTransaction');?>
	<fieldset>
		<legend> </legend>
		<div id="WrapperAccountsLedgerTransactionAccountHeadId" class="microcontroll">
			<?php	echo $this->Form->label('AccountsLedgerTransaction.account_head_id', __('Account Head'.':<span class=star>*</span>', true) );?>
            <?php	echo $this->Form->select('AccountsLedgerTransaction.account_head_id',$AccountsHeadlists,array('div'=>false,'label'=>false,'empty'=>'---- Please Select Account Head----','class'=>'required'));?>
		</div>
         <div id="WrapperAccountsLedgerTransactionCreditVoucherCash" class="microcontroll">
        
		</div>
           
        
        <div id="WrapperAccountsLedgerTransactionAmount" class="microcontroll">
		<?php	echo $this->Form->label('AccountsLedgerTransaction.amount', __('Amount'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('AccountsLedgerTransaction.amount',array('div'=>false,'label'=>false,'class'=>'required two_digit'));?>
		</div>
        
        <div id="WrapperAccountsLedgerTransactionCashAccountHead" class="microcontroll">
			<?php	echo $this->Form->label('AccountsLedgerTransaction.counter_account_head_id', __('Cash Account Head'.':<span class=star>*</span>', true) );?>
            <?php	echo $this->Form->select('AccountsLedgerTransaction.counter_account_head_id',$AccountsHeadlists,array('div'=>false,'label'=>false,'empty'=>'---- Please Select Cash Account Head----','class'=>'required'));?>
		</div>
        
         <div id="WrapperAccountsLedgerTransactionCashAccount" class="microcontroll">
        
		 </div>
        
         <div id="WrapperAccountsLedgerTransactionManualvoucher" class="microcontroll">
		<?php	echo $this->Form->label('AccountsLedgerTransaction.manualvoucherNumber', __('Voucher No'.':<span class=star></span>', true) );?>
		<?php	echo $this->Form->input('AccountsLedgerTransaction.manualvoucherNumber',array('div'=>false,'label'=>false,'class'=>''));?>
		</div>
        
       
           

	</fieldset>
<div class="button_area">
		<?php echo $this->Form->button('Save',array( 'class'=>'submit', 'id'=>'btn_credit_voucher_add'));?>
		<?php echo $this->Form->button('Cancel',array('type'=>'reset','name'=>'reset','id'=>'Cancel'));?>
		<?php echo $this->Form->end();?>
</div>
</div>
 




