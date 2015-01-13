 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo $this->fetch('title'); ?></title>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php echo $this->Html->css(array('wpage/spr/styles'));?>
<?php echo $this->Html->css(array('wpage/spr/nivo-slider'));?>
<?php echo $this->Html->css(array('wpage/spr/style','wpage/spr/wpage'));?>
<?php echo $this->Html->script(array('wpage/spr/jquery-1.4.3.min','wpage/spr/jquery.nivo.slider.pack'));?>

<?php echo $this->Html->css(array('wpage/spr/jquery.jscrollpane.css'));?>
<?php echo $this->Html->script(array('wpage/spr/jquery.mousewheel','wpage/spr/jquery.jscrollpane.min','wpage/spr/wpage'));?>


	

</head>
<body>
<div id="container">
  <div id="top">
    <div id="logo"><a href="<?php echo $this->Html->url('/');?>">
    <?php echo $this->Html->image("wpage/spr/logo.png", array("class"=>"logo","alt" => "" ,"width"=>"240","height"=>"80","border"=>"0"));?></a></div>
    <ul class="ico">
    
      <div class="block-auth">
          <table width="10" border="0" align="right" id="secondTableID" cellpadding="1" cellspacing="0">
           <?php echo $this->Form->create('User',array('controller'=>'users','action'=>'login'));?>
            
			<tr> 
			  <td width="10" valign="bottom" class="testoLog">UserID</td>
			  <td valign="bottom" nowrap> 
              <?php echo $this->Form->input('User.email_address',array('type'=>'text','div'=>false,'label'=>false, 'size'=>15, 'class'=>'required email' ));?>
              </td>
			  <td valign="bottom">&nbsp;</td>
			</tr>
			<tr> 
			  <td valign="middle" class="testoLog">Password</td>
			  <td valign="middle" nowrap> 
              <?php echo $this->Form->input('User.password',array('type'=>'password','div'=>false,'label'=>false, 'size'=>15, 'class'=>'required' ));?>
              
              </td>
			  
			  <td valign="bottom">
            
              <?php echo $this->Form->submit('Login',array('border'=>'0')); ?>
             </td>
			</tr>
            <tr><td colspan="3"  class="testoLog" nowrap>Non ricordi la password? 
            <?php echo $this->Html->link("Clicca qui!",array('controller'=>'users','action'=>'forgetpwd')); ?></td></tr>
		   <?php echo $this->Form->end(); ?>
		  </table>
          
          <!-----============forget password============-->
          <table width="10" border="0" align="right" cellpadding="1" id="firstTableID" cellspacing="0" style="display:none">
           <?php echo $this->Form->create('User',array('controller'=>'Users','action'=>'forgetpwd'));?>
            
			<tr> 
			  <td width="10" valign="bottom" class="testoLog">Email</td>
			  <td valign="bottom" nowrap> 
             <?php echo $this->Form->input('User.email_address',array('type'=>'text','div'=>false,'label'=>false, 'size'=>30, 'class'=>'required email'  ));?>
              </td>
			  <td valign="bottom">&nbsp;</td>
			</tr>
           
			<tr> 
			 <td valign="bottom">&nbsp;</td>
			  <td valign="bottom"  class="testoLog">
            
             <?php  echo $this->Form->button('Send Mail',array( 'class'=>'submit', 'id'=>''));?>
             <?php  echo $this->Form->button('Cancel',array('type'=>'reset','name'=>'reset','id'=>''));?>

             </td>
             
             
			</tr>
            
		   <?php echo $this->Form->end(); ?>
		  </table>
          <!-----=============forget password===========--->
          
          
     
          
          
      </div>
     
    </ul>
  </div>
  <div id="menuPan">
    <ul class="menu">
      <li class="home"> 
      <a href="<?php echo $this->Html->url('/');?>"> CASA</a>
      
      </li>
      <li class="line"></li>
      <li class="about">
	  <?php echo $this->Html->link("CHI SIAMO",array('controller'=>'#','action'=>'#')); ?>
      </li>
      <li class="line"></li>
      <li class="products">
      <?php echo $this->Html->link("PRODOTTI",array('controller'=>'#','action'=>'#')); ?>
      </li>
      <li class="line"></li>
      <li class="services">
      <?php echo $this->Html->link("SERVIZI",array('controller'=>'ServiceServices','action'=>'front_service_view')); ?>
      </li>
      <li class="line"></li>
      <li class="support">
      <?php echo $this->Html->link("SUPPORTO",array('controller'=>'#','action'=>'#')); ?>
      </li>
      <li class="line"></li>
      <li class="reviews">
      <?php echo $this->Html->link("CARRELLO",array('controller'=>'#','action'=>'#')); ?>
      </li>
    </ul>
  </div>
  
 <div id="header">
    <div id="slider">
 <?php echo $this->Html->image("wpage/spr/1.jpg", array("class"=>"","alt" => "" ,"title"=>"This is The Test Image1 For Solution Point Roma","width"=>"","height"=>"","border"=>""));?>
 

 <?php echo $this->Html->image("wpage/spr/2.jpg", array("class"=>"","alt" => "" ,"title"=>"This is The Test Image2 For Solution Point Roma","width"=>"","height"=>"","border"=>""));?>

 <?php echo $this->Html->image("wpage/spr/3.jpg", array("class"=>"","alt" => "" ,"title"=>"This is The Test Image3 For Solution Point Roma","width"=>"","height"=>"","border"=>""));?> 
 
 <?php echo $this->Html->image("wpage/spr/4.jpg", array("class"=>"","alt" => "" ,"title"=>"This is The Test Image4 For Solution Point Roma","width"=>"","height"=>"","border"=>""));?> 
 
 <?php echo $this->Html->image("wpage/spr/5.jpg", array("class"=>"","alt" => "" ,"title"=>"This is The Test Image5 For Solution Point Roma","width"=>"","height"=>"","border"=>""));?>
 
  <?php echo $this->Html->image("wpage/spr/6.jpg", array("class"=>"","alt" => "" ,"title"=>"This is The Test Image6 For Solution Point Roma","width"=>"","height"=>"","border"=>""));?>  
 
 


