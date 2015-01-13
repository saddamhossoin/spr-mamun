 <?php echo $this->Html->css(array('module/PosProducts/shop'));?>
<div id="reviews" class="welcome">
        <h2>PRODOTTI LISTA</h2>
      <?php  if(!empty($posProducts)){?>
       <?php foreach($posProducts as $posProduct){
		    ?>
         <div class="item">
          <div class="leftItem"> 
         <?php if(!empty($posProduct['PosBrand']['image'])) {?>
                    <?php  echo $this->Html->image('../'.$posProduct['PosBrand']['image'], array("alt" => "No Image" ,"border"=>"0",'url' => array('controller' => 'PosProducts', 'action' => 'shop','Brand',$posProduct['PosBrand']['slug'])));?>     
        <?php }else{?>
               <?php  echo $this->Html->image('/img/wpage/spr/no image.jpg', array("alt" => "No Image", "border"=>"0"));?>
	 	<?php }?>
        
         <div class="product_name"><?php echo $this->Html->link($posProduct['PosBrand']['name'], array('controller' => 'PosProducts', 'action' => 'shop','Brand',$posProduct['PosBrand']['slug']),array('class'=>'')); ?></div>
         
         </div>
            
        </div>
     <?php }}else{?>
     
    <?php echo "<h3 class='product_msg'>There are no products available.</h3>";?>
     <?php } ?>
       </div>