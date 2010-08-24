<?php
/**
 * @package Spot
 * @link http://spot.os.ly
 */
class Test_Config extends PHPUnit_Framework_TestCase
{
	protected $backupGlobals = false;

	public function testAddConnectionWithDSNString()
	{
		$cfg = new Spot_Config();
		
		// Mysql
		$adapter = $cfg->addConnection('test_mysql', 'mysql://test:password@localhost/test');
		$this->assertTrue($adapter instanceof Spot_Adapter_Mysql);
		/*
		// MongoDB
		$adapter = $cfg->addDefaultConnection('test_mongodb', 'mongodb://localhost:27017');
		$this->assertTrue($adapter instanceof Spot_Adapter_Mongodb);
		*/
	}
}