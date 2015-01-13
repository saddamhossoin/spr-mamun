<?php echo $this->Html->script(array('alert/alert')); ?>
<?php echo $this->Html->css(array('alert/css/alert','alert/themes/default/theme')); ?>
<div class="Barcodes ">

<div class="barcode_print_btn">
<?php echo $this->Form->button('Generate',array('class'=>'', 'id'=>'barcode_generate_purchase'));?>
<?php echo $this->Form->button('Print',array('class'=>'', 'id'=>'barcode_print'));?>
</div>

<?php echo $this->Form->create('PosBarcode');?>
 <?php	echo $this->Form->input("PosBarcode.product_id",array('type'=>'hidden','value'=>$productid,'div'=>false,'label'=>false,'class'=>'required'));?>			
	<fieldset>
		<legend> </legend>
		<?php  for($i=1;$i<=$quantities;$i++){?>
	 	<div id="WrapperBarcodeBarcode" class="microcontroll">
			<?php	echo $this->Form->label("PosBarcode.".$i.".barcode", __('Barcode - '.$i.':<span class=star>*</span>', true) );?>
			<?php	echo $this->Form->input("PosBarcode.".$i.".barcode",array('div'=>false,'label'=>false,'class'=>"required solid_product_barcode solid_prodct_check".$i.""));?>
		</div>
		
		<?php } ?>
		
 	</fieldset>
<div class="button_area" id="barcode_button">
		<?php echo $this->Form->button('Save',array( 'class'=>'submit', 'id'=>'btn_Barcode_add'));?>
		<?php echo $this->Form->button('Cancel',array('type'=>'reset','name'=>'reset','id'=>'CancelBtnBarcode'));?>
		<?php echo $this->Form->end();?>
</div>
</div>
 

<style type="text/css">
.barcode_print_btn{
	margin-bottom: 10px;
    margin-left: 227px;
	}
#PosBarcodeBarcodeForm{
	width:400px;
	}
#barcode_button {
     margin-left: 105px !important;
    }
</style>

 <script type="text/javascript">
/*
 jQuery(function($){ 
 //======================= Start Add Script =====================				
 	   	$("#btn_Barcode_add").on('click',function( e ){
			e.preventDefault();
			var serial_b = 0;
		 if( $('#PosBarcodeBarcodeForm').valid()) 
		  { 
		        var p_id_for_b = $("#PosBarcodeBarcodeForm #PosBarcodeProductId").val();
		        addToGrid();
				$(".barcode_"+p_id_for_b).html('');  
		  	 	$('.solid_product_barcode').each(function(index , value){
 					
					var barcode_val = $(this).val();	
  					$(".barcode_"+p_id_for_b).append("<input type='hidden' value='"+barcode_val+"' id='PosBarcodeBarcode_"+serial_b+"' name='data[PosPurchaseDetail]["+p_id_for_b+"][PosBarcode]["+serial_b+"]'>");
						serial_b ++;
  				});
				
				$("#invoice2").dialog("close");
							 
		  }
  
	 });
	 
 $("#CancelBtnBarcode").on('click',function(){
	 	 $("#PosProductQuantity").val('');
		 $("#invoice2").dialog("close");
 });
 $(".ui-dialog-titlebar-close").on('click',function(){
		 	 $("#PosProductQuantity").val('');
				 
				 
				
	  });
	 
 });*/
	 
 
</script> 


