<?php echo $this->Html->css(array('alert/css/alert','alert/themes/default/theme')); ?>
<script type="text/javascript" >
	$(function(){
	    $( "#PosPurchasePurchaseDate").datepicker({
            changeMonth: true,
            changeYear: true,
			dateFormat:"yy-mm-dd",
			
         });
		 
		 $( "#PosPurchaseManualInvoiceDate").datepicker({
            changeMonth: true,
            changeYear: true,
			dateFormat:"yy-mm-dd",
			onSelect: function(dateText, inst) {
					 
					 var date1 = $('#PosPurchaseManualInvoiceDate').datepicker('getDate');
					 var date2 = $('#PosPurchasePurchaseDate').datepicker('getDate');
					  	 
							if(date2 == ""){
								$.alert.open('warning', 'Please Select Purchase Date First !!!');
								$(this).val("");
 							}else{
								if(new Date(date1).getTime() > new Date(date2).getTime()){
								$.alert.open('warning', 'Must be invoice date is less than purchase date');
								$(this).val("");
							} 
							}
 				 
 					 
  				}
			
         });
      });
</script>
	<div id="columns"> 
 	  <div id="PatientDetailsbox" class="widget color-blue" style="width:48%;">
 	  <div class="widget-head" style="cursor: move;">
      <h3>Purchase Detail</h3>
    </div>
    <div class="widget-content" id="PatientDetailscontent">
    
    <div class="posPurchases form">
	<?php echo $this->Form->create('PosPurchase',array('enctype' => 'multipart/form-data','type'=>'file'));?>
    <?php echo $this->Form->input('PosPurchaseUpdate.id',array('type'=>'hidden','div'=>false,'label'=>false, 'size'=>26 ));?>

        <fieldset>
         <div id="supllier" class="microcontroll">
          <div id="first" class="microcontroll">
          <div id="WrapperPosPurchasePName" class="microcontroll"> <?php echo $this->Form->label('PosPurchase.pos_supplier_id', __('Supplier Name'.': <span class="star">*</span>', true) ); ?>
              <?php echo $this->Form->select('PosPurchase.pos_supplier_id',  $posSuppliers  ,array('div'=>false,'label'=>false, 'empty'=>'-- Please Select Supplier-', 'class'=>'required select2as'));?>
            </div>
		   <div id="WrapperPosPurchasePurchaseDate" class="microcontroll">
			<?php echo $this->Form->label('PosPurchase.purchase_date', __('Purchase Date'.': <span class="star">*</span>', true) ); ?> <?php echo $this->Form->input('PosPurchase.purchase_date',array('value'=>date("Y-m-d"),'type'=>'text','div'=>false,'label'=>false, 'size'=>26, 'class'=>'required ' ));?>
			 </div>
			 
			<div id="WrapperPosPurchaseManualInvoiceId" class="microcontroll">
			<?php echo $this->Form->label('PosPurchase.manual_invoice_id', __('Invoice ID'.': <span class="star">*</span>', true) ); ?> <?php echo $this->Form->input('PosPurchase.manual_invoice_id',array('type'=>'text','div'=>false,'label'=>false, 'size'=>26, 'class'=>'required ' ));?>
			 </div>
			<div id="WrapperPosPurchaseManualInvoiceDate" class="microcontroll">
			<?php echo $this->Form->label('PosPurchase.manual_invoice_date', __('Invoice Date'.': <span class="star">*</span>', true) ); ?> <?php echo $this->Form->input('PosPurchase.manual_invoice_date',array('type'=>'text','div'=>false,'label'=>false, 'size'=>26, 'class'=>'required ' ));?>
			 </div>
             
            <div id="WrapperPurchaseImage" class="microcontroll">
            <?php	echo $this->Form->label('PosPurchase.invoice_image', __('Invoice Image'.':<span class=star></span>', true) );?>
            <?php   echo $this->Form->input('PosPurchase.invoice_image',array('type'=>'file','div'=>false,'label'=>false,'class'=>'' ));   ?>     
            </div>
            
  		</div>
        </div>
           <?php echo $this->Form->end();?>
           </fieldset>
      </div>
    </div>
  </div>
  <div id="PatientTestbox" class="widget color-blue" style="width:48%;">
    <div class="widget-head" style="cursor: move;">
      <h3>Supplier Information</h3>
    </div>
    <div class="widget-content" style="height:156px;">
      <div id="second" class="microcontroll">
       	<table id="supplier">
        <tr>
       	 <td id="name">Supplier Name:</td>
        </tr>
		<tr>
      	  <td id="name" style="font-weight:bold">IVA:</td>
        </tr>
        <tr>
      	  <td id="address">Supplier Address:</td>
        </tr><tr>
      	  <td id="mobile">Supplier Mobile:</td>
        </tr>
      <!--  <tr id="due"><td>Supplier Due:</td>
        </tr>-->
        </table>
	    </div>
    </div>
  </div>
  <div style="clear:both"></div>
  <div id="PatientTestbox" class="widget color-blue" style="width:48%;">
    <div class="widget-head" style="cursor: move;">
      <h3>Product Details</h3>
    </div>
    <div class="widget-content">
      <div class="PatientDetails form">
      <?php echo $this->Form->create('ProductEntry');?>
        <div id="productdetails" class="microcontroll">
           <fieldset>
             <div id="WrapperPosProductPosBrandId" class="microcontroll"> 
         	 <?php echo $this->Form->label('PosProduct.pos_brand_id', __('Product Brand'.': <span class="star">*</span>', true) ); ?>
              <?php echo $this->Form->select('PosProduct.pos_brand_id',  $brand  ,array('div'=>false,'label'=>false, 'empty'=>'-Please Select Brand-', 'class'=>'required select2as'));?> 
              </div>
              
            <div id="WrapperPosProductPosPcategoryId" class="microcontroll"> 
		 <?php echo $this->Form->label('PosProduct.pos_brand_id', __('Product Category'.': <span class="star">*</span>', true) ); ?> 
		 <?php echo $this->Form->select('PosProduct.pos_pcategory_id',  $category  ,array('div'=>false,'label'=>false, 'empty'=>'-Please Select Category-', 'class'=>'required select2as'));?> 
         </div>
         <div id="WrapperPosProductName" class="microcontroll ui-widget"> 
		 	  <?php echo $this->Form->label('PosProduct.pname', __('Product Name'.': <span class="star">*</span>', true) ); ?>
              <?php  echo $this->Form->select('PosProduct.name', null , array('escape' => false,'empty'=>'-Please Select Product-', 'class'=>'required select2as'))?>
			  <div class="pop_up_add_product microcontroll">
					<span id="image"></span>
					<!--<span id="text">Add</span>-->
			  </div>
         </div>
        <div class="clr"></div>
		   <div id="WrapperPosProductPurchaseprice" class="microcontroll"> 
 		<?php echo $this->Form->label('PosProduct.purchaseprice', __('Purchase Price'.': <span class="star">*</span>', true) ); ?> <?php echo $this->Form->input('PosProduct.purchaseprice',array('type'=>'text','div'=>false,'label'=>false, 'size'=>26, 'class'=>'required two_digit' ));?>
            </div>
            
             <div id="WrapperPosProductQuantity" class="microcontroll">
				<?php echo $this->Form->label('PosProduct.salesprice', __('Sales Price'.': <span class="star">*</span>', true) ); ?>
                <?php echo $this->Form->input('PosProduct.salesprice',array('type'=>'text','div'=>false,'label'=>false, 'size'=>26, 'class'=>'two_digit' ));?> 
            </div>
            
             <div id="WrapperPosProductQuantity" class="microcontroll">
         	<?php echo $this->Form->label('PosProduct.quantity', __('Quantity'.': <span class="star">*</span>', true) ); ?> 
			<?php echo $this->Form->input('PosProduct.quantity',array('type'=>'text','div'=>false,'label'=>false, 'size'=>26, 'class'=>'required two_digit' ));?> 
            </div>
           
          
          <div class="button_area" id="button1"> <?php echo $this->Form->button('Add',array( 'class'=>'submit', 'id'=>'btn_PosProduct_add'));?> <?php echo $this->Form->button('Cancel',array('type'=>'reset','name'=>'reset','id'=>'Cancel'));?> </div>
        </div>
        <?php echo $this->Form->end();?>
      </div>
    </div>
  </div>
  <!-- ============================= Start Here Product status ==============-->
  <div id="PatientTestbox" class="widget color-blue" style="width:48%;">
    <div class="widget-head" style="cursor: move;">
      <h3>Product Status</h3>
    </div>
    <div class="widget-content" style="height:41px;">
      <div id="productstatus" class="microcontroll">
      	<table id="productinfo" width="100%">
        <tr>
            <td id="mobile">Purchase Pricese:</td>
            <td id="name" width="33%">Sales Prices: </td>
            <td id="address" width="33%">Stock Status:</td> 
       </tr>
        <tr>
        <td> <?php 
			echo "<span id=PurchasePriceStatus></span>";
			echo $this->Form->input('PosPurchase.purchaseprice',array('type'=>'hidden','value'=>'','div'=>false,'label'=>false,'class'=>''));
		?></td>
        
       <td> <?php 
			echo "<span id=SalesPriceStatus></span>";
			echo $this->Form->input('PosPurchase.salesprice',array('type'=>'hidden','value'=>'','div'=>false,'label'=>false,'class'=>''));
		?></td>
        <td> <?php 
			echo "<span id=StockStatuss> </span>";
			echo $this->Form->input('PosPurchase.stock',array('type'=>'hidden','value'=>'','div'=>false,'label'=>false,'class'=>''));
		?></td>
         </tr>
          </table>
       </div>
    </div>
  </div>
  <!-- ========================Start Here Total Prices ====================================-->
  <div id="PatientTestbox" class="widget color-blue" style="width:48%;">
    <div class="widget-head" style="cursor: move;">
      <h3>Amount</h3>
    </div>
    <div class="widget-content">
      <div class="PatientDetails form">
        <?php echo $this->Form->create('PosPurchaseAmount');?>
        <div id="productdetails" class="microcontroll">
          <fieldset>
            <div id="" class="microcontroll">
            <div id="WrapperProductTotalprices" class="microcontroll"> 
			<?php echo $this->Form->label('PosPurchaseAmount.totalprice', __('Total  Prices :'.'<span class="star"></span>', true) ); ?> 					 			<?php echo $this->Form->input('PosPurchaseAmount.totalprice',array('div'=>false,'label'=>false,   'class'=>'required two_digit','readonly'=>'readonly'));?> 
			<span  class="accounts"><?php //echo $suppliers['PosSupplier']['mobile'];?> </span> 
			</div>
			
			 <div id="WrapperServiceInvoiceVat" class="microcontroll">
			 <span  id="tax_hidden"><?php  echo $tax;?> </span> 
		<?php	//echo $this->Form->label('PosPurchaseAmount.tax', __('IVA '.':<span class=star>*</span>', true) );?>
		<?php	//echo $this->Form->input('PosPurchaseAmount.tax',array('readonly'=>'readonly','div'=>false,'label'=>false,'class'=>'number '));?>
		 <?php echo $this->Form->label('PosCountersSale.Tax', __('IVA'.': <span class="star">*</span>', true) ); ?>
	  <?php	 echo $this->Form->input('PosPurchaseAmount.tax',array('readonly'=>'readonly','div'=>false,'label'=>false,'class'=>'number two_digit'));?>
	   <?php echo $this->Form->label('PosPurchaseAmount.is_tax_lavel', __('Euro', true) ); ?>
	 
	  	<?php //echo $this->Form->input('PosPurchaseAmount.is_tax',array('class'=>'tax','div' => false,'label' => false,'type' => 'checkbox','checked'=>true));    ?>
		
		<?php  
		$is_tax =array('1'=>'Yes','0'=>'No');
		echo $this->Form->select('PosPurchaseAmount.is_tax', $is_tax , array('escape' => false,'empty'=>'-Tax-', 'class'=>'required select2as'))?>
		 	 		 
		</div>
		
		<div class="clr"></div>

		<div id="WrapperServiceInvoiceDiscount" class="microcontroll">
		<?php	echo $this->Form->label('PosPurchaseAmount.discount', __('Discount'.':<span class=star></span>', true) );?>
		<?php	echo $this->Form->input('PosPurchaseAmount.discount',array('div'=>false,'label'=>false,'class'=>'number two_digit'));?>
		</div>
        <div class="clr"></div>
		
        <div id="WrapperServiceInvoicePayableTransport" class="microcontroll">
		<?php	echo $this->Form->label('PosPurchaseAmount.transport', __('Transport'.':<span class=star></span>', true) );?>
		<?php	echo $this->Form->input('PosPurchaseAmount.transport',array('value'=>'0.00', 'div'=>false,'label'=>false,'class'=>'number  two_digit'));?>
		</div>
         <div class="clr"></div>
        <div id="WrapperServiceInvoicePayableOtherFee" class="microcontroll">
		<?php	echo $this->Form->label('PosPurchaseAmount.others_fee', __('Others'.':<span class=star></span>', true) );?>
		<?php	echo $this->Form->input('PosPurchaseAmount.others_fee',array('value'=>'0.00','div'=>false,'label'=>false,'class'=>'number two_digit'));?>
		</div>
         <div class="clr"></div>
        	<div id="WrapperServiceInvoicePayableAmount" class="microcontroll">
		<?php	echo $this->Form->label('PosPurchaseAmount.payable_amount', __('Payable Amount'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('PosPurchaseAmount.payable_amount',array('readonly'=>'readonly','div'=>false,'label'=>false,'class'=>'number required two_digit'));?>
		</div>
        <div class="clr"></div>
	 
		<div id="WrapperServiceInvoicePayment" class="microcontroll">
		<?php	echo $this->Form->label('PosPurchaseAmount.payamount', __('Payment'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('PosPurchaseAmount.payamount',array('div'=>false,'label'=>false,'class'=>'required two_digit'));?>
        
		<?php  echo $this->Form->select('PosPurchaseAmount.accountHead', $accountsHead , array('escape' => false,'empty'=>'-Please Select Product-', 'class'=>'required select2as'))?>
 		</div>
<div class="clr"></div>
   		<div id="WrapperAccountsCheckNumber" class="microcontroll">
         
        </div>
          </fieldset>
        </div>
        <?php echo $this->Form->end();?>
      </div>
    </div>
  </div>
  <!--============================= End Here Product Grids ==============-->
  <div style="clear:both"></div>
 <div id="PatientAccount" class="widget color-blue" style="width:98%;">
    <div class="widget-head" style="cursor: move;">
      <h3>Record Details</h3>
    </div>
    <div class="widget-content">
      <div class="PatientDetails"> <?php //echo $this->Form->create('PosProduct');?>
        <div id="" class="microcontroll">
          <div class="bDiv" style="height: auto;">
            <div class="hDiv">
              <div class="hDivBox">
                <?php echo $this->Form->create('PosPurchaseDetail');?>
                <table class="pdetail" width="100%">
                  <thead>
                        <th width="5%;" style="font-weight:bold"><?php echo "Sl no:"; ?></th>
                        <th width="20%" style="font-weight:bold"><?php echo " Name"; ?></th>
                        <th width="15%" style="font-weight:bold"><?php echo " Brand"; ?></th>
                        <th width="15%" style="font-weight:bold"><?php echo " Category"; ?></th>
                        <th width="10%" style="font-weight:bold"><?php echo "Quantity"; ?></th>
                        <th width="10%" style="font-weight:bold"><?php echo "P.Prices"; ?></th>
                        <th width="10%" style="font-weight:bold"><?php echo "S.Prices"; ?></th>
                        <th width="10%" style="font-weight:bold"><?php echo "Price"; ?></th>
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
          <?php //echo $this->Form->end();?> </div>
      </div>
    </div>
  </div>
    
  <!--============================= End Here Patient Test ==============-->
</div>
<div class="clr"></div>
<div class="button_area" >
  <?php  echo $this->Form->button('Save',array( 'class'=>'submit', 'id'=>'btn_PosPurchase_add'));?>
  <?php  echo $this->Form->button('Cancel',array('type'=>'reset','name'=>'reset','id'=>'Cancel'));?>
</div>
 
<style type="text/css">
.microcontroll label { 
    font-weight: none !important;
}
</style>