jQuery(function($){ 
	
	//================= User Pop-Up ===============//
	 var dialogOptstempleteGeneralList = {
		title:'Signup',
		autoOpen: false,
		height: 435,
		width: 500,
		modal: true,
		draggable:true,
		sticky: true,
 	    //close: CloseFunction,
	  dialogClass: 'objectdetailsdialog',
	};
	$("#invoice").dialog(dialogOptstempleteGeneralList);
	
	$("#sign_up").on('click',function(e){
		e.preventDefault();
		var ulrs =$(this).attr('href');
			$("#invoice").load(ulrs, [], function(){
			$("#invoice").dialog("open");
		});
			 
	});

});


 