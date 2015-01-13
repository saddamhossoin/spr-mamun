<div id="columns">
   <div id="PatientTestbox" class="widget color-blue">
    <div class="widget-head" style="cursor: move;">
      <h3>Sale Return</h3>
    </div>
    <div class="widget-content">
      <div class="PatientDetails form">
        <?php echo $this->Form->create('PosSaleReturn');?>
        <div id="productdetails" class="microcontroll">
          <fieldset>
			
			 
            <div id="WrapperItemCode" class="microcontroll"> 
			<?php echo $this->Form->label('PosSaleReturn.id', __('Enter Sale ID :'.'<span class="star"></span>', true) ); ?> 
			<?php echo $this->Form->input('PosSale.id',array('type'=>'text','div'=>false,'label'=>false,'class'=>''));?> 
			 </div>
			  
             <div id="WrapperPosSaleReturnPosCustomerId" class="microcontroll">
		<?php	echo $this->Form->label('PosSaleReturn.pos_customer_id', __('Customer Id'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('PosSaleReturn.pos_customer_id',array('div'=>false,'label'=>false,'class'=>'required'));?>
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
                <?php echo $this->Form->create('');?>
                <table class="pdetail">
                  <thead>
                    <th width="145px" style="font-weight:bold"><?php echo "Product Name"; ?></th>
                    <th width="145px" style="font-weight:bold"><?php echo "Product Brand"; ?></th>
                    <th width="145px" style="font-weight:bold"><?php echo "Product Category"; ?></th>
                    <th width="145px" style="font-weight:bold"><?php echo "Purchase Prices"; ?></th>
                    <th width="145px" style="font-weight:bold"><?php echo "Total Price"; ?></th>
                    <th width="48px" style="font-weight:bold"><?php echo "Action"; ?></th>
                    </thead>
                   
                  <tbody class="productlist">
                   </tbody>
                
                </table>
                 <?php echo $this->Form->end();?>
              </div>
			  
			  <table cellspacing="0" cellpadding="0" border="0" style="" class="flexme3">
      <tbody>
<?php
	$i = 0;
	foreach ($purchasereturns as $purchasereturn):
		
	?>
	<tr>
		<td align='left'><div style='width: 100px;' class='alistname'><?php echo $purchasereturn['PosProduct']['name']; ?>&nbsp;</div></td>
		<td align='left'><div style='width: 100px;' class='alistname'><?php echo $purchasereturn['PosProduct']['pos_brand_id']; ?>&nbsp;</div></td>
		<td align='left'><div style='width: 100px;' class='alistname'><?php echo $purchasereturn['PosProduct']['pos_pcategory_id']; ?>&nbsp;</div></td>
		<td align='left'><div style='width: 100px;' class='alistname'><?php echo $purchasereturn['PosProduct']['purchaseprice']; ?>&nbsp;</div></td>
		<td align='left'><div style='width: 100px;' class='alistname'><?php echo $purchasereturn['PosPurchase']['totalprice']; ?>&nbsp;</div></td>
		<td class="actions">
<div style='width: 180px;' class='alistname link_link'>			
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $purchasereturn['PosPurchaseReturn']['id']), array('class'=>'link_delete action_link'), sprintf(__('Are you sure you want to delete # %s?', true), $purchasereturn['PosPurchaseReturn']['id'])); ?>
		</div></td>
	</tr>
<?php endforeach; ?>
    </table>
	<!---------------------------------------------------------->

      </div>
    </div>
 
  </div>
  
  
  
  
</div>




