<div class="flexigrid" style="width: 100%;">
 <div class="mDiv">
  <div class="ftitle">
    <p> <?php echo $this->Paginator->counter(array(	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%')));	?> </p>
  </div>
  <div id="searchlink"> &nbsp;</div>
</div>

<div class="tDiv">
  <div class="tDiv2">
   <?php echo $this->Form->create('ServiceGetAQuote',array('controller' => 'serviceGetAQuotes','action'=>'index' ));?>
   <?php echo $this->element('filter/commonfilter',array('cache' => array('time'=> '-7 days','key'=>'header')));?>
    <div class="button_area_filter">
     
      <?php echo $this->Form->button('Search',array( 'class'=>'submit', 'id'=>'btn_brand_search'));?>      <?php echo $this->Form->button('Reset',array('type'=>'reset','name'=>'reset','id'=>'Cancel', 'onClick'=>"parent.location='serviceGetAQuotes/index/yes'"));?>     
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
           
 			<th align="left" width="100"><?php echo $this->Paginator->sort('name');?></div></th>
			<th align="left" width="100"><?php echo $this->Paginator->sort('address');?></div></th>
			<th align="left" width="85"><?php echo $this->Paginator->sort('phone');?></div></th>
			<th align="left" width="150"> <?php echo $this->Paginator->sort('email');?></div></th>
			<th align="left" width="98"><?php echo $this->Paginator->sort('pos_brand_id');?></div></th>
			<th align="left" width="150"><?php echo $this->Paginator->sort('pos_product');?></div></th>
			<th align="left" width="150"> <?php echo $this->Paginator->sort('description');?></div></th>
			<th align="left" width="98"> <?php echo $this->Paginator->sort('status');?></div></th>
 			<th align="left" width="98"> <?php echo $this->Paginator->sort('modified');?></div></th>
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
	foreach ($serviceGetAQuotes as $serviceGetAQuote):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr id='<?php echo 'row_'.$serviceGetAQuote['ServiceGetAQuote']['id'];?>'  <?php echo $class;?>>
 		<td align='left' class='alistname' width="104"><?php echo $serviceGetAQuote['ServiceGetAQuote']['name']; ?>&nbsp;</div></td>
		<td align='left' class='alistname' width="103"><?php echo $serviceGetAQuote['ServiceGetAQuote']['address']; ?>&nbsp;</div></td>
		<td align='left' class='alistname' width="86"><?php echo $serviceGetAQuote['ServiceGetAQuote']['phone']; ?>&nbsp;</div></td>
		<td align='left' class='alistname' width="148"><?php echo $serviceGetAQuote['ServiceGetAQuote']['email']; ?>&nbsp;</div></td>
		<td align='left' class='alistname' width="103">
			<?php echo $this->Html->link($serviceGetAQuote['PosBrand']['name'], array('controller' => 'pos_brands', 'action' => 'view', $serviceGetAQuote['PosBrand']['id'])); ?>
		</div></td>
		<td align='left' class='alistname' width="153"><?php echo $serviceGetAQuote['ServiceGetAQuote']['pos_product']; ?>&nbsp;</div></td>
		<td align='left' class='alistname' width="155"><?php echo $serviceGetAQuote['ServiceGetAQuote']['description']; ?>&nbsp;</div></td>
		<td align='left' class='alistname' width="101"><?php echo $serviceGetAQuote['ServiceGetAQuote']['status']; ?>&nbsp;</div></td>
 		<td align='left' class='alistname' width="104"><?php echo $serviceGetAQuote['ServiceGetAQuote']['modified']; ?>&nbsp;</div></td>
 		<td class="actions">
<div style='width: 180px;' class='alistname link_link'>			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $serviceGetAQuote['ServiceGetAQuote']['id']),array('class'=>'link_view action_link')); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $serviceGetAQuote['ServiceGetAQuote']['id']),array('class'=>'link_edit action_link')); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $serviceGetAQuote['ServiceGetAQuote']['id']), array('class'=>'link_delete action_link'), sprintf(__('Are you sure you want to delete # %s?', true), $serviceGetAQuote['ServiceGetAQuote']['id'])); ?>
		</div></td>
	</tr>
<?php endforeach; ?>
    </table>
    </div>
    
    <div class="pDiv">
    <div class="pGroup">
     	 <?php if($this->params['paging']['ServiceGetAQuote']['prevPage']){?>
      <span class='paginate_link'><?php echo $paginator->first();?></span> <span class='paginate_link'><?php echo $this->Paginator->prev('< ' . __('Previous', true), array(), null, array('class'=>'disabled','id'=>'prev_id'));?></span>
      <?php }?>
      <?php echo $this->Paginator->numbers();?>
      <?php if($this->params['paging']['ServiceGetAQuote']['nextPage']){?>
      <span class='paginate_link'> <?php echo $this->Paginator->next(__('Next', true) . ' >', array(), null, array('class' => 'disabled','id'=>'next_id', 'span'=>false));?> </span> <span class='paginate_link'><?php echo $this->Paginator->last();?></span>
      <?php }?>
    </div>
  </div>     
</div>
 