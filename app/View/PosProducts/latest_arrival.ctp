<?php  //pr($compitableProductItem);?>
<br />
<div>
	<div class="leftpan">
		<div class="header">Brand</div>
        <ul id="brands" class="product_brand">
		  <?php
         
            foreach ($brandlists as $posBrand){?>
             <li>
                <?php   echo $this->Html->link($posBrand['PosBrand']['name'], array('controller'=>'PosProducts','action'=>'shop','Brand',$posBrand['PosBrand']['slug']));?>
				 
              </li>
           <?php }?>
        </ul>
	</div>
    <div class="rightpan">
    	 
      	<div class="header"> <?php echo __('LATEST ARRIVAL');?></div>  	 
      
 		
 
          <div id="tabs">
            <ul>
                <li><a href="#tabs-1">RICAMBI</a></li>
                 <li><a href="#tabs-2">BATTERIE</a></li>
                 <li><a href="#tabs-3">ACCESSORI</a></li>
            </ul>
            
            <div id="tabs-1">
                    
                    
                    <?php 
                    // pr($compitableProductItem);
                     if(!empty($compitableProductItem)){?>
                           <?php foreach($compitableProductItem as $comProduct){  ?>      
                             <?php  if ( $comProduct['PosProduct']['pos_type_id'] == '4' ) { ?>
                             
                             <div class="item">
                             <div class="overlaydivsmallpurchase" style="display: none;">&nbsp;</div>
                             <div class="product_name_main"><?php echo  $comProduct['PosProduct']['name'] ; ?></div>
                             <div class="img_name_full_div">
                               <div class="leftItem"> 
                              <?php if(!empty($comProduct['PosProduct']['image'])) {?>
                             <div class="zoom">
                              <div class="small">
			 					<?php  echo $this->Html->image('../'.$comProduct['PosProduct']['image'], array("alt" =>$comProduct['PosProduct']['name'],"border"=>"0" ));?>
							</div>
                             <div class="large">
							 <?php  echo $this->Html->image('../'.$comProduct['PosProduct']['image'], array("alt" =>$comProduct['PosProduct']['name'],"border"=>"0"  ));?>
							</div>
                            </div>
                             <?php }else{?>
                                        <?php  echo $this->Html->image('/img/wpage/noimage.jpg', array("alt" => $comProduct['PosProduct']['name'],"width"=>"78" ,"height"=>"58","border"=>"0"));  }?>
                              </div>
                               </div>
                               <div class="description_grid">
                                <p>
                                 	<?php 
										$cartval = 0;
									
										if( isset($cartdata) && array_key_exists($comProduct['PosProduct']['id'],$cartdata)){
											$cartval = $cartdata[$comProduct['PosProduct']['id']];
										}
									
									echo substr($comProduct['PosProduct']['description'],0,130); ?>
                                 </p>
                                 <div class="price_qty_div">
                                   <span class="price_span pricetxt"  > &#8364; <?php
								 //  pr($comProduct);
								   
									   echo $comProduct['PosProduct']['online_price'] ."<span>(iva incl.)</span>";
								   
								    ?></span>                                 <span class="price_span"> 
 							  <?php echo $this->Form->create(NULL, array('url' => array('controller' => 'shop', 'action' => 'add'),'id'=>'ShopCard_'.$comProduct['PosProduct']['id'])); ?>
                        <?php echo $this->Form->input('id', array('type' => 'hidden', 'value' => $comProduct['PosProduct']['id'])); ?>
                                    <input type='button' value='-' class='qtyminus' id="btnqtyminus_<?php echo $comProduct['PosProduct']['id'];?>" field='quandtity' />
                                    <input type='text' name='data[PosProduct][quantity]' value=<?php echo $cartval;?>  id="qtyplus_<?php echo $comProduct['PosProduct']['id'];?>" class='qty' />
                           <input type='button' value='+' class='qtyplus'  id="btnqtyplus_<?php echo $comProduct['PosProduct']['id'];?>" field='quantity' />
                                 </form>
                                 
                                </span>
                               </br>
                                
                                 
                                
                                </div>
                                 
                                </div>
                                
                                
                               
                            
                                <div style="clear:both;"></div>
                                <div class="hole_btn">
                                 <span class="des_btn_span"><?php //$titletag = implode(',',$final_compitable_list[$comProduct['PosProduct']['id']]);
                                 
                                // echo $this->Form->button('Compatibility', array('class'=>'add','title'=>$titletag));
								 
								  echo $this->Form->button(__("Compatibility"), array('id'=>$comProduct['PosProduct']['id'],'class'=>'add','title'=>$comProduct['PosProduct']['name'])); ?></span>
                                 <span class="des_btn_span">
                                  <?php if($comProduct['PosStock']['quantity'] > 0){?> 
                                 <?php echo $this->Form->button(__("Available"),array('class'=>'available_btn')); ?>
                                  <?php } else {?> <?php echo $this->Form->button(__("Out Of Stock"),array('class'=>'out_of_stock')); ?>
                                  <?php }?>
                                 </span>
                                 
                                  <?php if($comProduct['PosStock']['quantity'] > 0){?> 
                                 <span class="des_btn_span"><?php echo $this->Form->button(__("Add to Cart"),array('class' => 'addtocart','id'=> $comProduct['PosProduct']['id'])); ?></span>
                                  <?php }else{?>
                                 <span class="des_btn_span" style="display:none"><?php echo $this->Form->button(__("Add to Cart"),array('class' => 'addtocart','id'=> $comProduct['PosProduct']['id'])); ?></span> 
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
                    <div id="tabs-2">
                    
                    
                    <?php 
                  
                     if(!empty($compitableProductItem)){?>
                           <?php foreach($compitableProductItem as $comProduct){  ?>      
                             <?php  if ( $comProduct['PosProduct']['pos_type_id'] == '11' ) {   //pr($comProduct);?>
                             
                             <div class="item">
                             <div class="overlaydivsmallpurchase" style="display: none;">&nbsp;</div>
                             <div class="product_name_main"><?php echo  $comProduct['PosProduct']['name'] ; ?></div>
                             <div class="img_name_full_div">
                               <div class="leftItem"> 
                              <?php if(!empty($comProduct['PosProduct']['image'])) {?>
                             <div class="zoom">
                              <div class="small">
			 					<?php  echo $this->Html->image('../'.$comProduct['PosProduct']['image'], array("alt" => $comProduct['PosProduct']['name'],"border"=>"0" ));?>
							</div>
                             <div class="large">
							 <?php  echo $this->Html->image('../'.$comProduct['PosProduct']['image'], array("alt" => $comProduct['PosProduct']['name'],"border"=>"0"  ));?>
							</div>
                            </div>
                             <?php }else{?>
                                        <?php  echo $this->Html->image('/img/wpage/noimage.jpg', array("alt" => $comProduct['PosProduct']['name'],"width"=>"78" ,"height"=>"58","border"=>"0"));  }?>
                              </div>
                               </div>
                               <div class="description_grid">
                                <p>
                                 	<?php 
										$cartval = 0;
									
										if( isset($cartdata) && array_key_exists($comProduct['PosProduct']['id'],$cartdata)){
											$cartval = $cartdata[$comProduct['PosProduct']['id']];
										}
									
									echo substr($comProduct['PosProduct']['description'],0,130); ?>
                                 </p>
                                 <div class="price_qty_div">
                                   <span class="price_span pricetxt"  > &#8364; <?php  echo $comProduct['PosProduct']['online_price']."<span>(iva incl.)</span>";?></span>                                 <span class="price_span">
 							  <?php echo $this->Form->create(NULL, array('url' => array('controller' => 'shop', 'action' => 'add'),'id'=>'ShopCard_'.$comProduct['PosProduct']['id'])); ?>
                        <?php echo $this->Form->input('id', array('type' => 'hidden', 'value' => $comProduct['PosProduct']['id'])); ?>
                                    <input type='button' value='-' class='qtyminus' id="btnqtyminus_<?php echo $comProduct['PosProduct']['id'];?>" field='quandtity' />
                                    <input type='text' name='data[PosProduct][quantity]' value=<?php echo $cartval;?>  id="qtyplus_<?php echo $comProduct['PosProduct']['id'];?>" class='qty' />
                           <input type='button' value='+' class='qtyplus'  id="btnqtyplus_<?php echo $comProduct['PosProduct']['id'];?>" field='quantity' />
                                 </form>
                                 
                                </span>
                               </br>
                                
                                 
                                
                                </div>
                                 
                                </div>
                                
                                
                               
                            
                                <div style="clear:both;"
                                <div class="hole_btn">
                                 <span class="des_btn_span"><?php //$titletag = implode(',',$final_compitable_list[$comProduct['PosProduct']['id']]);
                                 
                                // echo $this->Form->button('Compatibility', array('class'=>'add','title'=>$titletag));
								 
								  echo $this->Form->button(__("Compatibility"), array('id'=>$comProduct['PosProduct']['id'],'class'=>'add','title'=>$comProduct['PosProduct']['name'])); ?></span>
                                 <span class="des_btn_span">
                                  <?php if($comProduct['PosStock']['quantity'] > 0){?> 
                                 <?php echo $this->Form->button(__("Available"),array('class'=>'available_btn')); ?>
                                  <?php } else {?> <?php echo $this->Form->button(__("Out Of Stock"),array('class'=>'out_of_stock')); ?>
                                  <?php }?>
                                 </span>
                                 
                                  <?php if($comProduct['PosStock']['quantity'] > 0){?> 
                                 <span class="des_btn_span"><?php echo $this->Form->button(__("Add to Cart"),array('class' => 'addtocart','id'=> $comProduct['PosProduct']['id'])); ?></span>
                                  <?php }else{?>
                                 <span class="des_btn_span" style="display:none"><?php echo $this->Form->button(__("Add to Cart"),array('class' => 'addtocart','id'=> $comProduct['PosProduct']['id'])); ?></span> 
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
                    
                   <div id="tabs-3">
                    
                    
                    <?php 
                    // pr($compitableProductItem);
                     if(!empty($compitableProductItem)){?>
                           <?php foreach($compitableProductItem as $comProduct){  ?>      
                             <?php  if ( $comProduct['PosProduct']['pos_type_id'] == '2' || $comProduct['PosProduct']['pos_type_id'] == '3' || $comProduct['PosProduct']['pos_type_id'] == '10'    ) { ?>
                             
                             <div class="item">
                             <div class="overlaydivsmallpurchase" style="display: none;">&nbsp;</div>
                             <div class="product_name_main"><?php echo  $comProduct['PosProduct']['name'] ; ?></div>
                             <div class="img_name_full_div">
                               <div class="leftItem"> 
                              <?php if(!empty($comProduct['PosProduct']['image'])) {?>
                             <div class="zoom">
                              <div class="small">
			 					<?php  echo $this->Html->image('../'.$comProduct['PosProduct']['image'], array("alt" => $comProduct['PosProduct']['name'],"border"=>"0" ));?>
							</div>
                             <div class="large">
							 <?php  echo $this->Html->image('../'.$comProduct['PosProduct']['image'], array("alt" => $comProduct['PosProduct']['name'],"border"=>"0"  ));?>
							</div>
                            </div>
                             <?php }else{?>
                                        <?php  echo $this->Html->image('/img/wpage/noimage.jpg', array("alt" =>$comProduct['PosProduct']['name'],"width"=>"78" ,"height"=>"58","border"=>"0"));  }?>
                              </div>
                               </div>
                               <div class="description_grid">
                                <p>
                                 	<?php 
										$cartval = 0;
									
										if( isset($cartdata) && array_key_exists($comProduct['PosProduct']['id'],$cartdata)){
											$cartval = $cartdata[$comProduct['PosProduct']['id']];
										}
									
									echo substr($comProduct['PosProduct']['description'],0,130); ?>
                                 </p>
                                 <div class="price_qty_div">
                                   <span class="price_span pricetxt">&#8364;<?php  echo $comProduct['PosProduct']['online_price']."<span>(iva incl.)</span>";?></span><span class="price_span">
 							  <?php echo $this->Form->create(NULL, array('url' => array('controller' => 'shop', 'action' => 'add'),'id'=>'ShopCard_'.$comProduct['PosProduct']['id'])); ?>
                        <?php echo $this->Form->input('id', array('type' => 'hidden', 'value' => $comProduct['PosProduct']['id'])); ?>
                                    <input type='button' value='-' class='qtyminus' id="btnqtyminus_<?php echo $comProduct['PosProduct']['id'];?>" field='quandtity' />
                                    <input type='text' name='data[PosProduct][quantity]' value=<?php echo $cartval;?>  id="qtyplus_<?php echo $comProduct['PosProduct']['id'];?>" class='qty' />
                           <input type='button' value='+' class='qtyplus'  id="btnqtyplus_<?php echo $comProduct['PosProduct']['id'];?>" field='quantity' />
                                 </form>
                                 
                                </span>
                               </br>
                                
                                 
                                
                                </div>
                                 
                                </div>
                                
                                
                               
                            
                                <div style="clear:both;"
                                <div class="hole_btn">
                                 <span class="des_btn_span"><?php //$titletag = implode(',',$final_compitable_list[$comProduct['PosProduct']['id']]);
                                 
                                // echo $this->Form->button('Compatibility', array('class'=>'add','title'=>$titletag));
								 
								  echo $this->Form->button(__("Compatibility"), array('id'=>$comProduct['PosProduct']['id'],'class'=>'add','title'=>$comProduct['PosProduct']['name'])); ?></span>
                                 <span class="des_btn_span">
                                  <?php if($comProduct['PosStock']['quantity'] > 0){?> 
                                 <?php echo $this->Form->button(__("Available"),array('class'=>'available_btn')); ?>
                                  <?php } else {?> <?php echo $this->Form->button(__("Out Of Stock"),array('class'=>'out_of_stock')); ?>
                                  <?php }?>
                                 </span>
                                 
                                  <?php if($comProduct['PosStock']['quantity'] > 0){?> 
                                 <span class="des_btn_span"><?php echo $this->Form->button(__("Add to Cart"),array('class' => 'addtocart','id'=> $comProduct['PosProduct']['id'])); ?></span>
                                  <?php }else{?>
                                 <span class="des_btn_span" style="display:none"><?php echo $this->Form->button(__("Add to Cart"),array('class' => 'addtocart','id'=> $comProduct['PosProduct']['id'])); ?></span> 
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
                     
                    
                    
                  
                   
                    
                       <?php /* ?>
					       <div id="tabs-3">
                        <p>
                        <?php 
                           //pr($compitableProductItem);
                            if(!empty($compitableProductItem)){ 
                             foreach($compitableProductItem as $comProduct){  
                                  if ( $comProduct['PosProduct']['pos_type_id'] == '2' ) {  ?>
                                  <div class="item">
                                     <div class="product_name_main">
                                        <?php echo  $comProduct['PosProduct']['name'] ; ?>
                                     </div>
                                     <div class="img_name_full_div">
                                 
                                        <div class="leftItem"> 
                                        <?php if(!empty($comProduct['PosProduct']['image'])) {  echo $this->Html->image('../'.$comProduct['PosProduct']['image'], array("alt" => "No Image","width"=>"78" ,"height"=>"58","border"=>"0" ));  }else{   echo $this->Html->image('/img/wpage/noImage.jpg', array("alt" => "No Image","width"=>"78" ,"height"=>"58","border"=>"0"));  }?>
                                         </div>
                                   </div>
                                    
                                 <div class="description_grid">
                                    <p>Description:</p>
                                     <?php echo $comProduct['PosProduct']['description']; ?>
                                    </div>
                                     <?php echo $this->Form->create(NULL, array('url' => array('controller' => 'shop', 'action' => 'add'),'id'=>'ShopCard_'.$comProduct['PosProduct']['id'])); ?>
                                    <?php echo $this->Form->input('id', array('type' => 'hidden', 'value' => $comProduct['PosProduct']['id'])); ?>
                                    <?php echo $this->Form->input('price', array('type' => 'hidden', 'value' => $comProduct['PosProduct']['salesprice'])); ?>
                                
                                   <div class="price_qty_div">
                                     <span class="price_span">Price :</span>
                                     <span class="price_span">&#8364; <?php echo $comProduct['PosProduct']['salesprice'];?></span><br />
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
                            else{ echo "<h3 class='product_msg'>There are no products available.</h3>";} ?>
                            
                        </p>
                    </div>
					     <div id="tabs-2">
                    <p>
                    
                    <?php 
                    //pr($type_products);
                     if(!empty($compitableProductItem)){?>
                           <?php foreach($compitableProductItem as $comProduct){  ?>      
                             <?php  if ( $comProduct['PosProduct']['pos_type_id'] == '11' ) { ?>
                             
                             <div class="item">
                             <div class="product_name_main"><?php echo  $comProduct['PosProduct']['name'] ; ?></div>
                             <div class="img_name_full_div">
                             
                              <div class="leftItem"> 
                             <?php if(!empty($comProduct['PosProduct']['image'])) {?>
                                        <?php  echo $this->Html->image('../'.$comProduct['PosProduct']['image'], array("alt" => "No Image","width"=>"78" ,"height"=>"58","border"=>"0" ));?>
                                        
                            <?php }else{?>
                               
                                       <?php  echo $this->Html->image('/img/wpage/noImage.jpg', array("alt" => "No Image","width"=>"78" ,"height"=>"58","border"=>"0"));?>
                               
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
                                 <span class="price_span"> &#8364; <?php echo $comProduct['PosProduct']['salesprice'];?></span><br />
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
                               
                                       <?php  echo $this->Html->image('/img/wpage/noImage.jpg', array("alt" => "No Image","width"=>"78" ,"height"=>"58","border"=>"0"));?>
                               
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
                                 <span class="price_span"> &#8364;<?php echo $comProduct['PosProduct']['salesprice'];?></span><br />
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
                    <?php */?>
               


</div>

	</div>
 </div>
<div style="clear:both"></div>
<br /><br />
 
<?php echo $this->Html->css(array('ui-10/jquery-ui-1.10.4.custom.min','module/PosProducts/device_accessories'));
 echo $this->Html->script(array('module/Shop/addtocart','wpage/jquery.anythingzoomer.min')); 

 echo $this->Html->script(array('module/PosProducts/device_accessories'));?>
 
<script type="text/javascript"> 
jQuery(function($){ 

 $('body').on('click', function (e) {
/*======================= Zoomer ======================== */
 	$('.az-overly').hide();
	$('.az-small').show();
	 
	 $('.add').each(function () {
        //the 'is' for buttons that trigger popups
        //the 'has' for icons within a button that triggers a popup
        if (!$(this).is(e.target) && $(this).has(e.target).length === 0 && $('.popover').has(e.target).length === 0) {
            $(this).popover('hide');
        }
    });
  });
/*======================= Zoomer ======================== */
		$(".zoom").anythingZoomer({
			overlay : true,
			edit: true,
			// If you need to make the left top corner be at exactly 0,0, adjust the offset values below
			offsetX : 0,
			offsetY : 0,
            initialzied : function(event, zoomer){
                alert('jewel');
            },
            zoom        : function(event, zoomer){alert('jwel');}, // zoom window visible
            unzoom      : function(event, zoomer){alert('maya');}
        });
 		$('.president')
		.bind('click', function(){
              return false;
		})
		.bind('mouseover click', function(){
 			var loc = $(this).attr('rel');
			if (loc && loc.indexOf(',') > 0) {
				loc = loc.split(',');
               $('.zoom').anythingZoomer( loc[0], loc[1] );
			}
			return false;
		});

/*========================== Compatability PopOver ================== */
 $('.add').popover({
	html: true,
	title: function() {
		var titlehed = $(".product_name").html();	
		return  titlehed;
	},
	content: function () {
		 
		var ids = $(this).attr('id');
 		return details_in_popup(ids);	
	}, 
	placement: function (context, source) {
        var position = $(source).position();

        if (position.left > 515) {
            return "left";
        }

        if (position.left < 515) {
            return "right";
        }

        if (position.bottom >500){
            return "top";
        }
	 if (position.bottom <500){
            return "top";
        }

    }
 	}); 
 });
function details_in_popup(id){
	$.ajax({
		url: siteurl+"PosCompatibilities/compatibality_list_by_product/"+id,
		success: function(response){
 		  $('#popoverContent').html(response);
 		}
	});
		 return '<div id="popoverContent">Loading...</div>';
	}
		
 

	
/*  $( '.add' ).tooltip({
		track: true
	});*/

 
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
  margin-left:-11px;
  top:15% !important;
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
.popover{
	min-width:410px;
}

</style>