</div><!-- end slider div-->

<div id="htmlcaption" class="nivo-html-caption">
<strong>This</strong> is the HTML caption <em>HTML</em> with <a href="#">a link and a seagull</a>.
</div><!-- end nivo-html-caption div-->

<style type="text/css" id="page-css">
			.scroll-pane
			{
				width: 100%;
				height: 400px;
				overflow: auto;
			}
			.horizontal-only
			{
				height: auto;
				max-height: 200px;
			}
			.list_brand_cat{
				margin-left:25px;
			}
			.list_brand_cat li{
				list-style:square;
				font-weight:bold;
				color:#000000;
			}
			.list_brand_cat li a:hover{
				color:#66F;
			}
		</style>
<script type="text/javascript" id="sourcecode">
          $(function()
              {
               $('.scroll-pane').jScrollPane();
              });
</script>
            

<script type="text/javascript"> $(window).load(function()
{ $('#slider').nivoSlider({effect:'sliceDownLeft',
directionNavHide:false,
prevText: 'Prev',
nextText: 'Next',
}); });



 
</script>

<div class="clear"></div> 
</div>

  <div id="content">
    <div id="leftPan">
     <div id="news">
        <h2>TIPO</h2>
        
        <ul class="list_brand_cat"> <?php 
		
		$posTypes =  $this->requestAction(array('controller' => 'PosTypes', 'action' => 'getTypes', 'return'));
		
		
 		 foreach($posTypes as $posType){ ?>
         <li><?php echo $this->Html->link($posType['PosType']['name'], array('controller' => 'PosBrands', 'action' => 'brand_list','Type',$posType['PosType']['slug']));?></li>
         <?php }?>
         </ul>
      </div>
      
    <div id="featured">
        <h2>MARCA</h2>
         <div id="description" class="scroll-pane">
        <br/>
         <ul class="list_brand_cat">
          <?php 
		  
		  $posBrands =  $this->requestAction(array('controller' => 'PosBrands', 'action' => 'getBrands', 'return'));
		
		  
  		 foreach($posBrands as $posBrand){ ?>
  		  <li>  <?php echo $this->Html->link($posBrand['PosBrand']['name'], array('controller' => 'PosProducts', 'action' =>'shop','Brand',$posBrand['PosBrand']['slug'])); ?></li>
          
          <?php }?>
          </ul>
         </div>
      </div>
     </div>
    <div id="rightPan">
      
        <?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
       
      <div class="clear"></div>
    </div>
    <div class="clear"></div>
  </div>
  
  
  
  
  
  
  
  <div id="footer">
    <p><?php echo $this->Html->link("HOME",array('controller'=>'#','action'=>'#')); ?> |<?php echo $this->Html->link("ABOUT US",array('controller'=>'#','action'=>'#')); ?>| <?php echo $this->Html->link("PRODUCTS",array('controller'=>'#','action'=>'#')); ?> | <?php echo $this->Html->link("SERVICES",array('controller'=>'ServiceServices','action'=>'front_service_view')); ?>| <?php echo $this->Html->link("SUPPORT",array('controller'=>'#','action'=>'#')); ?> | <?php echo $this->Html->link("REVIEWS",array('controller'=>'#','action'=>'#')); ?>| <?php echo $this->Html->link("CONTACTS",array('controller'=>'#','action'=>'#')); ?><br/>
      <span>Copyright &copy; SPR</span>. Designed by <a href="http://www.mayasoftbd.com" target="_blank">MayasoftBD.com</a></p>
  </div>
</div>
<?php //echo $this->element('sql_dump'); ?>
</body>
</html>



  