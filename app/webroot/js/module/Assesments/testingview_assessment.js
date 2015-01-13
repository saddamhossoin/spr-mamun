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
	
	
	//======================Test Complete ===============================
	var dialogOptstempTestComplete = {
		title:'Test Complete Note',
		autoOpen: false,
		height: 300,
		width: 350,
		modal: true,
		//draggable:true,
		//close: CloseFunction,
		dialogClass: 'objectdetailsdialog',
	};
	$("#invoice4").dialog(dialogOptstempTestComplete);


	$(".complete").click(function(e){
		e.preventDefault();
	 
		var vars = $(this).attr('id');
		var ulrs =siteurl+'Assesments/testing_status/'+vars;
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
	
	
	
	//===================== Test assign Check list Popup ===============
	var dialogOptstempleteGeneralLists = {
		title:'Test Assign Check List',
		autoOpen: false,
		height: 500,
		width: 652,
		modal: true,
		//draggable:true,
		//close: CloseFunction,
		dialogClass: 'objectdetailsdialog',
	};
	$("#invoice6").dialog(dialogOptstempleteGeneralLists);
	
	$("#test_checklist").on('click',function(e){
		e.preventDefault();
  		
		 var service_info_id = $("#ServiceDeviceInfo_id").html();
		 	 
		var ulrss =siteurl+"DeviceCheckLists/test_assign_checklist/"+service_info_id;
			$("#invoice6").load(ulrss, [], function(){
			$("#invoice6").dialog("open");
			//add_inventory
			
			
 		});
  
	});
	//======================Test assign Check list Popup ===============================
var dialogOptstempleteGeneralListss = {
		title:'Re-Service Note',
		autoOpen: false,
		height: 300,
		width: 350,
		modal: true,
		//draggable:true,
		//close: CloseFunction,
		dialogClass: 'objectdetailsdialog',
	};
	$("#invoice2").dialog(dialogOptstempleteGeneralListss);


$(".testing_view").click(function(e){
	e.preventDefault();
 	var vars = $(this).attr('id');
 	var ulrs =siteurl+'Assesments/re_service/'+vars;
			$("#invoice2").load(ulrs, [], function(){
			$("#invoice2").dialog("open");
  	 	});	
 	});	

 
	
});