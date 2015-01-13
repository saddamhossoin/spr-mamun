<?php echo $this->Html->script('jquery.form');?>
<div class="posTypes form">
<?php echo $this->Form->create('PosType');?>
	<fieldset>
		<legend> </legend>
		<div id="WrapperPosTypeId" class="microcontroll">
 		<?php	echo $this->Form->input('PosType.id',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperPosTypeName" class="microcontroll">
		<?php	echo $this->Form->label('PosType.name', __('Name'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('PosType.name',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>

		<div id="WrapperPosTypeDescription" class="microcontroll">
		<?php	echo $this->Form->label('PosType.description', __('Description'.':<span class=star></span>', true) );?>
		<?php	echo $this->Form->input('PosType.description',array('div'=>false,'label'=>false,'class'=>''));?>
		</div>
  <div id="WrapperPosBrandImage" class="microcontroll">
		<?php	echo $this->Form->label('PosType.image', __('Image'.':<span class=star></span>', true) );?>
	    <?php   //echo $this->Form->input('PosProduct.image',array('type'=>'file','div'=>false,'label'=>false,'class'=>'' ));   ?>     
    
	    <div id="editimage">
		 <div class="imagedeletearea">
         <?php 
		 if(empty($this->request->data['PosType']['image'])){
			echo $this->Form->input('PosType.image',array('type'=>'file','div'=>false,'label'=>false,'class'=>'' ));}else{?>             
       <?php  echo $this->Html->image("../".$this->request->data['PosType']['image'], array("class"=>"productimage","alt" => "Image Not Found",  'url' => '#','width'=>150, 'height'=>150));?>
       <span class=deleteimage id="<?php echo $this->request->data['PosType']['id']?>">
		<?php echo $this->Html->image('cross.jpg', array('class' => 'remove','id'=>$this->request->data['PosType']['id'])); ?></span>
        </div>
	 	</div>
		<div id="inputimage" style="display:none">
		  <?php echo $this->Form->input('PosType.image',array('type'=>'file','div'=>false,'label'=>false,'class'=>'' ));
		    }?>  
		</div>
	      </div>
	</fieldset>
<div class="button_area">
		<?php echo $this->Form->button('Update',array( 'class'=>'submit', 'id'=>'btn_PosType_edit'));?>
		<?php echo $this->Form->button('Cancel',array('type'=>'reset','name'=>'reset','id'=>'Cancel'));?>
		<?php echo $this->Form->end();?>
</div>
</div>
 




