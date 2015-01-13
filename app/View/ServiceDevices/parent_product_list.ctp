<ul>
<?php
   if(!empty($posProducts )){
	   $i = 0; 
			foreach($posProducts as $key=>$posProduct){
   		 		$class = null;
				if ($i++ % 2 == 0) {
					$class = 'class="altrow inventory"';
				}
				else{
					$class = 'class="inventory"';
				}
 		?> 
<li id="<?php echo 'posComparow_'.$posProduct['PosProduct']['id'];  ?>">
 <?php echo $this->Form->create('ServiceDevice',array('controller'=>'ServiceDevices'));
   echo $this->Form->input("ServiceDevice.pos_product_id",array('value' =>$posProduct['PosProduct']['id'],'type'=>'hidden'));
    echo $this->Form->input("ServiceDevice.name",array('value' =>$posProduct['PosProduct']['name'],'type'=>'hidden'));
	 echo $this->Form->input("ServiceDevice.pos_pcategory_id",array('value' =>$posProduct['PosProduct']['pos_pcategory_id'],'type'=>'hidden'));
	  echo $this->Form->input("ServiceDevice.pos_brand_id",array('value' =>$posProduct['PosProduct']['pos_brand_id'],'type'=>'hidden'));
	  echo $this->Form->input("ServiceDevice.description",array('value' =>$posProduct['PosProduct']['description'],'type'=>'hidden'));
   ?>
 <table cellspacing="0" cellpadding="0" border="0" width="100%">
      <tbody>
        <tr  <?php echo $class;?> >
   	 		 <td align="right" width="40%" class="ProductName_<?php echo $posProduct['PosProduct']['id'];?>"><?php echo $posProduct['PosProduct']['name']; 
			 ?>
             </td>
			 <td align="left" width="25%" class="posCategory_<?php echo $posProduct['PosProduct']['id'];?>"><?php echo $posProduct['PosPcategory']['name'];?></td>
			 <td align="left" width="25%" class="brandName_<?php echo $posProduct['PosProduct']['id'];?>"><?php echo $posProduct['PosBrand']['name'];?></td>
   			<td align="left" width="10%" style="text-align:center;"><span class="add_Device_from_product" id="PosCompatibilityItem_<?php echo $posProduct['PosProduct']['id'];?>">Add As Device</span></td>
     	 </tr>
        </tbody>
    </table>
    <?php  echo $this->Form->end();?>	 </li> 
	<?php }}else{
				echo "No data found!!!";}
 ?></ul>
 <script type="text/javascript">
 jQuery(function($){ 
	$(".add_Device_from_product").on('click',function(e){
	  	e.preventDefault();
		var ids= $(this).attr('id');
		var id= ids.split('_');
		$('.ajax_status').fadeIn(); 
		$.ajax({
			type: "POST",
			data: $(this).closest('form').serialize(),
			url:siteurl+"ServiceDevices/addServiceFromProduct" ,
			success: function(response){
					$('.ajax_status').hide(); 
					$(".ajax-save-message").html(response);
					$(".ajax-save-message").show();
				 }
			}); 
 		
		$("#posComparow_"+id[1]).remove();
		
 	});
 });
 	
</script>
<style>
.add_Device_from_product{
	 background: url("../img/grid/title.gif") repeat-x scroll left bottom #FFFFFF;
    border: 1px solid #D7D7D7;
    border-radius: 5px;
    color: #036FAD;
    cursor: pointer;
    display: inline-block;
    font-size: 11px;
    font-weight: bold;
    padding: 3px 7px;
    position: relative;
}
</style>
<?php //echo $this->element('sql_dump'); ?>
