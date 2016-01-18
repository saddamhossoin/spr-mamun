<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>.::<?php echo h( $title_for_layout ); ?>::.</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php echo $this->Html->css(array('wpage/css','wpage/reset','wpage/genericons','wpage/style','bootstrap/bootstrap','bootstrap/bootstrap-theme','wpage/home'));
echo $this->Html->script(array('wpage/jquery-1.11.2.min','ui-10/jquery-ui-1.10.4.custom.min',   'wpage/bootstrap/bootstrap'));
	
	$action_css = 'module/' . Inflector::camelize($this->request->params['controller']) . '/' . Inflector::singularize($this->request->params['action']);
	 //print_r($action_css);
    if( file_exists(CSS . $action_css . '.css') ) {
        echo $this->Html->css( $action_css );
    }
?>
<?php 
if($this->params['action'] == 'home'){
	echo $this->Html->css(array('wpage/home','wpage/responsiveslides' )); 
	echo $this->Html->script(array( 'wpage/responsiveslides.min')); 
?>
 
<script type="text/javascript">
$(document).ready(function(){
    $("#slider1").responsiveSlides({
        auto: true,
        pager: true,
        nav: true,
        speed: 500,
        maxwidth: 1000,
        namespace: "centered-btns"
	});
	
	 
});
</script>
<?php }?>
<script type="text/javascript">
$(document).ready(function(){
  $("#search_btn").click(function(e){
		if($('#SearchBox').val().length <1){
			e.preventDefault();
			alert('Please Enter Minimum 2 Word');
		}
	})
});
</script>
<script type="text/javascript">var siteurl = "<?php echo $this->request->webroot;?>"</script>
</head>
<body>

 <div id="wrapper">
  <div id="main_header">
    <div id="main_header1">
       <?php echo $this->element('header',array("cache" => array('time'=> "-7 days",'key'=>'header'))); ?>
     <div style="clear:both;"></div>
    </div>
    <div id="main_header2">
   
       <?php  echo $this->element('hompage_header_2',array("cache" => array('time'=> "-7 days",'key'=>'header'))); ?>
	 
    </div>
  </div>
  <div id="main_contentarea">
    <div id="contentarea">
     <?php if($this->params['action'] == 'home'){?> <div id="banner_bottom"> <?php echo $this->Html->image("wpage/banner_bg.png", array("class"=>"","alt" => "Slider 1" ,"width"=>"1024","height"=>"42"));?> </div><?php }?>
       <?php echo $this->fetch('content');?>
    </div>
  </div>
   <div id="main_footer">
     <?php  echo $this->element('footer',array("cache" => array('time'=> "-7 days",'key'=>'header'))); ?>
  </div>
 </div>
<div style="clear:both"></div>
<div id="popup_1" style="display:none"></div>
<div id="popup_2" style="display:none"></div>
<?php echo $this->element('sql_dump'); ?>
</body>
</html>