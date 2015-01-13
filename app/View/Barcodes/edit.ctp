     
       
<div class="barcodes form">
<?php echo $this->Form->create('Barcode');?>
	<fieldset>
		<legend> </legend>
		<div id="WrapperBarcodeId" class="microcontroll">
		<?php	echo $this->Form->label('Barcode.id', __('Id'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('Barcode.id',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperBarcodeBarcode" class="microcontroll">
		<?php	echo $this->Form->label('Barcode.barcode', __('Barcode'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('Barcode.barcode',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperBarcodeCreatedBy" class="microcontroll">
		<?php	echo $this->Form->label('Barcode.created_by', __('Created By'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('Barcode.created_by',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperBarcodeModifiedBy" class="microcontroll">
		<?php	echo $this->Form->label('Barcode.modified_by', __('Modified By'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('Barcode.modified_by',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

	</fieldset>
<div class="button_area">
		<?php echo $this->Form->button('Save',array( 'class'=>'submit', 'id'=>'btn_Barcode_edit'));?>
		<?php echo $this->Form->button('Cancel',array('type'=>'reset','name'=>'reset','id'=>'Cancel'));?>
		<?php echo $this->Form->end();?>
</div>
</div>
 




