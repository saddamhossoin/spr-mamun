<div class="DeviceCheckLists form">
<?php echo $this->Form->create('DeviceCheckList');?>
<?php echo $this->Form->input('id');?>
	<fieldset>
		<legend> </legend>
		<div id="WrapperDeviceCheckList" class="microcontroll">
		<?php	echo $this->Form->label('DeviceCheckList.name', __('Name'.':<span class=star></span>', true) );?>
		<?php	echo $this->Form->input('DeviceCheckList.name',array('div'=>false,'label'=>false,'class'=>''));?>
		</div>

		<div id="WrapperDeviceCheckList" class="microcontroll">
		<?php	echo $this->Form->label('DeviceCheckList.comments', __('Comment'.':<span class=star></span>', true) );?>
		<?php	echo $this->Form->input('DeviceCheckList.comments',array('div'=>false,'label'=>false,'class'=>''));?>
		</div>
        
        <div id="WrapperDeviceCheckList" class="microcontroll">
		<?php	echo $this->Form->label('DeviceCheckList.active', __('Active'.':<span class=star></span>', true) );?>
		<?php	echo $this->Form->checkbox('DeviceCheckList.active',array('div'=>false,'label'=>false,'class'=>''));?>
		</div>

		 
	</fieldset>
<div class="button_area">
		<?php echo $this->Form->button('update',array( 'class'=>'submit', 'id'=>'btn_DeviceCheckList_edit'));?>
		<?php echo $this->Form->button('Cancel',array('type'=>'reset','name'=>'reset','id'=>'Cancel'));?>
		<?php echo $this->Form->end();?>
</div>
</div>
 




