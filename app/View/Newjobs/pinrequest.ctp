<?php
/*
Monash IE Group 30 SO2 - Weng Long pang
Solve Communications
New Jobs View - PUK and PIN Request Form
This page displays the form for PUK and PIN Request
User are required to Fill out the form before submitting.
*/
	// Define the sidebar
	$this->extend('../Common/form');
?>
<?php $this->start('title');?>
	<h2><?php echo __('PUK AND PIN REQUESTS');?></h2>
	<p class="title"><?php echo __('INFORMATION')?></p>
	<p><?php echo __('To Retrieve the PUK / PIN code we require the following details, the mobile number or
SIM serial. The SIM serial is a 9-digit number ending in a N or P, the location of the SIM serial is highlightd
in red on the image below. Pleasse note we will supply the PUK number. Unless manually changed by the user, the PIN
number is he last 4 digits of the PUK code.');?></p>
	<!--The Form goes here-->
<?php echo $this->Html->image('sim.png',array('alt'=>'SIM serial example'));?>
<?php $this->end();?>	
<?php	$this->start('form');
?>
	<fieldset><legend>Mobile Phone Information</legend>
<?php
	echo $this->Form->input('Pinform.mobile',array('label'=>'MOBILE NUMBER'));
	echo $this->Form->input('Pinform.serial',array('label'=>'SIM NUMBER'));
	echo __('<p>Please supply a number other hen the mobile number you are retrieving the PUK / PIN code for above.</p>');
?>
	</fieldset>
	
<?php	$this->end();

?>
	

<div class="actions">

</div>

