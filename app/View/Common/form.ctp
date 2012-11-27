<?php
/*
Monash IE Group 30 SO2 - Weng Long pang
Solve Communications
New Jobs View - Generic Form
This page displays the common form element
All forms have shared identical elements.
*/
	// Define the sidebar
	$this->extend('../Common/sidebar');
?>
	<!--The Form goes here-->
	
<?php	
	echo $this->fetch('title');
	echo $this->Session->flash('bad');	
	echo $this->Session->flash('good');
	echo $this->Form->create();
?>
	<fieldset><legend>Customer Information</legend>
<?php

	// for Staff only: selection of organisation
	
	$organisations[0]='';
	ksort($organisations);
	//var_dump($organisations);
	if ($isStaff){
		// For Build 3: javascript use for refreshing the address table (select bar)
		//echo $this->Form->input('Customerform.select',array('label'=>'Select an organisation or use fields below to overwrite','type'=>'select','options'=>$organisations,'onchange'=>'alert("The ADDRESS BAR!");'));
		echo $this->Form->input('Customerform.select',array('label'=>'Select an organisation or use fields below to overwrite','type'=>'select','options'=>$organisations,));
	}
	// 	for general form only
	echo $this->Form->input('Customerform.company',array('label'=>'COMPANY NAME'));
	echo $this->Form->input('Customerform.name',array('label'=>'CONTACT NAME'));
	echo $this->Form->input('Customerform.contact',array('label'=>'CONTACT NUMBER'));
	echo $this->Form->input('Customerform.email',array('label'=>'EMAIL ADDRESS'));
	

?>	</fieldset>
<?php	echo $this->fetch('form'); // individual form elememts go here
	echo $this->Form->end('Submit');

?>
<p><br /></p>
<div class="actions">

</div>

