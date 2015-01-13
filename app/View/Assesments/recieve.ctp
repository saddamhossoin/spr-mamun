 
<div id="is_email"><?php echo $this->Html->link(__('Send Email', true), array('action' => 'is_email', $serviceDeviceInfo['Assesment']['id']),array('class'=>' action_link_email','id'=> $serviceDeviceInfo['Assesment']['id'])); ?></div>
<div id="is_sms"><?php echo $this->Html->link(__('Send SMS', true), array('action' => 'is_email', $serviceDeviceInfo['Assesment']['id']),array('class'=>' action_link_sms')); ?></div>
 <br />
  
 
<div id="invoice" class="Print_content_areas"> 


 <?php 
 $data=$serviceDeviceInfo;
  if(!empty($serviceDeviceInfo)){ ?>
  <table class="" cellpadding="0"  border="0" width="100%">
 	<tr class="testlist_report altrow">
		<td class="left_part heading">Customer Name:<?php echo $data['User']['name'];?></td>
		<td class="right_part heading">Device : <span><?php echo $data['ServiceDevice']['name'];?>
		 </span></td>
    </tr>
	<tr class="testlist_report altrow">
		<td class="left_part heading">Email :<?php echo $data['User']['email_address'];?></td>
	  	<td class="right_part heading">Serial : <span>
		 <?php echo $data['ServiceDeviceInfo']['serial_no'];?></span></td>
   </tr>
	<tr class="testlist_report altrow">
	 	<td class="center_part heading">Mobile : <span><?php echo $data['User']['phone'];?></span></td>
		<td class="left_part heading">Recieve Date :  <span>
		<?php echo   date("j-n-Y H:i",strtotime($data['ServiceDeviceInfo']['recive_date']));?></span></td>
   </tr>
	<tr class="testlist_report altrow">
	 	<td class="center_part heading"><?php /*?>Mobile : <span><?php echo $data['User']['phone'];?></span><?php */?></td>
		<td class="right_part heading">Delivery Date : <span>
		<?php echo   date("j-n-Y H:i",strtotime($data['ServiceDeviceInfo']['estimated_date']));?></span></td>
   </tr>
	 
</table>
 
  <div class="report">
  
  	<div class="description_head">Description:</div>
   	<div class="description_details"><?php echo $data['ServiceDeviceInfo']['description']; ?> </div>
 	<div class="description_head">Defect Area:</div>
   	<div class="description_details">
	<p class="description_details">
        <?php
		//pr($data['ServiceDeviceDefect']);
 	if(!empty($data['ServiceDeviceDefect'])){
 		foreach($data['ServiceDeviceDefect'] as $defectlist){
    		echo $defectlist['ServiceDefect']['name'] ." , ";
			}
		}else{
 			echo 'Defect not mention!!!';
		}?>
      </p>
	  </div>
 	<div class="description_head">Accessories:</div>
   	<div class="description_details"><?php echo $data['ServiceDeviceInfo']['acessories']; ?> </div>
  	<?php 
	$assesmentInventories = $data['Assesment']['AssesmentInventory'];
	if(!empty($assesmentInventories)){?>
	<div class="description_head">Inventory:</div>
	
   	<div class="description_details">
		 <table cellspacing="0" cellpadding="0" border="0" style="" class=" view_table">
   <thead>
        <tr>
        <th width="27%">Product</th>
        <th width="33%">Brand--Category</th>
        <th width="15%">Quantity</th>
        <th width="10%">Price</th>
        <th width="15%">Item Total</th>
       
        </tr>
   </thead>
    <tbody>
	<?php
	 
  if(!empty($assesmentInventories)){
   		$i = 0;
		foreach ($assesmentInventories as $assesmentInventory):
 			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow inventory"';
			}
			else{
				$class = ' class="inventory"';
			}
			$productInfos =  $this->requestAction(array('controller' => 'PosProducts', 'action' => 'getProductInfo', $assesmentInventory['pos_product_id'], 'return'));
 	?>
		<tr <?php echo $class;?> id="AssesmentInventoryTr_<?php echo $assesmentInventory['id'];?>">
            <td> <?php echo $productInfos['PosProduct']['name']; ?></td>
            <td> <?php echo $productInfos['PosBrand']['name']."--".$productInfos['PosPcategory']['name']; ?></td>
            
            <td style="text-align:center"> <?php echo $assesmentInventory['quantity'];  ?></td>
            <td style="text-align:center"> <?php echo $assesmentInventory['price'];  ?></td>
            <td style="text-align:right" class="inventorytotalpriceli"> <?php echo $assesmentInventory['quantity'] * $assesmentInventory['price'];  ?></td>
 			 
	</tr>
<?php endforeach; ?>
</tbody>
<?php }?>
    </table> 
	</div>
	
	<?php }?>
	<?php 
	$assesmentServices = $serviceDeviceInfo['Assesment']['AssesmentService'];
	if(!empty($assesmentServices)){?>
	<div class="description_head">Service:</div>
   	<div class="description_details"> 
	<table cellspacing="0" cellpadding="0" border="0" style="" class=" view_table">
   <thead>
        <tr>
        <th width="27%">Service</th>
        <th width="33%"> Device </th>
		<th width="15%">Price</th>
		<th width="10%">Quantity</th>
		<th width="15%">Item Total</th>
        
        </tr>
   </thead>
    <tbody>
	<?php
  
  if(!empty($assesmentServices)){
  
 		$i = 0;
		foreach ($assesmentServices as $assesmentService):
 			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow assesmentservice"';
			}
			else{
				$class = ' class="assesmentservice"';
			}
  		 $serviceInfo =  $this->requestAction(array('controller' => 'ServiceServices', 'action' => 'getServiceInfo', $assesmentService['service_service_id'], 'return'));
  	?>
		<tr <?php echo $class;?> id="AssesmentServiceTr_<?php echo $assesmentService['id'];?>">
      <td> <?php echo $serviceInfo['ServiceService']['name']; ?></td>
      <td> <?php echo $serviceInfo['ServiceDevice']['name']; ?></td>
      <td style="text-align:center"> <?php echo $assesmentService['price']; ?></td>
      <td style="text-align:center"> <?php echo $assesmentService['quantity'];  ?></td>
      <td style="text-align:right" class="servicetotalpriceli"> <?php echo $assesmentService['quantity'] * $assesmentService['price'];  ?></td>
 			 
	</tr>
<?php endforeach; ?>
</tbody>
<?php }}?>
</table>
<table cellspacing="0" cellpadding="0" border="0" style="" class=" view_table">
<tbody>
  <tr class="testlist_report">
		<td>SUBTOTAL</td>
 		<td style="text-align:right"><?php 
			$amount=$serviceDeviceInfo['ServiceInvoice']['0']['inventory_total']+$serviceDeviceInfo['ServiceInvoice']['0']['service_total'];
			echo $amount;
	   ?>     
       </td>
	</tr>
	 <tr class="testlist_report">
   		 <td>TAX (<?php echo $tax;?> %) </td>
	 	 <td><?php  $tax=$serviceDeviceInfo['ServiceInvoice']['0']['vat'];
		echo $tax;
		  ?>
        </td>
	</tr>
	 <tr class="testlist_report">
	 	<td>TOTAL</td>
        <td> <?php echo $taxamount=$serviceDeviceInfo['ServiceInvoice']['0']['total'];
		?> </td>
	</tr>
	 <tr class="testlist_report">
	 	<td>DISCOUNT</td>
        <td> <?php  echo $discount=$serviceDeviceInfo['ServiceInvoice']['0']['discount'];?> </td>
	</tr>
	 <tr class="testlist_report">
	 	<td>PAID</td>
        <td>   <?php echo $payment=$serviceDeviceInfo['ServiceInvoice']['0']['payment']; ?>
        </td>
	</tr>
	 <tr class="testlist_report">
	 	<td>DUE</td>
        <td><?php echo $due=$serviceDeviceInfo['ServiceInvoice']['0']['due'];?>
        </td>
	</tr>
    </tbody>
  </table>
