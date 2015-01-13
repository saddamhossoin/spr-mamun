     
       
<div class="serviceServices form">
<?php echo $this->Form->create('ServiceService');?>
	<fieldset>
		<legend> </legend>
		<div id="WrapperServiceServiceId" class="microcontroll">
	 	<?php	echo $this->Form->input('ServiceService.id',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		 
        
        <div id="WrapperServiceServiceName" class="microcontroll">
		<?php	echo $this->Form->label('ServiceService.name', __('Name'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('ServiceService.name',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>
        <div id="WrapperServiceServicePrice" class="microcontroll">
		<?php	echo $this->Form->label('ServiceService.price', __('Price'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('ServiceService.price',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperServiceServiceDescription" class="microcontroll">
		<?php	echo $this->Form->label('ServiceService.description', __('Description'.':', true) );?>
		<?php	echo $this->Form->input('ServiceService.description',array('div'=>false,'label'=>false,'class'=>' '));?>
		</div>

		 

	</fieldset>
<div class="button_area">
		<?php echo $this->Form->button('Update',array( 'class'=>'submit', 'id'=>'btn_ServiceService_edit'));?>
		<?php echo $this->Form->button('Cancel',array('type'=>'reset','name'=>'reset','id'=>'Cancel'));?>
		<?php echo $this->Form->end();?>
</div>
</div>
 




