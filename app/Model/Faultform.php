<?php
/*
Monash IE Group 30 SO2 - Weng Long Pang
Solve Communications
Fault Lodgement Form Model
This Model governs data validation towards lodge report form (Top of each form)
All form data will be checked aganist validation rules here before further processing
*/
class Faultform extends Customerform{
	// Prevent use of database (cakephp default)
	var $useTable = false;
	// Link to another Models (for validation)
	public $hasOne = 'Customerform';
	/* fault logement form consists of (with data validation rules)
		device		Device Type		text box
		mobile		Mobile Number		text box
		fault		Fault Details		text area
	*/	 
	var $_schema = array(
	'device'		=> array('type'=>'string','length'=>50),
	'mobile'		=> array('type'=>'string','length'=>50),
	'serial'		=> array('type'=>'string','length'=>50),
	'fault'			=> array('type'=>'text'),
	'address'		=> array('type'=>'string'),
);
	
	// Validation Rules go here
	var $validate = array(
	'fault'		=> array(
						 'rule'=>array('minLength',1),
						 'allowEmpty'=>false,
						 'message'=>'This Field is Required'
						 ),
	'device'	=> array(
						 'rule'=>array('minLength',1),
						 'allowEmpty'=>false,
						 'message'=>'This Field is Required'
						 ),
	'mobile'		=> array(
						 'noEmpty'=>array(
										  'rule'=>array('MobileSim',null,'Faultform'),
										  'message'=>'Either Mobile or SIM number is Required'
										  ),
					'number only'=>array(
						'rule'=>array('NumberNull','mobile','Faultform'),
						'message'=>'Only Numeric Value is Allowed'),
					'notLong'=>array(
						'rule'=>array('maxLength',10),
						'message'=>'Maximum Length for Mobile Numer is 10')
						 ),
	'serial'	=> array(
							 'noEmpty'=>array(
										  'rule'=>array('MobileSim',null,'Faultform'),
										  'message'=>'Either Mobile or SIM number is Required'
										  ),
							 'number only'=>array(
							 		'rule'=>array('NumberNull','serial','Faultform'),
							 		'message'=>'Only Numeric Value is Allowed'),
							 'notLong'=>array(
											  'rule'=>array('maxLength',9),
											  'message'=>'SIM Serial is a 9-digit code')
						 	 ),
	
);
	
}
?>
