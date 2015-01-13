jQuery(function($){ 
 //======================= Start Add Script =====================				
 	 $('#btn_PosPurchaseReturn_edit').click(function(){
 		//========================== Validation Check ========
  		if( $('#PosPurchaseReturnEditForm').valid()) 
 		{
			$('.ajax_status').fadeIn();
			$('.ajax-save-message').hide().fadeOut(); 
		//===================== Ajax Submit =================
		  $('#PosPurchaseReturnEditForm').ajaxSubmit({ 
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