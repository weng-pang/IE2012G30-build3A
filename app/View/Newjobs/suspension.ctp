<?php
/*
Monash IE Group 30 SO2 - Weng Long pang
Solve Communications
New Jobs View - Service Suspension Form
This page displays the form for Service Suspension
User are required to Fill out the form before submitting.
*/
	// Define the sidebar
	$this->extend('../Common/form');
?>
<?php $this->start('title');?>
	<h2><?php echo __('SERVICE SUSPENSION');?></h2>
	<p class="title"><?php echo __('INFORMATION')?></p>
	<p><?php echo __('There is no fee to suspend usage on a service however you will be required to continue to pay the monthly plan fee.
If you are under a contract term you will continue to be charged the minimum plan fee and other charges(e.g. Handset MRO) while their usage is suspended.
The maximum temporary suspension period is 28 days (note: Every status change is effective as at 12am of the day of the status changed and is effective till 12am on the day the status is changed back.)');?></p>
	<!--The Form goes here-->
<?php $this->end();?>	
<?php	$this->start('form');
?>
	<fieldset><legend>Suspension Details</legend>
<?php
	echo __('Please Supply a number above of other than the number you are suspending.');
	echo $this->Form->input('Suspensionform.mobile',array('label'=>'MOBILE NUMBER'));
	//echo $this->Form->input('Suspensionform.days',array('label'=>'SUSPENSION DAY(S)'));
	//echo $this->Form->input('Suspensionform.date',array('label'=>'SUSPENSION DATE','dateFormat' => 'DMY','minYear' => date('Y') ,'maxYear' => date('Y') + 5,));

?>
	</fieldset>
	<fieldset>
<?php
	echo __('<p class="title">ACKNOWLEDGEMENT</p>');
	echo __('');

	echo $this->Form->input('Suspensionform.accept',array(
     'type' => 'checkbox',
     'label' => 'I have read and accept the Terms and Conidtions'
     ));
?>
	</fieldset>
	
<?php	$this->end();

?>
	

<div class="actions">

</div>

