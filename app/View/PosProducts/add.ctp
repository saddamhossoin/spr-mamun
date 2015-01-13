<?php echo $this->Html->script('jquery.form');
echo $this->Html->css(array('common/grid'));
?>
<div class="posProducts ">
<?php echo $this->Form->create('PosProduct',array('enctype' => 'multipart/form-data','type'=>'file'));?>
 		<div id="ProductArea">
            <div id="left">
               <?php 	$return_arr = array();
					 	foreach($posProducts as $key=>$posproduct){
							$row_array['label'] = $posproduct;
							$row_array['actor'] = "$key";
							array_push($return_arr,$row_array);
						}
	  			?>
 	  <script>
 	   var data = '';
	   var data =  <?php echo json_encode($return_arr); ?>;
 	  </script>
       
            <div id="WrapperPosProductPosBrandId" class="microcontroll">
            <?php	echo $this->Form->label('PosProduct.pos_brand_id', __('Brand'.':<span class=star>*</span>', true) );?>
            <?php	echo $this->Form->input('PosProduct.pos_brand_id',array('div'=>false,'label'=>false,
            'empty'=>'Please select Brand','class'=>'required select2as commonbrand'));?>
             
            <div class="button_area" id="addNewDeviceButton">
            <?php echo $this->Form->button('+ Brand',array('type'=>'button','name'=>'addNewDevice','id'=>'addNewBrand'));?></div>
            </div>
            <div id="WrapperPosProductPosPcategoryId" class="microcontroll">
            <?php	echo $this->Form->label('PosProduct.pos_pcategory_id', __('Category'.':<span class=star>*</span>', true) );?>
            <?php	echo $this->Form->input('PosProduct.pos_pcategory_id',array('div'=>false,'label'=>false,'empty'=>'Please select Category','class'=>'required select2as'));?>
            <div class="button_area" id="addNewDeviceButton">
            <?php echo $this->Form->button('+ Category',array('type'=>'button','name'=>'addNewDevice','id'=>'addNewCategory'));?></div>
            </div>
            <div id="WrapperPosProductName" class="microcontroll">
            <?php	echo $this->Form->label('PosProduct.name', __('Name'.':<span class=star>*</span>', true) );?>
            <?php	echo $this->Form->input('PosProduct.name',array('div'=>false,'label'=>false,'class'=>'required'));?>
            <span id="duplicateMessage" style="display:none;">Product exits. Please create another. </span>
            
            </div>
            <div id="WrapperPosProductPurchaseprice" class="microcontroll">
            <?php	echo $this->Form->label('PosProduct.purchaseprice', __('Purchase Price'.':<span class=star>*&nbsp;</span>', true) );?>
            <?php	echo $this->Form->input('PosProduct.purchaseprice',array('div'=>false,'label'=>false,'class'=>'number required two_digit'));?>
            </div>
    
            <div id="WrapperPosProductSalesprice" class="microcontroll">
            <?php	echo $this->Form->label('PosProduct.salesprice', __('Sales Price'.':<span class=star>*&nbsp;</span>', true) );?>
            <?php	echo $this->Form->input('PosProduct.salesprice',array('div'=>false,'label'=>false,'class'=>'number required two_digit'));?>
            </div>
            
            <div id="WrapperPosProductreorder" class="microcontroll">
            <?php	echo $this->Form->label('PosProduct.reorder', __('Reorder'.':<span class=star>*&nbsp;</span>', true) );?>
            <?php	echo $this->Form->input('PosProduct.reorder',array('div'=>false,'label'=>false,'class'=>'number required two_digit' , 'value'=>0));?>
            </div>
			
			 <?php $status=array(1=>"Only Inventory",2=>"Only Service",3=>"Both");?>
            <div id="WrapperPosProductstatus" class="microcontroll">
            <?php	echo $this->Form->label('PosProduct.status', __('Status'.':<span class=star>*&nbsp;</span>', true) );?>
             <?php  echo $this->Form->input('PosProduct.status',array('type'=>'select','options'=>$status,'div'=>false,'label'=>false,'class'=>'required select2as','empty'=>'--Select Status --'));    ?>
            </div>
             <div id="WrapperPosProductbox_no" class="microcontroll">
            <?php	echo $this->Form->label('PosProduct.box_no', __('Box No'.':<span class=star>&nbsp;</span>', true) );?>
            <?php	echo $this->Form->input('PosProduct.box_no',array('div'=>false,'label'=>false));?>
            </div>
            
             </div>
             <div id="right">
            <div id="WrapperPosProductDescription" class="microcontroll">
            <?php	echo $this->Form->label('PosProduct.description', __('Description'.':<span class=star>&nbsp;</span>', true) );?>
            <?php	echo $this->Form->input('PosProduct.description',array('div'=>false,'type'=>'textarea','label'=>false,'style'=>'height:70px'));?>
            </div>
			<div id="WrapperPosProductColor" class="microcontroll">
		 <?php echo $this->Form->label('PosProductColor.color_id', __(' Color'.': <span class="star"></span>', true) ); ?>
 		 <?php echo $this->Form->select('PosProductColor.color_id',  $posProductcolors ,array('div'=>false,'label'=>false,'multiple'=>'multiple','class'=>''));?> 	 
	 	</div>
         
            <div id="WrapperPosProductImage" class="microcontroll">
            <?php	echo $this->Form->label('PosProduct.image', __('Image'.':<span class=star></span>', true) );?>
            <?php   echo $this->Form->input('PosProduct.image',array('type'=>'file','div'=>false,'label'=>false,'class'=>'' ));   ?>     
            </div>
		   
             <div id="WrapperPosProductPosTypeId1" class="microcontroll">
            <?php	echo $this->Form->label('PosProduct.pos_type_id', __('Type'.':<span class=star>*</span>', true) );?>
            <?php  echo $this->Form->input('PosProduct.pos_type_id',array('type'=>'select','options'=>$posTypes,'div'=>false,'label'=>false,'class'=>'required select2as','empty'=>'--Select Types --'));    ?>
            </div>
			
			<div id="WrapperPosProductBarcode" class="microcontroll">
            <?php	//echo $this->Form->label('PosProduct.pos_type_id', __('Type'.':<span class=star>*</span>', true) );?>
            <?php  //echo $this->Form->input('PosProduct.pos_type_id',array('type'=>'select','options'=>$posTypes,'div'=>false,'label'=>false,'class'=>' select2as','empty'=>'--Select Types --'));    ?>
            </div>
            
			</div>
        </div>
        <div class="clr"></div>
		
		<div class="bDiv showDivCompatability" style="height: auto; display:none;">
		<div class="compatability_title"> Compatibility</div>
 
  	 <table cellspacing="0" cellpadding="0" border="0"   class=" view_table" width="100%">
	   <thead>
			<tr>
			<th width="46%">Product</th>
			<th width="22%">Category</th>
			<th width="22%">Brand</th>
			<th width="10%">Action</th>
			</tr>
	   </thead>
    <tbody class="gridCompatibilityList">
 		 
 </tbody>
     </table>
     </div>
         <div class="button_area">
		<?php echo $this->Form->button('Save',array( 'class'=>'submit', 'id'=>'btn_PosProduct_add'));?>
		<?php echo $this->Form->button('Cancel',array('type'=>'reset','name'=>'reset','id'=>'Cancel'));?>
		<?php echo $this->Form->end();?>
