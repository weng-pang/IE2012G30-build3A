<?php
/*
Monash IE Group 30 SO2 - Weng Long pang
Solve Communications
New Jobs View - Mobile Phone Repair Form
This page displays the form for Mobile Phone Repair
User are required to Fill out the form before submitting.
*/
	// Define the sidebar
	$this->extend('../Common/form');
?>
<?php $this->start('title');?>
	<h2><?php echo __('Mobile Phone Repair');?></h2>
	<p class="title"><?php echo __('Repair Form')?></p>
	<p><?php echo __('To obtain service on Telstra mobile phone you must retrun this request completed with faulty item. The anticipated turnaround time for all repairs is 3-7 working days from receipt(subject to parts availability - PDA may be longer).');?></p>
	<!--The Form goes here-->
<?php $this->end();?>	
<?php	$this->start('form');

	echo $this->Form->input('Repairform.address',array('label'=>'ADDRESS'));?>
	<fieldset><legend>Mobile Phone Details</legend>
<?php
	echo $this->Form->input('Repairform.mobile',array('label'=>'MOBILE NUMBER'));
	echo $this->Form->input('Repairform.make',array('label'=>'MAKE'));
	echo $this->Form->input('Repairform.model',array('label'=>'MODEL'));
	echo $this->Form->input('Repairform.imei',array('label'=>'IMEI NUMBER'));
	echo $this->Form->input('Repairform.accessories',array('label'=>'ACCESSORIES SENT WITH DEVICE'));
	echo $this->Form->input('Repairform.fault',array('label'=>'FAULT DETAILS'));
?>
	</fieldset>
	<fieldset><legend>Optional Inputs</legend>
<?php
	echo $this->Form->input('Repairform.invoice',array('label'=>'PURCHASE INVOICE NUMBER'));	
	echo $this->Form->input('Repairform.price',array('label'=>'I/WE AUTHORISE REPAIRS UP TO THE VALUE OF'));	

	echo __('<p class="title">TERMS AND CONDITIONS OF ASSESSMENT AND REPAIR</p>');
	echo __('<p>SETTINGS and DATA: Please note that in some case hardware received for repair may loose some or 
all of the user software setting and data in the process of assessment, diagnosis and repair and such settings
and data may not be recoverable. Solve does not accept responsibility for such loss of user settings and data.
Whilst all care will be taken, customers are urged to ensure ALL DATA IS BACKED UP PRIOR TO SUBMITTING THE UNIT IN FOR REPAIR.</p>');
	
	echo $this->Form->input('Repairform.accept',array(
     'type' => 'checkbox',
     'label' => 'I have read and accept the Terms and Conditions'
));
?>
	</fieldset>
	
<?php	$this->end();

?>
	

<div class="actions">

</div>

