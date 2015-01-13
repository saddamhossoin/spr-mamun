<?php
	$i = 0;
	foreach ($serviceDefects as $serviceDefect):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr id='<?php echo 'rowDefect_'.$serviceDefect['ServiceDefect']['id'];?>'  <?php echo $class;?>>
 		<td align='left'><div style='width: 200px;' class='alistname' id="DefenctName_<?php echo $serviceDefect['ServiceDefect']['id'];?>"><?php echo $serviceDefect['ServiceDefect']['name']; ?>&nbsp;</div></td>
  		<td class="actions">
			<div style='width: 50px;' class='alistname link_link'>
            <span id="ServiceDefectItem_<?php echo $serviceDefect['ServiceDefect']['id'];?>" class="popup_add_link">Add</span>
            			 
		</div></td>
	</tr>
    <?php endforeach; ?>
	<script type="text/javascript">

	jQuery(function($){ 
 
//========================== Start Take Inventory ============================
  $(".popup_add_link").on('click',function(e){
		e.preventDefault();
		var ids= $(this).attr('id');
		var id= ids.split('_');
   		var valdefectName = $("#DefenctName_"+id[1]).html();	
	$("#deviceDefectsAddingListGrid").append("<tr class='DeviceDefectsGridTr_"+id[1]+"'><td><input type='hidden' value='"+id[1]+"' name='data[ServiceDeviceDefect][service_defect_id]["+id[1]+"]'/>"+valdefectName+"</td><td><span class='popup_remove_link' id='ServiceDefectItemRemove_"+id[1]+"' >Remove</span></td></tr>");
	$("#rowDefect_"+id[1]).remove();
					 
  		});
	});

</script>