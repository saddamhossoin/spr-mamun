<?php if(!empty($serviceDeviceInfo)){
		if(!empty($serviceDeviceInfo['ServiceDeviceInfo']['screenimage'])){
			echo "<h1 class='title_recive'> Service Recive</h1>";
			echo $this->Html->image('../'.$serviceDeviceInfo['ServiceDeviceInfo']['screenimage'], array("alt" => "No Image" ,"border"=>"0" ));
		}
 		if(!empty($assesmentinfo['Assesment']['asscheckImage'])){
			echo "<h1 class='title_recive'> Assesment Image</h1>";
 			echo $this->Html->image('../'.$assesmentinfo['Assesment']['asscheckImage'], array("alt" => "No Image" ,"border"=>"0" ));
			}
 			if(!empty($AssesmentApproveNote['AssesmentApproveNote']['screenimage'])){
			echo "<h1 class='title_recive'> Tech Image</h1>";
 			echo $this->Html->image('../'.$AssesmentApproveNote['AssesmentApproveNote']['screenimage'], array("alt" => "No Image" ,"border"=>"0" ));
			}
  			   }else{
	echo "<h1 class='title_recive'>Invalid Serial No.</h1>";
}
?> 