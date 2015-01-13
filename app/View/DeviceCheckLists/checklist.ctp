<div class="DeviceCheckLists form">
<?php echo $this->Form->create('DeviceCheckList');
	echo $this->Form->input('ServiceDeviceInfo.id',array('value'=>$ids));
 ?>
 <div class="reciveDeviceContact reciveDevice">
    <div class="blocktitleinfo"> Device Information
	<?php echo "<span class='serial_no'>".'Serial No : '.$serviceDeviceInfo['ServiceDeviceInfo']['serial_no']."</span>";?>
     <?php 
	 $urgent_class = '';
		if($serviceDeviceInfo['ServiceDeviceInfo']['is_urgent'] == 1)
		{$urgent_class = 'urgent_class';}else{$urgent_class = '';}
		 
	if(!empty($serviceDeviceInfo['ServiceDeviceInfo']['screenimage'])){  ?>
    <span id="view_Service_Image" class="btn_view_image_link" title="<?php echo $serviceDeviceInfo['ServiceDeviceInfo']['id'];?>">Image</span>
     <?php } ?>
     <span id="view_Service_Note" class="btn_view_image_link" title="<?php echo $serviceDeviceInfo['ServiceDeviceInfo']['id'];?>">Note</span>
     
    </div>
    <div class="rdcontent_left">
      <table  class="assesmentSDIGrid">
        <thead>
          <tr>
            <td colspan="2" class="headingtag <?php echo $urgent_class; ?>">User Details&nbsp;</td>
            <td colspan="2" class="headingtag <?php echo $urgent_class; ?>">Device Details&nbsp;</td>
            <td colspan="2" class="headingtag <?php echo $urgent_class; ?>">Defect Details&nbsp;</td>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Email&nbsp;</td>
            <td><?php echo $serviceDeviceInfo['User']['email_address'];?>&nbsp;</td>
            <td>Type&nbsp;</td>
            <td><?php echo $serviceDeviceInfo['ServiceDevice']['PosPcategory']['name'];?>&nbsp;</td>
            <td>Defects&nbsp;</td>
            <td> <?php
 				if(!empty($serviceDeviceInfo['ServiceDeviceDefect'])){
 				foreach($serviceDeviceInfo['ServiceDeviceDefect'] as $defectlist){
    				echo $ServiceDeviceDefects[$defectlist['service_defect_id']] ." , ";
				}
				}else{
 					echo 'Defect not mention!!!';
				}?>&nbsp;
                </td>
          </tr>
          <tr>
            <td>Name&nbsp;</td>
            <td><?php echo $serviceDeviceInfo['User']['firstname'] .' '.$serviceDeviceInfo['User']['lastname'];?>&nbsp;</td>
            <td>Brand&nbsp;</td>
            <td><?php echo $serviceDeviceInfo['ServiceDevice']['PosBrand']['name'];?>&nbsp;</td>
            <td>Acessories&nbsp;</td>
            <td><?php 
			 
			if(!empty($serviceDeviceInfo['ServiceDeviceAcessory'])){
 		foreach($serviceDeviceInfo['ServiceDeviceAcessory'] as $accesorylist){
    		echo $ServiceDeviceAcessories[$accesorylist['service_acessory_id']] ." , ";
			}
		}else{
 			echo 'Acessory not mention!!!';
		}?>&nbsp;</td>
          </tr>
          <tr>
            <td>Phone&nbsp;</td>
            <td><?php echo $serviceDeviceInfo['User']['phone'];?>&nbsp;</td>
            <td>Name&nbsp;</td>
            <td><?php echo $serviceDeviceInfo['ServiceDevice']['name'];?>&nbsp;</td>
            <td>Rec. Date&nbsp;</td>
            <td><?php echo $serviceDeviceInfo['ServiceDeviceInfo']['recive_date'];?>&nbsp;</td>
          </tr>
          <tr>
            <td>P.IVA&nbsp;</td>
            <td><?php echo $serviceDeviceInfo['User']['piva'];?>&nbsp;</td>
            <td>Serial&nbsp;</td>
            <td><?php echo $serviceDeviceInfo['ServiceDeviceInfo']['serial_no'];?>&nbsp;</td>
            <td>Est. Date&nbsp;</td>
            <td><?php echo $serviceDeviceInfo['ServiceDeviceInfo']['estimated_date'];?>&nbsp;</td>
          </tr>
          <tr>
            <td>Address&nbsp;</td>
            <td><?php echo $serviceDeviceInfo['User']['address'];?>&nbsp;</td>
            <td>PREVENTIVO&nbsp;</td>
            <td><?php 
			
			if($serviceDeviceInfo['ServiceDeviceInfo']['is_customer_confirmation']==1){
			   echo "Yes";
			}
			else{
				echo "No";
			}?>&nbsp;</td>
            <td>Est. Budget&nbsp;</td>
            <td colspan="0"><?php echo $serviceDeviceInfo['ServiceDeviceInfo']['estimated_budget'];?>&nbsp;</td>
          </tr>
          <tr>
            <td>Data Backup&nbsp;</td>
            <td><?php if($serviceDeviceInfo['ServiceDeviceInfo']['is_data_backup'] == 1){echo "Yes";}else{ echo "No";};?>&nbsp;</td>
            <td>SIM Lock&nbsp;</td>
            <td><?php  echo $serviceDeviceInfo['ServiceDeviceInfo']['is_sim_pc_Lock']; ?>&nbsp;</td>
            <td>Phone Lock&nbsp;</td>
            <td><?php echo $serviceDeviceInfo['ServiceDeviceInfo']['is_phone_block'];?>&nbsp;</td>
          </tr>
           <tr>
            <td>Description&nbsp;</td>
            <td colspan="6"><?php echo $serviceDeviceInfo['ServiceDeviceInfo']['description'];?>&nbsp;</td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="clr"></div>
  </div>
  
   <table  class="assesmentSDIGrid" id="check_lits_tabel">
        <thead>
          <tr>
            <td  class="headingtag">Check List Name&nbsp;</td>
            <td  class="headingtag">Yes&nbsp;</td>
            <td  class="headingtag">No&nbsp;</td>
            <td  class="headingtag">Default&nbsp;</td>
          </tr>
        </thead>
        <tbody>
          
      <?php foreach($device_check_lists as $check_list){?>   
          
          <tr>
            <td><?php echo $check_list['DeviceCheckList']['name'];?>&nbsp;</td>
            
             <td class="check_uncheck">
			 <?php echo $this->Form->input("DeviceCheckList.".$check_list['DeviceCheckList']['id'].".yes", array('div'=>false,"class"=>"checkstatus_".$check_list['DeviceCheckList']['id'],'type'=>'checkbox','label'=>false,'id'=>'yes_'.$check_list['DeviceCheckList']['id']));?>&nbsp;</td>
             
             <td class="check_uncheck"><?php echo $this->Form->input("DeviceCheckList.".$check_list['DeviceCheckList']['id'].".no", array('div'=>false, "class"=>"checkstatus_".$check_list['DeviceCheckList']['id'],'type'=>'checkbox','label'=>false,'id'=>'no_'.$check_list['DeviceCheckList']['id']));?>&nbsp;</td>
             
             <td class="check_uncheck"><?php echo $this->Form->input("DeviceCheckList.".$check_list['DeviceCheckList']['id'].".default", array('div'=>false, "class"=>"checkstatus_".$check_list['DeviceCheckList']['id'],'type'=>'checkbox','label'=>false,'id'=>'default_'.$check_list['DeviceCheckList']['id'],'checked'=>true));?>&nbsp;</td>
           </tr>
              <?php } ?> 
        </tbody>
      </table>
       <div id="WrapperAssesmentDescription" class="microcontroll">
          <?php	echo $this->Form->label('ServiceDeviceInfo.note', __('Note'.':', true) );?>
          <?php	echo $this->Form->input('ServiceDeviceInfo.note',array('div'=>false,'label'=>false,'class'=>'','rows'=>1,'style'=>'width:575px !important;'));?>
        </div>
      

