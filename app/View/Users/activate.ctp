<div class="sendmailmsg">
<?php // echo $this->Session->flash();?>
<?php if(!isset($invalidkey)){ ?>
Congratulations!<br>Your account is active now.
<br /><br />
Please <?php echo $this->Html->link('Click Here', array( 'controller'=>'users','action'=>'login'),array('class'=>'login-link')); ?>
 to login<br>
<?php } else if ($invalidkey == 2){?>
Your account is already activated.
<br /><br />
Please <?php echo $this->Html->link('Click Here', array( 'controller'=>'users','action'=>'login'),array('class'=>'login-link')); ?>
 to login<br>
<?php }else{?>
Invalid activation key
<?php } ?>
</div>