<?php //pr($this->data); ?>
 <div class="menus form">
<?php echo $this->Form->create('Menu',array('controller'=>'menus', 'action'=>'edit'));?>
<?php echo $this->Form->input('id');?>
   	 <?php  $menutype = array('topmenu'=>'Top Menu', 'fottermenu'=>'Fotter Menu','reportmenu'=>'Report Menu','rightmenu'=>'Right Menu');?>
	<div id="WrapperMenuMenuType" class="microcontroll">
			<?php echo $this->Form->label('Menu.menu_type', __('Menu Type'.': <span class="star">*</span>', true) ); ?>
 			<?php echo $this->Form->select('Menu.menu_type',$menutype,array( 'div'=>false,'label'=>false,   'class'=>'required' ));?>
	 		 
	 	</div>
		
	<div id="WrapperMenuParentId" class="microcontroll">
			<?php echo $this->Form->label('Menu.parent_id', __('Parent Id'.': <span class="star">*</span>', true) ); ?>
 			<?php  echo $this->Form->select('Menu.parent_id',$parentMenus,array( 'div'=>false,'label'=>false,  'class'=>'required' ));?>
	 		 
	 	</div>
		
	<div id="WrapperMenuName" class="microcontroll">
			<?php echo $this->Form->label('Menu.name', __('Name'.': <span class="star">*</span>', true) ); ?>
 			<?php echo $this->Form->input('Menu.name',array('type'=>'text','div'=>false,'label'=>false, 'size'=>35, 'class'=>'required' ));?>
	 		 
	 	</div>
		<div id="WrapperMenuNolink" class="microcontroll">
			<?php echo $this->Form->label('Menu.nolink', __('No Link'.': <span class="star">*</span>', true) ); ?>
 			<?php echo $this->Form->checkbox('Menu.nolink',array( 'div'=>false,'label'=>false,   'class'=>'required' ));?>
	 		 
	 	</div>
				<div style="clear:both"></div>

		<div id="WrapperMenucontroller" class="microcontroll">
			<?php echo $this->Form->label('Menu.controller', __('controller'.': <span class="star">*</span>', true) ); ?>
 			<?php echo $this->Form->select('Menu.controller',$controllers,array('div'=>false,'label'=>false,  'class'=>'required' ,'empty'=>'Please Select One'));?>
	 	</div>
		<div id="WrapperMenuaction" class="microcontroll">
			<?php echo $this->Form->label('Menu.action', __('action'.': <span class="star">*</span>', true) ); ?>
 			<?php echo $this->Form->select('Menu.action',null,array('empty'=>'--- Please Select One ---', 'div'=>false,'label'=>false,   'class'=>'required' ));?>
	 		 
	 	</div>
		<div id="WrapperExtra" class="microcontroll">
			<?php echo $this->Form->label('Menu.action_extra', __('Action Extra'.': <span class="star">*</span>', true) ); ?>
 			<?php echo $this->Form->input('Menu.action_extra',array('type'=>'text','div'=>false,'label'=>false, 'size'=>35  ));?>
 
	 	</div>
		<div id="WrapperMenuactive" class="microcontroll">
			<?php echo $this->Form->label('Menu.active', __('Active'.': <span class="star">*</span>', true) ); ?>
 			<?php echo $this->Form->checkbox('Menu.active',array( 'div'=>false,'label'=>false,   'class'=>'required' ));?>
	 		 
	 	</div>
 	<div class="button_area" style="clear:both">	  
<?php  echo $this->Form->button('Save',array( 'class'=>'submit', 'id'=>'btn_Menu_add'));?>
<?php  echo $this->Form->button('Cancel',array('type'=>'reset','name'=>'reset','id'=>'Cancel'));?>
 </div>
<?php echo $this->Form->end();?>
</div>
 