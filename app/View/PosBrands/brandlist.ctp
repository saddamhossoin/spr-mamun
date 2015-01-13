 <div class="bDiv" style="height: auto;">
<div class="hDiv">
  <div class="hDivBox">
    <table cellspacing="0" cellpadding="0">
      <thead>
        <tr>
           <th align="left" ><div style=" width: 100px;font-weight:bold; font-size:11px"><?php echo 'Name';?></div></th>
			<th align="left" ><div style=" width: 100px;font-weight:bold; font-size:11px"><?php echo 'Address';?></div></th>
		   	<th align="left" ><div style=" width: 250px;font-weight:bold; font-size:11px"><?php echo 'Modified';?></div></th>
			<th align="left" ><div style=" width: 100px;font-weight:bold; font-size:11px"><?php echo 'Modified By';?></div></th>
         </tr>
      </thead>
	  
    </table>
  </div>
</div>
 
  <table cellspacing="0" cellpadding="0" border="0" style="" class="flexme3">
      <tbody>
	  <?php 
	   
	  foreach ($posBrands as $posProduct){ 
	  
	  ?>
	 	<tr id='<?php echo 'row_'.$posProduct['PosBrand']['id'];?>'>
	 	
		<td align='left'><div style='width: 100px;' class='alistname'><?php echo $posProduct['PosBrand']['name']; ?>&nbsp;</div></td>
		<td align='left'><div style='width: 100px;' class='alistname'>
		 	 	<?php echo $posProduct['PosBrand']['address']; ?>
			
		</div></td>
		<td align='left'><div style='width: 250px;' class='alistname'>
			 
			<?php echo $posProduct['PosBrand']['created']; ?>
		</div></td>
		<td align='left'><div style='width: 100px;' class='alistname'><?php  echo $userlists[$posProduct['PosBrand']['modified_by']]; ?>&nbsp;</div></td>
       
		
	</tr>
	 	 
<?php }  ?>

    </table>
    </div>