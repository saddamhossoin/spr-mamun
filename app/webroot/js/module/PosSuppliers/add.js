jQuery(function($){ 
 //======================= Start Add Script =====================				
 	 $('#btn_PosSupplier_add').click(function(){
 		//========================== Validation Check ========
  		if( $('#PosSupplierAddForm').valid()) 
 		{  
			$('.ajax_status').fadeIn();
			$('.ajax-save-message').hide().fadeOut(); 
		//===================== Ajax Submit =================
		  $('#PosSupplierAddForm').ajaxSubmit({ 
			success: function(responseText, responseCode) { 
			//alert(responseText);
			$('.ajax_status').hide(); 
			$('.ajax-save-message').hide().html(responseText).fadeIn(); 
			$('#Cancel').click()
			 
 			}
		});
	}
  	return false; 
	}).appendTo('form div.submit'); 
	  
	 
	 
});