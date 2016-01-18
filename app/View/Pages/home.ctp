 <?php echo $this->Html->script(array('module/Pages/home' )); 
echo $this->Html->script(array('common/form','common/jquery.validate'));?>
<div id="contentarea1"> <span class="most">
        <aside id="text-5" class="widget widget_text">
          <h1 class="widget-title"><?php echo __("MOST POPULAR REPAIRS");?></h1>
          <div class="textwidget"></div>
        </aside>
        </span>
        <div id="option1">
          <div id="opt1">
            <div id="opt_left">
             	<?php echo $this->Html->image("wpage/sotto1.png", array("class"=>"","alt" => "Slider 1" ,"width"=>"230","height"=>"150"));?>  
            </div>
            <div id="opt_right">
              <aside id="text-7" class="widget widget_text">
                <h1 class="widget-title"><span class="color_text"><?php echo __("");?></span></h1>
                <div class="textwidget"> </div>
              </aside>
            </div>
          </div>
          <div id="opt2">
            <div id="opt_left">
             <?php echo $this->Html->image("wpage/sotto3.png", array("class"=>"","alt" => "Slider 1" ,"width"=>"230","height"=>"150"));?>   
            </div>
            <div id="opt_right">
              <aside id="text-9" class="widget widget_text">
                <h1 class="widget-title"><span class="color_text">  </span> </h1>
                <div class="textwidget"> </div>
              </aside>
            </div>
          </div>
          <div id="opt3">
            <div id="opt_left">
               <?php echo $this->Html->image("wpage/sotto2.png", array("class"=>"","alt" => "Slider 1" ,"width"=>"230","height"=>"150"));?>   
             </div>
            <div id="opt_right">
              <aside id="text-11" class="widget widget_text">
                <h1 class="widget-title"><span class="color_text"> </span>  </h1>
                <div class="textwidget"> </div>
              </aside>
            </div>
          </div>
        </div>
        <div style="clear:both;"></div>
      </div>
      
