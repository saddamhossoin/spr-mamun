<div class="flexigrid" style="width: 100%;">
 <div class="mDiv">
  <div class="ftitle">
    <p>  <?php echo $this->Paginator->counter(array(	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%')	));	?> </p>
  </div>
  <div id="searchlink"> &nbsp;</div>
</div>

<div class="tDiv">
  <div class="tDiv2">
   <?php echo $this->Form->create('ServiceService',array('controller' => 'serviceServices','action'=>'index' ));?>
    <div id="WrapperServiceServiceName" class="microcontroll">
		<?php echo $this->Form->label('ServiceService.name', __('Name'.': <span class="star"></span>', true),array('id'=>'PosPurchaseposSupplierId')  ); ?>
        <?php	echo $this->Form->input('ServiceService.name',array('div'=>false,'label'=>false,'class'=>'required'));?>
	</div>
   <?php echo $this->element('filter/commonfilter',array('cache' => array('time'=> '-7 days','key'=>'header')));?>
   
    <div class="button_area_filter">
     
      <?php echo $this->Form->button('Search',array( 'class'=>'submit', 'id'=>'btn_brand_search'));?>      <?php echo $this->Form->button('Reset',array('type'=>'reset','name'=>'reset','id'=>'Cancel' ,'onClick'=>"parent.location='".$this->webroot."serviceServices/index/yes'"));?>     
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
			<th align="left" ><div style=" width: 100px;"><?php echo $this->Paginator->sort('description');?></div></th>
            <th align="left" ><div style=" width: 60px;"><?php echo $this->Paginator->sort('price');?></div></th>
 			<th align="left" ><div style=" width: 60px;"><?php echo $this->Paginator->sort('created');?></div></th>
			<th align="left" ><div style=" width: 60px;"><?php echo $this->Paginator->sort('created_by');?></div></th>
	           <?php if($this->Session->read('username')=='Admin' || $this->Session->read('username')=='SuperAdmin'){?>          <th align="right"  ><div style="text-align: left; width: 100px;"><?php echo $this->Paginator->sort('User','modifiedBy');?></div></th>
          <?php } ?>          <th align="left" ><div style=" width: 215px;" class="link_text"><?php echo 'Link';?></div></th>
        </tr>
      </thead>
    </table>
  </div>
</div>
 
  <table cellspacing="0" cellpadding="0" border="0" style="" class="flexme3">
      <tbody>
<?php
  	$i = 0;
	 $sdid = 0;
	 $OrderitemDate='';
	 //pr($serviceServices);
	foreach ($serviceServices as $serviceService):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
		
	 ?>
			 
                 
	<tr id='<?php echo 'row_'.$serviceService['ServiceService']['id'];?>'  <?php echo $class;?>>
 		<td align='left'><div style='width: 100px;' class='alistname'><?php echo $serviceService['ServiceService']['name']; ?>&nbsp;</div></td>
		<td align='left'><div style='width: 100px;' class='alistname'><?php echo $serviceService['ServiceService']['description']; ?>&nbsp;</div></td>
		<td align='left'><div style='width: 60px;' class='alistname'><?php echo $serviceService['ServiceService']['price']; ?>&nbsp;</div></td>
		<td align='left'><div style='width: 60px;' class='alistname'><?php 
		echo date("d/m/Y", strtotime($serviceService['ServiceService']['created']));
		//echo $serviceService['ServiceService']['created']; ?>&nbsp;</div></td>
		
		<td align='left'><div style='width: 60px;' class='alistname'><?php echo $userlists[$serviceService['ServiceService']['created_by']]; ?>&nbsp;</div></td>
		<td class="actions">
        
	<div style='width: 180px;' class='alistname link_link'>
 <div style='width: 215px;' class='alistname link_link'>
 <?php echo $this->Html->link(__('View', true), array('action' => 'view', $serviceService['ServiceService']['id']),array('class'=>'link_view action_link')); ?>
		<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $serviceService['ServiceService']['id']),array('class'=>'link_edit action_link')); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $serviceService['ServiceService']['id']), array('class'=>'link_delete action_link'), sprintf(__('Are you sure you want to delete # %s?', true), $serviceService['ServiceService']['id'])); ?>
		</div></td>
	</tr>
<?php endforeach; ?>
    </table>
    </div>
    
    <div class="pDiv">
    <div class="pGroup">
     	 <?php if($this->params['paging']['ServiceService']['prevPage']){?>
      <span class='paginate_link'><?php echo  $this->Paginator->first();?></span> <span class='paginate_link'><?php echo $this->Paginator->prev('< ' . __('Previous', true), array(), null, array('class'=>'disabled','id'=>'prev_id'));?></span>
      <?php }?>
      <?php echo $this->Paginator->numbers();?>
      <?php if($this->params['paging']['ServiceService']['nextPage']){?>
      <span class='paginate_link'> <?php echo $this->Paginator->next(__('Next', true) . ' >', array(), null, array('class' => 'disabled','id'=>'next_id', 'span'=>false));?> </span> <span class='paginate_link'><?php echo $this->Paginator->last();?></span>
      <?php }?>
    </div>
  </div>     
</div>
 