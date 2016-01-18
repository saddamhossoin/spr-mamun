<?php echo $this->Html->script(array('module/ServiceServices/brand')); ?>
<?php echo $this->Html->css(array('ui-10/jquery-ui-1.10.4.custom.min')); ?>
<?php  echo $this->Html->script(array('common/form','common/jquery.validate'));  ?>

<br />
<div>
	<div class="leftpan">
		<div class="header">Brand</div>
        <ul id="brands" class="product_brand">
		  <?php
         // pr($posBrands );die();
            foreach ($brandlists as $posBrand){?>
             <li>
                <?php   echo $this->Html->link($posBrand['PosBrand']['name'], array('controller'=>'ServiceDevices','action'=>'servicePrice','Brand',$posBrand['PosBrand']['slug']));?>
				 
              </li>
           <?php }?>
        </ul>
	</div>
    <div class="rightpan">
    
<ul id="brandslist" class="product_brand">
<div class="header searchbox"> 
<?php echo $this->Form->create('ServiceService',array('controller'=>'ServiceServices','action'=>'brand'));?>
 <?php	echo $this->Form->input('ServiceService.brand',array('div'=>false,'label'=>false,'class'=>'required' ,'placeholder'=>'Search'));?>
 <?php echo $this->Form->button('Search',array( 'class'=>'submit', 'id'=>'btn_brand_search'));?>
  <?php echo $this->Form->button('Reset',array( 'class'=>'submit', 'id'=>'btn_brand_reset','type'=>'reset','onClick'=>"parent.location='".$this->webroot."ServiceServices/brand/yes'"));?>
   </div>
   
    <?php 
	 $userid = $this->Session->read('Auth.User.id');
	 $user_info = $this->Session->read('Auth.User');
	//  pr($this->Session->read('Auth.User'));
	 if(empty($userid)){?>
     <br /><br />
 	    <div class="login_info_div">
                 <div class="col" id="address_name">
                     <div class="" id="register_div">
                     <div id="user">
						<p class=""> <?php echo __("Sign in to your account to use a saved address, and continue checkout")?>.</p>
					</div>
                        <br />
                        <?php  echo $this->Form->button(__('Login'), array('class' => 'btn btn-default btn-warning','id'=>'register_popup'));?>
                         <br />
                        <h2 class="sd-txtA"><?php echo __("New to SPR")?>?</h2>
                       	 <?php echo __("Account Benefits , View Order History , Track your service status")?>
                        <br />
                       
                        <?php  echo $this->Form->button(__('Register'), array('class' => 'btn btn-default btn-warning','id'=>'register_btn'));?>
                     </div>
                        <br />
                </div>
     </div>
    	 <?php }
     else if($user_info['is_service_price']!=1 && $user_info['type_of_user']==3){

         echo "<div class='dont_show_price_msg'>Sorry you are registerd but not permitted to see the repair price. Please contact with admin:";
         echo $this->Form->button('Contatti',array('type'=>'reset','name'=>'reset','id'=>'Cancel','class'=>'panel-warning', 'onClick'=>"parent.location='".$this->webroot."Pages/contact_us'"))."</div>";
     }
     else{
         
   
 	foreach ($posBrands as $posBrand){?>
     <li>
       <span> <?php  echo $posBrand['PosBrand']['name']; ?> </span>
       <?php if(!empty($posBrand['PosBrand']['image'])) {?>
                   <a href=""> <?php  echo $this->Html->image('../'.$posBrand['PosBrand']['image'], array("alt" => "No Image","width"=>"78" ,"height"=>"58","border"=>"0",'url' => array('controller' => 'ServiceDevices',  'action' =>'servicePrice','Brand',$posBrand['PosBrand']['slug'])));?></a>
         <?php }else{?>
 		           <?php  echo $this->Html->image('/img/wpage/noimage.jpg', array("alt" => "No Image","width"=>"78" ,"height"=>"58","border"=>"0"));?>
 		<?php }?>
     </li>
   <?php }}?>
</ul>
    </div>


</div>
<div style="clear:both"></div>
<br /><br />

 

       