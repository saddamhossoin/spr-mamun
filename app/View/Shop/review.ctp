<?php //pr($shop);?>
<?php echo $this->set('title_for_layout', 'Order Review'); ?>
<?php echo $this->Html->css(array('module/Shop/cart')); ?>
<?php echo $this->Html->script(array('module/Shop/shop_review.js')); ?>

<div class="reviewtop"><h3>Order Review</h3>
<div class="btnconfirm checkout_button">Order Confirm</div>
</div>
<div class="clr"></div>
<hr>
<?php echo $this->Form->create('Order'); ?>
<?php echo $this->Form->end(); ?>
<div class="row">
	<div class="col col-sm-4 info_div">
		<div class="panel panel-default">
			<div class="panel-heading panel-warning">
				<h3 class="panel-title">Customer Info</h3>
 			</div>
			<div class="panel-body">
				<span class="titlea"><?php echo __("Name");?></span> 	: <?php echo $shop['Order']['first_name'];?><br />
				<span class="titlea"><?php echo __("Email");?></span> 	: <?php echo $shop['Order']['email'];?><br />
				<span class="titlea"><?php echo __("Phone");?></span> 	: <?php echo $shop['Order']['phone'];?><br />
                <span class="titlea"><?php echo __("Tax Code");?></span> 	: <?php echo $shop['Order']['billing_tex_code'];?><br />
			</div>
		</div>
	</div>
	<div class="col col-sm-4 info_div">
		<div class="panel panel-default">
			<div class="panel-heading panel-warning">
				<h3 class="panel-title">Billing Address</h3>
			</div>
			<div class="panel-body">
				  <span class="titlea"><?php echo __("Address");?></span>: <?php echo $shop['Order']['billing_address'];?><br />
				 <span class="titlea"><?php echo __("City");?></span>: <?php echo $shop['Order']['billing_city'];?><br />
				 <span class="titlea"><?php echo __("State");?></span>: <?php echo $shop['Order']['billing_state'];?><br />
				 <span class="titlea"><?php echo __("Zip");?></span>: <?php echo $shop['Order']['billing_zip'];?><br />
				 
			</div>
		</div>
	</div>
	<div class="col col-sm-4 info_div">
		<div class="panel panel-default">
			<div class="panel-heading panel-warning">
				<h3 class="panel-title">Shipping Address</h3>
			</div>
			<div class="panel-body">
				 <span class="titlea"><?php echo __("Address");?></span>: <?php echo $shop['Order']['shipping_address'];?> &nbsp;<br />
				 <span class="titlea"><?php echo __("City");?></span>: <?php echo $shop['Order']['shipping_city'];?><br />
				 <span class="titlea"><?php echo __("State");?></span>: <?php echo $shop['Order']['shipping_state'];?><br />
				 <span class="titlea"><?php echo __("Zip");?></span>: <?php echo $shop['Order']['shipping_zip'];?><br />
			</div>
		</div>
	</div>
</div>
<hr>
<br />
<div class="invoice_details">
<div class="shopping_cart_left">
<table class="cart_grid ">
    <thead>
      <tr>
        <th width="12%" align="left"><?php echo __("IMAGE");?></th>
        <th width="48%" align="left"><?php echo __("PRODUCT");?></th>
        <th width="10%" class="quantity"><?php echo __("PRICE");?></th>
        <th width="20%" class="quantity"><?php echo __("QUANTITY");?></th>
        <th width="10%" class="totalas"><?php echo __("TOTAL");?></th>
       </tr>
    </thead>
<tbody> 
<?php foreach ($shop['OrderItem'] as $item): ?>
    <tr class="" id="row-<?php echo $item['PosProduct']['id']?>">
        <td class="image v_top t_center">
            <div class="leftItem"> 
            <?php if(!empty($item['PosProduct']['image'])) {?>
                <div class="zoom">
                    <div class="small">
                    <?php  echo $this->Html->image('../'.$item['PosProduct']['image'], array("alt" => "No Image","border"=>"0" ));?>
                    </div>
                <div class="large">
                <?php  //echo $this->Html->image('../'.$item['PosProduct']['image'], array("alt" => "No Image","border"=>"0"  ));?>
                </div>
                </div>
            <?php }else{?>
            <?php  echo $this->Html->image('/img/wpage/noImage.jpg', array("alt" => "No Image","width"=>"78" ,"height"=>"58","border"=>"0"));  }?>
            </div>
        </td>
    <td id="name-25-244-3-1-98" class="details v_middle text_size13 t_left">
    <?php echo $item['PosProduct']['name'];?> 
    </td>
    <td class="quantity v_middle t_center" id="salesPrice_<?php echo $item['PosProduct']['id']?>">

     <?php echo $realPrice = round($item ['price']) ;?>
    </td>
    <td class="v_middle t_center">
		<?php echo $item['quantity'];?>
    </td> 
    <td id="itemtotal_<?php echo $item['PosProduct']['id']?>" class="itemtotalprice">
    	<?php //echo $item['quantity'] *  $item['price']; ?>
        <?php echo 	$item['quantity'] *  $realPrice; ?>
    </td>
  </tr>
  <?php endforeach; ?>
</tbody>
</table>
</div>
<div class="invoice_summary shopping_cart_right">
<div class="orderSummary"><?php echo __("ORDER SUMMARY");?></div>
 <div class="totalItem summary"><?php echo __("Total Quantity");?>  <span>&#8364; &nbsp;</><span class="quantityTotal"><?php echo $shop['Order']['quantity'];?></span></div>
        <div class="summary"><?php echo __("Subtotal");?>  <span>&#8364; &nbsp;</><span class="subTotal"><?php echo $shop['Order']['subtotal']  ;?><?php //echo $shop['Order']['subtotal'];?></span></div>
        <div class="summary"><?php echo __("Vat");?>  <span>&#8364; &nbsp;</><span class="vat"><?php echo (($shop['Order']['subtotal']*22)/100);?></span></div>
        <div class="summary"><?php echo __("Shipping");?>  <span>&#8364; &nbsp;</><span class="shippingamount"><?php echo $shop['Order']['shippingCost']; ?></span></div>
       <?php $payment_type = array('1'=>'Recive From SPR','2'=>'Cash On Delivery','3'=>'Bank Transfer');?>
        <div class="summary" ><?php echo __($payment_type[$shop['Order']['payment_type']]);?>  <span>&#8364; &nbsp;</><span class="cashondelivery"><?php  echo $shop['Order']['payment_charge']; ?></span></div>
        <div class="summary"><?php echo __("Total");?>  <span>&#8364; &nbsp;</><span class="Total"><?php echo $shop['Order']['total']+$shop['Order']['shippingCost']+$shop['Order']['payment_charge'] + $shop['Order']['iva'];?></span></div>
       <?php /*?> <div class="summary"><?php echo __("Total");?>  <span>&#8364; &nbsp;</><span class="Total"><?php echo $shop['Order']['total']+$shop['Order']['shippingCost']+$shop['Order']['payment_charge'];?></span></div><?php */?>
        <br />
        <br />
     <div class="btnconfirm checkout_button">Order Confirm </div>
     <br />
</div>
<div class="clr"></div>
<hr>