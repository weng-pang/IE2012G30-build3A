<?php
/*
Monash IE Group 30 SO2 - Weng Long Pang
Solve Communications
SIM Request Form Model
This Model governs data validation towards SIM card replacement form (Top of each form)
All form data will be checked aganist validation rules here before further processing
*/
class Simform extends AppModel{
	// Prevent use of database (cakephp default)
	var $useTable = false;
	// Link to another Models (for validation)
	public $hasOne = 'Customerform';
	/* cutomer form consists of (with data validation rules)
		mobile			Mobile Number				text box
		oldserial		OLD SIM serial Number		text box (10 characters)
		newserial		NEW SIM serial Number		text box (10 characters)
	*/	 
	var $_schema = array(
	'mobile'		=> array('type'=>'string','length'=>50),
	'oldserial'		=> array('type'=>'string','length'=>50),
	'newserial'		=> array('type'=>'string','length'=>50),
	'address'		=> array('type'=>'string','length'=>100),
);
	
	// Validation Rules go here
	var $validate = array(
	'mobile'		=> array(
						 'noEmpty'=>array(
										  'rule'=>array('minLength',1),
										  'message'=>'This Field is Required'
										  )
						 ),
	'oldserial'	=> array(
							 'noEmpty'=>array(
										  'rule'=>array('minLength',1),
										  'message'=>'This Field is Required'
										  ),
							 'notLong'=>array(
											  'rule'=>array('maxLength',9),
											  'message'=>'SIM Serial is a 9-digit code.')
						 	 ),
	'newserial'	=> array(
							 'noEmpty'=>array(
										  'rule'=>array('minLength',1),
										  'message'=>'This Field is Required'
										  ),
							 'notLong'=>array(
											  'rule'=>array('maxLength',9),
											  'message'=>'SIM Serial is a 9-digit code.')
						 	 ),
);
	
}
?>
