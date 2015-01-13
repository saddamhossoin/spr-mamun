<?php //pr($order_info);?>
<?php echo $this->Html->script(array('alert/alert')); ?>
<?php echo $this->Html->css(array('alert/css/alert','alert/themes/default/theme')); ?>
<?php echo $this->Html->css(array('wpage/spr/wpage'));?>
<?php  echo $this->Html->script(array('common/form','module/Shop/checkout'));  ?>
<?php echo $this->Html->script(array('module/Shop/shop_address.js')); ?>
<div class="whole_checkout_div">
     <?php 
	 $userid = $this->Session->read('Auth.User.id');
	 $user_info = $this->Session->read('Auth.User');
	 //pr($user_info);
	 if(empty($userid)){?>
    <div class="login_div_checkout">
    
                <div class="col" id="address_name">
                    <div class="left_div_addrees">
                    
                    <?php echo $this->Form->create('User',array('id' => 'checkout_login'));?>
                     
                    <h2 class="sd-txtB">Sign in</h2>
                    <?php echo $this->Form->input('User.email_address', array('class' => 'form-control')); ?>
                    <br />
                    <?php echo $this->Form->input('User.password', array('class' => 'form-control')); ?>
                    <br />
                    <div><span class="sd-sv">Forgot your <a href="" style="color:#0654ba; text-decoration:underline">password</a>?</span></div>
                    <br/>
                    
                    <div class="sd-km">
                    <b class="sd-pcs">
                    <input type="checkbox" checked="checked" id="signed_in" value="1" name="keepMeSignInOption">
                    </b><span class="sd-pcsm">
                    <label for="signed_in">Stay signed in</label>
                    </span>
                    
                    </div>
                    <br/>
                    <?php echo $this->Form->button('Sign in', array('class' => 'btn btn-default btn-primary','id'=>'signin_btn'));?>
                    <?php echo $this->Form->end(); ?>
                    <br/>
                    
                    </div>
                
                <br />
                </div>
    </div>
        
    <div class="login_info_div">
                 <div class="col" id="address_name">
                     <div class="right_div_address" id="register_div">
                        <h2 class="sd-txtA">New to SPR?</h2>
                        <br />
                        <div class="sd-rts">Get started now. It's fast and easy!</div>
                        <br />
                        <?php //echo $this->Form->button('Register', array('class' => 'btn btn-default btn-primary','id'=>'register_btn'));?>
                        <?php  echo $this->Html->link("Register", array('controller' => 'Shop','action'=> 'address'), array( 'class' => 'btn btn-default btn-primary'));?>
                        
                    </div>
                        <br />
                </div>
     </div>
     <?php }else{?>
       <?php if(empty($order_info)) {?>
         <div class="login_info_div">
             <?php echo $this->Form->create('Order'); ?>
   			 <div class="row" style="display:block">
                    <div class="col" id="address_name">
                    <div class="left_div_addrees" id="checkout_div_left">
                    <?php echo $this->Form->input('first_name', array('class' => 'form-control','value'=>$user_info['firstname'])); ?>
                    <br />
                    <?php echo $this->Form->input('last_name', array('class' => 'form-control','value'=>$user_info['lastname'])); ?>
                    <br />
                    </div>
                    <div class="right_div_address">
                    <?php echo $this->Form->input('email', array('class' => 'form-control','value'=>$user_info['email_address'])); ?>
                    <br />
                    <?php echo $this->Form->input('phone', array('class' => 'form-control','value'=>$user_info['phone'])); ?>
                    <br />
                    </div>
                    <br />
                    
                    </div>
                    <div class="col col-sm-4">
                    
                    <?php echo $this->Form->input('billing_address', array('class' => 'form-control')); ?>
                    <br />
                    <?php echo $this->Form->input('billing_address2', array('class' => 'form-control')); ?>
                    <br />
                    <?php echo $this->Form->input('billing_city', array('class' => 'form-control')); ?>
                    <br />
                    <?php echo $this->Form->input('billing_state', array('class' => 'form-control')); ?>
                    <br />
                    <?php echo $this->Form->input('billing_zip', array('class' => 'form-control')); ?>
                    <br />
                    <?php echo $this->Form->input('billing_country', array('class' => 'form-control')); ?>
                    <br />
                    <br />
                    
                    <?php echo $this->Form->input('sameaddress', array('type' => 'checkbox', 'label' => 'Copy Billing Address to Shipping')); ?>
                    
                    </div>
                        <div class="col col-sm-4">
                        
                        <?php echo $this->Form->input('shipping_address', array('class' => 'form-control')); ?>
                        <br />
                        <?php echo $this->Form->input('shipping_address2', array('class' => 'form-control')); ?>
                        <br />
                        <?php echo $this->Form->input('shipping_city', array('class' => 'form-control')); ?>
                        <br />
                        <?php echo $this->Form->input('shipping_state', array('class' => 'form-control')); ?>
                        <br />
                        <?php echo $this->Form->input('shipping_zip', array('class' => 'form-control')); ?>
                        <br />
                        <?php echo $this->Form->input('shipping_country', array('class' => 'form-control')); ?>
                        <br />
                        <br />
                        
                        </div>
        </div>
             <?php echo $this->Form->button('Continue', array('class' => 'btn btn-default btn-primary'));?>
             <?php echo $this->Form->end(); ?>

       </div>
       <?php } else {?>
        
        <div class="login_info_div">
             <?php echo $this->Form->create('Order'); ?>
   			 <div class="row" style="display:block">
                    <div class="col" id="address_name">
                    <div class="left_div_addrees" id="checkout_div_left">
                    <?php echo $this->Form->input('first_name', array('class' => 'form-control','value'=>$order_info['Order']['first_name'])); ?>
                    <br />
                    <?php echo $this->Form->input('last_name', array('class' => 'form-control','value'=>$order_info['Order']['last_name'])); ?>
                    <br />
                    </div>
                    <div class="right_div_address">
                    <?php echo $this->Form->input('email', array('class' => 'form-control','value'=>$order_info['Order']['email'])); ?>
                    <br />
                    <?php echo $this->Form->input('phone', array('class' => 'form-control','value'=>$order_info['Order']['phone'])); ?>
                    <br />
                    </div>
                    <br />
                    
                    </div>
                    <div class="col col-sm-4">
                    
                    <?php echo $this->Form->input('billing_address', array('class' => 'form-control','value'=>$order_info['Order']['billing_address'])); ?>
                    <br />
                    <?php echo $this->Form->input('billing_address2', array('class' => 'form-control','value'=>$order_info['Order']['billing_address2'])); ?>
                    <br />
                    <?php echo $this->Form->input('billing_city', array('class' => 'form-control','value'=>$order_info['Order']['billing_city'])); ?>
                    <br />
                    <?php echo $this->Form->input('billing_state', array('class' => 'form-control','value'=>$order_info['Order']['billing_state'])); ?>
                    <br />
                    <?php echo $this->Form->input('billing_zip', array('class' => 'form-control','value'=>$order_info['Order']['billing_zip'])); ?>
                    <br />
                    <?php echo $this->Form->input('billing_country', array('class' => 'form-control','value'=>$order_info['Order']['billing_country'])); ?>
                    <br />
                    <br />
                    
                    <?php echo $this->Form->input('sameaddress', array('type' => 'checkbox', 'label' => 'Copy Billing Address to Shipping')); ?>
                    
                    </div>
                        <div class="col col-sm-4">
                        
                        <?php echo $this->Form->input('shipping_address', array('class' => 'form-control','value'=>$order_info['Order']['shipping_address'])); ?>
                        <br />
                        <?php echo $this->Form->input('shipping_address2', array('class' => 'form-control','value'=>$order_info['Order']['shipping_address2'])); ?>
                        <br />
                        <?php echo $this->Form->input('shipping_city', array('class' => 'form-control','value'=>$order_info['Order']['shipping_city'])); ?>
                        <br />
                        <?php echo $this->Form->input('shipping_state', array('class' => 'form-control','value'=>$order_info['Order']['shipping_state'])); ?>
                        <br />
                        <?php echo $this->Form->input('shipping_zip', array('class' => 'form-control','value'=>$order_info['Order']['shipping_zip'])); ?>
                        <br />
                        <?php echo $this->Form->input('shipping_country', array('class' => 'form-control','value'=>$order_info['Order']['shipping_country'])); ?>
                        <br />
                        <br />
                        
                        </div>
        </div>
             <?php echo $this->Form->button('Continue', array('class' => 'btn btn-default btn-primary'));?>
             <?php echo $this->Form->end(); ?>

       </div>
       <?php }
	   ?>
       
       
       
       
       <?php } ?>
       
