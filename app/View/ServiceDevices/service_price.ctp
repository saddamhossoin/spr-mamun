<br />
<div>
	<div class="leftpan">
		<div class="header"><?php echo __("Brand");?></div>
        <ul id="brands" class="product_brand">
		  <?php
         // pr($posBrands );die();
            foreach ($posBrands as $posBrand){?>
             <li>
                <?php   echo $this->Html->link($posBrand['PosBrand']['name'], array('controller'=>'ServiceDevices','action'=>'servicePrice','Brand',$posBrand['PosBrand']['slug']));?>
             </li>
           <?php }?>
        </ul>
	</div>
    <div class="rightpan">
    
<ul id="brandslist" class="product_brand">
<div class="header searchbox"> 
<?php echo $this->Form->create('ServiceDevice',array('controller'=>'ServiceDevices','action'=>'servicePrice/'.$this->params['pass'][0].'/'.$this->params['pass'][1]));?>
 <?php	
  echo $this->Form->hidden('ServiceDevice.brandtype',array('div'=>false,'label'=>false,'value'=>$this->params['pass'][0]));
 echo $this->Form->hidden('ServiceDevice.brand',array('div'=>false,'label'=>false,'value'=>$this->params['pass'][1]));
 
 echo $this->Form->input('ServiceDevice.device',array('div'=>false,'label'=>false,'class'=>'required' ,'placeholder'=>'Search Device'));?>
 <?php echo $this->Form->button(__("Search"),array( 'class'=>'submit', 'id'=>'btn_device_search'));?>
 <?php echo $this->Form->button('Reset',array( 'class'=>'submit', 'id'=>'btn_brand_reset','type'=>'reset','onClick'=>"parent.location='".$this->webroot."ServiceDevices/servicePrice/".$this->params['pass'][0].'/'.$this->params['pass'][1]."'"));?>
   </div>
    <?php  
	// pr($ServiceDevices);
	//,'url' => array('controller' => 'ServiceDevices', 'action' => 'serviceDeviceServiceDetails',$posProduct['PosProduct']['id'])
	if(!empty($ServiceDevices)){?>
       <?php foreach($ServiceDevices as $posProduct){ ?>
         <li class="item">
          <div class="leftItem" id="<?php echo $posProduct['PosProduct']['id'];?>"> 
         <?php if(!empty($posProduct['PosProduct']['image'])) {?>
                    <?php  
					if(file_exists ($posProduct['PosProduct']['image'] )){
					echo $this->Html->image('../'.$posProduct['PosProduct']['image'], array("alt" => "No Image" ,"border"=>"0"));}else{
					 echo $this->Html->image('/img/wpage/noimage.jpg', array("alt" => "No Image","width"=>"78" ,"height"=>"58","border"=>"0"));
					}
 					?>       
         <?php }else{?>
 		           <?php  echo $this->Html->image('/img/wpage/noimage.jpg', array("alt" => "No Image","width"=>"78" ,"height"=>"58","border"=>"0"));?>
 		<?php }?>
          <div class="product_name"><?php echo  $posProduct['PosProduct']['name'] ; ?></div>
          </div>
         </li>
     <?php }}else{?>
     <?php echo "<h3 class='product_msg'>There are no products available.</h3>";?>
     <?php } ?>
</ul>
    </div>
 </div>
<div id="popoverContent" style="display:none;">
	 
</div>

<div style="clear:both"></div>
<br /><br />
<script type="text/javascript">
jQuery(function($){ 

$('body').on('click', function (e) {
    $('.leftItem').each(function () {
        //the 'is' for buttons that trigger popups
        //the 'has' for icons within a button that triggers a popup
        if (!$(this).is(e.target) && $(this).has(e.target).length === 0 && $('.popover').has(e.target).length === 0) {
            $(this).popover('hide');
        }
    });
});
		
$('.leftItem').popover({
	html: true,
	title: function() {
		var current_id = $(this).attr('id');
		var titlehed = $("#"+current_id+" .product_name").html();
 		return  titlehed;
	},
	content: function () {
		 
		var ids = $(this).attr('id');
 		return details_in_popup(ids);	
	}, 
	placement: function (context, source) {
        var position = $(source).position();

        if (position.left > 515) {
            return "left";
        }

        if (position.left < 515) {
            return "right";
        }

        if (position.bottom >500){
            return "top";
        }
	 if (position.bottom <500){
            return "top";
        }

    }
});	

function details_in_popup(id){
	$.ajax({
		url: siteurl+"ServiceDevices/serviceDeviceServiceDetails/"+id,
		success: function(response){
			 
		  $('#popoverContent').html(response);
			
		}
	});
		 return '<div id="popoverContent">Loading...</div>';
	}
		
});
</script>
 
<style>
.action_link {
     _border-radius: 5px;
    color: #036FAD;
    display: inline-block;
    font-size: 11px;
    font-weight: bold;
    padding: 1px 0px;
    position: relative;
	margin-top:3px;
}
#popoverContent{
	color:#000000;
	_width:300px !important;
	_height:300px !important;
}
</style>