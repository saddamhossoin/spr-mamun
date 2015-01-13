<?php echo $this->Html->css(array('common/common','common/rounded','themes/black_rose/ui' ,'module/'.Inflector::camelize($this->params['controller']).'/'.Inflector::singularize($this->params['action'])));  
 echo $this->Html->css(array('common/grid'));
 echo $this->Html->script(array('common/form','common/jquery.validate','module/'.Inflector::camelize($this->params['controller']).'/'.Inflector::singularize($this->params['action'])));
   echo $this->Html->script(array('alert/alert')); 
 echo $this->Html->css(array('alert/css/alert','alert/themes/default/theme'));  
 ?>
 <?php //pr($order_info);?>
<div id="columns"> 
 <div id="PatientDetailsbox" class="widget color-blue" style="width:98%;" >
     <div class="widget-head" style="cursor: move;">
      <h3>Customer Details</h3>
    </div>
    <div class="widget-content" id="PatientDetailscontent">
    
<table class="invoicetop" cellpadding="0"  border="1" width="100%">
 	<tr>
		<td class="left_part heading">Customer Order No :<?php echo $order_info['Order']['id'];?></td>
        <td class="center_part heading">Mobile : <span><?php echo $order_info['Order']['phone'];?></span></td>
	</tr>
	<tr>
		<td class="left_part heading">Customer Name : <span>
		<?php echo $order_info['Order']['first_name'].'&nbsp;'.$order_info['Order']['last_name'];?></span></td>
  	<td class="right_part heading">Order Date : <span>
		<?php echo   date("j-n-Y H:i",strtotime($order_info['Order']['created']));?></span></td>
	</tr>
    <tr><td colspan="4">&nbsp; </td></tr>
    <tr class="testlist_report">
    
    <td> <span class="accounts_infos">QUANTITY :</span>
        <?php 
		  $total_quantity=0;
		 foreach($order_info['OrderItem'] as $totalquantity){
            $total_quantity=$total_quantity + $totalquantity['quantity'];
			}?>
		<?php echo $total_quantity;?>     
     </td>
     </tr>
     <tr class="testlist_report">
	<td> <span class="accounts_infos">SUBTOTAL :</span>
		<?php echo $order_info['Order']['subtotal'];?>     
     </td>
     </tr>
	  <tr class="testlist_report">
    <td><span class="accounts_infos">TAX (<?php echo $tax; ?>%) :</span>
        <?php echo $order_info['Order']['tax'];?>
        </td>
	</tr>
	 <tr class="testlist_report">
	 	<td><span class="accounts_infos">TOTAL :</span>
        <?php echo $order_info['Order']['total'];?> </td>
	</tr>
	 
