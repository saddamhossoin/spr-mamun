jQuery(function($){ 

//var sl_no = 0;	
/*
	$(".btnOrder").on('click',function(e){
		
	  
	
        sl_no++;
		
		e.preventDefault();
		var ids= $(this).attr('id');
		//var id= ids.split('_');
			
		var productid =$("#ProductId_"+ids).val();
		var posProductName = $("#posProductName_"+ids).html();
		var OrdereQuantity = $("#OrdereQuantity_"+ids).val();
		var OrderItemPrice = $("#OrderItemPrice_"+ids).val();
		var OrderItemSubtotal =$("#OrderItemSubtotal_"+ids).val();
		var OrderItemOrderId =$("#OrderItemOrderId_"+ids).val();
		var OrderItemBrandId =$("#OrderItemBrandId_"+ids).val();
		var OrderItemCategoryId =$("#OrderItemCategoryId_"+ids).val();
		
		var finalsubtotal =OrdereQuantity * OrderItemPrice;
		
		//alert(OrderItemBrandId);
   
	$(".Orderlist").append("<tr  class='OrderItemId' id='OrderItemno_"+ids+"'><td>"+sl_no+"</td><td id='OrderItem_"+sl_no+"'><input type='hidden' value="+productid+" name='data[OrderItem]["+sl_no+"][pos_product_id]'/>"+posProductName+"</td><input type='hidden' value="+OrderItemOrderId+" name='data[OrderItem]["+sl_no+"][order_id]'/></td><input type='hidden' value="+OrderItemBrandId+" name='data[OrderItem]["+sl_no+"][pos_brand_id]'/></td><input type='hidden' value="+OrderItemCategoryId+" name='data[OrderItem]["+sl_no+"][pos_pcategory_id]'/></td><td id='OrdereQuantity"+sl_no+"'><input type='hidden' value="+OrdereQuantity+" name='data[OrderItem]["+sl_no+"][quantity]'/>"+OrdereQuantity+"</td><td><input type='hidden' value="+OrderItemPrice+" name='data[OrderItem]["+sl_no+"][price]'/><span>"+OrderItemPrice+"</span></td><td><input type='hidden' value="+finalsubtotal+" name='data[OrderItem]["+sl_no+"][subtotal]'/><span  class='totalitem'>"+finalsubtotal+"</span></td><td><span class='deletelink' id='deletelink_"+ids+"'></span></td></tr>");	
	
	SubTotal();
	
	
 
 
 });*/ 
 
 //=====================Add to Grid Account Head script start==================//
 
   
	 $("#OrderAccountHead").on('change',function(e){
		if($(this).val() !=3){
			$("#WrapperOrdersCheckNumber").html("<label for='OrderAmountCheckNumber'>Check Number:<span class='star'>*</span></label><input type='text' id='OrderAmountCheckNumber' class='required' name='data[Order][check_number]'><label for='OrderCheckDate'>Check Date:<span class='star'>*</span></label><input type='text' id='OrderCheckDate' class='required' name='data[Order][check_date]'>");	
			
			   $("#OrderCheckDate").datepicker({ 
					changeMonth: true,
					changeYear: true,
					dateFormat:"yy-mm-dd",
         		});	 
		}
		
		else{
			$("#WrapperOrdersCheckNumber").html("");
		}
		
	});
	
 //=====================Add to Grid Account Head script End===================//
 
 //=========================report============================//
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
 
 //======================Add Products pop up============//
			 var popup_product_barcode = {
				title:'Add Barcode',
				autoOpen: false,
				height: 400,
				width: 450,
				modal: true,
				draggable:true,
				closeOnEscape: false,
  				open: function(event, ui) { $(".ui-dialog-titlebar-close").hide(); },
				////close: CloseFunction,
			  dialogClass: 'objectdetailsdialog',
			};
			$("#invoice5").dialog(popup_product_barcode);
 //======================Add Products pop up============//
   $(".submit").on('click',function(e){
	 
	 	 
     
 	e.preventDefault();
	 //if($("#ProductEntryAddForm").valid()){
	 	//addtogrid();
		
		var ids= $(this).attr('id');
		var productid =$("#ProductId_"+ids).val();
		var quantities= $("#OrdereQuantity_"+ids).val();
		 //alert(productid);
		 	 $.ajax({
					type: "GET",
					url:siteurl+"PosProducts/checkbarcode/"+productid,
					data: '',
					success: function(response1){
					 
					 	var object=jQuery.parseJSON(response1);
					 
					 if(object.PosProduct.pos_type_id == 1){
						  	var popup_barcode_url=siteurl+"PosBarcodes/sales_barcode/"+productid+"/"+quantities+"/yes";
							$("#invoice5").load(popup_barcode_url, [], function(){
							$("#invoice5").dialog("open");
							});
							
					 	 	 addtogrid(ids);
					   }
					  else {
						  
						    addtogrid(ids);
						  
						  }
			 		
			  	 
				 }
			});
			
	// }
  
  
   });   
 
 
 		$('.Orderlist').on('click', '.deletelink', function() {
			 
				var ids= $(this).attr('id');
				var id= ids.split('_');
				 $("#OrderItemno_"+id[1]).remove();
				  SubTotal();
	 	});
		
		

		
//================================discount===============================================//
		

$('#OrderDiscount').focusout(function(e) {	
				e.preventDefault();
	 	 		discount();
 	  })

//=================================discount===========================================//

 $("#OrderIsTax").on('change',function(e){
		if($(this).val() ==1 || $(this).val() ==0){ 
				  check_euro();
		  		  SubTotal();
			} 
	    });

 		
 //======================= Start Add Script =====================				
 	 $('#btn_save_orderitem').click(function(e){
		 
		 //alert('ss');
		 e.preventDefault();
		
		//========================== Validation Check ========
  		if( $("#OrderItemCompleteOrderForm").valid()) 
 		{
		 
			$.alert.open('confirm', 'Are you sure you want to save ?', function(button) {
				
				if (button == 'no')
				     {
 				 		return false;
 					 }
					 
				else if(button == 'yes')
				      {
						
			$('.ajax_status').fadeIn();
			$('.ajax-save-message').hide().fadeOut(); 
			
			
			$.ajax({
			type: "POST",
			url:siteurl+"Orders/complete_order",
			data:  $("#OrderItemCompleteOrderForm").serialize(),
			success: function(response){
				  
			   // alert(response);
				if(response)
				    {
					var ulrs =siteurl+"Orders/online_sales_invoice/"+response;
					$("#invoice6").load(ulrs, [], function(){
					 $("#invoice6").dialog("open");
					});
					//window.location.reload(true);
					 } 
					  $("#ajax_status").fadeOut();
			 	}
			
			});
		//===================== Ajax Submit =================
	
	
	
	   }
	            else {
					window.location.reload(true);
					}
	  });
	}
  		return false; 	 
	});
//==================== End Add Script =========================

//======================check Product===========================//

	$(".btnOrder").click(function(e){
		 e.preventDefault();
		var ids= $(this).attr('id');
	  				//alert($(this).attr('id').split('_'));						
		$('.Orderlist tr').each(function(index) {
			 	 
				 if($(this).attr('id').split('_')[1] == ids)
					 {
						 $.alert.open('warning', 'This Product Already Taken');
					 }
				 else{ 
						 //$(".submit").on('click')();
						 
				 	 }
					  
			});													
		});	
		
//======================Check Product===========================//


//==================Order Status Complete====================//

$(".suspend").click(function(e){
	e.preventDefault();
 	var vars = $(this).attr('id');
	//alert('vars');
 	$.ajax({
			type: "GET",
			url: siteurl+'Orders/suspend_order/'+vars,
			success: function(response){
				//alert(response);
		 	    window.location.reload(true);
			 	}
			 });
 
	});	

//==================Order Status Complete====================//
 
		


});

