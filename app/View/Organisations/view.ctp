<?php echo $this->Html->script('jtable.js',false);?>
<div class="organisations view">
<?php $this->extend('../Common/sidebar'); ?>
<h3><?php 
	echo __('Information for '.$organisation['Organisation']['name']);?></h3>
    <?php echo $this->Session->flash('good'); ?>
	<dl>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($organisation['Organisation']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Trading Name'); ?></dt>
		<dd>
			<?php echo h($organisation['Organisation']['trade_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Address'); ?></dt>
		<dd>
			<?php echo h($organisation['Organisation']['address']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Suburb'); ?></dt>
		<dd>
			<?php echo h($organisation['Organisation']['suburb']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('State'); ?></dt>
		<dd>
			<?php echo h($organisation['Organisation']['state']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Postcode'); ?></dt>
		<dd>
			<?php echo h($organisation['Organisation']['postcode']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Phone'); ?></dt>
		<dd>
			<?php echo h($organisation['Organisation']['phone']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Default Handling Staff'); ?></dt>
		<dd>
			<?php echo h($staffs[$organisation['Organisation']['staff_id']]); ?>
			&nbsp;
		</dd>
        <dt><?php echo __('Priority'); ?></dt>
		<dd>
			<?php echo h($jobPriorities[$organisation['Organisation']['job_priority_id']]); ?>
			&nbsp;
		</dd>
        <dt><?php echo __('Price Level'); ?></dt>
		<dd>
			<?php echo h($priceLevels[$organisation['Organisation']['price_level_id']]); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Edit '.$organisation['Organisation']['name']), array('action' => 'edit', $organisation['Organisation']['id'])); ?> </li>
        <li><?php echo $this->Html->link(__('Phone Access'),'');?></li>
        <li><?php echo $this->Html->link(__('Address Book'),array('controller' => 'addresses', 'action' => 'index',(int)$organisation['Organisation']['id'] ));?></li>
        <li><?php echo $this->Html->link(__('New Customer'), array('controller' => 'customers', 'action' => 'add',(int)$organisation['Organisation']['id']));?> </li>
		<li><?php echo $this->Form->postLink(__('Delete '.$organisation['Organisation']['name']), array('action' => 'delete', $organisation['Organisation']['id']), null, __('Are you sure you want to delete %s?', $organisation['Organisation']['name'])); ?> </li>

		
	</ul>
</div>
<br />
<div class="related">

	<?php if (!empty($organisation['Customer'])):?>
	<table id="data">
	<thead>
	<tr>
		<th><?php echo __(''); ?></th>
		<th><?php echo __('First Name'); ?></th>
		<th><?php echo __('Last Name'); ?></th>
        <th><?php echo __('Username'); ?></th>
		<th><?php echo __('Permission'); ?></th>
        <th><?php echo __('Suspended'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	</thead>
	<tbody>
	<?php
	//var_dump($organisation['Customer']); // DEBUG ONLY
		$i = 0;
		foreach ($organisation['Customer'] as $customer): ?>
		<tr>
			<td><?php echo $customer['prefix']; ?></td>
			<td><?php echo $customer['first_name'];?></td>
			<td><?php echo $customer['last_name'];?></td>
            <td><?php echo $customer['User']['username']; ?></td>
			<td><?php echo $customer['User']['access_level'];?></td>
            <td><?php echo ($customer['User']['is_suspended']) ? 'Yes':'No';?></td>
			<td class="actions">
            	<?php echo $this->Html->link(__('Edit'), array('controller' => 'customers', 'action' => 'edit', $customer['id'],$organisation['Organisation']['id'])); ?>
			<?php //echo $this->Html->link(__('Delete'),array('controller'=>'customers','action'=>'delete',$customer['id']),null,__('Are you sure you want to delete %s?', $customer['first_name']));?>
                <?php echo $this->Html->link(__('Phone Access'),'');?>
			</td>
		</tr>
	<?php endforeach; ?>
	</tbody>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
		</ul>
	</div>
</div>
