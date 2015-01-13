// JavaScript Document
$(document).ready(function() {
	 $("#UserLoginForm").validate({
		rules: {
		"data[User][password]": {
			required: true,
			minlength: 6,
			maxlength: 15,
		},
		 }
		});
	 
	 
	$('#btn_user_forget').click(function(es){
		 es.preventDefault();

  		if($("#UserForgetpwdForm").valid()) 
		{
			$("#UserForgetpwdForm").submit(); 
		}

	}); 
	 
 });
 