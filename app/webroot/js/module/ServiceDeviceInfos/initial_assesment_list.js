jQuery(function($){ 


	
var dialogOptstempleteGeneralLists1 = {
		title:'Change Status',
		autoOpen: false,
		height: 200,
		width: 350,
		modal: true,
		//draggable:true,
 	    close: function(){
						location.href = siteurl+'ServiceDeviceInfos/initial_assesment_list';
						},
	  dialogClass: 'objectdetailsdialog',
	};
	
	$("#invoice3").dialog(dialogOptstempleteGeneralLists1);
	
	$(".StatusChange").on('click',function(e){
 			e.preventDefault(); 
			var ulrs =$(this).attr('href');
			$("#invoice3").load(ulrs, [], function(){
										   
			$("#invoice3").dialog("open");
			$('.ajax_status').fadeOut();
			$('.overlaydiv').fadeOut();
		});
	});
			
			

				
				
var dialogOptstempleteGeneralLists = {
		title:'Assesment',
		autoOpen: false,
		height: 600,
		width: 750,
		modal: true,
		//draggable:true,
 	    close: function(){
						location.href = siteurl+'ServiceDeviceInfos/initial_assesment_list';
						},
	  dialogClass: 'objectdetailsdialog',
	};
	
	$("#invoice1").dialog(dialogOptstempleteGeneralLists);
	
	$(".AssesmentPrint").on('click',function(e){
		 	e.preventDefault(); 
	var ulrs =$(this).attr('href');
					$("#invoice1").load(ulrs, [], function(){
														   
					$("#invoice1").dialog("open");
					 $('.ajax_status').fadeOut();
			 		$('.overlaydiv').fadeOut();
					});
					});
					
					

 var dialogOptstempleteGeneralList5 = {
		title:'Assign Technician',
		autoOpen: false,
		height: 300	,
		width: 455,
		modal: true,
		draggable:true,
 	    ////close: CloseFunction,
	  dialogClass: 'objectdetailsdialog',
	};
	$("#invoice5").dialog(dialogOptstempleteGeneralList5);
	
	$(".wait_approve1").on('click',function(e){
		 	e.preventDefault(); 
 			var ulrs =$(this).attr('href');
		 	$("#invoice5").load(ulrs, [], function(){
			$("#invoice5").dialog("open");
		});
	});


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
	
	$(".printlink").on('click',function(e){
		 	e.preventDefault(); 
 			var ulrs =$(this).attr('href');
		 	$("#invoice6").load(ulrs, [], function(){
			$("#invoice6").dialog("open");
		});
			 
	});
	 
});