<div class="jobs form">
<?php $this->extend('../Common/sidebar'); ?>
<?php echo $this->Form->create('Job'); ?>
	<fieldset>
		<legend><?php echo __('Edit Job'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('job_open');
		echo $this->Form->input('job_status');
		echo $this->Form->input('job_created');
		echo $this->Form->input('job_due');
		echo $this->Form->input('job_closed_date');
		echo $this->Form->input('job_priority');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Job.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Job.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Jobs'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Job Allocations'), array('controller' => 'job_allocations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Job Allocation'), array('controller' => 'job_allocations', 'action' => 'add')); ?> </li>
	</ul>
</div>
