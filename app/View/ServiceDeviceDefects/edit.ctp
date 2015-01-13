<div class="serviceDeviceDefects form">
<?php echo $this->Form->create('ServiceDeviceDefect');?>
<?php echo $this->Form->input('id');?>

	<fieldset>
		<legend> </legend>

          
		<div id="WrapperServiceDeviceDefectid" class="microcontroll">
		<?php	echo $this->Form->label('ServiceDeviceDefect.service_device_info_id', __('Service Device Info ID'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('ServiceDeviceDefect.service_device_info_id',array('div'=>false,'label'=>false,'class'=>'required'));?>
        <span id="duplicateMessage">Service Defect exits. Please create another. </span>
		</div>
 		<div id="WrapperServicedefectid" class="microcontroll">
		<?php echo $this->Form->label('ServiceDeviceDefect.service_defect_id', __('Service Defect Name'.': <span class="star">&nbsp;</span>', true) ); ?>
            <?php	echo $this->Form->input('ServiceDeviceDefect.service_defect_id',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>


	</fieldset>
<div class="button_area">
		<?php echo $this->Form->button('Save',array( 'class'=>'submit', 'id'=>'btn_ServiceDeviceDefect_edit'));?>
		<?php echo $this->Form->button('Cancel',array('type'=>'reset','name'=>'reset','id'=>'Cancel'));?>
		<?php echo $this->Form->end();?>
</div>
</div>
 




