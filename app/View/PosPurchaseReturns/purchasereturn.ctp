<?php echo $this->Html->script(array('common/jquery-ui-1.7.3.custom.min'));?>
<?php echo $this->Html->script(array('common/form','common/jquery.validate'));?>
 <?php  echo $this->Html->css(array('ui/ui.datepicker')); ?>

     <?php  echo $this->Html->script(array('ui/ui.datepicker'));?>
	 
  	 <script type="text/javascript" >
	  $(function() {
        $( "#PosPurchaseReturnModified").datepicker({
            changeMonth: true,
            changeYear: true,
			dateFormat:"yy-mm-dd"
        });
		 $( "#PosPurchaseReturnModified1").datepicker({
            changeMonth: true,
            changeYear: true,
			dateFormat:"yy-mm-dd"
        });
    });
	 
	 
	 </script> 
<?php echo $this->Html->css('common/grid'); ?>
<div class="flexigrid" style="width: 100%;">

<div class="mDiv">
  <div class="ftitle">
    <p> <?php echo $this->Paginator->counter(array(	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)	));	?> </p>
  </div>
  <div id="searchlink"> &nbsp;</div>
</div>

        <div id="Wrapper" class="microcontroll tDiv" >
			 <?php echo $this->Form->create('PosPurchaseReturn');?>
			 
			<?php echo $this->Form->label('PosPurchase.id', __('Enter Purchase ID :'.'<span class="star"></span>', true) ); ?> 
			<?php echo $this->Form->input('PosPurchase.id',array('type'=>'text','div'=>false,'label'=>false,'width'=>15,'class'=>''));?>
			
			<?php echo $this->Form->label('PosPurchase.pos_supplier_id', __('Select Supplier :'.'<span class="star"></span>  ', true) ); ?> 
			<?php echo $this->Form->select('PosPurchase.pos_supplier_id',$supplierlist,null,array('div'=>false,'label'=>false,'class'=>'','empty'=>'-----Plz Select Supplier-----'));?> 
			

			<?php echo $this->Form->label('PatientDetail.is_report_delevery', __('Status :'.' ', true) ); ?>
 			<?php
			$deliverylist = array(''=>' All ','1'=>'Return');
			 echo $this->Form->select('PatientDetail.is_report_delevery',$deliverylist,null,array( 'div'=>false,'label'=>false,   'class'=>'', 'empty'=>false ));?>
	    
			<?php echo $this->Form->label('PosPurchaseReturn.modified', __('Date'.':  ', true) ); ?>
 			<?php echo $this->Form->input('PosPurchaseReturn.modified',array('type'=>'text', 'div'=>false,'label'=>false  ));?>

		<?php echo $this->Form->label('PosPurchaseReturn.modified1', __('To Date'.':  ', true) ); ?>
 			<?php echo $this->Form->input('PosPurchaseReturn.modified1',array('type'=>'text', 'div'=>false,'label'=>false ));?>
			
			
			<br />
			<div class="button_area_filter">	  
        <?php  echo $this->Form->button('Search',array( 'class'=>'submit', 'id'=>'btn_pos_purchase_return_search'));?>
		 <?php  echo $this->Form->button('Reset',array('type'=>'reset','name'=>'reset','id'=>'Cancel', 'onClick'=>"parent.location ='pos_purchase_returns/purchasereturn/yes'"));?>
  </div>
	</div>	 
	<ul class="heading_title_patientlist">
		<li style="width:65px;">Purchase ID</li>
		<li style="width:154px;">Supplier Name</li>
		<li style="width:102px;">Address</li>
		<li style="width:115px;">Mobile</li>
		<li style="width:105px;">Purchase Date</li>
		<li style="width:80px;">Total Price</li>
		<li style="width:80px;">Pay Amount</li>
    
	</ul>	
   <?php // pr($patientlists );	?>
<div id="accordions">
	

  <?php 
    $serial=1;
   if(!empty($purchasereturns)){
  foreach($purchasereturns as $purchasereturn){?>
 <?php //pr($purchasereturn);?>

  
	<a class="selected">
	<ul class="header_ul">
			 <?php //echo $serial++;?>
        <li   style="text-align:left;width:70px;" ><?php echo $purchasereturn['PosPurchase']['id'];?></li>
		<li   style="text-align:left;width:185px;" ><?php echo $purchasereturn['PosSupplier']['name'];?></li>
		<li   style="text-align:left;width:87px;" ><?php echo $purchasereturn['PosSupplier']['address'];?></li>
		<li  style="text-align:left;width:115px;"><?php echo $purchasereturn['PosSupplier']['mobile'];?></li>
		<li  style="text-align:left;width:85px;"><?php echo $purchasereturn['PosPurchase']['purchase_date'];?></li>
		<li  style="text-align:left;width:85px;"><?php echo $purchasereturn['PosPurchase']['totalprice'];?></li>
		<li  style="text-align:left;width:85px;"><?php echo $purchasereturn['PosPurchase']['payamount'];?></li>
	    <li  style="text-align:left;width:85px;"> 
        <span class="returnsfull" id="returns_<?php echo $purchasereturn['PosPurchase']['id'];?>"> Return</span>
        </li>
	</ul>
	</a>
	
	
 	<div style="height: auto;">
		<p>
		

 		<table class="doctor_patient_list">
			<tr>
				<th >Product Name</th>
				<th >Category Name</th>
                <th >Brand Name</th>
				<th >Quantity</th>
				<th >Price</th>
			    <th >Total Price</th>
 			</tr>


		<?php foreach($purchasereturn['PosPurchaseDetail'] as $productdetail){?>
	 <?php //pr($productdetail);?>
			<tr>
				<td><?php echo $productdetail['PosProduct']['name'];?></td>
				<td><?php echo $productdetail['PosPcategory']['name'];?></td>
				<td><?php echo $productdetail['PosBrand']['name'];?></td>
				<td><?php echo $productdetail['quantity'];?></td>
				<td><?php echo $productdetail['price'];?></td>
			    <td><?php echo $productdetail['totalprice'];?></td>
 		</tr>
			
			<?php }?>

			
		</table>

		</p>
	</div>
	<?php }
	
	}else{
		echo "<span class='nodata'>There is no data</span>";
	}
	?>
	</div>
    
    
    <div class="pDiv">
    <div class="pGroup">
     	 <?php if($this->params['paging']['PosPurchase']['prevPage']){?>
      <span class='paginate_link'><?php echo $paginator->first();?></span> <span class='paginate_link'><?php echo $this->Paginator->prev('< ' . __('Previous', true), array(), null, array('class'=>'disabled','id'=>'prev_id'));?></span>
      <?php }?>
      <?php echo $this->Paginator->numbers();?>
      <?php if($this->params['paging']['PosPurchase']['nextPage']){?>
      <span class='paginate_link'> <?php echo $this->Paginator->next(__('Next', true) . ' >', array(), null, array('class' => 'disabled','id'=>'next_id', 'span'=>false));?> </span> <span class='paginate_link'><?php echo $paginator->last();?></span>
      <?php }?>
    </div>
  </div>     
</div>

  
 
  
	
	
 
  

 
 
 