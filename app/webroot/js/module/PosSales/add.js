jQuery(function($){ 
				
	  
	 $("#PosSaleAmountAccountHead").on('change',function(e){
		if($(this).val() !=3){
			$("#WrapperAccountsCheckNumber").html("<label for='PosSaleAmountCheckNumber'>Check Number:<span class='star'>*</span></label><input type='text' id='PosSaleAmountCheckNumber' class='required' name='data[PosSaleAmount][check_number]'><label for='PosSaleAmountCheckDate'>Check Date:<span class='star'>*</span></label><input type='text' id='PosSaleAmountCheckDate' class='required' name='data[PosSaleAmount][check_date]'>");	
			
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
  
	//====================== End Getting Product List ===============
	 	var invoice_id = {
				title:'Invoice ',
				autoOpen: false,
				height: 600,
				width: 750,
				modal: true,
				draggable:true,
				//close: CloseFunction,
				dialogClass: 'objectdetailsdialog',
			};
		$("#invoice6").dialog(invoice_id);
	//=================DDT==================//	
		var invoice_ddt = {
				title:'DDT Report',
				autoOpen: false,
				height: 600,
				width: 750,
				modal: true,
				draggable:true,
				//close: CloseFunction,
				dialogClass: 'objectdetailsdialog',
			};
		$("#invoice8").dialog(invoice_ddt);
	//===================DDT=======================			 
	//======================Add Products pop up============//
			 var popup_product_barcode = {
				title:'Add Barcode',
				autoOpen: false,
				height: 400,
				width: 490,
				modal: true,
				draggable:true,
				closeOnEscape: false,
  				open: function(event, ui) { $(".ui-dialog-titlebar-close").hide(); },
				////close: CloseFunction,
			  dialogClass: 'objectdetailsdialog',
			};
			$("#invoice5").dialog(popup_product_barcode);
	 
	  //==================Check box===============//
		 $("#PosSaleAmountIsTax").on('change',function(e){
		if($(this).val() ==1 || $(this).val() ==0){ 
				  check_euro();
		  		  SubTotal();
			} 
	});
	 
	 
	 	//============================End check box==========
		
	//======================= Start Add Script =====================				
 	 $('#btn_PosSale_add').click(function(){
		 			
 	 	//========================== Validation Check ========
  	if( $('#PosSaleAddForm').valid() && $('#PosSaleAmountAddForm').valid()) 
 		{
			$('.ajax_status').fadeIn();
			$('.overlaydiv').fadeIn();

			$.alert.open('confirm', 'Are you sure you want to save ?', function(button) {
				
				if (button == 'no'){
 				 		return false;
 					 }
				else {
						
			$('.ajax_status').fadeIn();
			
		//===================== Ajax Submit ================= 
  var data= $('#PosSaleAddForm').serialize() + '&' + $('#PosSaleAmountAddForm').serialize()+ '&' +$('#PosSaleDetailAddForm').serialize();
  	//=================================//
		$.ajax({
			type: "POST",
			url:siteurl+"PosSales/add",
			data:  data,
			success: function(response){
 					//window.location.reload();
					//alert(response);
 				  if(response)
				    {
 						$.alert.open({
							buttons: {
								InvoiceId: 'Invoice',
								ddtId: 'DDT',
								OrderId: 'Order',
								RecepitId: 'Recepit',
								EstimateId: 'Estimate',
								smartAlertClose: 'Cancel'
							},
							 callback: function(button) {
								 
								   if(button == 'InvoiceId'){
									        var ulrs =siteurl+"PosSales/view/"+response;
									        $("#invoice6").load(ulrs, [], function(){
										    $("#invoice6").dialog("open");
										    });
								   }
								  else if(button == 'ddtId'){
									  
  									 var ulrsddt =siteurl+"PosSales/view/"+response+"/ddt_report";
									        $("#invoice6").load(ulrsddt, [], function(){
										   	$("#invoice6").dialog("open");
										});
									 
									 
									 
									 //$.alert.open('There is No data for DDT'); 
								   }
								  else if(button == 'OrderId'){
									  		 var ulrsddt =siteurl+"PosSales/view/"+response+"/order_report";
									 		$("#invoice6").load(ulrsddt, [], function(){
										   	$("#invoice6").dialog("open");
											});
									}
								  else if(button == 'RecepitId'){
									  		var ulrsddt =siteurl+"PosSales/view/"+response+"/recepit_report";
									 		$("#invoice6").load(ulrsddt, [], function(){
										   	$("#invoice6").dialog("open");
											});
								    }
								  else if(button == 'EstimateId'){
											 var ulrsddt =siteurl+"PosSales/view/"+response+"/estimate_report";
									 		$("#invoice6").load(ulrsddt, [], function(){
										   	$("#invoice6").dialog("open");
											});
									   }
								   else if(button == 'smartAlertClose'){
									    window.location.reload(true);
									   }
							},
							
							  type: 'confirm',
							  title: 'Invoice Selection',
							  content: 'Please Choose the Report Button',
							  width: 400
					});
 					 }  
  		 			 $("#ajax_status").fadeOut();
					 $('.overlaydiv').fadeOut();
				}
			});
 		 }
		});
	  }
	return false; 
 });
 				
	$("#PosProductName").on('change',function(){
		var productid= $("#product_id").html();
		var is_barcode= $("#is_barcode").html();
		//var product_type= $("#product_type").html();
		
		if(!is_barcode){
			//if(product_type !=1){
				 
		$('.productlist tr').each(function(index) {
				 if($(this).attr('id') == productid)
				 {
					 $.alert.open('warning', 'This Product Already Taken');
				 }
			});
			//}
		}
		
		});	
	
		var sl_no = 0;
			
//===================== Product Add Function Goes Here ================			
$("#btn_PosProduct_add").on('click',function(e){
  		e.preventDefault();
	 if($("#ProductEntryAddForm").valid()){
	 	//addtogrid();
	 	var productid= $("#product_id").html();
		var quantities= $("#PosProductQuantity").val();
		var stock_Sales_Price = parseFloat($("#PosSalesSalesprice").val());
		var entry_sales_price = parseFloat($("#PosProductPurchaseprice").val());
		
		
 		if( quantities >0  &&    stock_Sales_Price <= entry_sales_price){
			$("#PosProductQuantity").val('');
//======================== Check is barcode and already taken ============
			var is_barcode= $("#is_barcode").html();
			/*var product_type= $("#product_type").html();
			alert(product_type);*/
			var is_not_same = 0;
				if(!is_barcode){
					//if(product_type !=1){
 						$('.productlist tr').each(function(index) {
							 if($(this).attr('id') == productid)
							{
								 $.alert.open('warning', 'This Product Already Taken');
								is_not_same = 1;
							}
							});	
					//}
				}
				 
		
			if(is_not_same ==0){
					$.ajax({
						type: "GET",
						url:siteurl+"PosProducts/checkbarcode/"+productid,
						data: '',
						success: function(response1){
						
						var object=jQuery.parseJSON(response1);
						
						if(object.PosProduct.pos_type_id == 1){
							 addtogrid(object,quantities );
							 //============= Barcode Checking ==========
							 var is_barcode_present = $("#is_barcode").html();
							
							 if(!is_barcode_present){
								var popup_barcode_url=siteurl+"PosBarcodes/sales_barcode/"+productid+"/"+quantities;
								$("#invoice5").load(popup_barcode_url, [], function(){
									$("#invoice5").dialog("open");
								});
								$("#is_barcode").html("");
								$('#product_id').html("");
								//$("#product_type").html("");
							 }else{
								
								var prodcut_id_count =  0;
								$('span input[id*="PosBarcodeBarcode_"]').each(function(index) {
								 	prodcut_id_count = prodcut_id_count+1;
 								}); 
 								 $(".barcode_sin_"+productid).append("<input type='hidden' value='"+is_barcode+"' id='PosBarcodeBarcode_"+prodcut_id_count+"' name='data[PosSaleDetail]["+productid+"][PosBarcode]["+prodcut_id_count+"]'>");
								 
								$("#is_barcode").html("");
								$('#product_id').html("");
								//$("#product_type").html("");
								 
							 }
						  }
						else{
								addtogrid(object,quantities);
								 
								
							}
					 
					 }
				});
			}
		}else{
			 $.alert.open('warning', 'Please Check Quantity Or Price');
		}
		
		
	 		 
	 }
  });
	

//===================== Product Add Function End Here ================		
   		$('.productlist').on('click', '.deletelink', function() {
				 var ids= $(this).attr('id');
				 var id= ids.split('_');
				 $("#"+id[1]).remove();
				 SubTotal();
			 	  
				 
		});
	  	// $(".microcontroll select").select2();
		 
//========================product status=============================//
  	$('#PosSaleAmountDiscount').focusout(function(e) {	
				e.preventDefault();
	 	 		discount();
 	  });
    
	 $.validator.addMethod('lessThan', function(value, element, param) {
   		 var i = parseInt(value);
    		var j = parseInt($(param).val());
    		return i <= j; // i is compaired to j
		}, "Less Than");
	 
	$('#ProductEntryAddForm').validate({rules: {
		field: {number: true},
		"data[PosProduct][Quantity]":{
				 lessThan: "#PosSalesStock" 
				}
		},
		messages: {
		"data[PosProduct][Quantity]": "Sales Price must be Greater than from Purchase Price ",},
	});
	 
	 //====================== Find Customer Mail  ===================
	$("#PosSaleEmailAddress").autocomplete({
		  minLength: 3,
		   search  : function(){$(".ajax_status").fadeIn();},
		   open    : function(){$(".ajax_status").fadeOut();},
			source: function( request, response ) {
				 
				 
				var cname=$('#PosSaleEmailAddress').val();
 				$.post(siteurl+"PosSales/customerlist/"+cname, function(data) {
					  
 					response( $.map( data, function( item ) {
					return {
						label: item.PosCustomer.email,
						value: item.PosCustomer.id,
						text:item.PosCustomer
					 }
	                }));
					
				}, 'json');
			},
			 
			select: function( event, ui ) {
 				$("#PosSalePosCustomerId").val(ui.item.value);
				$("#PosSaleUserId").val(ui.item.text.user_id);
			 	$("#PosSaleEmailAddress").val(ui.item.label);
				$("#PosSalePhone").val(ui.item.text.mobile);
				$("#PosSaleName").val(ui.item.text.name);
				$("#PosSalePiva").val(ui.item.text.iva);
				$("#PosSaleAddress").val(ui.item.text.address);
			   $("#ajax_status").fadeOut();
			  	return false;
 			},
			focus: function( event, ui ) {
 				return false;
			}
		});
	//=======================================Customer End Information=================================//
	
	 //====================== Find Customer Mail  ===================
	$("#PosSalePhone").autocomplete({
		  minLength: 4,
		   search  : function(){$(".ajax_status").fadeIn();},
		   open    : function(){$(".ajax_status").fadeOut();},
			source: function( request, response ) {
				 
				var cphone=$('#PosSalePhone').val();
 				$.post(siteurl+"PosSales/customerlist/"+cphone+"/mobile", function(data) {
					 
 					response( $.map( data, function( item ) {
					return {
						label: item.PosCustomer.mobile,
						value: item.PosCustomer.id,
						text:item.PosCustomer
					 }
	                }));
					
				}, 'json');
			},
			 
			select: function( event, ui ) {
 				$("#PosSalePosCustomerId").val(ui.item.value);
				$("#PosSaleUserId").val(ui.item.text.user_id);
				$("#PosSaleEmailAddress").val(ui.item.text.email);
				$("#PosSalePhone").val(ui.item.text.mobile);
				$("#PosSaleName").val(ui.item.text.name);
				$("#PosSalePiva").val(ui.item.text.iva);
				$("#PosSaleAddress").val(ui.item.text.address);
			   $("#ajax_status").fadeOut();
			  	return false;
 			},
			focus: function( event, ui ) {
 				return false;
			}
		});
	//=======================================Customer End Information=================================//
	
	 //====================== Find Customer Mail  ===================
	$("#PosSalePiva").autocomplete({
		  minLength: 3,
		   search  : function(){$(".ajax_status").fadeIn();},
		   open    : function(){$(".ajax_status").fadeOut();},
			source: function( request, response ) {
				 
				var cname=$('#PosSalePiva').val();
 				$.post(siteurl+"PosSales/customerlist/"+cname+"/iva", function(data) {
					 
 					response( $.map( data, function( item ) {
					return {
						label: item.PosCustomer.iva,
						value: item.PosCustomer.id,
						text:item.PosCustomer
					 }
	                }));
					
				}, 'json');
			},
			 
			select: function( event, ui ) {
 				$("#PosSalePosCustomerId").val(ui.item.value);
				$("#PosSaleUserId").val(ui.item.text.user_id);
				$("#PosSaleEmailAddress").val(ui.item.text.email);
				$("#PosSalePhone").val(ui.item.text.mobile);
				$("#PosSaleName").val(ui.item.text.name);
				$("#PosSalePiva").val(ui.item.text.iva);
				$("#PosSaleAddress").val(ui.item.text.address);
			   $("#ajax_status").fadeOut();
			  	return false;
 			},
			focus: function( event, ui ) {
 				return false;
			}
		});
	//=======================================Customer End Information=================================// 
	
	//====================== Find Customer Mail  ===================
	$("#PosSaleName").autocomplete({
		  minLength: 3,
		   search  : function(){$(".ajax_status").fadeIn();},
		   open    : function(){$(".ajax_status").fadeOut();},
			source: function( request, response ) {
				 
				var cname=$('#PosSaleName').val();
 				$.post(siteurl+"PosSales/customerlist/"+cname+"/name", function(data) {
					 
 					response( $.map( data, function( item ) {
					return {
						label: item.PosCustomer.name+"  "+item.PosCustomer.email,
						value: item.PosCustomer.id,
						text:item.PosCustomer
					 }
	                }));
					
				}, 'json');
			},
			 
			select: function( event, ui ) {
 				$("#PosSalePosCustomerId").val(ui.item.value);
				$("#PosSaleUserId").val(ui.item.text.user_id);
				$("#PosSaleEmailAddress").val(ui.item.text.email);
				$("#PosSalePhone").val(ui.item.text.mobile);
				$("#PosSaleName").val(ui.item.text.name);
				$("#PosSalePiva").val(ui.item.text.iva);
				$("#PosSaleAddress").val(ui.item.text.address);
			   $("#ajax_status").fadeOut();
			  	return false;
 			},
			focus: function( event, ui ) {
 				return false;
			}
		});
	//=======================================Customer End Information=================================//
 
 //============== Product Search By Barcode ==========================
	 
	
	$("#PosProductName").on("keyup", function(e) {
		 if($(this).val().length >6 && $(this).val().substring(0,3)== 'SPR'){
			$.ajax({
					type: "GET",
					url:siteurl+"pos_barcodes/product_find_throw_barcode/"+ $(this).val() ,
					success: function(response){
 					 var object=jQuery.parseJSON(response);

 						  if(Object.getOwnPropertyNames(object).length ===1){
							  
							  $.alert.open('warning', 'This barcode item either sold or not in stock');
							  $("#PosSalesSalesprice,#PosSalesPurchaseprice,#PosSalesStock,#PosProductPurchaseprice").val("");
						      $("#SalesPriceStatus,#StockStatuss,#PurchasePriceStatus #is_barcode #product_type").html("");
							   $('.ajax_status').hide(); 
						     }
							else{  
								$('#product_id').html(object.PosProduct.id);
								$("#PosSalesSalesprice").val(object.PosProduct.PosStock.last_sales);
								$("#PosSalesPurchaseprice").val(object.PosProduct.PosStock.last_purchase);
								$("#PosSalesStock").val(object.PosProduct.PosStock.quantity);
								$("#SalesPriceStatus").html(object.PosProduct.PosStock.last_sales);
								$("#StockStatuss").html(object.PosProduct.PosStock.quantity);
								$("#PurchasePriceStatus").html(object.PosProduct.PosStock.last_purchase);
								$("#PosProductPurchaseprice").val(object.PosProduct.PosStock.last_sales);	
								
								 
								if(object.PosProduct.pos_type_id == 1){

									$("#is_barcode").html(object.PosBarcode.barcode);
									$("#PosProductQuantity").val(1);
									$("#PosProductQuantity").attr("readonly", "readonly");    
								}
							}
						 $('.ajax_status').hide(); 
						}
					});	
		 }
		 else{
 			  
		 }
	});
	
	$( "#PosProductName" ).autocomplete(
	{
		 minLength: 3,
			search  : function(){$(".ajax_status").fadeIn();},
			open    : function(){$(".ajax_status").fadeOut();},
			source: data,
			select: function( event, ui ) {
				$("#PosProductQuantity").val("");
				$("#PosProductQuantity").removeAttr("readonly");    
				$("#is_barcode").html("");
				$('#product_id').html("");
				$("#product_type").html("");
				$("#PosProductName" ).val( ui.item.label);
				$('#product_id').html(ui.item.actor);
				//================Product Status===========//
					$.ajax({
					type: "GET",
					url:siteurl+"PosPurchases/productstatus/"+ui.item.actor ,
					success: function(response){
						//alert(response);
					 var object=jQuery.parseJSON(response);
						  
						  if(object == ''){
							  $("#PosSalesSalesprice,#PosSalesPurchaseprice,#PosSalesStock,#PosProductPurchaseprice").val("");
						      $("#SalesPriceStatus,#StockStatuss,#PurchasePriceStatus").html("");
						     }
							else{   
							$("#PosSalesSalesprice").val(object.PosStock.salesprice);
							$("#PosSalesPurchaseprice").val(object.PosStock.purchaseprice);
							$("#PosSalesStock").val(object.PosStock.in_stock);
							$("#SalesPriceStatus").html(object.PosStock.salesprice);
							$("#StockStatuss").html(object.PosStock.in_stock);
							$("#PurchasePriceStatus").html(object.PosStock.purchaseprice);
							$("#PosProductPurchaseprice").val(object.PosStock.salesprice);	
							//$("#product_type").html(object.PosProduct.pos_type_id );
							}
						 $('.ajax_status').hide(); 
						}
					});
				 //================Product Status End ===========//
				
				return false;
			}
			}).data( "uiAutocomplete" )._renderItem = function( ul, item ) {
			return $( "<li></li>" )
				.data( "item.uiAutocomplete", item )
				.append( "<a><strong>" + item.label + "</strong> / " + item.actor + "</a>" )
				.appendTo( ul );
			};	
			
		 
  
});		
	//============from purchase==================//
	function totalprice(){
		$("#PosSaleAmountTotalprice").val(
		parseFloat($("#PosProductQuantity").val())* parseFloat($("#PosProductPurchaseprice").val()));
	}
	 		
	function SubTotal(){
		if($('.totalpriceli').length !=0){		 
			testTotalAmount = 0;
			var tax = 0;
			var total_tax =0;
			$('.totalpriceli').each(function(index) {
					testTotalAmount = testTotalAmount + parseFloat($(this).html());
				$("#PosSaleAmountTotalprice").val(testTotalAmount.toFixed(2));
					tax=parseFloat($("#tax_hidden").html());
					//alert(tax);
					total_tax=total_tax +(tax/100)*parseFloat($(this).html());
				 
				 var tax_vals =$('#PosSaleAmountIsTax').val();
				 
					if (tax_vals == 1) {
      	  		    $("#PosSaleAmountTax").val('0.00');
		  	        }
				
				
				  else{
					$("#PosSaleAmountTax").val(parseFloat(total_tax).toFixed(2));
					}
				 
						var payable_amount=testTotalAmount+total_tax;
				$("#PosSaleAmountPayableAmount").val(parseInt(payable_amount).toFixed(2));
						discount();
				 });
		}else  
			{
			$("#PosSaleAmountTotalprice").val("0.00");
			$("#PosSaleAmountTax").val("0.00");
			$("#PosSaleAmountPayableAmount").val("0.00");
		 	}}
			
	function discount(){
				var discount_val =0;
			if($("#PosSaleAmountDiscount").val() == ''){
				 discount_val;
			 }
			 else if($("#PosSaleAmountDiscount").val() != '') {
				 discount_val = parseFloat($("#PosSaleAmountDiscount").val());
			   }
		
		var total_payable_amount = parseFloat(parseFloat($("#PosSaleAmountTotalprice").val())+parseFloat(check_euro())- discount_val);
	 
		if(total_payable_amount>0){
				$('#PosSaleAmountPayableAmount').val(total_payable_amount.toFixed(2));
				$('#WrapperServiceInvoicePayableAmount label').html("Payable Amount");
			}
		else if(total_payable_amount<0){
				$('#PosSaleAmountPayableAmount').val(total_payable_amount.toFixed(2));
				 
				$('#WrapperServiceInvoicePayableAmount label').html("Advance Payment");
			}
	 	else{
			$('#PosSaleAmountPayableAmount').val("0.00");
		 	}
	 	
		}
	 
		 var sl_no = 0;	
 	function addtogrid(object=null, Quantity){
		
		var is_not_same = 0;
		var productid= $("#product_id").html();
		var is_barcode= $("#is_barcode").html();
	//	var product_type = $("#product_type").html();
		if(!is_barcode){
	//	if(product_type !=1){	
		$('.productlist tr').each(function(index) {
				 if($(this).attr('id') == productid)
				 {
					
					 $.alert.open('warning', 'This Product Already Taken');
					 is_not_same = 1;
				 }
			});	
		//}
		}
		 else{
				$('.productlist tr td span input').each(function(index) {
				  if($(this).attr('value')== is_barcode)
				  {
					   $.alert.open('warning', 'This Barcode Item Already Taken');
					    is_not_same = 1;
				  }
												   
												   
				});

				//is_not_same = 1;
		} 
		
	 	if(is_not_same ==0){
 	
	var productid= $("#product_id").html();
 	var productval= object.PosProduct.name;
 	//object.PosBrand.name;
	
	var brandid= object.PosBrand.id;
	var brandval= object.PosBrand.name;
	var categoryid= object.PosPcategory.id;
	var categoryval= object.PosPcategory.name;
	var Quantity= Quantity;
	var purchaseprise= $("#PosProductPurchaseprice").val();
	
//=============================== For Serial and alterrow =====================	
	var classalt = '';
		if (sl_no++ % 2 == 0) {
			 classalt = ' altrow';
		}
	var totalprice=Quantity*purchaseprise;
	 if(is_barcode){
		var barcode_class = "barcode_sin_"+productid; 
 	}else{
		var barcode_class = "barcode_"+productid; 
	}
	
	$(".productlist").append("<tr  class='productlistli_"+productid+" "+classalt+"' id='"+productid+"'><td>"+sl_no+"</td><td><input type='hidden' class=' productid' value="+productid+" name='data[PosSaleDetail]["+productid+"][pos_product_id]'><span class='productvalli'>"+productval+"</span><input type='hidden' class='brandid' value="+brandid+" name='data[PosSaleDetail]["+productid+"][pos_brand_id]'></td><td><span class='brandvalli'>"+brandval+"</span><input type='hidden' class='categoryid' value="+categoryid+" name='data[PosSaleDetail]["+productid+"][pos_pcategory_id]'></td><td><span class='categoryvalli'>"+categoryval+"</span></td><td><span class='Quantityli'>"+Quantity+"</span><input type='hidden' class='categoryid' value="+Quantity+" name='data[PosSaleDetail]["+productid+"][quantity]'></td><td><span class='purchasepriseli'>"+purchaseprise+"</span><input type='hidden' class='categoryid' value="+purchaseprise+" name='data[PosSaleDetail]["+productid+"][price]'></td><td><span class='totalpriceli'>"+totalprice+"</span><input type='hidden' class='categoryid' value="+totalprice+" name='data[PosSaleDetail]["+productid+"][totalprice]'><span id='all_barcode_sale' class='"+barcode_class+"'></span></td><td><span class='deletelink' id='deletelink_"+productid+"'></span></td></tr>");
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
		
		
	}
		
	function validator(){ 
       			 $("#ProductEntryAddForm").valid();
	      }
		
	
	
	function check_euro(){
 		var tax_check=0;
		var tax_val =$('#PosSaleAmountIsTax').val();
		if(tax_val == 1){
			return tax_check;
		  }
		else
		 	{
      		   tax_check = $("#PosSaleAmountTax").val();
			   return tax_check;
	 		}
		 }
		