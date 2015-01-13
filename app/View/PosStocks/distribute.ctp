<?php echo $this->Html->script(array('common/form','common/jquery.validate'));?>
<?php echo $this->Form->create('PosStock');?>
<div class="posquantiy">
 
        <?php echo $this->Form->input('PosShopStock.pos_purchase_detail_id', array('type' => 'text', 'value' => $id, 'hidden' => true, 'label' => false)); ?>
	 	<div id="WrapperPosShopStockPosShopId" class="microcontroll">
		<?php	echo $this->Form->label('PosShopStock.pos_shop_id', __('Shop'.':<span class=star>*</span>', true) );?>
		<?php 	echo $this->Form->select('PosShopStock.pos_shop_id',  $shoplists  ,null,array('div'=>false,'label'=>false, 'empty'=>'-- Please Select Shop-', 'class'=>'required'));?>
		</div>
 
 		<div id="WrapperPosShopStockQuantity" class="microcontroll">
		<?php	echo $this->Form->label('PosShopStock.quantity', __('Quantity'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('PosShopStock.quantity',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>
	 
<div class="button_area">
		<?php echo $this->Form->button('Save',array( 'class'=>'submit', 'id'=>'btn_PosShopStock_add'));?>
		<?php echo $this->Form->button('Cancel',array('type'=>'reset','name'=>'reset','id'=>'Cancel'));?>
        </div>
		<?php echo $this->Form->end();?>
</div>