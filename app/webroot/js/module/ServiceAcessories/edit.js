jQuery(function($){ 
 //======================= Start Add Script =====================				
 	 $('#btn_ServiceAcessory_edit').click(function(){
 		//========================== Validation Check ========
  		if( $('#ServiceAcessoryEditForm').valid()) 
 		{
			$('.ajax_status').fadeIn();
			$('.ajax-save-message').hide().fadeOut(); 
		//===================== Ajax Submit =================
		  $('#ServiceAcessoryEditForm').ajaxSubmit({ 
			success: function(responseText, responseCode) { 
			$('.ajax_status').hide(); 
			$('.ajax-save-message').hide().html(responseText).fadeIn(); 
			$('#Cancel').click()
			window.location.href=siteurl+"ServiceAcessories/index";
			 
			 
 			}
		});
	}
  	return false; 
	}).appendTo('form div.submit'); 
});