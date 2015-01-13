     
       
<div class="posCustomerLedgers form">
<?php echo $this->Form->create('PosCustomerLedger');?>
	<fieldset>
		<legend> </legend>
		<div id="WrapperPosCustomerLedgerId" class="microcontroll">
		<?php	echo $this->Form->label('PosCustomerLedger.id', __('Id'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('PosCustomerLedger.id',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperPosCustomerLedgerPosCustomerId" class="microcontroll">
		<?php	echo $this->Form->label('PosCustomerLedger.pos_customer_id', __('Pos Customer Id'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('PosCustomerLedger.pos_customer_id',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperPosCustomerLedgerTotalprice" class="microcontroll">
		<?php	echo $this->Form->label('PosCustomerLedger.totalprice', __('Totalprice'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('PosCustomerLedger.totalprice',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperPosCustomerLedgerPayamount" class="microcontroll">
		<?php	echo $this->Form->label('PosCustomerLedger.payamount', __('Payamount'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('PosCustomerLedger.payamount',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperPosCustomerLedgerCreatedBy" class="microcontroll">
		<?php	echo $this->Form->label('PosCustomerLedger.created_by', __('Created By'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('PosCustomerLedger.created_by',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperPosCustomerLedgerModifiedBy" class="microcontroll">
		<?php	echo $this->Form->label('PosCustomerLedger.modified_by', __('Modified By'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('PosCustomerLedger.modified_by',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

	</fieldset>
<div class="button_area">
		<?php echo $this->Form->button('Save',array( 'class'=>'submit', 'id'=>'btn_PosCustomerLedger_edit'));?>
		<?php echo $this->Form->button('Cancel',array('type'=>'reset','name'=>'reset','id'=>'Cancel'));?>
		<?php echo $this->Form->end();?>
</div>
</div>
 




