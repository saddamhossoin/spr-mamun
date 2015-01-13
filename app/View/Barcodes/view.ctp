<?php   echo $this->Html->css('common/grid'); 
	    echo $this->Html->script(array('common/commonindex'));?>
<div class="barcodes view">
	<table cellpadding="0" cellspacing="0" class="view_table">
	<?php $i = 0; $class = ' class="altrow"';?>
    <tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Created'); ?></td>
    <td> : </td>
    <td ><?php echo $barcodes[0]['Barcode']['created']; ?>&nbsp;</td> <?php $i++;?>
    </tr>
    <tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Lot Number'); ?></td>
    <td> : </td>
    <td ><?php echo $barcodes[0]['Barcode']['lot_number']; ?>&nbsp;</td> <?php $i++;?>
    </tr>
     <tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Number Of Barcode'); ?></td>
    <td> : </td>
    <td ><?php echo $barcodes[0]['Barcode']['number']; ?>&nbsp;</td> <?php $i++;?>
    </tr>
    <tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Product Category'); ?></td>
    <td> : </td>
    <td ><?php echo $barcodes[0]['Barcode']['pos_pcategory_id']; ?>&nbsp;</td> <?php $i++;?>
    </tr>
    
    	</table>
</div>
<div class="flexigrid" style="width: 100%;">
<div class="bDiv" style="height: auto;">
<div class="hDiv">
  <div class="hDivBox">
    <table cellspacing="0" cellpadding="0">
      <thead>
        <tr>
          	<th align="left" ><div style=" width: 100px;"> Id </div></th>
			<th align="left" ><div style=" width: 100px;"> Barcode </div></th>
         </tr>
      </thead>
    </table>
  </div>
</div>
 
  <table cellspacing="0" cellpadding="0" border="0" style="" class="flexme3">
      <tbody>
<?php
	$i = 0;
	foreach ($barcodes as $barcode):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr id='<?php echo 'row_'.$barcode['Barcode']['id'];?>'  <?php echo $class;?>>
		<td align='left'><div style='width: 100px;' class='alistname'><?php echo $barcode['Barcode']['id']; ?>&nbsp;</div></td>
 		<td align='left'><div style='width: 100px;' class='alistname'>
		 <?php echo $this->Html->image("../".$barcode['Barcode']['filename'], array("class"=>"barcode","alt" => $barcode['Barcode']['filename'] ));?>
		 &nbsp;</div></td>
 		 
	</tr>
<?php endforeach; ?>
  </tbody>
    </table>
    </div>
    </div>
  
  