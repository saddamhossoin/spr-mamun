<?php  echo $this->Html->script(array('common/form','common/jquery.validate'));  ?>
<?php echo $this->Html->script(array('alert/alert')); ?>
<?php echo $this->Html->css(array('alert/css/alert','alert/themes/default/theme')); ?>
<div class="users form">
<?php echo $this->Form->create('User');?>

        
	<div class="row registration_popup">
        <div class="col col-sm-4">
            <?php echo $this->Form->input('firstname', array('label'=>'Full Name','class' => 'form-control')); ?>
            <?php echo $this->Form->hidden('track', array('label'=>false,'div'=>false,'value'=>$track)); ?>
            <?php echo $this->Form->input('phone', array('label'=>'Mobile','class' => 'required form-control')); ?>
            <?php echo $this->Form->input('email_address', array('class' => 'form-control','id'=>'EmailAddressBody')); ?>
        <span id="username_feedback"></span>
        <div class="input text required">
            <?php echo $this->Form->label('language', __('Language'.': ', true) ); ?>
            <?php echo $this->Form->select('language',  array('eng'=>'ENGLISH','ita'=>'ITALIANO'), array('class' => 'form-control', 'empty'=>'-- Please Select Language --', 'class'=>'required'));?>
        </div>
            <?php echo $this->Form->input('password', array('class' => 'form-control','id'=>'userpasswordreg')); ?>
            <span id="newpasswordId"></span>
            <?php echo $this->Form->input('confirmpassword', array('class' => 'form-control','type'=>'password')); ?>
            <?php echo $this->Form->input('Group.group_id',array('type'=>'hidden','value'=>3,'div'=>false,'label'=>false,'class'=>'required'));?> 
        <br />
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
           <?php  //echo $this->Form->input('User.captcha',array('autocomplete'=>'off','label'=>false,'div'=>false,'class'=>''));?>
        </fieldset>
        <div style="clear:both"></div>
        <div class="button_area">
            <?php echo $this->Form->button('Save',array( 'class'=>'btn btn-default btn-warning', 'id'=>'btn_user_add'));?>
            <?php echo $this->Form->button('Cancel',array('class' => 'btn btn-default btn-warning','type'=>'reset','name'=>'reset','id'=>'Cancel'));?>
            <?php echo $this->Form->end();?>
        </div>
	</div>
<style type="text/css">
	.registration_popup label{
		float: left;
		width: 131px;
		font-weight:normal;
	}
	.registration_popup div div{
		margin-bottom:5px;
	}
	.registration_popup input{
		width:200px !important;
		height:29px !important;
	}
	.captchaimage p{
		font-size: 14px;
	}
	.captchaimage {
		float: left;
		width: 150px;
	}
	#UserCaptcha{
		display: inline;
		margin-left: 11px;
		height:29px !important;
		width: 171px !important;
	}
	#UserUserRegistrationForm .button_area {
		width:100% !important;
		text-align:center;
		margin:0px !important;
	}
	#UserLanguage{
		width:202px;
	}
	label.error {
		color: #f00;
		float: none !important;
		width: 100% !important;
		font-size:12px !important;
		display:none !important;
	}
	.error {
		border:1px solid #f00;
	}
</style>
 
<script type="text/javascript">
 jQuery(function($){ 
 				 
   
   
    $('#btn_user_add').click(function(e){
											 
 	 	 e.preventDefault();
  		//========================== Validation Check ========
  		if( $('#UserUserRegistrationForm').valid() ) 
 		{
			
 		  var data= $('#UserUserRegistrationForm').serialize()  ;
		  var fullname = $("#UserFirstname").val();
  	//=================================//
		$.ajax({
			type: "POST",
			url:siteurl+"Users/user_registration",
			data:  data, 
			success: function(response){
   			 if(response == 1 ){
 				  window.location.href = siteurl+"shop/cart";
 			 }
			 else if(response == 2 ){
 				  window.location.href = siteurl+"ServiceServices/brand";
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

});


 </script>
<style type="text/css">
label.error{
	color:#F00;
	}
#userpa{
	color:#003300;
	}
.password_strength_3,.password_strength_11{
	color: #FF0000;
	}
 .btn-block {
    display: block;
    padding-left: 0;
    padding-right: 0;
    width: 100%;
}
 .btn {
    -moz-user-select: none;
    background-image: none;
    border: 1px solid transparent;
    border-radius: 4px;
    cursor: pointer;
    display: inline-block;
    font-size: 14px;
    font-weight: 400;
    line-height: 1.42857;
    margin-bottom: 0;
    padding: 6px 40px;
    text-align: center;
    vertical-align: middle;
    white-space: nowrap;
}
 .form-control{
	 width:80% !important;
	 height:20px !important;
	 }
 .col-sm-4{
	 width:100%;
	 float:none;
	 }
 .signupdialog{
 	line-height:19px;
	font-size:14px;
	font-weight:600;
	text-align:justify;
 }
 .signupdialog ,.users{
 	margin:15px;
	
 }
 input[type="text"], input[type="password"], input[type="email"], textarea, select{
 	width:210px;
 }
 .captchaimage{
 	width:150px;
	float:left;
	}
 .button_area{
	 margin:auto;
	 width:60%;
	 margin-top:50px;
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

 
 </style>