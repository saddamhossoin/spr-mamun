<div id="invoice" class="Print_content_areas"> 
 <br />
 <?php  
 		//pr($serviceDevices);
   if(!empty($serviceDevices)){ ?>
<table id="" cellpadding="0" cellspacing="0" class="view_table" width="100%">
<tr class="testlist_report altrow">
		<td class="heading" width="15%">Serial No</td>
		<td class="heading" width="25%" align="center">Name</td>
		<td class="heading" width="20%">Category</td>
		<td class="heading" width="20%">Brand</td>
		<td class="heading" width="20%">Created</td>
	</tr>
 	<?php 
	$slno = 0; 
 foreach ($serviceDevices as $serviceDevice){
	  //pr($posPurchase);
	    $slno++;
		?>
	  <tr class="testlist_report">
		<td><?php echo $slno;?></td>
		<td><?php echo $serviceDevice['ServiceDevice']['name'] ; ?></td>
		<td><?php echo $type[$serviceDevice['ServiceDevice']['pos_pcategory_id']]; ?></td>
		<td><?php echo $brand[$serviceDevice['ServiceDevice']['pos_brand_id']]; ?></td>
		<td><?php echo date("d/m/Y", strtotime($serviceDevice['ServiceDevice']['created'])); 	 ?></td>
	</tr>
  
 <?php }?>
        <?php /*?><tr class="lastRowCal">
          <td colspan="1">&nbsp;</td>
		   <td align="left"><div style=" width: 50px;"><?php echo  'Total';?>&nbsp;</div></td>
          <td align="left"><div style=" width: 50px;"><?php echo  $TotalPrice;?>&nbsp;</div></td>
          <td align="left"><div style=" width: 40px;"><?php echo $TotalPayamount;?>&nbsp;</div></td>
         </tr><?php */?>
 	 
 </table>

<?php
	}else{ 
		echo "<span class='nodata'>There is no data</span>";
	}?>

  
</div>
<style type="text/css">
.view_table tr td:first-child {
    width: 10px !important;
}
.view_table tr:first-child {
    font-weight:bold !important;
}
 
</style>



  