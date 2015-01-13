jQuery(function($){ 
//========================== Start Searching Inventory Product ===========================
  $("#btn_AssesmentService_search").on('click',function(e){
	  e.preventDefault();
	 	$('.overlaydivsmall').fadeIn();
			$('.ajax-save-message').hide().fadeOut(); 
 			 var data= $('#ServiceServiceAddForm').serialize();
			 var assesment_id = $("#ServiceServiceAssesmentId").val();
			// alert(data);
			 $.ajax({
				type: "POST",
				url:siteurl+"AssesmentServices/assesmentServiceServiceList/no/"+assesment_id,
				data:  data,
				success: function(response){
   						$('.overlaydivsmall').hide(); 
						$(".assesmentInventoryServiceGrid").html('');
						$(".assesmentInventoryServiceGrid").html(response);
						 
 					 }
				}); 
  		});
	
	 $("#btn_AssesmentService_reset").on('click',function(e){
	  e.preventDefault();
	 	$('.overlaydivsmall').fadeIn();
			$('.ajax-save-message').hide().fadeOut(); 
			var assesment_id = $("#ServiceServiceAssesmentId").val();
 			 $.ajax({
				type: "GET",
				url:siteurl+"AssesmentServices/assesmentServiceServiceList/yes/"+assesment_id,
 				success: function(response){
  						$('.overlaydivsmall').hide(); 
						$(".assesmentInventoryServiceGrid").html('');
						$(".assesmentInventoryServiceGrid").html(response);
						 
 					 }
				}); 
  		});
		
		//=========================== End Searching Product ======================
		
		
 //======================= Start Add Script =====================				
 	 $('#btn_AssesmentService_add').click(function(){
 		//========================== Validation Check ========
  		if( $('#AssesmentServiceAddForm').valid()) 
 		{
			$('.ajax_status').fadeIn();
			$('.ajax-save-message').hide().fadeOut(); 
		//===================== Ajax Submit =================
		  $('#AssesmentServiceAddForm').ajaxSubmit({ 
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