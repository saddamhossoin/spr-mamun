jQuery(function($){ 
				
	$('#PosPcategoryName').focusout(function(e) {	
		e.preventDefault();
 		 var brand =	$(this).val();
		 var brandid = $('#PosPcategoryId').val();
		  $.ajax({
				type: "GET",
				url:siteurl+"PosBrands/checkFieldDuplicate/PosPcategory/name/"+brand+"/"+brandid,
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
		  
		  
 //======================= Start Add Script =====================				
 	 $('#btn_PosPcategory_edit').click(function(){
 		//========================== Validation Check ========
  		if( $('#PosPcategoryEditForm').valid()) 
 		{
			$('.ajax_status').fadeIn();
			$('.ajax-save-message').hide().fadeOut(); 
		//===================== Ajax Submit =================
		  $('#PosPcategoryEditForm').ajaxSubmit({ 
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