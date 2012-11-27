<div class="freights form">
<?php $this->extend('../Common/sidebar'); ?>
<?php echo $this->Form->create('Freight');?>
	<fieldset>
		<legend><?php echo __('Edit Freight'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('freight_cost');
		echo $this->Form->input('freight_name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">

	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Freight.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Freight.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List All'), array('action' => 'index'));?></li>
	</ul>
</div>
