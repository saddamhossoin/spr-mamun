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

    <table id="hor-zebra"  class="left_table">
        <thead>
            <tr>
                <th scope="col" colspan="0">Trial Balance</th>
            </tr>
            <tr>
                <th scope="col">Account Head</th>
                <th scope="col1">Debit</th>
                <th scope="col1">Credit</th>
            </tr>
        </thead>
            
        <tbody>
       <?php 
        $totalCredit = 0;
        $totalDabit = 0;
        foreach($trialbalances as $trialbalance){
		if($trialbalance['0']['Balance'] !=0 ){
		?>
             <tr class="odd">
                <td width="50%"><?php echo $trialbalance['0']['AccountName'];?></td>
                <?php if ($trialbalance['0']['Balance'] < 0){?> 
                <td width="25%">$<?php echo  number_format(($trialbalance['0']['Balance'] * -1), 2, '.', ',');
				$totalDabit = $totalDabit + ($trialbalance['0']['Balance']*-1);
				?></td>
                <td width="25%">&nbsp;</td>
                <?php } else{?> 
                <td>&nbsp;</td>
                <td>$<?php echo  number_format($trialbalance['0']['Balance'] , 2, '.', ',');
				$totalCredit = $totalCredit + $trialbalance['0']['Balance'];
				?></td>
                <?php } ?>
            </tr>
            <?php }}?>
            <tr>
                <td style="font-weight:bold">Balance</td>
                <td style="font-weight:bold">$<?php echo number_format($totalDabit, 2, '.', ',');?></td>
                <td style="font-weight:bold">$<?php  echo number_format($totalCredit, 2, '.', ',');?></td>
            </tr>
        </tbody>
    </table>
 </div>
<div>
</div>
<style>
/* ------------------
 styling for the tables 
   ------------------   */
td.td_right{
	text-align:right;
	}

.address_info_div h3{
	font-weight:bold;
	text-align: left;
	font-size:11px;
	}
.company_info_div h2{
	font-weight:bold;
	text-align:center;
	} 

.header_part_bs{
	height:140px;
	width:700px;
	}
.company_info_div{
	height:140px;
	width:190px;
	float:left;
	}
.address_info_div{
	height:140px;
	width:250px;
	float:left;
	}
.full_balance_sheet_div{
	width:700px;
	border:1px solid #000;
	display:inline-table;

	}
#hor-zebra  th {
    background: none repeat scroll 0 0 #b9c9fe;
    border-bottom: 1px solid #fff;
    _border-top: 4px solid #aabcfe;
    color: #000;
    font-size: 13px;
    font-weight: normal;
    padding: 8px;
	text-align:center;
}
.left_table{
	width: 320px;
	}   
   
   
body
{
	line-height: 1.6em;
}

#box-table-a
{
	font-family: "Lucida Sans Unicode", "Lucida Grande", Sans-Serif;
	font-size: 12px;
	margin: 45px;
	width: 480px;
	text-align: left;
	border-collapse: collapse;
}
#box-table-a th
{
	font-size: 13px;
	font-weight: normal;
	padding: 8px;
	background: #b9c9fe;
	border-top: 4px solid #aabcfe;
	border-bottom: 1px solid #fff;
	color: #039;
}
#box-table-a td
{
	padding: 8px;
	background: #e8edff; 
	border-bottom: 1px solid #fff;
	color: #669;
	border-top: 1px solid transparent;
}
#box-table-a tr:hover td
{
	background: #d0dafd;
	color: #339;
}


#box-table-b
{
	font-family: "Lucida Sans Unicode", "Lucida Grande", Sans-Serif;
	font-size: 12px;
	margin: 45px;
	width: 480px;
	text-align: center;
	border-collapse: collapse;
	border-top: 7px solid #9baff1;
	border-bottom: 7px solid #9baff1;
}
#box-table-b th
{
	font-size: 13px;
	font-weight: normal;
	padding: 8px;
	background: #e8edff;
	border-right: 1px solid #9baff1;
	border-left: 1px solid #9baff1;
	color: #039;
}
#box-table-b td
{
	padding: 8px;
	background: #e8edff; 
	border-right: 1px solid #aabcfe;
	border-left: 1px solid #aabcfe;
	color: #669;
}


