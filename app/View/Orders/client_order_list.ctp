<?php  //pr($Orders);?> 

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<div class="row-fluid">
	<h3 class="header smaller lighter blue">&nbsp;</h3>
		<div class="table-header">Orders</div>
        	<table id="sample-table-2" class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>Status</th>
                    <th>Order No</th>
                    <th>Date</th>
                    <th>Items</th>
                    <th class="hidden-480">Total Price</th>
                    <th>Action</th>
                </tr>
            </thead>
	     <tbody>
	<?php foreach($Orders as $Order){?>
    <tr>
    	<td><?php echo $Order['Order']['status'];?></td>
		<td><?php echo $Order['Order']['id'];?></td>
		<td><?php echo $Order['Order']['modified'];?></td>
		<td class="hidden-480"><?php echo $Order['Order']['order_item_count'];?></td>
		<td class="hidden-phone"><?php echo $Order['Order']['total'] +$Order['Order']['payment_charge'];?></td>
		<td class="hidden-phone">
		 <?php echo $this->Html->link(__('Details', true), array('action' => 'client_order_details', $Order['Order']['id']),array('class'=>'receive_invoice action_link label label-large label-purple')); ?>
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
			      null, null,null,  null,
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