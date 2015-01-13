jQuery(function($){ 
		
	
	  
 //======================= Start Add Script =====================				
 	 $('#btn_ServiceDefect_edit').click(function(){
		
 		//========================== Validation Check ========
  		if( $('#ServiceDefectEditForm').valid()) 
 		{
			$('.ajax_status').fadeIn();
			$('.ajax-save-message').hide().fadeOut(); 
		//===================== Ajax Submit =================
		  $('#ServiceDefectEditForm').ajaxSubmit({ 
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
		   var DefectNameid = $('#ServiceDefectId').val();
		  $.ajax({
				type: "GET",
				url:siteurl+"PosBrands/checkFieldDuplicate/ServiceDefect/name/"+DefectName+"/"+DefectNameid,
				success: function(viewText,response){
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