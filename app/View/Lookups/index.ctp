<?php //pr($lookups);?>
<div class="flexigrid" style="width: 100%;">
 <div class="mDiv">
  <div class="ftitle">
    <p> 
 	<?php echo $this->Paginator->counter(array(	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')	));	?> </p>
  </div>
  <div id="searchlink"> &nbsp;</div>
</div>

<div class="tDiv">
  <div class="tDiv2">
   <?php echo $this->Form->create('Lookup',array('controller' => 'lookups','action'=>'index' ));?>
   <?php //echo $this->element('filter/commonfilter',array('cache' => array('time'=> '-7 days','key'=>'header')));?>
     <div id="WrapperLookupParentId" class="microcontroll">
		<?php	echo $this->Form->label('Lookup.parent_id', __('Parent'.': ', true) );?>
		<?php	 
 		echo $this->Form->select('Lookup.parent_id',$lookuplists,array('div'=>false,'label'=>false,'class'=>'required','empty'=>'Please Select One'));?>
		</div>
        
		<div id="WrapperLookupTitle" class="microcontroll">
		<?php	echo $this->Form->label('Lookup.title', __('Title'.': ', true) );?>
		<?php	echo $this->Form->input('Lookup.title',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>
    <div class="button_area_filter">
     
      <?php echo $this->Form->button('Search',array( 'class'=>'submit', 'id'=>'btn_brand_search'));?>      <?php echo $this->Form->button('Reset',array('type'=>'reset','name'=>'reset','id'=>'Cancel', 'onClick'=>"parent.location='lookups/index/yes'"));?>     
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
         		<th align="left" ><div style=" width: 20px;"><?php echo $this->Paginator->sort('id');?></div></th>
			<th align="left" ><div style=" width: 250px;"><?php echo $this->Paginator->sort('title');?></div></th>
			<th align="left" ><div style=" width: 230px;"><?php echo $this->Paginator->sort('list_refference');?></div></th>
 			<th align="left" ><div style=" width: 100px;"><?php echo $this->Paginator->sort('parent_id');?></div></th>
 
            <th align="left" ><div style=" width: 220px;" class="link_text"><?php echo 'Link';?></div></th>
        </tr>
      </thead>
    </table>
  </div>
</div>
 
  <table cellspacing="0" cellpadding="0" border="0" style="" class="flexme3">
      <tbody>
<?php
	$i = 0;
	foreach ($lookups as $lookup):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr id='<?php echo 'row_'.$lookup['Lookup']['id'];?>'  <?php echo $class;?>>
<td align='center'  class='sorted' align='center' >
          <div style='width:40px; text-align:center;'> <?php echo $this->Form->checkbox('Lookup.checkbox',array( 'div'=>false,'label'=>false, 'size'=>35,'class'=>'listcheckbox','value'=>$lookup['Lookup']['id']));?> </div>
          </td>		<td align='left'><div style='width: 20px;' class='alistname'><?php echo $lookup['Lookup']['id']; ?>&nbsp;</div></td>
		<td align='left'><div style='width: 250px;' class='alistname'><?php  
		if($lookup['Lookup']['parent_id']==0){ echo '<b>'.$lookup['Lookup']['title'].'</b>';}else{ echo '&nbsp;&nbsp; |-- '.$lookup['Lookup']['title'];} ?>&nbsp;</div></td>
		<td align='left'><div style='width: 230px;' class='alistname'><?php echo $lookup['Lookup']['list_refference']; ?>&nbsp;</div></td>
		<td align='left'><div style='width: 100px;' class='alistname'><?php  if($lookup['Lookup']['parent_id']!=0){ echo $parentlists[$lookup['Lookup']['parent_id']]; }else{echo "<b>Parent Node</b>";}?>&nbsp;</div></td>

 		<td class="actions">
<div style='width: 220px;' class='alistname link_link'>	
  <?php echo $this->Html->link(__('up', true), array('action' => 'move', $lookup['Lookup']['id'], 'up'),array('class'=>'viewlink action_link','title'=>'Up')); ?>		   
			<?php echo $this->Html->link(__('down', true), array('action' => 'move', $lookup['Lookup']['id'], 'down'),array('class'=>'viewlink action_link','title'=>'Down')); ?>  			
		<?php echo $this->Html->link(__('View', true), array('action' => 'view', $lookup['Lookup']['id']),array('class'=>'link_view action_link')); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $lookup['Lookup']['id']),array('class'=>'link_edit action_link')); ?>
			<?php echo $this->Form->postLink(__('Delete', true), array('action' => 'delete', $lookup['Lookup']['id']), array('class'=>'link_delete action_link'), sprintf(__('Are you sure you want to delete # %s?', true), $lookup['Lookup']['id'])); ?>
		</div></td>
	</tr>
<?php endforeach; ?>
    </table>
    </div>
    
    <div class="pDiv">
    <div class="pGroup">
     	 <?php if($this->params['paging']['Lookup']['prevPage']){?>
      <span class='paginate_link'><?php echo $this->Paginator->first();?></span> <span class='paginate_link'><?php echo $this->Paginator->prev('< ' . __('Previous', true), array(), null, array('class'=>'disabled','id'=>'prev_id'));?></span>
      <?php }?>
      <?php echo $this->Paginator->numbers();?>
      <?php if($this->params['paging']['Lookup']['nextPage']){?>
      <span class='paginate_link'> <?php echo $this->Paginator->next(__('Next', true) . ' >', array(), null, array('class' => 'disabled','id'=>'next_id', 'span'=>false));?> </span> <span class='paginate_link'><?php $this->Paginator->last();?></span>
      <?php }?>
    </div>
  </div>     
</div>
 