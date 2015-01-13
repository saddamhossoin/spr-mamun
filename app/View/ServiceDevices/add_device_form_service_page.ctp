<div class="serviceDevices form addServiceInPopUp">
<?php echo $this->Form->create('ServiceDevice');?>
          <div id="WrapperServiceDeviceTypeId" class="microcontroll">
		<?php	echo $this->Form->label('ServiceDevice.pos_pcategory_id', __('Type '.':<span class=star>*</span>', true) );?>
	 	<?php echo $this->Form->select('ServiceDevice.pos_pcategory_id',  $type, array('div'=>false,'label'=>false, 'empty'=>'-- Please Select Type --', 'class'=>'required select2as'));?>
		 </div>

		<div id="WrapperServiceDeviceBrandId" class="microcontroll">
		<?php	echo $this->Form->label('ServiceDevice.pos_brand_id', __('Brand '.':<span class=star>*</span>', true) );?>
		 	<?php echo $this->Form->select('ServiceDevice.pos_brand_id',  $brand, array('div'=>false,'label'=>false, 'empty'=>'-- Please Select Brand --', 'class'=>'required select2as'));?>
		</div>
		<div id="WrapperServiceDeviceName" class="microcontroll">
		<?php	echo $this->Form->label('ServiceDevice.name', __('Name'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('ServiceDevice.name',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>
 		<div id="WrapperServiceDeviceDescription" class="microcontroll">
		<?php	echo $this->Form->label('ServiceDevice.description', __('Description'.':', true) );?>
		<?php	echo $this->Form->input('ServiceDevice.description',array('div'=>false,'label'=>false,'class'=>''));?>
		</div>
 <div class="button_area btn_popup_sAFSP">
		<?php echo $this->Form->button('Save',array( 'class'=>'submit', 'id'=>'btn_ServiceDevice_add_from_servicePage'));?>
		<?php echo $this->Form->button('Cancel',array('type'=>'reset','name'=>'reset','id'=>'Cancel'));?>
		<?php echo $this->Form->end();?>
</div>
</div>
<script type="text/javascript">
$( document ).ready(function() {
 //====================== Add New Device Save ===================
  $('#btn_ServiceDevice_add_from_servicePage').on('click',function(e){
		e.preventDefault();
  		//========================== Validation Check ========
	 	if( $('#ServiceDeviceAddDeviceFormServicePageForm').valid()) 
 		{
			$('.ajax_status').fadeIn();
			$('.ajax-save-message').hide().fadeOut(); 
		//===================== Ajax Submit =================
		  $('#ServiceDeviceAddDeviceFormServicePageForm').ajaxSubmit({ 
	 		success: function(responseText, responseCode) { 
			 
			 var obj = jQuery.parseJSON( responseText);	
			
			$("#ServiceDeviceInfoServiceDeviceId").val(obj.ServiceDevice.id);
			$("#ServiceDeviceName").val( obj.ServiceDevice.name + " - " +obj.PosBrand.name+ " - " +obj.PosPcategory.name);
				
			$("#SDDType").html(obj.PosPcategory.name);
			$("#SDDBrand").html(obj.PosBrand.name);
			$("#showDeviceDetails").fadeIn();
			 
			 
			$('.ajax_status').hide(); 
			$('.ajax-save-message').hide().html('Success : Add New Device').fadeIn(); 
			 $('#popupdiv').dialog('close');
			 
			 
 			}
		});
	}
  	return false; 
	}).appendTo('form div.submit'); 
 
});
</script>
<style>
.microcontroll label {
    width: 120px !important;
	float:left !important;
}

</style>



