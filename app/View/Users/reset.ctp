<?php echo $this->Html->script(array('common/form','common/jquery.validate','jquery.form'));?>
<div class="users form">
	<?php echo $this->Form->create('User',array('controller'=>'users','action'=>'reset'));?>
  
	<?php echo $this->Form->create('User');?>
      <div class="row-fluid">
      <div class="dialog">
    <div class="block">
            
            <div class="block-body">
               <div id="WrapperUserPassword" class="span12">
               <?php echo $this->Form->input('User.id',array('type'=>'hidden'));?>
			<?php echo $this->Form->label('User.password', __('Reset Password'.': <span class="star">&nbsp;</span>', true) ); ?>
 			<?php echo $this->Form->input('User.password',array('value'=>'','type'=>'password','div'=>false,'label'=>false, 'size'=>35 ,'class'=>'required'));?>
			<div class="clr"></div>
	 		 
 	 	    </div>
			<div class="clr"></div>
               <div id="WrapperConfirmUserPassword" class="span12">
			<?php echo $this->Form->label('User.confirmpassword', __('Reset Confirm Password'.': <span class="star">&nbsp;</span>', true) ); ?>
 			<?php echo $this->Form->input('User.confirmpassword',array('onpaste'=>'return false', 'oncopy'=>'return false', 'title'=>'Enter same value as password field', 'type'=>'password','div'=>false,'label'=>false, 'size'=>35 , 'class'=>'required'));?>
 	 	</div>
         <div class="clr"></div>
         <div class="button_area">
		<?php echo $this->Form->button('Reset!',array( 'class'=>'btn btn', 'id'=>'btn_reset_pwd'));?>
		<?php echo $this->Form->button('Cancel',array('type'=>'reset','name'=>'reset','class'=>'btn btn','id'=>'Cancel'));?>
</div>
        
          <div class="clearfix"></div>
            </div>
        </div>
        
    </div>
</div>
     <?php echo $this->Form->end();?>
     
 </div>