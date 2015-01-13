<?php echo $this->Html->script('jquery.form');?>
<?php echo $this->Html->css(array('common/designfiled'));?> 
<div class="posBrands form">
<?php echo $this->Form->create('PosBrand');?>
	<fieldset>
		 <div id="WrapperPosBrandId" class="microcontroll">
		<?php	//echo $this->Form->label('PosBrand.id', __('Id'.':<span class=star>*</span>', true) );?>
		<?php	 echo $this->Form->input('PosBrand.id',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperPosBrandName" class="microcontroll">
		<?php	echo $this->Form->label('PosBrand.name', __('Name'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('PosBrand.name',array('div'=>false,'label'=>false,'class'=>'required'));?>
		<span id="duplicateMessage" style="display:none">Brand exits. Please create another. </span>
        </div>
        

		<div id="WrapperPosBrandAddress" class="microcontroll">
		<?php	echo $this->Form->label('PosBrand.address', __('Description'.':<span class=star>&nbsp;</span>', true) );?>
		<?php	echo $this->Form->input('PosBrand.address',array('div'=>false,'type'=>'textarea','label'=>false,'class'=>''));?>
		</div>
        <div id="WrapperPosBrandImage" class="microcontroll">
		<?php	echo $this->Form->label('PosBrand.image', __('Image'.':<span class=star></span>', true) );?>
	    <?php   //echo $this->Form->input('PosProduct.image',array('type'=>'file','div'=>false,'label'=>false,'class'=>'' ));   ?>     
    
	    <div id="editimage">
		 <div class="imagedeletearea">
         <?php 
		 if(empty($this->request->data['PosBrand']['image'])){
			echo $this->Form->input('PosBrand.image',array('type'=>'file','div'=>false,'label'=>false,'class'=>'' ));}else{?>             
       <?php  echo $this->Html->image("../".$this->request->data['PosBrand']['image'], array("class"=>"productimage","alt" => "Image Not Found",  'url' => '#','width'=>150, 'height'=>150));?>
       <span class=deleteimage id="<?php echo $this->request->data['PosBrand']['id']?>">
		<?php echo $this->Html->image('cross.jpg', array('class' => 'remove','id'=>$this->request->data['PosBrand']['id'])); ?></span>
        </div>
	 	</div>
		<div id="inputimage" style="display:none">
		  <?php echo $this->Form->input('PosBrand.image',array('type'=>'file','div'=>false,'label'=>false,'class'=>'' ));
		    }?>  
		</div>
	      </div>
<div class="button_area">
		<?php echo $this->Form->button('Update',array( 'class'=>'submit', 'id'=>'btn_PosBrand_edit'));?>
		<?php echo $this->Form->button('Cancel',array('type'=>'reset','name'=>'reset','id'=>'Cancel'));?>
		<?php echo $this->Form->end();?>
</div>
 
	</fieldset>
</div>
 


