<?php echo $this->Html->css(array('common/grid','module/AssesmentServices/add'));
	  echo $this->Html->script(array('common/form','common/jquery.validate','module/AssesmentServices/add'));?>     
       
<div class="assesmentServices form">
	
 		<div id="WrapperAssesmentServiceAssesmentId" class="microcontroll">
        <?php echo $this->Form->create('ServiceService');?>
 		<?php	echo $this->Form->input('ServiceService.assesment_id',array('div'=>false,'label'=>false,'type'=>'hidden','value'=>$assesment_id));?>
         <?php	echo $this->Form->label('ServiceService.name', __('Service '.': ', true) );?>
		<?php	echo $this->Form->input('ServiceService.name',array('div'=>false,'label'=>false,'class'=>' '));?>
 
   		<div class="button_area_filter">
		   <?php echo $this->Form->button('Search',array( 'class'=>'submit', 'id'=>'btn_AssesmentService_search'));?>      
           <?php  echo $this->Form->button('Reset',array('type'=>'reset','name'=>'reset','id'=>'btn_AssesmentService_reset'));?> 
            <?php echo $this->Form->end();?>    
   		  </div>
      </div>
 <?php //==================end of  search=============//?>
  <div class="clr"></div>
  <div class="flexigrid" style="width: 100%;" id="viewlist">
   <div class="bDiv" style="height: auto; width:733px; ">
		  <div class="hDiv"> 
    <div class="hDivBox" style="width:100% !important">
      <table cellpadding="0" cellspacing="0" width="100%">
        <thead>
           <tr>
               
                <th width="55%">Service</th>
                <th width="16%">Price</th>
                <th width="17%">Quantity</th>
				<th >Action</th>
           </tr>
        </thead>
      </table>
    </div>
  </div>
       <div class="clr"></div>
       
        <div class="assesmentInventoryServiceGrid">
        <?php echo  $this->requestAction("AssesmentServices/assesmentServiceServiceList/yes/".$assesment_id, array("return")); ?>
        </div>
</div>
<div class="overlaydivsmall" style="display:none;">&nbsp;</div>

 




