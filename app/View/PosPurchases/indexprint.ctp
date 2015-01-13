<div id="invoice" class="Print_content_areas"> 
 <br />
 <?php  
   if(!empty($posPurchases)){ ?>
<table id="" cellpadding="0" cellspacing="0" class="view_table" width="100%">
<tr class="testlist_report altrow">
		<td class="heading" width="15%">Serial No</td>
		<td class="heading" width="25%" align="center">Supplier Name</td>
		<td class="heading" width="20%">Total Price</td>
		<td class="heading" width="20%">Payamount</td>
		<td class="heading" width="20%">Created</td>
	</tr>
 	<?php 
	$slno = 0;
	$TotalPrice = 0;
	$TotalPayamount=0;
 foreach ($posPurchases as $posPurchase){
	  //pr($posPurchase);
	    $TotalPrice = $TotalPrice +  $posPurchase['PosPurchase']['payable_amount'];
		$TotalPayamount = $TotalPayamount +  $posPurchase['PosPurchase']['payamount'];
		$slno++;
		?>
	  <tr class="testlist_report">
		<td><?php echo $slno;?></td>
		<td><?php echo $posPurchase['PosSupplier']['name'] ; ?></td>
		<td><?php echo $posPurchase['PosPurchase']['payable_amount']; ?></td>
		<td><?php echo $posPurchase['PosPurchase']['payamount']; ?></td>
		<td><?php 
		echo date("d/m/Y", strtotime($posPurchase['PosPurchase']['created'])); 
		//echo $this->time->niceshort($posPurchase['PosPurchase']['created']); ?></td>
	</tr>
  
 <?php }?>
        <tr class="lastRowCal">
          <td colspan="1">&nbsp;</td>
		   <td align="left"><div style=" width: 50px;"><?php echo  'Total';?>&nbsp;</div></td>
          <td align="left"><div style=" width: 50px;"><?php echo  $TotalPrice;?>&nbsp;</div></td>
          <td align="left"><div style=" width: 40px;"><?php echo $TotalPayamount;?>&nbsp;</div></td>
         </tr>
 	 
 </table>

<?php
	}else{ 
		echo "<span class='nodata'>There is no data</span>";
	}?>

  
</div>
<style type="text/css">
.view_table tr td:first-child {
    width: 10px !important;
}
</style>



  