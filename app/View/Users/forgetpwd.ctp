<?php echo $this->Html->css(array('module/Users/forgetpwd'));?>
<div id="forgetpass"> 
<?php echo $this->Session->flash(); ?>
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
