<?php

use Cake\Core\Plugin;
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
use Cake\Routing\Route\DashedRoute;
Router::defaultRouteClass(DashedRoute::class);

Router::scope("/Answers", function ( RouteBuilder $routes ) {
	$routes->connect('/', ['controller' => 'Answers']);
	// 4桁の数字に制限、0始まりに対応
	$routes->connect('/:id', ['controller' => 'Answers', 'action'=> 'Detail'],['id' => '\d{9}']);
	$routes->connect('/Create', ['controller' => 'Answers', 'action'=> 'Create']);
});
Router::scope("/Login", function ( RouteBuilder $routes ) {
	$routes->connect('/', ['controller' => 'Login']);
});
Router::scope("/MailChange", function ( RouteBuilder $routes ) {
	$routes->connect('/', ['controller' => 'MailChange']);
	$routes->connect('/Change', ['controller' => 'MailChange', 'action' => 'Change']);
	$routes->connect('/MailComp', ['controller' => 'MailChange', 'action' => 'MailComp']);
	$routes->connect('/MailSend', ['controller' => 'MailChange', 'action' => 'MailSend']);
});
Router::scope("/Manager", function ( RouteBuilder $routes ) {
	$routes->connect('/', ['controller' => 'Manager']);
	$routes->connect('/Facilities', ['controller' => 'Manager', 'action'=> 'Facilities']);
	// 10桁の数字に制限、0始まりに対応
	$routes->connect('/FacilityDetail/:id', ['controller' => 'Manager', 'action'=> 'FacilityDetail'], ['id' => '\d{6}']);
	$routes->connect('/FacilityRegist', ['controller' => 'Manager', 'action'=> 'FacilityRegist']);
	// 10桁の数字に制限、0始まりに対応
	$routes->connect('/MailDetail/:id', ['controller' => 'Manager', 'action'=> 'MailDetail'], ['id' => '\d{9}']);
	$routes->connect('/Mails', ['controller' => 'Manager', 'action'=> 'Mails']);
	$routes->connect('/UserConfirm', ['controller' => 'Manager', 'action'=> 'UserConfirm']);
	// 10桁の数字に制限、0始まりに対応
	$routes->connect('/UserDetail/:id', ['controller' => 'Manager', 'action'=> 'UserDetail'], ['id' => '\d{10}']);
	$routes->connect('/UserRegist', ['controller' => 'Manager', 'action'=> 'UserRegist']);
	$routes->connect('/Users', ['controller' => 'Manager', 'action'=> 'Users']);
});
Router::scope("/Regist", function ( RouteBuilder $routes ) {
	$routes->connect('/', ['controller' => 'Regist']);
	$routes->connect('/Confirm', ['controller' => 'Regist', 'action'=> 'Confirm']);
});
Router::scope("/Request", function ( RouteBuilder $routes ) {
	$routes->connect('/', ['controller' => 'Request']);
	$routes->connect('/Create', ['controller' => 'Request', 'action'=> 'Create']);
	// 10桁の数字に制限、0始まりに対応
	$routes->connect('/:id', ['controller' => 'Request', 'action'=> 'Detail'], ['id' => '\d{10}']);
	$routes->connect('/EditPloof', ['controller' => 'Request', 'action'=> 'EditPloof']);
	// 10桁の数字に制限、0始まりに対応
	$routes->connect('/Edit/:id', ['controller' => 'Request', 'action'=> 'Edit'], ['id' => '\d{10}']);
	$routes->connect('/Lists', ['controller' => 'Request', 'action'=> 'Lists']);
	// 10桁の数字に制限、0始まりに対応
	$routes->connect('/Message/:id', ['controller' => 'Request', 'action'=> 'Message'], ['id' => '\d{10}']);
	$routes->connect('/Proof', ['controller' => 'Request', 'action'=> 'Proof']);
	$routes->connect('/Select', ['controller' => 'Request', 'action'=> 'Select']);
});
Router::scope("/ResetPass", function ( RouteBuilder $routes ) {
	$routes->connect('/', ['controller' => 'ResetPass']);
	$routes->connect('/MailPass', ['controller' => 'Request', 'action'=> 'MailPass']);
	$routes->connect('/PassChange', ['controller' => 'Request', 'action'=> 'PassChange']);
	$routes->connect('/ResPass', ['controller' => 'Request', 'action'=> 'ResPass']);
});
Router::scope("/Video", function ( RouteBuilder $routes ) {
	$routes->connect('/', ['controller' => 'Video']);
	$routes->connect('/UpLoad', ['controller' => 'Video', 'action'=> 'UpLoad']);
	// 9桁の数字に制限、0始まりに対応
	$routes->connect('/:id', ['controller' => 'Video', 'action'=> 'View'], ['id' => '\d{9}']);
});
Router::scope("/WorkShop", function ( RouteBuilder $routes ) {
	$routes->connect('/', ['controller' => 'WorkShop']);
	$routes->connect('/Confirmation', ['controller' => 'WorkShop', 'action'=> 'Confirmation']);
	$routes->connect('/Create', ['controller' => 'WorkShop', 'action'=> 'Create']);
	// 10桁の数字に制限、0始まりに対応
	$routes->connect('/:id', ['controller' => 'WorkShop', 'action'=> 'Detail'], ['id' => '\d{9}']);
	// 10桁の数字に制限、0始まりに対応
	$routes->connect('/Edit/:id', ['controller' => 'WorkShop', 'action'=> 'Edit'], ['id' => '\d{9}']);
	$routes->connect('/Select', ['controller' => 'WorkShop', 'action'=> 'Select']);
});
Router::scope("/Mail", function ( RouteBuilder $routes ) {
	$routes->connect('/', ['controller' => 'Mail']);
});
Router::scope('/', function (RouteBuilder $routes) {
	$routes->connect('/', ['controller' => 'TopPage', 'action' => 'index']);

	$routes->fallbacks(DashedRoute::class);
});

Plugin::routes();
