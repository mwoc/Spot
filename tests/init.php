<?php
/**
 * @package Spot
 * @link http://spot.os.ly
 */

// Require PHPUnit
require_once 'PHPUnit/Framework.php';

// Require Spot_Config
require_once dirname(dirname(__FILE__)) . '/Config.php';

// Date setup
date_default_timezone_set('America/Chicago');

// Setup available adapters for testing

$cfg = new Spot_Config();
// MySQL
//$adapter = $cfg->addConnection('test_mysql', 'mysql://test:password@localhost/test');
// MongoDB with adapter options
$adapter = $cfg->addConnection('test_mongodb', array(
	'adapter' => 'mongodb',
	'host' => '',
	'database' => 'test'
	), array(
	'cursor' => array(
		'timeout' => 10
	),
	'mapper' => array(
		'translate_id' => true
	)
));


/**
 * Return Spot mapper for use
 */
$mapper = new Spot_Mapper($cfg);
function test_spot_mapper() {
	global $mapper;
	return $mapper;
}


/**
 * Autoload test fixtures
 */
function test_spot_autoloader($className) {
	// Don't attempt to autoload 'PHPUnit_' or 'Spot_' classes
	if(false !== strpos($className, 'PHPUnit_') || false !== strpos($className, 'Spot_')) {
		return false;
	}
	$classFile = str_replace('_', '/', $className) . '.php';
	require dirname(__FILE__) . '/' . $classFile;
}
spl_autoload_register('test_spot_autoloader');