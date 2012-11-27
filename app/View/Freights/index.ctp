<?php echo $this->Html->script('jtable.js',false);?>
<div class="freights index">
<?php $this->extend('../Common/sidebar'); ?>
	<h2><?php echo __('Freights');?></h2>
	<table id="data">
	<thead>
	<tr>
			<th><?php echo __('Freight');?></th>
			<th><?php echo __('Cost');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	</thead>
	<?php
	foreach ($freights as $freight): ?>
	<tr>
		<td><?php echo __(h($freight['Freight']['freight_name']));//$this->Html->link(__(h($freight['Freight']['freight_name'])), array('action' => 'view', $freight['Freight']['id'])); ?>&nbsp;</td>
		<td>$<?php echo h($freight['Freight']['freight_cost']); ?>&nbsp;</td>
		
		<td class="actions">
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $freight['Freight']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $freight['Freight']['id']), null, __('Are you sure you want to delete  %s?', $freight['Freight']['freight_name'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	
</div>
<div class="jobs actions">
	<ul>
		<li><?php echo $this->Html->link(__('New'), array('action' => 'add')); ?></li>
		<!--<li><?php echo $this->Html->link(__('List Orders'), array('controller' => 'orders', 'action' => 'index')); ?> </li>-->
		<!--<li><?php echo $this->Html->link(__('New Order'), array('controller' => 'orders', 'action' => 'add')); ?> </li>-->
	</ul>
</div>
