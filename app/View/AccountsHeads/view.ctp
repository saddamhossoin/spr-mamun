<div class="AccountsHeads view">
	<table cellpadding="0" cellspacing="0" class="view_table"><?php $i = 0; $class = ' class="altrow"';?>
		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo 'Id'; ?></td><td> : </td>
		<td >
			<?php echo $AccountsHead['AccountsHead']['id']; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo 'Name'; ?></td><td> : </td>
		<td >
			<?php echo $AccountsHead['AccountsHead']['title']; ?>
			&nbsp;
		</td></tr>
 <?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo 'Parent Id'; ?></td><td> : </td>
		<td >
			<?php echo $AccountsHead['AccountsHead']['parent_id']; ?>
			&nbsp;
		</td></tr>
 <?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo 'Status'; ?></td><td> : </td>
		<td >
			<?php 
			$status = array(0=>'No' , 1=>'Yes');
			echo $status[$AccountsHead['AccountsHead']['status']]; ?>
			&nbsp;
		</td></tr>

 <?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo 'Is Posted'; ?></td><td> : </td>
		<td >
			<?php echo $status[$AccountsHead['AccountsHead']['is_posted']]; ?>
			&nbsp;
		</td></tr>

 <?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo 'Is Deletable'; ?></td><td> : </td>
		<td >
			<?php echo $status[$AccountsHead['AccountsHead']['is_deleteable']]; ?>
			&nbsp;
		</td></tr>

<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo 'Created'; ?></td><td> : </td>
		<td >
			<?php echo $this->Time->niceshort($AccountsHead['AccountsHead']['created']); ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo 'Modified'; ?></td><td> : </td>
		<td >
			<?php echo $this->Time->niceshort($AccountsHead['AccountsHead']['modified']); ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo 'Created By'; ?></td><td> : </td>
		<td >
			<?php echo $userlists[$AccountsHead['AccountsHead']['created_by']]; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>		<tr <?php if ($i % 2 == 0) echo $class;?>><td><?php echo 'Modified By'; ?></td><td> : </td>
		<td >
			<?php echo $userlists[$AccountsHead['AccountsHead']['modified_by']]; ?>
			&nbsp;
		</td></tr>
<?php $i++;?>	</table>
</div>
  