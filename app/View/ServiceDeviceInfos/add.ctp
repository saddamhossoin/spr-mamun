<?php echo $this->Html->script(array('alert/alert')); ?>
<?php echo $this->Html->css(array('alert/css/alert','alert/themes/default/theme'));
 echo $this->Html->script('jquery.form'); ?>

 
<div class="serviceDeviceInfos">
<?php echo $this->Form->create('ServiceDeviceInfo',array('enctype' => 'multipart/form-data','type'=>'file'));?>
 
<div class="reciveDeviceContact reciveDevice">
<div class="blocktitleinfo"> INFORMAZIONE DEL CLENTE</div>
  <div class="rdcontent_left">
      <div id="WrapperUserEmail" class="microcontroll">
     	<?php echo $this->Form->input('PosCustomer.pos_customer_id',array('type'=>'hidden','div'=>false  ));?>
     	<?php //echo $this->Form->input('Group.group_id',array('type'=>'hidden','value'=>3,'div'=>false,'label'=>false,'class'=>'required'));?>
		<?php echo $this->Form->label('PosCustomer.email_address', __('Email'.': <span class="star">*</span>', true) ); ?>
		<?php echo $this->Form->input('PosCustomer.email_address',array('type'=>'text','div'=>false,'label'=>false, 'size'=>35, 'class'=>'email '  ));?>
		
   </div>
 
     <div id="WrapperUserfirstname" class="microcontroll">
        <?php echo $this->Form->label('PosCustomer.name', __('Name'.': <span class="star">*</span>', true) ); ?>
        <?php echo $this->Form->input('PosCustomer.name',array('type'=>'text','div'=>false,'label'=>false, 'size'=>35, 'class'=>'required'  ));?>
    </div>
 <div id="WrapperUserEmail" class="microcontroll">
		<?php echo $this->Form->label('PosCustomer.phone', __('Phone'.': <span class="star"></span>', true) ); ?>
		<?php echo $this->Form->input('PosCustomer.phone',array('type'=>'text','div'=>false,'label'=>false, 'size'=>35, 'class'=>''  ));?>
   </div>
  
  </div>
  <div class="rdcontent_right">
    <div id="WrapperUserEmail" class="microcontroll">
		<?php echo $this->Form->label('PosCustomer.piva', __('P.Iva'.': <span class="star"></span>', true) ); ?>
		<?php echo $this->Form->input('PosCustomer.piva',array('type'=>'text','div'=>false,'label'=>false, 'size'=>35, 'class'=>''  ));?>
   </div>
   
     <div id="WrapperUserfirstname" class="microcontroll">
        <?php echo $this->Form->label('PosCustomer.address', __('Address'.': <span class="star"></span>', true) ); ?>
        <?php echo $this->Form->input('PosCustomer.address',array('type'=>'textarea','div'=>false,'label'=>false, 'cols'=>28, 'class'=>'' ,'rows'=>2 ));?>
    </div>
  </div>
  
 	<div class="clr"></div>
 </div>
 
  <div class="reciveDeviceDevice reciveDevice">
    <div class="blocktitleinfo"> Device Information</div>
  	 <div class="rdcontent_left">
         <div id="WrapperServiceDeviceName" class="microcontroll">
         <?php	echo $this->Form->hidden('ServiceDeviceInfo.service_device_id',array('div'=>false,'label'=>false,'class'=>'required'));?>
		<?php	echo $this->Form->label('ServiceDevice.name', __('Name'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('ServiceDevice.name',array('div'=>false,'label'=>false,'class'=>''));?>
		</div>
        <div class="button_area" id="addNewDeviceButtona">
         <?php  echo $this->Form->button('+ Device',array('type'=>'button','name'=>'addNewDevice','id'=>'addNewDeviceAsProduct'));?></div>
    </div>
    <div class="rdcontent_right">
  <div id="WrapperServiceDeviceInfoSerialNo" class="microcontroll">
		<?php	echo $this->Form->label('ServiceDeviceInfo.serial_no', __('Serial No'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('ServiceDeviceInfo.serial_no',array('div'=>false,'label'=>false,'class'=>'required'));?>
        <div class="button_area" id="addNewDeviceButton">
        <?php echo $this->Form->button('Info',array('type'=>'button','name'=>'addNewDevice','id'=>'showSerialInfo'));?>
        <?php //echo $this->Form->button('+ Device',array('type'=>'button','name'=>'addNewDevice','id'=>'addNewDevice'));?></div>
 		</div>
   </div>
 	<div class="clr"></div>
  	<div id="showDeviceDetails">
 		<ul>
 			<li>Category  : <span id="SDDType"></span></li>
 			<li>Brand : <span id="SDDBrand"></span></li>
  		</ul>
  	</div>
     <div class="clr"></div>
     <div id="showDeviceDetails">
 		<ul>
 			<li> </li>
 			<li> </li>
  		</ul>
  	</div>
    <div id="showDeviceDetails">
 		<ul>
 			<li> </li>
 			<li> </li>
  		</ul>
  	</div>
    <div id="showDeviceDetails">
 		<ul>
 			<li>Category  : <span id="SDDType"></span></li>
 			<li>Brand : <span id="SDDBrand"></span></li>
  		</ul>
  	</div>
     </div>
 <div class="reciveDevice reciveDeviceinfo">
 <div class="blocktitleinfo"> Recive Information</div>
     <div class="clr"></div>
 
   <div class="rdcontent_left">
   <div id="WrapperServiceDeviceInfoReciveDate" class="microcontroll">
		<?php	echo $this->Form->label('ServiceDeviceInfo.recive_date', __('Recive Date'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('ServiceDeviceInfo.recive_date',array('value'=>date("d-m-Y H:i:s"),'type'=>'text','div'=>false,'label'=>false,'class'=>''));?>
		</div>
        <div id="WrapperServiceDeviceInfoEstimatedDate" class="microcontroll">
        <?php echo $this->Form->label('ServiceDeviceInfo.estimated_date', __('Estimated Date'.':<span class=star>*</span>', true) );?>
        <?php echo $this->Form->input('ServiceDeviceInfo.estimated_date',array('type'=>'text','div'=>false,'label'=>false,'class'=>'required'));?>
        </div>
        
        <div id="WrapperServiceDeviceInfoEstimatedBudget" class="microcontroll">
        <?php echo $this->Form->label('ServiceDeviceInfo.estimated_budget', __('Estimated Budget'.':<span class=star>*</span>', true) );?>
        <?php echo $this->Form->input('ServiceDeviceInfo.estimated_budget',array('type'=>'text','div'=>false,'label'=>false,'class'=>'required number two_digit'));?>
        </div>
     
        
        <div id="WrapperServiceDeviceInfoIsDataBackup" class="microcontroll">
		<?php	echo $this->Form->label('ServiceDeviceInfo.description', __('Is Data Important &nbsp;'.'', true) );?>
		<?php	
				$options = array(
					'0' => 'No',
					'1' => 'Yes'
				);
				
				$attributes = array(
					'legend' => false,
					'class'=>'required' 
				);
				
				echo $this->Form->radio('ServiceDeviceInfo.is_data_backup', $options, $attributes);
		 ?>
		</div>
    	
        <div id="WrapperServiceDeviceInfois_phone_block" class="microcontroll">
		<?php	echo $this->Form->label('ServiceDeviceInfo.is_phone_block', __('Is Phone Block &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.' ', true) );?>
		<?php	
				$options = array(
					'0' => 'No',
					'1' => 'Yes'
				);
				
				$attributes = array(
					'legend' => false,
					'class'=>'required' 
				);
				
				echo $this->Form->radio('ServiceDeviceInfo.is_phone_block1', $options, $attributes);
		 		//echo $this->Form->input('ServiceDeviceInfo.is_phone_block',array('div'=>false,'label'=>false,'class'=>'required'));?>
                <div id="ServiceDeviceInfoIsPhoneBlockDiv"></div>
		</div>

   		<div id="WrapperServiceDeviceInfoIsSimPcLock" class="microcontroll">
		<?php	echo $this->Form->label('ServiceDeviceInfo.is_sim_pc_Lock', __('Is Sim Pc Lock &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.'', true) );?>
		<?php	
				$options = array(
					'0' => 'No',
					'1' => 'Yes'
				);
				
				$attributes = array(
					'legend' => false,
					'class'=>'required' 
				);
				
				echo $this->Form->radio('ServiceDeviceInfo.is_sim_pc_Lock1', $options, $attributes);
		//echo $this->Form->input('ServiceDeviceInfo.is_sim_pc_Lock',array('div'=>false,'label'=>false,'class'=>'required'));
		?>
        <div id="ServiceDeviceInfoIsSimPcLockDiv"></div>
		 
		</div>
         <div id="WrapperDeviceCheckList" class="microcontroll">
		<?php	echo $this->Form->label('ServiceDeviceInfo.is_urgent', __('Is Urgent &nbsp;&nbsp;'.' <span class=star></span>', true) );?>
		<?php	echo $this->Form->checkbox('ServiceDeviceInfo.is_urgent',array('div'=>false,'label'=>false,'class'=>''));?>
		</div>
         <div class="clr"></div> 
           <div id="WrapperDeviceCheckList" class="microcontroll">
		<?php	echo $this->Form->label('ServiceDeviceInfo.is_customer_confirmation', __('PREVENTIVO &nbsp;&nbsp;'.' <span class=star></span>', true) );?>
		<?php	echo $this->Form->checkbox('ServiceDeviceInfo.is_customer_confirmation',array('div'=>false,'label'=>false,'class'=>''));?>
		</div>
         <div class="clr"></div> 
       <div id="WrapperPurchaseImage" class="microcontroll">
		<?php  	echo $this->Form->label('ServiceDeviceInfo.screenimage', __('Image'.' :<span class=star></span>', true) );?>
        <?php   echo $this->Form->input('ServiceDeviceInfo.screenimage',array('type'=>'file','div'=>false,'label'=>false,'class'=>'' ));   ?>     
       </div>
        <div id="WrapperAssesmentApproveNote" class="microcontroll">
			<?php echo $this->Form->label('AssesmentApproveNote.user_id', __('Technician Name'.':<span class=star></span>', true) );?>
            <?php	 
            echo $this->Form->select('AssesmentApproveNote.user_id',$tech_namelist,array('div'=>false,'label'=>false,'class'=>'','empty'=>'Chief Technician'));?>
		</div>
      <div class="clr"></div> 
  
  </div>
  <div class="rdcontent_right"> 
   <div id="WrapperServiceDeviceInfoDescription" class="microcontroll">
		<?php	echo $this->Form->label('ServiceDeviceInfo.description', __('Description'.':', true) );?>
		<?php	echo $this->Form->input('ServiceDeviceInfo.description',array('type'=>'textarea','rows'=>2,'div'=>false,'label'=>false,'class'=>''));?>
		</div>
        <div id="WrapperServiceDeviceInfoAcessories" class="microcontroll">
		<?php	echo $this->Form->label('ServiceDeviceInfo.acessories', __('Acessories'.':', true) );?>
		 
         <div id="deviceAccessoriAddingList">
    <table cellspacing="0" cellpadding="0" class="view_table" width="50%">
        <thead>
            <tr>
                <th align="left" > <?php echo 'Name';?> </th>
                <th align="left" > <?php echo 'Link';?> </th>
            </tr>
        </thead>
        <tbody id="deviceAccesorryAddingListGrid">
            
         </tbody>
    </table>
 </div>
         
        <div class="button_area" id="addNewDeviceAccessoryButton">
        	<?php echo $this->Form->button('Device Acessories',array('type'=>'button','name'=>'addNewDeviceAcessories','id'=>'addNewDeviceAcessories'));?> 
            <?php echo $this->Form->button('New Acessories',array('type'=>'button','name'=>'addNewAcessories','id'=>'addAcessories'));?> 
 		</div>
		</div>
        <div class="clr"></div>
        <div id="WrapperServiceDeviceInfoDefectState" class="microcontroll">
		<?php	echo $this->Form->label('ServiceDeviceInfo.defect_state', __('Defect State'.':', true) );?>
        
			<div id="deviceDefectsAddingList">
    <table cellspacing="0" cellpadding="0" class="view_table" width="50%">
        <thead>
            <tr>
                <th align="left" > <?php echo 'Name';?> </th>
                <th align="left" > <?php echo 'Link';?> </th>
            </tr>
        </thead>
        <tbody id="deviceDefectsAddingListGrid">
            
         </tbody>
    </table>
 </div>
      		<div class="button_area" id="addNewDeviceDefectsButton">
        	<?php echo $this->Form->button('Device Defect',array('type'=>'button','name'=>'addNewDevice','id'=>'addNewDefect'));?> 
            <?php echo $this->Form->button('New Defect',array('type'=>'button','name'=>'addNewDevice','id'=>'addDefect'));?> 
 		</div>
 		</div>
 	<div class="clr"></div>
         
        <div id="WrapperAssesmentApproveNote" class="microcontroll">
			<?php	echo $this->Form->label('AssesmentApproveNote.notes', __('Note'.':<span class=star></span>', true) );?>
            <?php	 
            echo $this->Form->textarea('AssesmentApproveNote.notes',array('div'=>false,'label'=>false,'class'=>''));?>
		</div>
         </div>
   
   <div class="clr"></div>
 </div>
 		<div id="WrapperServiceDeviceInfoStatus" class="microcontroll">
 		<?php	echo $this->Form->input('ServiceDeviceInfo.status',array('type'=>'hidden','div'=>false,'label'=>false,'class'=>''));?>
   		<?php	echo $this->Form->input('ServiceDeviceInfo.user_id',array('type'=>'hidden','div'=>false,'label'=>false,'class'=>''));?>
		</div>
 	 
<div class="button_area">
		<?php echo $this->Form->button('Save & Service',array( 'class'=>'submit', 'id'=>'btn_ServiceDeviceInfo_add'));?>
 
		<?php echo $this->Form->button('Cancel',array('type'=>'reset','name'=>'reset','id'=>'Cancel'));?>
		<?php echo $this->Form->end();?>
</div>
</div>

<script type="text/javascript" >
	$(function(){
	    $( "#ServiceDeviceInfoReciveDate").datetimepicker({
             dateFormat:"dd-mm-yy",
			timeFormat: "HH:mm:ss",
			onSelect: function(dateText, inst) {
					 var date2 = $('#ServiceDeviceInfoReciveDate').datepicker('getDate');
 					 date2.setDate(date2.getDate()+2);
					if(date2.getUTCDay() == 0 || date2.getUTCDay() == 1  ){

						date2.setDate(date2.getDate()+1);
					}
 					 $("#ServiceDeviceInfoEstimatedDate").datetimepicker({
	    	   			 dateFormat: 'dd-mm-yy',
						 timeFormat: "HH:mm:ss",
					    }).datetimepicker('setDate', date2) 
						
						
						var date1 = $('#ServiceDeviceInfoEstimatedDate').datetimepicker('getDate');
						 var date2 = $('#ServiceDeviceInfoReciveDate').datetimepicker('getDate');
						 
						 
							if(date2 == ""){
								$.alert.open('warning', 'Please Select Recive Date First !!!');
								$(this).val("");
 							}else{
								if(new Date(date1).getTime() > new Date(date2).getTime()){
								$.alert.open('warning', 'Must be estimated date is ahead than recive date');
								$(this).val("");
							} 
							}
							
  				}
         });
		 
 
 		 
		 
			var date2 = $('#ServiceDeviceInfoReciveDate').datetimepicker('getDate');
			 date2.setDate(date2.getDate()+2);
			if(date2.getUTCDay() == 0 || date2.getUTCDay() == 1  ){

				date2.setDate(date2.getDate()+1);
			}
			 $("#ServiceDeviceInfoEstimatedDate").datetimepicker({
				 dateFormat: 'dd-mm-yy',
				 timeFormat: "HH:mm:ss",
				 onSelect: function(dateText, inst) {
					 
			var date1 = $('#ServiceDeviceInfoEstimatedDate').datetimepicker('getDate');
			var date2 = $('#ServiceDeviceInfoReciveDate').datetimepicker('getDate');
			 
				if(date2 == ""){
						$.alert.open('warning', 'Please Select Recive Date First !!!');
						$(this).val("");
				}else{
						if(new Date(date1).getTime() < new Date(date2).getTime()){
						$.alert.open('warning', 'Must be estimated date is ahead than recive date');
						$(this).val("");
					} 
				}
			}
				}).datetimepicker('setDate', date2) 
				
				
				$("#ui-datepicker-div").fadeOut();
     });
</script>
<style>
	.microcontroll textarea{
		width:413px;
	}
</style>