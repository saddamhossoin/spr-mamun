   
<script type="text/javascript"> //var siteurl = "/hospital/"</script>
   
<?php   //pr($posSale);?>
 <div id="invoice" class="Print_content_areas">
  
<table class="invoicetop" cellpadding="0"  border="1" width="100%">
	<tr> 
		<td class="topbold" colspan="3" align="center">Acknowledgement</td>
	 </tr>
	
	
	<tr> 
	
		<td class="right_part heading">Delevery Date : <span><?php //echo date("j-n-Y H:i",strtotime($patientsInvoice['PatientDetail']['reportdeleverydate']));?></span></td>
	</tr>
</table>
<br />

<table id="Test_description" cellpadding="0" cellspacing="0" width="100%">
	<tr>
		<td colspan="5" align="center" style="padding-bottom:3px;" class="topbold" >Total Purchase Return </td>
	</tr>
	<tr class="testlist_report altrow" style="font-weight:bold;padding-bottom:3px;">
		<td class="heading" width="15%">Serial No</td>
		<td class="heading" width="20%" align="center">Supplier Name</td>
		
		<td class="heading" width="10%">Quantity</td>
		<td class="heading" width="15%">Return Qnt.</td>
		<td class="heading" width="15%"> Price</td>
		<td class="heading" width="15%">Payamount</td>
		<td class="heading" width="10%">Created</td>
	</tr>
	<?php 
	//pr($posPurchaseReturns); die('Anwar Hossain');
	
	$slno = 1;
 	$TotalPrice = 0;
	$TotalPayamount=0;
	$total_purchase_return=0;
	$total_purchase_quantity=0;
	
	foreach ($posPurchaseReturns as $posPurchaseReturn){
	  //pr($posPurchaseReturn);
	    $TotalPrice = $TotalPrice +  $posPurchaseReturn['PosPurchase']['totalprice'];
		$TotalPayamount = $TotalPayamount +  $posPurchaseReturn['PosPurchase']['payamount'];
		?>
		<?php
			 $purchasequantity=0;
		foreach($posPurchaseReturn['PosPurchaseDetail'] as $PurchaseDetail){
			$purchasequantity=$purchasequantity+$PurchaseDetail['quantity'];	
		}
			$purchasereturn=0;
		foreach($posPurchaseReturn['PosPurchaseReturn'] as $Purchasereturn){
			$purchasereturn=$purchasereturn+$Purchasereturn['quantity'];	
		}
		//pr($purchasequantity);
		$total_purchase_quantity=$purchasequantity+$total_purchase_quantity;
		$total_purchase_return=$purchasereturn+$total_purchase_return;
		?>
				
     <tr class="testlist_report">
		<td><?php echo $slno;?></td>
		<td><?php echo $posPurchaseReturn['PosSupplier']['name'] ; ?></td>
		<td><?php echo $purchasequantity; ?></td>
		<td><?php echo $purchasereturn; ?></td>
		<td><?php echo $posPurchaseReturn['PosPurchase']['totalprice']; ?></td>
		<td><?php echo $posPurchaseReturn['PosPurchase']['payamount']; ?></td>
		<td><?php echo date("d/m/Y", strtotime($posPurchaseReturn['PosPurchase']['created'])); ?></td>
	</tr>
   <?php $slno ++;?>
  <?php }
   if($TotalPrice >0){ ?>
        <tr class="lastRowCal">
          <td colspan="1">&nbsp;</td>
		   <td align="left"><div style=" width: 50px;"><?php echo  'Total';?>&nbsp;</div></td>
         
		  <td align="left"><div style=" width: 50px;"><?php echo  $total_purchase_quantity;?>&nbsp;</div></td>
		  <td align="left"><div style=" width: 50px;"><?php echo  $total_purchase_return;?>&nbsp;</div></td>
		  <td align="left"><div style=" width: 50px;"><?php echo  $TotalPrice;?>&nbsp;</div></td>
		  <td align="left"><div style=" width: 40px;"><?php echo $TotalPayamount;?>&nbsp;</div></td>
          
        </tr>
		<?php }else{
			echo "<span class='nodata'>There is no data</span>";
		}?>
		
		 	
	</tr>
  		
</table>

  
</div>



  