#hor-zebra
{
	font-family: "Lucida Sans Unicode", "Lucida Grande", Sans-Serif;
	font-size: 12px;
	_margin: 45px;
	width: 660px;
	float:left;
	text-align: left;
	border-collapse: collapse;
	border:1px solid #69c;
	margin-left:16px;
}

#hor-zebra th
{
	font-size: 14px;
	font-weight: normal;
	padding: 10px 8px;
	color: #000;
}
#hor-zebra td
{
	padding: 5px;
	color: #000;
}
#hor-zebra .odd
{
	_background: #e8edff; 
}


#ver-zebra
{
	font-family: "Lucida Sans Unicode", "Lucida Grande", Sans-Serif;
	font-size: 12px;
	margin: 45px;
	width: 480px;
	text-align: left;
	border-collapse: collapse;
}
#ver-zebra th
{
	font-size: 14px;
	font-weight: normal;
	padding: 12px 15px;
	border-right: 1px solid #fff;
	border-left: 1px solid #fff;
	color: #039;
}
#ver-zebra td
{
	padding: 8px 15px;
	border-right: 1px solid #fff;
	border-left: 1px solid #fff;
	color: #669;
}
.vzebra-odd
{
	background: #eff2ff;
}
.vzebra-even
{
	background: #e8edff;
}
#ver-zebra #vzebra-adventure, #ver-zebra #vzebra-children
{
	background: #d0dafd;
	border-bottom: 1px solid #c8d4fd;
}
#ver-zebra #vzebra-comedy, #ver-zebra #vzebra-action
{
	background: #dce4ff;
	border-bottom: 1px solid #d6dfff;
}


#one-column-emphasis
{
	font-family: "Lucida Sans Unicode", "Lucida Grande", Sans-Serif;
	font-size: 12px;
	margin: 45px;
	width: 480px;
	text-align: left;
	border-collapse: collapse;
}
#one-column-emphasis th
{
	font-size: 14px;
	font-weight: normal;
	padding: 12px 15px;
	color: #039;
}
#one-column-emphasis td
{
	padding: 10px 15px;
	color: #669;
	border-top: 1px solid #e8edff;
}
.oce-first
{
	background: #d0dafd;
	border-right: 10px solid transparent;
	border-left: 10px solid transparent;
}
#one-column-emphasis tr:hover td
{
	color: #339;
	background: #eff2ff;
}




#newspaper-b
{
	font-family: "Lucida Sans Unicode", "Lucida Grande", Sans-Serif;
	font-size: 12px;
	margin: 45px;
	width: 480px;
	text-align: left;
	border-collapse: collapse;
	border: 1px solid #69c;
}
#newspaper-b th
{
	padding: 15px 10px 10px 10px;
	font-weight: normal;
	font-size: 14px;
	color: #039;
}
#newspaper-b tbody
{
	background: #e8edff;
}
#newspaper-b td
{
	padding: 10px;
	color: #669;
	border-top: 1px dashed #fff;
}
#newspaper-b tbody tr:hover td
{
	color: #339;
	background: #d0dafd;
}


#rounded-corner
{
	font-family: "Lucida Sans Unicode", "Lucida Grande", Sans-Serif;
	font-size: 12px;
	margin: 45px;
	width: 480px;
	text-align: left;
	border-collapse: collapse;
}
#rounded-corner thead th.rounded-company
{
	background: #b9c9fe url('table-images/left.png') left -1px no-repeat;
}
#rounded-corner thead th.rounded-q4
{
	background: #b9c9fe url('table-images/right.png') right -1px no-repeat;
}
#rounded-corner th
{
	padding: 8px;
	font-weight: normal;
	font-size: 13px;
	color: #039;
	background: #b9c9fe;
}
#rounded-corner td
{
	padding: 8px;
	background: #e8edff;
	border-top: 1px solid #fff;
	color: #669;
}
#rounded-corner tfoot td.rounded-foot-left
{
	background: #e8edff url('table-images/botleft.png') left bottom no-repeat;
}
#rounded-corner tfoot td.rounded-foot-right
{
	background: #e8edff url('table-images/botright.png') right bottom no-repeat;
}
#rounded-corner tbody tr:hover td
{
	background: #d0dafd;
}


