<?php  //pr($purchase);?>
<div id="invoice" class="Print_content_areas">
<table class="invoicetop" cellpadding="0"  border="1" width="100%">
 	<tr>
		<td class="left_part heading">Invoice No :
		 <?php
		 
		 if(!empty($purchase['PosPurchase']['manual_invoice_id'])){
		 	  echo $purchase['PosPurchase']['manual_invoice_id'];
		  }
		 else{
			  echo $purchase['PosPurchase']['id'];
		  }
		 
	 	  
		  ?>
		
		</td>
        <td class="center_part heading">Mobile : <span><?php echo $purchase['PosSupplier']['mobile'];?></span></td>
	</tr>
	<tr>
		<td class="left_part heading">Supplier Name : <span>
		<?php echo $purchase['PosSupplier']['name'];?></span></td>
  	<td class="right_part heading">Invoice Date : <span>
		<?php echo   date("j-n-Y H:i",strtotime($purchase['PosPurchase']['created']));?></span></td>
	</tr>
</table>
<br />

<table id="Test_description" cellpadding="0" cellspacing="0" width="100%">
	<tr>
		<td colspan="3" align="center" class="topbold" >Product Description</td>
	</tr>
	<tr class="testlist_report altrow">
		<td class="heading" width="15%" >Serial No</td>
		<td class="heading" width="55%" align="center">Description</td>
		<td class="heading" width="10%">Quantaty</td>
		<td class="heading" width="10%">Price</td>
		<td class="heading" width="10%">Total</td>
	</tr>
	<?php 
	$slno = 1;
	 //pr($purchase);
	foreach($purchase['PosPurchaseDetail'] as $purchasedetail){?>
    <?php   //pr($purchasedetail);?>
    <tr class="testlist_report">
		<td valign="top"><?php echo $slno;?></td>
		<td valign="top"><?php echo $purchasedetail['PosProduct']['name'];
		if(!empty($purchasedetail['PosBarcode'])){
			echo "<div class='barcodesDiv'>Barcode: ";
		 	foreach($purchasedetail['PosBarcode'] as $barcode)
			{
				echo "<span class='barcodes'>".$barcode['barcode']."</span> , ";
			}
		}
		
		?></td>
		<td valign="top"><?php echo $purchasedetail['quantity'];?></td>
		<td valign="top"><?php echo $purchasedetail['price'];?></td>
		<td style="text-align:right" valign="top"><?php echo $purchasedetail['totalprice'];?></td>
	</tr>
    <?php $slno ++;}?>
     <tr class="testlist_report" style="">
		<td rowspan="6" colspan="3"><td>SUBTOTAL</td>
         </td>
		 	<td style="text-align:right"><?php
    	$amount=$purchase['PosPurchase']['totalprice'];
	    echo $amount;
	   ?>     
           </td>
	</tr>
	 <tr class="testlist_report altrow">
    <td>TAX (<?php echo $tax; ?>%) </td>
	 	<td style="text-align:right">
        <?php $peramount= $purchase['PosPurchase']['tax'];
			  echo $peramount;
		  ?>
        </td>
	</tr>
	 <tr class="testlist_report">
	 	<td>TOTAL</td>
        <td style="text-align:right">
        <?php $taxamount=$peramount+$amount;
			echo $taxamount;
		?> </td>
	</tr>
	 <tr class="testlist_report">
	 	<td>DISCOUNT</td>
        <td style="text-align:right">
        <?php $payable_amount=$taxamount-$purchase['PosPurchase']['discount'];
			echo  $purchase['PosPurchase']['discount'];
		?> 
        
        </td>
	</tr>
	 <tr class="testlist_report">
	 	<td>PAID</td>
        <td style="text-align:right">
        <?php echo $purchase['PosPurchase']['payamount'];?>
        </td>
	</tr>
	 <tr class="testlist_report">
	 	<td>DUE</td>
        <td style="text-align:right">
        <?php 
  		$due= $purchase['PosPurchase']['payable_amount'] - $purchase['PosPurchase']['payamount'];
		 	  echo $due;
	 	?>
        </td>
	</tr>
  		
</table>
 
</div>
<style type="text/css">
.barcodesDiv{
	font-size:11px;
	font-weight:bold;
}
.barcodesDiv span{
	color:#999;
	font-size:10px !important;
}

</style>
<script type="text/javascript">
jQuery(function($){ 
 $(".ui-dialog-titlebar-close").on('click',function(){
		 	 //$('#PosPurchaseAmountAddForm').reset();
				window.location.reload();
				 $('#Cancel').click();
				
	  });
	  });
	  </script>
 