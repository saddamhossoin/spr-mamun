<span class='Print_Button'><span class='print_img'>&nbsp;&nbsp;</span> &nbsp;Print</span>
<div class="barcode_print1">
<style>
.barcode_print{
	border:1px solid #999999;
	width:225px !important;
	height:auto !important;
	list-style:none !important;
}
.barcode_print div{
	width:220px;
	margin-bottom:5px;
	margin-top:3px;
	display:block;
	margin-left:5px;
	border-bottom:1px dotted #CCCCCC;
	list-style-type:none !important;
	padding-bottom:8px !important;
 }

</style>
 <?php foreach($lot_numbers as $lot_number) {?>
 	<div id='<?php echo 'row_'.$lot_number['Barcode']['id'];?>'>
	 <?php  echo $this->Html->image("../".$lot_number['Barcode']['filename'], array("class"=>"barcode","alt" => $lot_number['Barcode']['filename'] ));?>
 	</div><?php } ?>
</div>
<script type="text/javascript" >
	$(function(){
	 $(".Print_Button").on('click',function(e){
		 $('.Print_Button').html('');
		 Popup($(".barcode_print1").html());
 	 });
    });
</script>
