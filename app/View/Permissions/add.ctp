<div class="permissions form">
<?php echo $this->Form->create('Permission');?>
	<fieldset>
	
     <div id="WrapperMenucontroller" class="microcontroll">
			<?php  echo $this->Form->label('Permission.sortname', __('Sort BY'.': <span class="star">*</span>', true) ); ?>
 			<?php  echo $this->Form->text('Permission.sortname',array('div'=>false,'label'=>false,  'class'=>'required' ));?>
		</div>
    	<div id="WrapperMenucontroller" class="microcontroll">
			<?php echo $this->Form->label('Permission.controller', __('Class Name'.': <span class="star">*</span>', true) ); ?>
 			<?php 
 			echo $this->Form->select('Permission.controller',$controllers,array('empty'=>'--- Please Select One ---','div'=>false,'label'=>false,  'class'=>'required select2as' ));?>
	 		<span class="instruction">  </span>
			<span class="example"> </span>
			<span class="message"></span>
	 	</div>
		
		<div id="WrapperMenuaction" class="microcontroll">
			<?php echo $this->Form->label('Permission.action', __('Action'.': <span class="star">*</span>', true) ); ?>
 			<?php echo $this->Form->select('Permission.action',null,array('empty'=>'--- Please Select One ---', 'div'=>false,'label'=>false,   'class'=>'required select2as' ));?>
	 		<span class="instruction">  </span>
			<span class="example"> </span>
			<span class="message"></span>
	 	</div>
		
	     <div id="WrapperUserJoindate" class="microcontroll">
			<?php echo $this->Form->label('Group.group_id', __('Select Group'.': <span class="star">*</span>', true) ); ?>
 			<?php echo $this->Form->select('Group',  $groups  ,array('div'=>false,'label'=>false,'multiple'=>'multiple','class'=>'required'));?>
	 		<span class="instruction"></span>
			<span class="example"></span>
			<span class="message"></span>
	 	</div>
        
	</fieldset>
	<div class="button_area">	  
        <?php  echo $this->Form->button('Save',array( 'class'=>'submit', 'id'=>'btn_permission_add'));?>
        <?php  echo $this->Form->button('Cancel',array('type'=>'reset','name'=>'reset','id'=>'Cancel'));?>
    </div>
<?php echo $this->Form->end();?>
</div>