jQuery(function($){ 
	
	 var dialogOptstempleteGeneralList = {
		title:'User Registration <span class="Print_Button"><span class="print_img">&nbsp;&nbsp;</span> &nbsp;Print</span>',
		autoOpen: false,
		height: 600,
		width: 750,
		modal: true,
		draggable:true,
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
 
 $('#btn_user_add11').click(function(e){
	// alert('dd');
		e.preventDefault();
 		//========================== Validation Check ========
  		if( $('#UserUserRegistrationForm').valid()) {
		 		var data= $('#UserUserRegistrationForm').serialize();
  				
			//=================================//
 		 	 $.ajax({
					type: "POST",
					url:siteurl+"Users/user_registration",
					data:  data,
					success: function(response){
						//alert(response);
					  
				$('.ajax_status').hide(); 
					$('.ajax-save-message').hide().html(response).fadeIn(); 
					$('#Cancel').click();
					 window.location.reload(true);
						}
					});
	  }
	  
}); 
 
 
 
 
});
