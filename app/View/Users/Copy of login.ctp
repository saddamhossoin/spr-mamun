<script type="text/javascript">var siteurl = "<?php echo $this->request->webroot;?>"</script>
<?php echo $this->Html->css(array('ui-10/ui.base','ui-10/ui.login' ,'themes/black_rose/ui', 'common/common')); ?>

 <script type="text/javascript">
$(document).ready(function() {
	// Tabs
	$('#tabs, #tabs2, #tabs5').tabs();
});
</script>
 <div id="tabs">
  <ul>
    <li><a href="#login">Login</a></li>
     <li><a href="#forgetpass"><?php echo __('Forgot Password');?></a></li>
  </ul>
  <div id="login">
 	 <?php echo $this->Html->script(array('module/Users/login','common/form','common/jquery.validate')); ?>
  <?php echo $this->Html->css(array('module/Users/login')); ?>
  
    <?php echo $this->Session->flash(); ?>
    <?php echo $this->Form->create('User',array('controller'=>'users','action'=>'login'));?>
    <ul>
      <li> <?php echo $this->Form->label('User.email_address', __('Email'.': <span class="desc star"></span>') ); ?>
        <div> <?php echo $this->Form->input('User.email_address',array('type'=>'text','div'=>false,'label'=>false, 'size'=>35, 'class'=>'required email' ));?> </div>
      </li>
      <li> <?php echo $this->Form->label('User.password', __('Password'.': <span class="desc star"></span>') ); ?>
        <div> <?php echo $this->Form->input('User.password',array('type'=>'password','div'=>false,'label'=>false, 'size'=>35, 'class'=>'required' ));?> </div>
		<br />
        <?php echo  $this->Form->input('auto_login', array('type' => 'checkbox', 'label' => false,'div'=>false));?> <?php echo  __('Remember me (Keep me logged in for 1 weeks unless I log out)?'); ?> </li>
      <li class="buttons">
        <div>
          <?php  echo $this->Form->button('Login',array( 'class'=>'ui-state-default ui-corner-all float-right ui-button', 'id'=>'btn_user_login'));?>
          <?php  echo $this->Form->button(__('Cancel'),array('type'=>'reset','name'=>'reset','id'=>'Cancel','class'=>'ui-state-default ui-corner-all float-right ui-button'));?>
    </div>
   </li>
     </ul>
    <?php echo $this->Form->end(); ?> </div>
	
	 <div id="forgetpass"> 
   <?php echo $this->Form->create('User',array('controller'=>'users','action'=>'forgetpwd'));?>
    <ul>
      <li> <?php echo $this->Form->label('User.email_address', __('Email'.': <span class="desc star">*</span>') ); ?>
        <div> <?php echo $this->Form->input('User.email_address',array('type'=>'text','div'=>false,'label'=>false, 'size'=>35, 'class'=>'required email' ));?> </div>
      </li>
       <li class="buttons">
        <div>
          <?php  echo $this->Form->button('Email Send',array( 'class'=>'ui-state-default ui-corner-all float-right ui-button', 'id'=>'btn_user_forget'));?>
          <?php  echo $this->Form->button('Cancel',array('type'=>'reset','name'=>'reset','id'=>'Cancel','class'=>'ui-state-default ui-corner-all float-right ui-button'));?>
    </div>
   </li>
     </ul>
    <?php echo $this->Form->end(); ?> 
        </div>
</div>
