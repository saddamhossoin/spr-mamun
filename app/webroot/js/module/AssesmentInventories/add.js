jQuery(function($){ 
 //========================== Start Searching Inventory Product ===========================
  $("#btn_AssesmentInventory_search").on('click',function(e){
	  e.preventDefault();
	 	$('.overlaydivsmall').fadeIn();
			$('.ajax-save-message').hide().fadeOut(); 
 			 var data= $('#AssesmentInventoryAssesmentInventoryProductListForm').serialize();
			 var assesment_id = $("#PosProductAssesmentId").val();
			 $.ajax({
				type: "POST",
				url:siteurl+"AssesmentInventories/assesmentInventoryProductList/no/"+assesment_id,
				data:  data,
				success: function(response){
					 
  						$('.overlaydivsmall').hide(); 
						$(".assesmentInventoryProductGrid").html('');
						$(".assesmentInventoryProductGrid").html(response);
						 
 					 }
				}); 
  		});
	
	 $("#btn_AssesmentInventory_reset").on('click',function(e){
	  e.preventDefault();
	 	$('.overlaydivsmall').fadeIn();
			$('.ajax-save-message').hide().fadeOut(); 
			var assesment_id = $("#PosProductAssesmentId").val();
 			 $.ajax({
				type: "GET",
				url:siteurl+"AssesmentInventories/assesmentInventoryProductList/yes/"+assesment_id,
 				success: function(response){
  						$('.overlaydivsmall').hide(); 
						$(".assesmentInventoryProductGrid").html('');
						$(".assesmentInventoryProductGrid").html(response);
						 
 					 }
				}); 
  		});
		
		//=========================== End Searching Product ======================
});