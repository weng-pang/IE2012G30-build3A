<?php
/*
Monash IE Group 30 SO2 - Weng Long Pang
Solve Communications
International Roaming Request Form Model
This Model governs data validation towards international roaming request form (Top of each form)
All form data will be checked aganist validation rules here before further processing
*/
class Roamingform extends Customerform{
	// Prevent use of database (cakephp default)
	var $useTable = false;
	// Link to another Models (for validation)
	public $hasOne = 'Customerform';
	/* roaming form consists of (with data validation rules)
		mobile		mobile number			text box
		countries	intended countries		text area
		handset		intended handset		text box
		voice		voice pack				selection
		pack		data pack				either data pack or plan is selected (by controller)
		plan		data plan
		accept		accept T & C			boolean
	*/	 
	var $_schema = array(
	'mobile'		=> array('type'=>'string','length'=>10),
	'countries'		=> array('type'=>'text'),
	'handset'		=> array('type'=>'string','length'=>50),
	'accept'		=> array('type'=>'boolean'),
	'serial'		=> array('tpye'=>'string','length'=>9),
);
	
	// Validation Rules go here
	var $validate = array(
	'mobile'		=> array(
						 'noEmpty'=>array(
										  'rule'=>array('MobileSim',null,'Roamingform'),
										  'message'=>'Either Mobile or SIM number is Required'
										  ),
					'number only'=>array(
						'rule'=>array('NumberNull','mobile','Roamingform'),
						'message'=>'Only Numeric Value is Allowed'),
					'notLong'=>array(
						'rule'=>array('maxLength',10),
						'message'=>'Maximum Length for Mobile Numer is 10')
						 ),
	'serial'	=> array(
							 'noEmpty'=>array(
										  'rule'=>array('MobileSim',null,'Roamingform'),
										  'message'=>'Either Mobile or SIM number is Required'
										  ),
							 'number only'=>array(
							 		'rule'=>array('NumberNull','serial','Roamingform'),
							 		'message'=>'Only Numeric Value is Allowed'),
							 'notLong'=>array(
											  'rule'=>array('maxLength',9),
											  'message'=>'SIM Serial is a 9-digit code')
						 	 ),
	'countries'		=> array(
						 'rule'=>array('minLength',1),
						 'allowEmpty'=>false,
						 'message'=>'This Field is Required'
						 ),
	'handset'	=> array(
							 'rule'=>array('minLength',1),
							 'allowEmpty'=>false,
							 'message'=>'This Field is Required'
						 	 ),
	'accept'	=> array(
						 'rule'=>array('comparison', '!=', 0),
						 'allowEmpty'=>false,
						 'message'=>'You must accept Terms and Conditions'
						 )
	
);
	
}
?>
