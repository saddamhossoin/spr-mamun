// JavaScript Document
  jQuery(function($){ 
    $('#MenuNolink').on('click',function(){
 			if($('#MenuNolink').is(':checked'))
			{
			  $('#WrapperMenucontroller').hide();
			  $('#WrapperMenuaction').hide();
			}
			else
			{
				$('#WrapperMenucontroller').show();
				$('#WrapperMenuaction').show();
			}
 		});	  
				  
				  $('#MenuController').on('change',function(){
 		var cid=$('#MenuController').val();
   		if(cid){
 		$('.ajax_status').fadeIn();
 		 $.ajax({
					type: "GET",
					url:siteurl+"menus/actionlist/"+cid,
					data: '',
					success: function(viewText,response){
 					if(viewText)
					{
						//alert(viewText);
							$('.ajax_status').hide(); 
							$('#MenuAction').html('');
							$('#MenuAction').html('  ');
							$('#MenuAction').append(viewText);
					}
					else
					{
						 $(".error_check").fadeIn();
						   $('.ajax_status').fadeOut(); 
					}
				}
			});
		 
			
 	return false; 
	 
   		}{
			alert('Please select category first');
			return false;
		}
		
		
  		 
 	});	
 //======================= Start Add Script =====================				
 	 $('#btn_user_edit').click(function(){
		//========================== Validation Check ========
  		if( $("#UserEditForm").valid()) 
 		{
			$('.ajax_status').fadeIn();
			$('.ajax-save-message').hide().fadeOut(); 
		//===================== Ajax Submit =================
		  $("#UserEditForm").ajaxSubmit({ 
			success: function(responseText, responseCode) { 
			$('.ajax_status').fadeOut(); 
			$('.ajax-save-message').hide().html(responseText).fadeIn(); 
			$('#Cancel').click();
  			}
		});
 	}
  	return false; 
	}).appendTo('form div.submit'); 
				  });
//==================== End Add Script =========================