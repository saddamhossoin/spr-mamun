<?php echo $this->Html->script(array('alert/alert','module/Assesments/chiefdashboard')); ?>
<?php echo $this->Html->css(array('alert/css/alert','alert/themes/default/theme','module/Assesments/chiefdashboard','common/grid')); ?>

<!-- =============== Start Here Service Recive panel =============-->
<div style="float:left; width:50%;" class="recive panelbox"> 
   <table cellspacing="0" cellpadding="0" border="0" class="view_table" style="">
    <thead>
     <tr> <th class="ftitle" colspan="5"> Receive / Assesment </th></tr>
        <tr>
 			<th width="15%" align="left"> Date</th>
   			<th width="30%" align="left"> Device</th>
            <th width="25%" align="left"> IMEI</th>
            <th width="15%" align="left"> D.Date</th>
			<th width="15%" align="left"> Link</th>
       	   </tr>
      </thead>
  <tbody>
 
<?php foreach($serviceDeviceInfoLists as $sllist){
  		if($sllist['ServiceDeviceInfo']['status'] == 1 || $sllist['ServiceDeviceInfo']['status'] == 2){?>
      <tr id="<?php echo $sllist['ServiceDeviceInfo']['id']; ?>">
            <td><?php echo $sllist['ServiceDeviceInfo']['recive_date']; ?></td>
            <td><?php echo $sllist['ServiceDevice']['name']; ?></td>
            <td><?php echo " <b>&nbsp; ". $sllist['ServiceDeviceInfo']['serial_no']."</b>"; ?></td>
            <td><?php echo $sllist['ServiceDeviceInfo']['estimated_date']; ?></td>
             <td class="actions">
             <?php echo $this->Html->link(__('Print', true), array('controller'=>'ServiceDeviceInfos','action' => 'recieve', $sllist['ServiceDeviceInfo']['id']),array('class'=>'receive_invoice action_link printlink')); 
              echo $this->Html->link(__('Assesment', true), array('controller'=>'Assesments','action' => 'add', $sllist['ServiceDeviceInfo']['id']),array('class'=>'receive_invoice action_link AssesmentAdd' )); 
			 ?>
		  </td>
        </tr> 
<?php }}?>
   
    <tr>
    	<td></td>
       	<td></td>
       	<td style="font-weight:bold;"></td>
      	<td style="font-weight:bold;"></td>
     </tr>
     </tbody></table>
</div>
<!-- =============== End Here Service Recive panel =============-->

<!-- =============== Start Here Reassesment panel =============-->
<div style="float:left; width:50%;" class="Reassesment panelbox"> 
   <table cellspacing="0" cellpadding="0" border="0" class="view_table" style="">
    <thead>
     <tr> <th class="ftitle" colspan="5"> Reassesment</th></tr>
        <tr>
 			<th width="15%" align="left"> Date</th>
   			<th width="30%" align="left"> Device</th>
            <th width="25%" align="left"> IMEI</th>
            <th width="15%" align="left"> D.Date</th>
			<th width="15%" align="left"> Link</th>
       	   </tr>
      </thead>
  <tbody>
 
<?php foreach($serviceDeviceInfoLists as $sllist){
  		if($sllist['ServiceDeviceInfo']['status'] == 3){?>
      <tr id="<?php echo $sllist['ServiceDeviceInfo']['id']; ?>">
            <td><?php echo $sllist['ServiceDeviceInfo']['recive_date']; ?></td>
            <td><?php echo $sllist['ServiceDevice']['name']; ?></td>
            <td><?php echo " <b>&nbsp; ". $sllist['ServiceDeviceInfo']['serial_no']."</b>"; ?></td>
            <td><?php echo $sllist['ServiceDeviceInfo']['estimated_date']; ?></td>
             <td class="actions">
             <?php echo $this->Html->link(__('Print', true), array('action' => 'recieve', $sllist['ServiceDeviceInfo']['id']),array('class'=>'receive_invoice action_link printlink')); 
			  echo $this->Html->link(__('Assesment', true), array('controller'=>'Assesments','action' => 'add', $sllist['ServiceDeviceInfo']['id']),array('class'=>'receive_invoice action_link AssesmentAdd' )); 
			  ?>
			 
		  </td>
        </tr> 
<?php }}?>
   
    <tr>
    	<td></td>
       	<td></td>
       	<td style="font-weight:bold;"></td>
      	<td style="font-weight:bold;"></td>
     </tr>
     </tbody></table>
</div>
<!-- =============== End Here Service Recive panel =============-->

<!-- =============== Start Here check List Complete panel =============-->
<div style="float:left; width:50%; display:block;" class="checklist_Complete panelbox"> 
   <table cellspacing="0" cellpadding="0" border="0" class="view_table" style="">
    <thead>
     <tr> <th class="ftitle" colspan="5"> Check List Complete</th></tr>
        <tr>
 			<th width="15%" align="left"> Date</th>
   			<th width="30%" align="left"> Device</th>
            <th width="25%" align="left"> IMEI</th>
            <th width="15%" align="left"> D.Date</th>
			<th width="15%" align="left"> Link</th>
       	   </tr>
      </thead>
  <tbody>
 
<?php foreach($serviceDeviceInfoLists as $sllist){
  		if($sllist['ServiceDeviceInfo']['status'] == 11){?>
      <tr id="<?php echo $sllist['ServiceDeviceInfo']['id']; ?>">
            <td><?php echo $sllist['ServiceDeviceInfo']['recive_date']; ?></td>
            <td><?php echo $sllist['ServiceDevice']['name']; ?></td>
            <td><?php echo " <b>&nbsp; ". $sllist['ServiceDeviceInfo']['serial_no']."</b>"; ?></td>
            <td><?php echo $sllist['ServiceDeviceInfo']['estimated_date']; ?></td>
             <td class="actions">
             <?php echo $this->Html->link(__('Print', true), array('action' => 'recieve', $sllist['ServiceDeviceInfo']['id']),array('class'=>'receive_invoice action_link printlink')); ?>
 		  </td>
        </tr> 
<?php }}?>
   
    <tr>
    	<td></td>
       	<td></td>
       	<td style="font-weight:bold;"></td>
      	<td style="font-weight:bold;"></td>
     </tr>
     </tbody></table>
