jQuery(function($){ 
				
//======================================= Product Search Information=================================//
 
	$( "#PopupPosProductName" ).autocomplete(
		{
 			minLength: 3,
			search  : function(){$(".ajax_status").fadeIn();},
			open    : function(){$(".ajax_status").fadeOut();},
			source: data,
			select: function( event, ui ) {
				 
				$( "#PopupPosProductName" ).val( ui.item.label);
				 
 				return false;
			}
			}).data( "uiAutocomplete" )._renderItem = function( ul, item ) {
			return $( "<li></li>" )
				.data( "item.uiAutocomplete", item )
				.append( "<a><strong>" + item.label + "</strong> / " + item.actor + "</a>" )
				.appendTo( ul );
			};	
/*=========== Start Here Function : Check Existing Barcode name. =====*/			
  $('#WrapperPosProductBarcode').delegate('#PosProductBarcode','focusout', function(e) {
 		e.preventDefault();
		 
	  	var barcode =$("#PosProductBarcode").val();

		  $.ajax({
				type: "GET",
				url:siteurl+"PosProducts/unique_product_barcode/"+barcode,
				success: function(viewText,response){
 			if(viewText == 1)
				{	
 					$("#PosProductBarcode").val('');
					$('#duplicateMessageBarcode').show();
				 	}
			else{
					$('.ajax_status').hide(); 
					$('#duplicateMessageBarcode').hide();
				}
				 
			}
		});
 	});
	
/*=========== End Here Function : Check Existing Barcode name. =====*/
				
//========================= Add Compatabality ==================
	$("#PosProductPosTypeId").on('change',function(e){
			$("#bar_code").html('');
		if($(this).val() != 1){
			$("#ComaptitbilityGrid2").fadeIn();
			$(".showDivCompatability").fadeIn();
	$("#WrapperPosProductBarcode").html("<div id='bar_code'><label for='PosProductBarcode_popup'>Barcode:<span class='star'></span></label><input id='PosProductBarcode' class='' type='text' step='any' name='data[PosBarcode][barcode]'><button id='barcodeGenerate_popup' name='addNewDevice' type='button'>Barcode</button><button id='barcodeprint_popup' type='button'>Print</button><span id='duplicateMessageBarcode' style='display:none;'>Barcode exits. Please create another. </span></div>");
		$("#PosProductDescription").css({"height": "75px"});
		
		}else{
			$("#ComaptitbilityGrid2").fadeOut();
			$(".showDivCompatability").fadeOut();
			$(".gridCompatibilityList").html('');
			$("#bar_code").remove();
			$('#PosProductDescription').css({'height' : ''});
		}
		
	});


 	function blueBtnClickedCompatibility(event){
		event.preventDefault();
		var ids= $(this).attr('id');
		var id= ids.split('_');
 		$("#PosCompatability_"+id[1]).remove(); 
 	};
 
	$(".gridCompatibilityList").on('click', '.PosCompatibilityRemoveA', blueBtnClickedCompatibility);
 
 
 
 

//========================== Start Searching Compatable Product ===========================
  $("#btn_PosCompatability_search").on('click',function(e){
	  e.preventDefault();
	 	$('.ajax_status').fadeIn();
			$('.ajax-save-message').hide().fadeOut(); 
 			 var data= $('#PosCompatibilityParentProductListForm').serialize();
  			 $.ajax({
				type: "POST",
				url:siteurl+"PosCompatibilities/parentProductList",
				data:  data,
				success: function(response){
   						$('.ajax_status').hide(); 
						$(".posCompatabilityProductGrid").html('');
						$(".posCompatabilityProductGrid").html(response);
  					 }
				}); 
  		});
	
	 $("#btn_PosCompatability_reset").on('click',function(e){
	  e.preventDefault();
	 		 $.ajax({
				type: "GET",
				url:siteurl+"PosCompatibilities/parentProductList/yes/" ,
 				success: function(response){
  						$('.ajax_status').hide(); 
						$(".posCompatabilityProductGrid").html('');
						$(".posCompatabilityProductGrid").html(response);
  					 }
				}); 
  		});
		
	//=========================== End Searching Product ======================

		 
	//======================Add Brand pop up============//
	 var dialogOptstempleteGeneralList = {
		title:'Add Brand',
		autoOpen: false,
		height: 350,
		width: 400,
		modal: true,
		draggable:true,
 	    ////close: CloseFunction,
	  dialogClass: 'objectdetailsdialog',
	};
	$("#invoice").dialog(dialogOptstempleteGeneralList);
	
	$("#addNewBrand").on('click',function(e){
		 	e.preventDefault(); 
			var ulrs =siteurl+"PosBrands/add/yes";
		 	$("#invoice").load(ulrs, [], function(){
			$("#invoice").dialog("open");
		});
			 
	});
	
	//====================== End Brand pop up===========//
	//======================Add Category pop up============//
	 var dialogOptstempleteGeneralList = {
		title:'Add Category',
		autoOpen: false,
		height: 350,
		width: 400,
		modal: true,
		draggable:true,
 	    ////close: CloseFunction,
	  	dialogClass: 'objectdetailsdialog',
	};
	$("#invoice1").dialog(dialogOptstempleteGeneralList);
	
	$("#addNewCategory").on('click',function(e){
		 	e.preventDefault(); 
			var ulrs =siteurl+"PosPcategories/add/yes";
		 	$("#invoice1").load(ulrs, [], function(){
			$("#invoice1").dialog("open");
		});
 	});
	
	//====================== End Category pop up===========//
 		$('#PosProductPopupAddForm').ajaxForm({
				beforeSubmit: function(){
					if($('#PosProductPopupAddForm').valid()){
						$(".overlaydivsmall").fadeIn(1000);
						return true;
					}else{
						return false;
					}
				},
			   success: function(response) {
  		 		   var object=jQuery.parseJSON(response);
				  
				   if(object.callType.name == 'service'){
						$("#ServiceDeviceName").val(object.PosProduct.name);
						$("#ServiceDeviceInfoServiceDeviceId").val(object.callType.id);
						$("#SDDType").html(object.PosPcategory.name);
						$("#SDDBrand").html(object.PosBrand.name);
						$("#showDeviceDetails").fadeIn();
					   
				   }else{
			   	 	 
					
					$("#PosProductPosBrandId").append("<option value='"+object.PosBrand.id+"' selected=selected>"+object.PosBrand.name+"</option>"); 	
					$('#WrapperPosProductPosBrandId .select2-chosen').html(object.PosBrand.name);
					$("#PosProductPosPcategoryId").append("<option value='"+object.PosPcategory.id+"' selected=selected>"+object.PosPcategory.name+"</option>"); 		
					$('#WrapperPosProductPosPcategoryId .select2-chosen').html(object.PosPcategory.name);
					$("#PosProductName").append("<option value='"+object.PosProduct.id+"' selected=selected>"+object.PosProduct.name+"</option>"); 		
					$('#WrapperPosProductName .select2-chosen').html(object.PosProduct.name);
 			 
					 $.ajax({
						type: "GET",
						url:siteurl+"PosPurchases/productstatus/"+object.PosProduct.id,
						data: '',
						success: function(response){
					
			 			var object=jQuery.parseJSON(response);
					  
						$("#PosPurchaseSalesprice").val(object['PosStock']['salesprice']);
						$("#PosPurchasePurchaseprice").val(object['PosStock']['purchaseprice']);
						$("#PosPurchaseStock").val(object['PosStock']['in_stock']);
						
						$("#SalesPriceStatus").html(""+object['PosStock']['salesprice']);
						$("#StockStatuss").html(object['PosStock']['in_stock']);
						$("#PurchasePriceStatus").html(object['PosStock']['purchaseprice']);
						
						$("#PosProductSalesprice").val(object['PosStock']['salesprice']);
				   
					
					}
			 });
				
				}
				$(".overlaydivsmall").fadeOut(1000);
				  if(object.callType.name == 'service'){ $("#invoice7").dialog("close");}else{
				  $("#invoice5").dialog("close");}
			 	// $('.ajax-save-message').hide().html(response).fadeIn(); 
				// window.location.reload(true);
				 
			} 
		});
	  
//===================== Ajax form submit end ================//	 


//==================barcode print add purchase code start=================//
 $('#WrapperPosProductBarcode').delegate('#barcodeGenerate_popup','click', function(e) {
 		e.preventDefault();
		
		 
			var cat_id =$("#popup_cat_id").val();
			var cat_name =$("#popup_cat_id option:selected").text();
			var brnd_name =$("#popup_brand_name option:selected").text();
 			var pro_name =$("#PopupPosProductName").val();
			 	
			if(cat_id != '' || pro_name != ''){
				$('.ajax_status').fadeIn(); 
			  $.ajax({
				type: "GET",
				url:siteurl+"Barcodes/add_from_product/"+cat_id+"/"+cat_name+"/"+pro_name+"/"+brnd_name,
				success: function(viewText,response){
					//alert(viewText);
  				if(viewText !='0')
					{	
						$('.ajax_status').fadeOut(); 
 						$("#PosProductBarcode").val(viewText);
						$('#duplicateMessageBarcode').hide();
				 	}
				else{
						$('.ajax_status').hide(); 
						$('#duplicateMessageBarcode').html("Sorry to create Barcode");
						$('#duplicateMessageBarcode').hide();
				}
				 
			}
		});
			}else{
				$.alert.open('warning', 'Please Select Category and Product Name!!!');
				 
			}
 	});

//==================barcode print add purchase code end=================//

//======================Barcode Print pop up add purchase============//
	 var dialogOptstempleteGeneralList2 = {
		title:'Barcode Print Add Purchase',
		autoOpen: false,
		height: 350,
		width: 400,
		modal: true,
		draggable:true,
 	    ////close: CloseFunction,
	  dialogClass: 'objectdetailsdialog',
	};
	$("#invoice2").dialog(dialogOptstempleteGeneralList2);
	
	$('#WrapperPosProductBarcode').delegate('#barcodeprint_popup','click', function(e) {
		 	e.preventDefault(); 
			var bVal = $("#PosProductBarcode").val();
 			  bVal = bVal.trim();
		 
			 $.ajax({
				type: "GET",
				url:siteurl+"Barcodes/barcode_print_product/"+bVal ,
				success: function(viewText,response){
					$("#invoice2").html(viewText);
 					$("#invoice2").dialog("open");
 				}
			});
 		});
			 
	
	
	//=======================Barcode Print pop up add purchase==========//










 /*=========== Start Here Function : Check Existing Product name. =====*/
 
	 $('#PopupPosProductName').focusout(function(e) {	
		e.preventDefault();
		var category=$('.PopupPosProductCategoryId').val();
		var Brand=$('.PopupPosProductBrandId').val();
	  	var product =	$(this).val();
		  $.ajax({
				type: "GET",
				url:siteurl+"PosProducts/unique_product/"+Brand+"/"+category+"/"+product,
				success: function(viewText,response){
			if(viewText == 1)
				{	
 					$("#PopupPosProductName").val('');
					$('#duplicateMessage').show();
				 	}
			else{
					$('.ajax_status').hide(); 
					$('#duplicateMessage').hide();
				}
				 
			}
		});
 	});
	
/*=========== End Here Function : Check Existing Product name. =====*/
 
	 
	function search_already_product(datas){
		$('.ajax_status').fadeIn();
		 $.ajax({
					type: "POST",
					url:siteurl+"PosProducts/searchproduct/" ,
					data: datas,
					success: function(viewText,response){
 					if(viewText)
					{
							$('.ajax_status').hide(); 
							//$('#alreadyproduct').html('');
							//$('#alreadyproduct').html('  ');
							//$('#alreadyproduct').html(viewText);
						 
						 /*
							var notemptyproduct =$('#ProductName').val();
					  		if("#ProductName:not(:empty)") {
											alert($('#ProductName').val() );
				 					  $('#PosProductName').val('');
				 				  }	
							*/ 
	 				}
					else{
						$('.ajax_status').hide(); 
					}
	 			}
			});
	 	 return false;
	 }	 
	 	  $.validator.addMethod('lessThan', function(value, element, param) {
   		 var i = parseInt(value);
    		var j = parseInt($(param).val());
    		return i >= j;
		}, "Less Than");
	 
	 $('#PosProductPopupAddForm').validate({rules: {
	 											 field: {number: true},
												 "data[PosProduct][salesprice]":
												  {	 lessThan: "#PopupProductPurchasePrice" }
												  },
										messages: {
 												"data[PosProduct][salesprice]": "Sales Price must be Greater than from Purchase Price ",},
						 });
	 	 
});

function validator(){ 
        $("#PosProductPopupAddForm").valid();
}
 