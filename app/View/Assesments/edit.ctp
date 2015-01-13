<?php echo $this->Form->create('Assesment',array('enctype' => 'multipart/form-data','type'=>'file'));?>
<?php	echo $this->Form->input('Assesment.id',array('div'=>false,'label'=>false,'type'=>'hidden'));?>
		<?php echo $this->Form->input('Assesment.service_device_info_id',array('value'=>$this->request->data['Assesment']['service_device_info_id'],'type'=>'hidden','div'=>false  ));?>
  		<div class="rdcontent_left1">
  		<div id="WrapperAssesmentDeliveryDate" class="microcontroll">
			<?php	echo $this->Form->label('Assesment.delivery_date', __('Delivery Date'.':<span class=star>*</span>', true) );?>
			<?php	echo $this->Form->input('Assesment.delivery_date',array('div'=>false,'type'=>'text','label'=>false,'class'=>''));?>
 		<div id="WrapperAssesmentDescription" class="microcontroll">
			<?php	echo $this->Form->label('Assesment.description', __('Description'.':', true) );?>
			<?php	echo $this->Form->input('Assesment.description',array('div'=>false,'label'=>false,'class'=>'','rows'=>2));?>
		</div>
          <div id="WrapperAssesmentDescription" class="microcontroll">
		<?php  	echo $this->Form->label('Assesment.asscheckImage', __('Image'.' :<span class=star></span>', true) );?>
        <?php   echo $this->Form->input('Assesment.asscheckImage',array('type'=>'file','div'=>false,'label'=>false,'class'=>'' ));   ?>     
       </div>
		</div>
         </div>
        <div class="rdcontent_right">
         <div id="WrapperAssesmentDescription" class="microcontroll">
	<?php	echo $this->Form->label('Assesment.note', __('Note'.':', true) );?>
	<?php	echo $this->Form->input('Assesment.note',array('div'=>false,'label'=>false,'class'=>'','rows'=>3));?>
		</div>
       
		<div class="button_area ba_assmentsave">
		<?php echo $this->Form->button('Update',array( 'class'=>'submit', 'id'=>'btn_Assesment_edit'));?>
 		
		</div>
        </div>
		<div class="clr"></div>
		<?php echo $this->Form->end();?>
</div>
<?php echo $this->Html->script(array('common/form','common/jquery.validate','common/jquery-ui-timepicker-addon'));  ?>
<?php echo $this->Html->css(array('common/jquery-ui-timepicker-addon'));  ?>

 <script type="text/javascript" >
	$(function(){
 	   /* $( "#AssesmentDeliveryDate").datepicker({
            changeMonth: true,
            changeYear: true,
			dateFormat:"yy-mm-dd",
			
         });*/
		 
		 $( "#AssesmentDeliveryDate").datetimepicker({
			 dateFormat:"yy-mm-dd",
			timeFormat: "hh:mm:ss"
			});
			
	 $('#AssesmentEditForm').ajaxForm({
		beforeSubmit: function(){
			if($('#AssesmentEditForm').valid()){
					$(".overlaydiv").fadeIn(1000);
				}else{
				return false;
			}
		 },
	   success: function(response) {
 			$('.ajax_status').hide(); 
			$('.ajax-save-message').hide().html("Successfully Saved").fadeIn(); 
			if(response != '0'){
			 $.ajax({
					type: "GET",
					url:siteurl+"Assesments/view/"+response,
					success: function(response1){
 						$('.ajax_status').hide(); 
						$('.reciveDeviceAssesmentContent').html(response1);
						$('.overlaydiv').hide(); 
 					}
				}); 
			
			}else{
				$('.overlaydiv').hide(); 
				$('.ajax-save-message').hide().html('Assesment save failed.').fadeIn(); 
			} 
		} 
	});
 	
	  //================== Assesment add ======================//
 	 //==================Assesment add end====================//
	  
 });	 
</script>
