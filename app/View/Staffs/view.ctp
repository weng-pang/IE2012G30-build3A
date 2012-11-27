<div class="staffs view">
<?php $this->extend('../Common/sidebar'); ?>
<h2><?php  echo __('Staff'); ?></h2>
	<dl>
		
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($staff['Staff']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Contact'); ?></dt>
		<dd>
			<?php echo h($staff['Staff']['staff_phonenum']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Staff Email'); ?></dt>
		<dd>
			<?php echo h($staff['Staff']['staff_email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Username'); ?></dt>
		<dd>
			<?php echo h($staff['User']['username']); ?>
			&nbsp;
		</dd>

		<dt><?php echo __('Permission'); ?></dt>
		<dd>
			<?php echo h($staff['User']['access_level']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Staff'), array('action' => 'edit', $staff['Staff']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Staff'), array('action' => 'delete', $staff['Staff']['id']), null, __('Are you sure you want to delete # %s?', $staff['Staff']['id'])); ?> </li>
		<li><?php //echo $this->Html->link(__('List Staffs'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Staff'), array('action' => 'add')); ?> </li>
		<li><?php //echo $this->Html->link(__('List Job Allocations'), array('controller' => 'job_allocations', 'action' => 'index')); ?> </li>
		<li><?php //echo $this->Html->link(__('New Job Allocation'), array('controller' => 'job_allocations', 'action' => 'add')); ?> </li>
		<li><?php //echo $this->Html->link(__('List Jobs'), array('controller' => 'jobs', 'action' => 'index')); ?> </li>
		<li><?php //echo $this->Html->link(__('New Job'), array('controller' => 'jobs', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Job Allocations'); ?></h3>
	<?php if (!empty($staff['JobAllocation'])): ?>
	<table>
	<tr>
		<th><?php echo __('Job Id'); ?></th>
		
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($staff['JobAllocation'] as $jobAllocation): ?>
		<tr>
			<td><?php echo $jobAllocation['job_id']; ?></td>
			
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'jobs', 'action' => 'view', $jobAllocation['job_id'])); ?>
				<?php //echo $this->Html->link(__('Edit'), array('controller' => 'job_allocations', 'action' => 'edit', $jobAllocation['id'])); ?>
				<?php //echo $this->Form->postLink(__('Delete'), array('controller' => 'job_allocations', 'action' => 'delete', $jobAllocation['id']), null, __('Are you sure you want to delete # %s?', $jobAllocation['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>


</div>
<div class="related">
	<h3><?php //echo __('Related Jobs'); ?></h3>
	<?php if (!empty($staff['Job'])): ?>
	<table>
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Job Open'); ?></th>
		<th><?php echo __('Job Status'); ?></th>
		<th><?php echo __('Job Created'); ?></th>
		<th><?php echo __('Job Due'); ?></th>
		<th><?php echo __('Job Closed Date'); ?></th>
		<th><?php echo __('Job Priority'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($staff['Job'] as $job): ?>
		<tr>
			<td><?php echo $job['id']; ?></td>
			<td><?php echo $job['job_open']; ?></td>
			<td><?php echo $job['job_status']; ?></td>
			<td><?php echo $job['job_created']; ?></td>
			<td><?php echo $job['job_due']; ?></td>
			<td><?php echo $job['job_closed_date']; ?></td>
			<td><?php echo $job['job_priority']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'jobs', 'action' => 'view', $job['id'])); ?>
				<?php //echo $this->Html->link(__('Edit'), array('controller' => 'jobs', 'action' => 'edit', $job['id'])); ?>
				<?php //echo $this->Form->postLink(__('Delete'), array('controller' => 'jobs', 'action' => 'delete', $job['id']), null, __('Are you sure you want to delete # %s?', $job['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>


</div>
