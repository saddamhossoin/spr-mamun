jQuery(function($){ 
	
	 var dialogOptstempleteGeneralList = {
		title:'Product list by Brand',
		autoOpen: false,
		height: 650,
		width: 800,
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
		title:'Brand List',
		autoOpen: false,
		height: 600,
		width: 750,
		modal: true,
		draggable:true,
 	    ////close: CloseFunction,
	  dialogClass: 'objectdetailsdialog',
	};
	$("#invoice").dialog(dialogOptstempleteGeneralLists);
	
	$("#PosBrandsReport").on('click',function(e){
		e.preventDefault();
 		var ulrs =siteurl+"PosBrands/index/no/report";
		
			$("#invoice").load(ulrs, [], function(){
			$("#invoice").dialog("open");
		});
			 
	});
	
	
	
});
