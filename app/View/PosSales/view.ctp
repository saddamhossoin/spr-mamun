<?php //pr($posSale);?>
<html>
<head>
<title>Report For SPR</title>
 
 </head>
 
 	<body>
		<div class="full_div_report_wrapper">
			<div class="sec_div_wrapper">
				<span class='Print_Button'><span class='print_img'>&nbsp;&nbsp;</span> &nbsp;Print</span>

                <div class="top_section_sl">
                    <div class="top_section_sl_left">Fattura</div>
                      <div class="top_section_sl_right"><?php echo sprintf('%06d', $posSale['PosSale']['fattura_no']);?></div>
                </div>
                <div style="clear:both;"></div>

                <div class="customer_info_p">
                      <div><?php echo $posSale['PosCustomer']['name'];?>&nbsp;</div>
                      <div><?php echo $posSale['PosCustomer']['contactname'];?>&nbsp;</div>
                      <div><?php echo $posSale['PosCustomer']['companyname'];?>&nbsp;</div>
                      <div><?php echo $posSale['PosCustomer']['iva'];?>&nbsp;</div>
                      <div><?php echo $posSale['PosCustomer']['address'];?>&nbsp;</div>
                      <div><?php echo $posSale['PosCustomer']['email'];?>&nbsp;</div>
                      <div><?php echo $posSale['PosCustomer']['tnt'];?>&nbsp;</div>
                </div>

                <div class="customer_invoice_p">
                      <div class="customer_invoice_first_div">
					  		<?php echo date("j-n-Y",strtotime($posSale['PosSale']['created']));?>&nbsp;
                      </div>
                      <div><?php echo $posSale['PosSale']['id'];?>&nbsp;</div>
                      <div>
					  	<?php if($posSale['PosCustomerLedger'][0]['account_head_id'] !=3){ echo 'Bank';}
						  		else{echo $accountsheads[$posSale['PosCustomerLedger'][0]['account_head_id']];}?>&nbsp;
                      </div>
                      <div><?php echo 'Stati pagamento';?>&nbsp;</div>
                </div>
     			<div style="clear:both;"></div>

                <div class="full_data_div">
               	 <div class="table-bordered">
               			 <?php 
               				 $slno = 1;
               				 foreach($posSale['PosSaleDetail'] as $saledetail){?>
               				 <div class="top_sales_detail">
               						<div style="width:30px;"><?php echo $slno;?></div>
                                    <div style="width:470px;"><?php echo $saledetail['PosProduct']['name'];
                                    if(!empty($saledetail['PosBarcode'])){
                                    echo "<div class='barcodesDiv'>Barcode: ";
                                    foreach($saledetail['PosBarcode'] as $barcode)
                                    {   
                                    echo "<span class='barcodes'>".$barcode['barcode']."</span> , ";
                                    }
                                    }?></div> 
                                    <div class="txt_center" style="width:60px;"><?php echo $saledetail['quantity'];?></div> 
                                     <div class="txt_center" style="width:60px;"><?php echo $saledetail['price'];?></div> 
                                    <div class="txt_center" style="width:60px;"><?php echo $saledetail['totalprice'];;?></div> 
                                
              					 
                                  </div> <?php $slno ++;}?>
                                  <div style="clear:both;"></div>
              		 </div>
                     
                </div>
                
                <div style="clear:both;"></div>
               
                   
                    <div class="invoice_summary_body">
                    <div class="invoice_summary"><?php $amount=$posSale['PosSale']['totalprice'];    echo $amount;   ?></div>
                    <div class="invoice_summary"><?php $peramount= $posSale['PosSale']['tax'];	  echo $peramount;  ?></div>
                     <div class="invoice_summary"><?php echo '';  ?></div>
                    <div class="invoice_summary"> <?php echo '';?> </div>
                    <div class="invoice_summary"> <?php echo  $posSale['PosSale']['discount'];?></div>
                     <div class="invoice_summary"> 
					 <?php $payable_amount=(($amount+$peramount)-$posSale['PosSale']['discount']);  echo  $payable_amount;?>
                    </div>
                    <div class="invoice_summary"><?php echo $posSale['PosSale']['payamount'];?></div>
                   
                    </div>
                     <div class="due_note">  <?php $due=$payable_amount-$posSale['PosSale']['payamount'];   if(!empty($due)){echo "Due : ".$due;}?> &nbsp;</div>
                    <div style="clear:both;"></div>
                </div>
<style>
.table-bordered{
	height:553px;
	margin-top:36px;
	margin-left:11px;
}
.top_sales_detail div{
	height:17px;
	float:left;
	font-size:10px;
}
.full_data_div{
	float:left;
	margin-left:24px;
}
.due_note{
	width:510px;
	float:left;
	padding-left:70px;
	padding-top:3px;
}	
.invoice_summary_body{
	float:right;
	width:24px;
}
.invoice_summary{
	padding-bottom:3px;
	height:14px;
}	
.customer_invoice_p{
 	 font-size: 11px !important;
    margin-bottom: 5px;
    margin-top: 37px;
}
.customer_invoice_p div{
	float:left;
	width:140px;
	text-align:center;
}
.customer_invoice_first_div{
	margin-left:25px;
	width:70px !important;
}	
.txt_center{
	text-align:center;
}
.full_div_report_wrapper{
	width:720px !important;
	height:842px !important;
}
.top_section_sl{
	 width:595px !important;
	 height:27px !important;
	 margin-top:9px;
	 
 }
.top_section_sl_left{
	float:left;
	width:200px;
	padding-left:45px;
}
div.customer_info_p{
 	margin-left:98px;
	font-size:11px !important;
	margin-top:55px;
}
div.customer_info_p div{
	margin-bottom:10px;
	line-height:14px;
}
</style>
		</div>
	</body>
</html>



<div style="background:#fff; clear:both;color:#000000; margin-top:25px;" >
  <?php //echo $this->element('sql_dump'); ?>
</div>
<script type="text/javascript" >
	$(function(){
	 $(".Print_Button").on('click',function(e){
		 $('.Print_Button').html('');
		 Popup($("#invoice").html());
		$('.Print_Button').html("<span class='print_img'>&nbsp;&nbsp;</span> &nbsp;Print");
	 });
    });
	 
jQuery(function($){ 
 $(".ui-dialog-titlebar-close").on('click',function(){
		 		window.location.reload();
				 $('#Cancel').click();
			 	 $("#PosSaleAddForm").trigger('reset');
				 $("#PosSaleAmountAddForm").trigger('reset');
				
	  });
	  });
	 
</script>
