<div class="assesmentInventories form">
<?php echo $this->Form->create('AssesmentInventory');?>
	<fieldset>
		<legend> </legend>
		<div id="WrapperAssesmentInventoryId" class="microcontroll">
		<?php	echo $this->Form->label('AssesmentInventory.id', __('Id'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('AssesmentInventory.id',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperAssesmentInventoryPosProductId" class="microcontroll">
		<?php	echo $this->Form->label('AssesmentInventory.pos_product_id', __('Pos Product Id'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('AssesmentInventory.pos_product_id',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperAssesmentInventoryAssesmentId" class="microcontroll">
		<?php	echo $this->Form->label('AssesmentInventory.assesment_id', __('Assesment Id'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('AssesmentInventory.assesment_id',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperAssesmentInventoryCreatedBy" class="microcontroll">
		<?php	echo $this->Form->label('AssesmentInventory.created_by', __('Created By'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('AssesmentInventory.created_by',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperAssesmentInventoryModifiedBy" class="microcontroll">
		<?php	echo $this->Form->label('AssesmentInventory.modified_by', __('Modified By'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('AssesmentInventory.modified_by',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

	</fieldset>
<div class="button_area">
		<?php echo $this->Form->button('Save',array( 'class'=>'submit', 'id'=>'btn_AssesmentInventory_edit'));?>
		<?php echo $this->Form->button('Cancel',array('type'=>'reset','name'=>'reset','id'=>'Cancel'));?>
		<?php echo $this->Form->end();?>
</div>
</div>
 