#background-image
{
	font-family: "Lucida Sans Unicode", "Lucida Grande", Sans-Serif;
	font-size: 12px;
	margin: 45px;
	width: 480px;
	text-align: left;
	border-collapse: collapse;
	background: url('table-images/blurry.jpg') 330px 59px no-repeat;
}
#background-image th
{
	padding: 12px;
	font-weight: normal;
	font-size: 14px;
	color: #339;
}
#background-image td
{
	padding: 9px 12px;
	color: #669;
	border-top: 1px solid #fff;
}
#background-image tfoot td
{
	font-size: 11px;
}
#background-image tbody td
{
	background: url('table-images/back.png');
}
* html #background-image tbody td
{
	/* 
	   ----------------------------
		PUT THIS ON IE6 ONLY STYLE 
		AS THE RULE INVALIDATES
		YOUR STYLESHEET
	   ----------------------------
	*/
	filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='table-images/back.png',sizingMethod='crop');
	background: none;
}	
#background-image tbody tr:hover td
{
	color: #339;
	background: none;
}


#gradient-style
{
	font-family: "Lucida Sans Unicode", "Lucida Grande", Sans-Serif;
	font-size: 12px;
	margin: 45px;
	width: 480px;
	text-align: left;
	border-collapse: collapse;
}
#gradient-style th
{
	font-size: 13px;
	font-weight: normal;
	padding: 8px;
	background: #b9c9fe url('table-images/gradhead.png') repeat-x;
	border-top: 2px solid #d3ddff;
	border-bottom: 1px solid #fff;
	color: #039;
}
#gradient-style td
{
	padding: 8px; 
	border-bottom: 1px solid #fff;
	color: #669;
	border-top: 1px solid #fff;
	background: #e8edff url('table-images/gradback.png') repeat-x;
}
#gradient-style tfoot tr td
{
	background: #e8edff;
	font-size: 12px;
	color: #99c;
}
#gradient-style tbody tr:hover td
{
	background: #d0dafd url('table-images/gradhover.png') repeat-x;
	color: #339;
}


#pattern-style-a
{
	font-family: "Lucida Sans Unicode", "Lucida Grande", Sans-Serif;
	font-size: 12px;
	margin: 45px;
	width: 480px;
	text-align: left;
	border-collapse: collapse;
	background: url('table-images/pattern.png');
}
#pattern-style-a thead tr
{
	background: url('table-images/pattern-head.png');
}
#pattern-style-a th
{
	font-size: 13px;
	font-weight: normal;
	padding: 8px;
	border-bottom: 1px solid #fff;
	color: #039;
}
#pattern-style-a td
{
	padding: 8px; 
	border-bottom: 1px solid #fff;
	color: #669;
	border-top: 1px solid transparent;
}
#pattern-style-a tbody tr:hover td
{
	color: #339;
	background: #fff;
}


#pattern-style-b
{
	font-family: "Lucida Sans Unicode", "Lucida Grande", Sans-Serif;
	font-size: 12px;
	margin: 45px;
	width: 480px;
	text-align: left;
	border-collapse: collapse;
	background: url('table-images/patternb.png');
}
#pattern-style-b thead tr
{
	background: url('table-images/patternb-head.png');
}
#pattern-style-b th
{
	font-size: 13px;
	font-weight: normal;
	padding: 8px;
	border-bottom: 1px solid #fff;
	color: #039;
}
#pattern-style-b td
{
	padding: 8px; 
	border-bottom: 1px solid #fff;
	color: #669;
	border-top: 1px solid transparent;
}
#pattern-style-b tbody tr:hover td
{
	color: #339;
	background: #cdcdee;
}




</style>