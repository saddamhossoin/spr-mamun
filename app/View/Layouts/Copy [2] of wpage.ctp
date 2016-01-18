<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>.::<?php echo h( $title_for_layout ); ?>::.</title>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


<?php 
 	echo $this->Html->css(array('wpage/css','wpage/reset','wpage/genericons','wpage/style','bootstrap/bootstrap','bootstrap/bootstrap-theme','wpage/home','wpage/responsiveslides','wpage/demo')); 
	 
 	echo $this->Html->script(array('wpage/jquery-1.11.2.min', 'wpage/responsiveslides.min' , 'wpage/bootstrap/bootstrap'));

?>


<script type="text/javascript">var siteurl = "<?php echo $this->request->webroot;?>"</script>
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
<?php if($this->Session->check('Shop')) : ?>
<script type="text/javascript">
$(document).ready(function(){
	$('#cartbutton').show();
	
     
 });
</script>
<?php endif; ?>


</head>

<body>
 <div id="wrapper">
  <div id="main_header">
    <div id="main_header1">
       <?php  echo $this->element('header',array("cache" => array('time'=> "-7 days",'key'=>'header'))); ?>
     <div style="clear:both;"></div>
    </div>
    <div id="main_header2">
      <div id="main_header2_inner">
        <div id="header2">
          <div id="phone">
            <div id="phone_inner"> <span class="number">
                 <h1 >+39 06 60672975</h1>
               </span>
               <span class="check"  >              </span> </div>
            <div style="clear:both;"></div>
          </div>
          <div id="banner">
            <div id="banner_inner">
                 <!-- Slideshow 4 -->
                  <div class="rslides_container">
                  <ul class="rslides" id="slider1">
                    <li><?php echo $this->Html->image("wpage/slider/1.jpg", array("class"=>"","alt" => "Slider 1" ,"width"=>"988","height"=>"406"));?></li>
                     <li><?php echo $this->Html->image("wpage/slider/2.jpg", array("class"=>"","alt" => "Slider 1" ,"width"=>"988","height"=>"406"));?></li>
                     <li><?php echo $this->Html->image("wpage/slider/3.jpg", array("class"=>"","alt" => "Slider 1" ,"width"=>"988","height"=>"406"));?></li>
                     <li><?php echo $this->Html->image("wpage/slider/4.jpg", array("class"=>"","alt" => "Slider 1" ,"width"=>"988","height"=>"406"));?></li>
                    
                  </ul>
                </div>
            </div>
            <div style="clear:both;"></div>
          </div>
        </div>
        <div style="clear:both;"></div>
      </div>
    </div>
  </div>
  <div id="main_contentarea">
    <div id="contentarea">
      <div id="banner_bottom"> <?php echo $this->Html->image("wpage/banner_bg.png", array("class"=>"","alt" => "Slider 1" ,"width"=>"1024","height"=>"42"));?> </div>
      <div id="contentarea1"> <span class="most">
        <aside id="text-5" class="widget widget_text">
          <h1 class="widget-title">Most Popular Repairs</h1>
          <div class="textwidget"></div>
        </aside>
        </span>
        <div id="option1">
          <div id="opt1">
            <div id="opt_left">
             	<?php echo $this->Html->image("wpage/icon1.jpg", array("class"=>"","alt" => "Slider 1" ,"width"=>"85","height"=>"124"));?>  
            </div>
            <div id="opt_right">
              <aside id="text-7" class="widget widget_text">
                <h1 class="widget-title"><span class="color_text">iPhone</span> Repair</h1>
                <div class="textwidget">We offer same day iPhone screen and LCD repair, Battery / Charger port repair and more.</div>
              </aside>
            </div>
          </div>
          <div id="opt2">
            <div id="opt_left">
             <?php echo $this->Html->image("wpage/icon2.jpg", array("class"=>"","alt" => "Slider 1" ,"width"=>"82","height"=>"117"));?>   
            </div>
            <div id="opt_right">
              <aside id="text-9" class="widget widget_text">
                <h1 class="widget-title"><span class="color_text">iPod </span>Repair</h1>
                <div class="textwidget">We offer same day iPhone screen and LCD repair, Battery / Charger port repair and more.</div>
              </aside>
            </div>
          </div>
          <div id="opt3">
            <div id="opt_left">
               <?php echo $this->Html->image("wpage/icon3.png", array("class"=>"","alt" => "Slider 1" ,"width"=>"92","height"=>"116"));?>   
             </div>
            <div id="opt_right">
              <aside id="text-11" class="widget widget_text">
                <h1 class="widget-title"><span class="color_text">iPad</span> Repair</h1>
                <div class="textwidget">We offer same day iPhone screen and LCD repair, Battery / Charger port repair and more.</div>
              </aside>
            </div>
          </div>
        </div>
        <div style="clear:both;"></div>
      </div>
      
       <div id="contentarea2">
        <div id="contentarea2_left">
         <span class="most1">
         
         <span class="most2">
          	<span class="learn11">
	           
	    		    <h1 class="widget-title">Learn more about us!</h1>
           	   
          </span> 
          <div class="aboutus"> We have been doing this for years so we have got your back when it comes to phone repairs. Whether its the latest iPhone or a 10 year old Nokia, we stock a massive range of parts so the chances are that we have it on hand to complete your repair. </div>
        </span>
        <div style="clear:both;"></div>
          <br /><br />
           
          <span class="most2">
          	<span class="learn11">
 	    		    <h1 class="widget-title">Mobile Phones for Sale</h1>
           </span> 
            <div style="clear:both;"></div>
           <div class="sellProdcut">
           	<div class="porducts_item">
            	<div class="procuts_img">
            		<?php echo $this->Html->image("wpage/mobile.jpg", array("class"=>"","alt" => "Mobile" ,"width"=>"56","height"=>"105"));?>  
                </div>
                <div class="prodcut_des">
                	<span class="selProductTitle">iPhone 4 16GB</span>
                    <span class="selProductDescription">Unlocked for any GSM Network</span>
                </div>
                <div style="clear:both;"></div>
            </div>
            
            <div class="porducts_item">
            	<div class="procuts_img">
            		<?php echo $this->Html->image("wpage/mobile.jpg", array("class"=>"","alt" => "Mobile" ,"width"=>"56","height"=>"105"));?>  
                </div>
                <div class="prodcut_des">
                	<span class="selProductTitle">iPhone 4 16GB</span>
                    <span class="selProductDescription">Unlocked for any GSM Network</span>
                </div>
            </div>
            
            <div class="porducts_item">
            	<div class="procuts_img">
            		<?php echo $this->Html->image("wpage/mobile.jpg", array("class"=>"","alt" => "Mobile" ,"width"=>"56","height"=>"105"));?>  
                </div>
                <div class="prodcut_des">
                	<span class="selProductTitle">iPhone 4 16GB</span>
                    <span class="selProductDescription">Unlocked for any GSM Network</span>
                </div>
            </div>
            
            <div class="porducts_item">
            	<div class="procuts_img">
            		<?php echo $this->Html->image("wpage/mobile.jpg", array("class"=>"","alt" => "Mobile" ,"width"=>"56","height"=>"105"));?>  
                </div>
                <div class="prodcut_des">
                	<span class="selProductTitle">iPhone 4 16GB</span>
                    <span class="selProductDescription">Unlocked for any GSM Network</span>
                </div>
            </div>
            
            <div class="porducts_item">
            	<div class="procuts_img">
            		<?php echo $this->Html->image("wpage/mobile.jpg", array("class"=>"","alt" => "Mobile" ,"width"=>"56","height"=>"105"));?>  
                </div>
                <div class="prodcut_des">
                	<span class="selProductTitle">iPhone 4 16GB</span>
                    <span class="selProductDescription">Unlocked for any GSM Network</span>
                </div>
            </div>
            
            <div class="porducts_item">
            	<div class="procuts_img">
            		<?php echo $this->Html->image("wpage/mobile.jpg", array("class"=>"","alt" => "Mobile" ,"width"=>"56","height"=>"105"));?>  
                </div>
                <div class="prodcut_des">
                	<span class="selProductTitle">iPhone 4 16GB</span>
                    <span class="selProductDescription">Unlocked for any GSM Network</span>
                </div>
            </div>
            
            <div class="porducts_item">
            	<div class="procuts_img">
            		<?php echo $this->Html->image("wpage/mobile.jpg", array("class"=>"","alt" => "Mobile" ,"width"=>"56","height"=>"105"));?>  
                </div>
                <div class="prodcut_des">
                	<span class="selProductTitle">iPhone 4 16GB</span>
                    <span class="selProductDescription">Unlocked for any GSM Network</span>
                </div>
            </div>
            
            <div class="porducts_item">
            	<div class="procuts_img">
            		<?php echo $this->Html->image("wpage/mobile.jpg", array("class"=>"","alt" => "Mobile" ,"width"=>"56","height"=>"105"));?>  
                </div>
                <div class="prodcut_des">
                	<span class="selProductTitle">iPhone 4 16GB</span>
                    <span class="selProductDescription">Unlocked for any GSM Network</span>
                </div>
            </div>
            
            <div class="porducts_item">
            	<div class="procuts_img">
            		<?php echo $this->Html->image("wpage/mobile.jpg", array("class"=>"","alt" => "Mobile" ,"width"=>"56","height"=>"105"));?>  
                </div>
                <div class="prodcut_des">
                	<span class="selProductTitle">iPhone 4 16GB</span>
                    <span class="selProductDescription">Unlocked for any GSM Network</span>
                </div>
            </div>
           </div>
          </span> 
          
          </span></div>
        <div id="contentarea2_right">
          <aside id="search-3" class="widget widget_search">
            <h1 class="get_a_quote">Get a Quote</h1>
            <form accept-charset="utf-8" method="post" id="UserAddForm" controller="users" action="/spr-didar/users/add" novalidate="novalidate">
        <div class="microcontroll" id="WrapperUserfirstname">
            <label for="UserFirstname">Name:</label>
            <input type="text" id="UserFirstname" class="required" size="35" name="data[User][firstname]">
        </div>
        
        <div class="microcontroll" id="WrapperUserlastname">
            <label for="UserLastname">Address:</label>
            <input type="text" id="UserLastname" class="required" size="35" name="data[User][lastname]">
        </div>
        <div class="microcontroll" id="WrapperUserlastname">
            <label for="UserLastname">Phone:</label>
            <input type="text" id="UserPhone" class="" size="35" name="data[User][phone]">
        </div>
        
        <div class="microcontroll" id="WrapperUserEmail">
            <label for="UserEmailAddress">Email:</label>
                <input type="text" required="required" id="UserEmailAddress" class="email" size="35" name="data[User][email_address]">
        </div>
		
        <div class="microcontroll" id="WrapperUserJoindate">
				<label for="s2id_autogen1">Brand</label>
                	<div class="select2-container required select2as" id="s2id_GroupGroupId">
                    <select id="GroupGroupId" class="required select2as select2-offscreen" name="data[Group][brand_id]" tabindex="">
                        <option value="">-- Please Select Brand --</option>
                        <option value="1">Brand</option>
                        <option value="2">Brand</option>
                        <option value="3">Brand</option>
                        <option value="4">Brand</option>
                        <option value="5">Brand</option>
                        <option value="6">Brand</option>
                        <option value="7">Brand</option>
                        <option value="8">Brand</option>
                        <option value="9">Brand</option>
					</select>
                  </div>
                  </div>
	 	  
   		<div class="microcontroll" id="WrapperUserJoindate">
			<label for="s2id_autogen2">Model</label>
            <select id="GroupGroupId" class="required select2as select2-offscreen" name="data[Group][brand_id]">
                        <option value="">-- Please Select Brand --</option>
                        <option value="1">Brand</option>
                        <option value="2">Brand</option>
                        <option value="3">Brand</option>
                        <option value="4">Brand</option>
                        <option value="5">Brand</option>
                        <option value="6">Brand</option>
                        <option value="7">Brand</option>
                        <option value="8">Brand</option>
                        <option value="9">Brand</option>
					</select>
                    </div>
                    
         <div class="microcontroll" id="WrapperUserlastname">
            <label for="UserLastname">Description:</label>
            <textarea type="textarea" id="Desription" class="" size="35" name="data[User][phone]"></textarea>
        </div>

        
		 <div class="button_area">	  
			<button type="submit" id="btn_quote_submit" class="submit">Quote Request!</button>
        </div>
       </form>
       <br />
          </aside>
        </div>
      </div>
    </div>
  </div>
  
  <div id="main_footer">
    <div id="main_footer_inner">
      <div id="main_footer1">
        <div id="footer1">
          <div id="footer1_left"> <span class="list2">
            <ul>
              <div class="navigation_bottom">
                <ul>
                  <li class="page_item page-item-31"><a href="http://localhost:88/spr-website/?page_id=31">Home</a>&nbsp;&nbsp;/&nbsp;&nbsp;</li>
                  <li class="page_item page-item-2"><a href="http://localhost:88/spr-website/?page_id=2">About</a>&nbsp;&nbsp;/&nbsp;&nbsp;</li>
                  <li class="page_item page-item-2"><a href="http://localhost:88/spr-website/?page_id=2">Phone Repairs</a>&nbsp;&nbsp;/&nbsp;&nbsp;</li>
                  <li class="page_item page-item-2"><a href="http://localhost:88/spr-website/?page_id=2">Shop</a>&nbsp;&nbsp;/&nbsp;&nbsp;</li>
                  <li class="page_item page-item-2"><a href="http://localhost:88/spr-website/?page_id=2">Feedback</a>&nbsp;&nbsp;/&nbsp;&nbsp;</li>
                  <li class="page_item page-item-2"><a href="http://localhost:88/spr-website/?page_id=2">FAQ</a>&nbsp;&nbsp;/&nbsp;&nbsp;</li>
                  <li class="page_item page-item-2"><a href="http://localhost:88/spr-website/?page_id=2">Contact us</a></li>
                </ul>
              </div>
            </ul>
            </span> 
            <span class="list2"> 
            	<ul class="socialLink">
                	<li><a href="#">Contact <?php echo $this->Html->image("wpage/contact.png", array("class"=>"","alt" => "Contact" ,"width"=>"33","height"=>"33"));?></a></li>
                    <li><a href="#">Facebook  <?php echo $this->Html->image("wpage/gb.png", array("class"=>"","alt" => "Contact" ,"width"=>"33","height"=>"33"));?></a></li>
                    <li><a href="#">Twitter  <?php echo $this->Html->image("wpage/twitter.png", array("class"=>"","alt" => "Contact" ,"width"=>"33","height"=>"33"));?></a></li>
                    <li><a href="#">Linkedin  <?php echo $this->Html->image("wpage/linkedin.png", array("class"=>"","alt" => "Contact" ,"width"=>"33","height"=>"33"));?></a></li>
                 </ul>
             </span>
            <span class="privacy">
              <div class="textwidget">
              	<a href="#">Privacy Policy</a> - 
                <a href="#">Terms of Use</a>·
                All trademarks © their respective owners © Copyright 2015 Solutionpointroma - All Rights Reserved</div>
            </span><br>
            <span></span><br>
                  <p style="color:#fff">  Developed by <a href="http://www.mayasoftbd.com" target="_blank">MayasoftBD.com</a></p>

               </div>
         </div>
      </div>
    </div>
  </div>
   
</div>
<?php echo $this->element('sql_dump'); ?>
</body>
</html>
