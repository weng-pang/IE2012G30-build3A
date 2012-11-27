<?php echo $this->Html->script('jtable.js',false);?>
<div class="addresses index">
<?php $this->extend('../Common/sidebar'); ?>
	<h2><?php echo __('Address Book for '.$organisation['Organisation']['name']); ?></h2>
	<?php //var_dump($addresses); // DEBUG ONLY?>
<?php
	echo $this->Session->flash('bad');
	echo $this->Session->flash('good');
?>
	<table id="data">
    <thead>
	<tr>
        <th>Address</th>
        <th>Suburb</th>        
		<th>State</th>
		<th>Postcode</th>
		<th>Actions</th>
	</tr>
    </thead>
    <tbody>
    <?php foreach ($addresses as $address){ ?>
    	<tr>
    	<?php //var_dump($address); //DEBUG ONLY?>
    		<td><?php echo $address['Address']['address'];?></td>
    		<td><?php echo $address['Address']['suburb'];?></td>
    		<td><?php echo $address['Address']['state'];?></td>
    		<td><?php echo $address['Address']['postcode'];?></td>
    		<td class="actions">
				<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $address['Address']['id'])); ?>
				<?php echo $this->Html->link(__('Delete'), array('action'=>'delete',$address['Address']['id'],$organisation['Organisation']['id']), null, __('Are you sure you want to delete  %s?', $address['Address']['address']));?>
			</td>
    	</tr>	
    <?php }?>
    </tbody>
</table>
</div>
<div class="jobs actions">
	<p><?php
	if ($isStaff){ 
		echo $this->Html->link(__('New Address'),array('action'=>'add',$organisation['Organisation']['id']));}
		else{
		echo $this->Html->link(__('New Address'),array('action'=>'add'));
	} echo $this->Html->link(__('Return'),array('controller'=>'organisations','action'=>'view',$organisation['Organisation']['id']));?></p>
</div>