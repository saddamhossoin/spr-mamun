   
<div id="columns">
  
  
  <!-- ========================Start Here Total Prices ====================================-->
  <div id="PatientTestbox" class="widget color-blue">
    <div class="widget-head" style="cursor: move;">
      <h3>Item Code</h3>
    </div>
    <div class="widget-content">
      <div class="PatientDetails form">
        <?php echo $this->Form->create('');?>
        <div id="productdetails" class="microcontroll">
          <fieldset>
           <div id="" class="microcontroll"> 
      	 <div id="WrapperPosSaleAmountpos_supplier_id" class="microcontroll"> 
			<?php echo $this->Form->label('PosSaleAmount.pos_supplier_id', __('Supplier:'.'<span class="star"></span>', true) ); ?> 
			<?php echo $this->Form->input('PosSaleAmount.pos_supplier_id',array('div'=>false,'label'=>false,   'class'=>'required'));?> 
			 </div>
             <div class="clr"></div>
             <div id="WrapperPosSaleAmountpos_brand_id" class="microcontroll"> 
			<?php echo $this->Form->label('PosSaleAmount.pos_brand_id', __('Brand:'.'<span class="star"></span>', true) ); ?> 
			<?php echo $this->Form->input('PosSaleAmount.pos_brand_id',array('div'=>false,'label'=>false,   'class'=>'required'));?> 
			 </div>
       <div class="clr"></div>
            <div id="WrapperPosSaleAmountpos_pcategory_id" class="microcontroll"> 
			<?php echo $this->Form->label('PosSaleAmount.pos_pcategory_id', __('Category:'.'<span class="star"></span>', true) ); ?> 
			<?php echo $this->Form->input('PosSaleAmount.pos_pcategory_id',array('div'=>false,'label'=>false,   'class'=>'required'));?> 
			 </div>
             
              <div class="clr"></div>
             
            <div id="WrapperPosQuantity" class="microcontroll"> 
			<?php echo $this->Form->label('PosSaleAmount.quantity', __('Quantity :'.'<span class="star"></span>  ', true) ); ?> 
			<?php echo $this->Form->input('PosSaleAmount.quantity',array('div'=>false,'label'=>false, 'class'=>'required'));?> 
			</div>
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
      <div class="PatientDetails form">  
        <div id="" class="microcontroll">
          <div class="bDiv" style="height: auto;">
            <div class="hDiv">
              <div class="hDivBox">
                <?php echo $this->Form->create('');?>
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
    <!--=============================Start Here Patient Test ==============-->
	
	<div id="PatientTestbox" class="widget color-blue">
    <div class="widget-head" style="cursor: move;">
      <h3>Price Detail</h3>
    </div>
    <div class="widget-content">
      <div class="PatientDetails form">
        <?php echo $this->Form->create('');?>
        <div id="productdetails" class="microcontroll">
          <fieldset>
            <div id="" class="microcontroll">
            <div id="Wrappertotalproduct" class="microcontroll"> 
			<?php echo $this->Form->label('PosSaleAmount.total_product', __('Total Product :'.'<span class="star">*</span>', true) ); ?> 
			<?php echo $this->Form->input('PosSaleAmount.total_product',array('div'=>false,'label'=>false,   'class'=>'required'));?> 
			 </div>
            <div id="WrapperPosvat" class="microcontroll"> 
			<?php echo $this->Form->label('PosSaleAmount.vat', __('Vat :'.'<span class="star">*</span>  ', true) ); ?> 
			<?php echo $this->Form->input('PosSaleAmount.vat',array('div'=>false,'label'=>false, 'class'=>'required'));?> 
			</div>
			<div id="WrapperPosdiscount" class="microcontroll"> 
			<?php echo $this->Form->label('PosSaleAmount.discount', __('Discount :'.'<span class="star">*</span>  ', true) ); ?> 
			<?php echo $this->Form->input('PosSaleAmount.discount',array('div'=>false,'label'=>false, 'class'=>'required'));?> 
			</div>
			<div id="WrapperPospaytype" class="microcontroll"> 
			<?php echo $this->Form->label('PosSaleAmount.pay_type', __('Payment Type :'.'<span class="star">*</span>  ', true) ); ?> 
			<?php echo $this->Form->input('PosSaleAmount.pay_type',array('div'=>false,'label'=>false, 'class'=>'required'));?> 
			</div>
			<div id="Wrappercardno" class="microcontroll"> 
			<?php echo $this->Form->label('PosSaleAmount.card_no', __('Card Number :'.'<span class="star">*</span>  ', true) ); ?> 
			<?php echo $this->Form->input('PosSaleAmount.card_no',array('div'=>false,'label'=>false, 'class'=>'required'));?> 
			</div>
			<div id="WrapperPosamount" class="microcontroll"> 
			<?php echo $this->Form->label('PosSaleAmount.amount', __('Amount :'.'<span class="star">*</span>  ', true) ); ?> 
			<?php echo $this->Form->input('PosSaleAmount.amount',array('div'=>false,'label'=>false, 'class'=>'required'));?> 
			</div>
          </div>
          </fieldset>
        </div>
        <?php echo $this->Form->end();?>
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
