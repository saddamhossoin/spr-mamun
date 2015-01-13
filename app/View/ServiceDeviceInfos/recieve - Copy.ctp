<div id="invoice" class="Print_content_areas" style="width:595px;">
  <?php  
  
  if(!empty($deviceRecive)){ ?>
  <table  cellpadding="0"  border="0" width="100%" class="invoice_table_info">
    <tr class="testlist_report altrow">
      <td class="left_part heading">Customer Name:<?php echo $deviceRecive['User']['name'];?></td>
      <td class="right_part heading">Device : <span><?php echo $deviceRecive['ServiceDevice']['name'];?> </span></td>
    </tr>
    <tr class="testlist_report altrow">
      <td class="left_part heading">Email :<?php echo $deviceRecive['User']['email_address'];?></td>
      <td class="right_part heading">Serial : <span> <?php echo $deviceRecive['ServiceDeviceInfo']['serial_no'];?></span></td>
    </tr>
    <tr class="testlist_report altrow">
      <td class="center_part heading">Mobile : <span><?php echo $deviceRecive['User']['phone'];?></span></td>
      <td class="left_part heading">Recieve Date : <span> <?php echo   date("j-n-Y H:i",strtotime($deviceRecive['ServiceDeviceInfo']['recive_date']));?></span></td>
    </tr>
    <tr class="testlist_report altrow">
      <td class="center_part heading">   PIva : <span><?php echo $deviceRecive['User']['piva'];?></span ></td>
      <td class="right_part heading">Delivery Date : <span> <?php echo   date("j-n-Y H:i",strtotime($deviceRecive['ServiceDeviceInfo']['estimated_date']));?></span></td>
    </tr>
    <tr class="testlist_report altrow">
      <td class="center_part heading" colspan="2">   Address : <span><?php echo $deviceRecive['User']['address'];?></span ></td>
    </tr>
  </table>
  <div class="report">
    <div class="description_head">Description:
      <p class="description_details"><?php echo $deviceRecive['ServiceDeviceInfo']['description']; ?> </p>
    </div>
     
    <div class="description_head">Data Backup:
      <p class="description_details"><?php if($deviceRecive['ServiceDeviceInfo']['is_data_backup'] == 1){
		  echo 'Yes';
	  	}else{
	  		echo 'No';
	  	}?> </p>
    </div>
    
    <div class="report">
    <div class="description_head">Sim/Pc Lock:
      <p class="description_details"><?php if($deviceRecive['ServiceDeviceInfo']['is_sim_pc_Lock'] ==0){
	  		echo 'No';
	  	  }else{
		  echo $deviceRecive['ServiceDeviceInfo']['is_sim_pc_Lock'];
	  		} ?> </p>
    </div>
    
    <div class="report">
    <div class="description_head">Phone Block:
      <p class="description_details">
	  <?php if( $deviceRecive['ServiceDeviceInfo']['is_phone_block'] == 0){
	  	echo 'No';
	  }else{
	  	echo  $deviceRecive['ServiceDeviceInfo']['is_phone_block'];
	  } ?> </p>
    </div>
    <div class="description_head">Defect Area:
      <p class="description_details">
        <?php
 	if(!empty($deviceRecive['ServiceDeviceDefect'])){
 		foreach($deviceRecive['ServiceDeviceDefect'] as $defectlist){
    		echo $ServiceDeviceDefects[$defectlist['service_defect_id']] ." , ";
			}
		}else{
 			echo 'Defect not mention!!!';
		}?>
      </p>
    </div>
    <div class="description_head">Accessories:
     <p class="description_details">
      <?php
	  
 	if(!empty($deviceRecive['ServiceDeviceAcessory'])){
 		foreach($deviceRecive['ServiceDeviceAcessory'] as $accesorylist){
    		echo $ServiceDeviceAcessories[$accesorylist['service_acessory_id']] ." , ";
			}
		}else{
 			echo 'Acessory not mention!!!';
		}?>
        </p>
     </div>
  </div>
  <?php
	}else{ 
		echo "<span class='nodata'>There is no data</span>";
	}?>
    
    
</div>
</div>

</div>
<style type="text/css">
.view_table tr td:first-child {
    width: 10px !important;
}
.view_table tr:first-child {
    font-weight: bold;
 }
.description_head{
  	font-weight:bold;
	font-size:11px;
 	 }
.description_details{
	padding:2px;
	font-size:11px; 
	font-weight:normal;
	}
.invoice_table_info{
 	width:100%;
	margin-bottom:10px;
 }
 .invoice_table_info tr td{
	 font-size:11px;
	 line-height:14px;
	 
 }
</style>
