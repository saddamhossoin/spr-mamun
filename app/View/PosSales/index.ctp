 <div class="flexigrid" style="width: 100%;">
 <div class="mDiv">
  <div class="ftitle">
    <p> <?php echo $this->Paginator->counter(array(	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%')	));	?> </p>
  </div>
  <div id="searchlink"> &nbsp;</div>
</div>

<div class="tDiv">
  <div class="tDiv2">
   <?php echo $this->Form->create('PosSale',array('controller' => 'posSales','action'=>'index' ));?>
   
   <div id="WrapperPosProductPosBrandId" class="microcontroll">
  <?php echo $this->Form->label('PosSale.pos_customer_id', __('Customer Name'.': <span class="star"></span>', true),array('id'=>'PosSaleCustomerId')  ); ?>
  <?php  echo $this->Form->Select('PosSale.pos_customer_id',$suppliername,array('class'=>'select2as','type'=>'text','div'=>false,'empty'=>'- Select Customer -','label'=>false ));?>
  </div>
  
   <?php echo $this->element('filter/commonfilter',array('cache' => array('time'=> '-7 days','key'=>'header')));?>
    <div class="button_area_filter">
     
      <?php echo $this->Form->button('Search',array( 'class'=>'submit', 'id'=>'btn_brand_search'));?>      <?php echo $this->Form->button('Reset',array('type'=>'reset','name'=>'reset','id'=>'Cancel', 'onClick'=>"parent.location='".$this->webroot."posSales/index/yes'"));?>     
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
          <th align="center" class="sorted"><div  style="width: 40px;">
                            <?php echo $this->Form->checkbox('checkbox',array( 'div'=>false,'label'=>false, 'size'=>25,'class'=>'commoncheckbox'));?> </div></th>
         	 <th align="left" ><div style=" width: 100px;"><?php echo $this->Paginator->sort('pos_customer_id','Customer');?></div></th>
			<th align="left" ><div style=" width: 100px;"><?php echo $this->Paginator->sort('totalprice');?></div></th>
			<th align="left" ><div style=" width: 100px;"><?php echo $this->Paginator->sort('payamount');?></div></th>

        	 <th align="left" ><div style=" width: 100px;"><?php echo $this->Paginator->sort('modified');?></div></th>
			 <th align="left" ><div style=" width: 100px;"><?php echo $this->Paginator->sort('modified_by');?></div></th>
	           <?php if($this->Session->read('username')=='Admin' || $this->Session->read('username')=='SuperAdmin'){?>          <th align="right"  ><div style="text-align: left; width: 100px;"><?php echo $this->Paginator->sort('User','modifiedBy');?></div></th>
          <?php } ?>          <th align="left" ><div style=" width: 180px;" class="link_text"><?php echo 'Link';?></div></th>
        </tr>
      </thead>
    </table>
  </div>
</div>
 
  <table cellspacing="0" cellpadding="0" border="0" style="" class="flexme3">
      <tbody>
<?php
	$i=0;
	$TotalPrice = 0;
	$TotalPayamount=0;

					 
	foreach ($posSales as $posSale){
	
		$TotalPrice = $TotalPrice +  $posSale['PosSale']['totalprice'];
		$TotalPayamount = $TotalPayamount +  $posSale['PosSale']['payamount'];
	 		//pr($posSale);
	 	$class = null; 
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr id='<?php echo 'row_'.$posSale['PosSale']['id'];?>'  <?php echo $class;?>>
		<td align='center'  class='sorted' align='center'>
          <div style='width:40px; text-align:center;'> <?php echo $this->Form->checkbox('PosSale.checkbox',array( 'div'=>false,'label'=>false, 'size'=>35,'class'=>'listcheckbox','value'=>$posSale['PosSale']['id']));?> </div>
          </td>	 <td align='left'><div style='width: 100px;' class='alistname'>
			<?php echo $posSale['PosCustomer']['name']; ?>
		</div></td>
		<td align='left'><div style='width: 100px;' class='alistname'><?php echo $posSale['PosSale']['totalprice']; ?>&nbsp;</div></td>
		<td align='left'><div style='width: 100px;' class='alistname'><?php echo $posSale['PosSale']['payamount']; ?>&nbsp;</div></td>
		   
		<td align='left'><div style='width: 100px;' class='alistname'><?php echo $this->time->niceshort($posSale['PosSale']['modified']); ?>&nbsp;</div></td>
         <?php if($this->Session->read('groupname')=='Admin' || $this->Session->read('groupname')=='SuperAdmin'){?>
		 
		<td align='left'><div style='width: 100px;' class='alistname'><?php echo $userlists[$posSale['PosSale']['modified_by']]; ?>&nbsp;</div></td><?php }?>
		<td class="actions">
		
				<div style='width: 180px;' class='alistname link_link'>	
						<?php echo $this->Html->link(__('Invoice', true), array('action' => 'view', $posSale['PosSale']['id']),array('class'=>'link_view action_link')); ?>
						<?php echo $this->Html->link(__('View', true), array('action' => 'invoice_view', $posSale['PosSale']['id']),array('class'=>'link_view action_link')); ?>
						<?php echo $this->Html->link(__('Return', true), array('controller'=>'PosSaleReturns','action' => 'full_return', $posSale['PosSale']['id']),array('class'=>'link_edit action_link')); ?>
						<?php echo $this->Html->link(__('Send Mail', true), array('action' => 'send_invoice', $posSale['PosSale']['id']),array('class'=>'action_link')); ?>
						
						<?php  //echo $this->Html->link(__('CGS', true), array('controller'=>'PosSales','action' => 'cgs', $posSale['PosSale']['id']), array('class'=>' action_link')); ?>
						
						<?php  //echo $this->Html->link(__('CGS', true), array('action' => 'delete', $posSale['PosSale']['id']), array('class'=>'link_delete action_link'), sprintf(__('Are you sure you want to delete # %s?', true), $posSale['PosSale']['id'])); ?>
						
		
		</div>
		
		</td>
		
	</tr>
	  <?php 
	  	 } 
		if($TotalPrice >0){ ?>
        <tr class="lastRowCal">
          <td colspan="2"><div style=" text-align:right">&nbsp; Total Price</div></td>
          <td align="left"><div style=" width: 50px;"><?php echo  number_format($TotalPrice);?>&nbsp;</div></td>
          <td align="left"><div style=" width: 40px;"><?php echo number_format($TotalPayamount);?>&nbsp;</div></td>
          
        </tr>
		<?php }else{
			echo "<span class='nodata'>There is no data</span>";
		}?>
		
    </table>
    </div>
 
    <div class="pDiv">
    <div class="pGroup">
     	 <?php if($this->params['paging']['PosSale']['prevPage']){?>
      <span class='paginate_link'><?php echo $this->Paginator->first();?></span> <span class='paginate_link'><?php echo $this->Paginator->prev('< ' . __('Previous', true), array(), null, array('class'=>'disabled','id'=>'prev_id'));?></span>
      <?php }?>
      <?php echo $this->Paginator->numbers();?>
      <?php if($this->params['paging']['PosSale']['nextPage']){?>
      <span class='paginate_link'> <?php echo $this->Paginator->next(__('Next', true) . ' >', array(), null, array('class' => 'disabled','id'=>'next_id', 'span'=>false));?> </span> <span class='paginate_link'><?php echo $this->Paginator->last();?></span>
      <?php }?>
    </div>
  </div>     
</div>
 