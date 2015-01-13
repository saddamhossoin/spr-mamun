<div class="posCompatibilities form">
<?php echo $this->Form->create('PosCompatibility');?>
	<fieldset>
		<legend> </legend>
		<div id="WrapperPosCompatibilityPosProductId" class="microcontroll">
		<?php	echo $this->Form->label('PosCompatibility.pos_product_id', __('Pos Product Id'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('PosCompatibility.pos_product_id',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperPosCompatibilityComProductId" class="microcontroll">
		<?php	echo $this->Form->label('PosCompatibility.com_product_id', __('Com Product Id'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('PosCompatibility.com_product_id',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperPosCompatibilityCreatedBy" class="microcontroll">
		<?php	echo $this->Form->label('PosCompatibility.created_by', __('Created By'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('PosCompatibility.created_by',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperPosCompatibilityModifiedBy" class="microcontroll">
		<?php	echo $this->Form->label('PosCompatibility.modified_by', __('Modified By'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('PosCompatibility.modified_by',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

	</fieldset>
<div class="button_area">
		<?php echo $this->Form->button('Save',array( 'class'=>'submit', 'id'=>'btn_PosCompatibility_add'));?>
		<?php echo $this->Form->button('Cancel',array('type'=>'reset','name'=>'reset','id'=>'Cancel'));?>
		<?php echo $this->Form->end();?>
</div>
</div>
 




