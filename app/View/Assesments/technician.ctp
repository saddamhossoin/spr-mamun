<?php    //pr($serviceDeviceInfo);?>
<div class="assesments form assmentadd">
	<div class="reciveDeviceContact reciveDevice">
<div class="blocktitleinfo"> Service Information</div>
  <div class="rdcontent_left">
  <table  class="assesmentSDIGrid">
 <thead>
  <tr>
    <td colspan="2" class="headingtag">User Details&nbsp;</td>
    <td colspan="2" class="headingtag">Device Details&nbsp;</td>
    <td colspan="2" class="headingtag">Defect Details&nbsp;</td>
  </tr>
  </thead>
  <tbody>
  <tr>
    <td>Email&nbsp;</td>
    <td><?php echo $serviceDeviceInfo['User']['email_address'];?>&nbsp;</td>
    <td>Type&nbsp;</td>
    <td><?php echo $serviceDeviceInfo['ServiceDevice']['PosPcategory']['name'];?>&nbsp;</td>
    <td>Defects&nbsp;</td>
    <td><?php echo $serviceDeviceInfo['ServiceDeviceInfo']['defect_state'];?>&nbsp;</td>
  </tr>
  <tr>
    <td>Name&nbsp;</td>
    <td><?php echo $serviceDeviceInfo['User']['name'];?>&nbsp;</td>
    <td>Brand&nbsp;</td>
    <td><?php echo $serviceDeviceInfo['ServiceDevice']['PosBrand']['name'];?>&nbsp;</td>
    <td>Acessories&nbsp;</td>
    <td><?php echo $serviceDeviceInfo['ServiceDeviceInfo']['acessories'];?>&nbsp;</td>

  </tr>
   <tr>
    <td>Phone&nbsp;</td>
    <td><?php echo $serviceDeviceInfo['User']['phone'];?>&nbsp;</td>
    <td>Name&nbsp;</td>
    <td><?php echo $serviceDeviceInfo['ServiceDevice']['name'];?>&nbsp;</td>
    <td>Rec. Date&nbsp;</td>
    <td><?php echo $serviceDeviceInfo['ServiceDeviceInfo']['recive_date'];?>&nbsp;</td>

  </tr>
   <tr>
    <td>P.IVA&nbsp;</td>
    <td><?php echo $serviceDeviceInfo['User']['piva'];?>&nbsp;</td>
    <td>Serial&nbsp;</td>
    <td><?php echo $serviceDeviceInfo['ServiceDeviceInfo']['serial_no'];?>&nbsp;</td>
    <td>Est. Date&nbsp;</td>
    <td><?php echo $serviceDeviceInfo['ServiceDeviceInfo']['estimated_date'];?>&nbsp;</td>

  </tr>
   <tr>
    <td>Address&nbsp;</td>
    <td><?php echo $serviceDeviceInfo['User']['address'];?>&nbsp;</td>
   
    <td>Description&nbsp;</td>
    <td colspan="3"><?php echo $serviceDeviceInfo['ServiceDeviceInfo']['description'];?>&nbsp;</td>

  </tr>
  </tbody>
