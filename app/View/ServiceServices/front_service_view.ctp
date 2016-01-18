<?php  //pr($service_devices);?>
<?php echo $this->Html->css(array('module/ServiceServices/front_service_view'));?>
<?php echo $this->Html->css(array('module/ServiceServices/dropdown-menu'));?>
<?php echo $this->Html->script(array('module/ServiceServices/dropdown-menu.min'));?>
         
<ul id="example4" class="dropdown-menu">
  <?php
  
 	foreach ($service_devices as $service_device){?>
     <li>
       <a href="#"><?php  echo $service_device['ServiceDevice']['name']; ?></a>
        <ul>
         <?php  foreach($service_device['ServiceDevicesService'] as $service){?>
            <li>
                <a href="#"><?php    
				echo $servicelists[$service['service_service_id'] ];?></a>
                 <ul>
                    <li><a href="#">&euro; <?php   echo $service['price'];?></a></li>
                 </ul>
             </li>
             <?php } ?>
         </ul>
    </li>
   <?php }?>
</ul>

<script type="text/javascript">
$(function() {
    $('#example4').dropdown_menu({
        sub_indicators : true,
        vertical : true
    });
});
</script>

<style type="text/css">
#example4 {
    width: auto;
}
</style>

       