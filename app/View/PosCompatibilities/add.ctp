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
     <?php echo $this->Form->end();?>
  </div>
  <div style="clear: botd;"></div>
</div>
<?php //==================end of  search=============//?>

  <div class="clr"></div>
  <div class="flexigrid" style="width: 100%;" id="viewlist">
   <div class="bDiv" style="height: auto; width:733px; ">
		  <div class="hDiv"> 
    <div class="hDivBox">
      <table cellpadding="0" cellspacing="0">
        <thead>
           <tr>
            <th align="left" ><div style=" width: 140px;">Product</div></th>
			<th align="left" ><div style=" width: 85px;">Category</div></th>
			<th align="left" ><div style=" width: 85px;">Brand</div></th>
			<th align="left" ><div style=" width: 62px;">Stock </div></th>
			<th align="left" ><div style=" width: 80px;">Unit Price</div></th>
			<th align="left" ><div style=" width: 75px;">Quantity</div></th>
			<th align="left" ><div style=" width: 50px;">Action</div></th>
           </tr>
        </thead>
      </table>
    </div>
  </div>
  <div class="clr"></div>
        <div class="assesmentInventoryProductGrid">
        <?php
		  echo  $this->requestAction("AssesmentInventories/assesmentInventoryProductList/yes/".$assesment_id, array("return")); ?>
        </div>
	
  </div>
</div>
 