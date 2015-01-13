     
       
<div class="posProductColors form">
<?php echo $this->Form->create('PosProductColor');?>
	<fieldset>
		<legend> </legend>
		<div id="WrapperPosProductColorId" class="microcontroll">
		<?php	echo $this->Form->label('PosProductColor.id', __('Id'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('PosProductColor.id',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperPosProductColorPosProductId" class="microcontroll">
		<?php	echo $this->Form->label('PosProductColor.pos_product_id', __('Pos Product Id'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('PosProductColor.pos_product_id',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperPosProductColorColorId" class="microcontroll">
		<?php	echo $this->Form->label('PosProductColor.color_id', __('Color Id'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('PosProductColor.color_id',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperPosProductColorCreatedBy" class="microcontroll">
		<?php	echo $this->Form->label('PosProductColor.created_by', __('Created By'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('PosProductColor.created_by',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperPosProductColorModifiedBy" class="microcontroll">
		<?php	echo $this->Form->label('PosProductColor.modified_by', __('Modified By'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('PosProductColor.modified_by',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

	</fieldset>
<div class="button_area">
		<?php echo $this->Form->button('Save',array( 'class'=>'submit', 'id'=>'btn_PosProductColor_edit'));?>
		<?php echo $this->Form->button('Cancel',array('type'=>'reset','name'=>'reset','id'=>'Cancel'));?>
		<?php echo $this->Form->end();?>
</div>
</div>
 




