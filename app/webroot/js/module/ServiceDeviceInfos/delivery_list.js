jQuery(function($){ 


 var dialogOptstempleteGeneralList6 = {
		title:'Assign Technician',
		autoOpen: false,
		height: 600,
		width: 750,
		modal: true,
		draggable:true,
 	    ////close: CloseFunction,
	  dialogClass: 'objectdetailsdialog',
	};
	$("#invoice6").dialog(dialogOptstempleteGeneralList6);
	
	$(".action_link").on('click',function(e){
		 	e.preventDefault(); 
 			var ulrs =$(this).attr('href');
		 	$("#invoice6").load(ulrs, [], function(){
			$("#invoice6").dialog("open");
		});
			 
	});
	
	

	
	
	
	
	


	
	
	
	
	
	
});