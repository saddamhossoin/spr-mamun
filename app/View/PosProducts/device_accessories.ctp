<?php echo $this->Html->css(array('wpage/spr/wpage','module/PosProducts/device_accessories'));
 echo $this->Html->script(array('module/Shop/addtocart','module/PosProducts/jquery.qtip.min')); 

 echo $this->Html->script(array('module/PosProducts/device_accessories'));?>
 <div id="img_parent">
 <?php if(!empty($type_products)){ ?>
 
 		 <div class="product_name_main">
		 <?php echo $this->Html->link($type_products['PosProduct']['name'], array('controller' => 'PosProducts', 'action' => 'device_accessories',$type_products['PosProduct']['slug']),array('class'=>'')); ?>
         </div>
          <div class="main_item">
          <div class="img_leftItem"> 
         <?php if(!empty($type_products['PosProduct']['image'])) {?>
         
                    <?php  echo $this->Html->image('../'.$type_products['PosProduct']['image'], array("alt" => "No Image","width"=>"78" ,"height"=>"58","border"=>"0",'url' => array('controller' => 'PosProducts', 'action' =>'device_accessories',$type_products['PosProduct']['slug'])));?>
                    
        <?php }else{?>
           
		           <?php  echo $this->Html->image('/img/wpage/spr/no image.jpg', array("alt" => "No Image","width"=>"78" ,"height"=>"58","border"=>"0"));?>
		   
		<?php }?>
        
        
         
         </div>
         <div class="description_RightItem">
         <?php echo $type_products['PosProduct']['description']; ?>
         </div>
            
        </div>
     <?php  }else{?>
     
    <?php echo "<h3 class='product_msg'>There are no products available.</h3>";?>
     <?php } ?>
 
</div>
<div id="tabs">

<ul>
<li><a href="#tabs-1">Accessori cellulari</a></li>
<li><a href="#tabs-2">Accessori originali</a></li>
<li><a href="#tabs-3">Ricambi cellulari</a></li>
<li><a href="#tabs-4">Strumentazione</a></li>
</ul>

<div id="tabs-1">
<p>

<?php 
   //pr($compitableProductItem);
 if(!empty($compitableProductItem)){?>
       <?php foreach($compitableProductItem as $comProduct){  ?>
     <?php // pr($comProduct);?>
          <?php  if ( $comProduct['PosProduct']['pos_type_id'] == '2' ) {  ?>
          <div class="item">
         <div class="product_name_main">
		 <?php echo  $comProduct['PosProduct']['name'] ; ?></div>
         <div class="img_name_full_div">
         
          <div class="leftItem"> 
         <?php if(!empty($comProduct['PosProduct']['image'])) {?>
                    <?php  echo $this->Html->image('../'.$comProduct['PosProduct']['image'], array("alt" => "No Image","width"=>"78" ,"height"=>"58","border"=>"0" ));?>
                    
        <?php }else{?>
           
		           <?php  echo $this->Html->image('/img/wpage/spr/no image.jpg', array("alt" => "No Image","width"=>"78" ,"height"=>"58","border"=>"0"));?>
		   
		<?php }?>
         
         </div>
           </div>
            
         <div class="description_grid">
            <h3 style="color:black;font-size:14px;">Description:</h3>
             <?php echo $comProduct['PosProduct']['description']; ?>
            </div>
            
            
            <?php echo $this->Form->create(NULL, array('url' => array('controller' => 'shop', 'action' => 'add'),'id'=>'ShopCard_'.$comProduct['PosProduct']['id'])); ?>
		    <?php echo $this->Form->input('id', array('type' => 'hidden', 'value' => $comProduct['PosProduct']['id'])); ?>
            <?php echo $this->Form->input('price', array('type' => 'hidden', 'value' => $comProduct['PosProduct']['salesprice'])); ?>
        
           <div class="price_qty_div">
             <span class="price_span">Price :</span>
             <span class="price_span"> $ <?php echo $comProduct['PosProduct']['salesprice'];?></span></br>
             <span class="price_span">Quantity</span>
             <span class="price_span"> 
			
             <form id='myform' method='POST' action='#'>
                <input type='button' value='-' class='qtyminus' id="btnqtyminus_<?php echo $comProduct['PosProduct']['id'];?>" field='quandtity' />
                <input type='text' name='data[PosProduct][quantity]' value='0' id="qtyplus_<?php echo $comProduct['PosProduct']['id'];?>" class='qty' />
       <input type='button' value='+' class='qtyplus'  id="btnqtyplus_<?php echo $comProduct['PosProduct']['id'];?>" field='quantity' />
			 </form>
			 
			</span>
            
           
            </div>
            
            <div class="hole_btn">
             <span class="des_btn_span"><?php $titletag = implode(',',$final_compitable_list[$comProduct['PosProduct']['id']]);
			 
			 echo $this->Form->button('Compatibility', array('class'=>'add','title'=>$titletag)); ?></span>
             <span class="des_btn_span">
              <?php if($comProduct['PosStock']['quantity'] > 0){?> 
             <?php echo $this->Form->button('Available',array('class'=>'available_btn')); ?>
              <?php } else {?> <?php echo $this->Form->button('Out Of Stock',array('class'=>'out_of_stock')); ?>
			  <?php }?>
			 </span>
             
              <?php if($comProduct['PosStock']['quantity'] > 0){?> 
             <span class="des_btn_span"><?php echo $this->Form->button('Add to Cart',array('class' => 'addtocart','id'=> $comProduct['PosProduct']['id'])); ?></span>
              <?php }else{?>
			 <span class="des_btn_span" style="display:none"><?php echo $this->Form->button('Add to Cart',array('class' => 'addtocart','id'=> $comProduct['PosProduct']['id'])); ?></span> 
			  <?php }
			  
			  ?>
            </div>
           
             <?php echo $this->Form->end(); ?>
           
        </div>
        
         <?php }?>
         
     <?php }}
	 else{?>
     <?php echo "<h3 class='product_msg'>There are no products available.</h3>";?>
     <?php } ?>
 


