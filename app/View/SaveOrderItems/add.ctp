     
       
<div class="saveOrderItems form">
<?php echo $this->Form->create('SaveOrderItem');?>
	<fieldset>
		<legend> </legend>
		<div id="WrapperSaveOrderItemSaveOrderId" class="microcontroll">
		<?php	echo $this->Form->label('SaveOrderItem.save_order_id', __('Save Order Id'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('SaveOrderItem.save_order_id',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperSaveOrderItemPosProductId" class="microcontroll">
		<?php	echo $this->Form->label('SaveOrderItem.pos_product_id', __('Pos Product Id'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('SaveOrderItem.pos_product_id',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperSaveOrderItemName" class="microcontroll">
		<?php	echo $this->Form->label('SaveOrderItem.name', __('Name'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('SaveOrderItem.name',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperSaveOrderItemQuantity" class="microcontroll">
		<?php	echo $this->Form->label('SaveOrderItem.quantity', __('Quantity'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('SaveOrderItem.quantity',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperSaveOrderItemWeight" class="microcontroll">
		<?php	echo $this->Form->label('SaveOrderItem.weight', __('Weight'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('SaveOrderItem.weight',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperSaveOrderItemPrice" class="microcontroll">
		<?php	echo $this->Form->label('SaveOrderItem.price', __('Price'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('SaveOrderItem.price',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperSaveOrderItemSubtotal" class="microcontroll">
		<?php	echo $this->Form->label('SaveOrderItem.subtotal', __('Subtotal'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('SaveOrderItem.subtotal',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperSaveOrderItemProductItemId" class="microcontroll">
		<?php	echo $this->Form->label('SaveOrderItem.product_item_id', __('Product Item Id'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('SaveOrderItem.product_item_id',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperSaveOrderItemCreatedBy" class="microcontroll">
		<?php	echo $this->Form->label('SaveOrderItem.created_by', __('Created By'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('SaveOrderItem.created_by',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperSaveOrderItemModifiedBy" class="microcontroll">
		<?php	echo $this->Form->label('SaveOrderItem.modified_by', __('Modified By'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('SaveOrderItem.modified_by',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

	</fieldset>
<div class="button_area">
		<?php echo $this->Form->button('Save',array( 'class'=>'submit', 'id'=>'btn_SaveOrderItem_add'));?>
		<?php echo $this->Form->button('Cancel',array('type'=>'reset','name'=>'reset','id'=>'Cancel'));?>
		<?php echo $this->Form->end();?>
</div>
</div>
 




