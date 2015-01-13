<div class="flexigrid" style="width: 100%;">
 <div class="mDiv">
  <div class="ftitle">
    <p> <?php echo $this->Paginator->counter(array(	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%')	));	?> </p>
  </div>
  <div id="searchlink"> &nbsp;</div>
</div>

	 
<div class="tDiv">
  <div class="tDiv2">
   <?php echo $this->Form->create('PosPurchaseReturn',array('controller' => 'PosPurchaseReturns','action'=>'index' ));?>
	  
   <?php echo $this->element('filter/commonfilter',array('cache' => array('time'=> '-7 days','key'=>'header')));?>
    <div class="button_area_filter">
     
      <?php echo $this->Form->button('Search',array( 'class'=>'submit', 'id'=>'btn_brand_search'));?>      <?php echo $this->Form->button('Reset',array('type'=>'reset','name'=>'reset','id'=>'Cancel', 'onClick'=>"parent.location='".$this->webroot."PosPurchaseReturns/index/yes'"));?>     
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
 		  
 			<th align="left" width="10%"><?php echo $this->Paginator->sort('pos_supplier_id','Supplier');?></th>
			<th align="left" width="10%"><?php echo $this->Paginator->sort('total_price','Total Price');?></th>
 			<th align="left" width="10%"><?php echo $this->Paginator->sort('return_amount','Return Amount');?></th>
 			<th align="left" width="12%"><?php echo $this->Paginator->sort('product_amount');?></th>
            <th align="left" width="7%"><?php echo $this->Paginator->sort('tax');?></th>
  			<th align="left" width="7%"><?php echo $this->Paginator->sort('discount');?></th>
 	           <?php if($this->Session->read('username')=='Admin' || $this->Session->read('username')=='SuperAdmin'){?>          <th align="right" width="10%"><?php echo $this->Paginator->sort('User','modifiedBy');?></th>
          <?php } ?><th align="left" class="link_text" width="20%"><?php echo 'Link';?></th>
        </tr>
		</thead>
    </table>
  </div>
</div>
 
  <table cellspacing="0" cellpadding="0" border="0" style="" class="flexme3">
      <tbody>
	  	
<?php
  //pr($posPurchaseReturns);
if(!empty($posPurchaseReturns)){
	$i = 0;
	foreach ($posPurchaseReturns as $posPurchaseReturn):
	 //pr($posProduct);die();
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr id='<?php echo 'row_'.$posPurchaseReturn['PosPurchaseReturn']['id'];?>'  <?php echo $class;?>>
 		
         
		 
        <td align='left' class='alistname' width="10%"><?php echo $posPurchaseReturn['PosPurchaseReturn']['pos_supplier_id']; ?>&nbsp;</td>			  
		<td align='left' class='alistname' width="10%"><?php echo  $posPurchaseReturn['PosPurchaseReturn']['total_price']; ?>&nbsp;</td>			  
 		<td align='left' class='alistname' width="12%"><?php echo  $posPurchaseReturn['PosPurchaseReturn']['return_amount']; ?>&nbsp;</td>
         
  		<td align='left' class='alistname' width="7%"><?php echo $posPurchaseReturn['PosPurchaseReturn']['product_amount']; ?>&nbsp;</td>
		<td align='left' class='alistname' width="7%"><?php echo $posPurchaseReturn['PosPurchaseReturn']['tax']; ?>&nbsp;</td>
		<td align='left' class='alistname' width="7%"><?php echo $posPurchaseReturn['PosPurchaseReturn']['discount']; ?>&nbsp;</td>
		
 		<td class="actions" class='alistname link_link' width="20%">
        <?php echo $this->Html->link(__('View', true), array('action' => 'view', $posPurchaseReturn['PosPurchaseReturn']['id']),array('class'=>'link_view action_link')); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $posPurchaseReturn['PosPurchaseReturn']['id']),array('class'=>'link_edit action_link')); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $posPurchaseReturn['PosPurchaseReturn']['id']), array('class'=>'link_delete action_link'), sprintf(__('Are you sure you want to delete # %s?', true), $posPurchaseReturn['PosPurchaseReturn']['id'])); ?>
		 </td>
	</tr>
<?php endforeach;
}
else{
	echo 'No data found';
}?>
    </table>
    </div>
    
    <div class="pDiv">
    <div class="pGroup">
     	 <?php if($this->params['paging']['PosPurchaseReturn']['prevPage']){?>
      <span class='paginate_link'><?php echo $this->Paginator->first(__('<< First', true), array('class' => 'number-first'));?></span> <span class='paginate_link'><?php echo $this->Paginator->prev('< ' . __('Previous', true), array(), null, array('class'=>'disabled','id'=>'prev_id'));?></span>
      <?php }?>
       <?php echo $this->Paginator->numbers(array('class' => 'numbers', 'first' => false, 'last' => false));?>
      <?php 
	 
	  
	  if($this->params['paging']['PosPurchaseReturn']['nextPage'] ){?>
      <span class='paginate_link'> <?php echo $this->Paginator->next(__('Next', true) . ' >', array(), null, array('class' => 'disabled','id'=>'next_id', 'span'=>false));?> </span> <span class='paginate_link'><?php echo $this->Paginator->last(__('>> Last', true), array('class' => 'number-end'));?></span>
      <?php }?>
    </div>
  </div>     
</div>

 