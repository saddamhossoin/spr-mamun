<div class="serviceAcessories form">
<div style="display:none;" class="overlaydivsmall">&nbsp;</div>
<?php echo $this->Form->create('ServiceAcessory');?>
 
		<div id="WrapperServiceAcessoryName" class="microcontroll">
		<?php	echo $this->Form->label('ServiceAcessory.name', __('Name'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('ServiceAcessory.name',array('div'=>false,'label'=>false,'class'=>'required'));?>
  		<?php	echo $this->Form->input('ServiceAcessory.status',array('div'=>false,'label'=>false,'type'=>'hidden','value'=>1));?>
		</div>
        <span id="duplicateMessage" style="display:none">Service Acessory exits. Please create another. </span>
		
 
<div class="button_area">
		<?php echo $this->Form->button('Save',array( 'class'=>'submit', 'id'=>'btn_ServiceAcessory_add'));?>
		<?php echo $this->Form->button('Cancel',array('type'=>'reset','name'=>'reset','id'=>'btn_ServiceAcessory_Cancel'));?>
		<?php echo $this->Form->end();?>
</div>
</div>
<script type="text/javascript">
$( document ).ready(function() {
 //====================== Add New Defect Save ===================
  $('#btn_ServiceAcessory_add').on('click',function(e){
		e.preventDefault();
   		//========================== Validation Check ========
	 	if( $('#ServiceAcessoryAddAcessoriesForm').valid()) 
 		{
			$('.ajax_status').fadeIn();
			$('.ajax-save-message').hide().fadeOut(); 
			var AccessoryName = $('#ServiceAcessoryAddAcessoriesForm #ServiceAcessoryName').val();
			$(".overlaydivsmall").fadeIn();
		//===================== Ajax Submit =================
	 
		 $.ajax({
				type: "GET",
				url:siteurl+"PosBrands/checkFieldDuplicate/ServiceAcessory/name/"+AccessoryName,
				success: function(viewText,response){
					//alert(viewText);
  				if(viewText == 1)
				{	
 					$("#ServiceAcessoryAddAcessoriesForm #ServiceAcessoryName").val('');
					$('#duplicateMessage').show();
					$(".overlaydivsmall").fadeOut();
			 	}
				else{
					$('.ajax_status').hide(); 
					$('#duplicateMessage').hide();
					 
					
					 $('#ServiceAcessoryAddAcessoriesForm').ajaxSubmit({ 
							success: function(responseText, responseCode) { 
								$(".overlaydivsmall").fadeOut();
 						
						 $("#deviceAccesorryAddingListGrid").append("<tr class='DeviceAccesoryGridTr_"+responseText+"'><td><input type='hidden' value='"+responseText+"' name='data[ServiceDeviceAcessory][service_acessory_id]["+responseText+"]'/>"+AccessoryName+"</td><td><span class='popup_remove_link_ac' id='ServiceAcessoryAItemRemove_"+responseText+"'>Remove</span></td></tr>");
						 
						 
						$('.ajax_status').hide(); 
						$('.ajax-save-message').hide().html('Success : Add New Accessory').fadeIn(); 
						$('#WrapperServiceAcessoryName #ServiceAcessoryName').val('');
						$('#popupdiv').dialog('close');
					}
				});
				}
				 
			}
		});
		
		
		 
	}
  	return false; 
	}).appendTo('form div.submit'); 
 
});
 </script>
<style>
.form{
	width:450px;
}
.microcontroll label{
	float:left !important;
}
.microcontroll input[type="text"], .microcontroll input[type="number"] {
    width: 232px !important;
}
</style>
 




