jQuery(function($){ 
 //======================= Start Add Script =====================				
 	 $('#btn_ServiceDevice_edit').click(function(){
 		//========================== Validation Check ========
  		if( $('#ServiceDeviceEditForm').valid()) 
 		{
			$('.ajax_status').fadeIn();
			$('.ajax-save-message').hide().fadeOut(); 
		//===================== Ajax Submit =================
		  $('#ServiceDeviceEditForm').ajaxSubmit({ 
			success: function(responseText, responseCode) { 
			$('.ajax_status').hide(); 
			$('.ajax-save-message').hide().html(responseText).fadeIn(); 
			 window.location.href=siteurl+"ServiceDevices/index";
			 
 			}
		});
	}
  	return false; 
	}).appendTo('form div.submit'); 
});