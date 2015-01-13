// JavaScript Document
  jQuery(function($){ 
 //======================= Start Add Script =====================				
 	 $('#btn_user_addinfo') 
     .click(function(){
		//========================== Validation Check ========
  		if( $("#UserAddinfoForm").valid()) 
 		{
			$('.ajax_status').fadeIn();
			$('.ajax-save-message').hide().fadeOut(); 
		//===================== Ajax Submit =================
		  $("#UserAddinfoForm").ajaxSubmit({ 
			success: function(responseText, responseCode) { 
			$('.ajax_status').fadeOut(); 
			$('.ajax-save-message').hide().html(responseText).fadeIn(); 
			$('#Cancel').click();
			$('#UserAddinfoForm').fadeOut(); 
			
 			}
		});
	}
  	return false; 
	}).appendTo('form div.submit'); 
				  });
//==================== End Add Script =========================