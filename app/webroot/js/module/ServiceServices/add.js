jQuery(function($){ 
	 
		/*=========== Start Here Function : Check Existing Service name. =====*/
 
	 $('#ServiceServiceName').focusout(function(e) {	
		e.preventDefault();
 	  	var product =	$(this).val();
		  $.ajax({
				type: "GET",
				url:siteurl+"ServiceServices/unique_service/"+product,
				success: function(viewText,response){
			if(viewText == 1)
				{	
 					$("#ServiceServiceName").val('');
					$('#duplicateMessage').show();
				 	}
			else{
					$('.ajax_status').hide(); 
					$('#duplicateMessage').hide();
				}
				 
			}
		});
 	});		
 //======================= Start Add Script =====================				
 	 $('#btn_ServiceService_add').click(function(){
 		//========================== Validation Check ========
  		if( $('#ServiceServiceAddForm').valid()) 
 		{
			$('.ajax_status').fadeIn();
			$('.ajax-save-message').hide().fadeOut(); 
		//===================== Ajax Submit =================
		  $('#ServiceServiceAddForm').ajaxSubmit({ 
			success: function(responseText, responseCode) { 
			$('.ajax_status').hide(); 
			$('.ajax-save-message').hide().html(responseText).fadeIn(); 
			$('#Cancel').click()
			 
 			}
		});
	}
  	return false; 
	}).appendTo('form div.submit'); 
});