<?php echo $this->Html->script(array('common/jquery-ui-1.7.3.custom.min'));?>
<?php echo $this->Html->css(array('common/grid'));?>
<div class="history">
    
	    <div style="float:left; width:50%;"> 
   <table cellspacing="0" cellpadding="0" border="0" style="" class="view_table">
    <thead>
        <tr>
 			<th align="left"  width="15%"> <?php echo  'Sale Date';?></th>
            <th align="left"  width="20%"> <?php echo  'Sale Type';?></th>
            <th align="left" > <?php echo  'Total Price';?></th>
            <th align="left" > <?php echo  'Tax';?></th>
            <th align="left" > <?php echo  'Discount';?></th>
			<th align="left" > <?php echo  'Payable Amount';?></th>
			<th align="left" > <?php echo  'Link';?></th>
       	   </tr>
      </thead>
  <tbody>
<?php
	$i = 0;
	$total_price=0;
	 	foreach ($totalsales as $totalsale){
	 	$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr id='<?php echo 'row_'.$totalsale['PosCustomer']['id'];?>'  <?php echo $class;?>>
 
		<td align='left'> <?php 
		echo date("d/m/Y", strtotime($totalsale['PosSale']['purchase_date'])); ?>&nbsp;</td>
        <td align='left'>
        
		<?php 
		if($totalsale['PosSale']['sales_type']==1){
			echo "<div class='status_view'>Front Desk</div>";
			}
		else if($totalsale['PosSale']['sales_type']== 2){
			echo "<div class='status_view'>Online</div>";
			}
		else if($totalsale['PosSale']['sales_type'] == 3){
			echo "<div class='status_view'>Service</div>";
			}?>
		
	   &nbsp;</td>
        <td align='left'><?php echo $totalsale['PosSale']['totalprice']; ?>&nbsp; </td>
        <td align='left'><?php echo $totalsale['PosSale']['tax']; ?>&nbsp; </td>
        <td align='left'><?php echo $totalsale['PosSale']['discount']; ?>&nbsp; </td>
        <td align='left'><?php echo $totalsale['PosSale']['payable_amount']; ?>&nbsp; </td>
		<td class="actions">
 		<?php echo $this->Html->link(__('Invoice', true), array('controller'=>'PosSales','action' => 'view', $totalsale['PosSale']['id']),array('class'=>'link_view action_link')); ?>
	 	 </td>
	  
	</tr> 
<?php
		$total_price=$total_price+$totalsale['PosSale']['payable_amount'];
	 	} ?>
	 
 <?php if($total_price>0){?>
<tr>
 	
		<td align='left' style="text-align:right" colspan="5">  Total &nbsp; </td>
		<td align='left'> <?php echo $total_price; ?> &nbsp; </td>
	  	<td align='left'>&nbsp;  </td>  	 		 
	</tr>
	<?php }?> 
	
    </table>
    </div>
    	<div style="float:left; width:50%;"> 
   <table cellspacing="0" cellpadding="0" border="0" style="" class="view_table">
    <thead>
        <tr>
 			<th align="left" width="15%"> <?php echo  'Recive Date';?></th>
			<th align="left" > <?php echo  'Delevery Date';?></th>
            <th align="left" > <?php echo  'Serial No';?></th>
            <th align="left" > <?php echo  'Payment';?></th>
			<th align="left" > <?php echo  'Link';?></th>
       	   </tr>
      </thead>
  <tbody>
<?php
//pr($totalservices);
	$i = 0;
	$service_total_price=0;
	 	foreach ($totalservices as $totalsale){
	 	$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr id='<?php echo 'row_'.$totalsale['ServiceDeviceInfo']['id'];?>'  <?php echo $class;?>>
 
		<td align='left'> <?php 
		echo date("d/m/Y", strtotime($totalsale['ServiceDeviceInfo']['recive_date'])); ?>&nbsp;</td>
		<td align='left'><?php echo date("d/m/Y", strtotime($totalsale['ServiceDeviceInfo']['estimated_date'])); ?>&nbsp; </td>
         <td align='left'><?php echo $totalsale['ServiceDeviceInfo']['serial_no'];?> &nbsp; </td>
        <td align='left'>need to work when service delevery complete &nbsp; </td>
		<td class="actions">
 		<?php echo $this->Html->link(__('Service', true), array('controller'=>'ServiceDeviceInfos','action' => 'recieve', $totalsale['ServiceDeviceInfo']['id']),array('class'=>'link_view action_link')); ?>
	 	 </td>
	  
	</tr> 
<?php
 	 	} ?>
      </table>
    </div>
 		
</div>

