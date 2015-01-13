<?php  echo $this->Html->script(array('ui-10/jquery-1.10.2' )); ?>
<span class='Print_Button'><span class='print_img'>&nbsp;&nbsp;</span> &nbsp;Print</span>
<div class="reportWapper" id="ServiceReciveInvoice">

<style>
.reportWapper {
	width:298px;
	font:Arial, Helvetica, sans-serif;
	font-size:10px;
	height:420px;
	padding-top:60px;
}
.top_heading{
	margin-top:30px;
	height:130px;
	font:Arial, Helvetica, sans-serif;
	font-size:10px;
 }
.top_heading p{
	float:left;
	font:Arial, Helvetica, sans-serif;
	font-size:10px !important;
}
.top_heading_left{
	width:200px;
	line-height:14px;
}
.top_head_right{
	border:1px solid #999999;
	padding:10px;
	 
	
}
.product_table_div{
	border:1px solid #999999;
	padding:0px 5px;
	margin:0px 10px 10px;
	font:Arial, Helvetica, sans-serif;
	font-size:10px;
	width:280px;
}
.product_table td ,  .full_data_div table td{
	font:Arial, Helvetica, sans-serif;
	font-size:10px;
	padding:2px 0px;
}
 .captionLeft{
 	vertical-align:text-top;
	text-align:left;
	font:Arial, Helvetica, sans-serif;
	font-size:10px;
	font-weight:bold;
 }

 
</style>


     <div class="top_heading">
      <p class="top_heading_left">
          SCHEDA N  <br />
          Via dei fulvi 14 <br />  
          00174, Roma <br />
          Tel : 06 60672975 <br /> 
          email : info@solutionpointroma.it <br />
          skype :  solution_point <br />
          www : solutionpointroma.it <br />
      </p>
      <p class="top_head_right" >2014 / <?php echo $deviceRecive['ServiceDeviceInfo']['id'];?></p>
    </div>
   <div class="product_table_div">
            Dal lun-mar-mer gio -sab 09:00 13:30, 15:00 19:30 
            <br />
           &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;  -Ven- 09:00 13:00, 15:00 19:30 
   </div>
  <div class="full_data_div">
        <table widtd="100%" border="0" class="product_table" cellspacing="0" cellpadding="0">
       <tbody>
        <tr>
          <td class="total_price" width="28%">NOME</td>
          <td class="total_price">:</td>
          <td class="numeric">&nbsp; <?php echo $deviceRecive['User']['firstname'];?></td>
        </tr>
        <tr>
          <td class="total_price">TEL</td>
          <td class="total_price">:</td>
          <td class="numeric"> &nbsp;<?php echo $deviceRecive['User']['phone']; ?>
          </td>
        </tr>
        <tr>
          <td class="total_price">EMAIL</td>
          <td class="total_price">:</td>
          <td class="numeric"> &nbsp;<?php echo $deviceRecive['User']['email_address']; ?>
          </td>
        </tr>
        <tr>
          <td class="total_price">MARCA</td>
          <td class="total_price">:</td>
          <td class="numeric">&nbsp; <?php echo $deviceRecive['ServiceDevice']['PosBrand']['name'];?> </td>
        </tr>
         <tr>
          <td class="total_price">PROD.</td>
          <td class="total_price">:</td>
          <td class="numeric">&nbsp; <?php echo $deviceRecive['ServiceDevice']['name'];	 ?></td>
        </tr>
        <tr>
          <td class="total_price">IMEI</td>
          <td class="total_price">:</td>
          <td class="numeric">&nbsp; <?php	echo $deviceRecive['ServiceDeviceInfo']['serial_no']; ?></td>
        </tr>
        <tr>
          <td class="total_price">ACCES.</td>
          <td class="total_price">:</td>
          <td class="numeric"> &nbsp;<?php
			if(!empty($deviceRecive['ServiceDeviceAcessory'])){
				foreach($deviceRecive['ServiceDeviceAcessory'] as $accesorylist){
					echo  $accesorylist['ServiceAcessory']['name']  ." , ";
					}
				}else{
					echo 'Acessory not mention!!!';
		}?>
          </td>
        </tr>
        <tr>
          <td class="total_price">DIFF.</td>
          <td class="total_price">:</td>
          <td class="numeric"> &nbsp;<?php
		if(!empty($deviceRecive['ServiceDeviceDefect'])){
			foreach($deviceRecive['ServiceDeviceDefect'] as $defectlist){
				echo  $defectlist['ServiceDefect']['name']  ." , ";
				}
			}else{
				echo 'Defect not mention!!!';
			}?>
          </td>
        </tr>
        <tr>
          <td class="total_price">PREV.</td>
          <td class="total_price">:</td>
          <td class="numeric">&nbsp; <?php	echo $deviceRecive['ServiceDeviceInfo']['estimated_budget']; ?></td>
        </tr>
        <tr>
          <td class="total_price">RIENT.</td>
          <td class="total_price">:</td>
          <td class="numeric">&nbsp; <?php echo empty($is_repet) ? '' : 'Yes';?></td>
        </tr>
        <tr>
          <td class="total_price">DATI IMP.</td>
          <td class="total_price">:</td>
          <td class="numeric">&nbsp; <?php	 echo ($deviceRecive['ServiceDeviceInfo']['is_data_backup'] == 1) ? 'Yes' : 'No'; ?></td>
        </tr>
        <tr>
          <td class="total_price">URGENTE</td>
          <td class="total_price">:</td>
          <td class="numeric">&nbsp; <?php echo ($deviceRecive['ServiceDeviceInfo']['is_urgent']==1)? 'Yes' : 'No'; ?>
          </td>
        </tr>
         <tr>
          <td class="total_price">PREV. ESTIMATO</td>
          <td class="total_price">:</td>
          <td class="numeric">&nbsp; <?php	echo $deviceRecive['ServiceDeviceInfo']['recive_date']; ?></td>
        </tr>
        <tr>
          <td class="total_price">CONSEG. PREV</td>
          <td class="total_price">:</td>
          <td class="numeric"> <?php	echo $deviceRecive['ServiceDeviceInfo']['estimated_date']; ?></td>
        </tr>
         </table>
   </div>
 
 
   <div class="reviewer_div">
        <table width="100%" border="0"   class="reviewer_table" cellspacing="0" cellpadding="0">
            <tbody>
                <tr>
                <td width="60%" class="captionLeft" >&nbsp;&nbsp;&nbsp;
                    <span><?php echo 'Roma, '.'&nbsp;'.date("d/m/Y");?></span>
                </td>
                <td width="40%" class="captionLeft">
                   &nbsp;<?php echo $this->Session->read('Auth.User.firstname')." ".$this->Session->read('Auth.User.lastname');?>
                </td>
                </tr>
            </tbody>
        </table>
			</div>
</div>
<div class="clr">
</div><script type="text/javascript" >
	$(function(){
	 $(".Print_Button").on('click',function(e){
		 $('.Print_Button').html('');
		 Popup($("#ServiceReciveInvoice").html());
 	 });
    });
</script>
