<?php //pr($users);?>
<?php echo $this->Html->script(array('common/jquery.validate'));?>

<div class="AssesmentApproveNotes form">
<?php echo $this->Form->create('AssesmentApproveNote');?>
<?php echo $this->Form->input('AssesmentApproveNote.service_device_info_id',array('value'=>$serviceDeviceInfos,'div'=>false,'label'=>false,'type'=>'hidden' ));?>  
<span id="forsaveapproved" style="display:none"><?php echo $way; ?></span> 
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
			<?php echo $this->Form->button('Save',array( 'class'=>'submit', 'id'=>'btn_AssesmentApproveNotes_add'));?>
            <?php echo $this->Form->button('Cancel',array('type'=>'reset','name'=>'reset','id'=>'Cancel'));?>
            <?php echo $this->Form->end();?>
        </div>
    </div>
    <div class="overlaydiv" style="display:none;">&nbsp;</div>

    
    
<script>
jQuery(function($){ 

	
	 $('#btn_AssesmentApproveNotes_add').click(function(e){
		 e.preventDefault();
		 
		//========================== Validation Check ========
  		if( $("#AssesmentApproveNoteAddForm").valid()) 
 		{
		 
			$('.overlaydiv').fadeIn();
			$('.ajax-save-message').hide().fadeOut(); 
			
			var ServiceDeviceInfoId = $('#AssesmentApproveNoteServiceDeviceInfoId').val(); 
			var save_approved = $('#forsaveapproved').html(); 
			
			$.ajax({
			type: "POST",
			url:siteurl+"AssesmentApproveNotes/add/"+ServiceDeviceInfoId+"/"+save_approved,
			data:  $("#AssesmentApproveNoteAddForm").serialize(),
			success: function(response){
			 
 				if(response == 'yes')
				
				    {
					
					$("#invoice5").dialog("close");
					 	/*$('.ajax_status').hide();
						$('#Cancel').click(); 
						
				 		*/
						
					var ulrs =siteurl+"Assesments/recieve/"+ServiceDeviceInfoId;
					$("#invoice1").load(ulrs, [], function(){
				 	$("#invoice1").dialog("open");
						 $('.overlaydiv').fadeOut();
			 			 $('.overlaydiv').fadeOut();
						 
					});
					
					
					 } else{
							 
						  location.reload(); 
						 
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

    margin-top: 36px !important;
    width: 270px;
}
.AssesmentApproveNotes {
	width:435px !important;

	}
</style>
 




