<?php echo $this->Html->css('module/PosPcategories/add'); 
	  echo $this->Html->script(array('module/PosPcategories/popup_add'));
?>
<div class="posPcategories">
<?php echo $this->Form->create('PosPcategory',array('action'=>'add'));?>
	<fieldset>
		<legend> </legend>
		<div id="WrapperPosPcategoryName" class="microcontroll">
		<?php	echo $this->Form->label('PosPcategory.name', __('Name'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('PosPcategory.name',array('div'=>false,'label'=>false,'class'=>'required'));?>
	 	</div>
	<span id="duplicateMessagebrandpopup">Category exits. Please create another. </span>
		<div id="WrapperPosPcategoryDescription" class="microcontroll">
		<?php	echo $this->Form->label('PosPcategory.description', __('Description'.':<span class=star>&nbsp;</span>', true) );?>
		<?php	echo $this->Form->input('PosPcategory.description',array('div'=>false,'type'=>'textarea','label'=>false,'class'=>''));?>
		</div>
 
	</fieldset>
<div class="button_area">
		<?php echo $this->Form->button('Save',array( 'class'=>'submit', 'id'=>'btn_PosPcategory_add'));?>
		<?php echo $this->Form->button('Cancel',array('type'=>'reset','name'=>'reset','id'=>'Cancel'));?>
		<?php echo $this->Form->end();?>
</div>
</div>
 
<style type="text/css">
#PosPcategoryAddForm {
    	margin: 0 auto;
		width:auto !important;
}
#duplicateMessagebrandpopup{
		display:none;
		color:#FF0000;
		padding-left: 110px;
}
.button_area{
 }
</style>

