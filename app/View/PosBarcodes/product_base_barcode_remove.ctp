<?php
   	$i = 0;
    foreach($all_barcode as $barcode){
	
	 
		   $class = null;
				if ($i++ % 2 == 0) {
					$class = ' class="altrow"';
				}
   
   ?>
   <tr id='<?php echo 'rowDefect_'.$barcode['PosBarcode']['id'];?>'  <?php echo $class;?>>
 		<td align='left'><div style='width: 100px;' class='alistname' id="BarcodeName_<?php echo $barcode['PosBarcode']['id'];?>"><?php echo $barcode['PosBarcode']['barcode']; 
			echo $this->Form->input('PosBarcode.barcode',array('id'=>'PosBarcodeBarcode_'.$barcode['PosBarcode']['id'],'type'=>'hidden','value'=>$barcode['PosBarcode']['barcode'],'div'=>false,'label'=>false,'class'=>''));  
			echo $this->Form->input('PosBarcode.product_id',array('type'=>'hidden','value'=>$barcode['PosBarcode']['pos_product_id'],'div'=>false,'label'=>false,'class'=>'')); 
				?>
	 	&nbsp;</div></td>
		
		
  		<td class="actions">
			<div style='width: 50px;' class='alistname link_link'>
            <span id="PosBarcodeItem_<?php echo $barcode['PosBarcode']['id'];?>" class="popup_add_link">Return</span>
            			 
		</div></td>
		
		
	</tr>
	<?php }?>
	
		<script type="text/javascript">

	jQuery(function($){ 
//========================== Start Take Inventory ============================
 	
	var barcode_quantity = $("#PosBarcodeQuantity").val();
	var serial_b =0;
  	
	$(".popup_add_link").on('click',function(e){
		e.preventDefault();
		
		var Product_id = $("#PosBarcodeProductId").val();
		var p_id_for_b = $("#PosBarcodePosPurchaseDetailId").val();
		var ids= $(this).attr('id');
		var id= ids.split('_');
		var barcode_val= $("#PosBarcodeBarcode_"+id[1]).val();	
	 
	 	//alert(barcode_quantity);
	 
	 	if(input_field_check() <= (barcode_quantity-1)){
		
				 $(".barcode_"+p_id_for_b).append("<input type='hidden' value='"+barcode_val+"' id='PosBarcodeBarcode_"+serial_b+"' name='data[PosPurchaseReturnDetail]["+Product_id+"][PosBarcode]["+serial_b+"]'>");
				 $("#rowDefect_"+id[1]).remove();
				 
					serial_b++;
					
					//alert(input_field_check());
					
				 	if(input_field_check() == (barcode_quantity)){
					  $("#invoice5").dialog("close");
					}
					 
		 }
		else{
	 		 $("span.popup_add_link").remove();
	 		}
	 
	   	});
	 
	 });
	
function input_field_check(){
	  	var product_id_barocde = $("#PosBarcodePosPurchaseDetailId").val();
		var count = $(".barcode_"+product_id_barocde+" input:hidden").length
		
		return count;
	  
}
	

</script>