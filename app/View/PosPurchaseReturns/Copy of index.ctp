<div class="flexigrid" style="width: 100%;">
 <div class="mDiv">
  <div class="ftitle">
    <p> <?php echo $this->Paginator->counter(array(	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%')	));	?> </p>
  </div>
  <div id="searchlink"> &nbsp;</div>
</div>

<div class="tDiv">
  <div class="tDiv2">
   <?php echo $this->Form->create('PosPurchaseReturn');?>
 
  <fieldset>
 	<div id="WrapperItemCode" class="microcontroll"> 
		<?php echo $this->Form->label('PosPurchaseReturn.id', __('Enter Purchase ID :'.'<span class="star"></span>', true) ); ?> 
		<?php echo $this->Form->input('PosPurchaseReturn.pos_purchase_id',array('type'=>'text','div'=>false,'label'=>false,'class'=>''));?> 
	</div>
			  
             <div id="WrapperPosPurchaseReturnPosSupplierId" class="microcontroll">
		<?php	echo $this->Form->label('PosPurchaseReturn.pos_supplier_id', __('Supplier '.':<span class=star></span>', true) );?>
	 	<?php  //$status=array(1=>'Not Sold',2=>'Sold');	
				echo $this->Form->Select('PosPurchaseReturn.pos_supplier_id',$posSupplier,array('class'=>'select2as ','type'=>'text','div'=>false,'empty'=>'- Select Supplier -','label'=>false ));?>
		
		</div>
          </fieldset>
	 
   <?php //echo $this->element('filter/commonfilter',array('cache' => array('time'=> '-7 days','key'=>'header')));?>
   <span id="report" style="cursor:pointer;"> Report </span>
    <div class="button_area_filter">
     
      <?php echo $this->Form->button('Search',array( 'class'=>'submit', 'id'=>'btn_PosPurchaseReturn_add'));?>     
	  <?php echo $this->Form->button('Reset',array('type'=>'reset','name'=>'reset','id'=>'Cancel', 'onClick'=>"parent.location='pos_sale_returns/index/yes'"));?>     
    </div>
   
	<?php echo $this->Form->end();?>
  </div>
  <div style="clear: both;"></div>
</div>

<div class="bDiv" style="height: auto;">
<div class="hDiv">
  <div class="hDivBox">
    <table cellspacing="0" cellpadding="0">
      <thead>
        <tr> 
					<th width="110px" style="text-align:center;font-weight:bold"><?php echo "Purchase Id"; ?></th>
                    <th width="160px" style="text-align:center;font-weight:bold"><?php echo "Supplier Name"; ?></th>
                    <th width="145px" style="text-align:center;font-weight:bold"><?php echo "Purchase Date"; ?></th>
                    <th width="115px" style="text-align:center;font-weight:bold"><?php echo "Total Price"; ?></th>
                    <th width="115px" style="text-align:center;font-weight:bold"><?php echo "Pay Amount"; ?></th> 
                    <th width="115px" style="text-align:center;font-weight:bold"><?php echo "Due Amount"; ?></th> 
			       <th width="100px" style="text-align:center;font-weight:bold"><?php echo "Link"; ?></th> 
			      
        </tr>
      </thead>
    </table>
  </div>
</div>
 <div class="clr"></div>
 		<?php 
		
		if(!empty($posPurchaseReturns)){
	 		foreach($posPurchaseReturns as $invoice){
			
				?>
			 	<a class="selected">
					<ul class="header_ul">
                	    <li   style="text-align:center;width:124px;" ><?php echo $invoice['PosPurchase']['id'];?></li>
                        <li   style="text-align:center;width:211px;" ><?php echo $invoice['PosSupplier']['name'];?></li>
						<li style="width:192px;"><?php  echo $invoice['PosPurchase']['purchase_date']?>&nbsp;</li>
					 	<li   style="text-align:center;width:155px;" ><?php echo $invoice['PosPurchase']['totalprice'];?></li>
						<li  style="text-align:center;width:154px;"><?php echo $invoice['PosPurchase']['payamount'];?></li>
						<?php
						$dueamount=$invoice['PosPurchase']['totalprice']-$invoice['PosPurchase']['payamount'];
						?>     
						<li style="width:151px;"><?php echo $dueamount;?>&nbsp;</li>
                         <li  style="width:130px;"> 
        <span class="returnsfull" id="returns_<?php echo $invoice['PosPurchase']['id'];?>"> Return</span>
      					  </li>

					</ul>
				</a>
  
				<?php }

			}else{
				echo "<span class='nodata'>There is no data</span>";
			}
			?> 
		</div>
    </div>
     <div class="pDiv">
    <div class="pGroup">
     	 <?php if($this->params['paging']['PosPurchase']['prevPage']){?>
      <span class='paginate_link'><?php echo $this->Paginator->first();?></span> <span class='paginate_link'><?php echo $this->Paginator->prev('< ' . __('Previous', true), array(), null, array('class'=>'disabled','id'=>'prev_id'));?></span>
      <?php }?>
      <?php echo $this->Paginator->numbers();?>
      <?php if($this->params['paging']['PosPurchase']['nextPage']){?>
      <span class='paginate_link'> <?php echo $this->Paginator->next(__('Next', true) . ' >', array(), null, array('class' => 'disabled','id'=>'next_id', 'span'=>false));?> </span> <span class='paginate_link'><?php echo $this->Paginator->last();?></span>
      <?php }?>
    </div>
  </div>     
</div>
  