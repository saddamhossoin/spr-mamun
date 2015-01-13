<div class="toolsMenus view">
	<table cellpadding="0" cellspacing="0" class="view_table"><?php $i = 0; $class = ' class="altrow"';?>
		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Id'); ?></td><td> : </td>
		<td >
			<?php echo $toolsMenu['ToolsMenu']['id']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Name'); ?></td><td> : </td>
		<td >
			<?php echo $toolsMenu['ToolsMenu']['name']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Class'); ?></td><td> : </td>
		<td >
			<?php echo $toolsMenu['ToolsMenu']['class']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Menu Id'); ?></td><td> : </td>
		<td >
			<?php echo $toolsMenu['ToolsMenu']['menu_id']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Controller'); ?></td><td> : </td>
		<td >
			<?php echo $toolsMenu['ToolsMenu']['controller']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Action'); ?></td><td> : </td>
		<td >
			<?php echo $toolsMenu['ToolsMenu']['action']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Link Controller'); ?></td><td> : </td>
		<td >
			<?php echo $toolsMenu['ToolsMenu']['link_controller']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Link Action'); ?></td><td> : </td>
		<td >
			<?php echo $toolsMenu['ToolsMenu']['link_action']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Action Extra'); ?></td><td> : </td>
		<td >
			<?php echo $toolsMenu['ToolsMenu']['action_extra']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Active'); ?></td><td> : </td>
		<td >
			<?php echo $toolsMenu['ToolsMenu']['active']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('idname'); ?></td><td> : </td>
		<td >
			<?php echo $toolsMenu['ToolsMenu']['idname']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Is Deleteable'); ?></td><td> : </td>
		<td >
			<?php echo $toolsMenu['ToolsMenu']['is_deleteable']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Created'); ?></td><td> : </td>
		<td >
			<?php echo $toolsMenu['ToolsMenu']['created']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Modified'); ?></td><td> : </td>
		<td >
			<?php echo $toolsMenu['ToolsMenu']['modified']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Created By'); ?></td><td> : </td>
		<td >
			<?php echo $toolsMenu['ToolsMenu']['created_by']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo  __('Modifyed By'); ?></td><td> : </td>
		<td >
			<?php echo $toolsMenu['ToolsMenu']['modifyed_by']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>	</table>
</div>
  