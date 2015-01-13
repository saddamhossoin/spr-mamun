<?php //echo $this->Html->css(array('module/PosProducts/shop'));?>
<div id="reviews" class="welcome">
        <h2><?php echo h('PRODOTTI LISTA'); ?></h2>
      <?php  if(!empty($front_view_products)){?>
       <?php foreach($front_view_products as $front_view_product){ ?>
         <div class="item">
          <div class="leftItem"> 
         <?php if(!empty($front_view_product['ComPosProduct']['image'])) {?>
                    <?php  echo $this->Html->image('../'.$front_view_product['ComPosProduct']['image'], array("alt" => "No Image","width"=>"78" ,"height"=>"58","border"=>"0",'url' => array('controller' => 'PosProducts', 'action' => 'product_type_view',$front_view_product['ComPosProduct']['slug'])));?>
                    
        <?php }else{?>
           
		           <?php  echo $this->Html->image('/img/wpage/spr/no image.jpg', array("alt" => "No Image","width"=>"78" ,"height"=>"58","border"=>"0"));?>
		   
		<?php }?>
        
         <div class="product_name"><?php echo $this->Html->link($front_view_product['ComPosProduct']['name'], array('controller' => '#', 'action' =>'#'),array('class'=>'')); ?></div>
         
         </div>
            
        </div>
     <?php }}else{?>
     
    <?php echo "<h3 class='product_msg'>There are no products available.</h3>";?>
     <?php } ?>
       </div>