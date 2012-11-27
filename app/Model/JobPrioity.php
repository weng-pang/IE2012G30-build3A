<?php
/*
Monash IE Group 30 SO2 - Weng Long Pang
Solve Communications
Job Priority Model
This Model governs data validation and storage towards Job Proirity
All note data will be checked aganist validation rules here before further processing
*/
class JobPriority extends AppModel{
	//public $actsAs = array('Containable'); // Enables Recursive Behaviour
	/* Job Priority consists of (with data validation rules)
		job_priority		Job Priority		String
	*/	 

	// Validation Rules go here
	var $validate = array(

	'job_priority'			=> array(
								 'rule'=>array('notempty'),
								 'message'=>'This Field is Required',
								 ),

);
	// Associations 
	// Each Job has a priority Level
	
	public $belongsTo = array(
						   'JobStatus'=>array(
											  'className'=>'Job',
											  'foreignKey'=>'job_priority')
						  );
	//Each priority Level has many organisations
	public $hasMany = array(
							 'Organisation'=>array(
												 'className'=>'Organisation',
												 'foreignKey'=>'job_priority_id')
							 );
}
?>
