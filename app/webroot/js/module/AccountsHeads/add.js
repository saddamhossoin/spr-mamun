 $(document).ready(function() {
	 
	 /*=========== Start Here Function : Check Existing Head name. =====*/
 
	 $('#AccountsHeadTitle').focusout(function(e) {	
		e.preventDefault();
 	  	var product =	$(this).val();
		  $.ajax({
				type: "GET",
				url:siteurl+"AccountsHeads/uniqueHead/"+product,
				success: function(viewText,response){
			if(viewText == 1)
				{	
 					$("#AccountsHeadTitle").val('');
					$('#duplicateMessage').show();
				 	}
			else{
					$('.ajax_status').hide(); 
					$('#duplicateMessage').hide();
				}
				 
			}
		});
 	});		
	 
	 $("#AccountsHeadAddForm").validate({
		rules: {
		"data[AccountsHead][title]": {
			required: true,
			minlength: 4,
			maxlength: 25,
		} 
 		}
		});
	}); 

 jQuery(function($){ 
 //======================= Start Add Script =====================				
 	 $('#btn_AccountsHead_add').click(function(){
		//========================== Validation Check ========
  		if( $("#AccountsHeadAddForm").valid()) 
 		{
			$('.ajax_status').fadeIn();
			$('.ajax-save-message').hide().fadeOut(); 
		//===================== Ajax Submit =================
		  $("#AccountsHeadAddForm").ajaxSubmit({ 
			success: function(responseText, responseCode) { 
			$('.ajax-save-message').hide().html(responseText).fadeIn(); 
			$('.ajax_status').hide(); 
 			$('#Cancel').click();
			location.reload(); 
  			}
		});
	}
  	return false; 
	}).appendTo('form div.submit');
//==================== End Add Script =========================
 });

 

 
 