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
    <h2>Income Statement</h2>
    <h2>Begging Operating Inventory</h2>
    <h2>January 01,2009</h2>
   </div>
</div>

<hr style='background-color:#000000;border-width:0;color:#000000;height:2px;line-height:0;text-align:left;width:97%;'/>

<table id="hor-zebra"  class="left_table" summary="2007 Major IT Companies' Profit">
    <thead>
    	<tr>
        	<th scope="col" colspan="5">Income</th>
        </tr>
    </thead>
        
    <tbody>
   <?php 
   
   
	$total_income = 0;
	foreach($Income_Heads as $incomehead){?>
		 
    	<tr class="odd">
        	<td colspan="2"><?php echo $incomehead['0']['AccountName'];?></td>
            <td class="td_right">$</td>
            <td colspan="2" class="td_right"><?php echo number_format($incomehead['0']['Balance'], 2, '.', ',')?></td>
        </tr>
        <?php 
		$total_income = $total_income +$incomehead['0']['Balance']; 
		}?>
        <tr>
        	<td colspan="5" style="font-weight:bold; text-align:right"><hr style='background-color:#000000;border-width:0;color:#000000;height:2px;line-height:0; width:70px; margin-right:1px;'/></td>
        </tr>
        
        <tr>
        	<td colspan="2" style="font-weight:bold">Income</td>
            <td class="td_right">$</td>
            <td colspan="2" class="td_right"><?php echo number_format($total_income, 2, '.', ',');?></td>
        </tr>
    </tbody>
</table>

<table id="hor-zebra" summary="2007 Major IT Companies' Profit">
    <thead>
    	<tr>
        	<th scope="col" colspan="5">Expense </th>
        </tr>
    </thead>
        
    <tbody>
     <?php 
	$total_expenses = 0;
	foreach($expenses as $expense){?>
    	<tr class="odd">
        	<td colspan="2"><?php echo $expense['0']['AccountName'];?></td>
            <td class="td_right">$</td>
            <td colspan="2" class="td_right"><?php echo number_format($expense['0']['Balance'], 2, '.', ',')?></td>
        </tr>
         <?php 
		$total_expenses = $total_expenses +$expense['0']['Balance']; 
		}?>
    
        <tr>
        	<td colspan="5" style="font-weight:bold; text-align:right"><hr style='background-color:#000000;border-width:0;color:#000000;height:2px;line-height:0; width:70px; margin-right:1px;'/></td>
        </tr>
        
        <tr>
        	<td colspan="2" style="font-weight:bold">Expense</td>
            <td class="td_right">$</td>
            <td colspan="2" class="td_right"><?php echo number_format($total_expenses, 2, '.', ',');?></td>
        </tr>
    </tbody>
</table>

</div>