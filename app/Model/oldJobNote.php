<?php
/*
Monash IE Group 30 SO2 - Weng Long Pang
Solve Communications
Job Note Model
This Model governs data validation and storage towards Job Notes
All note data will be checked aganist validation rules here before further processing
*/
class JobNote extends AppModel{
	//public $actsAs = array('Containable'); // Enables Recursive Behaviour
	/* Job Note consists of (with data validation rules)
		job_id				Job ID				Integer -> Job
		job_status_id		Job Status ID		Integer -> Job Status
		staff_id			Staff ID			Integer -> Staff
		note				Customer Note		general text
		private_note		Solve Note			general text
	*/	 

	// Validation Rules go here
	var $validate = array(
	'job_id'			=> array(
								 'rule'=>array('numeric'),
								 'message'=>'This Field is Required',
								 ),
	'job_status_id'		=> array(
								 'rule'=>array('numeric'),
								 'message'=>'This Field is Required',
								 ),
	'staff_id'			=> array(
								 'rule'=>array('numeric'),
								 'message'=>'This Field is Required',
								 ),

);
	// Associations 
	// This Model has a Job Status
	public $belongsTo = array(
						   'JobStatus'=>array(
											  'className'=>'JobStatus',
											  'foreignKey'=>'job_status_id')
						   );
}
?>
