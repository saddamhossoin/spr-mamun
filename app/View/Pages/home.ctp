<?php //pr($posBrands);?>
<?php echo $this->Html->css('module/Pages/home');?>

<div id="reviews" class="welcome">
        <h2>ELENCO MARCA</h2>
        
       <?php foreach($posBrands as $posBrand){ ?> 
       
      
       
        <div class="item">
          <div class="leftItem"> 
         <?php if(!empty($posBrand['PosBrand']['image'])) {?>
                   <a href=""> <?php  echo $this->Html->image('../'.$posBrand['PosBrand']['image'], array("alt" => "No Image","width"=>"78" ,"height"=>"58","border"=>"0",'url' => array('controller' => 'PosProducts',  'action' =>'shop','Brand',$posBrand['PosBrand']['slug'])));?></a>
          
          
        <?php }else{?>
           
		           <?php  echo $this->Html->image('/img/wpage/spr/no image.jpg', array("alt" => "No Image","width"=>"78" ,"height"=>"58","border"=>"0"));?>
		   
		<?php }?>
         </div>
          
           
        </div>
        
        <?php }?>
       </div>