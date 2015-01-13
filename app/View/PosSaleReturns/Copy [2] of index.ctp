 <?php echo $this->Html->script(array('common/jquery-ui-1.7.3.custom.min'));
  echo $this->Html->script(array('common/form','common/jquery.validate'));
  ?>
  
<div class="flexigrid" style="width: 100%;">
 <div class="mDiv">
  <div class="ftitle">
    <p> <?php echo $this->Paginator->counter(array(	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)	));	?> </p>
  </div>
  <div id="searchlink"> &nbsp;</div>
</div>

<div class="tDiv">
  <div class="tDiv2">
   <?php echo $this->Form->create('PosSaleReturn');?>
 
  <fieldset>
 	<div id="WrapperItemCode" class="microcontroll"> 
			<?php echo $this->Form->label('PosSaleReturn.id', __('Enter Sale ID :'.'<span class="star"></span>', true) ); ?> 
			<?php echo $this->Form->input('PosSale.id',array('type'=>'text','div'=>false,'label'=>false,'class'=>''));?> 
			 </div>
			  
             <div id="WrapperPosSaleReturnPosCustomerId" class="microcontroll">
		<?php	echo $this->Form->label('PosSaleReturn.pos_customer_id', __('Customer Id'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('PosSaleReturn.pos_customer_id',array('div'=>false,'label'=>false,'class'=>'required select2as','empty'=>'Select Customer'));?>
		</div>
          </fieldset>
	 
   <?php //echo $this->element('filter/commonfilter',array('cache' => array('time'=> '-7 days','key'=>'header')));?>
    <div class="button_area_filter">
     
      <?php echo $this->Form->button('Search',array( 'class'=>'submit', 'id'=>'btn_PosPurchaseReturn_add'));?>      <?php echo $this->Form->button('Reset',array('type'=>'reset','name'=>'reset','id'=>'Cancel', 'onClick'=>"parent.location='pos_sale_returns/index/yes'"));?>     
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
           
         		  <th width="160px" style="text-align:center;font-weight:bold"><?php echo "Sale Id"; ?></th>
                    <th width="160px" style="text-align:center;font-weight:bold"><?php echo "Customer Name"; ?></th>
                    <th width="175px" style="text-align:center;font-weight:bold"><?php echo "Sales Date"; ?></th>
                     <th width="115px" style="text-align:center;font-weight:bold"><?php echo "Total Price"; ?></th>
                    <th width="115px" style="text-align:center;font-weight:bold"><?php echo "Pay Amount"; ?></th> 
                    <th width="115px" style="text-align:center;font-weight:bold"><?php echo "Due Amount"; ?></th> 
			      
        </tr>
      </thead>
    </table>
  </div>
</div>
 <div class="clr"></div>
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
                                 <td><?php echo $this->time->niceshort($salereturn['created']);?></td>
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
		</div>
    </div>
    
    <div class="pDiv">
    <div class="pGroup">
     	 <?php if($this->params['paging']['PosSale']['prevPage']){?>
      <span class='paginate_link'><?php echo $paginator->first();?></span> <span class='paginate_link'><?php echo $this->Paginator->prev('< ' . __('Previous', true), array(), null, array('class'=>'disabled','id'=>'prev_id'));?></span>
      <?php }?>
      <?php echo $this->Paginator->numbers();?>
      <?php if($this->params['paging']['PosSale']['nextPage']){?>
      <span class='paginate_link'> <?php echo $this->Paginator->next(__('Next', true) . ' >', array(), null, array('class' => 'disabled','id'=>'next_id', 'span'=>false));?> </span> <span class='paginate_link'><?php echo $paginator->last();?></span>
      <?php }?>
    </div>
  </div>     
</div>
 


