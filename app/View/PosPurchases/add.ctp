<?php echo $this->Html->script(array('alert/alert')); ?>
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

<html>

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
                <?php echo $this->Form->create('PosPurchaseDetail');?>
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
  
  <div id="PatientTestbox" class="widget color-blue" style="width:100%;">
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
  
  <div style="clear:both"></div>
</div>

  <!--============================= End Here Patient Test ==============-->
  
</div>
<div class="clr"></div>
<div class="button_area" >
  <?php  echo $this->Form->button('Save',array( 'class'=>'submit', 'id'=>'btn_PosPurchase_add'));?>
  <?php  echo $this->Form->button('Cancel',array('type'=>'reset','name'=>'reset','id'=>'Cancel'));?>
</div>
  </html>

 
<?php //echo $this->Html->css(array('common/grid','module/PosSales/add'));?>
