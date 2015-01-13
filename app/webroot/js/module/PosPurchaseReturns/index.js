jQuery(function($){ 
	 
	
	 var purchaseDetailDialog = {
		title:'Purchase Return',
		autoOpen: false,
		height: 300,
		width: 650,
		modal: true,
		  
		//draggable:true,
 	  //  //close: CloseFunction,
	  dialogClass: 'purchaseDetailDialog',
	};
	   
	
	 $(".returnsfull").on('click',function(e){
					 				 
		e.preventDefault();
 		 var id =$(this).attr('id');
		 $("#popupdiv").dialog(purchaseDetailDialog);
	  	 var purchaseid= id.split('_');
		      var ulrs =siteurl+"PosPurchaseReturns/full_return/"+purchaseid[1];
			 
			 $("#popupdiv").load(ulrs, [], function(){
			 $("#popupdiv").dialog("open");
		 });
	}); 
	   
	//$("#PosSaleReturnQuantity").ForceNumericOnly();

 $('#btn_Posreturns').on('click',function(e){
		e.preventDefault();
 		//========================== Validation Check ========
	 	if( $('#PosSaleReturnAddForm').valid()) 
 		{
			$('.ajax_status').fadeIn();
			$('.ajax-save-message').hide().fadeOut(); 
		//===================== Ajax Submit =================
		  $('#PosSaleReturnAddForm').ajaxSubmit({ 
	 		success: function(responseText, responseCode) { 
			 //alert(responseText);
			$('.ajax_status').hide(); 
			$('.ajax-save-message').hide().html(responseText).fadeIn(); 
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
 
 
  var dialogOptstempleteGeneralLists = {
		title:'Purchase Return',
		autoOpen: false,
		height: 600,
		width: 750,
		modal: true,
		//draggable:true,
 	    //close: CloseFunction,
	  dialogClass: 'objectdetailsdialog',
	};
	$("#invoice").dialog(dialogOptstempleteGeneralLists);
	
	$("#report").on('click',function(e){
		e.preventDefault();
 		var ulrs =siteurl+"PosPurchaseReturns/index/no/report";
			$("#invoice").load(ulrs, [], function(){
			$("#invoice").dialog("open");
		});
			 
	});
 
 

	
});