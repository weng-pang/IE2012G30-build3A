<div class="orders view">
<?php $this->extend('../Common/sidebar'); ?>
<h2><?php  echo __('Order');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($order['Order']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Order Name'); ?></dt>
		<dd>
			<?php echo h($order['Order']['order_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Order Quantity'); ?></dt>
		<dd>
			<?php echo h($order['Order']['order_quantity']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Freight'); ?></dt>
		<dd>
			<?php echo $this->Html->link($order['Freight']['freight_cost'], array('controller' => 'freights', 'action' => 'view', $order['Freight']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Order'), array('action' => 'edit', $order['Order']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Order'), array('action' => 'delete', $order['Order']['id']), null, __('Are you sure you want to delete # %s?', $order['Order']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Orders'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Order'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Freights'), array('controller' => 'freights', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Freight'), array('controller' => 'freights', 'action' => 'add')); ?> </li>
	</ul>
</div>
