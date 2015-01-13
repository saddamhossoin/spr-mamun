<?php echo $this->Html->script(array('common/form','common/jquery.validate'));?>
<div class="AssesmentApproveNotes form">
<?php echo $this->Form->create('AssesmentApproveNote');?>
     <div id="WrapperAssesmentApproveNote" class="microcontroll">
        <?php echo $this->Form->input('AssesmentApproveNote.id',array('div'=>false,'label'=>false,'class'=>''));?>
     </div>
        
    <div id="WrapperAssesmentApproveNote" class="microcontroll">
        <?php	echo $this->Form->label('AssesmentApproveNote.notes', __('Note'.':<span class=star></span>', true) );?>
        <?php	echo $this->Form->textarea('AssesmentApproveNote.notes',array('div'=>false,'label'=>false,'class'=>''));?>
    </div>
    <div class="button_area">
        <?php echo $this->Form->button('Save',array( 'class'=>'submit', 'id'=>'btn_AssesmentApproveNotes_Update'));?>
        <?php echo $this->Form->button('Cancel',array('type'=>'reset','name'=>'reset','id'=>'Cancel'));?>
        <?php echo $this->Form->end();?>
    </div>
</div>
<div class="overlaydiv" style="display:none;">&nbsp;</div>
<script>
jQuery(function($){ 
 	 $('#btn_AssesmentApproveNotes_Update').click(function(e){
		 e.preventDefault();
 		//========================== Validation Check ========
  		if( $("#AssesmentApproveNoteEditForm").valid()) 
 		{
 			$('.overlaydiv').fadeIn();
			$('.ajax-save-message').hide().fadeOut(); 
			
 		  $("#AssesmentApproveNoteEditForm").ajaxSubmit({ 
			success: function(responseText, responseCode) { 
			$('.ajax-save-message').hide().html(responseText).fadeIn(); 
			$('.ajax_status').hide(); 
 			$('#Cancel').click();
			 $('.overlaydiv').fadeOut();
			 
			 $("#invoice3").dialog("close");
			 $("#invoice6").dialog("close");
			 
			 
			 $("#view_Service_Note").click();
			 
			 
  			}
		});
		//===================== Ajax Submit =================
	
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

	}
.button_area {
    margin-left: 119px !important;
    margin-top: 36px !important;
    width: 270px;
}
.AssesmentApproveNotes {
width:361px;
	}
</style>
 




