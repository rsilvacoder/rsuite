<?php
App::uses('InfosTemplatesKeysType', 'Model');

/**
 * InfosTemplatesKeysType Test Case
 *
 */
class InfosTemplatesKeysTypeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.infos_templates_keys_type',
		'app.infos_templates_key',
		'app.infos_categoy'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->InfosTemplatesKeysType = ClassRegistry::init('InfosTemplatesKeysType');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->InfosTemplatesKeysType);

		parent::tearDown();
	}

}
