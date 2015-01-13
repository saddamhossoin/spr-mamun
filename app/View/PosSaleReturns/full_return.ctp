<?php echo $this->Html->css(array('common/common','common/rounded','themes/black_rose/ui' ,'module/'.Inflector::camelize($this->params['controller']).'/'.Inflector::singularize($this->params['action'])));  
 echo $this->Html->css(array('common/grid'));
 echo $this->Html->script(array('common/form','common/jquery.validate','module/'.Inflector::camelize($this->params['controller']).'/'.Inflector::singularize($this->params['action'])));
   echo $this->Html->script(array('alert/alert')); 
 echo $this->Html->css(array('alert/css/alert','alert/themes/default/theme'));  
 ?>
 <?php  //pr($saleInfo);?>
<div id="columns"> 
 <div id="PatientDetailsbox" class="widget color-blue" style="width:98%;" >
     <div class="widget-head" style="cursor: move;">
      <h3>Customer Details</h3>
    </div>
    <div class="widget-content" id="PatientDetailscontent">
    
<table class="invoicetop" cellpadding="0"  border="1" width="100%">
 	<tr>
		<td class="left_part heading">Sale Bill No :<?php echo $saleInfo['PosSale']['id'];?></td>
        <td class="center_part heading">Mobile : <span><?php echo $saleInfo['PosCustomer']['mobile'];?></span></td>
	</tr>
	<tr>
		<td class="left_part heading">Customer Name : <span>
		<?php echo $saleInfo['PosCustomer']['name'];?></span></td>
  	<td class="right_part heading">Invoice Date : <span>
		<?php echo   date("j-n-Y H:i",strtotime($saleInfo['PosSale']['created']));?></span></td>
	</tr>
    <tr><td colspan="4">&nbsp; </td></tr>
    <tr class="testlist_report">
	<td> <span class="accounts_infos">SUBTOTAL :</span>
		<?php
    		$amount=$saleInfo['PosSale']['totalprice'];
	    	echo $amount;
	   ?>     
     </td>
	 
    <td><span class="accounts_infos">TAX (<?php echo $tax; ?>%) :</span>
        <?php $peramount= $saleInfo['PosSale']['tax'];
			  echo $peramount;
		  ?>
        </td>
	</tr>
	 <tr class="testlist_report">
	 	<td><span class="accounts_infos">TOTAL :</span>
        <?php $taxamount=$peramount+$amount;
			echo $taxamount;
		?> </td>
	 
	 	<td><span class="accounts_infos">DISCOUNT :</span>
        <?php $payable_amount=$taxamount-$saleInfo['PosSale']['discount'];
			echo  $saleInfo['PosSale']['discount'];
		?> </td>
	</tr>
	 <tr class="testlist_report">
	 	<td><span class="accounts_infos">PAID</span>
	        <?php echo $saleInfo['PosSale']['payamount'];?>
        </td>
	 
	 	<td><span class="accounts_infos">DUE :</span>
        <?php echo $due= $saleInfo['PosSale']['payable_amount'] - $saleInfo['PosSale']['payamount'];?>
        </td>
	</tr>
</table>

<?php echo $this->Form->input('PosSaleReturn.hidden_tax_amount',array('type'=>'hidden','div'=>false,'label'=>false,'value'=> $tax));?> 
<?php echo $this->Form->input('PosSaleReturn.hidden_tax',array('type'=>'hidden','div'=>false,'label'=>false,'value'=> $peramount));?> 
<?php echo $this->Form->input('PosSaleReturn.hidden_subtotal',array('type'=>'hidden','div'=>false,'label'=>false,'value'=> $amount));?>
<?php echo $this->Form->input('PosSaleReturn.hidden_discount',array('type'=>'hidden','div'=>false,'label'=>false,'value'=> $saleInfo['PosSale']['discount']));?> 

