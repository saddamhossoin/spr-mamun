<div id="invoice" class="Print_content_areas">
<table id="Test_description" cellpadding="0" cellspacing="0" width="100%">
	<tr>
		<td colspan="3" align="center" class="topbold" >Total Page Report</td>
	</tr>
	<tr class="testlist_report altrow">
	    <td class="heading" width="10%">No</td>
		<td class="heading" width="45%" align="center">Product Name</td>
		<td class="heading" width="15%" align="center">Quantity</td>
        <td class="heading" width="15%" align="center">Purchase</td>
        <td class="heading" width="15%" align="center">Sales</td>
 	</tr>
	<?php 
	$slno = 1;
 	foreach ($posStocks as $posStock){?>
      <tr class="testlist_report">
		<td><?php echo $slno;?></td>
		<td><?php echo $posStock['PosProduct']['name'] ; ?></td>
		<td style="text-align:center !important"><?php echo $posStock['PosStock']['quantity'] ; ?></td>
		<td style="text-align:center !important"><?php echo $posStock['PosStock']['last_purchase']; ?></td>
        <td style="text-align:center !important"><?php echo $posStock['PosStock']['last_sales']; ?></td>
 	</tr>
   <?php $slno ++;}?>
   </tr>
  	</table>
</div>
