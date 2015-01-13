<div class="toolsMenus form">
<?php echo $this->Form->create('ToolsMenu');?>
	<fieldset>
		<legend> </legend>
		<div id="WrapperToolsMenuName" class="microcontroll">
		<?php	echo $this->Form->label('ToolsMenu.name', __('Name'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('ToolsMenu.name',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

 	 	<?php  $toolsclass = $_SESSION['ToolsClass'];?>
     
		<div id="WrapperToolsMenuClass" class="microcontroll">
		<?php	echo $this->Form->label('ToolsMenu.class', __('Class'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->select('ToolsMenu.class',$toolsclass,array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperToolsMenuController" class="microcontroll">
		<?php	echo $this->Form->label('ToolsMenu.controller', __('Controller'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->select('ToolsMenu.controller',$controllers,array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperToolsMenuAction" class="microcontroll">
		<?php	echo $this->Form->label('ToolsMenu.action', __('Action'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->select('ToolsMenu.action',null,array('empty'=>'--- Please Select One ---', 'div'=>false,'label'=>false,   'class'=>'required' ));?>
		</div>

		<div id="WrapperToolsMenuLinkController" class="microcontroll">
		<?php	echo $this->Form->label('ToolsMenu.link_controller', __('Link Controller'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->select('ToolsMenu.link_controller',$controllers,array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperToolsMenuLinkAction" class="microcontroll">
		<?php	echo $this->Form->label('ToolsMenu.link_action', __('Link Action'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->select('ToolsMenu.link_action',null,array('empty'=>'--- Please Select One ---', 'div'=>false,'label'=>false,   'class'=>'required' ));?>
		</div>

		<div id="WrapperToolsMenuActionExtra" class="microcontroll">
		<?php	echo $this->Form->label('ToolsMenu.action_extra', __('Action Extra'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('ToolsMenu.action_extra',array('div'=>false,'label'=>false,'class'=>''));?>
		</div>

		<div id="WrapperToolsMenuActive" class="microcontroll">
		<?php	echo $this->Form->label('ToolsMenu.active', __('Active'.':<span class=star>*</span>', true) );?>
		
		<?php echo $this->Form->checkbox('ToolsMenu.active',array( 'div'=>false,'label'=>false,   'class'=>'' ));?>
		 
		</div>

		<div id="WrapperToolsMenuUrl" class="microcontroll">
		<?php	echo $this->Form->label('ToolsMenu.idname', __('Specific ID'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('ToolsMenu.idname',array('div'=>false,'label'=>false,'class'=>''));?>
		</div>

		<div id="WrapperToolsMenuIsDeleteable" class="microcontroll">
		<?php	echo $this->Form->label('ToolsMenu.is_deleteable', __('Is Deleteable'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('ToolsMenu.is_deleteable',array('div'=>false,'label'=>false,'class'=>''));?>
		</div>
 	</fieldset>
<div class="button_area">
		<?php echo $this->Form->button('Save',array( 'class'=>'submit', 'id'=>'btn_ToolsMenu_add'));?>
		<?php echo $this->Form->button('Cancel',array('type'=>'reset','name'=>'reset','id'=>'Cancel'));?>
		<?php echo $this->Form->end();?>
</div>
</div>
 




