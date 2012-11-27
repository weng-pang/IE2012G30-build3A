<?php
/*
Monash IE Group 30 SO2 - Weng Long pang
Solve Communications
New Jobs View - Fault Form
This page displays the form for Fault Notification
User are required to Fill out the form before submitting.
*/
	// Define the sidebar
	$this->extend('../Common/form');
?>
<?php $this->start('title');?>
	<h2><?php echo __('LODGE A FAULT');?></h2>
	<p class="title"><?php echo __('INFORMATION')?></p>
	<p><?php echo __('');?></p>
	<!--The Form goes here-->
<?php $this->end();?>	
<?php	$this->start('form');
?>
	<fieldset><legend>Fault Information</legend>
<?php
	echo $this->Form->input('Faultform.device',array('label'=>'TYPE OF DEVICE'));
	echo $this->Form->input('Faultform.mobile',array('label'=>'MOBILE NUMBER'));
	echo $this->Form->input('Faultform.serial',array('label'=>'SIM NUMBER'));
	echo $this->Form->input('Faultform.fault',array('label'=>'PROBLEM/FAULT DESCRIPTION'));
	echo $this->Form->input('Faultform.address',array('label'=>'ADDRESS (CONNECTION ISSUES ONLY)'))
?>
	</fieldset>
	
<?php	$this->end();

?>
	

<div class="actions">

</div>

