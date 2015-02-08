<?php echo $this->Html->script(array('alert/alert')); ?>
<?php echo $this->Html->css(array('alert/css/alert','alert/themes/default/theme')); ?>
<?php echo $this->Html->css(array('common/grid'));
 echo $this->Html->script(array('common/form','common/jquery.validate'));  
 //pr($serviceDeviceInfo);
  $urgent_class = '';
		if($serviceDeviceInfo['ServiceDeviceInfo']['is_urgent'] == 1)
		{$urgent_class = 'urgent_class';}else{$urgent_class = '';}
?>
 <div id="columns">   
      <div class="reciveDeviceContact reciveDevice">
    <div class="blocktitleinfo"> Service Information
	<?php echo "<span class='serial_no'>".'Recive ID : '.$serviceDeviceInfo['ServiceDeviceInfo']['id']."</span>";?>
	</div>
    <div class="rdcontent_left">
      <table  class="assesmentSDIGrid">
        <thead>
          <tr>
            <td colspan="2" class="headingtag  <?php echo $urgent_class; ?>">User Details&nbsp;</td>
            <td colspan="2" class="headingtag  <?php echo $urgent_class; ?>">Device Details&nbsp;</td>
            <td colspan="2" class="headingtag  <?php echo $urgent_class; ?>">Defect Details&nbsp;</td>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Email&nbsp;</td>
            <td><?php echo $serviceDeviceInfo['User']['email_address'];?>&nbsp;</td>
            <td>Type&nbsp;</td>
            <td><?php echo $serviceDeviceInfo['ServiceDevice']['PosPcategory']['name'];?>&nbsp;</td>
            <td>Defects&nbsp;</td>
            <td> <?php
 				if(!empty($serviceDeviceInfo['ServiceDeviceDefect'])){
 					foreach($serviceDeviceInfo['ServiceDeviceDefect'] as $defectlist){
 						echo  $defectlist['ServiceDefect']['name'] ." , ";
					}
				}else{
 					echo 'Defect not mention!!!';
				}?>&nbsp;</td>
          </tr>
          <tr>
            <td>Name&nbsp;</td>
            <td><?php echo $serviceDeviceInfo['User']['firstname'] . ' '.$serviceDeviceInfo['User']['lastname'];?>&nbsp;</td>
            <td>Brand&nbsp;</td>
            <td><?php echo $serviceDeviceInfo['ServiceDevice']['PosBrand']['name'];?>&nbsp;</td>
            <td>Acessories&nbsp;</td>
            <td><?php if(!empty($serviceDeviceInfo['ServiceDeviceAcessory'])){
 		 		foreach($serviceDeviceInfo['ServiceDeviceAcessory'] as $accesorylist){
    		echo  $accesorylist['ServiceAcessory']['name'] ." , ";
			}
		}else{
 			echo 'Acessory not mention!!!';
		}
		?>&nbsp;</td>
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
	
 
     
    <div class="widget-content" id="PatientDetailscontent">
   <div class="flexigrid" style="width: 65%;" id="viewlist">
  
  <div class="reciveDeviceAssementInventory reciveDevice">
    <div class="blocktitleinfo"> Inventory </div>
    <div class="bDiv" style="height: auto;">
      <table cellspacing="0" cellpadding="0" border="0" style="" class=" view_table">
        <thead>
          <tr>
            <th style="width:40%">Product</th>
            <th>Brand</th>
            <th>Category</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Item Total</th>
           
          </tr>
        </thead>
        <tbody>
          <?php
	 $assesmentInventories = $serviceDeviceInfo['Assesment']['AssesmentInventory'];
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
            <td class="inventorytotalpriceli"><?php echo $assesmentInventory['quantity'] * $assesmentInventory['price'];  ?></td>
            
          </tr>
          <?php endforeach; ?>
        </tbody>
        <?php }?>
      </table>
    </div>
    <div class="clr"></div>
  </div>
  <div class="clr"></div>
   <div class="reciveDeviceAssementService reciveDevice">
    <div class="blocktitleinfo"> Service Inventory</div>
    <div class="bDiv" style="height: auto;">
      <table cellspacing="0" cellpadding="0" border="0" style="" class=" view_table">
        <thead>
          <tr>
            <th width="55%">Service</th>
            <th width="15%">Price</th>
            <th width="10%">Quantity</th>
            <th width="10%">Item Total</th>
          
          </tr>
        </thead>
        <tbody>
        
          <?php
	 
	$assesmentServices = $serviceDeviceInfo['Assesment']['AssesmentService'];
	// pr($serviceDeviceInfo);
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
			//pr($serviceInfo);
  	?>
          <tr <?php echo $class;?> id="AssesmentServiceTr_<?php echo $assesmentService['id']?>">
            <td>
			
			<?php echo $serviceInfo['ServiceService']['name'] ?>
      
             <?php 
            echo $this->Form->input("ServiceDevicesService.".$serviceInfo['ServiceDevicesService']['id'], array('type' => 'text', 'value' =>$serviceInfo['ServiceDevicesService']['id'], 'hidden' => true,'div'=>false,'label' => false)); ?>
            
            </td>
            <td><?php echo $assesmentService['price'] ?></td>
            <td><?php echo $assesmentService['quantity']  ?></td>
            <td class="servicetotalpriceli"><?php echo $assesmentService['quantity'] * $assesmentService['price'];  ?></td>
            
          </tr>
          <?php endforeach; ?>
        </tbody>
        <?php }?>
      </table>
    </div>
    <div class="clr"></div>
  </div>
    </div>
    
    
    <div id="invoicearea">
    <div class="reciveDeviceAssementInventory reciveDevice">
    <div class="blocktitleinfo"> Accounts </div>
    <div class="bDiv" style="height: auto;">
    
     <div class="reciveDeviceAssesmentInvoice">
   <?php echo $this->Form->create('ServiceInvoice');?>
    
	<?php if(!empty($serviceDeviceInfo['ServiceInvoice']['id'])){
			   echo $this->Form->input('ServiceInvoice.id',array('value'=>$serviceDeviceInfo['ServiceInvoice']['id'],'type'=>'hidden','div'=>false,'label'=>false,'class'=>''));}
			   ?>
    			<?php	echo $this->Form->input('ServiceInvoice.service_device_info_id',array('value'=>$serviceDeviceInfo['ServiceDeviceInfo']['id'],'type'=>'hidden','div'=>false,'label'=>false,'class'=>''));?>
   
     
      <div id="WrapperServiceInvoiceInventoryTotal" class="microcontroll">
        <?php	echo $this->Form->label('ServiceInvoice.inventory_total', __('Inventory Total'.':<span class=star>*</span>', true) );?>
        <?php	echo $this->Form->input('ServiceInvoice.inventory_total',array('type'=>'text','readonly'=>'readonly','div'=>false,'label'=>false,'class'=>'', 'value'=> $serviceDeviceInfo['ServiceInvoice']['inventory_total']));?>
      </div>
       <div id="WrapperServiceInvoiceServiceTotal" class="microcontroll">
        <?php	echo $this->Form->label('ServiceInvoice.service_total', __('Service Total'.':<span class=star>*</span>', true) );?>
        <?php	echo $this->Form->input('ServiceInvoice.service_total',array('type'=>'text','readonly'=>'readonly','div'=>false,'label'=>false,'class'=>'', 'value'=> $serviceDeviceInfo['ServiceInvoice']['service_total']   ));?>
      </div> 
       <div id="WrapperServiceInvoiceSubTotal" class="microcontroll">
        <?php	echo $this->Form->label('ServiceInvoice.sub_total', __('Sub Total'.':<span class=star>*</span>', true) );?>
        <?php	echo $this->Form->input('ServiceInvoice.sub_total',array('type'=>'text','readonly'=>'readonly','div'=>false,'label'=>false,'class'=>'', 'value'=> $serviceDeviceInfo['ServiceInvoice']['inventory_total'] +$serviceDeviceInfo['ServiceInvoice']['service_total']));?>
      </div>
       <div id="WrapperServiceInvoiceVat" class="microcontroll">
        <?php	echo $this->Form->label('ServiceInvoice.vat', __('Vat'.':<span class=star>*</span>', true) );?>
        <?php	echo $this->Form->input('ServiceInvoice.vat',array('type'=>'text','readonly'=>'readonly','div'=>false,'label'=>false,'class'=>'required', 'value'=> $serviceDeviceInfo['ServiceInvoice']['vat']));?>
          <?php  
		$is_tax =array('1'=>'Yes','0'=>'No');
		echo $this->Form->select('ServiceInvoice.is_tax', $is_tax , array('escape' => false,'empty'=>'-Tax-', 'class'=>'required select2as'))?>
      </div>
     
    <div id="WrapperServiceInvoiceTotala" class="microcontroll">
        <?php	echo $this->Form->label('ServiceInvoice.total', __('Total'.':<span class=star>*</span>', true) );?>
        <?php	echo $this->Form->input('ServiceInvoice.total',array('type'=>'text','readonly'=>'readonly','div'=>false,'label'=>false,'class'=>'required', 'value'=> $serviceDeviceInfo['ServiceInvoice']['total']));?>
      </div>
      <div id="WrapperServiceInvoiceTotala" class="microcontroll">
        <?php	echo $this->Form->label('ServiceInvoice.discount', __('Discount'.':<span class=star></span>', true) );?>
        <?php	echo $this->Form->input('ServiceInvoice.discount',array('type'=>'text','div'=>false,'label'=>false,'class'=>'','value'=>0));?>
      </div>
      <div id="WrapperServiceInvoiceTotala" class="microcontroll">
        <?php	echo $this->Form->label('ServiceInvoice.payable_amount', __('Payable '.':<span class=star>*</span>', true) );?>
        <?php	echo $this->Form->input('ServiceInvoice.payable_amount',array('type'=>'text','readonly'=>'readonly','div'=>false,'label'=>false,'class'=>'required' ));?>
      </div>
       <div id="WrapperServiceInvoiceTotala" class="microcontroll">
        <?php	echo $this->Form->label('ServiceInvoice.payment', __('Payment'.':<span class=star>*</span>', true) );?>
        <?php	echo $this->Form->input('ServiceInvoice.payment',array('type'=>'text','div'=>false,'label'=>false,'class'=>''));?>
        <?php  echo $this->Form->select('ServiceInvoice.account_head_id', $accountsHead , array('escape' => false,'empty'=>'-  Select Head -', 'class'=>'required select2as'))?>
        <div id="WrapperAccountsCheckNumber">
						
		</div>
      </div>
    <div class="clr"></div>
    <?php echo $this->Form->end();?> 
    
    </div>
    
    
    </div>
    </div>

  </div>
 
 

     
     
   <div class="clr"></div>
    <div class="button_area">
		<?php echo $this->Form->button('Save',array( 'class'=>'submit', 'id'=>'btn_save_clientDelivery','type'=>'submit'));?>
		<?php echo $this->Form->button('Cancel',array('type'=>'reset','name'=>'reset','id'=>'Cancel'));?>
		
</div>

<?php echo $this->Form->end();?>
</div>

<style type="text/css">
.purchase_return_class{
	width:90px !important;
	
}
.input text{
	display:none;
}
.accounts_infos{
	float:left;
	display:inline-block;
	width:150px;
	font-size:11px;
}
.microcontroll label{
	width:130px;
	float:left !important;
	font-weight: none !important; 
	}
#OrderNote{
	width:180px !important;
	}
#s2id_ServiceInvoiceIsTax , #s2id_ServiceInvoiceAccountHeadId{
	width:90px !important;
}

</style>

