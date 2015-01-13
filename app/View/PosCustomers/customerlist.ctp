   
<script type="text/javascript">var siteurl = "/hospital/"</script>
   
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
		<td colspan="3" align="center" class="topbold" >Total Page Report</td>
	</tr>
	<tr class="testlist_report altrow">
		<td class="heading" width="15%">Serial No</td>
		<td class="heading" width="25%" align="center">Name</td>
		<td class="heading" width="25%" align="center">Address</td>
		<td class="heading" width="25%" align="center">Mobile</td>
		<td class="heading" width="20%">Created</td>
	</tr>
	<?php 
	$slno = 1;
	

	
	
	foreach ($posCustomers as $posCustomer){
	//pr($posCustomer);
	
	    //$TotalPrice = $TotalPrice +  $posQuotationPurchase['PosQuotationPurchase']['totalprice'];
		?>
			
     <tr class="testlist_report">
		<td><?php echo $slno;?></td>
		<td><?php echo $posCustomer['PosCustomer']['name'] ; ?></td>
		<td><?php echo $posCustomer['PosCustomer']['address'] ; ?></td>
		<td><?php echo $posCustomer['PosCustomer']['mobile'] ; ?></td>
		<td><?php echo $time->niceshort($posCustomer['PosCustomer']['created']); ?></td>
	</tr>
   <?php $slno ++;?>
 
  <?php }?>
   
		
		
		
		 	
	</tr>
  		
</table>

  
</div>



  