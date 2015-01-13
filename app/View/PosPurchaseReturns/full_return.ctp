<?php echo $this->Html->css(array('common/common','common/rounded','themes/black_rose/ui' ,'module/'.Inflector::camelize($this->params['controller']).'/'.Inflector::singularize($this->params['action'])));  
 echo $this->Html->css(array('common/grid'));
 echo $this->Html->script(array('common/form','common/jquery.validate','module/'.Inflector::camelize($this->params['controller']).'/'.Inflector::singularize($this->params['action'])));
   echo $this->Html->script(array('alert/alert')); 
 echo $this->Html->css(array('alert/css/alert','alert/themes/default/theme'));  
 ?>
<div id="columns"> 
 <div id="PatientDetailsbox" class="widget color-blue" style="width:98%;" >
     <div class="widget-head" style="cursor: move;">
      <h3>Supplier Details</h3>
    </div>
    <div class="widget-content" id="PatientDetailscontent">
    
<table class="invoicetop" cellpadding="0"  border="1" width="100%">
 	<tr>
		<td class="left_part heading">Purchase Bill No :<?php echo $purchaseInfo['PosPurchase']['id'];?></td>
        <td class="center_part heading">Mobile : <span><?php echo $purchaseInfo['PosSupplier']['mobile'];?></span></td>
	</tr>
	<tr>
		<td class="left_part heading">Supplier Name : <span>
		<?php echo $purchaseInfo['PosSupplier']['name'];?></span></td>
  	<td class="right_part heading">Invoice Date : <span>
		<?php echo   date("j-n-Y H:i",strtotime($purchaseInfo['PosPurchase']['created']));?></span></td>
	</tr>
    <tr><td colspan="4">&nbsp; </td></tr>
    <tr class="testlist_report">
	<td> <span class="accounts_infos">SUBTOTAL :</span>
		<?php
    		$amount=$purchaseInfo['PosPurchase']['totalprice'];
	    	echo $amount;
	   ?>     
     </td>
	 
    <td><span class="accounts_infos">IVA (<?php echo $tax; ?>%) :</span>
        <?php $peramount= $purchaseInfo['PosPurchase']['tax'];
			  echo $peramount;
		  ?>
	    </td>
	</tr>
	
 <tr class="testlist_report">
	 	<td><span class="accounts_infos">TOTAL :</span>
        <?php $taxamount=$peramount+$amount;
			echo $taxamount;
		?> </td>
	 
	 	<td><span class="accounts_infos">DISCOUNT :</span>
        <?php $payable_amount=$taxamount-$purchaseInfo['PosPurchase']['discount'];
			echo  $purchaseInfo['PosPurchase']['discount'];
		?> </td>
	</tr>
	 <tr class="testlist_report">
	 	<td><span class="accounts_infos">PAID</span>
	        <?php echo $purchaseInfo['PosPurchase']['payamount'];?>
        </td>
	 
	 	<td><span class="accounts_infos">DUE :</span>
        <?php echo $due= $purchaseInfo['PosPurchase']['payable_amount'] - $purchaseInfo['PosPurchase']['payamount'];?>
        </td>
	</tr>
