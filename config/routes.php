<?php

use Cake\Core\Plugin;
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
use Cake\Routing\Route\DashedRoute;
Router::defaultRouteClass(DashedRoute::class);

Router::scope("/Video", function ( RouteBuilder $routes ) {
	$routes->connect(
		'/',
		['controller' => 'Video']
	);
	$routes->connect(
		'/:id',
		['controller' => 'Video', 'action'=> 'view'],
		// 9桁の数字に制限、0始まりに対応
		['id' => '\d{9}']
	);
});
Router::scope("/Request", function ( RouteBuilder $routes ) {
	$routes->connect(
		'/',
		['controller' => 'Request']
	);
	$routes->connect(
		'/:id',
		['controller' => 'request', 'action'=> 'detail'],
		// 10桁の数字に制限、0始まりに対応
		['id' => '\d{10}']
	);
	$routes->connect(
		'/edit/:id',
		['controller' => 'request', 'action'=> 'edit'],
		// 10桁の数字に制限、0始まりに対応
		['id' => '\d{10}']
	);
});
Router::scope("/Answers", function ( RouteBuilder $routes ) {
	$routes->connect(
		'/',
		['controller' => 'Answers']
	);
	$routes->connect(
		'/:id',
		['controller' => 'Answers', 'action'=> 'detail'],
		// 4桁の数字に制限、0始まりに対応
		['id' => '\d{9}']
	);
});
Router::scope("/Manager", function ( RouteBuilder $routes ) {
	$routes->connect(
		'/',
		['controller' => 'Manager']
	);
	$routes->connect(
		'/MailDetail/:id',
		['controller' => 'Manager', 'action'=> 'MailDetail'],
		// 10桁の数字に制限、0始まりに対応
		['id' => '\d{9}']
	);
	$routes->connect(
		'/FacilityDetail/:id',
		['controller' => 'Manager', 'action'=> 'FacilityDetail'],
		// 10桁の数字に制限、0始まりに対応
		['id' => '\d{6}']
	);
	$routes->connect(
		'/UserDetail/:id',
		['controller' => 'Manager', 'action'=> 'UserDetail'],
		// 10桁の数字に制限、0始まりに対応
		['id' => '\d{9}']
	);
	$routes->connect(
		'/FacilityRegist',
		['controller' => 'Manager', 'action'=> 'FacilityRegist']
	);
});

Router::scope("/WorkShop", function ( RouteBuilder $routes ) {
	$routes->connect(
		'/:id',
		['controller' => 'WorkShop', 'action'=> 'detail'],
		// 10桁の数字に制限、0始まりに対応
		['id' => '\d{9}']
	);
	$routes->connect(
		'/edit/:id',
		['controller' => 'WorkShop', 'action'=> 'edit'],
		// 10桁の数字に制限、0始まりに対応
		['id' => '\d{9}']
	);
	$routes->connect(
		'/',
		['controller' => 'WorkShop', 'action'=> 'index']
	);
});
// Router::scope('/Silver', function (RouteBuilder $routes) {
// 	$routes->connect('/', ['controller' => 'TopPage', 'action' => 'index']);
// });
Router::scope('/', function (RouteBuilder $routes) {
	$routes->connect('/', ['controller' => 'TopPage', 'action' => 'index']);

	$routes->fallbacks(DashedRoute::class);
});

Plugin::routes();
