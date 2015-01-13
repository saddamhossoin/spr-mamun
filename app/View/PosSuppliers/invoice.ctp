<?php echo $this->Html->css(array('common/grid'));?>
<div class="history">
    
	    <div style="float:left; width:100%;"> 
   <table cellspacing="0" cellpadding="0" border="0" style="" class="view_table">
    <thead>
        <tr>
 			<th align="left"  width="20%"> <?php echo  'Purchase Date';?></th>
            <th align="left"  width="20%"> <?php echo  'Total Price';?></th>
            <th align="left"  width="10%" > <?php echo  'Tax';?></th>
            <th align="left" > <?php echo  'Discount';?></th>
			<th align="left"  width="20%"> <?php echo  'Payable Amount';?></th>
			<th align="left" > <?php echo  'Link';?></th>
       	   </tr>
      </thead>
  <tbody>
<?php
	$i = 0;
	$total_price=0;
	 	foreach ($totalpurchses as $totalpurchse){
	 	$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr id='<?php echo 'row_'.$totalpurchse['PosSupplier']['id'];?>'  <?php echo $class;?>>
 
		<td align='left'> <?php 
		echo date("d/m/Y", strtotime($totalpurchse['PosPurchase']['purchase_date'])); ?>&nbsp;</td>
        
        <td align='left'><?php echo $totalpurchse['PosPurchase']['totalprice']; ?>&nbsp; </td>
        <td align='left'><?php echo $totalpurchse['PosPurchase']['tax']; ?>&nbsp; </td>
        <td align='left'><?php echo $totalpurchse['PosPurchase']['discount']; ?>&nbsp; </td>
        <td align='left'><?php echo $totalpurchse['PosPurchase']['payable_amount']; ?>&nbsp; </td>
		<td class="actions">
 		<?php echo $this->Html->link(__('Invoice', true), array('controller'=>'PosPurchases','action' => 'view', $totalpurchse['PosPurchase']['id']),array('class'=>'link_view action_link supplier_invoice')); ?>
	 	 </td>
	  
	</tr> 
<?php
		$total_price=$total_price+$totalpurchse['PosPurchase']['payable_amount'];
	 	} ?>
	 
 <?php if($total_price>0){?>
<tr>
 	
		<td align='left' style="text-align:right" colspan="4">  Total &nbsp; </td>
		<td align='left'> <?php echo $total_price; ?> &nbsp; </td>
	  	<td align='left'>&nbsp;  </td>  	 		 
	</tr>
	<?php }?> 
	
    </table>
    </div>
    	
 		
</div>