</p>
</div>

<div id="tabs-2">
<p>

<?php 
   //pr($compitableProductItem);
 if(!empty($compitableProductItem)){?>
       <?php foreach($compitableProductItem as $comProduct){  ?>
     <?php // pr($comProduct);?>
          <?php  if ( $comProduct['PosProduct']['pos_type_id'] == '3' ) {  ?>
          <div class="item">
         <div class="product_name_main">
		 <?php echo  $comProduct['PosProduct']['name'] ; ?></div>
         <div class="img_name_full_div">
         
          <div class="leftItem"> 
         <?php if(!empty($comProduct['PosProduct']['image'])) {?>
                    <?php  echo $this->Html->image('../'.$comProduct['PosProduct']['image'], array("alt" => "No Image","width"=>"78" ,"height"=>"58","border"=>"0" ));?>
                    
        <?php }else{?>
           
		           <?php  echo $this->Html->image('/img/wpage/spr/no image.jpg', array("alt" => "No Image","width"=>"78" ,"height"=>"58","border"=>"0"));?>
		   
		<?php }?>
         
         </div>
           </div>
            
         <div class="description_grid">
            <h3 style="color:black;font-size:14px;">Description:</h3>
             <?php echo $comProduct['PosProduct']['description']; ?>
            </div>
            
            
            <?php echo $this->Form->create(NULL, array('url' => array('controller' => 'shop', 'action' => 'add'),'id'=>'ShopCard_'.$comProduct['PosProduct']['id'])); ?>
		    <?php echo $this->Form->input('id', array('type' => 'hidden', 'value' => $comProduct['PosProduct']['id'])); ?>
            <?php echo $this->Form->input('price', array('type' => 'hidden', 'value' => $comProduct['PosProduct']['salesprice'])); ?>
        
           <div class="price_qty_div">
             <span class="price_span">Price :</span>
             <span class="price_span"> $ <?php echo $comProduct['PosProduct']['salesprice'];?></span></br>
             <span class="price_span">Quantity</span>
             <span class="price_span"> 
			
             <form id='myform' method='POST' action='#'>
                <input type='button' value='-' class='qtyminus' id="btnqtyminus_<?php echo $comProduct['PosProduct']['id'];?>" field='quandtity' />
                <input type='text' name='data[PosProduct][quantity]' value='0' id="qtyplus_<?php echo $comProduct['PosProduct']['id'];?>" class='qty' />
       <input type='button' value='+' class='qtyplus'  id="btnqtyplus_<?php echo $comProduct['PosProduct']['id'];?>" field='quantity' />
			 </form>
			 
			</span>
            
           
            </div>
            
            <div class="hole_btn">
             <span class="des_btn_span"><?php $titletag = implode(',',$final_compitable_list[$comProduct['PosProduct']['id']]);
			 
			 echo $this->Form->button('Compatibility', array('class'=>'add','title'=>$titletag)); ?></span>
             <span class="des_btn_span">
              <?php if($comProduct['PosStock']['quantity'] > 0){?> 
             <?php echo $this->Form->button('Available',array('class'=>'available_btn')); ?>
              <?php } else {?> <?php echo $this->Form->button('Out Of Stock',array('class'=>'out_of_stock')); ?>
			  <?php }?>
			 </span>
             
              <?php if($comProduct['PosStock']['quantity'] > 0){?> 
             <span class="des_btn_span"><?php echo $this->Form->button('Add to Cart',array('class' => 'addtocart','id'=> $comProduct['PosProduct']['id'])); ?></span>
              <?php }else{?>
			 <span class="des_btn_span" style="display:none"><?php echo $this->Form->button('Add to Cart',array('class' => 'addtocart','id'=> $comProduct['PosProduct']['id'])); ?></span> 
			  <?php }
			  
			  ?>
            </div>
           
             <?php echo $this->Form->end(); ?>
           
        </div>
        
         <?php }?>
         
     <?php }}
	 else{?>
     <?php echo "<h3 class='product_msg'>There are no products available.</h3>";?>
     <?php } ?>
 


