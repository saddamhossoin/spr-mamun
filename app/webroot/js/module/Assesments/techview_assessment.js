jQuery(function($){ 
var dialogOptstempleteGeneralLists = {
		title:'Assesment',
		autoOpen: false,
		height: 'auto',
		width: 750,
		modal: true,
		//draggable:true,
 	    
	  dialogClass: 'objectdetailsdialog',
	};
	
	$("#invoice3").dialog(dialogOptstempleteGeneralLists);
	
//===================== View Image ================
	$("#view_Service_Image").on('click',function(e){
		e.preventDefault();
  		var device_info_id = $(this).attr("title");
 		var ulrs =siteurl+"ServiceDeviceInfos/view_servie_image/"+device_info_id;
			$("#invoice3").load(ulrs, [], function(){
			$("#invoice3").dialog("open");
			 
 		});
  
	});
	$("#view_Service_Note").on('click',function(e){
		e.preventDefault();
   		var device_info_id = $(this).attr("title");
 		var ulrs =siteurl+"ServiceDeviceInfos/view_servie_note/"+device_info_id;
			$("#invoice3").load(ulrs, [], function(){
			$("#invoice3").dialog("open");
  		});
	});



 var dialogOptstempleteGeneralList6 = {
		title:'Technician Note',
		autoOpen: false,
		height: 300,
		width: 500,
		modal: true,
		draggable:true,
 	    ////close: CloseFunction,
	  dialogClass: 'objectdetailsdialog',
	};
	$("#invoice5").dialog(dialogOptstempleteGeneralList6);
	
	$(".complete").on('click',function(e){
		 	e.preventDefault(); 
			var vars = $(this).attr('id');
			 
 			var ulrs1 =siteurl+"AssesmentApproveNotes/tech_complete_note/"+vars;
		 	$("#invoice5").load(ulrs1, [], function(){
			$("#invoice5").dialog("open");
		});
			 
	});
	
	
	var dialogOptstempleteGeneralListss = {
		title:'Re-Assesment Note',
		autoOpen: false,
		height: 300,
		width: 350,
		modal: true,
		//draggable:true,
		//close: CloseFunction,
		dialogClass: 'objectdetailsdialog',
	};
	$("#invoice2").dialog(dialogOptstempleteGeneralListss);


$(".tec_view").click(function(e){
	e.preventDefault();
 	var vars = $(this).attr('id');
 	var ulrs =siteurl+'Assesments/re_assessment/'+vars;
			$("#invoice2").load(ulrs, [], function(){
			$("#invoice2").dialog("open");
  	 	});	
 	});	
	
//======================= Complete Note ====================

	var dialogOptCompleteNote = {
		title:'Complete Note',
		autoOpen: false,
		height: 300,
		width: 350,
		modal: true,
		//draggable:true,
		//close: CloseFunction,
		dialogClass: 'objectdetailsdialog',
	};
	$("#invoice4").dialog(dialogOptCompleteNote);
		$(".ass_complete").click(function(e){
		e.preventDefault();
		var vars = $(this).attr('id');
		var ulrs =siteurl+'Assesments/assesment_complete/'+vars;
				$("#invoice4").load(ulrs, [], function(){
				$("#invoice4").dialog("open");
			});	
 	});	
	
	//===================== View Check list Popup ===============
	var dialogOptstempleteGeneralListss = {
		title:'View Check List',
		autoOpen: false,
		height: 400,
		width: 600,
		modal: true,
		//draggable:true,
		//close: CloseFunction,
		dialogClass: 'objectdetailsdialog',
	};
	$("#invoice7").dialog(dialogOptstempleteGeneralListss);
	
	$("#view_checklist").on('click',function(e){
		e.preventDefault();
  		
		 var service_info_id = $("#ServiceDeviceInfo_id").html();
		 	 
		var ulrs =siteurl+"ServiceDeviceInfos/viewcheck_list/"+service_info_id;
			$("#invoice7").load(ulrs, [], function(){
			$("#invoice7").dialog("open");
			//add_inventory
			
			
 		});
  
	});
	//======================View Check list Popup end ===============================
	
	
/*$(".working").click(function(e){
	e.preventDefault();
 	var vars = $(this).attr('id');
	 
 	$.ajax({
			type: "GET",
			url: siteurl+'Assesments/servicing_status/'+vars,
			success: function(response){
				//alert(response);
		 	    //window.location.reload(true);
			 	}
			 });
 
	});	
*/


	
});