<?php //pr($orders);
$i = 1;
foreach($orders['OrderItem'] as $order){
 echo "<input type='hidden' name='item_name_".$i."' value='".$order['name']."'>";
echo "<input type='hidden' name='amount_".$i."' value='".$order['subtotal']."'>";                    
	$i ++;
}
 

?>
 