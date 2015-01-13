jQuery(function($){ 
 //======================= Start Add Script =====================				
 	 $('#btn_Barcode_add7').click(function(){
 		//========================== Validation Check ========
  		if( $('#BarcodeAddForm').valid()) 
 		{
			$('.ajax_status').fadeIn();
			$('.ajax-save-message').hide().fadeOut(); 
		//===================== Ajax Submit =================
		  $('#BarcodeAddForm').ajaxSubmit({ 
										  
			success: function(responseText, responseCode) { 
			alert(responseText);
			
			$('.ajax_status').hide(); 
			$('.ajax-save-message').hide().html(responseText).fadeIn(); 
			$('#Cancel').click()
			 
 			}
		});
	}
  	return false; 
	}).appendTo('form div.submit'); 
	 
	 
	 $( "#BarcodeName" ).autocomplete(
		{
 		 minLength: 3,
			search  : function(){$(".ajax_status").fadeIn();},
			open    : function(){$(".ajax_status").fadeOut();},
			source: data,
			select: function( event, ui ) {
				 
				$( "#BarcodeName" ).val( ui.item.label);
				$('#product_id').val(ui.item.actor);
				//================Product Status===========//
 				 //================Product Status End ===========//
 				return false;
			}
			}).data( "uiAutocomplete" )._renderItem = function( ul, item ) {
			return $( "<li></li>" )
				.data( "item.uiAutocomplete", item )
				.append( "<a><strong>" + item.label + "</strong> / " + item.actor + "</a>" )
				.appendTo( ul );
			};	
			
		 
 
	 
 });