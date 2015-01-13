jQuery(function($){ 

//==========================Check number field start====================//
$("#AccountsLedgerTransactionAccountHeadId").on('change',function(e){
		if($(this).val() !=3 && $(this).val() !=13 && $(this).val() !=14){
			
			$("#WrapperAccountsLedgerTransactionCheckNumber").html("<label for='AccountsLedgerTransactioncheck_number'>Check Number:<span class='star'>*</span></label><input type='text' id='AccountsLedgerTransactioncheck_number' class='required' name='data[AccountsLedgerTransaction][check_number]'><label for='AccountsLedgerTransactioncheck_date'>Check Date:<span class='star'>*</span></label><input type='text' id='AccountsLedgerTransactioncheck_date' class='required' name='data[AccountsLedgerTransaction][check_date]'>");	
			
			
			  $( "#AccountsLedgerTransactioncheck_date").datepicker({
					changeMonth: true,
					changeYear: true,
					dateFormat:"yy-mm-dd",
         		});	 
		}else{
			$("#WrapperAccountsLedgerTransactionCheckNumber").html("");
		}
	});

//==========================Check number field end====================//

var serial_no =0; 
var debite = 0;
var credit = 0;
$("#btn_AccountsLedgerTransaction_add").on('click',function(e){
	
	
	if($("#AccountsLedgerTransactionAddForm").valid())
	{
		serial_no++;
	    e.preventDefault();
		var ids= $(this).attr('id');
		var id= ids.split('_');
		
		
		var accountheadname= $("#AccountsLedgerTransactionAccountHeadId").val();
		var DebitCredit= $("#AccountsLedgerTransactionDebitCredit").val();
		var debit_credit_val = DebitCredit;
 		var amount= parseFloat($("#AccountsLedgerTransactionAmount").val());

		if($("#AccountsLedgerTransactioncheck_number").length){		
			var checknumber= $("#AccountsLedgerTransactioncheck_number").val();
		}else{
			var checknumber = '';
		}
		
		if($("#AccountsLedgerTransactioncheck_date").length){		
			var checkdate= $("#AccountsLedgerTransactioncheck_date").val();
		}else{
			var checkdate = '';
		}
	
		
		 
		var voucherNumber= $("#AccountsLedgerTransactionManualvoucherNumber").val();
		 
		if(DebitCredit == "1"){
			debite  = debite + amount;
			DebitCredit = 'Debit';
			 
			$("#AccountsLedgerTransactionSummaryDebit").val(debite);
		}else{
			credit = credit + amount;
			$("#AccountsLedgerTransactionSummaryCredit").val(credit);
			DebitCredit = 'Credit';
		}
		 
	
	$(".AccountsLedgerTransactionAccountadd").append("<tr class='AccountsLedgerTransaction_"+serial_no+" "+DebitCredit+"'><td><input type='hidden' value="+accountheadname+" name='data[AccountsLedgerTransaction]["+serial_no+"][account_head_id]'/>"+accountheadname+"</td><td id='DebitorCredit_"+serial_no+"'><input type='hidden' value="+debit_credit_val+" name='data[AccountsLedgerTransaction]["+serial_no+"][debit_credit]'/>"+DebitCredit+"</td><td id='Accountamount_"+serial_no+"'><input class='Amount' type='hidden' value="+amount+" name='data[AccountsLedgerTransaction]["+serial_no+"][amount]'/>"+amount+"</td><td><input type='hidden' value="+checknumber+" name='data[AccountsLedgerTransaction]["+serial_no+"][check_number]'/>"+checknumber+"</td><td><input type='hidden' value="+checkdate+" name='data[AccountsLedgerTransaction]["+serial_no+"][check_date]'/>"+checkdate+"</td><td><input type='hidden' value="+voucherNumber+" name='data[AccountsLedgerTransaction]["+serial_no+"][manualvoucherNumber]'/>"+voucherNumber+"</td><td id='AccountHeadRemove_"+serial_no+"' class='delete_account_head' ><span class='remove_btn_account'>Remove</span></td></tr>");	
	}
 });

 
 
$('.AccountsLedgerTransactionAccountadd').on('click', '.delete_account_head', function() {
		
				 var ids= $(this).attr('id');
				 var id= ids.split('_');
    			 
				$(".AccountsLedgerTransaction_"+id[1]).remove();
				
				//alert($("#DebitorCredit_"+id[1]+" input").val());
				var TotalDebit= 0;
				var TotalCredit= 0;
				
	         $('.Debit').each(function(index) {
			  
				 TotalDebit += parseFloat($(this).find('td .Amount').val());
				 
			});	 
			 $('.Credit').each(function(index) {
			  
				 TotalCredit += parseFloat($(this).find('td .Amount').val());
				 
			});	 
				$("#AccountsLedgerTransactionSummaryDebit").val(TotalDebit);
				$("#AccountsLedgerTransactionSummaryCredit").val(TotalCredit);
  		});
		
 
 //======================= Start Add Script =====================				
 	 $('#btn_AccountsLedgerTransaction_save').click(function(){
		 
		 var AccountDebit= $("#AccountsLedgerTransactionSummaryDebit").val();
		 var AccountCredit= $("#AccountsLedgerTransactionSummaryCredit").val();
		
		
 		//========================== Validation Check ========
	
  		if( serial_no > 1 ) 
 		{
			if(AccountDebit == AccountCredit){
				
				$('.ajax_status').fadeIn();
				$('.ajax-save-message').hide().fadeOut(); 
			//===================== Ajax Submit =================
			  $('#AccountsLedgerTransactionDetailsAddForm').ajaxSubmit({ 
				success: function(responseText, responseCode) { 
				//alert(responseText);
				$('.ajax_status').hide(); 
				$('.ajax-save-message').hide().html(responseText).fadeIn(); 
				$('#Cancel').click();
				window.location.reload(true);
			 
 			}
		  });
		}else
		  {
			
			 $.alert.open('warning', 'Debit and Credit is not equal');
			
		}
	}
  	return false; 
	}).appendTo('form div.submit'); 
	
	
});

 