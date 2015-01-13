// JavaScript Document
jQuery(function($){ 
 	//======================== Patient Account List =================
   var dialogOptstempleteGeneralLists = {
		title:'Service Report',
		autoOpen: false,
		height: 600,
		width: 750,
		modal: true,
		//draggable:true,
 	    //close: CloseFunction,
	  dialogClass: 'objectdetailsdialog',
	};
	$("#invoice").dialog(dialogOptstempleteGeneralLists);
	
	$("#ServiceServiceList").on('click',function(e){
		e.preventDefault();
 		var ulrs =siteurl+"ServiceServices/index/no/report";
			$("#invoice").load(ulrs, [], function(){
			$("#invoice").dialog("open");
		});
 	});
   //======================= End Here Patinet Account list============
});