</div>
<!-- =============== End Here Service Recive panel =============-->

<!-- =============== Start Here Test Complete  panel =============-->
<div style="float:left; width:50%; display:block;" class="Test_Complete panelbox"> 
   <table cellspacing="0" cellpadding="0" border="0" class="view_table" style="">
    <thead>
     <tr> <th class="ftitle" colspan="5"> Test Complete</th></tr>
        <tr>
 			<th width="15%" align="left"> Date</th>
   			<th width="30%" align="left"> Device</th>
            <th width="25%" align="left"> IMEI</th>
            <th width="15%" align="left"> D.Date</th>
			<th width="15%" align="left"> Link</th>
       	   </tr>
      </thead>
  <tbody>
 
<?php 
//pr($serviceDeviceInfoLists );
foreach($serviceDeviceInfoLists as $sllist){
  		if($sllist['ServiceDeviceInfo']['status'] == 6 || $sllist['ServiceDeviceInfo']['status'] == 7){?>
      <tr id="<?php echo $sllist['ServiceDeviceInfo']['id']; ?>">
            <td><?php echo $sllist['ServiceDeviceInfo']['recive_date']; ?></td>
            <td><?php echo $sllist['ServiceDevice']['name']; ?></td>
            <td><?php echo " <b>&nbsp; ". $sllist['ServiceDeviceInfo']['serial_no']."</b>"; ?></td>
            <td><?php echo $sllist['ServiceDeviceInfo']['estimated_date']; ?></td>
            <td class="actions">
             <?php echo $this->Html->link(__('Print', true), array('action' => 'recieve', $sllist['ServiceDeviceInfo']['id']),array('class'=>'receive_invoice action_link printlink')); 
			   echo $this->Html->link(__('Assesment', true), array('controller'=>'Assesments','action' => 'add', $sllist['ServiceDeviceInfo']['id']),array('class'=>'receive_invoice action_link AssesmentAdd' )); 
			   ?>
			<?php /* if($spLedger ['payment_mode'] == 1 && $spLedger ['note'] == 'Inventory'){
				  echo $this->Html->link(__('Invoice', true), array('controller'=>'PosPurchases','action' => 'view', $spLedger ['pos_purchase_id']),array('class'=>'link_view action_link'));*/?>
		  </td>
        </tr> 
<?php }}?>
   
    <tr>
    	<td></td>
       	<td></td>
       	<td style="font-weight:bold;"></td>
      	<td style="font-weight:bold;"></td>
     </tr>
     </tbody></table>
</div>
<!-- =============== End Here Test Complete  panel =============-->

<!-- =============== Start Here Tech Assign  panel =============-->
<div style="float:left; width:50%; display:block;" class="Test_Complete panelbox"> 
   <table cellspacing="0" cellpadding="0" border="0" class="view_table" style="">
    <thead>
     <tr> <th class="ftitle" colspan="5"> Technician</th></tr>
        <tr>
 			<th width="15%" align="left"> Technician</th>
   			<th width="30%" align="left"> Device</th>
            <th width="25%" align="left"> IMEI</th>
            <th width="15%" align="left"> D.Date</th>
			<th width="15%" align="left"> Link</th>
       	   </tr>
      </thead>
  <tbody>
 
<?php 
 foreach($serviceDeviceInfoLists as $sllist){
 // pr($tech_user_list);
 // pr($sllist);
   		if($sllist['ServiceDeviceInfo']['status'] == 4 || $sllist['ServiceDeviceInfo']['status'] == 5 || $sllist['ServiceDeviceInfo']['status'] == 10 ){?>
      <tr id="<?php ?>">
            <td><?php   if($sllist['ServiceDeviceInfo']['status'] == 4 || $sllist['ServiceDeviceInfo']['status'] == 5 ){	 
	  //	pr($sllist);
		if(empty($sllist['Assesment']['tech_id'])){
		  echo $tech_user_list[$sllist['AssesmentApproveNote']['user_id']];
		 }else{
		 echo $tech_user_list[$sllist['Assesment']['tech_id']];
		 }
	  } 
	  
	    ?></td>
            <td><?php echo $sllist['ServiceDevice']['name']; ?></td>
            <td><?php echo " <b>&nbsp; ". $sllist['ServiceDeviceInfo']['serial_no']."</b>"; ?></td>
            <td><?php echo $sllist['ServiceDeviceInfo']['estimated_date']; ?></td>
            <td class="actions">
             <?php echo $this->Html->link(__('Print', true), array('action' => 'recieve', $sllist['ServiceDeviceInfo']['id']),array('class'=>'receive_invoice action_link printlink')); ?>
			<?php /* if($spLedger ['payment_mode'] == 1 && $spLedger ['note'] == 'Inventory'){
				  echo $this->Html->link(__('Invoice', true), array('controller'=>'PosPurchases','action' => 'view', $spLedger ['pos_purchase_id']),array('class'=>'link_view action_link'));*/?>
		  </td>
        </tr> 
<?php }}?>
   
    <tr>
    	<td></td>
       	<td></td>
       	<td style="font-weight:bold;"></td>
      	<td style="font-weight:bold;"></td>
     </tr>
     </tbody></table>
</div>
<!-- =============== End Here Tech Assign  panel =============-->