</div>
<br />
 </div>
 
  <?php echo $this->Form->create('PosSaleReturn',array('controller'=>'PosSaleReturns','action'=>'full_return'));?>

  <div id="PatientDetailsbox" class="widget color-blue" style="width:68%;" >
     <div class="widget-head" style="cursor: move;">
      <h3>Item Details</h3>
    </div>
    <div class="widget-content" id="PatientDetailscontent">
   <div class="flexigrid" style="width: 100%;" id="viewlist">
   <div class="bDiv" style="height: auto; width="100%" ">
  <div class="hDiv"> 
    <div class="hDivBox">
      <table cellpadding="0" cellspacing="0" width="100%">
        <thead>
           <tr>
            <th align="left"><div style=" width: 33px;"> ID </div></th>
			<th align="left"><div style=" width: 118px;">Product Name</div></th>
			<th align="left"><div style=" width: 65px;">Sales Quantity</div></th> 
			<th align="left"><div style=" width: 65px;">Already Return</div></th> 
             <th align="left"><div style=" width: 80px;">S.Price/Quantity</div></th>
			<th align="left"><div style=" width: 100px;">Return</div></th>
            <th align="left"><div style=" width: 100px;">action</div></th>
           </tr>
        </thead>
      </table>
    </div>
  </div>
    <table cellspacing="0" cellpadding="0" border="0" style="" class="flexme3" >
      <tbody>
	  <?php
	   $i = 0; 
			foreach($saleInfo['PosSaleDetail'] as $key=>$Saledetail){
  		 		$class = null;
				if ($i++ % 2 == 0) {
					$class = ' class="altrow"';
				}
		?>
          <tr id="<?php echo 'row_'.$Saledetail['id'];  ?>" <?php echo $class;?> >
        <td align="right">
             <div style="text-align: left; width: 36px;">
                <?php echo $Saledetail['id']; ?>
            </div>
        </td>
        <td align="right">
            <div style="text-align: left; width: 120px;">
          	  <?php echo $this->Form->input("PosSaleReturnDetailPosProduct_.".$Saledetail['id'], array('type' => 'text','div'=>false, 'value' => $Saledetail['pos_product_id'], 'hidden' => true, 'label' => false)); ?>
           	 <span id="posProductName_<?php echo $Saledetail['id'];?>"><?php echo $Saledetail['PosProduct']['name']; ?></span>
            </div>
        </td>
        <td align="left">
        	<div style="text-align: left; width: 67px;">
            	<?php 
						echo $Saledetail ['quantity'];
				?>
                <?php 
						echo $this->Form->input("PPRDSaleQuantity_.".$Saledetail['id'], array('type' => 'text','div'=>false, 'value' => $Saledetail['quantity'], 'hidden' => true, 'label' => false));
				 ?>
            </div>
        </td>
		
		<td align="left">
        	<div style="text-align: left; width: 67px;">
            	<?php 
						echo $Saledetail ['sales_return_quantity'];
				?>
                <?php 
						echo $this->Form->input("PPRDSaleReturnQuantity_.".$Saledetail['id'], array('type' => 'text','div'=>false, 'value' => $Saledetail['sales_return_quantity'], 'hidden' => true, 'label' => false));
				 ?>
            </div>
        </td>
        
             <?php echo $this->Form->input("PPRDAlredyReturnQuantity_.".$Saledetail['id'], array('type' => 'text', 'value' =>$Saledetail['id'], 'hidden' => true,'div'=>false,'label' => false)); ?>
    
             
     
        <td align="left">
            <div style="text-align: left; width: 83px;">
            <?php 
            echo $this->Form->input("PPRDPrice_.".$Saledetail['id'], array('type' => 'text', 'value' =>$Saledetail['price'], 'hidden' => true,'div'=>false,'label' => false)); ?>
             <?php echo $Saledetail['price'];?>
            </div>
        </td>
		  
        <td align="right">
        <div style="text-align: left; width: 100px;">
            <?php echo $this->Form->input("PPRDetailQuantity_.".$Saledetail['id'],array('class'=>"purchase_return_class",'value' =>'','div'=>false,'label'=>false, 'title'=>'In Stock '.$Saledetail['PosProduct']['in_stock']));?>
         </div>
        
     </td>
        
                 <td align="right">
                  <?php 
					  $type_id = 0;
					 if($Saledetail['PosProduct']['pos_type_id'] == 1)
					 {
							 $type_id=1;
					 }
         		 ?>
                     <?php echo $this->Form->button('Return',array( 'class'=>'submit btnReturnSale', 'id'=>'btnReturnPurchase_'.$Saledetail ['id'],'title'=>$type_id));?>
                 </td>
			  </tr>
		 <?php }?>
         </tbody>
    </table>
  </div>
</div>
<br />

 <div class="widget-content">
      <div class="PatientDetails"> 
        <div id="" class="microcontroll">
          <div class="bDiv" style="height: auto;">
            <div class="hDiv">
              <div class="hDivBox">
                
                <table class="pdetail" width="100%">
                    <thead>
                        <th width="50px;" style="font-weight:bold"><?php echo "Sl no:"; ?></th>
                        <th width="202px" style="font-weight:bold"><?php echo "Product Name"; ?></th>
                        <th width="120px" style="font-weight:bold"><?php echo "Return Quantity"; ?></th>
                        <th width="120px" style="font-weight:bold"><?php echo "S.Prices"; ?></th>
                        <th width="100px" style="font-weight:bold"><?php echo "Total Price"; ?></th>
                        <th width="48px" style="font-weight:bold"><?php echo "Action"; ?></th>
                    </thead>
                    
                    <tbody class="productlist">
                    
                    </tbody>
                </table>
                  
              </div>
            </div>
          </div>
          <div class="clr"></div>
            </div>
      </div>
    </div>

</div>
 
