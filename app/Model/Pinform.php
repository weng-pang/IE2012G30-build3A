<?php
/*
Monash IE Group 30 SO2 - Weng Long Pang
Solve Communications
PIN AND PUK Request Form Model
This Model governs data validation towards PIN and PUK form (Top of each form)
All form data will be checked aganist validation rules here before further processing
*/
class Pinform extends Customerform{
	// Prevent use of database (cakephp default)
	var $useTable = false;
	var $name = 'Pinform';
	// Link to another Models (for validation)
	public $hasOne = 'Customerform';
	/* cutomer form consists of (with data validation rules)
		mobile		Mobile Number			text box
		serial		SIM serial Number		text box (10 characters)
	*/	 
	var $_schema = array(
	'mobile'		=> array('type'=>'string','length'=>50),
	'serial'		=> array('type'=>'string','length'=>50)
);
	
	// Validation Rules go here
	var $validate = array(
	'mobile'		=> array(
						 'noEmpty'=>array(
										  'rule'=>array('MobileSim',null,'Pinform'),
										  'message'=>'Either Mobile or SIM number is Required'
										  ),
					'number only'=>array(
						'rule'=>array('NumberNull','mobile','Pinform'),
						'message'=>'Only Numeric Value is Allowed'),
					'notLong'=>array(
						'rule'=>array('maxLength',10),
						'message'=>'Maximum Length for Mobile Numer is 10')
						 ),
	'serial'	=> array(
							 'noEmpty'=>array(
										  'rule'=>array('MobileSim',null,'Pinform'),
										  'message'=>'Either Mobile or SIM number is Required'
										  ),
							 'number only'=>array(
							 		'rule'=>array('NumberNull','serial','Pinform'),
							 		'message'=>'Only Numeric Value is Allowed'),
							 'notLong'=>array(
											  'rule'=>array('maxLength',9),
											  'message'=>'SIM Serial is a 9-digit code')
						 	 ),
	
);

	
}
?>
