<?php echo $this->set('title_for_layout', 'Shopping Cart'); ?>
<?php echo $this->Html->script(array('module/Shop/cart')); ?>
<?php echo $this->Html->css(array('ui-10/jquery-ui-1.10.4.custom.min')); ?>
<?php  echo $this->Html->script(array('common/form','common/jquery.validate'));  ?>

<?php echo $this->Html->css(array('module/Shop/cart')); 
 //pr($shop);
 ?> 
<div class="shopping_cart"> 
 	<div class="shopping_cart_left"> 
    	<h3>READY TO CHECKOUT?</h3>
        <div style="margin-top: 10px; height: 45px;">
			<div id="logged_in"></div>
 		</div>
           <table class="cart_grid">
            <thead>
              <tr>
                <th align="left" width="12%">IMAGE</th>
                <th align="left" width="38%">PRODUCT</th>
                <th class="quantity" width="10%">PRICE</th>
                <th class="quantity" width="20%">QUANTITY</th>
                <th class="totalas" width="10%">TOTAL</th>
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
                     <?php 
					 //pr($item);
					 echo $item ['price'];?> 
					</td>
                    <td class="v_middle t_center">
                        <input type="hidden" id="PosProductId" value="<?php echo $item['PosProduct']['id']?>" name="data[PosProduct][id]">
                        <input type="button" field="quandtity" id="btnqtyminus_<?php echo $item['PosProduct']['id']?>" class="qtyminus" value="-">
                        <input type="text" class="qty" id="qtyplus_<?php echo $item['PosProduct']['id']?>" value="<?php echo $item['quantity'];?>" name="quantity">
                        <input type="button" field="quantity" id="btnqtyplus_<?php echo $item['PosProduct']['id']?>" class="qtyplus" value="+">
                     </td> 
                    <td id="itemtotal_<?php echo $item['PosProduct']['id']?>" class="itemtotalprice">
                    	<?php echo $item['quantity'] *  $item['price']; ?>
                    
                     </td>
                      <td class="itemremove">
                    	<span class="itemremove_<?php echo $item['PosProduct']['id']?> remove" id="<?php echo $item['PosProduct']['id']?>">&nbsp;REMOVE</span>
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
						<p class=""> Sign in to your account to use a saved address, and continue checkout.</p>
					</div>
                        <br />
                        <?php  echo $this->Form->button('Login', array('class' => 'btn btn-default btn-warning','id'=>'register_popup'));?>
                         <br />
                        <h2 class="sd-txtA">New to SPR?</h2>
                       	 Account Benefits

                        View Order History
                        Track your service status
 
                        <br />
                       
                        <?php  echo $this->Form->button('Register', array('class' => 'btn btn-default btn-warning','id'=>'register_btn'));?>
                     </div>
                        <br />
                </div>
     </div>
    	 <?php }else{?>
       	 <?php  if(empty($order_info)) {?>
         
         <div class="login_info_div"> 
            
            
             <?php echo $this->Form->create('Order'); ?>
   			 <div class="row" style="display:block">
                <div class="col" id="address_name">
                <div class="left_div_addrees" id="checkout_div_left">
                    <?php echo $this->Form->hidden('User.id', array('class' => 'form-control','value'=>$user_info['id'])); ?>
                     <?php echo $this->Form->input('first_name', array('class' => 'form-control','value'=>$user_info['firstname'])); ?>
                    <?php echo $this->Form->input('last_name', array('class' => 'form-control','value'=>$user_info['lastname'])); ?>
                
                	<fieldset class="left_address">
                    <legend> Billing Address</legend>
                     <?php echo $this->Form->input('billing_address', array('class' => 'form-control')); ?>
                     <?php echo $this->Form->input('billing_address2', array('class' => 'form-control')); ?>
                     <?php echo $this->Form->input('billing_city', array('class' => 'form-control')); ?>
                     <?php echo $this->Form->input('billing_state', array('class' => 'form-control')); ?>
                     <?php echo $this->Form->input('billing_zip', array('class' => 'form-control')); ?>
                     <?php echo $this->Form->input('billing_country', array('class' => 'form-control')); ?>
                      <?php echo $this->Form->input('billing_tex_code', array('class' => 'form-control')); ?>
                       <?php echo $this->Form->input('billing_vat', array('class' => 'form-control')); ?>
                     <?php echo $this->Form->input('sameaddress', array('type' => 'checkbox', 'label' => 'Copy Billing Address to Shipping')); ?>
                    </fieldset>
                </div>
                <div class="right_div_address">
                <?php echo $this->Form->input('email', array('class' => 'form-control','value'=>$user_info['email_address'])); ?>
                 <?php echo $this->Form->input('phone', array('class' => 'form-control','value'=>$user_info['phone'])); ?>
               
               <fieldset class="left_address">
                    <legend> Shipping Address</legend>
                      <?php echo $this->Form->input('shipping_address', array('class' => 'form-control' ,'label'=>'Address')); ?>
                        <?php echo $this->Form->input('shipping_address2', array('class' => 'form-control' ,'label'=>'Address 2')); ?>
                        <?php echo $this->Form->input('shipping_city', array('class' => 'form-control')); ?>
                        <?php echo $this->Form->input('shipping_state', array('class' => 'form-control')); ?>
                        <?php echo $this->Form->input('shipping_zip', array('class' => 'form-control')); ?>
                        <?php echo $this->Form->input('shipping_country', array('class' => 'form-control')); ?>
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
    	<div class="orderSummary">ORDER SUMMARY</div>
        
        <div class="totalItem summary">Total Quantity  <span>&nbsp;</><span class="quantityTotal"><?php echo $shop['Order']['quantity'];?></span></div>
        <div class="summary">Subtotal  <span>&#8364; &nbsp;</><span class="subTotal"><?php echo $shop['Order']['subtotal'];?></span></div>
        <div class="summary">Shipping  <span>&#8364; &nbsp;</><span class="shippingamount"><?php echo $shop['Order']['shippingCost']; ?></span></div>
        <div class="summary" >Cash On Delivery  <span>&#8364; &nbsp;</><span class="cashondelivery"><?php  echo $shop['Order']['payment_charge']; ?></span></div>
        <div class="summary">Total  <span>&#8364; &nbsp;</><span class="Total"><?php echo $shop['Order']['total']+$shop['Order']['shippingCost']+$shop['Order']['payment_charge'];?></span></div>
       
            <div class="shippin_checklist">
           
                <div class="shipping_wrapper">
            <div class="text_divider horz sudo_float_center text_fresh_grey2 ship_line">
                    <h5 class="fresh_caps">shipping method</h5>
                 </div>
                    <span id="shipping_validation_error" style="display:none;color:#FF0000; text-align:center; font-family:Verdana, Arial, Helvetica, sans-serif;padding:0px 10px;">Please Choice Your Shipping !!!</span>
                    <div class="shipping" style="display: block;">
                        <fieldset>
                         
                        <input type="radio" value="1" class="ShippingChoice required" id="CartShippingMethod1" name="shipping_method" <?php if($shop['Order']['choice'] == 1 ){ echo "checked";}?>>
                        <label for="CartShippingMethod12">Recive From SPR &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#8364; &nbsp;00</label>
                        <br>
                        <input type="radio" value="2" class="ShippingChoice required" id="CartShippingMethod2" name="shipping_method" <?php if($shop['Order']['choice'] == 2 ){ echo "checked";}?>>
                        <label for="CartShippingMethod13"><?php  echo $this->Html->image('wpage/logo_SDA_sito.png', array("alt" => "No Image","class"=>"sdalogo" ));?> 2 day - &#8364; &nbsp;9.00 </label>
                        </fieldset>
                    </div>
                     
                </div>
                
                <br />
            
            </div>
            
            <!-- ==================== Payment Method ====================-->
            <div class="Payment_checklist">
            <div class="Payment_wrapper">
            <div class="text_divider horz sudo_float_center text_fresh_grey2 ship_line">
                    <h5 class="fresh_caps">Payment Method</h5>
                 </div>
                  <span id="Payment_validation_error" style="display:none;color:#FF0000; text-align:center; font-family:Verdana, Arial, Helvetica, sans-serif;padding:0px 10px;">Please Choice Your Payment Method !!!</span>

                    <div class="Payment" style="display: block;">
                        <fieldset>
                        <input type="radio" value="1" class="PaymentChoice required" id="CartPaymentMethod1" name="payment_method" <?php if($shop['Order']['payment_type'] == 1 ){ echo "checked";}?>>
                        <label for="CartShippingMethod12">Recive From SPR </label>
                        <br>
                        <input type="radio" value="2" class="PaymentChoice required" id="CartPaymentMethod2" name="payment_method" <?php if($shop['Order']['payment_type'] == 2 ){ echo "checked";}?>>
                        <label for="CartPaymentMethod13"> Cash On Delivery   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#8364; &nbsp;3.50  <span style="display:none" id="cashOnDeliveryVal">0</span></label>
                        <br />
                        <input type="radio" value="3" class="PaymentChoice required" id="CartPaymentMethod3" name="payment_method" <?php if($shop['Order']['payment_type'] == 3 ){ echo "checked";}?>>
                        <label for="CartShippingMethod12">Bank Transfer </label>
                        <br>
                        <input type="radio" value="4" class="PaymentChoice required" id="CartPaymentMethod4" name="payment_method" <?php if($shop['Order']['payment_type'] == 4 ){ echo "checked";}?>>
                        <label for="CartShippingMethod12">Post Pay</label>
                        <br>
                        </fieldset>
                    </div>
                     
                </div>
                
                <br />
            
            </div>
         
       <?php  if(!empty($userid)){?> 
		<div class="" id="checkout_button">CHECKOUT</div>
        
        <div class="acceptpayment">
			 <p class="t_center">
             	<?php   //echo $this->Html->image('wpage/accepted_payment_cards.jpg', array("alt" => "No Image","border"=>"0" ));?>
             </p>
 			 <div class="text_divider horz sudo_float_center text_fresh_grey2">
             	<h5 class="fresh_caps">or</h5>
             </div>
             <p class="t_center">
             	<div class="" id="save_button">SAVE CART</div>
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

<?php  
 //echo $this->Html->script(array('wpage/jquery.anythingzoomer.min')); ?>
<script type="text/javascript"> 
/* 
jQuery(function($){ 

 $('body').on('click', function (e) {
/*======================= Zoomer ========================  
 	$('.az-overly').hide();
	$('.az-small').show();
	 
	 $('.add').each(function () {
        //the 'is' for buttons that trigger popups
        //the 'has' for icons within a button that triggers a popup
        if (!$(this).is(e.target) && $(this).has(e.target).length === 0 && $('.popover').has(e.target).length === 0) {
            $(this).popover('hide');
        }
    });
  });
/*======================= Zoomer ======================== 
		$(".zoom").anythingZoomer({
			overlay : true,
			edit: true,
			// If you need to make the left top corner be at exactly 0,0, adjust the offset values below
			offsetX : 0,
			offsetY : 0
		});
 		$('.president')
		.bind('click', function(){
			return false;
		})
		.bind('mouseover click', function(){
 			var loc = $(this).attr('rel');
			if (loc && loc.indexOf(',') > 0) {
				loc = loc.split(',');
				$('.zoom').anythingZoomer( loc[0], loc[1] );
			}
			return false;
		});
});*/
</script>

