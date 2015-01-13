<div class="flexigrid" style="width: 100%;">
 <div class="mDiv">
  <div class="ftitle">
    <p> <?php echo $this->Paginator->counter(array(	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%')	));	?> </p>
  </div>
  <div id="searchlink"> &nbsp;</div>
</div>

	 
<div class="tDiv">
  <div class="tDiv2">
   <?php echo $this->Form->create('PurchaseReturnAdjustment',array('controller' => 'PurchaseReturnAdjustments','action'=>'index' ));?>
   
   <div id="WrapperTestName" class="microcontroll">
			
			<?php echo $this->Form->label('PurchaseReturnAdjustment.pay_type', __('Pay Type'.': <span class="star"></span>', true),array('id'=>'filtermodifyedby')  ); ?>
 			<?php  
			
			$pay_type=array('1'=>'Cash','2'=>'Purchase');
			echo $this->Form->input('PurchaseReturnAdjustment.pay_type',array('type'=>'select','options'=>$pay_type,'div'=>false,'label'=>false,'class'=>'required select2as','empty'=>'----Please select Pay Type----'));    ?>
	 
	<?php echo $this->Form->label('PurchaseReturnAdjustment.purchase_id', __('Purchase ID'.': <span class="star"></span>', true) ); ?>
 	<?php echo $this->Form->input('PurchaseReturnAdjustment.purchase_id',array('type'=>'text','div'=>false,'label'=>false, 'size'=>25 ));?>
	
	<?php echo $this->Form->label('PurchaseReturnAdjustment.purchase_return_id', __('Return ID'.': <span class="star"></span>', true) ); ?>
 	<?php echo $this->Form->input('PurchaseReturnAdjustment.purchase_return_id',array('type'=>'text','div'=>false,'label'=>false, 'size'=>25 ));?>
				
	  
	
     
	</div>
  			
	  
   <?php echo $this->element('filter/commonfilter',array('cache' => array('time'=> '-7 days','key'=>'header')));?>
    <div class="button_area_filter">
     
      <?php echo $this->Form->button('Search',array( 'class'=>'submit', 'id'=>'btn_brand_search'));?>      <?php echo $this->Form->button('Reset',array('type'=>'reset','name'=>'reset','id'=>'Cancel', 'onClick'=>"parent.location='".$this->webroot."PurchaseReturnAdjustments/index/yes'"));?>     
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
 		  
 			<th align="left" width="10%"><?php echo $this->Paginator->sort('pay_type','Pay Type');?></th>
			<th align="left" width="10%"><?php echo $this->Paginator->sort('purchase_id','Purchase ID');?></th>
 			<th align="left" width="10%"><?php echo $this->Paginator->sort('purchase_return_id','Return ID');?></th>
 			<th align="left" width="12%"><?php echo $this->Paginator->sort('return_amount');?></th>
            <th align="left" width="7%"><?php echo $this->Paginator->sort('recive_amount');?></th>
  			<th align="left" width="7%"><?php echo $this->Paginator->sort('note');?></th>
 	           <?php if($this->Session->read('username')=='Admin' || $this->Session->read('username')=='SuperAdmin'){?>          <th align="right" width="10%"><?php echo $this->Paginator->sort('User','modifiedBy');?></th>
          <?php } ?><th align="left" class="link_text" width="20%"><?php echo 'Link';?></th>
        </tr>
		</thead>
    </table>
  </div>
</div>
 
  <table cellspacing="0" cellpadding="0" border="0" style="" class="flexme3">
      <tbody>
	  	
<?php
  //pr($posProducts);
if(!empty($purchaseReturnAdjustments)){
	$i = 0;
	foreach ($purchaseReturnAdjustments as $purchaseReturnAdjustment):
	 //pr($posProduct);die();
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr id='<?php echo 'row_'.$purchaseReturnAdjustment['PurchaseReturnAdjustment']['id'];?>'  <?php echo $class;?>>
 		
         <td align='left' class='alistname' width="10%"><?php 
		 if($purchaseReturnAdjustment['PurchaseReturnAdjustment']['pay_type']==1){
		 echo "Cash";
		 }
		 else{
		 echo "Purchase";
		 }
		 
		 ?>&nbsp;</td>
		 
        <td align='left' class='alistname' width="10%"><?php echo $purchaseReturnAdjustment['PurchaseReturnAdjustment']['purchase_id']; ?>&nbsp;</td>			  
		<td align='left' class='alistname' width="10%"><?php echo  $purchaseReturnAdjustment['PurchaseReturnAdjustment']['purchase_return_id']; ?>&nbsp;</td>			  
 		<td align='left' class='alistname' width="12%"><?php echo  $purchaseReturnAdjustment['PurchaseReturnAdjustment']['return_amount']; ?>&nbsp;</td>
         
  		<td align='left' class='alistname' width="7%"><?php echo $purchaseReturnAdjustment['PurchaseReturnAdjustment']['recive_amount']; ?>&nbsp;</td>
		<td align='left' class='alistname' width="7%"><?php echo $purchaseReturnAdjustment['PurchaseReturnAdjustment']['note']; ?>&nbsp;</td>
		
 		<td class="actions" class='alistname link_link' width="20%">
        <?php echo $this->Html->link(__('View', true), array('action' => 'view', $purchaseReturnAdjustment['PurchaseReturnAdjustment']['id']),array('class'=>'link_view action_link')); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $purchaseReturnAdjustment['PurchaseReturnAdjustment']['id']),array('class'=>'link_edit action_link')); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $purchaseReturnAdjustment['PurchaseReturnAdjustment']['id']), array('class'=>'link_delete action_link'), sprintf(__('Are you sure you want to delete # %s?', true), $purchaseReturnAdjustment['PurchaseReturnAdjustment']['id'])); ?>
		 </td>
	</tr>
<?php endforeach;
}
else{
	echo 'No data found';
}?>
    </table>
    </div>
    
    <div class="pDiv">
    <div class="pGroup">
     	 <?php if($this->params['paging']['PurchaseReturnAdjustment']['prevPage']){?>
      <span class='paginate_link'><?php echo $this->Paginator->first(__('<< First', true), array('class' => 'number-first'));?></span> <span class='paginate_link'><?php echo $this->Paginator->prev('< ' . __('Previous', true), array(), null, array('class'=>'disabled','id'=>'prev_id'));?></span>
      <?php }?>
       <?php echo $this->Paginator->numbers(array('class' => 'numbers', 'first' => false, 'last' => false));?>
      <?php 
	 
	  
	  if($this->params['paging']['PurchaseReturnAdjustment']['nextPage'] ){?>
      <span class='paginate_link'> <?php echo $this->Paginator->next(__('Next', true) . ' >', array(), null, array('class' => 'disabled','id'=>'next_id', 'span'=>false));?> </span> <span class='paginate_link'><?php echo $this->Paginator->last(__('>> Last', true), array('class' => 'number-end'));?></span>
      <?php }?>
    </div>
  </div>     
</div>

 