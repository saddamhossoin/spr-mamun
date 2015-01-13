<div class="posSuppliers form">
<?php echo $this->Form->create('PosSupplier');?>
<?php	echo $this->Form->input('PosSupplier.id',array('div'=>false,'label'=>false,'class'=>'required'));?>
	<fieldset>
		<legend> </legend>
		 
		<div id="left">
		<div id="WrapperPosSupplierName" class="microcontroll">
		<?php	echo $this->Form->label('PosSupplier.name', __('Name'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('PosSupplier.name',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperPosSupplierContactname" class="microcontroll">
		<?php	echo $this->Form->label('PosSupplier.contactname', __('Contact Name'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('PosSupplier.contactname',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>
 
		<div id="WrapperPosSupplierAddress" class="microcontroll">
		<?php	echo $this->Form->label('PosSupplier.address', __('Address'.':<span class=star>&nbsp;</span>', true) );?>
		<?php	echo $this->Form->input('PosSupplier.address',array('div'=>false,'label'=>false,'class'=>''));?>
		</div>

		<div id="WrapperPosSupplierMobile" class="microcontroll">
		<?php	echo $this->Form->label('PosSupplier.mobile', __('Mobile'.':<span class=star></span>', true) );?>
		<?php	echo $this->Form->input('PosSupplier.mobile',array('div'=>false,'label'=>false,'class'=>''));?>
		</div>

		<div id="WrapperPosSupplierEmail" class="microcontroll">
		<?php	echo $this->Form->label('PosSupplier.email', __('Email'.':<span class=star>*&nbsp;</span>', true) );?>
		<?php	echo $this->Form->input('PosSupplier.email',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>
		</div>
		<div id="right">
		<div id="WrapperPosSuppliersSkype" class="microcontroll">
		<?php	echo $this->Form->label('PosSupplier.skype', __('Skype'.':<span class=star>&nbsp;</span>', true) );?>
		<?php	echo $this->Form->input('PosSupplier.skype',array('div'=>false,'label'=>false,'class'=>''));?>
		</div>

		<div id="WrapperPosSupplierWebsite" class="microcontroll">
		<?php	echo $this->Form->label('PosSupplier.website', __('Website'.':<span class=star></span>', true) );?>
		<?php	echo $this->Form->input('PosSupplier.website',array('div'=>false,'label'=>false,'class'=>''));?>
		</div>

		<div id="WrapperPosSupplierTelephone" class="microcontroll">
		<?php	echo $this->Form->label('PosSupplier.telephone', __('TelePhone'.':<span class=star>&nbsp;</span>', true) );?>
		<?php	echo $this->Form->input('PosSupplier.telephone',array('type'=>'text','div'=>false,'label'=>false,'class'=>''));?>
		</div>
		
		<div id="WrapperPosSuppliersSkype" class="microcontroll">
		<?php	echo $this->Form->label('PosSupplier.iva', __('P.IVA'.':<span class=star>*&nbsp;</span>', true) );?>
		<?php	echo $this->Form->input('PosSupplier.iva',array('type'=>'text','div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperPosSupplierWebsite" class="microcontroll">
		<?php	echo $this->Form->label('PosSupplier.fax', __('Fax'.':<span class=star></span>', true) );?>
		<?php	echo $this->Form->input('PosSupplier.fax',array('div'=>false,'label'=>false,'class'=>''));?>
		</div>

		<div id="WrapperPosSupplierTelephone" class="microcontroll">
		<?php	echo $this->Form->label('PosSupplier.note', __('Note'.':<span class=star>&nbsp;</span>', true) );?>
		<?php	echo $this->Form->input('PosSupplier.note',array('type'=>'textarea','div'=>false,'label'=>false,'class'=>''));?>
		</div>
		</div>
	 
	</fieldset>
<div class="button_area">
		<?php echo $this->Form->button('Update',array( 'class'=>'submit', 'id'=>'btn_PosSupplier_edit'));?>
		<?php echo $this->Form->button('Cancel',array('type'=>'reset','name'=>'reset','id'=>'Cancel'));?>
		<?php echo $this->Form->end();?>
</div>
</div>
 

