jQuery(function($){ 
 //======================= Start Add Script =====================				
 	$('#PosBrandAddForm').ajaxForm({
				beforeSubmit: function(){
					if($('#PosBrandAddForm').valid()){
						return true;
					}else{
						return false;
					}
				},
			   success: function(response) {
				$('.ajax-save-message').hide().html(response).fadeIn(); 
				window.location.reload(true);
			} 
		});
	 
	$('#PosBrandName').focusout(function(e) {	
		e.preventDefault();
		 var product =	$(this).val();
		  $.ajax({
				type: "GET",
				url:siteurl+"PosBrands/checkFieldDuplicate/PosBrand/name/"+product,
				success: function(viewText,response){
  				if(viewText == 1)
				{	
 					$("#PosBrandName").val('');
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