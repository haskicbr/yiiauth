<?php

// This is the main Web application configuration. Any writable
// application properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Yii Framework: Phone Book Demo',

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
	),

	// application components
	'components'=>array(
		'db' => array(
			'connectionString' => 'mysql:host=localhost;dbname=yii_test',
			'emulatePrepare'   => true,
			'username'         => 'root',
			'password'         => '',
			'charset'          => 'utf8',
		),

		'urlManager'=>array(
			'showScriptName'=>false,
			'urlFormat'=>'path',
			'rules'=>array(
				array('/api/postdecreasesum', 'pattern'=>'/api/postdecreasesum', 'verb'=>'POST'),
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),

		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
			'class' => 'WebUser',
		),

		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),

		'request' => array(
			'baseUrl' => 'http://yiiauth',
		),

	),

	'modules'=>array(
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'123',
			// 'ipFilters'=>array(…список IP…),
			// 'newFileMode'=>0666,
			// 'newDirMode'=>0777,
		),
	),

);