<div class="posSupplierLedgers">
<?php echo $this->Form->create('PosSupplierLedger');?>
	<fieldset id="posSupplierLedgers_add_field">
		<legend> </legend>
	<?php  echo $this->Form->input('PosSupplierLedger.pos_supplier_id',array('type'=>'hidden','div'=>false,'label'=>false)); ?> 
    
    <div id="WrapperPosSupplierAccountHead" class="microcontroll">
		<?php	echo $this->Form->label('PosSupplierLedger.accounthead', __('Head'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('PosSupplierLedger.accounthead',array('div'=>false,'label'=>false,'options' => $AccountsHeadlists,'empty'=>'---- Please Select Account Head----','class'=>'number required'));?>
		</div>
        <div id="WrapperPosSupplierAccountsCheckNumber" class="microcontroll">
		
		</div>
    <div id="WrapperPosSupplierLedgerPayamount" class="microcontroll">
		<?php	echo $this->Form->label('PosSupplierLedger.payamount', __('Payamount'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('PosSupplierLedger.payamount',array('div'=>false,'label'=>false,'class'=>'number required'));?>
		</div>
	<div id="WrapperPosSupplierLedgerNote" class="microcontroll">
		<?php	echo $this->Form->label('PosSupplierLedger.note', __('Note'.':<span class=star></span>', true) );?>
		<?php	echo $this->Form->input('PosSupplierLedger.note',array('type'=>'textarea','div'=>false,'label'=>false,'class'=>''));?>
		</div>
 
	</fieldset>
<div class="button_area">
		<?php echo $this->Form->button('Save',array( 'class'=>'submit', 'id'=>'btn_PosSupplierLedger_add'));?>
		<?php echo $this->Form->button('Cancel',array('type'=>'reset','name'=>'reset','id'=>'Cancel'));?>
		<?php echo $this->Form->end();?>
</div>
</div>
<?php  echo $this->Html->script(array('common/form','common/jquery.validate'));  
 echo $this->Html->script(array('module/PosSupplierLedgers/add'));  ?>
<style type="text/css">
#PosSupplierLedgerAddForm{
    margin: auto;
    width: 410px;
	}
.microcontroll label {
    float: left !important;
    font-size: 11px !important;
    font-weight: bold;
    padding: 0 10px;
}

#PosSupplierLedgerAccounthead{
	width:200px !important;
	}
#PosSupplierLedgerPayamount{
	width:195px !important;
	}
#PosSupplierLedgerNote{
	width:187px !important;
	}
#PosPurchaseAmountCheckNumber{
	width:195px !important;
	}
#PosPurchaseAmountCheckDate{
	width:195px !important;
}
.button_area {
    margin-left: 100px !important;
    margin-top: 15px !important;
}
</style>
 


