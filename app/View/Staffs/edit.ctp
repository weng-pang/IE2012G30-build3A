<div class="staffs form">
<?php $this->extend('../Common/sidebar'); ?>
<?php echo $this->Form->create('Staff'); ?>
	<fieldset>
		<legend><?php echo __('Edit Staff'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('staff_phonenum');
		echo $this->Form->input('staff_email');
		echo __('<h2>Access Details</h2>');
		echo $this->Form->input('User.username');
		echo $this->Form->input('User.password',array('type'=>'text'));
		echo $this->Form->input('User.access_level',array('options'=>array('Administrator'=>'Administrator','Superstaff'=>'Superstaff','Staff'=>'Staff')));
		echo $this->Form->input('User.is_suspended',array('label'=>'Suspend access'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Staff.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Staff.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Staffs'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Job Allocations'), array('controller' => 'job_allocations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Job Allocation'), array('controller' => 'job_allocations', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Jobs'), array('controller' => 'jobs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Job'), array('controller' => 'jobs', 'action' => 'add')); ?> </li>
	</ul>
</div>
