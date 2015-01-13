<?php //pr($posProducts);?>
 <?php echo $this->Html->css(array('module/PosProducts/shop'));?>
<div id="reviews" class="welcome">
        <h2>PRODOTTI LISTA</h2>
      <?php  if(!empty($posProducts)){?>
       <?php foreach($posProducts as $posProduct){ ?>
         <div class="item">
          <div class="leftItem"> 
         <?php if(!empty($posProduct['PosProduct']['image'])) {?>
                    <?php  echo $this->Html->image('../'.$posProduct['PosProduct']['image'], array("alt" => "No Image","width"=>"78" ,"height"=>"58","border"=>"0",'url' => array('controller' => 'PosProducts', 'action' => 'device_accessories',$posProduct['PosProduct']['slug'])));?>       
					
        <?php }else{?>
           
		           <?php  echo $this->Html->image('/img/wpage/spr/no image.jpg', array("alt" => "No Image","width"=>"78" ,"height"=>"58","border"=>"0"));?>
		   
		<?php }?>
        
         <?php echo $this->Html->link(__('Solid', true), array('action' => 'solid_device',$posProduct['PosProduct']['slug']),array('class'=>'link_view action_link')); ?>
         <?php echo $this->Html->link(__('Ricambi', true), array('action' => 'device_accessories',$posProduct['PosProduct']['slug']),array('class'=>'link_view action_link')); ?>
        
         <div class="product_name"><?php echo $this->Html->link($posProduct['PosProduct']['name'], array('controller' => 'PosProducts', 'action' => 'device_accessories',$posProduct['PosProduct']['slug']),array('class'=>'')); ?></div>
         
         
          
         </div>
            
        </div>
     <?php }}else{?>
     
    <?php echo "<h3 class='product_msg'>There are no products available.</h3>";?>
     <?php } ?>
     
       </div>
       
      <?php /*?> <div class="pDiv">
    <div class="pGroup">
     	 <?php if($this->params['paging']['PosProduct']['prevPage']){?>
      <span class='paginate_link'><?php echo $this->Paginator->first(__('<< First', true), array('class' => 'number-first'));?></span> <span class='paginate_link'><?php echo $this->Paginator->prev('< ' . __('Previous', true), array(), null, array('class'=>'disabled','id'=>'prev_id'));?></span>
      <?php }?>
       <?php echo $this->Paginator->numbers(array('class' => 'numbers', 'first' => false, 'last' => false));?>
      <?php 
	  
	  if($this->params['paging']['PosProduct']['nextPage'] ){?>
      <span class='paginate_link'> <?php echo $this->Paginator->next(__('Next', true) . ' >', array(), null, array('class' => 'disabled','id'=>'next_id', 'span'=>false));?> </span> <span class='paginate_link'><?php echo $this->Paginator->last(__('>> Last', true), array('class' => 'number-end'));?></span>
      <?php }?>
    </div>
  </div><?php */?>
 
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