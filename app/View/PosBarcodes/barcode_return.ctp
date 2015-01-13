<?php echo $this->Html->css(array('common/grid'));?>
<div class="flexigrid" style="width: 100%;">
 
<?php echo $this->Form->input('PosBarcode.pos_sale_detail_id',array('type'=>'hidden','value'=>$sale_detail_id,'div'=>false,'label'=>false,'class'=>'')); 
	echo $this->Form->input('PosBarcode.quantity',array('type'=>'hidden','value'=>$quantiy,'div'=>false,'label'=>false,'class'=>'')); 
	
?>

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
  		 		<?php	 echo  $this->requestAction("PosBarcodes/ProductBaseBarcodeReturn/yes/".$sale_detail_id, array("return"));?>
	  
	  </tbody>
     </table>
    </div>
    
    
    
 </div>
 
 <script type="text/javascript">
 jQuery(function($){ 
 //=================== Start Searching Inventory Product ========================
 	/*
  
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

	*/	
		
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
 </style>