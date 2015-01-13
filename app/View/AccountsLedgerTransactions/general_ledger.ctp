<?php echo $this->Html->css('common/grid'); 
	    echo $this->Html->script(array('common/commonindex'));
        ?><div class="flexigrid" style="width: 100%;">
 <div class="mDiv">
  <div class="ftitle">
    <p> <?php echo $this->Paginator->counter(array(	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%')));	?> </p>
  </div>
 </div>

<div class="tDiv">
   
  <div style="clear: both;"></div>
</div>

<div class="bDiv" style="height: auto;">
<div class="hDiv">
  <div class="hDivBox">
    <table cellspacing="0" cellpadding="0" width="100%">
      <thead>
        <tr>
           	<th align="left" width="12%"><?php echo $this->Paginator->sort('transaction_date');?></th>
            <th align="left" width="12%"><?php echo $this->Paginator->sort('account_head_id');?></th>
			<th align="left" width="12%"><?php echo $this->Paginator->sort('counter_account_head_id');?></th>
            <th align="left" width="10%"><?php echo $this->Paginator->sort('jurnalNumber');?></th>
			<th align="left" width="10%"><?php echo 'Debit';?></th>
			<th align="left" width="10%"><?php echo 'Credit';?></th>
            <th align="left" width="16%"><?php echo $this->Paginator->sort('Note');?> </th>
  		   <th align="left" class="link_text"> <?php echo 'Link';?></th>
        </tr>
      </thead>
    </table>
  </div>
</div>
 
  <table cellspacing="0" cellpadding="0" border="0" style="" class="flexme3">
      <tbody>
<?php
//pr($accountsLedgerTransactions);
	$i = 0;
	$purchaseDate = '';
	foreach ($accountsLedgerTransactions as $accountsLedgerTransaction):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
		$dataDate = date('l d / m / Y',strtotime($accountsLedgerTransaction['AccountsLedgerTransaction']['transaction_date']));
		if($purchaseDate == "" ||  $dataDate!= $purchaseDate){
			echo "<tr><td colspan = '8' class = 'listDateHeading'>".$dataDate."</td></tr>";
			$purchaseDate = $dataDate;
		}
	?>
	<tr id='<?php echo 'row_'.$accountsLedgerTransaction['AccountsLedgerTransaction']['id'];?>'  <?php echo $class;?>>
		
     <td align='left' width="12%"> <?php echo date('j/m/Y h:i:s A ',strtotime( $accountsLedgerTransaction['AccountsLedgerTransaction']['transaction_date'])); ?>&nbsp;</td>
     <td align='left' width="12%"> <?php echo $accountsLedgerTransaction['AccountsHead']['title']; ?>&nbsp;</td>
    <td align='left' width="12%"><?php echo $accountsLedgerTransaction['AccountsLedgerTransaction']['counter_account_head_id']; ?>&nbsp;</td>
    <td align='left' width="10%"> <?php echo $accountsLedgerTransaction['AccountsLedgerTransaction']['jurnalNumber']; ?>&nbsp; </td>
    <td align='left' width="10%"> <?php if($accountsLedgerTransaction['AccountsLedgerTransaction']['debit_credit'] == 1){echo $accountsLedgerTransaction['AccountsLedgerTransaction']['amount'];} ?>&nbsp;</td>
    <td align='left' width="10%"> <?php if($accountsLedgerTransaction['AccountsLedgerTransaction']['debit_credit'] == 2){echo $accountsLedgerTransaction['AccountsLedgerTransaction']['amount'];} ?>&nbsp;</td>
      <td align='left' class='alistname' width="16%"><?php echo $accountsLedgerTransaction['AccountsLedgerTransaction']['Note']; ?>&nbsp; </td>
 
 	<td class="actions" class='alistname link_link'>
        <?php echo $this->Html->link(__('View', true), array('action' => 'view', $accountsLedgerTransaction['AccountsLedgerTransaction']['id']),array('class'=>'link_view action_link')); ?>
		<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $accountsLedgerTransaction['AccountsLedgerTransaction']['id']),array('class'=>'link_edit action_link')); ?>
        <?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $accountsLedgerTransaction['AccountsLedgerTransaction']['id']), array('class'=>'link_delete action_link'), sprintf(__('Are you sure you want to delete # %s?', true), $accountsLedgerTransaction['AccountsLedgerTransaction']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
    </table>
    </div>
    
     <div class="pDiv">
    <div class="pGroup">
     	 <?php if($this->params['paging']['AccountsLedgerTransaction']['prevPage']){?>
      <span class='paginate_link'><?php echo $this->Paginator->first(__('<< First', true), array('class' => 'number-first'));?></span> <span class='paginate_link'><?php echo $this->Paginator->prev('< ' . __('Previous', true), array(), null, array('class'=>'disabled','id'=>'prev_id'));?></span>
      <?php }?>
       <?php echo $this->Paginator->numbers(array('class' => 'numbers', 'first' => false, 'last' => false));?>
      <?php 
	  
	  if($this->params['paging']['AccountsLedgerTransaction']['nextPage'] ){?>
      <span class='paginate_link'> <?php echo $this->Paginator->next(__('Next', true) . ' >', array(), null, array('class' => 'disabled','id'=>'next_id', 'span'=>false));?> </span> <span class='paginate_link'><?php echo $this->Paginator->last(__('>> Last', true), array('class' => 'number-end'));?></span>
      <?php }?>
    </div>
  </div>     
</div>
 