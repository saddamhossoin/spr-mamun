<?php echo $this->Html->script(array('alert/alert')); ?>
<?php echo $this->Html->css(array('alert/css/alert','alert/themes/default/theme')); ?>
 
<script type="text/javascript" >
	$(function() {
        $( "#PosPurchasePurchaseDate").datepicker({
            changeMonth: true,
            changeYear: true,
			dateFormat:"yy-mm-dd"
        });
    });
</script>

<div id="columns">
  <div id="PatientDetailsbox" class="widget color-blue" style="width:440px;">
    <div class="widget-head" style="cursor: move;">
      <h3>Purchase Detail</h3>
    </div>
    <div class="widget-content" id="PatientDetailscontent">
      <div class="posPurchases form"> <?php echo $this->Form->create('PosPurchase');?>
        <fieldset>
         <div id="supllier" class="microcontroll">
          
          <div id="first" class="microcontroll">
            <div id="WrapperPosPurchaseID" class="microcontroll">
      <span class="id_display"> 
  </span>    <?php	echo $this->Form->input('PosPurchase.id',array('div'=>false,'label'=>false,'class'=>'required'));?>
          </div>
            
            <div id="WrapperPosPurchasePName" class="microcontroll">
			 <?php echo $this->Form->label('PosPurchase.pos_supplier_id', __('Supplier Name'.': <span class="star">*</span>', true) ); ?>
     		 <?php echo $this->Form->select('PosPurchase.pos_supplier_id',  $posSuppliers  ,array('div'=>false,'label'=>false, 'empty'=>'-- Please Select Supplier-', 'class'=>'required select2as'));?>
            </div>
            <div id="WrapperPosPurchasePurchaseDate" class="microcontroll"> 
			<?php echo $this->Form->label('PosPurchase.purchase_date', __('Purchase Date'.': <span class="star">*</span>', true) ); ?> 
			<?php echo $this->Form->input('PosPurchase.purchase_date',array('type'=>'text','div'=>false,'label'=>false, 'size'=>26, 'class'=>'required ' ));?> </div>
			
			<?php /*?><div id="WrapperPosPurchaseManualInvoiceId" class="microcontroll">
			<?php echo $this->Form->label('PosPurchase.manual_invoice_id', __('Manual Inovice ID'.': <span class="star"></span>', true) ); ?> <?php echo $this->Form->input('PosPurchase.manual_invoice_id',array('type'=>'text','div'=>false,'label'=>false, 'size'=>26, 'class'=>'required ' ));?>
			 </div><?php */?>
          </div>
        </div>
        </fieldset>
          <?php echo $this->Form->end();?>
      </div>
    </div>
  </div>
  <div id="PatientTestbox" class="widget color-blue">
    <div class="widget-head" style="cursor: move;">
      <h3>Supplier Information</h3>
    </div>
    <div class="widget-content" style="height:81px;">
      <div id="second" class="microcontroll">
     	 <?php //pr($this->data);
		  echo  $this->requestAction("pos_purchases/getsupllier/".$this->data['PosPurchase']['pos_supplier_id'], array("return")); ?>
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
             <div id="WrapperPosProductPosBrandId" class="microcontroll"> 
          <?php echo $this->Form->label('PosProduct.pos_brand_id', __('Product Brand'.': <span class="star">*</span>', true) ); ?> <?php echo $this->Form->select('PosProduct.pos_brand_id',  $brand  ,array('div'=>false,'label'=>false, 'empty'=>'-Please Select Brand-', 'class'=>'required select2as'));?> </div>
            <div id="WrapperPosProductPosPcategoryId" class="microcontroll"> 
		 <?php echo $this->Form->label('PosProduct.pos_brand_id', __('Product Category'.': <span class="star">*</span>', true) ); ?> <?php echo $this->Form->select('PosProduct.pos_pcategory_id',  $category  ,array('div'=>false,'label'=>false, 'empty'=>'-Please Select Category-', 'class'=>'required select2as'));?> </div>
            <div id="WrapperPosProductName" class="microcontroll ui-widget"> 
		 <?php echo $this->Form->label('PosProduct.pname', __('Product Name'.': <span class="star">*</span>', true) ); ?>
              <?php  echo $this->Form->select('PosProduct.name', null ,  array('escape' => false,'empty'=>'-Please Select Product-', 'class'=>'required select2as'))?>
            </div>
            <div id="WrapperPosProductQuantity" class="microcontroll">
         <?php echo $this->Form->label('PosProduct.Quantity', __('Quantity'.': <span class="star">*</span>', true) ); ?> <?php echo $this->Form->input('PosProduct.Quantity',array('type'=>'text','div'=>false,'label'=>false, 'size'=>26, 'class'=>'required ' ));?> 
            </div>
            <div id="WrapperPosProductPurchaseprice" class="microcontroll"> 
 		<?php echo $this->Form->label('PosProduct.purchase_date', __('Purchase Price'.': <span class="star">*</span>', true) ); ?> <?php echo $this->Form->input('PosProduct.purchaseprice',array('type'=>'text','div'=>false,'label'=>false, 'size'=>26, 'class'=>'required' ));?>
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
        </tr>
        <tr>
        <td id="address">Stock Status:</td>
        </tr><tr>
        <td id="mobile">Purchase Price:</td>
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
        <?php echo $this->Form->create('PosPurchaseAmount');?>
        <div id="productdetails" class="microcontroll">
          <fieldset>
            <div id="" class="microcontroll">
            <div id="WrapperProductTotalprices" class="microcontroll"> <?php echo $this->Form->label('PosPurchaseAmount.totalprice', __('Total  Prices :'.'<span class="star"></span>', true) ); ?> <?php echo $this->Form->input('PosPurchase.totalprice',array('div'=>false,'label'=>false,   'class'=>'required','readonly'=>'readonly'));?> <span  class="accounts">
              <?php //echo $suppliers['PosSupplier']['mobile'];?>
              </span> </div>
            <div id="WrapperPosPurchasemobile" class="microcontroll"> <?php echo $this->Form->label('PosPurchaseAmount.payamount', __('Pay Amount :'.'<span class="star"></span>  ', true) ); ?> <?php echo $this->Form->input('PosPurchase.payamount',array('div'=>false,'label'=>false, 'empty'=>'-- Please Select Supplier-', 'class'=>'required'));?> </div>
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
      <div class="PatientDetails"> <?php //echo $this->Form->create('PosProduct');?>
        <div id="" class="microcontroll">
          <div class="bDiv" style="height: auto;">
            <div class="hDiv">
              <div class="hDivBox">
                <?php echo $this->Form->create('PosPurchaseDetail');?>
                <table class="pdetail">
                  <thead>
                  <th width="50px;" style="font-weight:bold"><?php echo "Sl no:"; ?></th>
                    <th width="145px" style="font-weight:bold"><?php echo " Name"; ?></th>
                    <th width="145px" style="font-weight:bold"><?php echo " Brand"; ?></th>
                    <th width="145px" style="font-weight:bold"><?php echo " Category"; ?></th>
                    <th width="100px" style="font-weight:bold"><?php echo "Quantity"; ?></th>
                    <th width="145px" style="font-weight:bold"><?php echo "Purchase Prices"; ?></th>
                    <th width="145px" style="font-weight:bold"><?php echo "Total Price"; ?></th>
                    <th width="48px" style="font-weight:bold"><?php echo "Action"; ?></th>
                    </thead>
                   <tbody class="productlist">
                  <?php $sl=1; ?> 
                    <?php foreach($this->data['PosPurchaseDetail'] as  $pddata){ ?>
                    <tr id="2" class="productlistli_<?php echo $pddata['id']; ?>  altrow">
                    	<td><?php echo $sl; ?></td>
                        <td>
                        	<input type="hidden" name="data[PosPurchaseDetail][<?php echo $pddata['id']; ?>][pos_product_id]" value="<?php echo $pddata['pos_product_id']; ?>" class=" productid">
                            <span class="productvalli"><?php echo $PosProducts[$pddata['pos_product_id']];?></span><input type="hidden" name="data[PosPurchaseDetail][<?php echo $pddata['id']; ?>][pos_brand_id]" value="<?php echo $pddata['pos_brand_id']; ?>" class="brandid">
                        </td>
                        <td>
                        	<span class="brandvalli"><?php echo $brand[$pddata['pos_brand_id']];?></span>
                       		 <input type="hidden" name="data[PosPurchaseDetail][<?php echo $pddata['id']; ?>][pos_pcategory_id]" value="<?php echo $pddata['pos_pcategory_id']; ?>" class="categoryid"></td>
                        <td><span class="categoryvalli"> <?php echo $category[$pddata['pos_pcategory_id']];?></span></td>
                        <td><span class="Quantityli"><?php echo $pddata['quantity']; ?></span><input type="hidden" name="data[PosPurchaseDetail][<?php echo $pddata['id'] ?>][quantity]" value="<?php echo $pddata['quantity']; ?>" class="categoryid"></td>
                        <td><span class="purchasepriseli"><?php echo $pddata['price']; ?></span><input type="hidden" name="data[PosPurchaseDetail][<?php echo $pddata['id'] ?>][price]" value="<?php echo $pddata['price']; ?>" class="categoryid"></td>
                        <td><span class="totalpriceli"><?php echo $pddata['totalprice']; ?></span><input type="hidden" name="data[PosPurchaseDetail][<?php echo $pddata['id'] ?>][totalprice]" value="<?php echo $pddata['totalprice']; ?>" class="categoryid"></td>
                        <td><span id="deletelink_2" class="deletelink"></span></td>
                        </tr>
                       <?php $sl++; ?> 
                        <?php  } ?>
                    
                 
                  
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
     <?php /*?><div class="flexigrid" style="width: 100%;">
    <div style="clear: both;"></div>
    <div class="bDiv" style="height: auto;">
      <div class="hDiv">
        <div class="hDivBox">
          <table cellspacing="0" cellpadding="0">
            <thead>
              <tr>
                <th align="left" ><div style=" width: 100px;"><?php echo "Sl no:"; ?></div></th>
                <th align="left" ><div style=" width: 100px;"><?php echo "Product Name"; ?></div></th>
                <th align="left" ><div style=" width: 100px;"><?php echo "Product Brand"; ?></div></th>
                <th align="left" ><div style=" width: 100px;"><?php echo "Product Category"; ?></div></th>
                <th align="left" ><div style=" width: 100px;"><?php echo "Quantity"; ?></div></th>
                <th align="left" ><div style=" width: 100px;"><?php echo "Purchase Prices"; ?></div></th>
                <th align="right"  ><div style="text-align: left; width: 100px;"><?php echo "Total Price"; ?></div></th>
                <th align="left" ><div style=" width: 180px;" class="link_text"><?php echo "Action"; ?></div></th>
              <!--  <th width="145px" style="font-weight:bold"></th>
                <th width="145px" style="font-weight:bold"></th>
                <th width="145px" style="font-weight:bold"></th>
                <th width="100px" style="font-weight:bold"></th>
                <th width="145px" style="font-weight:bold"></th>
                <th width="145px" style="font-weight:bold"></th>
                <th width="48px" style="font-weight:bold"></th>-->
              </tr>
            </thead>
          </table>
        </div>
      </div>
      <table cellspacing="0" cellpadding="0" border="0" style="" class="flexme3">
        <tbody class="productlist">
           
       </table>
    </div>
     
  </div><?php */?>
  <!--============================= End Here Patient Test ==============-->
</div>
<div class="clr"></div>
<div class="button_area" >
  <?php  echo $this->Form->button('Save',array( 'class'=>'submit', 'id'=>'btn_PosPurchase_update'));?>
  <?php  echo $this->Form->button('Cancel',array('type'=>'reset','name'=>'reset','id'=>'Cancel'));?>
</div>
