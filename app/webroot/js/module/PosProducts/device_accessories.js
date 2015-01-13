jQuery(document).ready(function(){
	 
    $('.qtyplus').click(function(e){
        e.preventDefault();
        var ids = $(this).attr('id');
		var id= ids.split('_');
		var currentVal = parseInt($('#qtyplus_'+id[1]).val());
        if (!isNaN(currentVal)) {
			$('#qtyplus_'+id[1]).val(currentVal + 1);
        } else {
            $('#qtyplus_'+id[1]).val(0);
        }
		
    });
	
	
	
    $(".qtyminus").click(function(e) {
        e.preventDefault();
        var ids = $(this).attr('id');
		var id= ids.split('_');
		var currentVal = parseInt($('#qtyplus_'+id[1]).val());
        if (!isNaN(currentVal) &&  currentVal > 0) {
			$('#qtyplus_'+id[1]).val(currentVal - 1);
        } else {
            $('#qtyplus_'+id[1]).val(0);
        }
    });
	
	
	$(function() {
		$( "#tabs" ).tabs({
		beforeLoad: function( event, ui ) {
		ui.jqXHR.error(function() {
		ui.panel.html(
		"Couldn't load this tab. We'll try to fix this as soon as possible. " +
		"If this wouldn't be a demo." );
     });
    }
 });
});

	
	
	
	
});
