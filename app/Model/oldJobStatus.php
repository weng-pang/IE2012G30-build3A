<?php
/*
Monash IE Group 30 SO2 - Weng Long Pang
Solve Communications
Job Status Model
This Model governs data validation and storage towards Job Status
All note data will be checked aganist validation rules here before further processing
*/
class JobStatus extends AppModel{
	public $useTable = 'job_statuses';
	public $primaryKey = 'id';
	/* Job Status consists of (with data validation rules)
		job_status			Job Status			short text

	*/	 
	
	// Validation Rules go here
	var $validate = array(

	'private_note'		=> array(
								 'rule'=>array('minLength',1),
								 'message'=>'This Field is Required',
								 ),
);
	// Associations 
	// This Model has many Job Notes
	public $hasMany = array(
						   'JobNote'=>array(
											  'className'=>'JobNote',
											  'foreignKey'=>'job_status_id',
											  'dependent' => false
											  )
						   );
}
?>
