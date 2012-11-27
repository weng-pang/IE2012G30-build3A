<?php echo $this->Html->script('jtable.js',false);?>
<div class="staffs index">
<?php $this->extend('../Common/sidebar'); 
	//var_dump($staffs); //DEBUG ONLY ?>
	<h2><?php echo __('Staffs'); ?></h2>
	<?php // Display Results
	echo $this->Session->flash('bad');
	echo $this->Session->flash('good'); 
	?>
	<table id="data">
	<thead>
	<tr>
			
			<th><?php echo __('Name'); ?></th>
			<th><?php echo __('Phone'); ?></th>
			<th><?php echo __('Email'); ?></th>
			<th><?php echo __('Permission'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<?php
	foreach ($staffs as $staff): ?>
	<tr>
		
		<td><?php echo h($staff['Staff']['name']); ?>&nbsp;</td>
		<td><?php echo h($staff['Staff']['staff_phonenum']); ?>&nbsp;</td>
		<td><?php echo h($staff['Staff']['staff_email']); ?>&nbsp;</td>
		<td><?php echo h($staff['User']['access_level']); ?></td>
		<td class="actions">
			<?php // echo $this->Html->link(__('Send E-mail'), array('action' => 'sendEmail', $staff['Staff']['id'])); ?>
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $staff['Staff']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $staff['Staff']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $staff['Staff']['id']), null, __('Are you sure you want to delete %s?', $staff['Staff']['name'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	
</div>
<div class="jobs actions">
	
	<ul>
		<li><?php echo $this->Html->link(__('New Staff'), array('action' => 'add')); ?></li>
		<li><?php //echo $this->Html->link(__('List Job Allocations'), array('controller' => 'job_allocations', 'action' => 'index')); ?> </li>
		<li><?php //echo $this->Html->link(__('New Job Allocation'), array('controller' => 'job_allocations', 'action' => 'add')); ?> </li>
		
		
	</ul>
</div>
