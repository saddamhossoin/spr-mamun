jQuery(function($){ 

	$('#signin_btn').click(function(es) {
		es.preventDefault();
		var datas = $("#checkout_login").serialize();
		 	$.ajax({
				type: "POST",
				url:siteurl+"Users/minilogin",
				data: datas,
				success: function(response){
				 window.location.reload()
				
				if(response==1){
					$.alert.open({
							
							  type: 'info',
							  content: 'Login Successful',
							  buttons: {ok: 'Ok'},
							  icon: 'info',
							  width: 400
					});
					}
				
				else {
						$.alert.open({
									
									  type: 'info',
									  content: 'Invalid user ,Please Click the Registration',
									  buttons: {ok: 'Ok'},
									  icon: 'info',
									  width: 400
							});
					
					}
				 
					}
		});
		
 		
		 
 		 
   	});
	

});
