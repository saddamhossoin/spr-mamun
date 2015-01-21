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
			echo $this->Form->input('PosBarcode.barcode',array('id'=>'PosBarcodeBarcode_'.$barcode['PosBarcode']['id'],'type'=>'hidden','value'=>$barcode['PosBarcode']['barcode'],'div'=>false,'label'=>false,'class'=>''));  	?>
	 	&nbsp;</div></td>
		
		
  		<td class="actions">
			<div style='width: 50px;' class='alistname link_link'>
            <span id="PosBarcodeItem_<?php echo $barcode['PosBarcode']['id'];?>" class="popup_add_link barcode_sales_add">Add</span>
            			 
		</div></td>
	</tr>
	<?php }?>
	
<script type="text/javascript">

jQuery(function($){ 
		/*
		$('.productlist tr td span input').each(function(index) {
		  var searchval = $(this).attr('value');
			  $('#PosProductGrid tr td input').each(function(index) {
			  	var foundval = $(this).attr('value');
			  	if(searchval == foundval){
					alert(foundval);
				}
			  });
												   
		});	*/
//========================== Start Take Inventory ============================
	var barcode_quantity = $("#PosBarcodeQuantity").val();
	var serial_b =0;
	$(".popup_add_link").on('click',function(e){
		e.preventDefault();
	
		var p_id_for_b = $("#PosBarcodeIndexForm #PosBarcodePosProductId").val();
	   	var ids= $(this).attr('id');
		var id= ids.split('_');
   	    var barcode_val= $("#PosBarcodeBarcode_"+id[1]).val();
		
		 
		 
	 	if(input_field_check() <= (barcode_quantity-1)){
			<?php if(isset($order)){ ?>
				 $(".barcode_"+p_id_for_b).append("<input type='hidden' value='"+barcode_val+"' id='PosBarcodeBarcode_"+serial_b+"' name='data[OrderItem]["+p_id_for_b+"][PosBarcode]["+serial_b+"]'>");
		 		<?php }	else{	?>
			 		$(".barcode_"+p_id_for_b).append("<input type='hidden' value='"+barcode_val+"' id='PosBarcodeBarcode_"+serial_b+"' name='data[PosSaleDetail]["+p_id_for_b+"][PosBarcode]["+serial_b+"]'>");
			
			<?php }	?>
 				 $("#rowDefect_"+id[1]).remove();
					serial_b++;
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
		var product_id_barocde = $("#PosBarcodeIndexForm #PosBarcodePosProductId").val();
		var count = $(".barcode_"+product_id_barocde+" input:hidden").length
			return count;
	  
} 


</script>