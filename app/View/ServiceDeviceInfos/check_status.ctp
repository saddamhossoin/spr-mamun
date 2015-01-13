<?php $status=array(1=>"Receive",2=>"Assesment",3=>"Confirmation",4=>"Servicing",5=>"Complete Servicing/ Testing",6=>"Awaiting for Delivery",7=>"Delivered"); ?>
<?php echo $this->Form->create('ServiceDeviceInfo',array('action'=>'checkStatus'));?>
<div id="WrapperUserEmail" class="microcontroll">
 		<?php echo $this->Form->label('ServiceDeviceInfo.serial_no', __('Enter Serial No'.': <span class="star">*</span>', true) ); ?>
		<?php echo $this->Form->input('ServiceDeviceInfo.serial_no',array('type'=>'text','div'=>false,'label'=>false, 'size'=>35, 'class'=>'email '  ));?>
		
   </div>
   <div class="button_area">
		<?php echo $this->Form->button('Track your device',array( 'class'=>'submit', 'id'=>'btn_track_device_add'));?>
 
		<?php echo $this->Form->button('Cancel',array('type'=>'reset','name'=>'reset','id'=>'Cancel'));?>
		<?php echo $this->Form->end();?>
</div>

<?php
  if(!empty($serviceDeviceInfo)){
			echo "<h1> Hi , ".$serviceDeviceInfo['PosCustomer']['contactname']." </h1>";
			echo "<p> Your service status is bla bla bla bla bla</p>";
			
			?>
            <div class="serviceDeviceInfos view">
	<table cellpadding="0" cellspacing="0" class="view_table"><?php $i = 0; $class = ' class="altrow"';?>
		<tr <?php if ($i % 2 == 0) echo $class;?>><td>Id</td><td> : </td>
		<td >
			<?php echo $serviceDeviceInfo['ServiceDeviceInfo']['id']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td>Status</td><td>:</td>
		<td style="color:#006600; font-weight:bold; text-transform:uppercase;">
			<?php echo $status[$serviceDeviceInfo['ServiceDeviceInfo']['status']]; ?>
			&nbsp;
		</td></tr>
<?php $i++;?><tr <?php if ($i % 2 == 0) echo $class;?>><td>User</td><td>:</td>
		<td>
			<?php echo $this->Html->link($serviceDeviceInfo['User']['email_address'], array('controller' => 'users', 'action' => 'view', $serviceDeviceInfo['User']['id'])); ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td>Service Device</td><td>:</td>
		<td>
			<?php echo $this->Html->link($serviceDeviceInfo['ServiceDevice']['name'], array('controller' => 'service_devices', 'action' => 'view', $serviceDeviceInfo['ServiceDevice']['id'])); ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td>Serial No</td><td>:</td>
		<td >
			<?php echo $serviceDeviceInfo['ServiceDeviceInfo']['serial_no']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td>Description</td><td>:</td>
		<td >
			<?php echo $serviceDeviceInfo['ServiceDeviceInfo']['description']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td>Defect State</td><td>:</td>
		<td >
			<?php //echo $serviceDeviceInfo['ServiceDeviceInfo']['defect_state']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td>Acessories</td><td>:</td>
		<td >
			<?php echo $serviceDeviceInfo['ServiceDeviceInfo']['acessories']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td>Recive Date</td><td>:</td>
		<td >
			<?php echo $serviceDeviceInfo['ServiceDeviceInfo']['recive_date']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td>Estimated Date</td><td>:</td>
		<td >
			<?php echo $serviceDeviceInfo['ServiceDeviceInfo']['estimated_date']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td>Created By</td><td> : </td>
		<td >
			<?php echo $serviceDeviceInfo['ServiceDeviceInfo']['created_by']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td>Modified By</td><td> : </td>
		<td >
			<?php echo $serviceDeviceInfo['ServiceDeviceInfo']['modified_by']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td>Created</td><td> : </td>
		<td >
			<?php echo $serviceDeviceInfo['ServiceDeviceInfo']['created']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td>Modified</td><td> : </td>
		<td >
			<?php echo $serviceDeviceInfo['ServiceDeviceInfo']['modified']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>	</table>
</div><?php }else{
	echo "<h1>Invalid Serial No.</h1>";
}