</table>
</div>
<br />
 </div>
 
 
 
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
            <th align="left"><div style=" width: 33px;"> ID </div></th>
			<th align="left"><div style=" width: 118px;">Product Name</div></th>
			<th align="left"><div style=" width: 65px;">Order Quantity</div></th>
             <th align="left"><div style=" width: 80px;">Price</div></th>
			<th align="left"><div style=" width: 100px;">SubTotal</div></th>
            <th align="left"><div style=" width: 100px;">action</div></th>
           </tr>
        </thead>
      </table>
    </div>
  </div>
    <table cellspacing="0" cellpadding="0" border="0" style="" class="flexme3" >
      <tbody>
	  <?php
	   $i = 0; 
			foreach($order_info['OrderItem'] as $order_infodeatil){
				//pr($order_infodeatil);
  		 		$class = null;
				if ($i++ % 2 == 0) {
					$class = ' class="altrow"';
				}
		?>
          <tr id="<?php echo 'row_'.$order_infodeatil['id'];  ?>" <?php echo $class;?> >
        <td align="right">
             <div style="text-align: left; width: 33px;">
                <?php echo $order_infodeatil['id']; ?>
            </div>
        </td>
        <td align="right">
            <div style="text-align: left; width: 120px;">
          	  <?php echo $this->Form->input("ProductId_.".$order_infodeatil['id'], array('type' => 'text','div'=>false, 'value' => $order_infodeatil['pos_product_id'], 'hidden' => true, 'label' => false)); ?>
           	 <span id="posProductName_<?php echo $order_infodeatil['id'];?>"><?php echo $order_infodeatil['name']; ?></span>
            </div>
        </td>
        <td align="left">
        	<div style="text-align: left; width: 67px;">
                <?php echo $this->Form->input("OrdereQuantity_.".$order_infodeatil['id'], array('class'=>'required','type'=> 'text','div'=>false, 'value' => $order_infodeatil['quantity'], 'label' =>false)); ?>
         	</div>
        </td>
        <td align="left">
            <div style="text-align: left; width: 83px;">
            <?php 
            echo $this->Form->input("OrderItemPrice_.".$order_infodeatil['id'], array('type' => 'text', 'value' =>$order_infodeatil['price'], 'hidden' => true,'div'=>false,'label' => false)); ?>
             <?php echo $order_infodeatil['price'];?>
            </div>
        </td>
        <td align="left">
            <div style="text-align: left; width: 83px;">
            <?php 
            echo $this->Form->input("OrderItemSubtotal_.".$order_infodeatil['id'], array('type' => 'text', 'value' =>$order_infodeatil['subtotal'], 'hidden' => true,'div'=>false,'label' => false)); ?>
             <?php echo $order_infodeatil['subtotal'];?>
            </div>
        </td>
        
        <td align="left">
            <div style="text-align: left; width: 10px;">
            <?php 
            echo $this->Form->input("OrderItemOrderId_.".$order_infodeatil['id'], array('type' => 'text', 'value' =>$order_infodeatil['order_id'], 'hidden' => true,'div'=>false,'label' => false)); ?>
            
            </div>
        </td>
        <td align="left">
            <div style="text-align: left; width: 10px;">
            <?php 
            echo $this->Form->input("OrderItemBrandId_.".$order_infodeatil['id'], array('type' => 'text', 'value' =>$order_infodeatil['PosProduct']['pos_brand_id'], 'hidden' => true,'div'=>false,'label' => false)); ?>
            
            </div>
        </td>
         <td align="left">
            <div style="text-align: left; width:10px;">
            <?php 
            echo $this->Form->input("OrderItemCategoryId_.".$order_infodeatil['id'], array('type' => 'text', 'value' =>$order_infodeatil['PosProduct']['pos_pcategory_id'], 'hidden' => true,'div'=>false,'label' => false)); ?>
            
            </div>
        </td>
                  <td align="right">
                     <?php echo $this->Form->button('Order',array( 'class'=>'submit btnOrder','id'=>$order_infodeatil['id']));?>
                 </td>
			  </tr>
		 <?php }?>
         </tbody>
    </table>
  </div>
</div>
<br />


</div>
 
