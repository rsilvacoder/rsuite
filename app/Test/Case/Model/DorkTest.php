<?php
App::uses('Dork', 'Model');

/**
 * Dork Test Case
 *
 */
class DorkTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.dork'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Dork = ClassRegistry::init('Dork');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Dork);

		parent::tearDown();
	}

}
