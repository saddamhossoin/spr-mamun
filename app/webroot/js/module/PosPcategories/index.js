jQuery(function($){ 
	
	 var dialogOptstempleteGeneralList = {
		title:'Product List by Category ',
		autoOpen: false,
		height: 600,
		width: 750,
		modal: true,
		draggable:true,
 	    ////close: CloseFunction,
	  dialogClass: 'objectdetailsdialog',
	};
	$("#invoice").dialog(dialogOptstempleteGeneralList);
	
	$(".testlistbygroup").on('click',function(e){
		e.preventDefault();
 		var ulrs =$(this).attr('href');
			$("#invoice").load(ulrs, [], function(){
			$("#invoice").dialog("open");
		});
			 
	});
	
	var dialogOptstempleteGeneralLists = {
		title:'Category List',
		autoOpen: false,
		height: 600,
		width: 750,
		modal: true,
		draggable:true,
 	    ////close: CloseFunction,
	  dialogClass: 'objectdetailsdialog',
	};
	$("#invoice").dialog(dialogOptstempleteGeneralLists);
	
	$("#PosPcategoryReport").on('click',function(e){
		e.preventDefault();
 		var ulrs =siteurl+"PosPcategories/index/no/report";
		
			$("#invoice").load(ulrs, [], function(){
			$("#invoice").dialog("open");
		});
			 
	});
	
	
});
