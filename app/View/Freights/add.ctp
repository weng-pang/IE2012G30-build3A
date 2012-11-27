<div class="freights form">
<?php $this->extend('../Common/sidebar'); ?>
<?php echo $this->Form->create('Freight');?>
	<fieldset>
		<legend><?php echo __('Add Freight'); ?></legend>
	<?php
		echo $this->Form->input('freight_cost');
		echo $this->Form->input('freight_name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<ul>

		<li><?php echo $this->Html->link(__('List All'), array('action' => 'index'));?></li>
		<!--<li><?php echo $this->Html->link(__('List Orders'), array('controller' => 'orders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Order'), array('controller' => 'orders', 'action' => 'add')); ?> </li>-->
	</ul>
</div>
