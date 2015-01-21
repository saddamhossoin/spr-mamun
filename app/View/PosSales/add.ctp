<?php echo $this->Html->script(array('alert/alert')); ?>
<?php echo $this->Html->css(array('alert/css/alert','alert/themes/default/theme')); ?>

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
<div style="width:74%; float:left;">
<div id="PatientTestbox" class="widget color-blue" style="width:99%;">
    <div class="widget-head" style="cursor: move;">
      <h3>Product Details</h3>
    </div>
    <div class="widget-content">
      <div class="PatientDetails" style="margin-left:14px;">
      <?php echo $this->Form->create('ProductEntry');?>
        <div id="productdetails" class="microcontroll">
           <fieldset>
 		 
	  <?php 	$return_arr = array();
	 	foreach($posProducts as $key=>$posproduct){
				$row_array['label'] = $posproduct;
				$row_array['actor'] = "$key";
				array_push($return_arr,$row_array);
		}
 	  ?>
 	  <script>
 	   var data = '';
	   var data =  <?php echo json_encode($return_arr); ?>;
 	  </script>
 	     <div id="product_id" style="display:none"></div>
         <div id="is_barcode" style="display:none"></div>
         <div id="product_type" style="display:none"></div>
		  	<div id="WrapperPosProductName" class="microcontroll ui-widget"> 
		 <?php echo $this->Form->label('PosProduct.pname', __('Product '.': <span class="star">*</span>', true) ); ?>
         <?php echo $this->Form->input('PosProduct.name',array('type'=>'text','div'=>false,'label'=>false, 'size'=>35, 'class'=>'required'  ));?>
			  
            </div>
			
			
            <div id="WrapperPosProductQuantity" class="microcontroll">
         <?php echo $this->Form->label('PosProduct.Quantity', __('Quantity'.': <span class="star">*</span>', true) ); ?> <?php echo $this->Form->input('PosProduct.Quantity',array('type'=>'text','div'=>false,'label'=>false, 'size'=>26, 'class'=>'required onlyNumeric' ));?> 
            </div>
            <div id="WrapperPosProductPurchaseprice" class="microcontroll"> 
 		<?php echo $this->Form->label('PosProduct.purchase_date', __('Price'.': <span class="star">*</span>', true) ); ?> <?php echo $this->Form->input('PosProduct.purchaseprice',array('type'=>'text','div'=>false,'label'=>false, 'size'=>26, 'class'=>'required two_digit' ));?>
            </div>
           
          </fieldset>
		   <!--  product Status start   -->
		  <div id="productstatus" class="microcontroll">
      	<table id="productinfo">
        <tr>
        <td id="name">Sales Price: </td>
        <td> <?php 
			echo "<span id=SalesPriceStatus> </span>";
			echo $this->Form->input('PosSales.salesprice',array('type'=>'hidden','value'=> '','div'=>false,'label'=>false,'class'=>' two_digit'));
		?></td>
        
        <td id="address">Stock Status:</td>
        <td> <?php 
			echo "<span id=StockStatuss></span>";
			echo $this->Form->input('PosSales.stock',array('type'=>'hidden','value'=>'','div'=>false,'label'=>false,'class'=>'two_digit'));
		?></td>
       
        <td id="mobile">Purchase Price:</td>
        <td> <?php 
			echo "<span id=PurchasePriceStatus> </span>";
			echo $this->Form->input('PosSales.purchaseprice',array('type'=>'hidden','value'=> '','div'=>false,'label'=>false,'class'=>'two_digit'));
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
  <div style="clear:both"></div>
    <!--============================= End Here Product Grids ==============-->
  
 <div id="PatientAccount" class="widget color-blue" style="width:99%;">
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
                <table class="pdetail" width="100%">
                  <thead>
                  <th width="5%" style="font-weight:bold"><?php echo "Sl no:"; ?></th>
                    <th width="25%" style="font-weight:bold"><?php echo "Product Name"; ?></th>
                    <th width="13%" style="font-weight:bold"><?php echo "Product Brand"; ?></th>
                    <th width="13%" style="font-weight:bold"><?php echo "Product Category"; ?></th>
                    <th width="13%" style="font-weight:bold"><?php echo "Quantity"; ?></th>
                    <th width="13%" style="font-weight:bold"><?php echo "Sales Prices"; ?></th>
                    <th width="13%" style="font-weight:bold"><?php echo "Total Price"; ?></th>
                    <th width="5%" style="font-weight:bold"><?php echo "Action"; ?></th>
                    </thead>
                   
                  <tbody class="productlist">
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
</div>
<div style="width:25%; float:left;">