</p>
</div>

<div id="tabs-3">


<?php 
//pr($type_products);
 if(!empty($compitableProductItem)){?>
       <?php foreach($compitableProductItem as $comProduct){  ?>      
         <?php  if ( $comProduct['PosProduct']['pos_type_id'] == '4' ) { ?>
         
         <div class="item">
         <div class="product_name_main"><?php echo  $comProduct['PosProduct']['name'] ; ?></div>
         <div class="img_name_full_div">
         
          <div class="leftItem"> 
         <?php if(!empty($comProduct['PosProduct']['image'])) {?>
                    <?php  echo $this->Html->image('../'.$comProduct['PosProduct']['image'], array("alt" => "No Image","width"=>"78" ,"height"=>"58","border"=>"0" ));?>
                    
        <?php }else{?>
           
		           <?php  echo $this->Html->image('/img/wpage/spr/no image.jpg', array("alt" => "No Image","width"=>"78" ,"height"=>"58","border"=>"0"));?>
		   
		<?php }?>
         
         </div>
          
          
          </div>
            
         <div class="description_grid">
            <h3 style="color:black;font-size:14px;">Description:</h3>
             <?php echo $comProduct['PosProduct']['description']; ?>
            </div>
            
            
            <?php echo $this->Form->create(NULL, array('url' => array('controller' => 'shop', 'action' => 'add'),'id'=>'ShopCard_'.$comProduct['PosProduct']['id'])); ?>
		<?php echo $this->Form->input('id', array('type' => 'hidden', 'value' => $comProduct['PosProduct']['id'])); ?>
        
            <div class="price_qty_div">
           
             <span class="price_span">Price :</span>
             <span class="price_span"> $ <?php echo $comProduct['PosProduct']['salesprice'];?></span></br>
            
             <span class="price_span">Quantity</span>
             <span class="price_span"> 
			
             <form id='myform' method='POST' action='#'>
                <input type='button' value='-' class='qtyminus' id="btnqtyminus_<?php echo $comProduct['PosProduct']['id'];?>" field='quandtity' />
                <input type='text' name='quantity' value='0' id="qtyplus_<?php echo $comProduct['PosProduct']['id'];?>" class='qty' />
       <input type='button' value='+' class='qtyplus'  id="btnqtyplus_<?php echo $comProduct['PosProduct']['id'];?>" field='quantity' />
			 </form>
			 
			</span>
           </br>
            
             
            
            </div>
            <div class="hole_btn">
             <span class="des_btn_span"><?php $titletag = implode(',',$final_compitable_list[$comProduct['PosProduct']['id']]);
			 
			 echo $this->Form->button('Compatibility', array('class'=>'add','title'=>$titletag)); ?></span>
             <span class="des_btn_span">
              <?php if($comProduct['PosStock']['quantity'] > 0){?> 
             <?php echo $this->Form->button('Available',array('class'=>'available_btn')); ?>
              <?php } else {?> <?php echo $this->Form->button('Out Of Stock',array('class'=>'out_of_stock')); ?>
			  <?php }?>
			 </span>
             
              <?php if($comProduct['PosStock']['quantity'] > 0){?> 
             <span class="des_btn_span"><?php echo $this->Form->button('Add to Cart',array('class' => 'addtocart','id'=> $comProduct['PosProduct']['id'])); ?></span>
              <?php }else{?>
			 <span class="des_btn_span" style="display:none"><?php echo $this->Form->button('Add to Cart',array('class' => 'addtocart','id'=> $comProduct['PosProduct']['id'])); ?></span> 
			  <?php }
			  
			  ?>
            </div>
            
            
            <?php echo $this->Form->end(); ?>
            
        </div>
        
         <?php }?>
         
     <?php }}
	 else{?>
     <?php echo "<h3 class='product_msg'>There are no products available.</h3>";?>
     <?php } ?>
 


</div>

<div id="tabs-4">
<p>

