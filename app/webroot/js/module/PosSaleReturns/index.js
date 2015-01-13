jQuery(function($){ 
	  var dialogOptstempleteGeneralList = {
		title:'Sales Returns',
		autoOpen: false,
		height: 280,
		width: 440,
		modal: true,
		draggable:true,
 	   // //close: CloseFunction,
	  dialogClass: 'objectdetailsdialog',
	};
	
	 var dialogoffullsalereturnns = {
		title:'Sales Return',
		autoOpen: false,
		height: 300,
		width: 615,
		modal: true,
		draggable:true,
 	  //  //close: CloseFunction,
	  dialogClass: 'objectdetailsdialog',
	};
	 
	
 	$(".action_link").on('click',function(e){
			e.preventDefault();
		$("#invoice").dialog(dialogOptstempleteGeneralList);
	 
 		var ulrs =$(this).attr('href');
		 //var ulrs =siteurl+"PosShopStocks/barcode_add/";
			$("#invoice").load(ulrs, [], function(){
			$("#invoice").dialog("open");
		});
			 
	});
	
	 $(".returnsfull").on('click',function(e){
			 e.preventDefault();
 		 var id =$(this).attr('id');
		 $("#invoice").dialog(dialogoffullsalereturnns);
	  	 var Saleid= id.split('_');
		     var ulrs =siteurl+"pos_sale_returns/full_return/"+Saleid[1];
			 $("#invoice").load(ulrs, [], function(){
			 $("#invoice").dialog("open");
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
 
  

	
});