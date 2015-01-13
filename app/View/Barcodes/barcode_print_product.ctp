<span class='Print_Button'><span class='print_img'>&nbsp;&nbsp;</span> &nbsp;Print</span>
<div class="barcode_print">
<style>
.barcode_print{
	border:1px solid #999999;
	width:225px !important;
	height:auto !important;
	list-style:none !important;
}
.barcode_print div{
	width:220px;
 	padding-top:3px;
	display:block;
	margin-left:5px;
	border-bottom:1px dotted #CCCCCC;
	list-style-type:none !important;
	padding-bottom:8px !important;
 }
 </style>
   	<div id='<?php echo 'row_'.$singlebarcodes ['Barcode']['id'];?>'>
	 <?php  echo $this->Html->image("../".$singlebarcodes ['Barcode']['filename'], array("class"=>"barcode","alt" => $singlebarcodes['Barcode']['filename'] ));?>
   </div>
 </div>
<script type="text/javascript" >
	$(function(){
	 $(".Print_Button").on('click',function(e){
		 $('.Print_Button').html('');
		 Popup($(".barcode_print").html());
 	 });
    });
</script>
