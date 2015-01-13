<div class="flexigrid" style="width: 100%;">
 
<div class="bDiv" style="height: auto;">
<div class="hDiv">
  <div class="hDivBox">
    <table cellspacing="0" cellpadding="0">
      <thead>
        <tr>
          	<th align="left" ><div style=" width: 100px;"><?php echo $this->Paginator->sort('lot_number');?></div></th>
            <th align="left" ><div style=" width: 100px;"><?php echo $this->Paginator->sort('pos_pcategory_id');?></div></th>
            <th align="left" ><div style=" width: 100px;"><?php echo $this->Paginator->sort('number','Number Of Barcode');?></div></th>
			<th align="left" ><div style=" width: 100px;"><?php echo $this->Paginator->sort('created_by');?></div></th>
			<th align="left" ><div style=" width: 100px;"><?php echo $this->Paginator->sort('created');?></div></th>
          	<th align="left" ><div style=" width: 180px;" class="link_text"><?php echo 'Link';?></div></th>
        </tr>
      </thead>
    </table>
  </div>
</div>
 
  <table cellspacing="0" cellpadding="0" border="0" style="" class="flexme3">
      <tbody>
<?php
//pr($barcodes );
	$i = 0;
	foreach ($barcodes as $barcode):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr id='<?php echo 'row_'.$barcode['Barcode']['id'];?>'  <?php echo $class;?>>
	<td align='left'><div style='width: 100px;' class='alistname'><?php echo $barcode['Barcode']['lot_number']; ?>&nbsp;</div></td>
	<td align='left'><div style='width: 100px;' class='alistname'><?php echo $barcode['PosPcategory']['name']; ?>&nbsp;</div></td>
    <td align='left'><div style='width: 100px;' class='alistname'><?php echo $barcode['Barcode']['number']; ?>&nbsp;</div></td>
	<td align='left'><div style='width: 100px;' class='alistname'><?php echo $barcode['Barcode']['created_by']; ?>&nbsp;</div></td>
    <td align='left'><div style='width: 100px;' class='alistname'><?php echo $barcode['Barcode']['created']; ?>&nbsp;</div></td>
		<td class="actions">
<div style='width: 180px;' class='alistname link_link'>			<?php 
	if(empty($barcode['Barcode']['lot_number'])){
		echo $this->Html->link(__('View', true), array('action' => 'view', $barcode['Barcode']['id']),array('class'=>'link_view action_link'));
	}else{
		echo $this->Html->link(__('View', true), array('action' => 'bulkprint', $barcode['Barcode']['lot_number']),array('class'=>'link_view action_link'));
	}?>
		 
			<?php //echo $this->Html->link(__('Delete', true), array('action' => 'delete', $barcode['Barcode']['lot_number']), array('class'=>'link_delete action_link'), sprintf(__('Are you sure you want to delete # %s?', true), $barcode['Barcode']['lot_number'])); ?>
		</div></td>
	</tr>
<?php endforeach; ?>
    </table>
    </div>
    
    <div class="pDiv">
    <div class="pGroup">
     	 <?php if($this->params['paging']['Barcode']['prevPage']){?>
      <span class='paginate_link'><?php echo $paginator->first();?></span> <span class='paginate_link'><?php echo $this->Paginator->prev('< ' . __('Previous', true), array(), null, array('class'=>'disabled','id'=>'prev_id'));?></span>
      <?php }?>
      <?php echo $this->Paginator->numbers();?>
      <?php if($this->params['paging']['Barcode']['nextPage']){?>
      <span class='paginate_link'> <?php echo $this->Paginator->next(__('Next', true) . ' >', array(), null, array('class' => 'disabled','id'=>'next_id', 'span'=>false));?> </span> <span class='paginate_link'><?php echo $this->Paginator->last();?></span>
      <?php }?>
    </div>
  </div>     
</div>
 