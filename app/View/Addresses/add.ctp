<?php 
/*
 Monash IE Group 30 SO2 - Weng Long pang
Solve Communications
New Address Form
This page displays the new address form element

*/
//var_dump($organisation); // DEBUG ONLY
// Define the sidebar
	$this->extend('../Common/sidebar');

	echo $this->fetch('title');
	echo $this->Session->flash('bad');
	echo $this->Session->flash('good');
	echo $this->Form->create();
	
?>
	<fieldset><legend>New Address for <?php echo $organisation['Organisation']['name'];?></legend></fieldset>
	<?php
		echo $this->Form->input('organisation_id',array('type'=>'hidden'));
		echo $this->Form->input('address');
		echo $this->Form->input('suburb');
		echo $this->Form->input('state',array('options'=>array('ACT'=>'ACT','NSW'=>'NSW','NT'=>'NT','QLD'=>'QLD','SA'=>'SA','TAS'=>'TAS','VIC'=>'VIC','WA'=>'WA')));
		echo $this->Form->input('postcode');
		echo $this->Form->end(__('Create'));
		?>