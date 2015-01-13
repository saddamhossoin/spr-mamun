<?php // pr($menuslist);?>
 <div class="flexigrid" style="width: 100%;">
  <div class="mDiv">
    <div class="ftitle">
       
    </div>
    <div id="searchlink"> &nbsp;</div>
  </div>
  <div class="tDiv">
    <div class="tDiv2"  > <?php echo $this->Form->create('Menu',array('controller'=>'menus', 'action'=>'index'));?>
      <div id="WrapperBrandName" class="microcontroll"> <?php echo $this->Form->label('Menu.name', __('Menu Name'.': <span class="star"></span>', true) ); ?> <?php echo $this->Form->input('Menu.name',array('type'=>'text','div'=>false,'label'=>false, 'size'=>35 ));?> </div>
      <?php echo $this->element('filter/commonfilter',array("cache" => array('time'=> "-7 days",'key'=>'header'))); ?>
      <div class="button_area_filter">
        <?php  echo $this->Form->button('Search',array( 'class'=>'submit', 'id'=>'btn_brand_search'));?>
        <?php  echo $this->Form->button('Reset',array('type'=>'reset','name'=>'reset','id'=>'Cancel', 'onClick'=>"parent.location='menus/index/yes'"));?>
      </div>
      </form>
    </div>
    <div style="clear: both;"></div>
  </div>
  
  <div class="bDiv" style="height: auto;">
  <div class="hDiv">
    <div class="hDivBox">
      <table cellpadding="0" cellspacing="0">
        <thead>
          <tr>
             <th align="center" class="sorted"><div  style="width: 40px;"> <?php echo $this->Form->checkbox('checkbox',array( 'div'=>false,'label'=>false, 'size'=>25,'class'=>'commoncheckbox'));?> </div></th>
            <th align="left" ><div style=" width: 133px;"><?php echo 'Name' ;?></div></th>
 			<th align="left" ><div style=" width: 73px;"><?php echo 'Menu Type';?></div></th>
			<th align="left" ><div style=" width: 83px;"><?php echo 'Controller';?></div></th>
			<th align="left" ><div style=" width: 83px;"><?php echo 'Action';?></div></th>
			<th align="left" ><div style=" width: 210px;"><?php echo 'Url';?></div></th>
 			
             <?php if($this->Session->read('menuname')=='Admin' || $this->Session->read('menuname')=='SuperAdmin'){?>
            <th align="right"  ><div style="text-align: left; width: 100px;"><?php echo 'User';?></div></th>
            <?php }?>
            <th align="left" ><div style=" width: 220px;"><?php echo 'Link';?></div></th>
          </tr>
        </thead>
      </table>
    </div>
  </div>
    <table cellspacing="0" cellpadding="0" border="0" style="" class="flexme3">
      <tbody>
        <?php
		//pr($menuslist);
	$i = 0;
	foreach ($manuarray as $key=>$menuItem):
	 
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
        <tr id="<?php echo 'row_'.$key;  ?>" <?php echo $class;?>>
          <td align="center"  class="sorted" align="center" >
          <div style="width:40px; text-align:center;"> <?php echo $this->Form->checkbox('Menu.checkbox',array( 'div'=>false,'label'=>false, 'size'=>35,'class'=>'listcheckbox','value'=>$key));?> </div>
          </td>
          <td align="left"  ><div style=" width: 135px;" class="alistname">
              <?php  
					if(!empty($this->data['Menu']['name'])){
					echo $text->highlight($menuItem,$this->data['Menu']['name']); }
					else
					{
						echo $menuItem;
					}?>
            </div></td>
			<td align="left" ><div style=" width: 73px;"><?php echo $menuslist[$key]['Menu']['menu_type']?> </div></td>
			<td align="left" ><div style=" width: 83px;"> <?php echo $menuslist[$key]['Menu']['controller']?></div></td>
			<td align="left" ><div style=" width: 83px;"> <?php echo $menuslist[$key]['Menu']['action']?></div></td>
  			<td align="left" ><div style=" width: 210px;"> <?php echo $menuslist[$key]['Menu']['url']?></div></td>

			
            <td align="left"  >
		  
		  <div style=" width: 220px;" class="alistname">
 		  <?php  if($menuslist[$key]['Menu']['active'] == 1){
		  echo $this->Html->link(__('Active', true), array('action' => 'edit', $key),array('class'=>'viewlink action_link','title'=>'Edit'));
		  }else{
		  echo $this->Html->link(__('In active', true), array('action' => 'edit', $key),array('class'=>'viewlink action_link','title'=>'Edit'));
		  }?>
		  |
		  
		   <?php echo $this->Html->link(__('up', true), array('action' => 'move', $key, 'up'),array('class'=>'viewlink action_link','title'=>'Up')); ?> |
		   
			<?php echo $this->Html->link(__('down', true), array('action' => 'move', $key, 'down'),array('class'=>'viewlink action_link','title'=>'Down')); ?> | 
			
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $key),array('class'=>'viewlink action_link','title'=>'Edit')); ?>  
			
		   <?php if($menuslist[$key]['Menu']['is_deleteable'] != 1){ echo " | ".$this->Html->link(__('Delete', true), array('action' => 'delete', $key), array('class'=>'singledelete action_link','title'=>'Delete'), sprintf(__('Are you sure you want to delete # %s?', true), $key)); }?> </div></td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
   
</div>