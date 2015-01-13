
<?php 
 
  
	echo $this->Html->css(array('common/grid'));  ?>

<div class="users view">
 
    <table cellpadding="0" cellspacing="0" class="view_table"><?php $i = 0; $class = ' class="altrow"';?>
		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo __('Id'); ?></td><td> : </td>
		<td >
			<?php echo h($user['User']['id']); ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo __('email_address'); ?></td><td> : </td>
		<td>
			<?php echo h($user['User']['email_address']); ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo __('Active'); ?></td><td> : </td>
		<td >
			<?php 
			if($user['User']['active']==1){echo "Active";	}else {	echo "Inactive";}?>
			&nbsp;
		</td></tr>
	        <?php $i++;?>		
<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo __('Created'); ?></td><td> : </td>
		<td >
			<?php echo  h($user['User']['created']); ?>
			&nbsp;
		</td></tr>
        
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo __('Modified'); ?></td><td> : </td>
		<td >
			<?php echo  h($user['User']['modified']); ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo __('Created By'); ?></td><td> : </td>
		<td >
			<?php echo  h($userlists[$user['User']['created_by']]); ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo __('Modified By'); ?></td><td> : </td>
		<td >
			<?php echo  h($userlists[$user['User']['modified_by']]); ?>
			&nbsp;
		</td></tr>
<?php $i++;?>	</table>
</div>
<div class="groupnametitle">User Group Name: <?php echo $Permissions['Group']['name']?></div>

<div class="flexigrid" style="width: 55%; margin:0 auto;">
<div class="bDiv" style="height: auto;">
	<div class="hDiv hDivBox" style="width:100%">
 				<table cellspacing="0" cellpadding="0" >
					<thead>
						<tr>
  							<th align="left" ><div style=" width:337px;">Sort Name</div></th>
							<th align="left" ><div style=" width: 338px;">Permission Name</div></th>
							 
 							</tr>
						</thead>
					</table>				</div> 
 	
				 	<table cellspacing="0" cellpadding="0" border="0" style="" class="flexme3">
					<tbody>
 					<?php
					
						$i = 0;
						$groupid=0;
						foreach ($Permissions['Permission'] as $permission):
						
							$class = null;
							if ($i++ % 2 == 0) {
								$class = ' class="altrow"';
							}?>
				 
				<tr id="<?php echo 'row_'.$permission['id']; ?>" <?php echo $class;?>>
 					 
					
					<td align="left"  ><div style=" width: 337px;"> <?php //echo $permission['sortname'];?></div>&nbsp;</td>
				    <td align="left"  ><div style=" width: 338px;" class="alistname"><?php echo $permission['name']; ?></div>&nbsp;</td>

					
					 
   					</tr>
 					<?php endforeach; ?>
 				</tbody>
		</table> </div>


</div>
<?php /*?>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit User'), array('action' => 'edit', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete User'), array('action' => 'delete', $user['User']['id']), null, __('Are you sure you want to delete # %s?', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Groups'), array('controller' => 'groups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Group'), array('controller' => 'groups', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Groups');?></h3>
	<?php if (!empty($user['Group'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Created By'); ?></th>
		<th><?php echo __('Modified By'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($user['Group'] as $group): ?>
		<tr>
			<td><?php echo $group['id'];?></td>
			<td><?php echo $group['name'];?></td>
			<td><?php echo $group['created'];?></td>
			<td><?php echo $group['modified'];?></td>
			<td><?php echo $group['created_by'];?></td>
			<td><?php echo $group['modified_by'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'groups', 'action' => 'view', $group['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'groups', 'action' => 'edit', $group['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'groups', 'action' => 'delete', $group['id']), null, __('Are you sure you want to delete # %s?', $group['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Group'), array('controller' => 'groups', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<?php */?>