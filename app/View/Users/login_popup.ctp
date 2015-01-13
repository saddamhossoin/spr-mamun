<?php echo $this->Html->script(array( 'module/Users/passwordstrengh')); ?>
<div class="users form">
<?php echo $this->Form->create('User',array('controller'=>'Users','action'=>'login_popup'));?>
 		<div id="WrapperUserEmail" class="microcontroll">
			<?php echo $this->Form->label('User.email_address', __('Email'.': ', true) ); ?>
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
<label id="UserCaptcha2" generated="true" class="error" style="display:none"></label>
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
<?php  echo $this->Form->button('Login',array( 'class'=>'submit', 'id'=>'btn_user_login'));?>
<?php  echo $this->Form->button('Cancel',array('type'=>'reset','name'=>'reset','id'=>'Cancel'));?>
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
<?php  echo $this->Form->button('Send Mail',array( 'class'=>'submit', 'id'=>'btn_user_ac_forget'));?>
<?php  echo $this->Form->button('Cancel',array('type'=>'reset','name'=>'reset','id'=>'Cancel'));?>
 </div>
	 
    <?php echo $this->Form->end(); ?> 
        </div>
	
 
</div>
<style type="text/css">
	.captchaimage p{
		font-size: 14px;
		}
	.clr{
		clear:both;}
	#UserLoginPopupForm #WrapperUserEmail label,#UserLoginPopupForm #WrapperUserPassword label{
		width:150px;
		float:left;}
	#UserForgetpwdForm #WrapperUserEmail label{
		width:100px;
		float:left;
		}
	#btn_user_ac_forget{
		width:95px;}
	#UserLoginPopupForm #UserEmailAddress,#UserLoginPopupForm #UserPassword,#UserCaptcha{
		float:left;
		width:190px;}
	#UserLoginPopupForm #WrapperUserEmail{
		padding-top:10px}
	#UserLoginPopupForm .microcontroll{
		height:55px !important;}
	#UserLoginPopupForm .button_area{
		 margin-bottom: 10px;
		}
	#UserLoginPopupForm #UserForgetpwdForm{
		padding-top:50px;}
	#UserLoginPopupForm .button_area button{
		width:95px;}
	.captchaimage {
    float: left;
    width: 150px;}
	
</style>
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
 
$('#btn_user_login').on('click',function(e){
			 e.preventDefault();
 		//========================== Validation Check ========
  		if( $('#UserLoginPopupForm').valid()) {
		 		var data= $('#UserLoginPopupForm').serialize();
  				//alert(data);
			//=================================//
 		 	 $.ajax({
					type: "POST",
					url:siteurl+"Users/login_popup",
					data:  data,
					success: function(response){
					 	   //alert(response);
						if(response == 1)
						{
							window.location.href = siteurl+'Users/admindashboard';
						}
						else{
							$("#UserCaptcha2").show();
							$("#UserCaptcha2").html(response);
							
						}
						}
					});
	  }
});
	
	  //================= User Sign-up Pop-Up ===============//
	 
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
