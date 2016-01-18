<?php echo $this->Html->script(array( 'module/Users/passwordstrengh')); ?>
<?php  echo $this->Html->script(array('common/form','common/jquery.validate'));   ?>
<div class="message text-error" ></div>
<div class="users form">
<?php echo $this->Form->create('User',array('controller'=>'Users','action'=>'login_popup'));?>
 		<div id="WrapperUserEmail" class="microcontroll">
			<?php echo $this->Form->label('User.email_address', __('Email'.': ', true) ); ?>
             <?php echo $this->Form->hidden('track', array('label'=>false,'div'=>false,'value'=>$track)); ?>
 			<?php echo $this->Form->input('User.email_address',array('type'=>'text','div'=>false,'label'=>false, 'size'=>35, 'class'=>'email'  ));?>
            <div id="username_feedback"></div>
  	 	</div>
		
		<div id="WrapperUserPassword" class="microcontroll">
			<?php echo $this->Form->label('User.password', __('Password'.':  ', true) ); ?>
 			<?php echo $this->Form->input('User.password',array('type'=>'password','div'=>false,'label'=>false, 'size'=>35 , 'class'=>'required'  ));?>
	  	</div>
        <div id="WrapperUserPassword" class="microcontroll">
        <div class="captchaimage">
        
        <?php echo $this->Html->image($this->Html->url(array('controller'=>'users', 'action'=>'captcha'), true),array('id'=>'img-captcha','vspace'=>2));
        echo '<p><a href="#" id="a-reload">Can\'t read? Reload</a></p>';?>
       </div>
       <div class="captchaimage2">
       <?php 
        echo $this->Form->input('User.captcha', array('autocomplete'=>'off','label'=>false,'class'=>''));
       
	  /*  if($settings['jquerylib'])  {
          echo '<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>';
        }*/
		
?>
<label id="UserCaptcha2" generated="true" class="error1" style="display:none"></label>
</div>
        <script>
        jQuery('#a-reload').click(function() {
          var $captcha = jQuery("#img-captcha");
            $captcha.attr('src', $captcha.attr('src')+'?'+Math.random());
          return false;
        });
        </script>
        </div>
	 </fieldset>
	 <div class="clr"></div>
 <div class="button_area">	  
<?php  echo $this->Form->button('Login',array( 'class'=>'submit btn btn-default btn-warning', 'id'=>'btn_user_login'));?>
<?php  echo $this->Form->button('Cancel',array('type'=>'reset','name'=>'reset','id'=>'Cancel','class'=>'btn btn-default btn-warning'));?>
 </div>
 <span id="forget_password" style="cursor:pointer;color: #1E0FBE; margin-left:100px;"> Forget Password?</span>
  <?php echo $this->Form->end(); ?> 
 
 
 <div id="forgetpass" style="display:none"> 
   <?php echo $this->Form->create('User',array('controller'=>'Users','action'=>'forgetpwd'));?>
     
	 <div id="WrapperUserEmail" class="microcontroll">
	<?php echo $this->Form->label('User.email_address', __('Email'.': ', true) ); ?>
 	<?php echo $this->Form->input('User.email_address',array('type'=>'text','div'=>false,'label'=>false, 'size'=>35, 'class'=>'required email'  ));?>
        <div id="username_feedback"></div>
  	 </div>
	 
	 <div class="clr"></div>
	 <div class="button_area">	  
<?php  echo $this->Form->button('Send Mail',array( 'class'=>'submit btn btn-default btn-warning', 'id'=>'btn_user_ac_forget'));?>
<?php  echo $this->Form->button('Cancel',array('type'=>'reset','name'=>'reset','id'=>'Cancel','class'=>'btn btn-default btn-warning'));?>
 </div>
	 
    <?php echo $this->Form->end(); ?> 
        </div>
	
 
</div>

<script type="text/javascript" language="javascript">
jQuery(function($){ 
jQuery("#UserUserRegistrationForm").validate({
		rules: {
 			"data[User][password]": {
			required: true,
			minlength: 6},
	 	"data[User][captcha]": {
			required: true,
			minlength: 5
			}
		 
		}
	});
 
//================= User Sign-up Pop-Up ===============//
$('#btn_user_login').on('click',function(e){
	e.preventDefault();
	//========================== Validation Check ========
  	if( $('#UserLoginPopupForm').valid()) {
		var data= $('#UserLoginPopupForm').serialize();
		
	//=================================//
	$.ajax({
			type: "POST",
			url:siteurl+"Users/login_popup",
			data:  data,
			success: function(response){

				if(response == 1)
				{
					window.location.href = siteurl+'shop/cart';
				}
				 else if(response == 2 ){
 				  window.location.href = siteurl+"ServiceServices/brand";
 			 	}
				else if(response == 3){
					$('.message').html("Invalid username or password, try again");
				}
				else if(response == 4){
					$("#UserCaptcha2").show();
					$("#UserCaptcha2").html("Invalid code !!!");
					
				}
				}
			});
	  }
});
			
	 
	$("#forget_password").on('click',function(e){
	 		$("#forgetpass").show();
			$("#UserLoginPopupForm").remove();
	});
//================= End User Sign-up Pop-Up ===============//
	$('#btn_user_ac_forget').on('click',function(e){
			 e.preventDefault();
 		//========================== Validation Check ========
  		if( $('#UserForgetpwdForm').valid()) {
		 		var data= $('#UserForgetpwdForm').serialize();
  				//alert(data);
			//=================================//
 		 	 $.ajax({
					type: "POST",
					url:siteurl+"Users/forgetpwd",
					data:  data,
					success: function(response){
					  //alert(response);
					if(response == 1){
						alert("Please Check your mail Address. For reser password link");
						 window.location.href = siteurl;
					} 
					
					if(response == 0){
						alert("Email does Not Exist");
						 window.location.href = siteurl;
					} 
					 
					//$('.ajax_status').hide(); 
					//$('.ajax-save-message').hide().html(response).fadeIn(); 
					//$('#Cancel').click();
					// window.location.reload(true);
			 			}
					});
	  }
});
	
	 	
 	

});
 
</script>
<style type="text/css">
.ui-widget-content {
    background: none repeat scroll 0 0 #fff;
    border: 1px solid #f8a51b;
    color: #333;
}
.captchaimage p{
	font-size: 14px;
}
.clr{
	clear:both;
}
#UserLoginPopupForm #WrapperUserEmail label,#UserLoginPopupForm #WrapperUserPassword label{
	width:147px;
	float:left;
}
#UserForgetpwdForm #WrapperUserEmail label{
	width:100px;
	float:left;
}
#btn_user_ac_forget{
	width:95px;
}
#UserLoginPopupForm #UserEmailAddress,#UserLoginPopupForm #UserPassword,#UserCaptcha{
	float:left;
	width:190px;
}
#UserLoginPopupForm #WrapperUserEmail{
	padding-top:10px;
}
#UserLoginPopupForm .microcontroll{
	height:55px !important;
}
#UserLoginPopupForm .button_area , #forgetpass .button_area{
	 margin:10px auto !important;
	 text-align:center;
 }
#UserLoginPopupForm #UserForgetpwdForm{
	padding-top:50px;
}
#UserLoginPopupForm .button_area button ,  #forgetpass .button_area button{
	width:95px;
	margin-right:5px;
}
.captchaimage {
 float: left;
 width: 150px;
}
.error{
	border:1px solid #FF0000;
}
label.error1{
	color:red;
}
label.error{
	display:none !important;
}
#UserCaptcha{
	 margin-left: 10px;
    margin-top: 12px;
    width: 180px;
}
</style>
