<?php
App::uses('Job', 'Model');

/**
 * Job Test Case
 *
 */
class JobTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.job',
		'app.order',
		'app.freight',
		'app.organisation',
		'app.job_priority',
		'app.price_level',
		'app.customer',
		'app.user',
		'app.job_allocation',
		'app.staff',
		'app.job_note',
		'app.job_status'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Job = ClassRegistry::init('Job');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Job);

		parent::tearDown();
	}

}
