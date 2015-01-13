<?php echo $this->Html->script(array( 'module/Users/passwordstrengh')); 
    echo $this->Form->create('User',array('controller'=>'users','action'=>'add'));?>
 
 
        
 
 

	 
        
 <div class="button_area">	  
<?php  echo $this->Form->button('Save',array( 'class'=>'submit', 'id'=>'btn_user_add'));?>
<?php  echo $this->Form->button('Cancel',array('type'=>'reset','name'=>'reset','id'=>'Cancel'));?>
 </div>
</div>
