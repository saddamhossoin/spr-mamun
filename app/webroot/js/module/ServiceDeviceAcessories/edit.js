jQuery(function($){ 
 //======================= Start Add Script =====================				
 	 $('#btn_ServiceDeviceAcessory_edit').click(function(){
 		//========================== Validation Check ========
  		if( $('#ServiceDeviceAcessoryEditForm').valid()) 
 		{
			$('.ajax_status').fadeIn();
			$('.ajax-save-message').hide().fadeOut(); 
		//===================== Ajax Submit =================
		  $('#ServiceDeviceAcessoryEditForm').ajaxSubmit({ 
			success: function(responseText, responseCode) { 
			$('.ajax_status').hide(); 
			$('.ajax-save-message').hide().html(responseText).fadeIn(); 
			$('#Cancel').click()
			 
 			}
		});
	}
  	return false; 
	}).appendTo('form div.submit'); 
});