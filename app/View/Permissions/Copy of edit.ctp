<div class="permissions form">
 <?php echo $this->Form->create('Permission');?>
	<fieldset>
	<?php	
	//pr($this->request->data); 
	// echo $this->Form->input('id');?>
	
	
		  <div id="WrapperMenucontroller" class="microcontroll">
			<?php  echo $this->Form->label('Permission.sortname', __('Sort BY'.': <span class="star">*</span>', true) ); ?>
 			<?php  echo $this->Form->text('Permission.sortname',array('div'=>false,'label'=>false,  'class'=>'required' ));?>
		</div>

    	<div id="WrapperMenucontroller" class="microcontroll">
        <?php	echo $this->Form->label('Permission.controller', __('Controller'.':<span class=star>*</span>') );
        echo $this->Form->input('Permission.controller', array('type' => 'select','options' => $controllers,'selected' =>$this->request->data['Permission']['controller'],'div'=>false,'label'=>false, 'empty'=>'-- Please Select Controller --', 'class'=>'required select2as')); ?>
        
		  
	 		<span class="instruction">  </span>
			<span class="example"> </span>
			<span class="message"></span>
	 	</div>
		
		<div id="WrapperMenuaction" class="microcontroll">
      
        <?php	echo $this->Form->label('Permission.action', __('Action'.':<span class=star>*</span>') );?>
        <?php	echo $this->Form->select('Permission.action', $controlleractions, array('div' => false, 'label' => false, 'class' => 'required select2as', 'empty' => '--- Select ---'));?>
       	<span class="instruction">  </span>
			<span class="example"> </span>
			<span class="message"></span>
	 	</div>
		
		
	     <div id="WrapperUserJoindate" class="microcontroll">
			<?php echo $this->Form->label('Group.group_id', __('Select Group'.': <span class="star">*</span>', true) ); ?>
 			<?php echo $this->Form->select('Group',  $groups,array('div'=>false,'label'=>false,'multiple'=>'multiple','class'=>'required'));?>
	 		<span class="instruction"></span>
			<span class="example"></span>
			<span class="message"></span>
	 	</div>
        
	</fieldset>
<div class="button_area">	  


 <?php echo $this->Form->button('Update', array( 'class'=>'submit', 'type' => 'submit', 'id'=>'btn_permission_edit'));?>
        <?php echo $this->Form->button('Cancel',array('type'=>'button','name'=>'reset','id'=>'Cancel_btn'));?>
 </div>
 <?php echo $this->Form->end();?>

</div>






<?php /*?><div class="permissions form">
<?php echo $this->Form->create('Permission');?>
	<fieldset>
		<legend><?php echo __('Edit Permission'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('Group');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div><?php */?>

