<?php //pr($technician_completes);?>
<?php echo $this->Html->css(array('common/grid'));?>

<div class="flexigrid" style="width: 100%;">
 <div class="mDiv">
  <div class="ftitle">
    <p> <?php echo $this->Paginator->counter(array(	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%')	));	?> </p>
  </div>
  <div id="searchlink"> &nbsp;</div>
</div>

<div class="tDiv">
  <div class="tDiv2">
   <?php echo $this->Form->create('ServiceDeviceInfo',array('controller' => 'ServiceDeviceInfos','action'=>'index' ));?>
   <?php echo $this->element('filter/commonfilter',array('cache' => array('time'=> '-7 days','key'=>'header')));?>
    <div class="button_area_filter">
     
      <?php echo $this->Form->button('Search',array( 'class'=>'submit', 'id'=>'btn_brand_search'));?>      <?php echo $this->Form->button('Reset',array('type'=>'reset','name'=>'reset','id'=>'Cancel', 'onClick'=>"parent.location='ServiceDeviceInfos/initial_assesment_list/yes'"));?>     
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
 			<th align="left" ><div style=" width: 100px;"><?php echo $this->Paginator->sort('recive_date');?></div></th>
			<th align="left" ><div style=" width: 100px;"><?php echo $this->Paginator->sort('estimated_date');?></div></th>
			<th align="left" ><div style=" width: 100px;"><?php echo $this->Paginator->sort('pos_customer_id');?></div></th>
			<th align="left" ><div style=" width: 100px;"><?php echo $this->Paginator->sort('service_device_id');?></div></th>
            <th align="left" ><div style=" width: 100px;"><?php echo $this->Paginator->sort('serial_no');?></div></th>
            <th align="left" ><div style=" width: 60px;"><?php echo $this->Paginator->sort('inventory_total');?></div></th>
			<th align="left" ><div style=" width: 60px;"><?php echo $this->Paginator->sort('service_total');?></div></th>
 	         <?php if($this->Session->read('username')=='Admin' || $this->Session->read('username')=='SuperAdmin'){?> 
             <th align="right"  ><div style="text-align: left; width: 100px;"><?php echo $this->Paginator->sort('User','modifiedBy');?></div></th><?php } ?>
             <th align="left" ><div style=" width: 180px;" class="link_text"><?php echo 'Link';?></div></th>
        </tr>
      </thead>
    </table>
  </div>
</div>
 
  <table cellspacing="0" cellpadding="0" border="0" style="" class="flexme3">
      <tbody>
<?php
    $purchaseDate = '';
	$i = 0;
	foreach ($delivered_lists as $delivered_list):
	
	//pr($assessment_list);
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
		
		$dataDate = date('d / m / Y',strtotime($delivered_list['ServiceDeviceInfo']['created']));
			if($purchaseDate == "" ||  $dataDate!= $purchaseDate){
				echo "<tr><td colspan = '10' class = 'listDateHeading'>".$dataDate."</td></tr>";
				$purchaseDate = $dataDate;
			}
	?>
	<tr id='<?php echo 'row_'.$delivered_list['ServiceDeviceInfo']['id'];?>'  <?php echo $class;?>>
		
         
		<td align='left'><div style='width: 100px;' class='alistname'><?php echo $delivered_list['ServiceDeviceInfo']['recive_date']; ?>&nbsp;</div></td>
		<td align='left'><div style='width: 100px;' class='alistname'><?php echo $delivered_list['ServiceDeviceInfo']['estimated_date']; ?>&nbsp;</div></td>
		<td align='left'><div style='width: 100px;' class='alistname'><?php echo $delivered_list['PosCustomer']['name']; ?>&nbsp;</div></td>
		<td align='left'><div style='width: 100px;' class='alistname'><?php echo $delivered_list['ServiceDevice']['name']; ?>&nbsp;</div></td>
        <td align='left'><div style='width: 100px;' class='alistname'><?php echo $delivered_list['ServiceDeviceInfo']['serial_no']; ?>&nbsp;</div></td>
        <td align='left'><div style='width: 60px;' class='alistname'><?php echo $delivered_list['ServiceInvoice']['inventory_total']; ?>&nbsp;</div></td>
        <td align='left'><div style='width: 60px;' class='alistname'><?php echo $delivered_list['ServiceInvoice']['service_total']; ?>&nbsp;</div></td>
        
		
		
		<td class="actions">
         <?php echo $this->Html->link(__('Print', true), array('action' => 'recieve', $delivered_list['ServiceDeviceInfo']['id']),array('class'=>'receive_invoice action_link')); ?>
          <?php echo $this->Html->link(__('Assesment', true), array('controller'=>'Assesments','action' => 'recieve', $delivered_list['ServiceDeviceInfo']['id']),array('class'=>'receive_invoice action_link','id'=>'AssesmentPrint')); ?>
        <?php if($delivered_list['ServiceDeviceInfo']['status']==8){?>
			<div style='width: 180px;' class='alistname link_link'>
 					<?php echo $this->Html->link(__('Delivered Invoice', true), array('controller'=>'ServiceDeviceInfos','action' =>'client_delivered',$delivered_list['ServiceDeviceInfo']['id']),array('class'=>'link_view action_link' , 'id'=>'ClientDelivery')); ?>
			</div>
        <?php }?>
        
        </td> 

 
	


	</tr>
<?php endforeach; ?>
    </table>
    </div>
    
    <div class="pDiv">
    <div class="pGroup">
     	 <?php if($this->params['paging']['ServiceDeviceInfo']['prevPage']){?>
      <span class='paginate_link'><?php echo $paginator->first();?></span> <span class='paginate_link'><?php echo $this->Paginator->prev('< ' . __('Previous', true), array(), null, array('class'=>'disabled','id'=>'prev_id'));?></span>
      <?php }?>
      <?php echo $this->Paginator->numbers();?>
      <?php if($this->params['paging']['ServiceDeviceInfo']['nextPage']){?>
      <span class='paginate_link'> <?php echo $this->Paginator->next(__('Next', true) . ' >', array(), null, array('class' => 'disabled','id'=>'next_id', 'span'=>false));?> </span> <span class='paginate_link'><?php echo $this->Paginator->last();?></span>
      <?php }?>
    </div>
  </div>     
</div>
 

