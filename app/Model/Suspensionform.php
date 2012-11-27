<?php
/*
Monash IE Group 30 SO2 - Weng Long Pang
Solve Communications
Temporary Suspension Form Model
This Model governs data validation towards temporary suspension form (Top of each form)
All form data will be checked aganist validation rules here before further processing
*/
class Suspensionform extends AppModel{
	// Prevent use of database (cakephp default)
	var $useTable = false;
	// Link to another Models (for validation)
	public $hasOne = 'Customerform';
	/* suspension form consists of (with data validation rules)
		mobile		mobile number		normal name
		days		suspension days		number only (no larger than 28 days)
		date		suspension date		date
		accept		Accept T&C			boolean
	*/	 
	var $_schema = array(
	'mobile'		=> array('type'=>'string','length'=>10),

	'accept'	=> array('type'=>'boolean')
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
						 'message'=>'You must accept Terms and Conditions'
						 )
	
);
	
}
?>
