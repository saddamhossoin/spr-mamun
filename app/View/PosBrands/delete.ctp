 <div class="bDiv" style="height: auto;">
<div class="hDiv">
  <div class="hDivBox">
    <table cellspacing="0" cellpadding="0">
      <thead>
        <tr>
 			<th align="left" ><div style=" width: 100px;"><?php echo 'Products';?></div></th>
          </tr>
      </thead>
    </table>
  </div>
</div>
 
  <table cellspacing="0" cellpadding="0" border="0" style="" class="flexme3">
      <tbody>
<?php
	//pr($datas);
	 
	foreach ($datas as $posProduct){
 	
	?>
	
	<tr id='<?php echo 'row_'.$posProduct['id'];?>'>
  		<td align='left'><div style='width: 300px;' class='alistname'><?php echo $posProduct['name']; ?>&nbsp;</div></td>
 	</tr>
 <?php }?>
     </table>
    </div>