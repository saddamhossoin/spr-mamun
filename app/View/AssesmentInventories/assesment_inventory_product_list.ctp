<ul>
<?php
   if(!empty($posProducts )){
	   $i = 0; 
			foreach($posProducts as $key=>$posProduct){
			
	
 			if(!in_array($posProduct['PosProduct']['id'] , $alreadyAssesProducts) ){
 		 		$class = null;
				if ($i++ % 2 == 0) {
					$class = 'class="altrow inventory"';
				}
				else{
				$class = 'class="inventory"';
				}
				
 		?> 
<li id="<?php echo 'row_'.$posProduct['PosProduct']['id'];  ?>">
 <?php echo $this->Form->create('AssesmentInventory',array('controller'=>'AssesmentInventories'));
 
 echo $this->Form->input("AssesmentInventory.pos_product_id",array('value' =>$posProduct['PosProduct']['id'],'type'=>'hidden'));
 
 echo $this->Form->input("AssesmentInventory.assesment_id",array( 'class'=>'assesment_id','type'=>'hidden','value'=>$assesment_id));
 
 echo $this->Form->input("AssesmentInventory.quantitycheck",array('value' =>$posProduct['PosStock']['quantity'],'type'=>'hidden','id'=>'quantitycheck'.$posProduct['PosProduct']['id']));
 ?>
 <table cellspacing="0" cellpadding="0" border="0" style="" class="">
      <tbody>
        <tr  <?php echo $class;?> >
   	 		 <td align="right" width="37%" ><?php echo $posProduct['PosProduct']['name']; ?></td>
			 <td align="left" width="12%"><?php echo $posProduct['PosPcategory']['name'];?></td>
			 <td align="left" width="12%"><?php echo $posProduct['PosBrand']['name'];?></td>
			 <td width="7%" style="text-align:center;"><?php echo $posProduct['PosStock']['quantity'];?></td>
			 <td align="left" width="13%"> <?php   echo $this->Form->input("AssesmentInventory.price",array('class'=>'','value' =>$posProduct['PosStock']['last_sales'],'div'=>false,'label'=>false));?></td>
             <td align="left" width="12%">
			 <?php  
			 echo $this->Form->input("AssesmentInventory.availquantity",array('type'=>'hidden','value' =>$posProduct['PosStock']['quantity']));
			 
			 echo $this->Form->input("AssesmentInventory.quantity",array('class'=>'','value' =>'','div'=>false,'label'=>false,'class'=>'assesmentInventoryQuantity','id'=>'enterStock'.$posProduct['PosProduct']['id']));?>
   </td>
  <td align="left" width="10%">
	<span class="add_assesment_inventory" id="AssmentInvenItem_<?php echo $posProduct['PosProduct']['id'];?>">Take</span>
  </td>
  </tr>
  </tbody>
  </table>
    <?php  echo $this->Form->end();?>	 </li> 
	<?php }}}else{
				echo '<li style="font-weight:bold; color:red;">No Compitable Product are available, Please first set compitibility from product.</li>';
		}
 ?></ul>
	

<script type="text/javascript">

jQuery(function($){ 
 
//========================== Start Take Inventory ============================
  $(".add_assesment_inventory").on('click',function(e){
	  e.preventDefault();
 			var ids= $(this).attr('id');
	 		var id= ids.split('_');
			//$("#"+id[1]).remove();
			var checkQuantity =  parseFloat($("#quantitycheck"+id[1]).val());
			var enterQuanitity = parseFloat($("#enterStock"+id[1]).val());

 		 if($.isNumeric( enterQuanitity )   && enterQuanitity != "0" ){
 		 
		 $('.overlaydiv').fadeIn();
			$('.ajax-save-message').hide().fadeOut(); 
	  
 			 var data= $(this).closest('form').serialize();
 			 $.ajax({
				type: "POST",
				url:siteurl+"AssesmentInventories/add",
				data:  data,
				success: function(response){
						 //alert(response);
				 	    var obj = jQuery.parseJSON( response);	
						
					  	$('.overlaydiv').hide();
						$("#row_"+id[1]).remove();
						 
						 $(".reciveDeviceAssementInventory table tbody").append("<tr class='inventory' id='AssesmentInventoryTr_"+obj.AssesmentInventory.id+"'><td>"+obj.PosProduct.name+" </td><td> "+obj.PosProduct.PosBrand.name+"</td><td> "+obj.PosProduct.PosPcategory.name+"</td><td> "+obj.AssesmentInventory.quantity+"</td><td> "+obj.AssesmentInventory.price+"</td><td class='inventorytotalpriceli'> "+obj.AssesmentInventory.price*obj.AssesmentInventory.quantity+"</td><td class='actions onlyfly'><a id='AssesmentInventoryRemove_"+obj.AssesmentInventory.id+"' class='AssesmentInventoryRemove link_view action_link' href='#'>Remove</a></td></tr>");
						inventory_total();
				   }
				}); 
				 }else{
				 if(enterQuanitity == 0){
					 alert('Your quantity is 0.');
				 }else{
 					alert('Your Available quantity is:'+$("#quantitycheck"+id[1]).val());}
				} 
  		});
	});

</script>	
<style>
.assesmentInventoryProductGrid input[type="text"], .assesmentInventoryProductGrid input[type="number"] {
	width: 82px !important;
}
.reciveDeviceAssesmentInvoice label{
	float:left !important;
	width:120px !important;
}
</style>
	