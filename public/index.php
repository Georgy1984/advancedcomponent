<?php

use DI\ContainerBuilder;
use function Tamtamchik\SimpleFlash\flash;

error_reporting(E_ALL);
ini_set('display_errors', 1);



if( !session_id() ) {
    session_start(); }

require __DIR__.'/../vendor/autoload.php';


$containerBuilder = new ContainerBuilder();
$container = $containerBuilder->build();






$dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r) {
$r->addRoute('GET', '/home', ['App\controllers\HomeController','index']);
$r->addRoute('GET', '/about', ['App\controllers\HomeController','about']);
$r->addRoute('GET', '/verification', ['App\controllers\HomeController','email_verification']);
$r->addRoute('GET', '/login', ['App\controllers\HomeController','login']);

//$r->addRoute('GET', '/user/{id:\d+}',  ['App\controllers\HomeController','Index']);
//$r->addRoute('GET', '/articles/{id:\d+}[/{title}]', 'get_article_handler');
});

// Fetch method and URI from somewhere
$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

// Strip query string (?foo=bar) and decode URI
if (false !== $pos = strpos($uri, '?')) {
$uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);

switch ($routeInfo[0]) {
case FastRoute\Dispatcher::NOT_FOUND:
echo '404';
break;

case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
$allowedMethods = $routeInfo[1];
echo 'ACCESS DENIED';
break;

case FastRoute\Dispatcher::FOUND:
$handler = $routeInfo[1];
$vars = $routeInfo[2];

$container->call($routeInfo[1], $routeInfo[2]);


break;
}
