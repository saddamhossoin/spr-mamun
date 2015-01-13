  
<div class="posPurchaseReturns form">
<?php echo $this->Form->create('PosPurchaseReturn');?>
	<fieldset>
		<legend> </legend>
		<div id="WrapperPosPurchaseReturnId" class="microcontroll">
		<?php	echo $this->Form->label('PosPurchaseReturn.id', __('Id'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('PosPurchaseReturn.id',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperPosPurchaseReturnPosPurchaseId" class="microcontroll">
		<?php	echo $this->Form->label('PosPurchaseReturn.pos_purchase_id', __('Pos Purchase Id'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('PosPurchaseReturn.pos_purchase_id',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		

	</fieldset>
<div class="button_area">
		<?php echo $this->Form->button('Save',array( 'class'=>'submit', 'id'=>'btn_PosPurchaseReturn_edit'));?>
		<?php echo $this->Form->button('Cancel',array('type'=>'reset','name'=>'reset','id'=>'Cancel'));?>
		<?php echo $this->Form->end();?>
</div>
</div>
 




