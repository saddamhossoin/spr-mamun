<div class="DeviceCheckLists">
<?php echo $this->Form->create('DeviceCheckList');
	echo $this->Form->input('ServiceDeviceInfo.id',array('value'=>$ids));

?>


   <div class="reciveDeviceContact reciveDevice" id="check_list_result">
    <div class="blocktitleinfo">Comparigm Check list</div>
     <div class="DeviceCheckLists">
        <table  class="assesmentSDIGrid" width="250px;">
                <thead>
                  <tr>
                    <td  class="headingtag" style="width:200px;">Name&nbsp;</td>
                    <td  class="headingtag">Tech Result&nbsp;</td>
                    <td  class="headingtag">Test Result&nbsp;</td>
                  </tr>
                </thead>
                <tbody class="viewchecklistgrid">
                
            <?php foreach($checklist_names as $key => $checklist_name){?>   
             <?php 
			 if(array_key_exists( $key , $ServiceDeviceCheckdata)){
 				// echo key($ServiceDeviceCheckdata[$key]);
				$resultItem = ucwords( key($ServiceDeviceCheckdata[$key]));
				switch($resultItem){
					case  'Yes':				
					 echo " <tr style='background:green; color:white; font-weight:bold; '><td>". $checklist_name ."&nbsp;</td><td>".$resultItem."&nbsp;</td>";
					 break;
					 case 'No':				
					 echo "<tr style='background:red;color:white; font-weight:bold;'><td>". $checklist_name ."&nbsp;</td><td>".$resultItem."&nbsp;</td> ";
					 break;
					 case 'Default':				
					 echo "<tr><td>". $checklist_name ."&nbsp;</td><td>".$resultItem."&nbsp;</td>";
					 break;
				} 
				
				if(!empty($ServiceDeviceCheckdatatest)){
 					 if(array_key_exists( $key , $ServiceDeviceCheckdatatest)){
					// die('jewel');
 						// echo key($ServiceDeviceCheckdata[$key]);
							$resultItemTest = ucwords( key($ServiceDeviceCheckdatatest[$key]));
							switch($resultItemTest){
							case  'Yes':				
							 echo "<td style='background:green;color:white; font-weight:bold;'>".$resultItemTest."&nbsp;</td></tr> ";
							 break;
							 case 'No':				
							 echo "<td style='background:red;color:white; font-weight:bold;'>".$resultItemTest."&nbsp;</td></tr> ";
							 break;
							 case 'Default':				
							 echo " <td>".$resultItemTest."&nbsp;</td></tr>";
							 break;
				 
			 }
			 
			 }
			 }
			 }
			 
			
			 
			 } ?> 
                </tbody>
              </table>
      


</div>
   
    <div class="clr"></div>
  </div>
  
   
  
  
     </div>

</div>




<style>
.viewchecklistgrid tr td{
	padding:9px !important;
	
}
#check_list_result{
	width:96% !important;
	margin:0px !important;
	float:left !important;
	}
#test_assign_checklist{
	width:250px !important;
	float:left;
	}
.reciveDevice{
	margin:0px !important;
	}


.blocktitleinfo {
    background: none repeat scroll 0 0 #aabbcc;
    color: #ffffff;
    font-family: verdana;
    font-size: 11px;
    font-weight: bold;
    height: 16px;
    margin: 0 0 5px !important;
    padding: 3px 12px;
}
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
.assesmentSDIGrid tr td:nth-child(2) , .assesmentSDIGrid tr td:nth-child(4)
{
 	
}
.assesmentSDIGrid tr td:nth-child(1) , .assesmentSDIGrid tr td:nth-child(3), .assesmentSDIGrid tr td:nth-child(5){
	font-weight:bold;
	
}

.assesmentSDIGrid tr td {
    border: 1px dotted #ccc;
    padding: 5px;
}
 


</style>
 




