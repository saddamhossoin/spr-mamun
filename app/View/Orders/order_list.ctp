<?php //pr($order_lists);?>

<?php echo $this->Html->script(array('alert/alert')); ?>
<?php echo $this->Html->css(array('alert/css/alert','alert/themes/default/theme','module/Orders/orderittem_list')); ?>

<html>
    <script type="text/javascript" >
	$(function() {
        $( "#PosSalePurchaseDate").datepicker({
            changeMonth: true,
            changeYear: true,
			dateFormat:"yy-mm-dd",
			
        });
		
		 $( "#PosSaleManualInvoiceDate").datepicker({
            changeMonth: true,
            changeYear: true,
			dateFormat:"yy-mm-dd",
         });
		 
    });
</script>

 
<div id="columns">
  <div id="PatientDetailsbox" class="widget color-blue" style="width:1100px;">
    <div class="widget-head" style="cursor: move;">
      <h3>Customer Information</h3>
    </div>
    <div class="widget-content" id="PatientDetailscontent">
      <div class="posSales "> <?php echo $this->Form->create('PosSale');?>
        <fieldset>
         <div id="supllier" class="microcontroll">
		 
          <div class="rdcontent_left">
     <div id="WrapperUserEmail" class="microcontroll">
     	<?php echo $this->Form->input('PosSale.pos_customer_id',array('type'=>'hidden','div'=>false  ));?>
     	<?php //echo $this->Form->input('Group.group_id',array('type'=>'hidden','value'=>3,'div'=>false,'label'=>false,'class'=>'required'));?>
		<?php echo $this->Form->label('PosSale.email_address', __('Email'.': <span class="star">*</span>', true) ); ?>
		<?php echo $this->Form->input('PosSale.email_address',array('type'=>'text','div'=>false,'label'=>false, 'size'=>35, 'class'=>'email '  ));?>
		
   </div>
 
     <div id="WrapperUserfirstname" class="microcontroll">
        <?php echo $this->Form->label('PosSale.name', __('Name'.': <span class="star">*</span>', true) ); ?>
        <?php echo $this->Form->input('PosSale.name',array('type'=>'text','div'=>false,'label'=>false, 'size'=>35, 'class'=>'required'  ));?>
    </div>
 <div id="WrapperUserEmail" class="microcontroll">
		<?php echo $this->Form->label('PosSale.phone', __('Phone'.': <span class="star"></span>', true) ); ?>
		<?php echo $this->Form->input('PosSale.phone',array('type'=>'text','div'=>false,'label'=>false, 'size'=>35, 'class'=>''  ));?>
   </div>
   <div id="WrapperPosSalePurchaseDate" class="microcontroll"> 
   		<?php echo $this->Form->label('PosSale.purchase_date', __('Sales Date'.': <span class="star">*</span>', true) ); ?>
		<?php echo $this->Form->input('PosSale.purchase_date',array('value'=>date("Y-m-d h:m:s"),'type'=>'text','div'=>false,'label'=>false, 'size'=>26, 'class'=>'required ' ));?> </div>
    
  </div>
 		 <div class="rdcontent_right">
    <div id="WrapperUserEmail" class="microcontroll">
		<?php echo $this->Form->label('PosSale.piva', __('P.Iva'.': <span class="star"></span>', true) ); ?>
		<?php echo $this->Form->input('PosSale.piva',array('type'=>'text','div'=>false,'label'=>false, 'size'=>35, 'class'=>''  ));?>
   </div>
   
     <div id="WrapperUserfirstname" class="microcontroll">
        <?php echo $this->Form->label('PosSale.address', __('Address'.': <span class="star"></span>', true) ); ?>
        <?php echo $this->Form->input('PosSale.address',array('type'=>'textarea','div'=>false,'label'=>false, 'cols'=>28, 'class'=>'' ,'rows'=>2 ));?>
    </div>
	
  </div>
		   
        </div>
        </fieldset>
        <?php echo $this->Form->end();?>
      </div>
    </div>
  </div>
  
  <div style="clear:both"></div>
  <div id="PatientTestbox" class="widget color-blue" style="width:1100px;">
    <div class="widget-head" style="cursor: move;">
      <h3>Product Details</h3>
    </div>
    <div class="widget-content">
      <div class="PatientDetails" style="margin-left:14px;">
      <?php echo $this->Form->create('ProductEntry');?>
        <div id="productdetails" class="microcontroll">
           <fieldset>
        
		  
			<?php /*?><div id="WrapperPosProductPosBrandId" class="microcontroll"> 
          <?php echo $this->Form->label('PosProduct.pos_brand_id', __('Product Brand'.': <span class="star">*</span>', true) ); ?> <?php echo $this->Form->select('PosProduct.pos_brand_id',  $brand  ,array('div'=>false,'label'=>false, 'empty'=>'-Please Select Brand-', 'class'=>'required select2as'));?> </div>
            <div id="WrapperPosProductPosPcategoryId" class="microcontroll"> 
		 <?php echo $this->Form->label('PosProduct.pos_brand_id', __('Product Category'.': <span class="star">*</span>', true) ); ?> <?php echo $this->Form->select('PosProduct.pos_pcategory_id',  $category  ,array('div'=>false,'label'=>false, 'empty'=>'-Please Select Category-', 'class'=>'required select2as'));?> </div><?php */?>
		 
	  <?php 	/*$return_arr = array();
	 	foreach($posProducts as $key=>$posproduct){
				$row_array['label'] = $posproduct;
				$row_array['actor'] = "$key";
				array_push($return_arr,$row_array);
		}*/
	  ?>
	  
	  
	  <script>
 	   var data = '';
	   var data =  <?php echo json_encode($return_arr); ?>;
 	  </script>
	  
	     <div id="product_id" style="display:none"></div>
		  	<div id="WrapperPosProductName" class="microcontroll ui-widget"> 
		 <?php echo $this->Form->label('PosProduct.pname', __('Product Name'.': <span class="star">*</span>', true) ); ?>
         <?php  //echo $this->Form->select('PosProduct.name', $posProducts , array('escape' => false,'empty'=>'-Please Select Product-', 'class'=>'required select2as'))?>
			   <?php echo $this->Form->input('PosProduct.name',array('type'=>'text','div'=>false,'label'=>false, 'size'=>35, 'class'=>'required'  ));?>
			  
            </div>
			
			
            <div id="WrapperPosProductQuantity" class="microcontroll">
         <?php echo $this->Form->label('PosProduct.Quantity', __('Quantity'.': <span class="star">*</span>', true) ); ?> <?php echo $this->Form->input('PosProduct.Quantity',array('type'=>'text','div'=>false,'label'=>false, 'size'=>26, 'class'=>'required ' ));?> 
            </div>
            <div id="WrapperPosProductPurchaseprice" class="microcontroll"> 
 		<?php echo $this->Form->label('PosProduct.purchase_date', __('Sales Price'.': <span class="star">*</span>', true) ); ?> <?php echo $this->Form->input('PosProduct.purchaseprice',array('type'=>'text','div'=>false,'label'=>false, 'size'=>26, 'class'=>'required' ));?>
            </div>
           
          </fieldset>
		   <!--  product Status start   -->
		  <div id="productstatus" class="microcontroll">
      	<table id="productinfo">
        <tr>
        <td id="name">Sales Prices: </td>
        <td> <?php 
			echo "<span id=SalesPriceStatus> </span>";
			echo $this->Form->input('PosSales.salesprice',array('type'=>'hidden','value'=> '','div'=>false,'label'=>false,'class'=>''));
		?></td>
        
        <td id="address">Stock Status:</td>
        <td> <?php 
			echo "<span id=StockStatuss></span>";
			echo $this->Form->input('PosSales.stock',array('type'=>'hidden','value'=>'','div'=>false,'label'=>false,'class'=>''));
		?></td>
       
        <td id="mobile">Purchase Pricese:</td>
        <td> <?php 
			echo "<span id=PurchasePriceStatus> </span>";
			echo $this->Form->input('PosSales.purchaseprice',array('type'=>'hidden','value'=> '','div'=>false,'label'=>false,'class'=>''));
		?></td>
        </tr>
          </table>
       </div>
	     <!--  product Status End   -->
		 
          <div class="button_area" id="button1"> <?php echo $this->Form->button('Add',array( 'class'=>'submit', 'id'=>'btn_PosProduct_add'));?> <?php echo $this->Form->button('Cancel',array('type'=>'reset','name'=>'reset','id'=>'Cancel'));?> </div>
        </div>
        <?php echo $this->Form->end();?>
      </div>
    </div>
  </div>
 
  
  <!--============================= End Here Product Grids ==============-->
  <div style="clear:both"></div>
 <div id="PatientAccount" class="widget color-blue" style="width:1100px;">
    <div class="widget-head" style="cursor: move;">
      <h3>Record Details</h3>
    </div>
    <div class="widget-content">
      <div class="PatientDetails">  
        <div id="" class="microcontroll">
          <div class="bDiv" style="height: auto;">
            <div class="hDiv">
              <div class="hDivBox">
                <?php echo $this->Form->create('PosSaleDetail');?>
                <table class="pdetail">
                  <thead>
                  <th width="50px;" style="font-weight:bold"><?php echo "Sl no:"; ?></th>
                    <th width="250px" style="font-weight:bold"><?php echo "Product Name"; ?></th>
                    <th width="147px" style="font-weight:bold"><?php echo "Quantity"; ?></th>
                    <th width="145px" style="font-weight:bold"><?php echo "Price"; ?></th>
                    <th width="145px" style="font-weight:bold"><?php echo "Sub Total"; ?></th>
                    <th width="60px" style="font-weight:bold"><?php echo "Action"; ?></th>
                    </thead>
                   
                  <tbody class="productlist">
                  
                   
                   <?php 
				   $serialno=1;
				   foreach($order_lists as $order_list){?>
                   <?php //pr($order_list);?>
                    <tr>
                        <td><?php echo $serialno;?></td>
                        <td><?php echo $order_list['OrderItem']['name'];?></td>
                        <td><?php echo $order_list['OrderItem']['quantity'];?></td>
                        <td><?php echo $order_list['OrderItem']['price'];?></td>
                        <td><?php echo $order_list['OrderItem']['subtotal'];?></td>
                        <td><?php echo $this->Form->input('', array('type'=>'checkbox'));?></td>
                    </tr>
                    
                    <?php $serialno++;?>
                     <?php } ?>
                     
                   </tbody>
                
                </table>
                 <?php echo $this->Form->end();?>
              </div>
            </div>
          </div>
          <div class="clr"></div>
          </div>
      </div>
    </div>
  </div>
   
  <!--============================= End Here Patient Test ==============-->
  <div id="PatientTestbox" class="widget color-blue" style="width:1100px;">
    <div class="widget-head" style="cursor: move;">
      <h3>Amount</h3>
    </div>
    <div class="widget-content">
      <div class="PatientDetails form">
        <?php echo $this->Form->create('PosSaleAmount');?>
        <div id="productdetails" class="microcontroll">
          <fieldset>
            <div id="" class="microcontroll">
            <div id="WrapperProductTotalprices" class="microcontroll"> <?php echo $this->Form->label('PosSaleAmount.totalprice', __('Total  Prices :'.'<span class="star"></span>', true) ); ?> <?php echo $this->Form->input('PosSaleAmount.totalprice',array('div'=>false,'label'=>false,   'class'=>'required','readonly'=>'readonly'));?> <span  class="accounts">
              <?php //echo $suppliers['PosSupplier']['mobile'];?>
              </span> </div>
			  
			 <div id="WrapperServiceInvoiceVat" class="microcontroll">
			 <span  id="tax_hidden"><?php  echo $tax;?> </span> 
		<?php	//echo $this->Form->label('PosSaleAmount.tax', __('Vat'.':<span class=star>*</span>', true) );?>
		<?php	//echo $this->Form->input('PosSaleAmount.tax',array('readonly'=>'readonly','div'=>false,'label'=>false,'class'=>'number required'));?> 
		
		 <?php echo $this->Form->label('PosCountersSale.Tax', __('IVA'.': <span class="star">*</span>', true) ); ?>
	  <?php	 echo $this->Form->input('PosSaleAmount.tax',array('readonly'=>'readonly','div'=>false,'label'=>false,'class'=>'number '));?>
	   <?php echo $this->Form->label('PosSaleAmount.is_tax_lavel', __('Euro', true) ); ?>
	   	<?php echo $this->Form->input('PosSaleAmount.is_tax',array('class'=>'tax','div' => false,'label' => false,'type' => 'checkbox','checked'=>true));   
		 ?>
		 
		</div>
		
		<div class="clr"></div>
		<div id="WrapperServiceInvoiceDiscount" class="microcontroll">
		<?php	echo $this->Form->label('PosSaleAmount.discount', __('Discount'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('PosSaleAmount.discount',array('div'=>false,'label'=>false,'class'=>'number'));?>
		</div>
            
			<div id="WrapperServiceInvoicePayableAmount" class="microcontroll">
		<?php	echo $this->Form->label('PosSaleAmount.payable_amount', __('Payable Amount'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('PosSaleAmount.payable_amount',array('readonly'=>'readonly','div'=>false,'label'=>false,'class'=>'number required'));?>
		</div>
            <div id="WrapperPosSalemobile" class="microcontroll">
						<?php echo $this->Form->label('PosSaleAmount.payamount', __('Pay Amount :'.'<span class="star">*</span>  ', true) ); ?> 

						<?php echo $this->Form->input('PosSaleAmount.payamount',array('div'=>false,'label'=>false, 'class'=>'number required'));?> 			
						<?php  echo $this->Form->select('PosSaleAmount.accountHead', $AccountsHeadlists , array('escape' => false,'empty'=>'-  Select Head -', 'class'=>'required select2as'))?>
						
						<div id="WrapperAccountsCheckNumber">
						
						</div>
						 
						</div>
          </div>
          </fieldset>
        </div>
        <?php echo $this->Form->end();?>
      </div>
    </div>
  </div>
</div>
<div class="clr"></div>
<div class="button_area" >
  <?php  echo $this->Form->button('Save',array( 'class'=>'submit', 'id'=>'btn_PosSale_add'));?>
  <?php  echo $this->Form->button('Cancel',array('type'=>'reset','name'=>'reset','id'=>'Cancel'));?>
</div>
  </html>

<style type="text/css">
.microcontroll label { 
    font-weight: none !important;
}
</style>