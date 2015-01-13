<?php  //pr($serviceDeviceInfoLists);?>

<div id="navcontainer">
<ul>
<li id="Receive"><a href="#">Receive</a></li>
<li id="Re-Assessmen"><a href="#">Re-Assessment</a></li>
<li id="Check_List"><a href="#">Check List</a></li>
<li id="Tested"><a href="#">Tested</a></li>
<li id="Delivery"><a href="#">Delivery</a></li>
</ul>
</div>

<?php  	echo $this->Html->css(array('fullcalendar/fullcalendar' ));
		echo $this->Html->script(array('fullcalendar/fullcalendar.min')); ?>
        <?php echo $this->Html->script(array('alert/alert')); ?>
<?php echo $this->Html->css(array('alert/css/alert','alert/themes/default/theme')); ?>
<div id="calendar"></div>
 </div>
<script type="text/javascript">
 
	$(document).ready(function() {
  
    var reciveDeviceInfo = {
	  title:'Device Info',
	  autoOpen: false,
	  height: 620,
	  width: 950,
	  modal: true,
	  close: function(){location.href = siteurl+'Users/chiefdashboard';},
	  afteropen: function( event, ui ) {
  	},
	//draggable:true,
	//close: CloseFunction,
   dialogClass: 'reciveDeviceInfo',
 };
 
	var DeviceCheck = {
			title:'Technician Assign',
			autoOpen: false,
			height: 300,
			width: 500,
			modal: true,
			draggable:true,
			//close: CloseFunction,
			dialogClass: 'objectdetailsdialog',
	};
	$("#invoice6").dialog(DeviceCheck);
	  
     
    $('#calendar').fullCalendar({
	   header: {
		left: 'prev,next,today',
		center: 'title',
		right: 'month,agendaWeek,agendaDay'
	   },
   selectable: true,
   selectHelper: true,
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
	 status:'<?php echo "<b>Status:</b>"; switch($sllist['ServiceDeviceInfo']['status'] ){ case 1: echo "DeviceRecive"; break; case 3: echo "Re-Assesment";break;case 11: echo "checklistComplete";break; case 7: echo "Tested"; break; case 8: echo "Waiting for delivery";break;}?>',
	  statusid:'<?php  echo $sllist['ServiceDeviceInfo']['status']; ?>',
      className : '<?php switch($sllist['ServiceDeviceInfo']['status'] ){ case 1: echo "DeviceRecive"; break; case 3: echo "Re-Assesment";break;case 11: echo "checklistComplete";break; case 7: echo "Tested"; break; case 8: echo "Waitingfordelivery";break;} if($sllist['ServiceDeviceInfo']['is_urgent'] == 1){echo ' is_urgent';}?>',
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
    $("#popupdiv").dialog(reciveDeviceInfo);
		  
   if( calEvent.statusid == 1){
	$.alert.open({
	buttons: {
		techchecklist: 'Assign Tech',
		assesment: 'Assesment',
		smartAlertClose: 'Cancel'
	},
	 callback: function(button) {
		 
		   if(button == 'techchecklist'){
					var ulrss =siteurl+"AssesmentApproveNotes/tech_checklist/"+calEvent.id;
					$("#invoice6").load(ulrss, [], function(){
					$("#invoice6").dialog("open");
					});
		   }
		  else if(button == 'assesment'){
				 var ulrs =siteurl+"Assesments/add/"+calEvent.id;
					 $("#popupdiv").load(ulrs, [], function(){
					 $("#popupdiv").dialog("open");
					 $(".select2as").select2({ dropdownCssClass: 'ui-dialog' });
				});
		   }
		   else if(button == 'smartAlertClose'){
				window.location.reload(true);
			   }
	},
	
	  type: 'confirm',
	  title: 'Operation Selection',
	  content: 'Please Choose yours.',
	  width: 400
	});
   }
   
   
   else if(calEvent.statusid == 11 || calEvent.statusid == 3 ){
		 var ulrs =siteurl+"Assesments/add/"+calEvent.id;
		 $("#popupdiv").load(ulrs, [], function(){
		 $("#popupdiv").dialog("open");
		 $(".select2as").select2({ dropdownCssClass: 'ui-dialog' });
		});
	   
   }
    else if(calEvent.statusid == 7 ){
    $("#popupdiv").dialog(reciveDeviceInfo);
	  				 
		     		 var ulrs =siteurl+"assesments/deliveryview_assessment/"+calEvent.id+"/yes";
			 
					 $("#popupdiv").load(ulrs, [], function(){
					 $("#popupdiv").dialog("open");
					   $(".select2as").select2({ dropdownCssClass: 'ui-dialog' });
				 });
		}
	

	
	
   },
           
        
  }); 
   
  
 }) ;
						 
</script>

