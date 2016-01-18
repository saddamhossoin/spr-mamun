<?php  echo $this->Html->script(array('common/form','common/jquery.validate'));   ?>
 <div class="serviceDeviceInfos">
<?php echo $this->Form->create('ServiceDeviceInfo',array('enctype' => 'multipart/form-data','type'=>'file'));?>
  		<div id="WrapperServiceDeviceInfoStatus" class="microcontroll">
         <?php echo $this->Form->label('ServiceDeviceInfo.status', __('Status'.': <span class="star">*</span>', true) ); ?>
 		 <?php
 		 	echo $this->Form->input('ServiceDeviceInfo.id',array('type'=>'hidden','div'=>false,'label'=>false, 'value'=>$serId)); 
		 
			$status_array = array(12=>'CUSTOMER COMMUNICATION' , 13=>'AWAITING CONFIRMATION QUOTE' , 14=>'WAITING FOR PARTS' , 1=>'Cheif Tech Dashboard', 15=>'Waiting for password/pin' , 16=> 'Sent Samsung/Nokia warranty' , 17=>'Received from Samsung/Nokia warranty',18=>'Returned at Samsung/Nokia warranty');
 			echo $this->Form->select('ServiceDeviceInfo.status',  $status_array  ,array('div'=>false,'label'=>false, 'empty'=>'-- Please Select Status-', 'class'=>'required select2as'));?>
  		</div>
 	 
<div class="button_area">
		<?php echo $this->Form->button('Change',array( 'class'=>'submit', 'id'=>'btn_ServiceDeviceInfo_change'));?>
 		<?php echo $this->Form->button('Cancel',array('type'=>'reset','name'=>'reset','id'=>'Cancel'));?>
		<?php echo $this->Form->end();?>
</div>
</div>

<script>
jQuery(function($){ 
  //======================= Start Add Script =====================				
 	 $('#btn_ServiceDeviceInfo_change').click(function(){
		
 		//========================== Validation Check ========
  		if( $('#ServiceDeviceInfoChangeStatusForm').valid()) 
 		{
			$('.ajax_status').fadeIn();
			$('.ajax-save-message').hide().fadeOut(); 
		//===================== Ajax Submit =================
		  $('#ServiceDeviceInfoChangeStatusForm').ajaxSubmit({ 
			success: function(responseText, responseCode) { 
		//	alert(responseText);
			$('.ajax_status').hide(); 
			$('.ajax-save-message').hide().html(responseText).fadeIn(); 
			$('#Cancel').click()
			 
 			}
		});
	}
  	return false; 
	}).appendTo('form div.submit');
	}); 
</script>
 
<style>
	#ServiceDeviceInfoStatus{
		width:195px;
	}
</style>