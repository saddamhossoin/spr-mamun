<?php echo $this->Html->script(array('module/Users/online_user_dashboard'));?>
<?php echo $this->Html->script(array('alert/alert')); ?>
<?php echo $this->Html->css(array('alert/css/alert','alert/themes/default/theme')); ?>



<div class="online_dashboard">
<h1 style="font-weight:bold; font-size:25px; text-align:center">Welcome</h1>
<p class="user_name">
<?php /*?>Your Full Name: <?php echo $this->Session->read('Auth.User.firstname');?> <br />
Your Email Address: <?php echo $this->Session->read('Auth.User.email_address');?> <?php */?>

</p>
 </div>
 
 <script>
 </script>
 
 <style>
 .online_dashboard{
	 height:100px;
	 width:285px;
	 margin:85px auto auto;
	 }
.user_name{
	color:#003300;
	font-size:14px;
	margin-top:20px;
	}
 </style>