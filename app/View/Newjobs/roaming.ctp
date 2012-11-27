<?php
/*
Monash IE Group 30 SO2 - Weng Long pang
Solve Communications
New Jobs View - Internation Roaming Form
This page displays the form for Internation Roaming
User are required to Fill out the form before submitting.
*/
	// Define the sidebar
	$this->extend('../Common/form');
?>
<?php $this->start('title');?>
	<h2><?php echo __('International Roaming');?></h2>
	<p class="title"><?php echo __('Internation Request Form')?></p>
	<p><?php echo __('');?></p>
	<!--The Form goes here-->
<?php $this->end();?>	
<?php	$this->start('form');
?>
	<fieldset><legend>Mobile Phone Information</legend>
<?php
	echo $this->Form->input('Roamingform.mobile',array('label'=>'MOBILE NUMBER'));
	echo $this->Form->input('Roamingform.serial',array('label'=>'SIM Number'));
	echo $this->Form->input('Roamingform.countries',array('label'=>'COUNTRIES WILL THE USER BE VISITING'));
	echo $this->Form->input('Roamingform.handset',array('label'=>'HANDSET WILL BE USED WHILE ROAMING'));
	echo $this->Html->link('Click here to view Telstras international roaming pricing breakdwon per country','http://www.telstra.com.au/business-enterprise/business-products/mobiles/international-roaming/pricing-compatibility/', array('target' => '_blank'));
?>
	</fieldset>
	<p class="title">INTERNATIONAL ROAMING VOICE PACK</P>
	<P>This pack consists of the following:<br>
	- A set monthly allowance to use towards voice calls and SMS messages sent and received in all international destinations where roaming is available.<br>
	- A discount on all voice calls and SMS messages sent and received using your Telstra post-paid mobile in selected international destinations.<br>
	- Please note that they are not supported in all countries.</p>
	<p><?php echo $this->Html->link('Click here to view Telstras international roaming voice pack','http://www.telstra.com.au/business-enterprise/business-products/mobiles/international-roaming/pricing-compatibility/#tab-voice-plans', array('target' => '_blank'));?></p>
	
	<fieldset>
<?php
	echo $this->Form->label('voice','INTERNATIONAL ROAMING VOICE PACK');
	echo $this->Form->radio('voice',array('0'=>'No Voice Roaming Pack','15'=>'$15 per month','100'=>'$100 per month'),array('value'=>'0'));
?>
	</fieldset>
	<p class="title">INTERNATIONAL ROAMING DATA PACK</p>
	<p>International Roaming Data Racks are ideal for infrequent travellers and are a great way to send and receive emails,
documents or to access the internet while overseas.<br>
With your chosen International Roaming Data Pack, for a once-off charge you get an allownace towards access, connection 
and data usage in selected countries for 30 days.</p>
	<p><?php echo $this->Html->link('Click here to view Telstras international roaming data packs','http://www.telstra.com.au/business-enterprise/business-products/mobiles/international-roaming/pricing-compatibility/#tab-data-packs', array('target' => '_blank'));?></p>

<p>You can choose from the following International Roaming Data Packs:</p>
	<fieldset>
<?php
	echo $this->Form->label('pack','INTERNATIONAL ROAMING Data PACK');
	echo $this->Form->radio('pack',array('0'=>'No Data Roaming Pack','29'=>'$29 Pack - $150 ALLOWANCE','85'=>'$85 Pack - $450 ALLOWANCE','160'=>'$160 Pack - $900 ALLOWANCE','350'=>'$350 Pack - $2,250 ALLOWANCE','550'=>'$550 Pack - $3,750 ALLOWANCE','1050'=>'$1050 Pack - $7,500 ALLOWANCE','1800'=>'$1800 Pack - $15,000 ALLOWANCE'),array('value'=>'0'));
?>
	</fieldset>
	<p class="title">INTERNATIONAL ROAMING DATA PLAN</p>
	<p>The international Roaming Data Plans are a great way of staying connected to email, using data applications on your mobile device, and 
getting internet access on your computer when overseas. With these plans, you simply pay a monthy fee to get a monthly allowance. This allowance is then used 
towards eligible data usage on yout Telstra post-paid mobile or Telstra Mobile Broadband service in eligible countries.</p>
	<p><?php echo $this->Html->link('Click here to view Telstras international roaming data plans','http://www.telstra.com.au/business-enterprise/business-products/mobiles/international-roaming/pricing-compatibility/#tab-data-plans', array('target' => '_blank'));?></p>

<p>You can choose from the following International Roaming Data Packs:</p>
	<fieldset>
<?php
	echo $this->Form->label('plan','INTERNATIONAL ROAMING Data PLAN');
	echo $this->Form->radio('plan',array('0'=>'No Data Roaming Plan','29'=>'$29 Plan - $150 ALLOWANCE','85'=>'$85 Plan - $450 ALLOWANCE','160'=>'$160 Plan - $900 ALLOWANCE','350'=>'$350 Plan - $2,250 ALLOWANCE','550'=>'$550 Plan - $3,750 ALLOWANCE','1050'=>'$1050 Plan - $7,500 ALLOWANCE','1800'=>'$1800 Plan - $15,000 ALLOWANCE'),array('value'=>'0'));
?>
	</fieldset>
<?php	echo __('<p class="title">TERMS AND CONDITIONS OF INTERNATIONAL ROAMING</p>');?>
	<fieldset>
<?php
	echo __('Please note that if there is no international roaming data pack / plan applied, you are in a non-supported country or exceed the data pack / plan you
will be charged at the PAYG rate for International Roaming data at $0.015 per KB($15.36 per MB). In addition, there is a 50 cent connection fee for each data session initiated by your device. 
The international roaming data pack / plan are not supported in all countries. Please refer to the Telstra links above and read the full terms and conditions to ensure you select the correct data plan / pack for you needs.');
?>
	<p><?php echo $this->Html->link('Click here to view Telstra PAYG data charge','http://www.telstra.com.au/business-enterprise/business-products/mobiles/international-roaming/pricing-compatibility/#tab-data-payg', array('target' => '_blank'));?></p>
<?php
	echo $this->Form->input('Roamingform.accept',array('label' => 'I have read and accept the Terms and Conditions'));
?>
	</fieldset>
	
<?php	$this->end();

?>
<div class="actions">

</div>

