<?php

require_once '../core/Request.php';
require_once '../config/config.php';
require_once '../core/Router.php';
// Start session to manage user sessions throughout the application
session_start();

// Instantiate the Router
$router = new Router();

// Get the URL from the request
$url = $_SERVER['REQUEST_URI'];

// Dispatch the request to the appropriate controller and action
$page = $router->dispatch($url);
?>
