<div class="flexigrid" style="width: 100%;">
	<div class="mDiv">
		<div class="ftitle">
			<p>  <?php echo $this->Paginator->counter(array(	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%')	));	?></p>
		</div>
		<div id="searchlink"> &nbsp;</div>
	</div>
	<div class="tDiv">
		<div class="tDiv2">
			<?php echo $this->Form->create('PosPurchase',array('controller' => 'posPurchases','action'=>'index' ));?>
			<div id="WrapperPosProductPosBrandId" class="microcontroll">
 				<?php echo $this->Form->label('PosPurchase.manual_invoice_id', __('Manual Invoice No'.': <span class="star"></span>', true),array('id'=>'PosPurchaseposSupplierId')  ); ?>
                <?php  echo $this->Form->input('PosPurchase.manual_invoice_id',array('type'=>'text','div'=>false, 'label'=>false));?>
                
				<?php echo $this->Form->label('PosPurchase.pos_supplier_id', __('Supplier Name'.': <span class="star"></span>', true),array('id'=>'PosPurchaseposSupplierId')  ); ?>
				<?php  echo $this->Form->Select('PosPurchase.pos_supplier_id',$suppliername,array('type'=>'text','div'=>false,'empty'=>'- Select Supplier -','label'=>false,'class'=>'select2as'));?>
                <?php echo $this->element('filter/commonfilter',array('cache' => array('time'=> '-7 days','key'=>'header')));?>
 			</div>
 			<div class="button_area_filter">
				<?php echo $this->Form->button('Search',array( 'class'=>'submit', 'id'=>'btn_brand_search'));?>     
				<?php echo $this->Form->button('Reset',array('type'=>'reset','name'=>'reset','id'=>'Cancel', 'onClick'=>"parent.location='".$this->webroot."posPurchases/index/yes'"));?>     
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
                        <th align="left" width="13%"><?php echo $this->Paginator->sort('created');?></th> 
                        <th align="left" width="10%"><?php echo $this->Paginator->sort('manual_invoice_id' , 'Manual Invoice');?></th> 						<th align="left" width="35%"> <?php echo $this->Paginator->sort('Supplier');?> </th>
                        <th align="left" width="10%"><?php echo $this->Paginator->sort('payable_amount',"Invoice Total");?> </th>
                        <th align="left" width="10%"><?php echo $this->Paginator->sort('payamount', 'Payment');?></th>
                        <th align="left" class="link_text" width="22%"><?php echo 'Link';?></th>
                        </tr>
                    </thead>
                </table>
                </div>
            </div>
    
            <table cellspacing="0" cellpadding="0" border="0" style="" class="flexme3">
                <tbody>
                    <?php
                    $i = 0;
                    $TotalPrice = 0;
                    $TotalPayamount=0;
					
					$purchaseDate = '';
    
                    foreach ($posPurchases as $posPurchase){
    					//pr($posPurchase);
                        $TotalPrice = $TotalPrice +  $posPurchase['PosPurchase']['payable_amount'];
                        $TotalPayamount = $TotalPayamount +  $posPurchase['PosPurchase']['payamount'];
    
                        $class = null;
                        if ($i++ % 2 == 0) {
                            $class = ' class="altrow"';
                        }
                        
						$dataDate = date('d / m / Y',strtotime($posPurchase['PosPurchase']['created']));
						if($purchaseDate == "" ||  $dataDate!= $purchaseDate){
							echo "<tr><td colspan = '8' class = 'listDateHeading'>".$dataDate."</td></tr>";
							$purchaseDate = $dataDate;
						}
						?>
                         <tr id='<?php echo 'row_'.$posPurchase['PosPurchase']['id'];?>'  <?php echo $class;?>>
                            <td align='left' class='alistname' width="13%"> <?php echo $this->time->niceshort($posPurchase['PosPurchase']['created']);?>&nbsp; </td>
                            <td align='left' class='alistname' width="10%"> <?php echo $posPurchase['PosPurchase']['manual_invoice_id'] ;?>&nbsp; </td>
                            <td align='left' class='alistname' width="35%"><?php echo  $suppliername[$posPurchase['PosPurchase']['pos_supplier_id']]; ?>
                            </td>
                            <td align='left' class='alistname' width="10%"> <?php echo $posPurchase['PosPurchase']['payable_amount'];?>&nbsp; </td>
                            <td align='left' class='alistname' width="10%"> <?php echo $posPurchase['PosPurchase']['payamount'];?>&nbsp; </td>
                                 <td class="actions" width="22%" class="alistname link_link">

                                        <?php echo $this->Html->link(__('Invoice', true), array('action' => 'view', $posPurchase['PosPurchase']['id']),array('class'=>'link_view action_link','title'=>'Report')); ?>
                                         <?php  echo $this->Html->link(__('Return', true), array('controller'=>'PosPurchaseReturns','action' => 'full_return', $posPurchase['PosPurchase']['id']),array('class'=>'  action_link' )); ?>
                                        <?php  echo $this->Html->link(__('View', true), array('action' => 'viewas', $posPurchase['PosPurchase']['id']),array('class'=>'link_edit action_link')); ?>
                                        
                                        <?php //echo $this->Html->link(__('Delete', true), array('action' => 'delete', $posPurchase['PosPurchase']['id']), array('class'=>'link_delete action_link'), sprintf(__('Are you sure you want to delete # %s?', true), $posPurchase['PosPurchase']['id'])); ?>
                                        
           							</td>
                                </tr>
                                 <?php }
                                  if($TotalPrice >0){ ?>
                                <tr class="lastRowCal">
                                    <td colspan="3">&nbsp;</td>
                                    <td align="left"><div style=" width: 50px;"><?php echo  $TotalPrice;?>&nbsp;</div></td>
                                    <td align="left"><div style=" width: 40px;"><?php echo $TotalPayamount;?>&nbsp;</div></td>
    
                                </tr>
                                <?php }else{
                                    echo "<span class='nodata'>There is no data</span>";
                                }?>
                </table>
                        </div>

					<div class="pDiv">
						<div class="pGroup">
							<?php if($this->params['paging']['PosPurchase']['prevPage']){?>
							<span class='paginate_link'><?php echo $this->Paginator->first(__('<< First', true), array('class' => 'number-first'));?></span> <span class='paginate_link'><?php echo $this->Paginator->prev('< ' . __('Previous', true), array(), null, array('class'=>'disabled','id'=>'prev_id'));?></span>
							<?php }?>
                            <?php echo $this->Paginator->numbers(array('class' => 'numbers', 'first' => false, 'last' => false));?>
							<?php if($this->params['paging']['PosPurchase']['nextPage']){?>
							<span class='paginate_link'> <?php echo $this->Paginator->next(__('Next', true) . ' >', array(), null, array('class' => 'disabled','id'=>'next_id', 'span'=>false));?> </span> <span class='paginate_link'><?php echo $this->Paginator->last(__('>> Last', true), array('class' => 'number-end'));?> </span>
							<?php }?>
						</div>
					</div>     
                    
                    
				</div>
