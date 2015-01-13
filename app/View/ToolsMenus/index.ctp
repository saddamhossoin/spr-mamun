<div class="flexigrid" style="width: 100%;">
 <div class="mDiv">
  <div class="ftitle">
    <p>  <?php echo $this->Paginator->counter(array(	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%')	));	?> </p>
  </div>
  <div id="searchlink"> &nbsp;</div>
</div>

<div class="tDiv">
  <div class="tDiv2">
   <?php echo $this->Form->create('ToolsMenu',array('controller' => 'toolsMenus','action'=>'index' ));?>
   <?php echo $this->element('filter/commonfilter',array('cache' => array('time'=> '-7 days','key'=>'header')));?>
    <div class="button_area_filter">
     
      <?php echo $this->Form->button('Search',array( 'class'=>'submit', 'id'=>'btn_brand_search'));?>      <?php echo $this->Form->button('Reset',array('type'=>'reset','name'=>'reset','id'=>'Cancel', 'onClick'=>"parent.location='toolsMenus/index/yes'"));?>     
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

		
 			<th align="left" ><div style=" width: 160px;"><?php echo $this->Paginator->sort('controller','Menu View');?></div></th>
			<th align="left" ><div style=" width: 160px;"><?php echo $this->Paginator->sort('link_controller','Menu Link');?></div></th>
            	<th align="left" ><div style=" width: 70px;"><?php echo $this->Paginator->sort('name');?></div></th>
			<th align="left" ><div style=" width: 70px;"><?php echo $this->Paginator->sort('class');?></div></th>
			<th align="left" ><div style=" width: 70px;"><?php echo $this->Paginator->sort('action_extra');?></div></th>
			<th align="left" ><div style=" width: 40px;"><?php echo $this->Paginator->sort('active');?></div></th>
			<th align="left" ><div style=" width: 150px;"><?php echo $this->Paginator->sort('idname');?></div></th>
			 
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
	foreach ($toolsMenus as $toolsMenu):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr id='<?php echo 'row_'.$toolsMenu['ToolsMenu']['id'];?>'  <?php echo $class;?>>
<td align='center'  class='sorted' align='center' >
          <div style='width:40px; text-align:center;'> <?php echo $this->Form->checkbox('ToolsMenu.checkbox',array( 'div'=>false,'label'=>false, 'size'=>35,'class'=>'listcheckbox','value'=>$toolsMenu['ToolsMenu']['id']));?> </div>
          </td>		 
  		<td align='left'><div style='width: 160px;' class='alistname'><?php echo $toolsMenu['ToolsMenu']['controller']."/".$toolsMenu['ToolsMenu']['action']; ?>&nbsp;</div></td>
 		<td align='left'><div style='width: 160px;' class='alistname'><?php echo $toolsMenu['ToolsMenu']['link_controller']."/".$toolsMenu['ToolsMenu']['link_action']; ?>&nbsp;</div></td>
       
        <td align='left'><div style='width: 70px;' class='alistname'><?php echo $toolsMenu['ToolsMenu']['name']; ?>&nbsp;</div></td>
		<td align='left'><div style='width: 70px;' class='alistname'><?php 
		$toolsclass = $_SESSION['ToolsClass'];
		echo $toolsclass[$toolsMenu['ToolsMenu']['class']]; ?>&nbsp;</div></td>
		 
		<td align='left'><div style='width: 70px;' class='alistname'><?php echo $toolsMenu['ToolsMenu']['action_extra']; ?>&nbsp;</div></td>
		<td align='left'><div style='width:40px;' class='alistname'><?php echo $toolsMenu['ToolsMenu']['active']; ?>&nbsp;</div></td>
		<td align='left'><div style='width: 150px;' class='alistname'><?php echo $toolsMenu['ToolsMenu']['idname']; ?>&nbsp;</div></td>
		 
	 
		<td class="actions">
<div style='width: 180px;' class='alistname link_link'>			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $toolsMenu['ToolsMenu']['id']),array('class'=>'link_view action_link')); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $toolsMenu['ToolsMenu']['id']),array('class'=>'link_edit action_link')); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $toolsMenu['ToolsMenu']['id']), array('class'=>'link_delete action_link'), sprintf(__('Are you sure you want to delete # %s?', true), $toolsMenu['ToolsMenu']['id'])); ?>
		</div></td>
	</tr>
<?php endforeach; ?>
    </table>
    </div>
    
    <div class="pDiv">
    <div class="pGroup">
     	 <?php if($this->params['paging']['ToolsMenu']['prevPage']){?>
      <span class='paginate_link'><?php echo $this->Paginator->first();?></span> <span class='paginate_link'><?php echo $this->Paginator->prev('< ' . __('Previous', true), array(), null, array('class'=>'disabled','id'=>'prev_id'));?></span>
      <?php }?>
      <?php echo $this->Paginator->numbers();?>
      <?php if($this->params['paging']['ToolsMenu']['nextPage']){?>
      <span class='paginate_link'> <?php echo $this->Paginator->next(__('Next', true) . ' >', array(), null, array('class' => 'disabled','id'=>'next_id', 'span'=>false));?> </span> <span class='paginate_link'><?php echo $this->Paginator->last();?></span>
      <?php }?>
    </div>
  </div>     
</div>
 