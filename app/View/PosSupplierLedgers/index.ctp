<div class="flexigrid" style="width: 100%;">
 <div class="mDiv">
  <div class="ftitle">
    <p> <?php echo $this->Paginator->counter(array(	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%')	));	?> </p>
  </div>
  <div id="searchlink"> &nbsp;</div>
</div>
 <?php $payment_mode=array(1=>"Purchase",2=>"Supplier Payment");?>
<div class="tDiv">
  <div class="tDiv2">
   <?php echo $this->Form->create('PosSupplierLedger',array('controller' => 'posSupplierLedgers','action'=>'index' ));?>
		   <div id="WrapperTestName" class="microcontroll">
		    		<?php echo $this->Form->label('PosSupplierLedger.payment_mode', __('Payment Mode'.': <span class="star"></span>', true),array('id'=>'filtermodifyedby')  ); ?>
					<?php  echo $this->Form->input('PosSupplierLedger.payment_mode',array('type'=>'select','options'=>$payment_mode,'div'=>false,'label'=>false,'class'=>'required select2as','empty'=>'-- Select Payment Mode --'));    ?>
			  		<?php  echo $this->Form->label('PosSupplierLedger.pos_supplier_id', __('Supplier'.': <span class="star"></span>', true),array('id'=>'filtermodifyedby')  );   
						   echo $this->Form->input('PosSupplierLedger.pos_supplier_id',array('type'=>'select','options'=>$possuppliers,'div'=>false,'label'=>false,'class'=>'required select2as','empty'=>'-- Select Supplier --'));  
			  ?>
		   </div>
   <?php echo $this->element('filter/commonfilter',array('cache' => array('time'=> '-7 days','key'=>'header')));?>
    <div class="button_area_filter">
     
      <?php echo $this->Form->button('Search',array( 'class'=>'submit', 'id'=>'btn_brand_search'));?>      <?php echo $this->Form->button('Reset',array('type'=>'reset','name'=>'reset','id'=>'Cancel', 'onClick'=>"parent.location='".$this->webroot."posSupplierLedgers/index/yes'"));?>     
    </div>
    </form>
  </div>
  <div style="clear: both;"></div>
</div>

<div class="bDiv" style="height: auto;">
<div class="hDiv">
  <div class="hDivBox">
    <table cellspacing="0" cellpadding="0">
      <thead>
        <tr>
          <th align="center" class="sorted"><div  style="width: 40px;">
                            <?php echo $this->Form->checkbox('checkbox',array( 'div'=>false,'label'=>false, 'size'=>25,'class'=>'commoncheckbox'));?> </div></th>
          	<th align="left" ><div style=" width: 100px;"><?php echo $this->Paginator->sort('payment_mode');?></div></th>
			<th align="left" ><div style=" width: 100px;"><?php echo $this->Paginator->sort('pos_supplier_id','Supplier');?></div></th>
			<th align="left" ><div style=" width: 100px;"><?php echo $this->Paginator->sort('totalprice');?></div></th>
			<th align="left" ><div style=" width: 100px;"><?php echo $this->Paginator->sort('payamount');?></div></th>
			<th align="left" ><div style=" width: 100px;"><?php echo $this->Paginator->sort('modified');?></div></th>
			<th align="left" ><div style=" width: 100px;"><?php echo $this->Paginator->sort('modified_by');?></div></th>
	        <?php if($this->Session->read('username')=='Admin' || $this->Session->read('username')=='SuperAdmin'){?>          <th align="right"  ><div style="text-align: left; width: 100px;"><?php echo $this->Paginator->sort('User','modifiedBy');?></div></th>
          <?php } ?>          <th align="left" ><div style=" width: 180px;" class="link_text"><?php echo 'Link';?></div></th>
        </tr>
      </thead>
    </table>
  </div>
</div>
 
  <table cellspacing="0" cellpadding="0" border="0" style="" class="flexme3">
      <tbody>
<?php
	$i = 0;
	foreach ($posSupplierLedgers as $posSupplierLedger):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr id='<?php echo 'row_'.$posSupplierLedger['PosSupplierLedger']['id'];?>'<?php echo $class;?>>
<td align='center'  class='sorted' align='center' >
          <div style='width:40px;text-align:center;'>
		  <?php echo $this->Form->checkbox('PosSupplierLedger.checkbox',array( 'div'=>false,'label'=>false, 'size'=>35,'class'=>'listcheckbox','value'=>$posSupplierLedger['PosSupplierLedger']['id']));?> 
		  </div>
          </td>		
		  <td align='left'><div style='width: 100px;' class='alistname'><?php echo $payment_mode[$posSupplierLedger['PosSupplierLedger']['payment_mode']]; ?>&nbsp;</div></td>
		<td align='left'><div style='width: 100px;' class='alistname'>
			<?php echo $this->Html->link($posSupplierLedger['PosSupplier']['name'], array('controller' => 'pos_suppliers', 'action' => 'view', $posSupplierLedger['PosSupplier']['id'])); ?>
		</div></td>
		<td align='left'><div style='width: 100px;' class='alistname'><?php echo $posSupplierLedger['PosSupplierLedger']['totalprice']; ?>&nbsp;</div></td>
		<td align='left'><div style='width: 100px;' class='alistname'><?php echo $posSupplierLedger['PosSupplierLedger']['payamount']; ?>&nbsp;</div></td>
		<td align='left'><div style='width: 100px;' class='alistname'><?php echo $posSupplierLedger['PosSupplierLedger']['modified']; ?>&nbsp;</div></td>
		<td align='left'><div style='width: 100px;' class='alistname'><?php echo $userlists[$posSupplierLedger['PosSupplierLedger']['modified_by']]; ?>&nbsp;</div></td>
		<td class="actions">
<div style='width: 180px;' class='alistname link_link'>			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $posSupplierLedger['PosSupplierLedger']['id']),array('class'=>'link_view action_link')); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $posSupplierLedger['PosSupplierLedger']['id']),array('class'=>'link_edit action_link')); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $posSupplierLedger['PosSupplierLedger']['id']), array('class'=>'link_delete action_link'), sprintf(__('Are you sure you want to delete # %s?', true), $posSupplierLedger['PosSupplierLedger']['id'])); ?>
		</div></td>
	</tr>
<?php endforeach; ?>
    </table>
    </div>
    
    <div class="pDiv">
    <div class="pGroup">
     	 <?php if($this->params['paging']['PosSupplierLedger']['prevPage']){?>
      <span class='paginate_link'><?php echo $this->Paginator->first();?></span> <span class='paginate_link'><?php echo $this->Paginator->prev('< ' . __('Previous', true), array(), null, array('class'=>'disabled','id'=>'prev_id'));?></span>
      <?php }?>
      <?php echo $this->Paginator->numbers();?>
      <?php if($this->params['paging']['PosSupplierLedger']['nextPage']){?>
      <span class='paginate_link'> <?php echo $this->Paginator->next(__('Next', true) . ' >', array(), null, array('class' => 'disabled','id'=>'next_id', 'span'=>false));?> </span> <span class='paginate_link'><?php echo $this->Paginator->last();?></span>
      <?php }?>
    </div>
  </div>     
</div>
 