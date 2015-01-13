<?php //pr($onlineSale);?>
<div class="customer_info_div">

<div class="customer_left_div">

<h2 class="customer_heading">Customer Info</h2>
<div class="customer_info_p">
        <p><span style="font-weight:bold">Titolo :</span>..................</p>
        <p><span style="font-weight:bold">Nome</span> : <?php echo $onlineSale['PosCustomer']['name'];?></p>
        <p><span style="font-weight:bold">Cognome :</span><?php echo $onlineSale['PosCustomer']['contactname'];?></p>
        <p><span style="font-weight:bold">Azienda :</span><?php echo $onlineSale['PosCustomer']['address'];?></p>
        <p><span style="font-weight:bold">Codice fiscale :</span><?php echo $onlineSale['PosCustomer']['address'];?></p>
        <p><span style="font-weight:bold">Telefono : </span><?php echo $onlineSale['PosCustomer']['tnt'];?></p>
        <p><span style="font-weight:bold">Fax :</span> <?php echo $onlineSale['PosCustomer']['fax'];?></p>
        <p><span style="font-weight:bold">E-mail : </span><?php echo $onlineSale['PosCustomer']['email'];?></p>
        <p><span style="font-weight:bold">URL :</span><?php echo $onlineSale['PosCustomer']['website'];?></p>
        <p><span style="font-weight:bold">indirizzo :</span><?php echo $onlineSale['PosCustomer']['iva'];?></p>
</div>

</div>

<div class="customer_right_div">
<h2 class="company_heading_right">SOLUTION POINT ROMA</h2>
	<div class="customer_info_right">
        <p> Via Dei Fulvi,14</p>
        <p> Porta Furba - Quadraro</p>
        <p> Roma(RM)</p>
        <p> Lazio</p>
        <p> Italia</p>
        <p> CAP: 00174</p>
        <p> CALL US: 0039 06.60.67.29.75</p>
        <p><span style="font-weight:bold"> E-mail : </span>solutionpointroma@yahoo.com</p>
        <p> P.IVA: 12134951008</p>
    </div>
    

    

</div>


</div>






<div class="product_table_div">

<table width="700" border="0"   class="product_table" cellspacing="0" cellpadding="0">
          <tbody>
          
            <tr>
              <td height="20" class="captionLeft" >&nbsp;<b>Invoice Date</b></td>
              <td height="20" class="captionBorder" > &nbsp;<b>Invoice ID</b></td>
              <td height="20" class="captionLeft" >&nbsp;<b>Payment method</b></td>
              <td height="20" class="captionLeft" >&nbsp;<b>Shipping method</b></td>
              <td height="20" class="captionBorder" >&nbsp;<b>Order Status</b></td>
              
            </tr>
            
            <tr>
             <td height="20" class="captionLeft" >&nbsp;<span><?php echo date("j-n-Y H:i",strtotime($onlineSale['PosSale']['created']));?></span></td>
              <td height="20" class="captionBorder" >&nbsp;<span><?php echo $onlineSale['PosSale']['id'];?></span></td>
              <td height="20" class="captionLeft" >&nbsp;<span><?php echo 'Cash Delivery';?></span></td>
              <td height="20" class="captionBorder" >&nbsp;<span><?php echo 'Online Delivery';?></span></td>
               <td height="20" class="captionBorder" >&nbsp;<span><?php echo 'Cradit Card';?></span></td>
             

            </tr>
            </tbody>
 </table>

</div>

<div class="full_data_div">
<section id="no-more-tables">
<?php /*?> <h3 class="invoice_h">Invoice no. <?php echo $posSale['PosSale']['id'];?></h3><?php */?>
<table class="table-bordered table-striped table-condensed cf">
<thead class="cf">
<tr">
<th class="numeric" width="40">Serial No</th>
<th class="numeric">Product Description</th>
<th class="numeric" width="50">Quantaty</th>
<th class="numeric" width="50">Price</th>
<th class="numeric"  width="60">Total</th>
</tr>
</thead>
<tbody>

<?php 
	$slno = 1;
	 //pr($posSale);
	foreach($onlineSale['PosSaleDetail'] as $saledetail){?>
  <?php //pr($saledetail);?>
<tr>
<td><?php echo $slno;?></td>
<td><?php echo $saledetail['PosProduct']['name'];

if(!empty($saledetail['PosBarcode'])){
		
			echo "<div class='barcodesDiv'>Barcode: ";
		 	foreach($saledetail['PosBarcode'] as $barcode)
			{   
				echo "<span class='barcodes'>".$barcode['barcode']."</span> , ";
			}
		}

?></td>
<td><?php echo $saledetail['quantity'];?></td>
<td><?php echo $saledetail['price'];?></td>
<td><?php echo $saledetail['totalprice'];?></td>

</tr>


 <?php $slno ++;}
	
	?>

</tbody>

<thead class="cf">
<tr>
<th class="total_price"  width="60" colspan="4">SUBTOTAL =</th>
<th class="numeric"  width="60"><?php
    	$amount=$onlineSale['PosSale']['totalprice'];
	    echo $amount;
	   ?> </th>
</tr>
<tr>
<th class="total_price"  width="60" colspan="4">TAX (<?php echo $tax; ?>% )=</th>
<th class="numeric"  width="60">
<?php $peramount= $onlineSale['PosSale']['tax'];
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
<?php $payable_amount=$taxamount-$onlineSale['PosSale']['discount'];
			echo  $onlineSale['PosSale']['discount'];
		?></th>
</tr>

<tr>
<th class="total_price"  width="60" colspan="4">Paid =</th>
<th class="numeric"  width="60">
<?php echo $onlineSale['PosSale']['payamount'];?></th>
</tr>

<tr>
<th class="total_price"  width="60" colspan="4">Due =</th>
<th class="numeric"  width="60">
<?php $due=$payable_amount-$onlineSale['PosSale']['payamount'];
		 	  echo $due;
	 	?>
        </th>
</tr>



</thead>

</table>
</section>
 

</div>
 <script type="text/javascript">
jQuery(function($){ 
 $(".ui-dialog-titlebar-close").on('click',function(){
		 		window.location.reload();
				 $('#Cancel').click();
			 	 $("#PosSaleAddForm").trigger('reset');
				 $("#PosSaleAmountAddForm").trigger('reset');
				
	  });
	  });
	  </script>