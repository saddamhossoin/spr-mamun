<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" 
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>  SPR  </title>
<?php echo $this->Html->script(array('ui-10/jquery-1.10.2','ui-10/jquery-ui-1.10.4.custom.min', 'superfish', 'tooltip','cookie'   , 'custom','common/select2')); ?>
<?php echo $this->Html->css(array('ui-10/ui.base','ui-10/ui.login' ,'themes/black_rose/ui', 'common/common')); ?>
<!--[if IE 6]>
	<link href="css/ie6.css" rel="stylesheet" media="all" />
	
	<script src="js/pngfix.js"></script>
	<script>
	  /* Fix IE6 Transparent PNG */
	  DD_belatedPNG.fix('.logo, .other ul#dashboard-buttons li a');

	</script>
	<![endif]-->
<!--[if IE 7]>
	<link href="css/ie7.css" rel="stylesheet" media="all" />
	<![endif]-->
</head>
<body>
<div id="page_wrapper">
  <div id="page-header">
    <div id="page-header-wrapper">
      <div id="top"> <a href="#" class="logo" title="Admintasia V2.0">Admintasia V2.0</a> </div>
    </div>
  </div>
   <script type="text/javascript">
$(document).ready(function() {
	// Tabs
	$('#tabs, #tabs2, #tabs5').tabs();
});
</script>
  <div id="sub-nav">
    <div class="page-title">
      <h1>Login Area</h1>
    </div>
    <div id="top-buttons">
      <!--<ul class="drop-down">
        <li> <a class="btn ui-state-default ui-corner-all" href="javascript:void(0);"> <span class="ui-icon ui-icon-carat-2-n-s"></span> Change Theme </a>
          <ul id="style-switcher" class="drop-down-container box ui-widget ui-widget-content .ui-corner-tl .ui-corner-tr">
            <li> <a id="black_rose" href="#" class="btn ui-state-default full-link ui-corner-all set_theme" title="Black Rose Theme"> <span class="ui-icon ui-icon-zoomin"></span> Black Rose Theme </a> </li>
            <li> <a id="gray_standard" href="#" class="btn ui-state-default full-link ui-corner-all set_theme" title="Gray Standard Theme"> <span class="ui-icon ui-icon-zoomin"></span> Gray Standard Theme </a> </li>
            <li> <a id="gray_lightness" href="#" class="btn ui-state-default full-link ui-corner-all set_theme" title="Gray Lightness Theme"> <span class="ui-icon ui-icon-zoomin"></span> Gray Lightness Theme </a> </li>
            <li> <a id="apple_pie" href="#" class="btn ui-state-default full-link ui-corner-all set_theme" title="Apple Pie Theme"> <span class="ui-icon ui-icon-zoomin"></span> Apple Pie Theme </a> </li>
            <li> <a id="blueberry" href="#" class="btn ui-state-default full-link ui-corner-all set_theme" title="Blueberry Theme"> <span class="ui-icon ui-icon-zoomin"></span> Blueberry Theme </a> </li>
          </ul>
        </li>
      </ul>-->
	  <br />
    </div>
  </div>
  <div class="clear"></div>
  <div id="page-layout">
    <div id="page-content">
      <div id="page-content-wrapper"> <?php echo $this->fetch('content');?> </div>
      <div class="clear"></div>
    </div>
  </div>
</div>
</body>
</html>

