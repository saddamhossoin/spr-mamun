 $(document).ready(function() {
	 $("#GroupEditForm").validate({
		rules: {
		"data[Group][name]": {
			required: true,
			minlength: 6,
			maxlength: 15,
		} 
 		}
		});
	}); 

 jQuery(function($){ 
 //==================== Start Edit Script ======================
 	 $('#btn_group_edit').click(function(){
		//========================== Validation Check ========
  		if( $("#GroupEditForm").valid()) 
 		{
			$('.ajax_status').fadeIn();
			$('.ajax-save-message').hide().fadeOut(); 
		//===================== Ajax Submit =================
		  $("#GroupEditForm").ajaxSubmit({ 
			success: function(responseText, responseCode) { 
			$('.ajax_status').hide(); 
			$('.ajax-save-message').hide().html(responseText).fadeIn(); 
			$('#Cancel').click(); 
  			}
		});
	}
  	return false; 
	}).appendTo('form div.submit');
  //==================== End Edit Script   ======================
 	 
});

 

 
 