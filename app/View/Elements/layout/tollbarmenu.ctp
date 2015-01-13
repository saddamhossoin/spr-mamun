<?php if(is_array($permissions)): ?>
	<div id="menu">  
	<ul>
	 <?php     
 	   $toolsMenus =  $_SESSION['ToolsMenu'];
	   $toolsclass = $_SESSION['ToolsClass'];
	
	 foreach($toolsMenus as $toolsMenu)
	 {
 		$controllername = (Inflector::camelize($this->params['controller']));
 	 	if($controllername.":".$this->params['action'] == $toolsMenu['ToolsMenu']['controller'].":".$toolsMenu['ToolsMenu']['action'] )
		{
 			$toolImage = $toolsclass[$toolsMenu['ToolsMenu']['class']];
			?>
		 <li> 
 		   <?php 
 			    echo $this->Html->link( $this->Html->image("toolbar/".$toolImage.".png", array("alt" =>$toolImage,"width"=>24, "height"=>24,"id"=> $toolsMenu['ToolsMenu']['idname'])), array('controller'=>$toolsMenu['ToolsMenu']['link_controller'],'action'=>$toolsMenu['ToolsMenu']['link_action'],$toolsMenu['ToolsMenu']['action_extra']), array('escape' => false) ); ?>
                 
                 <?php    echo $this->Html->link( $toolsMenu['ToolsMenu']['name'],array('controller'=>$toolsMenu['ToolsMenu']['link_controller'],'action'=>$toolsMenu['ToolsMenu']['link_action'],$toolsMenu['ToolsMenu']['action_extra']), array("id"=> $toolsMenu['ToolsMenu']['idname'],'escape' => false) );?>
  		 </li>
 	<?php	}}?>
 	</ul>
</div>	
<?php endif; ?>