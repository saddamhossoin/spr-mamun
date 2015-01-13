jQuery(function($){ 
 //========================== Start Searching Inventory Product ===========================
  $("#btn_Service_search").on('click',function(e){
	  e.preventDefault();
	 	$('.ajax_status').fadeIn();
			$('.ajax-save-message').hide().fadeOut(); 
			var sesedid = $("#ServiceServiceDeviceid").val();
 			 var data= $('#ServiceServiceServiceListForAssignDeviceForm').serialize();
 			 $.ajax({
				type: "POST",
				url:siteurl+"ServiceServices/serviceListForAssignDevice/no/"+sesedid,
				data:  data,
				success: function(response){
  						$('.ajax_status').hide(); 
						$(".ServiceDeviceServiceGrid").html('');
						$(".ServiceDeviceServiceGrid").html(response);
						 
 					 }
				}); 
  		});
	
	 $("#btn_Service_reset").on('click',function(e){
	  e.preventDefault();
	 	$('.ajax_status').fadeIn();
			$('.ajax-save-message').hide().fadeOut(); 
			var sesedid = $("#ServiceServiceDeviceid").val();
  			 $.ajax({
				type: "GET",
				url:siteurl+"ServiceServices/serviceListForAssignDevice/yes/"+sesedid,
 				success: function(response){
  						$('.ajax_status').hide(); 
						$(".ServiceDeviceServiceGrid").html('');
						$(".ServiceDeviceServiceGrid").html(response);
						 
 					 }
				}); 
  		});
		
		//=========================== End Searching Product ======================
});// JavaScript Document