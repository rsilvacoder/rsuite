<?php
App::uses('InfosCategory', 'Model');

/**
 * InfosCategory Test Case
 *
 */
class InfosCategoryTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.infos_category',
		'app.info'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->InfosCategory = ClassRegistry::init('InfosCategory');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->InfosCategory);

		parent::tearDown();
	}

}
