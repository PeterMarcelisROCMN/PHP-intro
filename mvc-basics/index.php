<?php

// get the action and the controller from the URL
$action = $_GET['action'];
$controller = $_GET['controller'];

// dynamically load the controller
require 'src/controllers/' . $controller . '.php';

$controller = new $controller();

// call the action
$controller->$action();