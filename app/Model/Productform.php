<?php
class Productform extends AppModel{
	// Prevent use of database (cakephp default)
	var $useTable = false;
	var $_schema = array(
        'handset'               =>array('type'=>'text'), 
        'accQty'                =>array('type'=>'text'), 
	'serviceType'		=>array('type'=>'text'),
	'existService'          =>array('type'=>'text'),
	'plan'		        =>array('type'=>'text'), 
        'datapack'		=>array('type'=>'text'),
        'accQty'                =>array('type'=>'text'),    
        'needDatapack'         =>array('type'=>'boolean'),
        'tooform'               =>array('type'=>'text'),
        'portform'              =>array('type'=>'text'),
        'isSimDispartch'        =>array('type'=>'text'),
        'simSerial'             =>array('type'=>'text'),   
	'accept'		=> array('type'=>'boolean')
);
	
	// Validation Rules go here
	var $validate = array(
	'handset'		=> array(
						 'rule'=>array('minLength',1),
						 'allowEmpty'=>false,
						 'message'=>'This Field is Required'
						 ),
//	'serviceType'		=> array(
//						 'rule'=>array('minLength',1),
//						 'allowEmpty'=>false,
//						 'message'=>'This Field is Required'
//						 ),
//	'esistService'	=> array(
//							 'rule'=>array('minLength',1),
//							 'allowEmpty'=>false,
//							 'message'=>'This Field is Required'
//						 	 ),
//        'plan'	=> array(
//							 'rule'=>array('minLength',1),
//							 'allowEmpty'=>false,
//							 'message'=>'This Field is Required'
//						 	 ),
//        'datapack'	=> array(
//							 'rule'=>array('minLength',1),
//							 'allowEmpty'=>false,
//							 'message'=>'This Field is Required'
//						 	 ),    
	'accept'	=> array(
            
						 'rule'=>array('comparison', '!=', 0),
						 'allowEmpty'=>false,
						 'message'=>'You must accept Terms and Conditions'
						 )
	
);
	
}
?>
