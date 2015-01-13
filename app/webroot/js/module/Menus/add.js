jQuery(function($){ 
				
 //======================= Start Add Script =====================				
 	 
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
//======================= Add Action List by Controller============				
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
//======================== End Action List by Controller ======================
});	