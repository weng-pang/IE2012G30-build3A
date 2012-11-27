<div class="freights view">
<?php $this->extend('../Common/sidebar'); ?>
<h2><?php  echo __('Freight');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($freight['Freight']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Freight Cost'); ?></dt>
		<dd>
			<?php echo h($freight['Freight']['freight_cost']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Freight Name'); ?></dt>
		<dd>
			<?php echo h($freight['Freight']['freight_name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Freight'), array('action' => 'edit', $freight['Freight']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Freight'), array('action' => 'delete', $freight['Freight']['id']), null, __('Are you sure you want to delete # %s?', $freight['Freight']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Freights'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Freight'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Orders'), array('controller' => 'orders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Order'), array('controller' => 'orders', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Orders');?></h3>
	<?php if (!empty($freight['Order'])):?>
	<table>
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Order Name'); ?></th>
		<th><?php echo __('Order Quantity'); ?></th>
		<th><?php echo __('Freight Id'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($freight['Order'] as $order): ?>
		<tr>
			<td><?php echo $order['id'];?></td>
			<td><?php echo $order['order_name'];?></td>
			<td><?php echo $order['order_quantity'];?></td>
			<td><?php echo $order['freight_id'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'orders', 'action' => 'view', $order['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'orders', 'action' => 'edit', $order['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'orders', 'action' => 'delete', $order['id']), null, __('Are you sure you want to delete # %s?', $order['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Order'), array('controller' => 'orders', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
