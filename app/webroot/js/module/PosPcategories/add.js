jQuery(function($){ 
		
	
	  
 //======================= Start Add Script =====================				
 	 $('#btn_PosPcategory_add').click(function(){
		 $('#PosPcategoryName').focusout();
 		//========================== Validation Check ========
  		if( $('#PosPcategoryAddForm').valid()) 
 		{
			$('.ajax_status').fadeIn();
			$('.ajax-save-message').hide().fadeOut(); 
		//===================== Ajax Submit =================
		  $('#PosPcategoryAddForm').ajaxSubmit({ 
			success: function(responseText, responseCode) { 
			$('.ajax_status').hide(); 
			$('.ajax-save-message').hide().html(responseText).fadeIn(); 
			$('#Cancel').click()
			 
 			}
		});
	}
  	return false; 
	}).appendTo('form div.submit'); 
	
	$('#PosPcategoryName').focusout(function(e) {	
		e.preventDefault();
		 var brand =	$(this).val();
		  $.ajax({
				type: "GET",
				url:siteurl+"PosBrands/checkFieldDuplicate/PosPcategory/name/"+brand,
				success: function(viewText,response){
  				if(viewText == 1)
				{	
 					$("#PosPcategoryName").val('');
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