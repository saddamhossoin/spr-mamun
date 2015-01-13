     
       
<div class="posPurchaseReturnDetails form">
<?php echo $this->Form->create('PosPurchaseReturnDetail');?>
	<fieldset>
		<legend> </legend>
		<div id="WrapperPosPurchaseReturnDetailPosPurchaseReturnId" class="microcontroll">
		<?php	echo $this->Form->label('PosPurchaseReturnDetail.pos_purchase_return_id', __('Pos Purchase Return Id'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('PosPurchaseReturnDetail.pos_purchase_return_id',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperPosPurchaseReturnDetailPosProductId" class="microcontroll">
		<?php	echo $this->Form->label('PosPurchaseReturnDetail.pos_product_id', __('Pos Product Id'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('PosPurchaseReturnDetail.pos_product_id',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperPosPurchaseReturnDetailPosPurchaseDetailId" class="microcontroll">
		<?php	echo $this->Form->label('PosPurchaseReturnDetail.pos_purchase_detail_id', __('Pos Purchase Detail Id'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('PosPurchaseReturnDetail.pos_purchase_detail_id',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperPosPurchaseReturnDetailQuantity" class="microcontroll">
		<?php	echo $this->Form->label('PosPurchaseReturnDetail.quantity', __('Quantity'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('PosPurchaseReturnDetail.quantity',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperPosPurchaseReturnDetailPrice" class="microcontroll">
		<?php	echo $this->Form->label('PosPurchaseReturnDetail.price', __('Price'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('PosPurchaseReturnDetail.price',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

	</fieldset>
<div class="button_area">
		<?php echo $this->Form->button('Save',array( 'class'=>'submit', 'id'=>'btn_PosPurchaseReturnDetail_add'));?>
		<?php echo $this->Form->button('Cancel',array('type'=>'reset','name'=>'reset','id'=>'Cancel'));?>
		<?php echo $this->Form->end();?>
</div>
</div>
 




