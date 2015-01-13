<style type="text/css">
#productstatus{
	width:300px;
 	height:85px;
	float:left; 
}
#productstatus div{
	padding:3px;
 }
.id_display
{
	font-family:Verdana, Arial, Helvetica, sans-serif;
	font-size:11px;
	font-weight:bold;
}
</style>
  <div id="productstatus">
	<div id="WrapperPosPurchaseSuppliername" class="microcontroll">
		<?php echo $this->Form->label('PosPurchase.suppliername', __('Sales Prices:'.'<span class="star"></span>  ', true) ); ?> <span class="id_display" id="SalesPriceView"> <?php echo $productstatus['PosStock']['salesprice'];?></span>
	</div> 
	<div id="WrapperPosPurchaseAddress" class="microcontroll">
		<?php echo $this->Form->label('PosPurchase.address', __('Stock Status:'.'<span class="star"></span>  ', true) ); 
		
		echo $this->Form->input('PosPurchase.stock',array('type'=>'hidden','value'=>$productstatus['PosStock']['in_stock'],'div'=>false,'label'=>false,'class'=>''));
		
		?> <span class="id_display"> <?php echo $productstatus['PosStock']['in_stock'];?></span>
	</div> 
	<?php if(!isset($check)){?>
	<div id="WrapperPosPurchasemobile" class="microcontroll">
		<?php echo $this->Form->label('PosPurchase.mobile', __('Purchase Price:'.'<span class="star"></span>  ', true) ); ?> <span class="id_display"> <?php echo $productstatus['PosStock']['purchaseprice'];?></span>
	</div> <?php }?>
	<div id="WrapperPosPurchasedue" class="microcontroll">
		<?php //echo $this->Form->label('PosPurchase.due', __('Supplier Due:'.'<span class="star"></span>  ', true) ); ?> <span class="id_display"> <?php //echo "anwar";?></span>
	</div> 
     </div>