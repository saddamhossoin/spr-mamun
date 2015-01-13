     
       
<div class="serviceDeviceAcessories form">
<?php echo $this->Form->create('ServiceDeviceAcessory');?>
	<fieldset>
		<legend> </legend>
		<div id="WrapperServiceDeviceAcessoryId" class="microcontroll">
		<?php	echo $this->Form->label('ServiceDeviceAcessory.id', __('Id'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('ServiceDeviceAcessory.id',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperServiceDeviceAcessoryServiceDeviceInfoId" class="microcontroll">
		<?php	echo $this->Form->label('ServiceDeviceAcessory.service_device_info_id', __('Service Device Info Id'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('ServiceDeviceAcessory.service_device_info_id',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperServiceDeviceAcessoryServiceAcessoryId" class="microcontroll">
		<?php	echo $this->Form->label('ServiceDeviceAcessory.service_acessory_id', __('Service Acessory Id'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('ServiceDeviceAcessory.service_acessory_id',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperServiceDeviceAcessoryCreatedBy" class="microcontroll">
		<?php	echo $this->Form->label('ServiceDeviceAcessory.created_by', __('Created By'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('ServiceDeviceAcessory.created_by',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperServiceDeviceAcessoryModifiedBy" class="microcontroll">
		<?php	echo $this->Form->label('ServiceDeviceAcessory.modified_by', __('Modified By'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('ServiceDeviceAcessory.modified_by',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

	</fieldset>
<div class="button_area">
		<?php echo $this->Form->button('Save',array( 'class'=>'submit', 'id'=>'btn_ServiceDeviceAcessory_edit'));?>
		<?php echo $this->Form->button('Cancel',array('type'=>'reset','name'=>'reset','id'=>'Cancel'));?>
		<?php echo $this->Form->end();?>
</div>
</div>
 




