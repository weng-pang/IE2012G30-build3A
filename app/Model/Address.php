<?php
/**
 * Address model
 * Monash IE Group 30 SO2 - Weng Long Pang
 * Solve Communications
 * 
 * This Model governs address information for Organisation and Customer data
 * 
 *
 * 
 * @author			Monash IE Team 30 S02, Weng Long Pang
 * @copyright		Copyright 2012, Monash University
 * @package			app.Model
 * @since			Build 3
 * @property		Organisation $Organisation
 * @property		Customer $Customer
 * 
 */

App::uses('Model', 'Model');

class Address extends AppModel{
	/**
	 * Validation rules
	 *
	 * @var array
	 */
	public $validate = array(
			'address' => array(
					'Required' => array(
							'rule'		=> 'notempty',
							'message'	=> 'This field is required')
					),
			'suburb' => array(
					'Required' => array(
							'rule'		=> 'notempty',
							'message'	=> 'This field is required')),
			'state' => array(
					'Required' => array(
							'rule'		=> 'notempty',
							'message'	=> 'This field is required')),
			'postcode' => array(
					'Required' => array(
							'rule'		=> 'notempty',
							'message'	=> 'This field is required'),
					'Number Only' => array(
							'rule'		=> 'numeric',
							'message'	=> 'Number Only'),
					'Correct Post Code' => array(
							'rule'		=> 'correctPostCode',
							'message'	=> 'Incorrect Post Code'))
			);
	/** 
	 *  Special Validation - Post Code
	 *  The postcode must correlate with state entered
	 *  
	 * @var $state
	 * @var $firstPostCode
	 *  
	 * @param array $data
	 * @return boolean
	 */
	public function correctPostCode($data){
		// check first digit of post code is comparable to the state
		// fetch information
		$state = $this->data['Address']['state'];
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
		// validation cannot pass through
		return false;
	}
	
	/**
	 * belongsTo associations
	 *
	 * Each address belongs to a single organisation
	 *
	 * @var array
	 */
	public $belongsTo = array(
			'Organisation' => array(
					'className' 	=> 'Organisation',
					'foreignKey' 	=> 'organisation_id'));
	
}