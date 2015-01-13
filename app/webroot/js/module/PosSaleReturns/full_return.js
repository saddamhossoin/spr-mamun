// JavaScript Document
jQuery(function($){
		
	var returnTotalPrice = 0 ;
 		
	//===================== Return Add To Grid ============= 
	
	 $('.btnReturnSale').on('click',function(e){
				
				e.preventDefault();
			
				var ids= $(this).attr('id');
				var id= ids.split('_');
				var type = $(this).attr('title'); 
	  		//==============validation check ============
				var checkReturnQuantity =parseInt($("#PPRDetailQuantity_"+id[1]).val());
				var checkSalesQuantity = parseInt($("#PPRDSaleQuantity_"+id[1]).val());
			  	 var checkSalesAlreadyQuantity = parseInt($("#PPRDSaleReturnQuantity_"+id[1]).val());
				 var diff = checkSalesQuantity - checkSalesAlreadyQuantity;
				 
			 	if( ( diff >= checkReturnQuantity) && (checkReturnQuantity != '')  &&  (checkReturnQuantity != 0)  )
				  {
				 	
				  if( type == 1 ){
						  		var popup_barcode_url=siteurl+"PosBarcodes/barcode_return/"+id[1]+"/"+checkReturnQuantity;
								$("#invoice5").load(popup_barcode_url, [], function(){
									$("#invoice5").dialog("open");
								}); 
					}
				
			 //=============== Check Already Return list or not =======
 				if($(".productlist").find('tr').length !=0){
					
					var is_find = false;
					$('.productlist tr').each(function(index) {	 
					  	 if($(this).attr('id') == id[1] )
						 	{
								is_find =  true;
							}
					});
					 
					if(is_find){
 							$.alert.open('warning', 'This Product Already Taken');
						}
					else{
							addToGrid(id[1] , type);
					    }
			 	}
				else{
						addToGrid(id[1] ,  type);
					}
			 
				  
				  }
				  
				else{
						 $.alert.open('Warning', 'Return quantity must be equal or less than Sales Quantity');
					}
		 		 
  			
	 });
	//================== Start Return remove link ============
	
	$('.productlist').on('click', '.deletelink', function() {
														  
				 var ids= $(this).attr('id');
 				 var id= ids.split('_');
				 $("#"+id[1]).remove();
				 returnTotal();
				  tax();
	 			 
		});
		//================== End Return remove link ============
				
				
	//======================Solid Products pop up============//
			 var popup_product_barcode = {
				title:' Barcode Remove',
				autoOpen: false,
				height: 400,
				width: 450,
				modal: true,
				draggable:true,
				////close: CloseFunction,
			  dialogClass: 'objectdetailsdialog',
			};
			$("#invoice5").dialog(popup_product_barcode);
	//======================Solid Products Popup End============//
 				
				
				
  $('#btn_possalesfullReturn').on('click',function(e){
		
		e.preventDefault();
		
 		//========================== Validation Check ========
	 	if( $('#PosSaleReturnFullReturnForm').valid()) 
 		{
			 
		    $('.ajax_status').fadeIn();
			$('.ajax-save-message').hide().fadeOut(); 
		//===================== Ajax Submit =================
		
		  $('#PosSaleReturnFullReturnForm').ajaxSubmit({ 
	 		success: function(responseText, responseCode) { 
		 		//alert(responseText);
			$('.ajax_status').hide(); 
			$('.ajax-save-message').hide().html("Sales Return Successfully Done.").fadeIn(); 
			$('#Cancel').click();
				 window.location.reload(true);
			 
 			}
		});
	 	  
	}
  	return false; 
	}).appendTo('form div.submit'); 
 });

	//==================== Calculate Retrun Total ===============
	 function returnTotal(){
		if($('.totalpriceli').length !=0){		 
		returnTotalAmount = 0;
 		$('.totalpriceli').each(function(index) {
    		 	returnTotalAmount = returnTotalAmount + parseFloat($(this).html());
				$("#PosSaleReturnProductAmount").val(returnTotalAmount);
			 
			});
		}else  
			{
 				$("#PosSaleReturnProductAmount").val("0.00");
 	 		}
 	}	
	//===================== Product Add to Grid ======================
	var sl_no = 0;			
	
	function addToGrid( id = null ,  type = null ){
	
		var productName = $("#posProductName_"+id).html();
		var purchaseDetailId = $("#PPRDAlredyReturnQuantity_"+id).val();
		var productId = $("#PosSaleReturnDetailPosProduct_"+id).val();
		var productPrice = $("#PPRDPrice_"+id).val();
		var returnQuantity = $("#PPRDetailQuantity_"+id).val();
		var itemTotal = productPrice * returnQuantity;
		
		var classalt = '';
		if (sl_no++ % 2 == 0) {
			 classalt = ' altrow';
		}
 
 			$(".productlist").append("<tr  class='productlistli_"+id+" "+classalt+"' id='"+id+"'><td>"+sl_no+"</td><td><input type='hidden' class=' productid' value="+productId+" name='data[PosSaleReturnDetail]["+productId+"][pos_product_id]'><input type='hidden' class=' productid' value="+purchaseDetailId+" name='data[PosSaleReturnDetail]["+productId+"][pos_sale_detail_id]'><span class='productvalli'>"+productName+"</span></td><td><span class='ReturnQuantity'>"+returnQuantity+"</span><input type='hidden' class='ReturnQunatity' value="+returnQuantity+" name='data[PosSaleReturnDetail]["+productId+"][quantity]'></td><td><span class='purchasepriseli'>"+productPrice+"</span><input type='hidden' class='categoryid' value="+productPrice+" name='data[PosSaleReturnDetail]["+productId+"][price]'></td> <td><span class='totalpriceli'>"+itemTotal+"</span><input type='hidden' class='categoryid' value="+type+" name='data[PosSaleReturnDetail]["+productId+"][type]'><input type='hidden' class='categoryid' value="+itemTotal+" name='data[PosSaleReturnDetail]["+productId+"][totalprice]'><span class='barcode_"+id+"'></span></td><td><span class='deletelink' id='deletelink_"+id+"'></span></td></tr>");
					 
 				  //=============================== For Serial and alterrow =====================	
 			 
				 //================ Call Total Amoutn =====================
					  returnTotal();
					  tax();
				 //================ End Call Total Amoutn Calculation =====
				 //============== Reset Form Field ============
				 
				 //$("#PosPurchasePayamount").val('0');
	}
	
	function tax(){
	 	var salestotalval= parseFloat($("#PosSaleReturnProductAmount").val());
		var totalhiddentax = parseFloat($("#PosSaleReturnHiddenTax").val());
		var hiddentax = parseFloat($("#PosSaleReturnHiddenTaxAmount").val());
		var tax = 0;
		var iva = 0; 
		if(totalhiddentax != ''){
		 	iva =(salestotalval * hiddentax)/ 100;
		}
	 	$("#PosSaleReturnTax").val(iva);
		
			var dis_check = parseFloat($("#PosSaleReturnHiddenDiscount").val());
		 	var sub_total_check = parseFloat($("#PosSaleReturnHiddenSubtotal").val());
		 	var discount = 0;
	    if(dis_check != '' )
			  {
				discount = (dis_check/sub_total_check)*salestotalval;
			  }
			  
				$("#PosSaleReturnDiscount").val(discount);
			 		var return_total =  salestotalval + iva - discount;
			 	$("#PosSaleReturnTotalPrice").val(return_total);
	 	}
	 