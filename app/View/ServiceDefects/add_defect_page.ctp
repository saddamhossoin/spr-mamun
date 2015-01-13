<div class="serviceDefects form">
<?php echo $this->Form->create('ServiceDefect');?>
 		<div id="WrapperServiceDefectName" class="microcontroll">
		<?php	echo $this->Form->label('ServiceDefect.name', __('Name'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('ServiceDefect.name',array('div'=>false,'label'=>false,'class'=>'required'));?>
        <span id="duplicateMessage" style="display:none">Service Defect exits. Please create another. </span>
		 
            <?php echo $this->Form->input('ServiceDefect.status',array( 'div'=>false,'label'=>false, 'type'=>'hidden','value'=>1 ));?>
		</div>
 <div class="button_area">
		<?php echo $this->Form->button('Save',array( 'class'=>'submit', 'id'=>'btn_ServiceDefect_add_form'));?>
		<?php echo $this->Form->button('Cancel',array('type'=>'reset','name'=>'reset','id'=>'Cancel_Add_New_Device_Defect'));?>
		<?php echo $this->Form->end();?>
</div>
</div>

<script type="text/javascript">
$( document ).ready(function() {
	
	
  $('#Cancel_Add_New_Device_Defect').on('click',function(){
	 	 $('#invoice').dialog('close');
	  }); 


 //====================== Add New Defect Save ===================
  $('#btn_ServiceDefect_add_form').on('click',function(e){
		e.preventDefault();
   		//========================== Validation Check ========
	 	if( $('#ServiceDefectAddDefectPageForm').valid()) 
 		{
			$('.ajax_status').fadeIn();
			$('.ajax-save-message').hide().fadeOut(); 
			var ServiceDefectName = $('#ServiceDefectAddDefectPageForm #ServiceDefectName').val();
		//===================== Ajax Submit =================
		  $('#ServiceDefectAddDefectPageForm').ajaxSubmit({ 
	 		success: function(responseText, responseCode) { 
 			
 		 
		   $("#deviceDefectsAddingListGrid").append("<tr class='DeviceDefectsGridTr_"+responseText+"'><td><input type='hidden' value='"+responseText+"' name='data[ServiceDeviceDefect][service_defect_id]["+responseText+"]'/>"+ServiceDefectName +"</td><td><span class='popup_remove_link' id='ServiceDefectItemRemove_"+responseText+"'>Remove</span></td></tr>");         
  			$('.ajax_status').hide(); 
			$('.ajax-save-message').hide().html('Success : Add New Defect').fadeIn(); 
			 $('#ServiceDefectAddDefectPageForm #ServiceDefectName').val('');
			// $('#invoice').dialog('close');
  			}
		});
	}
  	return false; 
	}).appendTo('form div.submit'); 
 
});
$('#ServiceDefectName').blur(function(e) {	
		e.preventDefault();
		 var DefectName =	$(this).val();
		  $.ajax({
				type: "GET",
				url:siteurl+"PosBrands/checkFieldDuplicate/ServiceDefect/name/"+DefectName,
				success: function(viewText,response){
					//alert(viewText);
  				if(viewText == 1)
				{	
 					$("#ServiceDefectName").val('');
					$('#duplicateMessage').show();
			 	}
				else{
					$('.ajax_status').hide(); 
					$('#duplicateMessage').hide();
				}
				 
			}
		});
 	});
</script>

<style type="text/css">
  #WrapperServiceDefectName .button_area_filter {
    display: inline !important;
    margin: 0 !important;
    padding: 0 !important;
}
.popup_add_link ,.popup_remove_link {
    background: url("../img/grid/title.gif") repeat-x scroll left bottom #FFFFFF;
    border: 1px solid #D7D7D7;
    border-radius: 5px;
    color: #036FAD;
    cursor: pointer;
    display: inline-block;
    float: right;
    font-size: 11px;
    font-weight: bold;
    padding: 3px 7px;
    position: relative;
}
.serviceDeviceInfos label{
	float:left !important;
}
.form{
	width:409px !important;
	margin-top:25px;
}
#invoice{
	height:150px !important;
}
#duplicateMessage{
	display: block;
    padding: 10px 0 12px 120px;
}
.microcontroll input[type="text"], .microcontroll input[type="number"] {
    width: 232px !important;
}
  </style>


 




