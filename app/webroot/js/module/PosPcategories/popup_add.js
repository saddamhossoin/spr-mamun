jQuery(function($){ 
		
 //======================= Start Add Script =====================				
 	 $('#btn_PosPcategory_add').click(function(){
 		//========================== Validation Check ========
  		if( $('#PosPcategoryAddForm').valid()) 
 		{
			$('.ajax_status').fadeIn();
			$('.ajax-save-message').hide().fadeOut(); 
		 var opt_name = $("#PosPcategoryName").val();
		 //===================== Ajax Submit =================
		   $.ajax({
				type: "POST",
				data:$("#PosPcategoryAddForm").serialize(),
				url:siteurl+"PosPcategories/add/yes",
				success: function(viewText,response){
  				 var opt_id = viewText;
				 $("#PosProductPosPcategoryId , #ServiceDevicePosPcategoryId").append("<option value='"+opt_id+"' selected=selected>"+opt_name+"</option>");
				 $('#WrapperPosProductPosPcategoryId .select2-chosen, #WrapperServiceDevicePcategoryId .select2-chosen').html(opt_name);
				 $('.ajax_status').fadeOut();
				 $("#invoice1").dialog("close");
				 
				 
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
					$('#duplicateMessagebrandpopup').show();
			 	}
				else{
					$('.ajax_status').hide(); 
					$('#duplicateMessagebrandpopup').hide();
				}
				 
			}
		});
 	});
	
	
	 
});