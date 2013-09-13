<?php
/**
 * UserFixture
 *
 */
class UserFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'group_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 100, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'email' => array('type' => 'string', 'null' => false, 'default' => null, 'key' => 'unique', 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'password' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 64, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'activation_code' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 32, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'active' => array('type' => 'boolean', 'null' => false, 'default' => '1', 'comment' => '0:Bloqueado - 1:Ativo'),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'username' => array('column' => 'email', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'group_id' => 1,
			'name' => 'Lorem ipsum dolor sit amet',
			'email' => 'Lorem ipsum dolor sit amet',
			'password' => 'Lorem ipsum dolor sit amet',
			'activation_code' => 'Lorem ipsum dolor sit amet',
			'active' => 1,
			'created' => '2013-09-11 20:01:56',
			'modified' => '2013-09-11 20:01:56'
		),
	);

}
