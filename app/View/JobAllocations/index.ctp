<div class="jobAllocations index">
<?php $this->extend('../Common/sidebar'); ?>
	<h2><?php echo __('Job Allocations'); ?></h2>
	<table>
	<tr>
			
			<th><?php echo $this->Paginator->sort('job_id'); ?></th>
			<th><?php echo $this->Paginator->sort('staff_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($jobAllocations as $jobAllocation): ?>
	<tr>
		
		<td>
			<?php echo $this->Html->link($jobAllocation['Job']['id'], array('controller' => 'jobs', 'action' => 'view', $jobAllocation['Job']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($jobAllocation['Staff']['name'], array('controller' => 'staffs', 'action' => 'view', $jobAllocation['Staff']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $jobAllocation['JobAllocation']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $jobAllocation['JobAllocation']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $jobAllocation['JobAllocation']['id']), null, __('Are you sure you want to delete # %s?', $jobAllocation['JobAllocation']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Job Allocation'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Jobs'), array('controller' => 'jobs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Job'), array('controller' => 'jobs', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Staffs'), array('controller' => 'staffs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Staff'), array('controller' => 'staffs', 'action' => 'add')); ?> </li>
	</ul>
</div>
