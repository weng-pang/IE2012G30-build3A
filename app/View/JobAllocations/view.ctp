<div class="jobAllocations view">
<?php $this->extend('../Common/sidebar'); ?>
<h2><?php  echo __('Job Allocation'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($jobAllocation['JobAllocation']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Job'); ?></dt>
		<dd>
			<?php echo $this->Html->link($jobAllocation['Job']['id'], array('controller' => 'jobs', 'action' => 'view', $jobAllocation['Job']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Staff'); ?></dt>
		<dd>
			<?php echo $this->Html->link($jobAllocation['Staff']['name'], array('controller' => 'staffs', 'action' => 'view', $jobAllocation['Staff']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Job Allocation'), array('action' => 'edit', $jobAllocation['JobAllocation']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Job Allocation'), array('action' => 'delete', $jobAllocation['JobAllocation']['id']), null, __('Are you sure you want to delete # %s?', $jobAllocation['JobAllocation']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Job Allocations'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Job Allocation'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Jobs'), array('controller' => 'jobs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Job'), array('controller' => 'jobs', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Staffs'), array('controller' => 'staffs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Staff'), array('controller' => 'staffs', 'action' => 'add')); ?> </li>
	</ul>
</div>
