<?php
/*
Monash IE Group 30 SO2 - Weng Long Pang
Solve Communications
Customer Form Model
This Model governs data validation towards customer information form (Top of each form)
All form data processed will be checked aganist validation rules here before further processing
*/
class Customerform extends AppModel{
	// Prevent use of database (cakephp default)
	var $useTable = false;
	/* cutomer form consists of (with data validation rules)
		company name	company		normal name
		contact name	name		normal name
		contact number	contact		normal name (allows special characters)
		email address	email		email
		address		address		normal name (entire address stores here)
	*/	 
	var $_schema = array(
	'company'	=> array('type'=>'string','length'=>50),
	'name'		=> array('type'=>'string','length'=>50),
	'contact'	=> array('type'=>'string','length'=>20),
	'email'		=> array('type'=>'string','length'=>50),
	
);
	
	// Validation Rules go here
	var $validate = array(
	'company'	=> array('rule'=>array('minLength',1),'message'=>'This Field is Required'),
	'name'		=> array('rule'=>array('minLength',1),'message'=>'This Field is Required'),
	'contact'	=> array('required'=>array('rule'=>array('minLength',1),'message'=>'This Field is Required'),
						'number only' => array('rule' => 'numeric' , 'message' => 'Only Numeric Value can be entered')),
	'email'		=> array('rule'=>array('email'),'message'=>'This Field is Required or Entered Incorrectly'),
	'select'	=> array('rule'=>array('range',1,1000),'message'=>'This Option must be Selected'),
);
	
	/**
	 * MobileSim function
	 * This function ensure EITHER a mobile or sim number has been entered into the system
	 * Note only mobile and serial attribute can be used.
	 *
	 * @param array $data, var $second_data, string $form
	 * @return boolean
	 *
	 */
	public function MobileSim($data,$second_data,$form){

		if ($this->data[$form]['mobile'] == '' &&  $this->data[$form]['serial'] == ''){
			return false;
		} else {
			return true;
		}
	
	}
	/**
	 * NumerNull function
	 * This function allows pure number as inputing data, but accepts empty entry to circumvent default cake validation method
	 *
	 *
	 * @param array $data, string $key, string $form
	 * @return boolean
	 *
	 */	
	public function NumberNull($data,$key,$form){
		
		// var_dump($data); // DEBUG ONLY
	
		// check a valid input has made or not 
		if (is_numeric($data[$key]) && ($data[$key] - (int)$data[$key] == 0)){
			// secondary check to ensure an integer is entered
			
			return true;
		} else if ($data[$key] == '') {
		
			// if empty check if the other one has entered something
			/*if ($this->data[$form]['mobile'] != '' ||  $this->data[$form]['serial'] != ''){
				return true;			
			}*/
			return true;
		}
		// if entered incorrectly, return false
		return false;
	}
}
?>
