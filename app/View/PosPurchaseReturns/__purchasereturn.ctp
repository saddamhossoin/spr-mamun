
<div id="columns">
  
  
  <!-- ========================Start Here Total Prices ====================================-->
  <div id="PatientTestbox" class="widget color-blue">
    <div class="widget-head" style="cursor: move;">
      <h3>Purchase Return</h3>
    </div>
    <div class="widget-content">
      <div class="PatientDetails form">
        <?php echo $this->Form->create('PosPurchaseReturn');?>
        <div id="productdetails" class="microcontroll">
          <fieldset>
			
			 
            <div id="WrapperItemCode" class="microcontroll"> 
			<?php echo $this->Form->label('PosPurchase.id', __('Enter Purchase ID :'.'<span class="star"></span>', true) ); ?> 
			<?php echo $this->Form->input('PosPurchase.id',array('type'=>'text','div'=>false,'label'=>false,'class'=>''));?> 
			 </div>
			  
            <div id="WrapperPosQuantity" class="microcontroll"> 
			<?php echo $this->Form->label('PosPurchase.pos_supplier_id', __('Select Supplier :'.'<span class="star"></span>  ', true) ); ?> 
			<?php echo $this->Form->select('PosPurchase.pos_supplier_id',$supplierlist,null,array('div'=>false,'label'=>false,'class'=>'','empty'=>'-----Plz Select Supplier-----'));?> 
			</div>
          </fieldset>

        </div>
		<div class="clr"></div>
		<div class="button_area" >
		<?php  echo $this->Form->button('Search',array( 'class'=>'Search', 'id'=>'btn_PosPurchaseReturn_add'));?>
		 <?php  echo $this->Form->button('Cancel',array('type'=>'reset','name'=>'reset','id'=>'Cancel'));?>
		</div>
	     <?php echo $this->Form->end();?>
		 
		 
	
	<!---------------------------------------------------------->
		<div class="hDivBox">
                <?php echo $this->Form->create('PosPurchaseReturn');?>
                <table class="pdetail">
                  <thead>
                    <th width="145px" style="font-weight:bold"><?php echo "Product Name"; ?></th>
                    <th width="145px" style="font-weight:bold"><?php echo "Quantity"; ?></th>
                    <th width="145px" style="font-weight:bold"><?php echo "Purchase Prices"; ?></th>
                    <th width="145px" style="font-weight:bold"><?php echo "Total Price"; ?></th>
                    <th width="48px" style="font-weight:bold"><?php echo "Action"; ?></th>
                    </thead>
                   
                  <tbody class="productlist">
                   </tbody>
                
                </table>

				

              </div>
			  
			  <table cellspacing="0" cellpadding="0" border="0" style="" class="flexme3">
      <tbody>
<?php
	$i = 0;
	foreach ($purchasereturns as $purchasereturn):?>
	
	<?php foreach($purchasereturn['PosPurchaseDetail'] as $purchaseretur):?>
	
	<?php  //pr($purchaseretur); ?>
	<tr>
		<td align='left'><div style='width: 100px;' class='alistname'><?php echo $purchaseretur['PosProduct']['name']; ?>&nbsp;</div></td>
		<td align='left'><div style='width: 100px;' class='alistname'><?php echo $purchaseretur['quantity']; ?>&nbsp;</div></td>
		<td align='left'><div style='width: 100px;' class='alistname'><?php echo $purchaseretur['PosProduct']['purchaseprice']; ?>&nbsp;</div></td>
		<td align='left'><div style='width: 100px;' class='alistname'><?php echo $purchaseretur['PosPurchase']['totalprice']; ?>&nbsp;</div></td>
		<td class="actions">
<div style='width: 180px;' class='alistname link_link'>			
			
		<button id="purchasereturn_<?php echo $purchasereturn['PosPurchase']['id'];?>" >Click here to return</button>
		</div>
		
		</td>
	</tr>
<?php endforeach; ?>

<?php endforeach; ?>





    </table>
	<!---------------------------------------------------------->

      </div>
    </div>
  </div>
  
  <!--============================= End Here Product Grids ==============-->
    <!--=============================Start Here Patient Test ==============-->
	
	<?php /*?><div id="PatientTestbox" class="widget color-blue">
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
			 <div id="WrapperPosdiscount" class="microcontroll"> 
			<?php echo $this->Form->label('PosSaleAmount.discount', __('Discount :'.'<span class="star">*</span>  ', true) ); ?> 
			<?php echo $this->Form->input('PosSaleAmount.discount',array('div'=>false,'label'=>false, 'class'=>'required'));?> 
			<div>
		 
			<div><input type="radio" name="data[PosSaleAmount][discount_type]" value="1" checked="checked" class="discounttype"/> BD</div>
			<div><input type="radio" name="data[PosSaleAmount][discount_type]" value="2"  class="discounttype" /> %</div>
			</div>
			</div>
            <div id="WrapperPosvat" class="microcontroll"> 
			<?php echo $this->Form->label('PosSaleAmount.vat', __('Vat :'.'<span class="star">*</span>  ', true) ); ?> 
			<?php echo $this->Form->input('PosSaleAmount.vat',array('div'=>false,'label'=>false, 'class'=>'required'));?> 
			</div>
			
			<div id="WrapperPospaytype" class="microcontroll"> 
			<?php echo $this->Form->label('PosSaleAmount.pay_type', __('Payment Type :'.'<span class="star">*</span>  ', true) ); ?> 
			<?php 
			      $card=array('1'=>'Card','2'=>'Cash');
			echo $this->Form->input('PosSaleAmount.pay_type',array('div'=>false,'label'=>false,'class'=>'required','options'=>$card));?> 
			</div>
			<div id="Wrappercardno" class="microcontroll"> 
			<?php echo $this->Form->label('PosSaleAmount.card_no', __('Card Number :'.'<span class="star">*</span>  ', true) ); ?> 
			<?php echo $this->Form->input('PosSaleAmount.card_no',array('div'=>false,'label'=>false,'class'=>'required'));?> 
			</div>
			<div id="WrapperPosamount" class="microcontroll" style="display:none"> 
			<?php echo $this->Form->label('PosSaleAmount.amount', __('Total Payment :'.'<span class="star">*</span>  ', true) ); ?> 
			<?php echo $this->Form->input('PosSaleAmount.amount',array('div'=>false,'label'=>false, 'class'=>'required'));?> 
			</div>
          </div>
          </fieldset>
        </div>
        <?php echo $this->Form->end();?>
      </div>
    </div>
  </div><?php */?>
  <!--============================= End Here Patient Test ==============-->

  <?php /*?><div style="clear:both"></div>
 <div id="PatientAccount" class="widget color-blue" style="width:630px;">
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
  </div><?php */?>
   
  <!--============================= End Here Patient Test ==============-->
<div class="clr"></div>
<div class="button_area" >
  <?php  echo $this->Form->button('Save',array( 'class'=>'submit', 'id'=>'btn_PosPurchase_add'));?>
  <?php  echo $this->Form->button('Cancel',array('type'=>'reset','name'=>'reset','id'=>'Cancel'));?>
  <?php echo $this->Form->end();?> 

</div>  
</div>

