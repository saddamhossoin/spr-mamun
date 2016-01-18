<?php echo $this->Html->css(array('common/grid','module/AssesmentInventories/add'));
	  echo $this->Html->script(array('common/form','common/jquery.validate','module/AssesmentInventories/add'));?>
<?php echo $this->Form->create('AssesmentInventory',array('controller'=>'AssesmentInventory','action'=>'assesmentInventoryProductList'));?>  
  <div class="tDiv">
  <div class="tDiv2">
   <?php echo $this->Form->create('PosProduct',array('controller' => 'posProducts','action'=>'index' ));?>
   	<?php echo $this->Form->input('PosProduct.assesment_id',array('type'=>'hidden', 'value'=>$assesment_id));?>
  		<div id="WrapperInventorySearch" class="microcontroll">
			<?php echo $this->Form->label('PosProduct.name', __('Product'.': <span class="star"></span>', true) ); ?>
 			<?php echo $this->Form->input('PosProduct.name',array('type'=>'text','div'=>false,'label'=>false, 'size'=>25 ));?>
			<?php echo $this->Form->label('PosProduct.pos_brand_id', __('Brand'.': <span class="star"></span>', true) ); ?>
 			<?php  echo $this->Form->input('PosProduct.pos_brand_id',array('type'=>'select','options'=>$brand,'div'=>false,'label'=>false,'class'=>'required select2as','empty'=>'-- Select Brand --'));    ?>
 
	<?php   echo $this->Form->label('PosProduct.name', __('Category'.': <span class="star"></span>', true),array('id'=>'filtermodifyedby')  );  
			echo $this->Form->input('PosProduct.pos_pcategory_id',array('type'=>'select','options'=>$category,'div'=>false,'label'=>false,'class'=>'required select2as','empty'=>'-- Select Category --'));  
	  ?>
       <div class="button_area_filter">
		   <?php echo $this->Form->button('Search',array( 'class'=>'submit', 'id'=>'btn_AssesmentInventory_search'));?>      
           <?php  echo $this->Form->button('Reset',array('type'=>'reset','name'=>'reset','id'=>'btn_AssesmentInventory_reset'));?>     
   	  </div>
	</div>	
     <?php echo $this->Form->end(); ?>
     <div class="clr"></div>
  </div>
  <div style="clear: both;"></div>
</div> 
<?php //==================end of  search=============//?>
  <div class="flexigrid positionfixed" style="width: 100%;" id="viewlist" >

 <div class="bDiv" style="height: auto; width:753px; ">
   
		  <div class ="hDiv"> 
          
    <div class="hDivBox">
    
      <table cellpadding="0" cellspacing="0"  >
        <thead>
           <tr>
            <th align="left" width="35%">Product </th>
			<th align="left" width="12%">Category </th>
			<th align="left" width="12%">Brand </th>
			<th align="left" width="7%">Stock  </th>
			<th align="left" width="10%">Price </th>
			<th align="left" width="12%">Quantity </th>
			<th align="left" width="10%">Action </th>
           </tr>
        </thead>
      </table>
    </div>
  </div>
 </div>
 </div>
  <div class="clr"></div>
  <div class="flexigrid" style="width: 100%;" id="viewlist">
  
   
  <div class="clr"></div>
        <div class="assesmentInventoryProductGrid">
        <?php
		  echo  $this->requestAction("AssesmentInventories/assesmentInventoryProductList/yes/".$assesment_id, array("return")); ?>
        </div>
	
  </div>
</div>
<div class="overlaydivsmall" style="display:none;">&nbsp;</div>
<style type="text/css">
#invoice{
	
}
#positionfixed{
}
#AssesmentInventoryAssesmentInventoryProductListForm{
 
}

</style>

 