     
       
<div class="serviceAcessories form">
<?php echo $this->Form->create('ServiceAcessory');?>
	<fieldset>
		<legend> </legend>
		<div id="WrapperServiceAcessoryId" class="microcontroll">
 		<?php	echo $this->Form->input('ServiceAcessory.id',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperServiceAcessoryName" class="microcontroll">
		<?php	echo $this->Form->label('ServiceAcessory.name', __('Name'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('ServiceAcessory.name',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperServiceAcessoryStatus" class="microcontroll">
		<?php	echo $this->Form->label('ServiceAcessory.status', __('Status'.':<span class=star>&nbsp;</span>', true) );?>
		<?php	echo $this->Form->checkbox('ServiceAcessory.status',array('div'=>false,'label'=>false,'class'=>''));?>
		</div>

	 

	</fieldset>
<div class="button_area">
		<?php echo $this->Form->button('Save',array( 'class'=>'submit', 'id'=>'btn_ServiceAcessory_edit'));?>
		<?php echo $this->Form->button('Cancel',array('type'=>'reset','name'=>'reset','id'=>'Cancel'));?>
		<?php echo $this->Form->end();?>
</div>
</div>
 




