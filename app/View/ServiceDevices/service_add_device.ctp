<div class="serviceServices form">
 <?php echo $this->Html->css(array('common/grid' ));
	  echo $this->Html->script(array('common/form','common/jquery.validate','module/ServiceDevices/service_add_device' ));?>
<?php echo $this->Form->create('ServiceService',array('controller'=>'ServiceService','action'=>'serviceListForAssignDevice'));?>  
 <div class="tDiv">
  <div class="tDiv2">
	   <?php echo $this->Form->create('ServiceService',array('controller' => 'ServiceService','action'=>'index' ));?>
        <?php echo $this->Form->input('ServiceService.deviceid',array('type'=>'hidden', 'value'=>$deviceId));?>
            
        <div id="WrapperInventorySearch" class="microcontroll">
		<?php echo $this->Form->label('ServiceService.name', __('Service Name'.': <span class="star"></span>', true) ); ?>
        <?php echo $this->Form->input('ServiceService.name',array('type'=>'text','div'=>false,'label'=>false, 'size'=>25 ));?>
        </div> 
       <div class="button_area_filter">
		   <?php echo $this->Form->button('Search',array( 'class'=>'submit', 'id'=>'btn_Service_search'));?>      
           <?php  echo $this->Form->button('Reset',array('type'=>'reset','name'=>'reset','id'=>'btn_Service_reset'));?>     
   	  </div>
	</div>	
     <?php echo $this->Form->end();?>
  </div>
  <div style="clear: botd;"></div>
</div>
<?php //==================end of  search=============//?>

  <div class="clr"></div>
  <div class="flexigrid" style="width: 100%;" id="viewlist">
   <div class="bDiv" style="height: auto; width:753px; ">
		  <div class="hDiv"> 
    <div class="hDivBox">
      <table cellpadding="0" cellspacing="0">
        <thead>
           <tr>
            <th align="left" width="60%">Service</th>
 			<th align="left" width="20%">Price</th>
			<th align="left" width="20%">Action</th>
           </tr>
        </thead>
      </table>
    </div>
  </div>
  <div class="clr"></div>
        <div class="ServiceDeviceServiceGrid">
        <?php
		  echo  $this->requestAction("ServiceServices/serviceListForAssignDevice/yes/".$deviceId, array("return")); ?>
        </div>
	
  </div>
</div>
<div class="overlaydiv" style="display:none;">&nbsp;</div>




 



