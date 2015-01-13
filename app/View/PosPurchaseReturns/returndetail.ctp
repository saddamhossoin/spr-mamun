<?php echo $this->Html->css(array('common/common','common/rounded','ui/ui.datepicker','ui/ui.base','themes/black_rose/ui' ,'module/'.Inflector::singularize($this->params['controller']).'/'.Inflector::singularize($this->params['action'])   )); ?>
<?php echo $this->Html->css(array('common/grid'));
echo $this->Html->script(array('common/form','common/jquery.validate'));
 ?>
 
       <?php echo $this->Form->create('PosPurchaseReturn',array('controller'=>'pos_purchase_returns','action'=>'returndetail'));?>

  <div class="flexigrid" style="width: 100%;" id="viewlist">
   <div class="bDiv" style="height: auto; width:601px; ">
  <div class="hDiv"> 
    <div class="hDivBox">
      <table cellpadding="0" cellspacing="0">
        <thead>
           <tr>
            <th align="left" ><div style=" width: 40px;"> ID </div></th>
			<th align="left" ><div style=" width: 150px;">Product Name</div></th>
			<th align="left" ><div style=" width: 100px;">Purchase Quantity</div></th>
			<th align="left" ><div style=" width: 100px;">Already Return</div></th>
			<th align="left" ><div style=" width: 150px;">Stock Available</div></th>
           </tr>
        </thead>
      </table>
    </div>
  </div>
    <table cellspacing="0" cellpadding="0" border="0" style="" class="flexme3">
      <tbody>
	  <?php
	   $i = 0; 
			foreach($purchasedetails as $key=>$purchasedetail){
			//pr($key);
		 		$class = null;
				if ($i++ % 2 == 0) {
					$class = ' class="altrow"';
				}
		?>
		<?php //pr($purchasedetail);?>
         <tr id="<?php echo 'row_'.$purchasedetail['PosPurchase']['id'];  ?>" <?php echo $class;?> >
    		<td align="right"><div style="text-align: left; width: 40px;">
		 	 <?php echo $purchasedetail['PosPurchase']['id']; ?></div>
	  	<?php echo $this->Form->input("PosPurchaseReturn.".$key.".pos_purchase_id", array('type' => 'text', 'value' => $purchasedetail['PosPurchaseDetail']['pos_purchase_id'], 'hidden' => true, 'label' => false)); ?>
			 </td>
<?php //pr($purchasedetail);?>
                <?php echo $this->Form->input("PosPurchaseReturn.".$key.".pos_purchase_detail_id", array('type' => 'text', 'value' => $purchasedetail['PosPurchaseDetail']['id'], 'hidden' => true, 'label' => false)); ?>
                  <?php echo $this->Form->input("PosPurchaseReturn.".$key.".pos_supplier_id", array('type' => 'text', 'value' => $purchasedetail['PosPurchase']['pos_supplier_id'], 'hidden' => true, 'label' => false)); ?>
                
				<?php //pr($productdetail);?>
				<td align="right"><div style="text-align: left; width: 151px;">
				<?php echo $this->Form->input("PosPurchaseReturn.".$key.".pos_product_id", array('type' => 'text', 'value' => $purchasedetail['PosPurchaseDetail']['pos_product_id'], 'hidden' => true, 'label' => false)); ?>
				
				<?php echo $purchasedetail['PosProduct']['name']; ?> </div></td>
			
				<td align="left"><div style="text-align: left; width: 100px;"> <?php echo $purchasedetail['PosPurchaseDetail']['quantity'];?></div></td>
				  <?php 
				   $Totalreturn=0;
				   foreach($purchasedetail['PosPurchaseReturn'] as $purchasedetai){
				   $Totalreturn = $Totalreturn +  $purchasedetai['quantity'];?>
				   <?php }?>
				 
				 <td align="left"><div style="text-align: left; width: 100px;"> <?php echo $Totalreturn;?></div></td>
               
			 	<td align="right"><div style="text-align: left; width: 150px;"><?php echo $this->Form->input("PosPurchaseReturn.".$key.".quantity",array( 'value' => $purchasedetail['PosProduct']['in_stock'],'div'=>false,'label'=>false,));?>
  </div></td>
   </tr>
		 <?php }?>
       
       </tbody>
    </table>
  </div>
</div>
<div class="button_area">
		<?php echo $this->Form->button('Save',array( 'class'=>'submit', 'id'=>'btn_PosPurchaseReturn_add'));?>
		<?php echo $this->Form->button('Cancel',array('type'=>'reset','name'=>'reset','id'=>'Cancel'));?>
		<?php echo $this->Form->end();?>
</div>