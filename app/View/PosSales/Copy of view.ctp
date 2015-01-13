 
   
   
   
<div id="invoice" class="Print_content_areas">
<table class="invoicetop" cellpadding="0"  border="1" width="100%">
 	<tr>
		<td class="left_part heading">Invoice No :<?php echo $posSale['PosSale']['id'];?></td>
        <td class="center_part heading">Mobile : <span><?php echo $posSale['PosCustomer']['mobile'];?></span></td>
	</tr>
	<tr>
		<td class="left_part heading">Customer Name : <span>
		<?php echo $posSale['PosCustomer']['name'];?></span></td>
  	<td class="right_part heading">Invoice Date : <span>
		<?php echo   date("j-n-Y H:i",strtotime($posSale['PosSale']['created']));?></span></td>
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
	 
	foreach($posSale['PosSaleDetail'] as $saledetail){?>
    <?php   //pr($purchasedetail);?>
    <tr class="testlist_report">
		<td valign="top"><?php echo $slno;?></td>
		<td valign="top"><?php echo $saledetail['PosProduct']['name'];
		
		/*if(!empty($purchasedetail['PosBarcode'])){
		
			echo "<div class='barcodesDiv'>Barcode: ";
		 	foreach($purchasedetail['PosBarcode'] as $barcode)
			{
				echo "<span class='barcodes'>".$barcode['barcode']."</span> , ";
			}
		}*/
		
		
		?></td>
		<td valign="top"><?php echo $saledetail['quantity'];?></td>
		<td valign="top"><?php echo $saledetail['price'];?></td>
		<td style="text-align:right" valign="top"><?php echo $saledetail['totalprice'];?></td>
	</tr>
    <?php $slno ++;}
	
	?>
     <tr class="testlist_report" style="">
		<td rowspan="6" colspan="3"><td>SUBTOTAL</td>
         </td>
		 	<td style="text-align:right"><?php
    	$amount=$posSale['PosSale']['totalprice'];
	    echo $amount;
	   ?>     
           </td>
	</tr>
	 <tr class="testlist_report altrow">
    <td>TAX (<?php echo $tax; ?>%) </td>
	 	<td style="text-align:right">
        <?php $peramount= $posSale['PosSale']['tax'];
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
        <?php $payable_amount=$taxamount-$posSale['PosSale']['discount'];
			echo  $posSale['PosSale']['discount'];
		?> </td>
	</tr>
	 <tr class="testlist_report">
	 	<td>PAID</td>
        <td style="text-align:right">
        <?php echo $posSale['PosSale']['payamount'];?>
        </td>
	</tr>
	 <tr class="testlist_report">
	 	<td>DUE</td>
        <td style="text-align:right">
        <?php $due=$payable_amount-$posSale['PosSale']['payamount'];
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
 