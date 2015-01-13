<?php  	echo $this->Html->css(array('fullcalendar/fullcalendar' )); 
		echo $this->Html->script(array('fullcalendar/fullcalendar.min')); ?>
        
 <div id="navcontainer">
<ul>
<li id="Tested"><a href="#">Tested</a></li>
<li id="Delivery"><a href="#">Delivery</a></li>
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
		height: 620,
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
			<?php foreach($serviceDeviceInfoLists as $sllist){?>
				
				{
			 id:<?php echo $sllist['ServiceDeviceInfo']['id']; ?>,
			 title:'<?php echo "Device:". $sllist['ServiceDevice']['name']; ?>',
			 cname:'<?php echo "Client:". $sllist['PosCustomer']['name']; ?>',
			 serial:'<?php echo "Serial:". $sllist['ServiceDeviceInfo']['serial_no']; ?>',
			 start:'<?php echo $sllist['ServiceDeviceInfo']['recive_date']; ?>',
			 end:'<?php echo $sllist['ServiceDeviceInfo']['estimated_date']; ?>',
			 status:'<?php echo "Status:"; switch($sllist['ServiceDeviceInfo']['status'] ){ case 7: echo "Tested"; break; case 8: echo "Waiting for delivery";break;}?>',
			  statusid:'<?php  echo $sllist['ServiceDeviceInfo']['status']; ?>',
			  className : '<?php switch($sllist['ServiceDeviceInfo']['status'] ){ case 7: echo "Tested"; break; case 8: echo "Waiting for delivery";break;}?>',
			  allDay : false
			},
				
			<?php }?>
 			],
			eventRender: function(event, element) { 
            element.find('.fc-event-title').append("<br/>" + event.cname); 
			element.find('.fc-event-title').append("<br/>" + event.serial);
			element.find('.fc-event-title').append("<br/>" + event.status);  
        },
			eventClick: function(calEvent, jsEvent, view) {
 			  // alert( calEvent.id);
				 $("#popupdiv").dialog(reciveDeviceInfo);
	  				 
		     		 var ulrs =siteurl+"assesments/deliveryview_assessment/"+calEvent.id+"/yes";
			 
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