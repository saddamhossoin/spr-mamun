<div class="AccountsHeads form">
<?php echo $this->Form->create('AccountsHead');?>
        <div id="WrapperAccountsHeadParentId" class="microcontroll">
			<?php	echo $this->Form->label('AccountsHead.parent_id', __('Parent Head'.':<span class=star>*</span>', true) );?>
            <?php	 
            echo $this->Form->select('AccountsHead.parent_id',$AccountsHeadlists,array('div'=>false,'label'=>false,'class'=>'required','empty'=>'Please Select One'));?>
		</div>
        
		<div id="WrapperAccountsHeadTitle" class="microcontroll">
			<?php	echo $this->Form->label('AccountsHead.title', __('Head Name'.':<span class=star>*</span>', true) );?>
            <?php	echo $this->Form->input('AccountsHead.title',array('div'=>false,'label'=>false,'class'=>'required'));?>
 		</div>
        
          <span id="duplicateMessage" style="display:none;">Account Head exits. Please create another. </span>

		<div id="WrapperAccountsdescription" class="microcontroll">
			<?php	echo $this->Form->label('AccountsHead.description', __('Description'.':<span class=star></span>', true) );?>
            <?php	echo $this->Form->input('AccountsHead.description',array('div'=>false,'label'=>false,'class'=>''));?>
 		</div>
        
		<div id="WrapperAccountsHeadListRefference" class="microcontroll">
			<?php	echo $this->Form->label('AccountsHead.status', __('Status'.':', true) );?>
            <?php	echo $this->Form->checkbox('AccountsHead.status',array('div'=>false,'label'=>false,'class'=>''));?>
 		</div>
        <div id="WrapperAccountsHeadListRefference" class="microcontroll">
			<?php	echo $this->Form->label('AccountsHead.is_posted', __('Is Posted'.':', true) );?>
            <?php	echo $this->Form->checkbox('AccountsHead.is_posted',array('div'=>false,'label'=>false,'class'=>''));?>
 		</div>
        <div id="WrapperAccountsHeadListRefference" class="microcontroll">
			<?php	echo $this->Form->label('AccountsHead.is_deleteable', __('Is Deletable'.':', true) );?>
            <?php	echo $this->Form->checkbox('AccountsHead.is_deleteable',array('div'=>false,'label'=>false,'class'=>''));?>
 		</div>
        
        
 	 
        <div class="button_area">
			<?php echo $this->Form->button('Save',array( 'class'=>'submit', 'id'=>'btn_AccountsHead_add'));?>
            <?php echo $this->Form->button('Cancel',array('type'=>'reset','name'=>'reset','id'=>'Cancel'));?>
            <?php echo $this->Form->end();?>
        </div>
    </div>
 




