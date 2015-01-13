<?php  	echo $this->Html->css(array('fullcalendar/fullcalendar' )); 
		echo $this->Html->script(array('fullcalendar/fullcalendar.min')); ?>
<div id="navcontainer">
    <ul>
        <li id="Confirmation"><a href="#">Confirmation</a></li>
        <li id="Servicing"><a href="#">Servicing</a></li>
        <li id="Check_List"><a href="#">Check List</a></li>
    </ul>
</div>

<div class="reciveDeviceContact reciveDeviceCalender"> 
<?php    

//Configure::write('debug', 2);
// pr($serviceDeviceInfoLists); ?>
<div id="calendar"></div>
 </div>
<script type="text/javascript">
$(function() {
	$(document).ready(function() {
 	var reciveDeviceInfo = {
		title:'Device Info',
		autoOpen: false,
		height: 620,
		width: 950,
		modal: true,
		afteropen: function( event, ui ) {
 		},
 	  dialogClass: 'reciveDeviceInfo',
	};
 	var DeviceChecklist = {
			title:'Device Check List',
			autoOpen: false,
			height: 650,
			width: 750,
			modal: true,
			draggable:true,
			//close: CloseFunction,
			dialogClass: 'objectdetailsdialog',
	};
	$("#invoice7").dialog(DeviceChecklist);
 	    
 		$('#calendar').fullCalendar({
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,basicWeek,basicDay'
			},
			editable: true,
			events: [
			<?php foreach($serviceDeviceInfoLists as $sllist){?>
				
			{
			 id:<?php echo $sllist['ServiceDeviceInfo']['id']; ?>,
			 title:'<?php echo "Device:". $sllist['ServiceDevice']['name']; ?>',
			 cname:'<?php echo "Client:". $sllist['PosCustomer']['name']; ?>',
			 serial:'<?php echo "<b>Serial:</b>". $sllist['ServiceDeviceInfo']['serial_no']; ?>',
			 start:'<?php echo $sllist['ServiceDeviceInfo']['recive_date']; ?>',
			 end:'<?php echo $sllist['ServiceDeviceInfo']['estimated_date']; ?>',
			 status:'<?php echo "<b>Status:</b>"; switch($sllist['ServiceDeviceInfo']['status'] ){ case 4: echo "Confirmation"; break; case 5: echo "Servicing";break;case 10: echo "Checklist";break;}?>',
			  statusid:'<?php  echo $sllist['ServiceDeviceInfo']['status']; ?>',
			  className : '<?php switch($sllist['ServiceDeviceInfo']['status'] ){ case 4: echo "Confirmation"; break; case 5: echo "Servicing";break;case 10: echo "Checklist";break;} if($sllist['ServiceDeviceInfo']['is_urgent'] == 1){echo ' is_urgent';}?>',
			  allDay : false
			},
   <?php }?>
			
			
 			],
			eventRender: function(event, element) { 
			element.find('.fc-event-title').append("<br/>" + event.status); 
            element.find('.fc-event-title').append("<br/>" + event.cname); 
			element.find('.fc-event-title').append("<br/>" + event.serial); 
			
			element.find('.fc-event-time').append("<br/>"); 
        },
			eventClick: function(calEvent, jsEvent, view) {
 			  // alert( calEvent.id);
				 $("#popupdiv").dialog(reciveDeviceInfo);
				 
				 
	  		    if( calEvent.statusid == 4 || calEvent.statusid == 5){
	
		     		 var ulrs =siteurl+"assesments/techview_assessment/"+calEvent.id+"/yes";
			 
					 $("#popupdiv").load(ulrs, [], function(){
					 $("#popupdiv").dialog("open");
					   $(".select2as").select2({ dropdownCssClass: 'ui-dialog' });
					   
				 });
				 
				}
			
				 else if(calEvent.statusid == 10){
					 
					 var ulrs =siteurl+"DeviceCheckLists/checklist/"+calEvent.id+"/yes";
				 
						$("#invoice7").load(ulrs, [], function(){
						$("#invoice7").dialog("open");
						});
				 
					 
					 }
				 
				 
			},
			
			
			
			loading: function(bool) {
                            if (bool) $('.ajax_status').fadeIn();
                            else $('.ajax_status').fadeOut();
                        }, 
		});
		
 	});
	});
 
</script>

<style>

.Confirmation{
	border:1.5px solid #060 !important;
}
.Servicing{
	border:1.5px solid #39F !important;
}
.Checklist{
	border:1.5px solid #939 !important;
}
</style>