jQuery(function($){ 
 
 //=======================================Customer End Information=================================//
 
	$( "#PosProductName" ).autocomplete(
	{
 		 minLength: 3,
			search  : function(){$(".ajax_status").fadeIn();},
			open    : function(){$(".ajax_status").fadeOut();},
			source: data,
			select: function( event, ui ) {
 				$( "#PosProductName" ).val( ui.item.label);
 				return false;
			}
			}).data( "uiAutocomplete" )._renderItem = function( ul, item ) {
			return $( "<li></li>" )
				.data( "item.uiAutocomplete", item )
				.append( "<a><strong>" + item.label + "</strong> / " + item.actor + "</a>" )
				.appendTo( ul );
			};	
			
});