<?php //pr($comProducts);?> 
<div class="posProducts view">
	<table cellpadding="0" cellspacing="0" class="view_table"><?php $i = 0; $class = ' class="altrow"';?>
	<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo('Name'); ?></td><td> : </td>
		<td >
			<?php echo $posProduct['PosProduct']['name']; ?>
			&nbsp;
		</td></tr>
		<?php $i++;?>
        <tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo('Slug'); ?></td><td> : </td>
		<td >
			<?php echo $posProduct['PosProduct']['slug']; ?>
			&nbsp;
		</td></tr>
        <?php $i++;?>	
 	<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo('Brand'); ?></td><td> : </td>
		<td>
			<?php echo $this->Html->link($posProduct['PosBrand']['name'], array('controller' => 'pos_brands', 'action' => 'view', $posProduct['PosBrand']['id'])); ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo('Product Category'); ?></td><td> : </td>
		<td>
			<?php echo $this->Html->link($posProduct['PosPcategory']['name'], array('controller' => 'pos_pcategories', 'action' => 'view', $posProduct['PosPcategory']['id'])); ?>
			&nbsp;
		</td></tr>
 <?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo('Description'); ?></td><td> : </td>
		<td >
			<?php echo $posProduct['PosProduct']['description']; ?>
			&nbsp;
		</td></tr>

        </tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo('Type'); ?></td><td> : </td>
		<td >
			<?php echo $posProduct['PosType']['name']; ?>
			&nbsp;
		</td></tr>
        
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo('Stock'); ?></td><td> : </td>
		<td >
			<?php echo $posProduct['PosStock']['quantity']; ?>
			&nbsp;
		</td></tr>
		<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo('Purchase Price'); ?></td><td> : </td>
		<td >
			<?php echo $posProduct['PosProduct']['purchaseprice']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo('Sales Price'); ?></td><td> : </td>
		<td >
			<?php echo $posProduct['PosProduct']['salesprice']; ?>
			&nbsp;
		</td></tr>
 <?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo('Status'); ?></td><td> : </td>
		<td >
		<?php $status=array(1=>"In_Inventory",2=>"In_Service",3=>"Both");?>
	 	<?php echo $status[$posProduct['PosProduct']['status']]; ?>
			&nbsp;
		</td></tr>
        
        <?php $i++;
		if($posProduct['PosProduct']['pos_type_id'] != 1 ){
		?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo('Barcode'); ?></td><td> : </td>
		<td >
		 
	 	<?php echo  $posProduct['PosBarcode'][0]['barcode'] ; ?>
			&nbsp;
		</td></tr>
        
        
 <?php } $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo('Image'); ?></td><td> : </td>
		<td >
			<?php  
		echo $this->Html->image('../'.$posProduct['PosProduct']['image'], array("alt" => "None","width"=>"50" ,"height"=>"80"));
			?>
			&nbsp;
		</td></tr>
		
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo('Modified'); ?></td><td> : </td>
		<td >
			<?php echo $this->time->niceShort($posProduct['PosProduct']['modified']); ?>
			&nbsp;
		</td></tr>
 	 

<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo('Modified By'); ?></td><td> : </td>
		<td >
			<?php echo  $userlists[$posProduct['PosProduct']['modified_by']]; ?>
			&nbsp;
		</td></tr>
