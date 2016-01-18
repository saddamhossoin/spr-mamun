<?php echo $this->Html->script(array('module/Users/login','common/form','common/jquery.validate')); ?>
<?php echo $this->Html->css(array('module/Users/login')); ?>

<div class="container">
  <div class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2" style="margin-top:50px;" id="loginbox">
    <div class="panel panel-warning">
      <div class="panel-heading">
        <div class="panel-title">Sign In</div>
        <div style="float:right; font-size: 16px; position: relative; top:-25px;font-weight: bold;"><?php echo $this->Html->link(__('Forgot password?'), array('controller'=>'users','action' => 'forgetpwd'));?></div>
      </div>
      <div class="panel-body" style="padding-top:30px">
        <?php echo $this->Session->flash(); ?> 
        <div style="clear:both"></div>
 	    <?php echo $this->Form->create('User',array('controller'=>'users','action'=>'login'));?>
           <div class="input-group" style="margin-bottom: 25px">
            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <?php echo $this->Form->input('User.email_address',array('type'=>'text','placeholder'=>'username or email','div'=>false,'label'=>false, 'size'=>35, 'class'=>'required email form-control' ));?>
           </div>
          <div class="input-group" style="margin-bottom: 25px"> <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
           <?php echo $this->Form->input('User.password',array('type'=>'password','placeholder'=>'password','div'=>false,'label'=>false, 'size'=>35, 'class'=>'required form-control' ));?> 
           </div>
          <div class="input-group">
            <div class="checkbox">
              <label>
              <?php echo  $this->Form->input('auto_login', array('type' => 'checkbox', 'label' => false,'div'=>false));?> <?php echo  __('Remember me (Keep me logged in for 1 weeks unless I log out)?'); ?> 
               Remember me </label>
            </div>
          </div>
          <div class="form-group" style="margin-top:10px">
            <!-- Button -->
            <div class="col-sm-12 controls">   <?php  echo $this->Form->button('Login',array( 'class'=>'btn btn-warning ui-state-default ui-corner-all float-right ui-button', 'id'=>'btn_user_login'));?>   <a class="btn btn-primary" href="#" id="btn-fblogin" style="display:none">Login with Facebook</a> </div>
          </div>
          <div class="form-group">
            <div class="col-md-12 control">
              <div style="border-top: 1px solid#888; padding-top:20px; margin-top: 25px; font-size:85%"> Don't have an account! <a  style="font-size: 16px; font-weight: bold;" onclick="$('#loginbox').hide(); $('#signupbox').show()" href="#"> Sign Up </a> </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <div class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2" style="margin-top: 50px; display: none;" id="signupbox">
    <div class="panel panel-info">
      <div class="panel-heading">
        <div class="panel-title">Sign Up</div>
        <div style="float:right; font-size: 85%; position: relative; top:-10px"><a onclick="$('#signupbox').hide(); $('#loginbox').show()" href="#" id="signinlink">Sign In</a></div>
      </div>
      <div class="panel-body">
        <form role="form" class="form-horizontal" id="signupform">
          <div class="alert alert-success" style="display:none" id="signupalert">
            <p>Success:</p>
            <span></span> </div>
          <div class="form-group">
            <label class="col-md-3 control-label" for="email">Cognome</label>
            <div class="col-md-9">
              <?php echo $this->Form->input('firstname', array('label'=>false,'class' => 'form-control')); ?>
            <?php echo $this->Form->hidden('track', array('label'=>false,'div'=>false,'value'=>'signup')); ?>
            
            </div>
          </div>
            <div class="form-group">
                <label class="col-md-3 control-label" for="email">Nome</label>
                <div class="col-md-9">
                    <?php echo $this->Form->input('lastname', array('label'=>false,'class' => 'required form-control')); ?>
                </div>
            </div>
          <div class="form-group">
            <label class="col-md-3 control-label" for="email">Mobile</label>
            <div class="col-md-9">
            
				<?php echo $this->Form->input('phone', array('label'=>false,'class' => 'required form-control')); ?>
            
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label" for="email">Email</label>
            <div class="col-md-9">
              <?php echo $this->Form->input('email_address', array('label'=>false,'class' => 'form-control','id'=>'EmailAddressBody')); ?>
            
            </div>
            <span id="username_feedback"></span>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label" for="email">Language</label>
            <div class="col-md-9">
              <?php echo $this->Form->select('language',  array('eng'=>'ENGLISH','ita'=>'ITALIANO'), array('label'=>false,  'empty'=>'-- Please Select Language --', 'class'=>'required form-control'));?>
            
            </div>
          </div>
           
            
          <div class="form-group">
            <label class="col-md-3 control-label" for="lastname">Password</label>
            <div class="col-md-9">
              <?php echo $this->Form->input('password', array('label'=>false,'class' => 'form-control','id'=>'userpasswordreg')); ?>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label" for="password">Confirm Password</label>
            <div class="col-md-9">
               <?php echo $this->Form->input('confirmpassword', array('label'=>false,'class' => 'form-control','type'=>'password')); ?>
            <?php echo $this->Form->input('Group.group_id',array('type'=>'hidden','value'=>3,'div'=>false,'label'=>false,'class'=>'required'));?> 
            </div>
          </div>
          
           <div id="WrapperUsersolve" class="microcontroll">
            <div class="captchaimage">
               <?php echo $this->Html->image($this->Html->url(array('controller'=>'users', 'action'=>'captcha'), true),array('id'=>'img-captcha','vspace'=>2));
                echo '<p><a href="#" id="a-reload">Can\'t read? Reload</a></p>';?>
           </div> 
           <?php echo $this->Form->input('User.captcha', array('autocomplete'=>'off','label'=>false,'class' => 'form-control'));		
            /*if($settings['jquerylib']){
              echo '<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>';
            }*/?>
            <script>
            jQuery('#a-reload').click(function() {
              var $captcha = jQuery("#img-captcha");
                $captcha.attr('src', $captcha.attr('src')+'?'+Math.random());
              return false;
            });
            </script>
        </div>
           
          <div class="form-group">
            <!-- Button -->
            <div class="col-md-offset-3 col-md-9">
              <button class="btn btn-warning" type="button" id="btn-signup"><i class="icon-hand-right"></i> &nbsp; Sign Up</button>
              <span style="margin-left:8px;"></span> </div>
          </div>
          <div class="form-group" style="border-top: 1px solid #999; padding-top:20px">
             
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<style>
#UserCaptcha{
		display: inline;
		margin-left: 11px;
		height:29px !important;
		width: 171px !important;
	}
	.captchaimage p{
		font-size: 14px;
	}
	.captchaimage {
		float: left;
		width: 150px;
	}
	.control-label{
		width:170px;
	}
	.col-md-9{
			width:67%;
	}
	#signupform label.error{
		position:relative;
		border:none !important;
	}
	#username_feedback{
		color:red;
		margin-left:184px;
	}
