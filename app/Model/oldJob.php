<?php
class Job extends AppModel{
	//public $useTable = 'Jobs';

	/**
	 * hasMany associations
	 *
	 * @var array
	 */
	public $hasMany = array(
			'JobAllocation' => array(
					'className' => 'JobAllocation',
					'foreignKey' => 'job_id',
					'dependent' => false,
					//'conditions' => '',
					//'fields' => '',
					//'order' => '',
					//'limit' => '',
					//'offset' => '',
					//'exclusive' => '',
					//'finderQuery' => '',
					//'counterQuery' => ''
			),
			'JobNote'=>array(
					'className'=>'JobNote',
					'foreignKey' => 'job_id')
	);
	// Each Job has a specific Priority Level
	public $belongsTo = array(
			'JobPriority'=>array(
					'className'=>'JobPriority',
					'foreignKey'=>'job_priority'));


}