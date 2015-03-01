<?php $status=array(1=>"Receive",2=>"Assesment",3=>"Re-Assessment",4=>"Confirmation",5=>"Servicing",6=>"Complete Servicing",7=>"Testing",8=>"Awaiting for Delivery",9=>"Delivered",10=>"Check List",11=>"Check List Complete",12=>"CUSTOMER COMMUNICATION" , 13=>"AWAITING CONFIRMATION QUOTE" , 14=>"WAITING FOR PARTS"); ?>
<div class="flexigrid" style="width: 100%;">
 <div class="mDiv">
  <div class="ftitle">
    <p> <?php echo $this->Paginator->counter(array(	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%')	));	?> </p>
  </div>
  <div id="searchlink"> &nbsp;</div>
</div>

<div class="tDiv">
  <div class="tDiv2">
   <?php echo $this->Form->create('ServiceDeviceInfo',array('controller' => 'serviceDeviceInfos','action'=>'index' ));?>
   
  	 <div id="WrapperTestName" class="microcontroll">
		<?php echo $this->Form->label('ServiceDevice.name', __('Device'.': <span class="star"></span>', true) ); ?>
        <?php echo $this->Form->input('ServiceDevice.name',array('type'=>'text','div'=>false,'label'=>false, 'size'=>25 ));?>
       
        <?php echo $this->Form->label('ServiceDeviceInfo.serial_no', __('Serial'.': <span class="star"></span>', true) ); ?>
        <?php echo $this->Form->input('ServiceDeviceInfo.serial_no',array('type'=>'text','div'=>false,'label'=>false, 'size'=>25 ));?>
         <?php echo $this->Form->label('User.email_address', __('Email Address'.': <span class="star"></span>', true) ); ?>
        <?php echo $this->Form->input('User.email_address',array('type'=>'text','div'=>false,'label'=>false, 'size'=>25,'required'=>false ));?>
      
 		<?php echo $this->Form->label('ServiceDevice.name', __('Brand'.': <span class="star"></span>', true),array('id'=>'filtermodifyedby')  ); ?>
        <?php  echo $this->Form->input('ServiceDevice.pos_brand_id',array('type'=>'select','options'=>$posBrands,'div'=>false,'label'=>false,'class'=>'required select2as','empty'=>'----Please select Brand----'));    ?>
        
        <?php  echo $this->Form->label('ServiceDevice.name', __('Category'.': <span class="star"></span>', true),array('id'=>'filtermodifyedby')  );   
               echo $this->Form->input('ServiceDevice.pos_pcategory_id',array('type'=>'select','options'=>$posPcategories,'div'=>false,'label'=>false,'class'=>'required select2as','empty'=>'----Please select Category----'));  
        ?>
        
       
      
      
        
          <?php   echo $this->Form->label('ServiceDeviceInfo.name', __('Status'.': <span class="star"></span>', true),array('id'=>'filtermodifyedby')  );   	 echo $this->Form->input('ServiceDeviceInfo.status',array('type'=>'select','options'=>$status,'div'=>false,'label'=>false,'class'=>'required select2as','empty'=>'-- Select Status --'));  
	  ?>
    </div>
      
   <?php echo $this->element('filter/commonfilter',array('cache' => array('time'=> '-7 days','key'=>'header')));?>
    <div class="button_area_filter">
     
      <?php echo $this->Form->button('Search',array( 'class'=>'submit', 'id'=>'btn_brand_search'));?>      <?php echo $this->Form->button('Reset',array('type'=>'reset','name'=>'reset','id'=>'Cancel','onClick'=>"parent.location='".$this->webroot."serviceDeviceInfos/index/yes'"));?>     
    </div>
    </form>
  </div>
  <div style="clear: both;"></div>
</div>

<div class="bDiv" style="height: auto;">
<div class="hDiv">
  <div class="hDivBox">
    <table cellspacing="0" cellpadding="0" width="100%">
      <thead>
        <tr>
            <th align="left" style=" width: 10%;"> <?php echo $this->Paginator->sort('user_id');?> </th>
			<th align="left" style=" width: 6%;"> <?php echo $this->Paginator->sort('status');?> </th>
 			<th align="left" style=" width: 15%;"> <?php echo $this->Paginator->sort('service_device_id');?> </th>
            <th align="left" style=" width: 10%;"> <?php echo $this->Paginator->sort('ServiceDevice.pos_brand_id', 'Brand');?> </th>
             <th align="left" style=" width: 10%;"> <?php echo $this->Paginator->sort('tech_name');?> </th>
			<th align="left" style=" width: 8%;"> <?php echo $this->Paginator->sort('serial_no');?> </th>
 			<th align="left" style=" width: 8%;"> <?php echo $this->Paginator->sort('recive_date');?> </th>
			<th align="left" style=" width: 8%;"> <?php echo $this->Paginator->sort('estimated_date');?> </th> 
			 
	           <th align="left" style=" width: 10%;"> <?php echo 'Link';?> </th>
        </tr>
      </thead>
    </table>
  </div>
</div>
 
  <table cellspacing="0" cellpadding="0" border="0" width="100%" class="flexme3">
      <tbody>
<?php
 // pr($serviceDeviceInfos);die();
	$purchaseDate = '';
	$i = 0;
	
	foreach ($serviceDeviceInfos as $serviceDeviceInfo):
	  
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
		$dataDate = date('d / m / Y',strtotime($serviceDeviceInfo['ServiceDeviceInfo']['created']));
			if($purchaseDate == "" ||  $dataDate!= $purchaseDate){
				echo "<tr><td colspan = '10' class = 'listDateHeading'>".$dataDate."</td></tr>";
				$purchaseDate = $dataDate;
			}
	?>
    <?php  // pr($serviceDeviceInfo); die();?>
	<tr id='<?php echo 'row_'.$serviceDeviceInfo['ServiceDeviceInfo']['id'];?>'  <?php echo $class;?> >
        <td align='left' style='width: 10%;' class="<?php if($serviceDeviceInfo['ServiceDeviceInfo']['is_urgent'] == 1){echo 'is_urgent';}?>" ><?php echo  $serviceDeviceInfo['User']['firstname'] .' '.$serviceDeviceInfo['User']['lastname']; ?></td>
        <td align='left' style='width: 6%;'><?php  
		
		switch($serviceDeviceInfo['ServiceDeviceInfo']['status']){
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
 				}
		  ?>&nbsp;</td>
         <td align='left' style='width: 15%;'><?php echo  $serviceDeviceInfo['ServiceDevice']['name'] ; ?></td>
        <td align='left' style='width: 10%;'><?php echo  $posBrands[$serviceDeviceInfo['ServiceDevice']['pos_brand_id']] ; ?></td>
        <td align='left' style='width: 10%;'><?php 
		switch($serviceDeviceInfo['ServiceDeviceInfo']['status']){
				case 1:
				echo $serviceDeviceInfo['CreatedBy']['firstname'].' '.$serviceDeviceInfo['CreatedBy']['lastname']; 
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
					 echo $serviceDeviceInfo['CheckTech']['firstname'].' '.$serviceDeviceInfo['CheckTech']['lastname']; ; 
				break;
				case 11:
				 echo "<div class='link_view' id='check_complete'>Check List Complete</div>"; 
				break;
				
				
				
				}
		
		
		echo $serviceDeviceInfo['Assesment']['tech_name']; ?>
        </td>
        <td align='left'  style='width: 8%;'><?php echo $serviceDeviceInfo['ServiceDeviceInfo']['serial_no']; ?>&nbsp;</td>
        <td align='left'  style='width: 8%;'><?php echo date("d/m/Y H:i:s", strtotime($serviceDeviceInfo['ServiceDeviceInfo']['recive_date']));  ?>&nbsp;</td>
        <td align='left' style='width: 8%;'><?php 
        echo date("d/m/Y H:i:s", strtotime($serviceDeviceInfo['ServiceDeviceInfo']['estimated_date'])); ?>&nbsp;</td> 
        <td class="actions"  style='width: 10%;'>
        <div class='alistname link_link'>
        <?php echo $this->Html->link(__('View', true), array('action' => 'view', $serviceDeviceInfo['ServiceDeviceInfo']['id']),array('class'=>'link_view action_link')); ?>
       
        <?php echo $this->Html->link(__('Recive', true), array('action' => 'receive_invoice', $serviceDeviceInfo['ServiceDeviceInfo']['id']),array('class'=>'receive_invoice action_link')); ?>
         
        <?php echo $this->Html->link(__('Print', true), array('action' => 'recieve', $serviceDeviceInfo['ServiceDeviceInfo']['id']),array('class'=>'receive_invoice action_link')); ?>
        
         <?php if(!empty($serviceDeviceInfo['Assesment']['id'] )){echo $this->Html->link(__('Assesment', true), array('controller'=>'Assesments','action' => 'recieve', $serviceDeviceInfo['ServiceDeviceInfo']['id']),array('class'=>'receive_invoice action_link','id'=>'AssesmentPrint'));} ?>
         
			<?php //echo $this->Html->link(__('Edit', true), array('action' => 'edit', $serviceDeviceInfo['ServiceDeviceInfo']['id']),array('class'=>'link_edit action_link')); ?>
			<?php //echo $this->Html->link(__('Delete', true), array('action' => 'delete', $serviceDeviceInfo['ServiceDeviceInfo']['id']), array('class'=>'link_delete action_link'), sprintf(__('Are you sure you want to delete # %s?', true), $serviceDeviceInfo['ServiceDeviceInfo']['id'])); ?>
		</div></td>
	</tr>
<?php endforeach; ?>
    </table>
    </div>
    
    <div class="pDiv">
    <div class="pGroup">
     	 <?php if($this->params['paging']['ServiceDeviceInfo']['prevPage']){?>
      <span class='paginate_link'><?php echo $this->Paginator->first();?></span> <span class='paginate_link'><?php echo $this->Paginator->prev('< ' . __('Previous', true), array(), null, array('class'=>'disabled','id'=>'prev_id'));?></span>
      <?php }?>
      <?php echo $this->Paginator->numbers();?>
      <?php if($this->params['paging']['ServiceDeviceInfo']['nextPage']){?>
      <span class='paginate_link'> <?php echo $this->Paginator->next(__('Next', true) . ' >', array(), null, array('class' => 'disabled','id'=>'next_id', 'span'=>false));?> </span> <span class='paginate_link'><?php echo $this->Paginator->last();?></span>
      <?php }?>
    </div>
  </div>     
</div>

 