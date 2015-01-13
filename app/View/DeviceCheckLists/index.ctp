<div class="flexigrid" style="width: 100%;">
 <div class="mDiv">
  <div class="ftitle">
    <p> <?php echo $this->Paginator->counter(array(	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%')));	?> </p>
  </div>
  <div id="searchlink"> &nbsp;</div>
</div>

<div class="tDiv">
  <div class="tDiv2">
   <?php echo $this->Form->create('DeviceCheckList',array('controller' => 'deviceCheckLists','action'=>'index' ));?>
   
    <div id="WrapperCheckName" class="microcontroll">
			
	
      <?php echo $this->Form->label('DeviceCheckList.name', __('Check List Name'.': <span class="star"></span>', true) ); ?>
 	  <?php echo $this->Form->input('DeviceCheckList.name',array('type'=>'text','div'=>false,'label'=>false, 'size'=>25 ));?>
      
      <?php echo $this->Form->label('DeviceCheckList.active', __('Status'.': <span class="star"></span>', true) ); ?>
   	<?php  
	$status = array(1=>'Active',0=>'Inactive');
	echo $this->Form->input('DeviceCheckList.active',array('type'=>'select','options'=>$status,'div'=>false,'label'=>false,'class'=>'required select2as','empty'=>'----Please select Status----')); ?>
      
      </div>
   
   
   <?php echo $this->element('filter/commonfilter',array('cache' => array('time'=> '-7 days','key'=>'header')));?>
    <div class="button_area_filter">
     
      <?php echo $this->Form->button('Search',array( 'class'=>'submit', 'id'=>'btn_brand_search'));?>      <?php echo $this->Form->button('Reset',array('type'=>'reset','name'=>'reset','id'=>'Cancel', 'onClick'=>"parent.location='".$this->webroot."deviceCheckLists/index/yes'"));?>     
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
           
			<th align="left" ><div style=" width: 100px;"><?php echo $this->Paginator->sort('name');?></div></th>
			<th align="left" ><div style=" width: 100px;"><?php echo $this->Paginator->sort('comments');?></div></th>
			<th align="left" ><div style=" width: 100px;"><?php echo $this->Paginator->sort('active');?></div></th>
			<th align="left" ><div style=" width: 100px;"><?php echo $this->Paginator->sort('created');?></div></th>
			<th align="left" ><div style=" width: 100px;"><?php echo $this->Paginator->sort('created_by');?></div></th>
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
	$OrderitemDate='';
	foreach ($deviceCheckLists as $deviceCheckList):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
		
		$dataDate = date('d / m / Y',strtotime($deviceCheckList['DeviceCheckList']['created']));
						 if($OrderitemDate == "" ||  $dataDate!= $OrderitemDate){
							echo "<tr> <td colspan = '8' class = 'listDateHeading'>".$dataDate."</td></tr>";
							$OrderitemDate = $dataDate;
						}
	?>
	<tr id='<?php echo 'row_'.$deviceCheckList['DeviceCheckList']['id'];?>'  <?php echo $class;?>>
		<td align='left'><div style='width: 100px;' class='alistname'><?php echo $deviceCheckList['DeviceCheckList']['name']; ?>&nbsp;</div></td>
		<td align='left'><div style='width: 100px;' class='alistname'><?php echo $deviceCheckList['DeviceCheckList']['comments']; ?>&nbsp;</div></td>
		<td align='left'><div style='width: 100px;' class='alistname'><?php  
		
		if($deviceCheckList['DeviceCheckList']['active']==1){
			echo "Active";
			
			}else{ echo "Inactive"; }
			?>&nbsp;</div></td>
		<td align='left'><div style='width: 100px;' class='alistname'><?php echo $deviceCheckList['DeviceCheckList']['created']; ?>&nbsp;</div></td>
		<td align='left'><div style='width: 100px;' class='alistname'><?php echo $userlists[$deviceCheckList['DeviceCheckList']['created_by']]; ?>&nbsp;</div></td>
        
        
        
		<td class="actions">
<div style='width: 180px;' class='alistname link_link'>			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $deviceCheckList['DeviceCheckList']['id']),array('class'=>'link_view action_link')); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $deviceCheckList['DeviceCheckList']['id']),array('class'=>'link_edit action_link')); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $deviceCheckList['DeviceCheckList']['id']), array('class'=>'link_delete action_link'), sprintf(__('Are you sure you want to delete # %s?', true), $deviceCheckList['DeviceCheckList']['id'])); ?>
		</div></td>
	</tr>
<?php endforeach; ?>
    </table>
    </div>
    
    <div class="pDiv">
    <div class="pGroup">
     	 <?php if($this->params['paging']['DeviceCheckList']['prevPage']){?>
      <span class='paginate_link'><?php echo $paginator->first();?></span> <span class='paginate_link'><?php echo $this->Paginator->prev('< ' . __('Previous', true), array(), null, array('class'=>'disabled','id'=>'prev_id'));?></span>
      <?php }?>
      <?php echo $this->Paginator->numbers();?>
      <?php if($this->params['paging']['DeviceCheckList']['nextPage']){?>
      <span class='paginate_link'> <?php echo $this->Paginator->next(__('Next', true) . ' >', array(), null, array('class' => 'disabled','id'=>'next_id', 'span'=>false));?> </span> <span class='paginate_link'><?php echo $this->Paginator->last();?></span>
      <?php }?>
    </div>
  </div>     
</div>
 