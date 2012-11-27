<?php
App::uses('AppModel', 'Model');
/**
 * Customer Model
 *
 * @property Organisation $Organisation
 */
class Customer extends AppModel {
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'organisation_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'first_name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'This field is required',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'last_name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'This field is required',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'permission' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'This field is required',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'email' => array(
			'Email address only' => array(
				'rule' => array('email'),
				'message' => 'Email Address Only',
				'allowEmpty' => true)),
		'phone' => array(
			'Number only' => array(
				'rule' => array('numeric'),
				'message' => 'Phone Number Only',
				'allowEmpty' => true)),
		'fax' => array(
			'Number only' => array(
				'rule' => array('numeric'),
				'message' => 'Phone Number Only',
				'allowEmpty' => true)),
		'mobile' => array(
			'Number only' => array(
				'rule' => array('numeric'),
				'message' => 'Phone Number Only',
				'allowEmpty' => true)),
		
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Organisation' => array(
			'className' => 'Organisation',
			'foreignKey' => 'organisation_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
	// Each customer has one user account
	public $hasOne = array(
		'User' => array(
			'classname' => 'User',
			'foreignKey' => 'id'));
}
