jQuery(function($){ 
				
				
	$("#btn_save_clientDelivery").on('click',function(e){
		e.preventDefault();
		if( $('#ServiceInvoiceClientDeliveredForm').valid()){
			
			if( parseFloat($("#ServiceInvoicePayableAmount").val()) == parseFloat($("#ServiceInvoicePayment").val())){
					
  			$('.ajax_status').fadeIn();
			$('.overlaydiv').fadeIn();
			
			$.ajax({
					type: "POST",
					data:$("#ServiceInvoiceClientDeliveredForm").serialize(),
					url:siteurl+"ServiceDeviceInfos/client_delivered" ,
					success: function(response){
						
							$('.ajax_status').fadeOut();
							$('.overlaydiv').fadeOut();
							$.alert.open('warnning', 'Successfully complete!!');
							window.location.href= siteurl+"ServiceDeviceInfos/client_delevery_list";
						
  						}
					});
			}
			else{
					$.alert.open('warnning', 'Payable and Payment is not equal!!!');
			}
		}
	});
				
	$('#ServiceInvoiceDiscount').focusout(function(e) {	
				e.preventDefault();
	 	 		discount();
 	  });
				
	 $("#ServiceInvoiceIsTax").on('change',function(e){
		if($(this).val() ==1){
			var sub_total = parseFloat($("#ServiceInvoiceSubTotal").val());
			var tax = parseFloat((sub_total*22)/100);
 			$("#ServiceInvoiceVat").val(tax.toFixed(2));
 			$("#ServiceInvoiceTotal").val((sub_total + tax).toFixed(2));
		}
		else if( $(this).val() ==0){
			$("#ServiceInvoiceVat").val("0");
			$("#ServiceInvoiceTotal").val( $("#ServiceInvoiceSubTotal").val());
		} 
	});
				
 $("#ServiceInvoiceAccountHeadId").on('change',function(e){
		if($(this).val() !=3){
			$("#WrapperAccountsCheckNumber").html("<label for='PosSaleAmountCheckNumber'>Check Number:<span class='star'>*</span></label><input type='text' id='PosSaleAmountCheckNumber' class='required' name='data[ServiceInvoice][check_number]'><label for='PosSaleAmountCheckDate'>Check Date:<span class='star'>*</span></label><input type='text' id='PosSaleAmountCheckDate' class='required' name='data[ServiceInvoice][check_date]'>");	
			
			   $( "#PosSaleAmountCheckDate").datepicker({
					changeMonth: true,
					changeYear: true,
					dateFormat:"yy-mm-dd",
					onSelect: function(dateText, inst) {
						
						var date1 = $('#PosSaleAmountCheckDate').datepicker('getDate');
						var date2 =  new Date();
						date2 = new Date(date2.getFullYear(), date2.getMonth(), date2.getDate());
						 
 							if(new Date(date2).getTime() > new Date(date1).getTime() ){
							$.alert.open('warning', 'Check date Must be ahead than today');
							$(this).val("");
					}
							
  				}
         		});	 
		}
		
		else{
			$("#WrapperAccountsCheckNumber").html("");
		}
		
	});
});

function discount(){
				var discount_val =0;
			if($("#ServiceInvoiceDiscount").val() == ''){
				 discount_val;
			 }
			 else if($("#ServiceInvoiceDiscount").val() != '') {
				 discount_val = parseFloat($("#ServiceInvoiceDiscount").val());
			   }
			   
		
		var total_payable_amount = parseFloat(parseFloat($("#ServiceInvoiceTotal").val())-parseFloat(discount_val));
	 
		if(total_payable_amount>0){
				$('#ServiceInvoicePayableAmount').val(total_payable_amount.toFixed(2));
				 
			}
		 
	 	else{
			$('#ServiceInvoicePayableAmount').val("0.00");
		 	}
	 	
		}