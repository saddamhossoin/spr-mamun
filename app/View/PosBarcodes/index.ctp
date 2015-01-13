<div class="flexigrid" style="width: 100%;">
 <div class="mDiv">
  <div class="ftitle">
     <p> <?php echo $this->Paginator->counter(array(	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%')	));	?> </p>
  </div>
  <div id="searchlink"> &nbsp;</div>
</div>

<div class="tDiv">
  <div class="tDiv2">
   <?php echo $this->Form->create('PosBarcode',array('controller' => 'barcodes','action'=>'index' ));?>
   <?php echo $this->element('filter/commonfilter',array('cache' => array('time'=> '-7 days','key'=>'header')));?>
    <div id="WrapperTestName" class="microcontroll">
     	<?php echo $this->Form->label('PosProduct.name', __('Product'.': <span class="star"></span>', true) ); ?>
        <?php echo $this->Form->input('PosProduct.name',array('type'=>'text','div'=>false,'label'=>false, 'size'=>25 ));?>
        <?php echo $this->Form->label('PosBarcode.barcode', __('Barcode'.': <span class="star"></span>', true) ); ?>
        <?php echo $this->Form->input('PosBarcode.barcode',array('type'=>'text','div'=>false,'label'=>false, 'size'=>25 ));?>
 		<?php  echo $this->Form->label('PosProduct.name', __('Category'.': <span class="star"></span>', true),array('id'=>'filtermodifyedby'));   
        echo $this->Form->input('PosProduct.pos_pcategory_id',array('type'=>'select','options'=>$category,'div'=>false,'label'=>false,'class'=>'required select2as','empty'=>'----Please select Category----')); ?>
       </div> 
       
    <div class="button_area_filter">
        <?php echo $this->Form->button('Search',array( 'class'=>'submit', 'id'=>'btn_brand_search'));?>      <?php echo $this->Form->button('Reset',array('type'=>'reset','name'=>'reset','id'=>'Cancel', 'onClick'=>"parent.location='PosBarcodes/index/yes'"));?>     
    </div>
    </form>
  </div>
  <div style="clear: both;"></div>
</div>


<div class="bDiv" style="height: auto;">
<div class="hDiv">
  <div class="hDivBox">
     
  </div>
</div>
<span class='Print_Button'><span class='print_img'>&nbsp;&nbsp;</span> &nbsp;Print</span>
<div class="barcode_print">
<style>
.barcode_print{
	border:1px solid #999999;
	width:225px !important;
	height:auto !important;
	list-style:none !important;
}
.barcode_print div{
	width:220px;
	margin-bottom:5px;
	margin-top:3px;
	display:block;
	margin-left:5px;
	border-bottom:1px dotted #CCCCCC;
	list-style-type:none !important;
	padding-bottom:8px !important;
 }

</style>
 
<?php
 	$i = 0;
	foreach ($barcodes as $barcode):
	// pr($barcode);die();
 	?>
    
 	<div id='<?php echo 'row_'.$barcode['PosBarcode']['id'];?>'>
    <span class="removeLink"> -- </span>
	 <?php  echo $this->Html->image("../img/barcode/".$barcode['PosBarcode']['barcode'].".png", array("class"=>"barcode","alt" => $barcode['PosBarcode']['barcode'] ));?>
     
   </div>
   <br />
  <?php endforeach; ?>
   </div>  
    </div>
    
    <div class="pDiv">
    <div class="pGroup">
     	 <?php if($this->params['paging']['PosBarcode']['prevPage']){?>
      <span class='paginate_link'><?php echo $this->Paginator->first();?></span> <span class='paginate_link'><?php echo $this->Paginator->prev('< ' . __('Previous', true), array(), null, array('class'=>'disabled','id'=>'prev_id'));?></span>
      <?php }?>
      <?php echo $this->Paginator->numbers();?>
      <?php if($this->params['paging']['PosBarcode']['nextPage']){?>
      <span class='paginate_link'> <?php echo $this->Paginator->next(__('Next', true) . ' >', array(), null, array('class' => 'disabled','id'=>'next_id', 'span'=>false));?> </span> <span class='paginate_link'><?php echo $this->Paginator->last();?></span>
      <?php }?>
    </div>
  </div>     
</div>
<?php 	$return_arr = array();
	 	foreach($posProducts as $key=>$posproduct){
			$row_array['label'] = $posproduct;
			$row_array['actor'] = "$key";
			array_push($return_arr,$row_array);
		}
 	  ?>
 	  <script>
 	   var data = '';
	   var data =  <?php echo json_encode($return_arr); ?>;
 	  </script>
<script type="text/javascript" >
$(function(){
 	
	 $(".Print_Button").on('click',function(e){
		 $('.Print_Button').html('');
		 $(".removeLink").remove();
		 Popup($(".barcode_print").html());
 	 });

$(".removeLink").on('click',function(e){
	$(this).next('img').remove();
	$(this).parent().next('br').remove();
	$(this).parent().remove();
	
});	 
	 
});
</script>
 