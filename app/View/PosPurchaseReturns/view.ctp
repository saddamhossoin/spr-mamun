<?php  //pr($PurchaseReturn);?>
 <?php echo $this->Html->css(array('module/PosSales/report'));?>
<div>
    <div class="customer_info_div">
    <div class="customer_left_div">
    <h2 class="customer_heading">Supplier Info</h2>
    <div class="customer_info_p">
        <p><span style="font-weight:bold">Titolo :</span>..................</p>
        <p><span style="font-weight:bold">Nome :</span>  <?php echo $PurchaseReturn['PosSupplier']['name'];?></p>
        <p><span style="font-weight:bold">Cognome :</span><?php echo $PurchaseReturn['PosSupplier']['contactname'];?></p>
        <p><span style="font-weight:bold">Azienda :</span><?php echo $PurchaseReturn['PosSupplier']['address'];?></p>
        <p><span style="font-weight:bold">Codice fiscale :</span><?php echo $PurchaseReturn['PosSupplier']['address'];?></p>
        <p><span style="font-weight:bold">Telefono : </span><?php echo $PurchaseReturn['PosSupplier']['mobile'];?></p>
        <p><span style="font-weight:bold">Fax :</span> <?php echo $PurchaseReturn['PosSupplier']['fax'];?></p>
        <p><span style="font-weight:bold">E-mail : </span><?php echo $PurchaseReturn['PosSupplier']['email'];?></p>
        <p><span style="font-weight:bold">URL :</span><?php echo $PurchaseReturn['PosSupplier']['website'];?></p>
        <p><span style="font-weight:bold">indirizzo :</span><?php echo $PurchaseReturn['PosSupplier']['iva'];?></p>
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
      <td height="20" class="captionBorder" > &nbsp;<b>Purchase Return ID</b></td>
      <td height="20" class="captionLeft" >&nbsp;<b>Payment method</b></td>
       </tr>
     <tr>
     <td height="20" class="captionLeft" >&nbsp;<span><?php echo date("j-n-Y H:i",strtotime($PurchaseReturn['PosPurchaseReturn']['created']));?></span></td>
      <td height="20" class="captionBorder" >&nbsp;<span> 
      <?php 
        echo $PurchaseReturn['PosPurchaseReturnDetail'][0]['pos_purchase_return_id']; ?>
       </span></td>
        <td height="20" class="captionLeft" >&nbsp;<span>  <?php  echo $accountsheads[$PurchaseReturn['PosSupplier']['PosSupplierLedger'][0]['account_head_id']];?></span></td> 
      </tr>
    </tbody>
 </table>
 </div>
 <div class="full_data_div">
<section id="no-more-tables">
 <table class="table-bordered table-striped table-condensed cf">
    <thead class="cf">
        <tr>
            <th class="numeric" width="40"> Serial No </th>
            <th class="numeric"> Product Description</th>
            <th class="numeric" width="50"> Quantaty </th>
            <th class="numeric" width="50"> Price </th>
            <th class="numeric" width="60"> Total </th>
        </tr>
    </thead>
<tbody>
 <?php 
	$slno = 1;
	 //pr($purchase);
	foreach($PurchaseReturn['PosPurchaseReturnDetail'] as $PurchaseReturndetail){?>
 <tr>
<td><?php echo $slno;?></td>
<td>
<?php echo $PurchaseReturndetail['PosProduct']['name'];
		if(!empty($PurchaseReturndetail['PosBarcode'])){
			echo "<div class='barcodesDiv'>Barcode: ";
		 	foreach($PurchaseReturndetail['PosBarcode'] as $barcode)
			{
				echo "<span class='barcodes'>".$barcode['barcode']."</span> , ";
			}
		}
 		?>
</td>
<td><?php echo $PurchaseReturndetail['quantity'];?></td>
<td><?php echo $PurchaseReturndetail['price'];?></td>
<td><?php echo $PurchaseReturndetail['PosPurchaseReturn']['total_price'];?></td>
 </tr>
  <?php $slno ++;}?>
  </tbody>
 <thead class="cf">
<tr>
<th class="total_price"  width="60" colspan="4">SUBTOTAL =</th>
<th class="numeric"  width="60">
          <?php
    	$amount=$PurchaseReturn['PosPurchaseReturn']['product_amount'];
	     echo $amount;
	     ?>  
        </th>
</tr>
<tr>
<th class="total_price"  width="60" colspan="4">TAX (<?php echo $tax; ?>% )=</th>
<th class="numeric"  width="60">
 <?php $peramount= $PurchaseReturn['PosPurchaseReturn']['tax'];
			  echo $peramount;
		  ?>
           </th>
</tr>
 <tr>
<th class="total_price"  width="60" colspan="4">Total =</th>
<th class="numeric"  width="60">
 <?php $taxamount=$peramount+$amount;
			echo $taxamount;
		?>       
          </th>
</tr>
 <tr>
<th class="total_price"  width="60" colspan="4">Discount =</th>
<th class="numeric"  width="60">
 <?php $payable_amount=$taxamount-$PurchaseReturn['PosPurchaseReturn']['discount'];
			echo  $PurchaseReturn['PosPurchaseReturn']['discount'];
		?> 
         </th>
</tr>
 
 <tr>
<th class="total_price"  width="60" colspan="4">Due =</th>
<th class="numeric"  width="60">
<?php 
  $due= $PurchaseReturn['PosPurchaseReturn']['total_price'] - $PurchaseReturn['PosPurchaseReturn']['return_amount'];
		 	  echo $due;
	?>
        </th>
</tr>
 </thead>
 </table>
</section>
 </div>
</div>
 

 
