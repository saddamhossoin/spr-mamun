<div class="flexigrid" style="width: 100%;">
 <div class="mDiv">
  <div class="ftitle">
    <p>  <?php echo $this->Paginator->counter(array(	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%')	));	?></p>
  </div>
  <div id="searchlink"> &nbsp;</div>
</div>

<div class="tDiv">
  <div class="tDiv2">
   <?php echo $this->Form->create('PosPcategory',array('controller' => 'posPcategories','action'=>'index' ));?>
   
   <div id="Name" class="microcontroll">
			<?php echo $this->Form->label('PosPcategory.name', __('Category Name'.': <span class="star"></span>', true) ); ?>
 			<?php echo $this->Form->input('PosPcategory.name',array('type'=>'text','div'=>false,'label'=>false, 'size'=>35 ));?>
	 	
	 	</div>
		
   <?php echo $this->element('filter/commonfilter',array('cache' => array('time'=> '-7 days','key'=>'header')));?>
    <div class="button_area_filter">
     
      <?php echo $this->Form->button('Search',array( 'class'=>'submit', 'id'=>'btn_brand_search'));?>      <?php echo $this->Form->button('Reset',array('type'=>'reset','name'=>'reset','id'=>'Cancel', 'onClick'=>"parent.location='".$this->webroot."posPcategories/index/yes'"));?>     
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
          
         		 
			<th align="left" width="30%"><?php echo $this->Paginator->sort('name');?> </th>
			<th align="left" width="35%"><?php echo $this->Paginator->sort('description');?> </th>
		 
			<th align="left" width="10%"><?php echo $this->Paginator->sort('modified');?> </th>
		 
			<th align="left" width="10%"><?php echo $this->Paginator->sort('modified_by');?> </th>
	           <?php if($this->Session->read('username')=='Admin' || $this->Session->read('username')=='SuperAdmin'){?>          <th align="right"  ><?php echo $this->Paginator->sort('User','modifiedBy');?> </th>
          <?php } ?>          <th align="left" class="link_text" width="15%"><?php echo 'Link';?> </th>
        </tr>
      </thead>
    </table>
  </div>
</div>
 
  <table cellspacing="0" cellpadding="0" border="0" style="" class="flexme3">
      <tbody>
<?php
	$i = 0;
	foreach ($posPcategories as $posPcategory):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr id='<?php echo 'row_'.$posPcategory['PosPcategory']['id'];?>'  <?php echo $class;?>>
 
		<td align='left' class='alistname' width="30%"><?php echo $posPcategory['PosPcategory']['name']; ?>&nbsp; </td>
		<td align='left' class='alistname' width="35%"><?php echo $posPcategory['PosPcategory']['description']; ?>&nbsp; </td>
	 
		<td align='left' class='alistname' width="10%"><?php echo $this->time->niceShort($posPcategory['PosPcategory']['modified']); ?>&nbsp; </td>
	 
		<?php if($this->Session->read('groupname')=='Admin' || $this->Session->read('groupname')=='SuperAdmin'){?>
					<td align="right" width="10%">
					<?php echo $userlists [$posPcategory['PosPcategory']['modified_by']]?>
					 </td> <?php }?>
					
		<td align="left"  class="alistname" width="15%">
					  <?php 
					  echo $this->Html->link(__('Products', true), array('controller'=>'pos_pcategories','action' => 'productlistbybrand', $posPcategory['PosPcategory']['id']), array('class'=>'action_link testlistbygroup','id'=>'','title'=>'Report')); 
 					  if($this->Session->read('groupname')=='Admin' || $this->Session->read('groupname')=='SuperAdmin'){
					  echo $this->Html->link(__('Edit', true), array('action' => 'edit', $posPcategory['PosPcategory']['id']),array('class'=>'editlink action_link','title'=>'Edit'));
					 
			 		   echo $this->Html->link(__('Delete', true), array('action' => 'delete', $posPcategory['PosPcategory']['id']), array('class'=>' action_link','title'=>'Delete'), sprintf(__('Are you sure you want to delete # %s?', true), $posPcategory['PosPcategory']['id']));
					  }
					  ?>
 					   
					   </td>
	</tr>
<?php endforeach; ?>
    </table>
    </div>
    
    <div class="pDiv">
    <div class="pGroup">
     	 <?php if($this->params['paging']['PosPcategory']['prevPage']){?>
      <span class='paginate_link'><?php echo $paginator->first();?></span> <span class='paginate_link'><?php echo $this->Paginator->prev('< ' . __('Previous', true), array(), null, array('class'=>'disabled','id'=>'prev_id'));?></span>
      <?php }?>
      <?php echo $this->Paginator->numbers();?>
      <?php if($this->params['paging']['PosPcategory']['nextPage']){?>
      <span class='paginate_link'> <?php echo $this->Paginator->next(__('Next', true) . ' >', array(), null, array('class' => 'disabled','id'=>'next_id', 'span'=>false));?> </span> <span class='paginate_link'><?php echo $this->Paginator->last();?></span>
      <?php }?>
    </div>
  </div>     
</div>
 