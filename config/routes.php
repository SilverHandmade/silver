<?php

use Cake\Core\Plugin;
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
use Cake\Routing\Route\DashedRoute;
Router::defaultRouteClass(DashedRoute::class);

Router::scope("/video", function ( RouteBuilder $routes ) {
	$routes->connect(
		'/:id',
		['controller' => 'video', 'action'=> 'view'],
		// 9桁の数字に制限、0始まりに対応
		['id' => '\d{9}']
	);
});
Router::scope("/request", function ( RouteBuilder $routes ) {
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
Router::scope("/answers", function ( RouteBuilder $routes ) {
	$routes->connect(
		'/:id',
		['controller' => 'answers', 'action'=> 'detail'],
		// 10桁の数字に制限、0始まりに対応
		['id' => '\d{4}']
	);
});
Router::scope("/manager", function ( RouteBuilder $routes ) {
	$routes->connect(
		'/M1ailDetail/:id',
		['controller' => 'manager', 'action'=> 'MailDetail'],
		// 10桁の数字に制限、0始まりに対応
		['id' => '\d{9}']
	);
	$routes->connect(
		'/FacilityDetail/:id',
		['controller' => 'manager', 'action'=> 'FacilityDetail'],
		// 10桁の数字に制限、0始まりに対応
		['id' => '\d{9}']
	);
});

Router::scope("/WorkShop", function ( RouteBuilder $routes ) {
	$routes->connect(
		'/:id',
		['controller' => 'WorkShop', 'action'=> 'detail'],
//		 10桁の数字に制限、0始まりに対応
		['id' => '\d{9}']
	);
	$routes->connect(
		'/edit/:id',
		['controller' => 'WorkShop', 'action'=> 'edit'],
//		 10桁の数字に制限、0始まりに対応
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
