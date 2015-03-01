<?php  //pr($posSale);?>
<html>
<head>
<title>Report For SPR</title>
<style type="text/css">
.print_img{
	padding-right:10px;
}
.Print_Button{
   font-weight:bold;
}
</style>
</head>

<body>
<?php // pr($deviceRecive);
  $data_important = array(0=>'No',1=>'Yes');?>
	<div class="full_div_report_wrapper">
    <span class='Print_Button'>
    <span class='print_img'>&nbsp;&nbsp;</span> &nbsp;Print</span>
		<div class="sec_div_wrapper">
         <?php  echo $this->Html->image("recive_background.jpg", array("class"=>"iripairbackground","alt" => $deviceRecive['ServiceDeviceInfo']['barcode_file'] ));?> 
        
        <div class="bg_div">
			
          <div class="print_left">
          <div class="bardoce_print"> <?php  echo $this->Html->image("../".$deviceRecive['ServiceDeviceInfo']['barcode_file'], array("class"=>"barcode","alt" => $deviceRecive['ServiceDeviceInfo']['barcode_file'] ));?> </div>
              <div><span class="title_s">Nome</span>&nbsp;<?php echo $deviceRecive['User']['firstname'];?></div>
            <div> <span class="title_s">Telefono</span>&nbsp;<?php echo $deviceRecive['User']['phone']; ?></div>
            <div> <span class="title_s">Email</span>&nbsp;<?php echo $deviceRecive['User']['email_address']; ?></div>
            <div> <span class="title_s">Marca/Modello</span>&nbsp;<?php echo $deviceRecive['ServiceDevice']['PosBrand']['name'];?></div>
            <div><span class="title_s">Product</span>&nbsp;<?php echo $deviceRecive['ServiceDevice']['name'];?></div>
            <div><span class="title_s">IMEI</span>&nbsp;<?php echo $deviceRecive['ServiceDeviceInfo']['serial_no']; ?></div>
             <div style="clear:both;"></div>
            <div style="width:267px;"><span class="title_s">Accessori</span>&nbsp;<?php
                if(!empty($deviceRecive['ServiceDeviceAcessory'])){
                    foreach($deviceRecive['ServiceDeviceAcessory'] as $accesorylist){
                        echo  $accesorylist['ServiceAcessory']['name']  ." , ";
                        }
                    }else{
                        echo 'Acessory not mention!!!';
            	}?>
        </div>
            <div style="line-height: 13px;"><span class="title_s">Difetto</span>&nbsp;<?php
			if(!empty($deviceRecive['ServiceDeviceDefect'])){
					foreach($deviceRecive['ServiceDeviceDefect'] as $defectlist){
						echo  $defectlist['ServiceDefect']['name']  ." , ";
					}
				}else{
					echo 'Defect not mention!!!';
				}
			?>
       </div>
       
      <table width="200" border="0" cellpadding="0" cellspacing="0" class="prevnto_grid">
  <tr>
    <td>PREVENTIVO:</td>
    <td align="center"><?php echo $data_important[$deviceRecive['ServiceDeviceInfo']['is_customer_confirmation']]; ?></td>
    <td>STIMATO:</td>
    <td ><?php echo $deviceRecive['ServiceDeviceInfo']['estimated_budget']; ?></td>
  </tr>
  <tr>
    <td>RIENTRO:</td>
    <td align="center"><?php  if(empty($is_repet)){ echo 'No';}else{ echo 'Yes';} ?></td>
    <td>PIN:</td>
    <td> <?php	echo $deviceRecive['ServiceDeviceInfo']['is_phone_block'] . " / ". $deviceRecive['ServiceDeviceInfo']['is_sim_pc_Lock'] ; ?></td>
  </tr>
  <tr>
    <td>DATI IMPORTANTI:</td>
    <td align="center"><?php echo $data_important[$deviceRecive['ServiceDeviceInfo']['is_data_backup']]; ?></td>
    <td>URGENTE:</td>
    <td><?php	 
		if($deviceRecive['ServiceDeviceInfo']['is_urgent'] == 121){
			echo 'Express Service';
		}else{
			echo $data_important[$deviceRecive['ServiceDeviceInfo']['is_urgent']];
		} ?></td>
  </tr>
