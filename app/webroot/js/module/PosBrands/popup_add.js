jQuery(function($){ 

$('#PosBrandAddForm').ajaxForm({
				url:siteurl+"PosBrands/add/yes",
				beforeSubmit: function(){
					if($('#PosBrandAddForm').valid()){
						return true;
					}else{
						return false;
					}
				},
			   success: function(response) {
				   if(response != 'Saved Failed.'){
				   var opt_name = $("#PosBrandName").val();
				   
				$('.ajax-save-message').hide().html('Brand Successfully Add').fadeIn(); 
 				 var opt_id = response;
				$("#PosProductPosBrandId,#ServiceDevicePosBrandId").append("<option value='"+opt_id+"' selected=selected>"+opt_name+"</option>");
				 $('#WrapperPosProductPosBrandId .select2-chosen ,#WrapperServiceDeviceBrandId .select2-chosen').html(opt_name);
				 $('.ajax_status').fadeOut();
				 $("#invoice").dialog("close");
				   }else{
					   $('.ajax-save-message').hide().html('Brand Successfully Add').fadeIn(); 
				   }
				 
			} 
		});
		
 	$('#PosBrandName').focusout(function(e) {	
		e.preventDefault();
		 var product =	$(this).val();
		  $.ajax({
				type: "GET",
				url:siteurl+"PosBrands/checkFieldDuplicate/PosBrand/name/"+product,
				success: function(viewText,response){
  				if(viewText == 1)
				{	
 					$("#PosBrandName").val('');
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