</div>

<br />
<div id="ComaptitbilityGrid2" style="display:none;">
 
        <div id="CompitablityArea">
         <?php echo $this->Form->create('PosCompatibility',array('controller'=>'PosCompatibilities','action'=>'parentProductList'));?>  
    		<div id="WrapperInventorySearch" class="microcontroll">
			<?php echo $this->Form->label('PosCompatibility.name', __('Product'.': <span class="star"></span>', true) ); ?>
 			<?php echo $this->Form->input('PosCompatibility.name',array('type'=>'text','div'=>false,'label'=>false, 'size'=>25 ));?>
			<?php echo $this->Form->label('PosCompatibility.pos_brand_id', __('Brand'.': <span class="star"></span>', true) ); ?>
 			<?php  echo $this->Form->input('PosCompatibility.pos_brand_id',array('type'=>'select','options'=>$posBrands,'div'=>false,'label'=>false,'class'=>'required select2as','empty'=>'-- Select Brand --'));    ?>
 
	<?php   echo $this->Form->label('PosCompatibility.name', __('Category'.': <span class="star"></span>', true),array('id'=>'filtermodifyedby')  );  
			echo $this->Form->input('PosCompatibility.pos_pcategory_id',array('type'=>'select','options'=>$posPcategories,'div'=>false,'label'=>false,'class'=>'required select2as','empty'=>'-- Select Category --'));  
	  ?>
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
        <?php  echo  $this->requestAction("PosCompatibilities/parentProductList/yes/", array("return")); ?></div>
   </div>
    <div class="overlaydivsmall" style="display:none;"></div>
</div>
</div>
        
</div>
<div class="clr"></div>
 
</div>
<style>
#ProductArea .microcontroll label{
	float:left !important;
}
</style>
 