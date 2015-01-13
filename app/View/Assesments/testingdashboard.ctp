<?php  	echo $this->Html->css(array('fullcalendar/fullcalendar' )); 
		echo $this->Html->script(array('fullcalendar/fullcalendar.min')); ?>
        
        
<div id="navcontainer">
<ul>
<li id="ServiceComplete"><a href="#">Service Complete</a></li>
</ul>
</div>
        
<div class="reciveDeviceContact reciveDeviceCalender"> 
<?php   //pr($serviceDeviceInfoLists); ?>
<div id="calendar"></div>
 </div>
<script type="text/javascript">
$(function() {
	$(document).ready(function() {
 		 var reciveDeviceInfo = {
		title:'Device Info',
		autoOpen: false,
		height: 640,
		width: 950,
		modal: true,
		afteropen: function( event, ui ) {
						 
		},
  		//draggable:true,
 	   //close: CloseFunction,
	  dialogClass: 'reciveDeviceInfo',
	};
	    
 		$('#calendar').fullCalendar({
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,basicWeek,basicDay'
			},
			editable: true,
			events: [
			<?php foreach($serviceDeviceInfoLists as $sllist){ ?>
				{
			 id:<?php echo $sllist['ServiceDeviceInfo']['id']; ?>,
			 title:'<?php echo "Device:". $sllist['ServiceDevice']['name']; ?>',
			 cname:'<?php echo "Client:". $sllist['PosCustomer']['name']; ?>',
			 serial:'<?php echo "<b>Serial:</b>". $sllist['ServiceDeviceInfo']['serial_no']; ?>',
			 start:'<?php echo $sllist['ServiceDeviceInfo']['recive_date']; ?>',
			 end:'<?php echo $sllist['ServiceDeviceInfo']['estimated_date']; ?>',
			 status:'<?php echo "<b>Status:</b>"; switch($sllist['ServiceDeviceInfo']['status'] ){ case 6: echo "Service Complete";}?>',
			  statusid:'<?php  echo $sllist['ServiceDeviceInfo']['status']; ?>',
			  className : '<?php switch($sllist['ServiceDeviceInfo']['status'] ){ case 6: echo "Service Complete";} if($sllist['ServiceDeviceInfo']['is_urgent'] == 1){echo ' is_urgent';}?>',
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
	  				 
		     		 var ulrs =siteurl+"assesments/testingview_assessment/"+calEvent.id+"/yes";
			 
					 $("#popupdiv").load(ulrs, [], function(){
					 $("#popupdiv").dialog("open");
					   $(".select2as").select2({ dropdownCssClass: 'ui-dialog' });
				 });
			},
			
			loading: function(bool) {
                            if (bool) $('.ajax_status').fadeIn();
                            else $('.ajax_status').fadeOut();
                        }, 
		});
		
	});
	});
 
</script>