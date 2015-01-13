   
<script type="text/javascript">var siteurl = "/hospital/"</script>
   
<?php   //pr($posSale);?>
 <div id="invoice" class="Print_content_areas">
 
 
<table class="invoicetop" cellpadding="0"  border="1" width="100%" class="view_table">
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
		<td colspan="3" align="center" class="topbold" >Total Page Report</td>
	</tr>
	<tr class="testlist_report altrow">
		<td class="heading" width="15%">Serial No</td>
		<td class="heading" width="25%" align="center">Customer Name</td>
		<td class="heading" width="20%">Total Price</td>
		<td class="heading" width="20%">Payamount</td>
		<td class="heading" width="20%">Created</td>
	</tr>
	<?php 
	$slno = 1;
	

	$TotalPrice = 0;
	$TotalPayamount=0;
	
	foreach ($posSales as $posSale){
	
	    $TotalPrice = $TotalPrice +  $posSale['PosSale']['totalprice'];
		$TotalPayamount = $TotalPayamount +  $posSale['PosSale']['payamount'];
		?>
				
     <tr class="testlist_report">
		<td><?php echo $slno;?></td>
		<td><?php echo $posSale['PosCustomer']['name'] ; ?></td>
		<td><?php echo $posSale['PosSale']['totalprice']; ?></td>
		<td><?php echo $posSale['PosSale']['payamount']; ?></td>
		<td><?php echo $time->niceshort($posSale['PosSale']['created']); ?></td>
	</tr>
   <?php $slno ++;?>
  <?php }
   if($TotalPrice >0){ ?>
        <tr class="lastRowCal">
          <td colspan="1">&nbsp;</td>
		   <td align="left"><div style=" width: 50px;"><?php echo  'Total';?>&nbsp;</div></td>
          <td align="left"><div style=" width: 50px;"><?php echo  $TotalPrice;?>&nbsp;</div></td>
          <td align="left"><div style=" width: 40px;"><?php echo $TotalPayamount;?>&nbsp;</div></td>
          
        </tr>
		<?php }else{
			echo "<span class='nodata'>There is no data</span>";
		}?>
		
		 	
	</tr>
  		
</table>

  
</div>



  