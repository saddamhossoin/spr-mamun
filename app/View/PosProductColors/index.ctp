<div class="flexigrid" style="width: 100%;">
 <div class="mDiv">
  <div class="ftitle">
    <p> <?php echo $this->Paginator->counter(array(	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)	));	?> </p>
  </div>
  <div id="searchlink"> &nbsp;</div>
</div>

<div class="tDiv">
  <div class="tDiv2">
   <?php echo $this->Form->create('PosProductColor',array('controller' => 'posProductColors','action'=>'index' ));?>
   <?php echo $this->element('filter/commonfilter',array('cache' => array('time'=> '-7 days','key'=>'header')));?>
    <div class="button_area_filter">
     
      <?php echo $this->Form->button('Search',array( 'class'=>'submit', 'id'=>'btn_brand_search'));?>      <?php echo $this->Form->button('Reset',array('type'=>'reset','name'=>'reset','id'=>'Cancel', 'onClick'=>"parent.location='posProductColors/index/yes'"));?>     
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
			<th align="left" ><div style=" width: 100px;"><?php echo $this->Paginator->sort('pos_product_id');?></div></th>
			<th align="left" ><div style=" width: 100px;"><?php echo $this->Paginator->sort('color_id');?></div></th>
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
	foreach ($posProductColors as $posProductColor):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr id='<?php echo 'row_'.$posProductColor['PosProductColor']['id'];?>'  <?php echo $class;?>>
		<td align='left'><div style='width: 100px;' class='alistname'><?php echo $posProductColor['PosProductColor']['id']; ?>&nbsp;</div></td>
		<td align='left'><div style='width: 100px;' class='alistname'>
			<?php echo $this->Html->link($posProductColor['PosProduct']['name'], array('controller' => 'pos_products', 'action' => 'view', $posProductColor['PosProduct']['id'])); ?>
		</div></td>
		<td align='left'><div style='width: 100px;' class='alistname'>
			<?php echo $this->Html->link($posProductColor['Color']['name'], array('controller' => 'colors', 'action' => 'view', $posProductColor['Color']['id'])); ?>
		</div></td>
		<td align='left'><div style='width: 100px;' class='alistname'><?php echo $posProductColor['PosProductColor']['created']; ?>&nbsp;</div></td>
		<td align='left'><div style='width: 100px;' class='alistname'><?php echo $posProductColor['PosProductColor']['modified']; ?>&nbsp;</div></td>
		<td align='left'><div style='width: 100px;' class='alistname'><?php echo $posProductColor['PosProductColor']['created_by']; ?>&nbsp;</div></td>
		<td align='left'><div style='width: 100px;' class='alistname'><?php echo $posProductColor['PosProductColor']['modified_by']; ?>&nbsp;</div></td>
		<td class="actions">
<div style='width: 180px;' class='alistname link_link'>			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $posProductColor['PosProductColor']['id']),array('class'=>'link_view action_link')); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $posProductColor['PosProductColor']['id']),array('class'=>'link_edit action_link')); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $posProductColor['PosProductColor']['id']), array('class'=>'link_delete action_link'), sprintf(__('Are you sure you want to delete # %s?', true), $posProductColor['PosProductColor']['id'])); ?>
		</div></td>
	</tr>
<?php endforeach; ?>
    </table>
    </div>
    
    <div class="pDiv">
    <div class="pGroup">
     	 <?php if($this->params['paging']['PosProductColor']['prevPage']){?>
      <span class='paginate_link'><?php echo $paginator->first();?></span> <span class='paginate_link'><?php echo $this->Paginator->prev('< ' . __('Previous', true), array(), null, array('class'=>'disabled','id'=>'prev_id'));?></span>
      <?php }?>
      <?php echo $this->Paginator->numbers();?>
      <?php if($this->params['paging']['PosProductColor']['nextPage']){?>
      <span class='paginate_link'> <?php echo $this->Paginator->next(__('Next', true) . ' >', array(), null, array('class' => 'disabled','id'=>'next_id', 'span'=>false));?> </span> <span class='paginate_link'><?php echo $this->Paginator->last();?></span>
      <?php }?>
    </div>
  </div>     
</div>
 