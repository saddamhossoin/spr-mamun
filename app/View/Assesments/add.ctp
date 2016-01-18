<?php  //pr($serviceDeviceInfo);?>
<div class="assesments form assmentadd">
   <div class="reciveDeviceContact reciveDevice">
<div class="blocktitleinfo"> Service Information
<?php echo "<span class='serial_no'>".'Recive ID : '.$serviceDeviceInfo['ServiceDeviceInfo']['id']."</span>";?>

 <?php
 $urgent_class = '';
		if($serviceDeviceInfo['ServiceDeviceInfo']['is_urgent'] == 1)
		{$urgent_class = 'urgent_class';}else{$urgent_class = '';}
 
  if(!empty($serviceDeviceInfo['ServiceDeviceInfo']['checklist'])){?>
    <span id="view_checklist">View Checklist</span>
    <?php }
	 
	if(!empty($serviceDeviceInfo['ServiceDeviceInfo']['screenimage'])){  ?>
    <span id="view_Service_Image" class="btn_view_image_link" title="<?php echo $serviceDeviceInfo['ServiceDeviceInfo']['id'];?>">Image</span>
     <?php } ?>
     <span id="view_Service_Note" class="btn_view_image_link" title="<?php echo $serviceDeviceInfo['ServiceDeviceInfo']['id'];?>">Note</span>
</div>
  <div class="rdcontent_left">
  <table  class="assesmentSDIGrid">
 <thead>
      <tr>
             <td colspan="2" class="headingtag <?php echo $urgent_class; ?>">User Details&nbsp;</td>
             <td colspan="2" class="headingtag <?php echo $urgent_class; ?>">Device Details&nbsp;</td>
             <td colspan="2" class="headingtag <?php echo $urgent_class; ?>">Defect Details&nbsp;</td>
      </tr>
  </thead>
  <tbody>
  <tr>
    <td>Email&nbsp;</td>
    <td><?php echo $serviceDeviceInfo['User']['email_address'];?>&nbsp;</td>
    <td>Type&nbsp;</td>
    <td><?php echo $serviceDeviceInfo['ServiceDevice']['PosPcategory']['name'];?>&nbsp;</td>
    <td>Defects&nbsp;</td>
    <td><?php
 				if(!empty($serviceDeviceInfo['ServiceDeviceDefect'])){
 					foreach($serviceDeviceInfo['ServiceDeviceDefect'] as $defectlist){
 						echo $ServiceDeviceDefects[$defectlist['service_defect_id']] ." , ";
					}
				}else{
 					echo 'Defect not mention!!!';
				}?>
                &nbsp;</td>
  </tr>
  <tr>
    <td>Name&nbsp;</td>
    <td><?php echo $serviceDeviceInfo['User']['firstname'].' '.$serviceDeviceInfo['User']['lastname'];?>&nbsp;</td>
    <td>Brand&nbsp;</td>
    <td><?php echo $serviceDeviceInfo['ServiceDevice']['PosBrand']['name'];?>&nbsp;</td>
    <td>Acessories&nbsp;</td>
    <td><?php  
			//pr($serviceDeviceInfo);
			if(!empty($serviceDeviceInfo['ServiceDeviceAcessory'])){
 		foreach($serviceDeviceInfo['ServiceDeviceAcessory'] as $accesorylist){
    		echo $ServiceDeviceAcessories[$accesorylist['service_acessory_id']] ." , ";
			}
		}else{
 			echo 'Acessory not mention!!!';
		}?>&nbsp;</td>

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
   
     <td>PREVENTIVO&nbsp;</td>
            <td><?php 
			
			if($serviceDeviceInfo['ServiceDeviceInfo']['is_customer_confirmation']==1){
			   echo "Yes";
			}
			else{
				echo "No";
			}?>&nbsp;</td>
            <td>Est. Budget&nbsp;</td>
            <td colspan="0"><?php echo $serviceDeviceInfo['ServiceDeviceInfo']['estimated_budget'];?>&nbsp;</td>

  </tr>
  <tr>
        <td>Data Backup&nbsp;</td>
        <td><?php if($serviceDeviceInfo['ServiceDeviceInfo']['is_data_backup'] == 1){echo "Yes";}else{ echo "No";};?>&nbsp;</td>
        <td>SIM Lock&nbsp;</td>
        <td><?php  echo $serviceDeviceInfo['ServiceDeviceInfo']['is_sim_pc_Lock']; ?>&nbsp;</td>
        <td>Phone Lock&nbsp;</td>
        <td><?php echo $serviceDeviceInfo['ServiceDeviceInfo']['is_phone_block'];?>&nbsp;</td>
          </tr>
           <tr>
            <td>Description&nbsp;</td>
            <td colspan="6"><?php echo $serviceDeviceInfo['ServiceDeviceInfo']['description'];?>&nbsp;</td>
          </tr>
  </tbody>
