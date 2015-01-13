<div class="flexigrid" style="width: 100%;">
	<div class="mDiv">
	  	<div class="ftitle">
			<p>
				<?php //echo $this->Paginator->counter(array(	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)	));	?>
			</p>
		</div>
		<div id="searchlink"> &nbsp;</div>
 	</div>
	<div class="tDiv">
		<div class="tDiv2"  >
			 <?php echo $this->Form->create('Group',array('controller'=>'groups', 'action'=>'index'));?>
			 
 	<div id="WrapperBrandName" class="microcontroll">

 			<?php echo $this->Form->label('Group.name', __('Group Name'.': <span class="star"></span>', true) ); ?>
 			<?php echo $this->Form->input('Group.name',array('type'=>'text','div'=>false,'label'=>false, 'size'=>35 ));?>
			
	 		 
	 	</div>	
		<?php echo $this->element('filter/commonfilter',array("cache" => array('time'=> "-7 days",'key'=>'header'))); ?>
		
  <div class="button_area_filter">	  
        <?php  echo $this->Form->button('Search',array( 'class'=>'submit', 'id'=>'btn_brand_search'));?>
        <?php  echo $this->Form->button('Reset',array('type'=>'reset','name'=>'reset','id'=>'Cancel', 'onClick'=>"parent.location='groups/index/yes'"));?>
     </div>
	 </form>
 		</div>
 	<div style="clear: both;"></div>
	</div>
	<div class="hDiv">
			<div class="hDivBox">
				<table cellspacing="0" cellpadding="0">
					<thead>
						<tr>
							<th align="center" class="sorted"><div  style="width: 40px;"><?php //echo $this->Paginator->sort('ID','id');?><?php echo $this->Form->checkbox('checkbox',array( 'div'=>false,'label'=>false, 'size'=>25,'class'=>'commoncheckbox'));?>
						</div></th>
							<th align="left" ><div style=" width: 737px;"><?php echo $this->Paginator->sort('Name','Group.name');?></div></th>
 
							<th align="left" ><div style=" width: 120px;"><?php echo $this->Paginator->sort('Last Activity','modified');?></div></th>
 							<?php if( $this->Session->read('groupname')=='SuperAdmin'){?><th align="right"  ><div style="text-align: left; width: 100px;"><?php echo $this->Paginator->sort('User','modified_by');?></div></th><?php }?>
  							</tr>
						</thead>
					</table>
				</div></div>
 	<div class="bDiv" style="height: auto;">
				 	<table cellspacing="0" cellpadding="0" border="0" style="" class="flexme3">
					<tbody>
 					<?php
						$i = 0;
						foreach ($groups as $group):
							$class = null;
							if ($i++ % 2 == 0) {
								$class = ' class="altrow"';
							}?>
					<tr id="<?php echo 'row_'.$group['Group']['id'];  ?>" <?php echo $class;?>>
 					<td align="center"  class="sorted" align="center" >
						<div style="width:40px; text-align:center;">
							<?php echo $this->Form->checkbox('Group.checkbox',array( 'div'=>false,'label'=>false, 'size'=>35,'class'=>'listcheckbox','value'=>$group['Group']['id']));?>
						</div>
					</td>
					
					<td align="left"  ><div style=" width: 737px;" class="alistname">
 					<?php  
					if(!empty($this->data['Group']['name'])){
					echo $text->highlight($group['Group']['name'],$this->data['Group']['name']); }
					else
					{
						echo $group['Group']['name'];
					}?>
					</div></td>
  				 	
					<td align="right"  ><div style="text-align: right; width: 120px;">
					  <?php echo $group['Group']['modified']; ?></div></td>
					
					<?php if($this->Session->read('groupname')=='SuperAdmin'){?>
					<td align="right"  ><div style="text-align: right; width: 90px;">
					  <?php echo $group['Group']['modified_by']; ?></div></td>
					
					 <?php }?>
  					</tr>
 					<?php endforeach; ?>
 				</tbody>
		</table> </div>
	<div class="pDiv"> 	
			<div class="pGroup"> 
				<?php if($this->params['paging']['Group']['prevPage']){?>
				
				<span class="paginate_link"><?php echo $paginator->first();?></span>
				<span class="paginate_link"><?php echo $this->Paginator->prev('< ' . __('Previous', true), array(), null, array('class'=>'disabled','id'=>'prev_id'));?></span>
			 <?php }?>
  			<?php echo $this->Paginator->numbers();?>
			<?php if($this->params['paging']['Group']['nextPage']){?>
				
			 <span class="paginate_link">
 			<?php echo $this->Paginator->next(__('Next', true) . ' >', array(), null, array('class' => 'disabled','id'=>'next_id', 'span'=>false));?> 
			</span>
			<span class="paginate_link"><?php echo $paginator->last();?></span>
			<?php }?>
			 
		</div>
	</div>
	</div>
