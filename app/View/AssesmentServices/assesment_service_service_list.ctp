<ul>
<?php
 //pr( $alreadyAssesServices);die();
  
	
 if(!empty($ServiceServices )){
	   $i = 0; 
			foreach($ServiceServices as $key=>$ServiceService){
		
 			if(!in_array($ServiceService['ServiceService']['id'] , $alreadyAssesServices) ){
 		 		$class = null;
				if ($i++ % 2 == 0) {
					$class = ' class="altrow assesmentservice"';
				}
				else{
				$class = ' class="assesmentservice"';
			}
			// pr($ServiceServices);die();
		?> 
<li id="<?php echo 'rowService_'.$ServiceService['ServiceService']['id'];  ?>">
 <?php echo $this->Form->create('AssesmentService',array('controller'=>'AssesmentServices'));
  echo $this->Form->input("AssesmentService.service_service_id",array('value' =>$ServiceService['ServiceService']['id'],'type'=>'hidden'));
  echo $this->Form->input("AssesmentService.service_device_id",array('value' =>$ServiceService['ServiceDevicesService']['service_device_id'],'type'=>'hidden'));
  echo $this->Form->input("AssesmentService.assesment_id",array( 'class'=>'assesment_id','type'=>'hidden','value'=>$assesments['Assesment']['id']));
  ?>
 <table cellspacing="0" cellpadding="0" border="0" style="" class="">
      <tbody>
           <tr  <?php echo $class;?> >
   	 		 
			 <td align="left"><div style="text-align: left; width: 390px;">
			 <?php echo $ServiceService['ServiceService']['name'];?></div></td>
 			 <td align="left"><div style="text-align: left; width: 101px;">
			 <?php  
			 if(empty($ServiceService['ServiceDevicesService']['price'])){
			 	$ServiceService['ServiceDevicesService']['price'] = $ServiceService['ServiceService']['price'];
			 }
			  echo $this->Form->input("AssesmentService.price",array('class'=>'','value' =>$ServiceService['ServiceDevicesService']['price'],'div'=>false,'label'=>false ,'class'=>'assesmentServicePrice'));
			  
			  ?>
             </div></td>
             <td align="left"><div style="text-align: left; width: 108px;">
			 <?php  
 			 echo $this->Form->input("AssesmentService.quantity",array('value' =>'','div'=>false,'label'=>false,'class'=>'assesmentServiceQuantity required','id'=>'enterStock'.$ServiceService['ServiceService']['id']));?>
  </div></td>
  			<td align="left"><div style="text-align: left; width: 110px;">
				<span class="add_assesment_Service" id="AssmentServiceServiceItem_<?php echo $ServiceService['ServiceService']['id'];?>">Take</span>	
             </div></td>
     	 </tr>
        </tbody>
    </table>
    <?php  echo $this->Form->end();?>	 </li> 
	<?php }}}else{
	echo "No data found!!!";
	}?></ul>
    
	
	 
<script type="text/javascript">
jQuery(function($){ 
 //========================== Start Take Inventory ============================
  $(".add_assesment_Service").on('click',function(e){
	  e.preventDefault();
 			var ids= $(this).attr('id');
	 		var id= ids.split('_');
 			$('.ajax-save-message').hide().fadeOut(); 
  			 var data= $(this).closest('form').serialize();
			 if($(this).closest('form').valid()){
			  $('.overlaydivsmall').fadeIn();
  			 $.ajax({
				type: "POST",
				url:siteurl+"AssesmentServices/add",
				data:  data,
				success: function(response){
						 //alert(response);
 				 	var obj = jQuery.parseJSON( response);	
					
				 	$('.overlaydivsmall').hide();
					$(".assesmentInventoryServiceGrid #rowService_"+id[1]).remove();
					
					 $(".reciveDeviceAssementService table tbody").append("<tr class='assesmentservice' id='AssesmentServiceTr_"+obj.AssesmentService.id+"'><td> "+obj.ServiceService.name+"</td><td> "+obj.AssesmentService.price+"</td><td> "+obj.AssesmentService.quantity+"</td><td class='servicetotalpriceli'>"+obj.AssesmentService.quantity*obj.AssesmentService.price+"</td><td class='actions'><a class='AssesmentServiceRemove link_view action_link' id='AssesmentServiceRemove_"+obj.AssesmentService.id+"' href='/spr/branches/sstl1/#/#'>Remove</a></td></tr>");   
   		 			 service_total();
					
  					 }
				}); 
				}else{
				}
   		});
	});

</script>	
<style type="text/css">
.assesmentServicePrice , .assesmentServiceQuantity{
	width:85px !important;
	
}

.add_assesment_Service{
    background: url("../img/grid/title.gif") repeat-x scroll left bottom #ffffff;
    border: 1px solid #d7d7d7;
    border-radius: 5px;
    color: #036fad;
    cursor: pointer;
    display: inline-block;
    float: left;
    font-size: 11px;
    font-weight: bold;
    padding: 3px 7px;
    position: relative;
}
.reciveDeviceAssesmentInvoice label{
	float:left !important;
	width:120px !important;
}
</style>
	