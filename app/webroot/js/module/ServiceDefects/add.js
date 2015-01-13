jQuery(function($){ 
		
	
	  
 //======================= Start Add Script =====================				
 	 $('#btn_ServiceDefect_add').click(function(){
		
 		//========================== Validation Check ========
  		if( $('#ServiceDefectAddForm').valid()) 
 		{
			$('.ajax_status').fadeIn();
			$('.ajax-save-message').hide().fadeOut(); 
		//===================== Ajax Submit =================
		  $('#ServiceDefectAddForm').ajaxSubmit({ 
			success: function(responseText, responseCode) { 
			$('.ajax_status').hide(); 
			$('.ajax-save-message').hide().html(responseText).fadeIn(); 
			$('#Cancel').click()
			 
 			}
		});
	}
  	return false; 
	}).appendTo('form div.submit'); 
	
	$('#ServiceDefectName').focusout(function(e) {	
		e.preventDefault();
		 var DefectName =	$(this).val();
		  $.ajax({
				type: "GET",
				url:siteurl+"PosBrands/checkFieldDuplicate/ServiceDefect/name/"+DefectName,
				success: function(viewText,response){
					//alert(viewText);
  				if(viewText == 1)
				{	
 					$("#ServiceDefectName").val('');
					$('#duplicateMessage').show();
			 	}
				else{
					$('.ajax_status').hide(); 
					$('#duplicateMessage').hide();
				}
				 
			}
		});
 	});
	
	
	 
});