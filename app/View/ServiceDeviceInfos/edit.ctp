     
       
<div class="serviceDeviceInfos form">
<?php echo $this->Form->create('ServiceDeviceInfo');?>
	<fieldset>
		<legend> </legend>
		<div id="WrapperServiceDeviceInfoId" class="microcontroll">
		<?php	echo $this->Form->label('ServiceDeviceInfo.id', __('Id'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('ServiceDeviceInfo.id',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperServiceDeviceInfoStatus" class="microcontroll">
		<?php	echo $this->Form->label('ServiceDeviceInfo.status', __('Status'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('ServiceDeviceInfo.status',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperServiceDeviceInfoUserId" class="microcontroll">
		<?php	echo $this->Form->label('ServiceDeviceInfo.user_id', __('User Id'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('ServiceDeviceInfo.user_id',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperServiceDeviceInfoServiceDeviceId" class="microcontroll">
		<?php	echo $this->Form->label('ServiceDeviceInfo.service_device_id', __('Service Device Id'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('ServiceDeviceInfo.service_device_id',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperServiceDeviceInfoSerialNo" class="microcontroll">
		<?php	echo $this->Form->label('ServiceDeviceInfo.serial_no', __('Serial No'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('ServiceDeviceInfo.serial_no',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperServiceDeviceInfoDescription" class="microcontroll">
		<?php	echo $this->Form->label('ServiceDeviceInfo.description', __('Description'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('ServiceDeviceInfo.description',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperServiceDeviceInfoDefectState" class="microcontroll">
		<?php	echo $this->Form->label('ServiceDeviceInfo.defect_state', __('Defect State'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('ServiceDeviceInfo.defect_state',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperServiceDeviceInfoAcessories" class="microcontroll">
		<?php	echo $this->Form->label('ServiceDeviceInfo.acessories', __('Acessories'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('ServiceDeviceInfo.acessories',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperServiceDeviceInfoReciveDate" class="microcontroll">
		<?php	echo $this->Form->label('ServiceDeviceInfo.recive_date', __('Recive Date'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('ServiceDeviceInfo.recive_date',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperServiceDeviceInfoEstimatedDate" class="microcontroll">
		<?php	echo $this->Form->label('ServiceDeviceInfo.estimated_date', __('Estimated Date'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('ServiceDeviceInfo.estimated_date',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperServiceDeviceInfoCreatedBy" class="microcontroll">
		<?php	echo $this->Form->label('ServiceDeviceInfo.created_by', __('Created By'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('ServiceDeviceInfo.created_by',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperServiceDeviceInfoModifiedBy" class="microcontroll">
		<?php	echo $this->Form->label('ServiceDeviceInfo.modified_by', __('Modified By'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('ServiceDeviceInfo.modified_by',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

	</fieldset>
<div class="button_area">
		<?php echo $this->Form->button('Save',array( 'class'=>'submit', 'id'=>'btn_ServiceDeviceInfo_edit'));?>
		<?php echo $this->Form->button('Cancel',array('type'=>'reset','name'=>'reset','id'=>'Cancel'));?>
		<?php echo $this->Form->end();?>
</div>
</div>
 




