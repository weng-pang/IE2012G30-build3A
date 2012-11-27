<?php
/*
Monash IE Group 30 SO2 - Weng Long Pang
Solve Communications
Price Level Model
This Model governs data storage towards price levels 
All form data will be checked aganist validation rules here before further processing
*/
class PriceLevel extends AppModel{
	/* price level consists of (with data validation rules)
		price_level			Price Level Name		normal name
		discount_level		Discount Level			Percentage (decimal)
	*/	 
	
	// Validation Rules go here
	var $validate = array(
	'price_level'		=> array(
						 'rule'=>array('minLength',1),
						 'allowEmpty'=>false,
						 'message'=>'This Field is Required'
						 ),
	'discount_level'	=> array(
						 'rule'=>array('minLength',1),
						 'allowEmpty'=>false,
						 'message'=>'This Field is Required'
						 ),
	
);
	
	// Price Level applies to each organisation
	var $hasMany = array(
						   'Organisation'=>array(
												 'className'=>'Organisation'));
	
}
?>
