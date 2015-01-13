<?php //pr($users);?>
<?php echo $this->Html->script(array('common/jquery.validate'));?>

<div class="AssesmentApproveNotes form">
<?php echo $this->Form->create('AssesmentApproveNote');?>
<?php echo $this->Form->input('AssesmentApproveNote.service_device_info_id',array('value'=>$serviceDeviceInfos,'div'=>false,'label'=>false,'type'=>'hidden' ));?>   
        <div id="WrapperAssesmentApproveNote" class="microcontroll">
			<?php echo $this->Form->label('AssesmentApproveNote.user_id', __('Technician Name'.':<span class=star>*</span>', true) );?>
            <?php	 
            echo $this->Form->select('AssesmentApproveNote.user_id',$tech_namelist,array('div'=>false,'label'=>false,'class'=>'required','empty'=>'Please Select One'));?>
		</div>
        
        <div id="WrapperAssesmentApproveNote" class="microcontroll">
			<?php	echo $this->Form->label('AssesmentApproveNote.notes', __('Note'.':<span class=star></span>', true) );?>
            <?php	 
            echo $this->Form->textarea('AssesmentApproveNote.notes',array('div'=>false,'label'=>false,'class'=>''));?>
		</div>
        
        
 	 
        <div class="button_area">
			<?php echo $this->Form->button('Save',array( 'class'=>'submit', 'id'=>'btn_Assigntech_add'));?>
            <?php echo $this->Form->button('Cancel',array('type'=>'reset','name'=>'reset','id'=>'Cancel'));?>
            <?php echo $this->Form->end();?>
        </div>
    </div>
    <div class="overlaydiv" style="display:none;">&nbsp;</div>

    
    
<script>
jQuery(function($){ 

	
	 $('#btn_Assigntech_add').click(function(e){
		 e.preventDefault();
		 
		//========================== Validation Check ========
  		if( $("#AssesmentApproveNoteTechChecklistForm").valid()) 
 		{
		 
			$('.overlaydiv').fadeIn();
			$('.ajax-save-message').hide().fadeOut(); 
			
			$.ajax({
			type: "POST",
			url:siteurl+"AssesmentApproveNotes/tech_checklist",
			data:  $("#AssesmentApproveNoteTechChecklistForm").serialize(),
			success: function(response){
			      //alert(response);
				if(response)
				    {
					$("#invoice6").dialog("close");
 						$('#Cancel').click(); 
						location.reload(); 
						$('.overlaydiv').hide();
					 } 
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
    margin-left:105px !important;
    margin-top: 36px !important;
    width: 270px;
}
.AssesmentApproveNotes {
	width:440px;
	}
</style>
 




