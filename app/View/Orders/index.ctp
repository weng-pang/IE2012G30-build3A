<div class="orders index">
<?php $this->extend('../Common/sidebar'); ?>
	<h2><?php echo __('Orders');?></h2>
	<table>
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('order_name');?></th>
			<th><?php echo $this->Paginator->sort('order_quantity');?></th>
			<th><?php echo $this->Paginator->sort('freight_cost');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($orders as $order): ?>
	<tr>
		<td><?php echo h($order['Order']['id']); ?>&nbsp;</td>
		<td><?php echo h($order['Order']['order_name']); ?>&nbsp;</td>
		<td><?php echo h($order['Order']['order_quantity']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($order['Freight']['freight_cost'], array('controller' => 'freights', 'action' => 'view', $order['Freight']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $order['Order']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $order['Order']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $order['Order']['id']), null, __('Are you sure you want to delete %s?', $order['Order']['order_name'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>

	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Order'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Freights'), array('controller' => 'freights', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Freight'), array('controller' => 'freights', 'action' => 'add')); ?> </li>
	</ul>
</div>
