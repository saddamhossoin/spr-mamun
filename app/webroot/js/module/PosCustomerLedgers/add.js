jQuery(function($){ 

//========================add to gide head list script================================//
		$("#PosCustomerLedgerAccounthead").on('change',function(e){
			//alert('ff');
				if($(this).val() !=3){
					$("#WrapperPosCustomerAccountsCheckNumber").html("<label for='PosCustomerAmountCheckNumber'>Check Number:<span class='star'>*</span></label><input type='text' id='PosCustomerAmountCheckNumber' class='required' name='data[PosCustomerLedger][check_number]'><label for='PosCustomerAmountCheckDate'>Check Date:<span class='star'>*</span></label><input type='text' id='PosCustomerAmountCheckDate' class='required' name='data[PosCustomerLedger][check_date]'>");
					
					$("#PosCustomerAmountCheckDate").datepicker({
						   changeMonth: true,
						   changeYear: true,
						   dateFormat:"yy-mm-dd",
						
						});	
				}else{
					 $("#WrapperPosCustomerAccountsCheckNumber").html("");
					 } 
		});

//========================add to gide head list script================================//




 //======================= Start Add Script =====================				
 	 $('#btn_PosCustomerLedger_add').click(function(){
 		//========================== Validation Check ========
  		if( $('#PosCustomerLedgerAddForm').valid()) 
 		{
			 var customerId =$('#PosCustomerPosCustomerId').val();
			$('.ajax_status').fadeIn();
			$('.ajax-save-message').hide().fadeOut(); 
		$('#PosCustomerLedgerPosCustomerId').val(customerId);
		//===================== Ajax Submit =================
		  $('#PosCustomerLedgerAddForm').ajaxSubmit({ 
			success: function(responseText, responseCode) { 
			
			 alert(responseText);
			$('.ajax_status').hide(); 
			$('.ajax-save-message').hide().html(responseText).fadeIn(); 
	  		$("#invoice1").dialog("close");
			 location.reload();
 			}
		});
	}
  	return false; 
	}).appendTo('form div.submit'); 
});