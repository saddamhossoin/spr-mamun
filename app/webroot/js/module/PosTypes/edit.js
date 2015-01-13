jQuery(function($){ 
 //======================= Start Add Script =====================				
 	 $('#btn_PosType_edit').click(function(){
 		//========================== Validation Check ========
  		if( $('#PosTypeEditForm').valid()) 
 		{
			$('.ajax_status').fadeIn();
			$('.ajax-save-message').hide().fadeOut(); 
		//===================== Ajax Submit =================
		  $('#PosTypeEditForm').ajaxSubmit({ 
			success: function(responseText, responseCode) { 
			$('.ajax_status').hide(); 
			$('.ajax-save-message').hide().html(responseText).fadeIn(); 
			 window.location.href=siteurl+"PosTypes/index";
			 
 			}
		});
	}
  	return false; 
	}).appendTo('form div.submit'); 
	
	//===========================delete image Start=======================================//
  	$(".deleteimage").on('click', null,function(es) {
		$("#inputimage").fadeIn();
 		var ids = $(this).attr('id')
 		$("#loading").show();
		$.ajax({
				type: "GET",
				url: siteurl+"PosProducts/deleteimage/PosType/image/"+ids,
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
});