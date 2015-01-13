jQuery(function($){ 
 //======================= Start Add Script =====================				
 	 $('#btn_ServiceService_edit').click(function(){
 		//========================== Validation Check ========
  		if( $('#ServiceServiceEditForm').valid()) 
 		{
			$('.ajax_status').fadeIn();
			$('.ajax-save-message').hide().fadeOut(); 
		//===================== Ajax Submit =================
		  $('#ServiceServiceEditForm').ajaxSubmit({ 
			success: function(responseText, responseCode) { 
			$('.ajax_status').hide(); 
			$('.ajax-save-message').hide().html(responseText).fadeIn(); 
			$('#Cancel').click()
			window.location.href=siteurl+"ServiceServices/index";
			 
 			}
		});
	}
  	return false; 
	}).appendTo('form div.submit'); 
});