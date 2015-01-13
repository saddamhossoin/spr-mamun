<div class="posSupplierLedgers">
<?php echo $this->Form->create('PosSupplierLedger');?>
<?php echo $this->Form->input('PosSupplierLedger.id');?>
		
	<fieldset id="posSupplierLedgers_add_field">
		<legend> </legend>
	<?php  echo $this->Form->input('PosSupplierLedger.pos_supplier_id',array('type'=>'hidden','div'=>false,'label'=>false)); ?> 
    <div id="WrapperPosSupplierLedgerPayamount" class="microcontroll">
		<?php	echo $this->Form->label('PosSupplierLedger.payamount', __('Payamount'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('PosSupplierLedger.payamount',array('div'=>false,'label'=>false,'class'=>'required'));?>
	</div>
	<div id="WrapperPosSupplierLedgerNote" class="microcontroll">
		<?php	echo $this->Form->label('PosSupplierLedger.note', __('Note'.':<span class=star></span>', true) );?>
		<?php	echo $this->Form->input('PosSupplierLedger.note',array('type'=>'textarea','div'=>false,'label'=>false,'class'=>''));?>
		</div>	
 
	</fieldset>
<div class="button_area">
		<?php echo $this->Form->button('Save',array( 'class'=>'submit', 'id'=>'btn_PosSupplierLedger_edit'));?>
		<?php echo $this->Form->button('Cancel',array('type'=>'reset','name'=>'reset','id'=>'Cancel'));?>
		<?php echo $this->Form->end();?>
</div>
</div>
<?php  echo $this->Html->script(array('common/form','common/jquery.validate'));  
 echo $this->Html->script(array('module/PosSupplierLedgers/edit'));  ?>
<style type="text/css">
#PosSupplierLedgerAddForm{
	width:320px;
	}
#posSupplierLedgers_add_field{
	padding-bottom:50px;
	}
#PosSupplierLedgerNote{
width: 210px; height: 64px;
}
</style>
<script type="text/javascript">
	$("#PosSupplierLedgerPayamount").keypress(function (e){
      if( e.which!=8 && e.which!=0 && (e.which<48 || e.which>57)){
    	return false;
      }
});	
</script>




 




