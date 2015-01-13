<?php echo $this->Html->css(array('module/PosSuppliers/invoice','module/PosStocks/view'));?>
<?php  //pr($posStock);?>
<div class="posStocks view">
	<table cellpadding="0" cellspacing="0" class="view_table"><?php $i = 0; $class = ' class="altrow"';?>
		
		
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo __('Pos Product'); ?></td><td> : </td>
		<td>
			<?php echo $this->Html->link($posStock['PosProduct']['name'], array('controller' => 'pos_products', 'action' => 'view', $posStock['PosProduct']['id'])); ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo __('Quantity'); ?></td><td> : </td>
		<td >
			<?php echo $posStock['PosStock']['quantity']; ?>
			&nbsp;
		</td></tr>
	
		
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo __('Created By'); ?></td><td> : </td>
		<td >
			<?php echo $userlists[$posStock['PosProduct']['created_by']]; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo __('Modified By'); ?></td><td> : </td>
		<td >
			<?php echo $userlists[$posStock['PosProduct']['modified_by']]; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>	</table>


</div>

<!----------------Total Purchase start--------------------------->
<div style="height: auto;">
					<p>
						<table class="doctor_patient_list">
						    <h2 class="total_purchase_h2">Purchase</h2>
							<tr>
								<th >Purchase Date</th>
								 <th>Purchase ID</th>
								 <th>Manual Invoice No</th>
								<th >Supplier Name</th>
								<th >Quantity</th>
								<th >Amount</th>
                                <th >Total Price</th>
                                
							</tr>
                            <?php 
							 
		                     if(!empty($stock_purchases)){
							 foreach($stock_purchases as $stock_purchase){?>
							<tr> 
								<td><?php echo $stock_purchase['PosPurchase']['purchase_date'];?></td>
								<td><?php echo $stock_purchase['PosPurchase']['id'];?></td>
								<td><?php echo $stock_purchase['PosPurchase']['manual_invoice_id'];?></td>
								<td><?php echo $stock_purchase['PosPurchase']['PosSupplier']['name'];?></td>
								<td><?php echo $stock_purchase['PosPurchaseDetail']['quantity'];?></td>
								<td><?php echo $stock_purchase['PosPurchaseDetail']['price'];?></td>
								<td><?php echo $stock_purchase['PosPurchaseDetail']['totalprice'];?></td>

							</tr>
							
                            
                             <?php }
                                }else{
				                echo "<tr><td colspan='7' style='text-align:center;height:30px;color:red;font-size:18px;font-weight:bold'>There is no data</td></tr>";
			                     }?> 
						</table>
                        
                        
                        <div class="clr"></div>

					</p>
				</div>
                
                <!----------------Total Purchase end--------------------------->
                
                                 <!----------------Purchase Return History--------------------------->
<div style="height: auto;">
					<p>
						<table class="doctor_patient_list">
						    <h2 class="total_purchase_h2">Purchase Return History</h2>
							<tr>
								<th >Purchase Return Date</th>
								 <th>Purchase Return ID</th>
								<th >Product Name</th>
								<th >Quantity</th>
								<th >Price</th>
                                
							</tr>
                            <?php 
		                     if(!empty($purchase_returns)){
							 foreach($purchase_returns as $purchase_return){?>
							<tr> 
								<td><?php echo $purchase_return['PosPurchaseReturnDetail']['created'];?></td>
								<td><?php echo $purchase_return['PosPurchaseReturnDetail']['pos_purchase_return_id'];?></td>
								<td><?php echo $purchase_return['PosProduct']['name'];?></td>
								<td><?php echo $purchase_return['PosPurchaseReturnDetail']['quantity'];?></td>
								<td><?php echo $purchase_return['PosPurchaseReturnDetail']['price'];?></td>

							</tr>
							
                            
                             <?php }
                                }else{
				                echo "<tr><td colspan='6' style='text-align:center;height:30px;color:red;font-size:18px;font-weight:bold'>There is no data</td></tr>";
			                     }?> 
						</table>
                        
                        
                        <div class="clr"></div>

					</p>
				</div>
                
                <!----------------Purchase Return History-------------------------->
                

                
                
                <!------------------Total Sales start------------------------->
                
                <div style="height: auto;">
					<p>
						<table class="doctor_patient_list">
						    <h2 class="total_purchase_h2">Sales</h2>
							<tr>
								<th >Sales Date</th>
								 <th>Sales ID</th>
								<th >Customer Name</th>
								<th >Quantity</th>
								<th >Amount</th>
                                <th >Total Price</th>
                                
							</tr>
                            <?php 
		                     if(!empty($stock_sales)){
							 foreach($stock_sales as $stock_sale){
								 
								// pr($stock_sale);
								 ?>
							<tr> 
								<td><?php echo $stock_sale['PosSale']['created'];?></td>
								<td><?php echo $stock_sale['PosSale']['id'];?></td>
								<td><?php echo $stock_sale['PosSale']['PosCustomer']['name'];?></td>
								<td><?php echo $stock_sale['PosSaleDetail']['quantity'];?></td>
								<td><?php echo $stock_sale['PosSaleDetail']['price'];?></td>
								<td><?php echo $stock_sale['PosSaleDetail']['totalprice'];?></td>

							</tr>
							
                            
                             <?php }
                                }else{
				                echo "<tr><td colspan='6' style='text-align:center;height:30px;color:red;font-size:18px;font-weight:bold'>There is no data</td></tr>";
			                     }?> 
						</table>
                        
                        
                        <div class="clr"></div>

					</p>
				</div>
                <!-------------------Total Sales end------------------------>
                      
                <!------------------ Sales Return history------------------------->
                
                <div style="height: auto;">
					<p>
						<table class="doctor_patient_list">
						    <h2 class="total_purchase_h2">Sales Return History</h2>
							<tr>
								<th >Sales Return Date</th>
								 <th>Sales Return ID</th>
								<th >Product Name</th>
								<th >Quantity</th>
								<th >Price</th>
                               
                                
							</tr>
                            <?php 
		                     if(!empty($sales_returns)){
							 foreach($sales_returns as $sales_return){
								 
								
								 ?>
							<tr> 
								<td><?php echo $sales_return['PosSaleReturnDetail']['created'];?></td>
								<td><?php echo $sales_return['PosSaleReturnDetail']['pos_sale_return_id'];?></td>
                                <td><?php echo $sales_return['PosProduct']['name'];?></td>
								<td><?php echo $sales_return['PosSaleReturnDetail']['quantity'];?></td>
								<td><?php echo $sales_return['PosSaleReturnDetail']['price'];?></td>

							</tr>
							
                            
                             <?php }
                                }else{
				                echo "<tr><td colspan='6' style='text-align:center;height:30px;color:red;font-size:18px;font-weight:bold'>There is no data</td></tr>";
			                     }?> 
						</table>
                        
                        
                        <div class="clr"></div>

					</p>
				</div>
                <!-------------------Sales Return history------------------------>
                
                
                        