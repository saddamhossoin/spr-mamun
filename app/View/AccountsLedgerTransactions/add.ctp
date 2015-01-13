<?php echo $this->Html->script(array('alert/alert')); ?>
<?php echo $this->Html->css(array('alert/css/alert','alert/themes/default/theme')); ?>
<?php echo $this->Html->css(array('common/grid'));?>

<div class="accountsLedgerTransactions form">
<?php echo $this->Form->create('AccountsLedgerTransaction');?>

		<div id="WrapperAccountsLedgerTransactionAccountHeadId" class="microcontroll">
			<?php	echo $this->Form->label('AccountsLedgerTransaction.account_head_id', __('Account Head'.':<span class=star>*</span>', true) );?>
            <?php	echo $this->Form->select('AccountsLedgerTransaction.account_head_id',$AccountsHeadlists,array('div'=>false,'label'=>false,'empty'=>'---- Please Select Account Head----','class'=>'required'));?>
		</div>
	 
     <div id="WrapperAccountsLedgerTransactionDebitCredit" class="microcontroll">
		<?php	echo $this->Form->label('AccountsLedgerTransaction.debit_credit', __('Debit/ Credit'.':<span class=star>*</span>', true) );?>
		<?php	
		$DebitorCredit=array('1'=>'Debit','2'=>'Credit');
		echo $this->Form->input('AccountsLedgerTransaction.debit_credit',array('options'=>$DebitorCredit,'div'=>false,'empty'=>'---- Please Select Debit OR Credit----','label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperAccountsLedgerTransactionAmount" class="microcontroll">
		<?php	echo $this->Form->label('AccountsLedgerTransaction.amount', __('Amount'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('AccountsLedgerTransaction.amount',array('div'=>false,'label'=>false,'class'=>'required two_digit'));?>
		</div>

	 
 		<div id="WrapperAccountsLedgerTransactionCheckNumber" class="microcontroll">
        
		</div>

		<div id="WrapperAccountsLedgerTransactionManualvoucherNumber" class="microcontroll">
		<?php	echo $this->Form->label('AccountsLedgerTransaction.manualvoucherNumber', __('Voucher Number'.':<span class=star></span>', true) );?>
		<?php	echo $this->Form->input('AccountsLedgerTransaction.manualvoucherNumber',array('div'=>false,'label'=>false,'class'=>''));?>
		</div>
      
 <div class="button_area">
		<?php echo $this->Form->button('Add',array( 'class'=>'submit', 'id'=>'btn_AccountsLedgerTransaction_add'));?>
		<?php echo $this->Form->button('Cancel',array('type'=>'reset','name'=>'reset','id'=>'Cancel'));?>
		<?php echo $this->Form->end();?>
</div>


<div class="flexigrid" style="width: 100%;" id="viewlist">
  <div class="bDiv" style="height: auto;  ">
    <div class="hDiv"> 
    <div class="hDivBox">
     <?php echo $this->Form->create('AccountsLedgerTransactionDetails');?>
    <table cellpadding="0" cellspacing="0" width="100%">
        <thead>
        <th>Head</th>
        <th>Debit / Credit</th>
        <th>Amount</th>
        <th>C.Number</th>
        <th>C.Date</th>
        <th>V.Number</th>
        <th>Action</th>
        </thead>
    <tbody class="AccountsLedgerTransactionAccountadd">
    
    
    
    </tbody>
  
    
    
  </table>
  <div class="debit_credit">
    <div id="WrapperAccountsLedgerTransactionDebit" class="microcontroll">
		<?php	echo $this->Form->label('AccountsLedgerTransactionSummary.debit', __('Debit'.'', true) );?>
		<?php	echo $this->Form->input('AccountsLedgerTransactionSummary.debit',array('div'=>false,'label'=>false,'val'=>0.00,'readonly' => 'readonly'));?>
		</div>

    <div id="WrapperAccountsLedgerTransactionCredit" class="microcontroll">
        <?php	echo $this->Form->label('AccountsLedgerTransactionSummary.credit', __('Credit'.'', true) );?>
        <?php	echo $this->Form->input('AccountsLedgerTransactionSummary.credit',array('div'=>false,'label'=>false,'val'=>0.00,'readonly' => 'readonly'));?>
    </div>
    </div>


<div class="button_area">
		<?php echo $this->Form->button('Save',array( 'class'=>'submit', 'id'=>'btn_AccountsLedgerTransaction_save'));?>
		<?php echo $this->Form->button('Cancel',array('type'=>'reset','name'=>'reset','id'=>'Cancel'));?>
		
</div>
<?php echo $this->Form->end();?>
  
			</div>
		</div>
	</div>
</div>

	


</div>

<style type="text/css">
.microcontroll label{
	float:left !important;
	}
</style>


 




