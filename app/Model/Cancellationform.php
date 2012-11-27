<?php
/*
Monash IE Group 30 SO2 - Weng Long Pang
Solve Communications
Service Cancellation Form Model
This Model governs data validation towards service cancellation form (Top of each form)
All form data will be checked aganist validation rules here before further processing
*/
class Cancellationform extends AppModel{
	// Prevent use of database (cakephp default)
	var $useTable = false;
	// Link to another Models (for validation)
	public $hasOne = 'Customerform';
	/* cancellation form consists of (with data validation rules)
		mobile		mobile number			normal name
		date		cancellation date		date
		accept		Accept T&C				boolean
		agree		Agree ETC effects		boolean
	*/	 
	var $_schema = array(
	'mobile'	=> array('type'=>'string','length'=>10),
	'accept'	=> array('type'=>'boolean'),
	'agree'		=> array('type'=>'boolean')
);
	
	// Validation Rules go here
	var $validate = array(
	'mobile'		=> array(
						'notEmpty'=>array(
								'rule'=>'notempty',
								'message'=>'This Field is Required'),
						'number only'=>array(
								'rule'=>'numeric',
								'message'=>'Only Mobile Number can be entered'),
						 ),

	'accept'	=> array(
						 'rule'=>array('comparison', '!=', 0),
						 'allowEmpty'=>false,
						 'message'=>'You must accept All Statement'
						 ),
	'agree'	=> array(
						 'rule'=>array('comparison', '!=', 0),
						 'allowEmpty'=>false,
						 'message'=>'You must accept All Statements'
						 )
	
);
	
}
?>
