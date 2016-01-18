<?php echo $this->Html->css(array('common/grid','module/Orders/all_order'));?>
<?php //pr($order_lists);?>
<div class="flexigrid" style="width: 100%;">
	<div class="mDiv">
		<div class="ftitle">
			<p>  <?php echo $this->Paginator->counter(array(	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%')	));	?></p>
		</div>
		<div id="searchlink"> &nbsp;</div>
	</div>
	<div class="tDiv">
		<div class="tDiv2">
			<?php echo $this->Form->create('Order',array('controller' => 'Orders','action'=>'online_order' ));?>
			<div id="WrapperPosOrder" class="microcontroll">
                
				<?php echo $this->Form->label('Order.first_name', __('Customer Name'.': <span class="star"></span>', true),array('id'=>'PosPurchaseposSupplierId')  ); ?>
				<?php echo $this->Form->input('Order.first_name',array('type'=>'text','div'=>false,'empty'=>'- Select Customer -','label'=>false,'class'=>''));?>
                
                
			
			
			  <?php echo $this->element('filter/commonfilter',array('cache' => array('time'=> '-7 days','key'=>'header')));?>
			<div class="button_area_filter">
				<?php echo $this->Form->button('Search',array( 'class'=>'submit', 'id'=>'btn_Ordersa_search'));?>     
				<?php echo $this->Form->button('Reset',array('type'=>'reset','name'=>'reset','id'=>'Cancel', 'onClick'=>"parent.location='".$this->webroot."Orders/online_order/yes'"));?>     
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
							order_item_count
							subtotal
							tax
							shippingCost
							choice
							payment_type
							payment_charge
							total
							order_type
                            <th align="left" width="13%"><?php echo $this->Paginator->sort('created');?></td>
                            <th align="left" width="13%"><?php echo $this->Paginator->sort('first_name','Customer Name');?></th>
                            <th align="left" width="13%"><?php echo $this->Paginator->sort('order_item_count');?></th>
                            <th align="left" width="10%"><?php echo $this->Paginator->sort('subtotal');?> </th>
                            <th align="left" width="10%"><?php echo $this->Paginator->sort('tax');?></th>
							<th align="left" width="10%"><?php echo $this->Paginator->sort('shippingCost');?></th>
							<th align="left" width="10%"><?php echo $this->Paginator->sort('payment_charge');?></th>
							<th align="left" width="10%"><?php echo $this->Paginator->sort('total');?></th>

                            <th align="left" class="link_text" width="12%"><?php echo 'Link';?></th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
    
            <table cellspacing="0" cellpadding="0" border="0" style="" class="flexme3">
                <tbody>
                    <?php
                    $i = 0;
					$OrderitemDate='';
					$Orderno=1;
                    
                    foreach ($order_lists  as $order_list){
                             // pr($order_list);
							  
					    $class = null;
                        if ($i++ % 2 == 0) {
                            $class = ' class="altrow"';
                        }
						
						if($order_list['Order']['status'] != 3){
							  
						  $dataDate = date('d / m / Y',strtotime($order_list['Order']['created']));
						 if($OrderitemDate == "" ||  $dataDate!= $OrderitemDate){
							echo "<tr> <td colspan = '8' class = 'listDateHeading'>".$dataDate."</td></tr>";
							$OrderitemDate = $dataDate;
						}
						}
						
						?>
                         <tr id='<?php echo 'row_'.$order_list['Order']['id'];?>' <?php echo $class;?>  <?php if($order_list['Order']['status'] ==3){ ?>style="display:none"<?php }?>>
                            
                            <td align='left' class='alistname' width="13%"> <?php echo $this->time->niceshort($order_list['Order']['created']);?>&nbsp; </td>
                            <td align='left' class='alistname' width="13%"> <?php echo $order_list['Order']['first_name'] ;?>&nbsp; </td>
                             <td align='left' class='alistname' width="13%"> <?php echo $order_list['Order']['phone'] ;?>&nbsp; </td>
                            <td align='left' class='alistname' width="10%"> <?php echo $order_list['Order']['subtotal'];?>&nbsp; </td>
                            <td align='left' class='alistname' width="10%"> <?php echo $order_list['Order']['total'];?>&nbsp; </td>
                                 <td class="actions" width="12%" class='alistname link_link'>

                                        <?php echo $this->Html->link(__('Sales', true), array('controller'=>'Orders','action' => 'complete_order', $order_list['Order']['id']),array('class'=>'action_link')); ?>
                                        <?php echo $this->Html->link(__('Suspend', true), array('controller'=>'Orders','action'=>'suspend_order',$order_list['Order']['id']),array('class'=>'action_link suspend')); ?>
                                        
                                     
                                         
           							</td>
                                </tr>
                                 <?php $Orderno++ ;}?>
                </table>
                        </div>

					<div class="pDiv">
						<div class="pGroup">
							<?php if($this->params['paging']['Order']['prevPage']){?>
							<span class='paginate_link'><?php echo $this->Paginator->first(__('<< First', true), array('class' => 'number-first'));?></span> <span class='paginate_link'><?php echo $this->Paginator->prev('< ' . __('Previous', true), array(), null, array('class'=>'disabled','id'=>'prev_id'));?></span>
							<?php }?>
                            <?php echo $this->Paginator->numbers(array('class' => 'numbers', 'first' => false, 'last' => false));?>
							<?php if($this->params['paging']['Order']['nextPage']){?>
							<span class='paginate_link'> <?php echo $this->Paginator->next(__('Next', true) . ' >', array(), null, array('class' => 'disabled','id'=>'next_id', 'span'=>false));?> </span> <span class='paginate_link'><?php echo $this->Paginator->last(__('>> Last', true), array('class' => 'number-end'));?> </span>
							<?php }?>
						</div>
					</div>     
				</div>
