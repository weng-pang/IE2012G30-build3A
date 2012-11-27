<?php echo $this->Html->script('jtable.js',false);?>
<div class="organisations index">
<?php $this->extend('../Common/sidebar'); ?>
	<h2><?php echo __('Organisations'); //var_dump($organisations);?></h2>
	<?php 	
		echo $this->Session->flash('bad');
		echo $this->Session->flash('good');?>
	<table id="data">
	<thead>
		<tr>
			<th><?php echo __('Name');?></th>
			<th><?php echo __('Trading Name');?></th>
			<th><?php echo __('Phone');?></th>
			<th><?php echo __('Price Level');?></th>
			<th><?php echo __('Priority Level');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
		</tr>
	</thead>
	<?php
	foreach ($organisations as $organisation): ?>
	<tr>
		<td><?php echo $this->Html->link(__(h($organisation['Organisation']['name'])), array('action' => 'view', $organisation['Organisation']['id'])); ?>&nbsp;</td>
		<td><?php echo h($organisation['Organisation']['trade_name']); ?>&nbsp;</td>
		<td><?php echo h($organisation['Organisation']['phone']); ?>&nbsp;</td>
		<td><?php echo h($priceLevel[$organisation['Organisation']['price_level_id']]); ?>&nbsp;</td>
		<td><?php echo h($jobPriorities[$organisation['Organisation']['job_priority_id']]); ?>&nbsp;</td>
				<td class="actions">
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $organisation['Organisation']['id'])); ?>
			<?php echo $this->Html->link(__('Phone Access'),'');?>
        	<?php // echo $this->Html->link(__('Address Book'),'');?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
</div>
<div class="organisations actions">

	<ul>
		<li><?php echo $this->Html->link(__('New Organisation'), array('action' => 'add')); ?></li>
	</ul>
</div>
