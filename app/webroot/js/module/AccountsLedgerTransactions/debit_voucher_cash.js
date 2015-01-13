// JavaScript Document
jQuery(function($){ 

//==========================Check number field start====================//
$("#AccountsLedgerTransactionAccountHeadId").on('change',function(e){
		if($(this).val() !=3 && $(this).val() !=13 && $(this).val() !=14){
			
			$("#WrapperAccountsLedgerTransactionDebitVoucherCash").html("<label for='AccountsLedgerTransactioncheck_number'>Check Number:<span class='star'>*</span></label><input type='text' id='AccountsLedgerTransactioncheck_number' class='required' name='data[AccountsLedgerTransaction][check_number]'><label for='AccountsLedgerTransactioncheck_date'>Check Date:<span class='star'>*</span></label><input type='text' id='AccountsLedgerTransactioncheck_date' class='required' name='data[AccountsLedgerTransaction][check_date]'>");	
			
			
			  $( "#AccountsLedgerTransactioncheck_date").datepicker({
					changeMonth: true,
					changeYear: true,
					dateFormat:"yy-mm-dd",
         		});	 
		}else{
			$("#WrapperAccountsLedgerTransactionDebitVoucherCash").html("");
		}
	});

//==========================Check number field end====================//

//==========================Check number field start====================//

$("#AccountsLedgerTransactionCounterAccountHeadId").on('change',function(e){
		if($(this).val() !=3 && $(this).val() !=13 && $(this).val() !=14){
			
			$("#WrapperAccountsLedgerTransactionCashAccount").html("<label for='AccountsLedgerTransactioncheck_number'>Check Number:<span class='star'>*</span></label><input type='text' id='AccountsLedgerTransactioncheck_number' class='required' name='data[AccountsLedgerTransaction][check_number1]'><label for='AccountsLedgerTransactioncheck_date'>Check Date:<span class='star'>*</span></label><input type='text' id='AccountsLedgerTransactioncheck_date_cash' class='required' name='data[AccountsLedgerTransaction][check_date1]'>");	
			
			
			  $( "#AccountsLedgerTransactioncheck_date_cash").datepicker({
					changeMonth: true,
					changeYear: true,
					dateFormat:"yy-mm-dd",
         		});	 
		}else{
			$("#WrapperAccountsLedgerTransactionCashAccount").html("");
		}
	});

//==========================Check number field end====================//


 
 //======================= Start Add Script =====================				
 	 $('#btn_debit_voucher_add').click(function(e){
		 e.preventDefault();
		
		//========================== Validation Check ========
  		if( $("#AccountsLedgerTransactionDebitVoucherCashForm").valid()) 
 		{
		 
			$('.ajax_status').fadeIn();
			$('.ajax-save-message').hide().fadeOut(); 
			
			$.ajax({
			type: "POST",
			url:siteurl+"AccountsLedgerTransactions/debit_voucher_cash",
			data:  $("#AccountsLedgerTransactionDebitVoucherCashForm").serialize(),
			success: function(responseText, responseCode){
					// alert(response);
				
						$('.ajax_status').hide();
						$('.ajax-save-message').hide().html(responseText).fadeIn(); 
					    $('#Cancel').click(); 
					
			 	}
			
			});
		//===================== Ajax Submit =================
	
		}
  			 
	});
//==================== End Add Script =========================
 

});