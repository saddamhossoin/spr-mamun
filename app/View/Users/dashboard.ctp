<div class="users dashboard">
  <table width="100%" cellspacing="0" cellpadding="0" bordercolor="#ffffff" border="0" style="border-collapse: collapse;">
  <tbody><tr>
    <td width="25%" align="center"> 
 	 <?php echo $this->Html->link( $this->Html->image("dashboard/project.png", array("alt" => "Brownies","width"=>64, "height"=>64)), array('controller'=>'PosPurchases','action'=>'index'), array('escape' => false) ); ?> <br /><?php  echo $this->Html->link( "Purchase",array('controller'=>'PosPurchases','action'=>'index'), array('escape' => false) );?>
			   </td>
			    <td width="25%" align="center"> <?php echo $this->Html->link( $this->Html->image("dashboard/question.png", array("alt" => "Brownies","width"=>64, "height"=>64)), array('controller'=>'PosSales','action'=>'index'), array('escape' => false) ); ?> <br /><?php  echo $this->Html->link( "Sales",array('controller'=>'PosSales','action'=>'index'), array('escape' => false) );?></td>
 	</tr> 
</tbody></table>
</div>

