<?php echo $this->Html->script(array('alert/alert')); ?>
<?php echo $this->Html->css(array('alert/css/alert','alert/themes/default/theme')); ?>

<htm>
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
  <div id="PatientDetailsbox" class="widget color-blue" style="width:440px;">
    <div class="widget-head" style="cursor: move;">
      <h3>Sales Detail</h3>
    </div>
    <div class="widget-content" id="PatientDetailscontent">
      <div class="posSales form"> <?php echo $this->Form->create('PosSale');?>
        <fieldset>
         <div id="supllier" class="microcontroll">
          <div id="first" class="microcontroll">
               
            <div id="WrapperPosSalePName" class="microcontroll"> <?php echo $this->Form->label('PosSale.pos_customer_id', __('Customer Name'.': <span class="star">*</span>', true) ); ?>
              <?php
 		echo $this->Form->select('PosSale.pos_customer_id',  $poscustomers,array('div'=>false,'label'=>false, 'empty'=>'-- Please Select Customer-', 'class'=>'required select2as'));?>
            </div>
            <div id="WrapperPosSalePurchaseDate" class="microcontroll"> <?php echo $this->Form->label('PosSale.purchase_date', __('Sales Date'.': <span class="star">*</span>', true) ); ?> <?php echo $this->Form->input('PosSale.purchase_date',array('value'=>date("Y-m-d h:m:s"),'type'=>'text','div'=>false,'label'=>false, 'size'=>26, 'class'=>'required ' ));?> </div>
 		   </div>
        </div>
        </fieldset>
        <?php echo $this->Form->end();?>
      </div>
    </div>
  </div>
  <div id="PatientTestbox" class="widget color-blue">
    <div class="widget-head" style="cursor: move;">
      <h3>Customer Information</h3>
    </div>
    <div class="widget-content" style="height:81px;">
      <div id="second" class="microcontroll">
       	<table id="supplier">
        <tr>
        <td id="name">Customer Name:</td>
        </tr>
        <tr>
        <td id="address">Customer Address:</td>
        </tr><tr>
        <td id="mobile">Customer Mobile:</td>
        </tr>
         <!--  <tr id="due"><td>Customer Due:</td>
        </tr>-->
        </table>
	    </div>
    </div>
  </div>
  <div style="clear:both"></div>
  <div id="PatientTestbox" class="widget color-blue">
    <div class="widget-head" style="cursor: move;">
      <h3>Product Details</h3>
    </div>
    <div class="widget-content">
      <div class="PatientDetails form">
      <?php echo $this->Form->create('ProductEntry');?>
        <div id="productdetails" class="microcontroll">
           <fieldset>
        
		  
			<?php /*?><div id="WrapperPosProductPosBrandId" class="microcontroll"> 
          <?php echo $this->Form->label('PosProduct.pos_brand_id', __('Product Brand'.': <span class="star">*</span>', true) ); ?> <?php echo $this->Form->select('PosProduct.pos_brand_id',  $brand  ,array('div'=>false,'label'=>false, 'empty'=>'-Please Select Brand-', 'class'=>'required select2as'));?> </div>
            <div id="WrapperPosProductPosPcategoryId" class="microcontroll"> 
		 <?php echo $this->Form->label('PosProduct.pos_brand_id', __('Product Category'.': <span class="star">*</span>', true) ); ?> <?php echo $this->Form->select('PosProduct.pos_pcategory_id',  $category  ,array('div'=>false,'label'=>false, 'empty'=>'-Please Select Category-', 'class'=>'required select2as'));?> </div><?php */?>
		 
	 
		 
		  	<div id="WrapperPosProductName" class="microcontroll ui-widget"> 
		 <?php echo $this->Form->label('PosProduct.pname', __('Product Name'.': <span class="star">*</span>', true) ); ?>
              <?php  echo $this->Form->select('PosProduct.name', $posProducts , array('escape' => false,'empty'=>'-Please Select Product-', 'class'=>'required select2as'))?>
            </div>
			
			
            <div id="WrapperPosProductQuantity" class="microcontroll">
         <?php echo $this->Form->label('PosProduct.Quantity', __('Quantity'.': <span class="star">*</span>', true) ); ?> <?php echo $this->Form->input('PosProduct.Quantity',array('type'=>'text','div'=>false,'label'=>false, 'size'=>26, 'class'=>'required ' ));?> 
            </div>
            <div id="WrapperPosProductPurchaseprice" class="microcontroll"> 
 		<?php echo $this->Form->label('PosProduct.purchase_date', __('Sales Price'.': <span class="star">*</span>', true) ); ?> <?php echo $this->Form->input('PosProduct.purchaseprice',array('type'=>'text','div'=>false,'label'=>false, 'size'=>26, 'class'=>'required' ));?>
            </div>
        
		
		  
          </fieldset>
          
          <div class="button_area" id="button1"> <?php echo $this->Form->button('Add',array( 'class'=>'submit', 'id'=>'btn_PosProduct_add'));?> <?php echo $this->Form->button('Cancel',array('type'=>'reset','name'=>'reset','id'=>'Cancel'));?> </div>
        </div>
        <?php echo $this->Form->end();?>
      </div>
    </div>
  </div>
  <!-- ============================= Start Here Product status ==============-->
  <div id="PatientTestbox" class="widget color-blue">
    <div class="widget-head" style="cursor: move;">
      <h3>Product Status</h3>
    </div>
    <div class="widget-content" style="height:81px;">
      <div id="productstatus" class="microcontroll">
      	<table id="productinfo">
        <tr>
        <td id="name">Sales Prices: </td>
        <td> <?php 
			echo "<span id=SalesPriceStatus> </span>";
			echo $this->Form->input('PosSales.salesprice',array('type'=>'hidden','value'=> '','div'=>false,'label'=>false,'class'=>''));
		?></td>
        </tr>
        <tr>
        <td id="address">Stock Status:</td>
        <td> <?php 
			echo "<span id=StockStatuss></span>";
			echo $this->Form->input('PosSales.stock',array('type'=>'hidden','value'=>'','div'=>false,'label'=>false,'class'=>''));
		?></td>
        </tr><tr>
        <td id="mobile">Purchase Pricese:</td>
        <td> <?php 
			echo "<span id=PurchasePriceStatus> </span>";
			echo $this->Form->input('PosSales.purchaseprice',array('type'=>'hidden','value'=> '','div'=>false,'label'=>false,'class'=>''));
		?></td>
        </tr>
          </table>
       </div>
    </div>
  </div>
  <!-- ========================Start Here Total Prices ====================================-->
  <div id="PatientTestbox" class="widget color-blue">
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
            <div id="WrapperPosSalemobile" class="microcontroll"> <?php echo $this->Form->label('PosSaleAmount.payamount', __('Pay Amount :'.'<span class="star">*</span>  ', true) ); ?> <?php echo $this->Form->input('PosSaleAmount.payamount',array('div'=>false,'label'=>false, 'class'=>'number required'));?> </div>
          </div>
          </fieldset>
        </div>
        <?php echo $this->Form->end();?>
      </div>
    </div>
  </div>
  <!--============================= End Here Product Grids ==============-->
  <div style="clear:both"></div>
 <div id="PatientAccount" class="widget color-blue" style="width:905px;">
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
                    <th width="145px" style="font-weight:bold"><?php echo "Product Name"; ?></th>
                    <th width="145px" style="font-weight:bold"><?php echo "Product Brand"; ?></th>
                    <th width="145px" style="font-weight:bold"><?php echo "Product Category"; ?></th>
                    <th width="100px" style="font-weight:bold"><?php echo "Quantity"; ?></th>
                    <th width="145px" style="font-weight:bold"><?php echo "Purchase Prices"; ?></th>
                    <th width="145px" style="font-weight:bold"><?php echo "Total Price"; ?></th>
                    <th width="48px" style="font-weight:bold"><?php echo "Action"; ?></th>
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
   
  <!--============================= End Here Patient Test ==============-->
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