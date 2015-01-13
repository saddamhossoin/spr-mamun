<div class="serviceDevices">
<?php echo $this->Form->create('ServiceDevice');?>
	<fieldset>
		<legend> </legend>
<div id="WrapperServiceDeviceBrandId" class="microcontroll">
		<?php	echo $this->Form->label('ServiceDevice.pos_brand_id', __('Brand '.':<span class=star>*</span>', true) );?>
		 	<?php echo $this->Form->select('ServiceDevice.pos_brand_id',  $brand, array('div'=>false,'label'=>false, 'empty'=>'-- Please Select Brand --', 'class'=>'required select2as commonbrand'));?>
         </div>
		 <div class="button_area" id="addNewBrandButton">
        <?php echo $this->Form->button('+ Brand',array('type'=>'button','name'=>'addNewDevice','id'=>'addNewBrand'));?>
		</div>
          <div id="WrapperServiceDevicePcategoryId" class="microcontroll">
		<?php	echo $this->Form->label('ServiceDevice.pos_pcategory_id', __('Category '.':<span class=star>*</span>', true) );?>
	 	<?php echo $this->Form->select('ServiceDevice.pos_pcategory_id',  $type, array('div'=>false,'label'=>false, 'empty'=>'-- Please Select Category --', 'class'=>'required select2as'));?>
        
		 </div>
		 <div class="button_area" id="addNewCategoryButton">
        <?php echo $this->Form->button('+ Category',array('type'=>'button','name'=>'addNewDevice','id'=>'addNewCategory'));?></div>
		<div class="clr" style="clear:both"></div>
		
		<div id="WrapperServiceDeviceName" class="microcontroll">
		<?php	echo $this->Form->label('ServiceDevice.name', __('Name'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('ServiceDevice.name',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>
 		<div id="WrapperServiceDeviceDescription" class="microcontroll">
		<?php	echo $this->Form->label('ServiceDevice.description', __('Description'.':', true) );?>
		<?php	echo $this->Form->input('ServiceDevice.description',array('div'=>false,'label'=>false,'class'=>''));?>
		</div>


	</fieldset>
<div class="button_area">
		<?php echo $this->Form->button('Save',array( 'class'=>'submit', 'id'=>'btn_ServiceDevice_add'));?>
		<?php echo $this->Form->button('Cancel',array('type'=>'reset','name'=>'reset','id'=>'Cancel'));?>
		<?php echo $this->Form->end();?>
</div>
</div>
 <style type="text/css">
 #WrapperServiceDeviceBrandId,#WrapperServiceDevicePcategoryId{
 	width:360px;
	float:left;}
#addNewBrandButton,#addNewCategoryButton{
	width:100px;
	float:left;
   	}
#addNewBrand{
	width:85px;}
#addNewCategory{
	width:100px;}
 </style>
<?php  echo $this->Html->script(array('module/ServiceDevices/popup_add')); ?>



