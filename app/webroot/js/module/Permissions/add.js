 $(document).ready(function() {
	  $('#PermissionController').on('change',function(){
 		var cid=$('#PermissionController').val();
   		if(cid){
 		$('.ajax_status').fadeIn();
 		 $.ajax({
					type: "GET",
					url:siteurl+"Permissions/actionlist/"+cid,
					data: '',
					success: function(viewText,response){
 					if(viewText)
					{
						//alert(viewText);
							$('.ajax_status').hide(); 
							$('#WrapperMenuaction').html('');
							$('#WrapperMenuaction').html('  ');
							$('#WrapperMenuaction').html(viewText);
					}
					else
					{
						 $(".error_check").fadeIn();
						   $('.ajax_status').hide(); 
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
 	 $('#btn_permission_add') 
     .click(function(){
		//========================== Validation Check ========
  		if( $("#PermissionAddForm").valid()) 
 		{
			$('.ajax_status').fadeIn();
			$('.ajax-save-message').hide().fadeOut(); 
		//===================== Ajax Submit =================
		  $("#PermissionAddForm").ajaxSubmit({ 
			success: function(responseText, responseCode) { 
			$('.ajax-save-message').hide().html(responseText).fadeIn(); 
			$('.ajax_status').hide(); 
 			$('#Cancel').click(); 
  			}
		});
	}
  	return false; 
	}).appendTo('form div.submit');
//==================== End Add Script =========================
 });

 

 
 