     
       
<div class="posSalePurchaseDetails form">
<?php echo $this->Form->create('PosSalePurchaseDetail');?>
	<fieldset>
		<legend> </legend>
		<div id="WrapperPosSalePurchaseDetailId" class="microcontroll">
		<?php	echo $this->Form->label('PosSalePurchaseDetail.id', __('Id'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('PosSalePurchaseDetail.id',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperPosSalePurchaseDetailPosPurchaseDetailId" class="microcontroll">
		<?php	echo $this->Form->label('PosSalePurchaseDetail.pos_purchase_detail_id', __('Pos Purchase Detail Id'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('PosSalePurchaseDetail.pos_purchase_detail_id',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperPosSalePurchaseDetailPosSaleDetailId" class="microcontroll">
		<?php	echo $this->Form->label('PosSalePurchaseDetail.pos_sale_detail_id', __('Pos Sale Detail Id'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('PosSalePurchaseDetail.pos_sale_detail_id',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperPosSalePurchaseDetailPosProductId" class="microcontroll">
		<?php	echo $this->Form->label('PosSalePurchaseDetail.pos_product_id', __('Pos Product Id'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('PosSalePurchaseDetail.pos_product_id',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperPosSalePurchaseDetailQuantity" class="microcontroll">
		<?php	echo $this->Form->label('PosSalePurchaseDetail.quantity', __('Quantity'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('PosSalePurchaseDetail.quantity',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperPosSalePurchaseDetailPrice" class="microcontroll">
		<?php	echo $this->Form->label('PosSalePurchaseDetail.price', __('Price'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('PosSalePurchaseDetail.price',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperPosSalePurchaseDetailCreatedBy" class="microcontroll">
		<?php	echo $this->Form->label('PosSalePurchaseDetail.created_by', __('Created By'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('PosSalePurchaseDetail.created_by',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperPosSalePurchaseDetailModifiedBy" class="microcontroll">
		<?php	echo $this->Form->label('PosSalePurchaseDetail.modified_by', __('Modified By'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('PosSalePurchaseDetail.modified_by',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

	</fieldset>
<div class="button_area">
		<?php echo $this->Form->button('Save',array( 'class'=>'submit', 'id'=>'btn_PosSalePurchaseDetail_edit'));?>
		<?php echo $this->Form->button('Cancel',array('type'=>'reset','name'=>'reset','id'=>'Cancel'));?>
		<?php echo $this->Form->end();?>
</div>
</div>
 




