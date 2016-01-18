<br />
<div>
	<div class="leftpan">
		<div class="header">Brand</div>
        <ul id="brands" class="product_brand">
		  <?php
		  //pr();
         // pr($posBrands );die();
            foreach ($posBrands as $posBrand){?>
             <li>
                <?php   echo $this->Html->link($posBrand['PosBrand']['name'], array('controller'=>'PosProducts','action'=>'shop','Brand',$posBrand['PosBrand']['slug']));?>
				 
              </li>
           <?php }?>
        </ul>
	</div>
    <div class="rightpan">
    

<div class="header searchbox"> 
<div class="bread_curm"> 
 <ul class="breadcrumb">
	<li> <?php echo $this->Html->link(__('HOME'), array('controller'=>'Pages','action' => 'home'));?></li>
	<li> <?php echo $this->Html->link(__('SPARE PARTS'), array('controller'=>'PosBrands','action' => 'brand_list'));?></li>
    <li> <?php echo $this->Html->link(__($this->params['pass'][1]), array('controller'=>'PosProducts','action' => 'shop/'.$this->params['pass'][0].'/'.$this->params['pass'][1]));?></li>
  </ul>
</div>
<?php echo $this->Form->create('PosProducts',array('controller'=>'PosProducts','action'=>'shop/'.$this->params['pass'][0].'/'.$this->params['pass'][1]));?>
 <?php	
 echo $this->Form->hidden('PosProducts.brandtype',array('div'=>false,'label'=>false,'value'=>$this->params['pass'][0]));
 echo $this->Form->hidden('PosProducts.brand',array('div'=>false,'label'=>false,'value'=>$this->params['pass'][1]));?>
  <?php	echo $this->Form->input('PosProducts.Product',array('div'=>false,'label'=>false,'class'=>'required' ,'placeholder'=>'Search'));?>

 <?php echo $this->Form->button('Search',array( 'class'=>'submit', 'id'=>'btn_brand_search'));?>
  <?php echo $this->Form->button('Reset',array( 'class'=>'submit', 'id'=>'btn_brand_reset','type'=>'reset','onClick'=>"parent.location='".$this->webroot."PosProducts/shop/".$this->params['pass'][0].'/'.$this->params['pass'][1]."'"));?>
   </div>
   <ul id="brandslist" class="product_brand">
    <?php  if(!empty($posProducts)){?>
       <?php foreach($posProducts as $posProduct){ ?>
         <li class="item">
          <div class="leftItem"> 
         <?php if(!empty($posProduct['PosProduct']['image'])) {?>
                    <?php  echo $this->Html->image('../'.$posProduct['PosProduct']['image'], array("alt" => "No Image","width"=>"78" ,"height"=>"58","border"=>"0",'url' => array('controller' => 'PosProducts', 'action' => 'device_accessories',$posProduct['PosProduct']['slug'])));?>       
					
        <?php }else{?>
           
		           <?php  echo $this->Html->image('/img/wpage/noimage.jpg', array("alt" => "No Image","width"=>"78" ,"height"=>"58","border"=>"0"));?>
		   
		<?php }?>
          <div class="product_name"><?php echo $this->Html->link($posProduct['PosProduct']['name'], array('controller' => 'PosProducts', 'action' => 'device_accessories',$posProduct['PosProduct']['slug']),array('class'=>'')); ?></div>
         
         
          
         </div>
            
        </li>
     <?php }}else{?>
     
    <?php echo "<h3 class='product_msg'>There are no products available.</h3>";?>
     <?php } ?>
</ul>
    </div>


</div>
<div style="clear:both"></div>
<br /><br />
 
 
<style>
.action_link {
    
    _border-radius: 5px;
    color: #036FAD;
    display: inline-block;
    font-size: 11px;
    font-weight: bold;
    padding: 1px 0px;
    position: relative;
	margin-top:3px;
}
</style>