<div class="customers view">
<?php $this->extend('../Common/sidebar'); ?>

<h2><?php  echo __('Customer');?></h2>
	<dl>
		
		<dt><?php echo __('First Name'); ?></dt>
		<dd>
			<?php echo h($customer['Customer']['first_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Last Name'); ?></dt>
		<dd>
			<?php echo h($customer['Customer']['last_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Username'); ?></dt>
		<dd>-</dd>
		
		<dt><?php echo __('Permission'); ?></dt>
		<dd>
			<?php echo h($customer['Customer']['permission']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $customer['Customer']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $customer['Customer']['id']), null, __('Are you sure you want to delete # %s?', $customer['Customer']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Customers'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Customer'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Organisations'), array('controller' => 'organisations', 'action' => 'index')); ?> </li>
	</ul>
</div>
