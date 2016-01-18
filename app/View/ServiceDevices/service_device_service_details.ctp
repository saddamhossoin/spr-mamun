<div class="servicelistDevice">
<?php if(empty($serviceDeviceservices)){
	echo 'No Service Available!!!';}else{
?><table>
	
    <tr>
    <th width="85%">Service Name</th>
     <th width="15%">Price</th>
    </tr>
	<?php 
	 // pr($serviceDeviceservices);
	foreach($serviceDeviceservices as $serviceDeviceservice){
 	?>
         <tr>
            <td><?php echo $serviceDeviceservice['ServiceService']['name'];?></td>
             <td align="center"><?php echo $serviceDeviceservice['ServiceDevicesService']['price'];?></td>
         </tr>
    <?php }?>
</table>
<?php } ?>
</div>

<style>
.popover .arrow{
	top:46px !important;
}
</style>