 $(document).ready(function() {
	 $("#GroupAddForm").validate({
		rules: {
		"data[Group][name]": {
			required: true,
			minlength: 4,
			maxlength: 15,
		} 
 		}
		});
	}); 

 jQuery(function($){ 
 //======================= Start Add Script =====================				
 	 $('#btn_group_add').click(function(){
		//========================== Validation Check ========
  		if( $("#GroupAddForm").valid()) 
 		{
			$('.ajax_status').fadeIn();
			$('.ajax-save-message').hide().fadeOut(); 
		//===================== Ajax Submit =================
		  $("#GroupAddForm").ajaxSubmit({ 
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

 

 
 