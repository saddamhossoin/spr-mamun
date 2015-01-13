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
 <?php echo $this->Form->create('PosCompatibility',array('controller'=>'PosCompatibilities'));
   echo $this->Form->input("PosCompatibility.pos_product_id",array('value' =>$posProduct['PosProduct']['id'],'type'=>'hidden'));
   ?>
 <table cellspacing="0" cellpadding="0" border="0" width="100%">
      <tbody>
        <tr  <?php echo $class;?> >
   	 		 <td align="right" width="46%" class="ProductName_<?php echo $posProduct['PosProduct']['id'];?>"><?php echo $posProduct['PosProduct']['name']; ?></td>
			 <td align="left" width="22%" class="posCategory_<?php echo $posProduct['PosProduct']['id'];?>"><?php echo $posProduct['PosPcategory']['name'];?></td>
			 <td align="left" width="22%" class="brandName_<?php echo $posProduct['PosProduct']['id'];?>"><?php echo $posProduct['PosBrand']['name'];?></td>
   			<td align="left" width="10%" style="text-align:center;"><span class="add_pos_compatability" id="PosCompatibilityItem_<?php echo $posProduct['PosProduct']['id'];?>">Compatable</span></td>
     	 </tr>
        </tbody>
    </table>
    <?php  echo $this->Form->end();?>	 </li> 
	<?php }}else{
				echo "No data found!!!";}
 ?></ul>
 <script type="text/javascript">
 jQuery(function($){ 
 
 $(".add_pos_compatability").on('click',function(e){
	  e.preventDefault();
	 	
 		var ids= $(this).attr('id');
		var id= ids.split('_');
		var productName =$(".ProductName_"+id[1]).html(); 
		var posCategory =$(".posCategory_"+id[1]).html(); 
		var brandName =$(".brandName_"+id[1]).html(); 
		
		$(".gridCompatibilityList").append("<tr id='PosCompatability_"+id[1]+"'><td>"+productName+"<input type='hidden' name=data[PosCompatibility]["+id[1]+"]  value="+id[1]+" /></td><td>"+posCategory+"</td><td>"+brandName+"</td><td class='actions'><span class='PosCompatibilityRemoveA' id='PosCompatiGridRemove_"+id[1]+"'>Remove</span></td></tr>");
		
		$("#posComparow_"+id[1]).remove();
		
 	});
 });
 	
</script>
