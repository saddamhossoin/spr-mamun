 <div class="bDiv" style="height: auto;">
<div class="hDiv">
  <div class="hDivBox">
    <table cellspacing="0" cellpadding="0">
      <thead>
        <tr>
            <th align="left" ><div style=" width: 30px;"><?php echo 'Id';?></div></th>
			<th align="left" ><div style=" width: 100px;"><?php echo 'Products';?></div></th>
		   	<th align="left" ><div style=" width: 250px;"><?php echo 'Brand';?></div></th>
			<th align="left" ><div style=" width: 100px;"><?php echo 'Categories';?></div></th>
         </tr>
      </thead>
    </table>
  </div>
</div>
 
  <table cellspacing="0" cellpadding="0" border="0" style="" class="flexme3">
      <tbody>
<?php
	$i = 0;
	$saleamount=0;
	  $purchaseamount=0;
	  
	   $totalstock=0;
	foreach ($posProducts as $posProduct){
	  $saleamount=$saleamount+$posProduct['PosProduct']['salesprice'];
	   $purchaseamount=$purchaseamount+$posProduct['PosProduct']['purchaseprice'];
	  $i++;
	//pr($posProduct);
	
	?>
	
	<tr id='<?php echo 'row_'.$posProduct['PosProduct']['id'];?>'>
		 
		 <td align='left'><div style='width: 30px;' class='alistname'><?php echo $i; ?>&nbsp;</div></td>
		<td align='left'><div style='width: 300px;' class='alistname'><?php echo $posProduct['PosProduct']['name']; ?>&nbsp;</div></td>
		<td align='left'><div style='width: 150px;' class='alistname'>
			<?php //echo $this->Html->link($posProduct['PosBrand']['name'], array('controller' => 'pos_brands', 'action' => 'view', $posProduct['PosBrand']['id'])); ?>
			
			<?php echo $posProduct['PosBrand']['name']; ?>
			
			
		</div></td>
		<td align='left'><div style='width: 150px;' class='alistname'>
			<?php echo $posProduct['PosPcategory']['name']; ?>
 		</div></td>
      
 		
	</tr>
 <?php }?>
     </table>
    </div>