</div>
	 
</div>

<?php
	}else{ 
		echo "<span class='nodata'>There is no data</span>";
	}?>

</div>
<style type="text/css">


#is_email {
    margin-left: 499px;
    margin-top: -76px;
    position: absolute;
}
#is_sms {
    margin-left: 499px;
    margin-top: -100px;
    position: absolute;
}

.action_link_email,.action_link_sms {
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


  
.description_head{
	width:130px;
	float:left;
	font-weight:bold;
	font-size:11px;
 	 }
.description_details{
	padding:2px;
	font-size:11px; 
	}
	
.view_table {
    border: 1px solid #CCCCCC;
    width: 100%;
}
.view_table tr td:first-child {
    font-weight: bold;
    width:inherit !important;
}

.view_table tr th {
    font-family: Verdana,Arial,Helvetica,sans-serif;
    font-size: 11px;
    font-weight: bold;
    padding: 5px 5px 5px 8px;
}
.view_table thead tr th {
    text-align:left;
}
.view_table .testlist_report td:first-child{
 	width:75%;
}
.view_table .testlist_report td {
 	text-align:right;
}

</style> 


<script>
$(function() {
	$(document).ready(function() {

       $(".action_link_sms").click(function(e){
		 e.preventDefault();
		
			$.alert.open('warning', 'This Function is Underconstruction');
															
		});	
		
		
		$(".action_link_email").click(function(e){
			e.preventDefault();
			var vars = $(this).attr('id');
			//alert(vars);
			$.ajax({
					type: "GET",
					url: siteurl+'Assesments/is_email/'+vars,
					success: function(response){
						 alert(response);
						//window.location.reload(true);
						}
					 });
		 
			});	
	
	
		
		
	});	
});	
	
		
</script>

 

 



  