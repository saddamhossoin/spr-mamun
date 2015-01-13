<?php //pr($solid_products);?>
<?php echo $this->Html->css(array('wpage/spr/wpage','module/PosProducts/device_accessories'));
 echo $this->Html->script(array('module/Shop/addtocart','module/PosProducts/jquery.qtip.min')); 

 echo $this->Html->script(array('module/PosProducts/device_accessories'));?>
 <div id="img_parent">
 <?php if(!empty($solid_products)){ ?>
 
 		 <div class="product_name_main">
		 <?php echo $this->Html->link($solid_products['PosProduct']['name'], array('controller' => 'PosProducts', 'action' => 'device_accessories',$solid_products['PosProduct']['slug']),array('class'=>'')); ?>
         </div>
          <div class="main_item">
          <div class="img_leftItem"> 
         <?php if(!empty($solid_products['PosProduct']['image'])) {?>
         
                    <?php  echo $this->Html->image('../'.$solid_products['PosProduct']['image'], array("alt" => "No Image","width"=>"78" ,"height"=>"58","border"=>"0",'url' => array('controller' => 'PosProducts', 'action' =>'device_accessories',$solid_products['PosProduct']['slug'])));?>
                    
        <?php }else{?>
           
		           <?php  echo $this->Html->image('/img/wpage/spr/no image.jpg', array("alt" => "No Image","width"=>"78" ,"height"=>"58","border"=>"0"));?>
		   
		<?php }?>
        
        
         
         </div>
         <div class="description_RightItem">
         <?php echo $solid_products['PosProduct']['description']; ?>
         </div>
         
   
         
         
         
            
        </div>
     <?php  }else{?>
     
    <?php echo "<h3 class='product_msg'>There are no products available.</h3>";?>
     <?php } ?>
     
       <!-------============================================----->
     <p>

<?php 
   //pr($compitableProductItem);
 if(!empty($solid_products)){?>
      
     <?php // pr($comProduct);?>
         
          <div class="item">
         
            
            <?php echo $this->Form->create(NULL, array('url' => array('controller' => 'shop', 'action' => 'add'),'id'=>'ShopCard_'.$solid_products['PosProduct']['id'])); ?>
		    <?php echo $this->Form->input('id', array('type' => 'hidden', 'value' => $solid_products['PosProduct']['id'])); ?>
            <?php echo $this->Form->input('price', array('type' => 'hidden', 'value' => $solid_products['PosProduct']['salesprice'])); ?>
        
           <div class="price_qty_div">
             <span class="price_span">Price :</span>
             <span class="price_span"> $ <?php echo $solid_products['PosProduct']['salesprice'];?></span></br>
             <span class="price_span">Quantity</span>
             <span class="price_span"> 
			
             <form id='myform' method='POST' action='#'>
                <input type='button' value='-' class='qtyminus' id="btnqtyminus_<?php echo $solid_products['PosProduct']['id'];?>" field='quandtity' />
                <input type='text' name='data[PosProduct][quantity]' value='0' id="qtyplus_<?php echo $solid_products['PosProduct']['id'];?>" class='qty' />
       <input type='button' value='+' class='qtyplus'  id="btnqtyplus_<?php echo $solid_products['PosProduct']['id'];?>" field='quantity' />
			 </form>
			 
			</span>
            
           
            </div>
            
            <div class="hole_btn">
             
             <span class="des_btn_span">
              <?php if($solid_products['PosStock']['quantity'] > 0){?> 
             <?php echo $this->Form->button('Available',array('class'=>'available_btn')); ?>
              <?php } else {?> <?php echo $this->Form->button('Out Of Stock',array('class'=>'out_of_stock')); ?>
			  <?php }?>
			 </span>
             
             
              <?php if($solid_products['PosStock']['quantity'] > 0){?> 
             <span class="des_btn_span"><?php echo $this->Form->button('Add to Cart',array('class' => 'addtocart','id'=> $solid_products['PosProduct']['id'])); ?></span>
              <?php }else{?>
			 <span class="des_btn_span" style="display:none"><?php echo $this->Form->button('Add to Cart',array('class' =>'addtocart','id'=> $solid_products['PosProduct']['id'])); ?></span> 
			  <?php }
			  
			  ?>
             
            </div>
           
             <?php echo $this->Form->end(); ?>
           
        </div>
        
        
         
   
	 <?php  }else{?>
     <?php echo "<h3 class='product_msg'>There are no products available.</h3>";?>
     <?php } ?>
 


</p>

     
      <!-------============================================----->    
 
</div>

<style type="text/css">
.hole_btn{
	width:272px !important;
	}
.flash-msg {
    position: absolute;
    right: 10px;
    top: 10px;
    z-index: 10000;
}
.alert-success {
    background-color: #DFF0D8;
    border-color: #D6E9C6;
    color: #3C763D;
}

.alert {
    border: 1px solid rgba(0, 0, 0, 0);
    border-radius: 4px;
    margin-bottom: 20px;
    padding: 15px;
}
</style>



