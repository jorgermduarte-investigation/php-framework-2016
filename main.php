<?php
$project_path = __DIR__;

/**
 * Configurations
 */

//define the routes of the application
$routes = array(
    "middlewares" => $project_path . "/middlewares/",
    "libraries" => $project_path . "/libraries/",
    "services" => $project_path . "/services/",
    "framework" => $project_path . "/framework/",
);

//Load the core middlewares of the application/project
$middlewares = array(
    "IsAuthenticated"
);

$libraries = $services  = $configurations = array();





/**
 * Framework Initialization
 */

require($routes["framework"] . "initialization.php");
require($routes["framework"] . "middlewares.php");

use \Framework\Initialization as Framework;
use \Framework\Middlewares as Middlewares;

$framework = new Framework(
    $middlewares, //Core middlewares
    $libraries, //Core Libraries
    $services, //Core Services
    $routes, //Core Routes
);

$framework_middlewares = new Middlewares();


?>