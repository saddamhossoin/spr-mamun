<?php //pr($posSuppliers); ?>
<div class="flexigrid" style="width: 100%;">
 <div class="mDiv">
  <div class="ftitle">
    <p>  <?php echo $this->Paginator->counter(array(	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%')	));	?> </p>
  </div>
  <div id="searchlink"> &nbsp;</div>
</div>

<div class="tDiv">
  <div class="tDiv2">
   <?php echo $this->Form->create('PosSupplier',array('controller' => 'posSuppliers','action'=>'index' ));?>
    <div id="WrapperTestName" class="microcontroll">
			<?php echo $this->Form->label('PosSupplier.name', __('Name'.': <span class="star"></span>', true) ); ?>
 			<?php echo $this->Form->input('PosSupplier.name',array('type'=>'text','div'=>false,'label'=>false, 'size'=>25 ));?>
	 
			<?php echo $this->Form->label('PosSupplier.mobile', __('Mobile'.': <span class="star"></span>', true) ); ?>
 			<?php echo $this->Form->input('PosSupplier.mobile',array('type'=>'text','div'=>false,'label'=>false, 'size'=>25 ));?>
	 
			<?php echo $this->Form->label('PosSupplier.email', __('Email'.': <span class="star"></span>', true) ); ?>
 			<?php echo $this->Form->input('PosSupplier.email',array('type'=>'text','div'=>false,'label'=>false, 'size'=>25 ));?>
	 
			<?php echo $this->Form->label('PosSupplier.iva', __('IVA'.': <span class="star"></span>', true) ); ?>
 			<?php echo $this->Form->input('PosSupplier.iva',array('type'=>'text','div'=>false,'label'=>false, 'size'=>25 ));?>
	</div>
   
    <?php echo $this->element('filter/commonfilter',array('cache' => array('time'=> '-7 days','key'=>'header')));?>
    <div class="button_area_filter">
     
      <?php echo $this->Form->button('Search',array( 'class'=>'submit', 'id'=>'btn_brand_search'));?>      <?php echo $this->Form->button('Reset',array('type'=>'reset','name'=>'reset','id'=>'Cancel', 'onClick'=>"parent.location='".$this->webroot."posSuppliers/index/yes'"));?>     
    </div>
    </form>
  </div>
  <div style="clear: both;"></div>
</div>

<div class="bDiv" style="height: auto;">
<div class="hDiv">
  <div class="hDivBox">
    <table cellspacing="0" cellpadding="0" width="100%">
      <thead>
        <tr>
           		
			<th align="left" width="15%" ><?php echo $this->Paginator->sort('name');?></th>
 			<th align="left" width="15%"><?php echo $this->Paginator->sort('address');?></th>
			<th align="left" width="10%"><?php echo $this->Paginator->sort('mobile');?></th>
			<th align="left" width="15%"><?php echo $this->Paginator->sort('email');?></th>
  			<th align="left" width="10%"><?php echo $this->Paginator->sort('telephone');?></th>
 		    <th align="left" width="10%"><?php echo $this->Paginator->sort('iva');?></th>
 			<th align="left" width="25%"><div class="link_text"><?php echo 'Link';?></div></th>
        </tr>
      </thead>
    </table>
  </div>
</div>
 
  <table cellspacing="0" cellpadding="0" border="0" style="" class="flexme3" width="100%">
      <tbody>
<?php
//pr($posSuppliers );
	$i = 0;
	foreach ($posSuppliers as $posSupplier):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr id='<?php echo 'row_'.$posSupplier['PosSupplier']['id'];?>'  <?php echo $class;?>>
 	<td align='left' width="15%"><?php echo $posSupplier['PosSupplier']['name']; ?>&nbsp; </td>
    <td align='left' width="15%"><?php echo $posSupplier['PosSupplier']['address']; ?>&nbsp; </td>
    <td align='left' width="10%"> <?php echo $posSupplier['PosSupplier']['mobile']; ?>&nbsp; </td>
    <td align='left' width="15%"><?php echo $posSupplier['PosSupplier']['email']; ?>&nbsp; </td>
    <td align='left' width="10%"><?php echo $posSupplier['PosSupplier']['telephone']; ?>&nbsp; </td>
    <td align='left' width="10%"><?php echo $posSupplier['PosSupplier']['iva']; ?>&nbsp; </td>
 			
	<td class="actions" width="25%">
<div class='alistname link_link'>		
     <?php 
	 if(!empty($posSupplier['PosSupplierLedger'])){echo $this->Html->link(__('Invoice', true), array('action' => 'invoice', $posSupplier['PosSupplier']['id']),array('class'=>'link_view action_link')); }?>
 	<?php echo $this->Html->link(__('View', true), array('action' => 'view', $posSupplier['PosSupplier']['id']),array('class'=>'link_view action_link')); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $posSupplier['PosSupplier']['id']),array('class'=>'link_edit action_link')); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $posSupplier['PosSupplier']['id']), array('class'=>'link_delete action_link'), sprintf(__('Are you sure you want to delete # %s?', true), $posSupplier['PosSupplier']['id'])); ?>
		</div></td>
	</tr>
<?php endforeach; ?>
    </table>
    </div>
    
    <div class="pDiv">
    <div class="pGroup">
     	 <?php if($this->params['paging']['PosSupplier']['prevPage']){?>
      <span class='paginate_link'><?php echo $this->Paginator->first();?></span> <span class='paginate_link'><?php echo $this->Paginator->prev('< ' . __('Previous', true), array(), null, array('class'=>'disabled','id'=>'prev_id'));?></span>
      <?php }?>
      <?php echo $this->Paginator->numbers();?>
      <?php if($this->params['paging']['PosSupplier']['nextPage']){?>
      <span class='paginate_link'> <?php echo $this->Paginator->next(__('Next', true) . ' >', array(), null, array('class' => 'disabled','id'=>'next_id', 'span'=>false));?> </span> <span class='paginate_link'><?php echo $this->Paginator->last();?></span>
      <?php }?>
    </div>
  </div>     
</div>
 