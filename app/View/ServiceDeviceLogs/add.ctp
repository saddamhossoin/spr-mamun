     
       
<div class="serviceDeviceLogs form">
<?php echo $this->Form->create('ServiceDeviceLog');?>
	<fieldset>
		<legend> </legend>
		<div id="WrapperServiceDeviceLogServiceDeviceInfoId" class="microcontroll">
		<?php	echo $this->Form->label('ServiceDeviceLog.service_device_info_id', __('Service Device Info Id'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('ServiceDeviceLog.service_device_info_id',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperServiceDeviceLogLinks" class="microcontroll">
		<?php	echo $this->Form->label('ServiceDeviceLog.links', __('Links'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('ServiceDeviceLog.links',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperServiceDeviceLogUserId" class="microcontroll">
		<?php	echo $this->Form->label('ServiceDeviceLog.user_id', __('User Id'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('ServiceDeviceLog.user_id',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperServiceDeviceLogCreatedBy" class="microcontroll">
		<?php	echo $this->Form->label('ServiceDeviceLog.created_by', __('Created By'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('ServiceDeviceLog.created_by',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperServiceDeviceLogModifiedBy" class="microcontroll">
		<?php	echo $this->Form->label('ServiceDeviceLog.modified_by', __('Modified By'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('ServiceDeviceLog.modified_by',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

	</fieldset>
<div class="button_area">
		<?php echo $this->Form->button('Save',array( 'class'=>'submit', 'id'=>'btn_ServiceDeviceLog_add'));?>
		<?php echo $this->Form->button('Cancel',array('type'=>'reset','name'=>'reset','id'=>'Cancel'));?>
		<?php echo $this->Form->end();?>
</div>
</div>
 




