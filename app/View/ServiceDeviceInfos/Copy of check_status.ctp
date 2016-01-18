<?php $status=array(1=>"Receive",2=>"Assesment",3=>"Confirmation",4=>"Servicing",5=>"Complete Servicing/ Testing",6=>"Awaiting for Delivery",7=>"Delivered"); ?>
<div class="shopping_cart">
 	<div class="shopping_cart_left">
    	<h3>Tracking</h3>
        <div style="margin-top: 10px; height: 45px;">
			<div id="logged_in"></div>
 		</div>
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
}?>      
          
           
    </div>
   	 
    <div class="clr"></div>
</div>


<?php echo $this->set('title_for_layout', 'TRACKING'); ?>
<?php echo $this->Html->css(array('module/Shop/cart','module/Shop/review')); ?>
<?php echo $this->Html->script(array('module/Shop/shop_review.js')); ?>

<div class="reviewtop"><h3>Order Review</h3>
<div class="btnconfirm" id="checkout_button">Order Confirm</div>
</div>
<div class="clr"></div>
<hr>
<?php echo $this->Form->create('Order'); ?>
<?php echo $this->Form->end(); ?>
<div class="row">
	<div class="col col-sm-4 info_div">
		<div class="panel panel-default">
			<div class="panel-heading panel-warning">
				<h3 class="panel-title">Customer Info</h3>
 			</div>
			<div class="panel-body">
				<span class="titlea">Name</span>: <?php echo $shop['Order']['first_name'];?><br />
				<span class="titlea">Email</span>: <?php echo $shop['Order']['email'];?><br />
				<span class="titlea">Phone</span>: <?php echo $shop['Order']['phone'];?><br />
                <span class="titlea">Payment</span>: <?php echo "&#8364; &nbsp;".$shop['Order']['payment_charge']; ?><br />
                <span class="titlea">Shipping</span>: <?php echo "&#8364; &nbsp;".$shop['Order']['shippingCost']; ?><br />
			</div>
		</div>
	</div>
	<div class="col col-sm-4 info_div">
		<div class="panel panel-default">
			<div class="panel-heading panel-warning">
				<h3 class="panel-title">Billing Address</h3>
			</div>
			<div class="panel-body">
				  <span class="titlea">Address</span>: <?php echo $shop['Order']['billing_address'];?> &nbsp; 
				 <?php echo $shop['Order']['billing_address2'];?><br />
				 <span class="titlea">City</span>: <?php echo $shop['Order']['billing_city'];?><br />
				 <span class="titlea">State</span>: <?php echo $shop['Order']['billing_state'];?><br />
				 <span class="titlea">Zip</span>: <?php echo $shop['Order']['billing_zip'];?><br />
				  <span class="titlea">Country</span>: <?php echo $shop['Order']['billing_country'];?>
			</div>
		</div>
	</div>
	<div class="col col-sm-4 info_div">
		<div class="panel panel-default">
			<div class="panel-heading panel-warning">
				<h3 class="panel-title">Shipping Address</h3>
			</div>
			<div class="panel-body">
				  <span class="titlea">Address</span>: <?php echo $shop['Order']['shipping_address'];?> &nbsp;<?php echo $shop['Order']['shipping_address2'];?><br />
				 <span class="titlea">City</span>: <?php echo $shop['Order']['shipping_city'];?><br />
				 <span class="titlea">State</span>: <?php echo $shop['Order']['shipping_state'];?><br />
				 <span class="titlea">Zip</span>: <?php echo $shop['Order']['shipping_zip'];?><br />
				 <span class="titlea">Country</span>: <?php echo $shop['Order']['shipping_country'];?>
			</div>
		</div>
	</div>
</div>

<hr>
<br />
<div class="invoice_details">
<div class="shopping_cart_left">
<table class="cart_grid ">
    <thead>
      <tr>
        <th width="12%" align="left">IMAGE</th>
        <th width="48%" align="left">PRODUCT</th>
        <th width="10%" class="quantity">PRICE</th>
        <th width="20%" class="quantity">QUANTITY</th>
        <th width="10%" class="totalas">TOTAL</th>
       </tr>
    </thead>
<tbody> 
<?php foreach ($shop['OrderItem'] as $item): ?>

    <tr class="" id="row-<?php echo $item['PosProduct']['id']?>"> 
        <td class="image v_top t_center">
            <div class="leftItem"> 
            <?php if(!empty($item['PosProduct']['image'])) {?>
                <div class="zoom">
                    <div class="small">
                    <?php  echo $this->Html->image('../'.$item['PosProduct']['image'], array("alt" => "No Image","border"=>"0" ));?>
                    </div>
                <div class="large">
                <?php  //echo $this->Html->image('../'.$item['PosProduct']['image'], array("alt" => "No Image","border"=>"0"  ));?>
                </div>
                </div>
            <?php }else{?>
            <?php  echo $this->Html->image('/img/wpage/noImage.jpg', array("alt" => "No Image","width"=>"78" ,"height"=>"58","border"=>"0"));  }?>
            </div>
        </td>

    <td id="name-25-244-3-1-98" class="details v_middle text_size13 t_left">
    <?php echo $item['PosProduct']['name'];?> 
    </td>
    <td class="quantity v_middle t_center" id="salesPrice_<?php echo $item['PosProduct']['id']?>">
    <?php echo $item['PosProduct']['salesprice'];?> 
    </td>
    <td class="v_middle t_center">
		<?php echo $item['quantity'];?>
    </td> 
    <td id="itemtotal_<?php echo $item['PosProduct']['id']?>" class="itemtotalprice">
    	<?php echo $item['quantity'] *  $item['price']; ?>
    </td>
  </tr>
  

<?php endforeach; ?>
</tbody>
</table>
</div>


<div class="invoice_summary shopping_cart_right"> 
<div class="orderSummary">ORDER SUMMARY</div>
 <div class="totalItem summary">Total Quantity  <span>&#8364; &nbsp;</><span class="quantityTotal"><?php echo $shop['Order']['quantity'];?></span></div>
        <div class="summary">Subtotal  <span>&#8364; &nbsp;</><span class="subTotal"><?php echo $shop['Order']['subtotal'];?></span></div>
        <div class="summary">Shipping  <span>&#8364; &nbsp;</><span class="shippingamount"><?php echo $shop['Order']['shippingCost']; ?></span></div>
        <div class="summary" >Cash On Delivery  <span>&#8364; &nbsp;</><span class="cashondelivery"><?php  echo $shop['Order']['payment_charge']; ?></span></div>
        <div class="summary">Total  <span>&#8364; &nbsp;</><span class="Total"><?php echo $shop['Order']['total']+$shop['Order']['shippingCost']+$shop['Order']['payment_charge'];?></span></div>
        <br />
        <br />
     <div class="btnconfirm" id="checkout_button">Order Confirm </div>
     <br />
</div>

                <div class="clr"></div>

<hr>