<?php $i++ ;  ?>	</table>
</div>
<?php if($posProduct['PosProduct']['pos_type_id'] == 1 ){
	
	?>
<div style="height: auto;" class="bDiv showDivCompatability">
		<div class="compatability_title"> Barcode</div>
 
  	 <table width="100%" cellspacing="0" cellpadding="0" border="0" class=" view_table">
	   <thead>
			<tr>
			<th width="100%">Barcode</th>
 			</tr>
	   </thead>
    <tbody class="gridCompatibilityList">
    <?php
	if(!empty($posProduct['PosBarcode'])){?>
		<tr><td><?php 
	 foreach($posProduct['PosBarcode'] as $key => $val){?>
    <?php echo $val['barcode'];?>,
    <?php }?></td>  </tr> <?php }else{
		echo '<tr><td>no data</td></tr>';
	}
	
	 ?>
    
    </tbody>
     </table>
     </div>
   <?php }
    
    if(!empty($posProduct['PosCompatibility'])){?>  
     
     <div style="height: auto;" class="bDiv showDivCompatability">
		<div class="compatability_title">Compitable</div>
 
  	 <table width="100%" cellspacing="0" cellpadding="0" border="0" class=" view_table">
	   <thead>
			<tr>
			<th width="46%">Product</th>
			<th width="15%">Category</th>
			<th width="15%">Brand</th>
            <th width="8%">P.Price</th>
            <th width="8%">S.Price</th>
            <th width="8%">Stock</th>
 			</tr>
	   </thead>
    <tbody class="gridCompatibilityList">
    <?php 
	
	foreach($posProduct['PosCompatibility'] as $key => $val){
		$productInfos =  $this->requestAction(array('controller' => 'PosProducts', 'action' => 'getProductInfo', $val['com_product_id'], 'return'));
		//pr($productInfos);
 		?>
        
    <tr id="PosCompatability_<?php echo $productInfos['PosProduct']['id'];?>">
    <td><?php echo $productInfos['PosProduct']['name'];?></td>
    <td><?php echo $productInfos['PosPcategory']['name'];?></td>
    <td><?php echo $productInfos['PosBrand']['name'];?> </td>
     <td><?php echo $productInfos['PosStock']['last_purchase'];?> </td>
      <td><?php echo $productInfos['PosStock']['last_sales'];?> </td>
       <td><?php echo $productInfos['PosStock']['quantity'];?> </td>
    
      
     </tr> 
    <?php }?>
    
     
    
    
    </tbody>
     </table>
     </div>
     <?php } 
	 if(!empty($posProduct['PosProductColor'])){?> 
      <div style="height: auto;" class="bDiv showDivCompatability">
		<div class="compatability_title"> Color</div>
 
  	 <table width="100%" cellspacing="0" cellpadding="0" border="0" class=" view_table">
	   <thead>
			<tr>
			<th >Color</th>
			 
 			</tr>
	   </thead>
    <tbody class="gridCompatibilityList">
    <?php foreach($posProduct['PosProductColor'] as $key => $val){
		 
 		?>
    <tr><td><?php echo $colors[$val['color_id']];?></td></tr> 
    <?php }?>
    
    </tbody>
     </table>
     </div>
     <?php }
     
	  if(!empty($comProducts)){?>
		  
      <div style="height: auto;" class="bDiv showDivCompatability">
		<div class="compatability_title">Compltable</div>
 
  	 <table width="100%" cellspacing="0" cellpadding="0" border="0" class=" view_table">
     <thead>
			<tr>
			<th width="46%">Product</th>
			<th width="15%">Category</th>
			<th width="15%">Brand</th>
            <th width="8%">P.Price</th>
            <th width="8%">S.Price</th>
            <th width="8%">Stock</th>
			 
 			</tr>
	   </thead>
       
     <tbody class="gridCompatibilityList">
    <?php foreach($comProducts as $productname){
 		
 		?>
    <tr>
    <td><?php echo $productname['PosProduct']['name'];?></td>
    <td><?php echo $productname['PosProduct']['PosBrand']['name'];?></td>
    <td><?php echo $productname['PosProduct']['PosPcategory']['name'];?></td>
     <td><?php echo $productname['PosProduct']['PosStock']['last_purchase'];?></td>
      <td><?php echo $productname['PosProduct']['PosStock']['last_sales'];?></td>
       <td><?php echo $productname['PosProduct']['PosStock']['quantity'];?></td>
    </tr> 
    <?php }?>
    
    </tbody>
     </table>
     </div>
    
      <?php }?> 
    
     
<style type="text/css">
.compatability_title{
	background: none repeat scroll 0 0 #F2F2F2;
    border: 1px dotted;
    font-weight: bold;
    padding: 10px 10px 10px 50px;
	width:94%;
}

</style>	 
	






