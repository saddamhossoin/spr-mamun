jQuery(function($){ 
				
			$('#UserPassword').password_strength();
		  $('#UserEmailAddress').focus(function(){
             $('#username_feedback').hide();
 	     });

        $('#UserEmailAddress').blur(function(){
 		$.get(siteurl+ 'users/checkusername/'+$('#UserEmailAddress').val(),function(result){
 		 
 
		if(result == 1){
		 $('#username_feedback').html("Choose a username") ;
 		}
		else if(result ==2){
					 $('#username_feedback').html("<span class='password_strength_3'>Too Short Username!</span>") ;
		}
		else if(result ==3){
					 $('#username_feedback').html("<span class='password_strength_11'>Username Taken!</span>") ;
					 	$('#UserEmailAddress').val('');
		}

		else if(result ==4){
					 $('#username_feedback').html("<span class='currectUserName'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span id='userpa'>0</span>") ;
		}
		$('#username_feedback').fadeIn();
       }); 
    });	
	 
	  jQuery("#UserAddForm").validate({
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

 //======================= Start Add Script =====================				
 	 /*$('#btn_user_add').click(function(){
		 alert('emon');
 		//========================== Validation Check ========
  		if( $("#UserAddForm").valid()) 
 		{
			  if($("#userpa").html()==0){
			
			$('.ajax_status').fadeIn();
			$('.ajax-save-message').hide().fadeOut(); 
		//===================== Ajax Submit =================
		  $("#UserAddForm").ajaxSubmit({ 
			success: function(responseText, responseCode) {
				alert(responseText); 
			$('.ajax_status').hide(); 
			$('.ajax-save-message').hide().html(responseText).fadeIn(); 
			$('#Cancel').click()
 			}
		});
	 	}else{
			$(".password_strength_11").html("Choice Another User Name");
 		 }
	}
  	return false; 
	}).appendTo('form div.submit'); */
	
	
	//++++++++++++++++++++++++++++++++start add++++++++++++++++++++++++++++++
	$('#btn_user_add').click(function(e){
		e.preventDefault();
 		//========================== Validation Check ========
  		if( $('#UserAddForm').valid()) 
 		{
			$('.ajax_status').fadeIn();
			$('.ajax-save-message').hide().fadeOut(); 
		//===================== Ajax Submit =================
		  $.post( siteurl + 'Users/add', $("#UserAddForm").serialize(), function(response) { 
		 		 	//alert(response)
				$('.ajax_status').html(response);
				$("#Cancel").click(); 
				//window.location = siteurl + 'users/index'; 
				
  			});

	}
  	return false; 
	}) ;
	
});
//==================== End Add Script =========================