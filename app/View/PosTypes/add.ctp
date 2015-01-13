<?php echo $this->Html->script('jquery.form');?>
<div class="posTypes form">
<?php echo $this->Form->create('PosType');?>
	<fieldset>
		<legend> </legend>
		<div id="WrapperPosTypeName" class="microcontroll">
		<?php	echo $this->Form->label('PosType.name', __('Name'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('PosType.name',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperPosTypeDescription" class="microcontroll">
		<?php	echo $this->Form->label('PosType.description', __('Description'.':<span class=star></span>', true) );?>
		<?php	echo $this->Form->input('PosType.description',array('div'=>false,'label'=>false,'class'=>''));?>
		</div>
         <div id="WrapperPosProductImage" class="microcontroll">
		<?php	echo $this->Form->label('PosType.image', __('Image'.':<span class=star></span>', true) );?>
	    <?php   echo $this->Form->input('PosType.image',array('type'=>'file','div'=>false,'label'=>false,'class'=>'' ));   ?>     
      	</div>
  
	</fieldset>
<div class="button_area">
		<?php echo $this->Form->button('Save',array( 'class'=>'submit', 'id'=>'btn_PosType_add'));?>
		<?php echo $this->Form->button('Cancel',array('type'=>'reset','name'=>'reset','id'=>'Cancel'));?>
		<?php echo $this->Form->end();?>
</div>
</div>
 




