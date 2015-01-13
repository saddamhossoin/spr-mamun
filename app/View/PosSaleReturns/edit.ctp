  
<div class="posSaleReturns form">
<?php echo $this->Form->create('PosSaleReturn');?>
	<fieldset>
		<legend> </legend>
		<div id="WrapperPosSaleReturnId" class="microcontroll">
		<?php	echo $this->Form->label('PosSaleReturn.id', __('Id'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('PosSaleReturn.id',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperPosSaleReturnPosSaleId" class="microcontroll">
		<?php	echo $this->Form->label('PosSaleReturn.pos_sale_id', __('Pos Sale Id'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('PosSaleReturn.pos_sale_id',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperPosSaleReturnPosCustomerId" class="microcontroll">
		<?php	echo $this->Form->label('PosSaleReturn.pos_customer_id', __('Pos Customer Id'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('PosSaleReturn.pos_customer_id',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperPosSaleReturnPosProductId" class="microcontroll">
		<?php	echo $this->Form->label('PosSaleReturn.pos_product_id', __('Pos Product Id'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('PosSaleReturn.pos_product_id',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperPosSaleReturnPosSaleDetailId" class="microcontroll">
		<?php	echo $this->Form->label('PosSaleReturn.pos_sale_detail_id', __('Pos Sale Detail Id'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('PosSaleReturn.pos_sale_detail_id',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperPosSaleReturnQuantity" class="microcontroll">
		<?php	echo $this->Form->label('PosSaleReturn.quantity', __('Quantity'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('PosSaleReturn.quantity',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperPosSaleReturnCreatedBy" class="microcontroll">
		<?php	echo $this->Form->label('PosSaleReturn.created_by', __('Created By'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('PosSaleReturn.created_by',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperPosSaleReturnModifiedBy" class="microcontroll">
		<?php	echo $this->Form->label('PosSaleReturn.modified_by', __('Modified By'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('PosSaleReturn.modified_by',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

	</fieldset>
<div class="button_area">
		<?php echo $this->Form->button('Save',array( 'class'=>'submit', 'id'=>'btn_PosSaleReturn_edit'));?>
		<?php echo $this->Form->button('Cancel',array('type'=>'reset','name'=>'reset','id'=>'Cancel'));?>
		<?php echo $this->Form->end();?>
</div>
</div>
 




