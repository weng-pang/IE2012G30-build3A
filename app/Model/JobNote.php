<?php
App::uses('AppModel', 'Model');
/**
 * JobNote Model
 *
 * @property Job $Job
 * @property JobStatus $JobStatus
 * @property Staff $Staff
 */
class JobNote extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'job_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'job_status_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'staff_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Job' => array(
			'className' => 'Job',
			'foreignKey' => 'job_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'JobStatus' => array(
			'className' => 'JobStatus',
			'foreignKey' => 'job_status_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Staff' => array(
			'className' => 'Staff',
			'foreignKey' => 'staff_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
