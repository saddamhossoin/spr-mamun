
<div class="row-fluid">
  <h3 class="header smaller lighter blue">&nbsp;</h3>
  <div class="table-header"> Services </div>
  <table id="sample-table-2" class="table table-striped table-bordered table-hover">
    <thead>
      <tr>
        <th class="center"> <label>
          <input type="checkbox" />
          <span class="lbl"></span> </label>
        </th>
        <th>Device Name</th>
        <th>Serial NO</th>
        <th class="">Receive Date</th>
		<th class="">Estimated Date</th>
        <th>Link</th>
      </tr>
    </thead>
    <tbody>
	
	<?php foreach($serviceDeviceInfos as $serviceDeviceInfo){?>
	
      <tr>
        <td class="center"><label>
          <input type="checkbox" />
          <span class="lbl"></span> </label>
        </td>
        <td><?php echo $serviceDeviceInfo['ServiceDevice']['name'];?></td>
        <td><?php echo $serviceDeviceInfo['ServiceDeviceInfo']['serial_no'];?></td>
        <td><?php echo $serviceDeviceInfo['ServiceDeviceInfo']['recive_date'];?></td>
        <td><?php echo $serviceDeviceInfo['ServiceDeviceInfo']['estimated_date'];?></td>
       
        <td class="td-actions"><div class="hidden-phone visible-desktop action-buttons"> <a class="blue" href="#"> <i class="icon-zoom-in bigger-130"></i> </a> <a class="green" href="#"> <i class="icon-pencil bigger-130"></i> </a> <a class="red" href="#"> <i class="icon-trash bigger-130"></i> </a> </div>
          <div class="hidden-desktop visible-phone">
            <div class="inline position-relative">
              <button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown"> <i class="icon-caret-down icon-only bigger-120"></i> </button>
              <ul class="dropdown-menu dropdown-icon-only dropdown-yellow pull-right dropdown-caret dropdown-close">
                <li>
				<?php echo $this->Html->link(__('View', true), array('action' => 'view', $serviceDeviceInfo['ServiceDeviceInfo']['id']),array('class'=>'link_edit action_link')); ?>
				 </li>
                <li> 
				<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $serviceDeviceInfo['ServiceDeviceInfo']['id']),array('class'=>'link_edit action_link')); ?>
				 </li>
                <li> <?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $serviceDeviceInfo['ServiceDeviceInfo']['id']), array('class'=>'link_delete action_link'), sprintf(__('Are you sure you want to delete # %s?', true), $serviceDeviceInfo['ServiceDeviceInfo']['id'])); ?> </li>
              </ul>
            </div>
          </div></td>
      </tr>
    
	<?php }?>
    
    </tbody>
  </table>
</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>



<?php echo $this->Html->script(array('client/jquery.dataTables.min','client/jquery.dataTables.bootstrap')); ?>




<script type="text/javascript">


			$(function() {
				var oTable1 = $('#sample-table-2').dataTable( {
				"aoColumns": [
			      { "bSortable": false },
			      null, null,null, null, null,
				  { "bSortable": false }
				] 
				
				
				} );
				
				
				$('table th input:checkbox').on('click' , function(){
					var that = this;
					$(this).closest('table').find('tr > td:first-child input:checkbox')
					.each(function(){
						this.checked = that.checked;
						$(this).closest('tr').toggleClass('selected');
					});
						
				});
			
			
				$('[data-rel="tooltip"]').tooltip({placement: tooltip_placement});
				function tooltip_placement(context, source) {
					var $source = $(source);
					var $parent = $source.closest('table')
					var off1 = $parent.offset();
					var w1 = $parent.width();
			
					var off2 = $source.offset();
					var w2 = $source.width();
			
					if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
					return 'left';
				}
			})
</script>