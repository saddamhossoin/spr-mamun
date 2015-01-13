// JavaScript Document
  jQuery(function($){ 
 //======================= Start Add Script =====================				
 	 $('#btn_user_edit') .click(function(){
 		//========================== Validation Check ========
  		if( $("#UserEditForm").valid()) 
 		{
			$('.ajax_status').fadeIn();
			$('.ajax-save-message').hide().fadeOut(); 
		//===================== Ajax Submit =================
		
		 $.post( siteurl + 'users/edit', $("#UserEditForm").serialize(), function(response) { 
																				 
 				$('.ajax_status').html(response);
				window.location = siteurl + 'users/index'; 
  			});
}
  	return false; 
		});
	$('#Cancel_btn').click(function(){
		window.location = siteurl + 'users/index';
	});
	$("#UserPassword").password_strength();
 	 
	  jQuery("#UserEditForm").validate({
		rules: {
  		"data[User][address]": {
			required: true,
			minlength: 15
		},
 		"data[User][confirmpassword]": {
      equalTo: "#UserPassword"},
  		"data[User][password]": {
      required: true,
			minlength: 8}
 		}
		});
	
				  });
//==================== End Add Script =========================