jQuery(function($){ 
//======================Add Brand pop up============//
	 var dialogOptstempleteGeneralList = {
		title:'Add Brand',
		autoOpen: false,
		height: 350,
		width: 400,
		modal: true,
		draggable:true,
 	    ////close: CloseFunction,
	  dialogClass: 'objectdetailsdialog',
	};
	$("#invoice").dialog(dialogOptstempleteGeneralList);
	
	$("#addNewBrand").on('click',function(e){
		 	e.preventDefault(); 
			var ulrs =siteurl+"PosBrands/add/yes";
		 	$("#invoice").load(ulrs, [], function(){
			$("#invoice").dialog("open");
		});
			 
	});
	
	//====================== End Brand pop up===========//
	//======================Add Category pop up============//
	 var dialogOptstempleteGeneralList = {
		title:'Add Category',
		autoOpen: false,
		height: 350,
		width: 400,
		modal: true,
		draggable:true,
 	    ////close: CloseFunction,
	  dialogClass: 'objectdetailsdialog',
	};
	$("#invoice1").dialog(dialogOptstempleteGeneralList);
	
	$("#addNewCategory").on('click',function(e){
		 	e.preventDefault(); 
			var ulrs =siteurl+"PosPcategories/add/yes";
		 	$("#invoice1").load(ulrs, [], function(){
			$("#invoice1").dialog("open");
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
			$('#Cancel').click()
			 
 			}
		});
	}
  	return false; 
	}).appendTo('form div.submit'); 
	 
	
	 
});