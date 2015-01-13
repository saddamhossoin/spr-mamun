     
       
<div class="lookups form">
<?php echo $this->Form->create('Lookup');?>
	<fieldset>
		<legend> </legend>
        
        <div id="WrapperLookupParentId" class="microcontroll">
				<?php	echo $this->Form->input('Lookup.id',array('div'=>false,'label'=>false,'class'=>'required'));?>

		<?php	echo $this->Form->label('Lookup.parent_id', __('Parent Id'.':<span class=star>*</span>', true) );?>
		<?php	 
 		echo $this->Form->select('Lookup.parent_id',$lookuplists,array('div'=>false,'label'=>false,'class'=>'required','empty'=>'Please Select One'));?>
		</div>
        
		<div id="WrapperLookupTitle" class="microcontroll">
		<?php	echo $this->Form->label('Lookup.title', __('Title'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('Lookup.title',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperLookupListRefference" class="microcontroll">
		<?php	echo $this->Form->label('Lookup.list_refference', __('List Refference'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('Lookup.list_refference',array('div'=>false,'label'=>false,'class'=>''));?>
        <span class="example"> (Write something for parent.)</span>
		</div>
 	</fieldset>
        <div class="button_area">
			<?php echo $this->Form->button('Save',array( 'class'=>'submit', 'id'=>'btn_Lookup_add'));?>
            <?php echo $this->Form->button('Cancel',array('type'=>'reset','name'=>'reset','id'=>'Cancel'));?>
            <?php echo $this->Form->end();?>
        </div>
    </div>
 



 