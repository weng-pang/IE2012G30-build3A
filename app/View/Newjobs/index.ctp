<div class="newjobs index">
<?php
/*
Monash IE Group 30 SO2 - Weng Long pang
Solve Communications
New Jobs View - index page
This page displays all avaliable job types for selection.
Once a type is clicked, the proper form will be redirected and displayed to th user.

*/
	// Define the sidebar
	$this->extend('../Common/sidebar');
?>
	<h2><?php echo __('New Helpdesk Request');?></h2>
	<p><?php echo __('What do you request for?')?></p>
	<p><?php echo __('Please Select an Option Below to Continue:');?></p>
	<!--All Links go here-->


<div class="newjobs actions">
<ul>
	<li><?php echo $this->Html->link(__('Mobile Phone Repair'),array('action'=>'repair'));?></li>
	<li><?php echo $this->Html->link(__('Bill Enquiry'),array('action'=>'billenquiry'));?></li>
	<li><?php echo $this->Html->link(__('International Roaming'),array('action'=>'roaming'));?></li>
	<li><?php echo $this->Html->link(__('Service Cancellation'),array('action'=>'cancellation'));?></li>
	<li><?php echo $this->Html->link(__('Temporary Suspension'),array('action'=>'suspension'));?></li>
	<li><?php echo $this->Html->link(__('Lodge a Fault'),array('action'=>'fault'));?></li>
	<li><?php echo $this->Html->link(__('PUK AND PIN Request'),array('action'=>'pinrequest'));?></li>
	<li><?php echo $this->Html->link(__('SIM Replacement'),array('action'=>'simreplacement'));?></li>

</ul>
</div>

</div>