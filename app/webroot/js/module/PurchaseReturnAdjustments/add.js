jQuery(function($){ 
 //======================= Start Add Script =====================				
 	 $('#btn_PurchaseReturnAdjustment_add').click(function(){
 		//========================== Validation Check ========
  		if( $('#PurchaseReturnAdjustmentAddForm').valid()) 
 		{
		 
			$('.ajax_status').fadeIn();
			$('.ajax-save-message').hide().fadeOut(); 
		//===================== Ajax Submit =================
		  $('#PurchaseReturnAdjustmentAddForm').ajaxSubmit({ 
			success: function(responseText, responseCode) {
				 
			$('.ajax_status').hide(); 
			$('.ajax-save-message').hide().html(responseText).fadeIn(); 
			$('#Cancel').click()
			 
 			}
		});
	}
  	return false; 
	}).appendTo('form div.submit'); 
	 
	 
	 
	 
//===================div hide show======================//	 
	$("#PurchaseReturnAdjustmentPayType").on('change',function(e){
															   
		if($(this).val()== 1){
			
			$("#WrapperPurchaseReturnAdjustment").hide();
		
		}else{
			$("#WrapperPurchaseReturnAdjustment").show("");
			}
 });
	
//===================div hide show======================//	 
	
	
	
});