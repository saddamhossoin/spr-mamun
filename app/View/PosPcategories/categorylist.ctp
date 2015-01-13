 <div class="bDiv" style="height: auto;">
<div class="hDiv">
  <div class="hDivBox">
    <table cellspacing="0" cellpadding="0">
      <thead>
        <tr>
           <th align="left" ><div style=" width: 100px;font-weight:bold"><?php echo 'Name';?></div></th>
			<th align="left" ><div style=" width: 100px;font-weight:bold"><?php echo 'Description';?></div></th>
		   	<th align="left" ><div style=" width: 250px;font-weight:bold"><?php echo 'Modified';?></div></th>
			<th align="left" ><div style=" width: 100px;font-weight:bold"><?php echo 'Modified By';?></div></th>
         </tr>
      </thead>
	  
    </table>
  </div>
</div>
 
  <table cellspacing="0" cellpadding="0" border="0" style="" class="flexme3">
      <tbody>
	  <?php 
	  foreach ($posPcategories as $posProduct){ 
	  
	  ?>
	 	<tr id='<?php echo 'row_'.$posProduct['PosPcategory']['id'];?>'>
	 	
		<td align='left'><div style='width: 100px;' class='alistname'><?php echo $posProduct['PosPcategory']['name']; ?>&nbsp;</div></td>
		<td align='left'><div style='width: 100px;' class='alistname'>
		 	 	<?php echo $posProduct['PosPcategory']['description']; ?>
			
		</div></td>
		<td align='left'><div style='width: 250px;' class='alistname'>
			 
			<?php echo $posProduct['PosPcategory']['created']; ?>
		</div></td>
		<td align='left'><div style='width: 100px;' class='alistname'><?php  echo $userlists[$posProduct['PosPcategory']['modified_by']]; ?>&nbsp;</div></td>
       
		
	</tr>
	 	 
<?php }  ?>

    </table>
    </div>