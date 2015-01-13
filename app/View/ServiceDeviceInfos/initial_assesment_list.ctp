<?php $status=array(1=>"Receive",2=>"Assesment",3=>"Re-Assessment",4=>"Confirmation",5=>"Servicing",6=>"Complete Servicing",7=>"Testing",8=>"Awaiting for Delivery",9=>"Delivered",10=>"Check List",11=>"Check List Complete",12=>"CUSTOMER COMMUNICATION" , 13=>"AWAITING CONFIRMATION QUOTE" , 14=>"WAITING FOR PARTS"); ?>
<?php //pr($assessment_lists);?>
<?php echo $this->Html->css(array('common/grid'));?>

<div class="flexigrid" style="width: 100%;">
 <div class="mDiv">
  <div class="ftitle">
    <p> <?php echo $this->Paginator->counter(array(	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%')	));	?> </p>
  </div>
  <div id="searchlink"> &nbsp;</div>
</div>

<div class="tDiv">
  <div class="tDiv2">
   <?php echo $this->Form->create('ServiceDeviceInfo',array('controller' => 'ServiceDeviceInfos','action'=>'initial_assesment_list' ));?>
   
   <div id="WrapperTestName" class="microcontroll">
	<?php echo $this->Form->label('ServiceDevice.name', __('Device'.': <span class="star"></span>', true) ); ?>
    <?php echo $this->Form->input('ServiceDevice.name',array('type'=>'text','div'=>false,'label'=>false, 'size'=>25 ));?>
    
    <?php echo $this->Form->label('ServiceDeviceInfo.serial_no', __('Serial'.': <span class="star"></span>', true) ); ?>
    <?php echo $this->Form->input('ServiceDeviceInfo.serial_no',array('type'=>'text','div'=>false,'label'=>false, 'size'=>25 ));?>
   
    <?php echo $this->Form->label('PosCustomer.name', __('Customer'.': <span class="star"></span>', true) ); ?>
    <?php echo $this->Form->input('PosCustomer.name',array('type'=>'text','div'=>false,'label'=>false, 'size'=>25 ));?>
        
        <?php   echo $this->Form->label('ServiceDeviceInfo.name', __('Status'.': <span class="star"></span>', true),array('id'=>'filtermodifyedby')  );   	echo $this->Form->input('ServiceDeviceInfo.status',array('type'=>'select','options'=>$status,'div'=>false,'label'=>false,'class'=>'required select2as','empty'=>'-- Select Status --'));  
	  ?>
    </div>
   
   
   
   
   <?php echo $this->element('filter/commonfilter',array('cache' => array('time'=> '-7 days','key'=>'header')));?>
    <div class="button_area_filter">
     
      <?php echo $this->Form->button('Search',array( 'class'=>'submit', 'id'=>'btn_brand_search'));?>      
	  <?php echo $this->Form->button('Reset',array('type'=>'reset','name'=>'reset','id'=>'Cancel', 'onClick'=>"parent.location='".$this->webroot."ServiceDeviceInfos/initial_assesment_list/yes'"));?>     
    </div>
    </form>
  </div>
  <div style="clear: both;"></div>
</div>

<div class="bDiv" style="height: auto;">
<div class="hDiv">
  <div class="hDivBox">
    <table cellspacing="0" cellpadding="0">
      <thead>
        <tr>
          
         		
			<th align="left" width="6%"> <?php echo $this->Paginator->sort('recive_date');?> </th>
			<th align="left" width="6%"><?php echo $this->Paginator->sort('estimated_date','Estimated');?> </th>
            <th align="left" width="10%"><?php echo $this->Paginator->sort('status');?> </th>
			<th align="left" width="12%"><?php echo $this->Paginator->sort('pos_customer_id');?></th>
			<th align="left" width="11%"><?php echo $this->Paginator->sort('service_device_id');?></th>
            <th align="left" width="11%"><?php echo $this->Paginator->sort('serial_no');?></th>
            <th align="left" width="12%"><?php echo $this->Paginator->sort('tech_name');?></th>
            <th align="left" width="6%"><?php echo $this->Paginator->sort('inventory_total','Inventory');?></th>
			<th align="left" width="6%"><?php echo $this->Paginator->sort('service_total','Service');?></th>
            
		
	          <?php if($this->Session->read('username')=='Admin' || $this->Session->read('username')=='SuperAdmin'){?>          <th align="right"  > <?php echo $this->Paginator->sort('User','modifiedBy');?> </th>
           <?php } ?> 
              <th align="left" class="link_text" width="19%"> <?php echo 'Link';?> </th>
        </tr>
      </thead>
    </table>
  </div>
</div>
 
  <table cellspacing="0" cellpadding="0" border="0" style="" class="flexme3">
      <tbody>
<?php
    $purchaseDate = '';
	$i = 0;
	foreach ($assessment_lists as $assessment_list):
	
	  // pr($assessment_list);
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
		
		$dataDate = date('d / m / Y',strtotime($assessment_list['ServiceDeviceInfo']['created']));
			if($purchaseDate == "" ||  $dataDate!= $purchaseDate){
				echo "<tr><td colspan = '10' class = 'listDateHeading'>".$dataDate."</td></tr>";
				$purchaseDate = $dataDate;
			}
	?>
	<tr id='<?php echo 'row_'.$assessment_list['ServiceDeviceInfo']['id'];?>'  <?php echo $class;?>>
		
         
		<td align='left' class='alistname <?php if($assessment_list['ServiceDeviceInfo']['is_urgent'] == 1){echo 'is_urgent';}?>' width="6%"  ><?php echo $assessment_list['ServiceDeviceInfo']['recive_date']; ?>&nbsp;</div></td>
		<td align='left' class='alistname' width="6%"><?php echo $assessment_list['ServiceDeviceInfo']['estimated_date']; ?>&nbsp;</td>
        <td align='left' class='alistname' width="10%"><?php 
			
			switch($assessment_list['ServiceDeviceInfo']['status']){
				case 1:
				echo "<div class='link_view' id='Receive'>Receive</div>"; 
				break;
				case 2:
				 echo "<div class='link_view' id='wait_approve'>Assessment</div>"; 
				break;
				case 3:
				 echo "<div class='link_view' id='reassessment'>Re-Assessment</div>"; 
				break;
				case 4:
				 echo "<div class='link_view' id='Approved'>Confirmation</div>"; 
				break;
				case 5:
				 echo "<div class='link_view'>Servicing</div>"; 
				break;
				case 6:
				 echo "<div class='link_view'>Service Complete</div>"; 
				break;
				case 7:
				 echo "<div class='link_view'>Testing</div>"; 
				break;
				case 8:
				 echo "<div class='link_view'>Service delivery</div>"; 
				break;
				case 9:
				 echo "<div class='link_view'> Client Delivered</div>"; 
				break;
				case 10:
					 echo "<div class='link_view' id='check_list'>Check List</div>"; 
				break;
				case 11:
				 echo "<div class='link_view' id='check_complete'>Check List Complete</div>"; 
				break;
				case 12:
				 echo "<div class='link_view' id='check_complete'>CUSTOMER COMMUNICATION</div>"; 
				break;
				case 13:
				 echo "<div class='link_view' id='check_complete'>AWAITING CONFIRMATION QUOTE</div>"; 
				break;
				case 14:
				 echo "<div class='link_view' id='check_complete'>WAITING FOR PARTS</div>"; 
				break;
				case 15:
				 echo "<div class='link_view' id='check_complete'>Waiting for password/pin</div>"; 
				break;
				case 16:
				 echo "<div class='link_view' id='check_complete'>Sent Samsung/Nokia warranty</div>"; 
				break;
				case 17:
				 echo "<div class='link_view' id='check_complete'>Received from Samsung/Nokia warranty</div>"; 
				break;
				case 18:
				 echo "<div class='link_view' id='check_complete'>Returned at Samsung/Nokia warranty</div>"; 
				break;
 			}
 			?>&nbsp;
        </td>
		<td align='left' class='alistname' width="12%"> <?php echo $assessment_list['PosCustomer']['name']; ?>&nbsp; </td>
		<td align='left' class='alistname' width="11%"> <?php echo $assessment_list['ServiceDevice']['name']; ?>&nbsp; </td>
        <td align='left' class='alistname' width="11%"> <?php echo $assessment_list['ServiceDeviceInfo']['serial_no']; ?>&nbsp; </td>
         <td align='left' class='alistname' width="12%"> <?php echo $assessment_list['Assesment']['tech_name']; ?>&nbsp; </td>
        <td align='left' class='alistname' width="6%"> <?php echo $assessment_list['ServiceInvoice']['inventory_total']; ?>&nbsp; </td>
        <td align='left' class='alistname' width="6%"> <?php echo $assessment_list['ServiceInvoice']['service_total']; ?>&nbsp; </td>
         <td class="actions" width="19%" class='alistname link_link'> 
         <?php echo $this->Html->link(__('Print', true), array('action' => 'recieve', $assessment_list['ServiceDeviceInfo']['id']),array('class'=>'receive_invoice action_link printlink')); ?>
        

         <?php 
		  if(!empty($assessment_list['Assesment']['id'] )){
		  
		 echo $this->Html->link(__('Assesment', true), array('controller'=>'Assesments','action' => 'recieve', $assessment_list['ServiceDeviceInfo']['id']),array('class'=>'receive_invoice action_link AssesmentPrint' ));} ?>
        
<?php  if($assessment_list['ServiceDeviceInfo']['status']==2 || $assessment_list['ServiceDeviceInfo']['status']==12  || $assessment_list['ServiceDeviceInfo']['status']==13 || $assessment_list['ServiceDeviceInfo']['status']==14){?>
	   

<?php echo $this->Html->link(__('Waiting for Approve', true), array('controller'=>'AssesmentApproveNotes','action' =>'add',$assessment_list['ServiceDeviceInfo']['id']),array('class'=>'link_view action_link wait_approve1' )); ?>
<?php }


 echo $this->Html->link(__('Status Change', true), array('controller'=>'ServiceDeviceInfos','action' => 'changeStatus', $assessment_list['ServiceDeviceInfo']['id']),array('class'=>'action_link StatusChange' ));
 
// CUSTOMER COMMUNICATION.- AWAITING CONFIRMATION QUOTE- WAITING FOR PARTS 
?>


        </td>
 
	</tr>
<?php endforeach; ?>
    </table>
    </div>
    
    <div class="pDiv">
    <div class="pGroup">
     	 <?php if($this->params['paging']['ServiceDeviceInfo']['prevPage']){?>
      <span class='paginate_link'><?php echo $paginator->first();?></span> <span class='paginate_link'><?php echo $this->Paginator->prev('< ' . __('Previous', true), array(), null, array('class'=>'disabled','id'=>'prev_id'));?></span>
      <?php }?>
      <?php echo $this->Paginator->numbers();?>
      <?php if($this->params['paging']['ServiceDeviceInfo']['nextPage']){?>
      <span class='paginate_link'> <?php echo $this->Paginator->next(__('Next', true) . ' >', array(), null, array('class' => 'disabled','id'=>'next_id', 'span'=>false));?> </span> <span class='paginate_link'><?php echo $this->Paginator->last();?></span>
      <?php }?>
    </div>
  </div>     
</div>