     
       
<div class="serviceServices form">
<?php echo $this->Form->create('ServiceService');?>
	<fieldset>
		<legend> </legend>
		
         <div id="WrapperServiceServiceName" class="microcontroll">
			<?php	echo $this->Form->label('ServiceService.name', __('Name'.':<span class=star>*</span>', true) );?>
            <?php	echo $this->Form->input('ServiceService.name',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>
        <span id="duplicateMessage" style="display:none;">Product exits. Please create another. </span>
 		
        <div id="WrapperServiceServiceName" class="microcontroll">
			<?php	echo $this->Form->label('ServiceService.price', __('Price'.':<span class=star></span>', true) );?>
            <?php	echo $this->Form->input('ServiceService.price',array('div'=>false,'label'=>false,'class'=>'two_digit'));?>
		</div>
		<div id="WrapperServiceServiceDescription" class="microcontroll">
			<?php	echo $this->Form->label('ServiceService.description', __('Description'.':', true) );?>
            <?php	echo $this->Form->input('ServiceService.description',array('div'=>false,'label'=>false,'class'=>' '));?>
		</div>
 
	</fieldset>
<div class="button_area">
		<?php echo $this->Form->button('Save',array( 'class'=>'submit', 'id'=>'btn_ServiceService_add'));?>
		<?php echo $this->Form->button('Cancel',array('type'=>'reset','name'=>'reset','id'=>'Cancel'));?>
		<?php echo $this->Form->end();?>
</div>
</div>
 




