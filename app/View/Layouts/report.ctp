<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<!-- www.forowarez.es -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>&nbsp;</title>
<?php echo $this->Html->css(array('common/common','common/rounded','ui/ui.base','themes/black_rose/ui','common/reportgrid' ,'module/'.Inflector::singularize($this->params['controller']).'/'.Inflector::singularize($this->params['action'])   )); 
 	echo $this->Html->css(array('common/report'));
 ?>	 
<script type="text/javascript">var siteurl = "<?php echo $this->webroot;?>"</script>
 </head>
<body class="bodytag">

<div id="reportwrapper">
  <div class="reportheader">
    <div id="invoicelogo"> <?php echo $this->Html->image("reportlayout/rightlogo.JPG", array("class"=>"logo","alt" => "Brownies" ,"width"=>"74","height"=>"74"));?>
	  </div>
 	<div id="invoicetitle">
      <h1 class="top_title">Shah Amanat Hospital & Diagnostic Center (Pvt.) Ltd.</h1>
      <p class="address">Keranihat, North Side, Main Road Satkania, Chattagong.<br/>
         Phone:01824-786868,01919-114224<br/>
        shahamanathospital@yahoo.com</p>
    </div>
     <div id="invoicelogo2"><?php echo $this->Html->image("reportlayout/leftlogo.JPG", array("alt" => "Brownies" ,"width"=>"74" ,"height"=>"74"));?>   </div>
	<div class="clr"></div>
   </div>
   <hr />
   
   <div class="report_content">
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
