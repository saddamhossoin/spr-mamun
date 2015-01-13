<?php    echo $this->Html->script('jquery.form'); ?>
<div class="AssesmentApproveNotes form">
<?php echo $this->Form->create('AssesmentApproveNote',array('enctype' => 'multipart/form-data','type'=>'file'));?>
<?php echo $this->Form->input('AssesmentApproveNote.service_device_info_id',array('value'=>$serviceDeviceInfos,'div'=>false,'label'=>false,'type'=>'hidden' ));?>   
        <div id="WrapperAssesmentApproveNote" class="microcontroll">
             <?php	echo $this->Form->input('AssesmentApproveNote.user_id',array('value'=>$user_id,'div'=>false,'label'=>false,'class'=>'','type'=>'hidden'));?>
		</div>
         <div id="WrapperAssesmentDescription" class="microcontroll">
		<?php  	echo $this->Form->label('AssesmentApproveNote.screenimage', __('Image'.' :<span class=star></span>', true) );?>
        <?php   echo $this->Form->input('AssesmentApproveNote.screenimage',array('type'=>'file','div'=>false,'label'=>false,'class'=>'' ));   ?>     
       </div>
         <div id="WrapperAssesmentApproveNote" class="microcontroll">
			<?php	echo $this->Form->label('AssesmentApproveNote.notes', __('Note'.':<span class=star></span>', true) );?>
            <?php   echo $this->Form->textarea('AssesmentApproveNote.notes',array('div'=>false,'label'=>false,'class'=>''));?>
		</div>
  	 
        <div class="button_area">
			<?php echo $this->Form->button('Save',array( 'class'=>'submit', 'id'=>'btn_AssesmentApproveNotes_add'));?>
            <?php echo $this->Form->button('Cancel',array('type'=>'reset','name'=>'reset','id'=>'Cancel'));?>
            <?php echo $this->Form->end();?>
        </div>
    </div>
    
    
<script>
jQuery(function($){ 

	
	
	 $('#AssesmentApproveNoteTechCompleteNoteForm').ajaxForm({
				beforeSubmit: function(){ },
			   success: function(response) {
  					 $('.ajax_status').hide(); 
					$('.ajax-save-message').hide().html("Successfully Saved").fadeIn(); 
					if(response != '0'){
 							$('.ajax_status').hide();
							$('#Cancel').click(); 
							location.reload(); 
						 
					}else{
						$('.overlaydiv').hide(); 
						$('.ajax-save-message').hide().html('Assesment save failed.').fadeIn(); 
					} 
					
 				} 
			});
			
			
	 
	
	
	
});

</script>

<style>
#AssesmentApproveNoteUserId
{
	width:234px;
	}
#AssesmentApproveNoteNotes{
	width:220px;
	height:100px;
	margin-left:89px;
	}
.button_area {
    margin-left: 45px !important;
    margin-top: 36px !important;
    width: 270px;
}
.AssesmentApproveNotes {
	width:440px;
	}
</style>
 




