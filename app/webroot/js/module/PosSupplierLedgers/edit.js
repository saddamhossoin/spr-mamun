jQuery(function($){ 
 //======================= Start Add Script =====================				
 	 $('#btn_PosSupplierLedger_edit').click(function(e){
							 e.preventDefault();
	//========================== Validation Check ========
  		if( $('#PosSupplierLedgerEditForm').valid()) 
 		{
			$('.ajax_status').fadeIn();
			$('.ajax-save-message').hide().fadeOut(); 
		//===================== Ajax Submit =================
		  $('#PosSupplierLedgerEditForm').ajaxSubmit({ 
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