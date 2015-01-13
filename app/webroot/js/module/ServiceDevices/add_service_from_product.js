jQuery(function($){ 
//========================== Start Searching Compatable Product ===========================
  $("#btn_PosCompatability_search").on('click',function(e){
	  e.preventDefault();
	 	$('.ajax_status').fadeIn();
			$('.ajax-save-message').hide().fadeOut(); 
 			 var data= $('#ServiceDeviceParentProductListForm').serialize();
  			 $.ajax({
				type: "POST",
				url:siteurl+"ServiceDevices/parentProductList",
				data:  data,
				success: function(response){
   						$('.ajax_status').hide(); 
						$(".posCompatabilityProductGrid").html('');
						$(".posCompatabilityProductGrid").html(response);
  					 }
				}); 
  		});
	
	 $("#btn_PosCompatability_reset").on('click',function(e){
	  e.preventDefault();
	 		 $.ajax({
				type: "GET",
				url:siteurl+"ServiceDevices/parentProductList/yes/" ,
 				success: function(response){
  						$('.ajax_status').hide(); 
						$(".posCompatabilityProductGrid").html('');
						$(".posCompatabilityProductGrid").html(response);
  					 }
				}); 
  		});
		
	//=========================== End Searching Product ======================

	 
});