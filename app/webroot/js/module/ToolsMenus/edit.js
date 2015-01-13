jQuery(function($){
	 //======================= Add Action List by Controller============				
 	 $('#ToolsMenuLinkController').on('change',function(){
 		var cid=$('#ToolsMenuLinkController').val();
		 
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
							$('#ToolsMenuLinkAction').html('');
							$('#ToolsMenuLinkAction').html('  ');
							$('#ToolsMenuLinkAction').append(viewText);
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
//======================== End Action List by Controller ======================
	
	 
 //======================= Add Action List by Controller============				
 	 $('#ToolsMenuController').on('change',function(){
 		var cid=$('#ToolsMenuController').val();
		 
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
							$('#ToolsMenuAction').html('');
							$('#ToolsMenuAction').html('  ');
							$('#ToolsMenuAction').append(viewText);
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
 	 $('#btn_ToolsMenu_edit').click(function(){
 		//========================== Validation Check ========
  		if( $('#ToolsMenuEditForm').valid()) 
 		{
			$('.ajax_status').fadeIn();
			$('.ajax-save-message').hide().fadeOut(); 
		//===================== Ajax Submit =================
		  $('#ToolsMenuEditForm').ajaxSubmit({ 
			success: function(responseText, responseCode) { 
			$('.ajax_status').hide(); 
			$('.ajax-save-message').hide().html(responseText).fadeIn(); 
			$('#Cancel').click()
			 
 			}
		});
	}
  	return false; 
	}).appendTo('form div.submit'); 
	
});