<?php /* 
<div id="accordions">
		<?php 
		if(!empty($posSaleReturns)){
			foreach($posSaleReturns as $invoice){
				?>
				<?php //pr($posSaleReturns);?>
				<a class="selected">
					<ul class="header_ul">
                	    <li   style="text-align:center;width:160px;" ><?php echo $invoice['PosSale']['id'];?></li>
                        <li   style="text-align:center;width:165px;" ><?php echo $invoice['PosCustomer']['name'];?></li>
						<li style="width:175px;"><?php  echo $invoice['PosSale']['purchase_date']?>&nbsp;</li>
					 	<li   style="text-align:center;width:119px;" ><?php echo $invoice['PosSale']['totalprice'];?></li>
						<li  style="text-align:center;width:115px;"><?php echo $invoice['PosSale']['payamount'];?></li>
						<?php
						$dueamount=$invoice['PosSale']['totalprice']-$invoice['PosSale']['payamount'];
						?>     
						<li style="width:120px;"><?php echo $dueamount;?>&nbsp;</li>
                         <li  style="width:85px;"> 
        <span class="returnsfull" id="returns_<?php echo $invoice['PosSale']['id'];?>"> Return</span>
      					  </li>

					</ul>
				</a>
 <div style="height: auto;">
					<p>
						<table class="product_detail_list">
						 	<tr id="saledetailproduct">
								<th >Sl No.</th>
							 	<th>Product Name</th>
								<th >Category Name</th>
                                <th >Brand Name</th>
								<th >Quantity</th>
								<th >Price</th>
								<th >Total Price</th>
                                <th >Action</th>
							</tr>
							<?php foreach($invoice['PosSaleDetail'] as $Invoicelist){ ?>
							<tr> <?php //pr($Invoicelist);?>
								<td><?php echo $Invoicelist['id'];?></td>
							 	<td><?php echo $Invoicelist['PosProduct']['name'];?></td>
								<td><?php echo $Invoicelist['PosPcategory']['name'];?></td>
                                <td><?php echo $Invoicelist['PosBrand']['name'];?></td>
 								<td><?php echo $Invoicelist['quantity'];?></td>
								<td><?php echo $Invoicelist['price'];?></td>
								<td><?php echo $Invoicelist['totalprice'];?></td>
                                <td><?php echo $this->Html->link(__('Return', true), array('controller'=>'pos_sale_returns','action' => 'returns', $Invoicelist['id']), array('class'=>'action_link','id'=>'returninstock','title'=>'Returns')); ?></td>

							</tr>
 							<?php }?>
						</table>

					</p>
                    <?php if(!empty($invoice['PosSaleReturn'])){?>
                    <p>
						<table class="product_detail_list">
                        <tr><th id="returntitle" colspan="3">Returns Products</th></tr>
						 	<tr id="saledetailproduct">
								<th >Sl No.</th>
							 	<th>Product Name</th>
								<th >Quantity</th>
                                <th >Price</th>
								<th >Total Price</th>
                                <th >Returns Times</th>
                               <!-- <th >Action</th>-->
							</tr>
							<?php foreach($invoice['PosSaleReturn'] as $salereturn){ ?>
							<tr> 
								<td><?php echo $salereturn['PosSaleDetail']['id'];?></td>
							 	<td><?php echo $salereturn['PosProduct']['name'];?></td>
								<td><?php echo $salereturn['quantity'];?></td>
                               	<td><?php echo $salereturn['PosSaleDetail']['price'];?></td>
								<td><?php
								$totalprice=$salereturn['quantity']*$salereturn['PosSaleDetail']['price'];
								 echo $totalprice;?></td>
                                 <td><?php echo $time->niceshort($salereturn['created']);?></td>
                                <!--<td><?php //echo $this->Html->link(__('Return', true), array('controller'=>'pos_sale_returns','action' => 'returns', $Invoicelist['id']), array('class'=>'action_link','id'=>'returninstock','title'=>'Returns')); ?></td>-->
 							</tr>
 							<?php }?>
						</table>

					</p><?php }?>
                    
				</div>
				<?php }

			}else{
				echo "<span class='nodata'>There is no data</span>";
			}
			?> 
		</div>  */ ?>