   <?php  //pr( $_SESSION['Config']['language']);die();?><header>
<div id="header">
        <div id="header_left"> 
         <div id="logo">
         <a href="<?php echo $this->Html->url(array('controller'=>'Pages','action' => 'home'));?>">
         <?php echo $this->Html->image("wpage/logo.png", array("class"=>"attachment-post-thumbnail wp-post-image","alt" => "Logo" ,"width"=>"196","height"=>"169"));?></a>
         </div>
         </div>
        <div id="header_right">
          <div id="header_right_top">
         <div class="input-group-btn select" id="header_right_language">
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><span class="selected"> <?php if(empty($_SESSION['Config']['language']) || $_SESSION['Config']['language'] == 'ita' ){echo "ITALIANO";}else{echo "ENGLISH";}?></span> <span class="caret"></span></button>
                <ul class="dropdown-menu option" role="menu">
                 <?php if(empty($_SESSION['Config']['language']) && $_SESSION['Config']['language'] == 'ita' ){?>
				    <li id="Italy"><a href="<?php echo $this->Html->url('/');?>users/setLanguage/ita">ITALIANO</a></li>
                    <li id="English"><a href="<?php echo $this->Html->url('/');?>users/setLanguage/eng">ENGLISH</a></li>
					<?php }else{?>
                    <li id="English"><a href="<?php echo $this->Html->url('/');?>users/setLanguage/eng">ENGLISH</a></li>
                    <li id="Italy"><a href="<?php echo $this->Html->url('/');?>users/setLanguage/ita">ITALIANO</a></li>
					<?php }?>
                </ul>
        </div>
           <span class="phone"><a href="<?php echo $this->Html->url('/');?>">
         <?php //echo $this->Html->image("wpage/phone.png", array("class"=>"","alt" => "Connect" ,"width"=>"191","height"=>"47"));?></a></span>  
           </div>
           <div id="header_right_bottom" class="list">
            <ul>
              <div class="menu-mainmanu-container">
                <ul id="menu-mainmanu" class="nav-menu">
                  <li id="menu-item-1" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-11">
                  	<?php echo $this->Html->link(__(' '), array('controller'=>'Pages','action' => 'home'));?>
                  </li>
                  <li id="menu-item-2" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-12">
                     <?php echo $this->Html->link(__('SPARE PARTS'), array('controller'=>'PosBrands','action' => 'brand_list'));?>
                  </li>
                   <li id="menu-item-15" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-15">
                  	<?php echo $this->Html->link(__('ULTIMO ARRIVO'), array('controller'=>'pos_products','action' => 'latest_arrival'));?>
                  </li>
                  <li id="menu-item-3" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-13">
                 	 <?php echo $this->Html->link(__('REPAIRS PRICE'), array('controller'=>'ServiceServices','action'=>'brand'));?>
                  </li>
                  <li id="menu-item-14" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-14">
                  	<?php echo $this->Html->link(__('TRACKING'), array('controller'=>'ServiceDeviceInfos','action' => 'checkStatus'));?> 
                  </li>
                  <li id="menu-item-15" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-15">
                  	<?php echo $this->Html->link(__('CONTACTS'), array('controller'=>'Pages','action' => 'contact_us'));?> 
                  </li>
                 
                 <li id="menu-item-19" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-15">
				 	
					 <?php $userid = $this->Session->read('Auth.User.id');
 					 if(empty($userid)){ 
							 echo $this->Html->link(__('LOGIN'), array('controller'=>'Users','action' => 'login'));
						 }else{
							 echo $this->Html->link(__('ACCOUNTS'), array('controller'=>'Users','action' => 'admindashboard'));
							 ?>
                             <div class="submenu" style="display:none;"><?php echo $this->Html->link(__('LOG OUT'), array('controller'=>'Users','action' => 'logout')); ?></div>
                             <?php
						 }
    				 ?>
                 </li>
                </ul>
              </div>
            </ul>
          </div>
          
        </div>
      </div>
  </header>
<style>
.submenu{
   	margin-left: 653px;
	margin-top: 16px;
	position: absolute;
	z-index: 9999;
}
.submenu a{
	border-radius: 0 !important;
	padding: 10px 27px !important;
}
</style>
   <script type="text/javascript">
  jQuery(function($){ 
   
 $("#menu-item-19").mouseenter(function(event)
    {
        event.stopPropagation()
        $(".submenu").fadeIn();
    }).mouseleave(function(event)
    {
        event.stopPropagation()
        $(".submenu").fadeOut();
    })

});
</script>