<div id="PatientDetailsbox" class="widget color-blue" style="width:100%;">
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
     	<?php echo $this->Form->input('PosSale.user_id',array('type'=>'hidden','div'=>false,'label'=>false));?>
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
   
   <div id="WrapperUserEmail" class="microcontroll">
		<?php echo $this->Form->label('PosSale.companyname', __('Company'.': <span class="star"></span>', true) ); ?>
		<?php echo $this->Form->input('PosSale.companyname',array('type'=>'text','div'=>false,'label'=>false, 'size'=>35, 'class'=>''  ));?>
   </div>
   
   <div id="WrapperPosSalePurchaseDate" class="microcontroll"> 
		<?php echo $this->Form->input('PosSale.purchase_date',array('value'=>date("Y-m-d h:m:s"),'type'=>'hidden','div'=>false,'label'=>false, 'size'=>26, 'class'=>'required ' ));?> </div>
    
  </div>
 		 <div class="rdcontent_right">
    <div id="WrapperUserEmail" class="microcontroll">
		<?php echo $this->Form->label('PosSale.piva', __('P.Iva'.': <span class="star">*</span>', true) ); ?>
		<?php echo $this->Form->input('PosSale.piva',array('type'=>'text','div'=>false,'label'=>false, 'size'=>35, 'class'=>'required'  ));?>
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
  
  <div id="PatientTestbox" class="widget color-blue" style="width:100%;">
    <div class="widget-head" style="cursor: move;">
      <h3>Amount</h3>
    </div>
    <div class="widget-content">
      <div class="PatientDetails ">
        <?php echo $this->Form->create('PosSaleAmount');?>
        <div id="productdetails" class="microcontroll">
          <fieldset>
            <div id="final_payment_submit" class="microcontroll">
            <div id="WrapperProductTotalprices" class="microcontroll"> <?php echo $this->Form->label('PosSaleAmount.totalprice', __('Total  Prices :'.'<span class="star"></span>', true) ); ?> <?php echo $this->Form->input('PosSaleAmount.totalprice',array('div'=>false,'label'=>false,   'class'=>'required two_digit','readonly'=>'readonly'));?> <span  class="accounts">
              <?php //echo $suppliers['PosSupplier']['mobile'];?>
              </span> </div>
			  
			 <div id="WrapperServiceInvoiceVat" class="microcontroll">
			 <span  id="tax_hidden"><?php  echo $tax;?> </span> 
		<?php	//echo $this->Form->label('PosSaleAmount.tax', __('Vat'.':<span class=star>*</span>', true) );?>
		<?php	//echo $this->Form->input('PosSaleAmount.tax',array('readonly'=>'readonly','div'=>false,'label'=>false,'class'=>'number required'));?> 
		
		 <?php echo $this->Form->label('PosCountersSale.Tax', __('IVA'.': <span class="star">*</span>', true) ); ?>
	  <?php	 echo $this->Form->input('PosSaleAmount.tax',array('readonly'=>'readonly','div'=>false,'label'=>false,'class'=>'number two_digit'));?>
	   <?php echo $this->Form->label('PosSaleAmount.is_tax_lavel', __('Euro', true) ); ?>
	   	<?php //echo $this->Form->input('PosSaleAmount.is_tax',array('class'=>'tax','div' => false,'label' => false,'type' => 'checkbox','checked'=>true));   
		 ?>
         
         <?php  
		$is_tax =array('1'=>'Yes','0'=>'No');
		echo $this->Form->select('PosSaleAmount.is_tax', $is_tax , array('escape' => false,'empty'=>'-Tax-', 'class'=>'required select2as'))?>
		 
		</div>
		
		<div class="clr"></div>
		<div id="WrapperServiceInvoiceDiscount" class="microcontroll">
		<?php	echo $this->Form->label('PosSaleAmount.discount', __('Discount'.':<span class=star></span>', true) );?>
		<?php	echo $this->Form->input('PosSaleAmount.discount',array('div'=>false,'label'=>false,'class'=>'number two_digit'));?>
		</div>
            
		
       <div id="WrapperServiceInvoiceTransport" class="microcontroll">
		<?php	echo $this->Form->label('PosSaleAmount.transport', __('Transport'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('PosSaleAmount.transport',array( 'div'=>false,'label'=>false,'class'=>'number required two_digit', 'value'=>'0.00'));?>
		</div>
        	<div id="WrapperServiceInvoicePayableOther" class="microcontroll">
		<?php	echo $this->Form->label('PosSaleAmount.others_fee', __('Other'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('PosSaleAmount.others_fee',array('value'=>'0.00','div'=>false,'label'=>false,'class'=>'number required two_digit'));?>
		</div>
        	<div id="WrapperServiceInvoicePayableAmount" class="microcontroll">
		<?php	echo $this->Form->label('PosSaleAmount.payable_amount', __('Payable'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('PosSaleAmount.payable_amount',array('readonly'=>'readonly','div'=>false,'label'=>false,'class'=>'number required two_digit'));?>
		</div>
            <div id="WrapperPosSalemobile" class="microcontroll">
						<?php echo $this->Form->label('PosSaleAmount.payamount', __('Payment :'.'<span class="star">*</span>  ', true) ); ?> 
						<?php echo $this->Form->input('PosSaleAmount.payamount',array('div'=>false,'label'=>false, 'class'=>'number required two_digit'));?> 			
						<?php  echo $this->Form->select('PosSaleAmount.accountHead', $accountsHead , array('escape' => false,'empty'=>'-  Select Head -', 'class'=>'required select2as'))?>
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
  
  <div style="clear:both"></div>
</div>
 

  
  
  
 
  

   
  <!--============================= End Here Patient Test ==============-->
  
</div>
<div class="clr"></div>
<div class="button_area" >
  <?php  echo $this->Form->button('Save',array( 'class'=>'submit', 'id'=>'btn_PosSale_add'));?>
  <?php  echo $this->Form->button('Cancel',array('type'=>'reset','name'=>'reset','id'=>'Cancel'));?>
</div>
  </html>

 
<?php //echo $this->Html->css(array('common/grid','module/PosSales/add'));?>
