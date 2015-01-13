<html>
<head>
<title>Report For SPR</title>
<?php echo $this->Html->css(array('module/ServiceDeviceInfos/receive_invoice'));?>
<?php echo $this->Html->css(array('common/common','common/rounded','ui/ui.base','themes/black_rose/ui','common/reportgrid' ,'module/'.Inflector::singularize($this->params['controller']).'/'.Inflector::singularize($this->params['action'])   )); 
 ?>	
</head>

<body>
	<div class="full_div_report_wrapper">
		<div class="sec_div_wrapper">
 		<?php echo $content_for_layout;?> 
 		<div class="reviewer_div">
        <table width="100%" border="0"   class="reviewer_table" cellspacing="0" cellpadding="0">
            <tbody>
                <tr>
                <td width="60%" class="captionLeft" >&nbsp;&nbsp;&nbsp;
                    <span><?php echo 'Roma, '.'&nbsp;'.date("d/m/Y");?></span>
                </td>
                <td width="40%" class="captionLeft">
                   &nbsp;<?php echo $this->Session->read('Auth.User.firstname')." ".$this->Session->read('Auth.User.lastname');?>
                </td>
                </tr>
            </tbody>
        </table>
			</div>
		</div>
	</div>
</body>
</html>
<script type="text/javascript" >
	$(function(){
	 $(".Print_Button").on('click',function(e){
		 $('.Print_Button').html('');
		 Popup($("#invoiceReload").html());
		$('.Print_Button').html("<span class='print_img'>&nbsp;&nbsp;</span> &nbsp;Print");
	 });
    });
</script>
