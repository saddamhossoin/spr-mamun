 <?php echo $this->Html->css(array('common/grid'));?>
<div class="flexigrid" style="width: 100%;">
 <div class="tDiv">
  <div class="tDiv2">
   <?php echo $this->Form->create('ServiceAcessory',array('controller' => 'ServiceAcessories','action'=>'index' ));?>
   <div id="WrapperServiceDefectName" class="microcontroll">
		<?php	echo $this->Form->label('ServiceAcessory.name', __('Name'.':', true) );?>
		<?php	echo $this->Form->input('ServiceAcessory.name',array('div'=>false,'label'=>false,'class'=>' '));?>
        
        <div class="button_area_filter">
       <?php echo $this->Form->button('Search',array( 'class'=>'submit', 'id'=>'btn_Service_acessory_search'));?>      <?php echo $this->Form->button('Reset',array('type'=>'reset','name'=>'reset','id'=>'btn_Service_acessory_reset'));?>     
    </div>
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
 			<th align="left" ><div style=" width: 200px;"><?php echo 'Name';?></div></th>
          <th align="left" ><div style=" width: 50px;" class="link_text"><?php echo 'Link';?></div></th>
        </tr>
      </thead>
    </table>
  </div>
</div>
 <table cellspacing="0" cellpadding="0" border="0" style="" class="flexme3">
      <tbody id="ServiceAccessoryGrid">
 		 <?php	  echo  $this->requestAction("ServiceAcessories/addDeviceInfoList/yes/", array("return")); ?>
    </table>
    </div>
 </div>
 <script type="text/javascript">
 jQuery(function($){ 
 //=================== Start Searching Inventory Product ========================
  $("#btn_Service_acessory_search").on('click',function(e){
	  e.preventDefault();
	 	$('.ajax_status').fadeIn();
			$('.ajax-save-message').hide().fadeOut(); 
 			 var data= $('#ServiceAcessoryIndexForm').serialize();
			 $.ajax({
				type: "POST",
				url:siteurl+"ServiceAcessories/addDeviceInfoList",
				data:  data,
				success: function(response){
  						$('.ajax_status').hide(); 
						$("#ServiceAccessoryGrid").html('');
						$("#ServiceAccessoryGrid").html(response);
						 
 					 }
				}); 
  		});
	
  $("#btn_Service_acessory_reset").on('click',function(e){
	  e.preventDefault();
	 	$('.ajax_status').fadeIn();
			$('.ajax-save-message').hide().fadeOut(); 
  			 $.ajax({
				type: "GET",
				url:siteurl+"ServiceAcessories/addDeviceInfoList/yes/",
 				success: function(response){
  						$('.ajax_status').hide(); 
						$("#ServiceAccessoryGrid").html('');
						$("#ServiceAccessoryGrid").html(response);
						 
 					 }
				}); 
  		});
		
		//=========================== End Searching Product ======================
});
</script>
 <style>
 #WrapperServiceDefectName .button_area_filter {
    display: inline !important;
    margin: 0 !important;
    padding: 0 !important;
}
 </style>