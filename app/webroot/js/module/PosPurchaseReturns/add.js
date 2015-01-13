jQuery(function($){ 
 //======================= Start Add Script =====================				
 	/* $('#btn_PosPurchaseReturn_add').click(function(){
 		//========================== Validation Check ========
  		if( $('#PosPurchaseReturnAddForm').valid()) 
 		{
			$('.ajax_status').fadeIn();
			$('.ajax-save-message').hide().fadeOut(); 
		//===================== Ajax Submit =================
		  $('#PosPurchaseReturnAddForm').ajaxSubmit({ 
			success: function(responseText, responseCode) { 
			$('.ajax_status').hide(); 
			$('.ajax-save-message').hide().html(responseText).fadeIn(); 
			$('#Cancel').click()
			 
 			}
		});
	}
  	return false; 
	}).appendTo('form div.submit'); 
	 
	 
	 
//===================================================================//	 
/* $("#PosPurchaseReturnEnterPurchaseId").on('change',function(){
  	$('.ajax_status').fadeIn();
 	$.ajax({
			type: "GET",
			url:siteurl+"pos_purchase_returns/supplierproduct/"+$("#PosPurchaseReturnEnterPurchaseId").val(),
			data: '',
			success: function(response){
				alert(response);
			 $('#second').html(response);
				$('.ajax_status').hide();
				}
			});
	
	 });*/
 //===================================================================//	 

});

