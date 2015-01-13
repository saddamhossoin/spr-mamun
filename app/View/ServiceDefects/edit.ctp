<div class="serviceDefects form">
<?php echo $this->Form->create('ServiceDefect');?>
<?php echo $this->Form->input('id');?>
	<fieldset>
		<legend> </legend>

          
		<div id="WrapperServiceDefectName" class="microcontroll">
		<?php	echo $this->Form->label('ServiceDefect.name', __('Name'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('ServiceDefect.name',array('div'=>false,'label'=>false,'class'=>'required'));?>
        <span id="duplicateMessage" style="display:none">Service Defect exits. Please create another. </span>
		</div>
 		<div id="WrapperServiceDefectstatus" class="microcontroll">
		<?php echo $this->Form->label('ServiceDefect.status', __('Status'.': <span class="star">&nbsp;</span>', true) ); ?>
            <?php echo $this->Form->checkbox('ServiceDefect.status',array( 'div'=>false,'label'=>false, 'size'=>35 ));?>
		</div>


	</fieldset>
<div class="button_area">
		<?php echo $this->Form->button('Update',array( 'class'=>'submit', 'id'=>'btn_ServiceDefect_edit'));?>
		<?php echo $this->Form->button('Cancel',array('type'=>'reset','name'=>'reset','id'=>'Cancel'));?>
		<?php echo $this->Form->end();?>
</div>
</div>
 




