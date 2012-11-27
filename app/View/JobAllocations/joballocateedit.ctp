<div class="jobAllocations form">
<?php $this->extend('../Common/sidebar'); ?>
<?php echo $this->Form->create('JobAllocation'); ?>
	<fieldset>
		<legend><?php echo __('Edit Job Allocation'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('job_id');
		echo $this->Form->input('staff_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('JobAllocation.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('JobAllocation.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Job Allocations'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Jobs'), array('controller' => 'jobs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Job'), array('controller' => 'jobs', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Staffs'), array('controller' => 'staffs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Staff'), array('controller' => 'staffs', 'action' => 'add')); ?> </li>
	</ul>
</div>
