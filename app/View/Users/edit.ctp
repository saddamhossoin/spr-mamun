<div class="users form">
<?php echo $this->Html->script(array( 'module/user/passwordstrengh')); ?>
<?php echo $this->Form->create('User', array('default' => false, ));?>
 		<div id="WrapperUserEmail" class="microcontroll">
		<?php echo $this->Form->input('User.id');?>
			
 	 	</div>
		<div id="WrapperUserfirstname" class="microcontroll">
			<?php echo $this->Form->label('User.firstname', __('First Name'.': <span class="star">*</span>', true) ); ?>
 			<?php echo $this->Form->input('User.firstname',array('type'=>'text','div'=>false,'label'=>false, 'size'=>35, 'class'=>'required'  ));?>
   	 	</div>
			<div id="WrapperUserlastname" class="microcontroll">
			<?php echo $this->Form->label('User.lastname', __('Last Name'.': <span class="star">*</span>', true) ); ?>
 			<?php echo $this->Form->input('User.lastname',array('type'=>'text','div'=>false,'label'=>false, 'size'=>35, 'class'=>'required'  ));?>
   	 	</div>
		<div id="WrapperUserlastname" class="microcontroll">
			<?php echo $this->Form->label('User.phone', __('Phone'.': <span class="star">&nbsp;</span>', true) ); ?>
 			<?php echo $this->Form->input('User.phone',array('type'=>'text','div'=>false,'label'=>false, 'size'=>35, 'class'=>''  ));?>
   	 	</div>
		   
		<div id="WrapperUserEmail" class="microcontroll">
			<?php echo $this->Form->label('email_address', __('Email'.': <span class="star">&nbsp;</span>', true) ); ?>
 			<?php echo $this->Form->input('email_address',array('type'=>'text','div'=>false,'label'=>false, 'size'=>35, 'class'=>'email','disabled'=>true  ));?>
 			
			<div id="username_feedback"></div>
 	 	</div>
		  <div id="emailvalidinfo"  > <span></span> </div>
		  
		<div id="WrapperUserPassword" class="microcontroll">
			<?php echo $this->Form->label('password', __('Password'.': <span class="star">*</span>', true) ); ?>
 			<?php echo $this->Form->input('password',array('type'=>'password','div'=>false,'label'=>false, 'size'=>35 , 'class'=>'required' ,'value'=>'' ));?>
	 		<span class="instruction">Must be 8 charecter.</span>
 	 	</div>
		
		<div id="WrapperConfirmUserPassword" class="microcontroll">
			<?php echo $this->Form->label('confirmpassword', __('Confirm Password'.': <span class="star">*</span>', true) ); ?>
 			<?php echo $this->Form->input('confirmpassword',array('onpaste'=>'return false', 'oncopy'=>'return false', 'title'=>'Enter same value as password field', 'type'=>'password','div'=>false,'label'=>false, 'size'=>35 , 'class'=>'required'));?>
 	 	</div>
		<div id="WrapperUserJoindate" class="microcontroll" >
			<?php echo $this->Form->label('Group.group_id', __('Select Group'.': <span class="star">*</span>', true) );  
 			 
 			
 echo $this->Form->input('Group.group_id', array('type' => 'select','options' => $grouplist,'selected' =>$this->request->data['Group']['0']['id'],'div'=>false,'label'=>false, 'empty'=>'-- Please Select Group --', 'class'=>'required'));?>
 	 	</div>
		
        <div id="WrapperUserActive" class="microcontroll">
			<?php echo $this->Form->label('active', __('Status'.': <span class="star">&nbsp;</span>', true) ); ?>
            <?php echo $this->Form->checkbox('active',array( 'div'=>false,'label'=>false, 'size'=>35 ));?>
  	 	</div>
	
	<div class="clr"></div>
 <div class="button_area">	  

 <?php echo $this->Form->button('Update', array( 'class'=>'submit', 'type' => 'submit', 'id'=>'btn_user_edit'));?>
        <?php echo $this->Form->button('Cancel',array('type'=>'button','name'=>'reset','id'=>'Cancel_btn'));?>
 </div>
 <?php echo $this->Form->end();?>
</div>

