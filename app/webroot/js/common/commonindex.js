// JavaScript Document
//==================== All Index Search Area Toggle Start Here ===============
jQuery(function($){ 
  $("#searchlink").click(function () {
 		$(".tDiv2").toggle('slow');
	});
  
     $("[class^=multidelete]").click(function () {
		 $(".ajax_status").show();					 
		var val = [];
    	$('.listcheckbox:checkbox:checked').each(function(i){
	     	 val[i] = $(this).val();
    		});
		//alert(val[0]);
		if(confirm('Are you confirm to delete'))
		{
		if(val.length >0)
		{
 			var classname = $(this).attr('class');
	 		var controllername= classname.split('-');
 			//alert("/cakephp/authjob/"+controllername[1]+"/multidelete/"+val);
  			$.ajax({
			type: "GET",
			url:siteurl+controllername[1]+"/multidelete/"+val,
			data: '',
			success: function(response){
				
			var response= response.split(',');
			$(response).each(function(index)
			{
				$('#row_'+response[index]).remove();
 			});
		alert( 'Record ID : ' + response+' \n Delete Successfully. ');

			$(".ajax_status").hide();
				 
					 
					 
				}
			});
		}
		
		else
		{
				alert('Please Select First');
				$(".ajax_status").hide();
		}
		}
			
	});
	 
	 
	  $(".commoncheckbox").on('click',function () {
		 
		 if(!$(".commoncheckbox").attr('checked'))
		 {
			 $(".listcheckbox").each(function(index)
			{
				$(this).attr('checked', false);
 
			});
		 }else
		 {
		 $(".listcheckbox").each(function(index)
			{
				$(this).attr('checked', true);
 
			});
		 }
	});
	 
	 
	 
	 

});
 //==================== All Index Search Area Toggle End Here ===============