</table>
 
     
    <div style="clear:both">&nbsp;</div>
        
    <div style="height: 100px; margin-left: 28px; margin-top: 1px; display: block; font-size: 10px;">NOTE :&nbsp;<?php	echo $deviceRecive['ServiceDeviceInfo']['description']; 
	//pr();
	
	?> </div>
    <div class="inovice_fotter">
    <span style="white-space:nowrap" class="span_fotter_1">Luogo &eacute; data : Roma &nbsp;<?php echo date('d/m/y');?> &nbsp;</span>
    <span style="padding-left:30px;"> Firma</span>
          </div>
       </div>   
           
   	 </div>
       <style type="text/css">
	   html, body, div, span, applet, object, iframe,
h1, h2, h3, h4, h5, h6, p, blockquote, pre,
a, abbr, acronym, address, big, cite, code,
del, dfn, em, font, img, ins, kbd, q, s, samp,
small, strike, strong, sub, sup, tt, var,
dl, dt, dd, ol, ul, li,
fieldset, form, label, legend,
table, caption, tbody, tfoot, thead, tr, th, td {
	margin: 0;
	padding: 0;
	border: 0;
	outline: 0;
	font-weight: inherit;
	font-style: inherit;
	font-size: 100%;
	font-family: inherit;
	vertical-align: baseline;
}
/* remember to define focus styles! */
:focus {
	outline:none;border-color:#2aa4cb;box-shadow:0 0 5px 0 #2aa4cb;outline:none
}

html, body {
	height:100%;
	width:100%;
}

body {
	line-height: 1;
	color: black;
	background: white;
	font-family:Arial,Verdana,Sans-Serif;
	font-size:0.8em;
}
ol, ul {
	list-style: none;
}
/* tables still need 'cellspacing="0"' in the markup */
table {
	border-collapse: separate;
	border-spacing: 0;
}
caption, th, td {
	text-align: left;

}
blockquote:before, blockquote:after,
q:before, q:after {
	content: "";
}
blockquote, q {
	quotes: "" "";
}

.float-left {
	float:left;
}

.float-right {
	float:right;
}

.float-none {
	float:none!important;
}

.full-link {
	float:none!important;
	margin:0 0 8px!important;
}

.width50 {
	width:49%;
}

.clear, .clearfix {
	clear:both;
}

#page_wrapper {
 }

p {
	line-height:1.6em;
	padding:5px 0 10px 5px;
	font-size:1.1em;
}
		.prevnto_grid{
			border: 0 none;
			font-size: 10px;
			margin: 10px 15px 0 29px;
			text-transform: uppercase;
			width: 92%;
		}
		.prevnto_grid tr td{
			border-bottom:1px solid;
			width:25%;
		}
		.inovice_fotter{
			bottom: 0;
			height: 14px;
			margin-top: 3px;
			padding-left: 5px;
			position: unset;
			width: 309px;
			text-transform: none !important;
		}
		.inovice_fotter span{
			float:left;
			display:inline-block;

			text-align:left;
		}
		.span_fotter_1{
			width:200px;
		}
		
		.sec_div_wrapper {
			border: 1px solid;
			font-size: 8px;
			height: 553px;
			width: 398px;
	
		}
		.bg_div{
			__background:url("../../app/webroot/img/recive_background.jpg") no-repeat scroll 0 0 rgba(0, 0, 0, 0);
			height: 553px;
			margin-top: 14px;
			position: absolute;
			top: 0;
			width: 398px;
			z-index: 999;
		}
		.print_left div , .print_right div{
			font-size:11px !important;
			margin-left:19px !important;
			text-transform: uppercase;
		}
		
		.title_s{
			width:100px;
			display:inline-block;
			text-transform:uppercase;
			height:18px;
		}
		.barcode{
			height: 64px;
			margin-bottom: 152px;
			margin-left: -10px;
			margin-top: 1px;
			width: 143px;
		}
		.print_left{
			float: left;
 			width:99%;
		}
		 
		.print_right   div{
			margin-left:25px !important;
		}
		.print_right .prevnto_grid{
			margin-left:26px !important;
		}
		.iripairbackground{
			z-index:99;
			margin-top:18px;
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

