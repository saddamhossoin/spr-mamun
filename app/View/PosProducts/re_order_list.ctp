<?php echo $this->Html->css('common/grid'); 
	    echo $this->Html->script(array('common/commonindex'));?>
<div class="flexigrid" style="width: 100%;">
 <div class="mDiv">
  <div class="ftitle">
    <p> <?php echo $this->Paginator->counter(array(	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%')	));	?> </p>
  </div>
  <div id="searchlink"> &nbsp;</div>
</div>
<?php $status=array(1=>"Only Inventory",2=>"Only Service",3=>"Both");?>
	 
<div class="tDiv">
  <div class="tDiv2">
   <?php echo $this->Form->create('PosProduct',array('controller' => 'posProducts','action'=>'re_order_list' ));?>
  		<div id="WrapperTestName" class="microcontroll">
			
			<?php echo $this->Form->label('PosProduct.name', __('Brand'.': <span class="star"></span>', true),array('id'=>'filtermodifyedby')  ); ?>
 			<?php  echo $this->Form->input('PosProduct.pos_brand_id',array('type'=>'select','options'=>$brand,'div'=>false,'label'=>false,'class'=>'required select2as','empty'=>'----Please select Brand----'));    ?>
	 
			<?php  echo $this->Form->label('PosProduct.name', __('Category'.': <span class="star"></span>', true),array('id'=>'filtermodifyedby')  );   
				   echo $this->Form->input('PosProduct.pos_pcategory_id',array('type'=>'select','options'=>$category,'div'=>false,'label'=>false,'class'=>'required select2as','empty'=>'----Please select Category----')); ?>
       <?php   echo $this->Form->label('PosProduct.name', __('Status'.': <span class="star"></span>', true),array('id'=>'filtermodifyedby')  );   	 echo $this->Form->input('PosProduct.status',array('type'=>'select','options'=>$status,'div'=>false,'label'=>false,'class'=>'required select2as','empty'=>'-- Select Status --')); ?>
 	</div>	
    <div id="WrapperTestName" class="microcontroll">
     <?php echo $this->Form->label('PosProduct.name', __('Product'.': <span class="star"></span>', true) ); ?>
 	  <?php echo $this->Form->input('PosProduct.name',array('type'=>'text','div'=>false,'label'=>false, 'size'=>25 ));?>
       
    <?php echo $this->Form->label('PosBarcode.barcode', __('Barcode'.': <span class="star"></span>', true) ); ?>
 	   <?php echo $this->Form->input('PosBarcode.barcode',array('type'=>'text','div'=>false,'label'=>false, 'size'=>25 ));?>
	  
	  <?php  echo $this->Form->label('PosProduct.pos_type_id', __('Type'.': <span class="star"></span>', true),array('id'=>'filtermodifyedby')  );   
				   echo $this->Form->input('PosProduct.pos_type_id',array('type'=>'select','options'=>$posTypes,'div'=>false,'label'=>false,'class'=>'required select2as','empty'=>'----Please select Type----'));  
	  ?>
	 
	 
    </div>
	  
   <?php echo $this->element('filter/commonfilter',array('cache' => array('time'=> '-7 days','key'=>'header')));?>
    <div class="button_area_filter">
     
      <?php echo $this->Form->button('Search',array( 'class'=>'submit', 'id'=>'btn_brand_search'));?>      <?php echo $this->Form->button('Reset',array('type'=>'reset','name'=>'reset','id'=>'Cancel', 'onClick'=>"parent.location='".$this->webroot."posProducts/index/yes'"));?>     
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
 		   <th align="left" width="5%"><?php echo "Image";?></th>
 			<th align="left" width="20%"><?php echo $this->Paginator->sort('PosProduct.name','Name');?></th>
 			<th align="left" width="12%"><?php echo $this->Paginator->sort('PosPcategory.name','Category');?></th>
 			<th align="left" width="12%"><?php echo $this->Paginator->sort('PosBrand.name','Brand');?></th>
            <th align="left" width="8%"><?php echo 'Barcode';?></th>
  			<th align="left" width="7%"><?php echo $this->Paginator->sort('PosStock.last_sales','Sale');?></th>
			<th align="left" width="7%"><?php echo $this->Paginator->sort('status','Status');?></th>
            <th align="left" width="10%"><?php echo $this->Paginator->sort('pos_type_id','Type');?></th>
            <th align="left" width="8%"><?php echo $this->Paginator->sort('PosStock.quantity','Quantity');?></th>
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
  // pr($posProducts);die();
if(!empty($posProducts)){
	$i = 0;
	foreach ($posProducts as $posProduct):
	 // pr($posProduct);die();
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr id='<?php echo 'row_'.$posProduct['PosProduct']['id'];?>'  <?php echo $class;?>>
 		
        <td align='left' class='alistname' width="5%"><?php  echo $this->Html->image("../".$posProduct['PosProduct']['image'], array("class"=>"productimage","alt" => "No Image",  'url' => '#','width'=>50, 'height'=>50));?>&nbsp;</td>
        <td align='left' class='alistname' width="20%"><?php
		 $texthighlight ='';
 		if(!empty($_SESSION['HighlightText'])){
		 foreach($_SESSION['HighlightText'] as $valuess){
		 	$texthighlight[]= $valuess;
	  	} }
	 
		if($texthighlight ==''){
		
		  echo  $posProduct['PosProduct']['name'];  
		}else{ echo String::highlight($posProduct['PosProduct']['name'],  $texthighlight , array('format' => '<span class="highlight">\1</span>'));
		 }		
		// echo $posProduct['PosProduct']['name']; ?>&nbsp;</td>			  
		<td align='left' class='alistname' width="12%"><?php echo  $posProduct['PosPcategory']['name']; ?>&nbsp;</td>			  
 		<td align='left' class='alistname' width="12%"><?php echo  $posProduct['PosBrand']['name']; ?>&nbsp;</td>
         <td align='left' class='alistname' width="8%"><?php  
				foreach($posProduct['PosBarcode'] as $key => $barcodes)
				echo  $barcodes['barcode'] ." , " ;
			?>&nbsp;</td>
  		<td align='left' class='alistname' width="7%"><?php echo $posProduct['PosStock']['last_sales']; ?>&nbsp;</td>
		<td align='left' class='alistname' width="7%"><?php echo $status[$posProduct['PosProduct']['status']]; ?>&nbsp;</td>
		<td align='left' class='alistname' width="10%"><?php echo $posProduct['PosType']['name']; ?>&nbsp;</td>
         <td align='left' class='alistname' width="8%"><?php  echo $posProduct['PosStock']['quantity']; ?>&nbsp;</td>
 		<td class="actions" class='alistname link_link' width="12%">
        <?php echo $this->Html->link(__('View', true), array('action' => 'view', $posProduct['PosProduct']['id']),array('class'=>'link_view action_link')); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $posProduct['PosProduct']['id']),array('class'=>'link_edit action_link')); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $posProduct['PosProduct']['id']), array('class'=>'link_delete action_link'), sprintf(__('Are you sure you want to delete # %s?', true), $posProduct['PosProduct']['id'])); ?>
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
     	 <?php if($this->params['paging']['PosProduct']['prevPage']){?>
      <span class='paginate_link'><?php echo $this->Paginator->first(__('<< First', true), array('class' => 'number-first'));?></span> <span class='paginate_link'><?php echo $this->Paginator->prev('< ' . __('Previous', true), array(), null, array('class'=>'disabled','id'=>'prev_id'));?></span>
      <?php }?>
       <?php echo $this->Paginator->numbers(array('class' => 'numbers', 'first' => false, 'last' => false));?>
      <?php 
	 
	  
	  if($this->params['paging']['PosProduct']['nextPage'] ){?>
      <span class='paginate_link'> <?php echo $this->Paginator->next(__('Next', true) . ' >', array(), null, array('class' => 'disabled','id'=>'next_id', 'span'=>false));?> </span> <span class='paginate_link'><?php echo $this->Paginator->last(__('>> Last', true), array('class' => 'number-end'));?></span>
      <?php }?>
    </div>
  </div>     
</div>

 