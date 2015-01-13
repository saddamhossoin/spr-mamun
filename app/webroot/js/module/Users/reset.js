 
jQuery(function($){ 
	 
	   jQuery("#UserResetForm").validate({
		rules: {
			"data[User][confirmpassword]": {
			equalTo: "#UserPassword"},
		
			"data[User][password]": {
			required: true,
			minlength: 7} 		 
		}
	});
			
	$('#btn_reset_pwd').on('click',function(e){
				e.preventDefault();
		//========================== Validation Check ========
			if( $('#UserResetForm').valid()) {
			var data= $('#UserResetForm').serialize();
				// alert(data);
			//=================================//
				$.ajax({
					type: "PUT",
					url:siteurl+"Users/reset",
					data:  data,
					success: function(response){
						
						
						//alert(response);
						if(response == 1)
						{
							 window.location.href = siteurl;
						}else{
							//$("#WrapperUsersolve label.error").show();
							//$("#WrapperUsersolve label.error").html(response);
							
						}
						}
				});
			}
	});
 
 }); 