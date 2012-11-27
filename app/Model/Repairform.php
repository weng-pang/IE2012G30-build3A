<?php
/*
Monash IE Group 30 SO2 - Weng Long Pang
Solve Communications
Repair Form Model
This Model governs data validation towards repair form (Top of each form)
All form data will be checked aganist validation rules here before further processing
*/
class Repairform extends AppModel{
	// Prevent use of database (cakephp default)
	var $useTable = false;
	// Link to another Models (for validation)
	public $hasOne = 'Customerform';
	/* cutomer form consists of (with data validation rules)
		make		make		normal name
		model		model		normal name
		IMEI Number	imei		17-digit
		accessories	accessories	text box
		fault details	fault		text box
		invoice number	invoice		number only
		cap price	price		decimal only
		Accept T&C	accept		boolean only
	*/	 
	var $_schema = array(
	'mobie'		=> array('type'=>'string','length'=>10),
	'make'		=> array('type'=>'string','length'=>50),
	'model'		=> array('type'=>'string','length'=>50),
	'imei'		=> array('type'=>'number'),
	'accessories'	=> array('type'=>'text'),
	'fault'		=> array('type'=>'text'),
	'inovice'	=> array('type'=>'number'),
	'price'		=> array('type'=>'decimal'),
	'accept'	=> array('type'=>'boolean'),
	'address'	=> array('type'=>'text')
);
	
	// Validation Rules go here
	var $validate = array(
	'mobile'	=> array(
						'notEmpty'=>array(
								'rule'=>'notempty',
								'message'=>'This Field is Required'),
						'number only'=>array(
								'rule'=>'numeric',
								'message'=>'Only Mobile Number can be entered'),
			),
	'make'		=> array(
						 'rule'=>array('minLength',1),
						 'allowEmpty'=>false,
						 'message'=>'This Field is Required'
						 ),
	'model'		=> array(
						 'rule'=>array('minLength',1),
						 'allowEmpty'=>false,
						 'message'=>'This Field is Required'
						 ),
	'imei'		=> array(
				 		 'validImei'=>array(
									   'rule'=>array('luhn'),
									   'require'=>true,
									   'message'=>'This Field is Entered Incorrectly'
									   ),
						 'number'=>array(
										 'rule'=>array('numeric'),
										 'allowEmpty'=>true,
										 'message'=>'Number Only'
										 ),
						 'notEmpty'=>array(
										  'rule'=>array('minLength',1),
										  'message'=>'This Field is Required'
										  )
						 ),
	'accessories'	=> array(
							 'rule'=>array('minLength',1),
							 'allowEmpty'=>false,
							 'message'=>'This Field is Required'
						 	 ),
	'fault'		=> array(
						 'rule'=>array('minLength',1),
						 'allowEmpty'=>false,
						 'message'=>'This Field is Required'
						 ),
	'invoice'	=> array(
						 'rule'=>array('numeric'),
						 'allowEmpty'=>true,
						 'message'=>'Number Only'
						 ),
	'price'		=> array(
						 'rule'=>array('decimal'),
						 'allowEmpty'=>true,
						 'message'=>'Monetary Value Only'
						 ),
	'accept'	=> array(
						 'rule'=>array('comparison', '!=', 0),
						 'allowEmpty'=>false,
						 'message'=>'You must accept Terms and Conditions'
						 ),
	'address'	=> array('rule'=>array('minLength',1),'message'=>'This Field is Required'),
	
);
	
}
?>
