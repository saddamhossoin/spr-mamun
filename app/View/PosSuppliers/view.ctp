 <?php
// pr($posSupplier);
  $payment_mode=array(1=>"Purchase",2=>"Supplier Payment" , 3 =>"Return");?>
<?php echo $this->Html->css(array('common/grid'));?>
<div class="supplier_view_div">

<div class="posSuppliers view">
	<table cellpadding="0" cellspacing="0" class="view_table"><?php $i = 0; $class = ' class="altrow"';?>
		<?php  echo $this->Form->input('PosSupplier.pos_supplier_id',array('value'=>$posSupplier['PosSupplier']['id'],'type'=>'hidden','div'=>false,'label'=>false)); ?> 
    
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo __('Name'); ?></td><td> : </td>
		<td >
			<?php echo $posSupplier['PosSupplier']['name']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo __('Contactname'); ?></td><td> : </td>
		<td >
			<?php echo $posSupplier['PosSupplier']['contactname']; ?>
			&nbsp;
		</td></tr>
 	 
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo __('Address'); ?></td><td> : </td>
		<td >
			<?php echo $posSupplier['PosSupplier']['address']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo __('Mobile'); ?></td><td> : </td>
		<td >
			<?php echo $posSupplier['PosSupplier']['mobile']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo __('Email'); ?></td><td> : </td>
		<td >
			<?php echo $posSupplier['PosSupplier']['email']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo __('Skype'); ?></td><td> : </td>
		<td >
			<?php echo $posSupplier['PosSupplier']['skype']; ?>
			&nbsp;
		</td></tr>

<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo __('Website'); ?></td><td> : </td>
		<td >
			<?php echo $posSupplier['PosSupplier']['website']; ?>
			&nbsp;
		</td></tr>

<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo __('Telephone'); ?></td><td> : </td>
		<td >
			<?php echo $posSupplier['PosSupplier']['telephone']; ?>
			&nbsp;
		</td></tr>
        <?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo __('Iva'); ?></td><td> : </td>
		<td >
			<?php echo $posSupplier['PosSupplier']['iva']; ?>
			&nbsp;
		</td></tr>
        <?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo __('Fax'); ?></td><td> : </td>
		<td >
			<?php echo $posSupplier['PosSupplier']['fax']; ?>
			&nbsp;
		</td></tr>
         <?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo __('Note'); ?></td><td> : </td>
		<td >
			<?php echo $posSupplier['PosSupplier']['note']; ?>
			&nbsp;
		</td></tr>
        
        
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo __('Created By'); ?></td><td> : </td>
		<td >
		<?php echo $_SESSION['userlists'][$posSupplier['PosSupplier']['created_by']]; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo __('Modified By'); ?></td><td> : </td>
		<td >
			<?php echo $_SESSION['userlists'][$posSupplier['PosSupplier']['modified_by']]; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo __('Created'); ?></td><td> : </td>
		<td >
			<?php  echo date("d/m/Y", strtotime($posSupplier['PosSupplier']['created'])); 	  ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo __('Modified'); ?></td><td> : </td>
		<td >
			
			<?php  echo date("d/m/Y", strtotime($posSupplier['PosSupplier']['modified']));  ?>

			&nbsp;
		</td></tr>
<?php $i++;?>	</table>
</div>

<div class="possupplier_history view"> 

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
	foreach($supplier_ledgers as $supplier_ledger){
		
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
			
		} ?>
    
	<tr style="height:30px;" id='<?php echo 'row_'.$supplier_ledger['mayasoftbd_pos_supplier_ledgers']['account_head_id'];?>'  <?php echo $class;?>>
	
		<td align='left' style="width:400px;"> <?php echo $supplier_ledger['0']['AccountName']; ?>&nbsp; </td>
        <td align='left' style="width:400px;"> <?php echo abs ($supplier_ledger['0']['Balance']); ?>&nbsp; </td>
	</tr> 


<?php
	$balance_diff=$balance_diff-$supplier_ledger['0']['Balance'];
	 }   ?>
	<tr>
 			<td align='left'> Supplier Due :&nbsp;   </td>
            <td align='left'><?php echo '='.'&nbsp '.$balance_diff; ?>&nbsp;   </td>
 	</tr>
	 
     </table>
     </div>
 </div> 

 
</div>
<br /><br />  

<div style="float:left; width:50%;"> 
   <table cellspacing="0" cellpadding="0" border="0" style="" class="view_table">
    <thead>
     <tr> <th colspan="5" class="ftitle"> Invoice History</th></tr>
        <tr>
 			<th align="left" width="15%"> <?php echo  'Date';?></th>
   			<th align="left" width="30%"> <?php echo  'From';?></th>
            <th align="left" width="20%"> <?php echo  'Type';?></th>
            <th align="left" width="20%"> <?php echo  'Price';?></th>
			<th align="left" width="15%"> <?php echo  'Link';?></th>
       	   </tr>
      </thead>
  <tbody>