<?php 
//pr($type_products);
 if(!empty($compitableProductItem)){?>
       <?php foreach($compitableProductItem as $comProduct){  ?>      
         <?php  if ( $comProduct['PosProduct']['pos_type_id'] == '5' ) { ?>
         
         <div class="item">
         <div class="product_name_main"><?php echo  $comProduct['PosProduct']['name'] ; ?></div>
         <div class="img_name_full_div">
         
          <div class="leftItem"> 
         <?php if(!empty($comProduct['PosProduct']['image'])) {?>
                    <?php  echo $this->Html->image('../'.$comProduct['PosProduct']['image'], array("alt" => "No Image","width"=>"78" ,"height"=>"58","border"=>"0" ));?>
                    
        <?php }else{?>
           
		           <?php  echo $this->Html->image('/img/wpage/spr/no image.jpg', array("alt" => "No Image","width"=>"78" ,"height"=>"58","border"=>"0"));?>
		   
		<?php }?>
         
         </div>
          
          
          </div>
            
            <div class="description_grid">
            <h3 style="color:black;font-size:14px;">Description:</h3>
             <?php echo $comProduct['PosProduct']['description']; ?>
            </div>
            
            
        <?php echo $this->Form->create(NULL, array('url' => array('controller' => 'shop', 'action' => 'add'),'id'=>'ShopCard_'.$comProduct['PosProduct']['id'])); ?>
		<?php echo $this->Form->input('id', array('type' => 'hidden', 'value' => $comProduct['PosProduct']['id'])); ?>
        
           <div class="price_qty_div">
             <span class="price_span">Price :</span>
             <span class="price_span"> $ <?php echo $comProduct['PosProduct']['salesprice'];?></span></br>
             <span class="price_span">Quantity</span>
             <span class="price_span"> 
			
             <form id='myform' method='POST' action='#'>
                <input type='button' value='-' class='qtyminus' id="btnqtyminus_<?php echo $comProduct['PosProduct']['id'];?>" field='quandtity' />
                <input type='text' name='quantity' value='0' id="qtyplus_<?php echo $comProduct['PosProduct']['id'];?>" class='qty' />
       <input type='button' value='+' class='qtyplus'  id="btnqtyplus_<?php echo $comProduct['PosProduct']['id'];?>" field='quantity' />
			 </form>
			 
			</span>
            
            
            </div>
            <div class="hole_btn">
             <span class="des_btn_span"><?php $titletag = implode(',',$final_compitable_list[$comProduct['PosProduct']['id']]);
			 
			 echo $this->Form->button('Compatibility', array('class'=>'add','title'=>$titletag)); ?></span>
             <span class="des_btn_span">
              <?php if($comProduct['PosStock']['quantity'] > 0){?> 
             <?php echo $this->Form->button('Available',array('class'=>'available_btn')); ?>
              <?php } else {?> <?php echo $this->Form->button('Out Of Stock',array('class'=>'out_of_stock')); ?>
			  <?php }?>
			 </span>
             
              <?php if($comProduct['PosStock']['quantity'] > 0){?> 
             <span class="des_btn_span"><?php echo $this->Form->button('Add to Cart',array('class' => 'addtocart','id'=> $comProduct['PosProduct']['id'])); ?></span>
              <?php }else{?>
			 <span class="des_btn_span" style="display:none"><?php echo $this->Form->button('Add to Cart',array('class' => 'addtocart','id'=> $comProduct['PosProduct']['id'])); ?></span> 
			  <?php }
			  
			  ?>
            </div>
            
            <?php echo $this->Form->end(); ?>
            
        </div>
        
         <?php }?>
         
     <?php }}
	 else{?>
     <?php echo "<h3 class='product_msg'>There are no products available.</h3>";?>
     <?php } ?>
 

</p>
</div>


</div>
<script type="text/javascript"> 
jQuery(function($){ 
  $( '.add' ).tooltip({
	track: true
});
 });
 
</script>
<style type="text/css">
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
body .ui-tooltip {
  border-width:0;
}

.ui-tooltip,.arrow:after {
  background:black;
  border:0 solid white;
}

.ui-tooltip {
  padding:10px;
  color:white;
  border-radius:5px;
  font-family:Verdana, sans-serif;
  font-size:12px;
  text-transform:none;
}

.arrow {
  width:70px;
  height:16px;
  position:absolute;
  left:0!important;
  margin-left:-25px;
  top:55%;
}

.arrow.top {
  top:-16px;
  bottom:auto;
}

.arrow.left {
  left:20%;
}

.arrow:after {
  content:"";
  position:absolute;
  left:20px;
  top:-20px;
  width:25px;
  height:25px;
  box-shadow:6px 5px 9px -9px black;
  -webkit-transform:rotate(45deg);
  -moz-transform:rotate(45deg);
  -ms-transform:rotate(45deg);
  -o-transform:rotate(45deg);
  tranform:rotate(45deg);
}

.arrow.top:after {
  bottom:-20px;
  top:auto;
}

.ui-tooltip {
  -ms-filter:progid:DXImageTransform.Microsoft.Alpha(Opacity=70);
  filter:alpha(opacity=70);
  opacity:0.7;
}
</style>


