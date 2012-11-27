<div class="jobs form">
<?php $this->extend('../Common/sidebar'); ?>
<?php echo $this->Form->create('Job'); ?>
	<fieldset>
		<legend><?php echo __('Add Job'); ?></legend>
	<?php
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

		<li><?php echo $this->Html->link(__('List Jobs'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Job Allocations'), array('controller' => 'job_allocations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Job Allocation'), array('controller' => 'job_allocations', 'action' => 'add')); ?> </li>
	</ul>
</div>
