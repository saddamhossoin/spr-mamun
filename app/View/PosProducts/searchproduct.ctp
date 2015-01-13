<div class="flexigrid" style="width: 100%;">
 <div class="mDiv">
  <div class="ftitle">
    <p> <?php echo $this->Paginator->counter(array(	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)	));	?> </p>
  </div>
</div>
<div class="bDiv" style="height: auto;">
<div class="hDiv">
  <div class="hDivBox">
    <table cellspacing="0" cellpadding="0">
      <thead>
        <tr>
           	<th align="left" ><div style=" width: 20px;"><?php echo $this->Paginator->sort('id');?></div></th>
			<th align="left" ><div style=" width: 90px;"><?php echo $this->Paginator->sort('Product','name');?></div></th>
			<th align="left" ><div style=" width: 90px;"><?php echo $this->Paginator->sort('Category','pos_pcategory_id');?></div></th>
			<th align="left" ><div style=" width: 80px;"><?php echo $this->Paginator->sort('Brand','pos_brand_id');?></div></th>
			<th align="left" ><div style=" width: 85px;"><?php echo $this->Paginator->sort('Purchase Price','purchaseprice');?></div></th>
			<th align="left" ><div style=" width: 80px;"><?php echo $this->Paginator->sort('Sales Price','salesprice');?></div></th>
	        <th align="left" ><div style=" width: 179px;" class="link_text"><?php //echo 'Link';?></div></th>
        </tr>
      </thead>
    </table>
  </div>
</div>
 
  <table cellspacing="0" cellpadding="0" border="0" style="" class="flexme3">
      <tbody class="search_already_product">
<?php
	$i = 0;
	
	
 
	foreach ($posProducts as $productentry):
		 //pr($productentry);
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr id='<?php echo 'row_'.$productentry['PosProduct']['id'];?>'  <?php echo $class;?>>
 		<td align='left'><div style='width: 20px;' class='alistname'><?php echo $productentry['PosProduct']['id']; ?>&nbsp;</div></td>
		<td align='left'><div style='width: 90px;' class='alistname'><?php echo $productentry['PosProduct']['name']; ?>&nbsp;</div></td>
		<td align='left'><div style='width: 90px;' class='alistname'><?php echo $productentry['PosBrand']['name']; ?>&nbsp;</div></td>
	 
		<td align='left'><div style='width: 80px;' class='alistname'><?php echo $productentry['PosPcategory']['name']; ?>&nbsp;</div></td>
		<td align='left'><div style='width: 86px;' class='alistname'><?php echo $productentry['PosProduct']['purchaseprice']; ?>&nbsp;</div></td>
        	<td align='left'><div style='width: 80px;' class='alistname'><?php echo $productentry['PosProduct']['salesprice']; ?>&nbsp;</div></td>
         <td class="actions">
<div style='width: 180px;' class='alistname link_link'>			<?php //echo $this->Html->link(__('View', true), array('action' => 'view', $productentry['PosProduct']['id']),array('class'=>'link_view action_link')); ?>
			<?php //echo $this->Html->link(__('Edit', true), array('action' => 'edit', $productentry['PosProduct']['id']),array('class'=>'link_edit action_link')); ?>
			<?php //echo $this->Html->link(__('Delete', true), array('action' => 'delete', $productentry['PosProduct']['id']), array('class'=>'link_delete action_link'), sprintf(__('Are you sure you want to delete # %s?', true), $productentry['PosProduct']['id'])); ?>
		</div></td>
  </tr>
<?php endforeach; ?>
    </table>
    </div>
    
    <div class="pDiv">
    <div class="pGroup">
     	 <?php if($this->params['paging']['PosProduct']['prevPage']){?>
      <span class='paginate_link'><?php echo $paginator->first();?></span> <span class='paginate_link'><?php echo $this->Paginator->prev('< ' . __('Previous', true), array(), null, array('class'=>'disabled','id'=>'prev_id'));?></span>
      <?php }?>
      <?php echo $this->Paginator->numbers();?>
      <?php if($this->params['paging']['PosProduct']['nextPage']){?>
      <span class='paginate_link'> <?php echo $this->Paginator->next(__('Next', true) . ' >', array(), null, array('class' => 'disabled','id'=>'next_id', 'span'=>false));?> </span> <span class='paginate_link'><?php echo $paginator->last();?></span>
      <?php }?>
    </div>
  </div>     
</div>
 