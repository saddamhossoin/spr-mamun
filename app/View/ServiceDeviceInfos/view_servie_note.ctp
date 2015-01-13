<?php 
//pr($assesmentapproveaote);
 	if(!empty($assesmentinfo['Assesment']['note'])){
		echo "<h1 class='title_recive'> Assesment Note :</h1>";
		echo "<p1>".$assesmentinfo['Assesment']['note']."</p1>";
	}
  	if(!empty($assesmentapproveaote )){
   ?>
 <br /> <br />
 <table cellspacing="0" cellpadding="0" border="0" style="" class="view_table">
    <thead>
        <tr>
 			<th align="left" width="10%"> <?php echo  'Date';?></th>
			<th align="left" width="15%"> <?php echo  'User';?></th>
            <th align="left" width="15%"> <?php echo  'Level';?></th>
            <th align="left" width="54%"> <?php echo  'Note';?></th>
			<th align="left" width="15%"> <?php echo  'Image';?></th>
            <th align="left" width="6%"> <?php echo  'Link';?></th>
       	</tr>
      </thead>
  <tbody>
<?php
  		$i = 0;
 	 	foreach ($assesmentapproveaote as $AssesmentApproveNote){
 			$class = null;
 			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
			if(!empty($AssesmentApproveNote['AssesmentApproveNote']['screenimage']) || !empty($AssesmentApproveNote['AssesmentApproveNote']['notes'])){
?>
	<tr id='<?php echo 'row_'.$AssesmentApproveNote['AssesmentApproveNote']['id'];?>'  <?php echo $class;?>>
     <td align='left'> <?php	echo date("d/m/Y", strtotime($AssesmentApproveNote['AssesmentApproveNote']['created'])); ?>&nbsp;</td>
    <td align='left'><?php  echo $AssesmentApproveNote['User']['firstname']. ' '.$AssesmentApproveNote['User']['lastname'] ; ?>&nbsp; </td>
    <td align='left'> <?php	echo  $AssesmentApproveNote['AssesmentApproveNote']['stage_des'] ; ?>&nbsp;</td>
    <td align='left'> <?php	echo  $AssesmentApproveNote['AssesmentApproveNote']['notes'] ; ?>&nbsp;</td>
    <td align='left'><?php  echo $this->Html->image('../'.$AssesmentApproveNote['AssesmentApproveNote']['screenimage'], array("alt" => "No Image" ,"border"=>"0" ));
    ?>&nbsp; </td>
	<td align='left'>
		<div class='alistname link_link'>
        <?php echo $this->Html->link(__('Edit', true), array('controller'=>'AssesmentApproveNotes','action' => 'Edit', $AssesmentApproveNote['AssesmentApproveNote']['id']),array('class'=>'link_view action_link AssesmentApproveNoteEdits')); ?>
        </div>
    </td>    
 	  </tr> 
<?php } }?>
    </table>
<?php } ?>
<script type="text/javascript">
//======================Add Brand pop up============//
	 var dialogOptstempleteGeneralList = {
		title:'Edit Note',
		autoOpen: false,
		height: 350,
		width: 400,
		modal: true,
		draggable:true,
 	    ////close: CloseFunction,
	  dialogClass: 'objectdetailsdialog',
	};
	$("#invoice6").dialog(dialogOptstempleteGeneralList);
	
	$(".AssesmentApproveNoteEdits").on('click',function(e){
		 	e.preventDefault(); 
			var ulrs =$(this).attr('href');
		 	$("#invoice6").load(ulrs, [], function(){
			$("#invoice6").dialog("open");
		});
			 
	});
	
	//====================== End Brand pop up===========//
</script>

<style>
.action_link {
    background: none repeat scroll 0 0 #ffffff;
    border: 1px solid #d7d7d7;
    border-radius: 5px;
    color: #036fad;
    display: inline-block;
    font-size: 11px;
    font-weight: bold;
    padding: 3px 7px;
    position: relative;
}
</style>