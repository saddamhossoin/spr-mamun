 <div class="AssesmentApproveNotes form">
<?php echo $this->Form->create('AssesmentApproveNote');?>
<?php echo $this->Form->input('AssesmentApproveNote.service_device_info_id',array('value'=>$id_re_assement,'div'=>false,'label'=>false,'type'=>'hidden' ));?>  
	<div id="WrapperAssesmentApproveNote" class="microcontroll">
		<?php	echo $this->Form->label('AssesmentApproveNote.notes', __('Note'.':<span class=star></span>', true) );?>
        <br />
        <?php	echo $this->Form->textarea('AssesmentApproveNote.notes',array('div'=>false,'label'=>false,'class'=>''));?>
	</div>
	<div class="button_area">
		<?php	echo $this->Form->button('Save',array( 'class'=>'submit', 'id'=>'btn_AssesmentApproveNotes_CompleteNote'));?>
        <?php	echo $this->Form->button('Cancel',array('type'=>'reset','name'=>'reset','id'=>'Cancel'));?>
    </div>
    <?php echo $this->Form->end();?>
    </div>
    <div class="overlaydiv" style="display:none;">&nbsp;</div>
     
<script>
jQuery(function($){ 
 	 $('#btn_AssesmentApproveNotes_CompleteNote').click(function(e){
		 e.preventDefault();
 		//========================== Validation Check ========
 			$('.overlaydiv').fadeIn();
			$('.ajax-save-message').hide().fadeOut(); 
 
 			$.ajax({
			type: "POST",
			url:siteurl+"Assesments/assesment_complete/",
			data:  $("#AssesmentApproveNoteAssesmentCompleteForm").serialize(),
			success: function(response){
				if(response == 1){
					location.reload();
				}else{
					 $.alert.open("Job complete status is not change.");
				}
 		 		}
 			});
		//===================== Ajax Submit =================
 	});
	
 });

</script>

<style>
#AssesmentApproveNoteUserId
{
	width:234px;
}
#AssesmentApproveNoteNotes{
	width:305px;
	height:110px;
}
.button_area {
     margin-top: 36px !important;
 }
.AssesmentApproveNotes {
	width:310px !important;
}
</style>
 




