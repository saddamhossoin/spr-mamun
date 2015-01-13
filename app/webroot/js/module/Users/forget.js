jQuery(function($){ 
 //======================= Start Add Script =====================				
 	 $('#forgetsubmit').click(function(){
 		//========================== Validation Check ========
  		if( $("#UserForgetForm").valid()) 
 		{
			$('.ajax_status').fadeIn();
			$('.ajax-save-message').hide().fadeOut(); 
		//===================== Ajax Submit =================
		  $("#UserForgetForm").ajaxSubmit({ 
			success: function(responseText, responseCode) { 
			if(responseText=='false'){
 			window.location = 'http://localhost/cakephp/authjob/users/addinfo';
			}
			else{
			$('.ajax_status').fadeOut(); 
			$('.ajax-save-message').hide().html(responseText).fadeIn(); 
			$('#Cancel').click()
			}
 			}
		});
	}
  	return false; 
	}).appendTo('form div.submit'); 
});

jQuery(document).ready(function() {

	$('#UserEmail').focus();
		
});
//==================== End Add Script =========================