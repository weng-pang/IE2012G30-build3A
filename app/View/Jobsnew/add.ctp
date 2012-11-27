<div class="jobs form">
<?php echo $this->Form->create('Job'); ?>
	<fieldset>
		<legend><?php echo __('Add Job'); ?></legend>
	<?php
		echo $this->Form->input('order_id');
		echo $this->Form->input('client_name');
		echo $this->Form->input('phone');
		echo $this->Form->input('type');
		echo $this->Form->input('progress');
		echo $this->Form->input('technician');
		echo $this->Form->input('user_name');
		echo $this->Form->input('open_date');
		echo $this->Form->input('due_date');
		echo $this->Form->input('closed_date');
		echo $this->Form->input('note_customer');
		echo $this->Form->input('note_solve');
		echo $this->Form->input('job_priority');
		echo $this->Form->input('metadata');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Jobs'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Orders'), array('controller' => 'orders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Order'), array('controller' => 'orders', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Job Allocations'), array('controller' => 'job_allocations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Job Allocation'), array('controller' => 'job_allocations', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Job Notes'), array('controller' => 'job_notes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Job Note'), array('controller' => 'job_notes', 'action' => 'add')); ?> </li>
	</ul>
</div>
