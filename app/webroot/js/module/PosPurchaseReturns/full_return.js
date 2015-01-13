// JavaScript Document
jQuery(function($){
		
	var returnTotalPrice = 0 ;
 		
	//===================== Return Add To Grid ============= 
	
	 $('.btnReturnPurchase').on('click',function(e){
			e.preventDefault();
			
			 var ids= $(this).attr('id');
			 var id= ids.split('_');
			 
			 var type = $(this).attr('title');
			 
			 	// ==============validation check ============
				var checkReturnQuantity = parseInt($("#PPRDetailQuantity_"+id[1]).val());
				var checkFreeQuantity = parseInt($("#PPRDFreeQuantity_"+id[1]).val());
				 
				 
				if( (checkFreeQuantity >= checkReturnQuantity) && checkReturnQuantity !='' && checkReturnQuantity !='0'  ){
					
					 
					
				
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
					}else{
						
						addToGrid(id[1] , type);
						
						if( type == 1 ){
						
						
						  	var popup_barcode_url=siteurl+"PosBarcodes/barcode_remove/"+id[1]+"/"+checkReturnQuantity;
							$("#invoice5").load(popup_barcode_url, [], function(){
								$("#invoice5").dialog("open");
							}); 
						}
						
					}
					
					
				}
				else{
						addToGrid(id[1] ,  type);
						
						if( type == 1 ){
  						  	var popup_barcode_url=siteurl+"PosBarcodes/barcode_remove/"+id[1]+"/"+checkReturnQuantity;
							$("#invoice5").load(popup_barcode_url, [], function(){
								$("#invoice5").dialog("open");
							}); 
						}
				}
					
					
				}
				else{
						 $.alert.open('Warning', 'Return quantity must be equal or less than free quantity');
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
				closeOnEscape: false,
				open: function(event, ui) { $(".ui-dialog-titlebar-close").remove(); },
 				////close: CloseFunction,
			  dialogClass: 'objectdetailsdialog',
			};
			$("#invoice5").dialog(popup_product_barcode);
	//======================Solid Products Popup End============//
 				
	 var dialogOptstempleteGeneralList = {
				title:'Invoice ',
				autoOpen: false,
				height: 600,
				width: 750,
				modal: true,
				draggable:true,
				 close: function (e, ui) { window.location.href = siteurl+"PosPurchases/index";},
 				dialogClass: 'objectdetailsdialog',
			};
		$("#invoice6").dialog(dialogOptstempleteGeneralList);			
				
  $('#btn_possalesfullReturn').on('click',function(e){
		 e.preventDefault();
 		//========================== Validation Check ========
	 	if( $('#PosPurchaseReturnFullReturnForm').valid()) 
 		{
 			$('.ajax_status').fadeIn();
			$('.ajax-save-message').hide().fadeOut(); 
		//===================== Ajax Submit =================
	   $('#PosPurchaseReturnFullReturnForm').ajaxSubmit({ 
	 		success: function(responseText, responseCode) { 
		 	
				var ulrs =siteurl+"PosPurchaseReturns/view/"+responseText;
				$("#invoice6").load(ulrs, [], function(){
					$("#invoice6").dialog("open");
				});
				
				$('.ajax_status').hide(); 
				$('.ajax-save-message').hide().html("Purchase Return Successfully Done.").fadeIn(); 
				$('#Cancel').click();
				 
				 
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
				$("#PosPurchaseReturnProductAmount").val(returnTotalAmount);
			 
			});
		}else  
			{
 				$("#PosPurchaseReturnProductAmount").val("0.00");
 	 		}
			 
 	}	
	//===================== Product Add to Grid ======================
	var sl_no = 0;			
	
	function addToGrid( id = null ,  type = null ){
	
		var productName = $("#posProductName_"+id).html();
		var purchaseDetailId = $("#PPRDAlredyReturnQuantity_"+id).val();
		var productId = $("#PosPurchaseReturnDetailPosProduct_"+id).val();
		var productPrice = $("#PPRDPrice_"+id).val();
		var returnQuantity = $("#PPRDetailQuantity_"+id).val();
		var itemTotal = productPrice * returnQuantity;
		
		var classalt = '';
		if (sl_no++ % 2 == 0) {
			 classalt = ' altrow';
		}
 
 			$(".productlist").append("<tr  class='productlistli_"+id+" "+classalt+"' id='"+id+"'><td>"+sl_no+"</td><td><input type='hidden' class=' productid' value="+productId+" name='data[PosPurchaseReturnDetail]["+productId+"][pos_product_id]'><input type='hidden' class=' productid' value="+purchaseDetailId+" name='data[PosPurchaseReturnDetail]["+productId+"][pos_purchase_detail_id]'><span class='productvalli'>"+productName+"</span></td><td><span class='ReturnQuantity'>"+returnQuantity+"</span><input type='hidden' class='ReturnQunatity' value="+returnQuantity+" name='data[PosPurchaseReturnDetail]["+productId+"][quantity]'></td><td><span class='purchasepriseli'>"+productPrice+"</span><input type='hidden' class='categoryid' value="+productPrice+" name='data[PosPurchaseReturnDetail]["+productId+"][price]'></td> <td><span class='totalpriceli'>"+itemTotal+"</span><input type='hidden' class='categoryid' value="+type+" name='data[PosPurchaseReturnDetail]["+productId+"][type]'><input type='hidden' class='categoryid' value="+itemTotal+" name='data[PosPurchaseReturnDetail]["+productId+"][totalprice]'><span class='barcode_"+id+"'></span></td><td><span class='deletelink' id='deletelink_"+id+"'></span></td></tr>");
					 
 				  //=============================== For Serial and alterrow =====================	
 		  		 //================ Call Total Amoutn =====================
					  returnTotal();
					  tax();
				 //================ End Call Total Amoutn Calculation =====
				 //============== Reset Form Field ============
				 
				 //$("#PosPurchasePayamount").val('0');
	}
	
	function tax(){
	 	var purchasetotalval= parseFloat($("#PosPurchaseReturnProductAmount").val());
		var totalhiddentax = parseFloat($("#PosPurchaseReturnHiddenTax").val());
		var hiddentax = parseFloat($("#PosPurchaseReturnHiddenTaxAmount").val());
		var tax = 0;
		var iva = 0; 
		if(totalhiddentax != ''){
		 	iva =(purchasetotalval * hiddentax)/ 100;
		}
	 	$("#PosPurchaseReturnTax").val(iva);
		
			var dis_check = parseFloat($("#PosPurchaseReturnHiddenDiscount").val());
		 	var sub_total_check = parseFloat($("#PosPurchaseReturnHiddenSubtotal").val());
		 	var discount = 0;
	    if(dis_check != '' )
			  {
				discount = (dis_check/sub_total_check)*purchasetotalval;
			  }
			  
				$("#PosPurchaseReturnDiscount").val(discount.toFixed(2));
			 		var return_total =  purchasetotalval +iva - discount;
			 	$("#PosPurchaseReturnTotalPrice").val(return_total.toFixed(2));
	 	}
	 