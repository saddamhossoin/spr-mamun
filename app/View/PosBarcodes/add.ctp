     
       
<div class="barcodes form">
<?php echo $this->Form->create('PosBarcode');?>
	<fieldset>
		<legend> </legend>
		<div id="WrapperBarcodeBarcode" class="microcontroll">
		<?php	echo $this->Form->label('PosBarcode.barcode', __('PosBarcode'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('PosBarcode.barcode',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperBarcodeStatus" class="microcontroll">
		<?php	echo $this->Form->label('PosBarcode.status', __('Status'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('PosBarcode.status',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperBarcodePosProductId" class="microcontroll">
		<?php	echo $this->Form->label('PosBarcode.pos_product_id', __('Pos Product Id'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('PosBarcode.pos_product_id',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperBarcodeCreatedBy" class="microcontroll">
		<?php	echo $this->Form->label('PosBarcode.created_by', __('Created By'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('PosBarcode.created_by',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

	</fieldset>
<div class="button_area">
		<?php echo $this->Form->button('Save',array( 'class'=>'submit', 'id'=>'btn_Barcode_add'));?>
		<?php echo $this->Form->button('Cancel',array('type'=>'reset','name'=>'reset','id'=>'Cancel'));?>
		<?php echo $this->Form->end();?>
</div>
</div>
 




