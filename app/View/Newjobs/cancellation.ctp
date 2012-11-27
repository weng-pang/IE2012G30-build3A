<?php
/*
Monash IE Group 30 SO2 - Weng Long pang
Solve Communications
New Jobs View - Service Cancellation Form
This page displays the form for Service Cancellation
User are required to Fill out the form before submitting.
*/
	// Define the sidebar
	$this->extend('../Common/form');
?>
<?php $this->start('title');?>
	<h2><?php echo __('SERVICE CANCELLATION');?></h2>
	<p class="title"><?php echo __('INFORMATION')?></p>
	<p><?php echo __('Please be aware if this service is currently under contract and you wish to cancel the service during the minimum contract term and Early Termination Charge (ETC) will apply.');?></p>
	<!--The Form goes here-->
<?php $this->end();?>	
<?php	$this->start('form');
?>
	<fieldset><legend>Cancellation Details</legend>
<?php
	echo __('Please Supply a number above of other than the number you are cancelling.');
	echo $this->Form->input('Cancellationform.mobile',array('label'=>'MOBILE NUMBER'));
	//echo $this->Form->input('Cancellationform.date',array('label'=>'CANCELLATION DATE','dateFormat' => 'DMY','minYear' => date('Y') ,'maxYear' => date('Y') + 5,));
?>
	</fieldset>
	<fieldset>
<?php
	echo __('<p class="title">ACKNOWLEDGEMENT</p>');
	echo __('ETC Warning');


	echo $this->Form->input('Cancellationform.agree',array('label' => 'Please notify me of any charges prior to cancellation'));
	echo $this->Form->input('Cancellationform.accept',array('label' => 'I accept all charges that are the result of cancelling this service'));
?>
	</fieldset>
	
<?php	$this->end();

?>
	

<div class="actions">

</div>

