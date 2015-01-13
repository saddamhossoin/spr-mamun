<?php 	echo $this->Html->css(array('common/grid'));  
//pr($user);
?>
<div class="users view">
    <table cellpadding="0" cellspacing="0" class="view_table"><?php $i = 0; $class = ' class="altrow"';?>
		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo __('Name'); ?></td><td> : </td>
		<td >
			<?php echo $user['User']['firstname']." ".$user['User']['lastname']; ?>
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
<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo __('Phone'); ?></td><td> : </td>
		<td >
			<?php echo  h($user['User']['phone']); ?>
			&nbsp;
		</td></tr>
  <?php $i++;?> <tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo __('User Group Name'); ?></td><td> : </td>
		<td >
			<?php echo  h($user['Group'][0]['name']); ?>
			&nbsp;
		</td></tr>
<?php $i++;?>	
	</table>
</div>