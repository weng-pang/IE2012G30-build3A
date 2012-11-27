<div class="jobs index">
	<h2><?php echo __('Jobs'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('order_id'); ?></th>
			<th><?php echo $this->Paginator->sort('client_name'); ?></th>
			<th><?php echo $this->Paginator->sort('phone'); ?></th>
			<th><?php echo $this->Paginator->sort('type'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('progress'); ?></th>
			<th><?php echo $this->Paginator->sort('technician'); ?></th>
			<th><?php echo $this->Paginator->sort('user_name'); ?></th>
			<th><?php echo $this->Paginator->sort('open_date'); ?></th>
			<th><?php echo $this->Paginator->sort('due_date'); ?></th>
			<th><?php echo $this->Paginator->sort('closed_date'); ?></th>
			<th><?php echo $this->Paginator->sort('note_customer'); ?></th>
			<th><?php echo $this->Paginator->sort('note_solve'); ?></th>
			<th><?php echo $this->Paginator->sort('job_priority'); ?></th>
			<th><?php echo $this->Paginator->sort('metadata'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($jobs as $job): ?>
	<tr>
		<td><?php echo h($job['Job']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($job['Order']['id'], array('controller' => 'orders', 'action' => 'view', $job['Order']['id'])); ?>
		</td>
		<td><?php echo h($job['Job']['client_name']); ?>&nbsp;</td>
		<td><?php echo h($job['Job']['phone']); ?>&nbsp;</td>
		<td><?php echo h($job['Job']['type']); ?>&nbsp;</td>
		<td><?php echo h($job['Job']['created']); ?>&nbsp;</td>
		<td><?php echo h($job['Job']['progress']); ?>&nbsp;</td>
		<td><?php echo h($job['Job']['technician']); ?>&nbsp;</td>
		<td><?php echo h($job['Job']['user_name']); ?>&nbsp;</td>
		<td><?php echo h($job['Job']['open_date']); ?>&nbsp;</td>
		<td><?php echo h($job['Job']['due_date']); ?>&nbsp;</td>
		<td><?php echo h($job['Job']['closed_date']); ?>&nbsp;</td>
		<td><?php echo h($job['Job']['note_customer']); ?>&nbsp;</td>
		<td><?php echo h($job['Job']['note_solve']); ?>&nbsp;</td>
		<td><?php echo h($job['Job']['job_priority']); ?>&nbsp;</td>
		<td><?php echo h($job['Job']['metadata']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $job['Job']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $job['Job']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $job['Job']['id']), null, __('Are you sure you want to delete # %s?', $job['Job']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>

	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Job'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Orders'), array('controller' => 'orders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Order'), array('controller' => 'orders', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Job Allocations'), array('controller' => 'job_allocations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Job Allocation'), array('controller' => 'job_allocations', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Job Notes'), array('controller' => 'job_notes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Job Note'), array('controller' => 'job_notes', 'action' => 'add')); ?> </li>
	</ul>
</div>
