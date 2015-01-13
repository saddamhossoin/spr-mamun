jQuery(function($){ 
 //======================= Start Add Script =====================				
 	 $('#btn_PosSaleReturnDetail_edit').click(function(){
 		//========================== Validation Check ========
  		if( $('#PosSaleReturnDetailEditForm').valid()) 
 		{
			$('.ajax_status').fadeIn();
			$('.ajax-save-message').hide().fadeOut(); 
		//===================== Ajax Submit =================
		  $('#PosSaleReturnDetailEditForm').ajaxSubmit({ 
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