</table>
  </div>
 	<div class="clr"></div>
 </div>
 
    <span id="ServiceDeviceInfo_id" style=" display:none"><?php echo $serviceDeviceInfo['ServiceDeviceInfo']['id'];?></span>
  <div class="reciveDeviceAssesment reciveDevice">
    <div class="blocktitleinfo"> Assesment</div>
    <div class="reciveDeviceAssesmentContent">
      <?php 
 		$assesmentInfo = $serviceDeviceInfo['Assesment']  ;
	 	//pr($assesmentInfo );	 
   		if(empty($assesmentInfo['id'])){
			echo $this->Form->create('Assesment',array('enctype' => 'multipart/form-data','type'=>'file'));?>
      <?php echo $this->Form->input('Assesment.service_device_info_id',array('value'=>$serviceDeviceInfo['ServiceDeviceInfo']['id'],'type'=>'hidden','div'=>false  ));?>
      <div class="rdcontent_left1">
        <div id="WrapperAssesmentDeliveryDate" class="microcontroll">
          <?php	echo $this->Form->label('Assesment.delivery_date', __('Delivery Date'.':<span class=star>*</span>', true) );?>
          <?php	echo $this->Form->input('Assesment.delivery_date',array('div'=>false,'type'=>'text','label'=>false,'class'=>'required', 'value'=>date("Y-m-d H:m:s")));?>
          <div id="WrapperAssesmentDescription" class="microcontroll">
            <?php	echo $this->Form->label('Assesment.description', __('Description'.':', true) );?>
            <?php	echo $this->Form->input('Assesment.description',array('div'=>false,'label'=>false,'class'=>'','rows'=>2));?>
          </div>
           <div id="WrapperAssesmentDescription" class="microcontroll">
		<?php  	echo $this->Form->label('Assesment.asscheckImage', __('Image'.' :<span class=star></span>', true) );?>
        <?php   echo $this->Form->input('Assesment.asscheckImage',array('type'=>'file','div'=>false,'label'=>false,'class'=>'' ));   ?>     
       </div>
        </div>
      </div>
      <div class="rdcontent_right">
        <div id="WrapperAssesmentDescription" class="microcontroll">
          <?php	echo $this->Form->label('Assesment.note', __('Note'.':', true) );?>
          <?php	echo $this->Form->input('Assesment.note',array('div'=>false,'label'=>false,'class'=>'','rows'=>3));?>
        </div>
        <div class="button_area ba_assmentsave"> <?php echo $this->Form->button('Save',array( 'class'=>'submit', 'id'=>'btn_Assesment_add'));?> </div>
      </div>
      <div class="clr"></div>
      <?php echo $this->Form->end();	}else{?>
      <div class="assesments view">
        <?php	echo $this->Form->input('Assesment.id',array('value'=>$assesmentInfo['id'],'type'=>'hidden'));?>
        <table cellpadding="0" cellspacing="0" class="view_table">
          <?php $i = 0; $class = '';?>
          <?php $i++;?>
          <tr <?php if ($i % 2 == 0) echo $class;?>>
            <td><?php echo __('Delivery Date'); ?></td>
            <td> : </td>
            <td ><?php echo date('Y/m/d G:i:s',strtotime($assesmentInfo['delivery_date'])); ?>&nbsp; <?php echo $this->Html->link(__('Update', true), array('action' => 'edit', $assesmentInfo['id']),array('class'=>'link_edit action_link','id'=>'btn_Assesment_edit')); ?></td>
          </tr>
          <?php $i++;?>
          <tr <?php if ($i % 2 == 0) echo $class;?>>
            <td><?php echo __('Description'); ?></td>
            <td> : </td>
            <td><?php echo $assesmentInfo['description']; ?>&nbsp; </td>
          </tr>
          <?php $i++;?>
          <tr <?php if ($i % 2 == 0) echo $class;?>>
            <td><?php echo __('Note'); ?></td>
            <td> : </td>
            <td ><?php echo $assesmentInfo['note'];  ?>&nbsp;</td>
          </tr>
          <?php $i++;?>
        </table>
      </div>
      <?php }?>
    </div>
  </div>
  <div class="clr"></div>
  <div class="reciveDeviceAssementInventory reciveDevice" style=" <?php if(empty($assesmentInfo['id'])){ echo "display:none" ; }else{ echo "display:block";}?>">
    <div class="blocktitleinfo"> Inventory <span id="add_inventory">Add Inventory</span></div>
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
            <th width="10%">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
	 $assesmentInventories = $serviceDeviceInfo['Assesment']['AssesmentInventory'];
    $calculat_in_tot = 0;
	if(!empty($assesmentInventories)){
	
  
 		$i = 0;
		foreach ($assesmentInventories as $assesmentInventory):
 			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow inventory"';
			}
			else{
				$class = ' class="inventory"';
			}
			 $productInfos =  $this->requestAction(array('controller' => 'PosProducts', 'action' => 'getProductInfo', $assesmentInventory['pos_product_id'], 'return'));
 	?>
          <tr <?php echo $class;?> id="AssesmentInventoryTr_<?php echo $assesmentInventory['id']?>">
            <td><?php echo $productInfos['PosProduct']['name'] ?></td>
            <td><?php echo $productInfos['PosBrand']['name'] ?></td>
            <td><?php echo $productInfos['PosPcategory']['name'] ?></td>
            <td><?php echo $assesmentInventory['quantity']  ?></td>
            <td><?php echo $assesmentInventory['price']  ?></td>
            <td class="inventorytotalpriceli"><?php echo  $assesmentInventory['quantity'] * $assesmentInventory['price'];
			
			 $calculat_in_tot  = $calculat_in_tot + ($assesmentInventory['quantity'] * $assesmentInventory['price']); 
			 
			  ?></td>
            <td class="actions"><?php echo $this->Html->link(__('Remove', true), array('controller'=>'#','action' => '#'),array('id'=>'AssesmentInventoryRemove_'.$assesmentInventory['id'],'class'=>'AssesmentInventoryRemove link_view action_link')); ?></td>
          </tr>
          <?php endforeach; ?>
        </tbody>
        <?php }?>
      </table>
    </div>
    <div class="clr"></div>
  </div>
  <div class="clr"></div>
  <div class="reciveDeviceAssementService reciveDevice" style=" <?php if(empty($assesmentInfo['id'])){ echo "display:none" ; }else{ echo "display:block";}?>">
    <div class="blocktitleinfo"> Service Inventory <span id="add_Service">Add Service</span></div>
    <div class="bDiv" style="height: auto;">
      <table cellspacing="0" cellpadding="0" border="0" style="" class=" view_table">
        <thead>
          <tr>
            <th width="27%">Service</th>
             <th width="15%">Price</th>
            <th width="10%">Quantity</th>
            <th width="10%">Item Total</th>
            <th width="10%">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
	 
	 $assesmentServices = $serviceDeviceInfo['Assesment']['AssesmentService'];
	// pr($assesmentServices );
	 $calculat_ser_tot = 0;
  if(!empty($assesmentServices)){
	
	 
  
 		$i = 0;
		foreach ($assesmentServices as $assesmentService):
 			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow assesmentservice"';
			}
			else{
				$class = ' class="assesmentservice"';
			}
 			  //pr($assesmentService['service_service_id']);
			 $serviceInfo =  $this->requestAction(array('controller' => 'ServiceServices', 'action' => 'getServiceInfo', $assesmentService['service_service_id'], 'return'));
			  //pr($serviceInfo );
  	?>
          <tr <?php echo $class;?> id="AssesmentServiceTr_<?php echo $assesmentService['id']?>">
            <td><?php echo $serviceInfo['ServiceService']['name'] ?></td>
             <td><?php echo $assesmentService['price'] ?></td>
            <td><?php echo $assesmentService['quantity']  ?></td>
            <td class="servicetotalpriceli"><?php echo $assesmentService['quantity'] * $assesmentService['price']; 
					$calculat_ser_tot = $calculat_ser_tot +($assesmentService['quantity'] * $assesmentService['price']);
			 ?></td>
            <td class="actions"><?php echo $this->Html->link(__('Remove', true), array('controller'=>'#','action' => '#'),array('id'=>'AssesmentServiceRemove_'.$assesmentService['id'],'class'=>'AssesmentServiceRemove link_view action_link')); ?></td>
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

