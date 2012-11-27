<?php
/*
Monash IE Group 30 SO2 - Weng Long pang
Solve Communications
New Jobs View - Billing Equiry Form
This page displays the form for Bill Enquiry
User are required to Fill out the form before submitting.
*/
	// Define the sidebar
	$this->extend('../Common/form');
?>
<?php $this->start('title');?>
	<h2><?php echo __('Billing Enquiry');?></h2>
	<p class="title"><?php echo __('Bill Enquiry Form')?></p>
	<p><?php echo __('');?></p>
	<!--The Form goes here-->
<?php $this->end();?>	
<?php	$this->start('form');
?>
	<fieldset><legend>Bill Information</legend>
<?php
	echo $this->Form->input('Billingform.account',array('label'=>'ACCOUNT NUMBER'));
	echo $this->Form->input('Billingform.amount',array('label'=>'REQUEST AMOUNT'));
?>
	</fieldset>
	<fieldset><legend>Information</legend>
<?php
	echo __('<p>Please supply a detailed reason of why the credit is applicable and how the amount was calculated / determined. 
If this form is submitted with unclear / missing details. It will not be processed. Please note that this application is subject to 
approval by Telstra and you will be notified of the outcome once the process is completed.</p>');
	echo $this->Form->input('Billingform.details',array('label'=>'DESCRIPTION'));
	echo __('');
	
	echo $this->Form->input('Billingform.accept',array('label' => 'I confirm the information provided by me on this form is ture and correct'
));
?>
	</fieldset>
	
<?php	$this->end();

?>
<div class="actions">

</div>

