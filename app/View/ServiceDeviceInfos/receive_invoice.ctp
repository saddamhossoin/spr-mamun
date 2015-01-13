<?php   //pr($deviceRecive);?>
<html>
<head>
<title>Report For SPR</title>
<?php echo $this->Html->css(array('module/ServiceDeviceInfos/receive_invoices'));?>
<?php echo $this->Html->css(array('common/common','common/rounded','ui/ui.base','themes/black_rose/ui','common/reportgrid')); 
 	//echo $this->Html->css(array('common/report'));
 ?>	
</head>
 <body>
<div class="full_div_report_wrapper">
 <div class="sec_div_wrapper">
 <div class="customer_info_div">
<div class="title_div_logo"><h2 style="font-weight:normal; font-size:20px;">N&deg; <?php echo $deviceRecive['ServiceDeviceInfo']['id']?></h2></div>
   <div class="customer_left_div">
     <h2 class="company_heading_right">SOLUTION POINT ROMA</h2>
    <div class="customer_info_right">
    <div> Via Dei Fulvi,14</div>
	<div> 00174 Roma - Italia</div>
    <div> Telefono +39 06 60672975</div>
    <div> P.IVA IT12134951008</div>
    <div> www.solutionpointroma.it</div>
    <div> skype_solution_point</div>
	<div> E-mail: solutionpointroma@yahoo.com</div>
    </div>
  </div>
  <div class="customer_right_div">
   <div class="title_logo_right"><?php  echo $this->Html->image('wpage/spr/logo.png', array("alt" => "No Image","width"=>"200" ,"height"=>"70","border"=>"0",'url' => array('controller' => '#', 'action' =>'#')));?></div>
  
  	<div class="product_table_div">
 		<div class="full_table_div">
			<div class="orari">ORARI</div>
 		 <div class="full_table_below">	
			<div style="border-right:1px solid #000000;   border-bottom:1px solid #000000;border-top:1px solid #000000">Lun-Mar-Mer-Gia-Sab</div>
			<div style="border-right:1px solid #000000;  border-bottom:1px solid #000000;border-top:1px solid #000000">Venerdi</div>
			<div style="border-right:1px solid #000000;"> 9:00 - 13:30</div>
			<div style="border-right:1px solid #000000;">9:00 - 13:30</div>
 			<div style="border-right:1px solid #000000;border-bottom:1px solid #000000">15:00 - 19:30</div>
			<div style="border-right:1px solid #000000;border-bottom:1px solid #000000">15:00 - 19:30</div>
 		</div>
 		</div>
 	</div>
   </div>
</div>
 <div class="full_data_div">
  <div class="full_data_below">
   	<div>NOME :&nbsp;<?php echo $deviceRecive['User']['firstname'];?></div>
	<div>TELEFONO :&nbsp;<?php echo $deviceRecive['User']['phone']; ?></div>
	<div>E-MAIL :&nbsp;<?php echo $deviceRecive['User']['email_address']; ?></div>
	<div>MARCA/MODELLO :&nbsp; <?php echo $deviceRecive['ServiceDevice']['PosBrand']['name'];?></div>
	<div>PROD :&nbsp; <?php echo $deviceRecive['ServiceDevice']['name'];?></div>
	<div>IMEI :&nbsp; <?php	echo $deviceRecive['ServiceDeviceInfo']['serial_no']; ?></div>
	<div> ACCESSORI :&nbsp;<?php
			if(!empty($deviceRecive['ServiceDeviceAcessory'])){
				foreach($deviceRecive['ServiceDeviceAcessory'] as $accesorylist){
					echo  $accesorylist['ServiceAcessory']['name']  ." , ";
					}
				}else{
					echo 'Acessory not mention!!!';
		}?> 
		</div>
	<div> DIFETTO : &nbsp;<?php
		if(!empty($deviceRecive['ServiceDeviceDefect'])){
			foreach($deviceRecive['ServiceDeviceDefect'] as $defectlist){
				echo  $defectlist['ServiceDefect']['name']  ." , ";
				}
			}else{
				echo 'Defect not mention!!!';
			}?> </div>
   </div>
  
   <div style="line-height:20px; margin-left:10px;"> 
   <div>PREVENTIVO :&nbsp;<?php echo $deviceRecive['User']['phone']; ?>&nbsp;&nbsp;&nbsp;STIMATO :&nbsp; <?php	echo $deviceRecive['ServiceDeviceInfo']['recive_date']; ?></div>
   
   <div>RIENTRO :&nbsp;<?php echo $deviceRecive['User']['phone']; ?>&nbsp;&nbsp;&nbsp;PIN :&nbsp; <?php	echo $deviceRecive['ServiceDeviceInfo']['recive_date']; ?></div>
   
    <div>DATI IMPORTANTI :&nbsp;<?php  if($deviceRecive['ServiceDeviceInfo']['is_data_backup']=='0'){echo 'No';}else{echo $deviceRecive['ServiceDeviceInfo']['is_data_backup'];} ?>&nbsp;&nbsp;&nbsp;URGENT :&nbsp; <?php	
	$yes_no = array(0=>'No', 1=>'Yes');
	echo $yes_no[$deviceRecive['ServiceDeviceInfo']['is_urgent']]; ?></div>
	
	<div>NOTE :&nbsp; ______________________</div>
    </div>
 </div>
 </div>


</div>
</body>
</html>
 