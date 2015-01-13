jQuery(function($){ 
	
	
	
	//======================== Patient Account List =================
  var dialogOptstempleteGeneralList = {
 		autoOpen: false,
		height: 750,
		width: 850,
		modal: true,
		draggable:true,
 	    //close: CloseFunction,
	  dialogClass: 'objectdetailsdialog',
	   open: function() {
    $(".ui-dialog-title").append("<span class='dialogreporttitle'>Product list</span> ");
  }
	};
	$("#invoice").dialog(dialogOptstempleteGeneralList);
	
	$("#PosProductListReport").on('click',function(e){
		e.preventDefault();
 		var ulrs =siteurl+"PosProducts/index/no/yes";
			$("#invoice").load(ulrs, [], function(){
			$("#invoice").dialog("open");
		});
			 
	});
  
  //======================= End Here Patinet Account list============
	
});