</div>

 <?php echo $this->Form->create('OrderItem',array('controller'=>'OrderItems','action'=>'complete_order'));?>
 <div class="widget-content">
      <div class="PatientDetails"> 
        <div id="" class="microcontroll">
          <div class="bDiv" style="height: auto;">
            <div class="hDiv">
              <div class="hDivBox">
                
                <table class="pdetail" width="100%">
                    <thead>
                        <th width="50px;" style="font-weight:bold"><?php echo "Sl no:"; ?></th>
                        <th width="202px" style="font-weight:bold"><?php echo "Product Name"; ?></th>
                        <th width="120px" style="font-weight:bold"><?php echo "Order Quantity"; ?></th>
                        <th width="120px" style="font-weight:bold"><?php echo "Prices"; ?></th>
                        <th width="100px" style="font-weight:bold"><?php echo "Total Price"; ?></th>
                        <th width="48px" style="font-weight:bold"><?php echo "Action"; ?></th>
                    </thead>
                    
                    <tbody class="Orderlist">
                    
                    </tbody>
                </table>
                  
              </div>
            </div>
          </div>
          <div class="clr"></div>
            </div>
      </div>
    </div>
  
 
  <div id="PatientDetailsbox" class="widget color-blue" style="width:28%;" >
     <div class="widget-head" style="cursor: move;">
      <h3>Item Details</h3>
    </div>
    <div class="widget-content" id="PatientDetailscontent">
    
     <div id="WrapperPosCustomer" class="microcontroll">
      <?php echo $this->Form->input('Order.pos_customer_id', array('type' => 'text', 'value' =>$order_infodeatil['created_by'], 'hidden' => true,'div'=>false,'label' => false));?>
      <?php echo $this->Form->input('Order.id', array('type' => 'text', 'value' =>$order_infodeatil['order_id'], 'hidden' => true,'div'=>false,'label' => false));?>

     </div>
     
     <div id="WrapperPosTotalAmount" class="microcontroll">
    <?php echo $this->Form->label('Order.totalamount', __('Total Amount'.': <span class="star">*</span>', true) ); ?> 
    <?php echo $this->Form->input('Order.totalamount',array('type'=>'text','div'=>false,'label'=>false, 'size'=>26, 'class'=>'required ' ));?> 
     </div>
     
        <div id="WrapperServiceInvoiceVat" class="microcontroll">
			 <span  id="tax_hidden"><?php  echo $tax;?> </span> 
		 <?php echo $this->Form->label('Order.Tax', __('IVA'.': <span class="star">*</span>', true) ); ?>
	     <?php echo $this->Form->input('Order.tax',array('readonly'=>'readonly','div'=>false,'label'=>false,'class'=>'number '));?>
	   <?php echo $this->Form->label('Order.is_tax_lavel', __('Euro', true) ); ?>
	     <?php  
		$is_tax =array('1'=>'Yes','0'=>'No');
		 echo $this->Form->select('Order.is_tax', $is_tax , array('escape' => false,'empty'=>'-Tax-', 'class'=>'required select2as'))?>
		 
		</div>
     
     <div id="WrapperPosDiscount" class="microcontroll">
    <?php echo $this->Form->label('Order.discount', __('Discount'.': <span class="star">*</span>', true) ); ?> 
    <?php echo $this->Form->input('Order.discount',array('type'=>'text','div'=>false,'label'=>false, 'size'=>26, 'class'=>'required ' ));?> 
     </div>
     
     <div id="WrapperPospayableamount" class="microcontroll">
    <?php echo $this->Form->label('Order.payable_amount', __('Payable Amount'.': <span class="star">*</span>', true) ); ?> 
    <?php echo $this->Form->input('Order.payable_amount',array('type'=>'text','div'=>false,'label'=>false, 'size'=>26, 'class'=>'required ' ));?> 
     </div>
     
     <div id="WrapperPospayamount" class="microcontroll">
    <?php echo $this->Form->label('Order.payamount', __('Pay Amount'.': <span class="star">*</span>', true) ); ?> 
    <?php echo $this->Form->input('Order.payamount',array('type'=>'text','div'=>false,'label'=>false, 'size'=>26, 'class'=>'required ' ));?> 
    <?php  echo $this->Form->select('Order.accountHead', $accountsHead , array('escape' => false,'empty'=>'-  Select Head -', 'class'=>'required select2as'))?>
    
           <div id="WrapperOrdersCheckNumber">
						
		   </div>
    
    
     </div>
     
     <div id="WrapperPosnote" class="microcontroll">
    <?php echo $this->Form->label('Order.note', __('Note'.': <span class="star"></span>', true) ); ?> 
    <?php echo $this->Form->input('Order.note',array('type'=>'textarea','div'=>false,'label'=>false, 'size'=>26, 'class'=>' ' ));?> 
    </div>
    
     </div>
     </div>       
     <div class="clr"></div>
    <div class="button_area">
		<?php echo $this->Form->button('Save',array( 'class'=>'submit', 'id'=>'btn_save_orderitem','type'=>'submit'));?>
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
.microcontroll label{
	width:130px;
	float:left !important;
	font-weight: none !important; 
	}
#OrderNote{
	width:180px !important;
	}

</style>

