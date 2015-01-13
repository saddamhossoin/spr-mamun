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
   
   <?php /*
            <th align="left" ><div style=" width: 100px;"><?php echo 'Stocks';?></div></th>
			<th align="left" ><div style=" width: 100px;"><?php echo 'Purchase Price';?></div></th>
			<th align="left" ><div style=" width: 100px;"><?php echo 'Sales Price';?></div></th>
			
	 */ ?>       
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
	foreach ($posPcategories as $posProduct){
		//pr($posProduct);

	
	    $saleamount=$saleamount+$posProduct['PosProduct']['salesprice'];
	    $purchaseamount=$purchaseamount+$posProduct['PosProduct']['purchaseprice'];
	    $i++;
	
	?>
	
	<tr id='<?php echo 'row_'.$posProduct['PosProduct']['id'];?>'>
		 
		 <td align='left'><div style='width: 30px;' class='alistname'><?php echo $i; ?>&nbsp;</div></td>
		<td align='left'><div style='width: 100px;' class='alistname'><?php echo $posProduct['PosProduct']['name']; ?>&nbsp;</div></td>
		<td align='left'><div style='width: 250px;' class='alistname'>
			<?php //echo $this->Html->link($posProduct['PosBrand']['name'], array('controller' => 'pos_brands', 'action' => 'view', $posProduct['PosBrand']['id'])); ?>
			 	<?php echo $posProduct['PosBrand']['name']; ?>
			
		</div></td>
		<td align='left'><div style='width: 250px;' class='alistname'>
			<?php //echo $this->Html->link($posProduct['PosPcategory']['name'], array('controller' => 'pos_pcategories', 'action' => 'view', $posProduct['PosPcategory']['id'])); ?>
			<?php echo $posProduct['PosPcategory']['name']; ?>
		</div></td>
        
        <?php /*
         	<td align='left'><div style='width: 100px;' class='alistname'>
		 	<?php 
			$productstock=0;
			if(!empty($posProduct['PosStock'])){
			
			foreach($posProduct['PosStock'] as $stock){
			$productstock +=$stock['quantity'];
			}
			echo $productstock;
			
			}
			else{
		 	echo $productstock ;
			}
			
			 ?>
              
            &nbsp;</div></td>
        
		<td align='left'><div style='width: 100px;' class='alistname'><?php echo $posProduct['PosProduct']['purchaseprice']; ?>&nbsp;</div></td>
		<td align='left'><div style='width: 100px;' class='alistname'><?php echo $posProduct['PosProduct']['salesprice']; ?>&nbsp;</div></td>
		*/ ?>
		
	</tr>
	<?php //$totalstock += $productstock;?>
			 
<?php } /*?>			 
<?php }
 if($saleamount >0 || $purchaseamount >0){ ?>
   
        <tr class="lastRowCal">
          <td colspan="3">&nbsp;</td>
		   <td align="left"><div style=" width: 50px;"><?php echo  'Total'.'=';?>&nbsp;</div></td>
           <td align="left"><div style=" width: 50px;"><?php echo  $totalstock;?>&nbsp;</div></td>
          <td align="left"><div style=" width: 50px;"><?php echo  $purchaseamount;?>&nbsp;</div></td>
          <td align="left"><div style=" width: 40px;"><?php echo  $saleamount;?>&nbsp;</div></td>
          
        </tr>
		
		<?php }else{ ?>
			 <span class='nodata' style="margin-left: 205px; width:455px; font-size:25px; color:#FF0000">There is no data available</span>
			<?php }

?><?php */?>

    </table>
    </div>