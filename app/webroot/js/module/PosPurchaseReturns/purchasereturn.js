jQuery(function($){ 
		 var dialogOptstempleteGeneralList = {
		title:'Purchase Return',
		autoOpen: false,
		height: 300,
		width: 615,
		modal: true,
		draggable:true,
 	    //close: CloseFunction,
	  dialogClass: 'objectdetailsdialog',
	};
 
 $("#invoice").dialog(dialogOptstempleteGeneralList);
  $(".returnsfull").on('click',function(e){
		 e.preventDefault();
 		 var id =$(this).attr('id');
	 	 var purchaceid= id.split('_');
		    var ulrs =siteurl+"pos_purchase_returns/returndetail/"+purchaceid[1];
			 $("#invoice").load(ulrs, [], function(){
			 $("#invoice").dialog("open");
		 });
	}); 

	/*	$("#invoice").dialog(dialogOptstempleteGeneralList);
  $(".action_link").on('click',function(e){
		e.preventDefault();
 		var ulrs =$(this).attr('href');
		 //var ulrs =siteurl+"PosShopStocks/barcode_add/";
			$("#invoice").load(ulrs, [], function(){
			$("#invoice").dialog("open");
		});
			 
	});*/
 

$('#btn_PosPurchaseReturn_add').on('click',function(e){
		e.preventDefault();
 		//========================== Validation Check ========
  		if( $('#PosPurchaseReturnReturndetailForm').valid()) 
 		{
			$('.ajax_status').fadeIn();
			$('.ajax-save-message').hide().fadeOut(); 
		//===================== Ajax Submit =================
		  $('#PosPurchaseReturnReturndetailForm').ajaxSubmit({ 
		 	success: function(responseText, responseCode) { 
			 // alert(responseText);
			$('.ajax_status').hide(); 
			$('.ajax-save-message').hide().html().fadeIn(); 
			$('#Cancel').click()
			 
 			}
		});
	}
  	return false; 
	}).appendTo('form div.submit'); 

 $("#accordions").accordion({ 
		active: false, 
	    navigation: true,
   });
	
	
});