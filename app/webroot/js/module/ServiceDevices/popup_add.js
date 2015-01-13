jQuery(function($){ 
//======================Add Brand pop up============//
	 var dialogOptstempleteGeneral = {
		title:'Add Brand',
		autoOpen: false,
		height: 350,
		width: 400,
		modal: true,
		draggable:true,
 	    ////close: CloseFunction,
	  dialogClass: 'objectdetailsdialog',
	};
	$("#invoice2").dialog(dialogOptstempleteGeneral);
	
	$("#addNewBrand").on('click',function(e){
		 	e.preventDefault(); 
			var ulrs =siteurl+"PosBrands/add/yes";
		 	$("#invoice2").load(ulrs, [], function(){
			$("#invoice2").dialog("open");
		});
			 
	});
	
	//====================== End Brand pop up===========//
	//======================Add Category pop up============//
	 var dialogOptstemplete = {
		title:'Add Category',
		autoOpen: false,
		height: 350,
		width: 400,
		modal: true,
		draggable:true,
 	    ////close: CloseFunction,
	  dialogClass: 'objectdetailsdialog',
	};
	$("#invoice3").dialog(dialogOptstemplete);
	
	$("#addNewCategory").on('click',function(e){
		 	e.preventDefault(); 
			var ulrs =siteurl+"PosPcategories/add/yes";
		 	$("#invoice3").load(ulrs, [], function(){
			$("#invoice3").dialog("open");
		});
			 
	});
	
 //====================== End Category pop up===========// 
 //======================= Start Add Script =====================				
 	 $('#btn_ServiceDevice_add').click(function(){
 		//========================== Validation Check ========
  		if( $('#ServiceDeviceAddForm').valid()) 
 		{
			$('.ajax_status').fadeIn();
			$('.ajax-save-message').hide().fadeOut(); 
		//===================== Ajax Submit =================
		  $('#ServiceDeviceAddForm').ajaxSubmit({ 
			success: function(responseText, responseCode) { 
			$('.ajax_status').hide(); 
			$('.ajax-save-message').hide().html(responseText).fadeIn(); 
			 }
		});
	}
  	return false; 
	}).appendTo('form div.submit'); 
 	 
});