jQuery(function($){ 
				
 $("#PosPurchaseManualInvoiceId").on('focusout',function(){
  	$('.ajax_status').fadeIn();
	var invoicenumber = $("#PosPurchaseManualInvoiceId").val();
		var supplier_id = $("#PosPurchasePosSupplierId").val();
		if(supplier_id  == ''){
			$('#PosPurchaseManualInvoiceId').val('');
			$.alert.open('warning', 'Please Select Supplier');
 		}else{
 			$.ajax({
			type: "GET",
			url:siteurl+"PosPurchases/checkInvoiceId/"+invoicenumber+"/"+supplier_id,
			data: '',
			success: function(response){

				 if(response == '0'){
					 $('#PosPurchaseManualInvoiceId').val('');
					 $.alert.open('warning', 'This invoice number already exists');
				}
				$('.ajax_status').hide();
				}
			});
		}
	
	 });
				
//				var num = 123.2563;
	//			alert(num.toFixed(2));

	$("#PosPurchaseAmountAccountHead").on('change',function(e){
		if($(this).val() !=3){
			$("#WrapperAccountsCheckNumber").html("<label for='PosPurchaseAmountCheckNumber'>Check Number:<span class='star'>*</span></label><input type='text' id='PosPurchaseAmountCheckNumber' class='required' name='data[PosPurchaseAmount][check_number]'><label for='PosPurchaseAmountCheckDate'>Check Date:<span class='star'>*</span></label><input type='text' id='PosPurchaseAmountCheckDate' class='required' name='data[PosPurchaseAmount][check_date]'>");	
 			
			  $( "#PosPurchaseAmountCheckDate").datepicker({
					changeMonth: true,
					changeYear: true,
					dateFormat:"yy-mm-dd",
					 onSelect: function(dateText, inst) {
							var date = $(this).val();
							var invoiceDate = $("#PosPurchaseManualInvoiceDate").val();
							if(invoiceDate == ""){
								$.alert.open('warning', 'Please Invoice Date Select First');
								$(this).val("");
 							}else{
									if(new Date(invoiceDate).getTime() > new Date(date).getTime()){
									$.alert.open('warning', 'Must be invoice date is ahead than Check date');
									$(this).val("");
								} 
							}
 						}
         		});	 
		}else{
			$("#WrapperAccountsCheckNumber").html("");
		}
	});
				
		 //==================Check box===============//
		 $("#PosPurchaseAmountIsTax").on('change',function(e){
		if($(this).val() ==1 || $(this).val() ==0){ 
				  check_euro();
		  		  SubTotal();
			} 
	});
		 
	  
	 
	 	//============================End check box==========
 	 	//======================Add Products pop up============//
			 var popup_product_add = {
				title:'Add Product',
				autoOpen: false,
				height: 450,
				width: 1100,
				modal: true,
				draggable:true,
				 close: function (e, ui) { $("#invoice5").dialog("close");  },
			  dialogClass: 'objectdetailsdialog',
			};
			$("#invoice5").dialog(popup_product_add);
			
			$("#image").on('click',function(e){
					e.preventDefault(); 
					$('.overlaydiv').fadeIn(); 
					
					var ulrs =siteurl+"PosProducts/popup_add";
					$("#invoice5").load(ulrs, [], function(){
					$("#invoice5").dialog("open");
					$('.overlaydiv').fadeOut();
				 	}); 
			});
	
	//====================== End Products pop up===========//
				
		 var dialogOptstempleteGeneralList = {
				title:'Invoice ',
				autoOpen: false,
				height: 600,
				width: 750,
				modal: true,
				draggable:true,
				 close: function (e, ui) { window.location.href = siteurl+"PosPurchases/add";},
 				dialogClass: 'objectdetailsdialog',
			};
		$("#invoice6").dialog(dialogOptstempleteGeneralList);
		
		
		 var dialogOptstempleteGeneral = {
				title:'Barcode ',
				autoOpen: false,
				height: 400,
				width: 450,
				modal: true,
				draggable:true,
				//close: CloseFunction,
				dialogClass: 'barcode_generate_dialog',
			};
		$("#invoice2").dialog(dialogOptstempleteGeneral);
		
		//================== Image Data =============
		var  imageData = ''; 
		$("#PosPurchaseAddForm").submit(function(e)
			{
 
				var formObj = $(this);
				var formURL = formObj.attr("action");
				var imageData = new FormData(this);
				
				 //Callback handler for form submit event
 
			$.ajax({
				url: siteurl+"PosPurchases/uploadImage",
				type: 'POST',
				data:  imageData,
				mimeType:"multipart/form-data",
				contentType: false,
				cache: false,
				processData:false,
			
			success: function(data, textStatus, jqXHR)
			{
				$('.ajax_status').fadeOut();
			
			},
			error: function(jqXHR, textStatus, errorThrown) 
				{
					
				}          
			});
			e.preventDefault(); //Prevent Default action. 
			e.unbind();
 
			}); 
		
		
		

	  
	  
	  
		
				 //======================= Start Add Script =====================				
 	 $('#btn_PosPurchase_add').click(function(e){
											
  	 	 e.preventDefault();
  		//========================== Validation Check ========
  		if( $('#PosPurchaseAddForm').valid() && $('#PosPurchaseAmountAddForm').valid()) 
 		{
			$('.overlaydiv').fadeIn();
 			$.alert.open('confirm', 'Are you sure you want to save ?', function(button) {
 				if (button == 'no'){
 					 return false;
	  				}
				else {
					$("#btn_PosPurchase_add").remove();
				$('.ajax_status').fadeIn();
				$('.ajax-save-message').hide().fadeOut(); 
		//===================== Ajax Submit =================
 		  var data= $('#PosPurchaseAddForm').serialize() + '&' + $('#PosPurchaseAmountAddForm').serialize()+ '&' +$('#PosPurchaseDetailAddForm').serialize();
		  
  	//=================================//
		$.ajax({
			type: "POST",
			url:siteurl+"PosPurchases/add",
			data:  data, 
			success: function(response){
  				if(response)
				    {
 						var ulrs =siteurl+"PosPurchases/view/"+response;
						$("#invoice6").load(ulrs, [], function(){
							$("#invoice6").dialog("open");
						});
						
						if($("#PosPurchaseInvoiceImage").val() != ''){
								$('.ajax_status').fadeIn();
								$("#PosPurchaseUpdateId").val(response);
								$("#PosPurchaseAddForm").submit();
  						}
  					 } 
			 	}
			
			});
			
			$('.ajax_status').hide(); 
		
			$('.ajax-save-message').hide().html(response).fadeIn(); 
 			}
		});
	   
	    }
		
  	return false; 
	});
	 
 	  
	 			
	$("#PosProductName").on('change',function(){
		var productid= $("#PosProductName option:selected").val();
												
			$('.productlist tr').each(function(index) {
				 if($(this).attr('id') == productid)
				 {
					  $.alert.open('warning', 'This Product Already Taken');
					  $('#PosProductName').val('');
					//  $('#s2id_PosProductName .select2-chosen').html( "--- Please Select ---" );
				 }
				 
			});	
	 
});		 

			
//===================== Product Add Function Goes Here ================			
$("#btn_PosProduct_add").on('click',function(e){
  	 	e.preventDefault();
		if($("#ProductEntryAddForm").valid()){
			var statusSalesPrice = parseFloat($("#PosPurchaseSalesprice").val());
			var fieldSalesPrice = parseFloat($("#PosProductSalesprice").val());
			var purchasePrice = parseFloat($("#PosProductPurchaseprice").val());
			//var fieldSalesPrice = $("#SalesPriceView").html();
			 
		if(  fieldSalesPrice  < purchasePrice){
			$.alert.open('confirm', 'Sales Price is not less than Purchase Price???');
		}
 		 else if(fieldSalesPrice == statusSalesPrice ){	
 				
				itemAddGrid();
  		 	}else{
			  $.alert.open('confirm', 'Sales Price Change???', function(button) {
				if (button == 'yes'){
				 
 					itemAddGrid();
 				}
 			});
 		 }
 		}
   	 });
	  
	$('.productlist').on('click', '.deletelink', function() {
				 var ids= $(this).attr('id');
				 var id= ids.split('_');
				 $("#"+id[1]).remove();
				 SubTotal();
	 			 
		});
	
  
  
  
  $("#PosPurchasePosSupplierId").on('change',function(){
  	$('.ajax_status').fadeIn();
	if($("#PosPurchasePosSupplierId").val() != ''){
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
	}else{
		$('.ajax_status').hide();
	}
	
	 });

	  	$("#PosProductPosPcategoryId").on('change',function(){
			if($("#PosProductPosBrandId").val() != ''){
			$('.ajax_status').fadeIn();
			$.ajax({
				type: "GET",
				url:siteurl+"PosPurchases/getproduct/"+$("#PosProductPosPcategoryId").val()+"/"+$("#PosProductPosBrandId").val(),
				data: '',
				success: function(response){
					//alert(response);
				 $('#PosProductName').html(response);
					$('.ajax_status').hide();
					}
			
		});
	}else{
			   $.alert.open('warning', 'Please Select Brand First!!!');
			
	}
	 
 	//alert('anwar');
 });
	//==========================PosProductPosBrandId==============================///	
		$("#PosProductPosBrandId").on('change',function(){
 			if($("#PosProductPosPcategoryId").val() != ''){
 			$('.ajax_status').fadeIn();
			$.ajax({
					type: "GET",
					url:siteurl+"PosPurchases/getproduct/"+$("#PosProductPosPcategoryId").val()+"/"+$("#PosProductPosBrandId").val(),
					data: '',
					success: function(response){
						//alert(response);
					 $('#PosProductName').html(response);
						$('.ajax_status').hide();
						}
					});
			} 
 		});
 //========================product status=============================//
	  	$("#PosProductName").on('change',function(){
			$('.ajax_status').fadeIn();
			$.ajax({
			type: "GET",
			url:siteurl+"PosPurchases/productstatus/"+$("#PosProductName").val(),
 			success: function(response){
					var object=jQuery.parseJSON(response);
					 
					$("#PosPurchaseSalesprice").val(object['PosStock']['salesprice']);
					$("#PosPurchasePurchaseprice").val(object['PosStock']['purchaseprice']);
					$("#PosPurchaseStock").val(object['PosStock']['in_stock']);
					
					$("#SalesPriceStatus").html(""+object['PosStock']['salesprice']);
					$("#StockStatuss").html(object['PosStock']['in_stock']);
					$("#PurchasePriceStatus").html(object['PosStock']['purchaseprice']);
					
					$("#PosProductSalesprice").val(object['PosStock']['salesprice']);					
				 
			 $('.ajax_status').hide();
			}
		});
			 
	 
 	//alert('anwar');
 });
			
 $('#PosPurchaseAmountDiscount').focusout(function(e) {	
				e.preventDefault();
	 	 		discount();
     });
  
   $('#PosPurchaseAmountTransport').focusout(function(e) {	
				e.preventDefault();
	 	 		discount();
     });
   
    $('#PosPurchaseAmountOthersFee').focusout(function(e) {	
				e.preventDefault();
	 	 		discount();
     });
 
			
 
//===================== Auto Complete Calling ====================
	//	$( "#PosProductName" ).combobox();
	//================= End Auto complete Calling===============	
});
	function totalprice(){
				$("#PosPurchaseAmountTotalprice").val(
				parseFloat($("#PosProductQuantity").val())* parseFloat($("#PosProductPurchaseprice").val()));
			}
			
    function SubTotal(){
		if($('.totalpriceli').length !=0){		 
		testTotalAmount = 0;
		var tax = 0;
		var total_tax =0;
		$('.totalpriceli').each(function(index) {
    		 	testTotalAmount = testTotalAmount + parseFloat($(this).html());
			$("#PosPurchaseAmountTotalprice").val(testTotalAmount);
				tax=parseFloat($("#tax_hidden").html());
			 	total_tax=total_tax +(tax/100)*parseFloat($(this).html());
				
				var tax_vals =$('#PosPurchaseAmountIsTax').val();
				
		 	if (tax_vals == 1) {
      	  		$("#PosPurchaseAmountTax").val('0.00');
		  	}
			
			  else{
			  	$("#PosPurchaseAmountTax").val(parseFloat(total_tax).toFixed(2));
				}
			
					var payable_amount=testTotalAmount+total_tax;
		 	$("#PosPurchaseAmountPayableAmount").val(parseFloat(payable_amount));
					
					discount();
					
			//$("#PatientAccountTesttax").val((testTotalAmount*2.5)/100);
			//$("#PatientAccountTotalPayableAmount").val(testTotalAmount+((testTotalAmount*2.5)/100));
			});
		}else  
			{
			$("#PosPurchaseAmountTotalprice").val("0.00");
			$("#PosPurchaseAmountTax").val("0.00");
			$("#PosPurchaseAmountPayableAmount").val("0.00");
			//$("#PatientAccountTotalPayableAmount").val("0.00");
	 		}
 	}
	
 
		
	function discount(){
		
 		
 		var total_payable_amount = parseFloat(parseFloat($("#PosPurchaseAmountTotalprice").val())+parseFloat(check_euro())-$("#PosPurchaseAmountDiscount").val()) ;
		
		 total_payable_amount = total_payable_amount+ (parseFloat($("#PosPurchaseAmountTransport").val()) + parseFloat($("#PosPurchaseAmountOthersFee").val()));
		
 		
		total_payable_amount  = total_payable_amount.toFixed(2);
		
		if(total_payable_amount>0){
				$('#PosPurchaseAmountPayableAmount').val(total_payable_amount);
			}
		else if(total_payable_amount<0){
				$('#PosPurchaseAmountPayableAmount').val(total_payable_amount);
				 
				$('#WrapperServiceInvoicePayableAmount label').html("Advance Payment");
			}
	 	else{
			$('#PosPurchaseAmountPayableAmount').val("0.00");
		 	}
	 	
		}
	
	var sl_no = 0;		
	
	function addToGrid( Quantity){
		//alert(Quantity);
		var Quantity= Quantity;
		var productid= $("#PosProductName option:selected").val();
 		var productval= $("#PosProductName option:selected").text();
		var brandid= $("#PosProductPosBrandId option:selected").val();
		var brandval= $("#PosProductPosBrandId option:selected").text();
		var categoryid= $("#PosProductPosPcategoryId option:selected").val();
		var categoryval= $("#PosProductPosPcategoryId option:selected").text();
		var purchaseprise= $("#PosProductPurchaseprice").val();
		
		var salesPrice= $("#PosProductSalesprice").val();
 		
		//=============================== For Serial and alterrow =====================	
			var classalt = '';
				if (sl_no++ % 2 == 0) {
					 classalt = ' altrow';
				}
			var totalprice= (Quantity*purchaseprise).toFixed(2);
			
				$(".productlist").append("<tr  class='productlistli_"+productid+" "+classalt+"' id='"+productid+"'><td>"+sl_no+"</td><td><input type='hidden' class=' productid' value="+productid+" name='data[PosPurchaseDetail]["+productid+"][pos_product_id]'><span class='productvalli'>"+productval+"</span><input type='hidden' class='brandid' value="+brandid+" name='data[PosPurchaseDetail]["+productid+"][pos_brand_id]'></td><td><span class='brandvalli'>"+brandval+"</span><input type='hidden' class='categoryid' value="+categoryid+" name='data[PosPurchaseDetail]["+productid+"][pos_pcategory_id]'></td><td><span class='categoryvalli'>"+categoryval+"</span></td><td><span class='Quantityli'>"+Quantity+"</span><input type='hidden' class='categoryid' value="+Quantity+" name='data[PosPurchaseDetail]["+productid+"][quantity]'></td><td><span class='purchasepriseli'>"+purchaseprise+"</span><input type='hidden' class='categoryid' value="+purchaseprise+" name='data[PosPurchaseDetail]["+productid+"][price]'></td><td><span class='purchasepriseli'>"+salesPrice+"</span><input type='hidden' class='categoryid' value="+salesPrice+" name='data[PosPurchaseDetail]["+productid+"][salesprice]'></td><td><span class='totalpriceli'>"+totalprice+"</span><input type='hidden' class='categoryid' value="+totalprice+" name='data[PosPurchaseDetail]["+productid+"][totalprice]'><span class='barcode_"+productid+"'></span></td><td><span class='deletelink' id='deletelink_"+productid+"'></span></td></tr>");
				
				$('#PosProductName').find('option:first').attr('selected', 'selected').parent('select');
				 //================ Call Total Amoutn =====================
					 SubTotal();
				 //================ End Call Total Amoutn Calculation =====
				 //============== Reset Form Field ============
				 $("#PosProductQuantity").val('');
				 $("#PosProductPurchaseprice").val('');
				 $("#PosProductName").val('');
				 $("#PosPurchasePayamount").val('0');
	}
	
	function check_euro(){
 		var tax_check=0;
		var tax_val =$('#PosPurchaseAmountIsTax').val();
		if(tax_val == 1){
			return tax_check;
		  }
		else
		 	{
      		   tax_check = $("#PosPurchaseAmountTax").val();
			   return tax_check;
	 		}
		 }
	
	function itemAddGrid(){
		var Quantity= $("#PosProductQuantity").val();
		var productid= $("#PosProductName option:selected").val();
		
		
		$.ajax({
				type: "GET",
				url:siteurl+"PosProducts/checksolidproduct/"+$("#PosProductName").val(),
				data: '',
				success: function(response1){
				 if(response1 == '1'){
					  
					var ulrs =siteurl+"PosPurchases/barcode/"+Quantity+"/"+productid;
					$("#invoice2").load(ulrs, [], function(){
					$("#invoice2").dialog("open");
					});
				 }else{
						 
							addToGrid(Quantity);
							 $("#PosProductQuantity").val('');
				 }
				 
				}
			});
	}
		