<div class="reciveDeviceAssesmentInvoice reciveDevice" style=" <?php if(empty($assesmentInfo['id'])){ echo "display:none" ; }else{ echo "display:block";}?>">

  <div class="blocktitleinfo"> Invoice </div>
  <div class="reciveDeviceAssesmentInvoice">
   <?php echo $this->Form->create('ServiceInvoice');
	   
	   if($serviceDeviceInfo['ServiceDeviceInfo']['status'] == 7 ){
		 echo $this->Form->hidden('ServiceInvoice.is_front_desk_assgn_tech',array('value'=>'yes','type'=>'hidden','div'=>false,'label'=>false,'class'=>''));			
	   }
   
   ?>
    <?php	
			   if(!empty($serviceDeviceInfo['ServiceInvoice']['id'])){
			   echo $this->Form->input('ServiceInvoice.id',array('value'=>$serviceDeviceInfo['ServiceInvoice']['id'],'type'=>'hidden','div'=>false,'label'=>false,'class'=>''));}
			   ?>
    <?php	echo $this->Form->input('ServiceInvoice.service_device_info_id',array('value'=>$serviceDeviceInfo['ServiceDeviceInfo']['id'],'type'=>'hidden','div'=>false,'label'=>false,'class'=>''));?>
    <div class="rdcontent_left1">
      <div id="WrapperServiceInvoiceInventoryTotal" class="microcontroll">
        <?php	echo $this->Form->label('ServiceInvoice.inventory_total', __('Inventory Total'.':<span class=star>*</span>', true) );?>
        <?php	
	//pr($calculat_in_tot); die('jewle');
		if(empty($serviceDeviceInfo['ServiceInvoice']['inventory_total'])){
			$serviceDeviceInfo['ServiceInvoice']['inventory_total'] = $calculat_in_tot;
		}
		if(empty($serviceDeviceInfo['ServiceInvoice']['service_total'])){
					$serviceDeviceInfo['ServiceInvoice']['service_total'] = $calculat_ser_tot;
		}
		 
		
		echo $this->Form->input('ServiceInvoice.inventory_total',array('type'=>'text','readonly'=>'readonly','div'=>false,'label'=>false,'class'=>'', 'value'=> $serviceDeviceInfo['ServiceInvoice']['inventory_total']));?>
      </div>
      
    
      <div id="WrapperServiceInvoiceSubTotal" class="microcontroll">
        <?php	echo $this->Form->label('ServiceInvoice.sub_total', __('Sub Total'.':<span class=star>*</span>', true) );?>
       
        <?php	
		 
		
		echo $this->Form->input('ServiceInvoice.sub_total',array('type'=>'text','readonly'=>'readonly','div'=>false,'label'=>false,'class'=>'', 'value'=> $serviceDeviceInfo['ServiceInvoice']['inventory_total'] +$serviceDeviceInfo['ServiceInvoice']['service_total']));?>
      </div>
      
      
      <?php	echo $this->Form->input('ServiceInvoice.hiddenvat',array('type'=>'hidden','value'=>$tax,'readonly'=>'readonly','div'=>false,'label'=>false,'class'=>''));?>
      
    </div>
    <div class="rdcontent_right">
       
      <div id="WrapperServiceInvoiceServiceTotal" class="microcontroll">
        <?php	echo $this->Form->label('ServiceInvoice.service_total', __('Service Total'.':<span class=star>*</span>', true) );?>
        <?php	
 		echo $this->Form->input('ServiceInvoice.service_total',array('type'=>'text','readonly'=>'readonly','div'=>false,'label'=>false,'class'=>'', 'value'=> $serviceDeviceInfo['ServiceInvoice']['service_total']   ));?>
      </div> 
      <div id="WrapperServiceInvoiceVat" class="microcontroll">
        <?php	echo $this->Form->label('ServiceInvoice.vat', __('Vat'.':<span class=star>*</span>', true) );?>
       
 
  <div id="WrapperServiceDeviceInfoIsAssesmentVat" class="microcontroll">
		 
		<?php	
 				$options = array(
					'0' => 'No',
					'1' => 'Yes'
				);
				
				$attributes = array(
					'legend' => false,
					'class'=>'required',
					'value' => $serviceDeviceInfo['ServiceInvoice']['is_assesment_vat']
				);
				
				echo $this->Form->radio('ServiceInvoice.is_assesment_vat', $options, $attributes);
		 		//echo $this->Form->input('ServiceDeviceInfo.is_phone_block',array('div'=>false,'label'=>false,'class'=>'required'));?>
                <div id="ServiceDeviceInfoVatDiv">
                 <?php	
		if(  (int)$serviceDeviceInfo['ServiceInvoice']['vat'] > 0){
 			$serviceDeviceInfo['ServiceInvoice']['vat'] = (($serviceDeviceInfo['ServiceInvoice']['inventory_total'] +$serviceDeviceInfo['ServiceInvoice']['service_total'])*22)/100;
		}
		echo $this->Form->input('ServiceInvoice.vat',array('type'=>'text','readonly'=>'readonly','div'=>false,'label'=>false,'class'=>'required two_digit', 'value'=> $serviceDeviceInfo['ServiceInvoice']['vat']));?>
                </div>
		</div>
     
        
      </div>
     </div>
      <div class="clr"></div>
    <div id="WrapperServiceInvoiceTotala" class="microcontroll">
        <?php	echo $this->Form->label('ServiceInvoice.total', __('Total'.':<span class=star>*</span>', true) );?>
        <?php
 		if(empty($serviceDeviceInfo['ServiceInvoice']['total'])){
			$serviceDeviceInfo['ServiceInvoice']['total'] = $serviceDeviceInfo['ServiceInvoice']['inventory_total'] + $serviceDeviceInfo['ServiceInvoice']['service_total'] + $serviceDeviceInfo['ServiceInvoice']['vat'];
		}
		
		echo $this->Form->input('ServiceInvoice.total',array('type'=>'text','readonly'=>'readonly','div'=>false,'label'=>false,'class'=>'required', 'value'=> $serviceDeviceInfo['ServiceInvoice']['total']));?>
      </div>
    <div class="clr"></div>
    <?php echo $this->Form->end();?> </div>
