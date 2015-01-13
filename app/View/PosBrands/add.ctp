<?php echo $this->Html->script('jquery.form');?>
<div class="posBrands form">
<?php echo $this->Form->create('PosBrand');?>
	<fieldset>
		<legend> </legend>
		<div id="WrapperPosBrandName" class="microcontroll">
		<?php	echo $this->Form->label('PosBrand.name', __('Name'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('PosBrand.name',array('div'=>false,'label'=>false,'class'=>'required'));?>
		<span id="duplicateMessage">Brand exits. Please create another. </span>
		</div>

		<div id="WrapperPosBrandAddress" class="microcontroll">
		<?php	echo $this->Form->label('PosBrand.address', __('Description'.':<span class=star>&nbsp;</span>', true) );?>
		<?php	echo $this->Form->input('PosBrand.address',array('div'=>false,'type'=>'textarea','label'=>false,'class'=>''));?>
		</div>
        <div id="WrapperPosProductImage" class="microcontroll">
		<?php	echo $this->Form->label('PosBrand.image', __('Image'.':<span class=star></span>', true) );?>
	    <?php   echo $this->Form->input('PosBrand.image',array('type'=>'file','div'=>false,'label'=>false,'class'=>'' ));   ?>     
      	</div>
 
	</fieldset>
<div class="button_area">
		<?php echo $this->Form->button('Save',array( 'class'=>'submit', 'id'=>'btn_PosBrand_add'));?>
		<?php echo $this->Form->button('Cancel',array('type'=>'reset','name'=>'reset','id'=>'Cancel'));?>
		<?php echo $this->Form->end();?>
</div>
</div>
 
 



