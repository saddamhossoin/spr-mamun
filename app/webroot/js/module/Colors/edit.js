jQuery(function($){ 
 //======================= Start Add Script =====================				
 	 $('#btn_Color_edit').click(function(){
 		//========================== Validation Check ========
  		if( $('#ColorEditForm').valid()) 
 		{
			$('.ajax_status').fadeIn();
			$('.ajax-save-message').hide().fadeOut(); 
		//===================== Ajax Submit =================
		  $('#ColorEditForm').ajaxSubmit({ 
			success: function(responseText, responseCode) { 
			$('.ajax_status').hide(); 
			$('.ajax-save-message').hide().html(responseText).fadeIn(); 
			$('#Cancel').click();
			 window.location.href=siteurl+"Colors/index";
			 
 			}
		});
	}
  	return false; 
	}).appendTo('form div.submit'); 
});