</table>
  </div>
 	<div class="clr"></div>
 </div>
  
 	<div class="reciveDeviceAssesment reciveDevice">
    
	<div class="blocktitleinfo"> Assesment</div>
		<div class="reciveDeviceAssesmentContent">	
		<?php 
		
		$assesmentInfo = $serviceDeviceInfo['Assesment']['0'];
 		if(empty($assesmentInfo)){
			echo $this->Form->create('Assesment',array('action'=>'add'));?>
		<?php echo $this->Form->input('Assesment.service_device_info_id',array('value'=>$serviceDeviceInfo['ServiceDeviceInfo']['id'],'type'=>'hidden','div'=>false  ));?>
  		<div class="rdcontent_left1">
  		<div id="WrapperAssesmentDeliveryDate" class="microcontroll">
			<?php	echo $this->Form->label('Assesment.delivery_date', __('Delivery Date'.':<span class=star>*</span>', true) );?>
			<?php	echo $this->Form->input('Assesment.delivery_date',array('div'=>false,'type'=>'text','label'=>false,'class'=>'required', 'value'=>date("Y-m-d H:m:s")));?>
        
		<div id="WrapperAssesmentDescription" class="microcontroll">
			<?php	echo $this->Form->label('Assesment.description', __('Description'.':', true) );?>
			<?php	echo $this->Form->input('Assesment.description',array('div'=>false,'label'=>false,'class'=>'','rows'=>2));?>
		</div>
		</div>
         </div>
        <div class="rdcontent_right">
         <div id="WrapperAssesmentDescription" class="microcontroll">
	<?php	echo $this->Form->label('Assesment.note', __('Note'.':', true) );?>
	<?php	echo $this->Form->input('Assesment.note',array('div'=>false,'label'=>false,'class'=>'','rows'=>3));?>
		</div>
		<div class="button_area ba_assmentsave">
		<?php echo $this->Form->button('Save',array( 'class'=>'submit', 'id'=>'btn_Assesment_add'));?>
 		
		</div>
        </div>
		<div class="clr"></div>
		<?php echo $this->Form->end();	}else{
 		   ?>
		 <div class="assesments view">
         <?php	echo $this->Form->input('Assesment.id',array('value'=>$assesmentInfo['id'],'type'=>'hidden'));?> 
 			<table cellpadding="0" cellspacing="0" class="view_table">
				<?php $i = 0; $class = '';?>
                 <?php $i++;?>
                <tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo __('Delivery Date'); ?></td><td> : </td>
				<td ><?php echo date('Y/m/d G:i:s',strtotime($assesmentInfo['delivery_date'])); ?>&nbsp; 
                <?php echo $this->Html->link(__('Update', true), array('action' => 'edit', $assesmentInfo['id']),array('class'=>'link_edit action_link','id'=>'btn_Assesment_edit')); ?>
                </td>
                </tr>
		 		
				<?php $i++;?>
                <tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo __('Description'); ?>
                </td><td> : </td>
                <td><?php echo $assesmentInfo['description']; ?>&nbsp;	</td>
                </tr>
				<?php $i++;?>
                <tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo __('Note'); ?></td><td> : </td>
                <td ><?php echo $assesmentInfo['note'];  ?>&nbsp;</td></tr>
   	  			<?php $i++;?>
                </table>
                </div>
  <?php }?>
	</div>
  </div>
  <div class="clr"></div>
 
 	<div class="reciveDeviceAssementInventory reciveDevice" style=" <?php if(empty($assesmentInfo)){ echo "display:none" ; }else{ echo "display:block";}?>">
 		<div class="blocktitleinfo"> Inventory  </div>
		
        
   <div class="bDiv" style="height: auto;">
 
   <table cellspacing="0" cellpadding="0" border="0" style="" class=" view_table">
   <thead>
        <tr>
        <th>Product</th>
        <th>Brand</th>
        <th>Category</th>
        <th>Quantity</th>
        <th>Price</th>
        <th>Item Total</th>
         
        </tr>
   </thead>
    <tbody>
	<?php
	 $assesmentInventories = $serviceDeviceInfo['Assesment']['0']['AssesmentInventory'];
  if(!empty($assesmentInventories)){
  
 		$i = 0;
		foreach ($assesmentInventories as $assesmentInventory):
 			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
			$productInfos =  $this->requestAction(array('controller' => 'PosProducts', 'action' => 'getProductInfo', $assesmentInventory['pos_product_id'], 'return'));
 	?>
		<tr <?php echo $class;?> id="AssesmentInventoryTr_<?php echo $assesmentInventory['id']?>">
            <td> <?php echo $productInfos['PosProduct']['name'] ?></td>
            <td> <?php echo $productInfos['PosBrand']['name'] ?></td>
            <td> <?php echo $productInfos['PosPcategory']['name'] ?></td>
            <td> <?php echo $assesmentInventory['quantity']  ?></td>
            <td> <?php echo $assesmentInventory['price']  ?></td>
            <td> <?php echo $assesmentInventory['quantity'] * $assesmentInventory['price'];  ?></td>
 			 
	</tr>
<?php endforeach; ?>
</tbody>
<?php }?>
    </table>
     </div>
      	<div class="clr"></div> 
    </div>
    <div class="clr"></div> 
	
	<div class="reciveDeviceAssementService reciveDevice" style=" <?php if(empty($assesmentInfo)){ echo "display:none" ; }else{ echo "display:block";}?>">
 		<div class="blocktitleinfo"> Service Inventory  </div>
    <div class="bDiv" style="height: auto;">
    <table cellspacing="0" cellpadding="0" border="0" style="" class=" view_table">
   <thead>
        <tr>
        <th width="27%">Service</th>
        <th width="28%"> Device </th>
		<th width="15%">Price</th>
		<th width="10%">Quantity</th>
		<th width="10%">Item Total</th>
         
		
        </tr>
   </thead>
    <tbody>
	<?php
	 
	 $assesmentServices = $serviceDeviceInfo['Assesment']['0']['AssesmentService'];
  if(!empty($assesmentServices)){
  
 		$i = 0;
		foreach ($assesmentServices as $assesmentService):
 			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
 			// pr($assesmentService);
			 $serviceInfo =  $this->requestAction(array('controller' => 'ServiceServices', 'action' => 'getServiceInfo', $assesmentService['service_service_id'], 'return'));
			/// pr($serviceInfo );
  	?>
		<tr <?php echo $class;?> id="AssesmentServiceTr_<?php echo $assesmentService['id']?>">
            <td> <?php echo $serviceInfo['ServiceService']['name'] ?></td>
            <td> <?php echo $serviceInfo['ServiceDevice']['name'] ?></td>
            <td> <?php echo $assesmentService['price'] ?></td>
            <td> <?php echo $assesmentService['quantity']  ?></td>
             <td> <?php echo $assesmentService['quantity'] * $assesmentService['price'];  ?></td>
 			 
	</tr>
<?php endforeach; ?>
</tbody>
<?php }?>
    </table>
     </div>
      	<div class="clr"></div> 
    </div>
    <div class="clr"></div>  
 </div>
  
