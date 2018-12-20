<?php

/**
 * Front controller
 *
 * PHP version 7.0
 */

/**
 * Composer
 */
require dirname(__DIR__) . '/vendor/autoload.php';


/**
 * Error and Exception handling
 */
error_reporting(E_ALL);
set_error_handler('Core\Error::errorHandler');
set_exception_handler('Core\Error::exceptionHandler');


/**
 * Routing
 */
$router = new Core\Router();

//Index,Dashboard,Login route only  controller+action
$router->add('', ['controller' => 'Shop', 'action' => 'index']);
$router->add('', ['controller' => 'Login', 'action' => 'index']);
$router->add('', ['controller' => 'Dashboard', 'action' => 'dashboard']);
$router->add('', ['controller' => 'Home', 'action' => 'index']);
$router->add('{controller}/{action}');


$router->dispatch($_SERVER['QUERY_STRING']);
