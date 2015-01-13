<?php  //pr($ServiceDeviceCheckdata);
  //pr($checklist_note);?>
<div class="DeviceCheckLists">
<?php if(!empty($checklist_note['AssesmentApproveNote']['notes'])){?>
<table  class="assesmentSDIGrid" width="100%">
	<thead>
    	<tr>
        	<td class="headingtag" style="width:20%; background:#0033FF;color:#FFFFFF;"> Note</td>
        	<td><?php  echo $checklist_note['AssesmentApproveNote']['notes'];?></td>
        </tr>
	</thead>
</table>
<?php }?>  
<table class="assesmentSDIGrid" width="100%">
    <thead>
        <tr>
            <td  class="headingtag" style="width:60%">Check List Name&nbsp;</td>
            <td  class="headingtag">Result&nbsp;</td>
        </tr>
    </thead>
    <tbody>
     <?php foreach($checklist_names as $key => $checklist_name){?>   
         <?php 
         if(array_key_exists( $key , $ServiceDeviceCheckdata)){
            // echo key($ServiceDeviceCheckdata[$key]);
            $resultItem = ucwords( key($ServiceDeviceCheckdata[$key]));
            switch($resultItem){
                case  'Yes':				
                 echo " <tr style='background:green; color:white; font-weight:bold;'><td>". $checklist_name ."&nbsp;</td><td>".$resultItem."&nbsp;</td></tr>";
                 break;
                 case 'No':				
                 echo "<tr style='background:red;color:white; font-weight:bold;'><td>". $checklist_name ."&nbsp;</td><td>".$resultItem."&nbsp;</td><tr>";
                 break;
                 case 'Default':				
                 echo "<tr><td>". $checklist_name ."&nbsp;</td><td>".$resultItem."&nbsp;</td>";
                 break;
            }}?>
        </tr>
    <?php } ?> 
    </tbody>
</table>
 </div>
<style>
.rdcontent_left{
		float:left;
		width:98%;
}
.assesmentSDIGrid{
		width:100%;
		border:1px dotted #CCC;
}
.assesmentSDIGrid tr td{
	padding:5px;
}
.headingtag{
		color:#006;
		font-family:Verdana, Geneva, sans-serif;
		font-weight:bold;
}
.assesmentSDIGrid tr td:nth-child(1) , .assesmentSDIGrid tr td:nth-child(3), .assesmentSDIGrid tr td:nth-child(5){
	font-weight:bold;
}
</style>
 




