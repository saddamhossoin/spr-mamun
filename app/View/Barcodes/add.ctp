<div class="barcodes form">
<?php echo $this->Form->create('Barcode');?>
	 
     <div id="WrapperBarcodeBarcode" class="microcontroll">
		<?php	echo $this->Form->label('Barcode.lot_number', __('Lot Number'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('Barcode.lot_number',array('div'=>false,'label'=>false,'class'=>'required','readonly'=>'readonly','value'=>$lotNumber[0]['maxlot']+1));?>
	  </div>
      
      
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
	  
 		  	<div id="WrapperPosProductName" class="microcontroll ui-widget"> 
		 <?php echo $this->Form->label('Barcode.pname', __('Product Name'.': <span class="star">*</span>', true) ); ?>
         
          	<?php echo $this->Form->hidden('Barcode.pid',array('id'=>'product_id','div'=>false,'label'=>false, 'size'=>35, 'class'=>'required'  ));?>
			<?php echo $this->Form->input('Barcode.name',array('type'=>'text','div'=>false,'label'=>false, 'size'=>35, 'class'=>'required'  ));?>
			  
            </div>
            
            
	  <div id="WrapperBarcodeBarcode" class="microcontroll">
		<?php	echo $this->Form->label('Barcode.number', __('Number Of Barcode'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('Barcode.number',array('div'=>false,'label'=>false,'class'=>'required'));?>
	  </div>
 
	<div class="button_area">
		<?php echo $this->Form->button('Create',array( 'class'=>'submit', 'id'=>'btn_Barcode_add'));?>
		<?php echo $this->Form->button('Cancel',array('type'=>'reset','name'=>'reset','id'=>'Cancel'));?>
		<?php echo $this->Form->end();?>
	</div>
</div>
<style>
.microcontroll label{
	width:149px !important;
}
</style>
 




