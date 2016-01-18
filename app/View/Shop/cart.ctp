<?php

/**
 * @var $this view
 */

?>
<?php echo $this->set('title_for_layout', 'Shopping Cart'); ?>
<?php echo $this->Html->script(array('module/Shop/cart')); ?>
<?php echo $this->Html->css(array('ui-10/jquery-ui-1.10.4.custom.min')); ?>
<?php  echo $this->Html->script(array('common/form','common/jquery.validate'));  ?>

<?php echo $this->Html->css(array('module/Shop/cart')); 
 //pr($shop);
 ?>
<div class="shopping_cart">
 	<div class="shopping_cart_left">
    	<h3><?php echo __("READY TO CHECKOUT")?>?</h3>
        <div style="margin-top: 10px; height: 45px;">
			<div id="logged_in"></div>
 		</div>
           <table class="cart_grid">
            <thead>
              <tr>
                <th align="left" width="12%"><?php echo __("IMAGE")?></th>
                <th align="left" width="38%"><?php echo __("PRODUCT")?></th>
                <th class="quantity" width="10%"><?php echo __("PRICE")?></th>
                
                <th class="quantity" width="20%"><?php echo __("QUANTITY")?></th>
                <th class="totalas" width="10%"><?php echo __("TOTAL")?></th>
                <th class="remove" width="10%"></th>
              </tr>
            </thead>
            <tbody> 
 			<?php foreach ($shop['OrderItem'] as $key => $item): ?>	
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
                      
					 <?php echo $item ['price'];//echo $realPrice = round($item ['price'] - (($item ['price'] * Configure::read('VAT'))/100),2) ;?>
					</td>
                  <td class="v_middle t_center">
                        <input type="hidden" id="PosProductId" value="<?php echo $item['PosProduct']['id']?>" name="data[PosProduct][id]">
                        <input type="button" field="quandtity" id="btnqtyminus_<?php echo $item['PosProduct']['id']?>" class="qtyminus" value="-">
                        <input type="text" class="qty" id="qtyplus_<?php echo $item['PosProduct']['id']?>" value="<?php echo $item['quantity'];?>" name="quantity">
                        <input type="button" field="quantity" id="btnqtyplus_<?php echo $item['PosProduct']['id']?>" class="qtyplus" value="+">
                     </td> 
                    <td id="itemtotal_<?php echo $item['PosProduct']['id']?>" class="itemtotalprice">
                    	<?php echo 	$item['quantity'] * $item ['price'];//echo 	$item['quantity'] *  $realPrice; ?>
                    </td>
                      <td class="itemremove">
                    	<span class="itemremove_<?php echo $item['PosProduct']['id']?> remove" id="<?php echo $item['PosProduct']['id']?>">&nbsp;<?php echo __("REMOVE")?></span>
                     </td>
					</tr>
                    <?php endforeach; ?>           
			</tbody>
          </table>
          
          <div class="whole_checkout_div">
     <?php 
	 $userid = $this->Session->read('Auth.User.id');
	 $user_info = $this->Session->read('Auth.User');
	  
	 if(empty($userid)){?>
 	    <div class="login_info_div">
                 <div class="col" id="address_name">
                     <div class="" id="register_div">
                     <div id="user">
						<p class=""> <?php echo __("Sign in to your account to use a saved address, and continue checkout")?>.</p>
					</div>
                        <br />
                        <?php  echo $this->Form->button(__('Login'), array('class' => 'btn btn-default btn-warning','id'=>'register_popup'));?>
                         <br />
                        <h2 class="sd-txtA"><?php echo __("New to SPR")?>?</h2>
                       	 <?php echo __("Account Benefits , View Order History , Track your service status")?>
                        <br />
                       
                        <?php  echo $this->Form->button(__('Register'), array('class' => 'btn btn-default btn-warning','id'=>'register_btn'));?>
                     </div>
                        <br />
                </div>
     </div>
    	 <?php }else{?>
       	 <?php  if(empty($order_info)) {?>
         <div class="login_info_div">
            
            <form action="/shop/cart" id="OrderCartForm" method="post" accept-charset="utf-8">
             <?php echo $this->Form->create('Order'); ?>
   			 <div class="row" style="display:block">
                <div class="col" id="address_name">
                <div class="left_div_addrees" id="checkout_div_left">
                    <?php echo $this->Form->hidden('User.id', array('class' => 'form-control','value'=>$user_info['id'])); ?>
					<div class="input text">
                     	<label for="OrderFirstName"> <?php echo __("First Name")?></label>
					 	<?php echo $this->Form->input('first_name', array('label'=>false,'div'=>false,'class' => 'form-control','value'=>$user_info['firstname'])); ?>
                     </div>
                     
                     <div class="input text">
                     	<label for="OrderLastName"> <?php echo __("Last Name")?></label>
    	                <?php echo $this->Form->input(__('last_name'), array('label'=>false,'div'=>false,'class' => 'form-control','value'=>$user_info['lastname'])); ?>
	                </div>
                	<fieldset class="left_address">
                    <legend> <?php echo __(" Billing Address")?></legend>
                     <div class="input text"><label for="OrderBillingAddress"><?php echo __("Address")?></label><?php echo $this->Form->input(__('billing_address'), array('class' => 'form-control', 'label' => false ,'div'=>false)); ?></div>
                     <div class="input text"><label for="OrderBillingCity"><?php echo __("City")?></label><?php echo $this->Form->input(__('billing_city'), array('class' => 'form-control', 'label' => false,'div'=>false)); ?></div>
                     <div class="input text"><label for="OrderBillingState"><?php echo __("State")?></label><?php echo $this->Form->input(__('billing_state'), array('class' => 'form-control', 'label' => false,'div'=>false)); ?></div>
                     <div class="input text"><label for="OrderBillingZip"><?php echo __("Zip")?></label><?php echo $this->Form->input(__('billing_zip'), array('class' => 'form-control', 'label' => false,'div'=>false)); ?></div>
                     <div class="input text"><label for="OrderBillingTexCode"><?php echo __("Tex Code")?></label><?php echo $this->Form->input(__('billing_tex_code'), array('class' => 'form-control required', 'label' => false,'div'=>false)); ?></div>
                     <div class="input text"><label for="OrderBillingVat"><?php echo __("Vat")?></label><?php echo $this->Form->input(__('billing_vat'), array('class' => 'form-control ', 'label' => false,'div'=>false)); ?></div>
                     <div class="input text"><label for="OrderSameaddress"><?php echo __("Copy Billing Address to Shipping")?></label><?php echo $this->Form->input(__('sameaddress'), array('type' => 'checkbox', 'label' => false,'div'=>false)); ?></div>
                    </fieldset>
                </div>
                <div class="right_div_address">
                <?php echo $this->Form->input(__('email'), array('class' => 'form-control','value'=>$user_info['email_address'])); ?>
                 <?php echo $this->Form->input(__('phone'), array('class' => 'form-control','value'=>$user_info['phone'])); ?>
               
               <fieldset class="left_address">
                    <legend> <?php echo __(" Shipping Address")?></legend>
                     
                       <div class="input text"><label for="OrderShippingAddress"><?php echo __("Address");?></label><?php echo $this->Form->input(__('shipping_address'), array('class' => 'form-control', 'label' => false,'div'=>false)); ?></div>
                        <div class="input text"><label for="OrderShippingCity"><?php echo __("City");?></label><?php echo $this->Form->input(__('shipping_city'), array('class' => 'form-control', 'label' => false,'div'=>false)); ?></div>
                         <div class="input text"><label for="OrderShippingState"><?php echo __("State");?></label><?php echo $this->Form->input(__('shipping_state'), array('class' => 'form-control', 'label' => false,'div'=>false)); ?></div>
                         <div class="input text"><label for="OrderShippingZip"><?php echo __("Zip");?></label><?php echo $this->Form->input(__('shipping_zip'), array('class' => 'form-control', 'label' => false,'div'=>false)); ?></div>
                </fieldset>
                </div>
                 </div>
         </div>
              <?php echo $this->Form->end(); ?>
        </div>
        <?php }   } ?>
       
