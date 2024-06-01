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

$segments = explode('/', $path);
// print_r($segments);

// Get the controller and action
$controller = $segments[1] ?? 'home';
$action = $segments[2] ?? 'index';

// dynamically load the controller
require 'src/controllers/' . $controller . '.php';

$controller = new $controller();

// call the action
$controller->$action();