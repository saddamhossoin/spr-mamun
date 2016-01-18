     
       
<div class="serviceGetAQuotes form">
<?php echo $this->Form->create('ServiceGetAQuote');?>
	<fieldset>
		<legend> </legend>
		<div id="WrapperServiceGetAQuoteId" class="microcontroll">
		<?php	echo $this->Form->label('ServiceGetAQuote.id', __('Id'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('ServiceGetAQuote.id',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperServiceGetAQuoteName" class="microcontroll">
		<?php	echo $this->Form->label('ServiceGetAQuote.name', __('Name'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('ServiceGetAQuote.name',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperServiceGetAQuoteAddress" class="microcontroll">
		<?php	echo $this->Form->label('ServiceGetAQuote.address', __('Address'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('ServiceGetAQuote.address',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperServiceGetAQuotePhone" class="microcontroll">
		<?php	echo $this->Form->label('ServiceGetAQuote.phone', __('Phone'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('ServiceGetAQuote.phone',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperServiceGetAQuoteEmail" class="microcontroll">
		<?php	echo $this->Form->label('ServiceGetAQuote.email', __('Email'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('ServiceGetAQuote.email',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperServiceGetAQuotePosBrandId" class="microcontroll">
		<?php	echo $this->Form->label('ServiceGetAQuote.pos_brand_id', __('Pos Brand Id'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('ServiceGetAQuote.pos_brand_id',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperServiceGetAQuotePosProduct" class="microcontroll">
		<?php	echo $this->Form->label('ServiceGetAQuote.pos_product', __('Pos Product'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('ServiceGetAQuote.pos_product',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperServiceGetAQuoteDescription" class="microcontroll">
		<?php	echo $this->Form->label('ServiceGetAQuote.description', __('Description'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('ServiceGetAQuote.description',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperServiceGetAQuoteStatus" class="microcontroll">
		<?php	echo $this->Form->label('ServiceGetAQuote.status', __('Status'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('ServiceGetAQuote.status',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperServiceGetAQuoteCreatedBy" class="microcontroll">
		<?php	echo $this->Form->label('ServiceGetAQuote.created_by', __('Created By'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('ServiceGetAQuote.created_by',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperServiceGetAQuoteModifiedBy" class="microcontroll">
		<?php	echo $this->Form->label('ServiceGetAQuote.modified_by', __('Modified By'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('ServiceGetAQuote.modified_by',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

	</fieldset>
<div class="button_area">
		<?php echo $this->Form->button('Save',array( 'class'=>'submit', 'id'=>'btn_ServiceGetAQuote_edit'));?>
		<?php echo $this->Form->button('Cancel',array('type'=>'reset','name'=>'reset','id'=>'Cancel'));?>
		<?php echo $this->Form->end();?>
</div>
</div>
 




