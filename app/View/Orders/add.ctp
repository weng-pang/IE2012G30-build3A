<div class="orders form">
<?php $this->extend('../Common/sidebar'); ?>
<?php echo $this->Form->create('Order');?>
	<fieldset>
		<legend><?php echo __('Add Order'); ?></legend>
	<?php
		echo $this->Form->input('order_name');
		echo $this->Form->input('order_quantity');
		echo $this->Form->input('freight_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Orders'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Freights'), array('controller' => 'freights', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Freight'), array('controller' => 'freights', 'action' => 'add')); ?> </li>
	</ul>
</div>
