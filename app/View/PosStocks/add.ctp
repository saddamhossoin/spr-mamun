  
<div class="posStocks form">
<?php echo $this->Form->create('PosStock');?>
	<fieldset>
		<legend> </legend>
		<div id="WrapperPosStockPosProductId" class="microcontroll">
		<?php	echo $this->Form->label('PosStock.pos_product_id', __('Product Name'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('PosStock.pos_product_id',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperPosStockQuantity" class="microcontroll">
		<?php	echo $this->Form->label('PosStock.quantity', __('Quantity'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('PosStock.quantity',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>


	</fieldset>
<div class="button_area">
		<?php echo $this->Form->button('Save',array( 'class'=>'submit', 'id'=>'btn_PosStock_add'));?>
		<?php echo $this->Form->button('Cancel',array('type'=>'reset','name'=>'reset','id'=>'Cancel'));?>
		<?php echo $this->Form->end();?>
</div>
</div>
 
