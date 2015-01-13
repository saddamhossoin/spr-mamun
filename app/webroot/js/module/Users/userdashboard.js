// JavaScript Document
$(function() {
		   
	$( "#client_deshboard" ).tabs();
	 
 	$("#first_step").on('click',function(){
	 	 								 
	  if($('input[name="data[BuyCard][card_balance_id]"]').valid() && $('input[name="data[BuyCard][payment_method]"]').valid()){
			 	$( "#buy" ).tabs( "option", "hide", { effect: "slide", direction: "left", duration: 600 } );
				$( "#buy" ).tabs( "option", "show", { effect: "slide", direction: "right", duration: 600 } );
				$( "#buy" ).tabs('option', 'disabled', [2 , 3]);
				$( "#buy" ).tabs('enable', 1);
				$( "#buy" ).tabs( "option", "active", 1 );
				 			} 
		  		
				
	 });
 	
		$('#btn_BuyCard_add').click(function(e){
			e.preventDefault();
 			 
  		//========================== Validation Check ========
  		if( $('#BuyCardUserdashboardForm').valid()) 
 		{
			$(".ajax_status").show();
		 //===================== Ajax Submit =================
		  $.post( siteurl + 'BuyCards/add', $("#BuyCardUserdashboardForm").serialize(), function(response) { 
		    response = response.replace(/\s/g, "") ;
 			if(response == 0){
				 $(".ajax_status").hide();
					alert('Error');
 			}else if(response !=0 && response!= ''){
				
				$.ajax({
							type: "GET",
							url:siteurl+"BuyCards/review/"+response,
							success: function(response1){
								 
							if (response1 == 0) {
								 $(".ajax_loader").hide();
								} 
								else {
									 $(".ajax_status").hide();
									$("#tabs-12").html(response1);
 									} 
								}
					});
 				$( "#buy" ).tabs( "option", "hide", { effect: "slide", direction: "left", duration: 600 } );
				$( "#buy" ).tabs( "option", "show", { effect: "slide", direction: "right", duration: 600 } );
 				$( "#buy" ).tabs('option', 'disabled', [0 , 1 , 3]);
				$( "#buy" ).tabs('enable', 2);
				$( "#buy" ).tabs( "option", "active", 2 );
			}
   			});

	}
  	return false; 
	}) ;
	
	 $(".select2as").select2();
	 
	  var buycard_view = {
		title:'Card Information',
		autoOpen: false,
		height: 400,
		width: 400,
		modal: true,
		draggable:true,
 	    //close: CloseFunction,
	  dialogClass: 'objectdetailsdialog',
	};
	$("#user_view").dialog(buycard_view);
	
	$(".buycard_view").on('click',function(e){
		e.preventDefault();
 		var ulrs =$(this).attr('href');
			$("#user_view").load(ulrs, [], function(){
			$("#user_view").dialog("open");
		});
			 
	});
	
	$('#btn_user_edit').click(function(e){
		e.preventDefault();
		 $(".ajax_status").show();
 		//========================== Validation Check ========
  		if( $('#UserEditForm').valid()) 
 		{
			 $.post( siteurl + 'Users/edit', $("#UserEditForm").serialize(), function(response) { 
			
			  $(".ajax_status").hide();	
			   alert(response);																		  
		}); 
		}
	});
  	 
	
	
 
 
 
	 
  
  
});