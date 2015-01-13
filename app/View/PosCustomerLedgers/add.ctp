<div class="posCustomerLedgers">
<?php echo $this->Form->create('PosCustomerLedger');?>
	<fieldset>
		<legend> </legend>
		 <?php  echo $this->Form->input('PosCustomerLedger.pos_customer_id',array('type'=>'hidden','div'=>false,'label'=>false)); ?>
         
         <div id="WrapperPosCustomerAccountHead" class="microcontroll">
		<?php	echo $this->Form->label('PosCustomerLedger.accounthead', __('Head'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('PosCustomerLedger.accounthead',array('div'=>false,'label'=>false,'options' => $AccountsHeadlists,'empty'=>'---- Please Select Account Head----','class'=>'number required'));?>
		</div>
         <div id="WrapperPosCustomerAccountsCheckNumber" class="microcontroll">
		
		</div>
        
 		<div id="WrapperPosCustomerLedgerPayamount" class="microcontroll">
		<?php	echo $this->Form->label('PosCustomerLedger.payamount', __('Payamount'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('PosCustomerLedger.payamount',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperPosCustomerLedgerNote" class="microcontroll">
		<?php	echo $this->Form->label('PosCustomerLedger.note', __('Note'.':<span class=star></span>', true) );?>
		<?php	echo $this->Form->input('PosCustomerLedger.note',array('type'=>'textarea','div'=>false,'label'=>false,'class'=>''));?>
		</div>
  
	</fieldset>
<div class="button_area">
		<?php echo $this->Form->button('Save',array( 'class'=>'submit', 'id'=>'btn_PosCustomerLedger_add'));?>
		<?php echo $this->Form->button('Cancel',array('type'=>'reset','name'=>'reset','id'=>'Cancel'));?>
		<?php echo $this->Form->end();?>
</div>
</div>
 <?php  echo $this->Html->script(array('common/form','common/jquery.validate'));  
 echo $this->Html->script(array('module/PosCustomerLedgers/add'));  ?>
<style type="text/css">
#PosCustomerLedgerAddForm{
	width:360px;
	margin:auto;
	}
#posSupplierLedgers_add_field{
	padding-bottom:50px;
	}
#PosCustomerLedgerNote{
width: 187px; height: 64px;
}

#PosCustomerLedgerAccounthead{
	width:200px;
	}	
#PosCustomerLedgerPayamount{
	width:195px !important;
	}
#WrapperPosCustomerAccountHead{
	width:355px !important;
	}
#WrapperPosCustomerLedgerPayamount{
	width:355px !important;
	}
#WrapperPosCustomerLedgerNote{
	width:380px !important;
	}
#PosCustomerAmountCheckNumber{
	width:195px !important;
	}
#PosCustomerAmountCheckDate{
	width:195px !important;
}
.microcontroll label {
    float: left !important;
    font-size: 11px !important;
    font-weight: bold;
    padding: 0 0px;
}


.button_area {
    margin-left: 100px !important;
    margin-top: 15px !important;
}
</style>
 




