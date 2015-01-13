  
<div class="posPurchases form">
<?php echo $this->Form->create('PosPurchase');?>
	<fieldset>
		<legend> </legend>
		<div id="WrapperPosPurchaseId" class="microcontroll">
		<?php	echo $this->Form->label('PosPurchase.id', __('Purchase Id'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('PosPurchase.id',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperPosPurchasePosSupplierId" class="microcontroll">
		<?php	echo $this->Form->label('PosPurchase.pos_supplier_id', __('Pos Supplier Id'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('PosPurchase.pos_supplier_id',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>
 

	</fieldset>
<div class="button_area">
		<?php echo $this->Form->button('Save',array( 'class'=>'submit', 'id'=>'btn_PosPurchase_edit'));?>
		<?php echo $this->Form->button('Cancel',array('type'=>'reset','name'=>'reset','id'=>'Cancel'));?>
		<?php echo $this->Form->end();?>
</div>
</div>
 
 
