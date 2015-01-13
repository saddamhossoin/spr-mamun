<?php echo $this->Html->script('module/ServiceDeviceInfos/client_communication');?>
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
   <?php echo $this->Form->create('ServiceDeviceInfo',array('controller' => 'ServiceDeviceInfos','action'=>'client_communication' ));?>
   <?php echo $this->element('filter/commonfilter',array('cache' => array('time'=> '-7 days','key'=>'header')));?>
    <div class="button_area_filter">
     
      <?php echo $this->Form->button('Search',array( 'class'=>'submit', 'id'=>'btn_brand_search'));?>      <?php echo $this->Form->button('Reset',array('type'=>'reset','name'=>'reset','id'=>'Cancel', 'onClick'=>"parent.location='".$this->webroot."ServiceDeviceInfos/client_communication/yes'"));?>     
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
	foreach ($client_comms as $client_comm):
	
	//pr($assessment_list);
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
		
		$dataDate = date('d / m / Y',strtotime($client_comm['ServiceDeviceInfo']['created']));
			if($purchaseDate == "" ||  $dataDate!= $purchaseDate){
				echo "<tr><td colspan = '10' class = 'listDateHeading'>".$dataDate."</td></tr>";
				$purchaseDate = $dataDate;
			}
	?>
	<tr id='<?php echo 'row_'.$client_comm['ServiceDeviceInfo']['id'];?>'  <?php echo $class;?>>
		
         
		<td align='left'><div style='width: 100px;' class='alistname'><?php echo $client_comm['ServiceDeviceInfo']['recive_date']; ?>&nbsp;</div></td>
		<td align='left'><div style='width: 100px;' class='alistname'><?php echo $client_comm['ServiceDeviceInfo']['estimated_date']; ?>&nbsp;</div></td>
		<td align='left'><div style='width: 100px;' class='alistname'><?php echo $client_comm['PosCustomer']['name']; ?>&nbsp;</div></td>
		<td align='left'><div style='width: 100px;' class='alistname'><?php echo $client_comm['ServiceDevice']['name']; ?>&nbsp;</div></td>
        <td align='left'><div style='width: 100px;' class='alistname'><?php echo $client_comm['ServiceDeviceInfo']['serial_no']; ?>&nbsp;</div></td>
        <td align='left'><div style='width: 60px;' class='alistname'><?php echo $client_comm['ServiceInvoice']['inventory_total']; ?>&nbsp;</div></td>
        <td align='left'><div style='width: 60px;' class='alistname'><?php echo $client_comm['ServiceInvoice']['service_total']; ?>&nbsp;</div></td>
        
		
		
		<td class="actions">
         <?php echo $this->Html->link(__('Print', true), array('action' => 'recieve', $client_comm['ServiceDeviceInfo']['id']),array('class'=>'receive_invoice action_link')); ?>
          <?php echo $this->Html->link(__('Assesment', true), array('controller'=>'Assesments','action' => 'recieve', $client_comm['ServiceDeviceInfo']['id']),array('class'=>'receive_invoice action_link','id'=>'AssesmentPrint')); ?>
      
        
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
 

