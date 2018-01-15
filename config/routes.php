<?php

use Cake\Core\Plugin;
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
use Cake\Routing\Route\DashedRoute;
Router::defaultRouteClass(DashedRoute::class);

Router::scope("/Answers", function ( RouteBuilder $routes ) {
	$routes->connect(
		'/',
		['controller' => 'Answers']
	);
	$routes->connect(
		'/:id',
		['controller' => 'Answers', 'action'=> 'Detail'],
		// 4桁の数字に制限、0始まりに対応
		['id' => '\d{9}']
	);
	$routes->connect(
		'/Create',
		['controller' => 'Answers', 'action'=> 'Create']
	);
});
Router::scope("/Login", function ( RouteBuilder $routes ) {
	$routes->connect(
		'/',
		['controller' => 'Login']
	);
});
Router::scope("/MailChange", function ( RouteBuilder $routes ) {
	$routes->connect(
		'/',
		['controller' => 'MailChange']
	);
	$routes->connect(
		'/Change',
		['controller' => 'MailChange', 'action' => 'Change']
	);
	$routes->connect(
		'/MailComp',
		['controller' => 'MailChange', 'action' => 'MailComp']
	);
	$routes->connect(
		'/MailSend',
		['controller' => 'MailChange', 'action' => 'MailSend']
	);
});
Router::scope("/Manager", function ( RouteBuilder $routes ) {
	$routes->connect(
		'/',
		['controller' => 'Manager']
	);
	$routes->connect(
		'/Facilities',
		['controller' => 'Manager', 'action'=> 'Facilities']
	);
	$routes->connect(
		'/FacilityDetail/:id',
		['controller' => 'Manager', 'action'=> 'FacilityDetail'],
		// 10桁の数字に制限、0始まりに対応
		['id' => '\d{6}']
	);
	$routes->connect(
		'/FacilityRegist',
		['controller' => 'Manager', 'action'=> 'FacilityRegist']
	);
	$routes->connect(
		'/MailDetail/:id',
		['controller' => 'Manager', 'action'=> 'MailDetail'],
		// 10桁の数字に制限、0始まりに対応
		['id' => '\d{9}']
	);
	$routes->connect(
		'/Mails',
		['controller' => 'Manager', 'action'=> 'Mails']
	);
	$routes->connect(
		'/UserConfirm',
		['controller' => 'Manager', 'action'=> 'UserConfirm']
	);
	$routes->connect(
		'/UserDetail/:id',
		['controller' => 'Manager', 'action'=> 'UserDetail'],
		// 10桁の数字に制限、0始まりに対応
		['id' => '\d{10}']
	);
	$routes->connect(
		'/UserRegist',
		['controller' => 'Manager', 'action'=> 'UserRegist']
	);
	$routes->connect(
		'/Users',
		['controller' => 'Manager', 'action'=> 'Users']
	);
});
Router::scope("/Regist", function ( RouteBuilder $routes ) {
	$routes->connect(
		'/',
		['controller' => 'Regist']
	);
	$routes->connect(
		'/Confirm',
		['controller' => 'Regist', 'action'=> 'Confirm']
	);
});
Router::scope("/Request", function ( RouteBuilder $routes ) {
	$routes->connect(
		'/',
		['controller' => 'Request']
	);
	$routes->connect(
		'/Create',
		['controller' => 'Request', 'action'=> 'Create']
	);
	$routes->connect(
		'/:id',
		['controller' => 'Request', 'action'=> 'Detail'],
		// 10桁の数字に制限、0始まりに対応
		['id' => '\d{10}']
	);
	$routes->connect(
		'/EditPloof',
		['controller' => 'Request', 'action'=> 'EditPloof']
	);
	$routes->connect(
		'/Edit/:id',
		['controller' => 'Request', 'action'=> 'Edit'],
		// 10桁の数字に制限、0始まりに対応
		['id' => '\d{10}']
	);
	$routes->connect(
		'/Lists',
		['controller' => 'Request', 'action'=> 'Lists']
	);
	$routes->connect(
		'/Message/:id',
		['controller' => 'Request', 'action'=> 'Message'],
		// 10桁の数字に制限、0始まりに対応
		['id' => '\d{10}']
	);
	$routes->connect(
		'/Proof',
		['controller' => 'Request', 'action'=> 'Proof']
	);
	$routes->connect(
		'/Select',
		['controller' => 'Request', 'action'=> 'Select']
	);
});
Router::scope("/ResetPass", function ( RouteBuilder $routes ) {
	$routes->connect(
		'/',
		['controller' => 'ResetPass']
	);
	$routes->connect(
		'/MailPass',
		['controller' => 'Request', 'action'=> 'MailPass']
	);
	$routes->connect(
		'/PassChange',
		['controller' => 'Request', 'action'=> 'PassChange']
	);
	$routes->connect(
		'/ResPass',
		['controller' => 'Request', 'action'=> 'ResPass']
	);
});
Router::scope("/Video", function ( RouteBuilder $routes ) {
	$routes->connect(
		'/',
		['controller' => 'Video']
	);
	$routes->connect(
		'/UpLoad',
		['controller' => 'Video', 'action'=> 'UpLoad']
	);
	$routes->connect(
		'/:id',
		['controller' => 'Video', 'action'=> 'View'],
		// 9桁の数字に制限、0始まりに対応
		['id' => '\d{9}']
	);
});
Router::scope("/WorkShop", function ( RouteBuilder $routes ) {
	$routes->connect(
		'/',
		['controller' => 'WorkShop']
	);
	$routes->connect(
		'/Confirmation',
		['controller' => 'WorkShop', 'action'=> 'Confirmation']
	);
	$routes->connect(
		'/Create',
		['controller' => 'WorkShop', 'action'=> 'Create']
	);
	$routes->connect(
		'/:id',
		['controller' => 'WorkShop', 'action'=> 'Detail'],
		// 10桁の数字に制限、0始まりに対応
		['id' => '\d{9}']
	);
	$routes->connect(
		'/Edit/:id',
		['controller' => 'WorkShop', 'action'=> 'Edit'],
		// 10桁の数字に制限、0始まりに対応
		['id' => '\d{9}']
	);
	$routes->connect(
		'/Select',
		['controller' => 'WorkShop', 'action'=> 'Select']
	);
});
Router::scope('/', function (RouteBuilder $routes) {
	$routes->connect('/', ['controller' => 'TopPage', 'action' => 'index']);

	$routes->fallbacks(DashedRoute::class);
});

Plugin::routes();
