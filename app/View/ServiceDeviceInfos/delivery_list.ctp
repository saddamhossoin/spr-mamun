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
            <th align="left" ><div style=" width: 90px;"><?php echo $this->Paginator->sort('status');?></div></th>
			<th align="left" ><div style=" width: 100px;"><?php echo $this->Paginator->sort('pos_customer_id');?></div></th>
			<th align="left" ><div style=" width: 100px;"><?php echo $this->Paginator->sort('service_device_id');?></div></th>
            <th align="left" ><div style=" width: 100px;"><?php echo $this->Paginator->sort('serial_no');?></div></th>
            <th align="left" ><div style=" width: 60px;"><?php echo $this->Paginator->sort('inventory_total');?></div></th>
			<th align="left" ><div style=" width: 60px;"><?php echo $this->Paginator->sort('service_total');?></div></th>
            
		
	           <?php if($this->Session->read('username')=='Admin' || $this->Session->read('username')=='SuperAdmin'){?>          <th align="right"  ><div style="text-align: left; width: 100px;"><?php echo $this->Paginator->sort('User','modifiedBy');?></div></th>
          <?php } ?>         
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
	foreach ($delivery_lists as $delivery_list):
	
	//pr($assessment_list);
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
		
		$dataDate = date('d / m / Y',strtotime($delivery_list['ServiceDeviceInfo']['created']));
			if($purchaseDate == "" ||  $dataDate!= $purchaseDate){
				echo "<tr><td colspan = '10' class = 'listDateHeading'>".$dataDate."</td></tr>";
				$purchaseDate = $dataDate;
			}
	?>
	<tr id='<?php echo 'row_'.$delivery_list['ServiceDeviceInfo']['id'];?>'  <?php echo $class;?>>
		
         
		<td align='left'><div style='width: 100px;' class='alistname'><?php echo $delivery_list['ServiceDeviceInfo']['recive_date']; ?>&nbsp;</div></td>
		<td align='left'><div style='width: 100px;' class='alistname'><?php echo $delivery_list['ServiceDeviceInfo']['estimated_date']; ?>&nbsp;</div></td>
        
        <td align='left'>
        <div style='width: 90px;' class='alistname'><?php 
		 if($delivery_list['ServiceDeviceInfo']['status']==1){

            echo "<div class='link_view' id='Receive'>Receive</div>"; 
		
          }else if($delivery_list['ServiceDeviceInfo']['status']==2 ){
		
		    echo "<div class='link_view' id='wait_approve'>Assessment</div>"; 
		  }else if($delivery_list['ServiceDeviceInfo']['status']==3 ){
		
		    echo "<div class='link_view' id='reassessment'>Re-Assessment</div>"; 
		  }else if($delivery_list['ServiceDeviceInfo']['status']==4 ){
		
		    echo "<div class='link_view' id='Approved'>Confirmation</div>"; 
		  }else if($delivery_list['ServiceDeviceInfo']['status']==5 ){
		
		    echo "<div class='link_view' id='servicing'>Servicing</div>"; 
		  }
		   else if($delivery_list['ServiceDeviceInfo']['status']==6 ){
		
		    echo "<div class='link_view' id='s_complete'>Service Complete</div>"; 
		  }
		  else if($delivery_list['ServiceDeviceInfo']['status']==7 ){
		
		    echo "<div class='link_view'>Testing</div>"; 
		  }
		  else if($delivery_list['ServiceDeviceInfo']['status']==8 ){
		
		    echo "<div class='link_view'>Service Deliverd</div>"; 
		  }
		  else if($delivery_list['ServiceDeviceInfo']['status']==9 ){
		
		    echo "<div class='link_view' id='Delivered'>Client Delivered</div>"; 
		  }
			
			
			?>&nbsp;</div>
            </td>
            
		<td align='left'><div style='width: 100px;' class='alistname'><?php echo $delivery_list['PosCustomer']['name']; ?>&nbsp;</div></td>
		<td align='left'><div style='width: 100px;' class='alistname'><?php echo $delivery_list['ServiceDevice']['name']; ?>&nbsp;</div></td>
        <td align='left'><div style='width: 100px;' class='alistname'><?php echo $delivery_list['ServiceDeviceInfo']['serial_no']; ?>&nbsp;</div></td>
        <td align='left'><div style='width: 60px;' class='alistname'><?php echo $delivery_list['ServiceInvoice']['inventory_total']; ?>&nbsp;</div></td>
        <td align='left'><div style='width: 60px;' class='alistname'><?php echo $delivery_list['ServiceInvoice']['service_total']; ?>&nbsp;</div></td>
 	 <td class="actions">
      <?php echo $this->Html->link(__('View', true), array('action' => 'view', $delivery_list['ServiceDeviceInfo']['id']),array('class'=>'link_view action_link')); ?>
        
        <?php echo $this->Html->link(__('Print', true), array('action' => 'recieve', $delivery_list['ServiceDeviceInfo']['id']),array('class'=>'receive_invoice action_link')); ?>
 	   
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
 

<style>
#Delivery{
	color:#F00;
}
#Delivered{
	color:#060;
	}
	
#reassessment{
	color:#C3F;
	}
#Receive{
	color:#33F;
	}
#wait_approve{
	color:#FF0000;
	}
#Approved{
	color:#063;
	}
#servicing{
	color:#FF0000;
	}
#s_complete{
	color:#006600;
	}
.link_view {
    background: url("../../img/grid/title.gif") repeat-x scroll left bottom #ffffff;
    border: 1px solid #d7d7d7;
    border-radius: 5px;
    color: #036fad;
    display: inline-block;
    font-size: 11px;
    font-weight: bold;
    padding: 3px 7px;
    position: relative;
}

 



 


</style>
 

