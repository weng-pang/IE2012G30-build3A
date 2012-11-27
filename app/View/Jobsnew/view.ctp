<div class="jobs view">
<h2><?php  echo __('Job'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($job['Job']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Order'); ?></dt>
		<dd>
			<?php echo $this->Html->link($job['Order']['id'], array('controller' => 'orders', 'action' => 'view', $job['Order']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Client Name'); ?></dt>
		<dd>
			<?php echo h($job['Job']['client_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Phone'); ?></dt>
		<dd>
			<?php echo h($job['Job']['phone']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Type'); ?></dt>
		<dd>
			<?php echo h($job['Job']['type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($job['Job']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Progress'); ?></dt>
		<dd>
			<?php echo h($job['Job']['progress']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Technician'); ?></dt>
		<dd>
			<?php echo h($job['Job']['technician']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User Name'); ?></dt>
		<dd>
			<?php echo h($job['Job']['user_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Open Date'); ?></dt>
		<dd>
			<?php echo h($job['Job']['open_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Due Date'); ?></dt>
		<dd>
			<?php echo h($job['Job']['due_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Closed Date'); ?></dt>
		<dd>
			<?php echo h($job['Job']['closed_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Note Customer'); ?></dt>
		<dd>
			<?php echo h($job['Job']['note_customer']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Note Solve'); ?></dt>
		<dd>
			<?php echo h($job['Job']['note_solve']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Job Priority'); ?></dt>
		<dd>
			<?php echo h($job['Job']['job_priority']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Metadata'); ?></dt>
		<dd>
			<?php echo h($job['Job']['metadata']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Job'), array('action' => 'edit', $job['Job']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Job'), array('action' => 'delete', $job['Job']['id']), null, __('Are you sure you want to delete # %s?', $job['Job']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Jobs'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Job'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Orders'), array('controller' => 'orders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Order'), array('controller' => 'orders', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Job Allocations'), array('controller' => 'job_allocations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Job Allocation'), array('controller' => 'job_allocations', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Job Notes'), array('controller' => 'job_notes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Job Note'), array('controller' => 'job_notes', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Job Allocations'); ?></h3>
	<?php if (!empty($job['JobAllocation'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Job Id'); ?></th>
		<th><?php echo __('Staff Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($job['JobAllocation'] as $jobAllocation): ?>
		<tr>
			<td><?php echo $jobAllocation['id']; ?></td>
			<td><?php echo $jobAllocation['job_id']; ?></td>
			<td><?php echo $jobAllocation['staff_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'job_allocations', 'action' => 'view', $jobAllocation['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'job_allocations', 'action' => 'edit', $jobAllocation['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'job_allocations', 'action' => 'delete', $jobAllocation['id']), null, __('Are you sure you want to delete # %s?', $jobAllocation['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Job Allocation'), array('controller' => 'job_allocations', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Job Notes'); ?></h3>
	<?php if (!empty($job['JobNote'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Job Id'); ?></th>
		<th><?php echo __('Job Status Id'); ?></th>
		<th><?php echo __('Staff Id'); ?></th>
		<th><?php echo __('Note'); ?></th>
		<th><?php echo __('Private Note'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($job['JobNote'] as $jobNote): ?>
		<tr>
			<td><?php echo $jobNote['id']; ?></td>
			<td><?php echo $jobNote['job_id']; ?></td>
			<td><?php echo $jobNote['job_status_id']; ?></td>
			<td><?php echo $jobNote['staff_id']; ?></td>
			<td><?php echo $jobNote['note']; ?></td>
			<td><?php echo $jobNote['private_note']; ?></td>
			<td><?php echo $jobNote['created']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'job_notes', 'action' => 'view', $jobNote['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'job_notes', 'action' => 'edit', $jobNote['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'job_notes', 'action' => 'delete', $jobNote['id']), null, __('Are you sure you want to delete # %s?', $jobNote['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Job Note'), array('controller' => 'job_notes', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