<?php
 $purchase = 0;
 $payment = 0;
 $return = 0;
   	$i = 0;
 	 	foreach ($posSupplier['PosSupplierLedger'] as $spLedger){
		 
	 
		 
	 	$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
		 if(($spLedger ['payment_mode'] == 1 && $spLedger ['note'] == 'Inventory' ) || $spLedger ['payment_mode'] == 2 || $spLedger ['payment_mode'] == 3){
	?>
	<tr id='<?php echo 'row_'.$spLedger['id'];?>'  <?php echo $class;?>>
 
		<td align='left'> <?php echo date("d/m/Y", strtotime($spLedger ['created'])); ?>&nbsp;</td>
		<td align='left'>
		<?php if($spLedger ['payment_mode'] == 1){
					$purchase = $purchase + $spLedger['amount'];
					echo "Purchase";
				}else if($spLedger ['payment_mode'] == 3){
					echo "Return";
					$return = $return + $spLedger['amount'];
				}else{
					$payment = $payment + $spLedger['amount'];
					echo "Supplier Payment";
				} ?>&nbsp; </td>
        
        <td align='left'><?php if($spLedger ['debit_credit'] == 1){
				echo "Debit";
 				}else{
 				echo "Credit";
				} ?>&nbsp;
            </td>
        
        <td align='left'><?php echo $spLedger ['amount']; ?>&nbsp; </td>
		   	
		<td class="actions">
 		<?php
		 if($spLedger ['payment_mode'] == 1 && $spLedger ['note'] == 'Inventory'){
		  echo $this->Html->link(__('Invoice', true), array('controller'=>'PosPurchases','action' => 'view', $spLedger ['pos_purchase_id']),array('class'=>'link_view action_link'));
		} 
		else if($spLedger ['payment_mode'] == 2){
		  echo $this->Html->link(__('Details', true), array('controller'=>'PosSupplierLedgers','action' => 'view', $spLedger ['id']),array('class'=>'link_view action_link'));
		}
		else if($spLedger ['payment_mode'] == 3){
		  echo $this->Html->link(__('Invoice', true), array('controller'=>'PosPurchaseReturns','action' => 'view', $spLedger ['pos_purchase_id']),array('class'=>'link_view action_link'));
 		}
		 ?>
	 	 </td>
 	</tr>
    <?php }}?> 
    <tr>
    	<td></td>
       	<td></td>
        <td></td>
        <td></td>
    </tr> 
    <tr>
    	<td>Summary = </td>
       	<td><?php echo "Purchase : - " .$purchase;?></td>
       	<td style="font-weight:bold;"><?php echo "Return : - " . $return;?></td>
      	<td style="font-weight:bold;"><?php echo "Payment : - " .$payment;?></td>
     </tr>
     </table>
    </div>
    
    
<div style="float:left; width:48%;"> 
    <table cellspacing="0" cellpadding="0" border="0" style="" class="view_table">
      <thead>
       <tr> <th colspan="5" class="ftitle"> Payment History</th></tr>
        <tr>
        	<th align="left" > <?php echo  'Payamount Date';?> </th>
		  	<th align="left"  style="width:250px;"> <?php echo  'Payment Mode';?> </th>
             <th align="left" > <?php echo  'Credit';?> </th>
	    </tr>
      </thead>
   <tbody>
<?php
 
	$i = 0;
 	$credit_total_payamount=0;
 	foreach ($posSupplier['PosSupplierLedger'] as $totalpayamount){
	 	$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
		
		if(  $totalpayamount ['note'] != 'Inventory' ){
	?>
	<tr style="height:30px;" id='<?php echo 'row_'.$totalpayamount['id'];?>'  <?php echo $class;?>>
  	 	<td align='left'><?php echo date("d/m/Y", strtotime($totalpayamount['created'])); ?>&nbsp; </td>
		<td align='left'> <?php 
		
		if($totalpayamount['payment_mode']== 1){
			echo "Purchase";
			}
		else if($totalpayamount['payment_mode'] == 2){
			echo "Payment";
			}
		else if($totalpayamount['payment_mode']== 3){
			echo "Return";
			}
		
		?> &nbsp;</td>
		<?php  
				echo " <td align='left'>". $totalpayamount['amount'] ."&nbsp; </td>";
				$credit_total_payamount = $credit_total_payamount +$totalpayamount['amount'];
		 ?>

 	</tr> 
<?php
 	 
		}} ?>
   
	<tr>
 			<td align='left' colspan="2"> Total Credit&nbsp;   </td>
              <td  style="font-weight:bold;" align='right'  > <?php echo $credit_total_payamount; ?> &nbsp; </td>
	</tr>
	 
     </table>
    </div>
  	 
     
 

  