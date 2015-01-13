
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>

<div class="row-fluid">
								<h3 class="header smaller lighter blue">&nbsp;</h3>
								<div class="table-header">
									Services
								</div>

								<table id="sample-table-2" class="table table-striped table-bordered table-hover">
									<thead>
										<tr>
											<th class="center">
												<label>
													<input type="checkbox" />
													<span class="lbl"></span>
												</label>
											</th>
											<th>Device</th>
											<th>Serial NO</th>
											<th class="hidden-480">Receive Date</th>

											<th class="hidden-phone">
												<i class="icon-time bigger-110 hidden-phone"></i>
												Estimated Date
											</th>
											 <th> Link </th>
											
										</tr>
									</thead>

									 <tbody>
	
	<?php foreach($serviceDeviceInfos as $serviceDeviceInfo){?>
	
	<tr>
		<td class="center">
			<label>
				<input type="checkbox" />
				<span class="lbl"></span>
			</label>
		</td>
	
		<td>
			 <?php echo $serviceDeviceInfo['ServiceDevice']['name'];?>
		</td>
		<td><?php echo $serviceDeviceInfo['ServiceDeviceInfo']['serial_no'];?></td>
		<td class="hidden-480"><?php echo $serviceDeviceInfo['ServiceDeviceInfo']['recive_date'];?></td>
		<td class="hidden-phone"><?php echo $serviceDeviceInfo['ServiceDeviceInfo']['estimated_date'];?></td>
		<td class="hidden-phone">
		  <?php echo $this->Html->link(__('Print', true), array('action' => 'recieve', $serviceDeviceInfo['ServiceDeviceInfo']['id']),array('class'=>'receive_invoice action_link label label-large label-purple')); ?>
		 
		</td>
	
		 
	
		
	</tr>
										
      
    
	<?php }?>
    
    </tbody>
								</table>
							</div>
							<?php echo $this->Html->script(array('client/jquery.dataTables.min','client/jquery.dataTables.bootstrap')); ?>

							
							<script type="text/javascript">
			$(function() {
				var oTable1 = $('#sample-table-2').dataTable( {
				"aoColumns": [
			      { "bSortable": false },
			      null, null,null,null,  
				  { "bSortable": false }
				] } );
				
				
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
		
		<?php echo $this->Html->script(array('module/ServiceDeviceInfos/client_service'));?>
		
		<?php //echo $this->Html->script(array('ui-10/jquery-ui-1.10.4.custom.min'));?>
		
		
		
	