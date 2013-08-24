<?php
App::uses('InfosTemplatesKey', 'Model');

/**
 * InfosTemplatesKey Test Case
 *
 */
class InfosTemplatesKeyTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.infos_templates_key',
		'app.infos_templates_keys_type',
		'app.infos_categoy'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->InfosTemplatesKey = ClassRegistry::init('InfosTemplatesKey');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->InfosTemplatesKey);

		parent::tearDown();
	}

}