<script type="text/javascript">

 jQuery(function($){ 
 
  //======================= Barcode Generate Purchase ===============
 $('#barcode_generate_purchase').click(function(e){
 	        e.preventDefault();

			var pro_id =$("#PosProductName option:selected").val();
			var quantity =$("#PosProductQuantity").val();
 			
			  $.ajax({
				type: "GET",
				url:siteurl+"Barcodes/purchase_barcode/"+pro_id+"/"+quantity ,
				success: function(viewText,response){
				
			 //alert(viewText);
				 
 					var barcode = JSON.parse(viewText);
 					$.each( barcode , function( index, value ) {
 						 $("#PosBarcode"+index+"Barcode").val(value);
					});
					
					
 				}
		});
			
 	});
	
	 //======================= Barcode Generate Purchase ===============
	 
	 
	 //======================Barcode Print pop up============//
	 var dialogOptstempleteGeneralList1 = {
		title:'Barcode Print',
		autoOpen: false,
		height: 350,
		width: 400,
		modal: true,
		draggable:true,
 	    ////close: CloseFunction,
	  dialogClass: 'objectdetailsdialog',
	};
	$("#invoice5").dialog(dialogOptstempleteGeneralList1);
	
	
	$('#barcode_print').click(function(e){
		 	e.preventDefault(); 
			
			
		    var product_id =$("#PosProductName option:selected").val();
			var barcode =$("#PosBarcode1Barcode").val();
			//alert(product_id);
			
			 $.ajax({
				type: "GET",
				url:siteurl+"Barcodes/barcode_print_purchase/"+barcode,
				success: function(viewText,response){
					$("#invoice5").html(viewText);
 					$("#invoice5").dialog("open");
 				}
			});
 		});
			 
	
	
	//=======================Barcode Print pop up==========//
	 
	 
	
 //======================= Start Add Script =====================				
 	   	$("#btn_Barcode_add").on('click',function( e ){
			e.preventDefault();
			var serial_b = 0;
		 if( $('#PosBarcodeBarcodeForm').valid()) 
		  { 
		        var p_id_for_b = $("#PosBarcodeBarcodeForm #PosBarcodeProductId").val();
				var Quantity= $("#PosProductQuantity").val();
				//alert(Quantity);
		        addToGrid(Quantity);
				$(".barcode_"+p_id_for_b).html('');  
		  	 	$('.solid_product_barcode').each(function(index , value){
 					var barcode_val = $(this).val();	
  					$(".barcode_"+p_id_for_b).append("<input type='hidden' value='"+barcode_val+"' id='PosBarcodeBarcode_"+serial_b+"' name='data[PosPurchaseDetail]["+p_id_for_b+"][PosBarcode]["+serial_b+"]'>");
						serial_b ++;
  				});
				
				$("#invoice2").dialog("close");
		 	  }
  		 });
	 
		 $("#CancelBtnBarcode").on('click',function(){
				 $("#PosProductQuantity").val('');
				 $("#invoice2").dialog("close");
		 });
		 
 		$(".barcode_generate_dialog .ui-dialog-titlebar-close").on('click',function(){
		 	 $("#PosProductQuantity").val('');
	    });
	  
	 	var product_val;
	  
	  <?php  for($i=1;$i<=$quantities;$i++){?>
		$(".solid_prodct_check<?php echo $i;?>").blur(function() {
		 	 
			 if($(this).val() != ''){
				var ids= $(this).attr('id');
	  			product_val =$(this).val();
			  	 if(duplicate(product_val,ids)){
						  $(this).val('');
						  $.alert.open('warning', 'This Barcode Already Taken');
						 
			 	 } 
				
		 	else{
			  	
				$.ajax({
					type: "GET",
					url:siteurl+"PosBarcodes/DuplicateBarcodeCheck/"+$(this).val(),
			  		success: function(response){
					 	  if(response == 1){
						  		 $("#"+ids).val('');
							     $.alert.open('warning', 'This Barcode Already Stocked');
							   	
 						   }
							  
					 	}
					});
			 	
				}
			 
			 }
	 			
	 	});
		<?php } ?>

	 
 });
  var duplicate_check;
  var name_id;
 function duplicate(duplicate_check = null,name_id= null){
 		var flag=0;
 		$('.solid_product_barcode').each(function(index) {
			 	 //alert(duplicate_check+"==="+$(this).val());
		 	 	if(	$(this).attr('id') != name_id){
			 		 if($(this).val() == duplicate_check)
						{
				 		    flag = 1;
				 	    }
			 		}
	  
	  	});	
		
		if(flag == 1){
		  	return true;
		}
		else{
			return false;
		}
		
 
 }
	  
</script>

