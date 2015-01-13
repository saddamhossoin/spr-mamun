<?php if(is_array($value)){?>
<span style="white-space:nowrap"> Email :: <?php echo $value['User']['email_address']?> </span>
<span> already have an user.Please login to access your account.</span>
<span><?php echo $this->Html->link(__('Login'), array('controller'=>'users','action'=>'login', $value['User']['id'])); ?> </span>
<?php } else
{
	echo $value;
}

?>