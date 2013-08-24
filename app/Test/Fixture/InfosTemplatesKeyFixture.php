<?php
/**
 * InfosTemplatesKeyFixture
 *
 */
class InfosTemplatesKeyFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'key' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 100, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'default' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'infos_templates_keys_type_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'infos_categoy_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'fk_infos_templates_keys_infos_templates_keys_types1_idx' => array('column' => 'infos_templates_keys_type_id', 'unique' => 0),
			'fk_infos_templates_keys_infos_categories1_idx' => array('column' => 'infos_categoy_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'key' => 'Lorem ipsum dolor sit amet',
			'default' => 'Lorem ipsum dolor sit amet',
			'infos_templates_keys_type_id' => 1,
			'infos_categoy_id' => 1
		),
	);

}
