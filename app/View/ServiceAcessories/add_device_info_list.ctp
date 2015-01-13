<?php $i = 0;
	foreach ($serviceAcessories as $serviceAcessory):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
    <tr id="ServiceAccesor_<?php echo $serviceAcessory['ServiceAcessory']['id']; ?>">
 		<td align='left'><div style='width: 200px;' class='alistname' id="deviceServiceAccesory_<?php echo $serviceAcessory['ServiceAcessory']['id']; ?>"><?php echo $serviceAcessory['ServiceAcessory']['name']; ?>&nbsp;</div></td>
 		<td class="actions">
         <span id="ServiceAccesorryItem_<?php echo $serviceAcessory['ServiceAcessory']['id'];?>" class="popup_add_link_accesory">Add</span>
<div style='width: 30px;' class='alistname link_link'>			 
		</div></td>
	</tr>
<?php endforeach; ?>
<script type="text/javascript">

	jQuery(function($){ 
 
//========================== Start Take Inventory ============================
  $(".popup_add_link_accesory").on('click',function(e){
			e.preventDefault();
			var ids= $(this).attr('id');
			var id= ids.split('_');
			var valdefectName = $("#deviceServiceAccesory_"+id[1]).html();
			 $("#deviceAccesorryAddingListGrid").append("<tr class='DeviceAccesoryGridTr_"+id[1]+"'><td><input type='hidden' value='"+id[1]+"' name='data[ServiceDeviceAcessory][service_acessory_id]["+id[1]+"]'/>"+valdefectName+"</td><td><span class='popup_remove_link_ac' id='ServiceAcessoryAItemRemove_"+id[1]+"'>Remove</span></td></tr>");
 			 
 			$("#ServiceAccesor_"+id[1]).remove();
   		});
	});

</script>
<style>
.popup_add_link_accesory, .popup_remove_link , .popup_remove_link_ac {
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

input[type="text"], input[type="number"], [type="password"], [type="select"] {
   
    width: 232px !important;
}
</style>
   