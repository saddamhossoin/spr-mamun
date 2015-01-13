 <?php echo $this->fetch('content');?>
 <html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<!-- www.forowarez.es -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>&nbsp;</title>
<?php echo $this->Html->css(array('common/common','common/rounded','ui/ui.base','themes/black_rose/ui','common/reportgrid' ,'module/'.Inflector::singularize($this->params['controller']).'/'.Inflector::singularize($this->params['action'])   )); 
 	//echo $this->Html->css(array('common/report'));
 ?>	 
 <style>
 /* CSS Document */
.clr
{
	clear:both;
}
.bodytag{
	width:595px !important;
	height:842px !important;
 	margin:0px auto;
	font-family:Verdana, Arial, Helvetica, sans-serif;
}

#reportwrapper {
   height: 842px;
        width: 595px;
        /* to centre page on screen*/
        margin-left: auto;
        margin-right: auto;
 }
.reportheader
{
	width:630px;
	margin:0px auto;
	
}
#invoicelogo
{
	float:left;
 	width:75px;
}
#invoicetitle{
	float:left;
 	width:465px;
	margin:0px 7px;
	text-align:center;
}
#invoicelogo2{
	float:left;
 	width:70px;
}
.reportheading
{
 	font-size:11px;
	font-weight:bold;
	text-align:center;
}
.address{
	font-size:11px;
	margin-top:5px;
	line-height:19px;
 }
 hr{
 	width:651px;
  }
 
 .report_content
 {
 	min-height:259px;
	width:655px;
 }
 .report_fotter{
	 vertical-align:baseline;
 	 width:auto;
 }
 .report_fotter{
 	font-size:9px;
 }
  .report_fotter ul li{
  	float:left;
	width:33%;
	height:25px;
  }
  .report_fotter_left{
	text-align:left;
}
.report_fotter_right{
	text-align:right;
}
  
  .topbold{
 	font-family:Verdana, Arial, Helvetica, sans-serif;
	font-weight:bold;
	text-align:left;
	padding-left:200px;
	font-size:13px;
   }
   .invoicetop{
 	margin-top:5px;
	margin-bottom:15px;
	border-bottom:1px solid #000000;
   }
   .invoicetop tr td{
	padding:4px;
   }
   .print_img{
	   padding-right:10px;
   }
   .Print_Button{
	   font-weight:bold;
   }
   
 
.view_table tr:first-child {
    font-weight: bold;
   
}
.view_table tr td:first-child {
    width: 10px !important;
}
.view_table tr.altrow td {
    background: none repeat scroll 0 0 #E2E2E2;
    border-bottom: 1px solid #E3E3E3;
}
.view_table tr td:first-child {
    font-weight: bold;
    width: 150px;
}
.view_table tr td {
    font-family: Verdana,Arial,Helvetica,sans-serif;
    font-size: 11px;
    padding: 5px 5px 5px 8px;
}

 
 </style>
<script type="text/javascript">var siteurl = "<?php echo $this->webroot;?>"</script>
 </head>
<body class="bodytag">
 <span class='dialogreporttitle'></span>

<div id="reportwrapper">
  <div class="reportheader">
    <div id="invoicelogo">
	   </div>
 	<div id="invoicetitle">
      <h1 class="top_title">SOLUTION POINT ROMA .</h1>
      <p class="address"> Via Dei Fulvi 14,roma 00174.<br />
         P.Iva 12134951008 , C.F. MIAMMM88B03Z249C<br />
         Tel-0660672975 , mob-3283205866 	<br />
        E-mail: deshhospital@yahoo.com</p>
    </div>
     <div id="invoicelogo2">
	 <?php //echo $this->Html->image("reportlayout/leftlogo.JPG", array("alt" => "" ,"width"=>"74" ,"height"=>"74"));?>   </div>
	<div class="clr"></div>
   </div>
   <hr />
   
   <div class="report_content">
   <div class="reportheading"><?php echo $reportheading;?></div>
   <br />
    	 
<div id="invoice" class="Print_content_areas"> 
 <br />
 <?php  if(!empty($data)){ ?>
 
 <table class="view_table" cellpadding="0"  border="1" width="100%">
	 
	<tr class="testlist_report altrow">
		<td style="width:250px" class="left_part heading">User :<?php echo $data['User']['email_address'];?></td>
        <td  class="center_part heading">Mobile : <span><?php echo $data['User']['phone'];?></span></td>
	</tr>
	<tr class="testlist_report altrow">
	 	<td class="left_part heading">Recieve Date :<span>
		<?php echo   date("j-n-Y H:i",strtotime($data['ServiceDeviceInfo']['recive_date']));?></span></td>
		<td class="right_part heading">Delivery Date : <span>
		<?php echo   date("j-n-Y H:i",strtotime($data['ServiceDeviceInfo']['estimated_date']));?></span></td>
  	
	</tr>
	 
</table>

<table id="" cellpadding="0" cellspacing="0" class="view_table" width="100%">
<tr class="testlist_report altrow">
		 <td class="heading" width="15%">Serial no</td>
		 <td class="heading" width="25%" align="center">Device Name</td>
		 <td class="heading" width="25%">Description</td>
		  <td class="heading" width="20%">Defect Area</td>
		<td class="heading" width="20%">Recieve Accessories</td>
		 <td class="heading" width="20%">Delivery date</td>
	</tr>
  	  <tr class="testlist_report">
		
		<td><?php echo $data['ServiceDeviceInfo']['serial_no']; ?></td>
		<td><?php echo $data['ServiceDevice']['name'] ; ?></td>
		<td><?php echo $data['ServiceDeviceInfo']['description']; ?></td>
		<td><?php echo $data['ServiceDeviceInfo']['defect_state']; ?></td>
		<td><?php echo $data['ServiceDeviceInfo']['acessories'];?></td>
		<td><?php echo $data['ServiceDeviceInfo']['estimated_date']; ?></td>
		
	</tr>
  
 
         
 	 
 </table>

<?php
	}else{ 
		echo "<span class='nodata'>There is no data</span>";
	}?>

</div>

 
		
  </div>
  
  
  <div class="report_fotter">
  	<ul>
		<li>Printed Date: <?php echo date("F j, Y, g:i a");?></li>
		<li></li>
		<li>Prepared By :<?php echo $this->Session->read('Auth.User.firstname');?> <?php echo $this->Session->read('Auth.User.lastname');?></li>
	</ul>
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
		 Popup($("#invoice").html());
		$('.Print_Button').html("<span class='print_img'>&nbsp;&nbsp;</span> &nbsp;Print");
	 });
    });
</script>
