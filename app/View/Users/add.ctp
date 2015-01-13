<?php echo $this->Html->script(array( 'module/Users/passwordstrengh')); ?>

<div class="users form">
 	
<?php echo $this->Form->create('User',array('controller'=>'users','action'=>'add'));?>
 		 
			<div id="WrapperUserfirstname" class="microcontroll">
			<?php echo $this->Form->label('User.firstname', __('First Name'.': <span class="star">*</span>', true) ); ?>
 			<?php echo $this->Form->input('User.firstname',array('type'=>'text','div'=>false,'label'=>false, 'size'=>35, 'class'=>'required'  ));?>
   	 	</div>
			<div id="WrapperUserlastname" class="microcontroll">
			<?php echo $this->Form->label('User.lastname', __('Last Name'.': <span class="star">*</span>', true) ); ?>
 			<?php echo $this->Form->input('User.lastname',array('type'=>'text','div'=>false,'label'=>false, 'size'=>35, 'class'=>'required'  ));?>
   	 	</div>
		<div id="WrapperUserlastname" class="microcontroll">
			<?php echo $this->Form->label('User.lastname', __('Phone'.': <span class="star">&nbsp;</span>', true) ); ?>
 			<?php echo $this->Form->input('User.phone',array('type'=>'text','div'=>false,'label'=>false, 'size'=>35, 'class'=>''  ));?>
   	 	</div>
		
		<div id="WrapperUserEmail" class="microcontroll">
			<?php echo $this->Form->label('User.email_address', __('Email'.': <span class="star">*</span>', true) ); ?>
 			<?php echo $this->Form->input('User.email_address',array('type'=>'text','div'=>false,'label'=>false, 'size'=>35, 'class'=>'email'  ));?> 
		<div id="username_feedback"></div>
  	 	</div>
		
		<div id="WrapperUserPassword" class="microcontroll">
			<?php echo $this->Form->label('User.password', __('Password'.': <span class="star">*</span>', true) ); ?>
 			<?php echo $this->Form->input('User.password',array('type'=>'password','div'=>false,'label'=>false, 'size'=>35 , 'class'=>'required'  ));?>
	 		<span class="instruction">Must be 8 charecter.</span>
 	 	</div>
		
		<div id="WrapperConfirmUserPassword" class="microcontroll">
			<?php echo $this->Form->label('User.confirmpassword', __('Confirm Password'.': <span class="star">*</span>', true) ); ?>
 			<?php echo $this->Form->input('User.confirmpassword',array('onpaste'=>'return false', 'oncopy'=>'return false', 'title'=>'Enter same value as password field', 'type'=>'password','div'=>false,'label'=>false, 'size'=>35 , 'class'=>'required'));?>
 	 	</div>
		<div id="WrapperUserJoindate" class="microcontroll" >
			<?php echo $this->Form->label('Group.group_id', __('Select Group'.': <span class="star">*</span>', true) ); ?>
 			<?php echo $this->Form->select('Group.group_id',  $grouplist, array('div'=>false,'label'=>false, 'empty'=>'-- Please Select Group --', 'class'=>'required select2as'));?>
 	 	</div>
	 	  <div id="emailvalidinfo"  > <span></span> </div>
        <div id="WrapperUserActive" class="microcontroll">
			<?php echo $this->Form->label('User.active', __('Status'.': <span class="star">&nbsp;</span>', true) ); ?>
            <?php echo $this->Form->checkbox('User.active',array( 'div'=>false,'label'=>false, 'size'=>35 ));?>
  	 	</div>
	</fieldset>
 <div class="button_area">	  
<?php  echo $this->Form->button('Save',array( 'class'=>'submit', 'id'=>'btn_user_add'));?>
<?php  echo $this->Form->button('Cancel',array('type'=>'reset','name'=>'reset','id'=>'Cancel'));?>
 </div>
</div>
