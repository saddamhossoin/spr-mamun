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
 
 //======================= Start Edit Script =====================				
 	 $('#btn_permission_edit') 
     .click(function(){
		//========================== Validation Check ========
  		if( $("#PermissionEditForm").valid()) 
 		{
			$('.ajax_status').fadeIn();
			$('.ajax-save-message').hide().fadeOut(); 
		//===================== Ajax Submit =================
		  $("#PermissionEditForm").ajaxSubmit({ 
			success: function(responseText, responseCode) { 
			$('.ajax-save-message').hide().html(responseText).fadeIn(); 
			$('.ajax_status').hide(); 
 			$('#Cancel').click(); 
  			}
		});
	}
  	return false; 
	}).appendTo('form div.submit');
	
	
	
	/* $('#btn_permission_edit').click(function(){
		 alert('emon');
 		//========================== Validation Check ========
  		if( $('#PermissionEditForm').valid()) 
 		{
			$('.ajax_status').fadeIn();
			$('.ajax-save-message').hide().fadeOut(); 
		//===================== Ajax Submit =================
		  $.post( siteurl + 'Permissions/edit', $("#PermissionEditForm").serialize(), function(response) { 
		  
				$('.ajax_status').html(response);
				window.location = siteurl + 'Permissions/index'; 
				
  			});

	}
  	return false; 
	}) ;*/
//==================== End Add Script =========================
 });

 

 
 