</table>
<?php echo $this->Form->input('PosPurchaseReturn.hidden_tax_amount',array('type'=>'hidden','div'=>false,'label'=>false,'value'=> $tax));?> 
<?php echo $this->Form->input('PosPurchaseReturn.hidden_tax',array('type'=>'hidden','div'=>false,'label'=>false,'value'=> $peramount));?> 
<?php echo $this->Form->input('PosPurchaseReturn.hidden_subtotal',array('type'=>'hidden','div'=>false,'label'=>false,'value'=> $amount));?>
<?php echo $this->Form->input('PosPurchaseReturn.hidden_discount',array('type'=>'hidden','div'=>false,'label'=>false,'value'=> $purchaseInfo['PosPurchase']['discount']));?> 
</div>
<br />
 </div>
 
  <?php echo $this->Form->create('PosPurchaseReturn',array('controller'=>'PosPurchaseReturns','action'=>'full_return'));?>

  <div id="PatientDetailsbox" class="widget color-blue" style="width:68%;" >
     <div class="widget-head" style="cursor: move;">
      <h3>Item Details</h3>
    </div>
    <div class="widget-content" id="PatientDetailscontent">
   <div class="flexigrid" style="width: 100%;" id="viewlist">
   <div class="bDiv" style="height: auto; width="100%" ">
  <div class="hDiv"> 
    <div class="hDivBox">
      <table cellpadding="0" cellspacing="0" width="100%">
        <thead>
           <tr>
            <th align="left"  width="5%"> ID </div></th>
			<th align="left" width="45%">Product Name</div></th>
			<th align="left" width="9%">P. Quantity</div></th>
		 	<th align="left" width="8%">F.Quantity</div></th>
             <th align="left" width="8%">P.Price</div></th>
			<th align="left" width="15%">Return</div></th>
            <th align="left" width="10%">action</div></th>
           </tr>
        </thead>
      </table>
    </div>
  </div>
    <table cellspacing="0" cellpadding="0" border="0" style="" class="flexme3" >
      <tbody>
	  <?php
	   $i = 0; 
			foreach($purchaseInfo['PosPurchaseDetail'] as $key=>$purchasedetail){
  		 		$class = null;
				if ($i++ % 2 == 0) {
					$class = ' class="altrow"';
				}
		?>
          <tr id="<?php echo 'row_'.$purchasedetail['id'];  ?>" <?php echo $class;?> >
        <td align="right" width="5%">
                <?php echo $purchasedetail['id']; ?>
         </td>
        <td align="right" width="45%">
          	  <?php echo $this->Form->input("PosPurchaseReturnDetailPosProduct_.".$purchasedetail['id'], array('type' => 'text','div'=>false, 'value' => $purchasedetail['pos_product_id'], 'hidden' => true, 'label' => false)); ?>
           	 <span id="posProductName_<?php echo $purchasedetail['id'];?>"><?php echo $purchasedetail['PosProduct']['name']; ?></span>
         </td>
        <td align="left" width="9%">
            	<?php echo $purchasedetail ['quantity'];?>
                <?php echo $this->Form->input("PPRDPurchaseQuantity_.".$purchasedetail['id'], array('type' => 'text','div'=>false, 'value' => $purchasedetail['quantity'], 'hidden' => true, 'label' => false)); ?>
         </td>
         <td align="left" width="8%">
                <?php echo $this->Form->input("PPRDFreeQuantity_.".$purchasedetail['id'], array('type' => 'text', 'value' =>$purchasedetail['free_quantity'],'hidden' => true,'div'=>false,'label' => false)); ?>
                             
                <?php echo $purchasedetail ['free_quantity'];?>
          
        
            <?php  echo $this->Form->input("PPRDAlredyReturnQuantity_.".$purchasedetail['id'], array('type' => 'text', 'value' =>$purchasedetail['id'], 'hidden' => true,'div'=>false,'label' => false)); ?>
         <?php //echo $Totalreturn;?>
            
        </td>
        <td align="left" width="8%">
            <?php 
            echo $this->Form->input("PPRDPrice_.".$purchasedetail['id'], array('type' => 'text', 'value' =>$purchasedetail['price'], 'hidden' => true,'div'=>false,'label' => false)); ?>
             <?php echo $purchasedetail['price'];?>
         </td>
		  
        <td align="right" width="15%">
            <?php
 			 echo $this->Form->input("PPRDetailQuantity_.".$purchasedetail['id'],array('class'=>"purchase_return_class",'value' =>'','div'=>false,'label'=>false, 'title'=>'In Stock '.$purchasedetail['free_quantity']));?>
      </td>
     <td align="right" width="10%">
                  <?php 
					  $type_id = 0;
					 if($purchasedetail['PosProduct']['pos_type_id'] == 1)
					 {
							 $type_id=1;
					 }
         		 ?>
                     <?php echo $this->Form->button('Return',array( 'class'=>'submit btnReturnPurchase', 'id'=>'btnReturnPurchase_'.$purchasedetail ['id'],'title'=>$type_id));?>
                 </td>
			  </tr>
		 <?php }?>
         </tbody>
    </table>
  </div>
</div>
<br />
 <div class="widget-content">
      <div class="PatientDetails"> 
        <div id="" class="microcontroll">
          <div class="bDiv" style="height: auto;">
            <div class="hDiv">
              <div class="hDivBox">
                
                <table class="pdetail" width="100%">
                    <thead>
                        <th width="5%" style="font-weight:bold"><?php echo "Sl"; ?></th>
                        <th width="50%" style="font-weight:bold"><?php echo "Product Name"; ?></th>
                        <th width="12%" style="font-weight:bold"><?php echo "Return Quantity"; ?></th>
                        <th width="12%" style="font-weight:bold"><?php echo "P.Prices"; ?></th>
                        <th width="11%" style="font-weight:bold"><?php echo "Total Price"; ?></th>
                        <th width="10%" style="font-weight:bold"><?php echo "Action"; ?></th>
                    </thead>
                    
                    <tbody class="productlist">
                    
                    </tbody>
                </table>
                  
              </div>
            </div>
          </div>
          <div class="clr"></div>
            </div>
      </div>
    </div>

