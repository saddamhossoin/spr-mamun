<div class="posCustomers form">
<?php echo $this->Form->create('PosCustomer');?>
	<fieldset>
		<legend> </legend>
		 
	 <div id="left">
	  	<div id="WrapperPosCustomerName" class="microcontroll">
		<?php	echo $this->Form->label('PosCustomer.name', __('Name'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('PosCustomer.name',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperPosCustomerContactname" class="microcontroll">
		<?php	echo $this->Form->label('PosCustomer.contactname', __('Contact Name'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('PosCustomer.contactname',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperPosCustomerAddress" class="microcontroll">
		<?php	echo $this->Form->label('PosCustomer.address', __('Address'.':<span class=star>&nbsp;</span>', true) );?>
		<?php	echo $this->Form->input('PosCustomer.address',array('div'=>false,'type'=>'textarea','label'=>false,'class'=>''));?>
		</div>

		<div id="WrapperPosCustomerMobile" class="microcontroll">
		<?php	echo $this->Form->label('PosCustomer.mobile', __('Mobile'.':<span class=star></span>', true) );?>
		<?php	echo $this->Form->input('PosCustomer.mobile',array('div'=>false,'label'=>false,'class'=>''));?>
		</div>

		<div id="WrapperPosCustomerTnt" class="microcontroll">
		<?php	echo $this->Form->label('PosCustomer.tnt', __('Telephone'.':<span class=star></span>', true) );?>
		<?php	echo $this->Form->input('PosCustomer.tnt',array('div'=>false,'label'=>false,'class'=>''));?>
		</div>

		<div id="WrapperPosCustomerEmail" class="microcontroll">
		<?php	echo $this->Form->label('PosCustomer.email', __('Email'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('PosCustomer.email',array('div'=>false,'label'=>false,'class'=>'required'));?>
		<div class="clr"></div>
			<span id="duplicateMessage" style="display:none;">Email already exits. Please create another. </span>
		</div>
		
	</div>
		
	 	<div id="right">
		<div id="WrapperPosCustomerSkype" class="microcontroll">
		<?php	echo $this->Form->label('PosCustomer.skype', __('Skype'.':<span class=star>&nbsp;</span>', true) );?>
		<?php	echo $this->Form->input('PosCustomer.skype',array('div'=>false,'label'=>false,'class'=>''));?>
		</div>

		<div id="WrapperPosCustomerWebsite" class="microcontroll">
		<?php	echo $this->Form->label('PosCustomer.companyname', __('Company'.':<span class=star></span>', true) );?>
		<?php	echo $this->Form->input('PosCustomer.companyname',array('div'=>false,'label'=>false,'class'=>''));?>
		</div>
 
		<div id="WrapperPosCustomerSkype" class="microcontroll">
		<?php	echo $this->Form->label('PosCustomer.iva', __('P.IVA'.':<span class=star>&nbsp;</span>', true) );?>
		<?php	echo $this->Form->input('PosCustomer.iva',array('div'=>false,'label'=>false,'class'=>''));?>
		</div>

		<div id="WrapperPosCustomerWebsite" class="microcontroll">
		<?php	echo $this->Form->label('PosCustomer.fax', __('Fax'.':<span class=star></span>', true) );?>
		<?php	echo $this->Form->input('PosCustomer.fax',array('div'=>false,'label'=>false,'class'=>''));?>
		</div>

		<div id="WrapperPosCustomerTelephone" class="microcontroll">
		<?php	echo $this->Form->label('PosCustomer.note', __('Note'.':<span class=star>&nbsp;</span>', true) );?>
		<?php	echo $this->Form->input('PosCustomer.note',array('type'=>'textarea','div'=>false,'label'=>false,'class'=>''));?>
		</div>
		
		<?php $status=array(2=>"Whole Seller",3=>"Online",4=>"Desktop",5=>"Service");?>
	 	<div id="WrapperPosCustomerType" class="microcontroll">
			<?php	echo $this->Form->label('PosCustomer.customer_type', __('Customer Type'.':<span class=star>*&nbsp;</span>', true) );?>
             <?php  echo $this->Form->input('PosCustomer.customer_type',array('type'=>'select','options'=>$status,'div'=>false,'label'=>false,'class'=>'required select2as','empty'=>'--Select Type --'));    ?>
		</div>
		
		   
		
		
		</div>

	</fieldset>
<div class="button_area">
		<?php echo $this->Form->button('Save',array( 'class'=>'submit', 'id'=>'btn_PosCustomer_add'));?>
		<?php echo $this->Form->button('Cancel',array('type'=>'reset','name'=>'reset','id'=>'Cancel'));?>
		<?php echo $this->Form->end();?>
</div>
</div>
 