</div>
  
 
  <div id="PatientDetailsbox" class="widget color-blue" style="width:27%;" >
     <div class="widget-head" style="cursor: move;">
      <h3>Item Details</h3>
    </div>
    <div class="widget-content" id="PatientDetailscontent">
    
		<div id="WrapperPosProductQuantity" class="microcontroll">
			<?php echo $this->Form->label('PosSaleReturn.product_amount', __('Product Amount'.': <span class="star">*</span>', true) ); ?> 
			<?php echo $this->Form->input('PosSaleReturn.product_amount',array('type'=>'text','readonly'=>true,'div'=>false,'label'=>false, 'size'=>26, 'class'=>'required ' ));?> 
		 </div>
		 
		
		 <div id="WrapperPosProductQuantity" class="microcontroll">
			<?php echo $this->Form->label('PosSaleReturn.tax', __('IVA'.': <span class="star">*</span>', true) ); ?> 
			<?php echo $this->Form->input('PosSaleReturn.tax',array('type'=>'text','readonly'=>true,'div'=>false,'label'=>false, 'size'=>26, 'class'=>'required ' ));?> 
		 </div>
		 
		 <div id="WrapperPosProductQuantity" class="microcontroll">
			<?php echo $this->Form->label('PosSaleReturn.discount', __('Discount'.': <span class="star">*</span>', true) ); ?> 
			<?php echo $this->Form->input('PosSaleReturn.discount',array('type'=>'text','readonly'=>true,'div'=>false,'label'=>false, 'size'=>26, 'class'=>'required ' ));?> 
		 </div>
    
     <div id="WrapperPosProductQuantity" class="microcontroll">
      <?php echo $this->Form->input('PosSaleReturn.pos_sale_id',array('type'=>'hidden','div'=>false,'label'=>false,'value'=> $saleInfo['PosSale']['id']));?>
      <?php echo $this->Form->input('PosSaleReturn.pos_customer_id',array('type'=>'hidden','div'=>false,'label'=>false,'value'=> $saleInfo['PosCustomer']['id']));?> 
	   			<?php echo $this->Form->label('PosSaleReturn.total_price', __('Return Total'.': <span class="star">*</span>', true) ); ?>
                <?php echo $this->Form->input('PosSaleReturn.total_price',array('readonly'=>'readonly','type'=>'text','div'=>false,'label'=>false, 'size'=>26, 'class'=>'' ));?> 
            </div>
            
      
     
     <div id="WrapperPosProductQuantity" class="microcontroll">
    <?php echo $this->Form->label('PosSaleReturn.return_amount', __('Return Amount'.': <span class="star">*</span>', true) ); ?> 
    <?php echo $this->Form->input('PosSaleReturn.return_amount',array('type'=>'text','div'=>false,'label'=>false, 'size'=>26, 'class'=>'required ' ));?> 
     </div>
     
     <div id="WrapperPosProductQuantity" class="microcontroll">
    <?php echo $this->Form->label('PosSaleReturn.note', __('Note'.': <span class="star"></span>', true) ); ?> 
    <?php echo $this->Form->input('PosSaleReturn.note',array('type'=>'textarea','div'=>false,'label'=>false, 'size'=>26, 'class'=>' ' ));?> 
    </div>
    
     </div>
     </div>    
	    
  <div class="clr"></div>
  <div class="button_area">
  <?php echo $this->Form->button('Save',array( 'class'=>'submit', 'id'=>'btn_possalesfullReturn','type'=>'submit'));?>
  <?php echo $this->Form->button('Cancel',array('type'=>'reset','name'=>'reset','id'=>'Cancel'));?>

</div>


<?php echo $this->Form->end();?>
<style type="text/css">
.purchase_return_class{
	width:90px !important;
	
}
.input text{
	display:none;
}
.accounts_infos{
	float:left;
	display:inline-block;
	width:150px;
	font-size:11px;
}
</style>


<script language="javascript">

 
   <?php /*?> foreach($saleInfo['PosSaleDetail']  as $key=>$Saledetail){?>								 
	   $("#PPRDetailQuantity_<?php echo $Saledetail['id'] ;?>").keypress(function (e){
		  if( e.which!=8 && e.which!=0 && (e.which<48 || e.which>57)){
			return false;
		  }
 	});

 	$("#PPRDetailQuantity_<?php echo $Saledetail['id'] ;?>").blur(function() {
     			
				$(this).addClass( "required" );
		  		var ids= $(this).attr('class');
				var id= ids.split(' '); 
			 	var quantities = $(this).val();
			 	
				if($(this).hasClass("PosProductPosTypeClass")){
						 
							var popup_barcode_url=siteurl+"PosBarcodes/barcode_remove/"+id[2]+"/"+quantities+"/"+<?php echo $Saledetail['id'] ;?>;
							$("#invoice5").load(popup_barcode_url, [], function(){
							$("#invoice5").dialog("open");
							});
						//	alert("anwar");
				 
				 }
				 
		 
    });
   
 <?php }*/?>	
        </script>
 