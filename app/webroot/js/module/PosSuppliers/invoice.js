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
	
	$(".supplier_invoice").on('click',function(e){
		e.preventDefault();
 		var ulrs =$(this).attr('href');
			$("#invoice").load(ulrs, [], function(){
			$("#invoice").dialog("open");
		});
			 
	});
	
});