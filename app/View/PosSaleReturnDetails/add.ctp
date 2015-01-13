<div class="posSaleReturnDetails form">
<?php echo $this->Form->create('PosSaleReturnDetail');?>
	<fieldset>
		<legend> </legend>
		<div id="WrapperPosSaleReturnDetailPosSaleReturnId" class="microcontroll">
		<?php	echo $this->Form->label('PosSaleReturnDetail.pos_sale_return_id', __('Pos Sale Return Id'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('PosSaleReturnDetail.pos_sale_return_id',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperPosSaleReturnDetailPosProductId" class="microcontroll">
		<?php	echo $this->Form->label('PosSaleReturnDetail.pos_product_id', __('Pos Product Id'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('PosSaleReturnDetail.pos_product_id',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperPosSaleReturnDetailPosSaleDetailId" class="microcontroll">
		<?php	echo $this->Form->label('PosSaleReturnDetail.pos_sale_detail_id', __('Pos Sale Detail Id'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('PosSaleReturnDetail.pos_sale_detail_id',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperPosSaleReturnDetailQuantity" class="microcontroll">
		<?php	echo $this->Form->label('PosSaleReturnDetail.quantity', __('Quantity'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('PosSaleReturnDetail.quantity',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperPosSaleReturnDetailPrice" class="microcontroll">
		<?php	echo $this->Form->label('PosSaleReturnDetail.price', __('Price'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('PosSaleReturnDetail.price',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperPosSaleReturnDetailCreatedBy" class="microcontroll">
		<?php	echo $this->Form->label('PosSaleReturnDetail.created_by', __('Created By'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('PosSaleReturnDetail.created_by',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperPosSaleReturnDetailModifiedBy" class="microcontroll">
		<?php	echo $this->Form->label('PosSaleReturnDetail.modified_by', __('Modified By'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('PosSaleReturnDetail.modified_by',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

	</fieldset>
<div class="button_area">
		<?php echo $this->Form->button('Save',array( 'class'=>'submit', 'id'=>'btn_PosSaleReturnDetail_add'));?>
		<?php echo $this->Form->button('Cancel',array('type'=>'reset','name'=>'reset','id'=>'Cancel'));?>
		<?php echo $this->Form->end();?>
</div>
</div>
 




