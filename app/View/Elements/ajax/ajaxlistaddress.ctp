<?php if(!empty($lists) ){?>
<option value="">-- Please Select --</option>
<?php foreach($lists as $key=>$value){?>
	<option value="<?php echo $key ?>"> <?php echo $value;?></option>
<?php }}else{?>
<option value="">-- No data found --</option>
<?php }?>