<div id="contentarea2">
        <div id="contentarea2_left">
         <span class="most1">
         
         <span class="most2">
         <div class="content_middle_most">
	    	<div class="content_middle_most_left">
             <span class="learn11">
 	    		    <h1 class="widget-title"> <?php echo __("Choose Solution Point!");?></h1>
           </span> 
    	     <div class="aboutus">
                <ul>
                    <li> <?php echo __("More than 10 years of industry experience.");?> </li>
                    <li><?php echo __("Collaboration with major brands of smartphone.");?></li>
                    <li><?php echo __("Any type of intervention.");?></li>
                    <li><?php echo __("SMD soldering with electron microscopes, regenerations display.");?></li>
                </ul>
			 </div>
             </div>
             <div class="content_middle_most_right">
             	<div class="text_cmmr_1"><?php echo __("RIPARARE");?></div>
                <div class="text_cmmr_2"><?php echo __("il tuo telefono in meno di un'ora!");?></div>
                <div class="text_cmmr_3"><?php echo __("Compila il modulo qui di fianco e prenota un'appuntamento");?></div>
                <div class="text_cmmr_4"><?php echo __("PRENOTATI");?> <span><?php echo __("SUBITO");?></span></div>
                
             </div>
         </div>
        </span>
        <div style="clear:both;"></div>
          <br /> 
           
          <span class="most2">
          	<span class="learn11">
 	    		    <h1 class="widget-title"><?php echo __("Mobile Phones for Sale");?></h1>
           </span> 
            <div style="clear:both;"></div>
           <div class="sellProdcut">
           	<div class="porducts_item">
            	<div class="procuts_img">
            		<?php echo $this->Html->image("wpage/VETRINA1.png", array("class"=>"","alt" => "Mobile" ,"width"=>"56","height"=>"105",'url'=>array('controller'=>'PosProducts','action'=>'device_accessories','galaxy-s5-sm-g900f')));?>  
                </div>
                 <div style="clear:both;"></div>
            </div>
            
            <div class="porducts_item">
            	<div class="procuts_img">
            		<?php echo $this->Html->image("wpage/VETRINA2.png", array("class"=>"","alt" => "Mobile" ,"width"=>"56","height"=>"105",'url'=>array('controller'=>'PosProducts','action'=>'device_accessories','galaxy-s4-gt-i9505-1')));?>  
                </div>
             </div>
            
            <div class="porducts_item">
            	<div class="procuts_img">
            		<?php echo $this->Html->image("wpage/VETRINA3.png", array("class"=>"","alt" => "Mobile" ,"width"=>"56","height"=>"105",'url'=>array('controller'=>'PosProducts','action'=>'device_accessories','galaxy-s3-gt-i9300')));?>  
                </div>
             </div>
            
            <div class="porducts_item">
            	<div class="procuts_img">
            		<?php echo $this->Html->image("wpage/VETRINA4.png", array("class"=>"","alt" => "Mobile" ,"width"=>"56","height"=>"105",'url'=>array('controller'=>'PosProducts','action'=>'device_accessories','iphone-5')));?>  
                </div>
             </div>
            </div>
          </span> 
          
          </span></div>
        <div id="contentarea2_right">
          <aside id="search-3" class="widget widget_search">
            <h1 class="get_a_quote"><?php echo __("Express Repair");?></h1>
            <div style="display:none;" class="text-success" id="sucGetAQuote"></div>
             <div style="display:none;" class="text-error" id="errcGetAQuote"></div>
           <?php echo $this->Form->create('ServiceGetAQuote');?>

       <div id="WrapperServiceGetAQuoteName" class="microcontroll">
		<?php	echo $this->Form->label('ServiceGetAQuote.name', __('NAME', true) );?>
		<?php	echo $this->Form->input('ServiceGetAQuote.name',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>
        	<div id="WrapperServiceGetAQuoteAddress" class="microcontroll">
		<?php	echo $this->Form->label('ServiceGetAQuote.address', __('ADDRESS', true) );?>
		<?php	echo $this->Form->input('ServiceGetAQuote.address',array('div'=>false,'label'=>false,'class'=>'','cols'=>38,'rows'=>2));?>
		</div>

		<div id="WrapperServiceGetAQuotePhone" class="microcontroll">
		<?php	echo $this->Form->label('ServiceGetAQuote.phone', __('PHONE', true) );?>
		<?php	echo $this->Form->input('ServiceGetAQuote.phone',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperServiceGetAQuoteEmail" class="microcontroll">
		<?php	echo $this->Form->label('ServiceGetAQuote.email', __('EMAIL', true) );?>
		<?php	echo $this->Form->input('ServiceGetAQuote.email',array('div'=>false,'label'=>false,'class'=>'required email'));?>
		</div>

		<div id="WrapperServiceGetAQuotePosBrandId" class="microcontroll">
		<?php	echo $this->Form->label('ServiceGetAQuote.pos_brand_id', __('BRAND', true) );?>
		<?php	 echo $this->Form->select('ServiceGetAQuote.pos_brand_id',$posBrands,array('div'=>false,'label'=>false,'class'=>'required','empty'=>'Please Select One'));
		
	 ?>
		</div>

		<div id="WrapperServiceGetAQuotePosProduct" class="microcontroll">
		<?php	echo $this->Form->label('ServiceGetAQuote.pos_product', __('MODEL', true) );?>
		<?php	echo $this->Form->input('ServiceGetAQuote.pos_product',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperServiceGetAQuoteDescription" class="microcontroll">
		<?php	echo $this->Form->label('ServiceGetAQuote.description', __('DEFECT DESCRIPTION', true) );?>
		<?php	echo $this->Form->input('ServiceGetAQuote.description',array('div'=>false,'label'=>false,'class'=>'','cols'=>38,'rows'=>6));?>
		</div>

		<?php	echo $this->Form->hidden('ServiceGetAQuote.status',array('div'=>false,'label'=>false,'value'=>'1'));?>
       
       
<br />
        
		 <div class="button_area">	
         <?php echo $this->Form->button(__('Quote Request!'),array( 'class'=>'submit', 'id'=>'btn_quote_submit'));?>  
		 
        </div>
       <?php echo $this->Form->end();?>
       <br />
          </aside>
        </div>
      </div>
 
 