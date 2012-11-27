<div class="customers form">
<?php $this->extend('../Common/sidebar'); ?>

<?php 
	//var_dump($addresses); // DEBUG ONLY
	echo $this->Form->create('Customer');?>
	<fieldset>
		<legend><?php echo __('Add Customer'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('organisation_id');
		echo $this->Form->input('prefix',array('options'=>array('Ms'=>'Ms','Miss'=>'Miss','Mrs'=>'Mrs','Mr'=>'Mr','Dr'=>'Dr','Atty'=>'Atty','Prof'=>'Prof','Hon'=>'Hon')));
		echo $this->Form->input('first_name');
		echo $this->Form->input('last_name');
		echo __('<h2>Access Details</h2>');
		echo $this->Form->input('User.username');
		echo $this->Form->input('User.password',array('type'=>'text'));
		echo $this->Form->input('User.access_level',array('options'=>array('User'=>'User','Superuser'=>'Super User')));
		echo $this->Form->input('User.is_suspended',array('label'=>'Suspend access'));
		echo __('<h2>Customer Details</h2>');
		echo $this->Form->input('phone');
		echo $this->Form->input('mobile');
		echo $this->Form->input('fax');
		echo $this->Form->input('email');
		echo $this->Form->input('division');
		echo $this->Form->input('centre');
		echo $this->Form->input('billing_address',array('options' => $addresses));
		echo $this->Form->input('delivery_address',array('options' => $addresses));
		echo $this->Form->input('all_jobs',array('label'=>'Allowed to view all jobs within the organisation'));
		echo $this->Form->input('entire_catalogue',array('label'=>'Allowed to view entire catalogue'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="jobs actions">
	
	<ul>
		<li><?php echo $this->Html->link(__('Return to Organisations'), array('controller' => 'organisations', 'action' => 'view',$this->request->data['Customer']['organisation_id'])); ?> </li>
	</ul>
</div>
