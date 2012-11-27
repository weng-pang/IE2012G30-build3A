<?php
/*
Monash IE Group 30 SO2 - Weng Long pang
Solve Communications
New Jobs View - SIM Replacement Form
This page displays the form for SIM Replacement
User are required to Fill out the form before submitting.
*/
	// Define the sidebar
	$this->extend('../Common/form');
?>
<?php $this->start('title');?>
	<h2><?php echo __('PUK AND PIN REQUESTS');?></h2>
	<p class="title"><?php echo __('INFORMATION')?></p>
	<p><?php echo __('To complete the SIM Replacement we require the mobile nubmer, new and old SIM serial. The SIM serial is a 9-digit number ending in a N or P, the location of the SIM serial is highlightd
in red on the image below. Pleasse note we will supply the PUK number.');?></p>
	<!--The Form goes here-->
<?php echo $this->Html->image('sim.png',array('alt'=>'SIM serial example'));?>
<?php $this->end();?>	
<?php	$this->start('form');
?>
	<fieldset><legend>Mobile Phone Information</legend>
<?php
	echo $this->Form->input('Simform.mobile',array('label'=>'MOBILE NUMBER'));
	echo $this->Form->input('Simform.oldserial',array('label'=>'OLD SIM SERIAL'));
	echo $this->Form->input('Simform.newserial',array('label'=>'NEW SIM SERIAL'));
	echo __('<p>Please supply a number other hen the mobile number you are retrieving the PUK / PIN code for above.</p>');
?>
	</fieldset>
	
<?php	$this->end();

?>
	

<div class="actions">

</div>

