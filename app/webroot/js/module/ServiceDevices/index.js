jQuery(function($){ 
	  
	//======================== Patient Account List =================
   var dialogOptstempleteGeneralLists = {
		title:'Service Device list',
		autoOpen: false,
		height: 600,
		width: 750,
		modal: true,
		//draggable:true,
 	    //close: CloseFunction,
	  dialogClass: 'objectdetailsdialog',
	};
	$("#invoice").dialog(dialogOptstempleteGeneralLists);
	
	$("#ServiceDeviceListReport").on('click',function(e){
		e.preventDefault();
 		var ulrs =siteurl+"ServiceDevices/index/no/yes";
			$("#invoice").load(ulrs, [], function(){
			$("#invoice").dialog("open");
		});
			 
	});
	
	  var dialogOptstempleteGeneralLists154 = {
		title:'Assign Service In Device ',
		autoOpen: false,
		height: 600,
		width: 750,
		modal: true,
		//draggable:true,
 	    //close: CloseFunction,
	  dialogClass: 'objectdetailsdialog',
	};
	$("#invoice2").dialog(dialogOptstempleteGeneralLists154);
	
	$(".add_service_in_device").on('click',function(e){
		e.preventDefault();
		var isd = $(this).attr('id');
  		var ulrs =siteurl+"ServiceDevices/service_add_device/"+isd;
			$("#invoice2").load(ulrs, [], function(){
			$("#invoice2").dialog("open");
		});
			 
	});
	 
	 
	 
  
  //======================= End Here Patinet Account list============
});