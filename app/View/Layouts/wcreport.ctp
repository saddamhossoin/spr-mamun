<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
 
 </style>
<script type="text/javascript">var siteurl = "<?php echo $this->webroot;?>"</script>
 </head>
<body class="bodytag">
 <span class='dialogreporttitle'></span><span class='Print_Button'><span class='print_img'>&nbsp;&nbsp;</span> &nbsp;Print</span>
<div id="reportwrapper">
  <div class="reportheader">
    <div id="invoicelogo"> <?php //echo $this->Html->image("reportlayout/rightlogo.JPG", array("class"=>"logo","alt" => "" ,"width"=>"74","height"=>"74"));?>
	  </div>
 	<div id="invoicetitle">
      <h1 class="top_title">SOLUTION POINT ROMA .</h1>
      <p class="address"> Via Dei Fulvi 14,roma 00174.<br />
         P.Iva 12134951008 , C.F. MIAMMM88B03Z249C<br />
         Tel-0660672975 , mob-3283205866 	<br />
        E-mail: deshhospital@yahoo.com</p>
    </div>
     <div id="invoicelogo2"><?php //echo $this->Html->image("reportlayout/leftlogo.JPG", array("alt" => "" ,"width"=>"74" ,"height"=>"74"));?>   </div>
	<div class="clr"></div>
   </div>
   <hr />
   
   <div class="report_content">
   <div class="reportheading"><?php echo $reportheading;?></div>
  	<?php /*?> <div class="reportconditions">
   	<?php /*
 
		if(isset($conditionarray) && count($conditionarray) >0 ){
	?>
		Reports On
		<?php 
		 print_r($conditionarray);
		if(isset($modelname) || empty($modelname)){
			$modelname = key($conditionarray);} 
		   
		  if(!empty($conditionarray[$modelname]['modified']) && !empty($conditionarray[$modelname]['modified1'])){?>
		<span> Date : <?php echo  date("F j, Y",strtotime($conditionarray[$modelname]['modified']));?> To  <?php echo date("F j, Y",strtotime($conditionarray[$modelname]['modified1']));?></span>,
		<?php } else if(!empty($conditionarray[$modelname]['modified'])){?>
		<span> Date : <?php echo $conditionarray[$modelname]['modified'];?>,<?php }?>
		
		<?php if(!empty($conditionarray[$modelname]['modifyed_by'])){?>
			User : <?php echo $_SESSION['userlists'][$conditionarray[$modelname]['modifyed_by']]." , "; }}?></span>
   </div><?php */?>
   <br />
    	<?php echo $content_for_layout;?> 
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