</div>




<style>
#checkout_div_left{
	float:left;
	width:203px !important;
	margin-left:0px !important;
	}
.right_div_address{
	float:left;
	width:43%;
	margin-left:26px;
	
	}

#register_btn{
	margin-left:88px !important;
	}
#register_div{
	height:200px;
	width:265px;
	margin-left:75px !important;
	}
.sd-rts {
	text-align:center;
}
.sd-txtB {
    color: #333;
    font-size: 20px;
    font-weight: bold;
    padding-bottom: 12px;
}

.sd-txtA {
    color: #333;
    font-size: 20px;
    font-weight: bold;
    padding-bottom: 12px;
	text-align:center;
}
.left_div_addrees{
	width:265px !important;
	margin-left:65px !important;
	}
.login_div_checkout{
    background: none repeat scroll 0 0 #fff;
    border-radius: 3px;
    _box-shadow: 4px 4px 1px #eee;
	box-shadow:0 0 0 3px #eee;
    padding: 22px;
	
}
	
.login_div_checkout{
	height:265px;
	width:450px;
	}
.login_info_div{
	height:auto;
	display:inline-block;
	width:450px;
	margin-top:15px;
	background: none repeat scroll 0 0 #fff;
    border-radius: 3px;
    _box-shadow: 4px 4px 1px #eee;
	box-shadow:0 0 0 3px #eee;
    padding: 22px;
	}
.whole_checkout_div{
	height:610px;
	width:498px;
	}
.form-control{
	_height:25px !important;
	}
	
</style>