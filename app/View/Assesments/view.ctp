<?php	echo $this->Form->input('Assesment.id',array('value'=>$assesment['Assesment']['id'],'type'=>'hidden'));?> <div class="assesments view"><table cellpadding="0" cellspacing="0" class="view_table">
<?php $i = 0; $class = '';?>
<?php $i++;?><tr <?php if ($i % 2 == 0) echo $class;?>>
                <td><?php echo __('Delivery Date'); ?></td><td> : </td>
                <td><?php echo date('Y/m/d G:i:s',strtotime($assesment['Assesment']['delivery_date'])); ?>&nbsp;<?php echo $this->Html->link(__('Update', true), array('action' => 'edit', $assesment['Assesment']['id']),array('class'=>'link_edit action_link','id'=>'btn_Assesment_edit')); ?></td>
            </tr>
<?php $i++;?><tr <?php if ($i % 2 == 0) echo $class;?>>
				<td><?php echo __('Description'); ?></td><td> : </td>
                <td><?php echo $assesment['Assesment']['description']; ?>&nbsp;</td>
			</tr>
 <?php $i++;?><tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo __('Note'); ?></td><td> : </td>
<td ><?php echo $assesment['Assesment']['note'];  ?>&nbsp;</td></tr>
<?php $i++;?></table>
</div>
<style type="text/css">
#btn_Assesment_edit{
	float:right;
	background: url("../../img/grid/title.gif") repeat-x scroll left bottom #FFFFFF;
    border: 1px solid #D7D7D7;
    border-radius: 5px;
    color: #036FAD;
    display: inline-block;
    font-size: 11px;
    font-weight: bold;
    padding: 3px 7px;
    position: relative;
}
.view_table tr td{
	border: 1px dotted #CCCCCC;
    padding: 5px;
}
</style>
<script type="text/javascript" >
$(function(){
 $(".action_link").on('click',function(e){
		 e.preventDefault();
 			var urls =$(this).attr('href');
			  $.ajax({
				type: "GET",
				url:urls,
				success: function(response){
					$('.ajax_status').hide(); 
					//alert(response);
					$('.reciveDeviceAssesmentContent').html(response);
			 
				}
				});
	 });
	    });
</script>

		 