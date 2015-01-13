<div class="PurchaseReturnAdjustments form">
<?php echo $this->Form->create('PurchaseReturnAdjustment');?>
	<fieldset>
		<legend> </legend>
		<div id="WrapperServiceDeviceAcessoryServiceDeviceInfoId" class="microcontroll">
		
		<div id="WrapperUserfirstname" class="microcontroll">
        <?php echo $this->Form->label('PurchaseReturnAdjustment.pay_type', __('Pay Type'.': <span class="star">*</span>', true) ); ?>
        <?php 
		$pay_type=array('1'=>'Cash','2'=>'Purchase');
		
		 echo $this->Form->select('PurchaseReturnAdjustment.pay_type',  $pay_type  ,array('div'=>false,'label'=>false, 'empty'=>'-- Please Select Pay Type --'));?>
     </div>
	 <div id="WrapperPurchaseReturnAdjustment" class="microcontroll">
	 
		<?php	echo $this->Form->label('PurchaseReturnAdjustment.purchase_id', __('Purchase ID'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('PurchaseReturnAdjustment.purchase_id',array('type'=>'text','div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperServiceDeviceAcessoryServiceAcessoryId" class="microcontroll">
		<?php	echo $this->Form->label('PurchaseReturnAdjustment.purchase_return_id', __('Return ID'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('PurchaseReturnAdjustment.purchase_return_id',array('type'=>'text','div'=>false,'label'=>false,'class'=>'required'));?>
        <?php	echo $this->Form->input('PurchaseReturnAdjustment.pos_supplier_id',array('div'=>false,'label'=>false,'class'=>'','type'=>'hidden','value'=>2));?>
 		</div>
		
		<div id="WrapperServiceDeviceAcessoryServiceAcessoryId" class="microcontroll">
		<?php	echo $this->Form->label('PurchaseReturnAdjustment.return_amount', __('Returnable Amount'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('PurchaseReturnAdjustment.return_amount',array('div'=>false,'label'=>false,'class'=>'required','type'=>'text'));?>
		</div>

        <div id="WrapperServiceDeviceAcessoryServiceAcessoryId" class="microcontroll">
		<?php	echo $this->Form->label('PurchaseReturnAdjustment.recive_amount', __('Recive Amount'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('PurchaseReturnAdjustment.recive_amount',array('div'=>false,'label'=>false,'class'=>'required','type'=>'text'));?>
		</div>

		
		<div id="WrapperServiceDeviceAcessoryServiceAcessoryId" class="microcontroll">
		<?php	echo $this->Form->label('PurchaseReturnAdjustment.note', __('Note'.':<span class=star> </span>', true) );?>
		<?php	echo $this->Form->input('PurchaseReturnAdjustment.note',array('div'=>false,'label'=>false,'class'=>' '));?>
		</div>


	</fieldset>
<div class="button_area">
		<?php echo $this->Form->button('Save',array( 'class'=>'submit', 'id'=>'btn_PurchaseReturnAdjustment_add'));?>
		<?php echo $this->Form->button('Cancel',array('type'=>'reset','name'=>'reset','id'=>'Cancel'));?>
		<?php echo $this->Form->end();?>
</div>
</div>
 




