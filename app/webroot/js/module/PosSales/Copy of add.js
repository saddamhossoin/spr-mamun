jQuery(function($){ 
				 //======================= Start Add Script =====================				
 	 $('#btn_PosSale_add').click(function(){
										  
 		//========================== Validation Check ========
  	if( $('#PosSaleAddForm').valid() && $('#PosSaleAmountAddForm').valid()) 
 		{
			$('.ajax_status').fadeIn();
			$('.ajax-save-message').hide().fadeOut(); 
		//===================== Ajax Submit =================
	 
		 
  var data= $('#PosSaleAddForm').serialize() + '&' + $('#PosSaleAmountAddForm').serialize()+ '&' +$('#PosSaleDetailAddForm').serialize();
  	//=================================//
		$.ajax({
			type: "POST",
			url:siteurl+"PosSales/add",
			data:  data,
			success: function(response){
				// alert(response);
		$('.ajax_status').hide(); 
			$('.ajax-save-message').hide().html(response).fadeIn(); 
			$('#Cancel').click();
			window.location.reload();
				}
			});
 		 
	}
	
  	return false; 
										  
	
	
	});
	 
				
				
	$("#PosProductName").live('change',function(){
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
$("#btn_PosProduct_add").live('click',function(e){
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
	
	$(".productlist").append("<tr  class='productlistli_"+productid+" "+classalt+"' id='"+productid+"'><td>"+sl_no+"</td><td><input type='hidden' class=' productid' value="+productid+" name='data[PosSaleDetail]["+productid+"][pos_product_id]'><span class='productvalli'>"+productval+"</span><input type='hidden' class='brandid' value="+brandid+" name='data[PosSaleDetail]["+productid+"][pos_brand_id]'></td><td><span class='brandvalli'>"+brandval+"</span><input type='hidden' class='categoryid' value="+categoryid+" name='data[PosSaleDetail]["+productid+"][pos_pcategory_id]'></td><td><span class='categoryvalli'>"+categoryval+"</span></td><td><span class='Quantityli'>"+Quantity+"</span><input type='hidden' class='categoryid' value="+Quantity+" name='data[PosSaleDetail]["+productid+"][quantity]'></td><td><span class='purchasepriseli'>"+purchaseprise+"</span><input type='hidden' class='categoryid' value="+purchaseprise+" name='data[PosSaleDetail]["+productid+"][price]'></td><td><span class='totalpriceli'>"+totalprice+"</span><input type='hidden' class='categoryid' value="+totalprice+" name='data[PosSaleDetail]["+productid+"][totalprice]'></td><td><span class='deletelink' id='deletelink_"+productid+"'></span></td></tr>");
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
  	 });
 
  	$("[id^=deletelink_]").live('click',function(){
		
		var ids= $(this).attr('id');
	 	var id= ids.split('_');
		$("#"+id[1]).remove();
		SubTotal();
 	});
  
  $("#PosSalePosCustomerId").live('change',function(){
  	$('.ajax_status').fadeIn();
 	$.ajax({
			type: "GET",
			url:siteurl+"PosSales/getcustomer/"+$("#PosSalePosCustomerId").val(),
			data: '',
			success: function(response){
				//alert(response);
			 $('#second').html(response);
				$('.ajax_status').hide();
				}
			});
	
	 });

	  	$("#PosProductPosPcategoryId").live('change',function(){
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
	 
 	//alert('anwar');
 });
	//==========================PosProductPosBrandId==============================///	
		$("#PosProductPosBrandId").live('change',function(){
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
	 
 	//alert('anwar');
 });
		
		
//========================product status=============================//
	 	 	$("#PosProductName").live('change',function(){
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
 
//===================== Auto Complete Calling ====================
	//	$( "#PosProductName" ).combobox();
	//================= End Auto complete Calling===============	
});
	function totalprice(){
				$("#PosSaleAmountTotalprice").val(
				parseFloat($("#PosProductQuantity").val())* parseFloat($("#PosProductPurchaseprice").val()));
			}
		function SubTotal(){
		if($('.totalpriceli').length !=0){		 
		testTotalAmount = 0;
		$('.totalpriceli').each(function(index) {
    		 	testTotalAmount = testTotalAmount + parseFloat($(this).html());
			$("#PosSaleAmountTotalprice").val(testTotalAmount);
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
			