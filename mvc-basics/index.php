<?php
// Get the values for the request uri and the original script name
$request_uri = $_SERVER['REQUEST_URI'];
$script_name = $_SERVER['SCRIPT_NAME'];

// Strip the base path from the request URI
$base_path = str_replace('/index.php', '', $script_name);
$relative_uri = substr($request_uri, strlen($base_path));

// Split the relative URI into parts 
// /home/index?name=Pete will exclude the ?name=Pete part
$path = parse_url($relative_uri, PHP_URL_PATH);

// require 'src/router.php';

spl_autoload_register(function($class_name){

    require 'src/' . str_replace("\\", "/", $class_name) . '.php';
});

$router = new Framework\Router;

$router->add('/', ['controller' => 'home', 'action' => 'index']);
$router->add('/home/index', ['controller' => 'home', 'action' => 'index']);
$router->add('/products', ['controller' => 'products', 'action' => 'index']);
$router->add('/products/1', ['controller' => 'products', 'action' => 'show']);

$params = $router->match($path);

if ($params === false){
    exit('404 - Page not found');
}

$action = $params['action'];
$controller = 'App\Controllers\\' . ucwords($params['controller']);

$controller = new $controller();

// call the action
$controller->$action();