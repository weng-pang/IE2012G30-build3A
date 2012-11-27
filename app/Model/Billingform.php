<?php
/*
Monash IE Group 30 SO2 - Weng Long Pang
Solve Communications
Billing Enquiry Form Model
This Model governs data validation towards billing enquiry form (Top of each form)
All form data will be checked aganist validation rules here before further processing
*/
class Billingform extends AppModel{
	// Prevent use of database (cakephp default)
	var $useTable = false;
	// Link to another Models (for validation)
	public $hasOne = 'Customerform';
	/* billing enquiry form consists of (with data validation rules)
		account		account number		normal name
		amount		request amount		monetary value
		details		description			text area
		accept		Accept T&C			boolean only
	*/	 
	var $_schema = array(
	'account'		=> array('type'=>'string','length'=>50),
	'amount'		=> array('type'=>'decimal'),
	'details'		=> array('type'=>'text'),
	'accept'		=> array('type'=>'boolean'),
	'mobile'		=> array('type'=>'string','length'=>10),
);
	
	// Validation Rules go here
	var $validate = array(
			'mobile'		=> array(
					'number only'=>array(
							'rule'=>array('NumberNull','mobile','Roamingform'),
							'message'=>'Only Mobile Number is Allowed'),
					'notLong'=>array(
							'rule'=>array('maxLength',10),
							'message'=>'Maximum Length for Mobile Numer is 10')
			),
	'account'		=> array(
					'not empty'=>array(
							'rule'=>'notempty',
							'message'=>'This Field is Required'),
					'number only'=>array(
							'rule'=>'numeric',
							'message'=>'Only Account Number is Accepted'),
						 ),
	'details'		=> array(
						 'rule'=>array('minLength',1),
						 'allowEmpty'=>false,
						 'message'=>'This Field is Required'
						 ),
	'amount'		=> array(
						 'rule'=>array('decimal'),
						 'allowEmpty'=>false,
						 'message'=>'Monetary Value Only'
						 ),
	'accept'	=> array(
						 'rule'=>array('comparison', '!=', 0),
						 'allowEmpty'=>false,
						 'message'=>'You must accept Terms and Conditions'
						 )
	
);
	
}
?>
