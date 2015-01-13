<?php  //pr($products);?>
<div class="flexigrid" style="width: 100%;">
 <div class="mDiv">
  <div class="ftitle">
    <p> <?php echo $this->Paginator->counter('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}');	?> </p>
  </div>
  <div id="searchlink"> &nbsp;</div>
</div>
<?php $status=array(1=>"Only Inventory",2=>"Only Service",3=>"Both");?>

<div class="tDiv">
  <div class="tDiv2">
   <?php echo $this->Form->create('PosStock',array('controller' => 'posStocks','action'=>'index' ));?>
     <div id="WrapperTestName" class="microcontroll">
			 <?php  echo $this->Form->label('PosProduct.name', __('Product'.': <span class="star"></span>', true) ); ?>
 		     <?php echo $this->Form->input('PosProduct.name',array('type'=>'text','div'=>false,'label'=>false ));?>
	  </div>
      <div id="WrapperTestName" class="microcontroll">		 
		<?php echo $this->Form->label('PosProduct.name', __('Brand'.': <span class="star"></span>', true),array('id'=>'filtermodifyedby')  ); ?>
 			<?php  echo $this->Form->input('PosProduct.pos_brand_id',array('type'=>'select','options'=>$brand,'div'=>false,'label'=>false,'class'=>'required select2as','empty'=>'----Please select Brand----'));    ?>
	 
			<?php  echo $this->Form->label('PosProduct.name', __('Category'.': <span class="star"></span>', true),array('id'=>'filtermodifyedby')  );   
				   echo $this->Form->input('PosProduct.pos_pcategory_id',array('type'=>'select','options'=>$category,'div'=>false,'label'=>false,'class'=>'required select2as','empty'=>'----Please select Category----'));  
	  ?>
       <?php   echo $this->Form->label('PosProduct.name', __('Status'.': <span class="star"></span>', true),array('id'=>'filtermodifyedby')  );   	 echo $this->Form->input('PosProduct.status',array('type'=>'select','options'=>$status,'div'=>false,'label'=>false,'class'=>'required select2as','empty'=>'-- Select Status --'));  
	  ?>
		</div>
            
   <?php  //echo $this->element('filter/commonfilter',array('cache' => array('time'=> '-7 days','key'=>'header')));?>
    <div class="button_area_filter">
     
      <?php echo $this->Form->button('Search',array( 'class'=>'submit', 'id'=>'btn_brand_search'));?>      <?php echo $this->Form->button('Reset',array('type'=>'reset','name'=>'reset','id'=>'Cancel', 'onClick'=>"parent.location='".$this->webroot."posStocks/index/yes'"));?>     
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
        <th align="left" width="27%"><?php echo $this->Paginator->sort('PosProduct.name','Name');?></th>
        <th align="left" width="14%"><?php echo $this->Paginator->sort('PosPcategory.name','Category');?></th>
        <th align="left" width="14%"><?php echo $this->Paginator->sort('PosBrand.name','Brand');?></th>
       	<th align="left" width="8%"><?php echo $this->Paginator->sort('status','Status');?></th>

        <th align="left" width="8%"> <?php echo $this->Paginator->sort('PosStock.quantity','Quantity');?></div></th>
        <th align="left" width="8%"> <?php echo $this->Paginator->sort('PosStock.last_purchase','Last Purchase');?></th>
        <th align="left" width="8%"> <?php echo $this->Paginator->sort('PosStock.last_sales','Last Sales');?></th>
			   
	           <?php if($this->Session->read('username')=='Admin' || $this->Session->read('username')=='SuperAdmin'){?>          <th align="right"  ><div style="text-align: left; width: 100px;"><?php echo $this->Paginator->sort('User','modifiedBy');?></div></th>
          <?php } ?><th align="left"  class="link_text" width="8%"><?php echo 'Link';?> </th>
        </tr>
      </thead>
    </table>
  </div>
</div>
<table cellspacing="0" cellpadding="0" border="0" style="" class="flexme3">
  <tbody>
	<?php
	//pr($posStocks );
		$i = 0;
		foreach ($posStocks as $posStock):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
	?>
	<tr id='<?php echo 'row_'.$posStock['PosStock']['id'];?>'  <?php echo $class;?>>
 		<td align='left' class='alistname' width="5%"><?php  echo $this->Html->image("../".$posStock['PosProduct']['image'], array("class"=>"productimage","alt" => "No Image",  'url' => '#','width'=>50, 'height'=>50));?>&nbsp;</td> 
        <td align='left' class='alistname' width="27%"><?php echo $posStock['PosProduct']['name']; ?>&nbsp;</td>			  
		<td align='left' class='alistname' width="14%"><?php echo  $posStock['PosPcategory']['name']; ?>&nbsp;</td>			  
 		<td align='left' class='alistname' width="14%"><?php echo  $posStock['PosBrand']['name']; ?>&nbsp;</td>
   		<td align='left' class='alistname' width="8%"><?php echo $status[$posStock['PosProduct']['status']]; ?>&nbsp;</td>

		<td align='left' width="8%"><?php echo $posStock['PosStock']['quantity']; ?>&nbsp;</td>
        <td align='left' width="8%"><?php echo $posStock['PosStock']['last_purchase']; ?>&nbsp;</td>
        <td align='left' width="8%"><?php echo $posStock['PosStock']['last_sales']; ?>&nbsp;</td>
		<td class="actions" class='alistname link_link' width="8%"><?php echo $this->Html->link(__('View', true), array('action' => 'view', $posStock['PosStock']['id']),array('class'=>'link_view action_link')); ?></td>
	</tr>
<?php endforeach; ?>
    </table>
    </div>
    
 <div class="pDiv">
    <div class="pGroup">
     	 <?php if($this->params['paging']['PosProduct']['prevPage']){?>
      <span class='paginate_link'><?php echo $this->Paginator->first();?></span> <span class='paginate_link'><?php echo $this->Paginator->prev('< ' . __('Previous', true), array(), null, array('class'=>'disabled','id'=>'prev_id'));?></span>
      <?php }?>
      <?php echo $this->Paginator->numbers();?>
      <?php if($this->params['paging']['PosProduct']['nextPage']){?>
      <span class='paginate_link'> <?php echo $this->Paginator->next(__('Next', true) . ' >', array(), array('class' => 'disabled','id'=>'next_id', 'span'=>false));?> </span> <span class='paginate_link'><?php echo $this->Paginator->last();?></span>
      <?php }?>
    </div>
  </div>     
</div>
 