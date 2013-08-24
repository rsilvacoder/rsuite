<?php
App::uses('InfosKey', 'Model');

/**
 * InfosKey Test Case
 *
 */
class InfosKeyTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.infos_key',
		'app.info',
		'app.infos_category'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->InfosKey = ClassRegistry::init('InfosKey');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->InfosKey);

		parent::tearDown();
	}

}
