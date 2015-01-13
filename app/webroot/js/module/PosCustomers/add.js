jQuery(function($){ 
 //======================= Start Add Script =====================				
 	 $('#btn_PosCustomer_add').click(function(){
 		//========================== Validation Check ========
				$('#PosCustomerEmail').focusout();
  		if( $('#PosCustomerAddForm').valid()) 
 		{
			$('.ajax_status').fadeIn();
			$('.ajax-save-message').hide().fadeOut(); 
		//===================== Ajax Submit =================
		  $('#PosCustomerAddForm').ajaxSubmit({ 
			success: function(responseText, responseCode) { 
					//alert(responseText);
			$('.ajax_status').hide(); 
			$('.ajax-save-message').hide().html(responseText).fadeIn(); 
			$('#Cancel').click()
			 
 			}
		});
	}
  	return false; 
	}).appendTo('form div.submit');
	 
	 //==========================Email check Start =======================
	  $('#PosCustomerEmail').focusout(function(e) {	
		e.preventDefault();
	  	var email =	$(this).val();
		  $.ajax({
				type: "GET",
				url:siteurl+"PosCustomers/exist_email_check/"+email,
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
	 	$("#PosCustomerMobile").keypress(function (e){
      if( e.which!=8 && e.which!=0 && (e.which<48 || e.which>57)){
    	return false;
      }
});		
		 	$("#PosCustomerTnt").keypress(function (e){
      if( e.which!=8 && e.which!=0 && (e.which<48 || e.which>57)){
    	return false;
      }
});	
	*/		
	 	
});