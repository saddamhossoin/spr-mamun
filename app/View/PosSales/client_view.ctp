<?php //pr($posSale);?>
<div class="row-fluid">
  <div class="widget-box">
    <div class="widget-header widget-header-flat">
      <h4 class="smaller">Sales View</h4>
      <div class="widget-toolbar">
        <label> <small class="green"> <b>Horizontal</b> </small>
        <input id="id-check-horizontal" type="checkbox" class="ace-switch ace-switch-6" />
        <span class="lbl"></span> </label>
      </div>
    </div>
    <div class="widget-body">
      <div class="widget-main"> 
        <dl id="dt-list-1">
          <dt>Product Name</dt>
          <dd><?php 
		  foreach($posSale['PosSaleDetail'] as $product_list){
		  
		  echo  $product_list['PosProduct']['name'] ." , ";
		  
		  }
		  
		  ?></dd>
		  
		  <dt>Sales Type</dt>
          <dd><?php  
		  if( $posSale['PosSale']['sales_type']==1){
		   echo  'Front Desk Sales';
		  }
		  else if($posSale['PosSale']['sales_type']==2){
		   echo 'Online Sales';
		  }
		  else if($posSale['PosSale']['sales_type']==3){
		   echo 'Service';
		  }
		  
		  
		  ;?></dd>
		  
          <dt>Totalprice</dt>
          <dd><?php  echo  $posSale['PosSale']['totalprice'];?></dd>
		  <dt>Taxt</dt>
          <dd><?php  echo  $posSale['PosSale']['tax'];?></dd>
		  <dt>Discount</dt>
          <dd><?php  echo  $posSale['PosSale']['discount'];?></dd>
          <dt>Pay Amount</dt>
          <dd><?php  echo  $posSale['PosSale']['payamount'];?></dd>
          <dt>Payable Amount</dt>
          <dd><?php  echo  $posSale['PosSale']['payable_amount'];?></dd>
        </dl>
      </div>
    </div>
  </div>
</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<?php echo $this->Html->script(array('client/prettify')); ?>
<script type="text/javascript">
			$(function() {
			
				window.prettyPrint && prettyPrint();
				$('#id-check-horizontal').removeAttr('checked').on('click', function(){
					$('#dt-list-1').toggleClass('dl-horizontal').prev().html(this.checked ? '&lt;dl class="dl-horizontal"&gt;' : '&lt;dl&gt;');
				});
			
			})
		</script>
