     
       
<div class="saveOrders form">
<?php echo $this->Form->create('SaveOrder');?>
	<fieldset>
		<legend> </legend>
		<div id="WrapperSaveOrderId" class="microcontroll">
		<?php	echo $this->Form->label('SaveOrder.id', __('Id'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('SaveOrder.id',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperSaveOrderFirstName" class="microcontroll">
		<?php	echo $this->Form->label('SaveOrder.first_name', __('First Name'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('SaveOrder.first_name',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperSaveOrderLastName" class="microcontroll">
		<?php	echo $this->Form->label('SaveOrder.last_name', __('Last Name'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('SaveOrder.last_name',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperSaveOrderEmail" class="microcontroll">
		<?php	echo $this->Form->label('SaveOrder.email', __('Email'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('SaveOrder.email',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperSaveOrderPhone" class="microcontroll">
		<?php	echo $this->Form->label('SaveOrder.phone', __('Phone'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('SaveOrder.phone',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperSaveOrderBillingAddress" class="microcontroll">
		<?php	echo $this->Form->label('SaveOrder.billing_address', __('Billing Address'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('SaveOrder.billing_address',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperSaveOrderBillingAddress2" class="microcontroll">
		<?php	echo $this->Form->label('SaveOrder.billing_address2', __('Billing Address2'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('SaveOrder.billing_address2',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperSaveOrderBillingCity" class="microcontroll">
		<?php	echo $this->Form->label('SaveOrder.billing_city', __('Billing City'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('SaveOrder.billing_city',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperSaveOrderBillingZip" class="microcontroll">
		<?php	echo $this->Form->label('SaveOrder.billing_zip', __('Billing Zip'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('SaveOrder.billing_zip',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperSaveOrderBillingState" class="microcontroll">
		<?php	echo $this->Form->label('SaveOrder.billing_state', __('Billing State'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('SaveOrder.billing_state',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperSaveOrderBillingCountry" class="microcontroll">
		<?php	echo $this->Form->label('SaveOrder.billing_country', __('Billing Country'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('SaveOrder.billing_country',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperSaveOrderShippingAddress" class="microcontroll">
		<?php	echo $this->Form->label('SaveOrder.shipping_address', __('Shipping Address'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('SaveOrder.shipping_address',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperSaveOrderShippingAddress2" class="microcontroll">
		<?php	echo $this->Form->label('SaveOrder.shipping_address2', __('Shipping Address2'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('SaveOrder.shipping_address2',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperSaveOrderShippingCity" class="microcontroll">
		<?php	echo $this->Form->label('SaveOrder.shipping_city', __('Shipping City'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('SaveOrder.shipping_city',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperSaveOrderShippingZip" class="microcontroll">
		<?php	echo $this->Form->label('SaveOrder.shipping_zip', __('Shipping Zip'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('SaveOrder.shipping_zip',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperSaveOrderShippingState" class="microcontroll">
		<?php	echo $this->Form->label('SaveOrder.shipping_state', __('Shipping State'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('SaveOrder.shipping_state',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperSaveOrderShippingCountry" class="microcontroll">
		<?php	echo $this->Form->label('SaveOrder.shipping_country', __('Shipping Country'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('SaveOrder.shipping_country',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperSaveOrderWeight" class="microcontroll">
		<?php	echo $this->Form->label('SaveOrder.weight', __('Weight'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('SaveOrder.weight',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperSaveOrderOrderItemCount" class="microcontroll">
		<?php	echo $this->Form->label('SaveOrder.order_item_count', __('Order Item Count'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('SaveOrder.order_item_count',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperSaveOrderSubtotal" class="microcontroll">
		<?php	echo $this->Form->label('SaveOrder.subtotal', __('Subtotal'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('SaveOrder.subtotal',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperSaveOrderTax" class="microcontroll">
		<?php	echo $this->Form->label('SaveOrder.tax', __('Tax'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('SaveOrder.tax',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperSaveOrderShipping" class="microcontroll">
		<?php	echo $this->Form->label('SaveOrder.shipping', __('Shipping'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('SaveOrder.shipping',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperSaveOrderTotal" class="microcontroll">
		<?php	echo $this->Form->label('SaveOrder.total', __('Total'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('SaveOrder.total',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperSaveOrderOrderType" class="microcontroll">
		<?php	echo $this->Form->label('SaveOrder.order_type', __('Order Type'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('SaveOrder.order_type',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperSaveOrderAuthorization" class="microcontroll">
		<?php	echo $this->Form->label('SaveOrder.authorization', __('Authorization'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('SaveOrder.authorization',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperSaveOrderTransaction" class="microcontroll">
		<?php	echo $this->Form->label('SaveOrder.transaction', __('Transaction'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('SaveOrder.transaction',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperSaveOrderStatus" class="microcontroll">
		<?php	echo $this->Form->label('SaveOrder.status', __('Status'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('SaveOrder.status',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperSaveOrderIpAddress" class="microcontroll">
		<?php	echo $this->Form->label('SaveOrder.ip_address', __('Ip Address'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('SaveOrder.ip_address',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperSaveOrderCreatedBy" class="microcontroll">
		<?php	echo $this->Form->label('SaveOrder.created_by', __('Created By'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('SaveOrder.created_by',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperSaveOrderModifiedBy" class="microcontroll">
		<?php	echo $this->Form->label('SaveOrder.modified_by', __('Modified By'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('SaveOrder.modified_by',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

	</fieldset>
<div class="button_area">
		<?php echo $this->Form->button('Save',array( 'class'=>'submit', 'id'=>'btn_SaveOrder_edit'));?>
		<?php echo $this->Form->button('Cancel',array('type'=>'reset','name'=>'reset','id'=>'Cancel'));?>
		<?php echo $this->Form->end();?>
</div>
</div>
 




