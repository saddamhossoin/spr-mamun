<?php //pr($supplier_ledgers); ?> 
 <?php $payment_mode=array(1=>"Sales",2=>"Customer Payment");?>
<div class="bDiv" style="height: auto;">
<div class="hDiv">
  <div class="hDivBox">
  <?php if(!empty($customer_ledgers)){?>
    <table cellspacing="0" cellpadding="0">
      <thead>
        <tr>
           <th align="left" ><div style=" width: 100px;font-weight:bold"><?php echo 'Date';?></div></th>
			<th align="left" ><div style=" width: 200px;font-weight:bold"><?php echo 'Payment Mode';?></div></th>
		   	<th align="left" ><div style=" width: 150px;font-weight:bold"><?php echo 'Total Price';?></div></th>
			<th align="left" ><div style=" width: 100px;font-weight:bold"><?php echo 'Payamount';?></div></th>
         </tr>
      </thead>
	  
    </table>
  </div>
</div>
 
  <table cellspacing="0" cellpadding="0" border="0" style="" class="flexme3">
      <tbody>
	  <?php 
	  $total_price=0;
	  $total_payment=0;
	  foreach ($customer_ledgers as $invoice){ 
			   $total_price= $total_price+$invoice['PosCustomerLedger']['totalprice'];
			   $total_payment=$total_payment+$invoice['PosCustomerLedger']['payamount'];
			  
	  ?>
	 	<tr id='<?php echo 'row_'.$invoice['PosCustomerLedger']['id'];?>'>
	 	
		<td align='left'><div style='width: 100px;' class='alistname'><?php 
		echo date("d/m/Y", strtotime($invoice['PosCustomerLedger']['created']));
		
		//echo $invoice['PosSupplierLedger']['created']; ?>&nbsp;</div></td>
		<td align='left'><div style='width: 200px;' class='alistname'>
		 	 	<?php echo $payment_mode[$invoice['PosCustomerLedger']['payment_mode']]; ?>
			
		</div></td>
		<td align='left'><div style='width: 150px;' class='alistname'>
			 
			<?php echo $invoice['PosCustomerLedger']['totalprice']; ?>
		</div></td>
		<td align='left'><div style='width: 100px;' class='alistname'><?php  echo $invoice['PosCustomerLedger']['payamount']; ?>&nbsp;</div></td>
   	</tr> 
<?php }  ?>
<?php 
   if($total_price >=0){ ?>
        <tr class="lastRowCal">
	       <td colspan="1">&nbsp;</td>
		   <td align="left"><div style="font-weight:bold;text-align:right;width: 150px;"><?php echo  'Total';?>&nbsp;</div></td>
          <td align="left"><div style=" font-weight:bold;text-align:right;width: 50px;"><?php echo  $total_price;?>&nbsp;</div></td>
          <td align="left"><div style=" font-weight:bold;text-align:right;width: 40px;"><?php echo $total_payment;?>&nbsp;</div></td>
          
        </tr>
		<tr class="lastRowCal">
          <td colspan="1">&nbsp;</td>
		  <?php	$due=$total_price-$total_payment;	 ?>
		   <td align="left"><div style="font-weight:bold;text-align:right;width: 150px;"><?php 
		   if($due>0){
		   echo  'Due';
		   }
		   else{
		   echo "Advance";
		   }
		   ?>&nbsp;</div></td>
           <td colspan="1" align="left"><div style=" font-weight:bold;text-align:right;width: 40px;"><?php echo abs($due);?>&nbsp;</div></td>
         </tr>
		<?php }
		
		}
		else{
			echo "<span class='nodata'>There is no data</span>";
			}?>

    </table>
    </div>
<style type="text/css">
	.nodata{
		text-align:center;
		font-weight:bold;
		padding-left: 240px;}
</style>