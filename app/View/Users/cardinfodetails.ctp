<div class="balance_show">
<div class="show_title">Card Info</div>
<?php echo 'Card Number :'.$cardinfo['Card']['card_num'].'<br /><br />';//print_r($cardinfo);?>
<?php echo  'Password :' . $cardinfo['Card']['password'].'<br />'; ?>
</div>
<div class="Payemnt_show">
<div class="show_title">Payment Info</div>

 <?php 	if($cardinfo['BuyCard']['payment_method'] != 1){?>
             <div class="BuyCardPaymentMethod<?php echo $cardinfo['BuyCard']['payment_method']; ?>">&nbsp;</div>
 		<?php }
		else if($cardinfo['BuyCard']['payment_method'] == 1){?>
              <div class="BuyCardPaymentMethod<?php echo $cardinfo['BuyCard']['payment_method']; ?>">&nbsp;</div>
		<?php } ?>
 <br />        
<?php if($cardinfo['BuyCard']['payment_method'] != 1){
	
	echo 'Authorization : ' . $cardinfo['BuyCard']['authorization'].'<br /><br />';
	echo 'transaction : ' . $cardinfo['BuyCard']['transaction'] .'<br /><br />'; 
	
	  }else{
	echo 'Token : ' . $cardinfo['BuyCard']['token'] .'<br /><br />';
	echo 'PayerID : ' . $cardinfo['BuyCard']['PayerID'] .'<br /><br />'; 
	
	  }?>
</div>
<div class="button_show">
<input type="button" value="Thanks" id="thanksid"/>
</div>

	<?php /*?><script type="text/javascript">var siteurl = "<?php echo $this->request->webroot;?>"</script>
	<?php */?>
<div class="clr" style="clear:both"></div>
 <script type="text/javascript">
 jQuery(function($){ 
 $('#thanksid').on('click',function(e){
		e.preventDefault();
		//	alert(siteurl);
		 //window.location = "http://humanbd.com/mayasoftbd/users/userdashboard";
		window.location.href = siteurl+"Users/userdashboard";
		 
 	});
 	
});
 </script>