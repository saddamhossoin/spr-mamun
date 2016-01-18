<table cellspacing="0" cellpadding="0" border="0" style="" class="flexme3 comproduct" width="100%">
<thead>
	<tr>
    	<td width="10%">Image</td>
        <td width="90%">Device</td>
    </tr>
</thead>
      <tbody>
	  	
<?php
 if(!empty($com_item)){
	$i = 0;
	foreach ($com_item as $posProduct):
 		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr <?php echo $class;?>>
 		
        <td align='left' class='alistname' width="10%">
		 <?php if(!empty($posProduct['ComPosProduct']['image'])) {?>
                                        <?php  echo $this->Html->image('../'.$posProduct['ComPosProduct']['image'], array("alt" => "No Image","width"=>"40" ,"height"=>"40","border"=>"0" ));?>
                                        
                            <?php }else{?>
                               
                                       <?php  echo $this->Html->image('/img/wpage/noImage.jpg', array("alt" => "No Image","width"=>"40" ,"height"=>"40","border"=>"0"));?>
                               
                            <?php }?>
                            </td>
		
  		<td align='left' class='alistname' width="90%"><?php echo  $posProduct['ComPosProduct']['name']; ?>&nbsp;</td>			  
 	</tr>
<?php endforeach;
}
else{
	echo 'No data found';
}?>
    </table>
<style>
.comproduct thead tr td{
	font-size:13px;
	font-weight:bold;
	padding:3px;
	text-align:center;
}
.comproduct tr td{
	border:1px solid #f8a51b;
	padding:3px;
 }
 .altrow{
 	background:#f2f2f2;
 }
</style>    
    