<?php echo $this->Html->css(array('common/common','common/rounded','ui/ui.datepicker','ui/ui.base','themes/black_rose/ui' ,'module/'.Inflector::camelize($this->params['controller']).'/'.Inflector::singularize($this->params['action'])   )); ?> 
 
<?php echo $this->Html->css(array('common/grid'));
echo $this->Html->script(array('common/form','common/jquery.validate','module/'.Inflector::camelize($this->params['controller']).'/'.Inflector::singularize($this->params['action'])));
 ?>
 
 
<?php echo $this->Form->create('PosPurchaseReturn',array('controller'=>'PosPurchaseReturns','action'=>'full_return'));?>

<script language="javascript">
  	 $.validator.addMethod('lessThan', function(value, element, param) {
   		 var i = parseInt(value);
    		var j = parseInt($(param).val());
    		return i <= j;
		}, "Less Than");

	 $('#PosPurchaseReturnFullReturnForm').validate({
	 		 									rules: {
	 												 field: {number: true},
													 <?php foreach($purchasedetails as $key=>$purchasedetail){?>
													"data[PosPurchaseReturnDetail]<?php echo "[".$key."]"; ?>[quantity]": { 
													lessThan: "#PosPurchaseReturnDetail<?php echo $key ;?>Returnquantity" } ,
								 						 <?php }?>		
														} 
														
		 										 });
												 
												 
	  <?php foreach($purchasedetails as $key=>$purchasedetail){?>								 
	   $("#PosPurchaseReturnDetail<?php echo $key ;?>Quantity").keypress(function (e){
      if( e.which!=8 && e.which!=0 && (e.which<48 || e.which>57)){
    	return false;
      }
	 
});

 	$("#PosPurchaseReturnDetail<?php echo $key ;?>Quantity").blur(function() {
     			
				$(this).addClass( "required" );
		  		var ids= $(this).attr('class');
				var id= ids.split(' '); 
			 	var quantities = $(this).val();
			 	
				if($(this).hasClass("PosProductPosTypeClass")){
						 
							var popup_barcode_url=siteurl+"PosBarcodes/barcode_remove/"+id[2]+"/"+quantities+"/"+<?php echo $key ;?>;
							$("#invoice5").load(popup_barcode_url, [], function(){
							$("#invoice5").dialog("open");
							});
						//	alert("anwar");
				 
				 }
				 
		 
    });
   
 <?php }?>	
  
 
