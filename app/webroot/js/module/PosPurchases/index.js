jQuery(function($){ 
	
	 var dialogOptstempleteGeneralList = {
		title:'Invoice ',
		autoOpen: false,
		height: 600,
		width: 750,
		modal: true,
		draggable:true,
 	    //close: CloseFunction,
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
	
	//======================== Patient Account List =================
   var dialogOptstempleteGeneralLists = {
		title:'Purchase',
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
 		var ulrs =siteurl+"PosPurchases/index/no/report";
			$("#invoice").load(ulrs, [], function(){
			$("#invoice").dialog("open");
		});
			 
	});
	
	var mystring="There are you";
var arr = mystring.split("/");
//alert(arr);
  
  //======================= End Here Patinet Account list============
});
