 <?php echo $this->Html->css(array('common/designfiled'));?> 

<div class="flexigrid" style="width: 100%;">
 <div class="mDiv">
  <div class="ftitle">
     <p> <?php echo $this->Paginator->counter(array(	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%')	));	?> </p>
  </div>
  <div id="searchlink"> &nbsp;</div>
</div>

<div class="tDiv">
  <div class="tDiv2">
   <?php echo $this->Form->create('PosBrand',array('controller' => 'posBrands','action'=>'index' ));?>
 
 <div id="WrapperposBrandName" class="microcontroll">
			<?php echo $this->Form->label('PosBrand.name', __('Brand Name'.': <span class="star"></span>', true) ); ?>
 			<?php echo $this->Form->input('PosBrand.name',array('type'=>'text','div'=>false,'label'=>false, 'size'=>35 ));?>
	 		<span class="instruction">  </span>
			<span class="example"> </span>
			<span class="message"></span>
	 	</div>
		
 
 
   <?php echo $this->element('filter/commonfilter',array('cache' => array('time'=> '-7 days','key'=>'header')));?>
    <div class="button_area_filter">
     
      <?php echo $this->Form->button('Search',array( 'class'=>'submit', 'id'=>'btn_brand_search'));?>      <?php echo $this->Form->button('Reset',array('type'=>'reset','name'=>'reset','id'=>'Cancel', 'onClick'=>"parent.location='".$this->webroot."posBrands/index/yes'"));?>     
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
          
			<th align="left" ><div style=" width: 50px;"><?php echo "Image";?></div></th>
 			<th align="left" ><div style=" width: 150px;"><?php echo $this->Paginator->sort('name');?></div></th>
			<th align="left" ><div style=" width: 200px;"><?php echo $this->Paginator->sort('address','Description');?></div></th>
		 	<th align="left" ><div style=" width: 105px;"><?php echo $this->Paginator->sort('modified');?></div></th>
			 
			 
			 <?php if($this->Session->read('groupname')=='Admin' || $this->Session->read('groupname')=='SuperAdmin'){?><th align="right"  ><div style="text-align: left; width: 100px;"><?php echo $this->Paginator->sort('modified_by','User');?></div></th><?php }?>
			 
	                 <th align="left" ><div style=" width: 180px;" class="link_text"><?php echo 'Link';?></div></th>
        </tr>
      </thead>
    </table>
  </div>
</div>
 
  <table cellspacing="0" cellpadding="0" border="0" style="" class="flexme3">
      <tbody>
<?php
 	$i = 0;
	foreach ($posBrands as $posBrand):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr id='<?php echo 'row_'.$posBrand['PosBrand']['id'];?>'  <?php echo $class;?>>
 		<td align='left'><div style='width: 50px;' class='alistname'><?php  echo $this->Html->image("../".$posBrand['PosBrand']['image'], array("class"=>"productimage","alt" => "No Image",  'url' => '#','width'=>50, 'height'=>50));?></div></td>

 		<td align='left'><div style='width: 150px;' class='alistname'><?php echo $posBrand['PosBrand']['name']; ?>&nbsp;</div></td>
		<td align='left'><div style='width: 200px;' class='alistname'><?php echo $posBrand['PosBrand']['address']; ?>&nbsp;</div></td>
	 
		<td align='left'> 
		<div style=" width: 105px;"><?php echo $this->time->niceShort($posBrand['PosBrand']['modified']); ?></div>
		
		</td>
	 			
		<?php if($this->Session->read('groupname')=='Admin' || $this->Session->read('groupname')=='SuperAdmin'){?>
					<td align="right"  ><div style="text-align: right; width: 100px;">
					<?php echo $userlists [$posBrand['PosBrand']['modified_by']]?>
					</div></td> <?php }?>
	
    <td align="left"  ><div style=" width: 180px;" class="alistname">
					  <?php 
					  echo $this->Html->link(__('Products', true), array('controller'=>'pos_brands','action' => 'productlistbybrand', $posBrand['PosBrand']['id']), array('class'=>'action_link testlistbygroup','id'=>'','title'=>'This Brand Products')); 
					  
 					  if($this->Session->read('groupname')=='Admin' || $this->Session->read('groupname')=='SuperAdmin'){
					  echo $this->Html->link(__('Edit', true), array('action' => 'edit', $posBrand['PosBrand']['id']),array('class'=>'editlink action_link','title'=>'Edit'));
					 
					  					  
					   echo $this->Html->link(__('Delete', true), array('action' => 'delete', $posBrand['PosBrand']['id']), array('class'=>' action_link','title'=>'Delete'), sprintf(__('Are you sure you want to delete # %s?', true), $posBrand['PosBrand']['id']));
					  }
					  ?>
 					   
					  </div></td>
		
		
	</tr>
<?php endforeach; ?>
    </table>
    </div>
    
    <div class="pDiv">
    <div class="pGroup">
     	 <?php if($this->params['paging']['PosBrand']['prevPage']){?>
      <span class='paginate_link'><?php echo $this->Paginator->first();?></span> <span class='paginate_link'><?php echo $this->Paginator->prev('< ' . __('Previous', true), array(), null, array('class'=>'disabled','id'=>'prev_id'));?></span>
      <?php }?>
      <?php echo $this->Paginator->numbers();?>
      <?php if($this->params['paging']['PosBrand']['nextPage']){?>
      <span class='paginate_link'> <?php echo $this->Paginator->next(__('Next', true) . ' >', array(), null, array('class' => 'disabled','id'=>'next_id', 'span'=>false));?> </span> <span class='paginate_link'><?php echo $this->Paginator->last();?></span>
      <?php }?>
    </div>
  </div>     
</div>
 