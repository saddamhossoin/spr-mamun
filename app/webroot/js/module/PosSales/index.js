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
		title:'Invoice ',
		autoOpen: false,
		height: 600,
		width: 750,
		modal: true,
		draggable:true,
 	    //close: CloseFunction,
	  dialogClass: 'objectdetailsdialog',
	};
	$("#invoice").dialog(dialogOptstempleteGeneralLists);
	
	$("#yes").on('click',function(e){
		e.preventDefault();
 		var ulrs =siteurl+"PosSales/index/no/yes";
			$("#invoice").load(ulrs, [], function(){
			$("#invoice").dialog("open");
		});
			 
	});
  
  //======================= End Here Patinet Account list============
	
});


