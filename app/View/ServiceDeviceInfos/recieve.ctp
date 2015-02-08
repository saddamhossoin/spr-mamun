<?php  //pr($posSale);?>
<html>
<head>
<title>Report For SPR</title>
<style type="text/css">
.full_data_below{
    font-family: times new roman;
    font-size: 12px;
    line-height: 22px;
    padding: 10px;
    width: 500px;
}
.print_img{
	padding-right:10px;
}
.Print_Button{
   font-weight:bold;
}
.recive_fotter div{
	float:left;
	width:45%;
	margin-left:15px;
}
</style>
</head>

<body>
<?php  //var_dump($deviceRecive);
  $data_important = array(0=>'No',1=>'Yes');?>
	<div class="full_div_report_wrapper">
		<div class="sec_div_wrapper">
			<span class='Print_Button'>
            <span class='print_img'>&nbsp;&nbsp;</span> &nbsp;Print</span>
        	<div class="title_div_logo"> <?php echo $deviceRecive['ServiceDeviceInfo']['id']?></div>
            <div><span class="title_s">NOME/ COGNOME</span>&nbsp;<?php echo $deviceRecive['User']['firstname'] ." ".$deviceRecive['User']['lastname'] ;?></div>
            <div> <span class="title_s">Telefono </span>&nbsp;<?php echo $deviceRecive['User']['phone']; ?></div>
            <div> <span class="title_s">Email</span>&nbsp;<?php echo $deviceRecive['User']['email_address']; ?></div>
            <div> <span class="title_s">Marca</span>&nbsp; <?php echo $deviceRecive['ServiceDevice']['PosBrand']['name'];?></div>
            <div><span class="title_s">Prodotto</span> &nbsp; <?php echo $deviceRecive['ServiceDevice']['name'];?></div>
            <div><span class="title_s">IMEI</span> &nbsp; <?php	echo $deviceRecive['ServiceDeviceInfo']['serial_no']; ?></div>
             <div style="clear:both;"></div>
            <div style="width:267px;"><span class="title_s">Accessori </span> &nbsp;<?php
                if(!empty($deviceRecive['ServiceDeviceAcessory'])){
                    foreach($deviceRecive['ServiceDeviceAcessory'] as $accesorylist){
                        echo  $accesorylist['ServiceAcessory']['name']  ." , ";
                        }
                    }else{
                        echo 'Acessory not mention!!!';
            	}?>
        </div>
            <div style="line-height: 13px; width:267px;"><span class="title_s">Difetto </span> &nbsp;
			<?php
				if(!empty($deviceRecive['ServiceDeviceDefect'])){
					foreach($deviceRecive['ServiceDeviceDefect'] as $defectlist){
						echo  $defectlist['ServiceDefect']['name']  ." , ";
					}
				}else{
					echo 'Defect not mention!!!';
				}
			?>
       </div>
         
    <div class="recive_fotter">
	    <div>PREVENTIVO :&nbsp;<?php echo $data_important[$deviceRecive['ServiceDeviceInfo']['is_customer_confirmation']]; ?></div>
    	<div>STIMATO :&nbsp; <?php echo $deviceRecive['ServiceDeviceInfo']['estimated_budget']; ?></div>
    </div>
    <div class="recive_fotter">
	    <div>RIENTRO :&nbsp;<?php  if(empty($is_repet)){ echo 'No';}else{ echo 'Yes';} ?></div>
    	<div>PIN :&nbsp; <?php	echo $deviceRecive['ServiceDeviceInfo']['is_phone_block'] . " / ". $deviceRecive['ServiceDeviceInfo']['is_sim_pc_Lock'] ; ?></div>
    </div>
    
    <div class="recive_fotter">
    	<div>DATI IMPORTANTI :&nbsp;<?php 
	   
    	echo $data_important[$deviceRecive['ServiceDeviceInfo']['is_data_backup']]; ?></div>
    	<div>URGENT :&nbsp; <?php	 
		if($deviceRecive['ServiceDeviceInfo']['is_urgent'] == 121){
			echo 'Express Service';
		}else{
			echo $data_important[$deviceRecive['ServiceDeviceInfo']['is_urgent']];
		} ?></div>
    </div>
    <div style="clear:both">&nbsp;</div>
        
    <div style="height: 100px; margin-left: 9px; margin-top: 1px; display: block; font-size: 10px;">NOTE :&nbsp;  <?php	echo $deviceRecive['ServiceDeviceInfo']['description']; 
	//pr();
	
	?> </div>
    <div class="inovice_fotter">
    <span>Counter:<?php echo $deviceRecive['User']['counter_name'];?></span>
    <span>Printed:<?php echo date('d/m/y');?></span>
    </div>
       <style type="text/css">
		.inovice_fotter{
 			bottom: 0;
			height: 14px;
			margin-top: -22px;
			position: unset;
			width: 309px;
			
		}
		.inovice_fotter span{
			float:left;
			display:inline-block;
			width:49%;
			text-align:center;
		}
		.recive_fotter div {
			float: left;
			margin-left: 15px;
			width: 44%;
			font-size:11px;
		}
		.recive_fotter{
			clear:both;
			width:326px;
		}
		.sec_div_wrapper {
			border: 1px solid;
			height: 466px;
			margin: auto;
			width: 326px;
			font-size:8px;
			font-size:11px !important;
		}
		.sec_div_wrapper div{
			font-size:11px !important;
			margin-left:15px;
		}
		.title_div_logo{
			margin-left:44px;
			margin-bottom:155px;
			margin-top:17px;
		}
		.title_s{
			width:110px;
			display:inline-block;
			text-transform:uppercase;
			font-size:11px !important;
		}

		</style>
        </div>
	</div>
<script type="text/javascript">
jQuery(function($){ 
 $(".ui-dialog-titlebar-close").on('click',function(){
		 		window.location.reload();
				 $('#Cancel').click();
			 	 $("#PosSaleAddForm").trigger('reset');
				 $("#PosSaleAmountAddForm").trigger('reset');
 	  });
	  });
	  </script>




</div>
</div>
</body>
</html>



<div style="background:#fff; clear:both;color:#000000; margin-top:25px;" >
  <?php //echo $this->element('sql_dump'); ?>
</div>
<script type="text/javascript" >
	$(function(){
	 $(".Print_Button").on('click',function(e){
		 $('.Print_Button').html('');
		 Popup($(".sec_div_wrapper").html());
		$('.Print_Button').html("<span class='print_img'>&nbsp;&nbsp;</span> &nbsp;Print");
	 });
    });
</script>

