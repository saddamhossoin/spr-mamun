     
       
<div class="assesmentServices form">
<?php echo $this->Form->create('AssesmentService');?>
	<fieldset>
		<legend> </legend>
		<div id="WrapperAssesmentServiceId" class="microcontroll">
		<?php	echo $this->Form->label('AssesmentService.id', __('Id'.':<span class=star>*</span>', true) );?>
		<?php	//echo $this->Form->input('AssesmentService.id',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperAssesmentServiceAssesmentId" class="microcontroll">
		<?php	echo $this->Form->label('AssesmentService.assesment_id', __('Assesment Id'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('AssesmentService.assesment_id',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperAssesmentServiceServiceServiceId" class="microcontroll">
		<?php	echo $this->Form->label('AssesmentService.service_service_id', __('Service Service Id'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('AssesmentService.service_service_id',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperAssesmentServiceQuantity" class="microcontroll">
		<?php	echo $this->Form->label('AssesmentService.quantity', __('Quantity'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('AssesmentService.quantity',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperAssesmentServicePrice" class="microcontroll">
		<?php	echo $this->Form->label('AssesmentService.price', __('Price'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('AssesmentService.price',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperAssesmentServiceDescription" class="microcontroll">
		<?php	echo $this->Form->label('AssesmentService.description', __('Description'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('AssesmentService.description',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperAssesmentServiceCreatedBy" class="microcontroll">
		<?php	echo $this->Form->label('AssesmentService.created_by', __('Created By'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('AssesmentService.created_by',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperAssesmentServiceModifiedBy" class="microcontroll">
		<?php	echo $this->Form->label('AssesmentService.modified_by', __('Modified By'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('AssesmentService.modified_by',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

	</fieldset>
<div class="button_area">
		<?php echo $this->Form->button('Save',array( 'class'=>'submit', 'id'=>'btn_AssesmentService_edit'));?>
		<?php echo $this->Form->button('Cancel',array('type'=>'reset','name'=>'reset','id'=>'Cancel'));?>
		<?php echo $this->Form->end();?>
</div>
</div>
 




