  
<div class="posPurchaseDetails form">
<?php echo $this->Form->create('PosPurchaseDetail');?>
	<fieldset>
		<legend> </legend>
		<div id="WrapperPosPurchaseDetailPosPurchaseId" class="microcontroll">
		<?php	echo $this->Form->label('PosPurchaseDetail.pos_purchase_id', __('Pos Purchase Id'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('PosPurchaseDetail.pos_purchase_id',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperPosPurchaseDetailPosBrandId" class="microcontroll">
		<?php	echo $this->Form->label('PosPurchaseDetail.pos_brand_id', __('Pos Brand Id'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('PosPurchaseDetail.pos_brand_id',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperPosPurchaseDetailPosProductId" class="microcontroll">
		<?php	echo $this->Form->label('PosPurchaseDetail.pos_product_id', __('Pos Product Id'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('PosPurchaseDetail.pos_product_id',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperPosPurchaseDetailPosPcategoryId" class="microcontroll">
		<?php	echo $this->Form->label('PosPurchaseDetail.pos_pcategory_id', __('Pos Pcategory Id'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('PosPurchaseDetail.pos_pcategory_id',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperPosPurchaseDetailQuantity" class="microcontroll">
		<?php	echo $this->Form->label('PosPurchaseDetail.quantity', __('Quantity'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('PosPurchaseDetail.quantity',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperPosPurchaseDetailPrice" class="microcontroll">
		<?php	echo $this->Form->label('PosPurchaseDetail.price', __('Price'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('PosPurchaseDetail.price',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperPosPurchaseDetailTotalprice" class="microcontroll">
		<?php	echo $this->Form->label('PosPurchaseDetail.totalprice', __('Totalprice'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('PosPurchaseDetail.totalprice',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperPosPurchaseDetailCreatedBy" class="microcontroll">
		<?php	echo $this->Form->label('PosPurchaseDetail.created_by', __('Created By'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('PosPurchaseDetail.created_by',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperPosPurchaseDetailModifiedBy" class="microcontroll">
		<?php	echo $this->Form->label('PosPurchaseDetail.modified_by', __('Modified By'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('PosPurchaseDetail.modified_by',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

	</fieldset>
<div class="button_area">
		<?php echo $this->Form->button('Save',array( 'class'=>'submit', 'id'=>'btn_PosPurchaseDetail_add'));?>
		<?php echo $this->Form->button('Cancel',array('type'=>'reset','name'=>'reset','id'=>'Cancel'));?>
		<?php echo $this->Form->end();?>
</div>
</div>
 




