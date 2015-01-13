jQuery(function($){
				
 		
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
	
	$("#view_checklist1").on('click',function(e){
		e.preventDefault();
  		
		 var service_info_id = $("#ServiceDeviceInfo_id").html();
		 	 
		var ulrs =siteurl+"ServiceDeviceInfos/viewcheck_list/"+service_info_id;
			$("#invoice7").load(ulrs, [], function(){
			$("#invoice7").dialog("open");
			//add_inventory
			
			
 		});
  
	});
	

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
		

$(".delivery").click(function(e){
	e.preventDefault();
 	var vars = $(this).attr('id');
	//alert(vars);
 	$.ajax({
			type: "GET",
			url: siteurl+'Assesments/delivery_status/'+vars,
			success: function(response){
				//alert(response);
		 	    window.location.reload(true);
			 	}
			 });
 
	});	
	

$(".delivered").click(function(e){
	e.preventDefault();
 	var vars = $(this).attr('id');
	//alert(vars);
 	$.ajax({
			type: "GET",
			url: siteurl+'Assesments/delivered_status/'+vars,
			success: function(response){
				//alert(response);
		 	    window.location.reload(true);
			 	}
			 });
 
	});	
	
	
		//===================== View Check list Popup ===============
	var dialogOptstempleteGeneralListss = {
		title:'Comparigm Check List',
		autoOpen: false,
		height: 420,
		width: 635,
		modal: true,
		//draggable:true,
		//close: CloseFunction,
		dialogClass: 'objectdetailsdialog',
	};
	$("#invoice7").dialog(dialogOptstempleteGeneralListss);
	
	$("#view_checklist").on('click',function(e){
		e.preventDefault();
  		
		 var service_info_id = $("#ServiceDeviceInfo_id").html();
		 	 
		var ulrs =siteurl+"DeviceCheckLists/comparigm_checklist/"+service_info_id;
			$("#invoice7").load(ulrs, [], function(){
			$("#invoice7").dialog("open");
			//add_inventory
			
			
 		});
  
	});
	//======================View Check list Popup end ===============================
	 
	
});