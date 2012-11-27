<?php
App::uses('AppModel', 'Model');
/**
 * Organisation Model
 *
 * @property Customer $Customer
 */
class Organisation extends AppModel {
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'This field is required',
				'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		'Unique Name' => array(
				'rule' => array('isUnique'),
				'message' => 'This name has been taken'),
		),
		'pricing_level' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'This field is required',
				'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'priority' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'trade_name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'This field is required',
				'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'address' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'This field is required',
				'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'suburb' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'This field is required',
				'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'state' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'This field is required',
				'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'postcode' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'This field is required',
				'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'Correct Post Code' => array(
										 'rule' => array('correctPostCode'),
										 'message' => 'Incorrect Post Code'),
		),
		'phone' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'This field is required',
				'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'email'=>array(),
		'address_book' => array(), // boolean
		'trackable' => array(), // boolean
		'helpdesk_sla' => array(
								'Number Only' => array(
													   'rule'=>array('numeric'),
														 'allowEmpty'=>true,
														 'message'=>'Number Only')), // numeric value only
		'procurement_sla' => array(
								   'Number Only' => array(
													   'rule'=>array('numeric'),
														 'allowEmpty'=>true,
														 'message'=>'Number Only')), // numeric value only
		'allowance_sla' => array(
								'Number Only' => array(
													   'rule'=>array('numeric'),
														 'allowEmpty'=>true,
														 'message'=>'Number Only')), // numeric value only
		'freight_id' => array(
							 'Number Only' => array(
													'rule'=>array('numeric'),
													'allowEmpty'=>true)), // numeric value only (for refence)
		'freight_cost' => array(
							   'Monetary' => array(
												   'rule'=>array('decimal'),
						 							'allowEmpty'=>true,
						 							'message'=>'Monetary Value Only')), // Monetary value only
		'job_priority_id' => array(
								  'Number Only' => array(
													   'rule'=>array('numeric'),
														 'allowEmpty'=>true)) // numeric value only (for refence)
	);
	// Special Validation - Post Code
	public function correctPostCode($data){
		// check first digit of post code is comparable to the state
		// fetch information
		$state = $this->data['Organisation']['state'];
		$firstPostCode = (int)($data['postcode']/1000);
		if ((($state == 'ACT' || $state == 'NSW') && ($firstPostCode == 1 || $firstPostCode == 2)) ||
		    (($state == 'VIC') && ($firstPostCode == 3 || $firstPostCode == 8)) ||
			(($state == 'QLD') && ($firstPostCode == 4 || $firstPostCode == 9)) ||
			($state == 'SA' && $firstPostCode == 5) ||
			($state == 'WA' && $firstPostCode == 6) ||
			($state == 'TAS' && $firstPostCode == 7) ||
			($state == 'NT' && $firstPostCode == 0)){
			// correct validation
			return true;
		}
		
		return false;
	}
	
	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Customer' => array(
			'className' => 'Customer',
			'foreignKey' => 'organisation_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
			'Address' => array(
					'className' => 'Address',
					'foreignKey' => 'organisation_id',
					'dependent' => false,
					),
	);
	// Each organisation has a default staff
	
	// Each organisation has a frieght Cost
	// Each organisation has a priority level
	public $belongsTo = array(
							  'JobPriority'		=>array(
												   		'className'=>'JobPriority'),
							  'Freight' 		=>array(
														'className'=>'Freight',
														'foreignKey'=>'freight_id'),
							  'PriceLevel'		=>array(
														'className'=>'PriceLevel'),
							  'Staff'			=>array(
							  							'classNmae'=>'Staff'),
							  );

}
