<?php //pr($AccountsHeads);?>
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
   <?php echo $this->Form->create('AccountsHead',array('controller' => 'AccountsHeads','action'=>'index' ));?>
   <?php //echo $this->element('filter/commonfilter',array('cache' => array('time'=> '-7 days','key'=>'header')));?>
     <div id="WrapperAccountsHeadParentId" class="microcontroll">
		<?php	echo $this->Form->label('AccountsHead.parent_id', __('Parent'.': ', true) );?>
		<?php	 
 		echo $this->Form->select('AccountsHead.parent_id',$AccountsHeadlists,array('div'=>false,'label'=>false,'class'=>'required','empty'=>'Please Select One'));?>
		</div>
        
		<div id="WrapperAccountsHeadTitle" class="microcontroll">
		<?php	echo $this->Form->label('AccountsHead.title', __('Title'.': ', true) );?>
		<?php	echo $this->Form->input('AccountsHead.title',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>
    <div class="button_area_filter">
     
      <?php echo $this->Form->button('Search',array( 'class'=>'submit', 'id'=>'btn_brand_search'));?>      <?php echo $this->Form->button('Reset',array('type'=>'reset','name'=>'reset','id'=>'Cancel', 'onClick'=>"parent.location='AccountsHeads/index/yes'"));?>     
    </div>
    </form>
  </div>
  <div style="clear: both;"></div>
</div>

<div class="bDiv" style="height: auto;">
<div class="hDiv">
  <div class="hDivBox">
    <table cellspacing="0" cellpadding="0" width="100%">
      <thead>
        <tr>
       		<th align="left" ><div style=" width: 20px;"><?php echo $this->Paginator->sort('id');?></div></th>
 			<th align="left" ><div style=" width: 250px;"><?php echo $this->Paginator->sort('title');?></div></th>
			<th align="left" ><div style=" width: 50px;"><?php echo $this->Paginator->sort('status');?></div></th>
            <th align="left" ><div style=" width: 50px;"><?php echo $this->Paginator->sort('is_posted','Is Posted');?></div></th>
            <th align="left" ><div style=" width: 50px;"><?php echo $this->Paginator->sort('is_deleteable');?></div></th>

 
            <th align="left" ><div style=" width: 240px;" class="link_text"><?php echo 'Link';?></div></th>
        </tr>
      </thead>
    </table>
  </div>
</div>
 
  <table cellspacing="0" cellpadding="0" border="0" style="" class="flexme3">
      <tbody>
<?php
	$i = 0;
	$status = array(0=>'No' , 1=>'Yes');
	foreach ($AccountsHeads as $AccountsHead):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr id='<?php echo 'row_'.$AccountsHead['AccountsHead']['id'];?>'  <?php echo $class;?>>
 	<td align='left'><div style='width: 22px;' class='alistname'><?php echo $AccountsHead['AccountsHead']['id']; ?>&nbsp;</div></td>
    
		<td align='left'><div style='width: 250px;' class='alistname'><?php  
		if($AccountsHead['AccountsHead']['parent_id']==0){ echo '<b>'.$AccountsHead['AccountsHead']['title'].'</b>';}else{ echo '&nbsp;&nbsp; |-- '.$AccountsHead['AccountsHead']['title'];} ?>&nbsp;</div></td>
        
		<td align='left'><div style='width: 50px;' class='alistname'><?php echo $status[$AccountsHead['AccountsHead']['status']]; ?>&nbsp;</div></td>
        <td align='left'><div style='width: 50px;' class='alistname'><?php echo $status[$AccountsHead['AccountsHead']['is_posted']]; ?>&nbsp;</div></td>
        <td align='left'><div style='width: 50px;' class='alistname'><?php echo $status[$AccountsHead['AccountsHead']['is_deleteable']]; ?>&nbsp;</div></td>
		
 		<td class="actions">
<div style='width: 240px;' class='alistname link_link'>	
  <?php echo $this->Html->link(__('up', true), array('action' => 'move', $AccountsHead['AccountsHead']['id'], 'up'),array('class'=>'viewlink action_link','title'=>'Up')); ?>		   
			<?php echo $this->Html->link(__('down', true), array('action' => 'move', $AccountsHead['AccountsHead']['id'], 'down'),array('class'=>'viewlink action_link','title'=>'Down')); ?>  			
		<?php echo $this->Html->link(__('View', true), array('action' => 'view', $AccountsHead['AccountsHead']['id']),array('class'=>'link_view action_link')); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $AccountsHead['AccountsHead']['id']),array('class'=>'link_edit action_link')); ?>
			<?php echo $this->Form->postLink(__('Delete', true), array('action' => 'delete', $AccountsHead['AccountsHead']['id']), array('class'=>'link_delete action_link'), sprintf(__('Are you sure you want to delete # %s?', true), $AccountsHead['AccountsHead']['id'])); ?>
		</div></td>
	</tr>
<?php endforeach; ?>
    </table>
    </div>
    
    <div class="pDiv">
    <div class="pGroup">
     	 <?php if($this->params['paging']['AccountsHead']['prevPage']){?>
      <span class='paginate_link'><?php echo $this->Paginator->first();?></span> <span class='paginate_link'><?php echo $this->Paginator->prev('< ' . __('Previous', true), array(), null, array('class'=>'disabled','id'=>'prev_id'));?></span>
      <?php }?>
      <?php echo $this->Paginator->numbers();?>
      <?php if($this->params['paging']['AccountsHead']['nextPage']){?>
      <span class='paginate_link'> <?php echo $this->Paginator->next(__('Next', true) . ' >', array(), null, array('class' => 'disabled','id'=>'next_id', 'span'=>false));?> </span> <span class='paginate_link'><?php $this->Paginator->last();?></span>
      <?php }?>
    </div>
  </div>     
</div>
 