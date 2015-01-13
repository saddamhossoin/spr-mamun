<?php  	echo $this->Html->css(array('fullcalendar/fullcalendar' )); 
		echo $this->Html->script(array('fullcalendar/fullcalendar.min')); ?>
<div class="reciveDeviceContact reciveDeviceCalender"> 
<?php  // pr($serviceDeviceInfoLists); ?>
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
  afteropen: function( event, ui ) {
       
  },
    //draggable:true,
     //close: CloseFunction,
   dialogClass: 'reciveDeviceInfo',
 };
  
     
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
     cname:'<?php echo "Client:". $sllist['User']['name']; ?>',
     serial:'<?php echo "Serial:". $sllist['ServiceDeviceInfo']['serial_no']; ?>',
     start:'<?php echo $sllist['ServiceDeviceInfo']['recive_date']; ?>',
     end:'<?php echo $sllist['ServiceDeviceInfo']['estimated_date']; ?>',
     <?php 
     $classStatus = 'custom';
     switch ($sllist['ServiceDeviceInfo']['status']) {
         case 1:
         $classStatus = 'Recive_Device';
         break;
         case 2:
         $classStatus = 'Assesment_device';
         break;
         case 3:
         $classStatus = 'Assesment_device';
         break;
         case 4:
         $classStatus = 'Assesment_device';
         break;
         case 5:
         $classStatus = 'Assesment_device';
         break;
       }?>
     className : '<?php echo $classStatus;?>',
      allDay : false
    },
   <?php }?>
    ],
   eventRender: function(event, element) { 
            element.find('.fc-event-title').append("<br/>" + event.cname); 
   element.find('.fc-event-title').append("<br/>" + event.serial); 
        },
  eventClick: function(calEvent, jsEvent, view) {
     // alert( calEvent.d);
    $("#popupdiv").dialog(reciveDeviceInfo);
     var ulrs =siteurl+"Assesments/add/"+calEvent.id;
     $("#popupdiv").load(ulrs, [], function(){
     $("#popupdiv").dialog("open");
     $(".select2as").select2({ dropdownCssClass: 'ui-dialog' });
    });
   },
           
        
  }); 
   
  
 }) ;
						 
</script>