<?php echo $this->Html->css(array('module/Assesments/add')); ?>
<?php  	 echo $this->Html->script(array('common/form','common/jquery.validate','common/jquery-ui-timepicker-addon'));
		 echo $this->Html->css(array('common/jquery-ui-timepicker-addon')); 
		 echo $this->Html->script(array('module/Assesments/add'));?>

		
		<?php /*?> <div class="reciveDeviceAssesmentInvoice reciveDevice">
        <div class="blocktitleinfo"> Invoice </div>
            <div class="reciveDeviceAssesmentInvoice">	
              <?php echo $this->Form->create('ServiceInvoice');?>
              <?php	echo $this->Form->input('ServiceInvoice.service_device_info_id',array( 'type'=>'hidden','div'=>false,'label'=>false,'class'=>''));?>
            <div class="rdcontent_left1">
             <div id="WrapperServiceInvoiceInventoryCount" class="microcontroll">
            <?php	echo $this->Form->label('ServiceInvoice.inventory_count', __('Inventory Count'.':<span class=star>*</span>', true) );?>
            <?php	echo $this->Form->input('ServiceInvoice.inventory_count',array('div'=>false,'label'=>false,'class'=>'required'));?>
            </div>
    
            <div id="WrapperServiceInvoiceServiceCount" class="microcontroll">
            <?php	echo $this->Form->label('ServiceInvoice.service_count', __('Service Count'.':<span class=star>*</span>', true) );?>
            <?php	echo $this->Form->input('ServiceInvoice.service_count',array('div'=>false,'label'=>false,'class'=>'required'));?>
            </div>
    
            <div id="WrapperServiceInvoiceInventoryTotal" class="microcontroll">
            <?php	echo $this->Form->label('ServiceInvoice.inventory_total', __('Inventory Total'.':<span class=star>*</span>', true) );?>
            <?php	echo $this->Form->input('ServiceInvoice.inventory_total',array('div'=>false,'label'=>false,'class'=>'required'));?>
            </div>
    
            <div id="WrapperServiceInvoiceServiceTotal" class="microcontroll">
            <?php	echo $this->Form->label('ServiceInvoice.service_total', __('Service Total'.':<span class=star>*</span>', true) );?>
            <?php	echo $this->Form->input('ServiceInvoice.service_total',array('div'=>false,'label'=>false,'class'=>'required'));?>
            </div>
            
            </div>
            <div class="rdcontent_right">
              
             <div id="WrapperServiceInvoiceVat" class="microcontroll">
            <?php	echo $this->Form->label('ServiceInvoice.vat', __('Vat'.':<span class=star>*</span>', true) );?>
            <?php	echo $this->Form->input('ServiceInvoice.vat',array('div'=>false,'label'=>false,'class'=>'required'));?>
            </div>
    
            <div id="WrapperServiceInvoiceDiscount" class="microcontroll">
            <?php	echo $this->Form->label('ServiceInvoice.discount', __('Discount'.':<span class=star>*</span>', true) );?>
            <?php	echo $this->Form->input('ServiceInvoice.discount',array('div'=>false,'label'=>false,'class'=>'required'));?>
            </div>
    
            <div id="WrapperServiceInvoicePayableAmount" class="microcontroll">
            <?php	echo $this->Form->label('ServiceInvoice.payable_amount', __('Payable Amount'.':<span class=star>*</span>', true) );?>
            <?php	echo $this->Form->input('ServiceInvoice.payable_amount',array('div'=>false,'label'=>false,'class'=>'required'));?>
            </div>
    
            <div id="WrapperServiceInvoicePayment" class="microcontroll">
            <?php	echo $this->Form->label('ServiceInvoice.payment', __('Payment'.':<span class=star>*</span>', true) );?>
            <?php	echo $this->Form->input('ServiceInvoice.payment',array('div'=>false,'label'=>false,'class'=>'required'));?>
            </div>
    
            <div id="WrapperServiceInvoiceDue" class="microcontroll">
            <?php	echo $this->Form->label('ServiceInvoice.due', __('Due'.':<span class=star>*</span>', true) );?>
            <?php	echo $this->Form->input('ServiceInvoice.due',array('div'=>false,'label'=>false,'class'=>'required'));?>
            </div>
            </div>
            <div class="clr"></div>
            <?php echo $this->Form->end();?>
        </div>
      </div> 
	<div class="button_area">
		<?php echo $this->Form->button('Save',array( 'class'=>'submit', 'id'=>'btn_full_Assesment_add'));?>
		<?php echo $this->Form->button('Cancel',array('type'=>'reset','name'=>'reset','id'=>'Cancel'));?>
</div><?php */?>