<?php
App::uses('Sent', 'Model');

/**
 * Sent Test Case
 *
 */
class SentTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.sent',
		'app.client',
		'app.campaign'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Sent = ClassRegistry::init('Sent');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Sent);

		parent::tearDown();
	}

}
