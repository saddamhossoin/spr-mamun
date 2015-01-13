jQuery(function($){ 
//===========================delete image Start=======================================//
  	$(".deleteimage").on('click', null,function(es) {
		$("#inputimage").fadeIn();
 		var ids = $(this).attr('id')
 		$("#loading").show();
		$.ajax({
				type: "GET",
				url: siteurl+"PosProducts/deleteimage/PosBrand/image/"+ids,
				success: function(response){ 
				//alert(response);
				if(response == 1){
					$(".imagedeletearea").remove();
					$("#loading").hide();
				}else if(response ==2){
						alert('File is not present');
				}
 				 $("#loading").hide();
				
				}
			});
		 });
	
	//===========================delete image End=======================================//
	
	//====================Ajax file form submit start =====================//
		$('#PosBrandEditForm').ajaxForm({
				beforeSubmit: function(){
					if($('#PosBrandEditForm').valid()){
						return true;
					}else{
						return false;
					}
				},
			   success: function(response) {
				$('.ajax-save-message').hide().html(response).fadeIn(); 
				 window.location.href=siteurl+"PosBrands/index";
			} 
		});
		
	//====================Ajax file form submit End =====================//
	
  
	 $('#PosBrandName').focusout(function(e) {	
		e.preventDefault();
		 var product =	$(this).val();
		  var brandid = $('#PosBrandId').val();
		 
		  $.ajax({
				type: "GET",
				url:siteurl+"PosBrands/checkFieldDuplicate/PosBrand/name/"+product+"/"+brandid,
				success: function(viewText,response){
  				if(viewText == 1)
				{	
 					$("#PosBrandName").val('');
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