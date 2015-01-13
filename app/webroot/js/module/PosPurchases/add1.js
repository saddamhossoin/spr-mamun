jQuery(function($){ 
	$("#PosProductName").on('change',function(){
	var productid= $("#PosProductName option:selected").val();
												
	$('.productlist tr').each(function(index) {
   		 if($(this).attr('id') == productid)
		 {
		 	alert('This Product Already Taken');
			$('#PosProductName').find('option:first').attr('selected', 'selected').parent('select');
		 }
	});														
});		
 	 		$("#PosProductQuantity").ForceNumericOnly();		
		 	$("#PosProductPurchaseprice").ForceNumericOnly();
var sl_no = 0;
			
//===================== Product Add Function Goes Here ================			
$("#btn_PosProduct_add").on('click',function(e){
											   
											 //  alert('anwar');
 e.preventDefault();
 if($("#ProductEntryAddForm").valid()){
	var productid= $("#PosProductName option:selected").val();
 	var productval= $("#PosProductName option:selected").text();
 	var brandid= $("#PosProductPosBrandId option:selected").val();
	var brandval= $("#PosProductPosBrandId option:selected").text();
	var categoryid= $("#PosProductPosPcategoryId option:selected").val();
	var categoryval= $("#PosProductPosPcategoryId option:selected").text();
	var Quantity= $("#PosProductQuantity").val();
	var purchaseprise= $("#PosProductPurchaseprice").val();
	
//=============================== For Serial and alterrow =====================	
	var classalt = '';
		if (sl_no++ % 2 == 0) {
			 classalt = ' altrow';
		}
	var totalprice=Quantity*purchaseprise;
	
	$(".productlist").append("<tr  class='productlistli_"+productid+" "+classalt+"' id='"+productid+"'><td>"+sl_no+"</td><td><input type='hidden' class='productid' value="+productid+" name='data[PosPurchaseDetail]["+productid+"][product_id]'><span class='productvalli'>"+productval+"</span><input type='hidden' class='brandid' value="+brandid+" name='data[PosPurchaseDetail]["+brandid+"][brand_id]'></td><td><span class='brandvalli'>"+brandval+"</span><input type='hidden' class='categoryid' value="+categoryid+" name='data[PosPurchaseDetail]["+categoryid+"][category_id]'></td><td><span class='categoryvalli'>"+categoryval+"</span></td><td><span class='Quantityli'>"+Quantity+"</span></td><td><span class='purchasepriseli'>"+purchaseprise+"</span></td><td><span class='totalpriceli'>"+totalprice+"</span></td><td><span class='deletelink' id='deletelink_"+productid+"'></span></td></tr>
");
		$('#PosProductName').find('option:first').attr('selected', 'selected').parent('select');
					 //================ Call Total Amoutn =====================
						 SubTotal();
 					 //================ End Call Total Amoutn Calculation =====
 					 //============== Reset Form Field ============
					 $("#PosProductQuantity").val('');
					 $("#PosProductPurchaseprice").val('');
					 $("#PosProductPosBrandId").val('');
					 $("#PosProductPosPcategoryId").val('');
			  
 }
  	 });
 
  	$("[id^=deletelink_]").on('click',function(){
		
		var ids= $(this).attr('id');
	 	var id= ids.split('_');
		$("#"+id[1]).remove();
		SubTotal();
		calculatediscountamount();
 	});
 
 			
 //======================= Start Add Script =====================				
 	 $('#btn_PosPurchase_add').click(function(){
 		//========================== Validation Check ========
  		if( $('#PosPurchaseAddForm').valid()) 
 		{
			$('.ajax_status').fadeIn();
			$('.ajax-save-message').hide().fadeOut(); 
		//===================== Ajax Submit =================
		  $('#PosPurchaseAddForm').ajaxSubmit({ 
			success: function(responseText, responseCode) { 
			$('.ajax_status').hide(); 
			$('.ajax-save-message').hide().html(responseText).fadeIn(); 
			$('#Cancel').click()
			 
 			}
		});
	
	/*
	$('#btn_patient_test_account_add').click(function(){
  		//========================== Validation Check ========
		if($("#PatientDetailAddForm").valid()){
			$('.ajax_status').fadeIn();
			$('.ajax-save-message').hide().fadeOut(); 
 //================== Patient Details Add =============			
			 $.ajax({
			type: "POST",
			url:siteurl+"patient_details/add/"+$("#invoiceid").val(),
			data: $("#PatientDetailAddForm").serialize(),
			success: function(response){
  				if(response !=0){
					//alert(response);
			 $("#invoiceid").val(response);
		
  	 	if( $("#PatientTestAddForm .testlist").html() != ' ') 
 	 	{
			//alert($("#invoiceid").val());
		//===================== Patient Test Submit =================
 			 $.ajax({
			type: "POST",
			url:siteurl+"patient_tests/add/"+$("#invoiceid").val(),
			data: $("#PatientTestAddForm").serialize(),
			success: function(response){
 				if(response !=0){
		//======================== Patient Accounts Submit Here =======
					$.ajax({});
 				}
				}
			}); 
		//===================== Patient Accounts Submit =================
 	 }else{
		 alert('Please Select Test');
	 }
		}
	}});
		}
  	return false; 
	}); 
	
	
	*/
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	}
  	return false; 
	}).appendTo('form div.submit'); 
	 
	 
	 
	 
	  $("#PosPurchasePosSupplierId").on('change',function(){
  	$('.ajax_status').fadeIn();
 	$.ajax({
			type: "GET",
			url:siteurl+"PosPurchases/getsupllier/"+$("#PosPurchasePosSupplierId").val(),
			data: '',
			success: function(response){
				//alert(response);
			 $('#second').html(response);
				$('.ajax_status').hide();
				}
			});
	
	 });

	
	$("#PosProductPosBrandId").on('change',function(){
  	$('.ajax_status').fadeIn();
 	$.ajax({
			type: "GET",
			url:siteurl+"PosPurchases/getcategory/"+$("#PosProductPosBrandId").val(),
			data: '',
			success: function(response){
				//alert(response);
			 $('#PosProductPosPcategoryId').html(response);
				$('.ajax_status').hide();
				}
			});
	 
 	//alert('anwar');
 });

	 	$("#PosProductPosPcategoryId").on('change',function(){
  	$('.ajax_status').fadeIn();
 	$.ajax({
			type: "GET",
			url:siteurl+"PosPurchases/getproduct/"+$("#PosProductPosPcategoryId").val(),
			data: '',
			success: function(response){
				//alert(response);
			 $('#PosProductName').html(response);
				$('.ajax_status').hide();
				}
			});
	 
 	//alert('anwar');
 });
//========================product status=============================//
	 	 	$("#PosProductName").on('change',function(){
  	$('.ajax_status').fadeIn();
 	$.ajax({
			type: "GET",
			url:siteurl+"PosPurchases/productstatus/"+$("#PosProductName").val(),
			data: '',
			success: function(response){
				//alert(response);
			 $('#productstatus').html(response);
				$('.ajax_status').hide();
				}
			});
	 
 	//alert('anwar');
 });
 	 //=================Datepicker===================//
		
/*   $( "#PosPurchasePurchaseDate" ).datepicker({
            changeMonth: true,
            changeYear: true,
			dateFormat:"yy-mm-dd"
        });*/
/*	//======================= Start Add Script =====================				
 	 $('#Cancel_monitoring').click(function(){
			$('#MonitoringPublishtime').val('');
			$('#MonitoringProgramme').val('');
			$('#MonitoringPlacing').val('');
			$('.ui-autocomplete-input').val('');

			

		 return false; 
	}); 
 //==================== End Add Script =========================
		
		
	*/	 
//===================== Auto Complete Calling ====================
		$( "#PosProductName" ).combobox();
	//================= End Auto complete Calling===============	
});
	function totalprice(){
				$("#PosPurchaseTotalprice").val(
				parseFloat($("#PosProductQuantity").val())* parseFloat($("#PosProductPurchaseprice").val()));
			}
		function SubTotal(){
		if($('.totalpriceli').length !=0){		 
		testTotalAmount = 0;
		$('.totalpriceli').each(function(index) {
    		 	testTotalAmount = testTotalAmount + parseFloat($(this).html());
			$("#PosPurchaseTotalprice").val(testTotalAmount);
			//$("#PatientAccountTesttax").val((testTotalAmount*2.5)/100);
	//$("#PatientAccountTotalPayableAmount").val(testTotalAmount+((testTotalAmount*2.5)/100));
	});
	}else  
	{
			$("#PatientAccountTestTotal").val("0.00");
			//$("#PatientAccountTesttax").val("0.00");
			//$("#PatientAccountTotalPayableAmount").val("0.00");
	
	}
 	}	
			