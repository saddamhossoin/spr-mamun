<div class="flexigrid" style="width: 100%;">
 <div class="mDiv">
  <div class="ftitle">
    <p> <?php echo $this->Paginator->counter(array(	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%')));	?> </p>
  </div>
  <div id="searchlink"> &nbsp;</div>
</div>

<div class="tDiv">
  <div class="tDiv2">
   <?php echo $this->Form->create('SaveOrder',array('controller' => 'saveOrders','action'=>'index' ));?>
   <?php echo $this->element('filter/commonfilter',array('cache' => array('time'=> '-7 days','key'=>'header')));?>
    <div class="button_area_filter">
     
      <?php echo $this->Form->button('Search',array( 'class'=>'submit', 'id'=>'btn_brand_search'));?>      <?php echo $this->Form->button('Reset',array('type'=>'reset','name'=>'reset','id'=>'Cancel', 'onClick'=>"parent.location='saveOrders/index/yes'"));?>     
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
           
         		<th align="left" ><div style=" width: 100px;"><?php echo $this->Paginator->sort('id');?></div></th>
			<th align="left" ><div style=" width: 100px;"><?php echo $this->Paginator->sort('first_name');?></div></th>
			<th align="left" ><div style=" width: 100px;"><?php echo $this->Paginator->sort('last_name');?></div></th>
			<th align="left" ><div style=" width: 100px;"><?php echo $this->Paginator->sort('email');?></div></th>
			<th align="left" ><div style=" width: 100px;"><?php echo $this->Paginator->sort('phone');?></div></th>
			<th align="left" ><div style=" width: 100px;"><?php echo $this->Paginator->sort('billing_address');?></div></th>
			<th align="left" ><div style=" width: 100px;"><?php echo $this->Paginator->sort('billing_address2');?></div></th>
			<th align="left" ><div style=" width: 100px;"><?php echo $this->Paginator->sort('billing_city');?></div></th>
			<th align="left" ><div style=" width: 100px;"><?php echo $this->Paginator->sort('billing_zip');?></div></th>
			<th align="left" ><div style=" width: 100px;"><?php echo $this->Paginator->sort('billing_state');?></div></th>
			<th align="left" ><div style=" width: 100px;"><?php echo $this->Paginator->sort('billing_country');?></div></th>
			<th align="left" ><div style=" width: 100px;"><?php echo $this->Paginator->sort('shipping_address');?></div></th>
			<th align="left" ><div style=" width: 100px;"><?php echo $this->Paginator->sort('shipping_address2');?></div></th>
			<th align="left" ><div style=" width: 100px;"><?php echo $this->Paginator->sort('shipping_city');?></div></th>
			<th align="left" ><div style=" width: 100px;"><?php echo $this->Paginator->sort('shipping_zip');?></div></th>
			<th align="left" ><div style=" width: 100px;"><?php echo $this->Paginator->sort('shipping_state');?></div></th>
			<th align="left" ><div style=" width: 100px;"><?php echo $this->Paginator->sort('shipping_country');?></div></th>
			<th align="left" ><div style=" width: 100px;"><?php echo $this->Paginator->sort('weight');?></div></th>
			<th align="left" ><div style=" width: 100px;"><?php echo $this->Paginator->sort('order_item_count');?></div></th>
			<th align="left" ><div style=" width: 100px;"><?php echo $this->Paginator->sort('subtotal');?></div></th>
			<th align="left" ><div style=" width: 100px;"><?php echo $this->Paginator->sort('tax');?></div></th>
			<th align="left" ><div style=" width: 100px;"><?php echo $this->Paginator->sort('shipping');?></div></th>
			<th align="left" ><div style=" width: 100px;"><?php echo $this->Paginator->sort('total');?></div></th>
			<th align="left" ><div style=" width: 100px;"><?php echo $this->Paginator->sort('order_type');?></div></th>
			<th align="left" ><div style=" width: 100px;"><?php echo $this->Paginator->sort('authorization');?></div></th>
			<th align="left" ><div style=" width: 100px;"><?php echo $this->Paginator->sort('transaction');?></div></th>
			<th align="left" ><div style=" width: 100px;"><?php echo $this->Paginator->sort('status');?></div></th>
			<th align="left" ><div style=" width: 100px;"><?php echo $this->Paginator->sort('ip_address');?></div></th>
			<th align="left" ><div style=" width: 100px;"><?php echo $this->Paginator->sort('created');?></div></th>
			<th align="left" ><div style=" width: 100px;"><?php echo $this->Paginator->sort('modified');?></div></th>
			<th align="left" ><div style=" width: 100px;"><?php echo $this->Paginator->sort('created_by');?></div></th>
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
	foreach ($saveOrders as $saveOrder):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr id='<?php echo 'row_'.$saveOrder['SaveOrder']['id'];?>'  <?php echo $class;?>>
		<td align='left'><div style='width: 100px;' class='alistname'><?php echo $saveOrder['SaveOrder']['id']; ?>&nbsp;</div></td>
		<td align='left'><div style='width: 100px;' class='alistname'><?php echo $saveOrder['SaveOrder']['first_name']; ?>&nbsp;</div></td>
		<td align='left'><div style='width: 100px;' class='alistname'><?php echo $saveOrder['SaveOrder']['last_name']; ?>&nbsp;</div></td>
		<td align='left'><div style='width: 100px;' class='alistname'><?php echo $saveOrder['SaveOrder']['email']; ?>&nbsp;</div></td>
		<td align='left'><div style='width: 100px;' class='alistname'><?php echo $saveOrder['SaveOrder']['phone']; ?>&nbsp;</div></td>
		<td align='left'><div style='width: 100px;' class='alistname'><?php echo $saveOrder['SaveOrder']['billing_address']; ?>&nbsp;</div></td>
		<td align='left'><div style='width: 100px;' class='alistname'><?php echo $saveOrder['SaveOrder']['billing_address2']; ?>&nbsp;</div></td>
		<td align='left'><div style='width: 100px;' class='alistname'><?php echo $saveOrder['SaveOrder']['billing_city']; ?>&nbsp;</div></td>
		<td align='left'><div style='width: 100px;' class='alistname'><?php echo $saveOrder['SaveOrder']['billing_zip']; ?>&nbsp;</div></td>
		<td align='left'><div style='width: 100px;' class='alistname'><?php echo $saveOrder['SaveOrder']['billing_state']; ?>&nbsp;</div></td>
		<td align='left'><div style='width: 100px;' class='alistname'><?php echo $saveOrder['SaveOrder']['billing_country']; ?>&nbsp;</div></td>
		<td align='left'><div style='width: 100px;' class='alistname'><?php echo $saveOrder['SaveOrder']['shipping_address']; ?>&nbsp;</div></td>
		<td align='left'><div style='width: 100px;' class='alistname'><?php echo $saveOrder['SaveOrder']['shipping_address2']; ?>&nbsp;</div></td>
		<td align='left'><div style='width: 100px;' class='alistname'><?php echo $saveOrder['SaveOrder']['shipping_city']; ?>&nbsp;</div></td>
		<td align='left'><div style='width: 100px;' class='alistname'><?php echo $saveOrder['SaveOrder']['shipping_zip']; ?>&nbsp;</div></td>
		<td align='left'><div style='width: 100px;' class='alistname'><?php echo $saveOrder['SaveOrder']['shipping_state']; ?>&nbsp;</div></td>
		<td align='left'><div style='width: 100px;' class='alistname'><?php echo $saveOrder['SaveOrder']['shipping_country']; ?>&nbsp;</div></td>
		<td align='left'><div style='width: 100px;' class='alistname'><?php echo $saveOrder['SaveOrder']['weight']; ?>&nbsp;</div></td>
		<td align='left'><div style='width: 100px;' class='alistname'><?php echo $saveOrder['SaveOrder']['order_item_count']; ?>&nbsp;</div></td>
		<td align='left'><div style='width: 100px;' class='alistname'><?php echo $saveOrder['SaveOrder']['subtotal']; ?>&nbsp;</div></td>
		<td align='left'><div style='width: 100px;' class='alistname'><?php echo $saveOrder['SaveOrder']['tax']; ?>&nbsp;</div></td>
		<td align='left'><div style='width: 100px;' class='alistname'><?php echo $saveOrder['SaveOrder']['shipping']; ?>&nbsp;</div></td>
		<td align='left'><div style='width: 100px;' class='alistname'><?php echo $saveOrder['SaveOrder']['total']; ?>&nbsp;</div></td>
		<td align='left'><div style='width: 100px;' class='alistname'><?php echo $saveOrder['SaveOrder']['order_type']; ?>&nbsp;</div></td>
		<td align='left'><div style='width: 100px;' class='alistname'><?php echo $saveOrder['SaveOrder']['authorization']; ?>&nbsp;</div></td>
		<td align='left'><div style='width: 100px;' class='alistname'><?php echo $saveOrder['SaveOrder']['transaction']; ?>&nbsp;</div></td>
		<td align='left'><div style='width: 100px;' class='alistname'><?php echo $saveOrder['SaveOrder']['status']; ?>&nbsp;</div></td>
		<td align='left'><div style='width: 100px;' class='alistname'><?php echo $saveOrder['SaveOrder']['ip_address']; ?>&nbsp;</div></td>
		<td align='left'><div style='width: 100px;' class='alistname'><?php echo $saveOrder['SaveOrder']['created']; ?>&nbsp;</div></td>
		<td align='left'><div style='width: 100px;' class='alistname'><?php echo $saveOrder['SaveOrder']['modified']; ?>&nbsp;</div></td>
		<td align='left'><div style='width: 100px;' class='alistname'><?php echo $saveOrder['SaveOrder']['created_by']; ?>&nbsp;</div></td>
		<td align='left'><div style='width: 100px;' class='alistname'><?php echo $saveOrder['SaveOrder']['modified_by']; ?>&nbsp;</div></td>
		<td class="actions">
<div style='width: 180px;' class='alistname link_link'>			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $saveOrder['SaveOrder']['id']),array('class'=>'link_view action_link')); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $saveOrder['SaveOrder']['id']),array('class'=>'link_edit action_link')); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $saveOrder['SaveOrder']['id']), array('class'=>'link_delete action_link'), sprintf(__('Are you sure you want to delete # %s?', true), $saveOrder['SaveOrder']['id'])); ?>
		</div></td>
	</tr>
<?php endforeach; ?>
    </table>
    </div>
    
    <div class="pDiv">
    <div class="pGroup">
     	 <?php if($this->params['paging']['SaveOrder']['prevPage']){?>
      <span class='paginate_link'><?php echo $paginator->first();?></span> <span class='paginate_link'><?php echo $this->Paginator->prev('< ' . __('Previous', true), array(), null, array('class'=>'disabled','id'=>'prev_id'));?></span>
      <?php }?>
      <?php echo $this->Paginator->numbers();?>
      <?php if($this->params['paging']['SaveOrder']['nextPage']){?>
      <span class='paginate_link'> <?php echo $this->Paginator->next(__('Next', true) . ' >', array(), null, array('class' => 'disabled','id'=>'next_id', 'span'=>false));?> </span> <span class='paginate_link'><?php echo $this->Paginator->last();?></span>
      <?php }?>
    </div>
  </div>     
</div>
 