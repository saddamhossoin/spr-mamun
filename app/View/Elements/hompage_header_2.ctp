<div id="main_header2_inner">
        <div id="header2">
          <div id="phone">
            <div id="phone_inner">  
            <div id="search">
            <?php echo $this->Form->create('PosProduct',array('controller'=>'PosProducts','action'=>'site_search'));?>
	            <input type="text" name="data[PosProduct][name]" placeholder="Enter Product Name, Serial Or Description" id="SearchBox" value="<?php if(isset($_POST['data']['PosProduct']['name'])){echo $_POST['data']['PosProduct']['name'];}?>" />
                <input type="submit" id="search_btn" value="Search"/>
                 <?php //echo $this->Form->button('Reset',array('type'=>'reset','name'=>'reset','id'=>'siteserachreset', 'onClick'=>"parent.location='".$this->webroot."posProducts/site_search/yes'"));?>     
            	 <?php echo $this->Form->end(); ?>
            </div>
             <?php 
			$style = "display:none";
            $is_shop_data = $this->Session->read('Shop.OrderItem');
			if(!empty($is_shop_data )) :
				$style = "display:block";
			endif;?>
               <span class="check" style="<?php  echo $style;?>" >
                <?php echo $this->Html->link('  ', array('controller' => 'shop', 'action' => 'cart'), array('class' => '')); ?>
             </span>
            
             </div>
            <div style="clear:both;"></div>
          </div>
           <?php if($this->params['action'] == 'home'){?>
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
          <?php }else{ ?>
          <style>
          #main_header2{
		  	height:63px !important;
		  }</style>
          <?php }?>
        </div>
        <div style="clear:both;"></div>
      </div>
      
      