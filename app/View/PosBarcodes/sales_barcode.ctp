<?php echo $this->Html->css(array('common/grid'));?>
<div class="flexigrid" style="width: 100%;">
 <div class="tDiv">
  <div class="tDiv2">
   <?php echo $this->Form->create('PosBarcode',array('controller' => 'PosBarcodes','action'=>'index' ));?>
   <div id="WrapperServiceDefectName" class="microcontroll">
		<?php	echo $this->Form->label('PosBarcode.name', __('Barcode'.':', true) );?>
		<?php	echo $this->Form->input('PosBarcode.barcode',array('div'=>false,'label'=>false,'class'=>' '));
		 	echo $this->Form->input('PosBarcode.pos_product_id',array('type'=>'hidden','value'=>$id,'div'=>false,'label'=>false,'class'=>'')); 
			echo $this->Form->input('PosBarcode.quantity',array('type'=>'hidden','value'=>$quantiy,'div'=>false,'label'=>false,'class'=>'')); 
			  ?>
        <div class="button_area_filter">
       <?php echo $this->Form->button('Search',array( 'class'=>'submit', 'id'=>'btn_PosBarcode_search'));?>    
	   <?php echo $this->Form->button('Reset',array('type'=>'reset','name'=>'reset','id'=>'btn_PosBarcode_reset'));?>     
    </div>
 		</div>
     </form>
  </div>
  <div style="clear: both;"></div>
</div>

<div class="bDiv" style="height: auto;">
<div class="hDiv">
  <div class="hDivBox">
    <table cellspacing="0" cellpadding="0">
      <thead>
        <tr>
 			<th align="left" ><div style=" width: 100px;"><?php echo 'Barcode';?></div></th>
          <th align="left" ><div style=" width: 50px;" class="link_text"><?php echo 'Link';?></div></th>
        </tr>
      </thead>
    </table>
  </div>
</div>
 <table cellspacing="0" cellpadding="0" border="0" style="" class="flexme3">
      <tbody id="PosProductGrid">
   <?php
       if(isset($order)){
	   	    echo  $this->requestAction("PosBarcodes/ProductBaseBarcode/yes/".$id."/order", array("return"));    
	   }
	   else{
		    echo  $this->requestAction("PosBarcodes/ProductBaseBarcode/yes/".$id, array("return"));  
	   }
	   ?>
   
     </table>
    </div>
 </div>
 
 <script type="text/javascript">
 jQuery(function($){ 
 //=================== Start Searching Inventory Product ========================
  $("#btn_PosBarcode_search").on('click',function(e){
	  e.preventDefault();
	 	$('.ajax_status').fadeIn();
			$('.ajax-save-message').hide().fadeOut(); 
 			 var data= $('#PosBarcodeIndexForm').serialize();
			 $.ajax({
				type: "POST",
				url:siteurl+"PosBarcodes/ProductBaseBarcode/no/"+$('#PosBarcodePosProductId').val(),
				data:  data,
				success: function(response){
  						$('.ajax_status').hide(); 
						$("#PosProductGrid").html('');
						$("#PosProductGrid").html(response);
						 
 					 }
				}); 
  		});
		
	
  $("#btn_PosBarcode_reset").on('click',function(e){
	  e.preventDefault();
	 	$('.ajax_status').fadeIn();
			$('.ajax-save-message').hide().fadeOut(); 
  			 $.ajax({
				type: "GET",
				url:siteurl+"PosBarcodes/ProductBaseBarcode/yes/"+$('#PosBarcodePosProductId').val(),
 				success: function(response){
  						$('.ajax_status').hide(); 
						$("#PosProductGrid").html('');
						$("#PosProductGrid").html(response);
						 
 					 }
				}); 
  		});
		
		//=========================== End Searching Product ======================
		 
});
</script>
 <style>
 .microcontroll input[type="text"], .microcontroll input[type="number"] {
    width: 232px !important;
}
 #WrapperServiceDefectName .button_area_filter {
    display: inline !important;
    margin: 0 !important;
    padding: 0 !important;
}
.popup_add_link ,.popup_remove_link {
    background: url("../img/grid/title.gif") repeat-x scroll left bottom #FFFFFF;
    border: 1px solid #D7D7D7;
    border-radius: 5px;
    color: #036FAD;
    cursor: pointer;
    display: inline-block;
    float: right;
    font-size: 11px;
    font-weight: bold;
    padding: 3px 7px;
    position: relative;
}
.serviceDeviceInfos label{
	float:left !important;
}
#PosBarcodeBarcode{
	width:145px !important;
	}
	


#s2id_PosSaleAmountAccountHead{
    margin-left: 130px;
    margin-top: 7px;
    width: 160px;
	}
#s2id_PosSaleAmountIsTax{
	 margin-left: 70px;
    width: 160px;
	}
#PosSaleAmountPayamount{
	width:130px;
	}
#final_payment_submit{
	width:300px;
	margin-left:95px;
	}
#PosSaleAmountTotalprice,#PosSaleAmountTax,#PosSaleAmountDiscount,#PosSaleAmountPayableAmount,#PosSaleAmountPayamount{
	width:155px !important;
	}
#PosSaleAmountCheckNumber,#PosSaleAmountCheckDate{
	width:155px !important;
	}
	.microcontroll label{
	padding:0px !important;
     font-weight: none !important;
	float:left !important;
}

 </style>