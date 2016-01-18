 <?php //echo $this->Html->css(array('module/PosProducts/shop'));?>
<br />
<div>
	<div class="leftpan">
		<div class="header">Brand</div>
        <ul id="brands" class="product_brand">
		  <?php
       // pr($posBrands );die();
            foreach ($brandlists as $posBrand){?>
             <li>
                <?php  
				 if($posBrand['PosBrand']['slug'] == 'tools' ){
					 echo $this->Html->link($posBrand['PosBrand']['name'], array('controller'=>'PosProducts','action'=>'special_device',$posBrand['PosBrand']['slug']));
				 }else{
				 	echo $this->Html->link($posBrand['PosBrand']['name'], array('controller'=>'PosProducts','action'=>'shop','Brand',$posBrand['PosBrand']['slug']));
				 }?>
				 
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
  </ul>
</div>
<div class="search_area">
<?php echo $this->Form->create('PosBrand',array('controller'=>'PosBrands','action'=>'brand_list'));?>
 <?php	echo $this->Form->input('PosBrand.brand',array('div'=>false,'label'=>false,'class'=>'required' ,'placeholder'=>'Search'));?>
 <?php echo $this->Form->button('Search',array( 'class'=>'submit', 'id'=>'btn_brand_search'));?>
 <?php echo $this->Form->button('Reset',array( 'class'=>'submit', 'id'=>'btn_brand_reset','type'=>'reset','onClick'=>"parent.location='".$this->webroot."PosBrands/brand_list/yes'"));?>
 </div>
   </div>
 
  <ul id="brandslist" class="product_brand special_brand">
     <?php foreach ($posBrands as $posBrand){
		 if($posBrand['PosBrand']['slug'] == 'tools' ){
		 ?>
     <li>
       <span> <?php  echo $posBrand['PosBrand']['name']; ?> </span>
       <?php if(!empty($posBrand['PosBrand']['image'])) {?>
                   <a href=""> <?php  echo $this->Html->image('../'.$posBrand['PosBrand']['image'], array("alt" => "No Image","width"=>"78" ,"height"=>"58","border"=>"0",'url' =>array('controller' => 'PosProducts', 'action' =>'special_device',$posBrand['PosBrand']['slug'])));?></a>
         <?php }else{?>
 		           <?php  echo $this->Html->image('/img/wpage/noimage.jpg', array("alt" => "No Image","width"=>"78" ,"height"=>"58","border"=>"0"));?>
 		<?php }?>
     </li>
   <?php }}?>
 
 	<?php foreach ($posBrands as $posBrand){
		if($posBrand['PosBrand']['slug'] != 'tools' ){
			?>
     <li>
       <span> <?php  echo $posBrand['PosBrand']['name']; ?> </span>
       <?php if(!empty($posBrand['PosBrand']['image'])) {?>
                   <a href=""> <?php  echo $this->Html->image('../'.$posBrand['PosBrand']['image'], array("alt" => "No Image","width"=>"78" ,"height"=>"58","border"=>"0",'url' => array('controller' => 'PosProducts',  'action' =>'shop','Brand',$posBrand['PosBrand']['slug'])));?></a>
         <?php }else{?>
 		           <?php  echo $this->Html->image('/img/wpage/noimage.jpg', array("alt" => "No Image","width"=>"78" ,"height"=>"58","border"=>"0"));?>
 		<?php }?>
     </li>
   <?php }}?>
</ul>
    </div>


</div>
<div style="clear:both"></div>
<br /><br />

 

              