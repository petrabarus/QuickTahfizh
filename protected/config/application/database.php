<?php

/**
 * Returns configuration for database.
 * 
 * @author Petra Barus <petra.barus@gmail.com>
 */
return array(
	'db' => array(
		'connectionString' => 'mysql:host=localhost;dbname=tahfizh',
		'emulatePrepare' => true,
		'username' => 'tahfizh',
		'password' => 'tahfizh',
		'charset' => 'utf8',
		'initSQLs' => array('set time_zone="+00:00";'),
		'schemaCachingDuration' => 180,
		'enableProfiling' => YII_DEBUG,
		'enableParamLogging' => YII_DEBUG,
	)
);