</div>
 
</div>
  
 
  <div id="PatientDetailsbox" class="widget color-blue" style="width:28%;" >
     <div class="widget-head" style="cursor: move;">
      <h3>Item Details</h3>
    </div>
    <div class="widget-content" id="FullReturnAccountContent">
	
	<div id="WrapperPosProductQuantity" class="microcontroll">
	    <?php echo $this->Form->label('PosPurchaseReturn.product_amount', __('Product Amount'.': <span class="star">*</span>', true) ); ?> 
  		<?php echo $this->Form->input('PosPurchaseReturn.product_amount',array('type'=>'text','readonly'=>true,'div'=>false,'label'=>false, 'size'=>26, 'class'=>'required ' ));?> 
     </div>
	 
	
	 <div id="WrapperPosProductQuantity" class="microcontroll">
	    <?php echo $this->Form->label('PosPurchaseReturn.tax', __('IVA'.': <span class="star">*</span>', true) ); ?> 
  		<?php echo $this->Form->input('PosPurchaseReturn.tax',array('type'=>'text','readonly'=>true,'div'=>false,'label'=>false, 'size'=>26, 'class'=>'required ' ));?> 
     </div>
	 
	 <div id="WrapperPosProductQuantity" class="microcontroll">
	    <?php echo $this->Form->label('PosPurchaseReturn.discount', __('Discount'.': <span class="star">*</span>', true) ); ?> 
  		<?php echo $this->Form->input('PosPurchaseReturn.discount',array('type'=>'text','readonly'=>true,'div'=>false,'label'=>false, 'size'=>26, 'class'=>'required ' ));?> 
     </div>
            
    
     <div id="WrapperPosProductQuantity" class="microcontroll">
      <?php echo $this->Form->input('PosPurchaseReturn.pos_purchase_id',array('type'=>'hidden','div'=>false,'label'=>false,'value'=> $purchaseInfo['PosPurchase']['id']));?>
      <?php echo $this->Form->input('PosPurchaseReturn.pos_supplier_id',array('type'=>'hidden','div'=>false,'label'=>false,'value'=> $purchaseInfo['PosSupplier']['id']));?> 
 	  <?php echo $this->Form->label('PosPurchaseReturn.total_price', __('Return Total'.': <span class="star">*</span>', true) ); ?>
      <?php echo $this->Form->input('PosPurchaseReturn.total_price',array('type'=>'text','div'=>false,'label'=>false, 'size'=>26, 'class'=>'' ));?>  
	  </div>
	  
	 
      
     
     <div id="WrapperPosProductQuantity" class="microcontroll">
    <?php //echo $this->Form->label('PosPurchaseReturn.return_amount', __('Return Amount'.': <span class="star">*</span>', true) ); ?> 
    <?php //echo $this->Form->input('PosPurchaseReturn.return_amount',array('type'=>'text','div'=>false,'label'=>false, 'size'=>26, 'class'=>'required ' ));?> 
     </div>
     
     <div id="WrapperPosProductQuantity" class="microcontroll">
    <?php echo $this->Form->label('PosPurchaseReturn.note', __('Note'.': <span class="star"></span>', true) ); ?> 
    <?php echo $this->Form->input('PosPurchaseReturn.note',array('type'=>'textarea','div'=>false,'label'=>false, 'size'=>26, 'class'=>' ' ));?> 
    </div>
    
     </div>
     </div>       
     <div class="clr"></div>
    <div class="button_area">
		<?php echo $this->Form->button('Save',array( 'class'=>'submit', 'id'=>'btn_possalesfullReturn','type'=>'submit'));?>
		<?php echo $this->Form->button('Cancel',array('type'=>'reset','name'=>'reset','id'=>'Cancel'));?>
		
</div>
<?php echo $this->Form->end();?>
<style type="text/css">
.purchase_return_class{
	width:90px !important;
	
}
.input text{
	display:none;
}
.accounts_infos{
	float:left;
	display:inline-block;
	width:150px;
	font-size:11px;
}
</style>
 