 
 

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
		<?php	echo $this->Form->input('PosSaleReturn.pos_customer_id',array('div'=>false,'label'=>false,'class'=>'required','empty'=>'Select Customer'));?>
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
          <th align="center" class="sorted"><div  style="width: 40px; text-align:center;">
                            <?php echo $this->Form->checkbox('checkbox',array( 'div'=>false,'label'=>false, 'size'=>25,'class'=>'commoncheckbox'));?> </div></th>
         		  <th width="160px" style="font-weight:bold"><?php echo "Product Name"; ?></th>
                    <th width="160px" style="font-weight:bold"><?php echo "Product Brand"; ?></th>
                    <th width="208px" style="font-weight:bold"><?php echo "Product Category"; ?></th>
                     <th width="115px" style="font-weight:bold"><?php echo "Quantity"; ?></th>
                    <th width="115px" style="font-weight:bold"><?php echo "Purchase Prices"; ?></th>
                    <th width="115px" style="font-weight:bold"><?php echo "Total Price"; ?></th> 
			     <th align="left" ><div style=" width: 180px;" class="link_text"><?php echo 'Action';?></div></th>
        </tr>
      </thead>
    </table>
  </div>
</div>
 
  <table cellspacing="0" cellpadding="0" border="0" style="" class="flexme3">
      <tbody>
<?php
//pr($posSaleReturns);
	$i = 0;
	foreach ($posSaleReturns as $purchasereturn):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr id='<?php echo 'row_'.$purchasereturn['PosSale']['id'];?>'  <?php echo $class;?>>
<td align='center'  class='sorted' align='center' >
          <div style='width:40px; text-align:center;'> <?php echo $this->Form->checkbox('PosSaleDetail.checkbox',array( 'div'=>false,'label'=>false, 'size'=>35,'class'=>'listcheckbox','value'=>$purchasereturn['PosSale']['id']));?> </div>
          </td>		<td align='left'><div style='width: 150px;' class='alistname'><?php echo $purchasereturn['PosProduct']['name']; ?>&nbsp;</div></td>
		<td align='left'><div style='width: 150px;' class='alistname'><?php echo $purchasereturn['PosBrand']['name']; ?>&nbsp;</div></td>
		<td align='left'><div style='width: 200px;' class='alistname'><?php echo $purchasereturn['PosPcategory']['name']; ?>&nbsp;</div></td>
		 <td align='left'> 
		<div style=" width: 105px;"><?php echo $purchasereturn['PosSaleDetail']['quantity']; ?></div>
		 </td>
		<td align='left'> 
		<div style=" width: 105px;"><?php echo $purchasereturn['PosSaleDetail']['price']; ?></div>
		 </td>
        <td align='left'> 
		<div style=" width: 105px;"><?php  echo $purchasereturn['PosSaleDetail']['totalprice']; ?></div>
		
		</td>
	 			 
	
    <td align="left"  ><div style=" width: 180px;" class="alistname">
					  <?php 
					  echo $this->Html->link(__('Return', true), array('controller'=>'pos_sale_returns','action' => 'returns', $purchasereturn['PosSaleDetail']['id']), array('class'=>'action_link','id'=>'testlistbygroup','title'=>'Returns')); 
					 
					  /* if($this->Session->read('groupname')=='Admin' || $this->Session->read('groupname')=='SuperAdmin'){
					 echo $this->Html->link(__('Edit', true), array('action' => 'edit', $purchasereturn['PosBrand']['id']),array('class'=>'editlink action_link','title'=>'Edit'));
					 
					  					  
					   echo $this->Html->link(__('Delete', true), array('action' => 'delete', $purchasereturn['PosBrand']['id']), array('class'=>' action_link','title'=>'Delete'), sprintf(__('Are you sure you want to delete # %s?', true), $purchasereturn['PosBrand']['id']));
					  }*/
					  
					  ?>
 					   
					  </div></td>
		
		
	</tr>
<?php endforeach; ?>
    </table>
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
 


