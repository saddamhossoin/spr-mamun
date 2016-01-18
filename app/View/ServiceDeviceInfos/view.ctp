<?php   //print_r($serviceDeviceInfo);?>
<?php $status=array(1=>"Receive",2=>"Assesment",3=>"Re-Assessment",4=>"Confirmation",5=>"Servicing",6=>"Complete Servicing",7=>"Testing",8=>"Awaiting for Delivery",9=>"Delivered",10=>"Check List",11=>"Check List Complete",12=>"CUSTOMER COMMUNICATION" , 13=>"AWAITING CONFIRMATION QUOTE" , 14=>"WAITING FOR PARTS",16=>"Sent Samsung/Nokia warranty",17=>"Received from Samsung/Nokia warranty",18=> "Returned at Samsung/Nokia warranty" ); ?>
<div class="serviceDeviceInfos view">
<div style="font-size:14px; font-weight:bold; padding:20px;color:#0066FF;">Basic Info</div>

<table cellpadding="0" cellspacing="0" class="view_table"><?php $i = 0; $class = ' class="altrow"';?>
<?php $i++;?>		
<tr <?php if ($i % 2 == 0) echo $class;?>>
    <td width="15%">Barcode</td>
    <td width="3%">:</td>
    <td width="32%"><?php  echo $this->Html->image("../".$serviceDeviceInfo['ServiceDeviceInfo']['barcode_file'], array("class"=>"barcode","alt" => $serviceDeviceInfo['ServiceDeviceInfo']['barcode_file'] ));?>
    </td>

    <td width="15%">Status</td>
    <td width="3%">:</td>
    <td width="32"><?php echo $status[$serviceDeviceInfo['ServiceDeviceInfo']['status']]; ?>&nbsp;</td>
</tr>

<?php $i++;?>
<tr <?php if ($i % 2 == 0) echo $class;?>>
        <td>Recive Date</td>
        <td>:</td>
        <td><?php echo $serviceDeviceInfo['ServiceDeviceInfo']['recive_date']; ?>&nbsp;</td>
        <td>Estimated Date</td>
        <td>:</td>
        <td><?php echo $serviceDeviceInfo['ServiceDeviceInfo']['estimated_date']; ?>&nbsp;</td>
    </tr>

<?php $i++;?>
<tr <?php if ($i % 2 == 0) echo $class;?>>
	<td>Customer Name</td>
    <td>:</td>
	<td><?php echo $this->Html->link($serviceDeviceInfo['User']['firstname'] ." ".$serviceDeviceInfo['User']['lastname'], array('controller' => 'users', 'action' => 'view', $serviceDeviceInfo['User']['id'])); ?>
    </td>
    <td>Email</td>
    <td>:</td>
	<td><?php echo $this->Html->link($serviceDeviceInfo['User']['email_address'], array('controller' => 'users', 'action' => 'view', $serviceDeviceInfo['User']['id'])); ?>
    </td>
    </tr>
    
<?php $i++;?>
<tr <?php if ($i % 2 == 0) echo $class;?>>
	<td>Phone</td>
    <td>:</td>
	<td><?php echo $serviceDeviceInfo['User']['phone'] ; ?>
    </td>
    <td>Serial No</td>
    <td>:</td>
    <td><?php echo $serviceDeviceInfo['ServiceDeviceInfo']['serial_no']; ?>&nbsp;</td>
        
    </tr>

<?php $i++;?>
<tr <?php if ($i % 2 == 0) echo $class;?>>
        <td>Service Device</td>
        <td>:</td>
        <td><?php echo $this->Html->link($serviceDeviceInfo['ServiceDevice']['name'], array('controller' => 'service_devices', 'action' => 'view', $serviceDeviceInfo['ServiceDevice']['id'])); ?>
        </td>
        <td>Brand</td>
        <td>:</td>
        <td><?php echo $serviceDeviceInfo['ServiceDevice']['PosBrand']['name'] ; ?>
        </td>
 		
    </tr>

