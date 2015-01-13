jQuery(function($){ 
 //======================= Start Add Script =====================				
 	 $('#btn_ServiceAcessory_add').click(function(){
 		//========================== Validation Check ========
  		if( $('#ServiceAcessoryAddForm').valid()) 
 		{
		 
			$('.ajax_status').fadeIn();
			$('.ajax-save-message').hide().fadeOut(); 
		//===================== Ajax Submit =================
		  $('#ServiceAcessoryAddForm').ajaxSubmit({ 
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