</style>
<script type="text/javascript">
 jQuery(function($){ 
    $('#btn-signup').click(function(e){
	 	 e.preventDefault();
  		//========================== Validation Check ========
  		if( $('#signupform').valid() ) 
 		{
            $("#cover").fadeIn();
 		  var data= $('#signupform').serialize()  ;
		  var fullname = $("#UserFirstname").val();
  	//=================================//
		$.ajax({
			type: "POST",
			url:siteurl+"Users/user_registration",
			data:  data, 
			success: function(response){
   			 if(response == 3 ){

				 $("#signupalert span").html("You sign up successfully. Now you redirect in your dashboard");
				  sleep(300);
                 $("#cover").fadeOut();
				// $.alert.open('success', "You sign up successfully.");
 				  window.location.href = siteurl+"users/userdashboard";
 			 }
			 else{
 					 $.alert.open('warning', response);
 			 	}
 				 
			 }
			
			});
 		}
 	});
	   
	  
	
   
    $('#EmailAddressBody').focus(function(){
             $('#username_feedback').hide();
			 
       });

    $('#EmailAddressBody').blur(function(){
			//var eaddress = $('#EmailAddressBody').val();
			
           $.get(siteurl+ 'users/checkusername/'+$('#EmailAddressBody').val(),function(result){
    
		// alert(result);
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

      
	  
	     jQuery("#UserUserRegistrationForm").validate({
		  rules: {
			"data[User][address]": {
		   required: true,
		   minlength: 15
		  },
		   "data[User][confirmpassword]": {
			  equalTo: "#userpasswordreg"},
		  
		   
		  "data[User][password]": {
			  required: true,
		   minlength: 8}
		  
		  }
  });
		
		
		
		/*if($("#userpasswordreg").val() == ($("#UserConfirmpassword").val())){
					$("#UserUserRegistrationForm").submit();
		}
		else
		{
		$('#newpasswordId').html('<font color="red">Your password does not match</font>');
			$("#userpasswordreg").val('');
			$("#UserConfirmpassword").val('');
			$('#userpasswordreg').css("border", "#FF0000 solid 1px")
			$('#UserConfirmpassword').css("border", "#FF0000 solid 1px")
			$("#userpasswordreg").focus();
			return false;
		
		}
*/
 function sleep(delay) {
        var start = new Date().getTime();
        while (new Date().getTime() < start + delay);
      }

});


 </script>