</script>
 
  <div class="flexigrid" style="width: 100%;" id="viewlist">
   <div class="bDiv" style="height: auto; width:607px; ">
  <div class="hDiv"> 
    <div class="hDivBox">
      <table cellpadding="0" cellspacing="0">
        <thead>
           <tr>
            <th align="left" ><div style=" width: 33px;"> ID </div></th>
			<th align="left" ><div style=" width: 118px;">Product Name</div></th>
			<th align="left" ><div style=" width: 65px;">P. Quantity</div></th>
		 	<th align="left" ><div style=" width: 62px;">S.Quantity</div></th>
			<th align="left" ><div style=" width: 80px;">Already Return</div></th>
			<th align="left" ><div style=" width: 145px;">Stock Available</div></th>
           </tr>
        </thead>
      </table>
    </div>
  </div>
    <table cellspacing="0" cellpadding="0" border="0" style="" class="flexme3">
      <tbody>
	  <?php
	   $i = 0; 
			foreach($purchasedetails as $key=>$purchasedetail){
					//pr($key);
		 		$class = null;
				if ($i++ % 2 == 0) {
					$class = ' class="altrow"';
				}
		?>
		<?php  //pr($saledetail);?>
         <tr id="<?php echo 'row_'.$purchasedetail['PosPurchase']['id'];  ?>" <?php echo $class;?> >
    		     <td align="right"><div style="text-align: left; width: 36px;">
		 	 <?php echo $purchasedetail['PosPurchaseDetail']['id']; ?></div>
	  	<?php echo $this->Form->input("PosPurchaseReturnDetail.".$key.".pos_purchase_id", array('div'=>false,'type' => 'text', 'value' => $purchasedetail['PosPurchaseDetail']['pos_purchase_id'], 'hidden' => true, 'label' => false)); ?>
			 </td>
                <?php echo $this->Form->input("PosPurchaseReturnDetail.".$key.".pos_purchase_detail_id", array('div'=>false,'type' => 'text', 'value' => $purchasedetail['PosPurchaseDetail']['id'], 'hidden' => true, 'label' => false)); ?>
                  <?php echo $this->Form->input("PosPurchaseReturnDetail.".$key.".pos_supplier_id", array('div'=>false,'type' => 'text', 'value' => $purchasedetail['PosPurchase']['pos_supplier_id'], 'hidden' => true, 'label' => false)); ?>
                <?php //pr($productdetail);?>
				 <td align="right">
                <div style="text-align: left; width: 120px;">
				<?php echo $this->Form->input("PosPurchaseReturnDetail.".$key.".pos_product_id", array('type' => 'text','div'=>false, 'value' => $purchasedetail['PosPurchaseDetail']['pos_product_id'], 'hidden' => true, 'label' => false)); ?>
				
				<?php echo $purchasedetail['PosProduct']['name']; ?> </div></td>
			  	 <td align="left"><div style="text-align: left; width: 67px;"> <?php echo $purchasedetail['PosPurchaseDetail']['quantity'];?></div></td>
				 
				 <td align="left"><div style="text-align: left; width: 64px;">
				  <?php echo $this->Form->input("PosPurchaseReturnDetail.".$key.".StockQuantity", array('type' => 'text', 'value' =>$purchasedetail['PosStock']['quantity'],'hidden' => true,'div'=>false,'label' => false)); ?>
				 
				  <?php echo $purchasedetail['PosStock']['quantity'];?></div></td>
				 
				 
				  <?php 
				   $Totalreturn=0;
				   foreach($purchasedetail['PosPurchaseReturnDetail'] as $purchasedetai){
				   $Totalreturn = $Totalreturn +  $purchasedetai['quantity'];?>
				   <?php }
				   $returnremain=$purchasedetail['PosPurchaseDetail']['quantity']-$Totalreturn;
	 			   ?>
		   		 <td align="left"><div style="text-align: left; width: 83px;">
                 <?php echo $this->Form->input("PosPurchaseReturnDetail.".$key.".returnquantity", array('type' => 'text', 'value' =>$returnremain, 'hidden' => true,'div'=>false,'label' => false)); ?>
                  <?php echo $Totalreturn;?></div></td>
				  <?php 
				 	 $type_id = null;
				  if($purchasedetail['PosProduct']['pos_type_id'] == 1)
				  	 {
				  
				  			$type_id="PosProductPosTypeClass ".$purchasedetail['PosPurchaseDetail']['pos_product_id'];
			 		 }
				  
				  ?>
				  
             	 <td align="right"><div style="text-align: left; width: 148px;">
			 <?php echo $this->Form->input("PosPurchaseReturnDetail.".$key.".quantity",array('class'=>"purchase_return_class ".$type_id,'value' =>'','div'=>false,'label'=>false,'title'=>'In Stock '.$purchasedetail['PosProduct']['in_stock']));?>
			 <?php  
			 echo $this->Form->input("PosPurchaseReturnDetail.".$key.".price", array('div'=>false,'type' => 'text', 'value' => $purchasedetail['PosPurchaseDetail']['price'], 'hidden' => true, 'label' => false));
			 ?>
			
  </div>
  
<span class="barcode_<?php echo $purchasedetail['PosPurchaseDetail']['pos_product_id'];?>"></span>
  
  </td>
  </tr>
		 <?php }?>
        </tbody>
    </table>
  </div>
</div>
<div class="button_area">
		<?php echo $this->Form->button('Save',array( 'class'=>'submit', 'id'=>'btn_possalesfullReturn'));?>
		<?php echo $this->Form->button('Cancel',array('type'=>'reset','name'=>'reset','id'=>'Cancel'));?>
		<?php echo $this->Form->end();?>
</div>
<style type="text/css">
.purchase_return_class{
	width:145px !important;}
.input text{
	display:none;}
</style>