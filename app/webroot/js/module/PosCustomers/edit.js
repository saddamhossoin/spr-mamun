jQuery(function($){ 
 //======================= Start Add Script =====================				
 	 $('#btn_PosCustomer_edit').click(function(){
			    $('#PosCustomerEmail').focusout();
 		//========================== Validation Check ========
  		if( $('#PosCustomerEditForm').valid()) 
 		{
			$('.ajax_status').fadeIn();
			$('.ajax-save-message').hide().fadeOut(); 
		//===================== Ajax Submit =================
		  $('#PosCustomerEditForm').ajaxSubmit({ 
			success: function(responseText, responseCode) { 
			$('.ajax_status').hide(); 
			$('.ajax-save-message').hide().html(responseText).fadeIn(); 
				 window.location.href=siteurl+"PosCustomers/index";
 			}
		});
	}
  	return false; 
	}).appendTo('form div.submit'); 
	 
	 //==========================Email check Start =======================
	  $('#PosCustomerEmail').focusout(function(e) {	
		e.preventDefault();
		var customer =	$('#PosCustomerId').val();
	  	var email =	$(this).val();
		  $.ajax({
				type: "GET",
				url:siteurl+"PosCustomers/exist_email_check/"+email+"/"+customer,
				success: function(response){
					
			if(response == 1)
				{	
 					$("#PosCustomerEmail").val('');
					$('#duplicateMessage').show();
				 	}
			else{
					$('.ajax_status').hide(); 
					$('#duplicateMessage').hide();
				}
				 
			}
		});
 	});
	 //==========================Email check End =======================  
	 
	 
	  	/*
	$("#PosCustomerTnt").keypress(function (e){
      if( e.which!=8 && e.which!=0 && (e.which<48 || e.which>57)){
    	return false;
      }});	*/
	 
});