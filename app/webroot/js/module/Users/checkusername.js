$(document).ready(function() {
	/*$("#UserEmailAddress").focusout(function() {
	 	$(".ajax_status").show();
	 	$("#emailvalidinfo").hide();
		if(!$("#UserEmailAddress").valid())
		{
			$(".ajax_status").hide();
			return false;
		}
 		var	username = $("#UserEmailAddress").val();
 		if(username =='')
		{
			$('.ajax_status').hide();
			alert('Email field is empty. Please insert a unique email address. ');
			return false ; 
		}
		$.ajax({
			type: "GET",
			url:siteurl+"users/checkusername/"+username,
			data: '',
			success: function(response){
			if (response == 0) {
				 $(".ajax_status").hide();
				} 
				else {
					 $(".ajax_status").hide();
					$("#emailvalidinfo").fadeIn('slow');
					$("#emailvalidinfo").html(response);
					$("#UserEmailAddress").val('');
					} 
				}
			});
		return true;
 	});*/
	
	   $('#UserEmailAddress').focus(function(){
             $('#username_feedback').hide();

        });

        $('#UserEmailAddress').blur(function(){
 //Below post function is using check_username method of users controller.            

       $.post('/mloadbd/users/checkusername',{username:$('#UserEmailAddress').val()},function(result){
 		$('#username_feedback').fadeIn();
        $('#username_feedback').html(result) ;

       }); 
	   
	   

    });
	
}); 


 