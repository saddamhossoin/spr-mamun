<?php echo $this->Html->script(array('jquery.form','module/ServiceDevices/add_service_from_product'));
	echo $this->Html->css(array('common/grid','module/PosProducts/add'));
?>
	<div id="ComaptitbilityGrid2" style="display:block;">
         <div id="CompitablityArea">
         <?php echo $this->Form->create('ServiceDevice',array('controller'=>'ServiceDevice','action'=>'parentProductList'));?>  
    		<div id="WrapperInventorySearch" class="microcontroll">
			<?php echo $this->Form->label('PosProduct.name', __('Product'.': <span class="star"></span>', true) ); ?>
 			<?php echo $this->Form->input('PosProduct.name',array('type'=>'text','div'=>false,'label'=>false, 'size'=>25 ));?>
			<?php echo $this->Form->label('PosProduct.pos_brand_id', __('Brand'.': <span class="star"></span>', true) ); ?>
 			<?php  echo $this->Form->input('PosProduct.pos_brand_id',array('type'=>'select','options'=>$brands,'div'=>false,'label'=>false,'class'=>'required select2as','empty'=>'-- Select Brand --'));    ?>
 
			<?php  
			 echo $this->Form->label('PosProduct.name', __('Category'.': <span class="star"></span>', true),array('id'=>'filtermodifyedby')  );  
			echo $this->Form->input('PosProduct.pos_pcategory_id',array('type'=>'select','options'=>$categories,'div'=>false,'label'=>false,'class'=>'required select2as','empty'=>'-- Select Category --')); ?>
 		   <?php echo $this->Form->button('Search',array( 'class'=>'submit', 'id'=>'btn_PosCompatability_search'));?>      
           <?php  echo $this->Form->button('Reset',array('type'=>'reset','name'=>'reset','id'=>'btn_PosCompatability_reset'));?>  
           <?php echo $this->Form->end();?>   
   	 <div style="clear: botd;"></div>
   </div>
  <div style="clear: botd;"></div>
</div>
<?php //==================end of  search=============//?>
   		<div class="clr"></div>
 		<div class="flexigrid" style="width: 100%;" id="viewlist">
   <div class="bDiv" style="height: auto; width:100%; ">
		  <div class="hDiv"> 
    <div class="hDivBox">
      <table cellpadding="0" cellspacing="0" width="100%">
        <thead>
           <tr>
            <th align="left" width="40%"> Product </th>
			<th align="left" width="25%">Category</th>
			<th align="left" width="25%">Brand</th>
 			<th align="left" width="10%">Action</th>
           </tr>
        </thead>
      </table>
    </div>
  </div>
  <div class="clr"></div>
        <div class="posCompatabilityProductGrid">
        <?php
		   echo  $this->requestAction("ServiceDevices/parentProductList/yes/", array("return")); ?>
        </div>
   </div>
</div>
</div>