<div class="button_area">
		<?php echo $this->Form->button('Save',array( 'class'=>'submit', 'id'=>'btn_DeviceCheckList_add'));?>
		<?php echo $this->Form->button('Cancel',array('type'=>'reset','name'=>'reset','id'=>'Cancel'));?>
		<?php echo $this->Form->end();?>
</div>
</div>

<script type="text/javascript">
$(document).ready(function() {
//======================= Start Add Script =====================				
	$("[class^='checkstatus_']").click(function( e){
 		var calles = $(this).attr('class');
		var ides = $(this).attr('id');
		 $('.'+calles).prop('checked', false);
  		$('#'+ides).prop('checked', true);   
		   
	});
//==================== End Add Script =========================
 $('#btn_DeviceCheckList_add').click(function(e){
 	 	 e.preventDefault();
  		//========================== Validation Check ========
				
				$('.ajax_status').fadeIn();
				$('.ajax-save-message').hide().fadeOut(); 
		//===================== Ajax Submit =================
 		     var data= $('#DeviceCheckListChecklistForm').serialize();
		  
  
			$.ajax({
				type: "POST",
				url:siteurl+"DeviceCheckLists/checklist",
				data:  data, 
				success: function(response){
			 
					if(response =='1' || response =='10' ){
						$.alert.open('success', 'Successfully done.');
						window.location.reload(true);
					}
					else{
							$.alert.open('error', 'Error .');
							window.location.reload(true);
						}
					}
 				});
				
				$('.ajax_status').hide(); 
			
				$('.ajax-save-message').hide().html(response).fadeIn(); 
			
			});
			
		var dialogOptstempleteGeneralLists = {
		title:'Assesment',
		autoOpen: false,
		height: 'auto',
		width: 650,
		modal: true,
		//draggable:true,
 	  dialogClass: 'objectdetailsdialog',
	};
	
	$("#invoice3").dialog(dialogOptstempleteGeneralLists);
	
//===================== View Image ================
	$("#view_Service_Image").on('click',function(e){
		e.preventDefault();
   		var device_info_id = $(this).attr("title");
 		var ulrs =siteurl+"ServiceDeviceInfos/view_servie_image/"+device_info_id;
			$("#invoice3").load(ulrs, [], function(){
			$("#invoice3").dialog("open");
  		});
 	});
	
	$("#view_Service_Note").on('click',function(e){
		e.preventDefault();
   		var device_info_id = $(this).attr("title");
 		var ulrs =siteurl+"ServiceDeviceInfos/view_servie_note/"+device_info_id;
			$("#invoice3").load(ulrs, [], function(){
			$("#invoice3").dialog("open");
  		});
	});
  });
