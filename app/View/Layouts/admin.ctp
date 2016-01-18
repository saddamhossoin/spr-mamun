<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>.:: <?php if(!empty($page_titles)){echo h( $page_titles );}else{echo h( $title_for_layout );} ?> ::.</title>
<?php //'dynatree/ui.dynatree',
    echo $this->Html->css(array('ui-10/jquery-ui-1.10.4.custom.min','ui-10/ui.base','ui-10/ui.core','common/common','superfish','common/rounded','common/select2','themes/black_rose/ui','common/alert.min','common/jquery-ui-timepicker-addon' )); 
   // echo $this->Html->css(array('ui/ui.datepicker'));
  
		 
     $action_css = 'module/' . Inflector::camelize($this->request->params['controller']) . '/' . Inflector::singularize($this->request->params['action']);
	 //print_r($action_css);
    if( file_exists(CSS . $action_css . '.css') ) {
        echo $this->Html->css( $action_css );
    }
    
    if( isset($controller_css) ) {
        echo $this->Html->css($controller_css);
    }
	 
    //'common/jquery.dynatree.min',
    //echo $this->Html->script(array('jquery-1.8.2.min' ,'ui-1.9.1/jquery.ui.core.min','ui-1.9.1/jquery.ui.widget.min','ui-1.9.1/jquery.ui.mouse.min','superfish','custom' , 'tooltip','cookie','ui-1.9.1/jquery.ui.resizable.min','ui-1.9.1/jquery.ui.dialog.min','common/select2','common/jquery.ui.accordion')); 
	
    //echo $this->Html->script(array('ui-1.9.1/jquery.ui.datepicker.min' ));
	
	echo $this->Html->script(array('ui-10/jquery-1.10.2','ui-10/jquery-ui-1.10.4.custom.min','superfish','common/select2','custom','cookie','alert/alert','common/jquery-ui-timepicker-addon')); 
     
    if(Inflector::singularize($this->request->params['action'])=='index') { 
	    echo $this->Html->css('common/grid'); 
	    echo $this->Html->script(array('common/commonindex'));
	}
    else if (Inflector::singularize($this->request->params['action'])=='add' || Inflector::singularize($this->request->params['action'])=='edit') { 
	    echo $this->Html->script(array('common/form','common/jquery.validate'));  
	}
	
	if( isset($controller_js) ) {
        echo $this->Html->script($controller_js);
    }
    
    $action_js = 'module/' . Inflector::camelize($this->request->params['controller']) . '/' . Inflector::singularize($this->request->params['action']);
    if( file_exists(JS . $action_js . '.js') ) {
       echo $this->Html->script( $action_js );
    }
   	?>
    <?php echo $this->Html->css(array('alert/css/alert','alert/themes/default/theme')); ?>

	
	<script type="text/javascript">var siteurl = "<?php echo $this->request->webroot;?>"</script><!--[if IE 6]>
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
<body id="sidebar-left">
 <div id="page_wrapper">
  <div id="page-header">
    <div id="page-header-wrapper">
	<?php // pr($this->Session->read('Auth.User'));?>
      <div id="top"> <a href="<?php echo $this->Html->url('/');?>" class="logo" title="MAYASOFTBD">MAYASOFTBD POS</a>
        <div class="welcome"> <span class="note">Welcome, <a href="<?php echo $this->request->webroot?>users/view/<?php echo $this->Session->read('Auth.User.id');?>" title="Welcome, <?php echo $this->Session->read('Auth.User.firstname');?> <?php echo $this->Session->read('Auth.User.lastname');?>"><?php echo $this->Session->read('Auth.User.email_address');?></a></span> <a class="btn ui-state-default ui-corner-all" href="#"> <span class="ui-icon ui-icon-wrench"></span> Settings </a> <a class="btn ui-state-default ui-corner-all" href="<?php echo $this->request->webroot?>users/dashboard"> <span class="ui-icon ui-icon-person"></span> My account </a> <a class="btn ui-state-default ui-corner-all" href="<?php echo $this->request->webroot?>users/logout"> <span class="ui-icon ui-icon-power"></span> Logout </a> </div>
      </div>
      <ul id="navigation">
        <?php echo $this->element('layout/topmenulist'); ?>
      </ul>
    </div>
  </div>
  <div id="page-layout">
    <div id="page-content">
      <div id="page-content-wrapper">
 	  <div class="ui-box-header ui-corner-all" style="margin-bottom:5px; height:36px;"> 
	  	<div style="float:left; width:400px; margin-top:8px; margin-left:5px; font-size:14px;"><?php echo 	 $page_titles;?> </div>
		<div class="ajax_status_1" style="display:none;">
			<img src="<?php echo $this->request->webroot?>img/circle.gif" alt="Checking..." />
		</div> 
		<div class="ajax-save-message" style="display:none;"></div>
		<?php  echo $this->element('layout/tollbarmenu',array("cache" => array('time'=> "-7 days",'key'=>'header'))); ?>
 	  </div>
 	  <?php echo $this->Session->flash(); ?>
	  <div id="content-box">
		<div class="border">
			<div class="padding">
				<div id="element-box">
					<div class="t">
						<div class="t">
							<div class="t"></div>
						</div>
					</div>
					<div class="m">
						  <?php echo $this->fetch('content');?>
						<div class="clr"></div>
					</div>
					<div class="b">
						<div class="b">
							<div class="b"></div>
						</div>
					</div>
				</div>
 				<div class="clr"></div>
			</div>
		</div>
	</div>
	   
	   
        <div class="clear"></div>
       
        <div class="clear"></div>
      </div>
      <div class="clear"></div>
    </div>
  </div>
  <div class="clear"></div>
  <div id="footer"> <a href="#" title="Home">Home</a> | <a href="#" title="Members Login">Members Login</a> | <a href="#" title="About us">About us</a> | <a href="#" title="Example link">Example link</a> </div>
  <div id="copyright"> Powered by <a href="http://www.mayasoftbd.com/" title="">Mayasoftbd</a> </div>
</div>
<div class="overlaydiv" style="display:none;">&nbsp;</div>
<div id="popupdiv">&nbsp;</div>
<div id="invoice">&nbsp;</div>
<div id="invoice1">&nbsp;</div>
<div id="invoice2">&nbsp;</div>
<div id="invoice3">&nbsp;</div>

<div id="invoice4">&nbsp;</div>
<div id="invoice5">&nbsp;</div>
<div id="invoice6">&nbsp;</div>
<div id="invoice7">&nbsp;</div>
<div id="invoiceReload">&nbsp;</div>

<?php echo $this->element('sql_dump'); ?>
</body>
</html>