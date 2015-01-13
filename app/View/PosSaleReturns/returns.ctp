<?php echo $this->Html->script(array('common/form','common/jquery.validate'));?>
<?php  
$return_total=0;
//pr($salesReturnsDetails);
if(!empty($salesReturnsDetails)){
  foreach ($salesReturnsDetails as $val){
     $return_total=$val['PosSaleReturn']['quantity']+$return_total;
  } 
  
}
$returnremain=$salesDetails['PosSaleDetail']['quantity']-$return_total;

?>

<script language="javascript">
	 
	 $.validator.addMethod('lessThan', function(value, element, param) {
   		 var i = parseInt(value);
    		var j = parseInt($(param).val());
    		return i <= j;
		}, "Less Than");
	 
	 $('#PosSaleReturnAddForm').validate({rules: {
	 											 field: {number: true},
												 "data[PosSaleReturn][quantity]":
												  {	 lessThan: "#PosSaleReturnReturnquantity" }
												  },
										messages: {
 												"data[PosSaleReturn][quantity]": "Minimum Confidence",},
						 });
						 
	 	$("#PosSaleReturnQuantity").keypress(function (e){
      if( e.which!=8 && e.which!=0 && (e.which<48 || e.which>57)){
    	return false;
      }
});			 
						 
	  
</script>
<table width="100%" border="1" class="info_tables_rd">
  <tr>
    <td width="12%" class="info_tables_td_bold">ID</td>
    <td width="2%">:</td>
    <td width="20%"><?php echo $salesDetails['PosSaleDetail']['id'];?></td>
    
    <td class="info_tables_td_bold">Product </td>
    <td>:</td>
    <td><?php echo $salesDetails['PosProduct']['name']."   ";?></td>
    
    
  </tr>
  <tr>
    
   <td width="10%" class="info_tables_td_bold">Name</td>
   <td width="2%">:</td>
   <td width="40%"><?php echo $posCustomers[$salesDetails['PosSale']['pos_customer_id']]."   ";?></td>
   
   <td class="info_tables_td_bold">Quantity</td>
   <td>:</td>
   <td><?php echo $salesDetails['PosSaleDetail']['quantity'];?></td>
 </tr>
 
 
</table>
<div class="clr"></div>
<table width="100%" border="1" class="info_tables_salesreturns">
 
  <tr>
    <td width="14%" class="info_tables_td_bold">Product Return</td>
    <td width="2%">:</td>
    <td width="40%"><?php  echo $return_total; ?></td>
  </tr>
  
</table>

<?php echo $this->Form->create('PosSaleReturn',array('controller'=>'pos_sale_returns','action'=>'add'));?>
<div class="posquantiy">
 <?php echo $this->Form->input('PosSaleReturn.pos_sale_detail_id', array('type' => 'text', 'value' => $id, 'hidden' => true, 'label' => false)); ?>
 <?php echo $this->Form->input('PosSaleReturn.pos_sale_id', array('type' => 'text', 'value' => $salesDetails['PosSale']['id'], 'hidden' => true, 'label' => false)); ?>
 <?php echo $this->Form->input('PosSaleReturn.pos_customer_id', array('type' => 'text', 'value' => $salesDetails['PosSale']['pos_customer_id'], 'hidden' => true, 'label' => false)); ?>
 <?php echo $this->Form->input('PosSaleReturn.pos_product_id', array('type' => 'text', 'value' =>$salesDetails['PosSaleDetail']['pos_product_id'], 'hidden' => true, 'label' => false)); ?>
 <?php echo $this->Form->input('PosSaleReturn.returnquantity', array('type' => 'text', 'value' =>$returnremain, 'hidden' => true, 'label' => false)); ?>
 
 <div id="WrapperPosSaleReturnQuantity" class="microcontroll">
  <?php	echo $this->Form->label('PosSaleReturn.quantity', __('Quantity'.':<span class=star>*</span>', true) );?>
  <?php	echo $this->Form->input('PosSaleReturn.quantity',array('div'=>false,'label'=>false,'class'=>'required'));?>
</div> 

<div class="button_area">
  <?php echo $this->Form->button('Save',array( 'class'=>'submit', 'id'=>'btn_Posreturns'));?>
  <?php echo $this->Form->button('Cancel',array('type'=>'reset','name'=>'reset','id'=>'Cancel'));?>
</div>
<?php echo $this->Form->end();?>
</div>