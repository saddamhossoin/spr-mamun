 <div id="invoice" class="Print_content_areas">
 <table id="Test_description" cellpadding="0" cellspacing="0" width="100%">
 	<tr class="testlist_report altrow" style="font-weight:bold; line-height:25px; font-size:11px">
 		<td class="heading" width="20%" align="left" >Brand Name</td>
		<td class="heading" width="20%" align="left">Category Name</td>
		<td class="heading" width="50%" align="left">Product Name</td>
        <?php /*
		<td class="heading" width="25%" align="center">Purchase Price</td>
		<td class="heading" width="25%" align="center">In Stock</td>
		<td class="heading" width="25%" align="center">Sales Price</td>
		<td class="heading" width="25%" align="center">Discount</td>
		<td class="heading" width="25%" align="center">Reorder</td>
		<td class="heading" width="20%">Created</td>
        
		*/?>
	</tr>
	<?php 
	$slno = 1;
	$i=0; 
	foreach ($posProducts as $posProduct){
	 	$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
 		?>
      <tr id='<?php echo 'row_'.$posProduct['PosProduct']['id'];?>'  <?php echo $class; ?> class="testlist_report" style="font-size:12px; line-height:20px">
 		<td><?php echo $posProduct['PosBrand']['name'] ; ?></td>
		<td><?php echo $posProduct['PosPcategory']['name'] ; ?></td>
		<td><?php echo $posProduct['PosProduct']['name'] ; ?></td>
		<?php /*
        <td><?php echo $posProduct['PosProduct']['purchaseprice'] ; ?></td>
		<td><?php echo $posProduct['PosProduct']['in_stock'] ; ?></td>
		<td><?php echo $posProduct['PosProduct']['salesprice'] ; ?></td>
		<td><?php echo $posProduct['PosProduct']['discount'] ; ?></td>
		<td><?php echo $posProduct['PosProduct']['reorder'] ; ?></td>
	   	<td><?php echo $time->niceshort($posProduct['PosProduct']['created']); ?></td>
	*/?>
    </tr>
   <?php $slno ++;?>
 
  <?php }?>
 	</tr>
 </table>
 </div>
