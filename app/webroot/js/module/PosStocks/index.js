jQuery(function($){ 
   //======================== Stock General List =================
  var dialogOptstempleteGeneralList = {
		title:'Stock list',
		autoOpen: false,
		height: 600,
		width: 950,
		modal: true,
		draggable:true,
 	  dialogClass: 'objectdetailsdialog',
	 
	};
	$("#invoice").dialog(dialogOptstempleteGeneralList);
	
 
	
	$("#PosStockListReport").on('click',function(e){
		e.preventDefault();
 		var ulrs =siteurl+"PosStocks/index/no/yes";
			$("#invoice").load(ulrs, [], function(){
			$("#invoice").dialog("open");
		});
			 
	});
	
});


