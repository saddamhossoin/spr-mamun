     
       
<div class="colors form">
<?php echo $this->Form->create('Color');?>
	<fieldset>
		<legend> </legend>
		<div id="WrapperColorName" class="microcontroll">
		<?php	echo $this->Form->label('Color.name', __('Name'.':<span class=star></span>', true) );?>
		<?php	echo $this->Form->input('Color.name',array('div'=>false,'label'=>false,'class'=>''));?>
		</div>

		<div id="WrapperColorColorCode" class="microcontroll">
		<?php	echo $this->Form->label('Color.color_code', __('Color Code'.':<span class=star></span>', true) );?>
		<?php	echo $this->Form->input('Color.color_code',array('div'=>false,'label'=>false,'class'=>''));?>
		</div>

		 
	</fieldset>
<div class="button_area">
		<?php echo $this->Form->button('Save',array( 'class'=>'submit', 'id'=>'btn_Color_add'));?>
		<?php echo $this->Form->button('Cancel',array('type'=>'reset','name'=>'reset','id'=>'Cancel'));?>
		<?php echo $this->Form->end();?>
</div>
</div>
 