</div>
    </div>
   	<div class="shopping_cart_right">
    	  <div class="orderSummary"><?php echo __("ORDER SUMMARY");?></div>
       
            <div class="shippin_checklist">
           
                <div class="shipping_wrapper">
            <div class="text_divider horz sudo_float_center text_fresh_grey2 ship_line">
                    <h5 class="fresh_caps"><?php echo __("shipping method");?></h5>
                 </div>
                    <span id="shipping_validation_error" style="display:none;color:#FF0000; text-align:center; font-family:Verdana, Arial, Helvetica, sans-serif;padding:0px 10px;"><?php echo __("Please Choice Your Shipping");?> !!!</span>
                    <div class="shipping" style="display: block;">
                        <fieldset>
                         
                        <input type="radio" value="1" class="ShippingChoice required" id="CartShippingMethod1" name="shipping_method" <?php if($shop['Order']['choice'] == 1 ){ echo "checked";}?>>
                        <label for="CartShippingMethod12"><?php echo __("RITIRO IN SEDE");?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#8364; &nbsp;00</label>
                        <br>
                        <input type="radio" value="2" class="ShippingChoice required" id="CartShippingMethod2" name="shipping_method" <?php if($shop['Order']['choice'] == 2 ){ echo "checked";}?>>
                        <label for="CartShippingMethod13"><?php  echo $this->Html->image('wpage/logo_SDA_sito.png', array("alt" => "No Image","class"=>"sdalogo" ));?> <?php echo __("2 day")?> - &#8364; &nbsp;9.00 </label>
                        </fieldset>
                    </div>
                     
                </div>
                
                <br />
            
            </div>
            
            <!-- ==================== Payment Method ====================-->
            <div class="Payment_checklist">
            <div class="Payment_wrapper">
            <div class="text_divider horz sudo_float_center text_fresh_grey2 ship_line">
                    <h5 class="fresh_caps"><?php echo __("Payment Method");?></h5>
                 </div>
                  <span id="Payment_validation_error" style="display:none;color:#FF0000; text-align:center; font-family:Verdana, Arial, Helvetica, sans-serif;padding:0px 10px;"><?php echo __("Please Choice Your Payment Method");?> !!!</span>

                    <div class="Payment" style="display: block;">
                        <fieldset>
                        <input type="radio" value="1" class="PaymentChoice required" id="CartPaymentMethod1" name="payment_method" <?php if($shop['Order']['payment_type'] == 1 ){ echo "checked";}?>>
                        <label for="CartShippingMethod12"><?php echo __("Recive From SPR");?> </label>
                        <br>
                        <input type="radio" value="2" class="PaymentChoice required" id="CartPaymentMethod2" name="payment_method" <?php if($shop['Order']['payment_type'] == 2 ){ echo "checked";}?>>
                        <label for="CartPaymentMethod13"> <?php echo __("Cash On Delivery");?>   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#8364; &nbsp;3.50  <span style="display:none" id="cashOnDeliveryVal">0</span></label>
                        <br />
                        <input type="radio" value="3" class="PaymentChoice required" id="CartPaymentMethod3" name="payment_method" <?php if($shop['Order']['payment_type'] == 3 ){ echo "checked";}?>>
                        <label for="CartShippingMethod12"><?php echo __("Bank Transfer");?> </label>
                        
                        <div class="bankTransfer" style=<?php if($shop['Order']['payment_type'] == 3 ){echo 'display:block';}else{echo 'display:none';}?>>Bonifico Bancario <br />IBAN: IT13N0343105065000000423280 <br /> MIA MD MAMUN e inviare ricevuta tramite <br />email:solutionpointroma@yahoo.it</div>
                         <br>
                        <input type="radio" value="4" class="PaymentChoice required" id="CartPaymentMethod4" name="payment_method" <?php if($shop['Order']['payment_type'] == 4 ){ echo "checked";}?>>
                        <label for="CartShippingMethod12"><?php echo __("PayPal");?>
                            &nbsp;&nbsp;&nbsp;&#8364; &nbsp;3.5% + .35  <span style="display:none" id="PaypalAmount">0</span>
                        </label>
                        <br> 
                        </fieldset>
                    </div>
                     
                </div>
                
                <br />
            
            </div>
            
        <div class="text_divider horz sudo_float_center text_fresh_grey2 ship_line">
            <h5 class="fresh_caps"><?php echo __("STATO  PAGAMENTO");?></h5>
        </div>
        
        <div class="totalItem summary"><?php echo __("Total Quantity");?>  <span>&nbsp;</><span class="quantityTotal"><?php echo $shop['Order']['quantity'];?></span></div>
        <div class="summary"><?php echo __("Subtotal");?>  <span>&#8364; &nbsp;</><span class="subTotal"><?php echo $shop['Order']['subtotal'];?></span></div>

        <div class="summary"><?php echo __("Vat");?>  <span>&#8364; &nbsp;</><span class="vat"><?php echo $total_vat = (($shop['Order']['subtotal']*22)/100);?></span></div>
        <div class="summary"><?php echo __("Shipping");?>  <span>&#8364; &nbsp;</><span class="shippingamount"><?php echo $total_shipping = $shop['Order']['shippingCost']; ?></span></div>
        <div class="summary" ><?php echo __("Cash On Delivery");?>  <span>&#8364; &nbsp;</><span class="cashondelivery"><?= $total_cash_one = ($shop['Order']['payment_type'] == 2)?$shop['Order']['payment_charge']:0; ?></span></div>
        <div class="summary"><?php echo __("Paypal Fee (3.5 % + .35)");?>  <span>&#8364; &nbsp;</><span class="paypalamount"><?= $paypal = ($shop['Order']['payment_type'] == 4)?$shop['Order']['payment_charge']:0;

                 ?></span></div>
        <div class="summary"><?php echo __("Total");?>  <span>&#8364; &nbsp;</><span class="Total">

                <?php

                echo $shop['Order']['total']+ $total_shipping+$total_vat+$paypal+$total_cash_one;

                //  +$shop['Order']['payment_charge']+$total_vat+$total_shipping+$total_cash_one;?></span></div>
        <br />
          	
            <?php  if(!empty($userid)){?><p class="t_center paypalAreaButton" style=<?php if($shop['Order']['payment_type'] == 4 ){echo 'display:block';}else{echo 'display:none';}?>>

                <?php echo $this->Html->image('wpage/btn_xpressCheckout.gif', array('id'=>"paypalsubmit","alt" => "No Image","border"=>"0",'url' => array('controller' => 'shop', 'action' => 'paypal_checkout') ));?>

            </p>
       		
            <div class="text_divider horz sudo_float_center text_fresh_grey2">
             	<h5 class="fresh_caps"></h5>
             </div>
       
	   <div class="" id="checkout_button"><?php echo __("CHECKOUT");?></div>
        
        <div class="acceptpayment">
		     <div align="center">
             	<!-- <form action="https://www.paypal.com/cgi-bin/webscr" method="post" id="paypalfrom">
                    <input type="hidden" name="cmd" value="_cart">
                    <input type="hidden" name="upload" value="1">
                    <input type="hidden" name="business" value="solustionpointroma@yahoo.com">
                    <input type="hidden" name="currency_code" value="EUR">

                   <div id="cart_paypal_content">
                   </div>

                    <input type="hidden" name="shipping" value="50.00">
                    <input type="hidden" name="shipping2" value="2.00">
                     <input type="hidden" name="tax" value="100.00">


					<input type="image" src="http://www.paypal.com/en_US/i/btn/x-click-but01.gif" name="submit"   alt="Make payments with PayPal - it's fast, free and secure!">
				</form> -->
     </div>
 			 <div class="text_divider horz sudo_float_center text_fresh_grey2">
             	<h5 class="fresh_caps">or</h5>
             </div>
             <p class="t_center">
             	<div class="" id="save_button"><?php echo __("SAVE CART");?></div>
            </p>
            <div class="clr"></div>
            <div id="need_help">
            <br />
              <h5 class="needhelp">Need Help?</h5>
              <br /> 
                 <?php  echo $this->Html->image('wpage/email_23x23.jpg', array("alt" => "No Image","class"=>"contactus_img",'url' => array('controller' => '#', 'action' => '#')));?>
                 <?php echo $this->Html->link('Contact Us!', array('controller' => '#', 'action' =>'#'),array('class'=>'contactus_link')); ?>
                    <div class="clr"></div>
                    <br /> 
            </div>
			</div>
            <?php }?>
   
    </div>
    <div class="clr"></div>
</div>

