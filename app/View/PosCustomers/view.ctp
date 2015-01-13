<?php echo $this->Html->css(array('common/grid'));?>
<?php  echo $this->Form->input('PosCustomer.pos_customer_id',array('value'=>$posCustomer['PosCustomer']['id'],'type'=>'hidden','div'=>false,'label'=>false)); ?> 
 <?php $payment_mode=array(1=>"Sales",2=>"Customer Payment");?>
<?php  //pr($posCustomer);?>

<div class="customer_view_div">
<div class="posCustomers view">
	<table cellpadding="0" cellspacing="0" class="view_table"><?php $i = 0; $class = ' class="altrow"';?>
		 
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo 'Name'; ?></td><td> : </td>
		<td >
			<?php echo $posCustomer['PosCustomer']['name']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo __('Contactname'); ?></td><td> : </td>
		<td >
			<?php echo $posCustomer['PosCustomer']['contactname']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo __('Address'); ?></td><td> : </td>
		<td >
			<?php echo $posCustomer['PosCustomer']['address']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo __('Mobile'); ?></td><td> : </td>
		<td >
			<?php echo $posCustomer['PosCustomer']['mobile']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo __('Telephone'); ?></td><td> : </td>
		<td >
			<?php
				if(!empty($posCustomer['PosCustomer']['tnt']))
					{	 echo $posCustomer['PosCustomer']['tnt']; }
					else{
 						echo "None";
					}
				?>
			&nbsp;
 		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo __('Email'); ?></td><td> : </td>
		<td >
			<?php 
			 if (!empty($posCustomer['PosCustomer']['email'])) {
			 	echo $posCustomer['PosCustomer']['email']; 
 			 }
 			 else{ echo "None";}
			?>&nbsp;
		</td></tr>
		<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo __('Skype'); ?></td><td> : </td>
		<td >
			<?php echo $posCustomer['PosCustomer']['skype']; ?>
			&nbsp;
		</td></tr>
		<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo __('Company'); ?></td><td> : </td>
		<td >
			<?php echo $posCustomer['PosCustomer']['companyname']; ?>
			&nbsp;
		</td></tr><?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo __('P.IVA'); ?></td><td> : </td>
		<td >
			<?php echo $posCustomer['PosCustomer']['iva']; ?>
			&nbsp;
		</td></tr><?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo __('Fax'); ?></td><td> : </td>
		<td >
			<?php echo $posCustomer['PosCustomer']['fax']; ?>
			&nbsp;
		</td></tr><?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo __('Note'); ?></td><td> : </td>
		<td >
			<?php echo $posCustomer['PosCustomer']['note']; ?>
			&nbsp;
		</td></tr> 
 <?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo __('Modified'); ?></td><td> : </td>
		<td >
			<?php echo $this->time->niceshort($posCustomer['PosCustomer']['modified']); ?>
			&nbsp;
		</td>
		</tr>
 <?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo __('Modified By'); ?></td><td> : </td>
		<td >
			<?php echo $userlists[$posCustomer['PosCustomer']['modified_by']]; ?>
			&nbsp;
		</td></tr>
 </table>
</div>

 <div class="posCustomers_history view">
 <div style="float:left; width:100%;"> 
    <table cellspacing="0" cellpadding="0" border="0" style="" class="view_table">
      <thead>
        <tr>
        	<th align="left" > <?php echo  'Account Name';?> </th>
		  	<th align="left"  style="width:250px;"> <?php echo  'Balance';?> </th>
 	    </tr>
      </thead>
   <tbody>

<?php 
	$balance_diff=0;
	foreach($customer_ledgers as $customer){
 		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';	} ?>
 	<tr style="height:30px;" id='<?php echo 'row_'.$customer['mayasoftbd_pos_customer_ledgers']['account_head_id'];?>'  <?php echo $class;?>>
 		<td align='left' style="width:400px;"> <?php echo $customer['0']['AccountName']; ?>&nbsp; </td>
        <td align='left' style="width:400px;"> <?php echo $customer['0']['Balance']; ?>&nbsp; </td>
	</tr> 
 <?php	$balance_diff=$balance_diff+$customer['0']['Balance']; } {?>
	<tr>
			<td align='left'> Customer Due &nbsp;   </td>
            <td align='left'><?php echo '='.'&nbsp '.$balance_diff; ?>&nbsp;   </td>
 	</tr>
	<?php }?> 
    </tbody>
     </table>
     </div>
 </div>  
 </div>   
    
    
    
    <div class="history">
    
	    <div style="float:left; width:22%;"> 
   <table cellspacing="0" cellpadding="0" border="0" style="" class="view_table">
    <thead>
        <tr>
 			<th align="left" > <?php echo  'Sale Date';?></th>
			<th align="left" > <?php echo  'Price';?></th>
			<th align="left" > <?php echo  'Link';?></th>
       	   </tr>
      </thead>
  <tbody>
