<div class="organisations form">
<?php $this->extend('../Common/sidebar'); 
	//var_dump($freights);
	//var_dump($priceLevels);?>
<?php echo $this->Form->create('Organisation');?>
	<fieldset>
		<legend><?php echo __('Edit Organisation'); ?></legend>
	<?php
		//echo $this->Form->input('id');
		echo $this->Session->flash();
		//echo $this->Session->flash();
		//var_dump($jobPriorities);
		echo $this->Form->input('name');
		//echo $this->Form->input('pricing_level');
		//echo $this->Form->input('job_priority',array('name'=>'data[Organisation][priority]','default'=>$organisation['Organisation']['priority']));
		echo $this->Form->input('trade_name',array('label'=>'Trading Name'));
		echo $this->Form->input('address');
		echo $this->Form->input('suburb');
		echo $this->Form->input('state',array('options'=>array('ACT'=>'ACT','NSW'=>'NSW','NT'=>'NT','QLD'=>'QLD','SA'=>'SA','TAS'=>'TAS','VIC'=>'VIC','WA'=>'WA')));
		echo $this->Form->input('postcode');
		echo $this->Form->input('phone');
		echo $this->Form->input('e-mail');
		echo $this->Form->input('staff_id');
		echo $this->Form->input('address_book',array('label'=>'Delivery Address Acces'));
		
		echo $this->Form->input('trackable',array('label'=>'Traceable Helpdesk Job'));
		echo $this->Form->input('helpdesk_sla',array('label'=>'Helpdesk Job Response (Hours)'));
		echo $this->Form->input('procurement_sla',array('label'=>'Purchase Response (Hours)'));
		echo $this->Form->input('freight_id',array('label'=>'Default Freight Charge'));
		echo $this->Form->input('freight_cost',array('label'=>'Overwritten Freight Charge'));
		echo $this->Form->input('job_priority_id',array('label'=>'Priority Level'));
		echo $this->Form->input('price_level_id',array('label'=>'Default Price Level'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="jobs actions">
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Organisation.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Organisation.id'))); ?></li>
		<li><?php echo $this->Html->link(__('Return'), array('action' => 'index'));?></li>

	</ul>
</div>
