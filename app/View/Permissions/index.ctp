<div class="flexigrid" style="width: 100%;">
	<div class="mDiv">
	  	<div class="ftitle">
			<p>
				<?php echo $this->Paginator->counter(array(	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%')	));	?>
			</p>
		</div>
		<div id="searchlink"> &nbsp;</div>
 	</div>
	<div class="tDiv">
		<div class="tDiv2"  >
			 <?php echo $this->Form->create('Permission',array('controller'=>'permissions', 'action'=>'index'));?>
			 
 	<div id="WrapperBrandName" class="microcontroll">

 			<?php echo $this->Form->label('Permission.name', __('Permission Name'.': <span class="star"></span>') ); ?>
 			<?php echo $this->Form->input('Permission.name',array('type'=>'text','div'=>false,'label'=>false, 'size'=>35 ));?>
			
	 		 
	 	</div>	
		<?php echo $this->element('filter/commonfilter',array("cache" => array('time'=> "-7 days",'key'=>'header'))); ?>
		
  <div class="button_area_filter">	  
        <?php  echo $this->Form->button('Search',array( 'class'=>'submit', 'id'=>'btn_brand_search'));?>
        <?php  echo $this->Form->button('Reset',array('type'=>'reset','name'=>'reset','id'=>'Cancel', 'onClick'=>"parent.location='permissions/index/yes'"));?>
     </div>
	 </form>
 		</div>
 	<div style="clear: both;"></div>
	</div>
	<div class="hDiv">
	<div class="hDivBox">
 	<table cellpadding="0" cellspacing="0" width="100%">
		<thead>
            <tr>
                <th align="left" width="40%"><?php echo $this->Paginator->sort('Permission.name', 'Name');?></th>
                <th align="left" width="40%">Group</th>
       	        <th align="left" width="10%"><?php echo $this->Paginator->sort('Permission.modified', 'Last Activity');?></th>
                <th align="left" width="10%"><?php echo 'Link';?></th>
            </tr>
		</thead>
	</table>
	</div></div>				
	<div class="bDiv" style="height: auto;">
				 	<table cellspacing="0" cellpadding="0" border="0" style="" class="flexme3">
					<tbody>
	<?php
	$i = 0;
	foreach ($permissions1 as $permission):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr id="<?php echo 'row_'.$permission['Permission']['id'];  ?>" <?php echo $class;?>>
	 	<td align="left" width="40%"><?php  echo  $permission['Permission']['name'] ; ?></td>
        <td align="left" width="40%">
			<?php  foreach( $permission['Group'] as $grous_user){
					echo $grous_user['name'] ." | ";
				}
			 ?></td>
  		<td align="left" width="10%"><?php echo $this->Time->niceShort($permission['Permission']['modified']); ?></div></td>
		<td align="actions" class="alistname link_link" width="10%">
        	<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $permission['Permission']['id']),array('class'=>'link_edit action_link')); ?>
            <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $permission['Permission']['id']), array('class'=>'link_delete action_link'), __('Are you sure you want to delete # %s?', $permission['Permission']['id'])); ?>
         </td>
 			</tr>
 			<?php endforeach; ?>
 			</tbody>
 		</table>
	</div>
	<div class="pDiv"> 	
			<div class="pGroup"> 
				<?php if($this->request->params['paging']['Permission']['prevPage']){?>
				
				<span class="paginate_link"><?php echo $this->Paginator->first();?></span>
				<span class="paginate_link"><?php echo $this->Paginator->prev('< ' . __('Previous'), array(), null, array('class'=>'disabled','id'=>'prev_id'));?></span>
			 <?php }?>
  			<?php echo $this->Paginator->numbers();?>
			<?php if($this->request->params['paging']['Permission']['nextPage']){?>
				
			 <span class="paginate_link">
 			<?php echo $this->Paginator->next(__('Next') . ' >', array(), null, array('class' => 'disabled','id'=>'next_id', 'span'=>false));?> 
			</span>
			<span class="paginate_link"><?php echo $this->Paginator->last();?></span>
			<?php }?>
			 
		</div>
	</div>
	</div>