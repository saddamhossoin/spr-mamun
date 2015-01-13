jQuery(function($){ 
 //======================= Start Add Script =====================				
 	 $('#btn_PosSupplier_edit').click(function(){
 		//========================== Validation Check ========
  		if( $('#PosSupplierEditForm').valid()) 
 		{
			$('.ajax_status').fadeIn();
			$('.ajax-save-message').hide().fadeOut(); 
		//===================== Ajax Submit =================
		  $('#PosSupplierEditForm').ajaxSubmit({ 
			success: function(responseText, responseCode) { 
			$('.ajax_status').hide(); 
			$('.ajax-save-message').hide().html(responseText).fadeIn(); 
			$('#Cancel').click();
			 window.location.href=siteurl+"PosSuppliers/index";
			 
 			}
		});
	}
  	return false; 
	}).appendTo('form div.submit'); 
	  
	  
});