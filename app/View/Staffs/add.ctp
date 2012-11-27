<div class="staffs form">
<?php $this->extend('../Common/sidebar'); ?>
<?php echo $this->Form->create('Staff'); ?>
	<fieldset>
		<legend><?php echo __('Add Staff'); ?></legend>
	<?php
		echo $this->Form->input('name',array('label'=>'Name'));
		echo $this->Form->input('staff_phonenum',array('label'=>'Phone Number'));
		echo $this->Form->input('staff_email',array('label'=>'Email'));
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
	<h3><?php //echo __('Actions'); ?></h3>
	<ul>

		<li><?php //echo $this->Html->link(__('List Staffs'), array('action' => 'index')); ?></li>
		<li><?php //echo $this->Html->link(__('List Job Allocations'), array('controller' => 'job_allocations', 'action' => 'index')); ?> </li>
		<li><?php //echo $this->Html->link(__('New Job Allocation'), array('controller' => 'job_allocations', 'action' => 'add')); ?> </li>
		<li><?php //echo $this->Html->link(__('List Jobs'), array('controller' => 'jobs', 'action' => 'index')); ?> </li>
		<li><?php //echo $this->Html->link(__('New Job'), array('controller' => 'jobs', 'action' => 'add')); ?> </li>
	</ul>
</div>
