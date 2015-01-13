<?php echo $this->Html->css('common/grid'); ?>
<div class="flexigrid" style="width: 100%;">
 <div class="mDiv">
  <div class="ftitle">
    <p> <?php echo $this->Paginator->counter(array(	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%')	));	?> </p>
  </div>
  <div id="searchlink"> &nbsp;</div>
</div>
 <div class="bDiv" style="height: auto;">
<div class="hDiv">
  <div class="hDivBox">
    <table cellspacing="0" cellpadding="0" width="100%">
      <thead>
        <tr>
 			<th align="left" style=" width: 4%;"> <?php echo 'Id';?> </th>
            <th align="left" style=" width: 13%;"> <?php echo 'Customer';?> </th>
			<th align="left" style=" width: 5%;"> <?php echo 'Status';?> </th>
			<th align="left" style=" width: 20%;"> <?php echo 'Device';?> </th>
            <th align="left" style=" width: 10%;"> <?php echo 'Brand';?> </th>
             <th align="left" style=" width: 10%;"> <?php echo 'Category';?> </th>
			<th align="left" style=" width: 8%;"> <?php echo 'Serial';?> </th>
 			<th align="left" style=" width: 8%;"> <?php echo 'Recive Date';?> </th>
			<th align="left" style=" width: 8%;"> <?php echo 'Estimated Date';?> </th> 
 	           <th align="left" style=" width: 14%;"> <?php echo 'Link';?> </th>
        </tr>
      </thead>
    </table>
  </div>
</div>
 
  <table cellspacing="0" cellpadding="0" border="0" width="100%" class="flexme3">
      <tbody>
<?php
   $status=array(1=>"Receive",2=>"Assesment",3=>"Re-Assessment",4=>"Confirmation",5=>"Servicing",6=>"Complete Servicing",7=>"Testing",8=>"Awaiting for Delivery",9=>"Delivered",10=>"Check List",11=>"Check List Complete",12=>"CUSTOMER COMMUNICATION" , 13=>"AWAITING CONFIRMATION QUOTE" , 14=>"WAITING FOR PARTS"); 
	$purchaseDate = '';
	$i = 0;
	
	foreach ($serviceDeviceInfos as $serviceDeviceInfo):
	  
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
		$dataDate = date('d / m / Y',strtotime($serviceDeviceInfo['ServiceDeviceInfo']['created']));
			if($purchaseDate == "" ||  $dataDate!= $purchaseDate){
				echo "<tr><td colspan = '10' class = 'listDateHeading'>".$dataDate."</td></tr>";
				$purchaseDate = $dataDate;
			}
	?>
	<tr id='<?php echo 'row_'.$serviceDeviceInfo['ServiceDeviceInfo']['id'];?>'  <?php echo $class;?>>
        <td align='left' style='width: 4%; font-weight:bold; text-align:center'><?php echo  $serviceDeviceInfo['ServiceDeviceInfo']['id']  ; ?></td>
        <td align='left' style='width: 13%;'><?php echo  $serviceDeviceInfo['User']['firstname'] . ' ' . $serviceDeviceInfo['User']['lastname']  ; ?></td>
        <td align='left' style='width: 5%;'><?php echo $status[$serviceDeviceInfo['ServiceDeviceInfo']['status']]; ?>&nbsp;</td>
        <td align='left' style='width: 20%;'><?php echo  $serviceDeviceInfo['ServiceDevice']['name'] ; ?></td>
        <td align='left' style='width: 10%;'><?php echo  $posBrands[$serviceDeviceInfo['ServiceDevice']['pos_brand_id']] ; ?></td>
        <td align='left' style='width: 10%;'><?php echo  $posPcategories[$serviceDeviceInfo['ServiceDevice']['pos_pcategory_id']] ;?>
        </td>
        <td align='left'  style='width: 8%;'><?php echo $serviceDeviceInfo['ServiceDeviceInfo']['serial_no']; ?>&nbsp;</td>
        <td align='left'  style='width: 8%;'><?php echo date("d/m/Y H:i:s", strtotime($serviceDeviceInfo['ServiceDeviceInfo']['recive_date']));  ?>&nbsp;</td>
        <td align='left' style='width: 8%;'><?php 
        echo date("d/m/Y H:i:s", strtotime($serviceDeviceInfo['ServiceDeviceInfo']['estimated_date'])); ?>&nbsp;</td> 
        <td class="actions"  style='width: 14%;'>
        <div class='alistname link_link'>
        <?php echo $this->Html->link(__('View', true), array('action' => 'view', $serviceDeviceInfo['ServiceDeviceInfo']['id']),array('class'=>'link_view action_link','target'=>'blank')); ?>
			 
		</div></td>
	</tr>
<?php endforeach; ?>
    </table>
    </div>
    
    <div class="pDiv">
    <div class="pGroup">
     	 <?php if($this->params['paging']['ServiceDeviceInfo']['prevPage']){?>
      <span class='paginate_link'><?php echo $this->Paginator->first();?></span> <span class='paginate_link'><?php echo $this->Paginator->prev('< ' . __('Previous', true), array(), null, array('class'=>'disabled','id'=>'prev_id'));?></span>
      <?php }?>
      <?php echo $this->Paginator->numbers();?>
      <?php if($this->params['paging']['ServiceDeviceInfo']['nextPage']){?>
      <span class='paginate_link'> <?php echo $this->Paginator->next(__('Next', true) . ' >', array(), null, array('class' => 'disabled','id'=>'next_id', 'span'=>false));?> </span> <span class='paginate_link'><?php echo $this->Paginator->last();?></span>
      <?php }?>
    </div>
  </div>     
</div>

 <?php echo $this->Html->css('common/common'); ?>
<style type="text/css">
input[type="text"], input[type="number"], [type="password"], [type="select"], input[type="email"], input[type="tel"] {
    min-width: 232px !important;
}

</style>