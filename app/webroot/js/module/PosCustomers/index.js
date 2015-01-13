jQuery(function($){ 
	
	 
	//======================== Patient Account List =================
  var dialogOptstempleteGeneralList = {
		title:'Product list<span class="Print_Button"><span class="print_img">&nbsp;&nbsp;</span> &nbsp;Print</span>',
		autoOpen: false,
		height: 600,
		width: 750,
		modal: true,
		draggable:true,
 	    ////close: CloseFunction,
	  dialogClass: 'objectdetailsdialog',
	};
	$("#invoice").dialog(dialogOptstempleteGeneralList);
	
	$("#customerlist").on('click',function(e){
		e.preventDefault();
 		var ulrs =siteurl+"PosCustomers/index/no/yes";
			$("#invoice").load(ulrs, [], function(){
			$("#invoice").dialog("open");
		});
			 
	});
  
  //======================= End Here Patinet Account list============
  
  //======================== Supplier Payment start =================
  var dialogOptstempleteGeneral= {
 		autoOpen: false,
		height: 600,
		width: 750,
		modal: true,
		draggable:true,
 	    //close: CloseFunction,
	  dialogClass: 'objectdetailsdialog',
	   open: function() {
    $(".ui-dialog-title").append("<span class='dialogreporttitle'> Customer Ledger list</span> ");
  }
	};
	$("#invoice1").dialog(dialogOptstempleteGeneral);
 	$(".customer_ledger").on('click',function(e){
		e.preventDefault();
 		var ulrs =$(this).attr('href');
			$("#invoice1").load(ulrs, [], function(){
			$("#invoice1").dialog("open");
			
		});
			 
	});
  
  //======================= End Here Supplier Payment============
  
  
	
});


