<?php echo $this->Html->css(array('common/grid'));?>
<div class="flexigrid" style="width: 100%;">
 <div class="tDiv">
  <div class="tDiv2">
   <?php echo $this->Form->create('ServiceDefect',array('controller' => 'serviceDefects','action'=>'index' ));?>
   <div id="WrapperServiceDefectName" class="microcontroll">
		<?php	echo $this->Form->label('ServiceDefect.name', __('Name'.':', true) );?>
		<?php	echo $this->Form->input('ServiceDefect.name',array('div'=>false,'label'=>false,'class'=>' '));?>
        <div class="button_area_filter">
       <?php echo $this->Form->button('Search',array( 'class'=>'submit', 'id'=>'btn_Service_defects_search'));?>      <?php echo $this->Form->button('Reset',array('type'=>'reset','name'=>'reset','id'=>'btn_Service_defects_reset'));?>     
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
 			<th align="left" width="394"><?php echo 'Name';?></th>
          <th align="left"><?php echo 'Link';?></th>
        </tr>
      </thead>
    </table>
  </div>
</div>
 <table cellspacing="0" cellpadding="0" border="0" style="" class="flexme3" width="100%">
      <tbody id="ServiceDefectGrid">
   <?php	  echo  $this->requestAction("ServiceDefects/parentServiceDefectList/yes/", array("return")); ?>
    </table>
    </div>
 </div>
 <script type="text/javascript">
 jQuery(function($){ 
 //=================== Start Searching Inventory Product ========================
  $("#btn_Service_defects_search").on('click',function(e){
	  e.preventDefault();
	 	$('.ajax_status').fadeIn();
			$('.ajax-save-message').hide().fadeOut(); 
 			 var data= $('#ServiceDefectIndexForm').serialize();
			 $.ajax({
				type: "POST",
				url:siteurl+"ServiceDefects/parentServiceDefectList",
				data:  data,
				success: function(response){
  						$('.ajax_status').hide(); 
						$("#ServiceDefectGrid").html('');
						$("#ServiceDefectGrid").html(response);
						 
 					 }
				}); 
  		});
	
  $("#btn_Service_defects_reset").on('click',function(e){
	  e.preventDefault();
	 	$('.ajax_status').fadeIn();
			$('.ajax-save-message').hide().fadeOut(); 
  			 $.ajax({
				type: "GET",
				url:siteurl+"ServiceDefects/parentServiceDefectList/yes/",
 				success: function(response){
  						$('.ajax_status').hide(); 
						$("#ServiceDefectGrid").html('');
						$("#ServiceDefectGrid").html(response);
						 
 					 }
				}); 
  		});
		
		//=========================== End Searching Product ======================
});
</script>
 <style>
 .microcontroll input[type="text"], .microcontroll input[type="number"] {
    width: 232px !important;
}
 #WrapperServiceDefectName .button_area_filter {
    display: inline !important;
    margin: 0 !important;
    padding: 0 !important;
}
.popup_add_link ,.popup_remove_link {
    background: url("../img/grid/title.gif") repeat-x scroll left bottom #FFFFFF;
    border: 1px solid #D7D7D7;
    border-radius: 5px;
    color: #036FAD;
    cursor: pointer;
    display: inline-block;
    float: right;
    font-size: 11px;
    font-weight: bold;
    padding: 3px 7px;
    position: relative;
}
.serviceDeviceInfos label{
	float:left !important;
}
 </style>