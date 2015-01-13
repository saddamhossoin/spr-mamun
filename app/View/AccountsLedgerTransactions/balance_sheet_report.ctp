<?php //pr($debit_assets);?>
<div class="full_balance_sheet_div">

<div class="header_part_bs">
 <div class="address_info_div">
	<h3>Solution Point Romma</h3>
    <h3>XXXXX-XXX-XXXXX</h3>
    <h3>XXXXX-XXX-XXXXX</h3>
    <h3>XXXXX-XXX-XXXXX</h3>
   </div>
   
  <div class="company_info_div">
	<h2>Solution Point Romma</h2>
    <h2>Balanced Sheet</h2>
    <h2>Begging Operating Inventory</h2>
    <h2>January 01,2009</h2>
   </div>
</div>

<hr style='background-color:#000000;border-width:0;color:#000000;height:2px;line-height:0;text-align:left;width:97%;'/>

<table id="hor-zebra"  class="left_table" summary="2007 Major IT Companies' Profit">
    <thead>
    	<tr>
        	<th scope="col" colspan="5">Assets</th>
        </tr>
    </thead>
        
    <tbody>
   <?php 
   
   $netBalance = 0;
	$total_assets = 0;
	foreach($Assest as $assest){?>
		 
    	<tr class="odd">
        	<td colspan="2"><?php echo $assest['0']['AccountName'];?></td>
            <td class="td_right">$</td>
            <td colspan="2" class="td_right"><?php echo  number_format($assest['0']['Balance'], 2, '.', ',')?></td>
        </tr>
        <?php 
		$netBalance = $netBalance +$assest['0']['Balance'];
		$total_assets = $total_assets +$assest['0']['Balance']; 
		}?>
        <tr>
        	<td colspan="5" style="font-weight:bold; text-align:right"><hr style='background-color:#000000;border-width:0;color:#000000;height:2px;line-height:0; width:70px; margin-right:1px;'/></td>
        </tr>
        
        <tr>
        	<td colspan="2" style="font-weight:bold">Current Assets</td>
            <td class="td_right">$</td>
            <td colspan="2" class="td_right"><?php echo number_format($total_assets, 2, '.', ',');?></td>
        </tr>
    </tbody>
</table>

<table id="hor-zebra" summary="">
    <thead>
    	<tr>
        	<th scope="col" colspan="5">Liabilites </th>
        </tr>
    </thead>
        
    <tbody>
     <?php 
	$total_liabilites = 0;
	foreach($Liabilites as $liability){?>
    	<tr class="odd">
        	<td colspan="2"><?php echo $liability['0']['AccountName'];?></td>
            <td class="td_right">$</td>
            <td colspan="2" class="td_right"><?php echo number_format($liability['0']['Balance'], 2, '.', ',')?></td>
        </tr>
         <?php 
		 $netBalance = $netBalance + $liability['0']['Balance'];
		$total_liabilites = $total_liabilites +$liability['0']['Balance']; 
		}?>
    
        <tr>
        	<td colspan="5" style="font-weight:bold; text-align:right"><hr style='background-color:#000000;border-width:0;color:#000000;height:2px;line-height:0; width:70px; margin-right:1px;'/></td>
        </tr>
        
        <tr>
        	<td colspan="2" style="font-weight:bold">Current Liabilities</td>
            <td class="td_right">$</td>
            <td colspan="2" class="td_right"><?php echo number_format($total_liabilites, 2, '.', ',');?></td>
        </tr>
    </tbody>
</table>

</div>
<div>
<?php /*?>	<h3>Net Balance : <?php //echo $netBalance;// number_format($total_assets - $total_liabilites , 2, '.', ',');?></h3><?php */?>
</div>