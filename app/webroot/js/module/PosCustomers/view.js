// JavaScript Document
jQuery(function($){ 
	
	 var dialogOptstempleteGeneralList = {
		title:'Invoice ',
		autoOpen: false,
		height: 600,
		width: 750,
		modal: true,
		draggable:true,
 	  // //close: CloseFunction,
	  dialogClass: 'objectdetailsdialog',
	};
	$("#invoice").dialog(dialogOptstempleteGeneralList);
	
	$(".link_view").on('click',function(e){
		e.preventDefault();
 		var ulrs =$(this).attr('href');
			$("#invoice").load(ulrs, [], function(){
			$("#invoice").dialog("open");
		});
			 
	});
	
	//======================== Customer Payment start =================
  var dialogOptstempleteGeneralLists = {
 		autoOpen: false,
		height: 350,
		width: 450,
		modal: true,
		draggable:true,
 	    //close: CloseFunction,
	  dialogClass: 'objectdetailsdialog',
	   open: function() {
    $(".ui-dialog-title").append("<span class='dialogreporttitle'>Customer Payment</span> ");
  }
	};
	$("#invoice1").dialog(dialogOptstempleteGeneralLists);
	
	$("#customer_payment , a#customer_payment").on('click',function(e){
		e.preventDefault();
 		var ulrs =siteurl+"PosCustomerLedgers/add";
			$("#invoice1").load(ulrs, [], function(){
			$("#invoice1").dialog("open");
			
		});
			 
	});
	
  
  //======================= End Here Customer Payment============
	
	
	
	
				});