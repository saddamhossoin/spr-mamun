<?php 
 //print_r($shopDetails);die();
$this->Html->addCrumb('Order Success'); ?>
<h2>Thank You for Payment</h2>
<p>
	Dear Mrs.<?php echo $shopDetails['Order']['first_name'] .' '.$shopDetails['Order']['last_name'];?>,
</p>
<p>
Your Order #<?php echo $shopDetails['Order']['id'];?> of <?=date('Y-m-d');?> in which you enclosed your payment of 
&euro;<?=(float)$shopDetails['Order']['payment_charge']+(float)$shopDetails['Order']['shippingCost']+(float)$shopDetails['Order']['subtotal']+(float)$shopDetails['Order']['iva']; ?> has been received.  Thank you for your purchase.
</p>
<p>
It has been a pleasure working with you.  Best wishes in the future.
</p>
<p>
Sincerely,
</p>

<p>
---------------------------------<br>
SPR Team.
</p>
<br />
We email your invoice. if not found in inbox please check in spam.
<br><br>