<div class="serviceDefects form">
<?php echo $this->Form->create('ServiceDefect');?>
	<fieldset>
		<legend> </legend>

          
		<div id="WrapperServiceDefectName" class="microcontroll">
		<?php	echo $this->Form->label('ServiceDefect.name', __('Name'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('ServiceDefect.name',array('div'=>false,'label'=>false,'class'=>'required'));?>
        <span id="duplicateMessage" style="display:none">Service Defect exits. Please create another. </span>
		</div>
 		<div id="WrapperServiceDefectstatus" class="microcontroll">
		<?php echo $this->Form->label('ServiceDefect.status', __('Status'.': <span class="star">&nbsp;</span>', true) ); ?>
            <?php echo $this->Form->checkbox('ServiceDefect.status',array( 'div'=>false,'label'=>false, 'size'=>35 ));?>
		</div>


	</fieldset>
<div class="button_area">
		<?php echo $this->Form->button('Save',array( 'class'=>'submit', 'id'=>'btn_ServiceDefect_add'));?>
		<?php echo $this->Form->button('Cancel',array('type'=>'reset','name'=>'reset','id'=>'Cancel'));?>
		<?php echo $this->Form->end();?>
</div>
</div>

<script type="text/javascript">

	jQuery(function($){ 
 
//========================== Start Take Inventory ============================
  $(".popup_add_link").on('click',function(e){
		e.preventDefault();
		var ids= $(this).attr('id');
		var id= ids.split('_');
   		var valdefectName = $("#DefenctName_"+id[1]).html();	
	$("#deviceDefectsAddingListGrid").append("<tr class='DeviceDefectsGridTr_"+id[1]+"'><td><input type='hidden' value='"+id[1]+"' name='data[ServiceDeviceDefect][service_defect_id]["+id[1]+"]'/>"+valdefectName+"</td><td><span class='popup_remove_link' id='ServiceDefectItemRemove_"+id[1]+"'>Remove</span></td></tr>");
					 
  		});
	});

</script>
 




