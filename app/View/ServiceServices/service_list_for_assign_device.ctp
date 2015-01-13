 <ul>
<?php
  $deviceservicelist = array();
foreach($deviceservicelists as $key => $values){
 	 
	$deviceservicelist[$values['ServiceDevicesService']['service_service_id']] = $values['ServiceDevicesService'];
}


  	$i = 0;
	$is_edit = false;
	$button = 'Add';
	$price_bal = '0.00';
 	foreach ($serviceServices as $serviceService){
		$class = null;
		if ($i++ % 2 == 0) {
			$class = 'altrow';
		}

	if( ( array_key_exists($serviceService['ServiceService']['id'], $deviceservicelist))){
		 $is_edit = true;
		 $button = "Update";
		 $price_bal = $deviceservicelist[$serviceService['ServiceService']['id']]['price'];
		}else{
 			$is_edit = false;
			$button = "Add";
			$price_bal = $serviceService['ServiceService']['price'];
		}
	 	 
		 ?>
 	<li id='<?php echo 'row_'.$serviceService['ServiceService']['id'];?>'  class="<?php if($is_edit){ echo "EditRowService";}?>">
     <?php echo $this->Form->create('ServiceDevice',array('controller'=>'ServiceDevice','action'=>'service_add_device'));
	 if($is_edit){
		 echo $this->Form->input('ServiceDevicesService.id',array('type'=>'hidden','value'=>$deviceservicelist[$serviceService['ServiceService']['id']]['id'],'div'=>false,'label'=>false  ));
	 }
	 
	 echo $this->Form->input('ServiceDevicesService.service_service_id',array('type'=>'hidden','value'=>$serviceService['ServiceService']['id'],'div'=>false,'label'=>false  ));
	  echo $this->Form->input('ServiceDevicesService.service_device_id',array('type'=>'hidden','value'=>$deviceId,'div'=>false,'label'=>false  ));
	  
	  
	  ?>               
    <table cellspacing="0" cellpadding="0" border="0" style="" class="">
      <tbody>
        <tr  class=<?php echo $class;?> >
            <td align='left'><div style='width: 239px;' class='alistname'><?php echo $serviceService['ServiceService']['name']; ?>&nbsp;</div></td>
 	<td align='left'><div style='width: 51px;' class='alistname'>
	<?php
	 
	echo $this->Form->input('ServiceDevicesService.price',array('type'=>'text','value'=>$price_bal,'div'=>false,'label'=>false, 'class'=>'new_assign_price' ));?>&nbsp;</div></td>
 	<td class="actions">
 <div style='width: 50px;' class='alistname link_link'>	
		<?php echo $this->Html->link(__($button, true), array(),array('id' => 'service_add_device_'. $serviceService['ServiceService']['id'],'class'=>'link_view action_link assign_service_device')); ?>
        </div>
         </td>  
	   </tr>
   </table>
    <?php  echo $this->Form->end();?>	 </li> 
    <?php } ?>
    </ul>
    
    <script type="text/javascript">
	jQuery(function($){ 
 
	//========================== Start Take Inventory ============================
	  $(".assign_service_device").on('click',function(e){
	  	e.preventDefault();
 		var ids= $(this).attr('id');
		var id= ids.split('_');
		
		var frmData = $(this).closest('form').serialize();		 
		$('.overlaydiv').fadeIn();
		$('.ajax-save-message').hide().fadeOut(); 
		
  		
		$.ajax({
				type: "POST",
				url:siteurl+"ServiceDevices/service_add_device",
				data:  frmData,
				success: function(response){
					 
  					$('.overlaydiv').hide();
					
 					$('#row_'+id[3]).remove();
					//addClass('EditRowService');

 				   }
				}); 
				 
  		});
	});

</script>	
    
    
    
    <style>
	
	.EditRowService{
	  background: none repeat scroll 0 0 #008000;
   	  opacity: 0.4;
	}
    .new_assign_price{
		width:105px !important;
		text-align:center;
	}
    
    </style>
 