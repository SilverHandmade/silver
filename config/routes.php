<?php

use Cake\Core\Plugin;
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
use Cake\Routing\Route\DashedRoute;
Router::defaultRouteClass(DashedRoute::class);

Router::scope('/', function (RouteBuilder $routes) {
	$routes->connect('/', ['controller' => 'TopPage', 'action' => 'index']);
	$routes->connect('/logout', ['controller' => 'Login', 'action' => 'logout']);

    $routes->fallbacks(DashedRoute::class);
});
Router::scope('/Silver', function (RouteBuilder $routes) {
	$routes->connect('/', ['controller' => 'TopPage', 'action' => 'index']);
});



Plugin::routes();
