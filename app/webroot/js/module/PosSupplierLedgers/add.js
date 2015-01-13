jQuery(function($){ 

$("#PosSupplierLedgerAccounthead").on('change',function(e){
		if($(this).val() !=3){
			$("#WrapperPosSupplierAccountsCheckNumber").html("<label for='PosPurchaseAmountCheckNumber'>Check Number:<span class='star'>*</span></label><input type='text' id='PosPurchaseAmountCheckNumber' class='required' name='data[PosSupplierLedger][check_number]'><label for='PosPurchaseAmountCheckDate'>Check Date:<span class='star'>*</span></label><input type='text' id='PosPurchaseAmountCheckDate' class='required' name='data[PosSupplierLedger][check_date]'>");	
			
			
			  $( "#PosPurchaseAmountCheckDate").datepicker({
					changeMonth: true,
					changeYear: true,
					dateFormat:"yy-mm-dd",
         		});	 
		}else{
			$("#WrapperPosSupplierAccountsCheckNumber").html("");
		}
	});
	
	
 //======================= Start Add Script =====================				
 	 $('#btn_PosSupplierLedger_add').on('click',function(e){
		 e.preventDefault();
 	 
 		//========================== Validation Check ========
  		if( $('#PosSupplierLedgerAddForm').valid()) 
 		{
			 var supplierId =$('#PosSupplierPosSupplierId').val();
			$('.ajax_status').fadeIn();
			$('.ajax-save-message').hide().fadeOut(); 
		 	$('#PosSupplierLedgerPosSupplierId').val(supplierId);
		//===================== Ajax Submit =================
		  $('#PosSupplierLedgerAddForm').ajaxSubmit({ 
			success: function(responseText, responseCode) {
				//alert(responseText); 
			$('.ajax_status').hide(); 
			$('.ajax-save-message').hide().html(responseText).fadeIn(); 
			$('#Cancel').click();
			$("#invoice1").dialog("close");
			 location.reload();
			
		 	}
		});
	}
  	return false; 
	}).appendTo('form div.submit'); 
});