 $(document).ready(function() {
	 $("#GroupAddForm").validate({
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
 //======================= Start Add Script =====================				
 	 $('#btn_group_add') 
     .click(function(){
		//========================== Validation Check ========
  		if( $("#GroupAddForm").valid()) 
 		{
			$('.ajax_status').fadeIn();
			$('.ajax-save-message').hide().fadeOut(); 
		//===================== Ajax Submit =================
		  $("#GroupAddForm").ajaxSubmit({ 
			success: function(responseText, responseCode) { 
			$('.ajax_status').fadeOut(); 
			$('.ajax-save-message').hide().html(responseText).fadeIn(); 
			$('#Cancel').click(); 
  			}
		});
	}
  	return false; 
	}).appendTo('form div.submit');
//==================== End Add Script =========================
//==================== Start Edit Script ======================
 
	 $('#btn_user_edit') 
     .click(function(){
		//========================== Validation Check ========
		 
			//===================== Ajax Submit =================
		  $("#UserEditForm").ajaxSubmit({ 
			success: function(responseText, responseCode) { 
			$('.ajax_status').fadeIn();
			$('.ajax-save-message').hide().fadeOut(); 
			setTimeout(function(){ 
			$('.ajax_status').fadeOut(); 
			$('.ajax-save-message').hide().html(responseText).fadeIn(); 
					}, 2000); 
				}
			}); 
		 
 		return false; 
		}).appendTo('form div.submit'); 
//==================== End Edit Script   ======================
		
		
		
		
		
		
		//====================== For Date plugin ==================	
		//	$( "#UserJoindate" ).datepicker(); 
		});

 

 
 