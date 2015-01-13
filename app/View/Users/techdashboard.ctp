<?php  	echo $this->Html->css(array('fullcalendar/fullcalendar' )); 
		echo $this->Html->script(array('fullcalendar/fullcalendar.min')); ?>
<div class="reciveDeviceContact reciveDeviceCalender"> 
<?php /// pr($serviceDeviceInfoLists); ?>
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
			<?php foreach($serviceDeviceInfoLists as $sllist){
				echo "{
					id:". $sllist['ServiceDeviceInfo']['id'].",
					title:' Device:". $sllist['ServiceDevice']['name']."',
					cname:' Client: ". $sllist['User']['name']."',
					serial:' Serial: ". $sllist['ServiceDeviceInfo']['serial_no']."',
					start:'". $sllist['ServiceDeviceInfo']['recive_date']."',
					end:'". $sllist['ServiceDeviceInfo']['estimated_date']."',
					className : 'custom',
				},";
			}?>
 			],
			eventRender: function(event, element) { 
            element.find('.fc-event-title').append("<br/>" + event.cname); 
			element.find('.fc-event-title').append("<br/>" + event.serial); 
        },
			eventClick: function(calEvent, jsEvent, view) {
 			  // alert( calEvent.id);
				 $("#popupdiv").dialog(reciveDeviceInfo);
	  				 
		     		 var ulrs =siteurl+"assesments/add/"+calEvent.id+"/yes";
			 
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