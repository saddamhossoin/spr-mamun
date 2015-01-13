<?php  $this->set('page_titles', 'Address'); ?>

<?php  echo $this->Html->script(array('common/form','common/jquery.validate'));  ?>
<?php echo $this->Html->script(array('alert/alert')); ?>
<?php echo $this->Html->css(array('alert/css/alert','alert/themes/default/theme')); ?>
<?php echo $this->Html->css(array('wpage/spr/wpage'));?>
<?php echo $this->Html->script(array('module/Shop/shop_address.js')); ?>
<?php echo $this->Form->create('Order'); ?>
<?php //echo $this->Form->input('id');?>

<hr>

<?php 
	 $userid = $this->Session->read('Auth.User.id');
	 $user_info = $this->Session->read('Auth.User');
	  if(empty($userid)){?>
         <div class="row">
<div class="col" id="address_name">
<div class="left_div_addrees">
<?php echo $this->Form->input('first_name', array('label'=>'Full Name','class' => 'form-control')); ?>
<br />
<?php echo $this->Form->input('password', array('class' => 'form-control')); ?>
<br />
</div>
<div class="right_div_address">
<?php echo $this->Form->input('email', array('class' => 'form-control')); ?>
<span id="username_feedback"></span>
<br />
<?php echo $this->Form->input('phone', array('class' => 'form-control')); ?>
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
 <?php } else{?>
 
  <div class="row">
<div class="col" id="address_name">
<div class="left_div_addrees">
<?php echo $this->Form->input('first_name', array('label'=>'Full Name','class' => 'form-control','value'=>$user_info['firstname'])); ?>
<br />
<?php echo $this->Form->input('last_name', array('class' => 'form-control','value'=>$user_info['lastname'])); ?>
<br />
</div>
<div class="right_div_address">
<?php echo $this->Form->input('email', array('class' => 'form-control','value'=>$user_info['email_address'])); ?>
<span id="username_feedback"></span>
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
 
 <?php }
 ?>
<br />

<?php echo $this->Form->button('Continue', array('class' => 'btn btn-default btn-primary'));?>
<?php echo $this->Form->end(); ?>

<script>
$('#OrderEmail').focus(function(){
             $('#username_feedback').hide();
			 
       });
$('#OrderEmail').blur(function(){
			//var eaddress = $('#EmailAddressBody').val();
			
           $.get(siteurl+ 'users/checkusername/'+$('#OrderEmail').val(),function(result){
    
		 //alert(result);
		   if(result == 1){
		   $('#username_feedback').html("<span class='choose_strength_3'>Choose a Email Address</span>") ;
		   }
		  else if(result ==2){
			  $('#username_feedback').html("<span class='password_strength_3'>Too Short Email Address!</span>") ;
		  }
		  else if(result ==3){
			  $('#username_feedback').html("<span class='password_strength_11'>Someone already has that Email. Try another?</span>") ;
			   $('#EmailAddressBody').val('');
		  }
		
		  else if(result ==4){
			  $('#username_feedback').html("<span class='currectUserName'></span><span id='userpa'></span>") ;
		  }
		  $('#username_feedback').fadeIn();
			   }); 
    }); 
	
	 jQuery("#OrderAddressForm").validate({
		  rules: {
			"data[User][address]": {
		   required: true,
		   minlength: 15
		  },
		 
		   "data[Order][password]": {
			  required: true,
		      minlength: 8}
		  
		  }
  });
	
</script>

<style>
.left_div_addrees{
	height:115px;
	}
label.error{
	color:#F00;
	font-size:11px;
	}
.ajax_status {
	display: none;
}

.choose_strength_3,.currectUserName{
	color: #036A0D;
}

.ajax_error {
	color: #FF0000;
}

#userpa{
	color:#003300;
	}
.password_strength_3,.password_strength_11{
	color: #FF0000;
	}

</style>
