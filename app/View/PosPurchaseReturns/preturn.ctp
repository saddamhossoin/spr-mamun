<?php //pr($infodetail);?>
<?php echo $this->Html->script(array('common/form','common/jquery.validate'));?>
<table width="100%" border="1" class="info_tables_rd">
  <tr>
    <td width="26%" class="info_tables_td_bold">ID</td>
    <td width="2%">:</td>
    <td width="20%"><?php echo $info['PosPurchaseDetail']['id'];?></td>
  
    <td width="10%" class="info_tables_td_bold">Name</td>
    <td width="2%">:</td>
    <td width="40%"><?php echo $info['PosPurchase']['PosSupplier']['name']."   ";?></td>
  </tr>
  <tr>
    <td class="info_tables_td_bold">Product Name</td>
    <td>:</td>
    <td><?php echo $info['PosProduct']['name']."   ";?></td>
	 <td class="info_tables_td_bold">Quantity</td>
    <td>:</td>
    <td><?php echo $info['PosPurchaseDetail']['quantity'];?></td>
  </tr>
</table>
<?php echo $this->Form->create('PosPurchaseReturn',array('controller'=>'pos_purchase_returns','action'=>''));?>
<div class="posquantiy">
   <?php echo $this->Form->input('PosPurchaseReturn.pos_purchase_detail_id', array('type' => 'text', 'value' => $id, 'hidden' => true, 'label' => false)); ?>
   <?php echo $this->Form->input('PosPurchaseReturn.pos_purchase_id', array('type' => 'text', 'value' => $info['PosPurchase']['id'], 'hidden' => true, 'label' => false)); ?>
   <?php echo $this->Form->input('PosPurchaseReturn.pos_supplier_id', array('type' => 'text', 'value' => $info['PosPurchase']['PosSupplier']['id'], 'hidden' => true, 'label' => false)); ?>
   <?php echo $this->Form->input('PosPurchaseReturn.pos_product_id', array('type' => 'text', 'value' =>$info['PosPurchaseDetail']['pos_product_id'], 'hidden' => true, 'label' => false)); ?>
    <?php echo $this->Form->input('PosSaleReturn.returnquantity', array('type' => 'text', 'value' =>$info['PosPurchaseDetail']['quantity'], 'hidden' => true, 'label' => false)); ?>

   
	  	<div id="WrapperPosSaleReturnQuantity" class="microcontroll">
		<?php	echo $this->Form->label('PosPurchaseReturn.quantity', __('Quantity'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('PosPurchaseReturn.quantity',array('div'=>false,'label'=>false,'class'=>''));?>
		</div> 
<div class="button_area">
		<?php echo $this->Form->button('Save',array( 'class'=>'submit', 'id'=>'btn_Posreturns'));?>
		<?php echo $this->Form->button('Cancel',array('type'=>'reset','name'=>'reset','id'=>'Cancel'));?>
        </div>
		<?php echo $this->Form->end();?>
</div>