</div>


<div class="button_area button_are_save" style=" <?php if(empty($assesmentInfo['id'])){ echo "display:none" ; }else{ echo "display:block";}?>"> 
<p class="save_approve_btn_receive">
	<?php 
	if($serviceDeviceInfo['ServiceDeviceInfo']['status'] == 7 ){
	
		echo $this->Form->button('Save & Stock Out',array( 'class'=>'submit save_btn_receive', 'id'=>'btn_save_stock_out'));
	}else{
		echo $this->Form->button('Save',array( 'class'=>'submit save_btn_receive', 'id'=>'btn_full_Assesment_add'));
 		echo $this->Form->button('Save & Approve',array( 'class'=>'submit save_approve_btn', 'id'=>'btn_full_Assesment_add_approve')); 	}?>
    
 	<?php echo $this->Form->button('Cancel',array('type'=>'reset','name'=>'reset','id'=>'Cancel'));?> 
    </p>

</div>

 <div style="display: none;" class="overlaydiv">&nbsp;</div>
 <?php  
		echo $this->Html->css(array('module/Assesments/add')); 
  	 	echo $this->Html->script(array('common/form','common/jquery.validate','common/jquery-ui-timepicker-addon'));
		echo $this->Html->css(array('common/jquery-ui-timepicker-addon')); 
		echo $this->Html->script(array('module/Assesments/add'));
 ?>
 
 