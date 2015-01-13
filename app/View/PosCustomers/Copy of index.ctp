<?php //pr($posCustomers); ?>
<div class="flexigrid" style="width: 100%;">
 <div class="mDiv">
  <div class="ftitle">
    <p> <?php echo $this->Paginator->counter(array(	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%') ));	?> </p>
  </div>
  <div id="searchlink"> &nbsp;</div>
</div>

<div class="tDiv">
  <div class="tDiv2">
   <?php echo $this->Form->create('PosCustomer',array('controller' => 'posCustomers','action'=>'index' ));?>
   
   <div id="WrapperTestName" class="microcontroll">
   
   <?php $status=array(2=>"Whole Seller",3=>"Online",4=>"Desktop",5=>"Service");?>
	   <?php   echo $this->Form->label('PosCustomer.name', __('Type'.': <span class="star"></span>', true),array('id'=>'filtermodifyedby')  );   
	   		 echo $this->Form->input('PosCustomer.customer_type',array('type'=>'select','options'=>$status,'div'=>false,'label'=>false,'class'=>'required select2as','empty'=>'-- Select Customer Type --'));  
	  ?>
			
	  <?php echo $this->Form->label('PosCustomer.name', __(' Name'.': <span class="star"></span>', true) ); ?>
 	  <?php echo $this->Form->input('PosCustomer.name',array('type'=>'text','div'=>false,'label'=>false, 'size'=>25 ));?>
	 
	 		 
      <?php echo $this->Form->label('PosCustomer.name', __('Email'.': <span class="star"></span>', true) ); ?>
 	  <?php echo $this->Form->input('PosCustomer.email',array('type'=>'text','div'=>false,'label'=>false, 'size'=>25 ));?>
       
	  
	 
	</div>
	
   <?php echo $this->element('filter/commonfilter',array('cache' => array('time'=> '-7 days','key'=>'header')));?>
    <div class="button_area_filter">
     
      <?php echo $this->Form->button('Search',array( 'class'=>'submit', 'id'=>'btn_brand_search'));?>      <?php echo $this->Form->button('Reset',array('type'=>'reset','name'=>'reset','id'=>'Cancel', 'onClick'=>"parent.location='".$this->webroot."posCustomers/index/yes'"));?>     
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
           		
			<th align="left" width="11%" ><?php echo $this->Paginator->sort('name');?></th>
			<th align="left" width="11%" ><?php echo $this->Paginator->sort('customer_type');?></th>
 			<th align="left" width="15%"><?php echo $this->Paginator->sort('address');?></th>
			<th align="left" width="8%"><?php echo $this->Paginator->sort('mobile');?></th>
			<th align="left" width="15%"><?php echo $this->Paginator->sort('email');?></th>
 			<th align="left" width="12%"><?php echo $this->Paginator->sort('companyname');?></th>
 			<th align="left" width="12%"><?php echo $this->Paginator->sort('telephone');?></th>
 		    <th align="left" width="6%"><?php echo $this->Paginator->sort('iva');?></th>
 			<th align="left" width="25%"><div class="link_text"><?php echo 'Link';?></div></th>
        </tr>
      </thead>
    </table>
  </div>
</div>
 
  <table cellspacing="0" cellpadding="0" border="0" style="" class="flexme3">
      <tbody>
<?php
	$i = 0;
	foreach ($posCustomers as $posCustomer):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr id='<?php echo 'row_'.$posCustomer['PosCustomer']['id'];?>'  <?php echo $class;?>>
  	 <td align='left' width="11%"> <?php echo $posCustomer['PosCustomer']['name']; ?>&nbsp; </td>
	 <td align='left' width="11%"> <?php echo $status[$posCustomer['PosCustomer']['customer_type']]; ?>&nbsp; </td>
	 <td align='left' width="15%"> <?php echo $posCustomer['PosCustomer']['address']; ?>&nbsp; </td>
	 <td align='left' width="8%"> <?php echo $posCustomer['PosCustomer']['mobile']; ?>&nbsp; </td>
	 <td align='left' width="15%"> <?php echo $posCustomer['PosCustomer']['email']; ?>&nbsp; </td>
	 <td align='left' width="12%"> <?php echo $posCustomer['PosCustomer']['companyname']; ?>&nbsp; </td>
 	 <td align='left'  width="12%"> <?php echo $posCustomer['PosCustomer']['tnt']; ?>&nbsp; </td>
	 <td align='left'  width="6%"> <?php echo $posCustomer['PosCustomer']['iva']; ?>&nbsp;</td>
	  
	 <td class="actions" width="25%"><div class='link_link'>	
<?php //echo $this->Html->link(__('Payment', true), array('controller'=>'PosCustomerLedgers','action' => 'invoice', $posCustomer['PosCustomer']['id']),array('id'=>'customer_ledger','class'=>'customer_ledger action_link')); ?>
	<?php echo $this->Html->link(__('Invoice', true), array('action' => 'invoice', $posCustomer['PosCustomer']['id']),array('class'=>'link_view action_link')); ?>
		<?php echo $this->Html->link(__('View', true), array('action' => 'view', $posCustomer['PosCustomer']['id']),array('class'=>'link_view action_link')); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $posCustomer['PosCustomer']['id']),array('class'=>'link_edit action_link')); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $posCustomer['PosCustomer']['id']), array('class'=>'link_delete action_link'), sprintf(__('Are you sure you want to delete # %s?', true), $posCustomer['PosCustomer']['id'])); ?>
		</div></td>
	</tr>
<?php endforeach; ?>
    </table>
    </div>
    
    <div class="pDiv">
    <div class="pGroup">
     	 <?php if($this->params['paging']['PosCustomer']['prevPage']){?>
      <span class='paginate_link'><?php echo $this->Paginator->first();?></span> <span class='paginate_link'><?php echo $this->Paginator->prev('< ' . __('Previous', true), array(), null, array('class'=>'disabled','id'=>'prev_id'));?></span>
      <?php }?>
      <?php echo $this->Paginator->numbers();?>
      <?php if($this->params['paging']['PosCustomer']['nextPage']){?>
      <span class='paginate_link'> <?php echo $this->Paginator->next(__('Next', true) . ' >', array(), null, array('class' => 'disabled','id'=>'next_id', 'span'=>false));?> </span> <span class='paginate_link'><?php echo $this->Paginator->last();?></span>
      <?php }?>
    </div>
  </div>     
</div>
 