//=========================Calculate Total Amount============================//	
 	function SubTotal(){
		if($('.totalitem').length !=0){		 
			testTotalAmount = 0;
			var tax = 0;
			var total_tax =0;
			$('.totalitem').each(function(index) {
					testTotalAmount = testTotalAmount + parseFloat($(this).html());
				$("#OrderTotalamount").val(testTotalAmount);
					tax=parseFloat($("#tax_hidden").html());
					//alert(tax);
					total_tax=total_tax +(tax/100)*parseFloat($(this).html());
				 
				  var tax_vals =$('#OrderIsTax').val(); 
					if (tax_vals == 1) {
      	  		    $("#OrderTax").val('0.00');
		  	        }
				  else{
					$("#OrderTax").val(parseFloat(total_tax));
					}
				 
					var payable_amount=testTotalAmount+total_tax;
				    $("#OrderPayableAmount").val(parseInt(payable_amount));
						discount();
				 });
		}else  
			{
			$("#OrderTotalamount").val("0.00");
			$("#OrderTax").val("0.00");
			$("#OrderPayableAmount").val("0.00");
		 	}}
//=========================Calculate Total Amount============================//	
 
//=============================Discount=======================================//
	function discount(){
				var discount_val =0;
			if($("#OrderDiscount").val() == ''){
				 discount_val;
			 }
			 else if($("#OrderDiscount").val() != '') {
				 discount_val = parseFloat($("#OrderDiscount").val());
			   }
		
		var total_payable_amount = parseFloat(parseFloat($("#OrderTotalamount").val())+parseFloat(check_euro())- discount_val);
	 
		if(total_payable_amount>0){
				$('#OrderPayableAmount').val(total_payable_amount);
				$('#WrapperPospayableamount label').html("Payable Amount");
			}
		else if(total_payable_amount<0){
				$('#OrderPayableAmount').val(total_payable_amount);
				 
				$('#WrapperPospayableamount label').html("Advance Payment");
			}
	 	else{
			$('#OrderPayableAmount').val("0.00");
		 	}
	 	
		}
