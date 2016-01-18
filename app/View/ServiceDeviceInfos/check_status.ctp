<?php $status=array(1=>"Receive",2=>"Assesment",3=>"Re-Assessment",4=>"Confirmation",5=>"Servicing",6=>"Complete Servicing",7=>"Testing",8=>"Awaiting for Delivery",9=>"Delivered",10=>"Check List",11=>"Check List Complete",12=>"CUSTOMER COMMUNICATION" , 13=>"AWAITING CONFIRMATION QUOTE" , 14=>"WAITING FOR PARTS",16=>"Sent Samsung/Nokia warranty",17=>"Received from Samsung/Nokia warranty",18=> "Returned at Samsung/Nokia warranty" ); ?>
 
<?php echo $this->set('title_for_layout', 'TRACKING'); ?>
<?php echo $this->Html->css(array('module/ServiceDeviceInfos/check_status' )); ?>
<?php echo $this->Html->css(array('module/Shop/cart' )); ?>
<br />
<div class="invoice_summary shopping_cart_right tracking"> 
<div class="orderSummary">Tracking</div>
<?php echo $this->Form->create('ServiceDeviceInfo',array('action'=>'checkStatus'));?>
<div id="WrapperUserEmail" class="microcontroll">
	<?php echo $this->Form->label('ServiceDeviceInfo.serial_no', __('Enter Serial No'.': ', true)); ?>
	<?php echo $this->Form->input('ServiceDeviceInfo.serial_no',array('type'=>'text','div'=>false,'label'=>false, 'size'=>35, 'class'=>'email'));?> 
	<?php echo $this->Form->button('Submit',array( 'class'=>'submit panel-warning', 'id'=>'btn_track_device_add'));?>
 	<?php echo $this->Form->button('Cancel',array('type'=>'reset','name'=>'reset','id'=>'Cancel','class'=>'panel-warning', 'onClick'=>"parent.location='".$this->webroot."ServiceDeviceInfos/checkStatus/yes'"));?>
	<?php echo $this->Form->end();?>
    <div class="clr"></div>
</div>
 
</div>
<div class="clr"></div>
<br />
<?php if(!empty($serviceDeviceInfo)){  //pr($serviceDeviceInfo);?>
<div class="row">
	<div class="col col-sm-4 info_div">
		<div class="panel panel-default">
			<div class="panel-heading panel-warning">
				<h3 class="panel-title">Customer Info</h3>
 			</div>
			<div class="panel-body">
				<span class="titlea">Name</span>: <?php echo $serviceDeviceInfo['User']['firstname'] .' '.$serviceDeviceInfo['User']['lastname'];?><br />
				<span class="titlea">Email</span>: <?php echo $serviceDeviceInfo['User']['email_address'];?><br />
				<span class="titlea">Phone</span>: <?php echo $serviceDeviceInfo['User']['phone'];?><br />
                <span class="titlea">Address</span>: <?php echo $serviceDeviceInfo['User']['address'];?><br />
                <span class="titlea">P.IVA</span>: <?php echo $serviceDeviceInfo['User']['piva'];?><br />
 			</div>
		</div>
	</div>
	<div class="col col-sm-4 info_div">
		<div class="panel panel-default">
			<div class="panel-heading panel-warning">
				<h3 class="panel-title">Device Information</h3>
			</div>
			<div class="panel-body">
                <span class="titlea">Name</span>: <?php echo $serviceDeviceInfo['ServiceDevice']['name'];?> &nbsp; <br />
                <span class="titlea">IMEI</span>: <?php echo $serviceDeviceInfo['ServiceDeviceInfo']['serial_no'];?> &nbsp;<br /> 
 			</div>
		</div>
	</div>
	<div class="col col-sm-4 info_div">
		<div class="panel panel-default">
			<div class="panel-heading panel-warning">
				<h3 class="panel-title">Device Status</h3>
			</div>
		<div class="panel-body">
         <span class="titlea">Recive</span>: <?php echo $serviceDeviceInfo['ServiceDeviceInfo']['recive_date'];?> &nbsp; <br />
         <span class="titlea">Estimated</span>: <?php echo $serviceDeviceInfo['ServiceDeviceInfo']['estimated_date'];?> &nbsp;<br />
             <span class="titlea">State</span>: <?php
				 switch($serviceDeviceInfo['ServiceDeviceInfo']['status']){
					case 1:
					 echo "<span class='statuss' id='Receive'>Working</div>"; 
					break;
					case 2:
					 echo "<span class='statuss' id='wait_approve'>Working</div>"; 
					break;
					case 3:
					 echo "<span class='statuss' id='reassessment'>Working</div>"; 
					break;
					case 4:
					 echo "<span class='statuss' id='Approved'>Working</div>"; 
					break;
					case 5:
					 echo "<span class='statuss'>Working</div>"; 
					break;
					case 6:
					 echo "<span class='statuss'>Working</div>"; 
					break;
					case 7:
					 echo "<span class='statuss'>Repairs Complete</div>"; 
					break;
					case 8:
					 echo "<span class='statuss'>Repairs Complete</div>"; 
					break;
					case 9:
					 echo "<span class='statuss'>Repairs Complete</div>"; 
					break;
					case 10:
					 echo "<span class='statuss' id='check_list'>Working</div>"; 
					break;
					case 11:
					 echo "<span class='statuss' id='check_complete'>Working</div>"; 
					break;
					case 12:
					 echo "<span class='statuss' id='check_complete'>CUSTOMER COMMUNICATION</div>"; 
					break;
					case 13:
					 echo "<span class='statuss' id='check_complete'>AWAITING CONFIRMATION QUOTE</div>"; 
					break;
					case 14:
					 echo "<span class='statuss' id='check_complete'>WAITING FOR PARTS</div>"; 
					break;
					case 15:
					 echo "<span class='statuss' id='check_complete'>Waiting for password/pin</div>"; 
					break;
					case 16:
					 echo "<span class='statuss' id='check_complete'>Sent Samsung/Nokia warranty</div>"; 
					break;
					case 17:
					 echo "<span class='statuss' id='check_complete'>Received from Samsung/Nokia warranty</div>"; 
					break;
					case 18:
					 echo "<span class='statuss' id='check_complete'>Returned at Samsung/Nokia warranty</div>"; 
					break;
				}?> &nbsp;<br /> 
			</div>
		</div>
	</div>
</div>
<hr>
<hr>
<?php }
?>
<div class="clr"></div>
</div>
<div class="clr"></div>

<br />
<div class="invoice_details"> 
<hr>