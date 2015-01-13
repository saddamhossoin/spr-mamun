<?php  echo $this->Html->script(array('common/form','common/jquery.validate'));  ?>
<?php echo $this->Html->script(array('alert/alert')); ?>
<?php echo $this->Html->css(array('alert/css/alert','alert/themes/default/theme')); ?>
<div class="users form">
<?php echo $this->Form->create('User');?>

        
<div class="row">

<div class="col col-sm-4">
<?php echo $this->Form->input('firstname', array('label'=>'Full Name','class' => 'form-control')); ?>

<br />
<?php echo $this->Form->input('email_address', array('class' => 'form-control','id'=>'EmailAddressBody')); ?>
<span id="username_feedback"></span>
<br />
<?php echo $this->Form->input('password', array('class' => 'form-control','id'=>'userpasswordreg')); ?>
<span id="newpasswordId"></span>
<br />
<?php echo $this->Form->input('confirmpassword', array('class' => 'form-control','type'=>'password')); ?>
<?php	echo $this->Form->input('Group.group_id',array('type'=>'hidden','value'=>3,'div'=>false,'label'=>false,'class'=>'required'));?>
<br />
<br />

</div>
</div>
        
<div id="WrapperUsersolve" class="microcontroll">
	  	<div class="captchaimage">
        
        <?php echo $this->Html->image($this->Html->url(array('controller'=>'users', 'action'=>'captcha'), true),array('id'=>'img-captcha','vspace'=>2));
        echo '<p><a href="#" id="a-reload">Can\'t read? Reload</a></p>';?>
       </div> 
       <br />
       <br />
       <br />
       <br />
       <br />
       <?php 
		 echo $this->Form->input('User.captcha', array('autocomplete'=>'off','label'=>false,'class' => 'form-control'));
		
        /*if($settings['jquerylib'])  {
          echo '<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>';
        }
        */
?>
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
<div class="button_area">
		<?php echo $this->Form->button('Save',array( 'class'=>'btn btn-default btn-primary', 'id'=>'btn_user_add'));?>
		<?php echo $this->Form->button('Cancel',array('class' => 'btn btn-default btn-primary','type'=>'reset','name'=>'reset','id'=>'Cancel'));?>
		<?php echo $this->Form->end();?>
</div>
</div>
 
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
  			 if(response ==1 ){
				   $.alert.open('warning', 'Welcome, '+fullname+'. </br> Your registration is waiting for admin approval. ');
				   window.location.reload(true);
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