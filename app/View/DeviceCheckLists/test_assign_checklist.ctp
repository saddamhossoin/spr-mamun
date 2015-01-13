<div class="DeviceCheckLists">
<?php echo $this->Form->create('DeviceCheckList');
	echo $this->Form->input('ServiceDeviceInfo.id',array('value'=>$ids));
	//pr($ServiceDeviceCheckdatatest);
 ?>
    <div class="reciveDeviceContact reciveDevice" id="check_list_result">
    <div class="blocktitleinfo">Technician Result List</div>
     <div class="DeviceCheckLists">
        <table  class="assesmentSDIGrid" width="350px;">
                <thead>
                  <tr>
                    <td  class="headingtag" style="width:200px;">Name&nbsp;</td>
                    <td  class="headingtag" >Tech  &nbsp;</td>
                    <td  class="headingtag">Test  &nbsp;</td>
                  </tr>
                </thead>
                <tbody class="viewchecklistgrid">
                
            <?php foreach($checklist_names as $key => $checklist_name){?>   
             <?php 
			 if(array_key_exists( $key , $ServiceDeviceCheckdata)){
 				// echo key($ServiceDeviceCheckdata[$key]);
				$resultItem = ucwords( key($ServiceDeviceCheckdata[$key]));
				switch($resultItem){
					case  'Yes':				
					 echo " <tr style='background:green; color:white; font-weight:bold; '><td>". $checklist_name ."&nbsp;</td><td>".$resultItem."&nbsp;</td>";
					 break;
					 case 'No':				
					 echo "<tr style='background:red;color:white; font-weight:bold;'><td>". $checklist_name ."&nbsp;</td><td>".$resultItem."&nbsp;</td> ";
					 break;
					 case 'Default':				
					 echo "<tr><td>". $checklist_name ."&nbsp;</td><td>".$resultItem."&nbsp;</td>";
					 break;
				} 
				
				if(!empty($ServiceDeviceCheckdatatest)){
 					 if(array_key_exists( $key , $ServiceDeviceCheckdatatest)){
					// die('jewel');
 						// echo key($ServiceDeviceCheckdata[$key]);
							$resultItemTest = ucwords( key($ServiceDeviceCheckdatatest[$key]));
							switch($resultItemTest){
							case  'Yes':				
							 echo "<td style='background:green;color:white; font-weight:bold;'>".$resultItemTest."&nbsp;</td></tr> ";
							 break;
							 case 'No':				
							 echo "<td style='background:red;color:white; font-weight:bold;'>".$resultItemTest."&nbsp;</td></tr> ";
							 break;
							 case 'Default':				
							 echo " <td>".$resultItemTest."&nbsp;</td></tr>";
							 break;
				 
			 }
			 
			 }
			 }
			 }
			 
			
			 
			 } ?> 
                </tbody>
              </table>
      


</div>
   
    <div class="clr"></div>
  </div>
  
   
  
  <div class="reciveDeviceContact reciveDevice" id="test_assign_checklist">
    <div class="blocktitleinfo">Test Assign Check List</div>
   <table  class="assesmentSDIGrid" id="check_lits_tabel">
        <thead>
          <tr>
            <td  class="headingtag">Yes&nbsp;</td>
            <td  class="headingtag">No&nbsp;</td>
            <td  class="headingtag">Default&nbsp;</td>
          </tr>
        </thead>
        <tbody>
 
      <?php foreach($checklist_names as $keyb=>$check_list){?>   
           <tr>
             <td class="check_uncheck">
			 <?php echo $this->Form->input("DeviceCheckList.".$keyb.".yes", array('div'=>false,"class"=>"checkstatus_".$keyb,'type'=>'checkbox','label'=>false,'id'=>'yes_'.$keyb));?>&nbsp;</td>
             
             <td class="check_uncheck"><?php echo $this->Form->input("DeviceCheckList.".$keyb.".no", array('div'=>false, "class"=>"checkstatus_".$keyb,'type'=>'checkbox','label'=>false,'id'=>'no_'.$keyb));?>&nbsp;</td>
             
             <td class="check_uncheck"><?php echo $this->Form->input("DeviceCheckList.".$keyb.".default", array('div'=>false, "class"=>"checkstatus_".$keyb,'type'=>'checkbox','label'=>false,'id'=>'default_'.$keyb,'checked'=>true));?>&nbsp;</td>
           
          </tr>
         
             <?php } ?> 
        </tbody>
      </table>
     </div>
     
<div class="clr"></div>  
<br />

<div class="button_area">
		<?php echo $this->Form->button('Save',array( 'class'=>'submit', 'id'=>'btn_testassignCheckList_add'));?>
		<?php echo $this->Form->button('Cancel',array('type'=>'reset','name'=>'reset','id'=>'Cancel'));?>
		<?php echo $this->Form->end();?>
</div>
</div>


<script>


$(document).ready(function() {
	
 
 //======================= Start Add Script =====================				
	$("[class^='checkstatus_']").click(function( e){
 		var calles = $(this).attr('class');
		var ides = $(this).attr('id');
		 $('.'+calles).prop('checked', false);
  		$('#'+ides).prop('checked', true);   
		   
	});
//==================== End Add Script =========================

  
  
   $('#btn_testassignCheckList_add').click(function(e){
 	 	 e.preventDefault();
  		//========================== Validation Check ========
				
				$('.ajax_status').fadeIn();
				$('.ajax-save-message').hide().fadeOut(); 
		//===================== Ajax Submit =================
 		     var data= $('#DeviceCheckListTestAssignChecklistForm').serialize();
		  
  
			$.ajax({
				type: "POST",
				url:siteurl+"DeviceCheckLists/test_assign_checklist",
				data:  data, 
				success: function(response){
					//alert(response);
				//window.location.reload(true);
							$("#invoice6").dialog("close");
					}
				});
				
				$('.ajax_status').hide(); 
			
				$('.ajax-save-message').hide().html(response).fadeIn(); 
			
			});
 
  });

 
</script>



<style>
.viewchecklistgrid tr td{
	padding:9px !important;
	
}
#check_list_result{
	width:302px !important;
	margin:0px !important;
	float:left !important;
	}
#test_assign_checklist{
	width:250px !important;
	float:left;
	}
.reciveDevice{
	margin:0px !important;
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
}
.headingtag{
		color:#006;
		font-family:Verdana, Geneva, sans-serif;
		font-weight:bold;
}
.assesmentSDIGrid tr td:nth-child(2) , .assesmentSDIGrid tr td:nth-child(4)
{
 	
}
.assesmentSDIGrid tr td:nth-child(1) , .assesmentSDIGrid tr td:nth-child(3), .assesmentSDIGrid tr td:nth-child(5){
	font-weight:bold;
	
}

.assesmentSDIGrid tr td {
    border: 1px dotted #ccc;
    padding: 5px;
}
 


</style>
 