</script>
<style>
.serial_no{
	margin-left:118px;
	color:#0000FF;
	}
#check_lits_tabel tr td{
		font-size:12px !important;
}
#check_lits_tabel{
	margin-top:20px;

}
.blocktitleinfo {
    background: none repeat scroll 0 0 #aabbcc;
    color: #ffffff;
    font-family: verdana;
    font-size: 11px;
    font-weight: bold;
    height: 16px;
    margin: 0 0 5px !important;
    padding: 3px 12px;
}
.rdcontent_left{
		float:left;
		width:98%;
}
.assesmentSDIGrid{
		width:100%;
		border:1px dotted #CCC;
}
.assesmentSDIGrid tr td{
	padding:5px;
	font-family:Verdana, Geneva, sans-serif;
	font-size:10px;
}
.headingtag{
		color:#006;
		font-family:Verdana, Geneva, sans-serif;
		font-weight:bold;
}
 .assesmentSDIGrid tr td:nth-child(1) , .assesmentSDIGrid tr td:nth-child(3), .assesmentSDIGrid tr td:nth-child(5){
	font-weight:bold;
 }
 .assesmentSDIGrid tr td {
    border: 1px dotted #ccc;
    padding: 5px;
}
#WrapperAssesmentDescription label{
	padding-top:10px;
}
</style>