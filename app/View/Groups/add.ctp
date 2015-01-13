<div class="groups form">
  <?php echo $this->Form->create('Group');?>
	<fieldset>
 		 
	<div id="WrapperGroupName" class="microcontroll">
			<?php echo $this->Form->label('Group.name', __('Group Name'.': <span class="star">*</span>', true) ); ?>
 			<?php echo $this->Form->input('Group.name',array('type'=>'text','div'=>false,'label'=>false, 'size'=>35, 'class'=>'required'));?>
 	 	</div>
	</fieldset>
<div class="button_area">	  
<?php  echo $this->Form->button('Submit',array( 'class'=>'submit', 'type' => 'submit', 'id'=>'btn_group_add'));?>
<?php  echo $this->Form->button('Cancel',array('type'=>'reset','name'=>'reset','id'=>'Cancel'));?>
 </div>
 <?php echo $this->Form->end();?>

</div>

<?php /*?>
<div class="groups form">



<?php echo $this->Form->create('Group');?>
	<fieldset>
		<legend><?php echo __('Add Group'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('created_by');
		echo $this->Form->input('modified_by');
		echo $this->Form->input('Permission');
		echo $this->Form->input('User');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Groups'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Permissions'), array('controller' => 'permissions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Permission'), array('controller' => 'permissions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
<?php */?>