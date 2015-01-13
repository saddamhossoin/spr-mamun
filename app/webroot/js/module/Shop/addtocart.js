jQuery(function($){ 

	$('.addtocart').click(function() {
	 
	 var ids =$(this).attr('id');
	 
	 var shopData = $("#ShopCard_"+ids).serialize();
 	 	
		$.ajax({
			type: "POST",
			url: siteurl + "shop/itemupdate",
			data:shopData ,
			 
			success: function(response) {
				 
				//alert(response);
				$('#msg').html('<div class="alert alert-success flash-msg">Product Added to Shopping Cart</div>');
				$('#cartbutton').show();
				$('.flash-msg').delay(2000).fadeOut('slow');

			},
			error: function(data) {
				 
				alert('big problems !!!');
			}
		});

		return false;

	});

});
