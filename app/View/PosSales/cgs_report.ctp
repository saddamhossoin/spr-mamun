<div class="product_table_div">

<table width="700" border="0"   class="product_table" cellspacing="0" cellpadding="0">
          <tbody>
          
            <tr>
              <td height="20" class="captionBorder" > &nbsp;<b>Invoice No</b></td>
              <td height="20" class="captionLeft" >&nbsp;<b>Mobile</b></td>
              <td height="20" class="captionBorder" >&nbsp;<b>Customer Name</b></td>
              <td height="20" class="captionLeft" >&nbsp;<b>Invoice Date</b></td>
            </tr>
            
            <tr>
              <td height="20" class="captionBorder" >&nbsp;<span><?php echo $posSale['PosSale']['id'];?></span></td>
              <td height="20" class="captionLeft" >&nbsp;<span><?php echo $posSale['PosCustomer']['mobile'];?></span></td>
              <td height="20" class="captionBorder" >&nbsp;<span><?php echo $posSale['PosCustomer']['name'];?></span></td>
              <td height="20" class="captionLeft" >&nbsp;<span><?php echo date("j-n-Y H:i",strtotime($posSale['PosSale']['created']));?></span></td>

            </tr>
            </tbody>
 </table>

</div>

<div class="full_data_div">
<section id="no-more-tables">
 <h3 class="invoice_h">Invoice no. <?php echo $posSale['PosSale']['id'];?></h3>
<table class="table-bordered table-striped table-condensed cf">
<thead class="cf">
<tr">
<th class="numeric" width="40">Serial No</th>
<th class="numeric">Product Description</th>
<th class="numeric" width="50">Quantaty</th>
<th class="numeric" width="50">CGS</th>
<th class="numeric" width="50">Price</th>
<th class="numeric"  width="60">Total</th>
</tr>
</thead>
<tbody>

<?php 
	$slno = 1;
	 //pr($posSale);
	foreach($posSale['PosSaleDetail'] as $saledetail){?>

<tr>
<td><?php echo $slno;?></td>
<td><?php echo $saledetail['PosProduct']['name'];?></td>
<td><?php echo $saledetail['quantity'];?></td>
<td><?php echo $saledetail['cgs'];?></td>
<td><?php echo $saledetail['price'];?></td>
<td><?php echo $saledetail['totalprice'];;?></td>

</tr>
 
 <?php $slno ++;}
	
	?>

</tbody>

<thead class="cf">
<tr>
<th class="total_price"  width="60" colspan="4">SUBTOTAL =</th>
<th class="numeric"  width="60"><?php
    	$amount=$posSale['PosSale']['totalprice'];
	    echo $amount;
	   ?> </th>
</tr>
<tr>
<th class="total_price"  width="60" colspan="4">TAX (<?php echo $tax; ?>% )=</th>
<th class="numeric"  width="60">
<?php $peramount= $posSale['PosSale']['tax'];
			  echo $peramount;
		  ?></th>
</tr>

<tr>
<th class="total_price"  width="60" colspan="4">Total =</th>
<th class="numeric"  width="60">
 <?php $taxamount=$peramount+$amount;
			echo $taxamount;
		?>        </th>
</tr>

<tr>
<th class="total_price"  width="60" colspan="4">Discount =</th>
<th class="numeric"  width="60">
<?php $payable_amount=$taxamount-$posSale['PosSale']['discount'];
			echo  $posSale['PosSale']['discount'];
		?></th>
</tr>

<tr>
<th class="total_price"  width="60" colspan="4">Paid =</th>
<th class="numeric"  width="60">
<?php echo $posSale['PosSale']['payamount'];?></th>
</tr>

<tr>
<th class="total_price"  width="60" colspan="4">Due =</th>
<th class="numeric"  width="60">
<?php $due=$payable_amount-$posSale['PosSale']['payamount'];
		 	  echo $due;
	 	?>
        </th>
</tr>



</thead>

</table>
</section>




</div>