<?php
	$i = 0;
	$total_price=0;
	//pr($totalsales);
	 	foreach ($totalsales as $totalsale){
	 	$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr id='<?php echo 'row_'.$totalsale['PosCustomer']['id'];?>'  <?php echo $class;?>>
 
		<td align='left'> <?php 
		echo date("d/m/Y", strtotime($totalsale['PosSale']['purchase_date'])); ?>&nbsp;</td>
		<td align='left'><?php echo $totalsale['PosSale']['totalprice']; ?>&nbsp; </td>
		   	
		<td class="actions">
 		<?php echo $this->Html->link(__('Invoice', true), array('controller'=>'PosSales','action' => 'invoice_view', $totalsale['PosSale']['id']),array('class'=>'link_view action_link')); ?>
	 	 </td>
	  
	</tr> 
<?php
		$total_price=$total_price+$totalsale['PosSale']['totalprice'];
	 	} ?>
	 
 <?php if($total_price>0){?>
<tr>
 	
		<td align='left' style="text-align:right">  Total &nbsp; </td>
		<td align='left'> <?php echo $total_price; ?> &nbsp; </td>
	  	<td align='left'>&nbsp;  </td>  	 		 
	</tr>
	<?php }?> 
	
    </table>
    </div>
    	<div style="float:left; width:28%;"> 
   <table cellspacing="0" cellpadding="0" border="0" style="" class="view_table">
    <thead>
        <tr>
 			<th align="left" > <?php echo  'Recive Date';?></th>
			<th align="left" > <?php echo  'Delevery Date';?></th>
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
        <td align='left'>need to work when service delevery complete &nbsp; </td>
		   	
		<td class="actions">
 		<?php echo $this->Html->link(__('Service', true), array('controller'=>'ServiceDeviceInfos','action' => 'receive_invoice', $totalsale['ServiceDeviceInfo']['id']),array('class'=>'link_view action_link')); ?>
	 	 </td>
	  
	</tr> 
<?php
 	 	} ?>
      </table>
    </div>
 		<div style="float:left; width:48%;"> 
    <table cellspacing="0" cellpadding="0" border="0" style="" class="view_table">
      <thead>
        <tr>
        	<th align="left" > <?php echo  'Payamount Date';?> </th>
		  	<th align="left"  style="width:250px;"> <?php echo  'Payment Mode';?> </th>
		    <th align="left" > <?php echo  'Debit';?> </th>
            <th align="left" > <?php echo  'Credit';?> </th>
	    </tr>
      </thead>
   <tbody>
<?php
 
	$i = 0;
	$debit_total_payamount=0;
	$credit_total_payamount=0;
 	foreach ($posCustomer['PosCustomerLedger'] as $totalpayamount){
	 	$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr style="height:30px;" id='<?php echo 'row_'.$totalpayamount['id'];?>'  <?php echo $class;?>>
  	 	<td align='left'><?php echo date("d/m/Y", strtotime($totalpayamount['created'])); ?>&nbsp; </td>
		<td align='left'> <?php echo  $totalpayamount['note'];  ?>&nbsp; </td>
		<?php if( $totalpayamount['debit_credit'] == 1){
				echo "<td align='left'>". $totalpayamount['amount'] ."&nbsp; </td><td align='left'>&nbsp; </td>";
				$debit_total_payamount = $debit_total_payamount + $totalpayamount['amount'];
		
		}else{
				echo "<td align='left'>&nbsp; </td><td align='left'>". $totalpayamount['amount'] ."&nbsp; </td>";
				$credit_total_payamount = $credit_total_payamount +$totalpayamount['amount'];
		}?>

 	</tr> 
<?php
 	 
		} ?>
   
	<tr>
 			<td align='left'> Total&nbsp;   </td>
			<td align='left'> <?php //echo $total_payamount;   ?>&nbsp; </td>  	 	
			<td  style="font-weight:bold;"align='left'> <?php echo $debit_total_payamount; ?> &nbsp; </td>
            <td  style="font-weight:bold;"align='left'> <?php echo $credit_total_payamount; ?> &nbsp; </td>
	</tr>
	 
     </table>
    </div>
	</div>
	 
     




 