<?php $i++;?>
<tr <?php if ($i % 2 == 0) echo $class;?>>
        <td>Acessories</td>
        <td>:</td>
        <td><?php
                if(!empty($serviceDeviceInfo['ServiceDeviceAcessory'])){
                    foreach($serviceDeviceInfo['ServiceDeviceAcessory'] as $accesorylist){
                        echo  $accesorylist['ServiceAcessory']['name']  ." , ";
                        }
                    }else{
                        echo 'Acessory not mention!!!';
            	}?>&nbsp;</td>
        <td>Defect State</td>
        <td>:</td>
        <td><?php
			if(!empty($serviceDeviceInfo['ServiceDeviceDefect'])){
					foreach($serviceDeviceInfo['ServiceDeviceDefect'] as $defectlist){
						echo  $defectlist['ServiceDefect']['name']  ." , ";
					}
				}else{
					echo 'Defect not mention!!!';
				}
			?>&nbsp;</td>
    </tr>
<?php $i++;?>

<tr <?php if ($i % 2 == 0) echo $class;?>>
<td>Description</td>
<td>:</td>
<td  colspan="4"><?php echo $serviceDeviceInfo['ServiceDeviceInfo']['description']; ?>&nbsp;</td>
</tr>
<?php $i++;?>
<tr <?php if ($i % 2 == 0) echo $class;?>>
	<td>Created</td>
    <td> : </td>
    <td><?php echo $serviceDeviceInfo['ServiceDeviceInfo']['created']; ?>&nbsp;</td>

	<td>Modified</td>
	<td> : </td>
	<td><?php echo $serviceDeviceInfo['ServiceDeviceInfo']['modified']; ?>&nbsp;</td>
</tr>	

<?php $i++;?>	</table>

<div style="font-size:14px; font-weight:bold; padding:20px;color:#0066FF;">Service Recive </div>
<table cellpadding="0" cellspacing="0" class="view_table"><?php $i = 0; $class = ' class="altrow"';?>

<?php $i++;?>
<tr <?php if ($i % 2 == 0) echo $class;?>>
    <td width="15%">Recived By</td>
    <td width="3%"> : </td>
    <td width="32%"><?php echo $serviceDeviceInfo['UserModified']['firstname'] . ' ' . $serviceDeviceInfo['UserModified']['lastname']; ?>
    &nbsp;
    </td>
    <td width="15%">Counter</td>
    <td width="3%"> : </td>
    <td width="32%"><?php echo $serviceDeviceInfo['UserModified']['counter_name']; ?>&nbsp;</td>
</tr>
<?php $i++;?>
</table>
<?php  // pr($serviceDeviceInfo['AssesmentApproveNote']);?>

<div style="font-size:14px; font-weight:bold; padding:20px;color:#0066FF;">Service Recive </div>
<table cellpadding="0" cellspacing="0" class=" flexigrid"><?php $i = 0; $class = ' class="altrow"';?>
<tr class="heading">
    <td width="12%">Date</td>
    <td width="15%">Division</td>
    <td width="10%">To</td>
    <td width="10%">From</td>
    <td width="30%">Notes</td>
    <td width="18%">Other</td>
</tr>
<?php 
foreach($serviceDeviceInfo['AssesmentApproveNote'] as $AssesmentApproveNote){
echo "
<tr>
    <td>".$AssesmentApproveNote['created']."</td>
    <td>".$AssesmentApproveNote['stage_des']."</td>
    <td>".$AssesmentApproveNote['User']['firstname']. " " .$AssesmentApproveNote['User']['lastname']."</td>
	 <td>".$AssesmentApproveNote['UserApproveCreated']['firstname']. " " .$AssesmentApproveNote['UserApproveCreated']['lastname']."</td>
    <td>".$AssesmentApproveNote['notes']."</td>
    <td></td>
</tr>
";

	
}

?>

	
</table>


</div>
<style>
.flexigrid{
  border: 1px solid #cccccc;
    margin-right: 2px;
    width: 99%;}
.flexigrid tr td {
    font-family: Verdana,Arial,Helvetica,sans-serif;
    font-size: 11px;
    padding: 5px 5px 5px 8px;
}
.heading td{
	font-weight:bold;
}

</style>
  