<div class="flexigrid" style="width: 100%;">
 <div class="mDiv">
  <div class="ftitle">
    <p> <?php echo $this->Paginator->counter(array(	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%')	));	?></p>
  </div>
  <div id="searchlink"> &nbsp;</div>
</div>

<div class="tDiv">
  <div class="tDiv2">
   <?php echo $this->Form->create('ServiceDevice',array('controller' => 'serviceDevices','action'=>'index' ));?>
   
    <div id="WrapperServiceDevicename" class="microcontroll">
 				<?php echo $this->Form->label('ServiceDevice.name', __('Name'.': <span class="star"></span>', true),array('id'=>'PosPurchaseposSupplierId')  ); ?>
			  	<?php	echo $this->Form->input('ServiceDevice.name',array('div'=>false,'label'=>false,'class'=>'required'));?>
	 		</div>
	<div id="WrapperServiceDevicepos_pcategory_id" class="microcontroll">
 				<?php echo $this->Form->label('ServiceDevice.pos_pcategory_id', __('Category'.': <span class="star"></span>', true),array('id'=>'PosPurchaseposSupplierId')  ); ?>
				<?php   echo $this->Form->Select('ServiceDevice.pos_pcategory_id',$type,array('class'=>'select2as ','type'=>'text','div'=>false,'empty'=>'- Select Type-','label'=>false ));?>
                
                <?php echo $this->Form->label('ServiceDevice.pos_brand_id', __('Brand'.': <span class="star"></span>', true),array('id'=>'PosPurchaseposSupplierId')  ); ?> 
 	<?php    echo $this->Form->Select('ServiceDevice.pos_brand_id',$brand,array('class'=>'select2as ','type'=>'text','div'=>false,'empty'=>'- Select Brand-','label'=>false ));?>
			 </div>
	 
 			 <div class="clr"></div>
    <?php echo $this->element('filter/commonfilter',array('cache' => array('time'=> '-7 days','key'=>'header')));?>
    <div class="button_area_filter">
    <?php echo $this->Form->button('Search',array( 'class'=>'submit', 'id'=>'btn_brand_search'));?>      <?php echo $this->Form->button('Reset',array('type'=>'reset','name'=>'reset','id'=>'Cancel', 'onClick'=>"parent.location='serviceDevices/index/yes'"));?>     
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
			<th align="left" ><div style=" width: 100px;"><?php echo $this->Paginator->sort('pos_pcategory_id','Category');?></div></th>
			<th align="left" ><div style=" width: 100px;"><?php echo $this->Paginator->sort('pos_brand_id','Brand');?></div></th>
 			<th align="left" ><div style=" width: 100px;"><?php echo $this->Paginator->sort('description');?></div></th> 
			<th align="left" ><div style=" width: 100px;"><?php echo $this->Paginator->sort('modified_by');?></div></th> 
			<th align="left" ><div style=" width: 100px;"><?php echo $this->Paginator->sort('modified');?></div></th>
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
	foreach ($serviceDevices as $serviceDevice):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
		
		 $dataDate = date('d / m / Y',strtotime($serviceDevice['ServiceDevice']['created']));
						 if($OrderitemDate == "" ||  $dataDate!= $OrderitemDate){
							echo "<tr> <td colspan = '8' class = 'listDateHeading'>".$dataDate."</td></tr>";
							$OrderitemDate = $dataDate;
						}
	?>
	<tr id='<?php echo 'row_'.$serviceDevice['ServiceDevice']['id'];?>'  <?php echo $class;?>>
 		<td align='left'><div style='width: 100px;' class='alistname'><?php echo $serviceDevice['ServiceDevice']['name']; ?>&nbsp;</div></td>
		<td align='left'><div style='width: 100px;' class='alistname'><?php echo  $type[$serviceDevice['ServiceDevice']['pos_pcategory_id']]; ?>&nbsp;</div></td>
		<td align='left'><div style='width: 100px;' class='alistname'><?php echo $brand[$serviceDevice['ServiceDevice']['pos_brand_id']]; ?>&nbsp;</div></td>
		<td align='left'><div style='width: 100px;' class='alistname'><?php echo $serviceDevice['ServiceDevice']['description']; ?>&nbsp;</div></td>
		<td align='left'><div style='width: 100px;' class='alistname'><?php echo $userlists[$serviceDevice['ServiceDevice']['modified_by']]; ?>&nbsp;</div></td>
	 
		<td align='left'><div style='width: 100px;' class='alistname'><?php 
		echo date("d/m/Y", strtotime($serviceDevice['ServiceDevice']['modified']));
		//echo $this->time->nice($serviceDevice['ServiceDevice']['modified']); ?>&nbsp;</div></td>
		<td class="actions">
<div style='width: 180px;' class='alistname link_link'>	
	<?php echo $this->Html->link(__('Service', true), array('action' => 'service_add_device', $serviceDevice['ServiceDevice']['id']),array('class'=>'link_view action_link add_service_in_device','id'=>$serviceDevice['ServiceDevice']['id'])); ?>
    		<?php echo $this->Html->link(__('View', true), array('action' => 'view', $serviceDevice['ServiceDevice']['id']),array('class'=>'link_view action_link')); ?>
			
		</div></td>
	</tr>
<?php endforeach; ?>
    </table>
    </div>
    
     <div class="pDiv">
    <div class="pGroup">
     	 <?php if($this->params['paging']['ServiceDevice']['prevPage']){?>
      <span class='paginate_link'><?php echo $this->Paginator->first(__('<< First', true), array('class' => 'number-first'));?></span> <span class='paginate_link'><?php echo $this->Paginator->prev('< ' . __('Previous', true), array(), null, array('class'=>'disabled','id'=>'prev_id'));?></span>
      <?php }?>
       <?php echo $this->Paginator->numbers(array('class' => 'numbers', 'first' => false, 'last' => false));?>
      <?php 
	  
	  if($this->params['paging']['ServiceDevice']['nextPage'] ){?>
      <span class='paginate_link'> <?php echo $this->Paginator->next(__('Next', true) . ' >', array(), null, array('class' => 'disabled','id'=>'next_id', 'span'=>false));?> </span> <span class='paginate_link'><?php echo $this->Paginator->last(__('>> Last', true), array('class' => 'number-end'));?></span>
      <?php }?>
    </div>
  </div>
  
     
  </div>     
</div>
 