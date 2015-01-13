     
       
<div class="serviceInvoices form">
<?php echo $this->Form->create('ServiceInvoice');?>
	<fieldset>
		<legend> </legend>
		<div id="WrapperServiceInvoiceServiceDeviceInfoId" class="microcontroll">
		<?php	echo $this->Form->label('ServiceInvoice.service_device_info_id', __('Service Device Info '.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('ServiceInvoice.service_device_info_id',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperServiceInvoiceInventoryCount" class="microcontroll">
		<?php	echo $this->Form->label('ServiceInvoice.inventory_count', __('Inventory Count'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('ServiceInvoice.inventory_count',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperServiceInvoiceServiceCount" class="microcontroll">
		<?php	echo $this->Form->label('ServiceInvoice.service_count', __('Service Count'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('ServiceInvoice.service_count',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperServiceInvoiceInventoryTotal" class="microcontroll">
		<?php	echo $this->Form->label('ServiceInvoice.inventory_total', __('Inventory Total'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('ServiceInvoice.inventory_total',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperServiceInvoiceServiceTotal" class="microcontroll">
		<?php	echo $this->Form->label('ServiceInvoice.service_total', __('Service Total'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('ServiceInvoice.service_total',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperServiceInvoiceVat" class="microcontroll">
		<?php	echo $this->Form->label('ServiceInvoice.vat', __('Vat'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('ServiceInvoice.vat',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperServiceInvoiceDiscount" class="microcontroll">
		<?php	echo $this->Form->label('ServiceInvoice.discount', __('Discount'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('ServiceInvoice.discount',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperServiceInvoicePayableAmount" class="microcontroll">
		<?php	echo $this->Form->label('ServiceInvoice.payable_amount', __('Payable Amount'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('ServiceInvoice.payable_amount',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperServiceInvoicePayment" class="microcontroll">
		<?php	echo $this->Form->label('ServiceInvoice.payment', __('Payment'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('ServiceInvoice.payment',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperServiceInvoiceDue" class="microcontroll">
		<?php	echo $this->Form->label('ServiceInvoice.due', __('Due'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('ServiceInvoice.due',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>
   
   </fieldset>
<div class="button_area">
		<?php echo $this->Form->button('Save',array( 'class'=>'submit', 'id'=>'btn_ServiceInvoice_add'));?>
		<?php echo $this->Form->button('Cancel',array('type'=>'reset','name'=>'reset','id'=>'Cancel'));?>
		<?php echo $this->Form->end();?>
</div>
</div>
 