//=============================Discount=======================================//
	 
	 
	function check_euro(){
 		var tax_check=0;
		var tax_val =$('#OrderIsTax').val();
		if(tax_val == 1){
			return tax_check;
		  }
		else
		 	{
      		   tax_check = $("#OrderTax").val();
			   return tax_check;
	 		}
		 }
		 
		 var sl_no = 0;	
		 
 function addtogrid(ids = null){
	 	  sl_no++;
		    
	  	var productid =$("#ProductId_"+ids).val();
		var posProductName = $("#posProductName_"+ids).html();
		var OrdereQuantity = $("#OrdereQuantity_"+ids).val();
		var OrderItemPrice = $("#OrderItemPrice_"+ids).val();
		var OrderItemSubtotal =$("#OrderItemSubtotal_"+ids).val();
		var OrderItemOrderId =$("#OrderItemOrderId_"+ids).val();
		var OrderItemBrandId =$("#OrderItemBrandId_"+ids).val();
		var OrderItemCategoryId =$("#OrderItemCategoryId_"+ids).val();
		
		var finalsubtotal =OrdereQuantity * OrderItemPrice;
		
		//alert(OrderItemBrandId);
   
	$(".Orderlist").append("<tr  class='"+productid+"' id='OrderItemno_"+ids+"'><td>"+sl_no+"</td><td id='OrderItem_"+sl_no+"'><input type='hidden' value="+productid+" name='data[OrderItem]["+productid+"][pos_product_id]'/>"+posProductName+"</td><input type='hidden' value="+OrderItemOrderId+" name='data[OrderItem]["+productid+"][order_id]'/></td><input type='hidden' value="+OrderItemBrandId+" name='data[OrderItem]["+productid+"][pos_brand_id]'/></td><input type='hidden' value="+OrderItemCategoryId+" name='data[OrderItem]["+productid+"][pos_pcategory_id]'/></td><td id='OrdereQuantity"+productid+"'><input type='hidden' value="+OrdereQuantity+" name='data[OrderItem]["+productid+"][quantity]'/>"+OrdereQuantity+"</td><td><input type='hidden' value="+OrderItemPrice+" name='data[OrderItem]["+productid+"][price]'/><span>"+OrderItemPrice+"</span></td><td><input type='hidden' value="+finalsubtotal+" name='data[OrderItem]["+productid+"][subtotal]'/><span  class='totalitem'>"+finalsubtotal+"</span><span id='all_barcode_sale' class='barcode_"+productid+"'></span></td><td><span class='deletelink' id='deletelink_"+ids+"'></span></td></tr>");	
	
	SubTotal();
	 	}
		
	 